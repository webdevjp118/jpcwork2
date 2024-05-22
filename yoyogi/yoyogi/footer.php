<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Yoyogi
 */

?>








</section><!-- <section class="main-content" id="main-content"> -->


<!-- FOOTER -->
<?php 
    global $post;
    $post_slug = $post->post_name;
?>
<footer id="footer">
	<div class="footer-top-img">
		<img class="img1 cpc6" src="<?php echo get_stylesheet_directory_uri(); ?>/images/footer-img.png" />
		<img class="img2 csp6" src="<?php echo get_stylesheet_directory_uri(); ?>/images/footer-img-res.png" />
	</div>
	<div class="container">
		<div class="footer-flex">
			<div class="footer-logo">
				<a href="index.html">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_pc.svg" />
				</a>
			</div>
			<div class="footer-dtl">
				<div class="footer-menu cpc6">
					<ul>
						<li><a href="<?php echo get_site_url(); ?>">トップページ</a></li>
						<li><a href="<?php echo get_site_url(); ?>/service">ご利用の流れ</a></li>
						<li><a href="<?php echo get_site_url(); ?>/event">活動紹介</a></li>
						<li><a href="<?php echo get_site_url(); ?>/table">評価表（アンケート）/マニュアル</a></li>
					</ul>
				</div>
				<div class="footer-flex ftr-pd-30">
					<div class="footer-addr">
						<div class="footer-contact csp6">
							<a href="<?php echo get_site_url(); ?>/contact" class="header-contact-btn">
								<i class="fa fa-envelope" aria-hidden="true"></i>
								<span>お問い合わせ</span>
							</a>
						</div>
						<ul>
<?php 
    global $post;
    $post_slug = $post->post_name;
	if($post_slug == 'contact') {
?>
							<li>
								<span>長与校:</span>
								<span>西彼長与町斉藤郷49-3</span>
								<a href="mailto:houkago@n-ichi.com">houkago@n-ichi.com</a>
							</li>
							<li>
								<span>松山校:</span>
								<span>長崎市岡町4-2-2F</span>
								<a href="mailto:matsu@n-ichi.com">matsu@n-ichi.com</a>
							</li>
							<li>
								<span>浜の町校:</span>
								<span>長崎市万屋町6-13-4F</span>
								<a href="mailto:nagayo@n-ichi.com">nagayo@n-ichi.com</a>
							</li>
							<li>
								<span>葉山校:</span>
								<span>長崎市滑石2-5-15</span>
								<a href="mailto:hayama@n-ichi.com">hayama@n-ichi.com</a>
							</li>
<?php } else { ?>
							<li>
								<span>長与校:</span>
								<span>西彼長与町斉藤郷49-3</span>
								<a href="tel:+0958014194">095-801-4194</a>
							</li>
							<li>
								<span>松山校:</span>
								<span>長崎市岡町4-2-2F</span>
								<a href="tel:+0958947156">095-894-7156</a>
							</li>
							<li>
								<span>浜の町校:</span>
								<span>長崎市万屋町6-13-4F</span>
								<a href="tel:+0958935033">095-893-5033</a>
							</li>
							<li>
								<span>葉山校:</span>
								<span>長崎市滑石2-5-15</span>
								<a href="tel:+09031951219">095-800-6307</a>
							</li>
<?php } ?>
						</ul>
					</div>
					<div class="footer-contact-cpyrgt">
						<div class="footer-contact cpc6">
							<a href="<?php echo get_site_url(); ?>/contact" class="header-contact-btn">
								<i class="fa fa-envelope" aria-hidden="true"></i>
								<span>お問い合わせ</span>
							</a>
						</div>
						<div class="footer-cpyrgt">
							<p>Copyright &copy; <span>放課後等デイサービスよよぎ</span>, All rights reserved.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>


</main><!-- <main id="main" class="home-page"> -->
</div><!-- <div id="page" class="site"> -->


<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/slick.min.js"></script>
<script src="https://use.fontawesome.com/e96692a37e.js"></script>
<script defer src="<?php echo get_stylesheet_directory_uri(); ?>/js/main.js"></script>
<!-- intersection observer -->
<script defer src="<?php echo get_stylesheet_directory_uri(); ?>/js/intersection-observer-polyfill.js"></script>
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

<?php wp_footer(); ?>
</body>
</html>