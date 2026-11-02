// Pakhuis Keilewerf (project 03, Merwe-Vierhavens) — isometric-mono diorama built with
// the illustration-isometric-mono kit. The former brick warehouse is the hero, standing
// on its quay edge; a moored barge, two bike racks, three planters and a
// container-turned-pavilion are the supporting objects.
//
//   node scripts/pakhuis-keilewerf.gen.mjs     (writes images/pakhuis-keilewerf.svg)
import fs from 'node:fs';
import path from 'node:path';
import { fileURLToPath } from 'node:url';
import * as I from '/Users/jasperfrumau/code/mistral-toolbox/skills/illustration-isometric-mono/scripts/iso.mjs';

const { OUT, PM, MT, MG, DG, VD, M, D, box, poly3, prismZ, circle, rectFoot,
  castShadow, glow, onTop, onLeft, onRight, quad, line, both, strokeP, hatch } = I;

const repo = path.join(path.dirname(fileURLToPath(import.meta.url)), '..');
const OUT_SVG = path.join(repo, 'images', 'pakhuis-keilewerf.svg');

I.init('pk-');
I.floorDefs();

// ---------------- layout (plan units; the platform spans -122..122) ----------------
const WH    = { x0: -104, x1: 20, y0: -96, y1: -62, wall: 42, ridge: 64 }; // hero: the warehouse
const QUAY  = { x0: -104, x1: 20, y0: -56, y1: -44, h: 3 };                // quay curb, bollards, lamp
const BARGE = { x0: -56, x1: 64, y0: -36, y1: -12, h: 7 };                 // moored barge
const CABIN = { x0: 40, x1: 62, y0: -34, y1: -14, z0: 7, z1: 20 };          // barge cabin
const CONT  = { x0: -14, x1: 18, y0: 0, y1: 28, h: 26, label: false };     // container pavilion
const RA    = { x0: -108, x1: -68, y0: 30, y1: 46 };                       // bike rack, left
const RB    = { x0: -72, x1: -32, y0: 82, y1: 98 };                        // bike rack, front left
const P1 = { x: -78, y: -12, s: 8 };   // planter at the quay's left front
const P2 = { x: 70, y: 66, s: 8 };     // planter, front right
const P3 = { x: 34, y: 94, s: 8 };     // planter, front
const BOLL = [-88, -48, 8];            // bollard x positions on the quay edge

// mooring cables: lie on the slab (z 1.1), climb into the cleats on the barge gunwale
const moor1 = [[-48, -46, 9.2], [-48, -46.3, 6], [-46.5, -41.5, 1.1], [-42, -37.5, 1.1], [-38.5, -34.8, 1.5], [-36, -35.4, 5.4], [-36, -35.1, 8.6]];
const moor2 = [[8, -46, 9.2], [8, -46.3, 6], [13, -40.5, 1.1], [22, -35.5, 1.1], [30, -33.8, 1.5], [33, -34.6, 5.4], [33, -34.3, 8.6]];

// ---------------- floor: slab, shadows (light from -x), glows, pools ----------------
I.platform();
castShadow(rectFoot(WH.x0, WH.x1, WH.y0, WH.y1), WH.ridge * 0.36, 0.62, 0.26);
castShadow(rectFoot(QUAY.x0, QUAY.x1, QUAY.y0, QUAY.y1), 9, 0.62, 0.2);
castShadow(rectFoot(BARGE.x0, BARGE.x1, BARGE.y0, BARGE.y1), 20, 0.62, 0.24);
castShadow(rectFoot(CONT.x0, CONT.x1, CONT.y0, CONT.y1), CONT.h, 0.62, 0.24);
castShadow(rectFoot(RA.x0, RA.x1, RA.y0, RA.y1), 12, 0.62, 0.22);
castShadow(rectFoot(RB.x0, RB.x1, RB.y0, RB.y1), 12, 0.62, 0.22);
for (const Pn of [P1, P2, P3]) castShadow(circle(Pn.x, Pn.y, Pn.s + 5, 8), 52, 0.62, 0.24);
// water sheen in front of the quay, hero spill on the quay, lit pavilion opening
glow(4, -24, 72, 19, PM, 0.5);
glow(-38, -28, 40, 14, MT, 0.3);
glow(-42, -42, 56, 20, MG, 0.46);
glow(2, 36, 30, 12, MG, 0.42);
// dark contact pools under the small objects
for (const Pn of [P1, P2, P3]) glow(Pn.x, Pn.y, Pn.s + 6, Pn.s + 6, DG, 0.32);
glow((CONT.x0 + CONT.x1) / 2, (CONT.y0 + CONT.y1) / 2, 26, 20, DG, 0.3);
glow((RA.x0 + RA.x1) / 2, (RA.y0 + RA.y1) / 2, 26, 12, DG, 0.3);
glow((RB.x0 + RB.x1) / 2, (RB.y0 + RB.y1) / 2, 26, 12, DG, 0.3);
// soft ripples on the water
I.shadowEls.push(`<path d="${D([[-44, -7, 0], [-26, -7, 0]], false)}" stroke="${MT}" stroke-width="0.9" stroke-opacity="0.55" stroke-linecap="round" fill="none"/>`);
I.shadowEls.push(`<path d="${D([[10, -4, 0], [32, -4, 0]], false)}" stroke="${MT}" stroke-width="0.9" stroke-opacity="0.5" stroke-linecap="round" fill="none"/>`);
I.shadowEls.push(`<path d="${D([[-64, -20, 0], [-57, -20, 0]], false)}" stroke="${PM}" stroke-width="0.9" stroke-opacity="0.6" stroke-linecap="round" fill="none"/>`);
I.cableShadow(moor1);
I.cableShadow(moor2);
I.flushFloor();

