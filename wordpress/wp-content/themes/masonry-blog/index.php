<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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

			if( have_posts() ) :
				?>
				<div class="mb-row masonry-row">
					<?php
					/* Start the Loop */
					while ( have_posts() ) :

						the_post();

						/**
					    * Hook - masonry_blog_default_content_template.
					    *
					    * @hooked masonry_blog_default_content_template_action - 10
					    */
					    do_action( 'masonry_blog_default_content_template' );

					endwhile;
					?>
				</div><!-- .mb-row.masonry-row -->
				<?php

				get_template_part( 'template-parts/content', 'pagination' );
			else :

				get_template_part( 'template-parts/content', 'none' );
			endif;

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
