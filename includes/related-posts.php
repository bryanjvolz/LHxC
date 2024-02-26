<?php
/**
 *
 * Related Posts Template
 *
 * @package LHXC
 */

?>
<div class="related-posts-after-content">
<?php
$has_related = false;
$orig_post   = $post;
global $post;
$tags = wp_get_post_tags( $post->ID );
if ( $tags ) {
	$tag_ids = array();
	foreach ( $tags as $individual_tag ) {
		$tag_ids[] = $individual_tag->term_id;
	}

	$args     = array(
		'tag__in'          => $tag_ids,
		'post__not_in'     => array( $post->ID ),
		'posts_per_page'   => 6, // Number of related posts to display.
		'caller_get_posts' => 1,
	);
	$my_query = new WP_Query( $args );
	if ( $my_query->have_posts() ) {
		$has_related = true; }

	if ( $has_related ) {
		?>
	<h3>Related Posts</h3>

	<div class="related-posts">
		<?php
	}

	while ( $my_query->have_posts() ) {
		$my_query->the_post();
		?>


	<a href="<?php the_permalink(); ?>">
	<figure class="related-thumb card related-post__card card--frosted">
		<?php
		$post_thumb = get_the_post_thumbnail();
		if ( ! empty( $post_thumb ) ) {
			the_post_thumbnail();
		} else {
			?>
			<img src="<?php echo esc_html( get_default_feature_image() ); ?>" alt="placeholder image" width="250" height="150" />
		<?php } ?>
	<figcaption><?php the_title(); ?></figcaption>
	</figure>
	</a>

		<?php
	}
}
wp_reset_postdata();

if ( $has_related ) {
	?>
</div>
<?php } ?>

</div>