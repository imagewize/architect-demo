// 05 — Kadeblok Noordereiland: four gabled quay houses in a row on the Maas,
// one orange door, water with a barge on the right.
//   node scripts/05-kadeblok-noordereiland.gen.mjs images/05-kadeblok-noordereiland.svg
import * as A from '/Users/jasperfrumau/code/mistral-toolbox/skills/architectural-drawing/scripts/arch.mjs';

const out = process.argv[2] || 'images/05-kadeblok-noordereiland.svg';

// One shared scale and the page's palette for all six project drawings.
const SCALE = 11; // SVG units per metre, shared by every drawing in images/
const PALETTE = { ink: '#111111', paper: '#FFFFFF', tint: '#F7F7F8', mid: '#595959', accent: '#FF4F00' };

const d = A.drawing({
  width: 480, height: 300, scale: SCALE, prefix: 'v5-', palette: PALETTE,
  extent: { x0: -1.5, x1: 38, top: 11.8, bottom: -2.8 },
});

// quay with water and a barge on the right
d.ground(-1.5, 29.5);
d.quay(29.5, 38, { level: -1.2 });
d.tree(0.3, { h: 9, layer: 'back' });
d.barge(31, 37.3, -1.2);

// one shared block, four gabled houses with slightly different ridge heights
d.mass(2, 27, 6);
const houses = [[2, 8.25, 8.3], [8.25, 14.5, 8.9], [14.5, 20.75, 8.5], [20.75, 27, 9.1]];
for (const [x0, x1, ridge] of houses) d.gableRoof(x0, x1, 6, ridge, { overhang: 0 });
d.coursing(2, 27, 0, 6, { course: 0.5 });

// ground floor: two windows per house, the second house gets the accent door
d.window(3.6, 0.5, 1.1, 1.9);
d.window(6.6, 0.5, 1.1, 1.9);
d.window(9.6, 0.5, 1.1, 1.9);
d.door(11.375, 0.95, 2.15, { accent: true });
d.window(13.2, 0.5, 1.1, 1.9);
d.window(16.1, 0.5, 1.1, 1.9);
d.window(19.1, 0.5, 1.1, 1.9);
d.window(22.4, 0.5, 1.1, 1.9);
d.window(24.9, 0.5, 1.1, 1.9);

// upper floor: two windows per house
const centers = [5.125, 11.375, 17.625, 23.875];
for (const c of centers) {
  d.window(c - 1.5, 3.5, 1.1, 1.7);
  d.window(c + 1.5, 3.5, 1.1, 1.7);
}

d.figure(7.5);
d.figure(28.6);

d.dimension(2, 27, 10.9, '25,0 m');

A.write(out, d.svg({
  title: 'Kadeblok Noordereiland — voorgevel aan de kade',
  desc: 'Vier geschakelde panden met zadeldaken aan de kade, elk met twee ramen per verdieping en één oranje deur, met water en een afgemeerd binnenvaartschip aan de rechterkant.',
}));
A.printReport(d);
