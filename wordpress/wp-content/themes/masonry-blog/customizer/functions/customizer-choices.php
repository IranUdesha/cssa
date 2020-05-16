<?php
/**
 * Collection of functions that returns array of different elements. 
 */

if( ! function_exists( 'masonry_blog_post_category_choices' ) ) {
	/**
     * Get post categories.
     *
     * @since 1.0.0
     *
     * @param null.
     * @return array.
     */
	function masonry_blog_post_category_choices() {

		$post_terms = get_terms( array( 'taxonomy' => 'category' ) );

		$post_categories = array();

		if( ! empty( $post_terms ) ) {

			foreach( $post_terms as $post_term ) {

				$post_categories[$post_term->slug] = $post_term->name;
			}
		}

		return $post_categories;
	}
}


if( ! function_exists( 'masonry_blog_sidebar_position_choices' ) ) {
	/**
     * Get sidebar positions.
     *
     * @since 1.0.0
     *
     * @param null.
     * @return array.
     */
	function masonry_blog_sidebar_position_choices() {

		return array(
			'left' 	=> get_template_directory_uri() . '/customizer/assets/images/sidebar_left.png',
			'right' => get_template_directory_uri() . '/customizer/assets/images/sidebar_right.png',
			'none' 	=> get_template_directory_uri() . '/customizer/assets/images/sidebar_none.png',
		);
	}
}

if( ! function_exists( 'masonry_blog_container_width_choices' ) ) {
	/**
     * Get width choices.
     *
     * @since 1.0.0
     *
     * @param null.
     * @return array.
     */
	function masonry_blog_container_width_choices() {

		return array(
			'fullwidth' 	=> esc_html__( 'Fullwidth', 'masonry-blog' ),
			'boxed' => esc_html__( 'Boxed', 'masonry-blog' ),
		);
	}
}


if( ! function_exists( 'masonry_blog_logo_section_choices' ) ) {
	/**
     * Get logo section layout
     *
     * @since 1.0.0
     *
     * @param null.
     * @return array.
     */
	function masonry_blog_logo_section_choices() {

		return array(
			'logo' => esc_html__( 'Logo', 'masonry-blog' ),
			'logo_ad' => esc_html__( 'Logo + Advertisement', 'masonry-blog' ),
		);
	}
}


if( ! function_exists( 'masonry_blog_alignment_choices' ) ) {
	/**
     * Get alignments
     *
     * @since 1.0.0
     *
     * @param null.
     * @return array.
     */
	function masonry_blog_alignment_choices() {

		return array(
			'left' => esc_html__( 'Left', 'masonry-blog' ),
			'center' => esc_html__( 'Center', 'masonry-blog' ),
			'right' => esc_html__( 'Right', 'masonry-blog' ),
		);
	}
}


if( ! function_exists( 'masonry_blog_pagination_choices' ) ) {
	/**
     * Get pagination
     *
     * @since 1.0.0
     *
     * @param null.
     * @return array.
     */
	function masonry_blog_pagination_choices() {

		return array(
			'default' => esc_html__( 'Pagination', 'masonry-blog' ),
			'infinite_scroll' => esc_html__( 'Load more on scroll', 'masonry-blog' ),
			'button_click' => esc_html__( 'Load more on button click', 'masonry-blog' ),
		);
	}
}


if( ! function_exists( 'masonry_blog_banner_display_choices' ) ) {
	/**
     * Get banner display choices on different pages
     *
     * @since 1.0.0
     *
     * @param null.
     * @return array.
     */
	function masonry_blog_banner_display_choices() {

		return array(
			'blog_page' => esc_html__( 'Blog Page Only', 'masonry-blog' ),
			'front_page' => esc_html__( 'Static Front Page Only', 'masonry-blog' ),
			'blog_n_front' => esc_html__( 'Blog Page &amp; Static Front Page', 'masonry-blog' ),
		);
	}
}


if( !function_exists( 'masonry_blog_font_family_choices' ) ) {

	function masonry_blog_font_family_choices() {

		return array(
			__( 'Standard Fonts', 'masonry-blog' ) => masonry_blog_standard_font_family_choices(),
			__( 'Google Fonts', 'masonry-blog' ) => masonry_blog_google_font_family_choices()
		);
	}
}

if( !function_exists( 'masonry_blog_google_font_family_choices' ) ) {

	function masonry_blog_google_font_family_choices() {

		return array(
		    'Roboto:400,400i,500,500i,700,700i' => 'Roboto',
		    'Noto+Sans:400,400i,700,700i' => 'Noto Sans',
		    'Lora:400,400i,700,700i' => 'Lora',
		    'Playfair+Display:400,400i,700,700i' => 'Playfair Display',
		    'Josefin+Sans:400,400i,600,600i,700,700i' => 'Josefin Sans',
		    'EB+Garamond:400,400i,500,500i,600,600i,700,700i,800,800i' => 'EB Garamond',
		    'Vollkorn:400,400i,600,600i,700,700i' => 'Vollkorn',
		    'Open+Sans:400,400i,600,600i,700,700i,800,800i' => 'Open Sans',
		    'Source+Sans+Pro:400,400i,600,600i,700,700i' => 'Source Sans Pro',
		    'Merriweather:400,400i,700,700i' => 'Merriweather'
		);
	}
}

if( !function_exists( 'masonry_blog_standard_font_family_choices' ) ) {

	function masonry_blog_standard_font_family_choices() {

		return array(
			'-apple-system, blinkmacsystemfont, segoe ui, roboto, oxygen-sans, ubuntu, cantarell, helvetica neue, helvetica, arial, sans-serif' => 'Web Safe',
			'Georgia, Times, Times New Roman, serif' => 'Serif',
			'-apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Oxygen-Sans, Ubuntu, Cantarell, Helvetica Neue, sans-serif' => 'San Serif',
			'Monaco, Lucida Sans Typewriter, Lucida Typewriter, Courier New, Courier, monospace' => 'Monospace'
		);
	}
}


if( !function_exists( 'masonry_blog_is_standard_fonts' ) ) {

	function masonry_blog_is_standard_fonts( $font ) {

		$standard_fonts = array(
			'-apple-system, blinkmacsystemfont, segoe ui, roboto, oxygen-sans, ubuntu, cantarell, helvetica neue, helvetica, arial, sans-serif' => 'Web Safe',
			'Georgia, Times, Times New Roman, serif' => 'Serif',
			'-apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Oxygen-Sans, Ubuntu, Cantarell, Helvetica Neue, sans-serif' => 'San Serif',
			'Monaco, Lucida Sans Typewriter, Lucida Typewriter, Courier New, Courier, monospace' => 'Monospace'
		);

		if( array_key_exists( $font, $standard_fonts ) ) {

			return true;
		} else {

			return false;
		}
	}
}