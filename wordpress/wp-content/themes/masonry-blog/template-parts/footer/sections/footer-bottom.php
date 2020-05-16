<?php
/**
 * Template part for displaying copyright info
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Masonry_Blog
 */
?>
<div class="row">
	<div class="col-lg-12">
		<div class="copyright-credit">
			<p>
				<?php 
				if( masonry_blog_get_option( 'masonry_blog_copyright_text' ) ) {
					/* translators: 1: copyright text, 2: theme name, 3: author name and link */
					printf( __( '%1$s %2$s, WordPress theme by %3$s', 'masonry-blog' ), esc_html( masonry_blog_get_option( 'masonry_blog_copyright_text' ) ), 'Masonry Blog', '<a href="' . esc_url( 'https://perfectwpthemes.com' ) . '" target="_blank">Perfectwpthemes</a>' );
				} else {
					/* translators: 1: theme name, 2: author name and link */
					printf( __( '%1$s, WordPress theme by %2$s', 'masonry-blog' ), 'Masonry Blog', '<a href="' . esc_url( 'https://perfectwpthemes.com' ) . '" target="_blank">Perfectwpthemes</a>' );
				}
				?>
			</p>
		</div><!-- .copyright-credit -->
	</div><!-- .col -->
</div><!-- .row -->