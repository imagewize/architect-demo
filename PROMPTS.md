# Prompts

Every prompt used in this demo, in the order they ran, with the agent, the outcome and the commit.
Copy a prompt as-is to repeat a run, or adapt it for a new client.

Start each run in this folder:

```bash
cd ~/code/architect-demo
vibe --agent <agent>
```

| # | Step | Agent | Outcome | Commit |
|---|------|-------|---------|--------|
| 1 | Build from brief | `wp-frontend-builder` | First build: Swiss style, Dutch copy, six SVG project drawings | `5833e10` |
| 2 | Apply review notes 1–4 | `wp-frontend-builder` | Skylight, map label, about layout, phone header fixed | `2596de1` |
| 3 | Review the built page | `ux-designer` | Not run yet | – |
| 4 | Isometric drawing test | `wp-frontend-builder` | Clean isometric solids, but objects at the wrong scale; see notes under 4 | `7c06572` (branch `test/isometric`) |
| 5 | Project drawings with the kit | `wp-frontend-builder` | Six kit elevations at one scale, all checks pass; too small in the cards, see notes under 5 | this commit |
| 6 | Redraw with shared scale, card options and a hero section | `wp-frontend-builder` | All checks pass, frames fit, hero is a section; but buildings were resized to fit the scale, see notes under 6 | this commit |
| 7 | True sizes, 2:1 cards and a richer hero section | `wp-frontend-builder` | True sizes back, 2:1 cards at one scale, hero with openings and skylight; two small fixes left, see notes under 7 | this commit |
| 8 | Hero tree, caption wording, one Maashaven block | `wp-frontend-builder` | All three fixed, every check passes with no warnings | this commit |
| 9 | Convert to WordPress | `wp-frontend-builder` | Not run yet | – |

## 1. Build from brief

Agent: `wp-frontend-builder`

```
Build the homepage for a small architecture firm as one self-contained index.html with embedded CSS.

Brief:
- Firm: Studio Veld Architecten, Rotterdam. 12 people, founded 2009.
- Work: residential (villas, housing blocks) and adaptive reuse (turning old warehouses and churches into homes and offices).
- Audience: private clients and housing corporations who are choosing an architect.
- Main action: "Plan a conversation" (a contact or intake request).
- Tone: calm, precise, confident. Editorial, not salesy.

This is a homepage, not a landing page. Sections: header with nav, hero, selected projects (6), approach / how we work (4 steps), about the studio, a short quote from a client, contact block, footer.

Minimal questions: state your assumptions at the top of your reply, then build.

Design: load frontend-design and pick one aesthetic anchor that suits architecture (restrained, lots of whitespace, strong typography, a grid you can feel). Lock the tokens as --wp--preset--* custom properties. No stock-photo look: use inline SVG line drawings or CSS compositions for the project visuals so the file needs no images. Mobile-first, accessible, real Dutch place names and project copy. Run the no-ai-design-slop gate before you hand off.
```

Why it is written this way:
- **A concrete brief** with a name, an audience and a main action keeps the copy specific.
- **"A homepage, not a landing page"** stops the agent from narrowing the page to one conversion goal.
- **"Minimal questions"** makes the agent state its assumptions and build, instead of asking.
- **SVG or CSS visuals** keep the file self-contained, with no placeholders and no hard-coded background images.

## 2. Apply review notes

Agent: `wp-frontend-builder`. The notes were the numbered "Review notes" list in `README.md`.
From now on, review notes go in `REVIEW.md` (prompt 3).

```
Read index.html and the "Review notes" list in README.md. Apply review points 1–4 to index.html. Don't edit README.md. When done, list per point what you changed.
```

Keep each run to a few points, then compare and commit:

```bash
git diff                                  # compare with the last version
git commit -am "design: <what changed>"   # keep this run
git restore index.html                    # throw this run away
```

## 3. Review the built page

Agent: `ux-designer`, with the `html-page-review` skill. It writes numbered notes to `REVIEW.md` and
does not edit the page.

```
Load html-page-review and review index.html against the brief in README.md.
```

Then apply the notes with `wp-frontend-builder`:

