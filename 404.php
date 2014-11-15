<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header();
?>

<style>
    ::-moz-selection { background: #fe57a1; color: #fff; text-shadow: none; }
    ::selection { background: #fe57a1; color: #fff; text-shadow: none; }
    /* google search */
    input::-moz-focus-inner { padding: 0; border: 0; }
    input[type="text"],input[type="search"]{ border-radius: 3px; border: 1px solid #d1d1d1; background:#fff;  }
  </style>

	<div id="content" class="narrowcolumn">

		<h1 class="center" style="color:#464646; text-shadow:1px 1px 0 #fff;">Error 404 - Not Found</h1>

		<p>Sorry, but something ate shit. I don't know if it was you, or the site&hellip; but someone's breath stinks, and computers don't have mouths (unless you are a really fucked up custom builder type person).</p>
		<p><em>If</em> you feel like it, hit the back button and try again or try the search:</p>
		
		<fieldset>
			<?php get_search_form(); ?>
		</fieldset>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>