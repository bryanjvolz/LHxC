<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header();
?>

	<div id="content" class="narrowcolumn">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="navigation">
			<div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
			<div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
			<div class="clear" /></div>
		</div>

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<h2><?php the_title(); ?></h2>

			<div class="entry">

			<?php
			if( get_post_meta($post->ID, 'BannerFullSizeLink', true) ) { ?>
			<a href="<?php echo get_post_meta($post->ID, 'BannerFullSizeLink', true); ?>"><?php } ?>
			<?php
				  	  $key = 'SinglePageBanner';
				  	  $themeta = get_post_meta($post->ID, $key, TRUE);
				  	  if($themeta != '') { ?>
				  	  <img src="<?php $custom_fields = get_post_custom();
				  	    $my_custom_field = $custom_fields['SinglePageBanner'];
				  	    foreach ( $my_custom_field as $key => $value )
				  	    echo $value; ?>" alt="<?php the_title(); ?>" class="homeEntryBanner">
				  	  <?php } else { echo ''; } ?>

				  <?php
				  if( get_post_meta($post->ID, 'BannerFullSizeLink', true) ) { echo '</a>'; } ?>

				<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				<?php the_tags( '<p><strong>Tags:</strong> ', ', ', '</p>'); ?>

				<p class="postmetadata">
						<strong>Posted:</strong>
						<?php the_time('l, F jS, Y') ?> at <?php the_time() ?> and is filed under <?php the_category(', ') ?>. <?php if( get_post_meta($post->ID, 'twitter_link', true) ) { ?>
						<br /> <a href="<?php echo get_post_meta($post->ID, 'twitter_link', true); ?>">This post on Twitter</a><?php } else echo ''; ?>
						</p><!-- /postmetadata -->

<?php
$mylimit=30 * 86400; //days * seconds per day
$post_age = date('U') - get_post_time('U');
if ($post_age < $mylimit) {

// Start nested If for whether or not there was a topic associated with this post.
	if( get_post_meta($post->ID, 'topic', true) ) { ?>
<aside class="forum-discussion">
	<a href="http://forums.louisvillehardcore.com/viewtopic.php?f=1&t=<?php echo get_post_meta($post->ID, 'topic', true); ?>">Discuss this post on the forums</a>.
</aside> <?php } else echo '';
// End all of that forum nonsene.

//echo 'this post is within my date limit ';
// This bracket ends the date If
}
?>
			</div>
		</div>

	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>