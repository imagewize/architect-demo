// 02 — Woonblok Maashaven, Kop van Zuid: closed block of 24 homes on the quay,
// four storeys, orange entrance, barge on the water.
//   node scripts/02-woonblok-maashaven.gen.mjs images/02-woonblok-maashaven.svg
import * as A from '/Users/jasperfrumau/code/mistral-toolbox/skills/architectural-drawing/scripts/arch.mjs';

const out = process.argv[2] || 'images/02-woonblok-maashaven.svg';

// One shared scale and the page's palette for all six project drawings.
const SCALE = 11; // SVG units per metre, shared by every drawing in images/
const PALETTE = { ink: '#111111', paper: '#FFFFFF', tint: '#F7F7F8', mid: '#595959', accent: '#FF4F00' };

const d = A.drawing({
  width: 480, height: 300, scale: SCALE, prefix: 'v2-', palette: PALETTE,
  extent: { x0: -1.5, x1: 38, top: 15.6, bottom: -2.8 },
});

// quay with water and a moored barge on the right
d.ground(-1.5, 30);
d.quay(30, 38, { level: -1.2 });
d.barge(31.5, 37.5, -1.2);
d.tree(1.0, { h: 10, layer: 'back' });

// the block: 25 m wide, four storeys of 3.0 m, flat roof with parapet
d.mass(2, 27, 12);
d.flatRoof(2, 27, 12, { parapet: 0.6 });

// ground floor: window bays either side of the accent entrance
d.windowRow(2.8, 12.6, 0.5, 2.6, 3);
d.windowRow(19.4, 26.2, 0.5, 2.6, 3);
d.door(16, 2.0, 2.7, { type: 'double', accent: true });

// three upper floors, six bays each
d.windowRow(2.8, 26.2, 3.5, 5.4, 6);
d.windowRow(2.8, 26.2, 6.5, 8.4, 6);
d.windowRow(2.8, 26.2, 9.5, 11.4, 6);

d.figure(17.8);
d.figure(28.6);

d.dimension(2, 27, 14.6, '25,0 m');

A.write(out, d.svg({
  title: 'Woonblok Maashaven — voorgevel aan de kade',
  desc: 'Gesloten woonblok van vier verdiepingen met een raster van ramen per verdieping, oranje dubbele entree op de begane grond, kade met water en een afgemeerde binnenvaartschip.',
}));
A.printReport(d);
