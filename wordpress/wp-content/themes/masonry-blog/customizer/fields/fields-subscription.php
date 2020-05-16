<?php

$masonry_blog_defaults = masonry_blog_get_default_theme_options();

$wp_customize->add_section( 
	'masonry_blog_subscription_section', 
	array(
		'priority'		=> 10,
		'title'			=> esc_html__( 'Subscription/Newsletter', 'masonry-blog' ),
		'panel'			=> ''
	) 
);

$wp_customize->add_setting( 
	'masonry_blog_subscription_shortcode', 
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default' => $masonry_blog_defaults['masonry_blog_subscription_shortcode' ],
	) 
);

$wp_customize->add_control( 
	'masonry_blog_subscription_shortcode', 
	array(
		'label' => esc_html__( 'Enter Shortcode', 'masonry-blog' ),
		/* translators: 1: MailChimp plugin's URL, 2: MailPoet plugin's URL. */
		'description' => sprintf( __( 'For subscription/newsletter, either <a href="%1$s" target="_blank">MailChimp</a> or <a href="%2$s" target="_blank">MailPoet</a> plugins can be used. Use either of them to create a subscription/newsletter form, then copy and paste the form&rsquo;s shortcode below.', 'masonry-blog' ), esc_url( 'https://wordpress.org/plugins/mailchimp-for-wp/' ), esc_url( 'https://wordpress.org/plugins/mailpoet/' ) ),
		'section' => 'masonry_blog_subscription_section',
		'type' => 'text',
	) 
);

$wp_customize->add_setting( 
	'masonry_blog_enable_subscription_in_home', 
	array(
		'sanitize_callback' => 'wp_validate_boolean',
		'default' => $masonry_blog_defaults['masonry_blog_enable_subscription_in_home' ],
	) 
);

$wp_customize->add_control( 
	new Masonry_Blog_Customizer_Toggle_Control( $wp_customize,
		'masonry_blog_enable_subscription_in_home', 
		array(
			'label' => esc_html__( 'Display On Home Page', 'masonry-blog' ),
			'section' => 'masonry_blog_subscription_section',
			'type' => 'light',
		) 
	) 
);

$wp_customize->add_setting( 
	'masonry_blog_enable_subscription_in_archive', 
	array(
		'sanitize_callback' => 'wp_validate_boolean',
		'default' => $masonry_blog_defaults['masonry_blog_enable_subscription_in_archive' ],
	) 
);

$wp_customize->add_control( 
	new Masonry_Blog_Customizer_Toggle_Control( $wp_customize,
		'masonry_blog_enable_subscription_in_archive', 
		array(
			'label' => esc_html__( 'Display On Archive Page', 'masonry-blog' ),
			'section' => 'masonry_blog_subscription_section',
			'type' => 'light',
		) 
	) 
);

$wp_customize->add_setting( 
	'masonry_blog_enable_subscription_in_search', 
	array(
		'sanitize_callback' => 'wp_validate_boolean',
		'default' => $masonry_blog_defaults['masonry_blog_enable_subscription_in_search' ],
	) 
);

$wp_customize->add_control( 
	new Masonry_Blog_Customizer_Toggle_Control( $wp_customize,
		'masonry_blog_enable_subscription_in_search', 
		array(
			'label' => esc_html__( 'Display On Search Page', 'masonry-blog' ),
			'section' => 'masonry_blog_subscription_section',
			'type' => 'light',
		) 
	) 
);

$wp_customize->add_setting( 
	'masonry_blog_enable_subscription_in_post_single', 
	array(
		'sanitize_callback' => 'wp_validate_boolean',
		'default' => $masonry_blog_defaults['masonry_blog_enable_subscription_in_post_single' ],
	) 
);

$wp_customize->add_control( 
	new Masonry_Blog_Customizer_Toggle_Control( $wp_customize,
		'masonry_blog_enable_subscription_in_post_single', 
		array(
			'label' => esc_html__( 'Display On Post Single', 'masonry-blog' ),
			'section' => 'masonry_blog_subscription_section',
			'type' => 'light',
		) 
	) 
);

$wp_customize->add_setting( 
	'masonry_blog_enable_subscription_in_page_single', 
	array(
		'sanitize_callback' => 'wp_validate_boolean',
		'default' => $masonry_blog_defaults['masonry_blog_enable_subscription_in_page_single' ],
	) 
);

$wp_customize->add_control( 
	new Masonry_Blog_Customizer_Toggle_Control( $wp_customize,
		'masonry_blog_enable_subscription_in_page_single', 
		array(
			'label' => esc_html__( 'Display On Page Single', 'masonry-blog' ),
			'section' => 'masonry_blog_subscription_section',
			'type' => 'light',
		) 
	) 
);