<?php
/**
 * Funtion To Get Google Fonts
 */
if ( ! function_exists( 'masonry_blog_google_fonts_url' ) ) {
    /**
     * Return Font's URL.
     *
     * @since 1.0.0
     * @return string Fonts URL.
     */
    function masonry_blog_google_fonts_url() {

        $fonts_url = '';
        $fonts = array();
        $subsets = 'latin,latin-ext';

        $site_title_font_family = masonry_blog_get_option( 'masonry_blog_site_title_font_family' );

        if( ! masonry_blog_is_standard_fonts( $site_title_font_family ) ) {

            $fonts[] = $site_title_font_family;
        }

        $headings_font_family = masonry_blog_get_option( 'masonry_blog_headings_font_family' );

        if( ! masonry_blog_is_standard_fonts( $headings_font_family ) ) {

            $fonts[] = $headings_font_family;
        }

        $body_font_family = masonry_blog_get_option( 'masonry_blog_body_font_family' );

        if( ! masonry_blog_is_standard_fonts( $body_font_family ) ) {

            $fonts[] = $body_font_family;
        }

        $fonts = array_unique( $fonts );

        foreach ( $fonts as $f) {

            $f_family = explode(':', $f);

            $f_family = str_replace('+', ' ', $f_family);

            $font_family = ( !empty( $f_family[1]) ) ? $f_family[1] : '';

            $fonts[] = $f_family[0].':'.$font_family;

        }

        if ( $fonts ) {
            $fonts_url = add_query_arg( array(
                'family' => rawurlencode( implode( '|', $fonts ) ),
                'subset' => rawurlencode( $subsets ),
            ), 'https://fonts.googleapis.com/css' );
        }

        return $fonts_url;
    }
}


/**
 * Fallback callback for primary navigation menu. 
 */
if ( ! function_exists( 'masonry_blog_navigation_fallback' ) ) {

    function masonry_blog_navigation_fallback() {
        ?>
        <ul class="primary-menu">
            <?php 
            wp_list_pages( array( 
                'title_li' => '', 
                'depth' => 4,
            ) ); 
            ?>
        </ul><!-- .primary-menu -->
        <?php    
    }
}


/**
 * Filters For Excerpt Length
 */
if( !function_exists( 'masonry_blog_excerpt_length' ) ) :
    /*
     * Excerpt More
     */
    function masonry_blog_excerpt_length( $length ) {

        if( is_admin() ) {

            return $length;
        }

        $excerpt_length = masonry_blog_get_option( 'masonry_blog_excerpt_length' );

        if ( absint( $excerpt_length ) > 0 ) {
            
            $excerpt_length = absint( $excerpt_length );
        }

        return $excerpt_length;
    }
endif;
add_filter( 'excerpt_length', 'masonry_blog_excerpt_length' );


/**
 * Filter For Excerpt More
 */
if( !function_exists( 'masonry_blog_excerpt_more' ) ) :

    function masonry_blog_excerpt_more( $more ) {

        return '...';
    }
endif;
add_filter( 'excerpt_more', 'masonry_blog_excerpt_more' );


/**
 * Filter For Main Query
 */
if( !function_exists( 'masonry_blog_main_query_filter' ) ) :

    function masonry_blog_main_query_filter( $query ) {

        if ( is_admin() ) {

            return $query;
        }

        if ( $query->is_search && ( masonry_blog_get_option( 'masonry_blog_search_exclude_page_from_result' ) == true ) ) {
            
            $query->set('post_type', 'post');
        }

        return $query;
    }
endif;
add_filter( 'pre_get_posts', 'masonry_blog_main_query_filter' );


if( !function_exists( 'masonry_blog_search_form' ) ) :
    /**
     * Search form of the theme.
     *
     * @since 1.0.0
     */
    function masonry_blog_search_form( $form ) {

        $form = '<form role="search" method="get" class="search-form" action="' . esc_url( home_url( '/' ) ) . '"><label class="screen-reader-text" for="s">' . esc_html__( 'Search for:', 'masonry-blog' ) . '</label><input type="search" name="s" placeholder="' . esc_html_x( 'Type here to search', 'placeholder', 'masonry-blog' ) . '" value="' . get_search_query() . '"><button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button></form>';

        return $form;
    }
endif;
add_filter( 'get_search_form', 'masonry_blog_search_form', 10 );

if( ! function_exists( 'masonry_blog_nav_description' ) ) {

    function masonry_blog_nav_description( $item_output, $item, $depth, $args ) {

        if ( !empty( $item->description ) ) {

            $item_output = str_replace( $args->link_after . '</a>', '<span class="menu-item-description">' . $item->description . '</span>' . $args->link_after . '</a>', $item_output );
        }
     
        return $item_output;
    }
}
add_filter( 'walker_nav_menu_start_el', 'masonry_blog_nav_description', 10, 4 );


