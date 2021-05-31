<?php
/**
 * Author options.
 *
 * @package EventBell
 */

$default = eventbell_get_default_theme_options();

// Author Section
$wp_customize->add_section( 'section_home_singleevent',
	array(
		'title'      => __( 'Single Event Section', 'eventbell' ),
		'priority'   => 20,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

$wp_customize->add_setting( 'theme_options[disable_singleevent_section]',
	array(
		'default'           => $default['disable_singleevent_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'eventbell_sanitize_switch_control',
	)
);
$wp_customize->add_control( new EventBell_Switch_Control( $wp_customize, 'theme_options[disable_singleevent_section]',
    array(
		'label' 			=> __('Enable/Disable Single Event Section', 'eventbell'),
		'section'    		=> 'section_home_singleevent',
		'settings'  		=> 'theme_options[disable_singleevent_section]',
		'on_off_label' 		=> eventbell_switch_options(),
    )
) );


// Additional Information First Page
	$wp_customize->add_setting('theme_options[singleevent_page]', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'eventbell_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[singleevent_page]', 
		array(
		'label'       => __('Select Page eventbell', 'eventbell'),
		'section'     => 'section_home_singleevent',   
		'settings'    => 'theme_options[singleevent_page]',		
		'type'        => 'dropdown-pages',
		'active_callback' => 'eventbell_singleevent_active',
		)
	);

	$wp_customize->add_setting( 'theme_options[disable_singleevent_counter]',
	array(
		'default'           => $default['disable_singleevent_counter'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'eventbell_sanitize_switch_control',
	)
	);
	$wp_customize->add_control( new EventBell_Switch_Control( $wp_customize, 'theme_options[disable_singleevent_counter]',
	    array(
			'label' 			=> __('Enable/Disable Single Event Counter', 'eventbell'),
			'section'    		=> 'section_home_singleevent',
			'settings'  		=> 'theme_options[disable_singleevent_counter]',
			'on_off_label' 		=> eventbell_switch_options(),
	    )
	) );

	// message title setting and control 
	$wp_customize->add_setting( 'theme_options[singleevent_date]', array(
		'sanitize_callback' => 'esc_attr',
	) );

	$wp_customize->add_control( 'theme_options[singleevent_date]', array(
		'label'           	=>  __( 'Event Date ', 'eventbell' ), 
		'section'        	=> 'section_home_singleevent',	
		'active_callback' 	=> 'eventbell_singleevent_active',
		'type'					=>'date',
		'input_attrs' => array(
		'id' => 'datepicker',
		'placeholder' => __( 'mm-dd-yyyy','eventbell' ),
		)
	) );
	// message title setting and control 
	$wp_customize->add_setting( 'theme_options[singleevent_address]', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'theme_options[singleevent_address]', array(
		'label'           	=>  __( 'Event Address ', 'eventbell' ), 
		'section'        	=> 'section_home_singleevent',	
		'active_callback' 	=> 'eventbell_singleevent_active',
		'type'				=> 'text',
	) );

	// message title setting and control 
	$wp_customize->add_setting( 'theme_options[singleevent_time]', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'theme_options[singleevent_time]', array(
		'label'           	=>  __( 'Event Time ', 'eventbell' ), 
		'section'        	=> 'section_home_singleevent',	
		'active_callback' 	=> 'eventbell_singleevent_active',
		'type'				=> 'text',
	) );

	// message title setting and control 
	$wp_customize->add_setting( 'theme_options[singleevent_btn_text]', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'theme_options[singleevent_btn_text]', array(
		'label'           	=>  __( 'Button Text ', 'eventbell' ), 
		'section'        	=> 'section_home_singleevent',	
		'active_callback' 	=> 'eventbell_singleevent_active',
		'type'				=> 'text',
	) );