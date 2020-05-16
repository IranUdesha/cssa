<?php
/**
 * Social Link Widget
 *
 * @package Masonry_Blog
 */

if( ! class_exists( 'Masonry_Blog_Social_Widget' ) ) {

	class Masonry_Blog_Social_Widget extends WP_Widget {

		function __construct() { 

            parent::__construct(

                'masonry-blog-social-widget',
                esc_html__( 'MB: Social Link Widget', 'masonry-blog' ),
                array(
                    'classname'     => 'mb-social-widget',
                    'description'   => esc_html__( 'Displays social links.', 'masonry-blog' ), 
                )
            );     
        }

        public function widget( $args, $instance ) {

            $title 				= apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

            $layout 	  		= isset( $instance['layout'] ) ? $instance['layout'] : 'layout_1';
     		
            $facebook_link      = isset( $instance['facebook_link'] ) ? $instance['facebook_link'] : '';

            $twitter_link       = isset( $instance['twitter_link'] ) ? $instance['twitter_link'] : '';

            $instagram_link     = isset( $instance['instagram_link'] ) ? $instance['instagram_link'] : '';

            $youtube_link       = isset( $instance['youtube_link'] ) ? $instance['youtube_link'] : '';

            $pinterest_link     = isset( $instance['pinterest_link'] ) ? $instance['pinterest_link'] : '';

            $linkedin_link      = isset( $instance['linkedin_link'] ) ? $instance['linkedin_link'] : '';

            $vk_link            = isset( $instance['vk_link'] ) ? $instance['vk_link'] : '';

            echo $args['before_widget'];

            if( !empty( $title ) ) {

                echo $args['before_title'];

                echo esc_html( $title );

                echo $args['after_title'];
            }   

            $social_widget_class = 'widget-container';

            if( $layout == 'layout_1' ) {

            	$social_widget_class .= ' mb-social-widget-one';
            } else {

            	$social_widget_class .= ' mb-social-widget-two';
            }  
            ?>
            <div class="<?php echo esc_attr( $social_widget_class ); ?>">
				<div class="social-links">
					<ul>
						<?php
						if( $layout == 'layout_1' ) {
							if( !empty( $facebook_link ) ) {
								?>
								<li>
									<a class="social-link-facebook" href="<?php echo esc_url( $facebook_link ); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
								</li>
								<?php
							}

							if( !empty( $twitter_link ) ) {
								?>
								<li>
									<a class="social-link-twitter" href="<?php echo esc_url( $twitter_link ); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
								</li>
								<?php
							}

							if( !empty( $instagram_link ) ) {
								?>
								<li>
									<a class="social-link-instagram" href="<?php echo esc_url( $instagram_link ); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
								</li>
								<?php
							}

							if( !empty( $pinterest_link ) ) {
								?>
								<li>
									<a class="social-link-pinterest" href="<?php echo esc_url( $pinterest_link ); ?>"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
								</li>
								<?php
							}

							if( !empty( $youtube_link ) ) {
								?>
								<li>
									<a class="social-link-youtube" href="<?php echo esc_url( $youtube_link ); ?>"><i class="fa fa-youtube" aria-hidden="true"></i></a>
								</li>
								<?php
							}

							if( !empty( $linkedin_link ) ) {
								?>
								<li>
									<a class="social-link-linkedin" href="<?php echo esc_url( $linkedin_link ); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
								</li>
								<?php
							}

							if( !empty( $vk_link ) ) {
								?>
								<li>
									<a class="social-link-vk" href="<?php echo esc_url( $vk_link ); ?>"><i class="fa fa-vk" aria-hidden="true"></i></a>
								</li>
								<?php
							}
						} else {

							if( !empty( $facebook_link ) ) {
								?>
								<li>
									<a class="social-link-facebook" href="<?php echo esc_url( $facebook_link ); ?>"><span><?php esc_html_e( 'Facebook', 'masonry-blog' ); ?></span><span class="social-icon"><i class="fa fa-facebook" aria-hidden="true"></i></span></span></a>
								</li>
								<?php
							}

							if( !empty( $twitter_link ) ) {
								?>
								<li>
									<a class="social-link-twitter" href="<?php echo esc_url( $twitter_link ); ?>"><span><?php esc_html_e( 'Twitter', 'masonry-blog' ); ?></span><span class="social-icon"><i class="fa fa-twitter" aria-hidden="true"></i></span></a>
								</li>
								<?php
							}

							if( !empty( $instagram_link ) ) {
								?>
								<li>
									<a class="social-link-instagram" href="<?php echo esc_url( $instagram_link ); ?>"><span><?php esc_html_e( 'Instagram', 'masonry-blog' ); ?></span><span class="social-icon"><i class="fa fa-instagram" aria-hidden="true"></i></span></a>
								</li>
								<?php
							}

							if( !empty( $pinterest_link ) ) {
								?>
								<li>
									<a class="social-link-pinterest" href="<?php echo esc_url( $pinterest_link ); ?>"><span><?php esc_html_e( 'Pinterest', 'masonry-blog' ); ?></span><span class="social-icon"><i class="fa fa-pinterest" aria-hidden="true"></i></span></a>
								</li>
								<?php
							}

							if( !empty( $youtube_link ) ) {
								?>
								<li>
									<a class="social-link-youtube" href="<?php echo esc_url( $youtube_link ); ?>"><span><?php esc_html_e( 'Youtube', 'masonry-blog' ); ?></span><span class="social-icon"><i class="fa fa-youtube-play" aria-hidden="true"></i></span></a>
								</li>
								<?php
							}

							if( !empty( $linkedin_link ) ) {
								?>
								<li>
									<a class="social-link-linkedin" href="<?php echo esc_url( $linkedin_link ); ?>"><span><?php esc_html_e( 'Linkedin', 'masonry-blog' ); ?></span><span class="social-icon"><i class="fa fa-linkedin" aria-hidden="true"></i></span></a>
								</li>
								<?php
							}

							if( !empty( $vk_link ) ) {
								?>
								<li>
									<a class="social-link-vk" href="<?php echo esc_url( $vk_link ); ?>"><span><?php esc_html_e( 'VK', 'masonry-blog' ); ?></span><span class="social-icon"><i class="fa fa-vk" aria-hidden="true"></i></span></a>
								</li>
								<?php
							}
						}
						?>
					</ul><!-- social-link-one -->
				</div>
			</div>
            <?php 
        	echo $args['after_widget'];
    	}

    	public function form( $instance ) {

            $defaults = array(
                'title'       => '',
                'layout' => 'layout_1',
                'facebook_link'  => '',
                'twitter_link'  => '',
                'instagram_link'  => '',
                'youtube_link'  => '',
                'pinterest_link'  => '',
                'linkedin_link'  => '',
                'vk_link'  => '',
            );

            $instance = wp_parse_args( (array) $instance, $defaults );
    		?>
    		<p>
                <label for="<?php echo esc_attr( $this->get_field_name('title') ); ?>">
                    <strong><?php esc_html_e( 'Title', 'masonry-blog' ); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />   
            </p>

            <p>
                <?php
                $layouts = array(
                    'layout_1' => esc_html__( 'Layout 1', 'masonry-blog' ),
                    'layout_2' => esc_html__( 'Layout 2', 'masonry-blog' ),
                );
                ?>
                <label for="<?php echo esc_attr( $this->get_field_id('layout') ); ?>">
                    <strong><?php esc_html_e( 'Select Layout', 'masonry-blog' ); ?></strong>
                </label>
                <select class="widefat" name="<?php echo esc_attr( $this->get_field_name('layout') ); ?>" id="<?php echo esc_attr( $this->get_field_id('layout') ); ?>">
                    <?php
                    foreach( $layouts as $value => $layout ) {
                        ?>
                        <option value="<?php echo esc_attr( $value ); ?>" <?php selected( $instance['layout'], $value ); ?>><?php echo esc_html( $layout ); ?></option>
                        <?php
                    }
                    ?>
                </select>
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
    		<?php
        }
     
        public function update( $new_instance, $old_instance ) {
     
            $instance = $old_instance;

            $instance['title'] 					= sanitize_text_field( $new_instance['title'] );

            $instance['layout'] 				= sanitize_text_field( $new_instance['layout'] );

            $instance['facebook_link']          = esc_url_raw( $new_instance['facebook_link'] );

            $instance['twitter_link']           = esc_url_raw( $new_instance['twitter_link'] );

            $instance['instagram_link']         = esc_url_raw( $new_instance['instagram_link'] );

            $instance['linkedin_link']          = esc_url_raw( $new_instance['linkedin_link'] );

            $instance['youtube_link']           = esc_url_raw( $new_instance['youtube_link'] );

            $instance['pinterest_link']         = esc_url_raw( $new_instance['pinterest_link'] );

            $instance['vk_link']                = esc_url_raw( $new_instance['vk_link'] );

            return $instance;
        } 

	}
}