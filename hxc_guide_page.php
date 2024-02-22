<?php
/**
 * @package LHXC
 * @subpackage Templates
 */
/**
Template Name: LHXC/P Guide
 */

get_header(); ?>

	<div id="content" class="content hxc-punk-guide">

		<main>
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					?>
			<div class="post" id="post-<?php the_ID(); ?>">
			<h1><?php the_title(); ?></h1>
				<div class="entry">
					<?php the_content( '<p class="serif">Read the rest of this page &raquo;</p>' ); ?>

					<?php
					wp_link_pages(
						array(
							'before'         => '<p><strong>Pages:</strong> ',
							'after'          => '</p>',
							'next_or_number' => 'number',
						)
					);
					?>

				</div>
			</div>
					<?php
			endwhile;
endif;
			?>
		<?php edit_post_link( 'Edit this entry.', '<p>', '</p>' ); ?>
		</main>

		<aside id="sidebar" class="lhxc-guide-sidebar">
			<?php get_sidebar( 'guide-pamphlet' ); ?>
		</aside>
</div>
<?php get_footer(); ?>