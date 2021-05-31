<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package EventBell
 */
/**
 *
 * @hooked eventbell_instagram
 */
if (is_home()) {

	do_action( 'eventbell_action_instagram' );
}
/**
 *
 * @hooked eventbell_footer_start
 */
do_action( 'eventbell_action_before_footer' );

/**
 * Hooked - eventbell_footer_top_section -10
 * Hooked - eventbell_footer_section -20
 */
do_action( 'eventbell_action_footer' );

/**
 * Hooked - eventbell_footer_end. 
 */
do_action( 'eventbell_action_after_footer' );

wp_footer(); ?>

</body>  
</html>