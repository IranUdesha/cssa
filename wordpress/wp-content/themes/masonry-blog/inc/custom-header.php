<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Masonry_Blog
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses masonry_blog_header_style()
 */
function masonry_blog_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'masonry_blog_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 1920,
		'height'                 => 600,
		'flex-height'            => true,
		'wp-head-callback'       => 'masonry_blog_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'masonry_blog_custom_header_setup' );


if ( ! function_exists( 'masonry_blog_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see masonry_blog_custom_header_setup().
	 */
	function masonry_blog_header_style() {

		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
		<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) {
			?>
			.site-title,
			.site-description {

				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}
			<?php
		// If the user has set a custom color for the text use that.
		} else {
			?>
			.site-title a {

				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
			<?php 
		}		
		?>
		</style>
		<?php
	}
endif;


if( ! function_exists( 'masonry_blog_dynamic_styles' ) ) {

	function masonry_blog_dynamic_styles() {

		$tagline_color = masonry_blog_get_option( 'masonry_blog_tagline_color' );

		$logo_width = masonry_blog_get_option( 'masonry_blog_logo_width' );

		$body_text_color = masonry_blog_get_option( 'masonry_blog_body_txt_color' );

		$google_fonts = masonry_blog_google_font_family_choices();

		$site_title_font_family = masonry_blog_get_option( 'masonry_blog_site_title_font_family' );

		$body_font_family = masonry_blog_get_option( 'masonry_blog_body_font_family' );

		$headings_font_family = masonry_blog_get_option( 'masonry_blog_headings_font_family' );

		$primary_color = masonry_blog_get_option( 'masonry_blog_primary_color' );

		$alternate_color = masonry_blog_get_option( 'masonry_blog_secondary_color' );
		?>
		<style>
			<?php
			if( masonry_blog_get_option( 'masonry_blog_enable_link_decoration' ) ) {
				?>
				a:hover {

					text-decoration: underline;
				}
				<?php
			}

			if( masonry_blog_get_option( 'masonry_blog_enable_link_outline' ) ) {
				?>
				a:focus {

					outline: 1px dotted;
				}
				<?php
			}

			if( masonry_blog_get_option( 'masonry_blog_tagline_color' ) ) {				
				?>
				.site-description {

					color: <?php echo esc_attr( $tagline_color ); ?>;
				}
				<?php
			}

			if( $logo_width ) {
				?>
				.site-logo .custom-logo-link img {

					width: <?php echo esc_attr( $logo_width ); ?>px;
					height: auto;
				}
				<?php
			}	

			if( $body_text_color ) {				
				?>
				.pagination .nav-links a,
				.page-header .page-title,
				.archive-description p,
				.no-results p,
				.error-404 p, 
				.single-section-title h3,
				.comments-area .comments-title, 
				.comment-respond .comment-reply-title,
				.comment-respond .comment-notes,
				.comment-respond .comment-form .logged-in-as,
				.comment-respond .comment-form .logged-in-as a,
				.comment-respond .comment-form-comment label, 
				.comment-respond .comment-form-author label, 
				.comment-respond .comment-form-email label, 
				.comment-respond .comment-form-url label,
				.comment-respond .comment-form-cookies-consent label, 
				.comment-respond .comment-subscription-form label, 
				.comment-respond .mc4wp-checkbox-wp-comment-form label {

					color: <?php echo esc_attr( $body_text_color ); ?>;
				}
				<?php
			}

			if( $site_title_font_family ) {

				if( masonry_blog_is_standard_fonts( $site_title_font_family ) ) {
					?>
					.logo-section.has-advertisement .site-branding .site-title,
					.logo-section.has-no-advertisement .site-branding .site-title {
						
						font-family: <?php echo esc_attr( $site_title_font_family ); ?>;
					}
					<?php
				} else {
					?>
					.logo-section.has-advertisement .site-branding .site-title,
					.logo-section.has-no-advertisement .site-branding .site-title {
						
						font-family: <?php echo esc_attr( $google_fonts[ $site_title_font_family ] ); ?>;
					}
					<?php
				}
			}

			if( $body_font_family ) {

				if( masonry_blog_is_standard_fonts( $body_font_family ) ) {
					?>
					body {

						font-family: <?php echo esc_attr( $body_font_family ); ?>;
					}
					<?php
				} else {
					?>
					body {

						font-family: <?php echo esc_attr( $google_fonts[ $body_font_family ] ); ?>;
					}
					<?php
				}
			}

			if( $headings_font_family ) {

				if( masonry_blog_is_standard_fonts( $headings_font_family ) ) {
					?>
					h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {

						font-family: <?php echo esc_attr( $headings_font_family ); ?>;
					}
					<?php
				} else {
					?>
					h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {

						font-family: <?php echo esc_attr( $google_fonts[ $headings_font_family ] ); ?>;
					}
					<?php
				}
			}

			if( $primary_color ) {
				?>
				.site-navigation ul li.current-menu-item > a,
				.subscription-container a {

					color: <?php echo esc_attr( $primary_color ); ?>;
				}

				button, 
				.lds-ellipsis div,
				input[type='button'], 
				input[type='reset'], 
				input[type='submit'], 
				.post-link-btn, 
				.post-cat-entries ul li a,
				body .wpcf7 input[type='submit'], 
				body .wpcf7 input[type='button'], 
				.entry-metas ul li.posted-date a, 
				.jetpack_subscription_widget input[type='submit'], 
				.secondary-widget-area .mb-instagram-widget .follow-permalink a, 
				.screen-reader-shortcut, 
				body .wpforms-container .wpforms-form input[type='submit'], 
				body .wpforms-container .wpforms-form button[type='submit'], 
				body .wpforms-container .wpforms-form .wpforms-page-button,
				.mb-to-top a,
				.mb-author-widget .author-detail .author-social-links ul li a,
				.mb-post-widget .post-widget-two article.has-post-thumbnail .post-thumb span.count,
				.single-post article .single-post-header-divider, 
				body.page article .single-post-header-divider,
				.site-navigation ul li a span.menu-item-description,
				.pagination .page-numbers.current,
				.page-links .post-page-numbers,
				.page-links .post-page-numbers.current,
				.post-carousel-one.owl-carousel button.owl-dot.active,
				.mb-post-widget .post-widget-one article.has-post-thumbnail .post-thumb span.count {

					background-color: <?php echo esc_attr( $primary_color ); ?>;
				}

				.site-navigation ul li a span.menu-item-description::after {

					border-top-color: <?php echo esc_attr( $primary_color ); ?>;
				}
				<?php
			}

			if( $alternate_color ) {
				?>
				a:hover,
				.editor-entry a,
				.mb-post-widget .entry-metas ul li.comment a:hover, 
				.mb-post-widget .entry-metas ul li.posted-date a:hover,
				.widget_archive a:hover,
				.widget_categories a:hover,
				.widget_recent_entries a:hover,
				.widget_meta a:hover,
				.widget_product_categories a:hover,
				.widget_rss li a:hover,
				.widget_pages li a:hover,
				.widget_nav_menu li a:hover,
				.woocommerce-widget-layered-nav ul li a:hover,
				.widget_rss .widget-title h3 a:hover,
				.widget_rss ul li a:hover,
				.comments-area .comment-body .reply a:hover,
				.comments-area .comment-body .reply a:focus,
				.comments-area .comment-body .fn a:hover,
				.comments-area .comment-body .fn a:focus,
				footer.dark .widget_rss ul li a:hover,
				.comments-area .comment-body .fn:hover,
				.comments-area .comment-body .fn a:hover,
				.comments-area .comment-body .reply a:hover, 
				.comments-area .comment-body .comment-metadata a:hover,
				.comments-area .comment-body .comment-metadata .edit-link:hover,
				.widget_tag_cloud .tagcloud a:hover,
				.footer.dark .widget_tag_cloud .tagcloud a:hover,
				.post-carousel-one .carousel-content .post-title a:hover, 
				.post-carousel-one .carousel-content .post-author-date-meta a:hover {

					color: <?php echo esc_attr( $alternate_color ); ?>;
				}

				.widget_tag_cloud .tagcloud a:hover {

					border-color: <?php echo esc_attr( $alternate_color ); ?>;
				}

				button:hover, 
				input[type='button']:hover, 
				input[type='reset']:hover, 
				input[type='submit']:hover, 
				.post-link-btn:hover, 
				.post-cat-entries ul li a:hover,
				.entry-tags .post-tags a:hover, 
				body .wpcf7 input[type='submit']:hover, 
				body .wpcf7 input[type='button']:hover, 
				.entry-metas ul li.posted-date a:hover, 
				.secondary-widget-area .mb-instagram-widget .follow-permalink a:hover, 			
				.jetpack_subscription_widget input[type='submit']:hover, 
				body .wpforms-container .wpforms-form input[type='submit']:hover, 
				body .wpforms-container .wpforms-form button[type='submit']:hover, 
				body .wpforms-container .wpforms-form .wpforms-page-button:hover,
				.post-cat-entries ul li:nth-child(7n+1) a:hover, 
				.post-cat-entries ul li:nth-child(7n+2) a:hover, 
				.post-cat-entries ul li:nth-child(7n+3) a:hover, 
				.post-cat-entries ul li:nth-child(7n+4) a:hover, 
				.post-cat-entries ul li:nth-child(7n+5) a:hover, 
				.post-cat-entries ul li:nth-child(7n+6) a:hover, 
				.post-cat-entries ul li:nth-child(7n+7) a:hover,
				.mb-author-widget .author-detail .author-social-links ul li a:hover,
				.mb-to-top a:hover,
				.pagination .page-numbers:hover, 
				.page-links .post-page-numbers:hover {

					background-color: <?php echo esc_attr( $alternate_color ); ?>;
				}
				<?php
			}
			?>
		</style>
		<?php
	}
}
add_action( 'wp_head', 'masonry_blog_dynamic_styles' );