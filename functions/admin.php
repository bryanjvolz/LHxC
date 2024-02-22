<?php

// Replace login logo
function custom_login() {
	echo '<style type="text/css">
		body.login {background: #f2f0e8 url(https://www.louisvillehardcore.com/test/img/newBG.jpg) repeat-x top left; height: 100%; width:auto;}
		.login h1 a { background-image: url(https://forums.louisvillehardcore.com/styles/LHXC/imageset/site_logo.gif); background-size: contain; margin: 0 auto; min-height:100px; margin-bottom: 4rem; width: 100%;}
		.login #login { padding-top: 1rem; }
		 .login #loginform { border-radius: 15px; background: rgba(255, 255, 255, .8); }
		 </style>';
}
add_action( 'login_head', 'custom_login' );

function add_history_link_authors( $contactmethods ) {
	// Add LHXC History Link for Authors
	$contactmethods['lhxc_history'] = 'LHxC History';
	return $contactmethods;
}
add_filter( 'user_contactmethods', 'add_history_link_authors', 10, 1 );

remove_action( 'welcome_panel', 'wp_welcome_panel' );


// Allow SVG uploads to Media area
function add_svg_support( $mime_types ) {
	$mime_types['svg'] = 'image/svg+xml'; // Adding svg extension
	return $mime_types;
}
add_filter( 'upload_mimes', 'add_svg_support', 1, 1 );
