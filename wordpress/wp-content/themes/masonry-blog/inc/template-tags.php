<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Masonry_Blog
 */

if ( ! function_exists( 'masonry_blog_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function masonry_blog_posted_on() {

		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);
		?>
		<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
			<span class="post-date-meta-icon"><i class="icon-mb-calendar-week"></i></span>
			<?php echo $time_string // phpcs:ignore. ?>
		</a>
		<?php
	}
endif;

if ( ! function_exists( 'masonry_blog_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function masonry_blog_posted_by() {
		?>
		<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
			<span class="author-icon"><i class="icon-mb-user"></i></span>
			<span class="author-name"><?php echo esc_html( get_the_author() ); ?></span>
		</a>
		<?php
	}
endif;

if ( ! function_exists( 'masonry_blog_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function masonry_blog_post_thumbnail() {

		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {

			return;
		}

		$display_image = true;

		if( is_single() || is_page() ) {

			if( is_page() ) {

				$display_image = masonry_blog_get_option( 'masonry_blog_display_page_feat_img' );
			}

			if( $display_image == true ) {

				masonry_blog_full_image();
			}
		}
	}
endif;

if( ! function_exists( 'masonry_blog_full_image' ) ) {

	function masonry_blog_full_image() {

		$thumbnail_id = get_post_thumbnail_id( get_the_ID() );

		$thumbnail_srcset = wp_get_attachment_image_srcset( $thumbnail_id, 'full' );

		$thumbnail_sizes = wp_get_attachment_image_sizes( $thumbnail_id, 'full' );

		$thumbnail_attachment = wp_get_attachment_image_src( $thumbnail_id, 'full' );

		$bottom_padding = 100;

		if( $thumbnail_attachment[1] > 0 ) {

			$bottom_padding = ($thumbnail_attachment[2]/$thumbnail_attachment[1]) * 100;
		}
		?>
		<figure class="image-container" style="padding-bottom: <?php echo esc_attr( $bottom_padding ); ?>%;">
			<img width="<?php echo esc_attr( $thumbnail_attachment[1] ); ?>" height="<?php echo esc_attr( $thumbnail_attachment[2] ); ?>" alt="<?php masonry_blog_thumbnail_alt_text(); ?>" class="mb-thumbnail lazy-img" data-src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ); ?>" data-srcset="<?php echo esc_attr( $thumbnail_srcset ); ?>" sizes="<?php echo esc_attr( $thumbnail_sizes ); ?>">
			<noscript>
		 		<img src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ); ?>" srcset="<?php echo esc_attr( $thumbnail_srcset ); ?>" class="image-fallback" alt="<?php masonry_blog_thumbnail_alt_text( get_the_ID() ); ?>">
		 	</noscript>
		</figure>
		<?php
	}
}

if( ! function_exists( 'masonry_blog_large_image' ) ) {

	function masonry_blog_large_image() {

		$thumbnail_id = get_post_thumbnail_id( get_the_ID() );

		$thumbnail_srcset = wp_get_attachment_image_srcset( $thumbnail_id, 'large' );

		$thumbnail_sizes = wp_get_attachment_image_sizes( $thumbnail_id, 'large' );

		$thumbnail_attachment = wp_get_attachment_image_src( $thumbnail_id, 'large' );

		$bottom_padding = 100;

		if( $thumbnail_attachment[1] > 0 ) {

			$bottom_padding = ($thumbnail_attachment[2]/$thumbnail_attachment[1]) * 100;
		}
		?>
		<figure class="image-container" style="padding-bottom: <?php echo esc_attr( $bottom_padding ); ?>%;">
			<img width="<?php echo esc_attr( $thumbnail_attachment[1] ); ?>" height="<?php echo esc_attr( $thumbnail_attachment[2] ); ?>" src="data:image/gif;base64,R0lGODdhAQABAPAAAMPDwwAAACwAAAAAAQABAAACAkQBADs=" alt="<?php masonry_blog_thumbnail_alt_text(); ?>" class="mb-thumbnail lazy-img" data-src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'large' ) ); ?>" data-srcset="<?php echo esc_attr( $thumbnail_srcset ); ?>" sizes="<?php echo esc_attr( $thumbnail_sizes ); ?>">
			<noscript>
		 		<img src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'large' ) ); ?>" srcset="<?php echo esc_attr( $thumbnail_srcset ); ?>" class="image-fallback" alt="<?php masonry_blog_thumbnail_alt_text( get_the_ID() ); ?>">
		 	</noscript>
		</figure>
		<?php
	}
}


