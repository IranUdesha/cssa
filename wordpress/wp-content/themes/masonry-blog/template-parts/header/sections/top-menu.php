<?php
/**
 * Template part for displaying top header menu
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Masonry_Blog
 */

if( masonry_blog_get_option( 'masonry_blog_enable_top_header_menu' ) == false ) {

	return;
}
?>
<div <?php masonry_blog_top_header_menu_col_class(); ?>>
	<?php
	if( has_nav_menu( 'menu-2' ) ) {
		?>
		<div class="top-header-menu">
			<?php
			wp_nav_menu( array(
	 			'theme_location' => 'menu-2',
	 			'container' => '',
				'depth' => 1,
	 		) );
			?>								
		</div>
		<?php
	}
	?>
</div>