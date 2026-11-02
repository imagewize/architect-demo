// 01 — Villa Veldzicht, Kralingen: modern villa with a glazed pavilion under a
// cantilevered roof plate and a set-back upper volume.
//   node scripts/01-villa-veldzicht.gen.mjs images/01-villa-veldzicht.svg
import * as A from '/Users/jasperfrumau/code/mistral-toolbox/skills/architectural-drawing/scripts/arch.mjs';

const out = process.argv[2] || 'images/01-villa-veldzicht.svg';

// One shared scale and the page's palette for all six project drawings.
const SCALE = 11; // SVG units per metre, shared by every drawing in images/
const PALETTE = { ink: '#111111', paper: '#FFFFFF', tint: '#F7F7F8', mid: '#595959', accent: '#FF4F00' };

const d = A.drawing({
  width: 480, height: 300, scale: SCALE, prefix: 'v1-', palette: PALETTE,
  extent: { x0: -1.5, x1: 29, top: 9.6, bottom: -1.8 },
});

// ground and a tree behind the villa
d.ground(-1.5, 29);
d.tree(1.2, { h: 8.5, layer: 'back' });

// glazed ground-floor pavilion, set-back upper volume, cantilevered roof plate + parapet
d.mass(5, 23, 3.4);
d.mass(8, 20, 2.9, { base: 3.4 });
d.mass(5, 22.5, 0.3, { base: 6.3, name: 'roof plate' });
d.flatRoof(8, 20, 6.6, { parapet: 0.55 });

// ground floor: four glazing bays and the accent front door
d.windowRow(5.7, 18.6, 0.4, 3.0, 4, { transom: true });
d.door(20.6, 1.0, 2.4, { accent: true });

// upper floor: three windows in the set-back volume
d.windowRow(8.7, 19.3, 4.2, 6.0, 3);

// context in front: one tree, two people for scale
d.tree(26.3, { h: 7 });
d.figure(22.8);
d.figure(3.8);

d.dimension(5, 23, 8.9, '18,0 m');

A.write(out, d.svg({
  title: 'Villa Veldzicht — voorgevel',
  desc: 'Moderne villa: glazen paviljoen op de begane grond onder een uitkragende dakplaat, verschoven bovenbouw met drie ramen, oranje voordeur, twee bomen en twee schaalfiguren.',
}));
A.printReport(d);
