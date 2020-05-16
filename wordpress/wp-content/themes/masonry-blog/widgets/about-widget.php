<?php
/**
 * Author Widget
 *
 * @package Masonry_Blog
 */

if( ! class_exists( 'Masonry_Blog_Author_Widget' ) ) {

	class Masonry_Blog_Author_Widget extends WP_Widget {

		function __construct() { 

            parent::__construct(

                'masonry-blog-author-widget',
                esc_html__( 'MB: Author Widget', 'masonry-blog' ),
                array(
                    'classname'     => 'mb-author-widget',
                    'description'   => esc_html__( 'Displays information about author.', 'masonry-blog' ), 
                )
            );     
        }

        public function widget( $args, $instance ) {

            $title 				= apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

			$author_image 	  	= isset( $instance['author_image'] ) ? $instance['author_image'] : '';

			$author_name 	  	= isset( $instance['author_name'] ) ? $instance['author_name'] : '';

            $author_description = isset( $instance['author_description'] ) ? $instance['author_description'] : '';
     		
            $facebook_link      = isset( $instance['facebook_link'] ) ? $instance['facebook_link'] : '';

            $twitter_link       = isset( $instance['twitter_link'] ) ? $instance['twitter_link'] : '';

            $instagram_link     = isset( $instance['instagram_link'] ) ? $instance['instagram_link'] : '';

            $youtube_link       = isset( $instance['youtube_link'] ) ? $instance['youtube_link'] : '';

            $pinterest_link     = isset( $instance['pinterest_link'] ) ? $instance['pinterest_link'] : '';

            $linkedin_link      = isset( $instance['linkedin_link'] ) ? $instance['linkedin_link'] : '';

            $vk_link            = isset( $instance['vk_link'] ) ? $instance['vk_link'] : '';

            $button_title       = isset( $instance['button_title'] ) ? $instance['button_title'] : '';

            $button_link        = isset( $instance['button_link'] ) ? $instance['button_link'] : '';

            echo $args['before_widget'];

            if( !empty( $title ) ) {

                echo $args['before_title'];

                echo esc_html( $title );

                echo $args['after_title'];
            }            
            ?>
            <div class="widget-container">
            	<?php
            	if( !empty( $author_image ) ) {

            		$author_img_args = array(
	            		'post_type' => 'attachment',
	            		'name' => $instance['author_image'],
	            		'posts_per_page' => 1,
	            		'post_status' => 'inherit',
	            	);

	            	$author_img_query = get_posts( $author_img_args );

	            	$author_img_obj = $author_img_query ? array_pop($author_img_query) : '';

	            	$author_image_url = $author_img_obj ? $author_img_obj->guid : ''; 

	            	$thumbnail_srcset = wp_get_attachment_image_srcset( $author_img_obj->ID, 'masonry-blog-thumbnail-two' );

					$thumbnail_sizes = wp_get_attachment_image_sizes( $author_img_obj->ID, 'masonry-blog-thumbnail-two' );

					$thumbnail_attachment = wp_get_attachment_image_src( $author_img_obj->ID, 'masonry-blog-thumbnail-two' );

	            	if( $thumbnail_attachment ) {
		            	?>
						<div class="author-thumbnail">
							<a href="<?php if( !empty( $button_link ) ) { echo esc_url( $button_link ); } ?>" class="author-image">
								<img width="<?php echo esc_attr( $thumbnail_attachment[1] ); ?>" height="<?php echo esc_attr( $thumbnail_attachment[2] ); ?>" src="data:image/gif;base64,R0lGODdhAQABAPAAAMPDwwAAACwAAAAAAQABAAACAkQBADs=" alt="<?php masonry_blog_thumbnail_alt_text(); ?>" class="mb-thumbnail lazy-img" data-src="<?php echo esc_url( $thumbnail_attachment[0] ); ?>" data-srcset="<?php echo esc_attr( $thumbnail_srcset ); ?>" sizes="<?php echo esc_attr( $thumbnail_sizes ); ?>">
								<noscript>
			            			<img width="<?php echo esc_attr( $thumbnail_attachment[1] ); ?>" height="<?php echo esc_attr( $thumbnail_attachment[2] ); ?>" src="<?php echo esc_url( $thumbnail_attachment[0] ); ?>" alt="<?php masonry_blog_thumbnail_alt_text(); ?>" srcset="<?php echo esc_attr( $thumbnail_srcset ); ?>" sizes="<?php echo esc_attr( $thumbnail_sizes ); ?>">
			            		</noscript>
							</a>
						</div>
						<?php
					}
				}
				?>
				<div class="author-detail">
					<?php
					if( !empty( $author_name ) ) {
						?>
						<div class="author-name">
							<h3><?php echo esc_html( $author_name ); ?></h3>
						</div>
						<?php
					}
					?>
					<div class="author-social-links">
						<ul>
							<?php
							if( !empty( $facebook_link ) ) {
								?>
								<li>
									<a href="<?php echo esc_url( $facebook_link ); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
								</li>
								<?php
							}

							if( !empty( $twitter_link ) ) {
								?>
								<li>
									<a href="<?php echo esc_url( $twitter_link ); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
								</li>
								<?php
							}

							if( !empty( $instagram_link ) ) {
								?>
								<li>
									<a href="<?php echo esc_url( $instagram_link ); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
								</li>
								<?php
							}

							if( !empty( $linkedin_link ) ) {
								?>
								<li>
									<a href="<?php echo esc_url( $linkedin_link ); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
								</li>
								<?php
							}

							if( !empty( $pinterest_link ) ) {
								?>
								<li>
									<a href="<?php echo esc_url( $pinterest_link ); ?>"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
								</li>
								<?php
							}

							if( !empty( $vk_link ) ) {
								?>
								<li>
									<a href="<?php echo esc_url( $vk_link ); ?>"><i class="fa fa-vk" aria-hidden="true"></i></a>
								</li>
								<?php
							}

							if( !empty( $youtube_link ) ) {
								?>
								<li>
									<a href="<?php echo esc_url( $youtube_link ); ?>"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
								</li>
								<?php
							} 
							?>
						</ul>
					</div>
					<?php
					if( !empty( $author_description ) ) {
						?>
						<div class="author-description">
							<p><?php echo esc_html( $author_description ); ?></p>
						</div>
						<?php
					}
					?>
				</div>
				<?php
				if( !empty( $button_link ) && !empty( $button_title ) ) {
					?>
					<div class="author-permalink">
						<a class="post-link-btn" href="<?php echo esc_url( $button_link ); ?>"><?php echo esc_html( $button_title ); ?></a>
					</div>
					<?php
				}
				?>
			</div>
            <?php 
        	echo $args['after_widget'];
    	}

    	public function form( $instance ) {

            $defaults = array(
                'title'       => '',
                'author_image' => '',
                'author_name'  => '',
                'author_description' => '',
                'facebook_link'  => '',
                'twitter_link'  => '',
                'instagram_link'  => '',
                'youtube_link'  => '',
                'pinterest_link'  => '',
                'linkedin_link'  => '',
                'vk_link'  => '',
                'button_title'  => '',
                'button_link'  => '',
            );

            $instance = wp_parse_args( (array) $instance, $defaults );

            $author_image_url = '';

            if( $instance['author_image'] ) {

            	$author_img_args = array(
            		'post_type' => 'attachment',
            		'name' => $instance['author_image'],
            		'posts_per_page' => 1,
            		'post_status' => 'inherit',
            	);

            	$author_img_query = get_posts( $author_img_args );

            	$author_img_obj = $author_img_query ? array_pop($author_img_query) : '';

            	$author_image_url = $author_img_obj ? $author_img_obj->guid : '';            	
            }
    		?>
    		<p>
                <label for="<?php echo esc_attr( $this->get_field_name('title') ); ?>">
                    <strong><?php esc_html_e( 'Title', 'masonry-blog' ); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />   
            </p>

            <p>
	            <label for="<?php echo esc_attr($this->get_field_id('author_image')); ?>">
	                <strong><?php esc_html_e('Author&rsquo;s Image', 'masonry-blog'); ?></strong>
	            </label>
	            <small><?php esc_html__( 'Upload image with aspect ratio 1:1', 'masonry-blog' ); ?></small>
	            <br/>
	            <img class="custom_media_image widefat" src="<?php if( $author_image_url ) { echo esc_url( $author_image_url ); } ?>">
	            <input type="hidden" class="custom_media_url"
	                   name="<?php echo esc_attr($this->get_field_name('author_image')); ?>"
	                   id="<?php echo esc_attr($this->get_field_id('author_image')); ?>" value="<?php echo esc_attr( $instance['author_image'] ); ?>">
	            <input type="button" class="button button-primary custom_media_button"
	                   value="<?php esc_attr_e('Upload', 'masonry-blog') ?>"/>
	        </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_name('author_name') ); ?>">
                    <strong><?php esc_html_e( 'Author&rsquo;s Name', 'masonry-blog' ); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('author_name') ); ?>" name="<?php echo esc_attr( $this->get_field_name('author_name') ); ?>" type="text" value="<?php echo esc_attr( $instance['author_name'] ); ?>" />   
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_name('author_description') ); ?>">
                    <strong><?php esc_html_e( 'Author&rsquo;s Description', 'masonry-blog' ); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('author_description') ); ?>" name="<?php echo esc_attr( $this->get_field_name('author_description') ); ?>" type="text" value="<?php echo esc_attr( $instance['author_description'] ); ?>" />   
            </p>
			
			<p>
				<label for="<?php echo esc_attr( $this->get_field_name('facebook_link') ); ?>">
	                <strong><?php esc_html_e( 'Facebook Link', 'masonry-blog' ); ?></strong>
	            </label>
	            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('facebook_link') ); ?>" name="<?php echo esc_attr( $this->get_field_name('facebook_link') ); ?>" type="text" value="<?php echo esc_attr( $instance['facebook_link'] ); ?>" />
			</p>
             
			<p>
				<label for="<?php echo esc_attr( $this->get_field_name('twitter_link') ); ?>">
	                <strong><?php esc_html_e( 'Twitter Link', 'masonry-blog' ); ?></strong>
	            </label>
	            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('twitter_link') ); ?>" name="<?php echo esc_attr( $this->get_field_name('twitter_link') ); ?>" type="text" value="<?php echo esc_attr( $instance['twitter_link'] ); ?>" />
			</p>
             
			<p>
				<label for="<?php echo esc_attr( $this->get_field_name('instagram_link') ); ?>">
	                <strong><?php esc_html_e( 'Instagram Link', 'masonry-blog' ); ?></strong>
	            </label>
	            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('instagram_link') ); ?>" name="<?php echo esc_attr( $this->get_field_name('instagram_link') ); ?>" type="text" value="<?php echo esc_attr( $instance['instagram_link'] ); ?>" /> 
			</p>

			<p>
             	<label for="<?php echo esc_attr( $this->get_field_name('linkedin_link') ); ?>">
	                <strong><?php esc_html_e( 'Linkedin Link', 'masonry-blog' ); ?></strong>
	            </label>
	            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('linkedin_link') ); ?>" name="<?php echo esc_attr( $this->get_field_name('linkedin_link') ); ?>" type="text" value="<?php echo esc_attr( $instance['linkedin_link'] ); ?>" />
             </p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_name('pinterest_link') ); ?>">
	                <strong><?php esc_html_e( 'Pinterest Link', 'masonry-blog' ); ?></strong>
	            </label>
	            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('pinterest_link') ); ?>" name="<?php echo esc_attr( $this->get_field_name('pinterest_link') ); ?>" type="text" value="<?php echo esc_attr( $instance['pinterest_link'] ); ?>" /> 
			</p>            

            <p>
             	<label for="<?php echo esc_attr( $this->get_field_name('youtube_link') ); ?>">
	                <strong><?php esc_html_e( 'YouTube Link', 'masonry-blog' ); ?></strong>
	            </label>
	            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('youtube_link') ); ?>" name="<?php echo esc_attr( $this->get_field_name('youtube_link') ); ?>" type="text" value="<?php echo esc_attr( $instance['youtube_link'] ); ?>" />
            </p>             
			
			<p>
				<label for="<?php echo esc_attr( $this->get_field_name('vk_link') ); ?>">
	                <strong><?php esc_html_e( 'VK Link', 'masonry-blog' ); ?></strong>
	            </label>
	            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('vk_link') ); ?>" name="<?php echo esc_attr( $this->get_field_name('vk_link') ); ?>" type="text" value="<?php echo esc_attr( $instance['vk_link'] ); ?>" />
			</p>

			<p>
                <label for="<?php echo esc_attr( $this->get_field_name('button_title') ); ?>">
                    <strong><?php esc_html_e( 'Button&rsquo;s Title', 'masonry-blog' ); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('button_title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('button_title') ); ?>" type="text" value="<?php echo esc_attr( $instance['button_title'] ); ?>" />   
            </p>

            <p>
				<label for="<?php echo esc_attr( $this->get_field_name('button_link') ); ?>">
	                <strong><?php esc_html_e( 'Button&rsquo;s Link', 'masonry-blog' ); ?></strong>
	            </label>
	            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('button_link') ); ?>" name="<?php echo esc_attr( $this->get_field_name('button_link') ); ?>" type="text" value="<?php echo esc_attr( $instance['button_link'] ); ?>" />
			</p>
    		<?php
        }
     
        public function update( $new_instance, $old_instance ) {
     
            $instance = $old_instance;

            $instance['title'] 					= sanitize_text_field( $new_instance['title'] );

            $instance['author_image']			= sanitize_text_field( $new_instance['author_image'] );

            $instance['author_name']			= sanitize_text_field( $new_instance['author_name'] );

            $instance['author_description']		= sanitize_text_field( $new_instance['author_description'] );

            $instance['facebook_link']          = esc_url_raw( $new_instance['facebook_link'] );

            $instance['twitter_link']           = esc_url_raw( $new_instance['twitter_link'] );

            $instance['instagram_link']         = esc_url_raw( $new_instance['instagram_link'] );

            $instance['linkedin_link']          = esc_url_raw( $new_instance['linkedin_link'] );

            $instance['youtube_link']           = esc_url_raw( $new_instance['youtube_link'] );

            $instance['pinterest_link']         = esc_url_raw( $new_instance['pinterest_link'] );

            $instance['vk_link']                = esc_url_raw( $new_instance['vk_link'] );

            $instance['button_title']           = sanitize_text_field( $new_instance['button_title'] );

            $instance['button_link']            = esc_url_raw( $new_instance['button_link'] );

            return $instance;
        } 

	}
}