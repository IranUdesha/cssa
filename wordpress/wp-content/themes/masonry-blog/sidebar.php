<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Masonry_Blog
 */

if ( ! is_active_sidebar( 'sidebar-1' ) || masonry_blog_sidebar_position() == 'none' ) {
	
	return;
}
?>
<div <?php masonry_blog_sidebar_col_class(); ?>>
	<aside id="secondary" class="widget-area site-sidebar">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside><!-- #secondary -->
</div><!-- .col -->