```
Read index.html and REVIEW.md. Apply review notes 1–3 to index.html. Don't edit REVIEW.md. When done, list per note what you changed.
```

## 4. Isometric drawing test

Agent: `wp-frontend-builder`, with the `illustration-isometric-mono` skill. This tests whether a
kit-based drawing skill makes better SVG than hand-written coordinates. It runs on a separate
branch and does not change `index.html`. The green palette is the skill's own and is kept on
purpose for the test.

```bash
git switch -c test/isometric
```

```
Load illustration-isometric-mono. Draw one isometric diorama of project 03, Pakhuis Keilewerf: a former brick warehouse in Merwe-Vierhavens converted into twelve loft homes and four ground-floor studios. Make the warehouse the hero, with the quay edge, a moored barge, bike racks, planters and a container-turned-pavilion as supporting objects. Keep the style's green palette for this test. Build it with a generator script using iso.mjs, save it as images/pakhuis-keilewerf.svg, run lint.mjs and ramp-check.mjs, render a PNG, and do not change index.html.
```

Result on branch `test/isometric` (`images/pakhuis-keilewerf.png`):
- **Better than hand-written SVG:** true isometric solids, shading by face and clean outlines, with
  no crooked geometry. The warehouse reads as a building, with a gable roof, skylights, rows of
  windows and a loading door.
- **Wrong scale:** the kit is built for objects on a desk. Its planters stand as tall as the
  warehouse walls, the bike racks read as springs, and the barge is a low box on the slab with no
  water.
- **Unbalanced layout:** everything sits toward the back, and the front-left of the slab is empty.
- **Checks pass anyway:** lint and colour checks pass, and the agent cannot view images, so it did
  not see any of this.
- **Shell syntax:** the agent chained commands with `&&` and a shell variable, which made Vibe ask
  for approval, although the skill says to run one command at a time.

Conclusion: a drawing kit is the right approach, but this one is the wrong kit. An architectural kit
at building scale (water, quays, trees, people, consistent proportions) is the next step.

## 5. Project drawings with the kit

