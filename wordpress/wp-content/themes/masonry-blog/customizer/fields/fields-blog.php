<?php

$masonry_blog_defaults = masonry_blog_get_default_theme_options();

$wp_customize->add_section( 
	'masonry_blog_blog_page_section', 
	array(
		'priority'		=> 10,
		'title'			=> esc_html__( 'Blog Page', 'masonry-blog' ),
		'panel'			=> 'masonry_blog_pages_panel'
	) 
);

$wp_customize->add_setting( 
	'masonry_blog_blog_display_feat_img', 
	array(
		'sanitize_callback' => 'wp_validate_boolean',
		'default' => $masonry_blog_defaults['masonry_blog_blog_display_feat_img' ],
	) 
);

$wp_customize->add_control( 
	new Masonry_Blog_Customizer_Toggle_Control( $wp_customize,
		'masonry_blog_blog_display_feat_img', 
		array(
			'label' => esc_html__( 'Display Featured Images', 'masonry-blog' ),
			'section' => 'masonry_blog_blog_page_section',
			'type' => 'light',
		) 
	) 
);

$wp_customize->add_setting( 
	'masonry_blog_blog_display_cats', 
	array(
		'sanitize_callback' => 'wp_validate_boolean',
		'default' => $masonry_blog_defaults['masonry_blog_blog_display_cats' ],
	) 
);

$wp_customize->add_control( 
	new Masonry_Blog_Customizer_Toggle_Control( $wp_customize,
		'masonry_blog_blog_display_cats', 
		array(
			'label' => esc_html__( 'Display Post Categories', 'masonry-blog' ),
			'section' => 'masonry_blog_blog_page_section',
			'type' => 'light',
		) 
	) 
);

$wp_customize->add_setting( 
	'masonry_blog_blog_display_date', 
	array(
		'sanitize_callback' => 'wp_validate_boolean',
		'default' => $masonry_blog_defaults['masonry_blog_blog_display_date' ],
	) 
);

$wp_customize->add_control( 
	new Masonry_Blog_Customizer_Toggle_Control( $wp_customize,
		'masonry_blog_blog_display_date', 
		array(
			'label' => esc_html__( 'Display Post Date', 'masonry-blog' ),
			'section' => 'masonry_blog_blog_page_section',
			'type' => 'light',
		) 
	) 
);

$wp_customize->add_setting( 
	'masonry_blog_blog_display_author', 
	array(
		'sanitize_callback' => 'wp_validate_boolean',
		'default' => $masonry_blog_defaults['masonry_blog_blog_display_author' ],
	) 
);

$wp_customize->add_control( 
	new Masonry_Blog_Customizer_Toggle_Control( $wp_customize,
		'masonry_blog_blog_display_author', 
		array(
			'label' => esc_html__( 'Display Post Author', 'masonry-blog' ),
			'section' => 'masonry_blog_blog_page_section',
			'type' => 'light',
		) 
	) 
);

$wp_customize->add_setting( 'masonry_blog_blog_sidebar_position', 
	array(
		'sanitize_callback'		=> 'masonry_blog_sanitize_select',
		'default'				=> $masonry_blog_defaults['masonry_blog_blog_sidebar_position'],
	)
);

$wp_customize->add_control( 
	new Masonry_Blog_Radio_Image_Control( $wp_customize, 
		'masonry_blog_blog_sidebar_position', 
		array( 
			'label' => esc_html__( 'Select Sidebar Position', 'masonry-blog' ),
			'type'	=> 'select',
			'choices' => masonry_blog_sidebar_position_choices(),
			'section' => 'masonry_blog_blog_page_section',
			'active_callback' => 'masonry_blog_not_active_global_sidebar',
		)
	) 
);