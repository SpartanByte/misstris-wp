<?php
/**
 * Call to action options.
 *
 * @package EventBell
 */

$default = eventbell_get_default_theme_options();

// Call to action section
$wp_customize->add_section( 'section_cta',
	array(
		'title'      => __( 'Call To Action Section', 'eventbell' ),
		'priority'   => 60,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);


$wp_customize->add_setting( 'theme_options[disable_cta_section]',
	array(
		'default'           => $default['disable_cta_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'eventbell_sanitize_switch_control',
	)
);
$wp_customize->add_control( new EventBell_Switch_Control( $wp_customize, 'theme_options[disable_cta_section]',
    array(
		'label' 			=> __('Disable Call to action section', 'eventbell'),
		'section'    		=> 'section_cta',
		'on_off_label' 		=> eventbell_switch_options(),
    )
) );


// Cta Background Image
$wp_customize->add_setting('theme_options[background_cta_section]', 
	array(
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'eventbell_sanitize_image'
	)
);

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,
	'theme_options[background_cta_section]', 
	array(
	'label'       => __('Background Image', 'eventbell'),
	'section'     => 'section_cta',   
	'settings'    => 'theme_options[background_cta_section]',		
	'active_callback' => 'eventbell_cta_active',
	'type'        => 'image',
	)
	)
);

// Additional Information First Page
$wp_customize->add_setting('theme_options[cta_page]', 
	array(
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'eventbell_dropdown_pages'
	)
);

$wp_customize->add_control('theme_options[cta_page]', 
	array(
	'label'       => __('Select Page', 'eventbell'),
	'section'     => 'section_cta',   
	'settings'    => 'theme_options[cta_page]',		
	'type'        => 'dropdown-pages',
	'active_callback' => 'eventbell_cta_active',
	)
);

// Cta Button Text
$wp_customize->add_setting('theme_options[cta_button_label]', 
	array(
	'default' 			=> $default['cta_button_label'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[cta_button_label]', 
	array(
	'label'       => __('Button Label', 'eventbell'),
	'section'     => 'section_cta',   
	'settings'    => 'theme_options[cta_button_label]',	
	'active_callback' => 'eventbell_cta_active',	
	'type'        => 'text'
	)
);
