<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package X_Shop
 */
$x_shop_categories = get_the_category();
	if($x_shop_categories){
		$x_shop_category = $x_shop_categories[mt_rand(0,count( $x_shop_categories)-1)];
	}else{
		$x_shop_category = '';
	}
?>
<div class="col-lg-6 grid-item">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="xpost-item shadow pb-3 mb-5">

		<?php x_shop_post_thumbnail(); ?>
		<div class="xpost-text xpost-grid-text p-3">
			<div class="grid-head">
				<span class="ghead-meta">
					<?php if ( 'post' === get_post_type() && !empty($x_shop_category) ) : ?>
					<a href="<?php echo esc_url(get_category_link($x_shop_category)); ?>"><?php echo esc_html($x_shop_category->name.' / '); ?></a>
					<?php endif; ?>
					<?php echo esc_html( get_the_date()); ?>
				</span>
		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
			</div>
			<a class="xshop-readmore" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read More ','x-shop'); ?> <i class="fas fa-long-arrow-alt-right"></i></a>
					
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
</div>
