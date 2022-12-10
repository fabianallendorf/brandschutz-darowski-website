<?php

if ( ! function_exists( 'glaze_blog_lite_get_option' ) ) {

    /**
     * Get theme option.
     *
     * @since 1.0.0
     *
     * @param string $key Option key.
     * @return mixed Option value.
     */
    function glaze_blog_lite_get_option( $key ) {

        if ( empty( $key ) ) {
            return;
        }

        $fullkey = 'glaze_blog_lite_field_'. $key;

        $value = '';

        $default = glaze_blog_lite_get_default_theme_options();

        $default_value = null;

        if ( is_array( $default ) && isset( $default[ $key ] ) ) {
            $default_value = $default[ $key ];
        }

        if ( null !== $default_value ) {
            $value = get_theme_mod( $fullkey, $default_value );
        }
        else {
            $value = get_theme_mod( $fullkey );
        }

        return $value;
    }
}


if ( ! function_exists( 'glaze_blog_lite_get_default_theme_options' ) ) {

    /**
     * Get default theme options.
     *
     * @since 1.0.0
     *
     * @return array Default theme options.
     */
    function glaze_blog_lite_get_default_theme_options() {

        $defaults = array(

            'site_layout' => 'fullwidth',

            'display_top_header' => true,

            'enable_cursive_site_title' => true,
            'site_identity_section_padding' => 15,

            'header_facebook_link' => '',
            'header_twitter_link' => '',
            'header_instagram_link' => '',
            'header_pinterest_link' => '',
            'header_youtube_link' => '',
            'header_google_plus_link' => '',
            'header_linkedin_link' => '',
            'header_vk_link' => '',

            'display_carousel' => true,
            'carousel_category' => 'uncategorized',
            'carousel_item_no' => 5,
            'carousel_hide_content' => false,
            'carousel_layout' => 'carousel_one',
            'carousel_enable_spacing' => false,
            'carousel_height' => 500,

            'blog_display_feat_img' => true,
            'blog_display_cats' => true,
            'blog_display_date' => true,
            'blog_display_author' => true,
            'blog_display_comments_no' => true,
            'blog_enable_dropcap' => true,
            'blog_sidebar_position' => 'right',

            'archive_display_feat_img' => true,
            'archive_display_cats' => true,
            'archive_display_date' => true,
            'archive_display_author' => true,
            'archive_display_comments_no' => true,
            'archive_enable_dropcap' => true,
            'archive_sidebar_position' => 'right',

            'search_display_feat_img' => true,
            'search_display_cats' => true,
            'search_display_date' => true,
            'search_display_author' => true,
            'search_display_comments_no' => true,
            'search_enable_dropcap' => true,
            'search_sidebar_position' => 'right',

            'enable_lazy_loading' => false,

            'enable_sticky_sidebar' => true,
            'enable_sidebar_small_devices' => true,

            'display_post_feat_img' => true,
            'display_post_cats' => true,
            'display_post_date' => true,
            'display_post_author' => true,
            'display_post_tags' => true,
            'display_author_section' => true,
            'display_related_section' => true,
            'related_section_title' => '',
            'related_posts_no' => 4,
            'display_related_author_meta' => true,

            'display_page_feat_img' => true,

            'display_breadcrumb' => true,

            'display_scroll_top_one' => true,
            'display_scroll_top_two' => true,
            'copyright_text' => '',

            'excerpt_length' => 30,

            'enable_cursive_post_meta' => 30,
        );

        return $defaults;
    }
}