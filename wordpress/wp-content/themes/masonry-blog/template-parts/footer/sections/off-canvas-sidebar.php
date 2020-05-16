<?php
/**
 * Template part for displaying off canvas sidebar content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Masonry_Blog
 */
if( masonry_blog_get_option( 'masonry_blog_display_off_canvas_sidebar_icon' ) == false ) {

	return;
}
?>
<div class="canvas-sidebar mb-close">
	<div class="canvas-sidebar-mask"></div>
	<div class="canvas-sidebar-widget-area site-sidebar">
		<div class="canvas-sidebar-close-icon">
			<a href="#" class="mb-close-btn"><i class="fa fa-times" aria-hidden="true"></i></a>
		</div>
		<?php 
		if( is_active_sidebar( 'sidebar-5' ) ) {

			dynamic_sidebar( 'sidebar-5' ); 
		}
		?>
	</div>
</div>