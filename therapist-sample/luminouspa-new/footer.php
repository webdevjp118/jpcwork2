<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package luminouspa-new
 */

?>

	

<footer class="footer_section home_page_footer">
	<div class="top_footer_wrap">
		<div class="top_footer">
			<a href="https://tokyo.aroma-tsushin.com/" target="_blank"><img src="https://tokyo.aroma-tsushin.com/banner/banner-200x040.gif" width="200" height="40" border="0" alt="リンク｜メンズエステの情報なら東京アロマパンダ通信"></a>
			<a href="https://osaka.refle.info/"><img width="200" height="40" border="0" src="https://osaka.refle.info/images/area/bunner200.gif" alt="大阪でメンズエステ・マッサージ探すならリフナビ"></a>
			<a href="https://tapeste.com" target="_blank"><img src="https://tapeste.com/img/common/bns/tapeste_bn_200x40.jpg" width="200" height="40" border="0" alt="エステサロン・セラピストがすぐに見つかる、TapEste.com" /></a>
			<a href="http://panda-job.com/osaka/s/" target="_blank"><img src="https://aroma-tsushin.com/banner/panda-job_200x40.jpg" width="200" height="40" border="0" alt="女性の為の安心求人情報サイト}"></a>
			<a href="https://choi-es.com/" target="_blank"><img src="https://choi-es.com/banner/200_40.png" alt="メンズエステ店を投票ランキングで検索｜Choi-Es（チョイエス）大阪"></a>
		</div>
	</div>
	<div class="bottom_footer">
		<div class="footer_links">
			<ul>
				<li>
					<a href="<?php echo get_site_url(); ?>">Home</a>
				</li>
				<li>
					<a href="<?php echo get_site_url(); ?>/#system_price">SYSTEM&PRICE</a>
				</li>
				<li>
					<a href="<?php echo get_site_url(); ?>/therapist/">THERAPIST</a>
				</li>
				<li>
					<a href="<?php echo get_site_url(); ?>/#access_sec">ACCESS</a>
				</li>
				<li>
					<a href="#">BLOG</a>
				</li>
				<li>
					<a href="<?php echo get_site_url(); ?>/contact-us/">CONTACT</a>
				</li>
			</ul>
			<p class="copy_right_text">© 2021 LUMINOUSPA OSAKA.  All Rights Reserved.</p>
		</div>
	</div>
</footer>








</div><!-- #page -->

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
	$( function() {
		$( "#datepicker" ).datepicker( {
			dateFormat: 'yy/mm/dd',
			monthNames: ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"],
			minDate: '+1d'
		});
	} );
</script>
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
