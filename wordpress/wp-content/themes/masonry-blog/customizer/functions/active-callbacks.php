<?php
/**
 * Active callback function for when banner is active.
 */
if( ! function_exists( 'masonry_blog_is_active_banner' ) ) {

	function masonry_blog_is_active_banner( $control ) {

		if ( $control->manager->get_setting( 'masonry_blog_display_banner' )->value() == true ) {

			return true;
		} else {
			
			return false;
		}		
	}
}


/**
 * Active callback function for when top header is active.
 */
if( ! function_exists( 'masonry_blog_is_active_top_header' ) ) {

	function masonry_blog_is_active_top_header( $control ) {

		if ( $control->manager->get_setting( 'masonry_blog_display_top_header' )->value() == true ) {

			return true;
		} else {
			
			return false;
		}		
	}
}


/**
 * Active callback function for when top header menu is active.
 */
if( ! function_exists( 'masonry_blog_is_active_top_header_menu' ) ) {

	function masonry_blog_is_active_top_header_menu( $control ) {

		if ( $control->manager->get_setting( 'masonry_blog_display_top_header' )->value() == true && $control->manager->get_setting( 'masonry_blog_enable_top_header_menu' )->value() == true ) {

			return true;
		} else {
			
			return false;
		}		
	}
}

/**
 * Active callback function for when social menu is active.
 */
if( ! function_exists( 'masonry_blog_is_active_social_menu' ) ) {

	function masonry_blog_is_active_social_menu( $control ) {

		if ( $control->manager->get_setting( 'masonry_blog_display_top_header' )->value() == true && $control->manager->get_setting( 'masonry_blog_enable_social_menu' )->value() == true ) {

			return true;
		} else {
			
			return false;
		}		
	}
}


/**
 * Active callback function for when author section is active.
 */
if( ! function_exists( 'masonry_blog_active_author_section' ) ) {

	function masonry_blog_active_author_section( $control ) {

		if ( $control->manager->get_setting( 'masonry_blog_display_author_section' )->value() == true ) {

			return true;
		} else {
			
			return false;
		}		
	}
}


/**
 * Active callback function for when related section is active.
 */
if( ! function_exists( 'masonry_blog_active_related_section' ) ) {

	function masonry_blog_active_related_section( $control ) {

		if ( $control->manager->get_setting( 'masonry_blog_display_related_section' )->value() == true ) {

			return true;
		} else {
			
			return false;
		}		
	}
}


/**
 * Active callback function for when global sidebar position is not active.
 */
if( ! function_exists( 'masonry_blog_not_active_global_sidebar' ) ) {

	function masonry_blog_not_active_global_sidebar( $control ) {

		if ( $control->manager->get_setting( 'masonry_blog_enable_global_sidebar_position' )->value() == false ) {

			return true;
		} else {

			return false;
		}		
	}
}

/**
 * Active callback function for when global sidebar position is active.
 */
if( ! function_exists( 'masonry_blog_active_global_sidebar' ) ) {

	function masonry_blog_active_global_sidebar( $control ) {

		if ( $control->manager->get_setting( 'masonry_blog_enable_global_sidebar_position' )->value() == true ) {

			return true;
		} else {

			return false;
		}		
	}
}



/**
 * Active callback function for when common post sidebar position is active.
 */
if( ! function_exists( 'masonry_blog_active_common_post_sidebar' ) ) {

	function masonry_blog_active_common_post_sidebar( $control ) {

		if ( $control->manager->get_setting( 'masonry_blog_enable_global_sidebar_position' )->value() == false && $control->manager->get_setting( 'masonry_blog_enable_common_post_sidebar_position' )->value() == true ) {

			return true;
		} else {

			return false;
		}		
	}
}



/**
 * Active callback function for when common page sidebar position is active.
 */
if( ! function_exists( 'masonry_blog_active_common_page_sidebar' ) ) {

	function masonry_blog_active_common_page_sidebar( $control ) {

		if ( $control->manager->get_setting( 'masonry_blog_enable_global_sidebar_position' )->value() == false && $control->manager->get_setting( 'masonry_blog_enable_common_page_sidebar_position' )->value() == true ) {

			return true;
		} else {

			return false;
		}		
	}
}