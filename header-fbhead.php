<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    
<!-- SEO Stuff - Keywords, Description lower thanks to SEO plugin -->
<title>Louisville Hardcore/Punk/Indie Rock.com - <?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?> | Louisville, KY punk, hardcore, indie rock underground music </title>

<meta name="alexaVerifyID" content="zlUVHSl6hh0Lu0yPHm5Fb1q_-vA" />
<meta name="viewport" content="width=device-width, initial-scale=.9" />

<!-- Styles, RSS, Icons -->
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
<link rel="shortcut icon" href="http://images.louisvillehardcore.com/favicon.ico"/>
<link rel="apple-touch-icon" href="http://www.louisvillehardcore.com/iPhoneIcon.ico"/>

<!-- Comments are disallowed, but keep this for trackbacks -->
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<!-- Inserted Code -->
<?php wp_head(); ?>
<!-- JS -->
</head>
<body <?php if(is_page('1562')) { print 'class="FB"'; };?>>
<div id="page">
<div id="header">
   <a href="<?php echo get_option('home'); ?>/" style="width:305px;height:90px;border:none; position:relative; float:left;"><img src="http://louisvillehardcore.com/test/img/lhxc_logo.png" alt="Louisville Hardcore"></a>
            
   <div id="global_nav">
			<ul class="nav_slider">
            <li <?php if (is_page('contact')){ echo "class='current'";}?>><a href="http://www.louisvillehardcore.com/contact" title="Contact">Contact</a></li>
            <li><a href="http://forums.louisvillehardcore.com/" title="Forums">Forums</a></li>
            <!-- <li <?php if($currentFile==='products_page'){ echo "class='current'";}?>><a href="http://www.louisvillehardcore.com/products-page/" title="About">Store</a></li> -->
            <li><a href="http://www.louisvillehardcore.com/flyers/" title="Flyers">Flyers</a></li>
            <li <?php if($currentFile==='shows'){ echo "class='current'";}?>><a href="http://www.louisvillehardcore.com/shows" title="Louisville Punk, Hardcore, Indie Rock Underground Music Shows, Events, and Concerts">Shows</a></li>
            <li><a href="http://history.louisvillehardcore.com/" title="History">History</a></li>
            <li<?php if (is_home()){ echo " id=\"current_nav\"";}?>><a href="http://www.louisvillehardcore.com/" title="Blog">Blog</a></li>
			</ul>
   </div>
         
         <!-- end banner --></div>
<!-- end #header --></div>