<?php
/**
 * Successful Events options.
 *
 * @package EventBell
 */

$default = eventbell_get_default_theme_options();

// Successful Events Author Section
$wp_customize->add_section( 'section_home_about',
	array(
		'title'      => __( 'Successful Events', 'eventbell' ),
		'priority'   => 70,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

$wp_customize->add_setting( 'theme_options[disable_about_section]',
	array(
		'default'           => $default['disable_about_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'eventbell_sanitize_switch_control',
	)
);
$wp_customize->add_control( new EventBell_Switch_Control( $wp_customize, 'theme_options[disable_about_section]',
    array(
		'label' 			=> __('Enable/Disable Successful Event Section', 'eventbell'),
		'section'    		=> 'section_home_about',
		 'settings'  		=> 'theme_options[disable_about_section]',
		'on_off_label' 		=> eventbell_switch_options(),
    )
) );

//Features Section title
$wp_customize->add_setting('theme_options[about_title]', 
	array(
	'default'           => $default['about_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[about_title]', 
	array(
	'label'       => __('Section Title', 'eventbell'),
	'section'     => 'section_home_about',   
	'settings'    => 'theme_options[about_title]',
	'active_callback' => 'eventbell_about_active',		
	'type'        => 'text'
	)
);


// Setting  About Category.
$wp_customize->add_setting( 'theme_options[about_category]',
	array(

	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	new EventBell_Dropdown_Taxonomies_Control( $wp_customize, 'theme_options[about_category]',
		array(
		'label'    => __( 'Select Category', 'eventbell' ),
		'section'  => 'section_home_about',
		'settings' => 'theme_options[about_category]',	
		'active_callback' => 'eventbell_about_active',		
		)
	)
);