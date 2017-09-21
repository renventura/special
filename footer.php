<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Special_Theme
 */

?>

	</div><!-- #content -->

	<div class="pre-footer">
		<h3><?php _e( 'Ready to dicsuss your business?', 'personaltheme' ); ?></h3>
		<p>Let's talk about putting web and mobile technology to work for you.</p>
		<a href="/#contact" class="button button-round cta-button"><?php _e( 'Get In Touch', 'personaltheme' ); ?></a>
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
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
