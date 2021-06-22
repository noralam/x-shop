<?php
/**
 * X Shop Theme Customizer
 *
 * @package X_Shop
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function x_shop_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	//select sanitization function
	function x_shop_sanitize_select( $input, $setting ){
		$input = sanitize_key($input);
		$choices = $setting->manager->get_control( $setting->id )->choices;
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
		  
	}

	$wp_customize->add_panel( 'x_shop_settings', array(
		 'priority'       => 50,
		  'title'          => __('X Shop Theme settings', 'x-shop'),
		  'description'    => __('All X Shop theme settings', 'x-shop'),
		  ) );
    $wp_customize->add_section('x_shop_header', array(
		'title' => __('X Shop Header Settings', 'x-shop'),
		'capability'     => 'edit_theme_options',
		'description'     => __('X Shop theme header settings', 'x-shop'),
		'panel'    => 'x_shop_settings',
	
	));
	$wp_customize->add_setting('x_shop_header_address1', array(
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'default'       => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('x_shop_header_address1', array(
        'label'      => __('Header Address One', 'x-shop'),
        'section'    => 'x_shop_header',
        'settings'   => 'x_shop_header_address1',
        'type'       => 'text',
    ));
	$wp_customize->add_setting('x_shop_header_address2', array(
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'default'       => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('x_shop_header_address2', array(
        'label'      => __('Header Address One', 'x-shop'),
        'section'    => 'x_shop_header',
        'settings'   => 'x_shop_header_address2',
        'type'       => 'text',
    ));
	//xshop blog settings
    $wp_customize->add_section('x_shop_blog', array(
		'title' => __('X Shop Blog Settings', 'x-shop'),
		'capability'     => 'edit_theme_options',
		'description'     => __('X Shop theme blog settings', 'x-shop'),
		'panel'    => 'x_shop_settings',
	
	));
	$wp_customize->add_setting('x_shop_blog_container', array(
        'default'        => 'container',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'x_shop_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('x_shop_blog_container', array(
        'label'      => __('Container type', 'x-shop'),
        'description'=> __('You can set standard container or full width container. ', 'x-shop'),
        'section'    => 'x_shop_blog',
        'settings'   => 'x_shop_blog_container',
        'type'       => 'select',
        'choices'    => array(
            'container' => __('Standard Container', 'x-shop'),
            'container-fluid' => __('Full width Container', 'x-shop'),
        ),
    ));
    $wp_customize->add_setting('x_shop_blog_layout', array(
        'default'        => 'rightside',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'x_shop_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('x_shop_blog_layout', array(
        'label'      => __('Select Blog Layout', 'x-shop'),
        'description'=> __('Right and Left sidebar only show when sidebar widget is available. ', 'x-shop'),
        'section'    => 'x_shop_blog',
        'settings'   => 'x_shop_blog_layout',
        'type'       => 'select',
        'choices'    => array(
            'rightside' => __('Right Sidebar', 'x-shop'),
            'leftside' => __('Left Sidebar', 'x-shop'),
            'fullwidth' => __('No Sidebar', 'x-shop'),
        ),
    ));
	$wp_customize->add_setting('x_shop_blog_style', array(
        'default'        => 'grid',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'x_shop_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('x_shop_blog_style', array(
        'label'      => __('Select Blog Style', 'x-shop'),
        'section'    => 'x_shop_blog',
        'settings'   => 'x_shop_blog_style',
        'type'       => 'select',
        'choices'    => array(
            'grid' => __('Grid Style', 'x-shop'),
            'classic' => __('Classic Style', 'x-shop'),
        ),
    ));
		//xshop page settings
		$wp_customize->add_section('x_shop_page', array(
			'title' => __('X Shop Page Settings', 'x-shop'),
			'capability'     => 'edit_theme_options',
			'description'     => __('X Shop theme blog settings', 'x-shop'),
			'panel'    => 'x_shop_settings',
		
		));
		$wp_customize->add_setting('x_shop_page_container', array(
			'default'        => 'container',
			'capability'     => 'edit_theme_options',
			'type'           => 'theme_mod',
			'sanitize_callback' => 'x_shop_sanitize_select',
			'transport' => 'refresh',
		));
		$wp_customize->add_control('x_shop_page_container', array(
			'label'      => __('Page Container type', 'x-shop'),
			'description'=> __('You can set standard container or full width container for page. ', 'x-shop'),
			'section'    => 'x_shop_page',
			'settings'   => 'x_shop_page_container',
			'type'       => 'select',
			'choices'    => array(
				'container' => __('Standard Container', 'x-shop'),
				'container-fluid' => __('Full width Container', 'x-shop'),
			),
		));	
		$wp_customize->add_setting('x_shop_page_header', array(
			'default'        => 'show',
			'capability'     => 'edit_theme_options',
			'type'           => 'theme_mod',
			'sanitize_callback' => 'x_shop_sanitize_select',
			'transport' => 'refresh',
		));
		$wp_customize->add_control('x_shop_page_header', array(
			'label'      => __('Show Page header', 'x-shop'),
			'section'    => 'x_shop_page',
			'settings'   => 'x_shop_page_header',
			'type'       => 'select',
			'choices'    => array(
				'show' => __('Show all pages', 'x-shop'),
				'hide-home' => __('Hide Only Front Page', 'x-shop'),
				'hide' => __('Hide All Pages', 'x-shop'),
			),
		));	




	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'x_shop_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'x_shop_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'x_shop_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function x_shop_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function x_shop_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function x_shop_customize_preview_js() {
	wp_enqueue_script( 'x-shop-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), X_SHOP_VERSION, true );
}
add_action( 'customize_preview_init', 'x_shop_customize_preview_js' );
