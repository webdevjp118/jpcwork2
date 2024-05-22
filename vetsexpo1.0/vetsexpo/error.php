<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
	/* ==================== data ==================== */

	//初期設定
	//共通
	$siteURL = (empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"];
	$pageURL = (empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
	$sitename = "SiteName___replace";
	$keywords = "Keywords___replace";
	$description = "Description___replace";

	//ページ設定
	$bodyClass = "transition contents contact";
	$pagename = "ご予約";
	$pagekeywords = "";
	$pageDescription = "";
	$pageOgpImg = "";

	/* ==================== /data ==================== */
?>
<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<!DOCTYPE html>
<html lang="ja">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">


<!-- Global site tag (gtag.js) - Google Analytics ___replace-->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-166622808-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-166622808-1');
</script>


<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="format-detection" content="email=no,telephone=no,address=no">
<meta name="viewport" content="width=device-width,initial-scale=1.0,shrink-to-fit=no">
<script type="text/javascript">
	if(!((navigator.userAgent.indexOf('iPhone') > 0) || navigator.userAgent.indexOf('iPod') > 0 || (navigator.userAgent.indexOf('Android') > 0 && navigator.userAgent.indexOf('Mobile') > 0))){
		document.write('<meta name="viewport" content="width=990">');
	}
</script>
<title>PageTitle___replace</title>
<meta name="robots" content="index,follow">
<meta name="keywords" content="keywords___replace">
<meta name="description" content="description___replace">
<!-- open graph protocol -->
<meta property="og:url" content="pageURL___replace">
<meta property="og:site_name" content="sitename___replace">
<meta property="og:title" content="pagetitle___replace">
<meta property="og:type" content="website/article___replace">
<meta property="og:description"  content="pageDescription___replace">
<meta property="og:image" content="ogImageUrl___replace">
<meta name="twitter:card" content="summary_large_image">

<!-- icon -->
<link rel="shortcut icon" href="/favicon.ico">
<link rel="apple-touch-icon-precomposed" href="/apple-touch-icon.png">
<!-- CSS -->
<link rel="stylesheet" href="css/cssreset.css">
<link rel="stylesheet" href="css/html5-doctor-reset-stylesheet.min.css">
<link rel="stylesheet" href="css/com.css">
<!-- Javascript -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery-1.12.4.min.js"><\/script>')</script>
<script defer src="js/com.js"></script>
<!-- intersection observer -->
<script defer src="js/intersection-observer-polyfill.js"></script>
<script>
$(function() {
	var observer = new IntersectionObserver(function(entries) {
		entries.forEach(function(e) {
			if (!e.isIntersecting) return;
			e.target.classList.add('move'); // 交差した時の処理
			observer.unobserve(e.target);
			// target element:
		    //   e.target				ターゲット
		    //   e.isIntersecting		交差しているかどうか
		    //   e.intersectionRatio	交差している領域の割合
		    //   e.intersectionRect		交差領域のgetBoundingClientRect()
		    //   e.boundingClientRect	ターゲットのgetBoundingClientRect()
		    //   e.rootBounds			ルートのgetBoundingClientRect()
		    //   e.time					変更が起こったタイムスタンプ
		})

	},{
    	// オプション設定
		rootMargin: '0px 0px -5% 0px' //下端から5%入ったところで発火
		//threshold: [0, 0.5, 1.0]
	});

	var target = document.querySelectorAll('.io'); //監視したい要素をNodeListで取得
	for(var i = 0; i < target.length; i++ ) {
	    observer.observe(target[i]); // 要素の監視を開始
	}

	//アニメーションによる各要素のはみ出しを解消
	$("body").wrapInner("<div style='overflow:hidden;'></div>");

});
</script>
<!-- matchHeight -->
<script defer src="js/jquery.matchHeight.js"></script>
<script>
$(function() {
	$(window).on('load',function(){
		$(".contents_nav ul > li").matchHeight();
	});
});
</script>
<!-- GoogleMap iFrame-->
<!-- <script>
	$(window).on('load', function(){
		$('.footer_map').append('<iframe src="" frameborder="0" style="border:0" allowfullscreen></iframe>');
	});
</script> -->
<!--svgxuse for IE -->
<script defer src="js/svgxuse.js"></script>
<!--[if lt IE 9]>
<script src="js/IE9.js"></script>
<script src="js/html5shiv.js"></script>
<script>
	document.createElement('main');
</script>
<![endif]-->



<link rel="stylesheet" href="css/main.css">
</head>
<body id="PAGETOP" class="transition contents contact">

<?php require('images/com.svg'); ?>

<div id="loader-wrapper"><div id="loader"></div></div>
<header>
	<ul class="language">
		<li><a href="/">JP</a></li>
		<li><a href="/en/">EN</a></li>
		<li><a href="/ch/">CH</a></li>
	</ul>
	
	<div class="header_bar">
		<h1><a href="/"><img src="images/logo_head.svg" alt="<?php echo $sitename;?>"></a></h1>
		<ul class="header_logo">
			<li><a href="/menu1/">Menu1</a></li>
			<li><a href="/menu2/">Menu2</a></li>
			<li><a href="/menu3/">Menu3</a></li>
		</ul>
	</div><!-- /header_bar -->
	
	<div id="nav_btnwrapper"><div id="nav_btn"><span id="nav_btn_icon"></span></div></div>
	<nav>
		<div class="nav_inner">
			<a href="/"><img src="images/logo_nav.svg" alt="sitename____replace"></a>
			<ul>
				<li><span><a href="/Menu1">Menu1</a></span></li>
				<li>
					<span class="sp_toggle"><a href="/menu1/">Menu1</a></span>
					<ol>
						<li><a href="/menu2/submenu1"><svg><use xlink:href="#arrow_right"></use></svg>Menu2_Sub1</a></li>
						<li><a href="/menu2/submenu2"><svg><use xlink:href="#arrow_right"></use></svg>Menu2_Sub2</a></li>
						<li><a href="/menu2/submenu3"><svg><use xlink:href="#arrow_right"></use></svg>Menu2_Sub3</a></li>
					</ol>
				</li>
				<li>
					<span class="sp_toggle"><a href="/menu2/">Menu2</a></span>
					<ol>
						<li><a href="/menu3/submenu1"><svg><use xlink:href="#arrow_right"></use></svg>Menu3_Sub1</a></li>
						<li><a href="/menu3/submenu2"><svg><use xlink:href="#arrow_right"></use></svg>Menu3_Sub2</a></li>
						<li><a href="/menu3/submenu3"><svg><use xlink:href="#arrow_right"></use></svg>Menu3_Sub3</a></li>
						<li><a href="/menu3/submenu4"><svg><use xlink:href="#arrow_right"></use></svg>Menu3_Sub4</a></li>
					</ol>
				</li>
				<li>
				<span class="sp_toggle"><a href="/menu3/">Menu3</a></span>
					<ol>
						<li><a href="/menu4/submenu1"><svg><use xlink:href="#arrow_right"></use></svg>Menu4_Sub1</a></li>
						<li><a href="/menu4/submenu2"><svg><use xlink:href="#arrow_right"></use></svg>Menu4_Sub2</a></li>
						<li><a href="/menu4/submenu3"><svg><use xlink:href="#arrow_right"></use></svg>Menu4_Sub3</a></li>
						<li><a href="/menu4/submenu4"><svg><use xlink:href="#arrow_right"></use></svg>Menu4_Sub4</a></li>
					</ol>
				</li>

				<li><span><a href="/menu5">Menu5</a></span></li>
			</ul>
			<ul>
				<li><span><a href="/sidemenu1/">SideMenu1</a></span></li>
				<li><span><a href="/sidemenu2/">SideMenu2</a></span></li>
				<li><span><a href="/sidemenu3/">SideMenu3</a></span></li>
				<li><span><a href="/sidemenu4/">SideMenu4</a></span></li>
				<li><span><a href="/sidemenu5/">SideMenu5</a></span></li>
				<li class="nav_btn"><span><a href="/button1/">Button1<svg class="arrow_btn"><use xlink:href="#arrow_btn"></use></svg></a></span></li>
				<li class="nav_btn"><span><a href="/button2/">Button2<svg class="arrow_btn"><use xlink:href="#arrow_btn"></use></svg></a></span></li>
			</ul>
		</div>
	</nav>
</header>



<main>
	<section class="pankuzu"><div class="inner"><a href="/">TOP</a>&nbsp;&gt;&nbsp;<?php echo $pagename;?></div></section>
	<section class="contents_ttl">
		<h2><?php echo $pagename;?></h2>
	</section>
	<section class="inner">
		<div class="contactCotainer">
			<p class="message">エラー： 不正な画面遷移が検出されました。<br>最初からやり直してください。</p>
			<div class="topBtn"><a href="./">&raquo;&nbsp;入力画面に戻る</a></div>
		</div><!-- /contactCotainer -->
	</section><!-- /inner -->
</main>

<section class="contents_nav inner">
	<ul class="io fade upS">
		<li>
			<a href="/menu1/" class="flex_container">Menu1<small>Menu1</small></a>
			<ol>
				<li><a href="/menu1/sub1"><svg><use xlink:href="#arrow_right"></use></svg>Menu1_Sub1</a></li>
				<li><a href="/menu1/sub2"><svg><use xlink:href="#arrow_right"></use></svg>Menu1_Sub2</a></li>
				<li><a href="/menu1/sub3"><svg><use xlink:href="#arrow_right"></use></svg>Menu1_Sub3</a></li>
			</ol>
		</li>
		<li>
			<a href="/menu2/" class="flex_container">Menu2<small>Menu2</small></a>
			<ol>
				<li><a href="/menu2/sub1/"><svg><use xlink:href="#arrow_right"></use></svg>Menu2_Sub1</a></li>
				<li><a href="/menu2/sub2/"><svg><use xlink:href="#arrow_right"></use></svg>Menu2_Sub2</a></li>
				<li class="col1"><a href="/menu2/sub3/"><svg><use xlink:href="#arrow_right"></use></svg>Menu2_Sub3</a></li>
				<li class="col1"><a href="/menu2/sub4/"><svg><use xlink:href="#arrow_right"></use></svg>Menu2_Sub4</a></li>
				<li class="col1"><a href="/menu2/sub5/"><svg><use xlink:href="#arrow_right"></use></svg>Menu2_Sub5</a></li>
			</ol>
		</li>
		<li>
			<a href="/menu3/" class="flex_container">Menu3<small>Menu3</small></a>
			<ol>
				<li class="col1"><a href="/menu3/sub1"><svg><use xlink:href="#arrow_right"></use></svg>Menu3_Sub1</a></li>
				<li class="col1"><a href="/menu3/sub1"><svg><use xlink:href="#arrow_right"></use></svg>Menu3_Sub2</a></li>
			</ol>
		</li>
	</ul>
</section>
<div class="pagetop"><a href="#PAGETOP"><svg class="arrow_top"><use xlink:href="#arrow_top"></use></svg>TOP</a></div>
<footer class="io fade upS">

	<div class="footer_map">
		<a href="/access/">アクセス<small>ACCESS</small><svg class="arrow_btn"><use xlink:href="#arrow_btn"></use></svg></a>
	</div>
	<div class="footer_contact inner io fade upS" id="CONTACT">
		<h2 class="io fade upS">ご予約・お問い合わせ<small>RESERVE / CONTACT</small></h2>
		<p class="io fade upS">当クリニックを受診される際は、ご予約が必要です。<small>※当クリニックの治療は、自由診療となります。</small></p>
		<div class="io fade upS">
			<h3><span>医療法人 紀隆会</span>SiteName____replace</h3>
			<div class="footer_contact_tel">
				<em>連絡先</em>
				<p><a href="tel:phonenumber___replace" class="tel"><svg class="icon_phone"><use xlink:href="#icon_phone"></use></svg>PhoneNumber___replace</a><small>受付時間　9:30〜18:30（月〜金）</small></p>
				<p><a href="mapaddress___replace" target="_blank">Address___replace</a></p>
			</div>
			<div class="footer_contact_time">
				<em>診察時間</em>
				<table>
					<tr><th></th><th>月</th><th>火</th><th>水</th><th>木</th><th>金</th><th>土</th><th>日</th></tr>
					<tr><th>午前<small>9:30〜13:00</small></th><td>&#9675;</td><td>&#9675;</td><td>&#9675;</td><td>&#9675;</td><td>&#9675;</td><td>&#10005;</td><td>&#10005;</td></tr>
					<tr><th>午後<small>14:30〜18:30</small></th><td>&#9675;</td><td>&#9675;</td><td>&#9675;</td><td>&#9675;</td><td>&#9675;</td><td>&#10005;</td><td>&#10005;</td></tr>
				</table>
				<small>休診日　土曜・日曜・祝日</small>
			</div>
		</div>
		<div class="footer_link io fade upS">
			<div><a href="/reserve/">ご予約<svg class="arrow_btn"><use xlink:href="#arrow_btn"></use></svg></a></div>
			<div><a href="/contact/">お問い合わせ<svg class="arrow_btn"><use xlink:href="#arrow_btn"></use></svg></a></div>
		</div>
		<div class="footer_nav io fade upS">
			<ul>
				<li><a href="/menu1">&raquo;&nbsp;Menu1</a></li>
				<li><a href="/menu2/">&raquo;&nbsp;Menu2</a></li>
				<li><a href="/menu3/">&raquo;&nbsp;Menu3</a></li>
			</ul>
			<ul>
				<li><a href="/menu4/">&raquo;&nbsp;Menu4</a></li>
				<li><a href="/menu5/">&raquo;&nbsp;Menu5</a></li>
				<li><a href="/menu6/">&raquo;&nbsp;Menu6</a></li>
			</ul>
			<ul>
				<li><a href="/menu7/">&raquo;&nbsp;Menu7</a></li>
				<li><a href="/menu8/">&raquo;&nbsp;Menu8</a></li>
				<li><a href="/menu9/">&raquo;&nbsp;Menu9</a></li>
				<li><a href="/menu10/">&raquo;&nbsp;Menu10</a></li>
			</ul>
			<ul>
				<li><a href="/menu11/">&raquo;&nbsp;Menu11</a></li>
				<li><a href="/menu12/">&raquo;&nbsp;Menu12</a></li>
				<li><a href="/menu13/">&raquo;&nbsp;Menu13</a></li>
			</ul>
		</div>
	</div><!-- /inner -->
	<ul class="language">
		<li><a href="/">JP</a></li>
		<li><a href="/en/">EN</a></li>
		<li><a href="/ch/">CH</a></li>
	</ul>
	<div class="footer_copyright">&copy; Copyright___replace</div>
</footer>

<!-- SmoothScroll -->
<script src="js/smooth-scroll.polyfills.js"></script>
<script>
	var scroll = new SmoothScroll('a[href*="#"]', {
		speed: 400,
		easing:'easeOutQuint'
	});
</script>


</body>
</html>
<?php
// 不要配列の削除
unset($_POST);
// 不要セッションの削除
unset($_SESSION["post"]);
unset($_SESSION["token"]);
