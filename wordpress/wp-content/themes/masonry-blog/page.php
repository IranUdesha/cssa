<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Masonry_Blog
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php
			/**
		    * Hook - masonry_blog_before_content_template.
		    *
		    * @hooked masonry_blog_before_content_template_action - 10
		    */
		    do_action( 'masonry_blog_before_content_template' );

			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.

			/**
		    * Hook - masonry_blog_after_content_template.
		    *
		    * @hooked masonry_blog_after_content_template_action - 10
		    */
		    do_action( 'masonry_blog_after_content_template' );
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
