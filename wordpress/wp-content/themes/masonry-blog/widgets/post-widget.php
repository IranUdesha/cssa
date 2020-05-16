<?php
/**
 * Recent Post Widget
 *
 * @package Masonry_Blog
 */

if( ! class_exists( 'Masonry_Blog_Post_Widget' ) ) {

	class Masonry_Blog_Post_Widget extends WP_Widget {

		function __construct() { 

            parent::__construct(

                'masonry-blog-recent-post-widget',
                esc_html__( 'MB: Recent Post Widget', 'masonry-blog' ),
                array(
                    'classname'     => 'mb-post-widget',
                    'description'   => esc_html__( 'Displays recent posts.', 'masonry-blog' ), 
                )
            );     
        }

        public function widget( $args, $instance ) {

            $title 				     = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

			$layout 	  	         = isset( $instance['layout'] ) ? $instance['layout'] : 'layout_1';

			$no_of_posts             = isset( $instance['no_of_posts'] ) ? $instance['no_of_posts'] : 3;

			$display_count           = isset( $instance['display_count'] ) ? $instance['display_count'] : false;

			$display_author_meta     = isset( $instance['display_author_meta'] ) ? $instance['display_author_meta'] : false;

			$display_date_meta       = isset( $instance['display_date_meta'] ) ? $instance['display_date_meta'] : false;

			$layout_class = 'widget-container';

			if( $layout == 'layout_1'  ) {

				$layout_class .= ' post-widget-one';
			} else {

				$layout_class .= ' post-widget-two';
			}

            echo $args['before_widget'];

            if( !empty( $title ) ) {

                echo $args['before_title'];

                echo esc_html( $title );

                echo $args['after_title'];
            } 

            $recent_posts_args = array(
            	'post_type' => 'post',
                'ignore_sticky_posts' => true,
            );           

            if( absint( $no_of_posts ) > 0 ) {

            	$recent_posts_args['posts_per_page'] = absint( $no_of_posts );
            } else {

            	$recent_posts_args['posts_per_page'] = 4;
            }

            $recent_posts_query = new WP_Query( $recent_posts_args );

            if( $recent_posts_query->have_posts() ) {
	            ?>
	            <div class="<?php echo esc_attr( $layout_class ); ?>">
	            	<?php
	            	$post_count = 1;

	            	while( $recent_posts_query->have_posts() ) {

	            		$recent_posts_query->the_post();

	            		$post_class = 'post';

	            		if( has_post_thumbnail() ) {

	            			$post_class = 'has-post-thumbnail';
	            		} else {

	            			$post_class = 'has-no-post-thumbnail';
	            		}
	            		?>
						<article class="<?php echo esc_attr( $post_class ); ?>">
							<div class="mb-row verticle-center">
								<?php
								if( has_post_thumbnail() ) {
									?>
									<div class="mb-col">
										<div class="post-thumb">
											<a href="<?php the_permalink(); ?>">
												<?php masonry_blog_thumbnail_two_image(); ?>
											</a>
											<?php
											if( $display_count == true ) {
												?>
												<span class="count"><?php echo esc_html( $post_count ); ?></span>
												<?php
											}
											?>
										</div>
									</div>
									<?php
								}
								?>
								<div class="mb-col">
									<div class="content-holder">
										<div class="the-title">
											<?php
											if( ! has_post_thumbnail() && $display_count == true ) {
												?>
												<span class="count"><?php echo esc_html( $post_count ); ?></span>
												<?php
											}
											?>
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</div>
										<?php
										if( $display_author_meta == true || $display_date_meta == true ) {
											?>
											<div class="post-author-date-meta">
												<ul>
													<?php
													if( $display_author_meta == true ) {
														?>
														<li class="post-author-meta">
															<?php masonry_blog_posted_by(); ?>
						            					</li>
						            					<?php
						            				}

						            				if( $display_date_meta == true ) {
						            					?>
														<li class="post-date-meta">
															<?php masonry_blog_posted_on(); ?>
														</li>
														<?php
													}
													?>
												</ul>
											</div>
											<?php
										}
										?>
									</div>
								</div>
							</div>
						</article>
						<?php
						$post_count++;
					}
					wp_reset_postdata();
					?>
				</div>
	            <?php 
	        }
        	echo $args['after_widget'];
    	}

    	public function form( $instance ) {

            $defaults = array(
                'title'       => '',
                'layout' => 'layout_1',
                'no_of_posts' => 3,
                'display_count'  => false,
                'display_author_meta'  => false,
                'display_date_meta'  => false,
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
                <label for="<?php echo esc_attr( $this->get_field_name('no_of_posts') ); ?>">
                    <strong><?php esc_html_e('No of Posts', 'masonry-blog'); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('no_of_posts') ); ?>" name="<?php echo esc_attr( $this->get_field_name('no_of_posts') ); ?>" type="number" value="<?php echo esc_attr( absint( $instance['no_of_posts'] ) ); ?>" />   
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('display_count') ); ?>">
                    <input type="checkbox" id="<?php echo esc_attr( $this->get_field_id('display_count') ); ?>" name="<?php echo esc_attr( $this->get_field_name('display_count') ); ?>" <?php checked( absint( $instance['display_count'] ), 1 ); ?> >                
                    <strong><?php esc_html_e('Display Count Number', 'masonry-blog'); ?></strong>
                </label>
            </p>  

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('display_author_meta') ); ?>">
                    <input type="checkbox" id="<?php echo esc_attr( $this->get_field_id('display_author_meta') ); ?>" name="<?php echo esc_attr( $this->get_field_name('display_author_meta') ); ?>" <?php checked( absint( $instance['display_author_meta'] ), 1 ); ?> >                
                    <strong><?php esc_html_e('Display Author&rsquo;s Name', 'masonry-blog'); ?></strong>
                </label>
            </p> 

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('display_date_meta') ); ?>">
                    <input type="checkbox" id="<?php echo esc_attr( $this->get_field_id('display_date_meta') ); ?>" name="<?php echo esc_attr( $this->get_field_name('display_date_meta') ); ?>" <?php checked( absint( $instance['display_date_meta'] ), 1 ); ?> >                
                    <strong><?php esc_html_e('Display Posted Date', 'masonry-blog'); ?></strong>
                </label>
            </p>  
    		<?php
        }
     
        public function update( $new_instance, $old_instance ) {
     
            $instance = $old_instance;

            $instance['title'] 					= sanitize_text_field( $new_instance['title'] );

            $instance['layout'] 				= sanitize_text_field( $new_instance['layout'] );

            $instance['no_of_posts']			= absint( $new_instance['no_of_posts'] );

            $instance['display_count']			= isset(  $new_instance['display_count'] ) ? wp_validate_boolean( $new_instance['display_count'] ) : false;

            $instance['display_author_meta']	= isset(  $new_instance['display_author_meta'] ) ? wp_validate_boolean( $new_instance['display_author_meta'] ) : false;

            $instance['display_date_meta']		= isset(  $new_instance['display_date_meta'] ) ? wp_validate_boolean( $new_instance['display_date_meta'] ) : false;

            return $instance;
        } 

	}
}