// 06 — De Bergweg, Bergwegkwartier: former school with a sawtooth roof, a long
// window strip, a chimney on a roof tooth and an orange entrance.
//   node scripts/06-de-bergweg.gen.mjs images/06-de-bergweg.svg
import * as A from '/Users/jasperfrumau/code/mistral-toolbox/skills/architectural-drawing/scripts/arch.mjs';
import { WIDTH, HEIGHT, DISPLAY_WIDTH, PALETTE, EXTENTS, SCALE } from './projects-shared.mjs';

const out = process.argv[2] || 'images/06-de-bergweg.svg';
const E = EXTENTS.bergweg;

// Shared scale for all six cards, shown at card size with labels off.
const d = A.drawing({
  width: WIDTH, height: HEIGHT, extent: E, scale: SCALE,
  displayWidth: DISPLAY_WIDTH, labels: false, prefix: 'v6-', palette: PALETTE,
});

d.ground(E.x0, E.x1);
// trees beside the school, clear of the building corners
d.tree(1.5, { h: 7.5 });
d.tree(29, { h: 8.5 });

// school block with a sawtooth roof of five teeth and a chimney on a tooth peak
d.mass(6, 26, 6.5);
d.sawtoothRoof(6, 26, 6.5, 2.0, 5);
d.chimney(22, 8.5, { w: 0.7, h: 1.6 });

// long window strip across the facade
d.windowRow(6.7, 19.3, 1.0, 4.7, 7, { transom: true });

// accent entrance and a side window
d.door(22.8, 1.9, 2.6, { type: 'double', accent: true });
d.window(24.8, 1.0, 1.4, 3.2, { transom: true });

// two people in different poses
d.figure(4.3, { pose: 'stand-left' });
d.figure(24.3, { pose: 'walk' });

A.write(out, d.svg({
  title: 'De Bergweg — voorgevel',
  desc: 'Voormalige school: langgerekt blok met zaagdak van vijf tanden, schoorsteen op een tand, een lange band van zeven ramen met bovendorpel en een oranje dubbele entree. Twee bomen en twee schaalfiguren.',
}));
A.printReport(d);
