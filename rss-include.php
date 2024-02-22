<?php
/**
 * Add RSS support for theme
 *
 * @package LHXC
 */

/** Pull in the RSS classes */
require_once ABSPATH . WPINC . '/rss.php';

wp_rss( 'http://example.com/rss/feed/goes/here', 5 );
