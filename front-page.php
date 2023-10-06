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

$posts = get_posts( array(
	'post_type' => 'post',
	'posts_per_page' => 3
) );

get_header(); ?>

	<div id="primary" class="content-area">

		<main id="main" class="site-main">

			<div class="section full-width centered intro">

				<div class="content">
					
					<div class="row">
						
						<div class="text">

							<h4 class="section-subtitle">
								Hey, I'm Ren
							</h4>

							<h2 class="section-title"><span class="gradient-underline">Web and Software Engineer</span> in the U.S.A.</h2>

							<p class="">
								<span class="bold">TLDR:</span> Making buttons look nice, integrating 3rd party APIs, and everything in between.
							</p>

							<p class="">
								<span class="bold">Fancy:</span> I develop web and software solutions to solve complexities for modern organizations. My primary goal is to put more money in your pocket by engineering technology solutions that fit your business.
							</p>

						</div>

						<!-- <img src="<?php echo home_url( 'wp-content/uploads/2017/09/headshot-frames.png' ); ?>" alt=""> -->

					</div>

				</div>
				
			</div>

			<div class="section full-width centered backstretch overlay" style="background-image: url(<?php echo home_url( 'wp-content/webp-express/webp-images/uploads/2017/09/programmer-imac.jpg.webp' ); ?>);">

				<div class="content">
					
					<h2 class="section-title">Skilled. Experienced.</h2>

					<h4 class="section-subtitle">
						<strong><em><?php echo (int) date( 'Y' ) - 2012; ?> years of experience</em></strong> with...
					</h4>

					<div class="icons">

						<p>HTML5/CSS3, JavaScript, PHP, SQL, Remote APIs, Email Design, WordPress and WooCommerce</p>
						
						<?php include_once 'images/html5.svg'; ?>
						<?php include_once 'images/javascript.svg'; ?>
						<?php include_once 'images/mysql.svg'; ?>
						<?php include_once 'images/php.svg'; ?>
						<?php include_once 'images/wordpress.svg'; ?>
						<?php include_once 'images/woocommerce.svg'; ?>

					</div>

				</div>
				
			</div>

			<div class="section centered center-content">
				<div class="content">
					<h4 class="section-subtitle">
						Why me?
					</h4>
					<h2 class="section-title">Personal. Practical. <span class="gradient-underline">Results-driven.</span></h2>
					When you need attention, you get it right from the person handling the project. I'm not an agency, so I don't have project managers, or customer service people. I work hand-in-hand with my clients to deliver quality results with a personalized experience.
				</div>
			</div>

			<div class="section full-width centered backstretch overlay codeable" style="background-image: url(<?php echo home_url( 'wp-content/webp-express/webp-images/uploads/2018/10/codeable-header.jpg.webp' ); ?>);">

				<div class="content">

					<h2 class="section-title">Certified WordPress Expert.</h2>

					<h4 class="section-subtitle">
						Certified WordPress Expert with 5-star rating on Codeable
					</h4>

					<a href="https://renventura.com/go/codeable/" target="_blank">Codeable</a> is the place to find the "creme de la creme" of WordPress developers. They accept only 2% of applicants, so the Codeable devs know their stuff. They even gave me this totally legit <a href="https://renventura.com/wp-content/uploads/codeable-certificate-2021.pdf" target="_blank">certificate</a>!

				</div>

			</div>

			<div class="section centered testimonials">
				<h2 class="section-title">What My Clients Say...</h2>
				<div class="testimonials-list">
					<div class="testimonial">
						<div class="testimonial__text">
							<p class="testimonial-emphasis">Ren went above and beyond the call of duty to make sure the entire project was finished in a timely matter and what I wanted.</p>
							<p>Ren also recommended new ideas that would save time and money even though he had to benefit from the extra cash. 5 Star all the way!!</p>
						</div>
						<div class="testimonial__author">
							<div class="testimonial__author__image">
								<img width="300" height="300" src="https://storage.googleapis.com/avatars-production.codeable.io/64821/medium_64ddba667a7f3c485bf6a6484c04e4bd.png" class="attachment-medium size-medium" alt="" loading="lazy" title="Christian Zilles | Social Media HQ">
							</div>
							<div class="testimonial__author__info">
								<div class="testimonial__author__name">Christian Zilles</div>
								<div class="testimonial__author__company">Social Media HQ</div>
								<div class="testimonial__star-rating">
									<div class="stars">
										<div class="star"></div>
										<div class="star"></div>
										<div class="star"></div>
										<div class="star"></div>
										<div class="star"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="testimonial">
						<div class="testimonial__text">
							<p>Ren was hired on to create a fully-custom WordPress based blog theme. Ren took this project and ran with it, fully understand the requirements in only 4-5 conversations, over 3 days. Not only did Ren provide a seamless experience; he also provided the highest quality work I have previously experienced. The task was completed in just over a week, with first & final deliverables being perfect. The site absolutely smashed any audit that it was challenged to, & both mobile & desktop iterations were flawless. I would rate this as one of the best web developer experiences of my career. Thanks Ren!</p>
						</div>
						<div class="testimonial__author">
							<div class="testimonial__author__image">
								<img width="300" height="300" src="https://storage.googleapis.com/avatars-production.codeable.io/41271/medium_d81ec64f991190cbd1e42f6b0eb0e150.png" class="attachment-medium size-medium" alt="" loading="lazy" title="Andrew Weaver | via Codeable">
							</div>
							<div class="testimonial__author__info">
								<div class="testimonial__author__name">Andrew Weaver</div>
								<div class="testimonial__author__company">via Codeable</div>
								<div class="testimonial__star-rating">
									<div class="stars">
										<div class="star"></div>
										<div class="star"></div>
										<div class="star"></div>
										<div class="star"></div>
										<div class="star"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="testimonial">
						<div class="testimonial__text">
							<p>Ren was incredibly quick and efficient with his solution, as well as bringing to my attention other potential pitfalls that I might face with the project so that they could be addressed. Will definitely seek him out again for more WooCommerce customisation!</p>
						</div>
						<div class="testimonial__author">
							<div class="testimonial__author__image">
								<img width="300" height="300" src="https://storage.googleapis.com/avatars-production.codeable.io/49538/medium_337ad5135e432b816fb0d0b6d50f4341.png" class="attachment-medium size-medium" alt="" loading="lazy" title="Lexi Black | via Codeable">
							</div>
							<div class="testimonial__author__info">
								<div class="testimonial__author__name">Lexi Black</div>
								<div class="testimonial__author__company">via Codeable</div>
								<div class="testimonial__star-rating">
									<div class="stars">
										<div class="star"></div>
										<div class="star"></div>
										<div class="star"></div>
										<div class="star"></div>
										<div class="star"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div id="services" class="section full-width service">
				<div class="content">
					<div class="row">
						<div class="text one-half first">
							<h4 class="section-subtitle">
								Development & Consulting
							</h4>
							<h2 class="section-title">Build Your Brand</h2>
							As a business owner/manager, you are focused on building a successful brand, saving time, and increasing profit. Whether it's a complete overhaul of your website, customizing your checkout experience, or integrating it with a 3rd party API to automate tedious tasks - I can craft a solution to help you achieve your goals.
						</div>
						<div class="image top one-third">
							<?php include_once 'images/web-design.svg'; ?>
						</div>
					</div>
				</div>
			</div>

			<div class="section full-width service">
				<div class="content">
					<div class="row">
						<div class="image top one-third first">
							<?php include_once 'images/ecommerce.svg'; ?>
						</div>
						<div class="text one-half">
							<h4 class="section-subtitle">
								E-Commerce Solutions
							</h4>
							<h2 class="section-title">Sell Your Products</h2>
							Want to accept payment for your products or services online? E-commerce applications are more important than ever. 80% of Americans make online purchases, and 15% do so on a weekly basis. With younger generations, these numbers will only continue to rise. Make sure your business keeps up with modern purchasing trends.
						</div>
					</div>
				</div>
			</div>

			<div class="section full-width service">
				<div class="content">
					<div class="row">
						<div class="text one-half first">
							<h4 class="section-subtitle">
								Speed and SEO
							</h4>
							<h2 class="section-title">Boost Your Performance</h2>
							Website failing on Google? In the red on Page Speed Insights? Page speed is one of the most critical parts of ranking well in Google. I will help you get from red to green, from Fs to As.
						</div>
						<div class="image top one-third">
							<?php include_once 'images/seo.svg'; ?>
						</div>
					</div>
				</div>
			</div>

			<div id="work" class="section full-width center-content">

				<div class="content">

					<h2 class="section-title">Recent Work</h2>

					<h4 class="section-subtitle">
						Here are a few of <a href="<?php echo get_home_url( null, '/projects' ); ?>">my projects</a> for you to take a look.</a>
					</h4>

					<?php
						$projects = new WP_Query( array(
							'post_type' => 'portfolio',
							'posts_per_page' => 3,
						) );

						if ( $projects->have_posts() ) : $count = 0; ?>

							<div class="projects">

								<div class="row" style="padding: 0;">

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
												<a href="<?php the_permalink(); ?>" itemprop="url"><img itemprop="thumbnailUrl" src="<?php echo $thumb['url']; ?>" alt="<?php echo $thumb['alt']; ?>" width="363px" height="209px"></a>
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

			<div class="section front-posts-section center-content">
				<h2 class="section-title">Latest from the Blog</h2>
				<h4 class="section-subtitle">Some recent <a href="<?php echo home_url( 'blog' ); ?>">blog posts</a> for cheap entertainment.</h4>
				<div class="front-posts">
					<?php foreach ( $posts as $post ) : ?>
						<div class="post">
							<a href="<?php echo get_the_permalink( $post->ID ); ?>">
								<div class="post__image"><?php echo get_the_post_thumbnail( $post->ID, 'front-page-post' ); ?></div>
								<div class="post__date"><?php echo get_the_date( 'F j, Y', $post ); ?></div>
								<div class="post__title"><?php echo get_the_title( $post ); ?></div>
							</a>
						</div>
					<?php endforeach; ?>
				</div>
			</div>

			<div class="section full-width backstretch overlay centered" style="background-image: url(<?php echo home_url( 'wp-content/webp-express/webp-images/uploads/2017/09/donuts-1024x683.jpg.webp' ); ?>);">
				
				<div class="content">
					
					<div class="row">
						
						<div class="one-half first">
							<h3 class="section-title">About Me</h3>
							<p>Senior Software Engineer.</p>
							<p>Started developing software in 2012.</p>
							<p>Went to law school. I prefer Javascript.</p>
						</div>
						<div class="one-half">
							<h3 class="section-title">Random Facts</h3>
							<p>Semi-professional amateur chef.</p>
							<p>Mediocre wood-worker.</p>
							<p>Addicted to donuts.</p>
						</div>

					</div>

				</div>

			</div>

			<div id="contact" class="section full-width centered center-content contact" style="text-align: center;">
				
				<div class="content">
					
					<h2 class="section-title">Get in touch</h2>
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