// ---------------- objects, back (small x + y) to front (large x + y) ----------------

// 1. the warehouse (hero): brick hall, gable roof, stepped gable, 12 loft windows,
//    4 studio openings and the X-braced loading door with its hoist beam
function warehouse() {
  const { x0, x1, y0, y1, wall, ridge } = WH, ym = (y0 + y1) / 2;
  box(x0, x1, y0, y1, 0, wall, M.mid);
  poly3([
    [[x0, y1, wall], [x1, y1, wall], [x1, ym, ridge], [x0, ym, ridge]],  // front roof slope
    [[x1, y0, wall], [x1, y1, wall], [x1, ym, ridge]],                    // gable end at +x
  ], M.dark);
  const F = onLeft(y1), R = onRight(x1);
  // plinth and pilasters on the quay face
  strokeP(line(F, [[x0, 3], [x1, 3]]), OUT, 0.5, ' stroke-opacity="0.6"');
  hatch(F, x0 + 6, x1 - 6, 3, 22, 12, 'w', DG, 0.45, ' stroke-opacity="0.5"');
  // twelve loft windows in the upper row
  const n = 12, w = 5, span = (x1 - 6) - (x0 + 6), gap = (span - n * w) / (n - 1);
  for (let i = 0; i < n; i++) {
    const wx = x0 + 6 + i * (w + gap);
    both(D(quad(F, wx, 26, wx + w, 33)), VD, OUT, 0.45);
    strokeP(line(F, [[wx - 0.6, 24.8], [wx + w + 0.6, 24.8]]), MG, 0.5);
  }
  // four ground-floor studios
  for (const sx of [x0 + 4, x0 + 26, x1 - 28, x1 - 15]) {
    both(D(quad(F, sx, 3, sx + 10, 17)), VD, OUT, 0.5);
    strokeP(line(F, [[sx + 5, 3], [sx + 5, 17]]) + line(F, [[sx, 10], [sx + 10, 10]]), DG, 0.6);
  }
  // loading door (laaddeur) with X braces
  both(D(quad(F, -50, 3, -34, 21)), VD, OUT, 0.55);
  strokeP(line(F, [[-50, 3], [-34, 21]]) + line(F, [[-34, 3], [-50, 21]]) + line(F, [[-42, 3], [-42, 21]]), DG, 0.7);
  // hoist beam above the door, with hook and block
  box(-54, -30, y1, y1 + 3, 24, 28, M.mid);
  strokeP(D([[-42, y1 + 1.5, 24], [-42, y1 + 1.5, 19.5]], false), OUT, 0.8);
  box(-43.6, -40.4, y1 + 0.7, y1 + 2.3, 18.2, 21.4, M.pale, { sw: 0.6 });
  // stepped gable (trapgevel) on the +x end
  for (let k = 1; k <= 5; k++) {
    const hw = 13 - 2.2 * k, z = wall + 3 * k;
    strokeP(line(R, [[ym - hw, z], [ym + hw, z]]), OUT, 0.5, ' stroke-opacity="0.75"');
    strokeP(line(R, [[ym - hw, z - 3], [ym - hw, z]]) + line(R, [[ym + hw, z - 3], [ym + hw, z]]), OUT, 0.5, ' stroke-opacity="0.75"');
  }
  both(D(quad(R, ym - 1.6, ridge - 7, ym + 1.6, ridge - 2)), MG, OUT, 0.5);
  // buttress ribs on the +x wall
  hatch(R, y0 + 3, y1 - 3, 3, wall - 3, 4.5, 'w', VD, 0.5, ' stroke-opacity="0.55"');
  // skylights in the roof slope (eave at y1, ridge at ym)
  const S = (u, t) => [u, y1 - t * (y1 - ym), wall + t * (ridge - wall)];
  for (const ux of [-88, -52, -16]) both(D([S(ux, 0.3), S(ux + 8, 0.3), S(ux + 8, 0.62), S(ux, 0.62)]), PM, OUT, 0.5);
}

