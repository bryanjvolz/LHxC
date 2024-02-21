<?php
/**
 * @package LHXC
 * @subpackage Default_Theme
 */
?>
<!-- end container --></div>

<footer id="footer" class="main-footer" aria-label="Footer Navigation">
	<nav id="footer-menu" class="main-footer__menu footer-menu">
		<?php echo wp_nav_menu('footer'); ?>
	</nav>

	<p class="footer__copyright"><?= lhxc_copyright(); ?> <a href="<?= home_url(); ?>"><?= bloginfo('name'); ?></a></p>

	<a id="scrolltop" href="#top" class="top-link">Back To Top</a>
</footer>

	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/main.js"></script>

	<?php wp_footer(); ?>
	</body>
</html>
