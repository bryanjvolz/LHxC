<?php
/**
 * Template Name: Homepage Template
 *
 * @package LHXC
 * @subpackage Templates
 */

get_header(); ?>

<div id="content" class="content homepage">
    <main class="homepage-main">
        <!-- Latest Blog Posts Section -->
        <section class="homepage-section latest-posts">
            <h2>Latest News</h2>
            <div class="posts-grid">
                <?php
                $latest_posts = new WP_Query(array(
                    'posts_per_page' => 5,
                    'post_type' => 'post'
                ));

                if ($latest_posts->have_posts()) :
                    while ($latest_posts->have_posts()) : $latest_posts->the_post();
                ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail">
                                <?php the_post_thumbnail('medium'); ?>
                            </div>
                        <?php endif; ?>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <div class="post-meta">
                            <?php the_time('F j, Y'); ?>
                        </div>
                        <?php the_excerpt(); ?>
                    </article>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </section>

        <!-- Upcoming Shows Section -->
        <section class="homepage-section upcoming-shows">
            <h2>Upcoming Shows</h2>
            <div class="shows-grid">
                <?php
                // Query for next 4 upcoming shows using The Events Calendar
                $upcoming_shows = tribe_get_events(array(
                    'posts_per_page' => 4,
                    'start_date' => 'now',
                    'post_type' => 'tribe_events',
                    'eventDisplay' => 'upcoming'
                ));

                foreach ($upcoming_shows as $post) :
                    setup_postdata($post);
                ?>
                    <article class="show-card">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="show-thumbnail">
                                <?php the_post_thumbnail('medium'); ?>
                            </div>
                        <?php endif; ?>
                        <h3><?php the_title(); ?></h3>
                        <div class="show-meta">
                            <?php echo tribe_get_start_date($post); ?>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="show-link">Event Details</a>
                    </article>
                <?php
                endforeach;
                wp_reset_postdata();
                ?>
            </div>
        </section>

        <!-- Latest MediaWiki Edits Section -->
        <section class="homepage-section wiki-edits">
            <h2>Latest Wiki Updates</h2>
            <div class="wiki-updates">
                <?php
                // Get the MediaWiki recent changes using the MediaWiki API
                $wiki_url = 'https://history.louisvillehardcore.com/api.php';
                $response = wp_remote_get(add_query_arg(array(
                    'action' => 'query',
                    'list' => 'recentchanges',
                    'rcnamespace' => '0',
                    'rclimit' => 10,
                    'format' => 'json'
                ), $wiki_url));

                if (!is_wp_error($response)) {
                    $body = wp_remote_retrieve_body($response);
                    $data = json_decode($body);
                    if ($data && isset($data->query->recentchanges)) {
                        echo '<ul class="wiki-changes-list">';
                        foreach ($data->query->recentchanges as $change) {
                            echo '<li>';
                            echo '<a href="https://history.louisvillehardcore.com/index.php?title=' . esc_attr($change->title) . '">';
                            echo esc_html($change->title);
                            echo '</a>';
                            echo ' - ' . esc_html(human_time_diff(strtotime($change->timestamp), current_time('timestamp'))) . ' ago';
                            echo '</li>';
                        }
                        echo '</ul>';
                    }
                }
                ?>
            </div>
        </section>

        <!-- Latest Show Flyers Section -->
        <section class="homepage-section show-flyers">
            <h2>Latest Show Flyers</h2>
            <div class="flyers-grid">
                <?php
                // Query for latest 10 flyers from the lhxc-flyers plugin
                $flyers = new WP_Query(array(
                    'post_type' => 'lhxc-flyer',
                    'posts_per_page' => 10
                ));

                if ($flyers->have_posts()) :
                    while ($flyers->have_posts()) : $flyers->the_post();
                        if (has_post_thumbnail()) :
                ?>
                            <div class="flyer-item">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                    <?php the_post_thumbnail('medium'); ?>
                                </a>
                            </div>
                <?php
                        endif;
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </section>

        <!-- Random Videos Section -->
        <section class="homepage-section random-videos">
            <h2>Featured Videos</h2>
            <div class="videos-grid">
                <?php
                // Get random videos from the video page
                $videos_page = get_page_by_path('videos');
                if ($videos_page) {
                    // Initialize the video app's functionality
                    require_once get_template_directory() . '/page-video-app.php';

                    // Get 4 random videos from the video database
                    global $wpdb;
                    $random_videos = $wpdb->get_results(
                        "SELECT * FROM {$wpdb->prefix}lhxc_videos ORDER BY RAND() LIMIT 4"
                    );

                    foreach ($random_videos as $video) {
                        echo '<div class="video-item">';
                        // Display video using the video app's display function
                        echo do_shortcode('[lhxc_video id="' . $video->id . '"]');
                        echo '</div>';
                    }
                }
                ?>
            </div>
        </section>
    </main>

    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>