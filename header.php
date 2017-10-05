<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Special_Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="body_wrapper" class="site">

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'special' ); ?></a>

	<div id="offcanvas">
		<button id="close-offcanvas" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Close Menu', 'personaltheme' ); ?></button>
	</div>

	<header id="masthead" class="site-header">
		
		<div id="header_wrap">

			<?php
				global $post;
				$thumbnail = 'https://renventura.com/wp-content/uploads/2017/09/desk-apple-products.jpg';
				if ( $featured_url = get_the_post_thumbnail_url( $post->id, 'full' ) ) {
					$thumbnail = $featured_url;
				}
			?>
			
			<?php do_action( 'special_header_start', array( 'post' => $post, 'thumbnail' => $thumbnail ) ); ?>

			<?php do_action( 'special_header_end', array( 'post' => $post, 'thumbnail' => $thumbnail ) ); ?>

		</div>

	</header><!-- #masthead -->

	<div id="content_wrapper" class="site-content">
