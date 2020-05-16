<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Masonry_Blog
 */

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function masonry_blog_pingback_header() {

	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'masonry_blog_pingback_header' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function masonry_blog_body_classes( $classes ) {

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) || masonry_blog_sidebar_position() == 'none' ) {

		$classes[] = 'no-sidebar';
	} else {

		if( masonry_blog_sidebar_position() == 'right' ) {

			$classes[] = 'has-sidebar right-sidebar';
		}

		if( masonry_blog_sidebar_position() == 'left' ) {

			$classes[] = 'has-sidebar left-sidebar';
		}
	}

	// Adds a class of sticky-menu when sticky menu section is enabled.
	if( masonry_blog_get_option( 'masonry_blog_enable_sticky_menu' ) == true ) {

		$classes[] = 'sticky-menu';
	}

	// Adds a class of sticky-sidebar when sticky sidebar is enabled.
	if( masonry_blog_get_option( 'masonry_blog_enable_sticky_sidebar' ) == true ) {

		$classes[] = 'sticky-sidebar';
	}

	// Adds a class of fullwidth-carousel when Fullwidth carousel width is selected.
	if( masonry_blog_get_option( 'masonry_blog_banner_width' ) == 'fullwidth' ) {

		$classes[] = 'fullwidth-carousel';
	}

	return $classes;
}
add_filter( 'body_class', 'masonry_blog_body_classes' );


if( ! function_exists( 'masorny_blog_post_classes' ) ) {
	/**
	 * Adds custom classes to the array of post classes.
	 *
	 * @param array $classes Classes for the article element.
	 * @return array
	 */
	function masonry_blog_post_classes( $classes ) {

		// Adds $classes Classes for the article element in home, archive and search pages
		if( is_home() || is_archive() || is_search() || wp_doing_ajax() ) {

			$content_alignment = masonry_blog_get_option( 'masonry_blog_blog_archive_search_content_alignment' );

			if( $content_alignment ) {

				$classes[] = masonry_blog_alignment_class( $content_alignment );
			}
		}

		return $classes;
	}
}
add_filter( 'post_class', 'masonry_blog_post_classes' );


if( ! function_exists( 'masorny_blog_top_header_menu_col_classes' ) ) {
	/**
	 * Adds custom classes to the array of top header menu classes.
	 *
	 * @param array $classes Classes for the top header menu element.
	 * @return array
	 */
	function masorny_blog_top_header_menu_col_classes( $classes ) {

		$enable_social_menu = masonry_blog_get_option( 'masonry_blog_enable_social_menu' );

		// Check for social menu
		if( $enable_social_menu == false ) {

			$classes[] = 'col-lg-12';
		} else {

			$classes[] = 'col-lg-6';
		}

		$menu_alignment = masonry_blog_get_option( 'masonry_blog_top_header_menu_alignment' );

		if( $menu_alignment ) {

			// Adds aligment class
			$classes[] = masonry_blog_alignment_class( $menu_alignment );
		}

		return $classes;
	}
}
add_filter( 'masonry_blog_top_header_menu_col_class_filter', 'masorny_blog_top_header_menu_col_classes' );


if( ! function_exists( 'masorny_blog_social_menu_col_classes' ) ) {
	/**
	 * Adds custom classes to the array of top header menu classes.
	 *
	 * @param array $classes Classes for the top header menu element.
	 * @return array
	 */
	function masorny_blog_social_menu_col_classes( $classes ) {

		$enable_top_header_menu = masonry_blog_get_option( 'masonry_blog_enable_top_header_menu' );

		// Check for top header menu
		if( $enable_top_header_menu == false ) {

			$classes[] = 'col-lg-12';
		} else {

			$classes[] = 'col-lg-6';
		}

		$menu_alignment = masonry_blog_get_option( 'masonry_blog_social_menu_alignment' );

		if( $menu_alignment ) {

			// Adds aligment class
			$classes[] = masonry_blog_alignment_class( $menu_alignment );
		}

		$display_menu_title = masonry_blog_get_option( 'masonry_blog_display_social_links_title' );

		if( $display_menu_title == true ) {

			$classes[] = 'show-social-menu-link-title';
		} else {

			$classes[] = 'hide-social-menu-link-title';
		}

		return $classes;
	}
}
add_filter( 'masonry_blog_social_menu_col_class_filter', 'masorny_blog_social_menu_col_classes' );


if( ! function_exists( 'masonry_blog_menu_wrapper_classes' ) ) {
	/**
	 * Adds custom classes to the array of menu wrapper classes.
	 *
	 * @param array $classes Classes for the nav element.
	 * @return array
	 */
	function masonry_blog_menu_wrapper_classes( $classes ) {

		$menu_alignment = masonry_blog_get_option( 'masonry_blog_menu_alignment' );

		if( $menu_alignment ) {

			// Adds aligment class
			$classes[] = masonry_blog_alignment_class( $menu_alignment );
		}

		return $classes;
	}
}
add_filter( 'masonry_blog_menu_wrapper_class_filter', 'masonry_blog_menu_wrapper_classes' );


