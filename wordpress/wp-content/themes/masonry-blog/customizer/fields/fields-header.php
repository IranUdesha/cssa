<?php

$masonry_blog_defaults = masonry_blog_get_default_theme_options();

$wp_customize->add_panel( 
	'masonry_blog_site_header_panel', 
	array(
		'title'			=> esc_html__( 'Site Header', 'masonry-blog' ),
		'priority'		=> 10,
	) 
);

$wp_customize->add_section( 
	'masonry_blog_favicon_section', 
	array(
		'priority'		=> 10,
		'title'			=> esc_html__( 'Site Icon', 'masonry-blog' ),
		'panel'			=> 'masonry_blog_site_header_panel',
	) 
);

$wp_customize->add_section( 
	'masonry_blog_top_header_section', 
	array(
		'priority'		=> 10,
		'title'			=> esc_html__( 'Top Header', 'masonry-blog' ),
		'panel'			=> 'masonry_blog_site_header_panel'
	) 
);

$wp_customize->add_section( 
	'masonry_blog_site_identity_section', 
	array(
		'priority'		=> 10,
		'title'			=> esc_html__( 'Logo Section', 'masonry-blog' ),
		'panel'			=> 'masonry_blog_site_header_panel'
	) 
);

$wp_customize->get_control( 'header_textcolor' )->label = esc_html__( 'Site Title Color', 'masonry-blog' );
$wp_customize->get_control( 'header_textcolor' )->section = 'title_tagline';
$wp_customize->get_control( 'background_color' )->section = 'background_image';
$wp_customize->get_section( 'background_image' )->title = esc_html__( 'Site Background', 'masonry-blog' );

$wp_customize->get_control( 'custom_logo' )->section = 'masonry_blog_site_identity_section';
$wp_customize->get_control( 'custom_logo' )->priority = 15;
$wp_customize->get_control( 'blogname' )->section = 'masonry_blog_site_identity_section';
$wp_customize->get_control( 'blogname' )->priority = 20;
$wp_customize->get_control( 'blogdescription' )->section = 'masonry_blog_site_identity_section';
$wp_customize->get_control( 'blogdescription' )->priority = 20;
$wp_customize->get_control( 'header_textcolor' )->section = 'masonry_blog_site_identity_section';
$wp_customize->get_control( 'header_textcolor' )->priority = 20;
$wp_customize->get_setting( 'header_textcolor' )->default = '#263238';
$wp_customize->get_control( 'display_header_text' )->section = 'masonry_blog_site_identity_section';
$wp_customize->get_control( 'display_header_text' )->priority = 20;
$wp_customize->get_control( 'site_icon' )->section = 'masonry_blog_favicon_section';


$wp_customize->add_setting( 
	'masonry_blog_display_top_header', 
	array(
		'sanitize_callback' => 'wp_validate_boolean',
		'default' => $masonry_blog_defaults['masonry_blog_display_top_header' ],
	) 
);

$wp_customize->add_control( 
	new Masonry_Blog_Customizer_Toggle_Control( $wp_customize,
		'masonry_blog_display_top_header', 
		array(
			'label' => esc_html__( 'Display Top Header', 'masonry-blog' ),
			'section' => 'masonry_blog_top_header_section',
			'type' => 'light',
		) 
	) 
);

// Top Header Menu

$wp_customize->add_setting(
	'masonry_blog_top_header_menu_separator',
	array(
		'sanitize_callback' => 'esc_html',
		'default' => '',
	)
);

$wp_customize->add_control(
	new Masonry_Blog_Separator_Control(
		$wp_customize,
		'masonry_blog_top_header_menu_separator',
		array(
			'section' => 'masonry_blog_top_header_section',
			'priority' => 15,
			'active_callback' => 'masonry_blog_is_active_top_header',
		)
	)
);

$wp_customize->add_setting( 
	'masonry_blog_enable_top_header_menu', 
	array(
		'sanitize_callback' => 'wp_validate_boolean',
		'default' => $masonry_blog_defaults['masonry_blog_enable_top_header_menu' ],
	) 
);

$wp_customize->add_control( 
	new Masonry_Blog_Customizer_Toggle_Control( $wp_customize,
		'masonry_blog_enable_top_header_menu', 
		array(
			'label' => esc_html__( 'Display Header Menu', 'masonry-blog' ),
			'section' => 'masonry_blog_top_header_section',
			'type' => 'light',
			'priority' => 15,
			'active_callback' => 'masonry_blog_is_active_top_header',
		) 
	) 
);

