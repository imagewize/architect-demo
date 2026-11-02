// README demo — records the homepage in headless Chrome and builds images/demo.gif:
// the hero draws itself on load, the page scrolls to the project grid where the six
// cards draw in, then on to the Fig. 02 studio map.
//   node scripts/demo-gif.rec.mjs images/demo.gif
// No npm packages: the page is served with node:http and Chrome is driven over the
// DevTools protocol with Node's built-in WebSocket (Node 22+). Needs Google Chrome,
// ffmpeg, gifski and gifsicle on the machine.
import http from 'node:http';
import fs from 'node:fs';
import os from 'node:os';
import path from 'node:path';
import { spawn, spawnSync } from 'node:child_process';
import { fileURLToPath } from 'node:url';

const ROOT = path.resolve(path.dirname(fileURLToPath(import.meta.url)), '..');
const out = path.resolve(process.argv[2] || path.join(ROOT, 'images/demo.gif'));
const CHROME = process.env.CHROME || '/Applications/Google Chrome.app/Contents/MacOS/Google Chrome';

// Recorded at desktop width so the hero figure sits beside the headline and is in view
// on load, then scaled to the README size (same 16:10 ratio).
const VIEWPORT = { width: 1280, height: 800 };
const GIF = { width: 800, height: 500, fps: 15, colors: 32, lossy: 30 };

// Scroll timeline in seconds: [start, end, fromY, toY]. The pauses are long enough for
// each drawing's draw-on animation (about 3 s) to finish before the page moves on.
// The Y positions match the 1280×800 layout: 1150 shows both rows of project cards,
// 3150 shows the studio map.
const TIMELINE = [
  [0, 3.4, 0, 0],          // hero draws on load
  [3.4, 5.0, 0, 1150],     // scroll to the project grid
  [5.0, 8.2, 1150, 1150],  // six cards draw in
  [8.2, 10.8, 1150, 3150], // scroll past Werkwijze to the studio section
  [10.8, 14.6, 3150, 3150] // map draws in
];
const END = TIMELINE.at(-1)[1];
const ease = x => (x < 0.5 ? 4 * x * x * x : 1 - Math.pow(-2 * x + 2, 3) / 2);
const scrollAt = t => {
  for (const [a, z, from, to] of TIMELINE) if (t <= z) return from + (to - from) * ease((t - a) / (z - a));
  return TIMELINE.at(-1)[3];
};

const work = fs.mkdtempSync(path.join(os.tmpdir(), 'demo-gif-'));
const framesDir = path.join(work, 'frames');
const gifFramesDir = path.join(work, 'gif');
fs.mkdirSync(framesDir);
fs.mkdirSync(gifFramesDir);

// --- static server for the repo -------------------------------------------------------
const TYPES = { '.html': 'text/html; charset=utf-8', '.svg': 'image/svg+xml', '.png': 'image/png', '.gif': 'image/gif', '.css': 'text/css', '.js': 'text/javascript' };
const server = http.createServer((req, res) => {
  const p = path.join(ROOT, decodeURIComponent(new URL(req.url, 'http://x').pathname));
  const file = p.endsWith('/') ? path.join(p, 'index.html') : p;
  if (!file.startsWith(ROOT) || !fs.existsSync(file)) { res.writeHead(404); return res.end(); }
  res.writeHead(200, { 'Content-Type': TYPES[path.extname(file)] || 'application/octet-stream' });
  fs.createReadStream(file).pipe(res);
});
await new Promise(r => server.listen(0, '127.0.0.1', r));
const site = `http://127.0.0.1:${server.address().port}/index.html`;

// --- Chrome over the DevTools protocol ------------------------------------------------
const profile = path.join(work, 'profile');
const chrome = spawn(CHROME, ['--headless=new', '--remote-debugging-port=0', `--user-data-dir=${profile}`,
  '--hide-scrollbars', '--force-color-profile=srgb', '--no-first-run', '--no-default-browser-check', 'about:blank'], { stdio: 'ignore' });
