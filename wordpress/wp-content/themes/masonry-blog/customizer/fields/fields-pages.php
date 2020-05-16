<?php

$masonry_blog_defaults = masonry_blog_get_default_theme_options();

$wp_customize->add_panel( 
	'masonry_blog_pages_panel', 
	array(
		'title'			=> esc_html__( 'Site Pages', 'masonry-blog' ),
		'priority'		=> 10,
	) 
);	

require get_template_directory() . '/customizer/fields/fields-static-front-page.php';
require get_template_directory() . '/customizer/fields/fields-blog.php';
require get_template_directory() . '/customizer/fields/fields-archive.php';
require get_template_directory() . '/customizer/fields/fields-search.php';
require get_template_directory() . '/customizer/fields/fields-post.php';
require get_template_directory() . '/customizer/fields/fields-page.php';