$wp_customize->add_setting( 'masonry_blog_top_header_menu_alignment',
	array(
		'sanitize_callback' => 'masonry_blog_sanitize_select',
		'default' => $masonry_blog_defaults['masonry_blog_top_header_menu_alignment'],
	) 
);

$wp_customize->add_control( 'masonry_blog_top_header_menu_alignment',
	array(
		'label' => esc_html__( 'Header Menu&rsquo;s Alignment', 'masonry-blog' ),
		'section' => 'masonry_blog_top_header_section',
		'type'	=> 'select',
		'choices' => masonry_blog_alignment_choices(),
		'priority' => 15,
		'active_callback' => 'masonry_blog_is_active_top_header_menu',
	) 
);

// Social Menu

$wp_customize->add_setting(
	'masonry_blog_social_menu_separator',
	array(
		'sanitize_callback' => 'esc_html',
		'default' => '',
	)
);

$wp_customize->add_control(
	new Masonry_Blog_Separator_Control(
		$wp_customize,
		'masonry_blog_social_menu_separator',
		array(
			'section' => 'masonry_blog_top_header_section',
			'priority' => 15,
			'active_callback' => 'masonry_blog_is_active_top_header',
		)
	)
);

$wp_customize->add_setting( 
	'masonry_blog_enable_social_menu', 
	array(
		'sanitize_callback' => 'wp_validate_boolean',
		'default' => $masonry_blog_defaults['masonry_blog_enable_social_menu' ],
	) 
);

$wp_customize->add_control( 
	new Masonry_Blog_Customizer_Toggle_Control( $wp_customize,
		'masonry_blog_enable_social_menu', 
		array(
			'label' => esc_html__( 'Display Social Links', 'masonry-blog' ),
			'section' => 'masonry_blog_top_header_section',
			'type' => 'light',
			'priority' => 15,
			'active_callback' => 'masonry_blog_is_active_top_header',
		) 
	) 
);

$wp_customize->add_setting( 
	'masonry_blog_display_social_links_title', 
	array(
		'sanitize_callback' => 'wp_validate_boolean',
		'default' => $masonry_blog_defaults['masonry_blog_display_social_links_title' ],
	) 
);

$wp_customize->add_control( 
	new Masonry_Blog_Customizer_Toggle_Control( $wp_customize,
		'masonry_blog_display_social_links_title', 
		array(
			'label' => esc_html__( 'Display Social Link&rsquo;s Title', 'masonry-blog' ),
			'section' => 'masonry_blog_top_header_section',
			'type' => 'light',
			'priority' => 15,
			'active_callback' => 'masonry_blog_is_active_social_menu',
		) 
	) 
);

$wp_customize->add_setting( 'masonry_blog_social_menu_alignment',
	array(
		'sanitize_callback' => 'masonry_blog_sanitize_select',
		'default' => $masonry_blog_defaults['masonry_blog_social_menu_alignment'],
	) 
);

$wp_customize->add_control( 'masonry_blog_social_menu_alignment',
	array(
		'label' => esc_html__( 'Social Link&rsquo;s Alignment', 'masonry-blog' ),
		'section' => 'masonry_blog_top_header_section',
		'type'	=> 'select',
		'choices' => masonry_blog_alignment_choices(),
		'priority' => 15,
		'active_callback' => 'masonry_blog_is_active_social_menu',
	) 
);


// Logo Section Options

$wp_customize->add_setting( 'masonry_blog_logo_section_layout',
	array(
		'sanitize_callback' => 'masonry_blog_sanitize_select',
		'default' => $masonry_blog_defaults['masonry_blog_logo_section_layout'],
	) 
);

$wp_customize->add_control( 'masonry_blog_logo_section_layout',
	array(
		'label' => esc_html__( 'Section Layout', 'masonry-blog' ),
		'section' => 'masonry_blog_site_identity_section',
		'type'	=> 'select',
		'choices' => masonry_blog_logo_section_choices(),
		'priority' => 1,
	) 
);

$wp_customize->add_setting( 'masonry_blog_logo_width', 
	array(
		'sanitize_callback' => 'masonry_blog_sanitize_number',
		'default' => $masonry_blog_defaults['masonry_blog_logo_width'],
	)
);

$wp_customize->add_control( 
	'masonry_blog_logo_width',
	array(
		'label' => esc_html__( 'Logo Width', 'masonry-blog' ),
		'section' => 'masonry_blog_site_identity_section',
		'type'	=> 'number',
		'priority' => 15,
	)
);

