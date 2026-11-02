// 05 — Kadeblok Noordereiland: four gabled quay houses in a row on the Maas,
// one orange door, water with a barge on the right.
//   node scripts/05-kadeblok-noordereiland.gen.mjs images/05-kadeblok-noordereiland.svg
import * as A from '/Users/jasperfrumau/code/mistral-toolbox/skills/architectural-drawing/scripts/arch.mjs';
import { WIDTH, HEIGHT, DISPLAY_WIDTH, PALETTE, EXTENTS, SCALE } from './projects-shared.mjs';

const out = process.argv[2] || 'images/05-kadeblok-noordereiland.svg';
const E = EXTENTS.noordereiland;

// Shared scale for all six cards, shown at card size with labels off.
const d = A.drawing({
  width: WIDTH, height: HEIGHT, extent: E, scale: SCALE,
  displayWidth: DISPLAY_WIDTH, labels: false, prefix: 'v5-', palette: PALETTE,
});

// ground, quay with water and a barge on the right
d.ground(E.x0, 27);
d.quay(27, 35.9, { level: -1.2 });
d.barge(27.8, 34.3, -1.2);

// one shared block, four gabled houses with slightly different ridge heights
d.mass(2, 26, 6);
const houses = [[2, 8, 8.3], [8, 14, 8.9], [14, 20, 8.5], [20, 26, 9.1]];
for (const [x0, x1, ridge] of houses) d.gableRoof(x0, x1, 6, ridge, { overhang: 0 });
d.coursing(2, 26, 0, 6, { course: 0.5 });

// ground floor: two windows per house, the second house gets the accent door
d.window(3.6, 0.5, 1.1, 1.9);
d.window(6.6, 0.5, 1.1, 1.9);
d.window(9.6, 0.5, 1.1, 1.9);
d.door(11, 0.95, 2.15, { accent: true });
d.window(13.2, 0.5, 1.1, 1.9);
d.window(16.1, 0.5, 1.1, 1.9);
d.window(19.1, 0.5, 1.1, 1.9);
d.window(22.4, 0.5, 1.1, 1.9);
d.window(24.9, 0.5, 1.1, 1.9);

// upper floor: two windows per house
const centers = [5, 11, 17, 23];
for (const c of centers) {
  d.window(c - 1.5, 3.5, 1.1, 1.7);
  d.window(c + 1.5, 3.5, 1.1, 1.7);
}

// two people in different poses, one on each side of the block
d.figure(0.6, { pose: 'walk' });
d.figure(25.8, { pose: 'stand-left' });

A.write(out, d.svg({
  title: 'Kadeblok Noordereiland — voorgevel aan de kade',
  desc: 'Vier geschakelde panden met zadeldaken aan de kade, elk met twee ramen per verdieping en één oranje deur, met water en een afgemeerd binnenvaartschip aan de rechterkant.',
}));
A.printReport(d);
