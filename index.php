<?php

/**
 * Theme homepage
 *
 * @package LHXC
 * @subpackage Default_Theme
 */

get_header(); ?>

<div id="content" class="content">
  <main>
    <?php
    if (have_posts()):
      while (have_posts()):
        the_post();
    ?>

        <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
          <h2 class="post__title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
          <time class="post__posted-at">
            <?php include 'includes/icons/posted-on.svg'; ?>
            <?php the_time('F jS, Y'); ?>
          </time>

          <div class="post__content entry">
            <?php
            $key       = 'HomePageBanner';
            $themeta = get_post_meta($post->ID, $key, true);
            if ('' !== $themeta) {
            ?>
              <a href="<?php the_permalink(); ?>"><img src="
										<?php
                    $custom_fields   = get_post_custom();
                    $my_custom_field = $custom_fields['HomePageBanner'];
                    foreach ($my_custom_field as $key => $value) {
                      echo esc_html($value);
                    }
                    ?>
											" alt="<?php the_title(); ?>" class="entryBanner"></a>
            <?php } ?>

            <?php the_content('Read the rest of this entry &raquo;'); ?>
          </div>

          <p class="postmetadata"><?php the_tags('<strong class="tag-title">Tags:</strong> ', ' ', '<br />'); ?> <strong>Posted in:</strong> <?php the_category(', '); ?></p>
        </article>

      <?php endwhile; ?>

      <?php include 'includes/pagination.php'; ?>

    <?php else: ?>
      <h2 class="center">Not Found</h2>
      <p class="center">Sorry, but you are looking for something that isn't here.</p>
      <?php get_search_form(); ?>
    <?php endif; ?>

    <hr />
    <!-- New Shows Block -->
    <section class="upcoming-shows">
      <h2>Upcoming Shows</h2>
      <a href="/shows/" class="view-all-shows">View All Shows</a> |
      <a href="/show-submissions/" class="submit-show">Submit Shows</a>
      <?php
      $events = tribe_get_events([
        'posts_per_page' => 3,
        'start_date'     => date('Y-m-d H:i:s'),
      ]);
      if ($events) {
        echo '<ul class="events-list">';
        foreach ($events as $event) {
          echo '<li>';
          if (has_post_thumbnail($event->ID)) {
            echo '<a href="' . get_permalink($event->ID) . '">' . get_the_post_thumbnail($event->ID, 'medium', array('class' => 'event-featured-image')) . '</a>';
          }
          echo '<a href="' . get_permalink($event->ID) . '">' . esc_html($event->post_title) . '</a>';
          echo '<br>' . esc_html(tribe_get_start_date($event->ID, false, 'F j, Y g:i A'));
          if (tribe_get_venue($event->ID)) {
            echo ' at ' . esc_html(tribe_get_venue($event->ID));
          }
          echo '</li>';
        }
        echo '</ul>';
      } else {
        echo '<p>No upcoming shows.</p>';
      }
      ?>
      <style>
        .upcoming-shows {
          margin: 2em 0;
          background: rgba(10, 10, 20, .25);
          padding: 1em;
        }

        .events-list {
          display: flex;
          gap: 1.5em;
          list-style: none;
          margin: 0;
          padding: 0;
          flex-wrap: wrap;

          li {
            max-width: 250px;
          }
        }
      </style>
    </section>
    <section id="history_recent-edits">
        <h2>Recent Edits</h2>
        <?php include 'includes/history-recent-edits.php'; ?>
    </section>
  </main>

  <?php get_sidebar(); ?>
</div>


<?php get_footer(); ?>