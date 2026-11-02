# architect-demo

A test run of the `wp-frontend-builder` Vibe agent from
[mistral-toolbox](https://github.com/imagewize/mistral-toolbox). From a short brief, the agent
built a homepage for an invented Rotterdam architecture firm, **Studio Veld Architecten**, as one
self-contained HTML/CSS file. The aim is to test the loop: build from a brief, revise with change
requests, then convert to a WordPress block theme.

- **Agent:** `wp-frontend-builder` (Mistral Vibe, Mistral Large 4)
- **Toolbox version:** `main` at `8240385` (v1.6.1 plus unreleased fixes #28–#30)
- **Output:** [`index.html`](index.html), with Dutch copy, a Swiss style, inline SVG drawings and no external requests

## Setup

`.vibe/config.toml` points Vibe at the toolbox skills. The agent profiles are found through the
user-level symlink `~/.vibe/agents` → `~/code/mistral-toolbox/agents`.

```bash
vibe --agent wp-frontend-builder
```

## View

```bash
open index.html
```

To check phone layouts, use the browser's device toolbar at about 390px wide.

## Brief (run 1)

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

**What the agent did:**
- loaded `frontend-design`, `no-ai-design-slop` and `frontend-ui-engineering`, and skipped `landing-page`
- stated its assumptions first: Dutch copy, a Swiss style with an International Orange accent, the system Helvetica font, a `mailto:` form and no JavaScript
- checked its own output: tag balance, `--wp--preset--*` token use, no `url()`, form labels and WCAG contrast for every text and background pair
- rendered the page in headless Chrome at phone and desktop widths

**Review notes, to send as the next change request:**
1. The hero drawing has a tilted orange rectangle on the roof that reads as a stray mark. Make it a proper skylight or remove it.
2. On the "Over het bureau" map, the studio label overlaps the bridge pylon. The caption says "Rotterdam-Noord", but M4H is in Rotterdam-West (Delfshaven).
3. There is empty space under the facts table in "Over het bureau", and the right half of the quote section is empty.
4. The sticky header is 122px tall on phones. Make it non-sticky on small screens, or fold the nav into a toggle.

## Change requests

Start each run by pointing the agent at the existing file, keep each run to two or three changes,
and commit after every run you keep:

```
Read index.html. Change: …
```

```bash
git diff                                  # compare with the last version
git commit -am "design: <what changed>"   # keep this run
git restore index.html                    # throw this run away
```

## Convert to WordPress

When the design is final:

```
Load html-to-block-theme and convert index.html into a block theme with one pattern per section.
```

## Stand-ins, not finished

- **Form:** posts via `mailto:`, which opens the visitor's mail app. In WordPress it becomes a form plugin or block.
- **Firm and content:** the firm, projects, client quote and phone number are invented. The street names and districts are real.
- **Email domain:** `studioveld.nl` may be a real domain owned by someone else. Replace it before showing the page publicly.
