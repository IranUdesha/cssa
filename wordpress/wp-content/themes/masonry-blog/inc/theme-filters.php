<?php
/**
 * Displays the class names for the top header menu element.
 *
 * @since 1.0.2
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 */
if( ! function_exists( 'masonry_blog_top_header_menu_col_class' ) ) {

	function masonry_blog_top_header_menu_col_class( $class = '' ) {

		// Separates classes with a single space, collates classes for DIV
		echo 'class="' . join( ' ', masonry_blog_get_top_header_menu_col_class( $class ) ) . '"';
	}
}

/**
 * Retrieves an array of the class names for the top header menu column.
 *
 * @since 1.0.2
 *
 * @global WP_Query $wp_query WordPress Query object.
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 * @return string[] Array of class names.
 */
if( ! function_exists( 'masonry_blog_get_top_header_menu_col_class' ) ) {

	function masonry_blog_get_top_header_menu_col_class( $class = '' ) {

		$classes = array();

		if ( ! empty( $class ) ) {

			if ( ! is_array( $class ) ) {

				$class = preg_split( '#\s+#', $class );
			}

			$classes = array_merge( $classes, $class );
		} else {

			// Ensure that we always coerce class to being an array.
			$class = array();
		}

		/**
		 * Filters the list of CSS content wrapper class names.
		 *
		 * @since 1.0.2
		 *
		 * @param string[] $classes An array of content wrapper class names.
		 * @param string[] $class   An array of additional class names added to the content wrapper.
		 */
		$classes = apply_filters( 'masonry_blog_top_header_menu_col_class_filter', $classes, $class );

		$classes = array_map( 'esc_attr', $classes );

		return array_unique( $classes );
	}
}


/**
 * Displays the class names for the top header social element.
 *
 * @since 1.0.2
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 */
if( ! function_exists( 'masonry_blog_social_menu_col_class' ) ) {

	function masonry_blog_social_menu_col_class( $class = '' ) {

		// Separates classes with a single space, collates classes for DIV
		echo 'class="' . join( ' ', masonry_blog_get_social_menu_col_class( $class ) ) . '"';
	}
}

/**
 * Retrieves an array of the class names for the top header social menu column.
 *
 * @since 1.0.2
 *
 * @global WP_Query $wp_query WordPress Query object.
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 * @return string[] Array of class names.
 */
if( ! function_exists( 'masonry_blog_get_social_menu_col_class' ) ) {

	function masonry_blog_get_social_menu_col_class( $class = '' ) {

		$classes = array();

		if ( ! empty( $class ) ) {

			if ( ! is_array( $class ) ) {

				$class = preg_split( '#\s+#', $class );
			}

			$classes = array_merge( $classes, $class );
		} else {

			// Ensure that we always coerce class to being an array.
			$class = array();
		}

		/**
		 * Filters the list of CSS content wrapper class names.
		 *
		 * @since 1.0.2
		 *
		 * @param string[] $classes An array of content wrapper class names.
		 * @param string[] $class   An array of additional class names added to the content wrapper.
		 */
		$classes = apply_filters( 'masonry_blog_social_menu_col_class_filter', $classes, $class );

		$classes = array_map( 'esc_attr', $classes );

		return array_unique( $classes );
	}
}


/**
 * Displays the class names for the post content's element.
 *
 * @since 1.0.2
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 */
if( ! function_exists( 'masonry_blog_content_wrapper_class' ) ) {

	function masonry_blog_content_wrapper_class( $class = '' ) {

		// Separates classes with a single space, collates classes for DIV
		echo 'class="' . join( ' ', masonry_blog_get_content_wrapper_class( $class ) ) . '"';
	}
}


/**
 * Retrieves an array of the class names for the post container.
 *
 * @since 1.0.2
 *
 * @global WP_Query $wp_query WordPress Query object.
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 * @return string[] Array of class names.
 */
