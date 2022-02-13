<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Special_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">

		<main id="main" class="site-main">

			<?php
				if ( have_posts() ) :

					$count = 0;

					/* Start the Loop */
					while ( have_posts() ) : the_post();

						$thumb = get_field( 'archive_thumbnail' );
						$terms = array();
						foreach ( get_the_terms( get_the_id(), 'portfolio_cat' ) as $term ) {
							$terms[] = sprintf( '<a href="%s" class="portfolio-category">%s</a>', get_term_link( $term->term_id ), $term->name );
						}
						$terms = implode( ' ', $terms );

						?>
							
							<div class="section projects archive-projects">
								
								<div class="content">
									
									<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'project' ) ); ?>>

										<div class="entry-content" itemscope itemtype="http://schema.org/CreativeWork">
											<div class="row">
												<div class="one-third first">
													<a href="<?php the_permalink(); ?>" itemprop="url" class="image-link"><img itemprop="thumbnailUrl" src="<?php echo $thumb['url']; ?>" width="316px" alt="<?php echo $thumb['alt']; ?>"></a>
													<div class="archive-terms"><?php echo $terms; ?></div>
												</div>
												<div class="two-thirds">
													<a href="<?php the_permalink(); ?>" itemprop="url"><h3 itemprop="title" class="archive-title"><?php the_title(); ?></h3></a>
													<div class="excerpt"><?php the_excerpt(); ?></div>
													<p><a href="<?php the_permalink(); ?>" class="button" style="display: inline-block;">View Project</a></p>
												</div>
											</div>
										</div><!-- .entry-content -->
										
									</article><!-- #post-<?php the_ID(); ?> -->
								
								</div>

							</div>
						
						<?php $count++;

					endwhile;

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
			?>

		</main><!-- #main -->

	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
