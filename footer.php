<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
<hr />
<!-- end container --></div>
<?php // include 'debug.php';?>
<div id="footer">

	<nav>
		<ul>
			<li><a href="http://www.louisvillehardcore.com/" title="Louisville Hardcore.com news blog">Home</a></li>
			<li><a href="http://www.louisvillehardcore.com/flyers/" title="Louisville music concert flyer archive">Flyer Archive</a></li>
			<li><a href="http://forums.louisvillehardcore.com/" title="Forums for discussion of Louisville music">Forums</a></li>
			<li><a href="http://history.louisvillehardcore.com/" title="The history of Louisville music">History Wiki</a></li>
			<li><a href="http://www.louisvillehardcore.com/shows" title="Louisville, KY punk, hardcore, indie rock concerts and shows">Louisville Punk/Hardcore/Indie Rock Shows</a></li>
			<li><a href="http://www.louisvillehardcore.com/contact" title="Contact Louisville Hardcore for show/concert submissions, news, sales information">Contact Louisville Hardcore</a></li>
		</ul>
	</nav>

<p><?php echo lhxc_copyright(); ?> LHXC</p>

<!-- end footer --></div>

<!-- JS -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/plugins.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/main.js"></script>

		<?php wp_footer(); ?>
		<script type="text/javascript">
    window._idl = {};
    _idl.variant = "banner";
    (function() {
        var idl = document.createElement('script');
        idl.type = 'text/javascript';
        idl.async = true;
        idl.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'members.internetdefenseleague.org/include/?url=' + (_idl.url || '') + '&campaign=' + (_idl.campaign || '') + '&variant=' + (_idl.variant || 'banner');
        document.getElementsByTagName('body')[0].appendChild(idl);
    })();
</script>
</body>
</html>
