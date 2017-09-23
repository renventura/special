<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Special_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">

		<main id="main" class="site-main">

			<div class="section full-width">

				<div class="content">
					
					<div class="row">
						
						<div class="text two-thirds first">
							
							<h2 class="section-title">Hey, I'm Ren</h2>

							<h4 class="section-subtitle">
								Web and Software Developer in Cleveland, Ohio
							</h4>

							<p class="wow fadeInUp">
								I develop web and software solutions for complexities facing modern businesses. I live for what I do. When I'm not "working", I'm either learning new skills, or cooking (and eating, of course).
							</p>

						</div>

						<div class="image one-third top">

							<img src="https://renventura.com/wp-content/uploads/2017/09/headshot-frames.png" alt="">
							
						</div>

					</div>

				</div>
				
			</div>

			<div class="section full-width centered backstretch overlay" style="background-image: url('https://renventura.com/wp-content/uploads/2017/09/programmer-imac.jpg');">

				<div class="content">
					
					<h2 class="section-title">Skilled. Experienced.</h2>

					<h4 class="section-subtitle">
						Some modern tools I've worked with over the years.
					</h4>

					<div class="wow fadeInUp icons">

						<p>HTML5/CSS3, JavaScript, PHP, Email Design, WordPress and WooCommerce</p>
						
						<?php include_once 'images/html5.svg'; ?>
						<?php include_once 'images/javascript.svg'; ?>
						<?php include_once 'images/php.svg'; ?>
						<?php include_once 'images/wordpress.svg'; ?>
						<?php include_once 'images/woocommerce.svg'; ?>

					</div>

				</div>
				
			</div>

			<div id="work" class="section full-width centered">

				<div class="content">

					<h2 class="section-title">Recent Work</h2>

					<h4 class="section-subtitle">
						Here are a few of my projects for you to take a look.
					</h4>
					
					<?php
						$projects = new WP_Query( array(
							'post_type' => 'portfolio',
							'posts_per_page' => 3,
						) );

						if ( $projects->have_posts() ) : $count = 0; ?>

							<div class="projects">

								<div class="row wow fadeInUpBig" style="padding: 0;">
								
									<?php while ( $projects->have_posts() ) : $projects->the_post(); ?>

										<?php
											$thumb = get_field( 'archive_thumbnail' );
											$terms = array();
											foreach ( get_the_terms( get_the_id(), 'portfolio_cat' ) as $term ) {
												$terms[] = $term->name;
											}
											$terms = implode( ', ', $terms );
										?>

										<div class="one-third <?php if ( $count === 0 ) echo 'first'; ?>">
											<div class="project" itemscope itemtype="http://schema.org/CreativeWork">
												<a href="<?php the_permalink(); ?>" itemprop="url"><img itemprop="thumbnailUrl" src="<?php echo $thumb['url']; ?>" alt="<?php echo $thumb['alt']; ?>"></a>
												<a href="<?php the_permalink(); ?>" itemprop="url"><h3 itemprop="title" class="archive-title"><?php the_title(); ?></h3></a>
												<div class="archive-terms"><?php echo $terms; ?></div>
											</div>
										</div>

									<?php $count++; endwhile; ?>

								</div>

							</div>

						<?php endif;

						wp_reset_postdata();
					?>

				</div>
				
			</div>

			<div class="section full-width">
				<iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6120069.22736771!2d-86.18829027705978!3d41.49744701508516!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8830ef2ee3686b2d%3A0xed04cb55f7621842!2sCleveland%2C+OH!5e0!3m2!1sen!2sus!4v1504892025277" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>

			<div class="section full-width centered backstretch overlay" style="background-image: url('https://renventura.com/wp-content/uploads/2017/09/donuts.jpg');">
				
				<div class="content">
					
					<div class="row">
						
						<div class="one-half first wow slideInLeft">
							<h2 class="section-title">About Me</h2>
							<p>Started developing software in 2012</p>
							<p>Graduated Cleveland State University in 2015</p>
							<p>Code is my passion, hobby, and relaxer</p>
						</div>
						<div class="one-half wow slideInRight">
							<h2 class="section-title">Random Facts</h2>
							<p>I love suits (and ties), a lot!</p>
							<p>Country music all day long</p>
							<p>Donuts are my favorite thing in life</p>
						</div>

					</div>

				</div>

			</div>

			<div id="contact" class="section" style="text-align: center;">
				
				<div class="content">
					
					<h2 class="section-title">Get in touch</h2>
					<a href="https://twitter.com/CLE_Ren" target="_blank" rel="noopener noreferrer"><?php include get_stylesheet_directory() . '/images/twitter.svg'; ?></a>
					<a href="https://github.com/renventura" target="_blank" rel="noopener noreferrer"><?php include get_stylesheet_directory() . '/images/github.svg'; ?></a>
					<a href="https://www.linkedin.com/in/renventura/" target="_blank" rel="noopener noreferrer"><?php include get_stylesheet_directory() . '/images/linkedin.svg'; ?></a>
					<div class="excerpt contact-form">
						<?php echo do_shortcode( '[ninja_form id=1]' ); ?>
					</div>

				</div>

			</div>

		</main><!-- #main -->

	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
