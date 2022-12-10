<?php

$defaults = glaze_blog_lite_get_default_theme_options();

if( ! function_exists( 'glaze_blog_lite_panel_declaration' ) ) {

	function glaze_blog_lite_panel_declaration() {

		$panels = array(
			array(
				'id' => 'site_header',
				'title' => esc_html__( 'Site Header', 'glaze-blog-lite' ),
				'description' => '',
				'priority' => 2,
			),
			array(
				'id' => 'site_pages',
				'title' => esc_html__( 'Site Pages', 'glaze-blog-lite' ),
				'description' => '',
				'priority' => 2,
			),
		);

		if( !empty( $panels ) ) {

			foreach( $panels as $panel ) {

				glaze_blog_lite_add_panel( $panel['id'], $panel['title'], $panel['description'], $panel['priority'] );
			}
		}
	}
}
glaze_blog_lite_panel_declaration();


if( ! function_exists( 'glaze_blog_lite_section_declaration' ) ) {

	function glaze_blog_lite_section_declaration() {

		$sections = array(
			array(
				'id' => 'site_layout',
				'title' => esc_html__( 'Site Layout', 'glaze-blog-lite' ),
				'description' => '',
				'panel' => '',
				'priority' => 1,
			),
			array(
				'id' => 'site_logo',
				'title' => esc_html__( 'Site Logo', 'glaze-blog-lite' ),
				'description' => '',
				'panel' => 'site_header',
				'priority' => '',
			),
			array(
				'id' => 'site_favicon',
				'title' => esc_html__( 'Site Favicon', 'glaze-blog-lite' ),
				'description' => '',
				'panel' => 'site_header',
				'priority' => '',
			),
			array(
				'id' => 'top_header',
				'title' => esc_html__( 'Top Header', 'glaze-blog-lite' ),
				'description' => '',
				'panel' => 'site_header',
				'priority' => '',
			),
			array(
				'id' => 'site_carousel',
				'title' => esc_html__( 'Site Carousel', 'glaze-blog-lite' ),
				'description' => '',
				'panel' => '',
				'priority' => 3,
			),
			array(
				'id' => 'blog_page',
				'title' => esc_html__( 'Blog Page', 'glaze-blog-lite' ),
				'description' => '',
				'panel' => 'site_pages',
				'priority' => 3,
			),
			array(
				'id' => 'archive_page',
				'title' => esc_html__( 'Archive Page', 'glaze-blog-lite' ),
				'description' => '',
				'panel' => 'site_pages',
				'priority' => 3,
			),
			array(
				'id' => 'search_page',
				'title' => esc_html__( 'Search Page', 'glaze-blog-lite' ),
				'description' => '',
				'panel' => 'site_pages',
				'priority' => 3,
			),
			array(
				'id' => 'post_single',
				'title' => esc_html__( 'Post Single', 'glaze-blog-lite' ),
				'description' => '',
				'panel' => 'site_pages',
				'priority' => 3,
			),
			array(
				'id' => 'page_single',
				'title' => esc_html__( 'Page Single', 'glaze-blog-lite' ),
				'description' => '',
				'panel' => 'site_pages',
				'priority' => 3,
			),
			array(
				'id' => 'site_breadcrumb',
				'title' => esc_html__( 'Breadcrumb', 'glaze-blog-lite' ),
				'description' => '',
				'panel' => '',
				'priority' => 3,
			),
			array(
				'id' => 'site_image',
				'title' => esc_html__( 'Site Image', 'glaze-blog-lite' ),
				'description' => '',
				'panel' => '',
				'priority' => 3,
			),
			array(
				'id' => 'site_sidebar',
				'title' => esc_html__( 'Site Sidebar', 'glaze-blog-lite' ),
				'description' => '',
				'panel' => '',
				'priority' => 3,
			),
			array(
				'id' => 'site_footer',
				'title' => esc_html__( 'Site Footer', 'glaze-blog-lite' ),
				'description' => '',
				'panel' => '',
				'priority' => 3,
			),
			array(
				'id' => 'post_excerpt',
				'title' => esc_html__( 'Post Excerpt', 'glaze-blog-lite' ),
				'description' => '',
				'panel' => '',
				'priority' => 3,
			),
			array(
				'id' => 'post_meta',
				'title' => esc_html__( 'Post Meta', 'glaze-blog-lite' ),
				'description' => '',
				'panel' => '',
				'priority' => 3,
			),
		);

		if( !empty( $sections ) ) {

			foreach( $sections as $section ) {

				glaze_blog_lite_add_section( $section['id'], $section['title'], $section['description'], $section['panel'], $section['priority'] );
			}
		}
	}
}
glaze_blog_lite_section_declaration();


