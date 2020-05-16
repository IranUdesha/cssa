<?php
/**
 * Custom hooks to enhance theme's functionality.
 *
 * @since 1.0.2
 *
 * @package Masonry_Blog
 */

/**
 * Carousel hooks
 */
add_action( 'masonry_blog_carousel', 'masonry_blog_carousel_action', 10 );
add_action( 'masonry_blog_carousel_section_wrapper_start', 'masonry_blog_carousel_section_wrapper_start_action', 10 );
add_action( 'masonry_blog_carousel_section_wrapper_end', 'masonry_blog_carousel_section_wrapper_end_action', 10 );
add_action( 'masonry_blog_carousel_item_wrapper_start', 'masonry_blog_carousel_item_wrapper_start_action', 10 );
add_action( 'masonry_blog_carousel_item_wrapper_end', 'masonry_blog_carousel_item_wrapper_end_action', 10 );

if( ! function_exists( 'masonry_blog_carousel_action' ) ) {
	/**
	 * Output the carousel template.
	 */
	function masonry_blog_carousel_action() {

		if( ! masonry_blog_display_carousel() ) {

			return;
		}

		get_template_part( 'template-parts/carousel/carousel' );
	}
}

if( ! function_exists( 'masonry_blog_carousel_section_wrapper_start_action' ) ) {
	/**
	 * Output the carousel's start wrapper.
	 */
	function masonry_blog_carousel_section_wrapper_start_action() {

		$carousel_wrapper_class = '';

		if( masonry_blog_get_option( 'masonry_blog_banner_width' ) == 'fullwidth' ) {

			$carousel_wrapper_class = 'site-carousel-fullwidth';
		}
		?>
		<div <?php masonry_blog_carousel_wrapper_class( $carousel_wrapper_class ); ?>>
		<?php
		if( masonry_blog_get_option( 'masonry_blog_banner_width' ) == 'boxed' ) {
			?>
			<div class="mb-container">
			<?php
		}
		?>
		<div <?php masonry_blog_carousel_class( 'post-carousel-one' ); ?>>
		<?php
	}
}

if( ! function_exists( 'masonry_blog_carousel_section_wrapper_end_action' ) ) {
	/**
	 * Output the carousel's end wrapper.
	 */
	function masonry_blog_carousel_section_wrapper_end_action() {
		?>
		</div>
		<?php
		if( masonry_blog_get_option( 'masonry_blog_banner_width' ) == 'boxed' ) {
			?>
			</div>
			<?php
		}
		?>
		</div>
		<?php
	}
}

if( ! function_exists( 'masonry_blog_carousel_item_wrapper_start_action' ) ) {
	/**
	 * Output the carousel's item's start wrapper.
	 */
	function masonry_blog_carousel_item_wrapper_start_action() {
		?>
		<div class="post-carousel-item owl-lazy" <?php if( has_post_thumbnail() ) { ?>data-src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ); ?>"<?php } ?>>
		<?php
	}
}

if( ! function_exists( 'masonry_blog_carousel_item_wrapper_end_action' ) ) {
	/**
	 * Output the carousel's item's end wrapper.
	 */
	function masonry_blog_carousel_item_wrapper_end_action() {
		?>
		</div>
		<?php
	}
}


/**
 * Blog/Archive/Search/Single content hooks
 */
add_action( 'masonry_blog_default_content_template', 'masonry_blog_default_content_template_action', 10 );
add_action( 'masonry_blog_archive_content_template', 'masonry_blog_archive_content_template_action', 10 );
add_action( 'masonry_blog_search_content_template', 'masonry_blog_search_content_template_action', 10 );
add_action( 'masonry_blog_single_content_template', 'masonry_blog_single_content_template_action', 10 );
add_action( 'masonry_blog_related_post_content_template', 'masonry_blog_related_post_content_template_action', 10 );
add_action( 'masonry_blog_author_description', 'masonry_blog_author_description_action', 10 );

if( ! function_exists( 'masonry_blog_default_content_template_action' ) ) {
	/**
	 * Output the blog post content's template.
	 */
	function masonry_blog_default_content_template_action() {

		get_template_part( 'template-parts/content', get_post_type() );
	}
} 

