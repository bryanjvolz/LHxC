<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
/**
Template Name: LHXC/P Guide
 */
 
get_header(); ?>

<div style="width:100%; padding:10px 0; border-bottom:1px dashed #826F20;">
<h1 style="font-size:2.4em; padding:0; margin:10px 0; color:#444; text-shadow:1px 1px 1px #fff; text-align:left;">The Hardcore/Punk Guide To Christianity</h1>
<p style="margin:0 auto; font-size:14px;">
<img src="http://www.louisvillehardcore.com/wp-content/uploads/2009/08/Preview.png" height="20px" width="20px" style="vertical-align:middle;" alt="intro icon" />
<a href="http://www.louisvillehardcore.com/hardcorepunk-guide-to-christianity/">Contents</a> > <a href="http://www.louisvillehardcore.com/hardcorepunk-guide-to-christianity/intro/">Intro</a> > <a href="http://www.louisvillehardcore.com/hardcorepunk-guide-to-christianity/limits/">2</a> > <a href="http://www.louisvillehardcore.com/hardcorepunk-guide-to-christianity/conformity-and-faith/">3</a> > <a href="http://www.louisvillehardcore.com/hardcorepunk-guide-to-christianity/and-god-against-them-all/">4</a> > <a href="http://www.louisvillehardcore.com/hardcorepunk-guide-to-christianity/bibleonthefloor/">5</a> > <a href="http://www.louisvillehardcore.com/hardcorepunk-guide-to-christianity/beliefs-what-beliefs/">6</a> > <a href="http://www.louisvillehardcore.com/hardcorepunk-guide-to-christianity/jesus-christ/">7</a> > <a href="http://www.louisvillehardcore.com/hardcorepunk-guide-to-christianity/uphold-the-slaughter/">8</a> > <a href="http://www.louisvillehardcore.com/hardcorepunk-guide-to-christianity/9-wallowing-in-morality/">9</a> > <a href="http://www.louisvillehardcore.com/hardcorepunk-guide-to-christianity/no-place-here/">10</a> > <a href="http://www.louisvillehardcore.com/hardcorepunk-guide-to-christianity/counterattacks/">11</a> > <a href="http://www.louisvillehardcore.com/hardcorepunk-guide-to-christianity/outro/">12</a> > <a href="http://www.louisvillehardcore.com/hardcorepunk-guide-to-christianity/appendix-a-satan/">13</a> > <a href="http://www.louisvillehardcore.com/hardcorepunk-guide-to-christianity/appendix-b-translations/">14</a> > <a href="http://www.louisvillehardcore.com/hardcorepunk-guide-to-christianity/15-contact-and-copyright/">15</a></p>
</div>

	<div id="content" class="narrowcolumn">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		<h2><?php the_title(); ?></h2>
			<div class="entry">
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			</div>
		</div>
		<?php endwhile; endif; ?>
	<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>