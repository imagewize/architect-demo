// 04 — De Hoeksteen, Delfshaven: former church, nave with gable roof, tower with
// spire, three tall windows and an orange entrance portal.
//   node scripts/04-de-hoeksteen.gen.mjs images/04-de-hoeksteen.svg
import * as A from '/Users/jasperfrumau/code/mistral-toolbox/skills/architectural-drawing/scripts/arch.mjs';

const out = process.argv[2] || 'images/04-de-hoeksteen.svg';

// One shared scale and the page's palette for all six project drawings.
const SCALE = 11; // SVG units per metre, shared by every drawing in images/
const PALETTE = { ink: '#111111', paper: '#FFFFFF', tint: '#F7F7F8', mid: '#595959', accent: '#FF4F00' };

const d = A.drawing({
  width: 480, height: 300, scale: SCALE, prefix: 'v4-', palette: PALETTE,
  extent: { x0: -1, x1: 36, top: 20.6, bottom: -1.8 },
});

d.ground(-1, 36);
d.tree(1.0, { h: 10 });
d.tree(33.5, { h: 8 });

// nave with gable roof, tower with spire (seen end-on)
d.mass(4, 24, 7.5);
d.gableRoof(4, 24, 7.5, 11.2);
d.mass(24, 30, 14);
d.gableRoof(24, 30, 14, 18.6);

// three tall nave windows and the accent entrance portal
d.window(7.2, 0.8, 1.4, 4.6, { transom: true });
d.window(16.8, 0.8, 1.4, 4.6, { transom: true });
d.window(21.2, 0.8, 1.4, 4.6, { transom: true });
d.door(12, 1.6, 2.6, { type: 'double', accent: true });

// lancet window in the tower
d.window(27, 9.6, 1.2, 2.2);

d.figure(13.4);
d.figure(31.5);

d.dimension(4, 24, 12.8, '20,0 m');

A.write(out, d.svg({
  title: 'De Hoeksteen — voorgevel',
  desc: 'Voormalige kerk: schip met zadeldak, toren met spits, drie hoge smalle vensters in het schip, een venster in de toren en een oranje ingangsportaal. Twee bomen en twee schaalfiguren.',
}));
A.printReport(d);
