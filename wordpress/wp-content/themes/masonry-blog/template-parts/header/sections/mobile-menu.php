<?php
/**
 * Template part for displaying mobile navigation
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Masonry_Blog
 */
?>
<div class="mobile-navigation-wrapper mb-close">
	<div class="mobile-nav-mask"></div>
	<nav id="mobile-navigation" class="mobile-navigation">
		<div class="mobile-nav-close">
			<span class="mobile-nav-close-icon">
				<a href="#" class="mobile-nav-close-btn"><i class="fa fa-times" aria-hidden="true"></i></a>
			</span>
		</div>
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
</div>
