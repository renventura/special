<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Special_Theme
 */

?>

<div class="section">
	
	<div class="content">
		
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
			<header class="entry-header">
				<?php if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<?php special_posted_on(); ?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
				<?php
					if ( is_singular() ) :
						special_breadcrumbs();
						the_title( '<h1 class="entry-title">', '</h1>' );
					else :
						// special_post_archive_thumbnail();
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					endif;

					?>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php
					if ( ! is_singular() ) {
						the_excerpt();
						printf( '<p><a href="%s" class="button button-round readmore">%s</a></p>', get_permalink(), __( 'Continue reading', 'special' ) );
					} else {
						the_content( sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'special' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							get_the_title()
						) );
					}

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'special' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->

			<footer class="entry-footer">
				<?php special_entry_footer(); ?>
			</footer><!-- .entry-footer -->
			
		</article><!-- #post-<?php the_ID(); ?> -->
	
	</div>

</div>