if( ! function_exists( 'masonry_blog_sidebar_position' ) ) {
    /**
     * Returns sidebar position.
     *
     * @since 1.0.0
     */
    function masonry_blog_sidebar_position() {

        if( ! is_active_sidebar( 'sidebar-1' ) ) {

            return 'none';
        }

        if( masonry_blog_get_option( 'masonry_blog_enable_global_sidebar_position' ) == true ) {

            return masonry_blog_get_option( 'masonry_blog_global_sidebar_position' );
        } else {

            if( is_front_page() && is_home() ) {

                return masonry_blog_get_option( 'masonry_blog_blog_sidebar_position' );

            } else if( is_home() && ! is_front_page() ) {

                return masonry_blog_get_option( 'masonry_blog_blog_sidebar_position' );

            } else {

                if( is_front_page() && ! is_home() ) {

                    return masonry_blog_get_option( 'masonry_blog_display_static_page_sidebar_position' );
                }
            }

            if( is_archive() ) {

                return masonry_blog_get_option( 'masonry_blog_archive_sidebar_position' );
            }

            if( is_search() ) {

                return masonry_blog_get_option( 'masonry_blog_search_sidebar_position' );
            }

            if( is_single() ) {

                if( masonry_blog_get_option( 'masonry_blog_enable_common_post_sidebar_position' ) == true ) {

                    return masonry_blog_get_option( 'masonry_blog_common_post_sidebar_position' );
                } else {

                    $sidebar_position = get_post_meta( get_the_ID(), 'masonry_blog_sidebar_position', true );

                    if( !empty( $sidebar_position ) ) {

                        return $sidebar_position;
                    } else {

                        return 'right';
                    }
                }
            }

            if( is_page() ) {

                if( masonry_blog_get_option( 'masonry_blog_enable_common_page_sidebar_position' ) == true ) {

                    return masonry_blog_get_option( 'masonry_blog_common_page_sidebar_position' );
                } else {

                    $sidebar_position = get_post_meta( get_the_ID(), 'masonry_blog_sidebar_position', true );

                    if( !empty( $sidebar_position ) ) {

                        return $sidebar_position;
                    } else {

                        return 'right';
                    }
                }
            }
        }
    }
}


if( ! function_exists( 'masonry_blog_related_posts_query' ) ) {

    function masonry_blog_related_posts_query() {

        $related_posts_no = masonry_blog_get_option( 'masonry_blog_related_posts_no' );

        $related_posts_query_args = array(
            'no_found_rows'       => true,
            'ignore_sticky_posts' => true,
        );

        if( absint( $related_posts_no ) > 0 ) {

            $related_posts_query_args['posts_per_page'] = absint( $related_posts_no );
        } else {

            $related_posts_query_args['posts_per_page'] = 4;
        }

        $current_object = get_queried_object();

        if ( $current_object instanceof WP_Post ) {

            $current_id = $current_object->ID;

            if ( absint( $current_id ) > 0 ) {

                // Exclude current post.
                $related_posts_query_args['post__not_in'] = array( absint( $current_id ) );

                // Include current posts categories.
                $categories = wp_get_post_categories( $current_id );

                if ( ! empty( $categories ) ) {

                    $related_posts_query_args['tax_query'] = array(
                        array(
                            'taxonomy' => 'category',
                            'field'    => 'term_id',
                            'terms'    => $categories,
                            'operator' => 'IN',
                        )
                    );
                }
            }
        }

        $related_posts_query = new WP_Query( $related_posts_query_args );

        return $related_posts_query;
    }
}


if( ! function_exists( 'masonry_blog_banner_posts_query' ) ) {

    function masonry_blog_banner_posts_query() {

        $banner_post_category = masonry_blog_get_option( 'masonry_blog_banner_category' );

        $no_of_banner_items = masonry_blog_get_option( 'masonry_blog_banner_item_no' );

        $banner_query_args = array( 
            'post_type' => 'post', 
            'ignore_sticky_posts' => true, 
            'posts_per_page' => $no_of_banner_items, 
        );

        if( !empty( $banner_post_category ) ) {

            $banner_query_args['category_name'] = $banner_post_category;
        }

        $banner_query = new WP_Query( $banner_query_args );

        return $banner_query;
    }
}