$wp_customize->add_setting( 'masonry_blog_tagline_color', 
	array(
		'sanitize_callback' => 'sanitize_hex_color',
		'default' => $masonry_blog_defaults['masonry_blog_tagline_color'],
	)
);

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
	'masonry_blog_tagline_color',
	array(
		'label' => esc_html__( 'Tagline Color', 'masonry-blog' ),
		'section' => 'masonry_blog_site_identity_section',
		'priority' => 20,
	)
) );

// Site Title Font Family

$wp_customize->add_setting( 'masonry_blog_site_title_font_family',
	array(
		'sanitize_callback'		=> 'sanitize_text_field',
		'default'				=> $masonry_blog_defaults['masonry_blog_site_title_font_family'],
	)
);


$wp_customize->add_control( 
	new Masonry_Blog_Select_Control( 
		$wp_customize, 'masonry_blog_site_title_font_family', 
		array(
			'label' => esc_html__( 'Site Title&rsquo;s Font Family', 'masonry-blog' ),
			'choices' => masonry_blog_font_family_choices(),
			'section' => 'masonry_blog_site_identity_section',
		) 
	) 
);


$wp_customize->add_section( 
	'masonry_blog_menu_section', 
	array(
		'priority'		=> 10,
		'title'			=> esc_html__( 'Menu Section', 'masonry-blog' ),
		'panel'			=> 'masonry_blog_site_header_panel'
	) 
);


$wp_customize->add_setting( 
	'masonry_blog_enable_sticky_menu', 
	array(
		'sanitize_callback' => 'wp_validate_boolean',
		'default' => $masonry_blog_defaults['masonry_blog_enable_sticky_menu' ],
	) 
);

$wp_customize->add_control( 
	new Masonry_Blog_Customizer_Toggle_Control( $wp_customize,
		'masonry_blog_enable_sticky_menu', 
		array(
			'label' => esc_html__( 'Set Menu Section Sticky', 'masonry-blog' ),
			'section' => 'masonry_blog_menu_section',
			'type' => 'light',
		) 
	) 
);

$wp_customize->add_setting( 
	'masonry_blog_display_off_canvas_sidebar_icon', 
	array(
		'sanitize_callback' => 'wp_validate_boolean',
		'default' => $masonry_blog_defaults['masonry_blog_display_off_canvas_sidebar_icon' ],
	) 
);

$wp_customize->add_control( 
	new Masonry_Blog_Customizer_Toggle_Control( $wp_customize,
		'masonry_blog_display_off_canvas_sidebar_icon', 
		array(
			'label' => esc_html__( 'Display Off-Canvas Sidebar Toggle Icon', 'masonry-blog' ),
			'section' => 'masonry_blog_menu_section',
			'type' => 'light',
		) 
	) 
);

$wp_customize->add_setting( 
	'masonry_blog_display_search_icon', 
	array(
		'sanitize_callback' => 'wp_validate_boolean',
		'default' => $masonry_blog_defaults['masonry_blog_display_search_icon' ],
	) 
);

$wp_customize->add_control( 
	new Masonry_Blog_Customizer_Toggle_Control( $wp_customize,
		'masonry_blog_display_search_icon', 
		array(
			'label' => esc_html__( 'Display Search Icon', 'masonry-blog' ),
			'section' => 'masonry_blog_menu_section',
			'type' => 'light',
		) 
	) 
);

$wp_customize->add_setting(
	'masonry_blog_primary_menu_alignment_separator',
	array(
		'sanitize_callback' => 'esc_html',
		'default' => '',
	)
);

$wp_customize->add_control(
	new Masonry_Blog_Separator_Control(
		$wp_customize,
		'masonry_blog_primary_menu_alignment_separator',
		array(
			'section' => 'masonry_blog_menu_section',
			'priority' => 10,
		)
	)
);

$wp_customize->add_setting( 'masonry_blog_menu_alignment',
	array(
		'sanitize_callback' => 'masonry_blog_sanitize_select',
		'default' => $masonry_blog_defaults['masonry_blog_menu_alignment'],
	) 
);

$wp_customize->add_control( 'masonry_blog_menu_alignment',
	array(
		'label' => esc_html__( 'Menu Alignment', 'masonry-blog' ),
		'section' => 'masonry_blog_menu_section',
		'type'	=> 'select',
		'choices' => masonry_blog_alignment_choices(),
	) 
);


$wp_customize->add_section( 'masonry_blog_header_background_section', 
	array(
		'priority'		=> 10,
		'title'			=> esc_html__( 'Header Background', 'masonry-blog' ),
		'panel'			=> 'masonry_blog_site_header_panel'
	) 
);

$wp_customize->get_control( 'header_image' )->section = 'masonry_blog_header_background_section';