<?php
/**
 * @package LHXC
 * @subpackage Default_Theme
 */
?>
<!-- end container --></div>

<footer id="footer" class="main-footer">
	<nav id="footer-menu" class="main-footer__menu footer-menu">
		<?php echo wp_nav_menu('footer'); ?>
	</nav>

	<p class="footer__copyright"><?= lhxc_copyright(); ?> <a href="//www.louisvillehardcore.com/">Louisville Hardcore</a></p>

	<a id="scrolltop" href="#top" class="top-link">Back To Top</a>
</footer>

<!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> -->
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/main.js"></script>

	<?php wp_footer(); ?>
	</body>
</html>
