// 02 — Woonblok Maashaven, Kop van Zuid: one closed block of 24 homes on the quay,
// 25 m wide and four storeys high, orange entrance, barge on the water.
// The block is 25 m wide — a fact from the brief.
//   node scripts/02-woonblok-maashaven.gen.mjs images/02-woonblok-maashaven.svg
import * as A from '/Users/jasperfrumau/code/mistral-toolbox/skills/architectural-drawing/scripts/arch.mjs';
import { WIDTH, HEIGHT, DISPLAY_WIDTH, PALETTE, EXTENTS, SCALE } from './projects-shared.mjs';

const out = process.argv[2] || 'images/02-woonblok-maashaven.svg';
const E = EXTENTS.maashaven;

// Shared scale for all six cards, shown at card size with labels off.
const d = A.drawing({
  width: WIDTH, height: HEIGHT, extent: E, scale: SCALE,
  displayWidth: DISPLAY_WIDTH, labels: false, prefix: 'v2-', palette: PALETTE,
});

// ground, quay with water and a moored barge on the right
d.ground(E.x0, 27);
d.quay(27, 35.3, { level: -1.0, bottom: -1.8 });
d.barge(27.8, 34.3, -1.0, { rail: true });
d.groundShadow(2, 27, { depth: 1.0 });

// one closed block 2..27 = 25 m wide, four storeys with a parapet
d.mass(2, 27, 12);
d.flatRoof(2, 27, 12, { parapet: 0.6 });
d.plinth(2, 27, { h: 0.4 });
for (const lv of [3.5, 6.5, 9.5]) d.stringCourse(2, 27, lv);
d.downpipe(2.15, 12);
d.downpipe(26.85, 12);

// ground floor: window bays either side of the accent entrance
d.windowRow(2.8, 13.5, 0.5, 2.6, 4, { glass: true, reveal: 0.07, drip: true });
d.door(16, 2.0, 2.7, { type: 'double', accent: true, frame: true, handle: true });
d.windowRow(18.5, 26.2, 0.5, 2.6, 4, { glass: true, reveal: 0.07, drip: true });

// three upper floors, eight bays each
d.windowRow(2.8, 26.2, 3.5, 5.4, 8, { glass: true, reveal: 0.07, drip: true, head: true });
d.windowRow(2.8, 26.2, 6.5, 8.4, 8, { glass: true, reveal: 0.07, drip: true, head: true });
d.windowRow(2.8, 26.2, 9.5, 11.4, 8, { glass: true, reveal: 0.07, drip: true, head: true });

// three people in different poses, all on the ground in front of the block
d.figure(0.6, { pose: 'walk' });
d.figure(17.8, { pose: 'stand' });
d.figure(26.4, { pose: 'walk-left' });

A.write(out, d.svg({
  animate: true,
  title: 'Woonblok Maashaven — voorgevel aan de kade',
  desc: 'Gesloten woonblok van 25 meter breed met vier verdiepingen, een raster van ramen per verdieping, oranje dubbele entree op de begane grond, kade met water en een afgemeerd binnenvaartschip.',
}));
A.printReport(d);