if( ! function_exists( 'masonry_blog_get_content_wrapper_class' ) ) {

	function masonry_blog_get_content_wrapper_class( $class = '' ) {

		$classes = array();

		if ( ! empty( $class ) ) {

			if ( ! is_array( $class ) ) {

				$class = preg_split( '#\s+#', $class );
			}

			$classes = array_merge( $classes, $class );
		} else {

			// Ensure that we always coerce class to being an array.
			$class = array();
		}

		$classes[] = 'masonry-article';

		$classes[] = 'mb-col';

		/**
		 * Filters the list of CSS content wrapper class names.
		 *
		 * @since 1.0.2
		 *
		 * @param string[] $classes An array of content wrapper class names.
		 * @param string[] $class   An array of additional class names added to the content wrapper.
		 */
		$classes = apply_filters( 'masonry_blog_content_wrapper_class_filter', $classes, $class );

		$classes = array_map( 'esc_attr', $classes );

		return array_unique( $classes );
	}
}

/**
 * Displays the class names for the carousel wrapper element.
 *
 * @since 1.0.2
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 */
if( ! function_exists( 'masonry_blog_carousel_wrapper_class' ) ) {

	function masonry_blog_carousel_wrapper_class( $class = '' ) {

		// Separates classes with a single space, collates classes for DIV
		echo 'class="' . join( ' ', masonry_blog_get_carousel_wrapper_class( $class ) ) . '"';
	}
}

/**
 * Retrieves an array of the class names for the carousel container.
 *
 * @since 1.0.2
 *
 * @global WP_Query $wp_query WordPress Query object.
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 * @return string[] Array of class names.
 */
if( ! function_exists( 'masonry_blog_get_carousel_wrapper_class' ) ) {

	function masonry_blog_get_carousel_wrapper_class( $class = '' ) {

		$classes = array();

		$classes[] = 'site-carousel';

		if ( ! empty( $class ) ) {

			if ( ! is_array( $class ) ) {

				$class = preg_split( '#\s+#', $class );
			}

			$classes = array_merge( $classes, $class );
		} else {

			// Ensure that we always coerce class to being an array.
			$class = array();
		}

		/**
		 * Filters the list of CSS content wrapper class names.
		 *
		 * @since 1.0.2
		 *
		 * @param string[] $classes An array of content wrapper class names.
		 * @param string[] $class   An array of additional class names added to the content wrapper.
		 */
		$classes = apply_filters( 'masonry_blog_carousel_wrapper_class_filter', $classes, $class );

		$classes = array_map( 'esc_attr', $classes );

		return array_unique( $classes );
	}
}


/**
 * Displays the class names for the carousel element.
 *
 * @since 1.0.2
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 */
if( ! function_exists( 'masonry_blog_carousel_class' ) ) {

	function masonry_blog_carousel_class( $class = '' ) {

		// Separates classes with a single space, collates classes for DIV
		echo 'class="' . join( ' ', masonry_blog_get_carousel_class( $class ) ) . '"';
	}
}

/**
 * Retrieves an array of the class names for the carousel element.
 *
 * @since 1.0.2
 *
 * @global WP_Query $wp_query WordPress Query object.
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 * @return string[] Array of class names.
 */
if( ! function_exists( 'masonry_blog_get_carousel_class' ) ) {

	function masonry_blog_get_carousel_class( $class = '' ) {

		$classes = array();

		$classes[] = 'owl-carousel';

		if ( ! empty( $class ) ) {

			if ( ! is_array( $class ) ) {

				$class = preg_split( '#\s+#', $class );
			}

			$classes = array_merge( $classes, $class );
		} else {

			// Ensure that we always coerce class to being an array.
			$class = array();
		}

		/**
		 * Filters the list of CSS content wrapper class names.
		 *
		 * @since 1.0.2
		 *
		 * @param string[] $classes An array of content wrapper class names.
		 * @param string[] $class   An array of additional class names added to the content wrapper.
		 */
		$classes = apply_filters( 'masonry_blog_carousel_class_filter', $classes, $class );

		$classes = array_map( 'esc_attr', $classes );

		return array_unique( $classes );
	}
}


/**
 * Displays the class names for the header menu section.
 *
 * @since 1.0.2
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 */
if( ! function_exists( 'masonry_blog_menu_section_class' ) ) {

	function masonry_blog_menu_section_class( $class = '' ) {

		// Separates classes with a single space, collates classes for DIV
		echo 'class="' . join( ' ', masonry_blog_get_menu_section_class( $class ) ) . '"';
	}
}

/**
 * Retrieves an array of the class names for the header menu section.
 *
 * @since 1.0.2
 *
 * @global WP_Query $wp_query WordPress Query object.
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 * @return string[] Array of class names.
 */
