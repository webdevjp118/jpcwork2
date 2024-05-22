<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package luminouspa-new
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

<?php wp_head(); ?>

	<!-- Javascript -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery-1.12.4.min.js"><\/script>')</script>

</head>

<body <?php body_class(['transition']); ?>>
<div id="loader-wrapper"><div id="loader"></div></div>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<header style="content:''; width:100%; height: 100px; background-color:#EEEEEE; display:flex;justify-content:center;align-items:center">
		Header
	</header>