if( ! function_exists( 'glaze_blog_lite_control_rearrange' ) ) {

	function glaze_blog_lite_control_rearrange() {

		global $wp_customize;

		$wp_customize->get_control( 'header_textcolor' )->label = esc_html__( 'Site Title Color', 'glaze-blog-lite' );
		$wp_customize->get_control( 'header_textcolor' )->section = 'title_tagline';
		$wp_customize->get_control( 'background_color' )->section = 'background_image';
		$wp_customize->get_section( 'background_image' )->title = esc_html__( 'Site Background', 'glaze-blog-lite' );

		$wp_customize->get_control( 'custom_logo' )->section = 'glaze_blog_lite_section_site_logo';
		$wp_customize->get_control( 'blogname' )->section = 'glaze_blog_lite_section_site_logo';
		$wp_customize->get_control( 'blogdescription' )->section = 'glaze_blog_lite_section_site_logo';
		$wp_customize->get_control( 'header_textcolor' )->section = 'glaze_blog_lite_section_site_logo';
		$wp_customize->get_control( 'display_header_text' )->section = 'glaze_blog_lite_section_site_logo';
		$wp_customize->get_control( 'site_icon' )->section = 'glaze_blog_lite_section_site_favicon';
		$wp_customize->get_control( 'header_image' )->section = 'glaze_blog_lite_section_site_breadcrumb';
		$wp_customize->get_control( 'header_image' )->active_callback = 'glaze_blog_lite_active_breadcrumb';
		$wp_customize->get_control( 'header_image' )->description = esc_html__( 'Header is used as background image for breadcrumb', 'glaze-blog-lite' );
		$wp_customize->get_control( 'header_image' )->priority = 20;
	}
}
glaze_blog_lite_control_rearrange();

// Cateogries Array
$post_taxonomy = 'category';
$post_terms = get_terms( $post_taxonomy );
$post_categories = array();
foreach( $post_terms as $post_term ) {
	$post_categories[$post_term->slug] = $post_term->name;
}


/*******************************************************************************************************
******************************* Site Layout Control Fields Declaration *******************************
*******************************************************************************************************/
$layout_choices = array( 
	'boxed' => esc_html__( 'Boxed Layout', 'glaze-blog-lite' ), 
	'fullwidth' => esc_html__( 'Full Width Layout', 'glaze-blog-lite' )
);

glaze_blog_lite_add_select_field( 'site_layout', esc_html__( 'Site Layout', 'glaze-blog-lite' ), '', $layout_choices, '', 'site_layout' );




/*******************************************************************************************************
********************************** Header Control Fields Declaration *********************************
*******************************************************************************************************/
glaze_blog_lite_add_toggle_field( 'display_top_header', esc_html__( 'Display Top Header', 'glaze-blog-lite' ), '', '', 'top_header' );

glaze_blog_lite_add_url_field( 'header_facebook_link', esc_html__( 'Facebook Link', 'glaze-blog-lite' ), '', 'glaze_blog_lite_active_top_header', 'top_header' );
glaze_blog_lite_add_url_field( 'header_twitter_link', esc_html__( 'Twitter Link', 'glaze-blog-lite' ), '', 'glaze_blog_lite_active_top_header', 'top_header' );
glaze_blog_lite_add_url_field( 'header_instagram_link', esc_html__( 'Instagram Link', 'glaze-blog-lite' ), '', 'glaze_blog_lite_active_top_header', 'top_header' );
glaze_blog_lite_add_url_field( 'header_pinterest_link', esc_html__( 'Pinterest Link', 'glaze-blog-lite' ), '', 'glaze_blog_lite_active_top_header', 'top_header' );
glaze_blog_lite_add_url_field( 'header_youtube_link', esc_html__( 'Youtube Link', 'glaze-blog-lite' ), '', 'glaze_blog_lite_active_top_header', 'top_header' );
glaze_blog_lite_add_url_field( 'header_google_plus_link', esc_html__( 'Google Plus Link', 'glaze-blog-lite' ), '', 'glaze_blog_lite_active_top_header', 'top_header' );
glaze_blog_lite_add_url_field( 'header_linkedin_link', esc_html__( 'Linkedin Link', 'glaze-blog-lite' ), '', 'glaze_blog_lite_active_top_header', 'top_header' );
glaze_blog_lite_add_url_field( 'header_vk_link', esc_html__( 'VK Link', 'glaze-blog-lite' ), '', 'glaze_blog_lite_active_top_header', 'social_links' );

