<?php
/**
 * @package LHXC
 * @subpackage Default_Theme
 */
?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Louisville Hardcore/Punk/Indie Rock.com - <?php wp_title('&laquo;', true, 'right');?> <?php bloginfo('name');?> | Louisville, KY punk, hardcore, indie rock underground music </title>

  <meta name="alexaVerifyID" content="zlUVHSl6hh0Lu0yPHm5Fb1q_-vA" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Styles, RSS, Icons -->
  <?= wp_enqueue_style( 'site', get_template_directory_uri() . '/css/site.css', false, '1.1', 'all'); ?>
  <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name');?> RSS Feed" href="<?php bloginfo('rss2_url');?>" />
  <link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name');?> Atom Feed" href="<?php bloginfo('atom_url');?>" />
  <link rel="pingback" href="<?php bloginfo('pingback_url');?>"/>
  <link rel="shortcut icon" href="http://images.louisvillehardcore.com/favicon.ico"/>
  <link rel="apple-touch-icon" href="http://www.louisvillehardcore.com/iPhoneIcon.ico"/>
  <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>

<!-- Comments are disallowed, but keep this for trackbacks -->
<?php if (is_singular()) {
    wp_enqueue_script('comment-reply');
}
?>

<!-- Inserted Code -->
<?php wp_head();?>

</head>
<body <?php if (is_page('1562')) {print 'class="FB"';};?>>
<div id="page" class="page-wrapper">
<header id="header" class="main-header">
  <a href="<?php echo get_option('home'); ?>/">
    <img src="http://forums.louisvillehardcore.com/styles/LHXC/imageset/site_logo.gif" alt="Louisville Hardcore" class="site-logo">
  </a>

  <button class="menu-toggle" aria-label="Mobile Navigation Toggle" tabindex="0" aria-label="Click to toggle mobile site navigation" aria-controls="global_nav">&nbsp;</button>

  <nav id="global_nav" class="main-nav">
    <?php echo wp_nav_menu('primary', 'main-nav', 'main-nav', 'ul'); ?>
  </nav>
</header>