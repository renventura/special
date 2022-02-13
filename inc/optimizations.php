<?php

add_action( 'wp_print_styles', 'mp_deregister_styles', 100 );
/**
 * Remove styles
 *
 * @return void
 */
function mp_deregister_styles() {
	
	// Logged-in users with admin access need this for the admin bar to work
	if ( ! current_user_can( 'edit_posts' ) ) {
		wp_deregister_style( 'dashicons' );
	}
	
	// Blog post scripts
	/* if ( ! is_singular( 'post' ) ) {
		wp_dequeue_script( 'genesis-simple-share-plugin-js' );
		wp_dequeue_style( 'genesis-simple-share-plugin-css' );
		wp_dequeue_style( 'genesis-simple-share-genericons-css' );
		wp_dequeue_script( 'genesis-simple-share-waypoint-js' );
	} */
}

add_action( 'wp_default_scripts', 'mp_remove_jquery_migrate' );
/**
 * Remove jQuery Migrate
 *
 * @param object $scripts
 *
 * @return void
 */
function mp_remove_jquery_migrate( $scripts ) {
	if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
		$script = $scripts->registered['jquery'];
		
		if ( $script->deps ) {
			$script->deps = array_diff( $script->deps, array(
				'jquery-migrate'
			) );
		}
	}
}

add_action( 'wp_footer', 'mp_deregister_scripts' );
/**
 * Remove scripts
 *
 * @return void
 */
function mp_deregister_scripts() {
	// Remove embed script
	wp_deregister_script( 'wp-embed' );
}

// Remove emoji scripts
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );	
remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

// Remove other stuff from head
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'start_post_rel_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'adjacent_posts_rel_link' );

// Remove block stuff on pages that don't have blocks
add_action( 'wp_enqueue_scripts', function() {

	global $post;

	$blocks = [];

	if ( ! empty( $post->ID ) ) {
		$content = get_the_content( null, false, $post );
		$blocks = parse_blocks( $content );
	}

	if ( empty( $blocks ) || is_archive() || is_home() || is_author() ) {
		wp_dequeue_style( 'wp-block-library' );
		wp_dequeue_style( 'wp-block-library-theme' );
		wp_dequeue_style( 'wc-blocks-style' );
	}

}, 100 );

add_filter( 'genesis_attr_entry-image', 'mp_genesis_attributes_entry_image' );
/**
 * Preload featured image
 *
 * @param array $atts
 *
 * @return array
 */
function mp_genesis_attributes_entry_image( $atts ) {
	$atts['rel'] = 'preload';
	return $atts;
}