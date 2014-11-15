<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
<hr />
<!-- end container --></div>

<p style="padding-top:20px; border-top:1px solid #d1d1d1; clear: both; margin:30px 0 12px 0;"><a href="http://www.louisvillehardcore.com/" title="Louisville Hardcore.com news blog">Home</a> | <a href="http://www.louisvillehardcore.com/flyers/" title="Louisville music concert flyer archive">Flyer Archive</a> | <a href="http://forums.louisvillehardcore.com/" title="Forums for discussion of Louisville music">Forums</a> | <a href="http://history.louisvillehardcore.com/" title="The history of Louisville music">History Wiki</a> | <a href="http://www.louisvillehardcore.com/shows" title="Louisville, KY punk, hardcore, indie rock concerts and shows">Louisville Punk/Hardcore/Indie Rock Shows</a> | <a href="http://www.louisvillehardcore.com/contact" title="Contact Louisville Hardcore for show/concert submissions, news, sales information">Contact Louisville Hardcore</a> - <?php echo lhxc_copyright(); ?> LHXC</p>

<?php wp_footer(); ?>

<!-- JS -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script type="text/javascript" src="http://www.louisvillehardcore.com/js/site.js"></script>

<script>
if (window!=window.top) { /* I'm in a frame! */ 
	 
	 $('body').css("background","#F3F1E9");
	 $('#page').css("width","90%");
	 $('#header,#footer').remove();
}

</script>

</body>
</html>
