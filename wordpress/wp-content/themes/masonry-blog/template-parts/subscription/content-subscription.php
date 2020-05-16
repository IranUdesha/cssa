<?php
/**
 * Template part for displaying subscription form
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Masonry_Blog
 */

if( ! masonry_blog_get_option( 'masonry_blog_subscription_shortcode' ) ) {

	return;
}

$masonry_blog_display_subcription = false;

if( is_home() && masonry_blog_get_option( 'masonry_blog_enable_subscription_in_home' ) == true ) {

	$masonry_blog_display_subcription = true;
}

if( is_archive() && masonry_blog_get_option( 'masonry_blog_enable_subscription_in_archive' ) == true ) {

	$masonry_blog_display_subcription = true;
}

if( is_search() && masonry_blog_get_option( 'masonry_blog_enable_subscription_in_search' ) == true ) {

	$masonry_blog_display_subcription = true;
}

if( is_page() && masonry_blog_get_option( 'masonry_blog_enable_subscription_in_page_single' ) == true ) {

	$masonry_blog_display_subcription = true;
}

if( is_single() && masonry_blog_get_option( 'masonry_blog_enable_subscription_in_post_single' ) == true ) {

	$masonry_blog_display_subcription = true;
}

if( $masonry_blog_display_subcription ) {
	?>
	<div id="site-subscription">
		<?php
		if( ! is_single() ) {
			?>
			<div class="mb-container">
			<?php
		}
		?>
		<div class="site-subscription">
			<div class="subscription-container">
				<?php echo do_shortcode( masonry_blog_get_option( 'masonry_blog_subscription_shortcode' ) ); ?>
			</div>	
		</div>	
		<?php
		if( ! is_single() ) {
			?>		
			</div>
			<?php
		}
		?>
	</div>
	<?php
}