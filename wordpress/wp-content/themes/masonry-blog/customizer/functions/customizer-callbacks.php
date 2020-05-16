<?php
if ( ! function_exists( 'masonry_blog_get_option' ) ) {

    /**
     * Get theme option.
     *
     * @since 1.0.0
     *
     * @param string $key Option key.
     * @return mixed Option value.
     */
    function masonry_blog_get_option( $key ) {

        if ( empty( $key ) ) {

            return;
        }

        $value = '';

        $default = masonry_blog_get_default_theme_options();

        $default_value = null;

        if ( is_array( $default ) && isset( $default[ $key ] ) ) {
            $default_value = $default[ $key ];
        }

        if ( null !== $default_value ) {
            $value = get_theme_mod( $key, $default_value );
        }
        else {
            $value = get_theme_mod( $key );
        }

        return $value;
    }
}


if ( ! function_exists( 'masonry_blog_get_default_theme_options' ) ) {

    /**
     * Get default theme options.
     *
     * @since 1.0.0
     *
     * @return array Default theme options.
     */
    function masonry_blog_get_default_theme_options() {

        $defaults = array(

            'masonry_blog_display_top_header' => false,
            'masonry_blog_enable_top_header_menu' => false,
            'masonry_blog_enable_social_menu' => false,
            'masonry_blog_display_social_links_title' => false,
            'masonry_blog_top_header_menu_alignment' => 'left',
            'masonry_blog_social_menu_alignment' => 'right',

            'masonry_blog_logo_section_layout' => 'logo',
            'masonry_blog_logo_width' => 300,
            'masonry_blog_tagline_color' => '#313338',
            
            'masonry_blog_enable_sticky_menu' => false,
            'masonry_blog_display_off_canvas_sidebar_icon' => false,
            'masonry_blog_display_search_icon' => false,
            'masonry_blog_menu_alignment' => 'center',

            'masonry_blog_display_banner' => false,
            'masonry_blog_banner_width' => 'boxed',
            'masonry_blog_display_banner_on' => 'blog_page',
            'masonry_blog_banner_category' => 'uncategorized',
            'masonry_blog_banner_item_no' => 3,
            'masonry_blog_banner_hide_content' => false,
            'masonry_blog_display_img_overlay' => true,

            'masonry_blog_display_static_page_title' => true,
            'masonry_blog_display_static_page_feat_img' => true,
            'masonry_blog_display_static_page_sidebar_position' => 'right',

            'masonry_blog_blog_display_feat_img' => true,
            'masonry_blog_blog_display_cats' => true,
            'masonry_blog_blog_display_date' => true,
            'masonry_blog_blog_display_author' => true,
            'masonry_blog_blog_sidebar_position' => 'right',

            'masonry_blog_archive_display_feat_img' => true,
            'masonry_blog_archive_display_cats' => true,
            'masonry_blog_archive_display_date' => true,
            'masonry_blog_archive_display_author' => true,
            'masonry_blog_archive_sidebar_position' => 'right',

            'masonry_blog_search_display_feat_img' => true,
            'masonry_blog_search_display_cats' => true,
            'masonry_blog_search_display_date' => true,
            'masonry_blog_search_display_author' => true,
            'masonry_blog_search_exclude_page_from_result' => false,
            'masonry_blog_search_sidebar_position' => 'right',

            'masonry_blog_blog_archive_search_content_alignment' => 'left',

            'masonry_blog_enable_sticky_sidebar' => true,
            'masonry_blog_enable_sidebar_small_devices' => true,
            'masonry_blog_enable_global_sidebar_position' => false,
            'masonry_blog_global_sidebar_position' => 'right',

            'masonry_blog_display_post_feat_img' => true,
            'masonry_blog_display_post_cats' => true,
            'masonry_blog_display_post_date' => true,
            'masonry_blog_display_post_author' => true,
            'masonry_blog_display_post_tags' => true,
            'masonry_blog_display_author_section' => false,
            'masonry_blog_author_section_title' => '',
            'masonry_blog_display_related_section' => false,
            'masonry_blog_related_section_title' => '',
            'masonry_blog_related_posts_no' => 6,
            'masonry_blog_display_related_author_meta' => true,
            'masonry_blog_display_related_cats_meta' => true,
            'masonry_blog_display_related_date_meta' => true,
            'masonry_blog_display_related_feat_img' => true,
            'masonry_blog_related_posts_content_aligment' => 'left',
            'masonry_blog_enable_common_post_sidebar_position' => false,
            'masonry_blog_common_post_sidebar_position' => 'right',

            'masonry_blog_display_page_feat_img' => true,
            'masonry_blog_enable_common_page_sidebar_position' => false,
            'masonry_blog_common_page_sidebar_position' => 'right',

            'masonry_blog_display_footer_widget_area' => false,
            'masonry_blog_display_scroll_top' => true,
            'masonry_blog_copyright_text' => '',

            'masonry_blog_excerpt_length' => 30,

            'masonry_blog_pagination' => 'default',

            'masonry_blog_body_txt_color' => '#263238',

            'masonry_blog_enable_link_decoration' => true,            
            'masonry_blog_enable_link_outline' => true,

            'masonry_blog_body_font_family' => 'Noto+Sans:400,400i,700,700i',
            'masonry_blog_headings_font_family' => 'Roboto:400,400i,500,500i,700,700i',
            'masonry_blog_site_title_font_family' => '-apple-system, blinkmacsystemfont, segoe ui, roboto, oxygen-sans, ubuntu, cantarell, helvetica neue, helvetica, arial, sans-serif',

            'masonry_blog_primary_color' => '#ff1744',
            'masonry_blog_secondary_color' => '#263238',
            
            'masonry_blog_enable_subscription_in_home' => false,
            'masonry_blog_enable_subscription_in_archive' => false,
            'masonry_blog_enable_subscription_in_search' => false,
            'masonry_blog_enable_subscription_in_post_single' => false,
            'masonry_blog_enable_subscription_in_page_single' => false,
            'masonry_blog_subscription_shortcode' => '',
        );

        return $defaults;
    }
}