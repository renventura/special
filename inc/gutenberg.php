<?php
/**
* Add support for Gutenberg.
*
* @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
*/


/**
 * Gutenberg setup/supports.
 */
function special_gutenberg_setup() {

	add_theme_support( 'align-wide' );

	add_theme_support( 'editor-color-palette',
		array(
			'color' => '#5640FA',
		),
		array(
			'color' => '#2BD0F8',
		),
		array(
			'color' => '#F0F4FB',
		)
	);
}
add_action( 'after_setup_theme', 'special_gutenberg_setup' );


/**
 * Adds a `gutenberg` class to the posts using Gutenberg.
 */
function special_gutenberg_body_class( $classes ) {

	if ( function_exists( 'the_gutenberg_project' ) && gutenberg_post_has_blocks( get_the_ID() ) ) {
		$classes[] = 'gutenberg';
	}

	return $classes;
}
add_action( 'body_class', 'special_gutenberg_body_class' );


/**
 * Enqueue styles for the Editor.
 */
function special_gutenberg_editor() {
	// wp_enqueue_style( 'theme-slug-editor-style', get_stylesheet_directory_uri() . '/assets/css/editor-style.css' );
}
add_action( 'enqueue_block_editor_assets', 'special_gutenberg_editor' );