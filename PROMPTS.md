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
| 6 | Convert to WordPress | `wp-frontend-builder` | Not run yet | – |

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

## 6. Convert to WordPress

Agent: `wp-frontend-builder`, with the `html-to-block-theme` skill. Run it once the design is
final.

```
Load html-to-block-theme and convert index.html into a block theme with one pattern per section.
```