glaze_blog_lite_add_toggle_field( 'enable_cursive_site_title', esc_html__( 'Enable Cursive Site Title', 'glaze-blog-lite' ), '', '', 'site_logo' );
glaze_blog_lite_add_slider_field( 'site_identity_section_padding', esc_html__( 'Logo Section Padding', 'glaze-blog-lite' ), esc_html__( 'This option lets you set padding on top and bottom of the site identiy or logo section. Minimum padding is 15 and maximum is 50.', 'glaze-blog-lite' ), 'glaze_blog_lite_active_carousel', 'site_logo', 15, 50, 1 );


/*******************************************************************************************************
********************************** Site Carousel Control Fields Declaration ****************************
*******************************************************************************************************/
$carousel_layouts = array(
	'carousel_one' => get_template_directory_uri() . '/customizer/assets/images/carousel_one.png',
	'carousel_two' => get_template_directory_uri() . '/customizer/assets/images/carousel_two.png',
);

glaze_blog_lite_add_toggle_field( 'display_carousel', esc_html__( 'Display Carousel', 'glaze-blog-lite' ), '', '', 'site_carousel' );
glaze_blog_lite_add_select_field( 'carousel_category', esc_html__( 'Carousel Category', 'glaze-blog-lite' ), '', $post_categories, 'glaze_blog_lite_active_carousel', 'site_carousel' );
glaze_blog_lite_add_number_field( 'carousel_item_no', esc_html__( 'No of Carousel Items', 'glaze-blog-lite' ), esc_html__( 'Maximum 5 items and minimum 1 item can be set.', 'glaze-blog-lite' ), 'glaze_blog_lite_active_carousel', 'site_carousel', 5, 1, 1 );
glaze_blog_lite_add_toggle_field( 'carousel_hide_content', esc_html__( 'Display Carousel Content', 'glaze-blog-lite' ), '', 'glaze_blog_lite_active_carousel', 'site_carousel' );
glaze_blog_lite_add_radio_image_field( 'carousel_layout', esc_html__( 'Carousel Layout', 'glaze-blog-lite' ), '', $carousel_layouts, 'glaze_blog_lite_active_carousel', 'site_carousel' );
glaze_blog_lite_add_toggle_field( 'carousel_enable_spacing', esc_html__( 'Enable Spacing', 'glaze-blog-lite' ), '', 'glaze_blog_lite_active_carousel', 'site_carousel' );
glaze_blog_lite_add_slider_field( 'carousel_height', esc_html__( 'Carousel Height', 'glaze-blog-lite' ), esc_html__( 'This height will be displayed for devices with display width 992px. Minimum height is 400 and maximum height is 700.', 'glaze-blog-lite' ), 'glaze_blog_lite_active_carousel', 'site_carousel', 400, 700, 1 );




/*******************************************************************************************************
************************************* Blog Page Control Fields Declaration *****************************
*******************************************************************************************************/
glaze_blog_lite_add_toggle_field( 'blog_display_feat_img', esc_html__( 'Display Featured Image', 'glaze-blog-lite' ), '', '', 'blog_page' );
glaze_blog_lite_add_toggle_field( 'blog_display_cats', esc_html__( 'Display Post Categories', 'glaze-blog-lite' ), '', '', 'blog_page' );
glaze_blog_lite_add_toggle_field( 'blog_display_date', esc_html__( 'Display Post Date', 'glaze-blog-lite' ), '', '', 'blog_page' );
glaze_blog_lite_add_toggle_field( 'blog_display_author', esc_html__( 'Display Post Author', 'glaze-blog-lite' ), '', '', 'blog_page' );
glaze_blog_lite_add_toggle_field( 'blog_display_comments_no', esc_html__( 'Display Post Comments No', 'glaze-blog-lite' ), '', '', 'blog_page' );
glaze_blog_lite_add_toggle_field( 'blog_enable_dropcap', esc_html__( 'Enable Dropcap', 'glaze-blog-lite' ), '', '', 'blog_page' );




