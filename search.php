<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package X_Shop
 */

$x_shop_blog_container = get_theme_mod( 'x_shop_blog_container', 'container' );
$x_shop_blog_layout = get_theme_mod( 'x_shop_blog_layout', 'rightside' );

if ( is_active_sidebar( 'sidebar-1' ) && $x_shop_blog_layout != 'fullwidth' ) {
	$x_shop_blog_column = 'col-lg-9';
}else{
	$x_shop_blog_column = 'col-lg-12';
}
get_header();
?>

<div class="<?php echo esc_attr($x_shop_blog_container); ?> mt-5 mb-5 pt-5 pb-5">
			<div class="row">
			<?php if ( is_active_sidebar( 'sidebar-1' ) && $x_shop_blog_layout == 'leftside' ): ?>
				<div class="col-lg-3">
					<?php get_sidebar(); ?>
				</div>
				<?php endif; ?>
				<div class="<?php echo esc_attr($x_shop_blog_column); ?>">
					<main id="primary" class="site-main">


		<?php if ( have_posts() ) : ?>

			<header class="page-header search-header shadow p-4 mb-5 text-center">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'x-shop' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

</main><!-- #main -->
				</div>
				<?php if ( is_active_sidebar( 'sidebar-1' ) && $x_shop_blog_layout == 'rightside' ): ?>
				<div class="col-lg-3">
					<?php get_sidebar(); ?>
				</div>
				<?php endif; ?>
			</div>
		</div>

<?php
get_footer();
