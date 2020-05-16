<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
					<h1 class="page-title">
						<?php
						/* translators: %s: search query. */
						printf( esc_html__( 'Search Results for: %s', 'masonry-blog' ), '<span>' . get_search_query() . '</span>' );
						?>
					</h1>
				</header><!-- .page-header -->

				<div class="mb-row masonry-row">
					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						/**
					    * Hook - masonry_blog_search_content_template.
					    *
					    * @hooked masonry_blog_search_content_template_action - 10
					    */
					    do_action( 'masonry_blog_search_content_template' );

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
get_sidebar();
get_footer();
