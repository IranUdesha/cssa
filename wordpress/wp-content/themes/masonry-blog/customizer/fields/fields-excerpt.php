<?php

$masonry_blog_defaults = masonry_blog_get_default_theme_options();

$wp_customize->add_section( 
	'masonry_blog_excerpt_section', 
	array(
		'priority'		=> 10,
		'title'			=> esc_html__( 'Post Excerpt', 'masonry-blog' )
	) 
);

$wp_customize->add_setting( 
	'masonry_blog_excerpt_length', 
	array(
		'sanitize_callback' => 'masonry_blog_sanitize_number',
		'default' => $masonry_blog_defaults['masonry_blog_excerpt_length' ],
	) 
);

$wp_customize->add_control( 
	'masonry_blog_excerpt_length', 
	array(
		'label' => esc_html__( 'Excerpt Length', 'masonry-blog' ),
		'section' => 'masonry_blog_excerpt_section',
		'type' => 'number',
	) 
);