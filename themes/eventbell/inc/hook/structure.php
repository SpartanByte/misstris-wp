<?php
/**
 * Theme functions related to structure.
 *
 * This file contains structural hook functions.
 *
 * @package EventBell
 */

if ( ! function_exists( 'eventbell_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since 1.0.0
	 */
function eventbell_doctype() {
	?><!DOCTYPE html> <html <?php language_attributes(); ?>><?php
}
endif;

add_action( 'eventbell_action_doctype', 'eventbell_doctype', 10 );


if ( ! function_exists( 'eventbell_head' ) ) :
	/**
	 * Header Codes.
	 *
	 * @since 1.0.0
	 */
function eventbell_head() {
	?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif;
}
endif;
add_action( 'eventbell_action_head', 'eventbell_head', 10 );

if ( ! function_exists( 'eventbell_page_start' ) ) :
	/**
	 * Add Skip to content.
	 *
	 * @since 1.0.0
	 */
	function eventbell_page_start() {
	?><div id="page" class="site"><a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'eventbell' ); ?></a><?php
	}
endif;

add_action( 'eventbell_action_before', 'eventbell_page_start', 10 );

if ( ! function_exists( 'eventbell_header_start' ) ) :
	/**
	 * Header Start.
	 *
	 * @since 1.0.0
	 */
	function eventbell_header_start() {
         ?>
		<header id="masthead" class="site-header nav-shrink" role="banner"><?php
	}
endif;
add_action( 'eventbell_action_before_header', 'eventbell_header_start' );

if ( ! function_exists( 'eventbell_header_end' ) ) :
	/**
	 * Header Start.
	 *
	 * @since 1.0.0
	 */
	function eventbell_header_end() {

		?></header> <!-- header ends here --><?php
	}
endif;
add_action( 'eventbell_action_header', 'eventbell_header_end', 15 );

if ( ! function_exists( 'eventbell_content_start' ) ) :
	/**
	 * Header End.
	 *
	 * @since 1.0.0
	 */
	function eventbell_content_start() { 
	?>
	<div id="content" class="site-content">
	<?php 

	}
endif;

add_action( 'eventbell_action_before_content', 'eventbell_content_start', 10 );

if ( ! function_exists( 'eventbell_footer_start' ) ) :
	/**
	 * Footer Start.
	 *
	 * @since 1.0.0
	 */
	function eventbell_footer_start() {
		if( !(is_home() || is_front_page()) ){
			echo '</div>';
		} ?>
		</div>
		<footer id="colophon" class="site-footer" role="contentinfo"><?php
		if ( true === eventbell_get_option('scroll_top_visible') ) : ?>
			<div class="backtotop"><i class="fa fa-chevron-up"></i></div>
		<?php endif;
	} 
endif;
add_action( 'eventbell_action_before_footer', 'eventbell_footer_start' );


if ( ! function_exists( 'eventbell_footer_end' ) ) :
	/**
	 * Footer End.
	 *
	 * @since 1.0.0
	 */
	function eventbell_footer_end() {?>
		</footer><?php
	}
endif;
add_action( 'eventbell_action_after_footer', 'eventbell_footer_end', 100 );

