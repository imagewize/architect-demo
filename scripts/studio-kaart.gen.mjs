// Fig. 02 — schematic map of the Nieuwe Maas with the studio marked in M4H.
// Hand-built SVG in the page palette (the arch.mjs kit draws elevations in metres;
// a map is plan geometry, so this generator computes its own curves and checks).
//   node scripts/studio-kaart.gen.mjs images/studio-kaart.svg
import { writeFileSync } from 'node:fs';

const out = process.argv[2] || 'images/studio-kaart.svg';

// The page's own colours (theme.json presets), as hex because the SVG is used via <img>.
const PALETTE = { ink: '#111111', paper: '#FFFFFF', tint: '#F7F7F8', mid: '#595959', accent: '#FF4F00' };

const W = 440, H = 240;

// --- river banks: two cubic chains each, x runs -8..448 so the banks bleed off-canvas ---
// north bank (land above), south bank (land below)
const NORTH = [
  { p0: [-8, 140], c1: [70, 108], c2: [140, 190], p3: [220, 150] },
  { p0: [220, 150], c1: [300, 122], c2: [360, 102], p3: [448, 130] },
];
const SOUTH = [
  { p0: [-8, 192], c1: [70, 162], c2: [140, 240], p3: [220, 202] },
  { p0: [220, 202], c1: [300, 172], c2: [360, 150], p3: [448, 182] },
];

const bez = (s, t) => {
  const u = 1 - t;
  return [
    u*u*u*s.p0[0] + 3*u*u*t*s.c1[0] + 3*u*t*t*s.c2[0] + t*t*t*s.p3[0],
    u*u*u*s.p0[1] + 3*u*u*t*s.c1[1] + 3*u*t*t*s.c2[1] + t*t*t*s.p3[1],
  ];
};
// x -> y lookup per bank, by fine sampling
const lut = (segs) => {
  const map = [];
  for (const s of segs) for (let i = 0; i <= 200; i++) map.push(bez(s, i / 200));
  return (x) => {
    let best = map[0], bd = 1e9;
    for (const p of map) { const d = Math.abs(p[0] - x); if (d < bd) { bd = d; best = p; } }
    return best[1];
  };
};
const northY = lut(NORTH), southY = lut(SOUTH);
const midY = (x) => (northY(x) + southY(x)) / 2;

const segPath = (segs) =>
  `M${segs[0].p0[0]} ${segs[0].p0[1]} ` + segs.map((s) => `C${s.c1[0]} ${s.c1[1]} ${s.c2[0]} ${s.c2[1]} ${s.p3[0]} ${s.p3[1]}`).join(' ');
const NORTH_D = segPath(NORTH);
const SOUTH_D = segPath(SOUTH);
// water = north bank forward, then south bank back (each cubic reversed: p3,c2,c1,p0)
const WATER_D = NORTH_D + ' L448 182 ' + SOUTH.slice().reverse()
  .map((s) => `C${s.c2[0]} ${s.c2[1]} ${s.c1[0]} ${s.c1[1]} ${s.p0[0]} ${s.p0[1]}`).join(' ') + ' Z';

// --- drawing helpers: kit-style draw-on animation (pathLength=1 dash trick) + fades ---
let delay = 0;
const step = (d, w = 0.04) => (delay += d, (delay - d).toFixed(2));
const draw = (d, at, w = 1.4, color = PALETTE.ink, extra = '') =>
  `<path class="k2-draw" pathLength="1" style="animation-delay:${step(at)}s" d="${d}" fill="none" stroke="${color}" stroke-width="${w}" stroke-linecap="round" stroke-linejoin="round"${extra}/>`;
const T = (x, y, str, at, { size = 10, fill = PALETTE.mid, weight = 400, ls = 0, anchor = 'start' } = {}) =>
  `<text class="k2-fade" style="animation-delay:${step(at)}s" x="${x}" y="${y}" font-size="${size}" fill="${fill}" font-weight="${weight}" letter-spacing="${ls}" text-anchor="${anchor}">${str}</text>`;

const layers = { banks: '', water: '', quay: '', streets: '', bridge: '', marker: '', labels: '', meta: '' };

// 1. banks (draw first)
layers.banks += draw(NORTH_D, 0.00, 1.4);
layers.banks += draw(SOUTH_D, 0.12, 1.0);

// 2. water: mist tint + faint current lines, kept inside the banks by construction
const wl = (x, off, len) => {
  const y = Math.min(Math.max(midY(x) + off, northY(x) + 7), southY(x) - 7);
  return draw(`M${x} ${y.toFixed(1)}L${(x + len).toFixed(1)} ${y.toFixed(1)}`, 0.22, 0.35);
};
layers.water += `<path class="k2-fade" style="animation-delay:${step(0.10)}s" d="${WATER_D}" fill="${PALETTE.tint}" stroke="none"/>`;
for (const [x, off, len] of [[28, 6, 24], [64, -9, 30], [102, 10, 20], [148, -6, 26], [192, 9, 22], [244, -8, 26], [282, 7, 20], [392, -7, 24], [418, 5, 18]])
  layers.water += wl(x, off, len);

