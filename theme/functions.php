<?php
/**
 * Kadewerk functions and definitions
 *
 * Forked from the Aviendha starter theme for Bureau Kadewerk.
 *
 * @package Kadewerk
 * @since   1.0.0
 */

namespace Kadewerk;

defined( 'ABSPATH' ) || exit;

/**
 * Set up theme defaults and register WordPress features.
 */
function kadewerk_setup() {
	// Make theme available for translation.
	load_theme_textdomain( 'kadewerk', get_template_directory() . '/languages' );

	// Enqueue editor styles (the design system lives in theme.json, the
	// component CSS in style.css).
	add_editor_style( 'style.css' );

	add_theme_support( 'block-templates' );
	add_theme_support( 'block-template-parts' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'title-tag' );
	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
	);
}
add_action( 'after_setup_theme', __NAMESPACE__ . '\\kadewerk_setup' );

/**
 * Enqueue theme styles.
 */
function kadewerk_enqueue_styles() {
	wp_enqueue_style(
		'kadewerk-style',
		get_template_directory_uri() . '/style.css',
		array(),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\kadewerk_enqueue_styles' );

/**
 * Register the block pattern category used by the kadewerk/* patterns.
 */
function kadewerk_register_pattern_categories() {
	register_block_pattern_category(
		'kadewerk',
		array( 'label' => __( 'Kadewerk', 'kadewerk' ) )
	);
}
add_action( 'init', __NAMESPACE__ . '\\kadewerk_register_pattern_categories' );