if( ! function_exists( 'masonry_blog_thumbnail_one_image' ) ) {

	function masonry_blog_thumbnail_one_image() {

		$thumbnail_id = get_post_thumbnail_id( get_the_ID() );

		$thumbnail_srcset = wp_get_attachment_image_srcset( $thumbnail_id, 'masonry-blog-thumbnail-one' );

		$thumbnail_sizes = wp_get_attachment_image_sizes( $thumbnail_id, 'masonry-blog-thumbnail-one' );

		$thumbnail_attachment = wp_get_attachment_image_src( $thumbnail_id, 'masonry-blog-thumbnail-one' );

		$bottom_padding = 100;

		if( $thumbnail_attachment[1] > 0 ) {

			$bottom_padding = ($thumbnail_attachment[2]/$thumbnail_attachment[1]) * 100;
		}
		?>
		<figure class="image-container" style="padding-bottom: <?php echo esc_attr( $bottom_padding ); ?>%;">
			<img width="<?php echo esc_attr( $thumbnail_attachment[1] ); ?>" height="<?php echo esc_attr( $thumbnail_attachment[2] ); ?>" src="data:image/gif;base64,R0lGODdhAQABAPAAAMPDwwAAACwAAAAAAQABAAACAkQBADs=" alt="<?php masonry_blog_thumbnail_alt_text(); ?>" class="mb-thumbnail lazy-img" data-src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'masonry-blog-thumbnail-one' ) ); ?>" data-srcset="<?php echo esc_attr( $thumbnail_srcset ); ?>" sizes="<?php echo esc_attr( $thumbnail_sizes ); ?>">
			<noscript>
		 		<img src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'masonry-blog-thumbnail-one' ) ); ?>" srcset="<?php echo esc_attr( $thumbnail_srcset ); ?>" class="image-fallback" alt="<?php masonry_blog_thumbnail_alt_text( get_the_ID() ); ?>">
		 	</noscript>
		</figure>
		<?php
	}
}


if( ! function_exists( 'masonry_blog_thumbnail_two_image' ) ) {

	function masonry_blog_thumbnail_two_image() {

		$thumbnail_id = get_post_thumbnail_id( get_the_ID() );

		$thumbnail_srcset = wp_get_attachment_image_srcset( $thumbnail_id, 'masonry-blog-thumbnail-two' );

		$thumbnail_sizes = wp_get_attachment_image_sizes( $thumbnail_id, 'masonry-blog-thumbnail-two' );

		$thumbnail_attachment = wp_get_attachment_image_src( $thumbnail_id, 'masonry-blog-thumbnail-two' );
		
		$bottom_padding = 100;

		if( $thumbnail_attachment[1] > 0 ) {

			$bottom_padding = ($thumbnail_attachment[2]/$thumbnail_attachment[1]) * 100;
		}
		?>
		<figure class="image-container" style="padding-bottom: <?php echo esc_attr( $bottom_padding ); ?>%;">
			<img width="<?php echo esc_attr( $thumbnail_attachment[1] ); ?>" height="<?php echo esc_attr( $thumbnail_attachment[2] ); ?>" src="data:image/gif;base64,R0lGODdhAQABAPAAAMPDwwAAACwAAAAAAQABAAACAkQBADs=" alt="<?php masonry_blog_thumbnail_alt_text(); ?>" class="mb-thumbnail lazy-img" data-src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'masonry-blog-thumbnail-two' ) ); ?>" data-srcset="<?php echo esc_attr( $thumbnail_srcset ); ?>" sizes="<?php echo esc_attr( $thumbnail_sizes ); ?>">
			<noscript>
		 		<img src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'masonry-blog-thumbnail-two' ) ); ?>" srcset="<?php echo esc_attr( $thumbnail_srcset ); ?>" class="image-fallback" alt="<?php masonry_blog_thumbnail_alt_text( get_the_ID() ); ?>">
		 	</noscript>
		</figure>
		<?php
	}
}


if( ! function_exists( 'masonry_blog_categories_meta' ) ) {

	function masonry_blog_categories_meta() {

		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {

			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list();

			if ( $categories_list ) {
				?>	
				<div class="post-cat-entries">
					<?php echo wp_kses_post( $categories_list ); // phpcs:ignore. ?>
				</div><!-- .post-cat-entries -->
				<?php
			}
		}
	}
}


if( ! function_exists( 'masonry_blog_tags_meta' ) ) {

	function masonry_blog_tags_meta() {

		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list();

			if ( $tags_list ) {
				?>	
				<div class="post-tags">
					<?php echo wp_kses_post( $tags_list ); // phpcs:ignore. ?>
				</div><!-- .post-tags -->
				<?php
			}
		}
	}
}


if( ! function_exists( 'masonry_blog_author_date_meta' ) ) {

	function masonry_blog_author_date_meta() {

		if( 'post' === get_post_type() ) {
			?>
			<div class="post-author-date-meta">
				<ul>
					<li class="post-author-meta">
						<?php masonry_blog_posted_by(); ?>					
					</li><!-- .post-author-meta --> 
					<li class="post-date-meta">
						<?php masonry_blog_posted_on(); ?>
					</li><!-- .post-date-meta -->
				</ul>
			</div><!-- .entry-metas -->
			<?php
		}
	}
}