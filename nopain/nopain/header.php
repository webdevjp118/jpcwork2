<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nopain
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/jquery-ui.css">
	<!-- Javascript -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery-1.12.4.min.js"><\/script>')</script>


</head>

<body <?php body_class(); ?>>
<!-- <div class="loader-wrapper"><div class="loader"></div></div> -->
<?php wp_body_open(); ?>
<div id="page" class="site">
	
<header class="site_header">
	<a class="header_logo" href="<?php echo get_site_url(); ?>">
		<img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.svg" alt="logo image">
	</a>
	<a href="javascript:void(0);" class="navbar_toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		<div class="navbar_toggler_inner"></div>
	</a>
	<nav class="custom_navbar">
		<a href="<?php echo get_site_url(); ?>" class="sidebar_logo">
			<img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.svg" alt="logo image">
		</a>
		<ul class="custom_navbar_links">
			<li>
				<p>痛みにお困りの方</p>
				<ul class="custom_navbar_inner_links">
					<li><a href="<?php echo get_site_url(); ?>/muscle/">線維筋痛症改善プログラム</a></li>
					<li><a href="<?php echo get_site_url(); ?>/joint/">顎関節症改善プログラム</a></li>
					<li><a href="<?php echo get_site_url(); ?>/numbness/">しびれ解消プログラム</a></li>
					<li><a href="<?php echo get_site_url(); ?>/explore/">治らない痛みの研究会®︎認定院を探す</a></li>
				</ul>
			</li>
			<li><a href="<?php echo get_site_url(); ?>/interest/" class="custom_navbar_last_links">疼痛改善に興味のある整骨院、鍼灸院、整体院の先生</a></li>
		</ul>
	</nav>
</header>
