<?php
/**
 * Template part for displaying back to top button
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Masonry_Blog
 */
if( masonry_blog_get_option( 'masonry_blog_display_scroll_top' ) == false ) {

	return;
}
?>
<div class="mb-to-top"><a href="#"><i class="fa fa-angle-up" aria-hidden="true"></i></a></div>