/*******************************************************************************************************
********************************** Archive Page Control Fields Declaration *****************************
*******************************************************************************************************/
glaze_blog_lite_add_toggle_field( 'archive_display_feat_img', esc_html__( 'Display Featured Image', 'glaze-blog-lite' ), '', '', 'archive_page' );
glaze_blog_lite_add_toggle_field( 'archive_display_cats', esc_html__( 'Display Post Categories', 'glaze-blog-lite' ), '', '', 'archive_page' );
glaze_blog_lite_add_toggle_field( 'archive_display_date', esc_html__( 'Display Post Date', 'glaze-blog-lite' ), '', 'glaze_blog_lite_active_feat_img_in_archive', 'archive_page' );
glaze_blog_lite_add_toggle_field( 'archive_display_author', esc_html__( 'Display Post Author', 'glaze-blog-lite' ), '', '', 'archive_page' );
glaze_blog_lite_add_toggle_field( 'archive_display_comments_no', esc_html__( 'Display Post Comments No', 'glaze-blog-lite' ), '', '', 'archive_page' );
glaze_blog_lite_add_toggle_field( 'archive_enable_dropcap', esc_html__( 'Enable Dropcap', 'glaze-blog-lite' ), '', '', 'archive_page' );



/*******************************************************************************************************
*********************************** Search Page Control Fields Declaration *****************************
*******************************************************************************************************/
glaze_blog_lite_add_toggle_field( 'search_display_feat_img', esc_html__( 'Display Featured Image', 'glaze-blog-lite' ), '', '', 'search_page' );
glaze_blog_lite_add_toggle_field( 'search_display_cats', esc_html__( 'Display Post Categories', 'glaze-blog-lite' ), '', '', 'search_page' );
glaze_blog_lite_add_toggle_field( 'search_display_date', esc_html__( 'Display Post Date', 'glaze-blog-lite' ), '', 'glaze_blog_lite_active_feat_img_in_search', 'search_page' );
glaze_blog_lite_add_toggle_field( 'search_display_author', esc_html__( 'Display Post Author', 'glaze-blog-lite' ), '', '', 'search_page' );
glaze_blog_lite_add_toggle_field( 'search_display_comments_no', esc_html__( 'Display Post Comments No', 'glaze-blog-lite' ), '', '', 'search_page' );
glaze_blog_lite_add_toggle_field( 'search_enable_dropcap', esc_html__( 'Enable Dropcap', 'glaze-blog-lite' ), '', '', 'search_page' );



/*******************************************************************************************************
*********************************** Blog Single Control Fields Declaration *****************************
*******************************************************************************************************/
glaze_blog_lite_add_toggle_field( 'display_post_cats', esc_html__( 'Display Categories', 'glaze-blog-lite' ), '', '', 'post_single' );
glaze_blog_lite_add_toggle_field( 'display_post_feat_img', esc_html__( 'Display Featured Image', 'glaze-blog-lite' ), '', '', 'post_single' );
glaze_blog_lite_add_toggle_field( 'display_post_date', esc_html__( 'Display Posted Date', 'glaze-blog-lite' ), '', '', 'post_single' );
glaze_blog_lite_add_toggle_field( 'display_post_author', esc_html__( 'Display Author Name', 'glaze-blog-lite' ), '', '', 'post_single' );
glaze_blog_lite_add_toggle_field( 'display_post_tags', esc_html__( 'Display Tags', 'glaze-blog-lite' ), '', '', 'post_single' );
glaze_blog_lite_add_toggle_field( 'display_author_section', esc_html__( 'Display Section', 'glaze-blog-lite' ), '', '', 'post_single' );
glaze_blog_lite_add_toggle_field( 'display_related_section', esc_html__( 'Display Section', 'glaze-blog-lite' ), '', '', 'post_single' );
glaze_blog_lite_add_text_field( 'related_section_title', esc_html__( 'Section Title', 'glaze-blog-lite' ), '', 'glaze_blog_lite_active_related_section', 'post_single' );
glaze_blog_lite_add_number_field( 'related_posts_no', esc_html__( 'No of Posts', 'glaze-blog-lite' ), esc_html__( 'Maximum 4 items and minimum 1 items can be set.', 'glaze-blog-lite' ), 'glaze_blog_lite_active_related_section', 'post_single', 4, 1, 1 );
glaze_blog_lite_add_toggle_field( 'display_related_author_meta', esc_html__( 'Display Author Meta', 'glaze-blog-lite' ), '', 'glaze_blog_lite_active_related_section', 'post_single' );



