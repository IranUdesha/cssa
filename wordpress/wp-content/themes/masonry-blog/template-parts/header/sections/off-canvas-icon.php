<?php
/**
 * Template part for displaying off canvas icon
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Masonry_Blog
 */
if( masonry_blog_get_option( 'masonry_blog_display_off_canvas_sidebar_icon' ) == false ) {

	return;
}
?>
<div <?php masonry_blog_off_canvas_icon_col_class(); ?>>							
	<div class="canvas-icon-wrapper">
		<a href="#" class="canvas-icon"><i class="fa fa-bars" aria-hidden="true"></i></a>
	</div>
</div>