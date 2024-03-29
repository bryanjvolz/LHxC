<?php
/**
 * Default page template
 *
 * @package LHXC
 * @subpackage Default_Theme
 */

get_header();?>

<main id="content" class="content page">

		<div class="page-main-content">
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				?>
						<div class="post" id="post-<?php the_ID(); ?>">
							<h1><?php the_title(); ?></h1>
								<div class="entry">
									<?php the_content( '<p class="serif">Read the rest of this page &raquo;</p>' ); ?>

									<?php
									wp_link_pages(
										array(
											'before' => '<p><strong>Pages:</strong> ',
											'after'  => '</p>',
											'next_or_number' => 'number',
										)
									);
									?>

								</div>
							</div>
									<?php
						endwhile;
endif;
		?>
	<?php edit_post_link( 'Edit this entry.', '<p>', '</p>' ); ?>

</div>

</main>

<?php get_footer(); ?>