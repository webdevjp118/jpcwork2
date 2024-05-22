<?php require('common/include/ga.php'); ?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="format-detection" content="email=no,telephone=no,address=no">
<meta name="viewport" content="width=device-width,initial-scale=1.0,shrink-to-fit=no">
<script type="text/javascript">
if(!((navigator.userAgent.indexOf('iPhone') > 0) || navigator.userAgent.indexOf('iPod') > 0 || (navigator.userAgent.indexOf('Android') > 0 && navigator.userAgent.indexOf('Mobile') > 0))){
	document.write('<meta name="viewport" content="width=990">');
}
</script>
<title><?php echo ($pagetitle!="") ? $pagetitle." | " : "";?><?php echo $sitename;?></title>
<meta name="robots" content="index,follow">
<meta name="keywords" content="<?php echo $pagekeywords.$keywords;?>">
<meta name="description" content="<?php echo ($pageDescription!="") ? $pageDescription.$description : $description; ?>">
<!-- open graph protocol -->
<meta property="og:url" content="<?php echo $pageURL;?>">
<meta property="og:site_name" content="<?php echo $sitename;?>">
<meta property="og:title" content="<?php echo ($pagetitle!="") ? $pagetitle." | " : "";?><?php echo $sitename;?>">
<meta property="og:type" content="<?php if($_SERVER["REQUEST_URI"] == "/"){echo "website";} else {echo "article";}?>">
<meta property="og:description"  content="<?php echo ($pageDescription!="") ? $pageDescription.$description : $description; ?>">
<meta property="og:image" content="<?php echo ($pageOgpImg!="") ? $siteURL.$pageOgpImg : $siteURL."/common/images/ogp.png"; ?>">
<meta name="twitter:card" content="summary_large_image">
<!--
<meta name="twitter:site" content="@Username">
<meta property="fb:app_id" content="AppID">
<meta property="article:publisher" content="FacebookページのURL">
-->
<!-- lang -->
<link rel="alternate" hreflang="ja" href="https://rinku-medical-clinic.com/">
<link rel="alternate" hreflang="en-gb" href="https://rinku-medical-clinic.com/en/">
<link rel="alternate" hreflang="en-us" href="https://rinku-medical-clinic.com/en/">
<link rel="alternate" hreflang="en" href="https://rinku-medical-clinic.com/en/">
<link rel="alternate" hreflang="zh-Hans" href="https://rinku-medical-clinic.com/ch/">
<link rel="alternate" hreflang="zh-Hant" href="https://rinku-medical-clinic.com/ch/">
<link rel="alternate" hreflang="x-default" href="https://rinku-medical-clinic.com/en/">
<!-- icon -->
<link rel="shortcut icon" href="/favicon.ico">
<link rel="apple-touch-icon-precomposed" href="/apple-touch-icon.png">
<!-- CSS -->
<link rel="stylesheet" href="common/css/cssreset.css">
<link rel="stylesheet" href="common/css/html5-doctor-reset-stylesheet.min.css">
<link rel="stylesheet" href="common/css/com.css">
<!-- Javascript -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="common/js/jquery-1.12.4.min.js"><\/script>')</script>
<script defer src="common/js/com.js"></script>
<!-- intersection observer -->
<script defer src="common/js/intersection-observer-polyfill.js"></script>
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
<script defer src="common/js/jquery.matchHeight.js"></script>
<script>
$(function() {
	$(window).on('load',function(){
		$(".contents_nav ul > li").matchHeight();
	});
});
</script>
<!-- GoogleMap iFrame-->
<script>
$(window).on('load', function(){
	$('.footer_map').append('<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d53401.23941037361!2d135.28665686930694!3d34.41087031065595!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa55227998aeda098!2z44Oh44OH44Kj44Kr44Or44KK44KT44GP44GG44Od44O844OI!5e0!3m2!1sja!2sjp!4v1566194087015!5m2!1sja!2sjp" frameborder="0" style="border:0" allowfullscreen></iframe>');
});
</script>
<!--svgxuse for IE -->
<script defer src="common/js/svgxuse.js"></script>
<!--[if lt IE 9]>
<script src="/common/js/IE9.js"></script>
<script src="/common/js/html5shiv.js"></script>
<script>
	document.createElement('main');
</script>
<![endif]-->
