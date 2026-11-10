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
| 9 | Draw-on animation for all seven drawings | `wp-frontend-builder` | All seven animate; needed a second session, see notes under 9 | this commit |
| 10 | Convert to a block theme | `wp-frontend-builder` | Not run yet | – |
| 11 | Assemble on Aviendha + Aludra | `wp-frontend-builder` | Not run yet | – |

## 1. Build from brief

Agent: `wp-frontend-builder`

```
Build the homepage for a small architecture firm as one self-contained index.html with embedded CSS.

Brief:
- Firm: Bureau Kadewerk, Rotterdam (renamed from Studio Veld Architecten on Nov 2, 2026; the first runs used the old name). 12 people, founded 2009.
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

## 9. Draw-on animation for all seven drawings

Agent: `wp-frontend-builder`, with `architectural-drawing` 1.3.0 (mistral-toolbox PR #36). The first
build's hand-drawn SVGs were drawn on screen by page CSS. That stopped when the drawings moved to
`<img>` files in prompt 6, because page CSS cannot reach inside an image. Version 1.3.0 puts the
animation inside the SVG file itself.

```
Load architectural-drawing. Turn on the draw-on animation for all seven drawings: pass animate: true to d.svg() in every generator in scripts/ (the six cards and hero-section). Keep the drawings as <img> files. Remove any leftover page CSS for the old inline-SVG animation if it is still in index.html. Run each generator and check.mjs until they PASS without warnings, render the PNGs with the skill's render command, and list what changed.
```

Why it is written this way:
- **One option per generator:** the kit does the work (draw order, fades, reduced motion), so the
  change is small and the same in all seven files.
- **Keep `<img>`:** it keeps `index.html` small and is what the WordPress conversion needs. The
  cards start drawing when they load, shortly before they scroll into view.
- **The skill's render command:** it waits for the animation to finish, so the PNG previews show
  the complete drawing.

To see the animation, open `index.html` in a real browser. Headless screenshots freeze animated
images at the first frame unless they use `--force-prefers-reduced-motion`.

Result: `animate: true` in all seven generators, all seven SVGs animated, every generator and
`check.mjs` `PASS` with no warnings. Scales, extents and sizes are unchanged, and the PNG previews
are byte-identical to the static ones, so the animation ends on exactly the finished drawing.
- **In Chrome:** the hero draws itself on load: walls and slabs first, then the stair, the people
  and the dimension line, complete after about 3 seconds. The cards had already finished when
  scrolled to, because lazy loading fetches them a screen or two early, as expected with `<img>`.
- **First session:** the first attempt only fixed the hero's `alt` text ("dakraam", "drie
  niveaus", left over from prompt 8) and did not apply the animation. A second session did.
- **Render command:** the agent found `--virtual-time-budget` alone unreliable for rendering an
  animated SVG file (one hero PNG came out blank) and added `--force-prefers-reduced-motion`. The
  skill's render command should include that flag too.

## 10. Convert to a block theme

Agent: `wp-frontend-builder`, with the `html-to-block-theme` skill. Run it once the design is
final. This path makes a self-contained theme; prompt 11 builds the same page on Aviendha +
Aludra instead.

```
Load html-to-block-theme. Convert index.html into a full-site-editing block theme in a new theme/ folder in this repository: one registered pattern per <section> (hero, projecten, werkwijze, studio, quote, contact), plus header and footer template parts and a page template that stacks the patterns.
- Generate theme.json from the page's locked --wp--preset--* tokens: paper #FFFFFF, ink #111111, accent #FF4F00, muted #595959, line #E3E3E3, mist #F7F7F8, the Helvetica stack as the sans font family, spacing scale 10-70. Reuse native slugs where they exist and keep the rest as custom presets under the same names.
- Register the patterns as PHP files in the theme's patterns/ directory (auto-registration needs the pattern header comment). Copy the seven SVGs from images/ into theme/assets/img/ and reference them with get_theme_file_uri(), keeping the existing alt texts.
- Replace the mailto: form with core form blocks as the WordPress stand-in; keep all Dutch copy verbatim.
- The draw-on animation lives inside the SVG files, so <img> keeps it for free.
- Validate before handing off: php -l on every PHP file, the theme activates without fatal errors, and every pattern parses in the editor with no unsupported-block warnings. List per pattern which section it came from and whatever did not map 1:1 to blocks.
```

Why it is written this way:
- **theme/ in this repo** keeps the demo in one place; a real client theme would be forked from Aviendha as in prompt 11.
- **PHP pattern files + get_theme_file_uri():** auto-registered patterns must be .php files, and block markup cannot resolve theme-relative image URLs on its own.
- **Tokens as presets** is what html-to-block-theme expects; the page already locks them as `--wp--preset--*`, so theme.json is a direct mapping.
- **Core form blocks for the mailto:** a theme cannot send mail by itself.

## 11. Assemble the homepage on Aviendha + Aludra

Agent: `wp-frontend-builder`. The alternative to prompt 10: instead of converting the HTML into a
theme, compose the same page from `aludra/*` blocks on a fork of the Aviendha starter theme
(`~/code/aviendha` ships no patterns of its own and expects content blocks from the Aludra
plugin, `~/code/aludra`). Aludra is a plugin, not a theme — WordPress.org theme review forbids
themes registering their own blocks, which is why the split exists.

```
Create theme-kadewerk/ in this repository as a fork of ~/code/aviendha for Bureau Kadewerk, and build the homepage there as one pattern composed from aludra/* blocks:
- Fork and rename: copy ~/code/aviendha to theme-kadewerk/ and rename every aviendha identifier to kadewerk — follow the html-to-block-theme skill's references/forking-a-starter-theme.md (CSS class prefixes and keyframes, PHP namespace and aviendha_* function prefix, text domain, phpcs prefix, composer/npm names, logo filenames; CHANGELOG.md, README.md, readme.txt, AGENTS.md and CLAUDE.md keep naming Aviendha as lineage; reset the version to 1.0.0). Verify with a grep for "aviendha" over the theme's code files that must come back empty. Set the style.css header (Theme Name: Kadewerk, Text Domain: kadewerk) and give theme.json the palette below. Add a patterns/ directory; aviendha's package.json already wires npm run validate (wp-pattern-sentinel) for it.
- Palette: map the page's locked tokens onto the color slugs Aludra's block styles resolve by (base, contrast, secondary, main, primary, accent, tertiary, border-light): base #FFFFFF, contrast #111111, primary #FF4F00, secondary #595959, tertiary #F7F7F8, border-light #E3E3E3. Helvetica stack as the sans font family.
- patterns/homepage.php: one pattern mirroring index.html section by section, Dutch copy verbatim:
  - hero: aludra/hero-split (heading "Precieze architectuur voor wonen en hergebruik.", lead, CTA "Plan een gesprek", images/hero-section.svg as the image)
  - Geselecteerde projecten: six project cards with the six SVGs; pick between aludra/carousel (see patterns/carousel-portfolio-showcase.php in aludra), aludra/feature-cards and aludra/photo-grid, whichever fits image + title + meta best
  - In vier stappen van idee tot sleutel: aludra/feature-list-grid or aludra/icon-grid
  - Over het bureau: aludra/about or aludra/split-section, facts table plus the Fig. 02 map
  - client quote: aludra/testimonial-grid (one quote)
  - Plan een gesprek: aludra/contact-section (its form card needs Contact Form 7 active; note that) plus aludra/cta-banner
- Copy the seven SVGs from images/ into theme-kadewerk/assets/img/ and reference them with get_theme_file_uri(). Their draw-on animation is inside the SVG, so it survives.
- Point the page template at the pattern, php -l every PHP file, run npm run validate, and grep every aludra/* block name used in the pattern against ~/code/aludra/blocks/ to confirm it exists (run npm run build --workspaces --if-present in ~/code/aludra first if its build/ looks stale).
- Connect it to a local site: follow the html-to-block-theme skill's references/local-environment.md — wp valet new kadewerk, copy theme-kadewerk into the site's wp-content/themes/, wp theme activate kadewerk, confirm the homepage pattern renders at http://kadewerk.test with a clean debug.log. The Aludra plugin must be active for the aludra/* blocks.
- Report the final section-to-block mapping and anything index.html has that no aludra block covers.
```

Why it is written this way:
- **Aviendha fork, not a converted theme:** prompt 10's theme cannot ship aludra blocks (theme-review rule); the Imagewize stack is theme (palette, header, footer) + plugin (content blocks), so the fork only carries the design system and the page pattern.
- **Full rename, lineage kept:** a client theme must not ship aviendha identifiers (class prefixes, function prefix, text domain, package names), but CHANGELOG.md/README/readme.txt/AGENTS/CLAUDE keep naming Aviendha as the lineage — the starter theme's own fork rules. Connecting to a Valet site proves the rename: wp theme list must show kadewerk, not aviendha.
- **Slug names matter:** Aludra's block styles resolve colors by slug, so the page palette must land on base/contrast/primary/... exactly.
- **get_theme_file_uri():** pattern markup cannot resolve theme-relative image paths by itself.
- **Block-name grep:** a pattern using a block the plugin does not register renders as an unsupported block, and the agent cannot open the editor, so checking names against aludra/blocks/ is the proof.
