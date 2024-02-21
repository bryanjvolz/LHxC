<?php

// Quick display site start through current year
function lhxc_copyright()
{
    return "&copy; 2004 - " . date('Y');
}

//Hide WP Version
function wpb_remove_version()
{
    return '';
}
add_filter('the_generator', 'wpb_remove_version');

//Hide WP Errors
function no_wordpress_errors(){
    return 'An error occurred. Please try again or contact the site administrator';
}
add_filter( 'login_errors', 'no_wordpress_errors' );

//Turn off XMLRPC
add_filter('xmlrpc_enabled', '__return_false');

?>