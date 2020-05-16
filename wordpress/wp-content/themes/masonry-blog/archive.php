<?php
/**
 * The template for displaying archive pages
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

			if ( have_posts() ) : 
				?>
				<header class="page-header">
					<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
					?>
				</header><!-- .page-header -->

				<div class="mb-row masonry-row">
					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
						/**
					    * Hook - masonry_blog_archive_content_template.
					    *
					    * @hooked masonry_blog_archive_content_template_action - 10
					    */
					    do_action( 'masonry_blog_archive_content_template' );

					endwhile;
					?>
				</div>
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
