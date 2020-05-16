<?php

$masonry_blog_defaults = masonry_blog_get_default_theme_options();

$wp_customize->add_section( 
	'masonry_blog_post_single_section', 
	array(
		'priority'		=> 10,
		'title'			=> esc_html__( 'Post Single', 'masonry-blog' ),
		'panel'			=> 'masonry_blog_pages_panel'
	) 
);

$wp_customize->add_setting(
	'masonry_blog_post_content_info',
	array(
		'sanitize_callback' => 'esc_html',
		'default' => '',
	)
);

$wp_customize->add_control(
	new Masonry_Blog_Info_Control(
		$wp_customize,
		'masonry_blog_post_content_info',
		array(
			'label' => esc_html__( 'Post Content', 'masonry-blog' ),
			'section' => 'masonry_blog_post_single_section',
			'priority' => 10,
		)
	)
);

$wp_customize->add_setting( 
	'masonry_blog_display_post_feat_img', 
	array(
		'sanitize_callback' => 'wp_validate_boolean',
		'default' => $masonry_blog_defaults['masonry_blog_display_post_feat_img' ],
	) 
);

$wp_customize->add_control( 
	new Masonry_Blog_Customizer_Toggle_Control( $wp_customize,
		'masonry_blog_display_post_feat_img', 
		array(
			'label' => esc_html__( 'Display Featured Image', 'masonry-blog' ),
			'section' => 'masonry_blog_post_single_section',
			'type' => 'light',
		) 
	) 
);

$wp_customize->add_setting( 
	'masonry_blog_display_post_cats', 
	array(
		'sanitize_callback' => 'wp_validate_boolean',
		'default' => $masonry_blog_defaults['masonry_blog_display_post_cats' ],
	) 
);

$wp_customize->add_control( 
	new Masonry_Blog_Customizer_Toggle_Control( $wp_customize,
		'masonry_blog_display_post_cats', 
		array(
			'label' => esc_html__( 'Display Post Categories', 'masonry-blog' ),
			'section' => 'masonry_blog_post_single_section',
			'type' => 'light',
		) 
	) 
);

$wp_customize->add_setting( 
	'masonry_blog_display_post_date', 
	array(
		'sanitize_callback' => 'wp_validate_boolean',
		'default' => $masonry_blog_defaults['masonry_blog_display_post_date' ],
	) 
);

$wp_customize->add_control( 
	new Masonry_Blog_Customizer_Toggle_Control( $wp_customize,
		'masonry_blog_display_post_date', 
		array(
			'label' => esc_html__( 'Display Post Date', 'masonry-blog' ),
			'section' => 'masonry_blog_post_single_section',
			'type' => 'light',
		) 
	) 
);

$wp_customize->add_setting( 
	'masonry_blog_display_post_author', 
	array(
		'sanitize_callback' => 'wp_validate_boolean',
		'default' => $masonry_blog_defaults['masonry_blog_display_post_author' ],
	) 
);

$wp_customize->add_control( 
	new Masonry_Blog_Customizer_Toggle_Control( $wp_customize,
		'masonry_blog_display_post_author', 
		array(
			'label' => esc_html__( 'Display Post Author', 'masonry-blog' ),
			'section' => 'masonry_blog_post_single_section',
			'type' => 'light',
		) 
	) 
);

$wp_customize->add_setting( 
	'masonry_blog_display_post_tags', 
	array(
		'sanitize_callback' => 'wp_validate_boolean',
		'default' => $masonry_blog_defaults['masonry_blog_display_post_tags' ],
	) 
);

$wp_customize->add_control( 
	new Masonry_Blog_Customizer_Toggle_Control( $wp_customize,
		'masonry_blog_display_post_tags', 
		array(
			'label' => esc_html__( 'Display Post Tags', 'masonry-blog' ),
			'section' => 'masonry_blog_post_single_section',
			'type' => 'light',
		) 
	) 
);


// Author Section

$wp_customize->add_setting(
	'masonry_blog_author_section_separator',
	array(
		'sanitize_callback' => 'esc_html',
		'default' => '',
	)
);

$wp_customize->add_control(
	new Masonry_Blog_Separator_Control(
		$wp_customize,
		'masonry_blog_author_section_separator',
		array(
			'section' => 'masonry_blog_post_single_section',
			'priority' => 15,
		)
	)
);


$wp_customize->add_setting(
	'masonry_blog_author_section_info',
	array(
		'sanitize_callback' => 'esc_html',
		'default' => '',
	)
);

$wp_customize->add_control(
	new Masonry_Blog_Info_Control(
		$wp_customize,
		'masonry_blog_author_section_info',
		array(
			'label' => esc_html__( 'Author Section', 'masonry-blog' ),
			'section' => 'masonry_blog_post_single_section',
			'priority' => 15,
		)
	)
);

