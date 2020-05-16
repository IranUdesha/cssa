<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Masonry_Blog
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	/* Check for front page settings for featured image */
	if( is_front_page() ) {
		
		if( masonry_blog_get_option( 'masonry_blog_display_static_page_feat_img' ) == true && has_post_thumbnail() ) {

			masonry_blog_full_image();
		}
	} else {

		if( masonry_blog_get_option( 'masonry_blog_display_page_feat_img' ) == true && has_post_thumbnail() ) {

			masonry_blog_full_image();
		}
	}	  
	?>
	<div class="single-post-content">
		<?php
		/* Check for front page settings for page title */
		if( is_front_page() ) {

			if( masonry_blog_get_option( 'masonry_blog_display_static_page_title' ) ) {
				?>
				<div class="single-post-title">
					<h1 class="post-title"><?php the_title(); ?></h1>
				</div><!-- .single-post-title -->
				<div class="single-post-header-divider"></div><!-- .single-post-header-divider -->
				<?php
			}
		} else {
			?>
			<div class="single-post-title">
				<h1 class="post-title"><?php the_title(); ?></h1>
			</div><!-- .single-post-title -->
			<div class="single-post-header-divider"></div><!-- .single-post-header-divider -->
			<?php
		}
		?>
		
		<div class="single-post-editor-content">
			<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">',
				'after'  => '</div>',
			) );

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
		</div><!-- .single-post-editor-content -->
	</div><!-- .single-post-content -->						
</article><!-- #post-<?php the_ID(); ?> -->
