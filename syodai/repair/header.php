<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package repair
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/slick.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/mCustomScrollbar.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/init.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/pmhwp.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/style.css">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<svg aria-hidden="true" style="display: none;" version="1.1" xmlns="http://www.w3.org/2000/svg">
	<symbol id="svg_r_arrow0" viewbox="0 0 50 50">
		<path d="M-57.837,537.938l12.817,9.076-12.817,9.043-1.106-2.375,9.759-6.669-9.759-6.734Z" transform="translate(77.943 -521.998)"/>
	</symbol>
	<symbol id="svg_r_arrow1" viewBox="0 0 14 18">
  		<path d="M0,15.72,1.2,18,14,9,1.2,0,.02,2.31,9.83,8.98Z"/>
	</symbol>
	<symbol id="svg_file" viewbox="0 0 30 30">
		<path d="M21,5.7c0-1.4-.5-1.8-1.9-1.8H11.2L10,0H1.9C.4,0,0,.4,0,1.9V17.1C0,18.6.4,19,1.9,19H19.1c1.5,0,1.9-.4,1.9-1.9V5.7ZM18.5,16.8H2.5V6.9h16Z" transform="translate(5 5)"/>
	</symbol>
	<symbol id="svg_l_arrow0" viewBox="0 0 50 50">
  		<path d="M14,15.72,12.8,18,0,9,12.8,0l1.18,2.31L4.17,8.98Z" transform="translate(16 16)"/>
	</symbol>
	<symbol id="svg_map_mark0"  viewBox="0 0 26 36">
		<path d="M13.127.19h-.26C5.777.234-.62,7.837.045,15.543.637,25.823,5.994,27.592,12.954,36.19h.087C20,27.577,25.357,25.808,25.95,15.543,26.614,7.837,20.217.234,13.127.19ZM13,19.433a5.9,5.9,0,0,1-5.675-6.112A5.9,5.9,0,0,1,13,7.209a5.9,5.9,0,0,1,5.675,6.112A5.9,5.9,0,0,1,13,19.433Z"/>
	</symbol>
	<symbol id="svg_d_arrow0" viewBox="0 0 18 18">
		<path d="M14,15.72,12.8,18,0,9,12.8,0l1.18,2.31L4.17,8.98Z" transform="translate(0 16) rotate(-90)"/>
	</symbol>

</svg>


<div class="loader-wrapper">
	<div class="loader-logo"></div>
	<div class="loader-circle"></div>
</div>
<div class="api-loader-wrapper">
	<div class="api-loader-logo"></div>
	<div class="api-loader-circle"></div>
</div>
<div class="global_vars" data-theme_uri="<?php echo get_stylesheet_directory_uri(); ?>"></div>
<header class="site_header">
	<a class="header_logo" href="<?php echo get_site_url(); ?>/">
		<p>お店選びで失敗したくない人のためのスマートフォン・タブレット修理店探しサイト</p>
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.svg" alt="logo image">
	</a>
	<a href="javascript:void(0);" class="navbar_toggler csp-1166" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		<div class="navbar_toggler_inner"></div>
	</a>
	<nav class="custom_navbar">
		<ul>
			<li>
				<a href="<?php echo get_site_url(); ?>">
					<img class="cpc1166" src="<?php echo get_stylesheet_directory_uri(); ?>/images/menu_thewlis.svg">
					<img class="csp1166" src="<?php echo get_stylesheet_directory_uri(); ?>/images/menu_thewlis_m.svg">
					<span>シューリスについて</span>
					<img class="csp1166" src="<?php echo get_stylesheet_directory_uri(); ?>/images/right_arrow1.svg">
				</a>
			</li>
			<li>
				<a href="<?php echo get_site_url(); ?>/category/often-case/">
					<img class="cpc1166" src="<?php echo get_stylesheet_directory_uri(); ?>/images/menu_case.svg">
					<img class="csp1166" src="<?php echo get_stylesheet_directory_uri(); ?>/images/menu_case_m.svg">
					<span>よくある症状</span>
					<img class="csp1166" src="<?php echo get_stylesheet_directory_uri(); ?>/images/right_arrow1.svg">
				</a>
			</li>
			<li>
				<a href="<?php echo get_site_url(); ?>/category/help-info/">
					<img class="cpc1166" src="<?php echo get_stylesheet_directory_uri(); ?>/images/menu_msg.svg">
					<img class="csp1166" src="<?php echo get_stylesheet_directory_uri(); ?>/images/menu_msg_m.svg">
					<span>お役立ち情報</span>
					<img class="csp1166" src="<?php echo get_stylesheet_directory_uri(); ?>/images/right_arrow1.svg">
				</a>
			</li>
			<li>
				<a href="<?php echo get_site_url(); ?>/blog/">
					<img class="cpc1166" src="<?php echo get_stylesheet_directory_uri(); ?>/images/menu_doc.svg">
					<img class="csp1166" src="<?php echo get_stylesheet_directory_uri(); ?>/images/menu_doc_m.svg">
					<span>記事一覧</span>
					<img class="csp1166" src="<?php echo get_stylesheet_directory_uri(); ?>/images/right_arrow1.svg">
				</a>
			</li>
		</ul>
	</nav>
</header>