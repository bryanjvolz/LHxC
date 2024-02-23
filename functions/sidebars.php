<?php
/**
 * Sidebar and Menu location registration
 *
 * @package LHXC
 */

/** Register Sidebars */
if ( function_exists( 'register_sidebars' ) ) {
	register_sidebars( 3 );
}
if ( function_exists( 'register_sidebar' ) ) {
	register_sidebar(
		array(
			'name'          => 'Default Sidebar',
			'description'   => 'Default Sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => 'Guide Pamphlet Sidebar',
			'description'   => 'Guide Pamphlet Sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => 'Archive Sidebar',
			'description'   => 'Archive Sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => 'Single Post Sidebar',
			'description'   => 'Single Post Sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>',
		)
	);
}

/** Register Menus */
function register_lhxc_menus() {
	register_nav_menu( 'primary', __( 'Primary Menu', 'LHXC' ) );
	register_nav_menu( 'mobile', __( 'Mobile Menu', 'LHXC' ) );
	register_nav_menu( 'footer', __( 'Footer Menu', 'LHXC' ) );
	register_nav_menu( 'footer', __( 'Guide Pamphlet Menu', 'LHXC' ) );
}
add_action( 'after_setup_theme', 'register_lhxc_menus' );
