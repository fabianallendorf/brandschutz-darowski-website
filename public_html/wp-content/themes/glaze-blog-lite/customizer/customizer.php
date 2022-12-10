<?php
/**
 * Glaze_Blog_Lite Theme Customizer
 *
 * @package Glaze_Blog_Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function glaze_blog_lite_customize_register( $wp_customize ) {
	
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
	 * Load custom customizer control for slider control
	 */
	require get_template_directory() . '/customizer/controls/class-customizer-slider-control.php';

	/**
	 * Load customizer functions for intializing theme upsell
	 */
	require get_template_directory() . '/customizer/controls/class-customizer-upsell.php';

	$wp_customize->register_section_type( 'Glaze_Blog_Lite_Customize_Section_Upsell' );

	// Register theme upsell section
	$wp_customize->add_section(
		new Glaze_Blog_Lite_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'Glaze Blog', 'glaze-blog-lite' ),
				'pro_text' => esc_html__( 'Upgrade to Pro', 'glaze-blog-lite' ),
				'pro_url'  => 'https://perfectwpthemes.com/themes/glaze-blog/?ref=upsell-btn',
				'priority' => 1,
			)
		)
	);

	/**
	 * Load customizer functions for sanitization of input values of contol fields
	 */
	require get_template_directory() . '/customizer/functions/sanitize-callback.php';

	/**
	 * Load customizer functions for intializing panel, section, and control fields
	 */
	require get_template_directory() . '/customizer/functions/reuseable-callback.php';		

	/**
	 * Load customizer functions for loading control field's choices, declaration of panel, section 
	 * and control fields
	 */
	require get_template_directory() . '/customizer/functions/customizer-fields.php';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'glaze_blog_lite_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'glaze_blog_lite_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'glaze_blog_lite_customize_register' );

/**
 * Load active callback functions.
 */
require get_template_directory() . '/customizer/functions/active-callback.php';

/**
 * Load function to load customizer field's default values.
 */
require get_template_directory() . '/customizer/functions/customizer-defaults.php';


/**
 * Load function to load dynamic style.
 */
require get_template_directory() . '/customizer/functions/dynamic-style.php';


/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function glaze_blog_lite_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function glaze_blog_lite_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function glaze_blog_lite_customize_preview_js() {

	wp_enqueue_script( 'glaze-blog-lite-customizer', get_template_directory_uri() . '/customizer/assets/js/customizer.js', array( 'customize-preview' ), GLAZE_BLOG_LITE_VERSION, true );
}
add_action( 'customize_preview_init', 'glaze_blog_lite_customize_preview_js' );



/**
 * Enqueue Customizer Scripts and Styles
 */
function glaze_blog_lite_enqueues() {

	wp_enqueue_style( 'glaze-blog-lite-customizer-style', get_template_directory_uri() . '/customizer/assets/css/customizer-style.css' );

	wp_enqueue_script( 'glaze-blog-lite-customizer-script', get_template_directory_uri() . '/customizer/assets/js/customizer-script.js', array( 'jquery' ), GLAZE_BLOG_LITE_VERSION, true );
}
add_action( 'customize_controls_enqueue_scripts', 'glaze_blog_lite_enqueues' );