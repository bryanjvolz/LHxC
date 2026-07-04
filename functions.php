<?php
/**
 * Functions manifest for LHXC Theme
 *
 * @package LHXC
 * @subpackage LHXC
 */

/** Globals */
require 'functions/globals.php';
/** Admin functions */
require 'functions/admin.php';
/** Posts */
require 'functions/posts.php';
/** Sidebars */
require 'functions/sidebars.php';
/** Discord **/
require 'functions/discord.php';
/** Custom API Endpoints */
require 'functions/api.php';
/** Theme Settings */
require 'functions/theme-settings.php';

/** Event custom headers - Load only if enabled in theme settings */
if (get_option('lhxc_event_headers_enabled')) {
    require 'functions/event-headers.php';
}
