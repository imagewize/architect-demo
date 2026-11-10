<?php
/**
 * Title: Hero
 * Slug: kadewerk/hero
 * Categories: kadewerk
 * Keywords: hero, intro, bureau, kadewerk, tekening
 * Viewport Width: 1400
 * Description: Hero van Bureau Kadewerk — kicker, titel, lead, acties, doorsnede-tekening en kerncijfers. Komt uit de hero-sectie van index.html.
 *
 * @package Kadewerk
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"tagName":"section","className":"hero","anchor":"top","align":"full"} -->
<section class="wp-block-group hero alignfull" id="top"><!-- wp:group {"className":"container hero-grid"} -->
<div class="wp-block-group container hero-grid"><!-- wp:group {"className":"hero-copy"} -->
<div class="wp-block-group hero-copy"><!-- wp:paragraph {"className":"kicker"} -->
<p class="kicker"><?php esc_html_e( 'Architectenbureau — Rotterdam, sinds 2009', 'kadewerk' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"anchor":"hero-titel"} -->
<h1 class="wp-block-heading" id="hero-titel"><?php esc_html_e( 'Precieze architectuur voor wonen en hergebruik.', 'kadewerk' ); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"lead"} -->
<p class="lead"><?php esc_html_e( 'Bureau Kadewerk is een team van twaalf architecten in Rotterdam. Wij ontwerpen villa’s en woonblokken — en geven pakhuizen, kerken en scholen een tweede leven als woning of werkplek.', 'kadewerk' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"hero-actions"} -->
<div class="wp-block-group hero-actions"><!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"btn"} -->
<div class="wp-block-button btn"><a class="wp-block-button__link wp-element-button" href="#contact"><?php esc_html_e( 'Plan een gesprek', 'kadewerk' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:paragraph {"className":"link-arrow"} -->
<p class="link-arrow"><a href="#projecten"><?php esc_html_e( 'Bekijk zes projecten', 'kadewerk' ); ?> <svg viewBox="0 0 16 16" aria-hidden="true"><path d="M8 2v11M3 9l5 5 5-5"/></svg></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"hero-figure"} -->
<div class="wp-block-group hero-figure"><!-- wp:image -->
<figure class="wp-block-image"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/hero-section.svg' ) ); ?>" alt="<?php esc_attr_e( 'Doorsnede door een bestaand pakhuis: zadeldak in zwart poche met oranje dakraam, gesneden kopwanden met een raam op elke verdieping en een deur, twee ingevoegde vloerplaten, een trap, een maatvoering van 16,0 m en drie schaalfiguren op drie niveaus.', 'kadewerk' ); ?>"/><figcaption class="wp-element-caption"><?php esc_html_e( 'Fig. 01 — Doorsnede bestaand pakhuis: gesneden zadeldak met oranje dakraam, kopwanden met ramen op elke verdieping en een deur, twee ingevoegde vloerplaten, trap, maatvoering 16,0 m en drie schaalfiguren op drie niveaus', 'kadewerk' ); ?></figcaption></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"container"} -->
<div class="wp-block-group container"><!-- wp:group {"className":"hero-facts"} -->
<div class="wp-block-group hero-facts"><!-- wp:group {"className":"fact-item"} -->
<div class="wp-block-group fact-item"><!-- wp:paragraph {"className":"fact-label"} -->
<p class="fact-label"><?php esc_html_e( 'Opgericht', 'kadewerk' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"fact-value"} -->
<p class="fact-value"><?php esc_html_e( '2009', 'kadewerk' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"fact-item"} -->
<div class="wp-block-group fact-item"><!-- wp:paragraph {"className":"fact-label"} -->
<p class="fact-label"><?php esc_html_e( 'Mensen', 'kadewerk' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"fact-value"} -->
<p class="fact-value"><?php esc_html_e( '12', 'kadewerk' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"fact-item"} -->
<div class="wp-block-group fact-item"><!-- wp:paragraph {"className":"fact-label"} -->
<p class="fact-label"><?php esc_html_e( 'Werkvelden', 'kadewerk' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"fact-value"} -->
<p class="fact-value"><?php esc_html_e( 'Wonen & hergebruik', 'kadewerk' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"fact-item"} -->
<div class="wp-block-group fact-item"><!-- wp:paragraph {"className":"fact-label"} -->
<p class="fact-label"><?php esc_html_e( 'Studio', 'kadewerk' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"fact-value"} -->
<p class="fact-value"><?php esc_html_e( 'M4H, Rotterdam', 'kadewerk' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