const portFile = path.join(profile, 'DevToolsActivePort');
for (let i = 0; !fs.existsSync(portFile) || !fs.readFileSync(portFile, 'utf8').includes('\n'); i++) {
  if (i > 100) throw new Error('Chrome did not start');
  await new Promise(r => setTimeout(r, 100));
}
const port = fs.readFileSync(portFile, 'utf8').split('\n')[0];
const target = (await (await fetch(`http://127.0.0.1:${port}/json/list`)).json()).find(t => t.type === 'page');
const ws = new WebSocket(target.webSocketDebuggerUrl);
await new Promise((r, j) => { ws.onopen = r; ws.onerror = j; });
let nextId = 0;
const pending = new Map(), listeners = new Map();
ws.onmessage = ({ data }) => {
  const msg = JSON.parse(data);
  if (msg.id && pending.has(msg.id)) {
    const { resolve, reject } = pending.get(msg.id); pending.delete(msg.id);
    msg.error ? reject(new Error(msg.error.message)) : resolve(msg.result);
  } else if (msg.method && listeners.has(msg.method)) listeners.get(msg.method)(msg.params);
};
const send = (method, params = {}) => new Promise((resolve, reject) => {
  const id = ++nextId; pending.set(id, { resolve, reject });
  ws.send(JSON.stringify({ id, method, params }));
});
const once = method => new Promise(r => listeners.set(method, p => { listeners.delete(method); r(p); }));

await send('Page.enable');
await send('Emulation.setDeviceMetricsOverride', { ...VIEWPORT, deviceScaleFactor: 1, mobile: false });
const loaded = once('Page.domContentEventFired');
await send('Page.navigate', { url: site });
await loaded;

// Capture in real time, setting the scroll position from the timeline before each shot,
// and keep each frame's timestamp so the GIF can be resampled to a constant frame rate.
// Shots are paced to the GIF frame rate: capturing faster only adds scroll frames that
// the resample drops or blends, and scroll frames are what make the GIF heavy.
const t0 = Date.now();
const frames = [];
for (let t = 0; t <= END; t = (Date.now() - t0) / 1000) {
  const wait = (frames.length / GIF.fps - t) * 1000;
  if (wait > 0) { await new Promise(r => setTimeout(r, wait)); t = (Date.now() - t0) / 1000; }
  await send('Runtime.evaluate', { expression: `window.scrollTo(0, ${Math.round(scrollAt(t))})` });
  const { data } = await send('Page.captureScreenshot', { format: 'png', optimizeForSpeed: true });
  const file = path.join(framesDir, `f${String(frames.length).padStart(4, '0')}.png`);
  fs.writeFileSync(file, Buffer.from(data, 'base64'));
  frames.push({ file, t });
}
ws.close();
chrome.kill();
server.close();
console.log(`${frames.length} frames captured (${(frames.length / END).toFixed(1)} fps)`);

// --- encode -----------------------------------------------------------------------------
const run = (cmd, args) => {
  const r = spawnSync(cmd, args, { stdio: ['ignore', 'inherit', 'inherit'] });
  if (r.status !== 0) throw new Error(`${cmd} failed (${r.error?.message ?? `exit ${r.status}`})`);
};
const concat = frames.map((f, i) => `file '${f.file}'\nduration ${((frames[i + 1]?.t ?? END) - f.t).toFixed(4)}`).join('\n')
  + `\nfile '${frames.at(-1).file}'\n`;
fs.writeFileSync(path.join(work, 'concat.txt'), concat);
run('ffmpeg', ['-loglevel', 'error', '-f', 'concat', '-safe', '0', '-i', path.join(work, 'concat.txt'),
  '-vf', `fps=${GIF.fps},scale=${GIF.width}:${GIF.height}:flags=lanczos`, path.join(gifFramesDir, 'o%04d.png')]);
const gifFrames = fs.readdirSync(gifFramesDir).sort().map(f => path.join(gifFramesDir, f));
const raw = path.join(work, 'raw.gif');
run('gifski', ['-q', '--fps', String(GIF.fps), '--width', String(GIF.width), '--quality', '90', '-o', raw, ...gifFrames]);
run('gifsicle', ['-O3', '--colors', String(GIF.colors), `--lossy=${GIF.lossy}`, raw, '-o', out]);
fs.rmSync(work, { recursive: true, force: true });
console.log(`${path.relative(process.cwd(), out)}: ${(fs.statSync(out).size / 1024).toFixed(0)} KB`);