if( ! function_exists( 'masonry_blog_archive_content_template_action' ) ) {
	/**
	 * Output the archive post content's template.
	 */
	function masonry_blog_archive_content_template_action() {

		get_template_part( 'template-parts/content', 'archive' );
	}
} 

if( ! function_exists( 'masonry_blog_search_content_template_action' ) ) {
	/**
	 * Output the search post content's template.
	 */
	function masonry_blog_search_content_template_action() {

		get_template_part( 'template-parts/content', 'search' );
	}
}

if( ! function_exists( 'masonry_blog_single_content_template_action' ) ) {
	/**
	 * Output the single post content's template.
	 */
	function masonry_blog_single_content_template_action() {

		get_template_part( 'template-parts/single/content', 'single' );
	}
}

if( ! function_exists( 'masonry_blog_related_post_content_template_action' ) ) {
	/**
	 * Output the related post content's template.
	 */
	function masonry_blog_related_post_content_template_action() {

		get_template_part( 'template-parts/single/content', 'related' );
	}
} 

if( ! function_exists( 'masonry_blog_author_description_action' ) ) {
	/**
	 * Output the author's description displayed on post single.
	 */
	function masonry_blog_author_description_action() {
		?>
		<div class="author-info">
			<h3 class="author-name"><?php echo esc_html( get_the_author() ); ?></h3>
			<?php
			if( get_the_author_meta( 'description' ) ) {
				?>
				<div class="author-description">
					<p><?php echo esc_html( get_the_author_meta( 'description' ) ); ?></p>
				</div>
				<?php
			}
			?>
		</div>
		<?php		
	}
}


/**
 * Page main content's hooks
 */
add_action( 'masonry_blog_before_content_template', 'masonry_blog_before_content_template_action', 10 );
add_action( 'masonry_blog_after_content_template', 'masonry_blog_after_content_template_action', 10 );

if( ! function_exists( 'masonry_blog_before_content_template_action' ) ) {
	/**
	 * Output the page content's main container wrapper start template.
	 */
	function masonry_blog_before_content_template_action() {
		?>
		<div class="mb-container"><div <?php masonry_blog_main_row_class(); ?>><div <?php masonry_blog_primary_col_class(); ?>>
		<?php
	}
} 

if( ! function_exists( 'masonry_blog_after_content_template_action' ) ) {
	/**
	 * Output the page content's main container wrapper end template.
	 */
	function masonry_blog_after_content_template_action() {
		?>
		</div><?php get_sidebar(); ?></div></div>
		<?php		
	}
} 


/**
 * Pagination hooks
 */
add_action( 'masonry_blog_infinite_scroll_template', 'masonry_blog_infinite_scroll_template_action', 10 );
add_action( 'masonry_blog_button_click_scroll_template', 'masonry_blog_button_click_scroll_template_action', 10 );
add_action( 'masonry_blog_pagination_template', 'masonry_blog_pagination_template_action', 10 );
add_action( 'masonry_blog_no_more_template', 'masonry_blog_no_more_template_action', 10 );
add_action( 'wp_ajax_masonry_blog_load_posts_action', 'masonry_blog_load_posts', 10 );
add_action( 'wp_ajax_nopriv_masonry_blog_load_posts_action', 'masonry_blog_load_posts', 10 );

if( ! function_exists( 'masonry_blog_infinite_scroll_template_action' ) ) {
	/**
	 * Outputs template for ajax post loading on scroll.
	 */
	function masonry_blog_infinite_scroll_template_action() {
		?>
		<div class="infinite-scroll-container">
			<span class="infinite-scroll-icon">
				<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
			</span>
		</div>
		<?php
		/**
	    * Hook - masonry_blog_no_more_template.
	    *
	    * @hooked masonry_blog_no_more_template_action - 10
	    */
	    do_action( 'masonry_blog_no_more_template' );
	}
}

