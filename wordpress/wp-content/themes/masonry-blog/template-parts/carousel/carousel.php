<?php
/**
 * Template part for displaying banner slider in index.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Masonry_Blog
 */

if( masonry_blog_get_option( 'masonry_blog_display_banner' ) == false ) {

	return;
}

$masonry_blog_banner_posts = masonry_blog_banner_posts_query();

if( $masonry_blog_banner_posts->have_posts() ) {

	/**
	 * Hook: masonry_blog_carousel_section_wrapper_start.
	 *
	 * @hooked masonry_blog_carousel_section_wrapper_start_action - 10
	 */
	do_action( 'masonry_blog_carousel_section_wrapper_start' ); 
	
	while( $masonry_blog_banner_posts->have_posts() ) {

		$masonry_blog_banner_posts->the_post();
		?>
		<div class="item">
			<?php
			/**
			 * Hook: masonry_blog_carousel_item_wrapper_start.
			 *
			 * @hooked masonry_blog_carousel_item_wrapper_start_action - 10
			 */
			do_action( 'masonry_blog_carousel_item_wrapper_start' ); 
			?>
			<a href="<?php the_permalink(); ?>"></a>
			<?php
			if( masonry_blog_get_option( 'masonry_blog_display_img_overlay' ) == true ) {
				?>
				<div class="carousel-mask"></div>
				<?php
			}
			if( masonry_blog_get_option( 'masonry_blog_banner_hide_content' ) == true ) {
				?>
				<div class="carousel-content">
					<?php masonry_blog_categories_meta(); ?>
					<div class="post-title">
						<h3>
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h3>
					</div><!-- .post-title -->
	    			<div class="post-author-date-meta">
						<ul>
							<li class="post-author-meta">
								<?php masonry_blog_posted_by(); ?>					
							</li><!-- .post-author-meta --> 
							<li class="post-date-meta">
								<?php masonry_blog_posted_on(); ?>
							</li><!-- .post-date-meta -->
						</ul>
					</div><!-- .entry-metas -->
				</div>
				<?php
			}

			/**
			 * Hook: masonry_blog_carousel_item_wrapper_end.
			 *
			 * @hooked masonry_blog_carousel_item_wrapper_end_action - 10
			 */
			do_action( 'masonry_blog_carousel_item_wrapper_end' );
			?>
		</div>
		<?php
	}
	wp_reset_postdata();

	/**
	 * Hook: masonry_blog_carousel_section_wrapper_end.
	 *
	 * @hooked masonry_blog_carousel_section_wrapper_end_action - 10
	 */
	do_action( 'masonry_blog_carousel_section_wrapper_end' ); 
}