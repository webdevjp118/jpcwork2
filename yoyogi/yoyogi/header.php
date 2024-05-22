<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Yoyogi
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta name="description" content="学習特化型の放課後等デイサービス。学習と運動に注力。「ダンス教室」や「プログラミング教室」、「理科実験」「体操教室」「ＳＳＴ」「言語訓練」「算数ラボ」「論理エンジン」「ボクササイズ」「野外活動」「発達診断レポート」なども">

    <META NAME="robots" CONTENT="ALL">

    <meta name="keywords" content="学習,放課後等デイサービス,発達障害,ADHD,学習障害,自閉症,ASD,学習塾,長崎市,長与町,時津町,長崎県">

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="icon" type="image/svg" href="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.svg">

	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/slick.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/font.css" />

	<?php wp_head(); ?>

	<!-- Javascript -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery-1.12.4.min.js"><\/script>')</script>

</head>
<?php $bodyclass= array('transition'); ?>
<body <?php body_class($bodyclass); ?>>
<div id="loader-wrapper"><div id="loader"></div></div>
<?php wp_body_open(); ?>
<div id="page" class="site">
<!-- MAIN -->
<main id="main" class="home-page">

<!-- HEADER -->
<header id="header">
	<div class="header-addr-logo-school cpc">
		<div class="header-addr">
			<p>よよぎは、長崎市万屋町、長崎市松山町、<br/>
				西彼長与町の放課後等デイサービスです。</p>
		</div>
		<div class="header-logo">
			<a href="index.html">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_pc.svg" />
			</a>
		</div>
		<div class="header-contact">
			<a href="<?php echo get_site_url(); ?>/contact" class="header-contact-btn">
				<i class="fa fa-envelope" aria-hidden="true"></i>
				<span>お問い合わせ</span>
			</a>
			<ul>
				<li><span>長与校</span> <a href="tel:+0958014194">095-801-4194</a></li>
				<li><span>松山校</span> <a href="tel:+0958947156">095-894-7156</a></li>
				<li><span>浜の町校</span> <a href="tel:+0958935033">095-893-5033</a></li>
				<li><span>葉山校</span> <a href="tel:+09031951219">095-800-6307</a></li>
			</ul>
		</div>
	</div>
	<nav class="header-nav">
		<div class="header-logo csp">
			<a href="index.html">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_sp.svg" />
			</a>
		</div>
		<div class="header-cont-rgt">
			<a href="<?php echo get_site_url(); ?>/contact" class="header-contact-btn csp">
				<i class="fa fa-envelope" aria-hidden="true"></i>
				<span>お問い合わせ</span>
			</a>
			<ul class="header-menu">
				<li>
					<a href="<?php echo get_site_url(); ?>">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/menu-01.png" />
						トップページ
					</a>
				</li>
				<li>
					<a href="<?php echo get_site_url(); ?>/service">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/menu-02.png" />
						ご利用の流れ
					</a>
				</li>
				<li>
					<a href="<?php echo get_site_url(); ?>/event">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/menu-03.png" />
						活動紹介
					</a>
				</li>
				<li class="last-child">
					<a href="<?php echo get_site_url(); ?>/table">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/menu-04.png" />
						評価表（アンケート）/マニュアル
					</a>
				</li>
				<div class="header-contact csp">
					<ul>
						<li><span>長与校</span> <a href="tel:+0958014194">095-801-4194</a></li>
						<li><span>松山校</span> <a href="tel:+0958947156">095-894-7156</a></li>
						<li><span>浜の町校</span> <a href="tel:+0958935033">095-893-5033</a></li>
						<li><span>葉山校</span> <a href="tel:+09031951219">095-800-6307</a></li>
					</ul>
				</div>
			</ul>
			<button class="menu-toggle-btn csp">
				<span></span>
			</button>
		</div>
	</nav>
</header>

<!-- MAIN-CONTENT -->
<section class="main-content" id="main-content">


<section class="banner-slider-sec">
	<div class="banner-slider-nav">
		<div class="banner-slider-itm">
			<div class="img">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/slide01.jpg" />
				<span style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/slide01.jpg');"></span>
			</div>
		</div>
		<div class="banner-slider-itm">
			<div class="img">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/slide02.jpg" />
				<span style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/slide02.jpg');"></span>
			</div>
		</div>
		<div class="banner-slider-itm">
			<div class="img">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/slide03.jpg" />
				<span style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/slide03.jpg');"></span>
			</div>
		</div>
		<div class="banner-slider-itm">
			<div class="img">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/slide04.jpg" />
				<span style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/slide04.jpg');"></span>
			</div>
		</div>
		<div class="banner-slider-itm">
			<div class="img">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/slide05.jpg" />
				<span style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/slide05.jpg');"></span>
			</div>
		</div>
	</div>
</section>