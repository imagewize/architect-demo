// One size, one scale and one palette for the six project-card drawings in images/.
// Every generator imports the extents and SCALE from here, so the set stays at one
// shared scale (A.sharedScale) and the cards compare the buildings at true size.
import * as A from '/Users/jasperfrumau/code/mistral-toolbox/skills/architectural-drawing/scripts/arch.mjs';

export const WIDTH = 480;
export const HEIGHT = 300;
// The card image in the three-column projects grid renders at about 330 px wide.
export const DISPLAY_WIDTH = 330;
// The page's own colours (theme.json presets), as hex because the SVGs are used via <img>.
export const PALETTE = { ink: '#111111', paper: '#FFFFFF', tint: '#F7F7F8', mid: '#595959', accent: '#FF4F00' };

// One extent per project, in metres, tightened to 1–3 m of context beyond the
// outermost tree or boat and 1–2 m above the highest point.
export const EXTENTS = {
  villa:         { x0: -3.9,  x1: 29.5,  top: 8.8,  bottom: -1.8 },
  maashaven:     { x0: -1.15, x1: 35.4,  top: 14.2, bottom: -2.8 },
  keilewerf:     { x0: 0.45,  x1: 37.2,  top: 17.6, bottom: -2.8 },
  hoeksteen:     { x0: -2.57, x1: 34.4,  top: 20.6, bottom: -1.8 },
  noordereiland: { x0: -1.15, x1: 35.9,  top: 10.9, bottom: -2.8 },
  bergweg:       { x0: -2.45, x1: 33.25, top: 12.1, bottom: -1.8 },
};

// One scale for all six drawings: the largest extent fits 480x300, the others keep
// their true size relative to it.
export const SCALE = A.sharedScale(Object.values(EXTENTS), { width: WIDTH, height: HEIGHT });
