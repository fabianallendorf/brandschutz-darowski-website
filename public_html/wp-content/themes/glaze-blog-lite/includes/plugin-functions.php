<?php

/**
 * Function for getting sidebar position for single post and page.
 */
if( ! function_exists( 'glaze_blog_lite_single_sidebar_position' ) ) :

	function glaze_blog_lite_single_sidebar_position() {

		if( class_exists( 'Perfectwpthemes_Toolkit' ) ) {

			return perfectwpthemes_toolkit_single_sidebar_position();
		}
	}
endif;


/**
 * Function for getting layout for single post and page.
 */
if( ! function_exists( 'glaze_blog_lite_single_layout' ) ) :

	function glaze_blog_lite_single_layout() {

		if( class_exists( 'Perfectwpthemes_Toolkit' ) ) {

			return perfectwpthemes_toolkit_single_layout();
		}
	}
endif;


/**
 * Function for social share template.
 */
if( ! function_exists( 'glaze_blog_lite_social_share' ) ) :

	function glaze_blog_lite_social_share() {

		if( class_exists( 'Perfectwpthemes_Toolkit' ) ) {

			return perfectwpthemes_toolkit_social_share();
		} else {

			return false;
		}
	}
endif;


/**
 * Function for author title template.
 */
if( ! function_exists( 'glaze_blog_lite_author_title' ) ) :

	function glaze_blog_lite_author_title() {

		if( class_exists( 'Perfectwpthemes_Toolkit' ) ) {

			return perfectwpthemes_toolkit_author_title();
		} else {

			return false;
		}
	}
endif;


/**
 * Function for author links template.
 */
if( ! function_exists( 'glaze_blog_lite_author_links' ) ) :

	function glaze_blog_lite_author_links() {

		if( class_exists( 'Perfectwpthemes_Toolkit' ) ) {

			return perfectwpthemes_toolkit_author_links();
		} else {

			return false;
		}
	}
endif;



/**
 * Function for instagram widget area.
 */
if( ! function_exists( 'glaze_blog_lite_instagram_widget_area' ) ) :

	function glaze_blog_lite_instagram_widget_area() {

		if( class_exists( 'Perfectwpthemes_Toolkit' ) ) {

			return perfectwpthemes_toolkit_instagram_widget_area();
		} else {

			return false;
		}
	}
endif;