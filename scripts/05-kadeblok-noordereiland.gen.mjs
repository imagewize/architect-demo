// 05 — Kadeblok Noordereiland: four gabled quay houses in a row on the Maas,
// one orange door, water with a barge on the right.
// The block is 25 m wide — a fact from the brief.
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
d.quay(27, 35.3, { level: -1.0, bottom: -1.8 });
d.barge(27.8, 34.3, -1.0, { rail: true });
d.groundShadow(2, 27, { depth: 1.0 });

// one shared block 2..27 = 25 m wide, four gabled houses with slightly different ridge heights
d.mass(2, 27, 6);
const houses = [[2, 8.25, 8.3], [8.25, 14.5, 8.9], [14.5, 20.75, 8.5], [20.75, 27, 9.1]];
for (const [x0, x1, ridge] of houses) d.gableRoof(x0, x1, 6, ridge, { overhang: 0 });
d.plinth(2, 27, { h: 0.4 });
d.coursing(2, 27, 0.4, 6, { course: 0.5, joints: true, joint: 0.5 });
d.stringCourse(2, 27, 3.2);
for (const px of [8.1, 14.35, 20.6]) d.downpipe(px, 6);

// ground floor: two windows per house, the second house gets the accent door
const groundOpts = { glass: true, reveal: 0.07, drip: true };
d.window(3.6, 0.5, 1.1, 1.9, groundOpts);
d.window(6.6, 0.5, 1.1, 1.9, groundOpts);
d.window(9.6, 0.5, 1.1, 1.9, groundOpts);
d.door(11, 0.95, 2.15, { accent: true, frame: true, handle: true });
d.window(13.2, 0.5, 1.1, 1.9, groundOpts);
d.window(16.1, 0.5, 1.1, 1.9, groundOpts);
d.window(19.1, 0.5, 1.1, 1.9, groundOpts);
d.window(22.4, 0.5, 1.1, 1.9, groundOpts);
d.window(24.9, 0.5, 1.1, 1.9, groundOpts);

// upper floor: two windows per house
const upperOpts = { glass: true, reveal: 0.07, drip: true, head: true };
const centers = [5, 11, 17, 23];
for (const c of centers) {
  d.window(c - 1.5, 3.5, 1.1, 1.7, upperOpts);
  d.window(c + 1.5, 3.5, 1.1, 1.7, upperOpts);
}

// two people in different poses, one on each side of the block
d.figure(0.6, { pose: 'walk' });
d.figure(26.2, { pose: 'stand-left' });

A.write(out, d.svg({
  animate: true,
  title: 'Kadeblok Noordereiland — voorgevel aan de kade',
  desc: 'Vier geschakelde panden in een blok van 25 meter breed met zadeldaken aan de kade, elk met twee ramen per verdieping en één oranje deur, met water en een afgemeerd binnenvaartschip aan de rechterkant.',
}));
A.printReport(d);