if( ! function_exists( 'masonry_blog_get_menu_section_class' ) ) {

	function masonry_blog_get_menu_section_class( $class = '' ) {

		$classes = array();

		if ( ! empty( $class ) ) {

			if ( ! is_array( $class ) ) {

				$class = preg_split( '#\s+#', $class );
			}

			$classes = array_merge( $classes, $class );
		} else {

			// Ensure that we always coerce class to being an array.
			$class = array();
		}

		$classes[] = 'menu-section';

		/**
		 * Filters the list of CSS content wrapper class names.
		 *
		 * @since 1.0.2
		 *
		 * @param string[] $classes An array of content wrapper class names.
		 * @param string[] $class   An array of additional class names added to the content wrapper.
		 */
		$classes = apply_filters( 'masonry_blog_menu_section_class_filter', $classes, $class );

		$classes = array_map( 'esc_attr', $classes );

		return array_unique( $classes );
	}
}


/**
 * Displays the class names for the logo section.
 *
 * @since 1.0.2
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 */
if( ! function_exists( 'masonry_blog_logo_section_class' ) ) {

	function masonry_blog_logo_section_class( $class = '' ) {

		// Separates classes with a single space, collates classes for DIV
		echo 'class="' . join( ' ', masonry_blog_get_logo_section_class( $class ) ) . '"';
	}
}

/**
 * Retrieves an array of the class names for the header logo section.
 *
 * @since 1.0.2
 *
 * @global WP_Query $wp_query WordPress Query object.
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 * @return string[] Array of class names.
 */
if( ! function_exists( 'masonry_blog_get_logo_section_class' ) ) {

	function masonry_blog_get_logo_section_class( $class = '' ) {

		$classes = array();

		if ( ! empty( $class ) ) {

			if ( ! is_array( $class ) ) {

				$class = preg_split( '#\s+#', $class );
			}

			$classes = array_merge( $classes, $class );
		} else {

			// Ensure that we always coerce class to being an array.
			$class = array();
		}

		$classes[] = 'logo-section';

		/**
		 * Filters the list of CSS content wrapper class names.
		 *
		 * @since 1.0.2
		 *
		 * @param string[] $classes An array of content wrapper class names.
		 * @param string[] $class   An array of additional class names added to the content wrapper.
		 */
		$classes = apply_filters( 'masonry_blog_logo_section_class_filter', $classes, $class );

		$classes = array_map( 'esc_attr', $classes );

		return array_unique( $classes );
	}
}


/**
 * Displays the class names for the menu section's off canvas sidebar icon column.
 *
 * @since 1.0.2
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 */
if( ! function_exists( 'masonry_blog_off_canvas_icon_col_class' ) ) {

	function masonry_blog_off_canvas_icon_col_class( $class = '' ) {

		// Separates classes with a single space, collates classes for DIV
		echo 'class="' . join( ' ', masonry_blog_get_off_canvas_icon_col_class( $class ) ) . '"';
	}
}

/**
 * Retrieves an array of the class names for the header menu section's off canvas icon column.
 *
 * @since 1.0.2
 *
 * @global WP_Query $wp_query WordPress Query object.
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 * @return string[] Array of class names.
 */
if( ! function_exists( 'masonry_blog_get_off_canvas_icon_col_class' ) ) {

	function masonry_blog_get_off_canvas_icon_col_class( $class = '' ) {

		$classes = array();

		if ( ! empty( $class ) ) {

			if ( ! is_array( $class ) ) {

				$class = preg_split( '#\s+#', $class );
			}

			$classes = array_merge( $classes, $class );
		} else {

			// Ensure that we always coerce class to being an array.
			$class = array();
		}

		$classes[] = 'mb-col';

		$classes[] = 'canvas-col';

		/**
		 * Filters the list of CSS content wrapper class names.
		 *
		 * @since 1.0.2
		 *
		 * @param string[] $classes An array of content wrapper class names.
		 * @param string[] $class   An array of additional class names added to the content wrapper.
		 */
		$classes = apply_filters( 'masonry_blog_off_canvas_icon_col_class_filter', $classes, $class );

		$classes = array_map( 'esc_attr', $classes );

		return array_unique( $classes );
	}
}


