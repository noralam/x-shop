<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package X_Shop
 */

?>

	<footer id="colophon" class="site-footer pt-3 pb-3">
		<div class="container">
			<div class="site-info text-center">
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'x-shop' ) ); ?>">
					<?php
					/* translators: %s: CMS name, i.e. WordPress. */
					printf( esc_html__( 'Proudly powered by %s', 'x-shop' ), 'WordPress' );
					?>
				</a>
				<span class="sep"> | </span>
					<?php
					/* translators: 1: Theme name, 2: Theme author. */
					printf( esc_html__( 'Theme: %1$s by %2$s.', 'x-shop' ), 'x-shop', '<a href="https://profiles.wordpress.org/nalam-1/">Noor Alam</a>' );
					?>
			</div><!-- .site-info -->
		</div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php
		if ( function_exists( 'x_shop_woocommerce_header_cart' ) ) {
			x_shop_woocommerce_header_cart();
		}
	?>

<?php wp_footer(); ?>

</body>
</html>
