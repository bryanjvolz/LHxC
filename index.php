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
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					?>

					<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
						<h2 class="post__title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						<time class="post__posted-at">
							<?php include 'includes/icons/posted-on.svg'; ?>
							<?php the_time( 'F jS, Y' ); ?>
						</time>

						<div class="post__content entry">
							<?php
										$key     = 'HomePageBanner';
										$themeta = get_post_meta( $post->ID, $key, true );
							if ( '' !== $themeta ) {
								?>
										<a href="<?php the_permalink(); ?>"><img src="
										<?php
										$custom_fields   = get_post_custom();
										$my_custom_field = $custom_fields['HomePageBanner'];
										foreach ( $my_custom_field as $key => $value ) {
											echo esc_html( $value );
										}
										?>
											" alt="<?php the_title(); ?>" class="entryBanner"></a>
										<?php } ?>

											<?php the_content( 'Read the rest of this entry &raquo;' ); ?>
						</div>

						<p class="postmetadata"><?php the_tags( '<strong class="tag-title">Tags:</strong> ', ' ', '<br />' ); ?> <strong>Posted in:</strong> <?php the_category( ', ' ); ?> | <?php edit_post_link( 'Edit', '', ' | ' ); ?></p>
					</article>

								<?php endwhile; ?>

				<?php include 'includes/pagination.php'; ?>

			<?php else : ?>
				<h2 class="center">Not Found</h2>
				<p class="center">Sorry, but you are looking for something that isn't here.</p>
				<?php get_search_form(); ?>
			<?php endif; ?>
		</main>

		<?php get_sidebar(); ?>
	</div>


<?php get_footer(); ?>