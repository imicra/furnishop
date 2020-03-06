<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Furnishop
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function furnishop_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	
	// Add class on front page.
	if ( is_front_page() && 'posts' !== get_option( 'show_on_front' ) ) {
		$classes[] = 'furnishop-front-page';
	}

	return $classes;
}
add_filter( 'body_class', 'furnishop_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function furnishop_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'furnishop_pingback_header' );

/**
 * Checks to see if we're on the homepage or not.
 */
function furnishop_is_frontpage() {
	return ( is_front_page() && ! is_home() );
}