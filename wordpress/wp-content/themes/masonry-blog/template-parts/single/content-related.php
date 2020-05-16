<?php
/**
 * Template part for displaying related posts content in single.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Masonry_Blog
 */

if( masonry_blog_get_option( 'masonry_blog_display_related_section' ) == false ) {

	return;
}

$masonry_blog_related_posts = masonry_blog_related_posts_query();

if( $masonry_blog_related_posts->have_posts() ) {
	?>
	<div class="single-section related-section">
		<?php
		if( masonry_blog_get_option( 'masonry_blog_related_section_title' ) ) {
			?>
			<div class="row">
				<div class="col-lg-12">
					<div class="related-section-title single-section-title">
						<h3><?php echo esc_html( masonry_blog_get_option( 'masonry_blog_related_section_title' ) ); ?></h3>
					</div>
				</div>
			</div>
			<?php
		}
		?>
		<div class="row">
			<?php
			$masonry_blog_content_alignment = masonry_blog_get_option( 'masonry_blog_related_posts_content_aligment' );

			while( $masonry_blog_related_posts->have_posts() ) {

				$masonry_blog_related_posts->the_post();
				?>
				<div <?php masonry_blog_related_posts_col_class(); ?>>
					<article id="post-<?php the_ID(); ?>" <?php post_class( masonry_blog_alignment_class( $masonry_blog_content_alignment ) ); ?>>
						<?php
						if( masonry_blog_get_option( 'masonry_blog_display_related_feat_img' ) == true && has_post_thumbnail() ) {
							?>
							<div class="post-thumbnail imghover">
								<a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
									<?php masonry_blog_thumbnail_one_image(); ?>
								</a>
								<?php 
								if( masonry_blog_get_option( 'masonry_blog_display_related_cats_meta' ) == true ) {

									masonry_blog_categories_meta();
								} 
								?>
							</div>
							<?php
						}
						?>
						<div class="article-content">
							<?php 
							if( ( masonry_blog_get_option( 'masonry_blog_display_related_feat_img' ) == false || ! has_post_thumbnail() ) && masonry_blog_get_option( 'masonry_blog_display_related_cats_meta' ) == true ) {

								masonry_blog_categories_meta();			
							}
							?>
							<div class="post-title">
								<h3>
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h3>
							</div><!-- .post-title -->
		        			<?php 
							if( masonry_blog_get_option( 'masonry_blog_display_related_date_meta' ) == true || masonry_blog_get_option( 'masonry_blog_display_related_author_meta' ) == true ) {
								?>
								<div class="post-author-date-meta">
									<ul>
										<?php 
										if( masonry_blog_get_option( 'masonry_blog_display_related_author_meta' ) == true ) {
											?>
											<li class="post-author-meta">
												<?php masonry_blog_posted_by(); ?>					
											</li><!-- .post-author-meta --> 
											<?php
										}

										if( masonry_blog_get_option( 'masonry_blog_display_related_date_meta' ) == true ) {
											?>
											<li class="post-date-meta">
												<?php masonry_blog_posted_on(); ?>
											</li><!-- .post-date-meta -->
											<?php
										}
										?>
									</ul>
								</div><!-- .entry-metas -->
								<?php
							}
							?>
		        			<div class="post-excerpt ">
		        				<?php the_excerpt(); ?>
		        			</div><!-- .post-excerpt -->
		    			</div>
					</article><!-- #post-89 -->
				</div>
				<?php
			}
			wp_reset_postdata();
			?>			
		</div>
	</div>
	<?php
}