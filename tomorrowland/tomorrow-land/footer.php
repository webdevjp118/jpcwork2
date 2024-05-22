<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Tomorrow_Land
 */

?>

<div class="pagetop"><a href="#PAGETOP"><svg class="arrow_top"><use xlink:href="#arrow_top"></use></svg>TOP</a></div>
<footer class="footer_section io fade upS">
	<div class="footer_content">
		<div class="custom_container_medium">
			<div class="custom_row c_row">
				<div class="footer_about">
					<h2>株式会社トゥモローランド</h2>
					<div class="footer_about_links">
						<p>〒579-8014 大阪府東大阪市中石切町2-10-25</p>
						<p><a href="tel:+072-983-0202">TEL：072-983-0202</a>　<a href="#">FAX：072-983-0203</a></p>
						<p>営業時間　9時〜19時</p>
					</div>
				</div>
				<div class="footer_links">
					<div>
						<div><a href="<?php echo get_site_url(); ?>/business">ー　会社概要</a></div>
						<div><a href="<?php echo get_site_url(); ?>/service">ー　物件買取</a></div>
						<div><a href="<?php echo get_site_url(); ?>/reform">ー　リフォーム事例</a></div>
						<div><a href="<?php echo get_site_url(); ?>/reform-content">ー　リフォーム内容</a></div>
					</div>
					<div>
						<div><a href="<?php echo get_site_url(); ?>/property">ー　おすすめ物件紹介</a></div>
						<div><a href="<?php echo get_site_url(); ?>/faq">ー　FAQ</a></div>
						<div><a href="<?php echo get_site_url(); ?>/contact">ー　お問い合わせ</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer_copyright">
		<div class="custom_container_medium">
			Copyright© TOMORROW LAND.INC All Rights Reserved.
		</div>
	</div>
</footer>

<!-- SmoothScroll -->
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/smooth-scroll.polyfills.js"></script>
<script>
	var scroll = new SmoothScroll('a[href*="#"]', {
		speed: 400,
		easing:'easeOutQuint'
	});
</script>
<?php wp_footer(); ?>
</body>
</html>
