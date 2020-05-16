<?php
/**
 * Template part for displaying pagination
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Masonry_Blog
 */

$masonry_blog_pagination_type = masonry_blog_get_option( 'masonry_blog_pagination' );

switch ( $masonry_blog_pagination_type ) {

	case 'infinite_scroll' :

		/**
	    * Hook - masonry_blog_infinite_scroll_template.
	    *
	    * @hooked masonry_blog_infinite_scroll_template_action - 10
	    */
	    do_action( 'masonry_blog_infinite_scroll_template' );
		break;

	case 'button_click' :

		/**
	    * Hook - masonry_blog_button_click_scroll_template.
	    *
	    * @hooked masonry_blog_button_click_scroll_template_action - 10
	    */
	    do_action( 'masonry_blog_button_click_scroll_template' );
		break;

	default :

		/**
	    * Hook - masonry_blog_pagination_template.
	    *
	    * @hooked masonry_blog_pagination_template_action - 10
	    */
	    do_action( 'masonry_blog_pagination_template' );
		break;
}