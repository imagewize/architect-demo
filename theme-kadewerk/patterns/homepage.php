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
<!-- wp:aludra/hero-split -->
<div class="wp-block-aludra-hero-split alignfull" style="margin-top:0;margin-bottom:0"><div class="hero-split__inner"><!-- wp:group {"className":"hero-split__content","layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group hero-split__content"><!-- wp:paragraph {"className":"hero-split__eyebrow"} -->
<p class="hero-split__eyebrow"><?php esc_html_e( 'Architectenbureau — Rotterdam, sinds 2009', 'kadewerk' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"className":"hero-split__title","style":{"typography":{"lineHeight":"1.15"}}} -->
<h1 class="wp-block-heading hero-split__title" style="line-height:1.15"><?php esc_html_e( 'Precieze architectuur voor wonen en hergebruik.', 'kadewerk' ); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"hero-split__lead"} -->
<p class="hero-split__lead"><?php esc_html_e( 'Bureau Kadewerk is een team van twaalf architecten in Rotterdam. Wij ontwerpen villa’s en woonblokken — en geven pakhuizen, kerken en scholen een tweede leven als woning of werkplek.', 'kadewerk' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"className":"hero-split__ctas","layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-buttons hero-split__ctas"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#contact"><?php esc_html_e( 'Plan een gesprek', 'kadewerk' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#projecten"><?php esc_html_e( 'Bekijk zes projecten', 'kadewerk' ); ?></a></div>
<!-- /wp:button --></div>
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

<!-- wp:aludra/stat-rail -->
<div class="wp-block-aludra-stat-rail alignfull" style="margin-top:0;margin-bottom:0"><div class="stat-rail__shell"><!-- wp:aludra/stat-item {"number":"2009","caption":"Opgericht"} -->
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

<!-- wp:aludra/spine-section {"tint":true} -->
<div class="wp-block-aludra-spine-section is-tinted alignfull" style="margin-top:0;margin-bottom:0"><div class="spine-section__shell"><div class="spine-section__spine"><p class="spine-section__label"><?php esc_html_e( 'Projecten', 'kadewerk' ); ?></p><h2 class="spine-section__heading"><?php esc_html_e( 'Geselecteerde projecten', 'kadewerk' ); ?></h2><p class="spine-section__aside"><?php esc_html_e( 'Zes projecten uit 2019–2026 — van villa tot voormalige kerk.', 'kadewerk' ); ?></p></div><div class="spine-section__content"><!-- wp:aludra/carousel {"slidesToShow":3,"slidesToScroll":1,"infinite":true,"variableWidth":true,"arrows":true,"dots":true} -->
<div class="wp-block-aludra-carousel slick-slider cb-padding cb-variable-width cb-arrow-style-arrow cb-arrow-bg-none" data-slick="{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:1,&quot;arrows&quot;:true,&quot;dots&quot;:true,&quot;infinite&quot;:true,&quot;autoplay&quot;:false,&quot;autoplaySpeed&quot;:3000,&quot;speed&quot;:300,&quot;rtl&quot;:false,&quot;adaptiveHeight&quot;:false,&quot;centerMode&quot;:false,&quot;centerPadding&quot;:&quot;50px&quot;,&quot;variableWidth&quot;:true,&quot;lazyLoad&quot;:&quot;ondemand&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:769,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;centerMode&quot;:false,&quot;variableWidth&quot;:false}}]}" data-dots-top="0px" data-dots-bottom="0px" data-arrow-color="#000000" data-arrow-background="transparent" data-arrow-hover-color="#000000" data-arrow-hover-background="transparent" data-arrow-style="arrow" data-arrow-background-style="none" data-arrow-size="40"><!-- wp:aludra/slide -->
<div class="wp-block-aludra-slide"><!-- wp:image {"width":"480px","sizeSlug":"large"} -->
<figure class="wp-block-image size-large is-resized"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/01-villa-veldzicht.svg' ) ); ?>" alt="<?php esc_attr_e( 'Opstand van Villa Veldzicht: glazen paviljoen onder een uitkragende dakplaat met verschoven bovenbouw, oranje voordeur, twee bomen en twee schaalfiguren.', 'kadewerk' ); ?>" style="width:480px;height:auto"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p>01</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'Villa Veldzicht', 'kadewerk' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Villa rond een beschutte binnentuin, met de woonkamer gericht op de Kralingse Plas.', 'kadewerk' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textColor":"secondary","fontSize":"small"} -->
<p class="has-secondary-color has-text-color has-small-font-size"><?php esc_html_e( 'Kralingen · Nieuwbouw villa · 2024', 'kadewerk' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:aludra/slide -->

<!-- wp:aludra/slide -->
<div class="wp-block-aludra-slide"><!-- wp:image {"width":"480px","sizeSlug":"large"} -->
<figure class="wp-block-image size-large is-resized"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/02-woonblok-maashaven.svg' ) ); ?>" alt="<?php esc_attr_e( 'Opstand van Woonblok Maashaven: vier verdiepingen met een raster van ramen, oranje dubbele entree op de begane grond, kade met water en een afgemeerd binnenvaartschip.', 'kadewerk' ); ?>" style="width:480px;height:auto"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p>02</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'Woonblok Maashaven', 'kadewerk' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php esc_html_e( '24 appartementen in een gesloten blok aan het water, waarvan 18 sociale huur.', 'kadewerk' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textColor":"secondary","fontSize":"small"} -->
<p class="has-secondary-color has-text-color has-small-font-size"><?php esc_html_e( 'Kop van Zuid · Woonblok · 2023', 'kadewerk' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:aludra/slide -->

<!-- wp:aludra/slide -->
<div class="wp-block-aludra-slide"><!-- wp:image {"width":"480px","sizeSlug":"large"} -->
<figure class="wp-block-image size-large is-resized"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/03-pakhuis-keilewerf.svg' ) ); ?>" alt="<?php esc_attr_e( 'Opstand van Pakhuis Keilewerf: pakhuis met trapgevel en metselverband, twee rijen kleine ramen, oranje laaddeur met hijsbalk, zaagdak-aanbouw en een binnenvaartschip aan de kade.', 'kadewerk' ); ?>" style="width:480px;height:auto"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p>03</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'Pakhuis Keilewerf', 'kadewerk' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Voormalig pakhuis met twaalf loftwoningen en vier ateliers op de begane grond.', 'kadewerk' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textColor":"secondary","fontSize":"small"} -->
<p class="has-secondary-color has-text-color has-small-font-size"><?php esc_html_e( 'Merwe-Vierhavens (M4H) · Transformatie pakhuis · 2021', 'kadewerk' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:aludra/slide -->

<!-- wp:aludra/slide -->
<div class="wp-block-aludra-slide"><!-- wp:image {"width":"480px","sizeSlug":"large"} -->
<figure class="wp-block-image size-large is-resized"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/04-de-hoeksteen.svg' ) ); ?>" alt="<?php esc_attr_e( 'Opstand van De Hoeksteen: voormalige kerk met schip en zadeldak, toren met spits, drie hoge vensters, oranje ingangsportaal, twee bomen en twee schaalfiguren.', 'kadewerk' ); ?>" style="width:480px;height:auto"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p>04</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'De Hoeksteen', 'kadewerk' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Voormalige kerk met acht woningen rond de lichtinval van het middenschip.', 'kadewerk' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textColor":"secondary","fontSize":"small"} -->
<p class="has-secondary-color has-text-color has-small-font-size"><?php esc_html_e( 'Delfshaven · Kerk → woningen · 2019', 'kadewerk' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:aludra/slide -->

<!-- wp:aludra/slide -->
<div class="wp-block-aludra-slide"><!-- wp:image {"width":"480px","sizeSlug":"large"} -->
<figure class="wp-block-image size-large is-resized"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/05-kadeblok-noordereiland.svg' ) ); ?>" alt="<?php esc_attr_e( 'Opstand van Kadeblok Noordereiland: vier panden met zadeldaken aan de kade, twee ramen per verdieping, één oranje deur en een binnenvaartschip in het water.', 'kadewerk' ); ?>" style="width:480px;height:auto"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p>05</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'Kadeblok Noordereiland', 'kadewerk' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Negen kadewoningen met kap en uitzicht op de Maas, direct aan de kade.', 'kadewerk' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textColor":"secondary","fontSize":"small"} -->
<p class="has-secondary-color has-text-color has-small-font-size"><?php esc_html_e( 'Noordereiland · 9 kadewoningen · 2022', 'kadewerk' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:aludra/slide -->

<!-- wp:aludra/slide -->
<div class="wp-block-aludra-slide"><!-- wp:image {"width":"480px","sizeSlug":"large"} -->
<figure class="wp-block-image size-large is-resized"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/06-de-bergweg.svg' ) ); ?>" alt="<?php esc_attr_e( 'Opstand van De Bergweg: voormalige school, blok van 30 meter breed met zaagdak en schoorsteen, een lange band van tien ramen, oranje dubbele entree, twee bomen en twee schaalfiguren.', 'kadewerk' ); ?>" style="width:480px;height:auto"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p>06</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'De Bergweg', 'kadewerk' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Voormalige basisschool, nu tien appartementen en een buurthuis in de zijvleugel.', 'kadewerk' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textColor":"secondary","fontSize":"small"} -->
<p class="has-secondary-color has-text-color has-small-font-size"><?php esc_html_e( 'Bergwegkwartier · School → wonen · 2020', 'kadewerk' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:aludra/slide --></div>
<!-- /wp:aludra/carousel --></div></div></div>
<!-- /wp:aludra/spine-section -->

<!-- wp:aludra/service-blocks -->
<div class="wp-block-aludra-service-blocks alignwide" style="margin-top:0;margin-bottom:0"><div class="service-blocks__inner"><!-- wp:paragraph {"className":"service-blocks__label"} -->
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

<!-- wp:aludra/split-section {"mediaWidth":46,"tint":true,"revealOnScroll":true} -->
<div class="wp-block-aludra-split-section alignfull is-tinted" data-aludra-reveal="true" style="margin-top:0;margin-bottom:0"><div class="split-section__shell"><div class="split-section__header"><p class="split-section__label"><?php esc_html_e( 'Studio', 'kadewerk' ); ?></p><h2 class="split-section__heading"><?php esc_html_e( 'Over het bureau', 'kadewerk' ); ?></h2><p class="split-section__lead"><?php esc_html_e( 'Bureau Kadewerk is in 2009 opgericht in Rotterdam. We zijn met zijn twaalven: architecten, een interieurontwerper, een technisch tekenaar en een projectleider. Sinds 2016 werken we vanuit een eigen pakhuis in Merwe-Vierhavens — het gebouw dat we zelf hebben getransformeerd.', 'kadewerk' ); ?></p></div><div class="split-section__panes" style="--aludra-split-media:46%"><!-- wp:group {"className":"split-section__media"} -->
<div class="wp-block-group split-section__media"><!-- wp:image -->
<figure class="wp-block-image"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/studio-kaart.svg' ) ); ?>" alt="<?php esc_attr_e( 'Schematische kaart van de Nieuwe Maas in Rotterdam: op de noordelijke oever Merwe-Vierhavens en Delfshaven, met de studio in oranje gemarkeerd aan de Keilestraat; in het oosten een brug over de Maas; op de zuidoever de Maashaven.', 'kadewerk' ); ?>"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"textColor":"secondary","fontSize":"small"} -->
<p class="has-secondary-color has-text-color has-small-font-size"><?php esc_html_e( 'Fig. 02 — De studio zit aan de Keilestraat in Merwe-Vierhavens, Rotterdam-West (Delfshaven).', 'kadewerk' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"split-section__content"} -->
<div class="wp-block-group split-section__content"><!-- wp:list -->
<ul class="wp-block-list"><!-- wp:list-item -->
<li><?php esc_html_e( 'Opgericht — 2009, Rotterdam', 'kadewerk' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php esc_html_e( 'Team — 12 mensen', 'kadewerk' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php esc_html_e( 'Studio — Eigen pakhuis, Keilestraat 9F, M4H', 'kadewerk' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php esc_html_e( 'Werkgebied — Rotterdam en regio', 'kadewerk' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php esc_html_e( 'Werkvelden — Wonen · transformatie · interieur', 'kadewerk' ); ?></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'We werken voor particulieren en woningcorporaties. Nieuwbouw villa’s en woonblokken, maar ook de transformatie van pakhuizen, kerken en scholen. Wat al die projecten gemeen hebben: daglicht, een heldere constructie en een gebouw dat bij de straat past.', 'kadewerk' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div></div></div>
<!-- /wp:aludra/split-section -->

<!-- wp:aludra/testimonial-grid -->
<div class="wp-block-aludra-testimonial-grid alignfull" style="margin-top:0;margin-bottom:0" data-slick="{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:1,&quot;arrows&quot;:true,&quot;dots&quot;:true,&quot;infinite&quot;:true,&quot;autoplay&quot;:false,&quot;autoplaySpeed&quot;:3000,&quot;speed&quot;:300,&quot;adaptiveHeight&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:768,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1}}]}" data-dots-bottom="-45px" data-slide-spacing="12" data-arrow-color="#1a1a1a" data-arrow-background="#d4ecf5" data-arrow-hover-color="#000000" data-arrow-hover-background="#d4ecf5"><!-- wp:group {"className":"testimonial-grid__card","style":{"spacing":{"padding":{"top":"2.5rem","right":"2.5rem","bottom":"2.5rem","left":"2.5rem"}},"border":{"radius":"12px"}},"backgroundColor":"base"} -->
<div class="wp-block-group testimonial-grid__card has-base-background-color has-background" style="border-radius:12px;padding-top:2.5rem;padding-right:2.5rem;padding-bottom:2.5rem;padding-left:2.5rem"><!-- wp:paragraph {"className":"testimonial-grid__quote","style":{"typography":{"fontStyle":"italic","lineHeight":"1.6"},"spacing":{"margin":{"bottom":"1.5rem"}}},"textColor":"main","fontSize":"large"} -->
<p class="testimonial-grid__quote has-main-color has-text-color has-large-font-size" style="margin-bottom:1.5rem;font-style:italic;line-height:1.6"><?php esc_html_e( 'Ze luisterden eerst en tekenden daarna. Het ontwerp past bij ons én bij de straat — en de bouw verliep zonder verrassingen.', 'kadewerk' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"testimonial-grid__author","style":{"typography":{"fontWeight":"600","lineHeight":"1.4"},"spacing":{"margin":{"bottom":"0.25rem"}}},"textColor":"primary","fontSize":"base"} -->
<p class="testimonial-grid__author has-primary-color has-text-color has-base-font-size" style="margin-bottom:0.25rem;font-weight:600;line-height:1.4"><?php esc_html_e( 'J. van der Laan', 'kadewerk' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"testimonial-grid__company","style":{"typography":{"lineHeight":"1.4"},"spacing":{"margin":{"bottom":"1rem"}}},"textColor":"secondary","fontSize":"small"} -->
<p class="testimonial-grid__company has-secondary-color has-text-color has-small-font-size" style="margin-bottom:1rem;line-height:1.4"><?php esc_html_e( 'particulier, Villa Veldzicht (Kralingen)', 'kadewerk' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:aludra/testimonial-grid -->

<!-- wp:aludra/contact-section -->
<div class="wp-block-aludra-contact-section alignfull" style="margin-top:0;margin-bottom:0"><div class="contact-section__inner"><!-- wp:group {"className":"contact-section__intro","style":{"spacing":{"blockGap":"16px"}},"layout":{"type":"constrained"}} -->
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
<div class="wp-block-group cs-detail__icon"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","metadata":{"bindings":{"url":{"source":"aludra/icon","args":{"path":"icon-map.svg"}}}}} -->
<figure class="wp-block-image size-full"><img src="" alt="<?php esc_attr_e( 'Bezoekadres', 'kadewerk' ); ?>"/></figure>
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
<div class="wp-block-group cs-detail__icon"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","metadata":{"bindings":{"url":{"source":"aludra/icon","args":{"path":"icon-mail.svg"}}}}} -->
<figure class="wp-block-image size-full"><img src="" alt="<?php esc_attr_e( 'E-mail', 'kadewerk' ); ?>"/></figure>
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
<div class="wp-block-group cs-detail__icon"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","metadata":{"bindings":{"url":{"source":"aludra/icon","args":{"path":"icon-chat.svg"}}}}} -->
<figure class="wp-block-image size-full"><img src="" alt="<?php esc_attr_e( 'Telefoon', 'kadewerk' ); ?>"/></figure>
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
<div class="wp-block-group cs-detail__icon"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","metadata":{"bindings":{"url":{"source":"aludra/icon","args":{"path":"icon-clock.svg"}}}}} -->
<figure class="wp-block-image size-full"><img src="" alt="<?php esc_attr_e( 'Bereikbaar', 'kadewerk' ); ?>"/></figure>
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

<!-- wp:aludra/cta-banner -->
<div class="wp-block-aludra-cta-banner alignfull" style="margin-top:0;margin-bottom:0"><div class="cta-banner__content"><!-- wp:heading {"className":"cta-banner__title","style":{"typography":{"lineHeight":"1.2"}}} -->
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
