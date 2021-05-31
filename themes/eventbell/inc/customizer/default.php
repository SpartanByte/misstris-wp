<?php
/**
 * Default theme options.
 *
 * @package EventBell
 */

if ( ! function_exists( 'eventbell_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
function eventbell_get_default_theme_options() {

	$theme_data = wp_get_theme();
	$defaults = array();

	$defaults['disable_homepage_content_section'] = true;
	
	// Featured Slider Section
	$defaults['disable_featured-slider_section']	= false;
	$defaults['disable_white_overlay']				= true;

	$defaults['disable_singleevent_section']		= false;
	$defaults['disable_singleevent_counter']		= true;

	// Event goal Section
	$defaults['disable_eventgoal_section']			= false;
	$defaults['eventgoal_title']	   	 			= esc_html__( 'Event Goals', 'eventbell' );


	// Popular Section
	$defaults['disable_popular_section']			= false;
	$defaults['popular_title']	   	 				= esc_html__( 'Event News And Blogs', 'eventbell' );


	// Author Section
	$defaults['disable_message_section']			= false;

	//Cta Section	
	$defaults['disable_cta_section']	   			= false;
	$defaults['cta_button_label']	   	 			= esc_html__( 'Buy Your Ticket', 'eventbell' );


	// Latest Posts Section
	$defaults['latest_posts_title']	   	 			= esc_html__( 'Latest Posts', 'eventbell' );
	$defaults['number_of_latest_posts_column']		= 3;
	$defaults['pagination_type']					= 'default';

	// About Section
	$defaults['disable_about_section']				= false;
	$defaults['about_title']	   	 				= esc_html__( 'Successfull Events', 'eventbell' );


	// Blog Section
	$defaults['disable_blog_section']				= false;
	$defaults['blog_title']	   	 					= esc_html__( 'Upcoming Events', 'eventbell' ); 

	//General Section
	$defaults['excerpt_length']						= 20;
	$defaults['layout_options_blog']				= 'no-sidebar';
	$defaults['layout_options_archive']				= 'right-sidebar';
	$defaults['layout_options_page']				= 'right-sidebar';	
	$defaults['layout_options_single']				= 'right-sidebar';	

	//Footer section 		
	$defaults['copyright_text']						= esc_html__( 'Copyright &copy; All rights reserved.', 'eventbell' );

	// Pass through filter.
	$defaults = apply_filters( 'eventbell_filter_default_theme_options', $defaults );
	return $defaults;
}

endif;

/**
*  Get theme options
*/
if ( ! function_exists( 'eventbell_get_option' ) ) :

	/**
	 * Get theme option
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function eventbell_get_option( $key ) {

		$default_options = eventbell_get_default_theme_options();
		if ( empty( $key ) ) {
			return;
		}

		$theme_options = (array)get_theme_mod( 'theme_options' );
		$theme_options = wp_parse_args( $theme_options, $default_options );

		$value = null;

		if ( isset( $theme_options[ $key ] ) ) {
			$value = $theme_options[ $key ];
		}

		return $value;

	}

endif;