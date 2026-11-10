<?php
/**
 * Title: Citaat
 * Slug: kadewerk/quote
 * Categories: kadewerk
 * Keywords: citaat, quote, reference, opdrachtgever
 * Viewport Width: 1200
 * Description: Citaat van een opdrachtgever op mist-achtergrond. Komt uit de quote-sectie van index.html.
 *
 * @package Kadewerk
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"tagName":"section","className":"section quote","align":"full"} -->
<section class="wp-block-group section quote alignfull"><!-- wp:group {"className":"container"} -->
<div class="wp-block-group container"><!-- wp:quote {"className":"quote-block"} -->
<blockquote class="wp-block-quote quote-block"><!-- wp:paragraph -->
<p><?php esc_html_e( 'Ze luisterden eerst en tekenden daarna. Het ontwerp past bij ons én bij de straat — en de bouw verliep zonder verrassingen.', 'kadewerk' ); ?></p>
<!-- /wp:paragraph -->

<cite><?php esc_html_e( 'J. van der Laan — particulier, Villa Veldzicht (Kralingen)', 'kadewerk' ); ?></cite></blockquote>
<!-- /wp:quote --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
