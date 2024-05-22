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
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<?php wp_head(); ?>

	<!-- Javascript -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery-1.12.4.min.js"><\/script>')</script>

</head>

<body <?php body_class(['transition']); ?>>
<div id="loader-wrapper"><div id="loader"></div></div>
<?php wp_body_open(); ?>
<div id="page" class="site">
<div class="scroll_header">
	<div class="medium_custom_container">
		<div class="custom_row logo_header">
			<div class="scrollh_logo">
				<a href="<?php echo get_site_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png"></a>
			</div>
			<div class="scrollh_phone_number">
				<span>TEL.</span>
				<a href="tel:090-8377-8050">090-8377-8050</a>
			</div>
			<div class="scrollh_social_link_box">
				<div class="custom_row">
					<div class="scrollh_social_link">
						<a href="https://twitter.com/luminouspa_1">
							<svg xmlns="http://www.w3.org/2000/svg" width="21.297" height="17.297" viewBox="0 0 21.297 17.297">
								<path id="Icon_awesome-twitter" data-name="Icon awesome-twitter" d="M19.107,7.691c.014.189.014.378.014.568A12.333,12.333,0,0,1,6.7,20.677,12.334,12.334,0,0,1,0,18.718a9.029,9.029,0,0,0,1.054.054,8.741,8.741,0,0,0,5.419-1.865A4.372,4.372,0,0,1,2.392,13.88a5.5,5.5,0,0,0,.824.068A4.616,4.616,0,0,0,4.365,13.8a4.365,4.365,0,0,1-3.5-4.284V9.462a4.4,4.4,0,0,0,1.973.554A4.371,4.371,0,0,1,1.486,4.178a12.407,12.407,0,0,0,9,4.567,4.927,4.927,0,0,1-.108-1,4.369,4.369,0,0,1,7.554-2.986A8.593,8.593,0,0,0,20.7,3.705,4.353,4.353,0,0,1,18.783,6.11,8.75,8.75,0,0,0,21.3,5.435a9.382,9.382,0,0,1-2.189,2.257Z" transform="translate(0 -3.381)" fill="#fff"/>
							</svg>
						</a>
						<a href="#">
							<svg xmlns="http://www.w3.org/2000/svg" width="21.097" height="20.092" viewBox="0 0 21.097 20.092">
								<path id="Icon_simple-line" data-name="Icon simple-line" d="M17.023,9.025a.554.554,0,0,1,0,1.108H15.48v.989h1.543a.553.553,0,1,1,0,1.107h-2.1a.555.555,0,0,1-.551-.553V7.483a.555.555,0,0,1,.554-.554h2.1a.554.554,0,0,1,0,1.108H15.48v.989h1.543Zm-3.389,2.651a.553.553,0,0,1-.38.524.568.568,0,0,1-.175.027.544.544,0,0,1-.448-.22L10.484,9.092v2.584a.552.552,0,1,1-1.1,0V7.483a.551.551,0,0,1,.378-.523.511.511,0,0,1,.171-.029.569.569,0,0,1,.435.223l2.164,2.927v-2.6a.554.554,0,1,1,1.108,0v4.194Zm-5.047,0a.553.553,0,1,1-1.106,0V7.483a.553.553,0,1,1,1.106,0Zm-2.168.553h-2.1a.557.557,0,0,1-.554-.553V7.483a.554.554,0,1,1,1.108,0v3.64H6.42a.553.553,0,0,1,0,1.107M21.1,9.422C21.1,4.7,16.364.858,10.549.858S0,4.7,0,9.422c0,4.229,3.754,7.773,8.821,8.446.344.072.811.227.93.519a2.147,2.147,0,0,1,.033.949l-.144.9c-.04.265-.211,1.043.922.567a34.005,34.005,0,0,0,8.295-6.131A7.58,7.58,0,0,0,21.1,9.422" transform="translate(0 -0.858)" fill="#fff"/>
							</svg>
						</a>
					</div>
					<div class="scrollh_social_details">
						<div class="scrollh_open_btn">
							<p>open</p>
						</div>
						<div class="scrollh_open_time">
							<h6>10:00～翌3:00</h6>
							<p>（受付時間9:00～24:00）</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="gmenu">
		<ul>
			<li>
				<a href="<?php echo get_site_url(); ?>">
					HOME
					<span>ホーム</span>
				</a>
			</li>
			<li>
				<a href="<?php echo get_site_url(); ?>/#system_price">
					SYSTEM&PRICE
					<span>料金システム</span>
				</a>
			</li>
			<li>
				<a href="<?php echo get_site_url(); ?>/therapist">
					THERAPIST
					<span>セラピスト一覧</span>
				</a>
			</li>
			<li>
				<a href="<?php echo get_site_url(); ?>/#access_sec">
					ACCESS
					<span>アクセス</span>
				</a>
			</li>
			<li>
				<a href="#">
					BLOG
					<span>ブログ</span>
				</a>
			</li>
			<li class="contact_link">
				<a href="<?php echo get_site_url(); ?>/contact-us/">
					CONTACT
					<span>ご予約&amp;お問い合わせ</span>
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/contact-right-btn.png">
				</a>
			</li>
		</ul>
	</div>