Agent: `wp-frontend-builder`, with the `architectural-drawing` skill (mistral-toolbox PR #33). It
replaces the six hand-drawn project drawings with elevations built by the `arch.mjs` kit in metres,
all at one scale, so a villa and a warehouse compare at their true size. This follows prompt 4,
which showed that a drawing kit works but that the isometric kit's objects are at desk scale.

```
Load architectural-drawing. Replace the six project drawings in index.html with elevations drawn with arch.mjs: one generator per project in scripts/, all six at one shared scale and 480x300, using the page's ink and orange as the palette. Save them in images/ and reference them with <img> and alt text. Run each generator and check.mjs until they PASS, render PNGs, and list per project what you drew.
```

Why it is written this way:
- **One generator per project** keeps each drawing reproducible: change the layout table and rerun.
- **One shared scale** makes the set comparable. The kit reports the scale of each drawing.
- **The page's palette** keeps the drawings in the site's ink-and-orange style.
- **`<img>` with alt text** keeps `index.html` small and the drawings accessible.
- **"Until they PASS"** makes the agent fix every error the kit and `check.mjs` report.

Result: six generators in `scripts/`, six SVGs and 2x PNGs in `images/`, all at 11 units/m with the
page palette. Every generator and `check.mjs` print `PASS`.
- **Much better than hand-drawn:** real buildings at true proportions (villa, housing block,
  warehouse with stepped gable, church with tower, quay houses, school with sawtooth roof), people
  and trees for scale, one orange accent each.
- **Too small in the cards:** a 480x300 drawing shows at about 330 px wide and the building fills
  half of it. People are a few pixels tall, and the dimension labels shrink to about 4 px.
- **Frame mismatch:** the card frame is taller than the 16:10 drawing, which leaves white bands.
- **Kit gaps:** trees cover building corners (06), the chimney is a floating rectangle (no chimney
  part), people look like pins, and dimension lines have no extension lines.

These led to kit fixes in mistral-toolbox PR #33 and to prompt 6.

## 6. Redraw with shared scale, card options and a hero section

Agent: `wp-frontend-builder`, with `architectural-drawing` 1.1.0 (mistral-toolbox PR #33, commit
`aa81883`). It fixes what prompt 5 showed: drawings too small in the cards, unreadable labels, white
bands in the frames, trees over corners and a floating chimney. It also redraws the hero, which is
still the hand-drawn section from the first build.

```
Load architectural-drawing. Redraw the six project drawings and the hero drawing with arch.mjs:
- Tighten each project's extent to 1–3 m of context beyond the outermost tree or boat, then compute one scale for all six with A.sharedScale and pass it to every project drawing.
- The cards show the drawings at about 330 px wide: pass displayWidth: 330 and labels: false to the six project drawings, and fix every warning about people or labels being too small.
- Keep trees clear of building corners, use chimney() for De Bergweg's chimney, and vary the people's poses.
- Make the card image frames in index.html match the drawings' 480x300 (16:10) aspect ratio, so no white bands appear.
- Redraw the hero figure as a section through the existing warehouse with the kit: the gable profile, cut walls and floor slabs (cut, slab), the stair, two people and one dimension line. Size it for the hero column and set displayWidth to the column width. Save it as images/hero-section.svg and keep the Fig. 01 caption in line with what the drawing shows.
Run each generator and check.mjs until they PASS without warnings, render PNGs, and list per drawing what changed.
```

Why it is written this way:
- **`sharedScale` after tightening the extents:** the largest building sets the scale, so tighter
  extents make every drawing bigger in its card while the buildings keep their true relative size.
- **`displayWidth` and `labels: false`:** the kit then warns about anything too small at card
  size, so the agent finds the problem itself instead of passing every check.
- **Frames at 16:10:** the image fills its frame instead of floating in white.
- **The hero as a section:** the section parts (cut walls, slabs, stair) are what the kit adds over
  hand drawing, and the hero is the most visible drawing on the page.

Result: seven generators and drawings, one shared scale of 12.1 units/m for the cards
(`scripts/projects-shared.mjs`), every generator and `check.mjs` `PASS` with no warnings. Card
frames are 16:10 and the drawings fill them. The hero is `images/hero-section.svg`, a section with
cut walls, two floor slabs, a stair and two people.
- **Better:** people readable at card size, no white bands, trees clear of corners, a real
  chimney, varied poses, and a hero that matches the cards.
- **Buildings resized to fit the scale:** De Bergweg 30 → 20 m, the church nave 20 → 18 m, the
  Maashaven block 25 → 22 m, the Noordereiland block 25 → 24 m. The widest drawing sets the shared
  scale, so the agent shrank buildings to make every card bigger. Building sizes are project facts
  and must not change.
- **People placed in the water** three times; the agent found and moved them itself. The kit
  should catch this.
- **The villa card looks empty:** at one true scale the villa is honestly small. The drawings are
  wide and low, so a 2:1 frame fits them better than 16:10.
- **The hero is bare** compared with the hand-drawn one: the kit cannot yet draw a window or door
  in a cut wall, or a skylight.

These led to kit 1.2 in mistral-toolbox PR #33 and to prompt 7.

## 7. True sizes, 2:1 cards and a richer hero section

Agent: `wp-frontend-builder`, with `architectural-drawing` 1.2.0 (mistral-toolbox PR #33, commit
`e5cf281`). It restores the building sizes that prompt 6 shrank, switches the cards to a 2:1
drawing so the wide, low elevations fill them, and gives the hero section the openings and
skylight the kit can now draw.

```
Load architectural-drawing. Update the drawings with arch.mjs:
- Restore the true building sizes: De Bergweg 30 m wide, the De Hoeksteen nave 20 m, the Woonblok Maashaven block 25 m, the Kadeblok Noordereiland block 25 m. Building sizes are facts from the brief; never change them to fit the scale.
- Redraw the six project drawings at 480x240 (2:1). Trim the surroundings so each extent stays tight, then recompute one scale for all six with A.sharedScale. Keep displayWidth: 330 and labels: false, and fix every warning.
- Change the card image frames in index.html to aspect-ratio: 480 / 240.
- Redraw the hero section using examples/pakhuis-section.gen.mjs in the skill as the reference: a cut roof with a skylight, windows in the cut walls on every floor, a door, the two inserted floors, the stair, and people on more than one floor. Keep it at 560x400 with displayWidth: 533 and labels on, and update the Fig. 01 caption to match the drawing.
Run each generator and check.mjs until they PASS without warnings, render PNGs, and list per drawing what changed.
```

Why it is written this way:
- **True sizes stated in the prompt:** the kit cannot know a building's real size, so the prompt
  names the four that prompt 6 changed, and repeats the rule that sizes are facts.
- **2:1 at one scale:** wide, low elevations fill a 2:1 card, so every building gets bigger
  without breaking the true relative sizes.
- **The section example as reference:** it shows the new section parts in use, so the agent
  copies a working pattern instead of guessing the API.

Result: all seven generators and `check.mjs` `PASS` with no warnings. The six cards are 480x240 at
one shared scale of 11.96 units/m, and the frames are 2:1.
- **True sizes restored:** De Bergweg 30 m, the De Hoeksteen nave 20 m, the Kadeblok
  Noordereiland block 25 m. Woonblok Maashaven is 25 m overall, but as a 21 m block with a 4 m
  entrance wing, not one 25 m block.
- **Cards:** the 2:1 drawings fill their frames better. Every building is larger than in run 6
  while keeping its true relative size, and nobody stands in the water.
- **Hero:** a section with a cut roof and skylight, windows in the cut walls on every floor, a
  door, two inserted floors, a stair and people on three levels. It follows the skill's section
  example closely.
- **Caption wording:** Fig. 01 calls the skylight an "oranje dakkapel"; a dakkapel is a dormer,
  and the drawing shows a dakraam. It also says the people stand "op twee verdiepingen", but they
  stand on three levels.
- **Hero tree:** the tree behind the building crosses the right-hand wall.

## 8. Hero tree, caption wording, one Maashaven block

Agent: `wp-frontend-builder`, with `architectural-drawing` 1.2.1 (mistral-toolbox PR #33, commit
`b2c449d`). A small change request for the three points left after prompt 7. Version 1.2.1 warns
when a tree crosses a cut wall in a section, so the hero generator now reports the tree itself.

```
Read index.html. Fix three things:
1. Rerun scripts/hero-section.gen.mjs and fix its warning: move the tree clear of the cut wall.
2. In the Fig. 01 caption, replace "oranje dakkapel" with "oranje dakraam" and "op twee verdiepingen" with "op drie niveaus".
3. Draw Woonblok Maashaven as one 25 m block without the entrance wing, and recompute the shared scale.
Run the generators and check.mjs until they PASS without warnings, and list what changed.
```

Why it is written this way:
- **A numbered list** lets the agent report per point, and keeps the run small and easy to check.
- **The kit's own warning** names the hero problem, so the prompt only has to say "fix its warning".
- **Exact caption wording:** a dakkapel is a dormer and the drawing shows a dakraam (skylight);
  the people stand on three levels. Giving the replacement text avoids another wrong guess.
- **"Recompute the shared scale"**: a wider Maashaven drawing may set the scale for all six cards.

Result: all seven generators and `check.mjs` `PASS` with no warnings.
- **Hero:** the tree moved to x=18.8, clear of the cut wall; the kit's new warning is gone.
- **Caption:** "oranje dakraam" and "op drie niveaus".
- **Maashaven:** one 25 m block, eight bays on the upper floors. The shared scale stays 11.96
  units/m, since De Bergweg's extent is still the widest. The other five card generators are
  unchanged.
- **Small leftovers:** the Maashaven ground-floor windows are two different widths left and right
  of the door, and don't line up with the bays above. The agent also ran one shell loop
  (`for n in …`), although the builder's instructions ask for one command per call.

## 9. Convert to WordPress

Agent: `wp-frontend-builder`, with the `html-to-block-theme` skill. Run it once the design is
final.

```
Load html-to-block-theme and convert index.html into a block theme with one pattern per section.
```
