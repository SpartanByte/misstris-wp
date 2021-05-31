<?php 
/**
 * List of posts for post choices.
 * @return Array Array of post ids and name.
 */
function eventbell_post_choices() {
    $posts = get_posts( array( 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'eventbell' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    return  $choices;
}

if ( ! function_exists( 'eventbell_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function eventbell_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'Enable', 'eventbell' ),
            'off'       => esc_html__( 'Disable', 'eventbell' )
        );
        return apply_filters( 'eventbell_switch_options', $arr );
    }
endif;

 ?>