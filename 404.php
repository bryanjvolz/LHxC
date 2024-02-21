<?php
/**
 * @package LHXC
 * @subpackage Default_Theme
 */

get_header();
?>

	<div id="content" class="content">

		<main>
			<h1 class="center" style="color:#464646; text-shadow:1px 1px 0 #fff;">Error 404 - Not Found</h1>

			<p>Sorry, but something ate shit and GG Allen wasn't from Louisville.</p>

			<p><em>If</em> you feel like it, hit the back button and try again or try the search:</p>

			<fieldset>
				<?php get_search_form(); ?>
			</fieldset>
		</main>

		<aside>
			<?php get_sidebar(); ?>
		</aside>

	</div>

<?php get_footer(); ?>