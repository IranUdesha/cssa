<?php
/**
 * Masonry_Blog Theme Customizer
 *
 * @package Masonry_Blog
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function masonry_blog_customize_register( $wp_customize ) {
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/**
	 * Load custom customizer control for radio image control
	 */
	require get_template_directory() . '/customizer/controls/class-customizer-radio-image-control.php';

	/**
	 * Load custom customizer control for toggle control
	 */
	require get_template_directory() . '/customizer/controls/class-customizer-toggle-control.php';

	/**
	 * Load custom customizer control for separator
	 */
	require get_template_directory() . '/customizer/controls/class-customizer-separator-control.php';

	/**
	 * Load custom customizer control for info control
	 */
	require get_template_directory() . '/customizer/controls/class-customizer-info-control.php';

	/**
	 * Load custom customizer control for select control
	 */
	require get_template_directory() . '/customizer/controls/select/class-customizer-select-control.php';

	/**
	 * Load custom customizer control for upsell
	 */
	require get_template_directory() . '/customizer/controls/class-customizer-upsell-control.php';

	/**
	 * Load customizer functions for sanitization of input values of contol fields
	 */
	require get_template_directory() . '/customizer/functions/sanitize-callbacks.php';	

	$wp_customize->register_section_type( 'Masonry_Blog_Upsell_Control' );

	$wp_customize->add_section(
		new Masonry_Blog_Upsell_Control( $wp_customize, 'masonry_blog_pro_upsell', array(
			'title'       	=> esc_html__( 'Masonry Blog Pro', 'masonry-blog' ),
			'button_text' 	=> esc_html__( 'Get Pro',        'masonry-blog' ),
			'button_url'  	=> 'https://perfectwpthemes.com/themes/masonry-blog-pro/?ref=upsell-btn',
			'priority'		=> 0,
		) )
	);


	/**
	 * Load customizer functions for loading control field's choices, declaration of panel, section 
	 * and control fields
	 */
	require get_template_directory() . '/customizer/fields/fields-header.php';
	require get_template_directory() . '/customizer/fields/fields-banner.php';
	require get_template_directory() . '/customizer/fields/fields-pages.php';
	require get_template_directory() . '/customizer/fields/fields-blog-archive-search.php';
	require get_template_directory() . '/customizer/fields/fields-pagination.php';
	require get_template_directory() . '/customizer/fields/fields-footer.php';
	require get_template_directory() . '/customizer/fields/fields-excerpt.php';
	require get_template_directory() . '/customizer/fields/fields-sidebar.php';
	require get_template_directory() . '/customizer/fields/fields-color.php';
	require get_template_directory() . '/customizer/fields/global-color.php';
	require get_template_directory() . '/customizer/fields/global-typo.php';
	require get_template_directory() . '/customizer/fields/global-options.php';
	require get_template_directory() . '/customizer/fields/fields-subscription.php';
	
	

	if ( isset( $wp_customize->selective_refresh ) ) {

		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'masonry_blog_customize_partial_blogname',
		) );

		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'masonry_blog_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'masonry_blog_customize_register' );

/**
 * Load active callback functions.
 */
require get_template_directory() . '/customizer/functions/active-callbacks.php';

/**
 * Load function to load customizer field's default values.
 */
require get_template_directory() . '/customizer/functions/customizer-callbacks.php';

/**
 * Load function to load customizer field's options.
 */
require get_template_directory() . '/customizer/functions/customizer-choices.php';



/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function masonry_blog_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function masonry_blog_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function masonry_blog_customize_preview_js() {

	wp_enqueue_script( 'masonry-blog-customizer', get_template_directory_uri() . '/customizer/assets/js/customizer.min.js', array( 'customize-preview' ), MASONRY_BLOG_VERSION, true );
}
add_action( 'customize_preview_init', 'masonry_blog_customize_preview_js' );



/**
 * Enqueue Customizer Scripts and Styles
 */
function masonry_blog_enqueues() {

	wp_enqueue_style( 'masonry-blog-customizer-style', get_template_directory_uri() . '/customizer/assets/css/customizer-style.min.css' );

	wp_enqueue_script( 'masonry-blog-customizer-script', get_template_directory_uri() . '/customizer/assets/js/customizer-script.min.js', array( 'jquery' ), MASONRY_BLOG_VERSION, true );
}
add_action( 'customize_controls_enqueue_scripts', 'masonry_blog_enqueues' );