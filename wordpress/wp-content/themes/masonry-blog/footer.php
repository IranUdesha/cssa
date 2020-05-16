<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Masonry_Blog
 */

?>

	</div><!-- #content -->
	
	<?php
	/**
	 * Hook: masonry_blog_subscription_area.
	 *
	 * @hooked masonry_blog_subscription_area_action - 10
	 */
	do_action( 'masonry_blog_subscription_area' ); 
	?>

	<footer id="colophon" class="site-footer">
		<div class="mb-container">
			<?php
			/**
			 * Hook: masonry_blog_footer_widget_areas.
			 *
			 * @hooked masonry_blog_footer_widget_areas_action - 10
			 */
			do_action( 'masonry_blog_footer_widget_areas' ); 

			/**
			 * Hook: masonry_blog_footer_copyright_credit.
			 *
			 * @hooked masonry_blog_footer_copyright_credit_action - 10
			 */
			do_action( 'masonry_blog_footer_copyright_credit' ); 
			?>			
		</div><!-- .mb-container -->
	</footer><!-- #colophon -->
	
	<?php
	/**
	 * Hook: masonry_blog_off_canvas_sidebar.
	 *
	 * @hooked masonry_blog_off_canvas_sidebar_action - 10
	 */
	do_action( 'masonry_blog_off_canvas_sidebar' );

	/**
	 * Hook: masonry_blog_back_to_top.
	 *
	 * @hooked masonry_blog_back_to_top_action - 10
	 */
	do_action( 'masonry_blog_back_to_top' );
	?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
