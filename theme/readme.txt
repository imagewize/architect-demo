=== Kadewerk ===
Contributors: jasperfrumau
Requires at least: 6.6
Tested up to: 7.1
Requires PHP: 8.0
Stable tag: 1.0.0
License: GNU General Public License v3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Tags: full-site-editing, block-patterns, custom-colors, editor-style, template-editing, translation-ready, wide-blocks

Full-site-editing block theme for Bureau Kadewerk, a Rotterdam architecture firm. Forked from the Aviendha starter theme; the homepage is composed from the kadewerk/* block patterns converted from index.html.

== Description ==

Kadewerk ships six registered patterns (hero, projecten, werkwijze, studio, quote, contact) plus header and footer template parts. templates/index.html and templates/page.html stack the patterns.

The design tokens (paper, ink, accent, muted, line, mist; the Helvetica sans stack; spacing steps 10–70) live in theme.json as --wp--preset--* presets. The SVG drawings in assets/img/ keep their draw-on animation because they are loaded through <img>.

The contact pattern uses the aludra/contact-section block with a Contact Form 7 shortcode card as the stand-in for the original mailto: form — activate the Aludra and Contact Form 7 plugins and point the shortcode at a real form ID.

== Installation ==

1. Upload the theme to /wp-content/themes/kadewerk/
2. Activate via Appearance → Themes
3. Edit via Appearance → Editor

== Changelog ==

= 1.0.0 =
* Initial release, forked from Aviendha 1.18.9 and renamed to Kadewerk. See CHANGELOG.md for the Aviendha history this theme is built on.

== Copyright ==

Kadewerk WordPress Theme, (C) 2026 Jasper Frumau
Kadewerk is distributed under the terms of the GNU GPL v3 (or later).
