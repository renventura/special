<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Special_Theme
 */

if ( ! function_exists( 'special_breadcrumbs' ) ) :

	/**
	 * Print out breadcrumns, supported by Yoast SEO plugin
	 */
	function special_breadcrumbs() {
		if ( function_exists( 'yoast_breadcrumb' ) ) {
			yoast_breadcrumb( '<div id="breadcrumbs">',' </div> ');
		}
	}

endif;

if ( ! function_exists( 'special_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function special_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'special' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'special' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'special_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function special_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'special' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<div class="cat-links">' . esc_html__( 'Posted in %1$s', 'special' ) . '</div>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'special' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<div class="tags-links">' . esc_html__( 'Tagged %1$s', 'special' ) . '</div>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'special' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( ' Edit <span class="screen-reader-text">%s</span>', 'special' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;


if ( ! function_exists( 'special_post_archive_thumbnail' ) ) :

/**
 *	Output the post thumbnail
 */
function special_post_archive_thumbnail() {

	$image = get_the_post_thumbnail_url( null, 'full' );
	
	if ( $image ) {
		printf( '<a href="%s" itemprop="url"><img itemprop="thumbnailUrl" src="%s" class="personaltheme-post-archive-thumbnail" alt="%s" /></a>', get_permalink(), $image, __( 'Post Thumbnail', 'personaltheme' ) );
	}
}

endif;



if ( ! function_exists( 'special_header_hero' ) ) :

/**
 *	Output the post thumbnail
 */
function special_header_hero( $args ) { ?>

	<div id="hero" class="backstretch overlay" style="background-image: url('<?php echo $args['thumbnail']; ?>')">
		
		<div id="hero_wrap">

			<?php if ( is_front_page() ) : ?>

				<h2 id="hero_title">Ren Ventura</h2>
				
				<div id="hero_content">Web Developer. Problem solver.</div>

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
	
<?php }
add_action( 'special_header_end', 'special_header_hero' );

endif;



if ( ! function_exists( 'special_logo_nav' ) ) :

function special_logo_nav() { ?>

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

<?php }
add_action( 'special_header_start', 'special_logo_nav' );

endif;



if ( ! function_exists( 'special_footer' ) ) :

function special_footer() { ?>

	<div class="pre-footer">
		<h3><?php _e( 'Ready to dicsuss your business?', 'personaltheme' ); ?></h3>
		<p>Let's figure out a way for you to meet your goals.</p>
		<a href="/#contact" class="button button-round cta-button"><?php _e( 'Send Me a Message', 'personaltheme' ); ?></a>
	</div>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'special' ) ); ?>"><?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'special' ), 'WordPress' );
			?></a>
			<span class="sep"> | </span>
			<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'special' ), 'special', '<a href="https://renventura.com">Ren Ventura</a>' );
			?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->

<?php }
add_action( 'special_footer', 'special_footer' );

endif;





