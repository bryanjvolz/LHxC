<?php
/**
 * Admin functions for LHXC
 *
 * @package LHXC
 */

add_action('transition_post_status', 'send_event_to_discord', 10, 3);

function send_event_to_discord($new_status, $old_status, $post)
{
    // Stop if the Discord webhook integration is disabled in theme settings.
    if (!get_option('lhxc_discord_webhook_enabled')) {
        return;
    }
    // Only trigger when an Event from The Events Calendar is published
    if ($post->post_type !== 'tribe_events' || $new_status !== 'publish' || $old_status === 'publish') {
        return;
    }

    // Get event details
    $title     = get_the_title($post->ID);
    $permalink = get_permalink($post->ID);
    $image_url = get_the_post_thumbnail_url($post->ID, 'full');

    // Fetch Event Calendar meta data
    $start_date = get_post_meta($post->ID, '_EventStartDate', true);
    $venue_id   = get_post_meta($post->ID, '_EventVenueID', true);
    $venue_name = $venue_id ? get_the_title($venue_id) : 'Online / No Venue';

    // Replace with your actual Discord Webhook URL
    $webhook_url = defined('DISCORD_WEBHOOK_URL') ? DISCORD_WEBHOOK_URL : '';

    // Build structured Discord Embed JSON
    $json_data = json_encode([
        "embeds" => [
            [
                "title"  => $title,
                "url"    => $permalink,
                "color"  => hexdec("3498db"), // Embed bar color
                "fields" => [
                    [
                        "name"   => "📅 Date & Time",
                        "value"  => $start_date ? date("F j, Y, g:i a", strtotime($start_date)) : "N/A",
                        "inline" => true,
                    ],
                    [
                        "name"   => "📍 Venue",
                        "value"  => $venue_name,
                        "inline" => true,
                    ],
                ],
                "image"  => [
                    "url" => $image_url ? $image_url : "",
                ],
                "footer" => [
                    "text" => "New Show Added",
                ],
            ],
        ],
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

    // Send payload via WordPress HTTP API
    wp_remote_post($webhook_url, [
        'method'      => 'POST',
        'headers'     => ['Content-Type' => 'application/json; charset=utf-8'],
        'body'        => $json_data,
        'data_format' => 'body',
    ]);
}

/**
 * Send a notification to Discord when an event is updated.
 *
 * This function is hooked into `save_post_tribe_events` and will fire when an event is updated.
 * It sends a simple notification to a Discord webhook with the event title and a link to the event.
 *
 * @param int     $post_ID The ID of the post being saved.
 * @param WP_Post $post    The post object.
 * @param bool    $update  Whether this is an update to an existing post.
 */
function lhxc_send_event_update_to_discord($post_ID, $post, $update)
{
    // Stop if the Discord webhook integration is disabled in theme settings.
    if (!get_option('lhxc_discord_webhook_enabled')) {
        return;
    }
    // We only want to act on updates, not new posts.
    // The 'transition_post_status' hook handles new posts.
    if (!$update) {
        return;
    }

    // Ignore autosaves and revisions to prevent multiple notifications
    if ((defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) || wp_is_post_revision($post_ID)) {
        return;
    }

    // Check if the post is published. We don't want to send notifications for drafts.
    if ($post->post_status !== 'publish') {
        return;
    }

    // Get event details
    $title     = get_the_title($post_ID);
    $permalink = get_permalink($post_ID);

    // Replace with your actual Discord Webhook URL.
    // This should ideally be stored as a WordPress option or in wp-config.php for better security.
    $webhook_url = defined('DISCORD_WEBHOOK_URL') ? DISCORD_WEBHOOK_URL : '';

    // Construct the message
    $message = "Event updated: **{$title}**\n{$permalink}";

    // Prepare the data to be sent to Discord
    $payload = json_encode(['content' => $message]);

    // Send the notification using the WordPress HTTP API
    wp_remote_post(
        $webhook_url,
        [
            'method'      => 'POST',
            'headers'     => ['Content-Type' => 'application/json; charset=utf-8'],
            'body'        => $payload,
            'data_format' => 'body',
        ]
    );
}
add_action('save_post_tribe_events', 'lhxc_send_event_update_to_discord', 10, 3);
