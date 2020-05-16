<?php

$masonry_blog_defaults = masonry_blog_get_default_theme_options();

$wp_customize->add_panel(
	'masonry_blog_panel_typography',
	array(
		'title' => esc_html__( 'Global Typography', 'masonry-blog' ),
		'prioriy' => 10,
	)
);


// Body Typography

$wp_customize->add_section( 
	'masonry_blog_section_body_typo', 
	array(
		'priority'		=> 20,
		'title'			=> esc_html__( 'Body', 'masonry-blog' ),
		'panel'			=> 'masonry_blog_panel_typography'
	) 
);

$wp_customize->add_setting( 'masonry_blog_body_font_family',
	array(
		'sanitize_callback'		=> 'sanitize_text_field',
		'default'				=> $masonry_blog_defaults['masonry_blog_body_font_family'],
	)
);


$wp_customize->add_control( 
	new Masonry_Blog_Select_Control( 
		$wp_customize, 'masonry_blog_body_font_family', 
		array(
			'label' => esc_html__( 'Font Family', 'masonry-blog' ),
			'choices' => masonry_blog_font_family_choices(),
			'section' => 'masonry_blog_section_body_typo',
		) 
	) 
);


// Headings Typography

$wp_customize->add_section( 
	'masonry_blog_section_headings_typo', 
	array(
		'priority'		=> 20,
		'title'			=> esc_html__( 'Headings', 'masonry-blog' ),
		'panel'			=> 'masonry_blog_panel_typography'
	) 
);

$wp_customize->add_setting( 'masonry_blog_headings_font_family',
	array(
		'sanitize_callback'		=> 'sanitize_text_field',
		'default'				=> $masonry_blog_defaults['masonry_blog_headings_font_family'],
	)
);


$wp_customize->add_control( 
	new Masonry_Blog_Select_Control( 
		$wp_customize, 'masonry_blog_headings_font_family', 
		array(
			'label' => esc_html__( 'Font Family', 'masonry-blog' ),
			'choices' => masonry_blog_font_family_choices(),
			'section' => 'masonry_blog_section_headings_typo',
		) 
	) 
);