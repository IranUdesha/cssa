<?php
/**
 * Template part for displaying footer widget areas
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Masonry_Blog
 */

if( ( ! is_active_sidebar( 'sidebar-2' ) && ! is_active_sidebar( 'sidebar-3' ) && ! is_active_sidebar( 'sidebar-4' ) ) || masonry_blog_get_option( 'masonry_blog_display_footer_widget_area' ) == false ) {

	return;
}
?>
<div class="footer-widget-areas">
	<div class="row">
		<div class="col-lg-4 footer-widget-area">
			<?php 
			if( is_active_sidebar( 'sidebar-2' ) ) {

				dynamic_sidebar( 'sidebar-2' );
			} 
			?>
		</div><!-- .col -->

		<div class="col-lg-4 footer-widget-area">
			<?php 
			if( is_active_sidebar( 'sidebar-3' ) ) {

				dynamic_sidebar( 'sidebar-3' );
			} 
			?>
		</div><!-- .col -->

		<div class="col-lg-4 footer-widget-area">
			<?php 
			if( is_active_sidebar( 'sidebar-4' ) ) {

				dynamic_sidebar( 'sidebar-4' );
			} 
			?>
		</div><!-- .col -->
	</div><!-- .row -->
</div><!-- .footer-widget-areas -->