<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package soulpre
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/pmhwp.css">
	<link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.png">

	<?php wp_head(); ?>
</head>

<body>
<?php wp_body_open(); ?>

<!-- <div class="loader-wrapper"><div class="loader"></div></div> -->
<header class="site_header">
	<a href="<?php echo get_site_url(); ?>/" class="logo_img">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" alt="logo image">
	</a>
	<a href="javascript:void(0);" class="navbar_toggler csp-1024" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		<div class="navbar_toggler_inner"></div>
	</a>
	<nav class="custom_navbar">
		<ul>
			<li>
				<a href="<?php echo get_site_url(); ?>/news/">NEWS<span>お知らせ</span></a>
			</li>
			<li>
				<a href="<?php echo get_site_url(); ?>/company">COMPANY<span>会社概要</span></a>
			</li>
			<li>
				<a href="<?php echo get_site_url(); ?>/product/">PRODUCTS<span>製品情報</span></a>
			</li>
			<li>
				<a href="<?php echo get_site_url(); ?>/column/">COLUMN<span>コラム</span></a>
			</li>
			<li class="number_btn">
				<a href="tel:0273816594"><i class="fas fa-phone-alt"></i>027-381-6594</a>
			</li>
			<li class="inquiry_btn">
				<a href="<?php echo get_site_url(); ?>/contact/" class="font0"><i class="fas fa-envelope"></i>お問い合わせ</a>
			</li>
		</ul>
	</nav>
</header>