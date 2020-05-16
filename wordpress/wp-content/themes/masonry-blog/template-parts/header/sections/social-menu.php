<?php
/**
 * Template part for displaying top header social menu
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Masonry_Blog
 */

if( masonry_blog_get_option( 'masonry_blog_enable_social_menu' ) == false ) {

	return;
}
?>
<div <?php masonry_blog_social_menu_col_class(); ?>>
	<?php
	if( has_nav_menu( 'menu-3' ) ) {
		?>
		<div class="social-menu">
			<?php
			wp_nav_menu( array(
	 			'theme_location' => 'menu-3',
	 			'container' => '',
				'depth' => 1
	 		) );
			?>								
		</div>
		<?php
	}
	?>
</div>