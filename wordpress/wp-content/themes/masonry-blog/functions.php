<?php
/**
 * Masonry Blog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Masonry_Blog
 */

$current_theme = wp_get_theme( 'masonry-blog' );

define( 'MASONRY_BLOG_VERSION', $current_theme->get( 'Version' ) );

if ( ! function_exists( 'masonry_blog_setup' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function masonry_blog_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Masonry Blog, use a find and replace
		 * to change 'masonry-blog' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'masonry-blog', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'masonry-blog-thumbnail-one', 800, 450, true ); // 16x9 aspect ratio, for related posts
		add_image_size( 'masonry-blog-thumbnail-two', 400, 400, true ); // 1:1 aspect ratio, for posts widget

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary Menu', 'masonry-blog' ),
			'menu-2' => esc_html__( 'Top Header Menu', 'masonry-blog' ),
			'menu-3' => esc_html__( 'Social Menu', 'masonry-blog' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'masonry_blog_custom_background_args', array(
			'default-color' => 'eeeeee',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		add_theme_support( 'wp-block-styles' );
	}
endif;
add_action( 'after_setup_theme', 'masonry_blog_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function masonry_blog_content_width() {

	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'masonry_blog_content_width', 640 );
}
add_action( 'after_setup_theme', 'masonry_blog_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function masonry_blog_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'masonry-blog' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'masonry-blog' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Left', 'masonry-blog' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'masonry-blog' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Middle', 'masonry-blog' ),
		'id'            => 'sidebar-3',
		'description'   => esc_html__( 'Add widgets here.', 'masonry-blog' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Right', 'masonry-blog' ),
		'id'            => 'sidebar-4',
		'description'   => esc_html__( 'Add widgets here.', 'masonry-blog' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Off Canvas Sidebar', 'masonry-blog' ),
		'id'            => 'sidebar-5',
		'description'   => esc_html__( 'Add widgets here.', 'masonry-blog' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Header Advertisement Area', 'masonry-blog' ),
		'id'            => 'sidebar-6',
		'description'   => esc_html__( 'Add widgets here.', 'masonry-blog' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
	) );

	register_widget( 'Masonry_Blog_Author_Widget' );

	register_widget( 'Masonry_Blog_Post_Widget' );

	register_widget( 'Masonry_Blog_Social_Widget' );
}
add_action( 'widgets_init', 'masonry_blog_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function masonry_blog_scripts() {

	wp_enqueue_style( 'masonry-blog-style', get_stylesheet_uri() );

	wp_enqueue_style( 'masonry-blog-fonts', masonry_blog_google_fonts_url() );

	wp_enqueue_style( 'bootstrap-reboot', get_template_directory_uri() . '/assets/css/bootstrap-reboot.min.css' );

	wp_enqueue_style( 'bootstrap-grid', get_template_directory_uri() . '/assets/css/bootstrap-grid.min.css' );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css' );

	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css' );

	wp_enqueue_style( 'masonry-blog-theme', get_template_directory_uri() . '/assets/css/theme.min.css', array(), MASONRY_BLOG_VERSION );

	wp_enqueue_script( 'lazy', get_template_directory_uri() . '/assets/js/jquery.lazy.js', array( 'jquery' ), '1.7.10', true );

	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array( 'jquery' ), '2.3.4', true );

	$script_obj = array(
		'sticky_sidebar' => false,
		'sticky_menu' => false
	);

	if( masonry_blog_get_option( 'masonry_blog_enable_sticky_sidebar' ) == true ) {

		wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/assets/js/theia-sticky-sidebar.min.js', array( 'jquery' ), '1.7.0', true );

		$script_obj['sticky_sidebar'] = true;
	}

	if( masonry_blog_get_option( 'masonry_blog_enable_sticky_menu' ) == true ) {

		wp_enqueue_script( 'sticky', get_template_directory_uri() . '/assets/js/jquery.sticky.min.js', array( 'jquery' ), '1.0.4', true );

		$script_obj['sticky_menu'] = true;
	}

	if( masonry_blog_get_option( 'masonry_blog_pagination' ) != 'default' ) {

		if( masonry_blog_get_option( 'masonry_blog_pagination' ) == 'infinite_scroll' ) {

			$script_obj['load_more_type'] = 'infinite_scroll';
		}

		if( masonry_blog_get_option( 'masonry_blog_pagination' ) == 'button_click' ) {

			$script_obj['load_more_type'] = 'button_click_load';
		}

		global $wp_query;

		$script_obj['load_more'] = array(
			'ajax_url' => admin_url( 'admin-ajax.php' ),
	       	'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
	       	'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
	       	'max_page' => $wp_query->max_num_pages,
	       	'nonce' => wp_create_nonce( 'masonry-blog-load-more-nonce' ),
	    );
	}

	wp_enqueue_script( 'masonry-blog-navigation', get_template_directory_uri() . '/assets/js/navigation.min.js', array( 'jquery' ), MASONRY_BLOG_VERSION, true );

	wp_enqueue_script( 'masonry-blog-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.min.js', array( 'jquery' ), MASONRY_BLOG_VERSION, true );	

	wp_register_script( 'masonry-blog-theme', get_template_directory_uri() . '/assets/js/theme.min.js', array( 'jquery', 'masonry' ), MASONRY_BLOG_VERSION, true );

	wp_localize_script( 'masonry-blog-theme', 'scriptObj', $script_obj );

	wp_enqueue_script( 'masonry-blog-theme' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {

		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'masonry_blog_scripts' );

/**
 * Enqueue backend's scripts and styles.
 */
function masonry_blog_admin_scripts() {

	wp_enqueue_script( 'media-upload' );

	wp_enqueue_media();

	wp_enqueue_style( 'masonry-blog-theme-backend', get_template_directory_uri() . '/assets/css/theme-backend.min.css' );

	wp_enqueue_script( 'masonry-blog-theme-backend', get_template_directory_uri() . '/assets/js/theme-backend.js', array( 'jquery' ), MASONRY_BLOG_VERSION, true );
}
add_action( 'admin_enqueue_scripts', 'masonry_blog_admin_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/customizer/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {

	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Custom Post Field.
 */
require get_template_directory() . '/inc/custom-fields.php';

/**
 * Theme functions.
 */
require get_template_directory() . '/inc/theme-functions.php';


/**
 * Load Custom Widgets.
 */
require get_template_directory() . '/widgets/about-widget.php';
require get_template_directory() . '/widgets/post-widget.php';
require get_template_directory() . '/widgets/social-widget.php';

/**
 * Load Custom filters.
 */
require get_template_directory() . '/inc/theme-filters.php';

/**
 * Load Custom hooks.
 */
require get_template_directory() . '/inc/theme-hooks.php';

/**
 * Load Plugin Recommendation.
 */
require get_template_directory() . '/inc/tgmpa/recommended-plugins.php';