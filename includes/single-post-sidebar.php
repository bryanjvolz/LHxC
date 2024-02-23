<?php
/**
 * Single Post Sidebar Template
 *
 * @package LHXC
 */

?>
<div class="position-sticky">
	<div class="postmetadata">
	<?php require 'icons/posted-on.svg'; ?>
	<strong>Posted:</strong>
	<?php the_time( 'l, F jS, Y' ); ?> at <?php the_time(); ?> <br>
	<h2 style="margin-bottom:0;">Categories:</h2> <?php the_category( ', ' ); ?>.
	<br>
	<?php if ( get_post_meta( $post->ID, 'twitter_link', true ) ) { ?>
	<br /> <a href="<?php get_post_meta( $post->ID, 'twitter_link', true ); ?>">This post on Twitter</a><?php } ?>

	<?php the_tags( '<h2>Tags:</h2><ul class="list-inline tag-list"><li>', '</li><li>', '</li></ul>' ); ?>

	<?php
		global $post;
		$author_id = $post->post_author;
	?>

	<h2>Posted By:</h2>
	<div class="single-post__author">
		<?php echo get_avatar( $author_id, $size = 50 ); ?>
		<a href="mailto:<?php echo esc_html( get_the_author_meta( 'email', $author_id ) ); ?>?Subject=LHxC News"><?php echo esc_html( get_the_author_meta( 'nicename', $author_id ) ); ?></a>
	</div>
	</div><!-- /postmetadata -->

	<?php get_sidebar( 'single-post' ); ?>
</div>