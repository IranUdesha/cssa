<?php

$masonry_blog_defaults = masonry_blog_get_default_theme_options();

$wp_customize->add_section( 
	'masonry_blog_site_banner_section', 
	array(
		'priority'		=> 10,
		'title'			=> esc_html__( 'Site Carousel', 'masonry-blog' )
	) 
);

$wp_customize->add_setting( 
	'masonry_blog_display_banner', 
	array(
		'sanitize_callback' => 'wp_validate_boolean',
		'default' => $masonry_blog_defaults['masonry_blog_display_banner' ],
	) 
);

$wp_customize->add_control( 
	new Masonry_Blog_Customizer_Toggle_Control( $wp_customize,
		'masonry_blog_display_banner', 
		array(
			'label' => esc_html__( 'Display Carousel', 'masonry-blog' ),
			'section' => 'masonry_blog_site_banner_section',
			'type' => 'light',
		) 
	) 
);

$wp_customize->add_setting(
	'masonry_blog_banner_display_separator',
	array(
		'sanitize_callback' => 'esc_html',
		'default' => '',
	)
);

$wp_customize->add_control(
	new Masonry_Blog_Separator_Control(
		$wp_customize,
		'masonry_blog_banner_display_separator',
		array(
			'section' => 'masonry_blog_site_banner_section',
			'active_callback' => 'masonry_blog_is_active_banner',
		)
	)
);

$wp_customize->add_setting( 'masonry_blog_display_banner_on',
	array(
		'sanitize_callback' => 'masonry_blog_sanitize_select',
		'default' => $masonry_blog_defaults['masonry_blog_display_banner_on'],
	) 
);

$wp_customize->add_control( 'masonry_blog_display_banner_on',
	array(
		'label' => esc_html__( 'Select Page To Display Carousel', 'masonry-blog' ),
		'description' => esc_html__( 'Set a static front page before selecting options other than &ldquo;Blog Page Only&ldquo;. Set a static front page via &ldquo;Homepage Settings&ldquo;.', 'masonry-blog' ),
		'section' => 'masonry_blog_site_banner_section',
		'type'	=> 'select',
		'choices' => masonry_blog_banner_display_choices(),
		'active_callback' => 'masonry_blog_is_active_banner',
	) 
);

$wp_customize->add_setting(
	'masonry_blog_banner_layout_separator',
	array(
		'sanitize_callback' => 'esc_html',
		'default' => '',
	)
);

$wp_customize->add_control(
	new Masonry_Blog_Separator_Control(
		$wp_customize,
		'masonry_blog_banner_layout_separator',
		array(
			'section' => 'masonry_blog_site_banner_section',
			'active_callback' => 'masonry_blog_is_active_banner',
		)
	)
);

$wp_customize->add_setting( 'masonry_blog_banner_width',
	array(
		'sanitize_callback' => 'masonry_blog_sanitize_select',
		'default' => $masonry_blog_defaults['masonry_blog_banner_width'],
	) 
);

$wp_customize->add_control( 'masonry_blog_banner_width',
	array(
		'label' => esc_html__( 'Carousel Width', 'masonry-blog' ),
		'section' => 'masonry_blog_site_banner_section',
		'type'	=> 'select',
		'choices' => masonry_blog_container_width_choices(),
		'active_callback' => 'masonry_blog_is_active_banner',
	) 
);

$wp_customize->add_setting(
	'masonry_blog_banner_content_separator',
	array(
		'sanitize_callback' => 'esc_html',
		'default' => '',
	)
);

$wp_customize->add_control(
	new Masonry_Blog_Separator_Control(
		$wp_customize,
		'masonry_blog_banner_content_separator',
		array(
			'section' => 'masonry_blog_site_banner_section',
			'active_callback' => 'masonry_blog_is_active_banner',
			'priority' => 15,
		)
	)
);

$wp_customize->add_setting( 
	'masonry_blog_banner_category', 
	array(
		'sanitize_callback' => 'masonry_blog_sanitize_select',
		'default' => $masonry_blog_defaults['masonry_blog_banner_category' ],
	) 
);

$wp_customize->add_control( 
	'masonry_blog_banner_category', 
	array(
		'label' => esc_html__( 'Post Category For Carousel ', 'masonry-blog' ),
		'section' => 'masonry_blog_site_banner_section',
		'type' => 'select',
		'choices' => masonry_blog_post_category_choices(),
		'active_callback' => 'masonry_blog_is_active_banner',
		'priority' => 15,
	) 
);


$wp_customize->add_setting( 
	'masonry_blog_banner_item_no', 
	array(
		'sanitize_callback' => 'masonry_blog_sanitize_number',
		'default' => $masonry_blog_defaults['masonry_blog_banner_item_no' ],
	) 
);

$wp_customize->add_control( 
	'masonry_blog_banner_item_no', 
	array(
		'label' => esc_html__( 'Number of Posts For Carousel', 'masonry-blog' ),
		'section' => 'masonry_blog_site_banner_section',
		'type' => 'number',
		'active_callback' => 'masonry_blog_is_active_banner',
		'priority' => 15,
	) 
);

$wp_customize->add_setting( 
	'masonry_blog_banner_hide_content', 
	array(
		'sanitize_callback' => 'wp_validate_boolean',
		'default' => $masonry_blog_defaults['masonry_blog_banner_hide_content' ],
	) 
);

$wp_customize->add_control( 
	new Masonry_Blog_Customizer_Toggle_Control( $wp_customize,
		'masonry_blog_banner_hide_content', 
		array(
			'label' => esc_html__( 'Display Post Contents', 'masonry-blog' ),
			'section' => 'masonry_blog_site_banner_section',
			'type' => 'light',
			'active_callback' => 'masonry_blog_is_active_banner',
			'priority' => 15,
		) 
	) 
);

$wp_customize->add_setting( 
	'masonry_blog_display_img_overlay', 
	array(
		'sanitize_callback' => 'wp_validate_boolean',
		'default' => $masonry_blog_defaults['masonry_blog_display_img_overlay' ],
	) 
);

$wp_customize->add_control( 
	new Masonry_Blog_Customizer_Toggle_Control( $wp_customize,
		'masonry_blog_display_img_overlay', 
		array(
			'label' => esc_html__( 'Display Image Overlay', 'masonry-blog' ),
			'section' => 'masonry_blog_site_banner_section',
			'type' => 'light',
			'active_callback' => 'masonry_blog_is_active_banner',
			'priority' => 15,
		) 
	) 
);