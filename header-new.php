<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<!-- SEO Stuff - Keywords, Description lower -->
<title>Louisville Hardcore/Punk/Indie Rock.com - <?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?> | Local Louisville KY music underground </title>
<meta name="reply-to" content="admin@louisvillehardcore.com" />
<meta name="expires" content="never" />

<!-- Styles, RSS, Icons -->
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/site.css" type="text/css" media="screen" />

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="shortcut icon" href="http://images.louisvillehardcore.com/favicon.ico" />

<!-- Comments are disallowed, but keep this for trackbacks -->
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<!-- Inserted Code -->
<?php wp_head(); ?>
<!-- JS -->
<script type="text/javascript" src="http://www.louisvillehardcore.com/js/jquery.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/site.js"></script>

<!-- form switcher. place in site.js before live -->

<script language="JavaScript">
function OnSubmitForm()
{
  if(document.pressed == 'Forums')
  {
   document.myform.action ="http://forums.louisvillehardcore.com/search.php";
  }
  else
  if(document.pressed == 'History')
  {
    document.myform.action ="http://history.louisvillehardcore.com/index.php?title=Special:Search";
  }
   else
  if(document.pressed == 'Blog')
  {
    document.myform.action ="http://www.louisvillehardcore.com/";
  }
  return true;
}
</script>
<!-- Drop-down Menus -->
<script type="text/javascript">
var timeout         = 500;
var closetimer		= 0;
var ddmenuitem      = 0;

function mainNav_open()
{	mainNav_canceltimer();
	mainNav_close();
	ddmenuitem = $(this).find('ul').eq(0).css('visibility', 'visible');}

function mainNav_close()
{	if(ddmenuitem) ddmenuitem.css('visibility', 'hidden');}

function mainNav_timer()
{	closetimer = window.setTimeout(mainNav_close, timeout);}

function mainNav_canceltimer()
{	if(closetimer)
	{	window.clearTimeout(closetimer);
		closetimer = null;}}

$(document).ready(function()
{	$('#globalNav > li').bind('mouseover', mainNav_open);
	$('#globalNav > li').bind('mouseout',  mainNav_timer);});

document.onclick = mainNav_close;

</script>



<!-- End try One -->


<!-- here is for form two -->
<script type="text/javascript">
function OnSubmitForm()
{
  if(document.myform.operation[0].checked == true)
  {
    document.myform.action ="insert.html";
  }
  else
  if(document.myform.operation[1].checked == true)
  {
    document.myform.action ="update.html";
  }
  return true;
}
</script>

</head>
<body>
<div id="page">
<div id="header">
        <h2 id="lhxc_logo"><a href="<?php echo get_option('home'); ?>/"><img src="http://forums.louisvillehardcore.com/styles/LHXC/imageset/site_logo.gif" alt="Louisville Hardcore" /></a></h2>
             
        <div id="globalLogins"><p>
        Forums: <a title="Register" href="http://forums.louisvillehardcore.com/ucp.php?mode=login">Login</a> | <a title="Register" href="http://forums.louisvillehardcore.com/ucp.php?mode=register">Register</a><br />
        History: <a href="http://history.louisvillehardcore.com/index.php?title=Special:Userlogin&returnto=Main_Page">Login</a> | <a title="Register" href="http://history.louisvillehardcore.com/index.php?title=Special:Userlogin&type=signup&returnto=Main_Page">Register</a>
        </p>
        </div>
               <div class="clear"></div>   
<ul id="globalNav">
            <li<?php if (is_home()){ echo " id=\"current_nav\"";}?>><a href="http://www.louisvillehardcore.com/" title="Blog">Blog</a></li>
			<li><a href="http://history.louisvillehardcore.com/" title="History">History</a>
            	<ul>
                	<li><a href="http://history.louisvillehardcore.com/" title="Louisville Hardcore History Wiki" class="drop">Wiki</a></li>
                    <li><a href="http://www.louisvillehardcore.com/flyers/" title="Flyers" class="drop">Flyers</a></li>
                    <li><a href="http://www.louisvillehardcore.com/zines/" title="Zines" class="drop">Zines</a></li>
                </ul>
            </li>
            <li <?php if($currentFile==='products_page'){ echo "class='current'";}?>><a href="http://www.louisvillehardcore.com/products-page/" title="About">Store</a></li>
            <li <?php if($currentFile==='shows'){ echo "class='current'";}?>><a href="http://www.louisvillehardcore.com/shows" title="Louisville Punk, Hardcore, Indie Rock Underground Music Shows, Events, and Concerts">Shows</a></li>
            <li <?php if (is_page('contact')){ echo "class='current'";}?>><a href="http://www.louisvillehardcore.com/contact" title="Contact">Contact</a></li>
            <li><a href="http://forums.louisvillehardcore.com/" title="Forums">Forums</a></li>
			<li>
            
            	<span class="farts">
            
            <form name="LHxCSearch" action="../LHXC Default/return OnSubmitForm();" id="HeaderSearch">
            	<input id="HeaderSearchBox" type="text" value="Search LHxC" onclick="this.value=''"/>
                <input type="submit" id="searchsubmit" value="Search" />
                
                </span>
            	
                <ul id="SearchOptions">
                	<li><a href="javascript:void(0)" onclick="search_change('Blog')" class="drop"><input type="SUBMIT" name="Operation" onclick="document.pressed=this.value" value="Blog"></a></li>
                    <li><a href="javascript:void(0)" onclick="search_change('History')" class="drop">History</a></li>
                    <li><a href="javascript:void(0)" onclick="search_change('Forms')" class="drop">Forums</a></li>
            	</ul></form>
            </li>
            <li><a href="http://twitter.com/lhxc" title="Follow Louisville Hardcore on Twitter" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/twitterIcon.png" alt="Follow Louisville Hardcore on Twitter" /></a></li>
			</ul><!-- end globalNav -->
         
<!-- end #header --></div>
<hr />





<form name="myform" onsubmit="return OnSubmitForm();">
   name: <input type="text" name="name"><br>
   email: <input type="text" name="email"><br>
   <input type="radio" name="operation" value="1" checked>insert
   <input type="radio" name="operation" value="2">update
   <p>
   <input type="submit" name="submit" value="save">
   </p>
</form>
