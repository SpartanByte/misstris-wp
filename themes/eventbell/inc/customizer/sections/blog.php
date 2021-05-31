<?php
/**
 * Home Page Options.
 *
 * @package EventBell
 */

$default = eventbell_get_default_theme_options();

// Latest Blog Section
$wp_customize->add_section( 'section_home_blog',
	array(
		'title'      => __( 'Upcoming Event Section', 'eventbell' ),
		'priority'   => 40,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);


$wp_customize->add_setting( 'theme_options[disable_blog_section]',
	array(
		'default'           => $default['disable_blog_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'eventbell_sanitize_switch_control',
	)
);
$wp_customize->add_control( new EventBell_Switch_Control( $wp_customize, 'theme_options[disable_blog_section]',
    array(
		'label' 	=> __('Enable/Disable Upcoming Event Section', 'eventbell'),
		'section'    			=> 'section_home_blog',		
		'on_off_label' 		=> eventbell_switch_options(),
    )
) );


// Blog title
$wp_customize->add_setting('theme_options[blog_title]', 
	array(
	'default'           => $default['blog_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[blog_title]', 
	array(
	'label'       => __('Section Title', 'eventbell'),
	'section'     => 'section_home_blog',   
	'settings'    => 'theme_options[blog_title]',	
	'active_callback' => 'eventbell_blog_active',		
	'type'        => 'text'
	)
);

// Cta Background Image
$wp_customize->add_setting('theme_options[background_blog_section]', 
	array(
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'eventbell_sanitize_image'
	)
);

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,
	'theme_options[background_blog_section]', 
	array(
	'label'       => __('Background Image', 'eventbell'),
	'section'     => 'section_home_blog',   
	'settings'    => 'theme_options[background_blog_section]',		
	'active_callback' => 'eventbell_blog_active',
	'type'        => 'image',
	)
	)
);


for( $i=1; $i<=3; $i++ ){

	// Additional Information First Post
	$wp_customize->add_setting('theme_options[blog_post_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'eventbell_dropdown_posts'
		)
	);
	$wp_customize->add_control( new EventBell_Dropdown_Chooser( $wp_customize,'theme_options[blog_post_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Post #%1$s', 'eventbell'), $i),
		'section'     => 'section_home_blog',  
		'settings'    => 'theme_options[blog_post_'.$i.']',	
		'choices'			=> eventbell_post_choices(),	
		'type'        => 'dropdown-posts',
		'active_callback' => 'eventbell_blog_active',
		)
	));
		// message title setting and control 
	$wp_customize->add_setting( 'theme_options[blog_date_'.$i.']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'theme_options[blog_date_'.$i.']', array(
		'label'           	=>  sprintf( __( 'Event Date ', 'eventbell' ), $i), 
		'section'        	=> 'section_home_blog',	
		'active_callback' 	=> 'eventbell_blog_active',
		'type'					=>'date',
		'input_attrs' => array(
		'id' => 'datepicker',
		'placeholder' => __( 'mm-dd-yyyy','eventbell' ),
		)
	) );
	// message title setting and control 
	$wp_customize->add_setting( 'theme_options[blog_address_'.$i.']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'theme_options[blog_address_'.$i.']', array(
		'label'           	=>  sprintf( __( 'Event Address ', 'eventbell' ), $i), 
		'section'        	=> 'section_home_blog',	
		'active_callback' 	=> 'eventbell_blog_active',
		'type'				=> 'text',
	) );
}
