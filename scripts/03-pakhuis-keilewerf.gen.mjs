// 03 — Pakhuis Keilewerf, M4H: warehouse with a stepped gable, two rows of small
// windows, an orange loading door with hoist beam, plus a sawtooth studio wing on the quay.
//   node scripts/03-pakhuis-keilewerf.gen.mjs images/03-pakhuis-keilewerf.svg
import * as A from '/Users/jasperfrumau/code/mistral-toolbox/skills/architectural-drawing/scripts/arch.mjs';
import { WIDTH, HEIGHT, DISPLAY_WIDTH, PALETTE, EXTENTS, SCALE } from './projects-shared.mjs';

const out = process.argv[2] || 'images/03-pakhuis-keilewerf.svg';
const E = EXTENTS.keilewerf;

// Shared scale for all six cards, shown at card size with labels off.
const d = A.drawing({
  width: WIDTH, height: HEIGHT, extent: E, scale: SCALE,
  displayWidth: DISPLAY_WIDTH, labels: false, prefix: 'v3-', palette: PALETTE,
});

// ground, quay with water, a poplar behind the shed and a moored barge
d.ground(E.x0, 29);
d.quay(29, 35.8, { level: -1.0, bottom: -1.8 });
d.tree(27.2, { h: 10, type: 'poplar', layer: 'back' });
d.barge(29.8, 34.8, -1.0);

// the warehouse: brick block with a stepped gable
d.mass(4, 20, 10.5);
d.stepGable(4, 20, 10.5, 14.0, { steps: 4 });
d.coursing(4, 20, 0, 10.5);

// two rows of small loft windows
d.windowRow(4.7, 19.3, 7.9, 9.7, 5);
d.windowRow(4.7, 19.3, 4.9, 6.7, 5);

// ground floor: shopfront windows and the accent loading door with hoist beam
d.window(7, 0.6, 2.4, 2.9, { transom: true });
d.window(17, 0.6, 2.4, 2.9, { transom: true });
d.door(12, 3.0, 3.4, { type: 'loading', accent: true });
d.hoist(12, 4.3);
d.window(12, 11.5, 1.2, 1.4); // attic window in the gable

// former shed beside it, now studios with tall glazing
d.mass(20, 26, 6, { fill: 'tint' });
d.sawtoothRoof(20, 26, 6, 1.9, 3);
d.windowRow(20.5, 25.5, 0.5, 4.6, 3, { transom: true });

// three people in different poses, all on the ground
d.figure(2.5, { pose: 'walk' });
d.figure(13.8, { pose: 'stand-left' });
d.figure(22.8, { pose: 'stand' });

A.write(out, d.svg({
  title: 'Pakhuis Keilewerf — voorgevel aan de kade',
  desc: 'Pakhuis met trapgevel, metselverband, twee rijen kleine ramen, oranje laaddeur met hijsbalk, aanbouw met zaagdak en studiobeglazing, kade met water en een binnenvaartschip.',
}));
A.printReport(d);
