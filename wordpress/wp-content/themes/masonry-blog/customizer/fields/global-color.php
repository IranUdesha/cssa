<?php

$masonry_blog_defaults = masonry_blog_get_default_theme_options();

$wp_customize->add_panel(
	'masonry_blog_panel_global_color',
	array(
		'title' => esc_html__( 'Global Colors', 'masonry-blog' ),
		'prioriy' => 10,
	)
);

$wp_customize->add_section( 
	'masonry_blog_section_theme_colors', 
	array(
		'priority'		=> 20,
		'title'			=> esc_html__( 'Theme Colors', 'masonry-blog' ),
		'panel'			=> 'masonry_blog_panel_global_color'
	) 
);

$wp_customize->add_setting( 
	'masonry_blog_primary_color', 
	array(
		'sanitize_callback'		=> 'sanitize_hex_color',
		'default'				=> $masonry_blog_defaults['masonry_blog_primary_color'],
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Color_Control( 
		$wp_customize, 
		'masonry_blog_primary_color', 
		array(
			'label' => esc_html__( 'Theme Color', 'masonry-blog' ),
			'section' => 'masonry_blog_section_theme_colors',
		) 
	) 
);

$wp_customize->add_setting( 
	'masonry_blog_secondary_color', 
	array(
		'sanitize_callback'		=> 'sanitize_hex_color',
		'default'				=> $masonry_blog_defaults['masonry_blog_secondary_color'],
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Color_Control( 
		$wp_customize, 
		'masonry_blog_secondary_color', 
		array(
			'label' => esc_html__( 'Alternate Color', 'masonry-blog' ),
			'section' => 'masonry_blog_section_theme_colors',
		) 
	) 
);