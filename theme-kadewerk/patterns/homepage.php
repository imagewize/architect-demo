<?php
/**
 * Title: Homepage
 * Slug: kadewerk/homepage
 * Categories: kadewerk
 * Keywords: home, homepage, bureau, kadewerk, hero, projecten
 * Viewport Width: 1400
 * Description: Homepage van Bureau Kadewerk — hero, geselecteerde projecten, werkwijze, studio, citaat en contact — samengesteld uit aludra/* blocks. Spiegelt index.html sectie voor sectie.
 *
 * @package Kadewerk
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<!-- wp:aludra/hero-split {"anchor":"top"} -->
<div id="top" class="wp-block-aludra-hero-split alignfull" style="margin-top:0;margin-bottom:0"><div class="hero-split__inner"><!-- wp:group {"className":"hero-split__content","layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group hero-split__content"><!-- wp:paragraph {"className":"hero-split__eyebrow"} -->
<p class="hero-split__eyebrow"><?php esc_html_e( 'Architectenbureau — Rotterdam, sinds 2009', 'kadewerk' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"className":"hero-split__title"} -->
<h1 class="wp-block-heading hero-split__title"><?php esc_html_e( 'Precieze architectuur voor wonen en hergebruik.', 'kadewerk' ); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"hero-split__lead"} -->
<p class="hero-split__lead"><?php esc_html_e( 'Bureau Kadewerk is een team van twaalf architecten in Rotterdam. Wij ontwerpen villa’s en woonblokken — en geven pakhuizen, kerken en scholen een tweede leven als woning of werkplek.', 'kadewerk' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"className":"hero-split__ctas","layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-buttons hero-split__ctas"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#contact"><?php esc_html_e( 'Plan een gesprek', 'kadewerk' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:paragraph {"className":"link-arrow"} -->
<p class="link-arrow"><a href="#projecten"><?php esc_html_e( 'Bekijk zes projecten', 'kadewerk' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"hero-split__media"} -->
<div class="wp-block-group hero-split__media"><!-- wp:image -->
<figure class="wp-block-image"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/hero-section.svg' ) ); ?>" alt="<?php esc_attr_e( 'Doorsnede door een bestaand pakhuis: zadeldak in zwart poche met oranje dakraam, gesneden kopwanden met een raam op elke verdieping en een deur, twee ingevoegde vloerplaten, een trap, een maatvoering van 16,0 m en drie schaalfiguren op drie niveaus.', 'kadewerk' ); ?>"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"textColor":"secondary","fontSize":"small"} -->
<p class="has-secondary-color has-text-color has-small-font-size"><?php esc_html_e( 'Fig. 01 — Doorsnede bestaand pakhuis: gesneden zadeldak met oranje dakraam, kopwanden met ramen op elke verdieping en een deur, twee ingevoegde vloerplaten, trap, maatvoering 16,0 m en drie schaalfiguren op drie niveaus', 'kadewerk' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div></div>
<!-- /wp:aludra/hero-split -->

<!-- wp:aludra/stat-rail {"className":"is-style-light"} -->
<div class="wp-block-aludra-stat-rail alignfull is-style-light" style="margin-top:0;margin-bottom:0"><div class="stat-rail__shell"><!-- wp:aludra/stat-item {"number":"2009","caption":"Opgericht"} -->
<div class="wp-block-aludra-stat-item stat-rail__item"><div class="stat-rail__num">2009</div><div class="stat-rail__cap"><?php esc_html_e( 'Opgericht', 'kadewerk' ); ?></div></div>
<!-- /wp:aludra/stat-item -->

<!-- wp:aludra/stat-item {"number":"12","caption":"Mensen"} -->
<div class="wp-block-aludra-stat-item stat-rail__item"><div class="stat-rail__num">12</div><div class="stat-rail__cap"><?php esc_html_e( 'Mensen', 'kadewerk' ); ?></div></div>
<!-- /wp:aludra/stat-item -->

<!-- wp:aludra/stat-item {"number":"Wonen & hergebruik","caption":"Werkvelden"} -->
<div class="wp-block-aludra-stat-item stat-rail__item"><div class="stat-rail__num"><?php esc_html_e( 'Wonen & hergebruik', 'kadewerk' ); ?></div><div class="stat-rail__cap"><?php esc_html_e( 'Werkvelden', 'kadewerk' ); ?></div></div>
<!-- /wp:aludra/stat-item -->

<!-- wp:aludra/stat-item {"number":"M4H, Rotterdam","caption":"Studio"} -->
<div class="wp-block-aludra-stat-item stat-rail__item"><div class="stat-rail__num"><?php esc_html_e( 'M4H, Rotterdam', 'kadewerk' ); ?></div><div class="stat-rail__cap"><?php esc_html_e( 'Studio', 'kadewerk' ); ?></div></div>
<!-- /wp:aludra/stat-item --></div></div>
<!-- /wp:aludra/stat-rail -->

<!-- wp:aludra/spine-section {"anchor":"projecten"} -->
<div id="projecten" class="wp-block-aludra-spine-section alignfull" style="margin-top:0;margin-bottom:0"><div class="spine-section__shell"><div class="spine-section__spine"><p class="spine-section__label"><?php esc_html_e( 'Projecten', 'kadewerk' ); ?></p><h2 class="spine-section__heading"><?php esc_html_e( 'Geselecteerde projecten', 'kadewerk' ); ?></h2><p class="spine-section__aside"><?php esc_html_e( 'Zes projecten uit 2019–2026 — van villa tot voormalige kerk.', 'kadewerk' ); ?></p></div><div class="spine-section__content"><!-- wp:aludra/feature-cards -->
<div class="wp-block-aludra-feature-cards alignfull"><div class="feature-cards__inner"><!-- wp:group {"className":"feature-cards__grid","layout":{"type":"constrained"}} -->
<div class="wp-block-group feature-cards__grid">
<!-- wp:group {"className":"feature-card project","layout":{"type":"flex","orientation":"vertical","gap":"1rem"}} -->
<div class="wp-block-group feature-card project"><!-- wp:group {"className":"project-top","layout":{"type":"flex","justifyContent":"space-between","verticalAlignment":"baseline","gap":"1rem"}} -->
<div class="wp-block-group project-top"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'Villa Veldzicht', 'kadewerk' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"folio"} -->
<p class="folio">01</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"plate","style":{"spacing":{"padding":{"top":"1rem","right":"1rem","bottom":"1rem","left":"1rem"}}}} -->
<div class="wp-block-group plate" style="padding-top:1rem;padding-right:1rem;padding-bottom:1rem;padding-left:1rem"><!-- wp:image -->
<figure class="wp-block-image"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/01-villa-veldzicht.svg' ) ); ?>" alt="<?php esc_attr_e( 'Opstand van Villa Veldzicht: glazen paviljoen onder een uitkragende dakplaat met verschoven bovenbouw, oranje voordeur, twee bomen en twee schaalfiguren.', 'kadewerk' ); ?>"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"project-desc"} -->
<p class="project-desc"><?php esc_html_e( 'Villa rond een beschutte binnentuin, met de woonkamer gericht op de Kralingse Plas.', 'kadewerk' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"project-meta","textColor":"secondary","fontSize":"small"} -->
<p class="project-meta has-secondary-color has-text-color has-small-font-size"><?php esc_html_e( 'Kralingen · Nieuwbouw villa · 2024', 'kadewerk' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"feature-card project","layout":{"type":"flex","orientation":"vertical","gap":"1rem"}} -->
<div class="wp-block-group feature-card project"><!-- wp:group {"className":"project-top","layout":{"type":"flex","justifyContent":"space-between","verticalAlignment":"baseline","gap":"1rem"}} -->
<div class="wp-block-group project-top"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'Woonblok Maashaven', 'kadewerk' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"folio"} -->
<p class="folio">02</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"plate","style":{"spacing":{"padding":{"top":"1rem","right":"1rem","bottom":"1rem","left":"1rem"}}}} -->
<div class="wp-block-group plate" style="padding-top:1rem;padding-right:1rem;padding-bottom:1rem;padding-left:1rem"><!-- wp:image -->
<figure class="wp-block-image"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/02-woonblok-maashaven.svg' ) ); ?>" alt="<?php esc_attr_e( 'Opstand van Woonblok Maashaven: vier verdiepingen met een raster van ramen, oranje dubbele entree op de begane grond, kade met water en een afgemeerd binnenvaartschip.', 'kadewerk' ); ?>"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"project-desc"} -->
<p class="project-desc"><?php esc_html_e( '24 appartementen in een gesloten blok aan het water, waarvan 18 sociale huur.', 'kadewerk' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"project-meta","textColor":"secondary","fontSize":"small"} -->
<p class="project-meta has-secondary-color has-text-color has-small-font-size"><?php esc_html_e( 'Kop van Zuid · Woonblok · 2023', 'kadewerk' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"feature-card project","layout":{"type":"flex","orientation":"vertical","gap":"1rem"}} -->
<div class="wp-block-group feature-card project"><!-- wp:group {"className":"project-top","layout":{"type":"flex","justifyContent":"space-between","verticalAlignment":"baseline","gap":"1rem"}} -->
<div class="wp-block-group project-top"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'Pakhuis Keilewerf', 'kadewerk' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"folio"} -->
<p class="folio">03</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"plate","style":{"spacing":{"padding":{"top":"1rem","right":"1rem","bottom":"1rem","left":"1rem"}}}} -->
<div class="wp-block-group plate" style="padding-top:1rem;padding-right:1rem;padding-bottom:1rem;padding-left:1rem"><!-- wp:image -->
<figure class="wp-block-image"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/03-pakhuis-keilewerf.svg' ) ); ?>" alt="<?php esc_attr_e( 'Opstand van Pakhuis Keilewerf: pakhuis met trapgevel en metselverband, twee rijen kleine ramen, oranje laaddeur met hijsbalk, zaagdak-aanbouw en een binnenvaartschip aan de kade.', 'kadewerk' ); ?>"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"project-desc"} -->
<p class="project-desc"><?php esc_html_e( 'Voormalig pakhuis met twaalf loftwoningen en vier ateliers op de begane grond.', 'kadewerk' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"project-meta","textColor":"secondary","fontSize":"small"} -->
<p class="project-meta has-secondary-color has-text-color has-small-font-size"><?php esc_html_e( 'Merwe-Vierhavens (M4H) · Transformatie pakhuis · 2021', 'kadewerk' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"feature-card project","layout":{"type":"flex","orientation":"vertical","gap":"1rem"}} -->
<div class="wp-block-group feature-card project"><!-- wp:group {"className":"project-top","layout":{"type":"flex","justifyContent":"space-between","verticalAlignment":"baseline","gap":"1rem"}} -->
<div class="wp-block-group project-top"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'De Hoeksteen', 'kadewerk' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"folio"} -->
<p class="folio">04</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"plate","style":{"spacing":{"padding":{"top":"1rem","right":"1rem","bottom":"1rem","left":"1rem"}}}} -->
<div class="wp-block-group plate" style="padding-top:1rem;padding-right:1rem;padding-bottom:1rem;padding-left:1rem"><!-- wp:image -->
<figure class="wp-block-image"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/04-de-hoeksteen.svg' ) ); ?>" alt="<?php esc_attr_e( 'Opstand van De Hoeksteen: voormalige kerk met schip en zadeldak, toren met spits, drie hoge vensters, oranje ingangsportaal, twee bomen en twee schaalfiguren.', 'kadewerk' ); ?>"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"project-desc"} -->
<p class="project-desc"><?php esc_html_e( 'Voormalige kerk met acht woningen rond de lichtinval van het middenschip.', 'kadewerk' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"project-meta","textColor":"secondary","fontSize":"small"} -->
<p class="project-meta has-secondary-color has-text-color has-small-font-size"><?php esc_html_e( 'Delfshaven · Kerk → woningen · 2019', 'kadewerk' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"feature-card project","layout":{"type":"flex","orientation":"vertical","gap":"1rem"}} -->
<div class="wp-block-group feature-card project"><!-- wp:group {"className":"project-top","layout":{"type":"flex","justifyContent":"space-between","verticalAlignment":"baseline","gap":"1rem"}} -->
<div class="wp-block-group project-top"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'Kadeblok Noordereiland', 'kadewerk' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"folio"} -->
<p class="folio">05</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"plate","style":{"spacing":{"padding":{"top":"1rem","right":"1rem","bottom":"1rem","left":"1rem"}}}} -->
<div class="wp-block-group plate" style="padding-top:1rem;padding-right:1rem;padding-bottom:1rem;padding-left:1rem"><!-- wp:image -->
<figure class="wp-block-image"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/05-kadeblok-noordereiland.svg' ) ); ?>" alt="<?php esc_attr_e( 'Opstand van Kadeblok Noordereiland: vier panden met zadeldaken aan de kade, twee ramen per verdieping, één oranje deur en een binnenvaartschip in het water.', 'kadewerk' ); ?>"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"project-desc"} -->
<p class="project-desc"><?php esc_html_e( 'Negen kadewoningen met kap en uitzicht op de Maas, direct aan de kade.', 'kadewerk' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"project-meta","textColor":"secondary","fontSize":"small"} -->
<p class="project-meta has-secondary-color has-text-color has-small-font-size"><?php esc_html_e( 'Noordereiland · 9 kadewoningen · 2022', 'kadewerk' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"feature-card project","layout":{"type":"flex","orientation":"vertical","gap":"1rem"}} -->
<div class="wp-block-group feature-card project"><!-- wp:group {"className":"project-top","layout":{"type":"flex","justifyContent":"space-between","verticalAlignment":"baseline","gap":"1rem"}} -->
<div class="wp-block-group project-top"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'De Bergweg', 'kadewerk' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"folio"} -->
<p class="folio">06</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"plate","style":{"spacing":{"padding":{"top":"1rem","right":"1rem","bottom":"1rem","left":"1rem"}}}} -->
<div class="wp-block-group plate" style="padding-top:1rem;padding-right:1rem;padding-bottom:1rem;padding-left:1rem"><!-- wp:image -->
<figure class="wp-block-image"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/06-de-bergweg.svg' ) ); ?>" alt="<?php esc_attr_e( 'Opstand van De Bergweg: voormalige school, blok van 30 meter breed met zaagdak en schoorsteen, een lange band van tien ramen, oranje dubbele entree, twee bomen en twee schaalfiguren.', 'kadewerk' ); ?>"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"project-desc"} -->
<p class="project-desc"><?php esc_html_e( 'Voormalige basisschool, nu tien appartementen en een buurthuis in de zijvleugel.', 'kadewerk' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"project-meta","textColor":"secondary","fontSize":"small"} -->
<p class="project-meta has-secondary-color has-text-color has-small-font-size"><?php esc_html_e( 'Bergwegkwartier · School → wonen · 2020', 'kadewerk' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
</div>
<!-- /wp:group --></div></div>
<!-- /wp:aludra/feature-cards --></div></div></div>
<!-- /wp:aludra/spine-section -->

<!-- wp:aludra/service-blocks {"className":"is-style-steps","anchor":"werkwijze","align":"full"} -->
<div id="werkwijze" class="wp-block-aludra-service-blocks alignfull is-style-steps" style="margin-top:0;margin-bottom:0"><div class="service-blocks__inner"><!-- wp:paragraph {"className":"service-blocks__label"} -->
<p class="service-blocks__label"><?php esc_html_e( 'Werkwijze', 'kadewerk' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":2,"className":"service-blocks__title"} -->
<h2 class="wp-block-heading service-blocks__title"><?php esc_html_e( 'In vier stappen van idee tot sleutel', 'kadewerk' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"service-blocks__lead"} -->
<p class="service-blocks__lead"><?php esc_html_e( 'Vaste prijsafspraken per fase. U weet bij elke stap waar het project staat.', 'kadewerk' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"service-blocks__list"} -->
<div class="wp-block-group service-blocks__list"><!-- wp:group {"className":"service-block"} -->
<div class="wp-block-group service-block"><!-- wp:group {"className":"service-block__header"} -->
<div class="wp-block-group service-block__header"><!-- wp:paragraph {"className":"service-block__num"} -->
<p class="service-block__num">01</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"className":"service-block__title"} -->
<h3 class="wp-block-heading service-block__title"><?php esc_html_e( 'Kennismaking', 'kadewerk' ); ?></h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"service-block__body"} -->
<div class="wp-block-group service-block__body"><!-- wp:paragraph {"className":"service-block__desc"} -->
<p class="service-block__desc"><?php esc_html_e( 'We beginnen op de plek zelf: een gesprek aan tafel, een ronde over de locatie en een analyse van programma, bestemmingsplan en buren.', 'kadewerk' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"service-block"} -->
<div class="wp-block-group service-block"><!-- wp:group {"className":"service-block__header"} -->
<div class="wp-block-group service-block__header"><!-- wp:paragraph {"className":"service-block__num"} -->
<p class="service-block__num">02</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"className":"service-block__title"} -->
<h3 class="wp-block-heading service-block__title"><?php esc_html_e( 'Ontwerp in drie ronden', 'kadewerk' ); ?></h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"service-block__body"} -->
<div class="wp-block-group service-block__body"><!-- wp:paragraph {"className":"service-block__desc"} -->
<p class="service-block__desc"><?php esc_html_e( 'Schets, voorontwerp en definitief ontwerp. Bij elke ronde presenteren we in beeld en op papier — en u beslist mee.', 'kadewerk' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"service-block"} -->
<div class="wp-block-group service-block"><!-- wp:group {"className":"service-block__header"} -->
<div class="wp-block-group service-block__header"><!-- wp:paragraph {"className":"service-block__num"} -->
<p class="service-block__num">03</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"className":"service-block__title"} -->
<h3 class="wp-block-heading service-block__title"><?php esc_html_e( 'Bestek en aanbesteding', 'kadewerk' ); ?></h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"service-block__body"} -->
<div class="wp-block-group service-block__body"><!-- wp:paragraph {"className":"service-block__desc"} -->
<p class="service-block__desc"><?php esc_html_e( 'We werken het ontwerp uit tot bestek en tekeningen, vragen offertes aan bij drie aannemers en bewaken prijs en planning.', 'kadewerk' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"service-block"} -->
<div class="wp-block-group service-block"><!-- wp:group {"className":"service-block__header"} -->
<div class="wp-block-group service-block__header"><!-- wp:paragraph {"className":"service-block__num"} -->
<p class="service-block__num">04</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"className":"service-block__title"} -->
<h3 class="wp-block-heading service-block__title"><?php esc_html_e( 'Bouw en nazorg', 'kadewerk' ); ?></h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"service-block__body"} -->
<div class="wp-block-group service-block__body"><!-- wp:paragraph {"className":"service-block__desc"} -->
<p class="service-block__desc"><?php esc_html_e( 'Tijdens de bouw zijn we wekelijks op de bouwplaats. Na de oplevering blijven we aanspreekpunt voor garantie en klein onderhoud.', 'kadewerk' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div></div>
<!-- /wp:aludra/service-blocks -->

<!-- wp:aludra/split-section {"mediaWidth":46,"revealOnScroll":true,"anchor":"studio"} -->
<div id="studio" class="wp-block-aludra-split-section alignfull" data-aludra-reveal="true" style="margin-top:0;margin-bottom:0"><div class="split-section__shell"><div class="split-section__header"><p class="split-section__label"><?php esc_html_e( 'Studio', 'kadewerk' ); ?></p><h2 class="split-section__heading"><?php esc_html_e( 'Over het bureau', 'kadewerk' ); ?></h2><p class="split-section__lead"><?php esc_html_e( 'Bureau Kadewerk is in 2009 opgericht in Rotterdam. We zijn met zijn twaalven: architecten, een interieurontwerper, een technisch tekenaar en een projectleider. Sinds 2016 werken we vanuit een eigen pakhuis in Merwe-Vierhavens — het gebouw dat we zelf hebben getransformeerd.', 'kadewerk' ); ?></p></div><div class="split-section__panes" style="--aludra-split-media:46%"><!-- wp:group {"className":"split-section__media"} -->
<div class="wp-block-group split-section__media"><!-- wp:image -->
<figure class="wp-block-image"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/studio-kaart.svg' ) ); ?>" alt="<?php esc_attr_e( 'Schematische kaart van de Nieuwe Maas in Rotterdam: op de noordelijke oever Merwe-Vierhavens en Delfshaven, met de studio in oranje gemarkeerd aan de Keilestraat; in het oosten een brug over de Maas; op de zuidoever de Maashaven.', 'kadewerk' ); ?>"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"textColor":"secondary","fontSize":"small"} -->
<p class="has-secondary-color has-text-color has-small-font-size"><?php esc_html_e( 'Fig. 02 — De studio zit aan de Keilestraat in Merwe-Vierhavens, Rotterdam-West (Delfshaven).', 'kadewerk' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"split-section__content"} -->
<div class="wp-block-group split-section__content"><!-- wp:table {"className":"facts"} -->
<figure class="wp-block-table facts"><table><tbody>
<tr><td><?php esc_html_e( 'Opgericht', 'kadewerk' ); ?></td><td><?php esc_html_e( '2009, Rotterdam', 'kadewerk' ); ?></td></tr>
<tr><td><?php esc_html_e( 'Team', 'kadewerk' ); ?></td><td><?php esc_html_e( '12 mensen', 'kadewerk' ); ?></td></tr>
<tr><td><?php esc_html_e( 'Studio', 'kadewerk' ); ?></td><td><?php esc_html_e( 'Eigen pakhuis, Keilestraat 9F, M4H', 'kadewerk' ); ?></td></tr>
<tr><td><?php esc_html_e( 'Werkgebied', 'kadewerk' ); ?></td><td><?php esc_html_e( 'Rotterdam en regio', 'kadewerk' ); ?></td></tr>
<tr><td><?php esc_html_e( 'Werkvelden', 'kadewerk' ); ?></td><td><?php esc_html_e( 'Wonen · transformatie · interieur', 'kadewerk' ); ?></td></tr>
</tbody></table></figure>
<!-- /wp:table -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'We werken voor particulieren en woningcorporaties. Nieuwbouw villa’s en woonblokken, maar ook de transformatie van pakhuizen, kerken en scholen. Wat al die projecten gemeen hebben: daglicht, een heldere constructie en een gebouw dat bij de straat past.', 'kadewerk' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div></div></div>
<!-- /wp:aludra/split-section -->

<!-- wp:aludra/testimonial-grid {"slidesToShow":1,"slidesToScroll":1,"arrows":false,"dots":false,"infinite":false} -->
<div class="wp-block-aludra-testimonial-grid alignfull" style="margin-top:0;margin-bottom:0" data-slick="{&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;arrows&quot;:false,&quot;dots&quot;:false,&quot;infinite&quot;:false,&quot;autoplay&quot;:false,&quot;autoplaySpeed&quot;:3000,&quot;speed&quot;:300,&quot;adaptiveHeight&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:768,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1}}]}" data-dots-bottom="-45px" data-slide-spacing="12" data-arrow-color="#1a1a1a" data-arrow-background="#d4ecf5" data-arrow-hover-color="#000000" data-arrow-hover-background="#d4ecf5"><!-- wp:group {"className":"testimonial-grid__card"} -->
<div class="wp-block-group testimonial-grid__card"><!-- wp:paragraph {"className":"testimonial-grid__quote","textColor":"main"} -->
<p class="testimonial-grid__quote has-main-color has-text-color"><?php esc_html_e( 'Ze luisterden eerst en tekenden daarna. Het ontwerp past bij ons én bij de straat — en de bouw verliep zonder verrassingen.', 'kadewerk' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"testimonial-grid__author","textColor":"secondary","fontSize":"small"} -->
<p class="testimonial-grid__author has-secondary-color has-text-color has-small-font-size"><?php esc_html_e( 'J. van der Laan — particulier, Villa Veldzicht (Kralingen)', 'kadewerk' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:aludra/testimonial-grid -->

<!-- wp:aludra/contact-section {"className":"is-style-light","anchor":"contact"} -->
<div id="contact" class="wp-block-aludra-contact-section alignfull is-style-light" style="margin-top:0;margin-bottom:0"><div class="contact-section__inner"><!-- wp:group {"className":"contact-section__intro","style":{"spacing":{"blockGap":"16px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group contact-section__intro"><!-- wp:paragraph {"className":"contact-section__label"} -->
<p class="contact-section__label"><?php esc_html_e( 'Contact', 'kadewerk' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"contact-section__heading"} -->
<h2 class="wp-block-heading contact-section__heading"><?php esc_html_e( 'Plan een gesprek', 'kadewerk' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"contact-section__sub"} -->
<p class="contact-section__sub"><?php esc_html_e( 'Vertel ons kort over uw plan — een kavel, een pakhuis, een kerk of een heel woonblok. We nodigen u graag uit in ons pakhuis aan de Keilestraat, of we komen naar u toe. U hoort binnen twee werkdagen van ons.', 'kadewerk' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"contact-section__grid","layout":{"type":"flex","orientation":"horizontal","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group contact-section__grid"><!-- wp:group {"className":"contact-section__info","style":{"spacing":{"blockGap":"16px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group contact-section__info"><!-- wp:heading {"level":3,"className":"contact-section__info-heading"} -->
<h3 class="wp-block-heading contact-section__info-heading"><?php esc_html_e( 'Bureau Kadewerk', 'kadewerk' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:group {"className":"contact-section__details","style":{"spacing":{"blockGap":"20px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group contact-section__details"><!-- wp:group {"className":"cs-detail","layout":{"type":"flex","orientation":"horizontal","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group cs-detail"><!-- wp:group {"className":"cs-detail__icon","layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group cs-detail__icon"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icons/icon-map.svg' ) ); ?>" alt="<?php esc_attr_e( 'Bezoekadres', 'kadewerk' ); ?>"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"cs-detail__body","style":{"spacing":{"blockGap":"4px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group cs-detail__body"><!-- wp:paragraph {"className":"cs-detail__label"} -->
<p class="cs-detail__label"><?php esc_html_e( 'Bezoekadres', 'kadewerk' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"cs-detail__value"} -->
<p class="cs-detail__value"><?php esc_html_e( 'Keilestraat 9F, 3029 BP Rotterdam (M4H)', 'kadewerk' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"cs-detail","layout":{"type":"flex","orientation":"horizontal","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group cs-detail"><!-- wp:group {"className":"cs-detail__icon","layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group cs-detail__icon"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icons/icon-mail.svg' ) ); ?>" alt="<?php esc_attr_e( 'E-mail', 'kadewerk' ); ?>"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"cs-detail__body","style":{"spacing":{"blockGap":"4px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group cs-detail__body"><!-- wp:paragraph {"className":"cs-detail__label"} -->
<p class="cs-detail__label"><?php esc_html_e( 'E-mail', 'kadewerk' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"cs-detail__value"} -->
<p class="cs-detail__value">studio@example.com</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"cs-detail","layout":{"type":"flex","orientation":"horizontal","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group cs-detail"><!-- wp:group {"className":"cs-detail__icon","layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group cs-detail__icon"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icons/icon-chat.svg' ) ); ?>" alt="<?php esc_attr_e( 'Telefoon', 'kadewerk' ); ?>"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"cs-detail__body","style":{"spacing":{"blockGap":"4px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group cs-detail__body"><!-- wp:paragraph {"className":"cs-detail__label"} -->
<p class="cs-detail__label"><?php esc_html_e( 'Telefoon', 'kadewerk' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"cs-detail__value"} -->
<p class="cs-detail__value">+31 (0)10 000 00 00</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"cs-detail","layout":{"type":"flex","orientation":"horizontal","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group cs-detail"><!-- wp:group {"className":"cs-detail__icon","layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group cs-detail__icon"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icons/icon-clock.svg' ) ); ?>" alt="<?php esc_attr_e( 'Bereikbaar', 'kadewerk' ); ?>"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"cs-detail__body","style":{"spacing":{"blockGap":"4px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group cs-detail__body"><!-- wp:paragraph {"className":"cs-detail__label"} -->
<p class="cs-detail__label"><?php esc_html_e( 'Bereikbaar', 'kadewerk' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"cs-detail__value"} -->
<p class="cs-detail__value"><?php esc_html_e( 'ma–vr, 09.00–17.30', 'kadewerk' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"cs-badge","layout":{"type":"flex","orientation":"horizontal","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group cs-badge"><!-- wp:paragraph {"className":"cs-badge__text"} -->
<p class="cs-badge__text"><?php esc_html_e( 'U hoort binnen twee werkdagen van ons', 'kadewerk' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"contact-section__card","layout":{"type":"constrained"}} -->
<div class="wp-block-group contact-section__card"><!-- wp:shortcode -->
[contact-form-7 id="7" title="Aanvraag"]
<!-- /wp:shortcode --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div></div>
<!-- /wp:aludra/contact-section -->

<!-- wp:aludra/cta-banner {"className":"is-style-light"} -->
<div class="wp-block-aludra-cta-banner alignfull is-style-light" style="margin-top:0;margin-bottom:0"><div class="cta-banner__content"><!-- wp:heading {"className":"cta-banner__title","style":{"typography":{"lineHeight":"1.2"}}} -->
<h2 class="wp-block-heading cta-banner__title" style="line-height:1.2"><?php esc_html_e( 'Plan een gesprek', 'kadewerk' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"cta-banner__lead"} -->
<p class="cta-banner__lead"><?php esc_html_e( 'Vertel ons kort over uw plan — een kavel, een pakhuis, een kerk of een heel woonblok.', 'kadewerk' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"className":"cta-banner__ctas","layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons cta-banner__ctas"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#contact"><?php esc_html_e( 'Plan een gesprek', 'kadewerk' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:aludra/cta-banner -->