if( ! function_exists( 'masonry_blog_menu_toggle_classes' ) ) {
	/**
	 * Adds custom classes to the array of menu toggle classes.
	 *
	 * @param array $classes Classes for the menu toggle element.
	 * @return array
	 */
	function masonry_blog_menu_toggle_classes( $classes ) {

		$menu_alignment = masonry_blog_get_option( 'masonry_blog_menu_alignment' );

		if( $menu_alignment ) {

			// Adds aligment class
			$classes[] = masonry_blog_alignment_class( $menu_alignment );
		}

		return $classes;
	}
}
add_filter( 'masonry_blog_menu_toggle_class_filter', 'masonry_blog_menu_toggle_classes' );


if( ! function_exists( 'masonry_blog_primary_col_classes' ) ) {
	/**
	 * Adds custom classes to the array of primary column classes.
	 *
	 * @param array $classes Classes for the primary element.
	 * @return array
	 */
	function masonry_blog_primary_col_classes( $classes ) {

		// Adds column class checking sidebar widget area and sidebar position
		if( is_active_sidebar( 'sidebar-1' ) && masonry_blog_sidebar_position() != 'none' ) {

			$classes[] = 'col-lg-8';
		} else {

			if( ! is_singular() ) {

				$classes[] = 'col-lg-12';
			} else {

				$classes[] = 'col-xl-8 col-lg-10 mb-margin-auto';
			}
		}

		return $classes;
	}	
}
add_filter( 'masonry_blog_primary_col_class_filter', 'masonry_blog_primary_col_classes' );


if( ! function_exists( 'masonry_blog_logo_section_classes' ) ) {
	/**
	 * Adds custom classes to the array of logo section classes.
	 *
	 * @param array $classes Classes for the logo section.
	 * @return array
	 */
	function masonry_blog_logo_section_classes( $classes ) {

		// Adds class checking logo section layout
		if( masonry_blog_get_option( 'masonry_blog_logo_section_layout' ) == 'logo' ) {

			$classes[] = 'has-no-advertisement';
		} else {

			$classes[]  = 'has-advertisement';
		}

		return $classes;
	}
}
add_filter( 'masonry_blog_logo_section_class_filter', 'masonry_blog_logo_section_classes' );


if( ! function_exists( 'masonry_blog_main_row_classes' ) ) {
	/**
	 * Adds custom classes to the array of main row classes.
	 *
	 * @param array $classes Classes for the main row element.
	 * @return array
	 */
	function masonry_blog_main_row_classes( $classes ) {

		// Adds class to reverse primary and sidebar column when sidebar position is left
		if( masonry_blog_sidebar_position() == 'left' ) {

			$classes[] = 'mb-row-reverse';
		}

		return $classes;
	}
}
add_filter( 'masonry_blog_main_row_class_filter', 'masonry_blog_main_row_classes' );


if( ! function_exists( 'masonry_blog_related_posts_classes' ) ) {
	/**
	 * Adds custom classes to the array of related posts column classes.
	 *
	 * @param array $classes Classes for the related posts column element.
	 * @return array
	 */
	function masonry_blog_related_posts_classes( $classes ) {

		// Adds class checking sidebar
		if( masonry_blog_sidebar_position() == 'none' ) {

			$classes[] = 'col-md-4 col-lg-4';
		} else {

			$classes[] = 'col-md-6 col-lg-6';
		}

		return $classes;
	}
}
add_filter( 'masonry_blog_related_posts_col_class_filter', 'masonry_blog_related_posts_classes' );


if( ! function_exists( 'masonry_blog_sidebar_classes' ) ) {
	/**
	 * Adds custom classes to the array of sidebar classes.
	 *
	 * @param array $classes Classes for the sidebar element.
	 * @return array
	 */
	function masonry_blog_sidebar_classes( $classes ) {

		if( masonry_blog_get_option( 'masonry_blog_enable_sidebar_small_devices' ) == false ) {

			$classes[] = 'hide-small';
		}

		return $classes;
	}
}
add_filter( 'masonry_blog_sidebar_col_class_filter', 'masonry_blog_sidebar_classes' );


if( ! function_exists( 'masonry_blog_posts_navigation' ) ) {

	function masonry_blog_posts_navigation() {

		$next_post = get_next_post();

	    $previous_post = get_previous_post();

	    $navigation_args = array();

	    if( !empty( $next_post ) ) {

	    	$navigation_args['next_text'] = '';

	    	$navigation_args['next_text'] = '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Next Post', 'masonry-blog' ) . '</span><span class="next-post-title hide-small">' . esc_html( $next_post->post_title ) . '</span>';
	    }

	    if( !empty( $previous_post ) ) {

	    	$navigation_args['prev_text'] = '';

	    	$navigation_args['prev_text'] .= '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Previous Post', 'masonry-blog' ) . '</span><span class="prev-post-title hide-small">' . esc_html( $previous_post->post_title ) . '</span>';
	    }

	    the_post_navigation( $navigation_args );
	}
}