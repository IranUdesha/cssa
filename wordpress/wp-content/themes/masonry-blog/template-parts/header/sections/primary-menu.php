<?php
/**
 * Template part for displaying primary menu
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Masonry_Blog
 */
?>
<div <?php masonry_blog_primary_menu_col_class(); ?>>
	<div class="main-navigation-wrapper">
		<div <?php masonry_blog_menu_toggle_class(); ?>>
			<span><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;<?php esc_html_e( 'Menu', 'masonry-blog' ); ?></span>
		</div>
		<nav id="site-navigation" <?php masonry_blog_menu_wrapper_class(); ?>>
			<?php
        	$masonry_blog_primary_menu_args = array(
	 			'theme_location' => 'menu-1',
	 			'container' => '',
	 			'menu_class' => 'primary-menu',
				'menu_id' => '',
				'fallback_cb' => 'masonry_blog_navigation_fallback',
	 		);
			wp_nav_menu( $masonry_blog_primary_menu_args );
        	?>
		</nav>
	</div><!-- .main-navigation-wrapper -->
</div>