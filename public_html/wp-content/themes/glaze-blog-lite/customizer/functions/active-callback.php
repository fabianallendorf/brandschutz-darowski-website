<?php
/**
 * Collection of active callback functions for customizer fields.
 *
 * @package Glaze_Blog_Lite
 */

/**
 * Active callback function for when top header is active.
 */
if( ! function_exists( 'glaze_blog_lite_active_top_header' ) ) {

	function glaze_blog_lite_active_top_header( $control ) {

		if ( $control->manager->get_setting( 'glaze_blog_lite_field_display_top_header' )->value() == true ) {

			return true;
		} else {
			
			return false;
		}		
	}
}


/**
 * Active callback function for when carousel is active.
 */
if( ! function_exists( 'glaze_blog_lite_active_carousel' ) ) {

	function glaze_blog_lite_active_carousel( $control ) {

		if ( $control->manager->get_setting( 'glaze_blog_lite_field_display_carousel' )->value() == true ) {

			return true;
		} else {
			
			return false;
		}		
	}
}


/**
 * Active callback function for when related section is active.
 */
if( ! function_exists( 'glaze_blog_lite_active_related_section' ) ) {

	function glaze_blog_lite_active_related_section( $control ) {

		if ( $control->manager->get_setting( 'glaze_blog_lite_field_display_related_section' )->value() == true ) {

			return true;
		} else {
			
			return false;
		}		
	}
}


/**
 * Active callback function for when breadcrumb is active.
 */
if( ! function_exists( 'glaze_blog_lite_active_breadcrumb' ) ) {

	function glaze_blog_lite_active_breadcrumb( $control ) {

		if ( $control->manager->get_setting( 'glaze_blog_lite_field_display_breadcrumb' )->value() == true ) {

			return true;
		} else {

			return false;
		}		
	}
}


/**
 * Active callback function for when display featured image is active.
 */
if( ! function_exists( 'glaze_blog_lite_active_feat_img_in_search' ) ) {

	function glaze_blog_lite_active_feat_img_in_search( $control ) {

		if ( $control->manager->get_setting( 'glaze_blog_lite_field_search_display_feat_img' )->value() == true ) {

			return true;
		} else {

			return false;
		}		
	}
}


/**
 * Active callback function for when display featured image is active.
 */
if( ! function_exists( 'glaze_blog_lite_active_feat_img_in_archive' ) ) {

	function glaze_blog_lite_active_feat_img_in_archive( $control ) {

		if ( $control->manager->get_setting( 'glaze_blog_lite_field_archive_display_feat_img' )->value() == true ) {

			return true;
		} else {

			return false;
		}		
	}
}