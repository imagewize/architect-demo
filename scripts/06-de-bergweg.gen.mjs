// 06 — De Bergweg, Bergwegkwartier: former school with a sawtooth roof, a long
// window strip, a chimney on a roof tooth and an orange entrance.
// The school block is 30 m wide — a fact from the brief.
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
d.groundShadow(4, 34, { depth: 1.0 });
// a front tree beside the school, clear of the building corner, and one behind it
d.tree(2.0, { h: 7, shade: true, shadow: true });
d.tree(35.0, { h: 7.5, layer: 'back', shadow: true });

// school block 4..34 = 30 m wide, sawtooth roof of five teeth, chimney on a tooth peak
d.mass(4, 34, 6.5);
d.sawtoothRoof(4, 34, 6.5, 2.0, 5);
d.chimney(28, 8.5, { w: 0.7, h: 1.6, pot: true });
d.plinth(4, 34, { h: 0.5 });
d.downpipe(4.15, 6.5);
d.downpipe(33.85, 6.5);

// long window strip across the facade, left of the entrance
d.windowRow(4.7, 22.6, 1.0, 4.7, 7, { glass: true, bars: [2, 2], reveal: 0.07, drip: true });

// accent entrance and a short window strip right of it
d.door(25, 1.9, 2.6, { type: 'double', accent: true, frame: true, handle: true });
d.windowRow(27.6, 33.3, 1.0, 4.7, 3, { glass: true, bars: [2, 2], reveal: 0.07, drip: true });

// two people in different poses
d.figure(6.8, { pose: 'walk' });
d.figure(31.8, { pose: 'stand-left' });

A.write(out, d.svg({
  animate: true,
  title: 'De Bergweg — voorgevel',
  desc: 'Voormalige school: blok van 30 meter breed met zaagdak van vijf tanden, schoorsteen op een tand, een lange band van ramen met bovendorpel aan weerszijden van een oranje dubbele entree. Twee bomen en twee schaalfiguren.',
}));
A.printReport(d);
