// 02 — Woonblok Maashaven, Kop van Zuid: closed block of 24 homes on the quay,
// four storeys with a lower entrance wing, orange entrance, barge on the water.
// The block (entrance wing included) is 25 m wide — a fact from the brief.
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
d.barge(27.8, 34.3, -1.0);

// lower entrance wing and the four-storey block; wing 2..6 + block 6..27 = 25 m wide
d.mass(2, 6, 3.2);
d.flatRoof(2, 6, 3.2, { parapet: 0.4 });
d.mass(6, 27, 12);
d.flatRoof(6, 27, 12, { parapet: 0.6 });

// wing: two ground-floor windows
d.windowRow(2.5, 5.5, 0.5, 2.6, 2);

// block ground floor: window bays either side of the accent entrance
d.windowRow(6.8, 13.8, 0.5, 2.6, 3);
d.door(16, 2.0, 2.7, { type: 'double', accent: true });
d.windowRow(18.5, 26.3, 0.5, 2.6, 3);

// three upper floors, six bays each
d.windowRow(6.8, 26.3, 3.5, 5.4, 6);
d.windowRow(6.8, 26.3, 6.5, 8.4, 6);
d.windowRow(6.8, 26.3, 9.5, 11.4, 6);

// three people in different poses, all on the ground in front of the block
d.figure(0.6, { pose: 'walk' });
d.figure(17.8, { pose: 'stand' });
d.figure(26.4, { pose: 'walk-left' });

A.write(out, d.svg({
  title: 'Woonblok Maashaven — voorgevel aan de kade',
  desc: 'Gesloten woonblok van 25 meter breed met vier verdiepingen en een lagere entreugel, een raster van ramen per verdieping, oranje dubbele entree op de begane grond, kade met water en een afgemeerd binnenvaartschip.',
}));
A.printReport(d);
