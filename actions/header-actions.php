<?php
/**
 * The file for header all actions
 *
 *
 * @package X_Shop
 */

function x_shop_header_top_output(){
	$x_shop_header_address1 = get_theme_mod( 'x_shop_header_address1' );
	$x_shop_header_address2 = get_theme_mod( 'x_shop_header_address2' );
?>
	<header id="masthead" class="site-header <?php if( has_header_image() ): ?>has-head-img<?php endif; ?>">
			<?php if( has_header_image() ): ?>
				<?php if( has_header_image() ): ?>
				<div class="header-img"> 
					<?php the_header_image_tag(); ?>
				</div>
				<?php endif; ?>
			<?php endif; ?>
			<div class="container">
			<div class="head-logo-sec">
		<?php
			if(has_custom_logo() || display_header_text() == true || (display_header_text() == true && is_customize_preview()) ): ?>
			<div class="site-branding brand-logo">
				<?php
				if(has_custom_logo()):
					the_custom_logo();
				endif;
				?>
			</div>
			<div class="site-branding brand-text">
					<?php if (display_header_text() == true || (display_header_text() == true && is_customize_preview()) ): ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php
						$x_shop_description = get_bloginfo( 'description', 'display' );
						if ( $x_shop_description || is_customize_preview() ) :
							?>
							<p class="site-description"><?php echo $x_shop_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
						<?php endif; ?>	
					<?php endif; ?>	

			</div><!-- .site-branding -->
			<?php if( $x_shop_header_address1 || $x_shop_header_address2): ?>
			<div class="head-info">
				<?php if($x_shop_header_address1): ?>
				<div class="mobile"><?php echo esc_html($x_shop_header_address1) ?></div>
				<?php endif; ?>
				<?php if($x_shop_header_address2): ?>
				<div class="xmail"><?php echo esc_html($x_shop_header_address2) ?></div>
				<?php endif; ?>
			</div>
			<?php endif; ?>
			</div>
		</div>
	<?php endif; ?>

        <div class="menu-bar text-center">
			<div class="container">
				<div class="xshop-container menu-inner">
					<nav id="site-navigation" class="main-navigation">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'main-menu',
								'menu_id'        => 'xshop-menu',
								'menu_class'        => 'xshop-menu',
							) );
						?>
					</nav><!-- #site-navigation -->	
				</div>
			</div>
		</div>

		

		
	</header><!-- #masthead -->


<?php
}
add_action('x_shop_header_top','x_shop_header_top_output');