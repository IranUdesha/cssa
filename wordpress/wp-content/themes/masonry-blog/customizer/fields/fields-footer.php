<?php

$masonry_blog_defaults = masonry_blog_get_default_theme_options();

$wp_customize->add_section( 
	'masonry_blog_site_footer_section', 
	array(
		'priority'		=> 10,
		'title'			=> esc_html__( 'Site Footer', 'masonry-blog' )
	) 
);

$wp_customize->add_setting( 
	'masonry_blog_display_footer_widget_area', 
	array(
		'sanitize_callback' => 'wp_validate_boolean',
		'default' => $masonry_blog_defaults['masonry_blog_display_footer_widget_area' ],
	) 
);

$wp_customize->add_control( 
	new Masonry_Blog_Customizer_Toggle_Control( $wp_customize,
		'masonry_blog_display_footer_widget_area', 
		array(
			'label' => esc_html__( 'Display Footer Widgets', 'masonry-blog' ),
			'section' => 'masonry_blog_site_footer_section',
			'type' => 'light',
		) 
	) 
);

$wp_customize->add_setting( 
	'masonry_blog_display_scroll_top', 
	array(
		'sanitize_callback' => 'wp_validate_boolean',
		'default' => $masonry_blog_defaults['masonry_blog_display_scroll_top' ],
	) 
);

$wp_customize->add_control( 
	new Masonry_Blog_Customizer_Toggle_Control( $wp_customize,
		'masonry_blog_display_scroll_top', 
		array(
			'label' => esc_html__( 'Enable Scroll To Top', 'masonry-blog' ),
			'section' => 'masonry_blog_site_footer_section',
			'type' => 'light',
		) 
	) 
);

$wp_customize->add_setting( 
	'masonry_blog_copyright_text', 
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default' => $masonry_blog_defaults['masonry_blog_copyright_text' ],
	) 
);

$wp_customize->add_control( 
	'masonry_blog_copyright_text', 
	array(
		'label' => esc_html__( 'Copyright Text', 'masonry-blog' ),
		'section' => 'masonry_blog_site_footer_section',
		'type' => 'text',
	) 
);