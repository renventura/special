<?php
/**
 * Template Name: Landing Page
 */

remove_action( 'special_header_start', 'special_logo_nav' );
remove_action( 'special_header_end', 'special_header_hero' );
remove_action( 'special_footer', 'special_footer' );

function special_body_classes_landing_page( $classes ) {
	
	$classes[] = 'landing-page';

	return $classes;
}
add_filter( 'body_class', 'special_body_classes_landing_page' );


function special_landing_page_scripts() {
	wp_enqueue_style( 'landing-page', get_stylesheet_directory_uri() . '/css/landing-page.min.css' );
}
add_action( 'wp_enqueue_scripts', 'special_landing_page_scripts' );

get_header(); ?>

	<main class="landing-page">
		
		<?php if ( have_rows( 'landing_page_sections' ) ) : ?>

			<?php while ( have_rows('landing_page_sections') ) : the_row(); ?>

				<?php if ( get_row_layout() == 'full_width_section' ) : ?>

					<?php
						$classes = ['landing-section'];
						$styles = [];

						if ( $bg_img = get_sub_field( 'background_image' ) )  {
							$classes[] = 'backstretch';
							$styles[] = "background-image: url({$bg_img['url']});";
						}

						if ( $bg_color = get_sub_field( 'background_color' ) ) {
							$styles[] = "background-color: {$bg_color};";
						}

						if ( $content_color = get_sub_field( 'content_color' ) ) {
							$styles[] = "color: {$content_color};";
						}

						$classes = implode( ' ', $classes );
						$styles = implode( ' ', $styles );
					?>

					<section class="<?php echo $classes; ?>" style="<?php echo $styles; ?>">
						<div class="content">
							<?php the_sub_field( 'content' ); ?>
						</div>
					</section>

				<?php endif; ?>

			<?php endwhile; ?>

		<?php else : ?>

			<?php // no layouts found ?>

		<?php endif; ?>

	</main>

<?php
get_sidebar();
get_footer();