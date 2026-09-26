<?php 

/**
 * Enqueue Montserrat from Google Fonts, with preconnect resource hints.
 */

add_action( 'wp_enqueue_scripts', 'enqueue_montserrat_font' );
function enqueue_montserrat_font() {
    wp_enqueue_style(
        'google-font-montserrat',
        'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap',
        array(),
        null
    );
}


add_action( 'wp_enqueue_scripts', 'enqueue_quicksand_font' );
function enqueue_quicksand_font() {
    wp_enqueue_style(
        'google-font-quicksand',
        'https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap',
        array(),
        null
    );
}

 
/**
 * Add preconnect hints for Google Fonts domains.
 */
add_filter( 'wp_resource_hints', 'preconnect_google_fonts', 10, 2 );
function preconnect_google_fonts( $urls, $relation_type ) {
    if ( 'preconnect' === $relation_type ) {
        $urls[] = array(
            'href' => 'https://fonts.googleapis.com',
        );
        $urls[] = array(
            'href'        => 'https://fonts.gstatic.com',
            'crossorigin' => true,
        );
    }
    return $urls;
}