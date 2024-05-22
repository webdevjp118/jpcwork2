<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 * <link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/uddigikyokashonk-r-03.woff2" as="font" type="font/woff2" crossorigin="anonymous">
 * <link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/UDDigiKyokashoNK-B.woff2" as="font" type="font/woff2" crossorigin="anonymous">
	
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ninibaikyaku
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/slick.css">
	<?php wp_head(); ?>

<!-- Javascript -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery-1.12.4.min.js"><\/script>')</script>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-589V7K3');</script>
<!-- End Google Tag Manager -->
<!-- heatmap 任意売却Dr. -->
<script>
!function(e,t,a,n,r,p,o){e.exheat=r,e[r]=e[r]||function(){
(e[r].q=e[r].q||[]).push(Array.prototype.join.apply(arguments))},
p=t.createElement(a),o=t.getElementsByTagName(a)[0],p.async=1,
p.src="https://heatmap.emma.tools/exheat.min.js",
o.parentNode.insertBefore(p,o)}(window,document,"script",0,"setTracker");
setTracker("pAdMlDsa");
</script>
<!-- /heatmap -->
</head>

<body <?php body_class(['transition']); ?>>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-589V7K3" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div class="page_top_pos" id="id_page_top"></div>
<div id="loader-wrapper"><div id="loader"></div></div>
<?php wp_body_open(); ?>
<div id="page" class="site">
<!-- navbar -->
<div class="top_navbar">
	<div class="medium_custom_container">
		<ul>
			<li>
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/call-icon.png">
				<a href="tel:0120-109-506">0120-109-506</a>
			</li>
			<li>
				<a href="tel:0120-109-506" class="top_navbar_time_link">9:00-20:00 土日祝OK</a>
			</li>
			<li>
				<a href="<?php echo get_site_url(); ?>/contact" class="top_nav_red_box">お問い合わせフォーム</a>
			</li>
		</ul>
	</div>
</div>
<div class="sp_top_navbar">
	<div class="sp_top_navbar_wrap">
		<div class="phone_time">
			<div class="phone_wrap">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/call-icon.png">
				<a href="tel:0120-109-506">0120-109-506</a>
			</div>
			<div class="time_wrap">
				9:00-20:00 土日祝OK
			</div>
		</div>
		<div class="ocontact_wrap">
			<a href="<?php echo get_site_url(); ?>/contact/">お問い合わせ<br>フォーム</a>
		</div>
	</div>
</div>
<div class="toggler_wrap">
	<div class="navbar_toggler">
		<button class="navbar-toggler ml-auto collapsed" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<div class="navbar-toggler-inner"></div>
		</button>
	</div>
</div>
<div class="sp_menu_wrap">
	<div class="sp_menu">
		<ul>
			<li>
				<a href="<?php echo get_site_url(); ?>/concept/">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Mortgage.png">
					住宅ローン滞納と任意売却
				</a>
			</li>
			<li>
				<a href="<?php echo get_site_url(); ?>/service/">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/service.png">
					任意売却Dr.のサービス
				</a>
			</li>
			<li>
				<a href="<?php echo get_site_url(); ?>/step/">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/resolution.png">
					ご相談から解決までの流れ
				</a>
			</li>
			<li>
				<a href="<?php echo get_site_url(); ?>/vision/">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/thoughts.png">
					私たちの想い
				</a>
			</li>
			<li>
				<a href="<?php echo get_site_url(); ?>/video/">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/videos.png">
					動画で学ぼう！
				</a>
			</li>
			<li>
				<a href="<?php echo get_site_url(); ?>/faq/">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/faq.png">
					よくある質問
				</a>
			</li>
			<li>
				<a href="<?php echo get_site_url(); ?>/reviews/">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/customer.png">
					お客様の声
				</a>
			</li>
			<li>
				<a href="<?php echo get_site_url(); ?>/medias/">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/publication.png">
					メディア掲載
				</a>
			</li>
			<li>
				<a href="<?php echo get_site_url(); ?>/company/">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/menu_company.png">
					会社概要
				</a>
			</li>
		</ul>
	</div>
	<div class="sp_menu_arch"></div>
</div>
<header>
	<div class="bottom_navbar">
		<nav>
			<div class="medium_custom_container">
				<div class="logo">
					<a href="https://ninibaikyaku-dr.com/">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png">
					</a>
				</div>
				<div class="navbar_links">
					<ul>
						<li>
							<a href="<?php echo get_site_url(); ?>/concept/">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Mortgage.png">
								住宅ローン滞納と<br>任意売却
							</a>
						</li>
						<li>
							<a href="<?php echo get_site_url(); ?>/service/">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/service.png">
								任意売却Dr.の<br>サービス
							</a>
						</li>
						<li>
							<a href="<?php echo get_site_url(); ?>/step/">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/resolution.png">
								ご相談から<br>解決までの流れ
							</a>
						</li>
						<li>
							<a href="<?php echo get_site_url(); ?>/vision/">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/thoughts.png">
								私たちの想い
							</a>
						</li>
						<li>
							<a href="<?php echo get_site_url(); ?>/video/">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/videos.png">
								動画で学ぼう！
							</a>
						</li>
						<li>
							<a href="<?php echo get_site_url(); ?>/faq/">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/faq.png">
								よくある質問
							</a>
						</li>
						<li>
							<a href="<?php echo get_site_url(); ?>/reviews/">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/customer.png">
								お客様の声
							</a>
						</li>
						<li>
							<a href="<?php echo get_site_url(); ?>/medias/">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/publication.png">
								メディア掲載
							</a>
						</li>
						<li>
							<a href="<?php echo get_site_url(); ?>/company/">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/menu_company.png">
								会社概要
							</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</div>
</header>