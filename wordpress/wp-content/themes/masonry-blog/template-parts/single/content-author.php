<?php
/**
 * Template part for displaying author content in single.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Masonry_Blog
 */

if( masonry_blog_get_option( 'masonry_blog_display_author_section' ) == false ) {

	return;
}
?>
<div class="single-section author-section">
	<?php
	if( masonry_blog_get_option( 'masonry_blog_author_section_title' ) ) {
		?>
		<div class="row">
			<div class="col-lg-12">
				<div class="author-section-title single-section-title">
					<h3><?php echo esc_html( masonry_blog_get_option( 'masonry_blog_author_section_title' ) ); ?></h3>
				</div>
			</div>
		</div>
		<?php
	}
	?>
	<div class="author-content">
		<div class="row">
			<div class="col-md-2 col-lg-2">
				<div class="author-avatar">
					<figure class="image-container" style="padding-bottom: 100%;">
						<img class="avatar lazy-img" alt="<?php echo esc_attr( get_the_author_meta( 'display_name' ) ); ?>" data-src="<?php echo esc_url( get_avatar_url( get_the_author_meta( 'ID' ), ['size' => '300'] ) ); ?>" height="300" width="300">
						<noscript>
	            			<?php echo get_avatar( get_the_author_meta( 'ID' ), 300 ); ?>
	            		</noscript>
					</figure>
				</div>
			</div>
			<div class="col-md-10 col-lg-10">
				<?php
				/**
			    * Hook - masonry_blog_author_description.
			    *
			    * @hooked masonry_blog_author_description_action - 10
			    */
			    do_action( 'masonry_blog_author_description' );
				?>				
			</div>
		</div>
	</div>
</div>