// 3. quay hatching on both banks (kit ground-hatch style, faint diagonals)
const hatch = (bank, dir, from, to, every, skip) => {
  let s = '';
  for (let x = from; x <= to; x += every) {
    if (skip && x > skip[0] && x < skip[1]) continue;
    const y = bank(x);
    s += draw(`M${x} ${y.toFixed(1)}L${(x + 6).toFixed(1)} ${(y + dir * 10).toFixed(1)}`, 0.42, 0.35);
  }
  return s;
};
layers.quay += hatch(northY, -1, 12, 436, 17, [292, 346]); // skip the bridge landing
layers.quay += hatch(southY, 1, 12, 436, 23, [292, 346]);

// 4. streets on the north bank: a quay street parallel to the bank + stubs + building footprints
const STREET = [
  { p0: [-8, 124], c1: [70, 92], c2: [140, 174], p3: [220, 134] },
  { p0: [220, 134], c1: [300, 106], c2: [360, 86], p3: [448, 114] },
];
const STREET_D = segPath(STREET);
const streetY = lut(STREET);
layers.streets += draw(STREET_D, 0.52, 0.5, PALETTE.mid);
for (const x of [60, 152, 252, 344]) {
  const y = streetY(x);
  layers.streets += draw(`M${x} ${y.toFixed(1)}L${x} ${(y - 30).toFixed(1)}`, 0.58, 0.35, PALETTE.mid);
}
const block = (x, w, h, aboveStreet) => {
  const y = aboveStreet ? streetY(x) - 12 - h : northY(x) - 10 - h;
  return `<rect class="k2-fade" style="animation-delay:${step(0.66)}s" x="${x}" y="${y.toFixed(1)}" width="${w}" height="${h}" fill="${PALETTE.paper}" stroke="${PALETTE.ink}" stroke-width="0.35"/>`;
};
layers.streets += block(84, 14, 7, false) + block(142, 11, 6, false) + block(168, 9, 6, false) + block(64, 10, 6, false);
layers.streets += block(96, 12, 7, true) + block(188, 10, 6, true) + block(268, 13, 7, true) + block(352, 11, 6, true);

// 5. bridge (east = right): deck across the river, inclined pylon on the south bank, fan cables
const ax = 302, bx = 326;
const A = [ax, northY(ax) - 1], B = [bx, southY(bx) + 1];
const deckAt = (t) => [A[0] + (B[0] - A[0]) * t, A[1] + (B[1] - A[1]) * t];
const pylonTop = [340, 56];
layers.bridge += draw(`M${A[0]} ${A[1].toFixed(1)}L${B[0]} ${B[1].toFixed(1)}`, 0.72, 0.9);
layers.bridge += draw(`M${B[0]} ${B[1].toFixed(1)}L${pylonTop[0]} ${pylonTop[1]}`, 0.82, 1.1);
for (const t of [0, 0.3, 0.6, 0.9]) {
  const p = deckAt(t);
  layers.bridge += draw(`M${pylonTop[0]} ${pylonTop[1]}L${p[0].toFixed(1)} ${p[1].toFixed(1)}`, 0.94, 0.35, PALETTE.mid);
}
// a moored barge by the south quay
const bargeX = 356, bargeY = southY(bargeX) - 10;
layers.bridge += `<g class="k2-fade" style="animation-delay:${step(1.02)}s"><rect x="${bargeX}" y="${bargeY.toFixed(1)}" width="20" height="6" fill="${PALETTE.paper}" stroke="${PALETTE.ink}" stroke-width="0.5"/><rect x="${bargeX + 14}" y="${(bargeY - 4).toFixed(1)}" width="5" height="4" fill="${PALETTE.paper}" stroke="${PALETTE.ink}" stroke-width="0.5"/></g>`;

// 6. the studio marker: halo, accent dot, accent ring, leader up to the bold label
const mx = 118, my = northY(mx) - 13;
layers.marker += draw(`M${mx} ${(my - 11).toFixed(1)}L${mx} 52`, 0.88, 1.0);
layers.marker += `<circle class="k2-fade" style="animation-delay:${step(1.10)}s" cx="${mx}" cy="${my.toFixed(1)}" r="11" fill="${PALETTE.paper}" stroke="none"/>`;
layers.marker += `<circle class="k2-fade" style="animation-delay:${step(1.16)}s" cx="${mx}" cy="${my.toFixed(1)}" r="5" fill="${PALETTE.accent}" stroke="none"/>`;
layers.marker += `<circle class="k2-draw" pathLength="1" style="animation-delay:${step(1.22)}s" cx="${mx}" cy="${my.toFixed(1)}" r="9.5" fill="none" stroke="${PALETTE.accent}" stroke-width="0.9"/>`;

