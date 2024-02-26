<?php
/**
 * Search results template for LHXC theme
 *
 * @package LHXC
 * @subpackage Default_Theme
 */

get_header(); ?>

<div id="content" class="content search-results">
	<main>
	<h1 class="pagetitle">Search Results</h1>


	<?php if ( have_posts() ) : ?>

		<?php
		while ( have_posts() ) :
			the_post();
			?>

			<div <?php post_class(); ?>>
				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				<small><?php the_time( 'l, F jS, Y' ); ?></small>

				<p class="postmetadata"><?php the_tags( 'Tags: ', ', ', '<br />' ); ?> Posted in <?php the_category( ', ' ); ?></p>
			</div>

		<?php endwhile; ?>

		<?php include 'includes/pagination.php'; ?>

	<?php else : ?>

		<h2 class="center">No posts found. Try a different search?</h2>
		<?php get_search_form(); ?>

	<?php endif; ?>

	</main>
	<aside id="sidebar" class="sidebar search-result-sidebar">
	<?php get_sidebar(); ?>
	</aside>

	</div>


<?php get_footer(); ?>