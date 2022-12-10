<?php
/**
 * Shams Solar: Customizer
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function shams_solar_customize_register( $wp_customize ) {

	$wp_customize->add_panel( 'shams_solar_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'shams-solar' ),
	    'description' => __( 'Description of what this panel does.', 'shams-solar' ),
	) );

	$wp_customize->add_section( 'shams_solar_general_option', array(
    	'title'      => __( 'Sidebar Settings', 'shams-solar' ),
		'priority'   => 30,
		'panel' => 'shams_solar_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('shams_solar_layout_settings',array(
        'default' => __('Right Sidebar','shams-solar'),
        'sanitize_callback' => 'shams_solar_sanitize_choices'	        
	));

	$wp_customize->add_control('shams_solar_layout_settings',array(
        'type' => 'radio',
        'label'     => __('Theme Sidebar Layouts', 'shams-solar'),
        'description'   => __('This option work for blog page, blog single page, archive page and search page.', 'shams-solar'),
        'section' => 'shams_solar_general_option',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','shams-solar'),
            'Right Sidebar' => __('Right Sidebar','shams-solar'),
            'One Column' => __('Full Width','shams-solar'),
            'Grid Layout' => __('Grid Layout','shams-solar')
        ),
	));

	//Topbar section
	$wp_customize->add_section('shams_solar_contact_details',array(
		'title'	=> __('Topbar Section','shams-solar'),
		'description'	=> __('Add Header Content here','shams-solar'),
		'priority'	=> null,
		'panel' => 'shams_solar_panel_id',
	));

	$wp_customize->add_setting('shams_solar_contact_number',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('shams_solar_contact_number',array(
		'label'	=> __('Add Phone Number','shams-solar'),
		'section'	=> 'shams_solar_contact_details',
		'setting'	=> 'shams_solar_contact_number',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('shams_solar_email_address',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('shams_solar_email_address',array(
		'label'	=> __('Add Email','shams-solar'),
		'section'	=> 'shams_solar_contact_details',
		'setting'	=> 'shams_solar_email_address',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('shams_solar_time',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('shams_solar_time',array(
		'label'	=> __('Add Time','shams-solar'),
		'section'	=> 'shams_solar_contact_details',
		'setting'	=> 'shams_solar_time',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('shams_solar_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('shams_solar_facebook_url',array(
		'label'	=> __('Add Facebook link','shams-solar'),
		'section'	=> 'shams_solar_contact_details',
		'setting'	=> 'shams_solar_facebook_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('shams_solar_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('shams_solar_twitter_url',array(
		'label'	=> __('Add Twitter link','shams-solar'),
		'section'	=> 'shams_solar_contact_details',
		'setting'	=> 'shams_solar_twitter_url',
		'type'	=> 'url'
	));
	
	$wp_customize->add_setting('shams_solar_youtube_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('shams_solar_youtube_url',array(
		'label'	=> __('Add Youtube link','shams-solar'),
		'section'	=> 'shams_solar_contact_details',
		'setting'	=> 'shams_solar_youtube_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('shams_solar_google_plus_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('shams_solar_google_plus_url',array(
		'label'	=> __('Add Google Plus link','shams-solar'),
		'section'	=> 'shams_solar_contact_details',
		'setting'	=> 'shams_solar_google_plus_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('shams_solar_linkedin_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('shams_solar_linkedin_url',array(
		'label'	=> __('Add Linkedin link','shams-solar'),
		'section'	=> 'shams_solar_contact_details',
		'setting'	=> 'shams_solar_linkedin_url',
		'type'	=> 'url'
	));

	//home page slider
	$wp_customize->add_section( 'shams_solar_slider' , array(
    	'title'      => __( 'Slider Settings', 'shams-solar' ),
		'priority'   => null,
		'panel' => 'shams_solar_panel_id'
	) );

	$wp_customize->add_setting('shams_solar_slider_arrows',array(
        'default' => 'true',
        'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('shams_solar_slider_arrows',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide slider','shams-solar'),
      	'section' => 'shams_solar_slider',
	));

	for ( $count = 1; $count <= 4; $count++ ) {

		$wp_customize->add_setting( 'shams_solar_slide_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'shams_solar_sanitize_dropdown_pages'
		) );

		$wp_customize->add_control( 'shams_solar_slide_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'shams-solar' ),
			'section'  => 'shams_solar_slider',
			'type'     => 'dropdown-pages'
		) );
	}

	//Services Section
	$wp_customize->add_section('shams_solar_service_section',array(
		'title'	=> __('Services Section','shams-solar'),
		'description'	=> __('Add Services Section below.','shams-solar'),
		'panel' => 'shams_solar_panel_id',
	));

	$wp_customize->add_setting('shams_solar_service_section_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('shams_solar_service_section_title',array(
		'label'	=> __('Section Title','shams-solar'),
		'section'	=> 'shams_solar_service_section',
		'type'		=> 'text'
	));

	$categories = get_categories();
		$cat_posts = array();
			$i = 0;
			$cat_posts[]='Select';	
		foreach($categories as $category){
			if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_posts[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('shams_solar_service_section_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('shams_solar_service_section_category',array(
		'type'    => 'select',
		'choices' => $cat_posts,
		'label' => __('Select Category to display Latest Post','shams-solar'),
		'section' => 'shams_solar_service_section',
	));

	//Footer
	$wp_customize->add_section( 'shams_solar_footer' , array(
    	'title'      => __( 'Footer Text', 'shams-solar' ),
		'priority'   => null,
		'panel' => 'shams_solar_panel_id'
	) );

	$wp_customize->add_setting('shams_solar_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('shams_solar_footer_text',array(
		'label'	=> __('Add Copyright Text','shams-solar'),
		'section'	=> 'shams_solar_footer',
		'setting'	=> 'shams_solar_footer_text',
		'type'		=> 'text'
	));


	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'shams_solar_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'shams_solar_customize_partial_blogdescription',
	) );
	
}
add_action( 'customize_register', 'shams_solar_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Shams Solar 1.0
 * @see shams-solar_customize_register()
 *
 * @return void
 */
function shams_solar_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Shams Solar 1.0
 * @see shams-solar_customize_register()
 *
 * @return void
 */
function shams_solar_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Return whether we're on a view that supports a one or two column layout.
 */
function shams_solar_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'footer-1' ) ) );
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Shams_Solar_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Shams_Solar_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Shams_Solar_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__( 'Shams Solar Pro', 'shams-solar' ),
					'pro_text' => esc_html__( 'Go Pro', 'shams-solar' ),
					'pro_url'  => esc_url('https://www.themeseye.com/wordpress/solar-energy-wordpress-theme/'),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'shams-solar-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'shams-solar-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Shams_Solar_Customize::get_instance();