<?php

/**
 * Function to get post thumbnail Alt text
 */
if( !function_exists( 'glaze_blog_lite_thumbnail_alt_text' ) ) {

    function glaze_blog_lite_thumbnail_alt_text( $post_id ) {

        $post_thumbnail_id = get_post_thumbnail_id( $post_id );

        $alt_text = '';

        if( !empty( $post_thumbnail_id ) ) {

            $alt_text = get_post_meta( $post_thumbnail_id, '_wp_attachment_image_alt', true );
        }

	    if( !empty( $alt_text ) ) {

	    	echo esc_attr( $alt_text );
	    } else {

	    	the_title_attribute();
	    }
    }
}



/**
 * Function to check for sticky sidebar
 */
if( !function_exists( 'glaze_blog_lite_sticky_sidebar_enabled' ) ) {

    function glaze_blog_lite_sticky_sidebar_enabled() {

    	$enable_sticky_sidebar = glaze_blog_lite_get_option( 'enable_sticky_sidebar' );

        $sidebar_position = glaze_blog_lite_sidebar_position();

        if( is_active_sidebar( 'glaze-blog-lite-sidebar' ) && $sidebar_position != 'none' ) {

            if( $enable_sticky_sidebar == true ) {

                return true;
            }
        } else {

            return false;
        }
    }
}


/**
 * Function to check position of sidebar.
 */
if( !function_exists( 'glaze_blog_lite_sidebar_position' ) ) {

    function glaze_blog_lite_sidebar_position() {

    	$sidebar_position = '';

        if( is_active_sidebar( 'glaze-blog-lite-sidebar' ) ) {

            if( !is_singular() ) {

                if( is_archive() ) {

                    $sidebar_position = glaze_blog_lite_get_option( 'archive_sidebar_position' );
                } 

                if( is_search() ) {

                    $sidebar_position = glaze_blog_lite_get_option( 'search_sidebar_position' );
                } 

                if( is_home() ) {

                    $sidebar_position = glaze_blog_lite_get_option( 'blog_sidebar_position' );
                }
            } else {

                $sidebar_position = glaze_blog_lite_single_sidebar_position();
            }

            if( empty( $sidebar_position ) ) {

                $sidebar_position = 'right';
            }
        } else {

            $sidebar_position = 'none';
        }

    	return $sidebar_position;
    }
}


/*
 * Hook - Plugin Recommendation
 */
if ( ! function_exists( 'glaze_blog_lite_recommended_plugins' ) ) :
    /**
     * Recommend plugins.
     *
     * @since 1.0.0
     */
    function glaze_blog_lite_recommended_plugins() {

        $plugins = array(
            array(
                'name'     => esc_html__( 'Perfectwpthemes Toolkit', 'glaze-blog-lite' ),
                'slug'     => 'perfectwpthemes-toolkit',
                'required' => false,
            ),
        );

        tgmpa( $plugins );
    }

endif;
add_action( 'tgmpa_register', 'glaze_blog_lite_recommended_plugins' );