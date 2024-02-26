<?php
/**
 * Archive Template
 *
 * @package LHXC
 * @subpackage Templates
 */

/** Do not allow directly accessing this file. */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

get_header();
?>

	<main id="content" class="content archive-page">

		<div>
		<?php if ( have_posts() ) : ?>

			<?php if ( is_category() ) { /* If this is a category archive */ ?>
		<h1 class="pagetitle">Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h1>
		<?php /* If this is a tag archive */} elseif ( is_tag() ) { ?>
		<h1 class="pagetitle">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h1>
		<?php /* If this is a daily archive */} elseif ( is_day() ) { ?>
		<h1 class="pagetitle">Archive for <?php the_time( 'F jS, Y' ); ?></h1>
		<?php /* If this is a monthly archive */} elseif ( is_month() ) { ?>
		<h1 class="pagetitle">Archive for <?php the_time( 'F, Y' ); ?></h1>
		<?php /* If this is a yearly archive */} elseif ( is_year() ) { ?>
		<h1 class="pagetitle">Archive for <?php the_time( 'Y' ); ?></h1>
		<?php /* If this is an author archive */} elseif ( is_author() ) { ?>
		<h1 class="pagetitle">Author Archive</h1>
		<?php /* If this is a paged archive */} elseif ( isset( $_GET['paged'] ) && ! empty( $_GET['paged'] ) ) { // phpcs:ignore ?>
		<h1 class="pagetitle">Blog Archives</h1>
		<?php } ?>

			<?php
			while ( have_posts() ) :
				the_post();
				?>
			<article <?php post_class(); ?>>

			<div class="archive__post-date">
				<time><?php the_time( 'M jS' ); ?> <span><?php the_time( 'Y' ); ?></span></time>
			</div>

			<div class="archive__post-thumb">
				<?php
				$post_thumb = get_the_post_thumbnail();
				if ( ! empty( $post_thumb ) ) {
					$image = get_the_post_thumbnail_url( $post->ID, $size = 'post-thumbnail' );
				} else {
					$image = get_default_feature_image();
				}
				?>
			<img src="<?php echo esc_html( $image ); ?>" alt="Featured Image for <?php esc_html( the_title() ); ?>" height="350" width="350" class="archive__post-image">
			</div>

			<div class="archive__post-info">
				<h2 id="post-<?php the_ID(); ?>"><a href="<?php esc_html( the_permalink() ); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php esc_html( the_title() ); ?></a></h2>

				<div class="entry">
					<?php the_excerpt(); ?>

					<div class="archive__readmore-link">
						<a href="<?php esc_html( the_permalink() ); ?>" aria-label="Read the entire '<?php esc_html( the_title() ); ?>' article" class="align-right">Read More >></a>
					</div>
				</div>

				<p class="postmetadata"><?php the_tags( 'Tags: ', ', ', '<br />' ); ?> Posted in <?php the_category( ', ' ); ?>

				</div>
				</article><!-- .post -->

		<?php endwhile; ?>

			<?php include 'includes/pagination.php'; ?>
			<?php
	else :

		if ( is_category() ) { /** If this is a category archive */
			printf( "<h2 class='center'>Sorry, but there aren't any posts in the %s category yet.</h2>", single_cat_title( '', false ) );
		} elseif ( is_date() ) { /** If this is a date archive */
			echo ( "<h2>Sorry, but there aren't any posts with this date.</h2>" );
		} elseif ( is_author() ) { /** If this is an author archive */
			$user_data = get_user_by( 'slug', get_query_var( 'author_name' ) );
			printf( "<h2 class='center'>Sorry, but there aren't any posts by %s yet.</h2>", esc_html( $user_data->display_name ) );
		} else {
			echo ( "<h2 class='center'>No posts found.</h2>" );
		}
		get_search_form();

endif;
	?>
	</div>
	<div class="archive-sidebar">
		<?php get_sidebar( 'archive' ); ?>
	</div>
</main>


<?php get_footer(); ?>