$wp_customize->add_setting( 
	'masonry_blog_display_author_section', 
	array(
		'sanitize_callback' => 'wp_validate_boolean',
		'default' => $masonry_blog_defaults['masonry_blog_display_author_section' ],
	) 
);

$wp_customize->add_control( 
	new Masonry_Blog_Customizer_Toggle_Control( $wp_customize,
		'masonry_blog_display_author_section', 
		array(
			'label' => esc_html__( 'Display Section', 'masonry-blog' ),
			'section' => 'masonry_blog_post_single_section',
			'type' => 'light',
			'priority' => 15
		) 
	) 
);

$wp_customize->add_setting( 
	'masonry_blog_author_section_title', 
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default' => $masonry_blog_defaults['masonry_blog_author_section_title' ],
	) 
);

$wp_customize->add_control( 
	'masonry_blog_author_section_title', 
	array(
		'label' => esc_html__( 'Section Title', 'masonry-blog' ),
		'section' => 'masonry_blog_post_single_section',
		'type' => 'text',
		'active_callback' => 'masonry_blog_active_author_section',
		'priority' => 15
	) 
);


// Related Post

$wp_customize->add_setting(
	'masonry_blog_related_posts_section_separator',
	array(
		'sanitize_callback' => 'esc_html',
		'default' => '',
	)
);

$wp_customize->add_control(
	new Masonry_Blog_Separator_Control(
		$wp_customize,
		'masonry_blog_related_posts_section_separator',
		array(
			'section' => 'masonry_blog_post_single_section',
			'priority' => 20,
		)
	)
);


$wp_customize->add_setting(
	'masonry_blog_related_posts_section_info',
	array(
		'sanitize_callback' => 'esc_html',
		'default' => '',
	)
);

$wp_customize->add_control(
	new Masonry_Blog_Info_Control(
		$wp_customize,
		'masonry_blog_related_posts_section_info',
		array(
			'label' => esc_html__( 'Related Posts Section', 'masonry-blog' ),
			'section' => 'masonry_blog_post_single_section',
			'priority' => 20,
		)
	)
);

$wp_customize->add_setting( 
	'masonry_blog_display_related_section', 
	array(
		'sanitize_callback' => 'wp_validate_boolean',
		'default' => $masonry_blog_defaults['masonry_blog_display_related_section' ],
	) 
);

$wp_customize->add_control( 
	new Masonry_Blog_Customizer_Toggle_Control( $wp_customize,
		'masonry_blog_display_related_section', 
		array(
			'label' => esc_html__( 'Display Section', 'masonry-blog' ),
			'section' => 'masonry_blog_post_single_section',
			'type' => 'light',
			'priority' => 20,
		) 
	) 
);

$wp_customize->add_setting( 
	'masonry_blog_related_section_title', 
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default' => $masonry_blog_defaults['masonry_blog_related_section_title' ],
	) 
);

$wp_customize->add_control( 
	'masonry_blog_related_section_title', 
	array(
		'label' => esc_html__( 'Section Title', 'masonry-blog' ),
		'section' => 'masonry_blog_post_single_section',
		'type' => 'text',
		'active_callback' => 'masonry_blog_active_related_section',
		'priority' => 20,
	) 
);

$wp_customize->add_setting( 
	'masonry_blog_related_posts_no', 
	array(
		'sanitize_callback' => 'masonry_blog_sanitize_number',
		'default' => $masonry_blog_defaults['masonry_blog_related_posts_no' ],
	) 
);

$wp_customize->add_control( 
	'masonry_blog_related_posts_no', 
	array(
		'label' => esc_html__( 'Number of Related Posts', 'masonry-blog' ),
		'section' => 'masonry_blog_post_single_section',
		'type' => 'number',
		'active_callback' => 'masonry_blog_active_related_section',
		'priority' => 20,
	) 
);

$wp_customize->add_setting( 
	'masonry_blog_display_related_feat_img', 
	array(
		'sanitize_callback' => 'wp_validate_boolean',
		'default' => $masonry_blog_defaults['masonry_blog_display_related_feat_img' ],
	) 
);

$wp_customize->add_control( 
	new Masonry_Blog_Customizer_Toggle_Control( $wp_customize,
		'masonry_blog_display_related_feat_img', 
		array(
			'label' => esc_html__( 'Display Featured Image', 'masonry-blog' ),
			'section' => 'masonry_blog_post_single_section',
			'type' => 'light',
			'active_callback' => 'masonry_blog_active_related_section',
			'priority' => 20,
		) 
	) 
);

$wp_customize->add_setting( 
	'masonry_blog_display_related_cats_meta', 
	array(
		'sanitize_callback' => 'wp_validate_boolean',
		'default' => $masonry_blog_defaults['masonry_blog_display_related_cats_meta' ],
	) 
);

