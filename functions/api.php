<?php
/**
 * Custom REST API endpoints for the LHxC theme.
 *
 * @package LHXC
 */

/**
 * Register a custom REST API route for fetching events.
 *
 * This function creates a new endpoint at /wp-json/lhxc/v1/events
 * that can be used to retrieve all published 'tribe_events' posts.
 */
function lhxc_register_event_api_route()
{
    register_rest_route('lhxc/v1', '/events', [
        'methods'  => 'GET',
        'callback' => 'lhxc_get_events_for_api',
        'permission_callback' => '__return_true' // Publicly accessible
    ]);
}
add_action('rest_api_init', 'lhxc_register_event_api_route');


/**
 * Callback function to fetch and format event data for the API.
 *
 * This function queries for all published events, then formats them
 * into a structured JSON response for consumption by external services
 * like a Discord bot. It supports filtering and pagination.
 *
 * @param WP_REST_Request $request The incoming API request.
 * @return WP_REST_Response The formatted event data.
 */
function lhxc_get_events_for_api(WP_REST_Request $request)
{
    // Sanitize parameters from the request
    $limit = $request->get_param('limit') ? intval($request->get_param('limit')) : 30;
    $page  = $request->get_param('page') ? intval($request->get_param('page')) : 1;
    $id    = $request->get_param('id') ? array_map('intval', explode(',', $request->get_param('id'))) : null;
    $venue_name = $request->get_param('venue') ? sanitize_text_field($request->get_param('venue')) : null;
    $start_date = $request->get_param('start_date') ? sanitize_text_field($request->get_param('start_date')) : null;

    $args = [
        'post_type'      => 'tribe_events',
        'post_status'    => 'publish',
        'posts_per_page' => $limit,
        'paged'          => $page,
    ];

    if (!empty($id)) {
        $args['post__in'] = $id;
    }

    $meta_query = ['relation' => 'AND'];

    // If a venue name is provided, find the venue's post ID and query by it
    if (!empty($venue_name)) {
        $venue_post = get_page_by_title($venue_name, OBJECT, 'tribe_venue');
        if ($venue_post) {
            $meta_query[] = [
                'key'   => '_EventVenueID',
                'value' => $venue_post->ID,
            ];
        }
    }

    // If a start date is provided, query for events on that day
    if (!empty($start_date)) {
        $meta_query[] = [
            'key'     => '_EventStartDate',
            'value'   => [$start_date . ' 00:00:00', $start_date . ' 23:59:59'],
            'compare' => 'BETWEEN',
            'type'    => 'DATETIME',
        ];
    }

    if (count($meta_query) > 1) {
        $args['meta_query'] = $meta_query;
    }

    $events_query = new WP_Query($args);
    $events_data  = [];

    if ($events_query->have_posts()) {
        while ($events_query->have_posts()) {
            $events_query->the_post();
            $post_id = get_the_ID();

            $events_data[] = [
                'id'         => $post_id,
                'title'      => get_the_title(),
                'permalink'  => get_permalink(),
                'start_date' => tribe_get_start_date($post_id, false, 'Y-m-d H:i:s'),
                'end_date'   => tribe_get_end_date($post_id, false, 'Y-m-d H:i:s'),
                'venue'      => tribe_get_venue($post_id),
                'cost'       => tribe_get_cost($post_id, true),
                'excerpt'    => get_the_excerpt(),
                'image_url'  => get_the_post_thumbnail_url($post_id, 'full'),
            ];
        }
    }
    wp_reset_postdata();

    // Create the response object
    $response = new WP_REST_Response($events_data, 200);

    // Add pagination headers for client-side handling
    $total_posts = $events_query->found_posts;
    $max_pages = $events_query->max_num_pages;
    $response->header('X-WP-Total', $total_posts);
    $response->header('X-WP-TotalPages', $max_pages);

    return $response;
}