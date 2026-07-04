<?php
/**
 * Theme settings page for the LHxC theme.
 *
 * @package LHXC
 */

/**
 * Adds the LHxC Theme options page to the Appearance menu.
 */
function lhxc_add_theme_menu_item()
{
    add_theme_page(
        'LHxC Theme Options',      // Page Title
        'LHxC Theme',              // Menu Title
        'manage_options',          // Capability
        'lhxc_theme_options',      // Menu Slug
        'lhxc_theme_settings_page' // Callback Function
    );
}
add_action('admin_menu', 'lhxc_add_theme_menu_item');

/**
 * Registers the settings for the theme options page.
 */
function lhxc_register_settings()
{
    // Register the setting for Discord webhooks
    register_setting(
        'lhxc_theme_options_group',          // Option group
        'lhxc_discord_webhook_enabled'       // Option name
    );

    // Register the setting for event headers
    register_setting(
        'lhxc_theme_options_group',          // Option group
        'lhxc_event_headers_enabled'         // Option name
    );

    // Add a section for Discord settings
    add_settings_section(
        'lhxc_discord_section',              // ID
        'Discord Integration',               // Title
        null,                                // Callback
        'lhxc_theme_options'                 // Page
    );

    // Add the checkbox field for enabling Discord webhooks
    add_settings_field(
        'lhxc_discord_webhook_enabled_field', // ID
        'Enable Discord Webhooks',           // Title
        'lhxc_discord_webhook_enabled_callback', // Callback
        'lhxc_theme_options',                 // Page
        'lhxc_discord_section'               // Section
    );

    // Add a section for Social Sharing settings
    add_settings_section(
        'lhxc_social_sharing_section',       // ID
        'Social Sharing Headers',            // Title
        null,                                // Callback
        'lhxc_theme_options'                 // Page
    );

    // Add the checkbox field for enabling event headers
    add_settings_field(
        'lhxc_event_headers_enabled_field',  // ID
        'Enable Custom Event Headers',       // Title
        'lhxc_event_headers_enabled_callback',// Callback
        'lhxc_theme_options',                 // Page
        'lhxc_social_sharing_section'        // Section
    );
}
add_action('admin_init', 'lhxc_register_settings');

/**
 * Renders the checkbox for the Discord webhook setting.
 */
function lhxc_discord_webhook_enabled_callback()
{
    $option = get_option('lhxc_discord_webhook_enabled');
    echo '<input type="checkbox" id="lhxc_discord_webhook_enabled" name="lhxc_discord_webhook_enabled" value="1" ' . checked(1, $option, false) . ' />';
    echo '<label for="lhxc_discord_webhook_enabled">Enable notifications for new and updated events.</label>';
}

/**
 * Renders the checkbox for the event headers setting.
 */
function lhxc_event_headers_enabled_callback()
{
    $option = get_option('lhxc_event_headers_enabled');
    echo '<input type="checkbox" id="lhxc_event_headers_enabled" name="lhxc_event_headers_enabled" value="1" ' . checked(1, $option, false) . ' />';
    echo '<label for="lhxc_event_headers_enabled">Enable custom Open Graph and oEmbed headers for social sharing.</label>';
}

/**
 * Renders the HTML for the theme settings page.
 */
function lhxc_theme_settings_page()
{
    ?>
    <div class="wrap">
        <h1>LHxC Theme Options</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('lhxc_theme_options_group');
            do_settings_sections('lhxc_theme_options');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}