<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package paqingko
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">


	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/slick.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/pmhwp.css">
	<link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.png">

	<?php wp_head(); ?>
</head>

<body>
	<div class="loader-wrapper"><div class="loader"></div></div>
	<header class="site_header">
		<a href="<?php echo get_site_url(); ?>" class="logo_img">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" alt="logo images">
		</a>
		<!-- <a href="javascript:void(0);" class="navbar_toggler csp" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<div class="navbar_toggler_inner"></div>
		</a> -->
		<nav class="custom_navbar">
			<div class="custom_container">
				<ul>
					<li>
						<a href="<?php echo get_site_url(); ?>/kouyaka/">公約</a>
					</li>
					<li>
						<a href="https://mobile.twitter.com/tokai_slot" target="_blank">東海スロット情報</a>
					</li>
					<li>
						<a href="<?php echo get_site_url(); ?>/about/">東海来店情報</a>
					</li>
				</ul>
			</div>
		</nav>
	</header>
