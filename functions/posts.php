<?php
/**
 * Functions for Posts
 *
 * @package LHXC
 */

/** Add thumbnails */
add_theme_support( 'post-thumbnails' );
/** Paste this where you wanna use it - the_post_thumbnail(); */

/**
 * Add odd or even post classes to the post for zebra striping.
 *
 * @param array $classes Class names.
 */
function oddeven_post_class( $classes ) {
	global $current_class;
	$classes[]     = $current_class;
	$current_class = ( 'odd' === $current_class ) ? 'even' : 'odd';
	return $classes;
}
add_filter( 'post_class', 'oddeven_post_class' );
global $current_class;
$current_class = 'odd';

/**
 * Default Post Image - New Posts
 */
function lhxc_default_featured_image() {
	if ( ! has_post_thumbnail() ) {
		$default_image_url = get_default_feature_image();
		/** Get the attachment ID of the default image */
		$default_image_id = attachment_url_to_postid( $default_image_url );
		/** Set the default image as the featured image */
		set_post_thumbnail( get_the_ID(), $default_image_id );
	}
}
add_action( 'save_post', 'lhxc_default_featured_image' );

/**
 * Set a default feature image
 */
function set_default_featured_image_for_existing_posts() {
	/** Replace 'your_default_image_url' with the URL of your default featured image */
	// $default_image_url = 'https://www.louisvillehardcore.com/wp-content/uploads/2024/02/52986395372_1f08e95b33_c.jpg';
  $default_image_url = get_default_feature_image();

	/** Get the attachment ID of the default image */
	$default_image_id = attachment_url_to_postid( $default_image_url );

	/** Query to retrieve posts and pages that do not have a featured image set */
	$args = array(
		'post_type'              => array( 'post', 'page' ),
		/** You can include additional post types if needed */
					'meta_query' => array(
						array(
							'key'     => '_thumbnail_id',
							'compare' => 'NOT EXISTS',
						),
					),
		'posts_per_page'         => -1,
	);

	$query = new WP_Query( $args );

	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
			set_post_thumbnail( get_the_ID(), $default_image_id );
		}
	}

	wp_reset_postdata();
}

add_action( 'init', 'set_default_featured_image_for_existing_posts' );
