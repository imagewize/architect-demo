// Hero — section through the existing warehouse (the studio's own pakhuis in M4H),
// following examples/pakhuis-section.gen.mjs in the architectural-drawing skill:
// a cut roof with an orange skylight, windows in the cut walls on every floor, a door,
// the two inserted floor slabs, a stair, and people on more than one floor.
//   node scripts/hero-section.gen.mjs images/hero-section.svg
import * as A from '/Users/jasperfrumau/code/mistral-toolbox/skills/architectural-drawing/scripts/arch.mjs';

const out = process.argv[2] || 'images/hero-section.svg';

// The page's colours as hex, because the SVG is used through <img>.
const PALETTE = { ink: '#111111', paper: '#FFFFFF', tint: '#F7F7F8', mid: '#595959', accent: '#FF4F00' };

// The hero figure sits in the 5fr column of a 7fr/5fr grid inside an 84rem container
// with a 4rem gap: (84rem - 4rem) * 5/12 ≈ 533 px at desktop width.
const HERO_COLUMN = 533;

// Existing warehouse shell: 16 m wide, 9 m to the eaves, ridge at 13 m.
const WAREHOUSE = { x0: 0, x1: 16, wall: 0.6, eave: 9, ridge: 13, roof: 0.35 };
const FLOORS = [3.2, 6.4]; // two inserted residential floors
const EXTENT = { x0: -2.5, x1: 20.5, top: 15.6, bottom: -1.6 };

const d = A.drawing({
  width: 560, height: 400,
  extent: EXTENT,
  displayWidth: HERO_COLUMN, prefix: 'hero-', palette: PALETTE,
});

// a tree behind the warehouse, clear of the cut wall (crown starts beyond x=16)
d.tree(18.8, { h: 8, layer: 'back' });
d.ground(EXTENT.x0, EXTENT.x1);

// the existing shell in section: solid cut gable walls and the cut roof with a skylight
d.cut(WAREHOUSE.x0, 0, WAREHOUSE.x0 + WAREHOUSE.wall, WAREHOUSE.eave);
d.cut(WAREHOUSE.x1 - WAREHOUSE.wall, 0, WAREHOUSE.x1, WAREHOUSE.eave);
const roof = d.gableRoof(WAREHOUSE.x0, WAREHOUSE.x1, WAREHOUSE.eave, WAREHOUSE.ridge, { cut: WAREHOUSE.roof, overhang: 0.3 });
d.roofWindow(roof, { side: 'left', at: 0.5, len: 1.8, accent: true });

// two inserted floor slabs, cut solid between the walls
for (const lv of FLOORS) d.slab(WAREHOUSE.x0 + WAREHOUSE.wall, WAREHOUSE.x1 - WAREHOUSE.wall, lv, { t: 0.3 });

// openings in the cut walls, after the cuts: a window on every floor, a door on the right
for (const lv of [0, ...FLOORS]) {
  d.cutOpening(WAREHOUSE.x0, WAREHOUSE.x0 + WAREHOUSE.wall, lv + 0.9, lv + 2.5);
  if (lv > 0) d.cutOpening(WAREHOUSE.x1 - WAREHOUSE.wall, WAREHOUSE.x1, lv + 0.9, lv + 2.5);
}
d.cutOpening(WAREHOUSE.x1 - WAREHOUSE.wall, WAREHOUSE.x1, 0, 2.4, { glass: false });

// the stair from the ground floor up to the first inserted floor
d.stair(2.2, 0, 6.6, FLOORS[0]);

// people on more than one floor
d.figure(9.5);
d.figure(12.4, { base: FLOORS[0], pose: 'walk-left' });
d.figure(4.8, { base: FLOORS[1] });

// one dimension line across the warehouse, extension lines down to the ridge
d.dimension(WAREHOUSE.x0, WAREHOUSE.x1, 14.8, '16,0 m', { from: WAREHOUSE.ridge });

A.write(out, d.svg({
  animate: true,
  title: 'Doorsnede bestaand pakhuis',
  desc: 'Doorsnede door een bestaand pakhuis van 16 bij 13 meter: zadeldak in zwart poche met oranje dakkapel, gesneden kopwanden met een raam op elke verdieping en een deur, twee ingevoegde vloerplaten, een trap van de begane grond naar de eerste verdieping, een maatvoering van 16,0 m en drie schaalfiguren op twee verdiepingen.',
}));
A.printReport(d);
