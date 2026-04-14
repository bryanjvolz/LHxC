<?php
/**
 * Template Name: LHxC Single Events
 * Template for displaying single events from The Events Calendar
 *
 * @package LHXC
 * @subpackage Templates
 */

get_header(); ?>

<div id="content" class="content--wide single-event">
    <main class="event-main">
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="event-header">
                    <h1 class="event-title"><?php the_title(); ?></h1>

                    <ul class="event-meta">
                        <?php if (tribe_get_venue()) : ?>
                            <li class="event-venue">
                                <svg class="icon icon-guitar" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 3l3 3-3 3-3-3 3-3z"/>
                                    <path d="M12 8l-9 9c-1 1-1 3 0 4s3 1 4 0l9-9"/>
                                    <path d="M12 8l4 4"/>
                                    <path d="M8 12l4 4"/>
                                </svg>
                                <strong>Venue:</strong> <?php echo tribe_get_venue(); ?>
                            </li>
                        <?php endif; ?>

                        <li class="event-date">
                            <svg class="icon icon-calendar" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                                <line x1="16" y1="2" x2="16" y2="6"/>
                                <line x1="8" y1="2" x2="8" y2="6"/>
                                <line x1="3" y1="10" x2="21" y2="10"/>
                            </svg>
                            <strong>Date:</strong> <?php echo tribe_get_start_date(null, false, 'F j, Y'); ?>
                        </li>

                        <li class="event-time">
                            <svg class="icon icon-clock" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"/>
                                <polyline points="12 6 12 12 16 14"/>
                            </svg>
                            <strong>Time:</strong> <?php echo tribe_get_start_date(null, false, 'g:i a'); ?>
                            <?php if (tribe_get_end_time()) : ?>
                                - <?php echo tribe_get_end_time(); ?>
                            <?php endif; ?>
                        </li>

                        <?php if (tribe_get_cost()) : ?>
                            <li class="event-cost">
                                <strong>Price:</strong> <?php echo tribe_get_cost(); ?>
                            </li>
                        <?php endif; ?>
                    </ul>
                </header>

                <div class="event-content-wrapper" style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; border-bottom: 2px solid #333;">
                    <div class="event-content">
                        <?php the_content(); ?>
                    </div>

                    <?php if (has_post_thumbnail()) : ?>
                        <div class="event-featured-image">
                            <?php the_post_thumbnail('large'); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="event-details">
                    <?php if (tribe_get_organizer_id()) : ?>
                        <div class="event-organizer">
                            <strong>Organizer:</strong> <?php echo tribe_get_organizer(); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (tribe_get_website()) : ?>
                        <div class="event-website">
                            <strong>Website:</strong> <a href="<?php echo esc_url(tribe_get_website()); ?>" target="_blank"><?php echo esc_url(tribe_get_website()); ?></a>
                        </div>
                    <?php endif; ?>

                    <?php if (tribe_get_phone()) : ?>
                        <div class="event-phone">
                            <strong>Phone:</strong> <a href="tel:<?php echo esc_attr(tribe_get_phone()); ?>"><?php echo esc_html(tribe_get_phone()); ?></a>
                        </div>
                    <?php endif; ?>

                    <?php if (tribe_get_email()) : ?>
                        <div class="event-email">
                            <strong>Email:</strong> <a href="mailto:<?php echo esc_attr(tribe_get_email()); ?>"><?php echo esc_html(tribe_get_email()); ?></a>
                        </div>
                    <?php endif; ?>

                    <?php if (tribe_address_exists()) : ?>
                        <div class="event-map">
                            <h3>Map</h3>
                            <?php echo tribe_get_embedded_map(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </article>
        <?php endwhile; ?>
    </main>
</div>

<style>
    .event-main {
        max-width: 1000px;
        margin: 0 auto;
        padding: 2rem 1rem;
    }

    .event-title {
        margin-bottom: 1.5rem;
    }

    .event-meta {
        list-style: none;
        padding: 0;
        margin: 0 0 2rem 0;
    }

    .event-meta li {
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .icon {
        flex-shrink: 0;
    }

    .event-featured-image img {
        max-width: 100%;
        height: auto;
    }

    .event-details {
        margin-top: 3rem;
    }

    .event-map {
        margin-top: 2rem;
    }

    @media (max-width: 768px) {
        .event-content-wrapper {
            grid-template-columns: 1fr !important;
        }

        .event-featured-image {
            order: -1;
            margin-bottom: 2rem;
        }
    }
</style>

<?php get_footer(); ?>