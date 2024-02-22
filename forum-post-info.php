<?php
/**
 * Template for adding forum post link to new blog posts
 *
 * @package LHXC
 */

$mylimit  = 30 * 86400; /** Days * seconds per day */
$post_age = gmdate( 'U' ) - get_post_time( 'U' );

if ( $post_age < $mylimit ) {
	/** Start nested If for whether or not there was a topic associated with this post. */
	if ( get_post_meta( $post->ID, 'topic', true ) ) { ?>
	<aside class="forum-discussion">
		<a href="http://forums.louisvillehardcore.com/viewtopic.php?f=1&t=<?php get_post_meta( $post->ID, 'topic', true ); ?>">Discuss this post on the forums</a>.
	</aside>
	<?php }
}

?>
