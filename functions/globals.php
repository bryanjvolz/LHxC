<?php
/**
 * Core functions for the LHXC Theme
 *
 * @package LHXC
 * @subpackage Functions
 */

/**
 * Quick display site start through current year
 *
 * @return string
 * */
function lhxc_copyright() {
	return '&copy; 2004 - ' . gmdate( 'Y' );
}

/** Hide WP Version */
function wpb_remove_version() {
	return '';
}
add_filter( 'the_generator', 'wpb_remove_version' );

/** Hide WP Errors */
function no_wordpress_errors() {
	return 'An error occurred. Please try again or contact the site administrator';
}
add_filter( 'login_errors', 'no_wordpress_errors' );

/** Turn off XMLRPC */
add_filter( 'xmlrpc_enabled', '__return_false' );

/** Set default feature image URL
 *
 * @return string
 */
function get_default_feature_image() {
	return 'https://www.louisvillehardcore.com/wp-content/uploads/2024/02/default-2024-feature-image.jpg';
}

function lhxc_setup_theme() {
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 300, 300, true ); // 50 pixels wide by 50 pixels tall, crop mode
}
add_action( 'after_setup_theme', 'lhxc_setup_theme' );