/**
 * Displays the class names for the menu section's primary menu column.
 *
 * @since 1.0.2
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 */
if( ! function_exists( 'masonry_blog_primary_menu_col_class' ) ) {

	function masonry_blog_primary_menu_col_class( $class = '' ) {

		// Separates classes with a single space, collates classes for DIV
		echo 'class="' . join( ' ', masonry_blog_get_primary_menu_col_class( $class ) ) . '"';
	}
}

/**
 * Retrieves an array of the class names for the header menu section's primary menu column.
 *
 * @since 1.0.2
 *
 * @global WP_Query $wp_query WordPress Query object.
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 * @return string[] Array of class names.
 */
if( ! function_exists( 'masonry_blog_get_primary_menu_col_class' ) ) {

	function masonry_blog_get_primary_menu_col_class( $class = '' ) {

		$classes = array();

		if ( ! empty( $class ) ) {

			if ( ! is_array( $class ) ) {

				$class = preg_split( '#\s+#', $class );
			}

			$classes = array_merge( $classes, $class );
		} else {

			// Ensure that we always coerce class to being an array.
			$class = array();
		}

		$classes[] = 'mb-col';

		$classes[] = 'nav-col';

		/**
		 * Filters the list of CSS content wrapper class names.
		 *
		 * @since 1.0.2
		 *
		 * @param string[] $classes An array of content wrapper class names.
		 * @param string[] $class   An array of additional class names added to the content wrapper.
		 */
		$classes = apply_filters( 'masonry_blog_primary_menu_col_class_filter', $classes, $class );

		$classes = array_map( 'esc_attr', $classes );

		return array_unique( $classes );
	}
}

/**
 * Displays the class names for the menu section's searc icon column.
 *
 * @since 1.0.2
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 */
if( ! function_exists( 'masonry_blog_search_icon_col_class' ) ) {

	function masonry_blog_search_icon_col_class( $class = '' ) {

		// Separates classes with a single space, collates classes for DIV
		echo 'class="' . join( ' ', masonry_blog_get_search_icon_col_class( $class ) ) . '"';
	}
}

/**
 * Retrieves an array of the class names for the header menu section's search icon column.
 *
 * @since 1.0.2
 *
 * @global WP_Query $wp_query WordPress Query object.
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 * @return string[] Array of class names.
 */
if( ! function_exists( 'masonry_blog_get_search_icon_col_class' ) ) {

	function masonry_blog_get_search_icon_col_class( $class = '' ) {

		$classes = array();

		if ( ! empty( $class ) ) {

			if ( ! is_array( $class ) ) {

				$class = preg_split( '#\s+#', $class );
			}

			$classes = array_merge( $classes, $class );
		} else {

			// Ensure that we always coerce class to being an array.
			$class = array();
		}

		$classes[] = 'mb-col';

		$classes[] = 'search-col';

		/**
		 * Filters the list of CSS content wrapper class names.
		 *
		 * @since 1.0.2
		 *
		 * @param string[] $classes An array of content wrapper class names.
		 * @param string[] $class   An array of additional class names added to the content wrapper.
		 */
		$classes = apply_filters( 'masonry_blog_search_icon_col_class_filter', $classes, $class );

		$classes = array_map( 'esc_attr', $classes );

		return array_unique( $classes );
	}
}


/**
 * Displays the class names for the toggle menu.
 *
 * @since 1.0.2
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 */
if( ! function_exists( 'masonry_blog_menu_toggle_class' ) ) {

	function masonry_blog_menu_toggle_class( $class = '' ) {

		// Separates classes with a single space, collates classes for DIV
		echo 'class="' . join( ' ', masonry_blog_get_menu_toggle_class( $class ) ) . '"';
	}
}

/**
 * Retrieves an array of the class names for the primary menu's toggle button for small devices.
 *
 * @since 1.0.2
 *
 * @global WP_Query $wp_query WordPress Query object.
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 * @return string[] Array of class names.
 */