// 2-3. quay edge: curb with paving joints, bollards, a lamp, and the gangway to the barge
function quay() {
  const { x0, x1, y0, y1, h } = QUAY;
  box(x0, x1, y0, y1, 0, h, M.pale);
  const T = onTop(h);
  strokeP(D(quad(T, x0 + 2, y0 + 2, x1 - 2, y1 - 2)), MG, 0.5, ' stroke-opacity="0.7"');
  hatch(T, x0 + 8, x1 - 8, y0 + 2.5, y1 - 2.5, 9, 'w', DG, 0.4, ' stroke-opacity="0.45"');
  for (const bx of BOLL) {
    prismZ(circle(bx, -46, 2.3, 8), h, h + 6, M.mid);
    both(D(circle(bx, -46, 1.2, 8).map(onTop(h + 6))), PM, OUT, 0.4);
  }
  box(-89.6, -86.4, -47.6, -45.4, h, 15, M.mid);
  box(-90.4, -85.6, -48.4, -44.6, 15, 18.6, M.mid);
  both(D(quad(onLeft(-44.6), -89.2, 16.2, -86.8, 17.8)), PM, OUT, 0.4);
  I.halo([-88, -46.5, 20], 16, MT, 0.5);
  box(-44, -36, -43.5, -36.5, h, 4.6, M.pale);
  strokeP(D([[-43, -40, 4.6], [-37, -40, 4.6]], false), DG, 0.5);
}

// barge: hull with ribs and waterline stripes, cargo crates, cabin, mast light, cleats
function barge() {
  const { x0, x1, y0, y1, h } = BARGE;
  box(x0, x1, y0, y1, 0, h, M.mid);
  const T = onTop(h), F = onLeft(y1), R = onRight(x1);
  strokeP(D(quad(T, x0 + 1.5, y0 + 1.5, x1 - 1.5, y1 - 1.5)), DG, 0.55);
  hatch(F, x0 + 4, x1 - 4, 1.6, h - 1.4, 3.4, 'w', VD, 0.5, ' stroke-opacity="0.6"');
  hatch(R, y0 + 3, y1 - 3, 1.6, h - 1.4, 3.4, 'w', DG, 0.5, ' stroke-opacity="0.6"');
  strokeP(line(F, [[x0 + 2, 2.4], [x1 - 2, 2.4]]), PM, 0.9);
  strokeP(line(F, [[x0 + 2, 3.6], [x1 - 2, 3.6]]), MT, 0.6);
  box(-34, -18, -30, -20, h, h + 6, M.pale);
  box(-32, -20, -18, -14, h, h + 4, M.pale);
  hatch(onTop(h + 6), -33, -19, -29, -21, 2.2, 'w', DG, 0.45);
  box(CABIN.x0, CABIN.x1, CABIN.y0, CABIN.y1, CABIN.z0, CABIN.z1, M.light);
  both(D(quad(onLeft(CABIN.y1), 44, 10.5, 56, 16.5)), VD, OUT, 0.45);
  strokeP(line(onLeft(CABIN.y1), [[50, 10.5], [50, 16.5]]), DG, 0.5);
  hatch(onRight(CABIN.x1), CABIN.y0 + 2, CABIN.y1 - 2, CABIN.z0 + 1.5, CABIN.z1 - 2, 2.6, 'w', DG, 0.45);
  box(58.5, 60.5, -27, -25, h, 19, M.mid);
  both(D(circle(59.5, -26, 1.6, 8).map(onTop(19))), PM, OUT, 0.45);
  I.halo([59.5, -26, 21], 13, MT, 0.5);
  box(-38, -34, -35.6, -33.6, h - 1.5, h + 1.6, M.pale, { sw: 0.6 });
  box(31, 35, -35.4, -33.4, h - 1.5, h + 1.6, M.pale, { sw: 0.6 });
}

