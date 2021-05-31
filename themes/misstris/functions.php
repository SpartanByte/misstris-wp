<?php
/**
* Misstris theme and definitions
*/

/**
 * Enqueue Parent and Child stylesheets
 */

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    $parenthandle = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
    $theme = wp_get_theme();
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', 
        array(),  // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );
    wp_enqueue_style(
        'misstris',
        get_stylesheet_uri() . '/style.css',
        array( $parenthandle ),
        $theme->get( 'Version' ) // this only works if you have Version in the style header
    );

    //Custom Fonts
    //Lexend Deca (no dependancies = empty array)
    wp_enqueue_style(
        'lexend-deca',
        'https://fonts.googleapis.com/css2?family=Lexend+Deca',
        array(),
        '2021'
    );

    //Henny Penny (no dependancies = empty array)
        wp_enqueue_style(
            'henny-penny',
            'https://fonts.googleapis.com/css2?family=Henny+Penny',
            array(),
            '2021'
        );

    //Font Awesome
    wp_enqueue_style(
        'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css',
        array(),
        '2021'
    );
}
