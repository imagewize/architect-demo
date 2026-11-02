// One size, one scale and one palette for the six project-card drawings in images/.
// Every generator imports the extents and SCALE from here, so the set stays at one
// shared scale (A.sharedScale) and the cards compare the buildings at true size.
import * as A from '/Users/jasperfrumau/code/mistral-toolbox/skills/architectural-drawing/scripts/arch.mjs';

export const WIDTH = 480;
export const HEIGHT = 240; // 2:1, matching the card image frames in index.html
export const DISPLAY_WIDTH = 330;
// The page's own colours (theme.json presets), as hex because the SVGs are used via <img>.
export const PALETTE = { ink: '#111111', paper: '#FFFFFF', tint: '#F7F7F8', mid: '#595959', accent: '#FF4F00' };

// One extent per project, in metres, tightened to 1–3 m of context beyond the
// outermost tree or boat and 1–2 m above the highest point. Building widths are
// facts from the brief (Bergweg 30 m, Hoeksteen nave 20 m, Maashaven block 25 m,
// Noordereiland block 25 m) and are never resized to fit the scale.
export const EXTENTS = {
  villa:         { x0: -2.3,  x1: 28.2,  top: 9.7,  bottom: -1.6 },
  maashaven:     { x0: -1.2,  x1: 35.3,  top: 14.2, bottom: -2.0 },
  keilewerf:     { x0: -0.5,  x1: 35.8,  top: 15.5, bottom: -2.0 },
  hoeksteen:     { x0: -0.9,  x1: 35.8,  top: 15.7, bottom: -1.6 },
  noordereiland: { x0: -1.2,  x1: 35.3,  top: 10.7, bottom: -2.0 },
  bergweg:       { x0: -0.4,  x1: 37.4,  top: 11.8, bottom: -1.6 },
};

// One scale for all six drawings: the largest extent fits 480x240, the others keep
// their true size relative to it.
export const SCALE = A.sharedScale(Object.values(EXTENTS), { width: WIDTH, height: HEIGHT });
