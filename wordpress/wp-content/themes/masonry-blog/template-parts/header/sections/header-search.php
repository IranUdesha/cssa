<?php
/**
 * Template part for displaying header search section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Masonry_Blog
 */
if( masonry_blog_get_option( 'masonry_blog_display_search_icon' ) == false ) {

	return;
}
?>
<div class="search-form-container mb-close">
	<div class="mb-container">
		<?php get_search_form(); ?>
	</div>
</div>	