if( ! function_exists( 'masonry_blog_get_menu_toggle_class' ) ) {

	function masonry_blog_get_menu_toggle_class( $class = '' ) {

		$classes = array();

		if ( ! empty( $class ) ) {

			if ( ! is_array( $class ) ) {

				$class = preg_split( '#\s+#', $class );
			}

			$classes = array_merge( $classes, $class );
		} else {

			// Ensure that we always coerce class to being an array.
			$class = array();
		}

		$classes[] = 'menu-toggle';

		/**
		 * Filters the list of CSS content wrapper class names.
		 *
		 * @since 1.0.2
		 *
		 * @param string[] $classes An array of content wrapper class names.
		 * @param string[] $class   An array of additional class names added to the content wrapper.
		 */
		$classes = apply_filters( 'masonry_blog_menu_toggle_class_filter', $classes, $class );

		$classes = array_map( 'esc_attr', $classes );

		return array_unique( $classes );
	}
}


/**
 * Displays the class names for the primary menu wrapper.
 *
 * @since 1.0.2
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 */
if( ! function_exists( 'masonry_blog_menu_wrapper_class' ) ) {

	function masonry_blog_menu_wrapper_class( $class = '' ) {

		// Separates classes with a single space, collates classes for DIV
		echo 'class="' . join( ' ', masonry_blog_get_menu_wrapper_class( $class ) ) . '"';
	}
}

/**
 * Retrieves an array of the class names for the primary menu's wrapper.
 *
 * @since 1.0.2
 *
 * @global WP_Query $wp_query WordPress Query object.
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 * @return string[] Array of class names.
 */
if( ! function_exists( 'masonry_blog_get_menu_wrapper_class' ) ) {

	function masonry_blog_get_menu_wrapper_class( $class = '' ) {

		$classes = array();

		if ( ! empty( $class ) ) {

			if ( ! is_array( $class ) ) {

				$class = preg_split( '#\s+#', $class );
			}

			$classes = array_merge( $classes, $class );
		} else {

			// Ensure that we always coerce class to being an array.
			$class = array();
		}

		$classes[] = 'site-navigation';

		$classes[] = 'hide-small';

		$classes[] = 'hide-medium';

		/**
		 * Filters the list of CSS content wrapper class names.
		 *
		 * @since 1.0.2
		 *
		 * @param string[] $classes An array of content wrapper class names.
		 * @param string[] $class   An array of additional class names added to the content wrapper.
		 */
		$classes = apply_filters( 'masonry_blog_menu_wrapper_class_filter', $classes, $class );

		$classes = array_map( 'esc_attr', $classes );

		return array_unique( $classes );
	}
}


/**
 * Displays the class names for the main container's row.
 *
 * @since 1.0.2
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 */
if( ! function_exists( 'masonry_blog_main_row_class' ) ) {

	function masonry_blog_main_row_class( $class = '' ) {

		// Separates classes with a single space, collates classes for DIV
		echo 'class="' . join( ' ', masonry_blog_get_main_row_class( $class ) ) . '"';
	}
}

/**
 * Retrieves an array of the class names for the body content's row.
 *
 * @since 1.0.2
 *
 * @global WP_Query $wp_query WordPress Query object.
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 * @return string[] Array of class names.
 */
if( ! function_exists( 'masonry_blog_get_main_row_class' ) ) {

	function masonry_blog_get_main_row_class( $class = '' ) {

		$classes = array();

		if ( ! empty( $class ) ) {

			if ( ! is_array( $class ) ) {

				$class = preg_split( '#\s+#', $class );
			}

			$classes = array_merge( $classes, $class );
		} else {

			// Ensure that we always coerce class to being an array.
			$class = array();
		}

		$classes[] = 'row';

		/**
		 * Filters the list of CSS content wrapper class names.
		 *
		 * @since 1.0.2
		 *
		 * @param string[] $classes An array of content wrapper class names.
		 * @param string[] $class   An array of additional class names added to the content wrapper.
		 */
		$classes = apply_filters( 'masonry_blog_main_row_class_filter', $classes, $class );

		$classes = array_map( 'esc_attr', $classes );

		return array_unique( $classes );
	}
}


/**
 * Displays the class names for the primary container.
 *
 * @since 1.0.2
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 */
if( ! function_exists( 'masonry_blog_primary_col_class' ) ) {

	function masonry_blog_primary_col_class( $class = '' ) {

		// Separates classes with a single space, collates classes for DIV
		echo 'class="' . join( ' ', masonry_blog_get_primary_col_class( $class ) ) . '"';
	}
}

