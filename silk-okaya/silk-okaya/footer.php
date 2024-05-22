<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SILK_OKAYA
 */

?>

<footer class="footer_section colored_bg">
	<div class="footer_container">
		<div class="footer_row">
			<div class="logo_col cpc">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_gray.png" alt="footer logo image" class="js_button" data-href="<?php echo get_site_url(); ?>">
			</div>
			<div class="footer_text_col align_content_flex_center">
				<div class="footer_content">
					<ul class="main_menu">
						<li>
							<a href="<?php echo get_site_url(); ?>/blogs/">News & BIog</a>
						</li>
						<li>
							<a href="<?php echo get_site_url(); ?>/story/">SILK OKAYA物語</a>
						</li>
						<li>
							<a href="<?php echo get_site_url(); ?>/concept/">岡谷シルクについて</a>
						</li>
						<li>
							<a href="<?php echo get_site_url(); ?>/product/">岡谷シルク製品</a>
						</li>
						<li>
							<a href="<?php echo get_site_url(); ?>/interviews/">シルクで頑張る人</a>
						</li>
					</ul>
					<h4>岡谷市産業振興部ブランド推進室</h4>
					<p>長野県岡谷市郷田一丁目４番８号   <br class="csp">Email：<a href="mailto:brand＠city.okaya.lg.jp">brand＠city.okaya.lg.jp</a></p>
					<div class="copyright_and_social_links">
						<p>サイトで使用している文章・画像等の無断での複製・転載を禁止します。<br>Copyright©2021 OKAYA SILK All Rights Reserved.</p>
						<ul class="social_menu">
							<li>
								<a href="#">
									<svg id="Group_1511" data-name="Group 1511" xmlns="http://www.w3.org/2000/svg" width="22.616" height="23" viewBox="0 0 22.616 23">
										<path id="Path_2360" data-name="Path 2360" d="M1399.266,4461.621h-9.615a6.5,6.5,0,0,0-6.5,6.5v10a6.5,6.5,0,0,0,6.5,6.5h9.615a6.5,6.5,0,0,0,6.5-6.5v-10A6.5,6.5,0,0,0,1399.266,4461.621Zm-13.807,6.5a4.2,4.2,0,0,1,4.192-4.192h9.615a4.2,4.2,0,0,1,4.193,4.192v10a4.2,4.2,0,0,1-4.193,4.192h-9.615a4.2,4.2,0,0,1-4.192-4.192Z" transform="translate(-1383.15 -4461.621)"/>
										<path id="Path_2361" data-name="Path 2361" d="M1397.645,4482.345a5.923,5.923,0,1,0-5.923-5.923A5.931,5.931,0,0,0,1397.645,4482.345Zm0-10a4.077,4.077,0,1,1-4.076,4.078A4.082,4.082,0,0,1,1397.645,4472.344Z" transform="translate(-1386.337 -4464.921)"/>
										<circle id="Ellipse_2" data-name="Ellipse 2" cx="1.327" cy="1.327" r="1.327" transform="translate(15.941 4.077)"/>
									</svg>
								</a>
							</li>
							<li>
								<a href="#">
									<svg xmlns="http://www.w3.org/2000/svg" width="22.616" height="22.616" viewBox="0 0 22.616 22.616">
										<path id="Path_2362" data-name="Path 2362" d="M1455.218,4461.926H1435.1a1.247,1.247,0,0,0-1.247,1.248v20.118a1.248,1.248,0,0,0,1.247,1.25h9.7v-7.555h-3.287v-3.806h3.287v-2.809a6.584,6.584,0,0,1,.2-1.671c0-.015.009-.029.014-.044.038-.142.082-.28.13-.413.039-.1.083-.2.128-.3.018-.042.035-.085.054-.126a4.34,4.34,0,0,1,.211-.385l.01-.019a4.2,4.2,0,0,1,.55-.709l.014-.016c.089-.091.184-.175.281-.258.022-.018.042-.039.064-.056.077-.063.159-.119.24-.176.049-.034.095-.071.145-.1s.109-.063.164-.1c.086-.049.169-.1.258-.142.016-.008.032-.014.048-.021a5.532,5.532,0,0,1,2.381-.494,26.679,26.679,0,0,1,2.937.152v3.4h-2.015c-1.579,0-1.887.752-1.887,1.854v2.431h3.77l-.491,3.806h-3.279v7.555h6.488a1.248,1.248,0,0,0,1.248-1.25v-20.118A1.247,1.247,0,0,0,1455.218,4461.926Z" transform="translate(-1433.85 -4461.926)"/>
									</svg>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>





</div><!-- #page -->

<script defer src="<?php echo get_stylesheet_directory_uri(); ?>/js/slick.min.js"></script>
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
