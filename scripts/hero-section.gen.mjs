// Hero — section through the existing warehouse (the studio's own pakhuis in M4H):
// gable profile, cut gable walls and inserted floor slabs, a stair, two people and
// one dimension line, drawn with the kit in metres.
//   node scripts/hero-section.gen.mjs images/hero-section.svg
import * as A from '/Users/jasperfrumau/code/mistral-toolbox/skills/architectural-drawing/scripts/arch.mjs';

const out = process.argv[2] || 'images/hero-section.svg';

// The page's colours as hex, because the SVG is used through <img>.
const PALETTE = { ink: '#111111', paper: '#FFFFFF', tint: '#F7F7F8', mid: '#595959', accent: '#FF4F00' };

// The hero figure sits in the 5fr column of a 7fr/5fr grid inside an 84rem container
// with a 4rem gap: (84rem - 4rem) * 5/12 ≈ 533 px at desktop width.
const HERO_COLUMN = 533;

// Existing warehouse shell: 16 m wide, 9 m to the eaves, ridge at 13 m.
const WAREHOUSE = { x0: 0, x1: 16, eave: 9, ridge: 13 };
const FLOORS = [3.2, 6.4]; // two inserted residential floors

const d = A.drawing({
  width: 560, height: 400,
  extent: { x0: -2, x1: 18, top: 16.4, bottom: -2 },
  displayWidth: HERO_COLUMN, prefix: 'hero-', palette: PALETTE,
});

// ground line with earth hatch
d.ground(-2, 18);

// the existing shell in section: solid cut gable walls and the gable roof profile
d.cut(WAREHOUSE.x0, 0, WAREHOUSE.x0 + 0.6, WAREHOUSE.eave);
d.cut(WAREHOUSE.x1 - 0.6, 0, WAREHOUSE.x1, WAREHOUSE.eave);
d.gableRoof(WAREHOUSE.x0, WAREHOUSE.x1, WAREHOUSE.eave, WAREHOUSE.ridge, { overhang: 0 });

// two inserted floor slabs, cut solid between the walls
for (const lv of FLOORS) d.slab(WAREHOUSE.x0 + 0.6, WAREHOUSE.x1 - 0.6, lv, { t: 0.35 });

// the stair from the ground floor up to the first inserted floor
d.stair(2.0, 0, 6.4, FLOORS[0]);

// two people for scale, one of them the accent figure
d.figure(8.5, { pose: 'stand' });
d.figure(12.5, { pose: 'walk-left', accent: true });

// one dimension line across the warehouse, extension lines down to the ridge
d.dimension(WAREHOUSE.x0, WAREHOUSE.x1, 14.8, '16,0 m', { from: WAREHOUSE.ridge });

A.write(out, d.svg({
  title: 'Doorsnede bestaand pakhuis',
  desc: 'Doorsnede door een bestaand pakhuis van 16 bij 13 meter: zadeldakprofiel, twee gesneden kopwanden in zwart poche, twee ingevoegde vloerplaten, een trap van de begane grond naar de eerste verdieping, een maatvoering van 16,0 m en twee schaalfiguren waarvan één oranje.',
}));
A.printReport(d);