if( ! function_exists( 'masonry_blog_comments_callback' ) ) {

    function masonry_blog_comments_callback( $comment, $args, $depth ) {

        if ( 'div' === $args['style'] ) {

            $tag       = 'div';
            $add_below = 'comment';
        } else {
            $tag       = 'li';
            $add_below = 'div-comment';
        }
        ?>
        <<?php echo $tag; ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID() ?>">
        <?php 
        if ( 'div' != $args['style'] ) { 
            ?>
            <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
            <?php
        } 
        ?>
        <div class="comment-author vcard">
            <div class="comment-author-avatar">
                <?php 
                if ( $args['avatar_size'] != 0 ) {
                    ?>
                    <figure class="image-container" style="padding-bottom: 100%;">
                        <img class="avatar lazy-img" alt="<?php echo esc_attr( get_comment_author() ); ?>" data-src="<?php echo esc_url( get_avatar_url( $comment->user_id, ['size' => '75'] ) ); ?>" height="75" width="75">
                        <noscript>
                            <?php echo get_avatar( get_the_author_meta( 'ID' ), 75 ); ?>
                        </noscript>
                    </figure>
                    <?php
                } 
                ?>
            </div>
            <div class="comment-author-content">
                <div class="comment-author-info">
                    <?php
                    /* translators: %s: author link */ 
                    printf( __( '<cite class="fn">%s</cite> <span class="says">says:</span>', 'masonry-blog' ), wp_kses_post( get_comment_author_link() ) );  ?>
                    <div class="comment-meta commentmetadata">
                        <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                            <?php
                            /* translators: 1: date, 2: time */
                            printf( esc_html__( '%1$s at %2$s', 'masonry-blog' ), get_comment_date(),  get_comment_time() 
                            ); ?>
                        </a>
                        <?php edit_comment_link( esc_html__( '(Edit)', 'masonry-blog' ), '', '' ); ?>
                    </div>
                </div>
                <?php 
                if ( $comment->comment_approved == '0' ) { 
                    ?>
                    <em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'masonry-blog' ); ?></em><br/>
                    <?php 
                } 
                ?>
                <div class="comment-author-comment">
                    <?php comment_text(); ?>
                </div>
                <div class="reply">
                    <?php 
                    comment_reply_link( 
                        array_merge( 
                            $args, 
                            array( 
                                'add_below' => $add_below, 
                                'depth'     => $depth, 
                                'max_depth' => $args['max_depth'] 
                            ) 
                        ) 
                    ); 
                    ?>
                </div>
            </div>
        </div>
        <?php
        if ( 'div' != $args['style'] ) : 
            ?>
            </div>
            <?php 
        endif;
    }
}

if( ! function_exists( 'masonry_blog_excerpt' ) ) {

    function masonry_blog_excerpt() {

        $content = apply_filters( 'the_content', get_the_content() );
        
        $excerpt_length = masonry_blog_get_option( 'masonry_blog_excerpt_length' );
        ?>
        <p><?php echo wp_kses_post( wp_trim_words( $content, $excerpt_length, '...' ) ); ?></p>
        <?php
    }
}


/**
 * Function to get post thumbnail alt text value.
 */
if( !function_exists( 'masonry_blog_thumbnail_alt_text' ) ) {

    function masonry_blog_thumbnail_alt_text() {

        $post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );

        $alt_text = '';

        if( !empty( $post_thumbnail_id ) ) {

            $alt_text = get_post_meta( $post_thumbnail_id, '_wp_attachment_image_alt', true );
        }

        if( !empty( $alt_text ) ) {

            echo esc_attr( $alt_text );
        } else {

            the_title_attribute();
        }
    }
}


if( ! function_exists( 'masonry_blog_alignment_class' ) ) {

    function masonry_blog_alignment_class( $align ) {

        switch ( $align ) {

            case 'left':
                
                return 'left-aligned';
                break;

            case 'right':
                
                return 'right-aligned';
                break;
            
            default:
                
                return 'center-aligned';
                break;
        }
    }
}

if( ! function_exists( 'masonry_blog_ajax_posts_loading' ) ) {

    function masonry_blog_ajax_posts_loading() {

        if( masonry_blog_get_option( 'masonry_blog_pagination' ) == 'infinite_scroll' || masonry_blog_get_option( 'masonry_blog_pagination' ) == 'button_click' ) {

            return true;
        }
    }
}


if( ! function_exists( 'masonry_blog_display_carousel' ) ) {

    function masonry_blog_display_carousel() {

        if( ! masonry_blog_get_option( 'masonry_blog_display_banner' ) ) {

            return false;
        }

        $display_page = masonry_blog_get_option( 'masonry_blog_display_banner_on' );

        switch( $display_page ) {

            case 'blog_page' :

                if( is_home() && is_front_page() ) {

                    return true;
                } else {

                    if( is_home() && ! is_front_page() ) {

                        return true;
                    }
                }

                break;

            case 'front_page' :

                if( ! is_home() && is_front_page() ) {

                    return true;
                }

                break;

            case 'blog_n_front' :

                if( is_home() || is_front_page() ) {

                    return true;
                }

                break;

            default :

                return false;
        }

        return false;
    }
}