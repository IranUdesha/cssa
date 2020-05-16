<?php

$masonry_blog_defaults = masonry_blog_get_default_theme_options();

$wp_customize->add_setting( 
	'masonry_blog_body_txt_color', 
	array(
		'sanitize_callback'		=> 'sanitize_hex_color',
		'default'				=> $masonry_blog_defaults['masonry_blog_body_txt_color'],
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Color_Control( 
		$wp_customize, 
		'masonry_blog_body_txt_color', 
		array(
			'label' => esc_html__( 'Text Color', 'masonry-blog' ),
			'section' => 'background_image',
			'priority'	=> 5,
		) 
	) 
);