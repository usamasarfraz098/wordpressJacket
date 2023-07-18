<?php
/**
 * Clothing Store: Customizer
 *
 * @subpackage Clothing Store
 * @since 1.0
 */

function clothing_store_customize_register( $wp_customize ) {

	wp_enqueue_style('customizercustom_css', esc_url( get_template_directory_uri() ). '/assets/css/customizer.css');

	// fontawesome icon-picker

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	// Add custom control.

  	require get_parent_theme_file_path( 'inc/switch/control_switch.php' );

  	require get_parent_theme_file_path( 'inc/custom-control.php' );


	$wp_customize->add_section( 'clothing_store_typography_settings', array(
		'title'       => __( 'Typography', 'clothing-store' ),
		'priority'       => 2,
	) );

	$font_choices = array(
		'' => 'Select',
		'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
		'Open Sans:400italic,700italic,400,700' => 'Open Sans',
		'Oswald:400,700' => 'Oswald',
		'Playfair Display:400,700,400italic' => 'Playfair Display',
		'Montserrat:400,700' => 'Montserrat',
		'Raleway:400,700' => 'Raleway',
		'Droid Sans:400,700' => 'Droid Sans',
		'Lato:400,700,400italic,700italic' => 'Lato',
		'Arvo:400,700,400italic,700italic' => 'Arvo',
		'Lora:400,700,400italic,700italic' => 'Lora',
		'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
		'Oxygen:400,300,700' => 'Oxygen',
		'PT Serif:400,700' => 'PT Serif',
		'PT Sans:400,700,400italic,700italic' => 'PT Sans',
		'PT Sans Narrow:400,700' => 'PT Sans Narrow',
		'Cabin:400,700,400italic' => 'Cabin',
		'Fjalla One:400' => 'Fjalla One',
		'Francois One:400' => 'Francois One',
		'Josefin Sans:400,300,600,700' => 'Josefin Sans',
		'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
		'Arimo:400,700,400italic,700italic' => 'Arimo',
		'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
		'Bitter:400,700,400italic' => 'Bitter',
		'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
		'Roboto:400,400italic,700,700italic' => 'Roboto',
		'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
		'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
		'Roboto Slab:400,700' => 'Roboto Slab',
		'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
		'Rokkitt:400' => 'Rokkitt',
	);

	$wp_customize->add_setting( 'clothing_store_section_typo_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new Clothing_Store_Customizer_Customcontrol_Section_Heading( $wp_customize, 'clothing_store_section_typo_heading', array(
			'label'       => esc_html__( 'Typography Settings', 'clothing-store' ),
			'section'     => 'clothing_store_typography_settings',
			'settings'    => 'clothing_store_section_typo_heading',
		) ) );

	$wp_customize->add_setting( 'clothing_store_headings_text', array(
		'sanitize_callback' => 'clothing_store_sanitize_fonts',
	));
	$wp_customize->add_control( 'clothing_store_headings_text', array(
		'type' => 'select',
		'description' => __('Select your suitable font for the headings.', 'clothing-store'),
		'section' => 'clothing_store_typography_settings',
		'choices' => $font_choices
	));

	$wp_customize->add_setting( 'clothing_store_body_text', array(
		'sanitize_callback' => 'clothing_store_sanitize_fonts'
	));
	$wp_customize->add_control( 'clothing_store_body_text', array(
		'type' => 'select',
		'description' => __( 'Select your suitable font for the body.', 'clothing-store' ),
		'section' => 'clothing_store_typography_settings',
		'choices' => $font_choices
	) );

 	$wp_customize->add_section('clothing_store_pro', array(
        'title'    => __('UPGRADE CLOTHING STORE PREMIUM', 'clothing-store'),
        'priority' => 1,
    ));

    $wp_customize->add_setting('clothing_store_pro', array(
        'default'           => null,
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control(new Clothing_Store_Pro_Control($wp_customize, 'clothing_store_pro', array(
        'label'    => __('Clothing Store PREMIUM', 'clothing-store'),
        'section'  => 'clothing_store_pro',
        'settings' => 'clothing_store_pro',
        'priority' => 1,
    )));

    //Logo
    
	$wp_customize->add_setting('clothing_store_logo_max_height',array(
		'default'=> '',
		'transport' => 'refresh',
		'sanitize_callback' => 'clothing_store_sanitize_integer'
	));
	$wp_customize->add_control(new Clothing_Store_Slider_Custom_Control( $wp_customize, 'clothing_store_logo_max_height',array(
		'label'	=> esc_html__('Logo Width','clothing-store'),
		'section'	=> 'title_tagline',
		'settings'=>'clothing_store_logo_max_height',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 100,
        ),
	)));
	$wp_customize->add_setting('clothing_store_logo_title',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'clothing_store_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Clothing_Store_Customizer_Customcontrol_Switch(
			$wp_customize,
			'clothing_store_logo_title',
			array(
				'settings'        => 'clothing_store_logo_title',
				'section'         => 'title_tagline',
				'label'           => __( 'Show Site Title', 'clothing-store' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'clothing-store' ),
					'off'    => __( 'Off', 'clothing-store' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting('clothing_store_logo_text',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'clothing_store_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Clothing_Store_Customizer_Customcontrol_Switch(
			$wp_customize,
			'clothing_store_logo_text',
			array(
				'settings'        => 'clothing_store_logo_text',
				'section'         => 'title_tagline',
				'label'           => __( 'Show Site Tagline', 'clothing-store' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'clothing-store' ),
					'off'    => __( 'Off', 'clothing-store' ),
				),
				'active_callback' => '',
			)
		)
	);
    
    // Theme General Settings
    $wp_customize->add_section('clothing_store_theme_settings',array(
        'title' => __('Theme General Settings', 'clothing-store'),
        'priority' => 1,
    ) );

    $wp_customize->add_setting(
		'clothing_store_sticky_header',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'clothing_store_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Clothing_Store_Customizer_Customcontrol_Switch(
			$wp_customize,
			'clothing_store_sticky_header',
			array(
				'settings'        => 'clothing_store_sticky_header',
				'section'         => 'clothing_store_theme_settings',
				'label'           => __( 'Show Sticky Header', 'clothing-store' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'clothing-store' ),
					'off'    => __( 'Off', 'clothing-store' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting(
		'clothing_store_theme_loader',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'clothing_store_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Clothing_Store_Customizer_Customcontrol_Switch(
			$wp_customize,
			'clothing_store_theme_loader',
			array(
				'settings'        => 'clothing_store_theme_loader',
				'section'         => 'clothing_store_theme_settings',
				'label'           => __( 'Show Site Loader', 'clothing-store' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'clothing-store' ),
					'off'    => __( 'Off', 'clothing-store' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting('clothing_store_menu_text_transform',array(
        'default' => 'CAPITALISE',
        'sanitize_callback' => 'clothing_store_sanitize_choices'
	));
	$wp_customize->add_control('clothing_store_menu_text_transform',array(
        'type' => 'select',
        'label' => __('Menus Text Transform','clothing-store'),
        'section' => 'clothing_store_theme_settings',
        'choices' => array(
            'CAPITALISE' => __('CAPITALISE','clothing-store'),
            'UPPERCASE' => __('UPPERCASE','clothing-store'),
            'LOWERCASE' => __('LOWERCASE','clothing-store'),
        ),
	) );

	$wp_customize->add_setting( 'clothing_store_section_scroll_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Clothing_Store_Customizer_Customcontrol_Section_Heading( $wp_customize, 'clothing_store_section_scroll_heading', array(
		'label'       => esc_html__( 'Scroll Top Settings', 'clothing-store' ),
		'section'     => 'clothing_store_theme_settings',
		'settings'    => 'clothing_store_section_scroll_heading',
	) ) );

	$wp_customize->add_setting(
		'clothing_store_scroll_enable',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'clothing_store_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Clothing_Store_Customizer_Customcontrol_Switch(
			$wp_customize,
			'clothing_store_scroll_enable',
			array(
				'settings'        => 'clothing_store_scroll_enable',
				'section'         => 'clothing_store_theme_settings',
				'label'           => __( 'Hide Scroll Top', 'clothing-store' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'clothing-store' ),
					'off'    => __( 'Off', 'clothing-store' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting('clothing_store_scroll_options',array(
        'default' => 'right_align',
        'sanitize_callback' => 'clothing_store_sanitize_choices'
	));
	$wp_customize->add_control('clothing_store_scroll_options',array(
        'type' => 'select',
        'label' => __('Scroll Top Alignment','clothing-store'),
        'section' => 'clothing_store_theme_settings',
        'choices' => array(
            'right_align' => __('Right Align','clothing-store'),
            'center_align' => __('Center Align','clothing-store'),
            'left_align' => __('Left Align','clothing-store'),
        ),
	) );

	$wp_customize->add_setting('clothing_store_scroll_top_icon',array(
		'default'	=> 'fas fa-chevron-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Clothing_Store_Fontawesome_Icon_Chooser(
        $wp_customize,'clothing_store_scroll_top_icon',array(
		'label'	=> __('Add Scroll Top Icon','clothing-store'),
		'transport' => 'refresh',
		'section'	=> 'clothing_store_theme_settings',
		'setting'	=> 'clothing_store_scroll_top_icon',
		'type'		=> 'icon'
	)));	

	$wp_customize->add_setting( 'clothing_store_section_shoppage_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Clothing_Store_Customizer_Customcontrol_Section_Heading( $wp_customize, 'clothing_store_section_shoppage_heading', array(
		'label'       => esc_html__( 'Shop Page Settings', 'clothing-store' ),
		'section'     => 'clothing_store_theme_settings',
		'settings'    => 'clothing_store_section_shoppage_heading',
	) ) );

	$wp_customize->add_setting(
		'clothing_store_shop_page_sidebar',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'clothing_store_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Clothing_Store_Customizer_Customcontrol_Switch(
			$wp_customize,
			'clothing_store_shop_page_sidebar',
			array(
				'settings'        => 'clothing_store_shop_page_sidebar',
				'section'         => 'clothing_store_theme_settings',
				'label'           => __( 'Hide Shop Page Sidebar', 'clothing-store' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'clothing-store' ),
					'off'    => __( 'Off', 'clothing-store' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting(
		'clothing_store_wocommerce_single_page_sidebar',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'clothing_store_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Clothing_Store_Customizer_Customcontrol_Switch(
			$wp_customize,
			'clothing_store_wocommerce_single_page_sidebar',
			array(
				'settings'        => 'clothing_store_wocommerce_single_page_sidebar',
				'section'         => 'clothing_store_theme_settings',
				'label'           => __( 'Hide Single Product Page Sidebar', 'clothing-store' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'clothing-store' ),
					'off'    => __( 'Off', 'clothing-store' ),
				),
				'active_callback' => '',
			)
		)
	);

    //theme width
	$wp_customize->add_section('clothing_store_theme_width_settings',array(
        'title' => __('Theme Width Option', 'clothing-store'),
        'priority' => 1,
    ) );

	$wp_customize->add_setting('clothing_store_width_options',array(
        'default' => 'full_width',
        'sanitize_callback' => 'clothing_store_sanitize_choices'
	));
	$wp_customize->add_control('clothing_store_width_options',array(
        'type' => 'select',
        'label' => __('Theme Width Option','clothing-store'),
        'section' => 'clothing_store_theme_width_settings',
        'choices' => array(
            'full_width' => __('Fullwidth','clothing-store'),
            'container' => __('Container','clothing-store'),
            'container_fluid' => __('Container Fluid','clothing-store'),
        ),
	) );


	//button
	$wp_customize->add_section('clothing_store_button_options',array(
        'title' => __('Button settings', 'clothing-store'),
        'priority' => 1,
    ) );
    $wp_customize->add_setting( 'clothing_store_theme_button_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'clothing_store_theme_button_color', array(
	    'description' => __('It will change the complete theme  Buttton color in one click.', 'clothing-store'),
	    'section' => 'clothing_store_button_options',
	    'settings' => 'clothing_store_theme_button_color',
  	)));

	$wp_customize->add_setting('clothing_store_button_border_radius',array(
		'default'=> 10,
		'transport' => 'refresh',
		'sanitize_callback' => 'clothing_store_sanitize_integer'
	));
	$wp_customize->add_control(new Clothing_Store_Slider_Custom_Control( $wp_customize, 'clothing_store_button_border_radius',array(
		'label' => esc_html__( 'Border Radius','clothing-store' ),
		'section'=> 'clothing_store_button_options',
		'settings'=>'clothing_store_button_border_radius',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	)));
	
	// Post Layouts
    $wp_customize->add_section('clothing_store_layout',array(
        'title' => __('Post Layout', 'clothing-store'),        
        'priority' => 1
    ) );

    $wp_customize->add_setting( 'clothing_store_section_post_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Clothing_Store_Customizer_Customcontrol_Section_Heading( $wp_customize, 'clothing_store_section_post_heading', array(
		'label'       => esc_html__( 'Post Structure', 'clothing-store' ),
		 'description' => __( 'Change the post layout from below options', 'clothing-store' ),
		'section'     => 'clothing_store_layout',
		'settings'    => 'clothing_store_section_post_heading',
	) ) );

	$wp_customize->add_setting(
		'clothing_store_post_sidebar',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'clothing_store_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Clothing_Store_Customizer_Customcontrol_Switch(
			$wp_customize,
			'clothing_store_post_sidebar',
			array(
				'settings'        => 'clothing_store_post_sidebar',
				'section'         => 'clothing_store_layout',
				'label'           => __( 'Show Fullwidth', 'clothing-store' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'clothing-store' ),
					'off'    => __( 'Off', 'clothing-store' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting(
		'clothing_store_single_post_sidebar',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'clothing_store_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Clothing_Store_Customizer_Customcontrol_Switch(
			$wp_customize,
			'clothing_store_single_post_sidebar',
			array(
				'settings'        => 'clothing_store_single_post_sidebar',
				'section'         => 'clothing_store_layout',
				'label'           => __( 'Show Single Post Fullwidth', 'clothing-store' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'clothing-store' ),
					'off'    => __( 'Off', 'clothing-store' ),
				),
				'active_callback' => '',
			)
		)
	);

    $wp_customize->add_setting('clothing_store_post_option',array(
		'default' => 'simple_post',
		'sanitize_callback' => 'clothing_store_sanitize_select'
	));
	$wp_customize->add_control('clothing_store_post_option',array(
		'label' => esc_html__('Select Layout','clothing-store'),
		'section' => 'clothing_store_layout',
		'setting' => 'clothing_store_post_option',
		'type' => 'radio',
        'choices' => array(
            'simple_post' => __('Simple Post','clothing-store'),
            'grid_post' => __('Grid Post','clothing-store'),
        ),
	));

    $wp_customize->add_setting('clothing_store_grid_column',array(
		'default' => '3_column',
		'sanitize_callback' => 'clothing_store_sanitize_select'
	));
	$wp_customize->add_control('clothing_store_grid_column',array(
		'label' => esc_html__('Grid Post Per Row','clothing-store'),
		'section' => 'clothing_store_layout',
		'setting' => 'clothing_store_grid_column',
		'type' => 'radio',
        'choices' => array(
            '1_column' => __('1','clothing-store'),
            '2_column' => __('2','clothing-store'),
            '3_column' => __('3','clothing-store'),
            '4_column' => __('4','clothing-store'),
            '5_column' => __('6','clothing-store'),
        ),
	));

	$wp_customize->add_setting('clothing_store_date',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'clothing_store_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Clothing_Store_Customizer_Customcontrol_Switch(
			$wp_customize,
			'clothing_store_date',
			array(
				'settings'        => 'clothing_store_date',
				'section'         => 'clothing_store_layout',
				'label'           => __( 'Hide Date', 'clothing-store' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'clothing-store' ),
					'off'    => __( 'Off', 'clothing-store' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->selective_refresh->add_partial( 'clothing_store_date', array(
		'selector' => '.date-box',
		'render_callback' => 'clothing_store_customize_partial_clothing_store_date',
	) );

	$wp_customize->add_setting('clothing_store_admin',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'clothing_store_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Clothing_Store_Customizer_Customcontrol_Switch(
			$wp_customize,
			'clothing_store_admin',
			array(
				'settings'        => 'clothing_store_admin',
				'section'         => 'clothing_store_layout',
				'label'           => __( 'Hide Author/Admin', 'clothing-store' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'clothing-store' ),
					'off'    => __( 'Off', 'clothing-store' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->selective_refresh->add_partial( 'clothing_store_admin', array(
		'selector' => '.entry-author',
		'render_callback' => 'clothing_store_customize_partial_clothing_store_admin',
	) );

	$wp_customize->add_setting('clothing_store_comment',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'clothing_store_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Clothing_Store_Customizer_Customcontrol_Switch(
			$wp_customize,
			'clothing_store_comment',
			array(
				'settings'        => 'clothing_store_comment',
				'section'         => 'clothing_store_layout',
				'label'           => __( 'Hide Comment', 'clothing-store' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'clothing-store' ),
					'off'    => __( 'Off', 'clothing-store' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->selective_refresh->add_partial( 'clothing_store_comment', array(
		'selector' => '.entry-comments',
		'render_callback' => 'clothing_store_customize_partial_clothing_store_comment',
	) );

	// Top Header
    $wp_customize->add_section('clothing_store_top',array(
        'title' => __('Contact info', 'clothing-store'),
        'priority' => 1
    ) );

     $wp_customize->add_setting( 'clothing_store_section_contact_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new Clothing_Store_Customizer_Customcontrol_Section_Heading( $wp_customize, 'clothing_store_section_contact_heading', array(
			'label'       => esc_html__( 'Contact Settings', 'clothing-store' ),	
			'description' => __( 'Add contact info in the below feilds', 'clothing-store' ),		
			'section'     => 'clothing_store_top',
			'settings'    => 'clothing_store_section_contact_heading',
		) ) );

    $wp_customize->add_setting('clothing_store_top_phone',array(
		'default' => '',
		'sanitize_callback' => 'clothing_store_sanitize_phone_number'
	));
	$wp_customize->add_control('clothing_store_top_phone',array(
		'label' => esc_html__('Add Phone','clothing-store'),
		'section' => 'clothing_store_top',
		'setting' => 'clothing_store_top_phone',
		'type'    => 'text',
	));

	$wp_customize->selective_refresh->add_partial( 'clothing_store_top_phone', array(
		'selector' => '.header-text',
		'render_callback' => 'clothing_store_customize_partial_clothing_store_top_phone',
	) );

    $wp_customize->add_setting('clothing_store_top_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('clothing_store_top_text',array(
		'label' => esc_html__('Add Text','clothing-store'),
		'section' => 'clothing_store_top',
		'setting' => 'clothing_store_top_text',
		'type'    => 'text',
	));

	// Social Media
    $wp_customize->add_section('clothing_store_urls',array(
        'title' => __('Social Media', 'clothing-store'),        
        'priority' => 3
    ) );

     $wp_customize->add_setting( 'clothing_store_section_social_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
	$wp_customize->add_control( new Clothing_Store_Customizer_Customcontrol_Section_Heading( $wp_customize, 'clothing_store_section_social_heading', array(
		'label'       => esc_html__( 'Social Media Settings', 'clothing-store' ),
		'description' => __( 'Add social media links in the below feilds', 'clothing-store' ),			
		'section'     => 'clothing_store_urls',
		'settings'    => 'clothing_store_section_social_heading',
	) ) );

	$wp_customize->add_setting(
		'clothing_store_social_enable',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'clothing_store_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Clothing_Store_Customizer_Customcontrol_Switch(
			$wp_customize,
			'clothing_store_social_enable',
			array(
				'settings'        => 'clothing_store_social_enable',
				'section'         => 'clothing_store_urls',
				'label'           => __( 'Check to show social fields', 'clothing-store' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'clothing-store' ),
					'off'    => __( 'Off', 'clothing-store' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting('clothing_store_facebook_icon',array(
		'default'	=> 'fab fa-facebook-f',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Clothing_Store_Fontawesome_Icon_Chooser(
        $wp_customize,'clothing_store_facebook_icon',array(
		'label'	=> __('Add Facebook Icon','clothing-store'),
		'transport' => 'refresh',
		'section'	=> 'clothing_store_urls',
		'setting'	=> 'clothing_store_facebook_icon',
		'type'		=> 'icon',
		'active_callback' => 'clothing_store_social_dropdown'
	)));

	$wp_customize->add_setting('clothing_store_facebook',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('clothing_store_facebook',array(
		'label' => esc_html__('Facebook URL','clothing-store'),
		'section' => 'clothing_store_urls',
		'setting' => 'clothing_store_facebook',
		'type'    => 'url',
		'active_callback' => 'clothing_store_social_dropdown'
	));

	$wp_customize->selective_refresh->add_partial( 'clothing_store_facebook', array(
		'selector' => '.top_bar a i',
		'render_callback' => 'clothing_store_customize_partial_clothing_store_facebook',
	) );

	$wp_customize->add_setting(
		'clothing_store_header_fb_target',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'clothing_store_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Clothing_Store_Customizer_Customcontrol_Switch(
			$wp_customize,
			'clothing_store_header_fb_target',
			array(
				'settings'        => 'clothing_store_header_fb_target',
				'section'         => 'clothing_store_urls',
				'label'           => __( 'Open link in a new tab', 'clothing-store' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'clothing-store' ),
					'off'    => __( 'Off', 'clothing-store' ),
				),
				'active_callback' => 'clothing_store_social_dropdown',
			)
		)
	);

	$wp_customize->add_setting('clothing_store_twitter_icon',array(
		'default'	=> 'fab fa-twitter',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Clothing_Store_Fontawesome_Icon_Chooser(
        $wp_customize,'clothing_store_twitter_icon',array(
		'label'	=> __('Add Twitter Icon','clothing-store'),
		'transport' => 'refresh',
		'section'	=> 'clothing_store_urls',
		'setting'	=> 'clothing_store_twitter_icon',
		'type'		=> 'icon',
		'active_callback' => 'clothing_store_social_dropdown'
	)));

	$wp_customize->add_setting('clothing_store_twitter',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('clothing_store_twitter',array(
		'label' => esc_html__('Twitter URL','clothing-store'),
		'section' => 'clothing_store_urls',
		'setting' => 'clothing_store_twitter',
		'type'    => 'url',
		'active_callback' => 'clothing_store_social_dropdown'
	));

	$wp_customize->add_setting(
		'clothing_store_header_twt_target',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'clothing_store_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Clothing_Store_Customizer_Customcontrol_Switch(
			$wp_customize,
			'clothing_store_header_twt_target',
			array(
				'settings'        => 'clothing_store_header_twt_target',
				'section'         => 'clothing_store_urls',
				'label'           => __( 'Open link in a new tab', 'clothing-store' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'clothing-store' ),
					'off'    => __( 'Off', 'clothing-store' ),
				),
				'active_callback' => 'clothing_store_social_dropdown',
			)
		)
	);

	$wp_customize->add_setting('clothing_store_youtube_icon',array(
		'default'	=> 'fab fa-youtube',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Clothing_Store_Fontawesome_Icon_Chooser(
        $wp_customize,'clothing_store_youtube_icon',array(
		'label'	=> __('Add Youtube Icon','clothing-store'),
		'transport' => 'refresh',
		'section'	=> 'clothing_store_urls',
		'setting'	=> 'clothing_store_youtube_icon',
		'type'		=> 'icon',
		'active_callback' => 'clothing_store_social_dropdown'
	)));

	$wp_customize->add_setting('clothing_store_youtube',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('clothing_store_youtube',array(
		'label' => esc_html__('Youtube URL','clothing-store'),
		'section' => 'clothing_store_urls',
		'setting' => 'clothing_store_youtube',
		'type'    => 'url',
		'active_callback' => 'clothing_store_social_dropdown'
	));

	$wp_customize->add_setting(
		'clothing_store_header_ut_target',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'clothing_store_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Clothing_Store_Customizer_Customcontrol_Switch(
			$wp_customize,
			'clothing_store_header_ut_target',
			array(
				'settings'        => 'clothing_store_header_ut_target',
				'section'         => 'clothing_store_urls',
				'label'           => __( 'Open link in a new tab', 'clothing-store' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'clothing-store' ),
					'off'    => __( 'Off', 'clothing-store' ),
				),
				'active_callback' => 'clothing_store_social_dropdown',
			)
		)
	);

	$wp_customize->add_setting('clothing_store_instagram_icon',array(
		'default'	=> 'fab fa-instagram',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Clothing_Store_Fontawesome_Icon_Chooser(
        $wp_customize,'clothing_store_instagram_icon',array(
		'label'	=> __('Add Instagram Icon','clothing-store'),
		'transport' => 'refresh',
		'section'	=> 'clothing_store_urls',
		'setting'	=> 'clothing_store_instagram_icon',
		'type'		=> 'icon',
		'active_callback' => 'clothing_store_social_dropdown'
	)));

	$wp_customize->add_setting('clothing_store_instagram',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('clothing_store_instagram',array(
		'label' => esc_html__('Instagram URL','clothing-store'),
		'section' => 'clothing_store_urls',
		'setting' => 'clothing_store_instagram',
		'type'    => 'url',
		'active_callback' => 'clothing_store_social_dropdown'
	));

	$wp_customize->add_setting(
		'clothing_store_header_ins_target',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'clothing_store_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Clothing_Store_Customizer_Customcontrol_Switch(
			$wp_customize,
			'clothing_store_header_ins_target',
			array(
				'settings'        => 'clothing_store_header_ins_target',
				'section'         => 'clothing_store_urls',
				'label'           => __( 'Open link in a new tab', 'clothing-store' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'clothing-store' ),
					'off'    => __( 'Off', 'clothing-store' ),
				),
				'active_callback' => 'clothing_store_social_dropdown',
			)
		)
	);

    //Slider
	$wp_customize->add_section( 'clothing_store_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'clothing-store' ),    	
		'priority'   => 3,
	) );

	$wp_customize->add_setting( 'clothing_store_section_slide_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new Clothing_Store_Customizer_Customcontrol_Section_Heading( $wp_customize, 'clothing_store_section_slide_heading', array(
			'label'       => esc_html__( 'Slider Settings', 'clothing-store' ),
			'description' => __( 'Slider Image Dimension ( 600px x 700px )', 'clothing-store' ),		
			'section'     => 'clothing_store_slider_section',
			'settings'    => 'clothing_store_section_slide_heading',
		) ) );

		$wp_customize->add_setting(
		'clothing_store_slider_arrows',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'clothing_store_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Clothing_Store_Customizer_Customcontrol_Switch(
			$wp_customize,
			'clothing_store_slider_arrows',
			array(
				'settings'        => 'clothing_store_slider_arrows',
				'section'         => 'clothing_store_slider_section',
				'label'           => __( 'Check To Hide Slider', 'clothing-store' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'clothing-store' ),
					'off'    => __( 'Off', 'clothing-store' ),
				),
				'active_callback' => '',
			)
		)
	);
	
	$clothing_store_args = array('numberposts' => -1);
	$post_list = get_posts($clothing_store_args);
	$i = 0;
	$pst_sls[]= __('Select','clothing-store');
	foreach ($post_list as $key => $p_post) {
		$pst_sls[$p_post->ID]=$p_post->post_title;
	}
	for ( $i = 1; $i <= 4; $i++ ) {
		$wp_customize->add_setting('clothing_store_post_setting'.$i,array(
			'sanitize_callback' => 'clothing_store_sanitize_select',
		));
		$wp_customize->add_control('clothing_store_post_setting'.$i,array(
			'type'    => 'select',
			'choices' => $pst_sls,
			'label' => __('Select post','clothing-store'),
			'section' => 'clothing_store_slider_section',
			'active_callback' => 'clothing_store_slider_dropdown'
		));

		$wp_customize->selective_refresh->add_partial( 'clothing_store_post_setting'.$i, array(
			'selector' => '.carousel-caption h2',
			'render_callback' => 'clothing_store_customize_partial_clothing_store_post_setting'.$i,
		) );
	}
	wp_reset_postdata();

	$wp_customize->add_setting('clothing_store_product_discount_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('clothing_store_product_discount_text',array(
		'label' => esc_html__('Discount Text','clothing-store'),
		'section' => 'clothing_store_slider_section',
		'setting' => 'clothing_store_product_discount_text',
		'type'    => 'text',
		'active_callback' => 'clothing_store_slider_dropdown'
	));

	$wp_customize->selective_refresh->add_partial( 'clothing_store_product_discount_text', array(
		'selector' => '.discount-box h3',
		'render_callback' => 'clothing_store_customize_partial_clothing_store_product_discount_text',
	) );

	$wp_customize->add_setting('clothing_store_product_discount_number',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('clothing_store_product_discount_number',array(
		'label' => esc_html__('Discount Number','clothing-store'),
		'section' => 'clothing_store_slider_section',
		'setting' => 'clothing_store_product_discount_number',
		'type'    => 'text',
		'active_callback' => 'clothing_store_slider_dropdown'
	));

	$wp_customize->add_setting('clothing_store_slider_content_alignment',array(
        'default' => 'LEFT-ALIGN',
        'sanitize_callback' => 'clothing_store_sanitize_choices'
	));
	$wp_customize->add_control('clothing_store_slider_content_alignment',array(
        'type' => 'select',
        'label' => __('Slider Content Alignment','clothing-store'),
        'section' => 'clothing_store_slider_section',
        'choices' => array(
            'LEFT-ALIGN' => __('LEFT-ALIGN','clothing-store'),
            'CENTER-ALIGN' => __('CENTER-ALIGN','clothing-store'),
            'RIGHT-ALIGN' => __('RIGHT-ALIGN','clothing-store'),),
        	'active_callback' => 'clothing_store_slider_dropdown'
	) );

	$wp_customize->add_setting('clothing_store_slider_button_color',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' => 'edit_theme_options',
		)
	);
	
	$wp_customize->add_control( 'clothing_store_slider_button_color', array(
	   'settings' => 'clothing_store_slider_button_color',
	   'section'   => 'clothing_store_slider_section',
	   'label' => __(' Slider Button Color', 'clothing-store'),
	   'type'      => 'color'
		)
	);
	// Product
    $wp_customize->add_section('clothing_store_millions_of_hours_section',array(
		'title'	=> __('Product Settings','clothing-store'),
		'priority'	=> 4,
	));

	$wp_customize->add_setting(
		'clothing_store_product_enable',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'clothing_store_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Clothing_Store_Customizer_Customcontrol_Switch(
			$wp_customize,
			'clothing_store_product_enable',
			array(
				'settings'        => 'clothing_store_product_enable',
				'section'         => 'clothing_store_millions_of_hours_section',
				'label'           => __( 'Check To Show Product Settings', 'clothing-store' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'clothing-store' ),
					'off'    => __( 'Off', 'clothing-store' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting('clothing_store_millions_of_hours_heading',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('clothing_store_millions_of_hours_heading',array(
		'type' => 'text',
		'label' => __('Heading Text','clothing-store'),
		'section' => 'clothing_store_millions_of_hours_section',
		'active_callback' => 'clothing_store_product_dropdown'
	));

	$wp_customize->selective_refresh->add_partial( 'clothing_store_millions_of_hours_heading', array(
		'selector' => '#millions-of-hours h3',
		'render_callback' => 'clothing_store_customize_partial_clothing_store_millions_of_hours_heading',
	) );

	$wp_customize->add_setting('clothing_store_millions_of_hours_sub_heading',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('clothing_store_millions_of_hours_sub_heading',array(
		'type' => 'text',
		'label' => __('Sub Heading Text','clothing-store'),
		'section' => 'clothing_store_millions_of_hours_section',
		'active_callback' => 'clothing_store_product_dropdown'
	));

    $wp_customize->add_setting('clothing_store_millions_of_hours_countdown_timer',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('clothing_store_millions_of_hours_countdown_timer',array(
		'label'	=> esc_html__('Add Countdown Timer','clothing-store'),
		'description'	=> esc_html__('Ex: 20 Octobar 2021','clothing-store'),
		'section'	=> 'clothing_store_millions_of_hours_section',
		'type'		=> 'text',
		'active_callback' => 'clothing_store_product_dropdown'
	));

	// Product settings
	$clothing_store_args = array(
	    'type'                     => 'product',
	    'child_of'                 => 0,
	    'parent'                   => '',
	    'orderby'                  => 'term_group',
	    'order'                    => 'ASC',
	    'hide_empty'               => false,
	    'hierarchical'             => 1,
	    'number'                   => '',
	    'taxonomy'                 => 'product_cat',
	    'pad_counts'               => false
	);
	$categories = get_categories($clothing_store_args);
	$cat_posts = array();
	$m = 0;
	$cat_posts[]='Select';
	foreach($categories as $category){
	if($m==0){
		$default = $category->slug;
			$m++;
		}
		$cat_posts[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('clothing_store_millions_of_hours_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'clothing_store_sanitize_select',
	));
	$wp_customize->add_control('clothing_store_millions_of_hours_category',array(
		'type'    => 'select',
		'choices' => $cat_posts,
		'label' => __('Select category to display products ','clothing-store'),
		'section' => 'clothing_store_millions_of_hours_section',
		'active_callback' => 'clothing_store_product_dropdown'
	));

	//Footer
    $wp_customize->add_section( 'clothing_store_footer_copyright', array(
    	'title'      => esc_html__( 'Footer Text', 'clothing-store' ),
    	'priority' => 6
	) );

	$wp_customize->add_setting( 'clothing_store_section_footer_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new Clothing_Store_Customizer_Customcontrol_Section_Heading( $wp_customize, 'clothing_store_section_footer_heading', array(
			'label'       => esc_html__( 'Footer Settings', 'clothing-store' ),		
			'section'     => 'clothing_store_footer_copyright',
			'settings'    => 'clothing_store_section_footer_heading',
		) ) );

    $wp_customize->add_setting('clothing_store_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('clothing_store_footer_text',array(
		'label'	=> esc_html__('Copyright Text','clothing-store'),
		'section'	=> 'clothing_store_footer_copyright',
		'type'		=> 'text'
	));

	$wp_customize->selective_refresh->add_partial( 'clothing_store_footer_text', array(
		'selector' => '.site-info a',
		'render_callback' => 'clothing_store_customize_partial_clothing_store_footer_text',
	) );

	$wp_customize->add_setting('clothing_store_footer_widget',array(
		'default' => '4',
		'sanitize_callback' => 'clothing_store_sanitize_select'
	));
	$wp_customize->add_control('clothing_store_footer_widget',array(
		'label' => esc_html__('Footer Per Column','clothing-store'),
		'section' => 'clothing_store_footer_copyright',
		'setting' => 'clothing_store_footer_widget',
		'type' => 'radio',
				'choices' => array(
						'1'   => __('1 Column', 'clothing-store'),
						'2'  => __('2 Column', 'clothing-store'),
						'3' => __('3 Column', 'clothing-store'),
						'4' => __('4 Column', 'clothing-store')
				),
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'clothing_store_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'clothing_store_customize_partial_blogdescription',
	) );

	//front page
	$num_sections = apply_filters( 'clothing_store_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting( 'panel_' . $i, array(
			'default'           => false,
			'sanitize_callback' => 'clothing_store_sanitize_dropdown_pages',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( 'panel_' . $i, array(
			/* translators: %d is the front page section number */
			'label'          => sprintf( __( 'Front Page Section %d Content', 'clothing-store' ), $i ),
			'description'    => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'clothing-store' ) ),
			'section'        => 'theme_options',
			'type'           => 'dropdown-pages',
			'allow_addition' => true,
			'active_callback' => 'clothing_store_is_static_front_page',
		) );

		$wp_customize->selective_refresh->add_partial( 'panel_' . $i, array(
			'selector'            => '#panel' . $i,
			'render_callback'     => 'clothing_store_front_page_section',
			'container_inclusive' => true,
		) );
	}
}
add_action( 'customize_register', 'clothing_store_customize_register' );

function clothing_store_customize_partial_blogname() {
	bloginfo( 'name' );
}
function clothing_store_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
function clothing_store_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}
function clothing_store_is_view_with_layout_option() {
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}

define('CLOTHING_STORE_PRO_LINK',__('https://www.ovationthemes.com/wordpress/clothing-store-wordpress-theme/','clothing-store'));

/* Pro control */
if (class_exists('WP_Customize_Control') && !class_exists('Clothing_Store_Pro_Control')):
    class Clothing_Store_Pro_Control extends WP_Customize_Control{

    public function render_content(){?>
        <label style="overflow: hidden; zoom: 1;">
	        <div class="col-md upsell-btn">
                <a href="<?php echo esc_url( CLOTHING_STORE_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE CLOTHING STORE PREMIUM','clothing-store');?> </a>
	        </div>
            <div class="col-md">
                <img class="clothing_store_img_responsive " src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png">
            </div>
	        <div class="col-md">
	            <h3 style="margin-top:10px; margin-left: 20px; text-decoration:underline; color:#333;"><?php esc_html_e('Clothing Store PREMIUM - Features', 'clothing-store'); ?></h3>
                <ul style="padding-top:10px">
                    <li class="upsell-clothing_store"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Responsive Design', 'clothing-store');?> </li>
                    <li class="upsell-clothing_store"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Boxed or fullwidth layout', 'clothing-store');?> </li>
                    <li class="upsell-clothing_store"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Shortcode Support', 'clothing-store');?> </li>
                    <li class="upsell-clothing_store"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Demo Importer', 'clothing-store');?> </li>
                    <li class="upsell-clothing_store"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Section Reordering', 'clothing-store');?> </li>
                    <li class="upsell-clothing_store"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Contact Page Template', 'clothing-store');?> </li>
                    <li class="upsell-clothing_store"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multiple Blog Layouts', 'clothing-store');?> </li>
                    <li class="upsell-clothing_store"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Unlimited Color Options', 'clothing-store');?> </li>
                    <li class="upsell-clothing_store"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Designed with HTML5 and CSS3', 'clothing-store');?> </li>
                    <li class="upsell-clothing_store"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Customizable Design & Code', 'clothing-store');?> </li>
                    <li class="upsell-clothing_store"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Cross Browser Support', 'clothing-store');?> </li>
                    <li class="upsell-clothing_store"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Detailed Documentation Included', 'clothing-store');?> </li>
                    <li class="upsell-clothing_store"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Stylish Custom Widgets', 'clothing-store');?> </li>
                    <li class="upsell-clothing_store"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Patterns Background', 'clothing-store');?> </li>
                    <li class="upsell-clothing_store"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('WPML Compatible (Translation Ready)', 'clothing-store');?> </li>
                    <li class="upsell-clothing_store"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Woo-commerce Compatible', 'clothing-store');?> </li>
                    <li class="upsell-clothing_store"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Full Support', 'clothing-store');?> </li>
                    <li class="upsell-clothing_store"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('10+ Sections', 'clothing-store');?> </li>
                    <li class="upsell-clothing_store"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Live Customizer', 'clothing-store');?> </li>
                   	<li class="upsell-clothing_store"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('AMP Ready', 'clothing-store');?> </li>
                   	<li class="upsell-clothing_store"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Clean Code', 'clothing-store');?> </li>
                   	<li class="upsell-clothing_store"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('SEO Friendly', 'clothing-store');?> </li>
                   	<li class="upsell-clothing_store"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Supper Fast', 'clothing-store');?> </li>
                </ul>
        	</div>
		    <div class="col-md upsell-btn upsell-btn-bottom">
	            <a href="<?php echo esc_url( CLOTHING_STORE_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE CLOTHING STORE PREMIUM','clothing-store');?> </a>
		    </div>
        </label>
    <?php } }
endif;
