<?php
/**
 * Custom Event Open Graph and Twitter Cards for LHXC Events
 *
 * @package LHXC

 * Adds custom Open Graph and Twitter Card meta tags for 'tribe_events' posts.
 *
 * This function is hooked into 'wp_head' and will only run on single event pages.
 * It generates meta tags for social sharing, including title, description,
 * and a featured image, to ensure previews are informative and visually appealing.
 */
function lhxc_event_open_graph_tags()
{
    // Only run on single 'tribe_events' posts
    if (is_singular('tribe_events')) {
        global $post;

        // Get basic post data
        $site_name = get_bloginfo('name');
        $title     = get_the_title();
        $excerpt   = get_the_excerpt();

        // Get event-specific data
        $start_date = tribe_get_start_date($post, false, 'F j, Y g:i a');
        $cost       = tribe_get_cost($post->ID, true);

        // Construct the description
        $description = $start_date;
        if (!empty($cost)) {
            $description .= ' - ' . $cost;
        }
        $description .= ' - ' . $excerpt;

        // Get the featured image URL
        $image_url = get_the_post_thumbnail_url($post->ID, 'full');

        // Output the meta tags
        echo '<meta property="og:site_name" content="' . esc_attr($site_name) . '">';
        echo '<meta property="og:title" content="' . esc_attr($title) . '">';
        echo '<meta property="og:description" content="' . esc_attr($description) . '">';
        echo '<meta name="twitter:card" content="summary_large_image">';
        echo '<meta name="twitter:title" content="' . esc_attr($title) . '">';
        echo '<meta name="twitter:description" content="' . esc_attr($description) . '">';

        if ($image_url) {
            echo '<meta property="og:image" content="' . esc_url($image_url) . '">';
            echo '<meta name="twitter:image" content="' . esc_url($image_url) . '">';
        }
    }
}
add_action('wp_head', 'lhxc_event_open_graph_tags');

/**
 * Customizes oEmbed data for 'tribe_events' posts.
 *
 * This function filters the oEmbed response data to provide a custom title
 * and remove author information, ensuring a clean and consistent preview
 * on oEmbed-compatible platforms like Slack.
 *
 * @param array   $data The oEmbed response data.
 * @param WP_Post $post The post object.
 * @return array The modified oEmbed response data.
 */
function lhxc_custom_oembed_data($data, $post)
{
    // Only modify oEmbed data for 'tribe_events' posts
    if ($post->post_type === 'tribe_events') {
        // Get event-specific data
        $start_date = tribe_get_start_date($post, false, 'F j, Y g:i a');
        $cost       = tribe_get_cost($post->ID, true);
        $title      = get_the_title($post->ID);

        // Construct the new title
        $new_title = $title . ' - ' . $start_date;
        if (!empty($cost)) {
            $new_title .= ' - ' . $cost;
        }

        // Update the oEmbed data
        $data['title'] = $new_title;
        unset($data['author_name']);
        unset($data['author_url']);
    }

    return $data;
}

// Add the filter only if it doesn't already exist
if (!has_filter('oembed_response_data', 'lhxc_custom_oembed_data')) {
    add_filter('oembed_response_data', 'lhxc_custom_oembed_data', 10, 2);
}