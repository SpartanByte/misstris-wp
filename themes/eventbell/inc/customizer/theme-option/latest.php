<?php
/**
 * Home Page Options.
 *
 * @package EventBell Pro
 */

$default = eventbell_get_default_theme_options();

// Latest Latest Posts Section
$wp_customize->add_section( 'section_home_latest_posts',
	array(
		'title'      => __( 'Latest Posts Section', 'eventbell' ),
		'priority'   => 130,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
		)
); 

// Latest Posts title
$wp_customize->add_setting('theme_options[latest_posts_title]', 
	array(
	'default'           => $default['latest_posts_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[latest_posts_title]', 
	array(
	'label'       => __('Section Title', 'eventbell'),
	'section'     => 'section_home_latest_posts',   
	'settings'    => 'theme_options[latest_posts_title]',		
	'type'        => 'text'
	)
);


// Number of Services
$wp_customize->add_setting('theme_options[number_of_latest_posts_column]', 
	array(
	'default' 			=> $default['number_of_latest_posts_column'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'eventbell_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[number_of_latest_posts_column]', 
	array(
	'label'       => __('Column Per Row', 'eventbell'),
	'description' => __('Save & Refresh the customizer to see its effect. Maximum is 3', 'eventbell'),
	'section'     => 'section_home_latest_posts',   
	'settings'    => 'theme_options[number_of_latest_posts_column]',		
	'type'        => 'number',
	'input_attrs' => array(
			'min'	=> 2,
			'max'	=> 3,
			'step'	=> 1,
		),
	)
);
