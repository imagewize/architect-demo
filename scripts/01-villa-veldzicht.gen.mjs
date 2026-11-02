// 01 — Villa Veldzicht, Kralingen: modern villa with a glazed pavilion under a
// cantilevered roof plate and a set-back upper volume.
//   node scripts/01-villa-veldzicht.gen.mjs images/01-villa-veldzicht.svg
import * as A from '/Users/jasperfrumau/code/mistral-toolbox/skills/architectural-drawing/scripts/arch.mjs';
import { WIDTH, HEIGHT, DISPLAY_WIDTH, PALETTE, EXTENTS, SCALE } from './projects-shared.mjs';

const out = process.argv[2] || 'images/01-villa-veldzicht.svg';
const E = EXTENTS.villa;

// Shared scale for all six cards, shown at card size with labels off.
const d = A.drawing({
  width: WIDTH, height: HEIGHT, extent: E, scale: SCALE,
  displayWidth: DISPLAY_WIDTH, labels: false, prefix: 'v1-', palette: PALETTE,
});

// ground, soft shadows, and a tree behind the villa
d.ground(E.x0, E.x1);
d.tree(0.5, { h: 8.5, layer: 'back', shadow: true });
d.groundShadow(5, 23, { depth: 0.9 });

// glazed ground-floor pavilion, set-back upper volume, cantilevered roof plate + parapet
d.mass(5, 23, 3.4);
d.mass(8, 20, 2.9, { base: 3.4 });
d.mass(5, 22.5, 0.3, { base: 6.3, name: 'roof plate' });
d.flatRoof(8, 20, 6.6, { parapet: 0.55 });
// the cantilevered plate casts a shadow band on the set-back volume below it
d.castShadow(8, 20, 6.3, { depth: 0.7 });
d.downpipe(22.9, 6.3);

// ground floor: four glazing bays with a glazing grid, and the accent front door
d.windowRow(5.7, 18.6, 0.4, 3.0, 4, { glass: true, bars: [2, 2], reveal: 0.08, drip: true });
d.door(20.6, 1.0, 2.4, { accent: true, frame: true, handle: true });

// upper floor: three windows in the set-back volume
d.windowRow(8.7, 19.3, 4.2, 6.0, 3, { glass: true, reveal: 0.08, drip: true, head: true });

// context in front: one tree clear of the corners, two people in different poses
d.tree(25.5, { h: 7, shade: true, shadow: true });
d.figure(22.8, { pose: 'walk' });
d.figure(4.5, { pose: 'stand-left' });

A.write(out, d.svg({
  animate: true,
  title: 'Villa Veldzicht — voorgevel',
  desc: 'Moderne villa: glazen paviljoen op de begane grond onder een uitkragende dakplaat, verschoven bovenbouw met drie ramen, oranje voordeur, twee bomen en twee schaalfiguren.',
}));
A.printReport(d);