// thin vertical disc (bike wheel): a prism whose axis runs along y
function vdisc(cx, y, cz, r, t, mat) {
  const n = 12, ring = [];
  for (let i = 0; i < n; i++) { const a = i / n * 2 * Math.PI; ring.push([cx + r * Math.cos(a), cz + r * Math.sin(a)]); }
  const faces = [ring.map(([u, w]) => [u, y + t / 2, w]), ring.map(([u, w]) => [u, y - t / 2, w])];
  for (let i = 0; i < n; i++) {
    const [u0, w0] = ring[i], [u1, w1] = ring[(i + 1) % n];
    faces.push([[u0, y - t / 2, w0], [u1, y - t / 2, w1], [u1, y + t / 2, w1], [u0, y + t / 2, w0]]);
  }
  poly3(faces, mat, { sw: 0.7 });
}
function bike(bx, by) {
  vdisc(bx - 6.5, by, 3.8, 3.8, 1.1, M.light);
  vdisc(bx + 6.5, by, 3.8, 3.8, 1.1, M.light);
  const F = (u, w) => [u, by, w];
  let f = '';
  f += line(F, [[bx - 6.5, 3.8], [bx, 4.6], [bx + 6.5, 3.8]]);
  f += line(F, [[bx, 4.6], [bx - 3.2, 9.2], [bx - 6.5, 3.8]]);
  f += line(F, [[bx, 4.6], [bx + 3.6, 9.4], [bx + 6.5, 3.8]]);
  f += line(F, [[bx - 3.2, 9.2], [bx + 3.6, 9.4]]);
  f += line(F, [[bx + 3.6, 9.4], [bx + 5.6, 10.8]]);
  f += line(F, [[bx - 4.9, 10.3], [bx - 2.4, 10.3]]);
  strokeP(f, OUT, 0.8);
  both(D(circle(bx, 3.8, 1, 6).map(p => F(p[0], p[1]))), DG, OUT, 0.4);
}
function bikeRack(Rk) {
  const { x0, x1, y0, y1 } = Rk, ym = (y0 + y1) / 2;
  box(x0, x1, y0, y0 + 2.4, 0, 2.4, M.mid);
  box(x0, x1, y1 - 2.4, y1, 0, 2.4, M.mid);
  for (const bx of [x0 + 5, (x0 + x1) / 2, x1 - 5]) box(bx - 1.1, bx + 1.1, y0, y1, 0, 3.2, M.mid);
  for (const bx of [x0 + 11, (x0 + x1) / 2, x1 - 11]) bike(bx, ym);
}

// container-turned-pavilion: shipping container with an open studio front and awning
function pavilion() {
  const { x0, x1, y0, y1, h } = CONT;
  I.container(CONT);
  const F = onLeft(y1);
  both(D(quad(F, -8, 3, 12, 19)), VD, OUT, 0.55);
  strokeP(line(F, [[-5, 6.5], [9, 6.5]]) + line(F, [[-5, 6.5], [-5, 16]]), MG, 0.9);
  box(-11, 15, y1, y1 + 3.5, 20.5, 22.5, M.pale);
  strokeP(D([[-9, y1 + 3.5, 20.5], [-9, y1, 16.5]], false) + D([[13, y1 + 3.5, 20.5], [13, y1, 16.5]], false), OUT, 0.6);
  for (const px of [x0 + 4, (x0 + x1) / 2, x1 - 4]) strokeP(D([[px, y0 + 2, h], [px, y0 + 2, h + 4]], false), OUT, 0.6);
  strokeP(D([[x0 + 2, y0 + 2, h + 4], [x1 - 2, y0 + 2, h + 4]], false), OUT, 0.6);
  box(x1 + 6, x1 + 15, y0 + 3, y0 + 12, 0, 5, M.pale);
}

warehouse();               // footprint centre sum -120
quay();                    // -92
I.plant(P1);               // -90
bikeRack(RA);              // -50
barge();                   // -20
I.cable(moor1);
I.cable(moor2);
pavilion();                // 16
bikeRack(RB);              // 38
I.plant(P3);               // 128
I.plant(P2);               // 136

fs.mkdirSync(path.dirname(OUT_SVG), { recursive: true });
I.writeSVG(OUT_SVG, 'Pakhuis Keilewerf — former warehouse on the quay in Merwe-Vierhavens, twelve loft homes and four ground-floor studios');
