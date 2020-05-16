<?php

$masonry_blog_defaults = masonry_blog_get_default_theme_options();

$wp_customize->add_section( 
	'masonry_blog_pagination_section', 
	array(
		'priority'		=> 10,
		'title'			=> esc_html__( 'Pagination', 'masonry-blog' ),
		'panel'			=> 'masonry_blog_pages_panel'
	) 
);

$wp_customize->add_setting( 'masonry_blog_pagination',
	array(
		'sanitize_callback' => 'masonry_blog_sanitize_select',
		'default' => $masonry_blog_defaults['masonry_blog_pagination'],
	) 
);

$wp_customize->add_control( 'masonry_blog_pagination',
	array(
		'label' => esc_html__( 'Pagination Type', 'masonry-blog' ),
		'section' => 'masonry_blog_pagination_section',
		'type'	=> 'select',
		'choices' => masonry_blog_pagination_choices(),
	) 
);