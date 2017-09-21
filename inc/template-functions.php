<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Special_Theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function special_body_classes( $classes ) {
	
	global $post;
	
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// If post has a featured image
	if ( is_singular() && has_post_thumbnail() ) {
		$classes[] = 'post-thumbnail';
	}

	// If logo image is set
	if ( get_custom_logo() ) {
		$classes[] = 'custom-logo';
	}

	// Catch-all for singular posts/pages/cpts
	if ( is_singular() ) {
		$classes[] = 'singular';
	} else {
		$classes[] = 'not-singular';
	}

	return $classes;
}
add_filter( 'body_class', 'special_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function special_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'special_pingback_header' );
