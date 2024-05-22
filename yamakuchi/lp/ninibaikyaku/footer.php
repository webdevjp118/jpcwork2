<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ninibaikyaku
 */

?>

<!-- contact_section -->
<section class="contact_section">
	<div class="custom_container">
		<div class="content_details_box">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/contact-image.png" class="contact_image_background">
			<div class="custom_row">
				<div class="custom_col_4">
					<div class="contact_box contact_box_first js_button" data-href="<?php echo get_site_url(); ?>/contact">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/contact-image1.png" class="contact_heading_image">
						<h3>インターネットで相談する</h3>
						<a href="<?php echo get_site_url(); ?>/contact">お問い合わせフォームはこちら <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
					</div>
				</div>
				<div class="custom_col_4">
					<div class="contact_box contact_box_second js_button" data-href="tel:0120-109-506">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/call-contact.png" class="contact_heading_image">
						<h3>電話で相談する</h3>
						<span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/tape.png"><a href="tel:0120-109-506">0120-109-506</a></span>
						<p>9:00〜20:00 土日祝OK</p>
					</div>
				</div>
				<div class="custom_col_4">
					<div class="contact_box contact_box_third js_button" data-href="https://lin.ee/23auD2Q">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/line-icon.png" class="contact_heading_image">
						<h3>LINEで相談する</h3>
						<div class="contact_box_third_inner">
							<img class="line_btn_icon" src="<?php echo get_stylesheet_directory_uri(); ?>/images/line.png">
							<p>こちらをクリックして<br>QRコードを表示、友達追加</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="contact_details">
		<div class="custom_row">
			<div class="custom_col_4">
				<div class="contact_details_box">
					<p><a href="<?php echo get_site_url(); ?>/concept/">住宅ローン滞納と任意売却</a></p>
					<p><a href="<?php echo get_site_url(); ?>/service/">任意売却Dr.のサービス</a></p>
					<p><a href="<?php echo get_site_url(); ?>/step/">ご相談から解決までの流れ</a></p>
					<p><a href="<?php echo get_site_url(); ?>/vision/">私たちの想い</a></p>
					<p><a href="<?php echo get_site_url(); ?>/video/">動画で学ぼう</a></p>
				</div>
			</div>
			<div class="custom_col_4">
				<div class="contact_details_box contact_details_center">
					<p><a href="<?php echo get_site_url(); ?>/faq/">よくある質問</a></p>
					<p><a href="<?php echo get_site_url(); ?>/reviews/">お客様の声</a></p>
					<p><a href="<?php echo get_site_url(); ?>/medias/">メディア掲載</a></p>
					<p><a href="<?php echo get_site_url(); ?>/news/">お知らせ一覧</a></p>
					<p><a href="<?php echo get_site_url(); ?>/sitemap/">サイトマップ</a></p>
				</div>
			</div>
			<div class="custom_col_4">
				<div class="contact_details_box contact_details_box_third ">
					<p><a href="<?php echo get_site_url(); ?>/company/">会社概要</a></p>
					<p><a href="<?php echo get_site_url(); ?>/privacy/">プライバシーポリシー</a></p>
				</div>
			</div>
		</div>
	</div>
	<div class="contact_details_inner">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/company-logo.png">
		<div class="contact_details_inner_table">
			<div class="table-item align-center">
				<p>会 社 名</p>
				<p>株式会社クラフトレジデンス</p>
			</div>
			<div class="table-item">
				<p>所 在 地</p>
				<p>東京都千代田区丸の内1-8-3<br>
					丸の内トラストタワー本館20F</p>
			</div>
			<div class="table-item align-center">
				<p>顧問弁護士</p>
				<p>TMI総合法律事務所</p>
			</div>
		</div>
	</div>
	<div class="contact_social_icon">
		<ul>
			<li>
				<a target="_blank" href="https://www.youtube.com/channel/UC8YaQp62H-3L_nlAXJtZ-vg/videos"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/youtube.png"></a>
			</li>
			<li>
				<a target="_blank" href="https://www.facebook.com/ninibaikyaku.Dr/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/facebook.png"></a>
			</li>
			<li>
				<a target="_blank" href="https://twitter.com/ninibaikyaku_dr/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/twitter.png"></a>
			</li>
			<li>
				<a target="_blank" href="https://www.instagram.com/ninibaikyaku_dr/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/instagram.png"></a>
			</li>
		</ul>
	</div>
</section>
<!-- footer_section -->
<footer class="footer_section">
	<a class="topbtn" href="#id_page_top"></a>
	<div class="footer_text">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/white-logo.png">
		<p>© Copyright 2021 任意売却Dr.｜住宅ローン問題・任意売却の総合相談センター.</p>
	</div>
</footer>

</div><!-- #page -->
<!-- <script src="/js/jquery-ui.js"></script> -->
<link href="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery-ui.js" rel="preload" as="script">
<script>
  var jqueryuiJS = document.createElement('script');
  jqueryuiJS.src = '<?php echo get_stylesheet_directory_uri(); ?>/js/jquery-ui.js';
  document.body.appendChild(jqueryuiJS);
</script>

<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/slick.js"></script>
<script src="https://use.fontawesome.com/de37c2a985.js"></script>
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
<!-- Javascript -->
<script defer src="https://unpkg.com/smoothscroll-polyfill@0.4.4/dist/smoothscroll.min.js"></script>
<?php wp_footer(); ?>
</body>
</html>