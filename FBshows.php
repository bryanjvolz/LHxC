<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 * Template Name:  FB Shows
 */

get_header('fbhead'); ?>


		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<div class="entry">
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
			</div>
		</div>
		<?php endwhile; endif; ?>


<?php get_footer('fbfooter'); ?>