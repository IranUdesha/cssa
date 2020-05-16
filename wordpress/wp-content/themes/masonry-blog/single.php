<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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

				/**
			    * Hook - masonry_blog_single_content_template.
			    *
			    * @hooked masonry_blog_single_content_template_action - 10
			    */
			    do_action( 'masonry_blog_single_content_template' );

				get_template_part( 'template-parts/subscription/content', 'subscription' );

				masonry_blog_posts_navigation();

				get_template_part( 'template-parts/single/content', 'author' );

				/**
			    * Hook - masonry_blog_related_post_content_template.
			    *
			    * @hooked masonry_blog_related_post_content_template_action - 10
			    */
			    do_action( 'masonry_blog_related_post_content_template' );

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
