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
			
			<div id="logo_nav_wrap" data-sticky-header="enabled">
				
				<div id="logo" class="site-branding">
					<?php
					the_custom_logo();
					if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
					endif;

					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
					<?php
					endif; ?>
				</div><!-- .site-branding -->

				<nav id="site-navigation" class="main-navigation">
					<button id="open-offcanvas" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'special' ); ?></button>
					<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary_menu',
						) );
					?>
				</nav><!-- #site-navigation -->

			</div>

			<?php
				global $post;
				$thumbnail = 'https://renventura.com/wp-content/uploads/2017/09/desk-apple-products.jpg';
				if ( $featured_url = get_the_post_thumbnail_url( $post->id, 'full' ) ) {
					$thumbnail = $featured_url;
				}
			?>

			<div id="hero" class="backstretch overlay" style="background-image: url('<?php echo $thumbnail; ?>')">
				
				<div id="hero_wrap">

					<?php if ( is_front_page() ) : ?>

						<h2 id="hero_title">Ren Ventura</h2>
						
						<div id="hero_content">Software Developer. Problem solver.</div>

					<?php elseif ( is_singular() ) : ?>

						<div id="hero_content">
							<?php the_excerpt(); ?>
						</div>

					<?php elseif ( is_home() ) : ?>

						<h2 id="hero_title">The Blog</h2>

					<?php elseif ( is_archive() ) : ?>

						<?php if ( is_archive( 'portfolio' ) && ! is_tax( 'portfolio_cat' ) ) : ?>
							<h2 id="hero_title">Portfolio</h2>
							<div id="hero_content">Some projects I've worked on over the years.</div>
						<?php else: ?>
							<h2 id="hero_title"><?php echo str_ireplace( array( ': ', 'archive', 'category' ), '', get_the_archive_title() ); ?></h2>
							<?php the_archive_description( '<div id="hero_content">', '</div>' ); ?>
						<?php endif; ?>

					<?php endif; ?>

				</div>

			</div>

		</div>

	</header><!-- #masthead -->

	<div id="content_wrapper" class="site-content">
