<?php
/**
 * Template part for displaying site identity
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Masonry_Blog
 */
?>
<div class="site-branding">
	<?php
	if( has_custom_logo() ) {
		?>
		<div class="site-logo">
			<?php the_custom_logo(); ?>
		</div>
		<?php
	} 

	if( is_home() ) {
		?>
		<h1 class="site-title">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
		</h1><!-- .site-title -->
		<?php
	} else {
		?>
		<span class="site-title">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
		</span><!-- .site-title -->
		<?php
	}
	$masonry_blog_description = get_bloginfo( 'description', 'display' );
	if ( $masonry_blog_description || is_customize_preview() ) {
		?>
		<p class="site-description"><?php echo esc_html( $masonry_blog_description ); // phpcs:ignore. ?></p><!-- .site-description -->
		<?php
	}
	?>
</div>