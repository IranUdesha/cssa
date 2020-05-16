<?php

$masonry_blog_defaults = masonry_blog_get_default_theme_options();

$wp_customize->add_section( 
	'masonry_blog_static_front_page_section', 
	array(
		'priority'		=> 10,
		'title'			=> esc_html__( 'Static Front Page', 'masonry-blog' ),
		'description'	=> esc_html__( 'Settings that are here only works for static front page. Set a static front page via &ldquo;Homepage Settings&ldquo;.', 'masonry-blog' ),
		'panel'			=> 'masonry_blog_pages_panel'
	) 
);

$wp_customize->add_setting( 
	'masonry_blog_display_static_page_title', 
	array(
		'sanitize_callback' => 'wp_validate_boolean',
		'default' => $masonry_blog_defaults['masonry_blog_display_static_page_title' ],
	) 
);

$wp_customize->add_control( 
	new Masonry_Blog_Customizer_Toggle_Control( $wp_customize,
		'masonry_blog_display_static_page_title', 
		array(
			'label' => esc_html__( 'Display Page Title', 'masonry-blog' ),
			'section' => 'masonry_blog_static_front_page_section',
			'type' => 'light',
		) 
	) 
);

$wp_customize->add_setting( 
	'masonry_blog_display_static_page_feat_img', 
	array(
		'sanitize_callback' => 'wp_validate_boolean',
		'default' => $masonry_blog_defaults['masonry_blog_display_static_page_feat_img' ],
	) 
);

$wp_customize->add_control( 
	new Masonry_Blog_Customizer_Toggle_Control( $wp_customize,
		'masonry_blog_display_static_page_feat_img', 
		array(
			'label' => esc_html__( 'Display Featured Image', 'masonry-blog' ),
			'section' => 'masonry_blog_static_front_page_section',
			'type' => 'light',
		) 
	) 
);

$wp_customize->add_setting( 'masonry_blog_display_static_page_sidebar_position', 
	array(
		'sanitize_callback'		=> 'masonry_blog_sanitize_select',
		'default'				=> $masonry_blog_defaults['masonry_blog_display_static_page_sidebar_position'],
	)
);

$wp_customize->add_control( 
	new Masonry_Blog_Radio_Image_Control( $wp_customize, 
		'masonry_blog_display_static_page_sidebar_position', 
		array( 
			'label' => esc_html__( 'Select Sidebar Position', 'masonry-blog' ),
			'type'	=> 'select',
			'choices' => masonry_blog_sidebar_position_choices(),
			'section' => 'masonry_blog_static_front_page_section',
			'active_callback' => 'masonry_blog_not_active_global_sidebar',
		)
	) 
);