if( ! function_exists( 'masonry_blog_button_click_scroll_template_action' ) ) {
	/**
	 * Outputs template for ajax post loading on button click.
	 */
	function masonry_blog_button_click_scroll_template_action() {
		?>
		<div class="load-more-btn-container">
			<button class="load-more-btn"><?php esc_html_e( 'Load More', 'masonry-blog' ); ?> <span class="load-more-icon"><i class="fa fa-spinner fa-pulse" aria-hidden="true"></i></span></button>
		</div>
		<?php
		/**
	    * Hook - masonry_blog_no_more_template.
	    *
	    * @hooked masonry_blog_no_more_template_action - 10
	    */
	    do_action( 'masonry_blog_no_more_template' );
	}
}

if( ! function_exists( 'masonry_blog_pagination_template_action' ) ) {
	/**
	 * Outputs pagination.
	 */
	function masonry_blog_pagination_template_action() {
		
		the_posts_pagination( array(
    		'mid_size' => 1,
			'prev_text' => '<i class="fa fa-long-arrow-left" aria-hidden="true"></i>',
			'next_text' => '<i class="fa fa-long-arrow-right" aria-hidden="true"></i>',
    	) );
	}
}

if( ! function_exists( 'masonry_blog_no_more_template_action' ) ) {
	/**
	 * Outputs HTML markup when there are no posts to load via ajax call.
	 */
	function masonry_blog_no_more_template_action() {
		?>
		<div class="no-more-container">
			<button class="no-more-to-load"><?php esc_html_e( 'Nothing More To Load', 'masonry-blog' ); ?></button>
		</div>
		<?php
	}
}

if( ! function_exists( 'masonry_blog_load_posts' ) ) {

    function masonry_blog_load_posts() {

        if( ! check_ajax_referer( 'masonry-blog-load-more-nonce', 'nonce' ) ) {

            die();
        }

        // prepare our arguments for the query
        $args = json_decode( stripslashes( wp_unslash( $_POST['query'] ) ), true );

        $args['paged'] = wp_unslash( $_POST['page'] ) + 1; // we need next page to be loaded

        $page_type = wp_unslash( $_POST['page_type'] );

        $args['post_status'] = 'publish';

        $ajax_query = new WP_Query( $args );
     
        if( $ajax_query->have_posts() ) :

            while( $ajax_query->have_posts() ) :

                $ajax_query->the_post();

                switch ( $page_type ) {

                    case 'home-page':
                        
                        get_template_part( 'template-parts/content', get_post_type() );
                        break;

                    case 'archive-page':
                        
                        get_template_part( 'template-parts/content', 'archive' );
                        break;

                    case 'search-page':
                        
                        get_template_part( 'template-parts/content', 'search' );
                        break;

                    default:

                        break;
                }

            endwhile;

            wp_reset_postdata();
     
        endif;

        wp_die(); // here we exit the script and even no wp_reset_query() required!
    }
}


/**
 * Footer hooks
 */
add_action( 'masonry_blog_footer_widget_areas', 'masonry_blog_footer_widget_areas_action', 10 );
add_action( 'masonry_blog_footer_copyright_credit', 'masonry_blog_footer_copyright_credit_action', 10 );
add_action( 'masonry_blog_back_to_top', 'masonry_blog_back_to_top_action', 10 );
add_action( 'masonry_blog_off_canvas_sidebar', 'masonry_blog_off_canvas_sidebar_action', 10 );
add_action( 'masonry_blog_subscription_area', 'masonry_blog_subscription_area_action', 10 );

if( ! function_exists( 'masonry_blog_footer_widget_areas_action' ) ) {
	/**
	 * Outputs template for footer's widget areas.
	 */
	function masonry_blog_footer_widget_areas_action() {

		get_template_part( 'template-parts/footer/sections/footer', 'top' );
	}
}

if( ! function_exists( 'masonry_blog_footer_copyright_credit_action' ) ) {
	/**
	 * Outputs template for footer's copyright and credit text.
	 */
	function masonry_blog_footer_copyright_credit_action() {

		get_template_part( 'template-parts/footer/sections/footer', 'bottom' );
	}
}

