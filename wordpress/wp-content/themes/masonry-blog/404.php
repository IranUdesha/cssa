<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Masonry_Blog
 */

get_header();
	?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="mb-container">
				<div class="row">
					<div class="col-lg-12">
						<section class="error-404 not-found">
							<div class="page-header">
								<h1 class="page-title"><?php esc_html_e( '404', 'masonry-blog' ); ?></h1>
								<p><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'masonry-blog' ); ?></p>
							</div><!-- .page-header -->

							<div class="page-content">
								<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'masonry-blog' ); ?></p>
								<?php get_search_form(); ?>
							</div><!-- .page-content -->
						</section><!-- .error-404 -->
					</div><!-- .col -->
				</div><!-- .row -->
			</div><!-- .mb-container -->
		</main><!-- #main -->
	</div><!-- #primary -->
	<?php
get_footer();
