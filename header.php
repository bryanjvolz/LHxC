<?php
/**
 * Header template for LHXC Theme
 *
 * @package LHXC
 * @subpackage Default_Theme
 */

?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>Louisville Hardcore/Punk/Indie Rock.com - <?php wp_title( '&laquo;', true, 'right' ); ?> <?php bloginfo( 'name' ); ?> | Louisville, KY punk, hardcore, indie rock underground music </title>

	<meta name="alexaVerifyID" content="zlUVHSl6hh0Lu0yPHm5Fb1q_-vA" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Styles, RSS, Icons -->
	<?php echo esc_html( wp_enqueue_style( 'site', get_template_directory_uri() . '/css/site.css', false, '1.1', 'all' ) ); ?>
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?> RSS Feed" href="<?php bloginfo( 'rss2_url' ); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo( 'name' ); ?> Atom Feed" href="<?php bloginfo( 'atom_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"/>
	<?php wp_enqueue_style( 'google_fonts', 'https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic', array(), gmdate( 'WY' ) ); ?>

	<!--Favicons, web manifest-->
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_html( get_template_directory_uri() ); ?>/images/favicons/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_html( get_template_directory_uri() ); ?>/images/favicons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_html( get_template_directory_uri() ); ?>/images/favicons/favicon-16x16.png">
	<link rel="manifest" href="<?php echo esc_html( get_template_directory_uri() ); ?>/images/favicons/site.webmanifest">
	<link rel="mask-icon" href="<?php echo esc_html( get_template_directory_uri() ); ?>/images/favicons/safari-pinned-tab.svg" color="#3c2e23">
	<meta name="msapplication-TileColor" content="#f3f1e9">
	<meta name="theme-color" content="#ffffff">

<!-- Comments are disallowed, but keep this for trackbacks -->
<?php
if ( is_singular() ) {
	wp_enqueue_script( 'comment-reply' );
}
?>

<!-- Inserted Code -->
<?php wp_head(); ?>

</head>
<body>
<div id="page" class="page-wrapper">
<header id="header" class="main-header">
	<a href="<?php echo esc_html( get_option( 'home' ) ); ?>/"  aria-label="<?php bloginfo( 'name' ); ?>">
	<img src="<?php echo esc_html( get_template_directory_uri() ); ?>/images/lhxc-logo.svg" alt="<?php bloginfo( 'name' ); ?>" class="site-logo">
	</a>

	<button class="menu-toggle" aria-label="Mobile Navigation Toggle" tabindex="0" aria-label="Click to toggle mobile site navigation" aria-controls="global_nav">&nbsp;</button>

	<nav id="global_nav" class="main-nav" aria-label="Main Nav">
	<?php echo wp_nav_menu( 'primary', 'main-nav', 'main-nav', 'ul' ); ?>
	</nav>
</header>