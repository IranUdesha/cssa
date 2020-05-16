<?php
/**
 * Template part for displaying page content in single.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Masonry_Blog
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php 
	if( masonry_blog_get_option( 'masonry_blog_display_post_feat_img' ) == true && has_post_thumbnail() ) {

		masonry_blog_full_image();
	} 
	?>
	<div class="single-post-content">
		<?php 
		if( masonry_blog_get_option( 'masonry_blog_display_post_cats' ) == true ) {

			masonry_blog_categories_meta();			
		}
		?>
		<div class="single-post-title">
			<h1 class="post-title"><?php the_title(); ?></h1>
		</div><!-- .single-post-title -->
		<?php 
		if( masonry_blog_get_option( 'masonry_blog_display_post_date' ) == true || masonry_blog_get_option( 'masonry_blog_display_post_author' ) == true ) {
			?>
			<div class="post-author-date-meta">
				<ul>
					<?php 
					if( masonry_blog_get_option( 'masonry_blog_display_post_author' ) == true ) {
						?>
						<li class="post-author-meta">
							<?php masonry_blog_posted_by(); ?>					
						</li><!-- .post-author-meta --> 
						<?php
					}

					if( masonry_blog_get_option( 'masonry_blog_display_post_date' ) == true ) {
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
		<div class="single-post-header-divider"></div><!-- .single-post-header-divider -->
		<div class="single-post-editor-content">
			<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'masonry-blog' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">',
				'after'  => '</div>',
			) );
			?>
		</div><!-- .single-post-editor-content -->
		<?php
		if( masonry_blog_get_option( 'masonry_blog_display_post_tags' ) == true ) {

			masonry_blog_tags_meta();
		} 
		
		if ( get_edit_post_link() ) :
				
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'masonry-blog' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
		endif;
		?>
	</div><!-- .single-post-content -->						
</article><!-- #post-<?php the_ID(); ?> -->