if( ! function_exists( 'masonry_blog_back_to_top_action' ) ) {
	/**
	 * Outputs template for scroll back to top button.
	 */
	function masonry_blog_back_to_top_action() {

		get_template_part( 'template-parts/footer/sections/back-to-top' );
	}
}

if( ! function_exists( 'masonry_blog_off_canvas_sidebar_action' ) ) {
	/**
	 * Outputs template for off canvas sidebar.
	 */
	function masonry_blog_off_canvas_sidebar_action() {

		get_template_part( 'template-parts/footer/sections/off-canvas-sidebar' );
	}
}

if( ! function_exists( 'masonry_blog_subscription_area_action' ) ) {

	function masonry_blog_subscription_area_action() {

		if( ! is_single() && ! is_404() ) {

			get_template_part( 'template-parts/subscription/content', 'subscription' );
		}
	}
}

/**
 * Header hooks
 */
add_action( 'masonry_blog_header', 'masonry_blog_header_action', 10 );
add_action( 'masonry_blog_top_header', 'masonry_blog_top_header_action', 10 );
add_action( 'masonry_blog_top_header_content', 'masonry_blog_top_header_content_action', 10 );
add_action( 'masonry_blog_middle_header_content', 'masonry_blog_middle_header_content_action', 10 );
add_action( 'masonry_blog_bottom_header_content', 'masonry_blog_bottom_header_content_action', 10 );

if( ! function_exists( 'masonry_blog_header_action' ) ) {
	/**
	 * Outputs template for header sections.
	 */
	function masonry_blog_header_action() {
		?>
		<header id="masthead" class="site-header lazy-bg-img" <?php if( has_header_image() ) { ?>data-src="<?php header_image(); ?>"<?php } ?>>
			<?php
			/**
			 * Hook: masonry_blog_top_header.
			 *
			 * @hooked masonry_blog_top_headerr_action - 10
			 */ 
			do_action( 'masonry_blog_top_header' );
			
			get_template_part( 'template-parts/header/sections/header', 'middle' );

			get_template_part( 'template-parts/header/sections/header', 'bottom' );
			?>
		</header><!-- #masthead.site-header -->
		<?php
		get_template_part( 'template-parts/header/sections/mobile-menu' );
		
		get_template_part( 'template-parts/header/sections/header', 'search' );
	}
}

if( ! function_exists( 'masonry_blog_top_header_action' ) ) {
	/**
	 * Outputs template for header's top header section.
	 */
	function masonry_blog_top_header_action() {

		if( ( has_nav_menu( 'menu-2' ) || has_nav_menu( 'menu-3' ) ) && masonry_blog_get_option( 'masonry_blog_display_top_header' ) == true ) {

			if( ( has_nav_menu( 'menu-2' ) && masonry_blog_get_option( 'masonry_blog_enable_top_header_menu' ) == true ) || ( has_nav_menu( 'menu-3' ) && masonry_blog_get_option( 'masonry_blog_enable_social_menu' ) == true ) ) {

				get_template_part( 'template-parts/header/sections/header', 'top' );
			}
		}
	}
}

if( ! function_exists( 'masonry_blog_top_header_content_action' ) ) {
	/**
	 * Outputs templates for header's top header's section contents.
	 */
	function masonry_blog_top_header_content_action() {

		get_template_part( 'template-parts/header/sections/top-menu' );

		get_template_part( 'template-parts/header/sections/social-menu' );
	}
}

if( ! function_exists( 'masonry_blog_middle_header_content_action' ) ) {
	/**
	 * Outputs template for header's logo section.
	 */
	function masonry_blog_middle_header_content_action() {
	
		get_template_part( 'template-parts/header/sections/header-logo' );

		get_template_part( 'template-parts/header/sections/header-ad' );
	}
}

if( ! function_exists( 'masonry_blog_bottom_header_content_action' ) ) {
	/**
	 * Outputs template for header's menu section.
	 */
	function masonry_blog_bottom_header_content_action() {
	
		get_template_part( 'template-parts/header/sections/off-canvas-icon' );

		get_template_part( 'template-parts/header/sections/primary-menu' );

		get_template_part( 'template-parts/header/sections/search-icon' );
	}
}