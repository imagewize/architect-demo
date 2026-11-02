// 06 — De Bergweg, Bergwegkwartier: former school with a sawtooth roof, a long
// window strip, chimney and an orange entrance.
//   node scripts/06-de-bergweg.gen.mjs images/06-de-bergweg.svg
import * as A from '/Users/jasperfrumau/code/mistral-toolbox/skills/architectural-drawing/scripts/arch.mjs';

const out = process.argv[2] || 'images/06-de-bergweg.svg';

// One shared scale and the page's palette for all six project drawings.
const SCALE = 11; // SVG units per metre, shared by every drawing in images/
const PALETTE = { ink: '#111111', paper: '#FFFFFF', tint: '#F7F7F8', mid: '#595959', accent: '#FF4F00' };

const d = A.drawing({
  width: 480, height: 300, scale: SCALE, prefix: 'v6-', palette: PALETTE,
  extent: { x0: -1.5, x1: 38, top: 12.6, bottom: -1.8 },
});

d.ground(-1.5, 38);
d.tree(0.8, { h: 9 });
d.tree(34.8, { h: 10 });

// school block with sawtooth roof and a chimney on the last tooth
d.mass(3, 33, 6.5);
d.sawtoothRoof(3, 33, 6.5, 2.2, 6);
d.mass(30.2, 31.0, 2.4, { base: 7.2, name: 'chimney' });

// long window strip across the facade
d.windowRow(3.8, 26.2, 1.0, 4.7, 8, { transom: true });

// accent entrance and a side window
d.door(29.3, 1.9, 2.6, { type: 'double', accent: true });
d.window(31.9, 1.0, 1.6, 3.2, { transom: true });

d.figure(27.2);
d.figure(2.6);

d.dimension(3, 33, 11.4, '30,0 m');

A.write(out, d.svg({
  title: 'De Bergweg — voorgevel',
  desc: 'Voormalige school: langgerekt blok met zaagdak van zes tanden, schoorsteen, een lange band van acht ramen met bovendorpel en een oranje dubbele entree. Twee bomen en twee schaalfiguren.',
}));
A.printReport(d);
