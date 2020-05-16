<?php

$masonry_blog_defaults = masonry_blog_get_default_theme_options();

$wp_customize->add_section( 
	'masonry_blog_site_sidebar_section', 
	array(
		'priority'		=> 10,
		'title'			=> esc_html__( 'Site Sidebar', 'masonry-blog' )
	) 
);

$wp_customize->add_setting( 
	'masonry_blog_enable_sticky_sidebar', 
	array(
		'sanitize_callback' => 'wp_validate_boolean',
		'default' => $masonry_blog_defaults['masonry_blog_enable_sticky_sidebar' ],
	) 
);

$wp_customize->add_control( 
	new Masonry_Blog_Customizer_Toggle_Control( $wp_customize,
		'masonry_blog_enable_sticky_sidebar', 
		array(
			'label' => esc_html__( 'Enable Sticky Sidebar', 'masonry-blog' ),
			'section' => 'masonry_blog_site_sidebar_section',
			'type' => 'light',
		) 
	) 
);

$wp_customize->add_setting( 
	'masonry_blog_enable_sidebar_small_devices', 
	array(
		'sanitize_callback' => 'wp_validate_boolean',
		'default' => $masonry_blog_defaults['masonry_blog_enable_sidebar_small_devices' ],
	) 
);

$wp_customize->add_control( 
	new Masonry_Blog_Customizer_Toggle_Control( $wp_customize,
		'masonry_blog_enable_sidebar_small_devices', 
		array(
			'label' => esc_html__( 'Show Sidebar In Small Devices', 'masonry-blog' ),
			'section' => 'masonry_blog_site_sidebar_section',
			'type' => 'light',
		) 
	) 
);

$wp_customize->add_setting( 
	'masonry_blog_enable_global_sidebar_position', 
	array(
		'sanitize_callback' => 'wp_validate_boolean',
		'default' => $masonry_blog_defaults['masonry_blog_enable_global_sidebar_position' ],
	) 
);

$wp_customize->add_control( 
	new Masonry_Blog_Customizer_Toggle_Control( $wp_customize,
		'masonry_blog_enable_global_sidebar_position', 
		array(
			'label' => esc_html__( 'Enable Global Sidebar Position', 'masonry-blog' ),
			'section' => 'masonry_blog_site_sidebar_section',
			'type' => 'light',
		) 
	) 
);

$wp_customize->add_setting( 'masonry_blog_global_sidebar_position', 
	array(
		'sanitize_callback'		=> 'masonry_blog_sanitize_select',
		'default'				=> $masonry_blog_defaults['masonry_blog_global_sidebar_position'],
	)
);

$wp_customize->add_control( 
	new Masonry_Blog_Radio_Image_Control( $wp_customize, 
		'masonry_blog_global_sidebar_position', 
		array( 
			'label' => esc_html__( 'Select Global Sidebar Position', 'masonry-blog' ),
			'type'	=> 'select',
			'choices' => masonry_blog_sidebar_position_choices(),
			'section' => 'masonry_blog_site_sidebar_section',
			'active_callback' => 'masonry_blog_active_global_sidebar',
		)
	) 
);