</div>
<div class="gmenu fixed" id="floating">
	<ul>
		<li>
			<a href="<?php echo get_site_url(); ?>">
				HOME
				<span>ホーム</span>
			</a>
		</li>
		<li>
			<a href="<?php echo get_site_url(); ?>/#system_price">
				SYSTEM&PRICE
				<span>料金システム</span>
			</a>
		</li>
		<li>
			<a href="<?php echo get_site_url(); ?>/therapist/">
				THERAPIST
				<span>セラピスト一覧</span>
			</a>
		</li>
		<li>
			<a href="<?php get_site_url(); ?>/#access_sec">
				ACCESS
				<span>アクセス</span>
			</a>
		</li>
		<li>
			<a href="#">
				BLOG
				<span>ブログ</span>
			</a>
		</li>
		<li class="contact_link">
			<a href="<?php echo get_site_url(); ?>/contact-us/">
				CONTACT
				<span>ご予約&amp;お問い合わせ</span>
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/contact-right-btn.png">
			</a>
		</li>
	</ul>
</div>
<div class="toggler_wrap">
	<div class="toggler_rel">
		<button class="navbar-toggler">
			<div class="navbar-toggler-inner"></div>
		</button>
	</div>
</div>
<div class="spscroll_header">
	<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png">
</div>
<div class="spmenu_wrap">
	<div class="spscroll_header">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png">
	</div>
	<div class="spmenu_content">
		<div class="spmenu_links">
			<ul>
				<li>
					<a href="<?php echo get_site_url(); ?>">
						HOME
					</a>
				</li>
				<li>
					<a href="<?php echo get_site_url(); ?>/system_price">
						SYSTEM&PRICE
					</a>
				</li>
				<li>
					<a href="<?php echo get_site_url(); ?>/therapist/">
						THERAPIST
					</a>
				</li>
				<li>
					<a href="<?php echo get_site_url(); ?>/#access_sec">
						ACCESS
					</a>
				</li>
				<li>
					<a href="#">
						BLOG
					</a>
				</li>
				<li class="contact_li">
					<a href="<?php echo get_site_url(); ?>/contact-us/">
						CONTACT
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/contact-right-btn.png">
					</a>
				</li>
			</ul>
		</div>
		<div class="spmenu_text">
			<h4>LUMINOUS SPA OSAKA</h4>
			<h5>堺筋本町ルーム</h5>
			<h6>〒550-0014 大阪市中央区博労町 </h6>
			<p>※詳細な所在地については、ご予約時にお問い合わせください</p>
			<h6>「堺筋本町駅」より徒歩5分</h6>
			<h6>「長堀橋駅」  より徒歩7分</h6>
		</div>
		<div class="spmenu_social_icon">
			<ul>
				<li>
					<a href="tel:090-8377-8050"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-call-white.png"></a>
				</li>
				<li>
					<a href="https://twitter.com/luminouspa_1"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Icon-twitter-white.png"></a>
				</li>
				<li>
					<a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Icon-line.png"></a>
				</li>
			</ul>
		</div>	
	</div>
</div>

<header>
</header>

<div class="scrollpos" id="floating-1"></div>
