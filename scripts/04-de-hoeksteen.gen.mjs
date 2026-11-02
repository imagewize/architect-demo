// 04 — De Hoeksteen, Delfshaven: former church, nave with gable roof, tower with
// spire, three tall windows and an orange entrance portal.
//   node scripts/04-de-hoeksteen.gen.mjs images/04-de-hoeksteen.svg
import * as A from '/Users/jasperfrumau/code/mistral-toolbox/skills/architectural-drawing/scripts/arch.mjs';
import { WIDTH, HEIGHT, DISPLAY_WIDTH, PALETTE, EXTENTS, SCALE } from './projects-shared.mjs';

const out = process.argv[2] || 'images/04-de-hoeksteen.svg';
const E = EXTENTS.hoeksteen;

// Shared scale for all six cards, shown at card size with labels off.
const d = A.drawing({
  width: WIDTH, height: HEIGHT, extent: E, scale: SCALE,
  displayWidth: DISPLAY_WIDTH, labels: false, prefix: 'v4-', palette: PALETTE,
});

d.ground(E.x0, E.x1);
// trees beside the church, clear of the nave and tower corners
d.tree(1.2, { h: 7 });
d.tree(30.0, { h: 6.5 });

// nave with gable roof, tower with spire (seen end-on)
d.mass(5, 23, 7.5);
d.gableRoof(5, 23, 7.5, 11.2);
d.mass(23, 28, 14);
d.gableRoof(23, 28, 14, 18.6);

// three tall nave windows and the accent entrance portal
d.window(8, 0.8, 1.4, 4.6, { transom: true });
d.window(14, 0.8, 1.4, 4.6, { transom: true });
d.window(20, 0.8, 1.4, 4.6, { transom: true });
d.door(11, 1.6, 2.6, { type: 'double', accent: true });

// lancet window in the tower
d.window(25.5, 9.6, 1.2, 2.2);

// two people in different poses
d.figure(12.8, { pose: 'walk' });
d.figure(32.6, { pose: 'stand-left' });

A.write(out, d.svg({
  title: 'De Hoeksteen — voorgevel',
  desc: 'Voormalige kerk: schip met zadeldak, toren met spits, drie hoge smalle vensters in het schip, een venster in de toren en een oranje ingangsportaal. Twee bomen en twee schaalfiguren.',
}));
A.printReport(d);