$wp_customize->add_control( 
	new Masonry_Blog_Customizer_Toggle_Control( $wp_customize,
		'masonry_blog_display_related_cats_meta', 
		array(
			'label' => esc_html__( 'Display Post Categories', 'masonry-blog' ),
			'section' => 'masonry_blog_post_single_section',
			'type' => 'light',
			'active_callback' => 'masonry_blog_active_related_section',
			'priority' => 20,
		) 
	) 
);

$wp_customize->add_setting( 
	'masonry_blog_display_related_date_meta', 
	array(
		'sanitize_callback' => 'wp_validate_boolean',
		'default' => $masonry_blog_defaults['masonry_blog_display_related_date_meta' ],
	) 
);

$wp_customize->add_control( 
	new Masonry_Blog_Customizer_Toggle_Control( $wp_customize,
		'masonry_blog_display_related_date_meta', 
		array(
			'label' => esc_html__( 'Display Post Date', 'masonry-blog' ),
			'section' => 'masonry_blog_post_single_section',
			'type' => 'light',
			'active_callback' => 'masonry_blog_active_related_section',
			'priority' => 20,
		) 
	) 
);

$wp_customize->add_setting( 
	'masonry_blog_display_related_author_meta', 
	array(
		'sanitize_callback' => 'wp_validate_boolean',
		'default' => $masonry_blog_defaults['masonry_blog_display_related_author_meta' ],
	) 
);

$wp_customize->add_control( 
	new Masonry_Blog_Customizer_Toggle_Control( $wp_customize,
		'masonry_blog_display_related_author_meta', 
		array(
			'label' => esc_html__( 'Display Post Author', 'masonry-blog' ),
			'section' => 'masonry_blog_post_single_section',
			'type' => 'light',
			'active_callback' => 'masonry_blog_active_related_section',
			'priority' => 20,
		) 
	) 
);

$wp_customize->add_setting( 'masonry_blog_related_posts_content_aligment',
	array(
		'sanitize_callback' => 'masonry_blog_sanitize_select',
		'default' => $masonry_blog_defaults['masonry_blog_related_posts_content_aligment'],
	) 
);

$wp_customize->add_control( 'masonry_blog_related_posts_content_aligment',
	array(
		'label' => esc_html__( 'Content Alignment', 'masonry-blog' ),
		'section' => 'masonry_blog_post_single_section',
		'type'	=> 'select',
		'choices' => masonry_blog_alignment_choices(),
		'active_callback' => 'masonry_blog_active_related_section',
		'priority' => 20,
	) 
);


// Post Single Sidebar

$wp_customize->add_setting(
	'masonry_blog_post_single_sidebar_position_separator',
	array(
		'sanitize_callback' => 'esc_html',
		'default' => '',
	)
);

$wp_customize->add_control(
	new Masonry_Blog_Separator_Control(
		$wp_customize,
		'masonry_blog_post_single_sidebar_position_separator',
		array(
			'section' => 'masonry_blog_post_single_section',
			'priority' => 25,
		)
	)
);


$wp_customize->add_setting(
	'masonry_blog_post_single_sidebar_position_info',
	array(
		'sanitize_callback' => 'esc_html',
		'default' => '',
	)
);

$wp_customize->add_control(
	new Masonry_Blog_Info_Control(
		$wp_customize,
		'masonry_blog_post_single_sidebar_position_info',
		array(
			'label' => esc_html__( 'Sidebar Position', 'masonry-blog' ),
			'section' => 'masonry_blog_post_single_section',
			'priority' => 25,
		)
	)
);

$wp_customize->add_setting( 
	'masonry_blog_enable_common_post_sidebar_position', 
	array(
		'sanitize_callback' => 'wp_validate_boolean',
		'default' => $masonry_blog_defaults['masonry_blog_enable_common_post_sidebar_position' ],
	) 
);

$wp_customize->add_control( 
	new Masonry_Blog_Customizer_Toggle_Control( $wp_customize,
		'masonry_blog_enable_common_post_sidebar_position', 
		array(
			'label' => esc_html__( 'Enable Common Sidebar Position', 'masonry-blog' ),
			'section' => 'masonry_blog_post_single_section',
			'type' => 'light',
			'active_callback' => 'masonry_blog_not_active_global_sidebar',
			'priority' => 25,
		) 
	) 
);

$wp_customize->add_setting( 'masonry_blog_common_post_sidebar_position', 
	array(
		'sanitize_callback'		=> 'masonry_blog_sanitize_select',
		'default'				=> $masonry_blog_defaults['masonry_blog_common_post_sidebar_position'],
	)
);

$wp_customize->add_control( 
	new Masonry_Blog_Radio_Image_Control( $wp_customize, 
		'masonry_blog_common_post_sidebar_position', 
		array( 
			'label' => esc_html__( 'Select Sidebar Position', 'masonry-blog' ),
			'type'	=> 'select',
			'choices' => masonry_blog_sidebar_position_choices(),
			'section' => 'masonry_blog_post_single_section',
			'active_callback' => 'masonry_blog_active_common_post_sidebar',
			'priority' => 25,
		)
	) 
);