/*******************************************************************************************************
*********************************** Page Single Control Fields Declaration *****************************
*******************************************************************************************************/
glaze_blog_lite_add_toggle_field( 'display_page_feat_img', esc_html__( 'Display Featured Image', 'glaze-blog-lite' ), '', '', 'page_single' );


/*******************************************************************************************************
*********************************** Breadcrumb Control Fields Declaration ******************************
*******************************************************************************************************/
glaze_blog_lite_add_toggle_field( 'display_breadcrumb', esc_html__( 'Display Breadcrumb', 'glaze-blog-lite' ), '', '', 'site_breadcrumb' );


/*******************************************************************************************************
************************************** Image Control Fields Declaration ********************************
*******************************************************************************************************/
glaze_blog_lite_add_toggle_field( 'enable_lazy_loading', esc_html__( 'Enable Lazy Loading', 'glaze-blog-lite' ), '', '', 'site_image' );




/*******************************************************************************************************
************************************ Sidebar Control Fields Declaration *********************************
*******************************************************************************************************/
$sidebar_positions = array(
	'left' => get_template_directory_uri() . '/customizer/assets/images/sidebar_left.png',
	'right' => get_template_directory_uri() . '/customizer/assets/images/sidebar_right.png',
	'none' => get_template_directory_uri() . '/customizer/assets/images/sidebar_none.png',
);

glaze_blog_lite_add_toggle_field( 'enable_sticky_sidebar', esc_html__( 'Enable Sticky Sidebar', 'glaze-blog-lite' ), '', '', 'site_sidebar' );
glaze_blog_lite_add_toggle_field( 'enable_sidebar_small_devices', esc_html__( 'Enable Sidebar For Small Devices', 'glaze-blog-lite' ), esc_html__( 'This option lets you to display or do not display sidebar for devices with width smaller than 992px.', 'glaze-blog-lite' ), '', 'site_sidebar' );
glaze_blog_lite_add_radio_image_field( 'blog_sidebar_position', esc_html__( 'Blog Page Sidebar Position', 'glaze-blog-lite' ), '', $sidebar_positions, '', 'blog_page' );
glaze_blog_lite_add_radio_image_field( 'archive_sidebar_position', esc_html__( 'Archive Page Sidebar Position', 'glaze-blog-lite' ), '', $sidebar_positions, '', 'archive_page' );
glaze_blog_lite_add_radio_image_field( 'search_sidebar_position', esc_html__( 'Search Page Sidebar Position', 'glaze-blog-lite' ), '', $sidebar_positions, '', 'search_page' );



/*******************************************************************************************************
************************************ Footer Control Fields Declaration *********************************
*******************************************************************************************************/
glaze_blog_lite_add_toggle_field( 'display_scroll_top_one', esc_html__( 'Display Scroll Top I', 'glaze-blog-lite' ), esc_html__( 'This option lets you to display or hide scroll to top link floating at right corner.', 'glaze-blog-lite' ), '', 'site_footer' );
glaze_blog_lite_add_toggle_field( 'display_scroll_top_two', esc_html__( 'Display Scroll Top II', 'glaze-blog-lite' ), esc_html__( 'This option lets you to display or hide scroll to top link which is in footer section.', 'glaze-blog-lite' ), '', 'site_footer' );
glaze_blog_lite_add_text_field( 'copyright_text', esc_html__( 'Copyright Text', 'glaze-blog-lite' ), '', '', 'site_footer' );


/*******************************************************************************************************
***************************************** Excerpt Fields Declaration ***********************************
*******************************************************************************************************/
glaze_blog_lite_add_number_field( 'excerpt_length', esc_html__( 'Excerpt', 'glaze-blog-lite' ), esc_html__( 'Maximum excerpt length 40 and minimum excerpt length 20 can be set.', 'glaze-blog-lite' ), 'glaze_blog_lite_active_carousel', 'post_excerpt', 40, 20, 1 );


/*******************************************************************************************************
******************************************** Meta Fields Declaration ***********************************
*******************************************************************************************************/
glaze_blog_lite_add_toggle_field( 'enable_cursive_post_meta', esc_html__( 'Enable Cursive Post Meta', 'glaze-blog-lite' ), esc_html__( 'This option affects categories and author post metas.', 'glaze-blog-lite' ), '', 'post_meta' );