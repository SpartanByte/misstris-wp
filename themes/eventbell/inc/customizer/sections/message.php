<?php
/**
 * Author options.
 *
 * @package EventBell
 */

$default = eventbell_get_default_theme_options();

// Author Section
$wp_customize->add_section( 'section_home_message',
	array(
		'title'      => __( 'About Section', 'eventbell' ),
		'priority'   => 30,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

$wp_customize->add_setting( 'theme_options[disable_message_section]',
	array(
		'default'           => $default['disable_message_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'eventbell_sanitize_switch_control',
	)
);
$wp_customize->add_control( new EventBell_Switch_Control( $wp_customize, 'theme_options[disable_message_section]',
    array(
		'label' 			=> __('Enable/Disable Author Section', 'eventbell'),
		'section'    		=> 'section_home_message',
		'settings'  		=> 'theme_options[disable_message_section]',
		'on_off_label' 		=> eventbell_switch_options(),
    )
) );

// Additional Information First Page
	$wp_customize->add_setting('theme_options[message_page]', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'eventbell_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[message_page]', 
		array(
		'label'       => __('Select Page eventbell', 'eventbell'),
		'section'     => 'section_home_message',   
		'settings'    => 'theme_options[message_page]',		
		'type'        => 'dropdown-pages',
		'active_callback' => 'eventbell_message_active',
		)
	);

	// Social Url
	$wp_customize->add_setting('theme_options[social_link_1]', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'esc_url_raw'
		)
	);

	$wp_customize->add_control('theme_options[social_link_1]', 
		array(
		'label'       => __('Social Link 1', 'eventbell'),
		'section'     => 'section_home_message',   
		'settings'    => 'theme_options[social_link_1]',	
		'active_callback' => 'eventbell_message_active',	
		'type'        => 'url'
		)
	);
	// Social Url
	$wp_customize->add_setting('theme_options[social_link_2]', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'esc_url_raw'
		)
	);

	$wp_customize->add_control('theme_options[social_link_2]', 
		array(
		'label'       => __('Social Link 2', 'eventbell'),
		'section'     => 'section_home_message',   
		'settings'    => 'theme_options[social_link_2]',	
		'active_callback' => 'eventbell_message_active',	
		'type'        => 'url'
		)
	);
	// Social Url
	$wp_customize->add_setting('theme_options[social_link_3]', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'esc_url_raw'
		)
	);

	$wp_customize->add_control('theme_options[social_link_3]', 
		array(
		'label'       => __('Social Link 3', 'eventbell'),
		'section'     => 'section_home_message',   
		'settings'    => 'theme_options[social_link_3]',	
		'active_callback' => 'eventbell_message_active',	
		'type'        => 'url'
		)
	);