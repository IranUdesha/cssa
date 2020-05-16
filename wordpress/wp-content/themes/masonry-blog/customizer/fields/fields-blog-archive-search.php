<?php

$masonry_blog_defaults = masonry_blog_get_default_theme_options();

$wp_customize->add_section( 
	'masonry_blog_blog_archive_search_common_section', 
	array(
		'priority'		=> 10,
		'title'			=> esc_html__( 'Blog/Archive/Search', 'masonry-blog' ),
		'description'	=> __( 'This section contains options that are common to Blog, Archive and Search pages.', 'masonry-blog' ),
		'panel'			=> 'masonry_blog_pages_panel'
	) 
);

$wp_customize->add_setting( 'masonry_blog_blog_archive_search_content_alignment',
	array(
		'sanitize_callback' => 'masonry_blog_sanitize_select',
		'default' => $masonry_blog_defaults['masonry_blog_blog_archive_search_content_alignment'],
	) 
);

$wp_customize->add_control( 'masonry_blog_blog_archive_search_content_alignment',
	array(
		'label' => esc_html__( 'Content Alignment', 'masonry-blog' ),
		'section' => 'masonry_blog_blog_archive_search_common_section',
		'type'	=> 'select',
		'choices' => masonry_blog_alignment_choices(),
	) 
);