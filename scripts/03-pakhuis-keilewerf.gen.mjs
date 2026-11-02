// 03 — Pakhuis Keilewerf, M4H: warehouse with a stepped gable, two rows of small
// windows, an orange loading door with hoist beam, plus a sawtooth studio wing on the quay.
//   node scripts/03-pakhuis-keilewerf.gen.mjs images/03-pakhuis-keilewerf.svg
import * as A from '/Users/jasperfrumau/code/mistral-toolbox/skills/architectural-drawing/scripts/arch.mjs';

const out = process.argv[2] || 'images/03-pakhuis-keilewerf.svg';

// One shared scale and the page's palette for all six project drawings.
const SCALE = 11; // SVG units per metre, shared by every drawing in images/
const PALETTE = { ink: '#111111', paper: '#FFFFFF', tint: '#F7F7F8', mid: '#595959', accent: '#FF4F00' };

const d = A.drawing({
  width: 480, height: 300, scale: SCALE, prefix: 'v3-', palette: PALETTE,
  extent: { x0: -0.5, x1: 36.5, top: 18.6, bottom: -2.8 },
});

// quay, poplar and barge behind the warehouse
d.ground(-0.5, 29);
d.quay(29, 36.5, { level: -1.2 });
d.tree(28.2, { h: 15, type: 'poplar', layer: 'back' });
d.barge(30.5, 36, -1.2);

// the warehouse: brick block with a stepped gable
d.mass(4, 20, 11);
d.stepGable(4, 20, 11, 15.5, { steps: 4 });
d.coursing(4, 20, 0, 11);

// two rows of small loft windows
d.windowRow(4.7, 19.3, 8.7, 10.5, 5);
d.windowRow(4.7, 19.3, 5.6, 7.4, 5);

// ground floor: shopfront windows and the accent loading door with hoist beam
d.window(7, 0.6, 2.4, 2.9, { transom: true });
d.window(17, 0.6, 2.4, 2.9, { transom: true });
d.door(12, 3.0, 3.4, { type: 'loading', accent: true });
d.hoist(12, 4.2);
d.window(12, 12.0, 1.2, 1.4, { mullion: false }); // attic window in the gable

// former shed beside it, now studios with tall glazing
d.mass(20, 26, 6, { fill: 'tint' });
d.sawtoothRoof(20, 26, 6, 1.9, 3);
d.windowRow(20.5, 25.5, 0.5, 4.6, 3, { transom: true });

d.figure(2.0);
d.figure(22.8);
d.figure(31);

d.dimension(4, 20, 17.4, '16,0 m');

A.write(out, d.svg({
  title: 'Pakhuis Keilewerf — voorgevel aan de kade',
  desc: 'Pakhuis met trapgevel, metselverband, twee rijen kleine ramen, oranje laaddeur met hijsbalk, aanbouw met zaagdak en studiobeglazing, kade met water en een binnenvaartschip.',
}));
A.printReport(d);
