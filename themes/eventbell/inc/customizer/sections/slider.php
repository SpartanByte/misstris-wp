<?php
/**
 * Slider options.
 *
 * @package EventBell
 */

$default = eventbell_get_default_theme_options();

// Featured Slider Section
$wp_customize->add_section( 'section_featured_slider',
	array(
		'title'      => __( 'Featured Slider Section', 'eventbell' ),
		'priority'   => 10,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

$wp_customize->add_setting( 'theme_options[disable_featured-slider_section]',
	array(
		'default'           => $default['disable_featured-slider_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'eventbell_sanitize_switch_control',
	)
);
$wp_customize->add_control( new EventBell_Switch_Control( $wp_customize, 'theme_options[disable_featured-slider_section]',
    array(
		'label' 	=> __('Disable slider Section', 'eventbell'),
		'section'    			=> 'section_featured_slider',
		
		'on_off_label' 		=> eventbell_switch_options(),
    )
) );


$wp_customize->add_setting( 'theme_options[disable_white_overlay]',
	array(
		'default'           => $default['disable_white_overlay'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'eventbell_sanitize_switch_control',
	)
);
$wp_customize->add_control( new EventBell_Switch_Control( $wp_customize, 'theme_options[disable_white_overlay]',
    array(
		'label' 	=> __('Disable White overlay and enable image overlay', 'eventbell'),
		'section'    			=> 'section_featured_slider',
		'on_off_label' 		=> eventbell_switch_options(),
		'active_callback' => 'eventbell_slider_active',
    )
) );

// Setting  Slider Category.
$wp_customize->add_setting( 'theme_options[slider_category]',
	array(

	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	new eventbell_Dropdown_Taxonomies_Control( $wp_customize, 'theme_options[slider_category]',
		array(
		'label'    => __( 'Select Category', 'eventbell' ),
		'section'  => 'section_featured_slider',
		'settings' => 'theme_options[slider_category]',	
		'active_callback' => 'eventbell_slider_active',		
		)
	)
);

for( $i=1; $i<=3; $i++ ){

	// Slider Button Text
	$wp_customize->add_setting('theme_options[slider_custom_btn_text_' . $i . ']', 
		array(

		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control('theme_options[slider_custom_btn_text_' . $i . ']', 
		array(
		'label'       => sprintf( __('Button Label %d', 'eventbell'),$i ),
		'section'     => 'section_featured_slider',   
		'settings'    => 'theme_options[slider_custom_btn_text_' . $i . ']',	
		'active_callback' => 'eventbell_slider_active',	
		'type'        => 'text',
		)
	);
}

