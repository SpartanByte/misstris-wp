<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package EventBell
 */
/**
* Hook - eventbell_action_doctype.
*
* @hooked eventbell_doctype -  10
*/
do_action( 'eventbell_action_doctype' );
?>
<head>
<?php
/**
* Hook - eventbell_action_head.
*
* @hooked eventbell_head -  10
*/
do_action( 'eventbell_action_head' );
?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<?php

/**
* Hook - eventbell_action_before.
*
* @hooked eventbell_page_start - 10
*/
do_action( 'eventbell_action_before' );

/**
*
* @hooked eventbell_header_start - 10
*/
do_action( 'eventbell_action_before_header' );

/**
*
*@hooked eventbell_site_branding - 10
*@hooked eventbell_header_end - 15 
*/
do_action('eventbell_action_header');

/**
*
* @hooked eventbell_content_start - 10
*/
do_action( 'eventbell_action_before_content' );

/**
 * Banner start
 * 
 * @hooked eventbell_banner_header - 10
*/
do_action( 'eventbell_banner_header' );  
