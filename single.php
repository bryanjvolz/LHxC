<?php
/**
 * @package LHXC
 * @subpackage Templates
 */

get_header();
?>

	<div id="content" class="content single-post">

	<?php if (have_posts()): while (have_posts()): the_post();?>

				<main <?php post_class()?> id="post-<?php the_ID();?>">
					<div class="post-navigation">
						<div class="alignleft"><?php previous_post_link('&laquo; %link')?></div>
						<div class="alignright"><?php next_post_link('%link &raquo;')?></div>
					</div>

					<h1><?php the_title();?></h1>

					<div class="entry">

					<?php
        if (get_post_meta($post->ID, 'BannerFullSizeLink', true)) {?>
					<a href="<?php echo get_post_meta($post->ID, 'BannerFullSizeLink', true); ?>"><?php }?>
					<?php
        $key = 'SinglePageBanner';
        $themeta = get_post_meta($post->ID, $key, true);
        if ($themeta != '') {?>
						  	  <img src="<?php $custom_fields = get_post_custom();
            $my_custom_field = $custom_fields['SinglePageBanner'];
            foreach ($my_custom_field as $key => $value) {
                echo $value;
            }
            ?>" alt="<?php the_title();?>" class="homeEntryBanner">
						  	  <?php } else {echo '';}?>

						  <?php if (get_post_meta($post->ID, 'BannerFullSizeLink', true)) {echo '</a>';}?>

							<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>');?>

							<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number'));?>
				</div><!-- /entry -->
			</main>

			<aside class="sidebar single-post__sidebar">
				<div class="postmetadata">
					<strong>Posted:</strong>
					<?php the_time('l, F jS, Y')?> at <?php the_time()?> <br>
					<h2 style="margin-bottom:0;">Categories:</h2> <?php the_category(', ')?>.
					<br>
					<?php if (get_post_meta($post->ID, 'twitter_link', true)) {?>
					<br /> <a href="<?php echo get_post_meta($post->ID, 'twitter_link', true); ?>">This post on Twitter</a><?php }
        ?>
					<hr>
					<?php the_tags('<h2>Tags:</h2><ul class="list-inline tag-list"><li>', '</li><li>', '</li></ul>');?>

					<?php
						global $post;
						$author_id = $post->post_author;
					?>

					<h2>Posted By:</h2>
					<div class="single-post__author">
						<?= get_avatar($author_id, $size = 75); ?>
						<a href="mailto:<?= get_the_author_meta( 'email', $author_id ); ?>?Subject=LHxC News"><?= get_the_author_meta( 'nicename', $author_id ); ?></a>
					</div>
				</div><!-- /postmetadata -->
			</aside>

			<!-- Related Posts -->
			<section id="related-posts" class="single-post__related-posts">
				<?php
        //Related posts here
        include 'related-posts.php';
        ?>
			</section>

			<?php endwhile;else: ?>

			<p>Sorry, no posts matched your criteria.</p>

	<?php endif;?>

</div>


<?php get_footer();?>