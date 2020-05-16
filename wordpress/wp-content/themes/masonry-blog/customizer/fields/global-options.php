<?php

$masonry_blog_defaults = masonry_blog_get_default_theme_options();

$wp_customize->add_panel(
	'masonry_blog_panel_global_options',
	array(
		'title' => esc_html__( 'Global Options', 'masonry-blog' ),
		'prioriy' => 10,
	)
);

$wp_customize->add_section( 
	'masonry_blog_section_global_links', 
	array(
		'priority'		=> 20,
		'title'			=> esc_html__( 'Accessibility', 'masonry-blog' ),
		'panel'			=> 'masonry_blog_panel_global_options'
	) 
);

$wp_customize->add_setting( 
	'masonry_blog_enable_link_decoration', 
	array(
		'sanitize_callback' => 'wp_validate_boolean',
		'default' => $masonry_blog_defaults['masonry_blog_enable_link_decoration' ],
	) 
);

$wp_customize->add_control( 
	new Masonry_Blog_Customizer_Toggle_Control( $wp_customize,
		'masonry_blog_enable_link_decoration', 
		array(
			'label' => esc_html__( 'Enable Link Decoration', 'masonry-blog' ),
			'section' => 'masonry_blog_section_global_links',
			'type' => 'light',
		) 
	) 
);

$wp_customize->add_setting( 
	'masonry_blog_enable_link_outline', 
	array(
		'sanitize_callback' => 'wp_validate_boolean',
		'default' => $masonry_blog_defaults['masonry_blog_enable_link_outline' ],
	) 
);

$wp_customize->add_control( 
	new Masonry_Blog_Customizer_Toggle_Control( $wp_customize,
		'masonry_blog_enable_link_outline', 
		array(
			'label' => esc_html__( 'Enable Link Outline', 'masonry-blog' ),
			'section' => 'masonry_blog_section_global_links',
			'type' => 'light',
		) 
	) 
);