<?php
/**
 * Template part for displaying search icon
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Masonry_Blog
 */
if( masonry_blog_get_option( 'masonry_blog_display_search_icon' ) == false ) {

	return;
}
?>
<div <?php masonry_blog_search_icon_col_class(); ?>>							
	<div class="search-icon-wrapper">
		<a href="#" class="search-icon"><i class="fa fa-search" aria-hidden="true"></i></a>
	</div>								
</div>