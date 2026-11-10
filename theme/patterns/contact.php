<?php
/**
 * Title: Contact
 * Slug: kadewerk/contact
 * Categories: kadewerk
 * Keywords: contact, formulier, aanvraag, adres
 * Viewport Width: 1400
 * Description: Plan een gesprek — lead, contactformulier (aludra/contact-section met Contact Form 7-kaart) en contactgegevens. Komt uit de contact-sectie van index.html. De mailto: form is vervangen door het Aludra-formulierblok; de veldteksten staan in de CF7-formulierconfiguratie (id vervangen door een echt formulier).
 *
 * @package Kadewerk
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"tagName":"section","className":"section","anchor":"contact","align":"full"} -->
<section class="wp-block-group section alignfull" id="contact"><!-- wp:group {"className":"container contact-grid"} -->
<div class="wp-block-group container contact-grid"><!-- wp:group -->
<div class="wp-block-group"><!-- wp:heading {"level":2,"anchor":"contact-titel"} -->
<h2 class="wp-block-heading" id="contact-titel"><?php esc_html_e( 'Plan een gesprek', 'kadewerk' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"contact-lead"} -->
<p class="contact-lead"><?php esc_html_e( 'Vertel ons kort over uw plan — een kavel, een pakhuis, een kerk of een heel woonblok. We nodigen u graag uit in ons pakhuis aan de Keilestraat, of we komen naar u toe. U hoort binnen twee werkdagen van ons.', 'kadewerk' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"contact-form"} -->
<div class="wp-block-group contact-form"><!-- wp:aludra/contact-section -->
<div class="wp-block-aludra-contact-section alignfull" style="margin-top:0;margin-bottom:0"><div class="contact-section__inner"><!-- wp:group {"className":"contact-section__card"} -->
<div class="wp-block-group contact-section__card"><!-- wp:shortcode -->
[contact-form-7 id="FORM_ID" title="Aanvraag"]
<!-- /wp:shortcode --></div>
<!-- /wp:group --></div></div>
<!-- /wp:aludra/contact-section -->

<!-- wp:group {"className":"form-foot"} -->
<div class="wp-block-group form-foot"><!-- wp:paragraph {"className":"form-note"} -->
<p class="form-note"><?php esc_html_e( 'We gebruiken uw gegevens alleen om op uw aanvraag te reageren.', 'kadewerk' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"tagName":"aside","className":"contact-info","anchor":"contactgegevens"} -->
<aside class="wp-block-group contact-info" id="contactgegevens"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'Bureau Kadewerk', 'kadewerk' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:group {"className":"facts"} -->
<div class="wp-block-group facts"><!-- wp:group {"className":"fact"} -->
<div class="wp-block-group fact"><!-- wp:paragraph {"className":"fact-label"} -->
<p class="fact-label"><?php esc_html_e( 'Bezoekadres', 'kadewerk' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"tagName":"address","className":"fact-value"} -->
<address class="wp-block-group fact-value"><!-- wp:paragraph -->
<p>Keilestraat 9F<br>3029 BP Rotterdam (M4H)</p>
<!-- /wp:paragraph --></address>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"fact"} -->
<div class="wp-block-group fact"><!-- wp:paragraph {"className":"fact-label"} -->
<p class="fact-label"><?php esc_html_e( 'E-mail', 'kadewerk' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"fact-value"} -->
<p class="fact-value"><a href="mailto:studio@example.com">studio@example.com</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"fact"} -->
<div class="wp-block-group fact"><!-- wp:paragraph {"className":"fact-label"} -->
<p class="fact-label"><?php esc_html_e( 'Telefoon', 'kadewerk' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"fact-value"} -->
<p class="fact-value"><a href="tel:+31100000000">+31 (0)10 000 00 00</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"fact"} -->
<div class="wp-block-group fact"><!-- wp:paragraph {"className":"fact-label"} -->
<p class="fact-label"><?php esc_html_e( 'Bereikbaar', 'kadewerk' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"fact-value"} -->
<p class="fact-value"><?php esc_html_e( 'ma–vr, 09.00–17.30', 'kadewerk' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></aside>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
