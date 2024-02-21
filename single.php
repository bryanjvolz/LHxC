<?php
/**
 * @package LHXC
 * @subpackage Templates
 */

get_header();
?>

	<div id="content" class="content single-post">

	<?php if (have_posts()): while (have_posts()): the_post();?>

				<article <?php post_class()?> id="post-<?php the_ID();?>">
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

					<?php include('includes/post-navigation.php'); ?>

				</article>

			<aside class="sidebar single-post__sidebar">
				<?php include('includes/single-post-sidebar.php'); ?>
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