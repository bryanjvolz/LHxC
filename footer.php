<?php
/**
 * Footer template
 *
 * @package LHXC
 * @subpackage Default_Theme
 */

?>
<!-- end container --></div>

<footer id="footer" class="main-footer" aria-label="Footer Navigation">
	<nav id="footer-menu" class="main-footer__menu footer-menu">
		<?php wp_nav_menu( 'footer' ); ?>
	</nav>

	<p class="footer__copyright"><?php echo esc_html( lhxc_copyright() ); ?> <a href="<?php echo esc_html( home_url() ); ?>"><?php bloginfo( 'name' ); ?></a></p>

	<a id="scrolltop" href="#top" class="top-link">Back To Top</a>
</footer>

	<?php wp_enqueue_script( 'lhxc-js', get_stylesheet_directory_uri() . '/js/main.js', '', gmdate( 'WY' ), 'async' ); ?>

	<?php wp_footer(); ?>
	</body>
</html>