// 7. labels
layers.labels += T(16, 40, 'Studio Veld — Keilestraat 9F, M4H', 1.28, { size: 13, fill: PALETTE.ink, weight: 600 });
layers.labels += T(126, streetY(126) - 5, 'Keilestraat', 1.34, { size: 8.5, ls: 0.06 });
layers.labels += T(236, 64, 'MERWE-VIERHAVENS', 1.38, { size: 10, ls: 0.14 });
layers.labels += T(16, 92, 'Delfshaven', 1.42, { size: 10 });
layers.labels += T(204, midY(255) + 4, 'NIEUWE MAAS', 1.46, { size: 11, ls: 0.22 });
layers.labels += T(236, 226, 'Maashaven', 1.50, { size: 10 });

// 8. meta: north arrow in a circle + scale bar
layers.meta += `<circle class="k2-draw" pathLength="1" style="animation-delay:${step(1.30)}s" cx="416" cy="36" r="13" fill="none" stroke="${PALETTE.ink}" stroke-width="0.5"/>`;
layers.meta += draw('M416 44L416 25', 1.36, 0.9);
layers.meta += draw('M411 30L416 23L421 30', 1.40, 0.9);
layers.meta += T(410, 58, 'N', 1.44, { size: 11 });
layers.meta += `<g class="k2-fade" style="animation-delay:${step(1.48)}s"><rect x="16" y="224.5" width="30" height="3" fill="${PALETTE.ink}" stroke="none"/><rect x="16" y="224.5" width="60" height="3" fill="none" stroke="${PALETTE.ink}" stroke-width="0.5"/></g>`;
layers.meta += T(82, 228, '500 m', 1.52, { size: 8.5 });

const svg = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 ${W} ${H}" width="${W}" height="${H}" role="img" aria-labelledby="k2-title k2-desc" data-palette='${JSON.stringify(PALETTE)}' data-animate="true">
<title id="k2-title">Schematische kaart — studio aan de Keilestraat in M4H</title>
<desc id="k2-desc">Kaart van de Nieuwe Maas in Rotterdam: op de noordelijke oever Merwe-Vierhavens en Delfshaven, met de studio in oranje gemarkeerd aan de Keilestraat; in het oosten een tuibrug over de Maas; op de zuidoever de Maashaven; in het water enkele stroomlijnen, plus noordpijl en schaalbalk.</desc>
<style>
/* The hidden state lives only in the keyframes (fill-mode both): where animations do not run, the drawing shows complete. */
.k2-draw{stroke-dasharray:1 1.02;animation:k2-draw 0.90s ease-out both}
.k2-fade{animation:k2-fade 0.60s ease-out both}
@keyframes k2-draw{from{stroke-dashoffset:1.01}to{stroke-dashoffset:0}}
@keyframes k2-fade{from{opacity:0}to{opacity:1}}
@media (prefers-reduced-motion: reduce){.k2-draw,.k2-fade{animation:none;stroke-dasharray:none;stroke-dashoffset:0;opacity:1}}
</style>
<rect width="${W}" height="${H}" fill="${PALETTE.paper}"/>
<g font-family="'Helvetica Neue', Helvetica, Arial, 'Liberation Sans', sans-serif">
<g data-layer="banks">${layers.banks}</g>
<g data-layer="water">${layers.water}</g>
<g data-layer="quay">${layers.quay}</g>
<g data-layer="streets">${layers.streets}</g>
<g data-layer="bridge">${layers.bridge}</g>
<g data-layer="marker">${layers.marker}</g>
<g data-layer="labels">${layers.labels}</g>
<g data-layer="meta">${layers.meta}</g>
</g>
</svg>
`;

writeFileSync(out, svg);

// --- check: parse every d=/coordinate back out and confirm it stays on the canvas ---
const nums = [...svg.matchAll(/\sd="([^"]+)"/g)].flatMap((m) => m[1].match(/-?\d+\.?\d*/g).map(Number));
const xy = [...svg.matchAll(/\s(?:x|y|cx|cy)="(-?\d+\.?\d*)"/g)].map((m) => Number(m[1]));
const all = [...nums, ...xy];
const bad = all.filter((n) => Number.isNaN(n) || n < -12 || n > Math.max(W, H) + 12);
const badY = [...svg.matchAll(/\sd="([^"]+)"/g)].flatMap((m) => {
  const pairs = m[1].match(/-?\d+\.?\d*/g).map(Number);
  const out = [];
  for (let i = 1; i < pairs.length; i += 2) if (pairs[i] < -12 || pairs[i] > H + 12) out.push(pairs[i]);
  return out;
});
if (bad.length || badY.length) {
  console.error('FAIL: coordinates outside viewBox', { bad: bad.slice(0, 5), badY: badY.slice(0, 5) });
  process.exit(1);
}
console.log(`PASS ${out} — ${all.length} coordinates checked, all within the ${W}x${H} canvas (banks bleed to -8/448 by design)`);
