<?php
/**
 * Template part for displaying middle header section contents
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Masonry_Blog
 */
?>
<div <?php masonry_blog_logo_section_class(); ?>>
	<div class="mb-container">
		<?php
		if( masonry_blog_get_option( 'masonry_blog_logo_section_layout' ) == 'logo_ad' ) { 
			?>
			<div class="row verticle-center">
				<div class="col-lg-4">
			<?php
		}
		
		do_action( 'masonry_blog_middle_header_content' );
		?>
	</div>
</div>