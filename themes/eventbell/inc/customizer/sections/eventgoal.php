<?php
/**
 * Features options.
 *
 * @package EventBell
 */

$default = eventbell_get_default_theme_options();

// Features Section
$wp_customize->add_section( 'section_home_eventgoal',
	array(
		'title'      => __( 'Event Goal Posts ', 'eventbell' ),
		'priority'   => 50,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

$wp_customize->add_setting( 'theme_options[disable_eventgoal_section]',
	array(
		'default'           => $default['disable_eventgoal_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'eventbell_sanitize_switch_control',
	)
);
$wp_customize->add_control( new EventBell_Switch_Control( $wp_customize, 'theme_options[disable_eventgoal_section]',
    array(
		'label' 			=> __('Enable/Disable Event Goal Section', 'eventbell'),
		'section'    		=> 'section_home_eventgoal',
		 'settings'  		=> 'theme_options[disable_eventgoal_section]',
		'on_off_label' 		=> eventbell_switch_options(),
    )
) );

//Features Section title
$wp_customize->add_setting('theme_options[eventgoal_title]', 
	array(
	'default'           => $default['eventgoal_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[eventgoal_title]', 
	array(
	'label'       => __('Section Title', 'eventbell'),
	'section'     => 'section_home_eventgoal',   
	'settings'    => 'theme_options[eventgoal_title]',
	'active_callback' => 'eventbell_eventgoal_active',		
	'type'        => 'text'
	)
);

for( $i=1; $i<=6; $i++ ){


	//Event Goal Section icon
	$wp_customize->add_setting('theme_options[eventgoal_icon_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control('theme_options[eventgoal_icon_'.$i.']', 
		array(
		'label'       => sprintf( __('Icon #%1$s', 'eventbell'), $i),
		'description' => sprintf( __('Please input icon as eg: fa-archive. Find Font-awesome icons %1$shere%2$s', 'eventbell'), '<a href="' . esc_url( 'https://fontawesome.com/v4.7.0/cheatsheet/' ) . '" target="_blank">', '</a>' ),
		'section'     => 'section_home_eventgoal',   
		'settings'    => 'theme_options[eventgoal_icon_'.$i.']',
		'active_callback' => 'eventbell_eventgoal_active',		
		'type'        => 'text'
		)
	);

	// Additional Information First Page
	$wp_customize->add_setting('theme_options[eventgoal_page_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'eventbell_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[eventgoal_page_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Page #%1$s', 'eventbell'), $i),
		'section'     => 'section_home_eventgoal',   
		'settings'    => 'theme_options[eventgoal_page_'.$i.']',		
		'type'        => 'dropdown-pages',
		'active_callback' => 'eventbell_eventgoal_active',
		)
	);

	
}