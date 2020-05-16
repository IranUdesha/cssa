<?php
/**
 * Template part for displaying header advertisement
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Masonry_Blog
 */
if( masonry_blog_get_option( 'masonry_blog_logo_section_layout' ) != 'logo_ad' ) {

	return; 
}
?>
	</div>
	<div class="col-lg-8 hide-small">
		<div class="header-ad-widget-area">
			<?php
			if( is_active_sidebar( 'sidebar-6' ) ) {
				
				dynamic_sidebar( 'sidebar-6' );
			}
			?>
		</div>
	</div>
</div>