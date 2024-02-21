<?php
/**
 * @package LHXC
 * @subpackage Default_Theme
 */

get_header(); ?>

	<div id="content" class="content">
		<main>
			<?php query_posts($query_string . '&cat=-249'); ?>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

					<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
					<!-- <?php the_post_thumbnail() ? the_post_thumbnail() : print('<img src="http://forums.louisvillehardcore.com/styles/LHXC/imageset/site_logo.gif" alt="Post Thumb">'); ?> -->
						<h2 class="post__title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						<time class="post__posted-at">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 2v22h-24v-22h3v1c0 1.103.897 2 2 2s2-.897 2-2v-1h10v1c0 1.103.897 2 2 2s2-.897 2-2v-1h3zm-2 6h-20v14h20v-14zm-2-7c0-.552-.447-1-1-1s-1 .448-1 1v2c0 .552.447 1 1 1s1-.448 1-1v-2zm-14 2c0 .552-.447 1-1 1s-1-.448-1-1v-2c0-.552.447-1 1-1s1 .448 1 1v2zm6.687 13.482c0-.802-.418-1.429-1.109-1.695.528-.264.836-.807.836-1.503 0-1.346-1.312-2.149-2.581-2.149-1.477 0-2.591.925-2.659 2.763h1.645c-.014-.761.271-1.315 1.025-1.315.449 0 .933.272.933.869 0 .754-.816.862-1.567.797v1.28c1.067 0 1.704.067 1.704.985 0 .724-.548 1.048-1.091 1.048-.822 0-1.159-.614-1.188-1.452h-1.634c-.032 1.892 1.114 2.89 2.842 2.89 1.543 0 2.844-.943 2.844-2.518zm4.313 2.518v-7.718h-1.392c-.173 1.154-.995 1.491-2.171 1.459v1.346h1.852v4.913h1.711z"/></svg>
							<?php the_time('F jS, Y') ?>
						</time>

						<div class="post__content entry">
							<?php
										$key = 'HomePageBanner';
										$themeta = get_post_meta($post->ID, $key, TRUE);
										if($themeta != '') { ?>
										<a href="<?php the_permalink(); ?>"><img src="
										<?php $custom_fields = get_post_custom();
											$my_custom_field = $custom_fields['HomePageBanner'];
											foreach ( $my_custom_field as $key => $value )
											echo $value; ?> " alt="<?php the_title(); ?>" class="entryBanner"></a>
										<?php } ?>

							<?php the_content('Read the rest of this entry &raquo;'); ?>
						</div>

						<p class="postmetadata"><?php the_tags('<strong class="tag-title">Tags:</strong> ', ' ', '<br />'); ?> <strong>Posted in:</strong> <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?></p>
					</div>

				<?php endwhile; ?>

				<?php include('pagination.php'); ?>

			<?php else : ?>
				<h2 class="center">Not Found</h2>
				<p class="center">Sorry, but you are looking for something that isn't here.</p>
				<?php get_search_form(); ?>
			<?php endif; ?>
		</main>

		<?php get_sidebar(); ?>
	</div>


<?php get_footer(); ?>