/**
 * Retrieves an array of the class names for the body content's container.
 *
 * @since 1.0.2
 *
 * @global WP_Query $wp_query WordPress Query object.
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 * @return string[] Array of class names.
 */
if( ! function_exists( 'masonry_blog_get_primary_col_class' ) ) {

	function masonry_blog_get_primary_col_class( $class = '' ) {

		$classes = array();

		if ( ! empty( $class ) ) {

			if ( ! is_array( $class ) ) {

				$class = preg_split( '#\s+#', $class );
			}

			$classes = array_merge( $classes, $class );
		} else {

			// Ensure that we always coerce class to being an array.
			$class = array();
		}

		$classes[] = 'primary-container';

		/**
		 * Filters the list of CSS content wrapper class names.
		 *
		 * @since 1.0.2
		 *
		 * @param string[] $classes An array of content wrapper class names.
		 * @param string[] $class   An array of additional class names added to the content wrapper.
		 */
		$classes = apply_filters( 'masonry_blog_primary_col_class_filter', $classes, $class );

		$classes = array_map( 'esc_attr', $classes );

		return array_unique( $classes );
	}
}

/**
 * Displays the class names for the related posts' content's container.
 *
 * @since 1.0.2
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 */
if( ! function_exists( 'masonry_blog_related_posts_col_class' ) ) {

	function masonry_blog_related_posts_col_class( $class = '' ) {

		// Separates classes with a single space, collates classes for DIV
		echo 'class="' . join( ' ', masonry_blog_get_related_posts_col_class( $class ) ) . '"';
	}
}

/**
 * Retrieves an array of the class names for the related posts' container.
 *
 * @since 1.0.2
 *
 * @global WP_Query $wp_query WordPress Query object.
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 * @return string[] Array of class names.
 */
if( ! function_exists( 'masonry_blog_get_related_posts_col_class' ) ) {

	function masonry_blog_get_related_posts_col_class( $class = '' ) {

		$classes = array();

		if ( ! empty( $class ) ) {

			if ( ! is_array( $class ) ) {

				$class = preg_split( '#\s+#', $class );
			}

			$classes = array_merge( $classes, $class );
		} else {

			// Ensure that we always coerce class to being an array.
			$class = array();
		}

		/**
		 * Filters the list of CSS content wrapper class names.
		 *
		 * @since 1.0.2
		 *
		 * @param string[] $classes An array of content wrapper class names.
		 * @param string[] $class   An array of additional class names added to the content wrapper.
		 */
		$classes = apply_filters( 'masonry_blog_related_posts_col_class_filter', $classes, $class );

		$classes = array_map( 'esc_attr', $classes );

		return array_unique( $classes );
	}
}


/**
 * Displays the class names for the sidebar.
 *
 * @since 1.0.2
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 */
if( ! function_exists( 'masonry_blog_sidebar_col_class' ) ) {

	function masonry_blog_sidebar_col_class( $class = '' ) {

		// Separates classes with a single space, collates classes for DIV
		echo 'class="' . join( ' ', masonry_blog_get_sidebar_col_class( $class ) ) . '"';
	}
}

/**
 * Retrieves an array of the class names for the sidebar.
 *
 * @since 1.0.2
 *
 * @global WP_Query $wp_query WordPress Query object.
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 * @return string[] Array of class names.
 */
if( ! function_exists( 'masonry_blog_get_sidebar_col_class' ) ) {

	function masonry_blog_get_sidebar_col_class( $class = '' ) {

		$classes = array();

		if ( ! empty( $class ) ) {

			if ( ! is_array( $class ) ) {

				$class = preg_split( '#\s+#', $class );
			}

			$classes = array_merge( $classes, $class );
		} else {

			// Ensure that we always coerce class to being an array.
			$class = array();
		}

		$classes[] = 'col-lg-4';
		
		$classes[] = 'sidebar-container';

		/**
		 * Filters the list of CSS content wrapper class names.
		 *
		 * @since 1.0.2
		 *
		 * @param string[] $classes An array of content wrapper class names.
		 * @param string[] $class   An array of additional class names added to the content wrapper.
		 */
		$classes = apply_filters( 'masonry_blog_sidebar_col_class_filter', $classes, $class );

		$classes = array_map( 'esc_attr', $classes );

		return array_unique( $classes );
	}
}