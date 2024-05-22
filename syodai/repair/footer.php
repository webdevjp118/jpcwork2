<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package repair
 */

?>

<footer class="site_footer">
	<div class="businesses_box_sec">
		<div class="custom_container">
			<div class="businesses_box js_button" data-href="<?php echo get_site_url(); ?>/register/">
				<div class="businesses_box_image">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/businesses_image.png">
				</div>
				<div class="businesses_box_inner">
					<h5>事業者の方へ</h5>
					<a href="javascript:void(0)">店舗登録はこちらから</a>
				</div>
			</div>
			<div class="footer_logo">
				<a href="<?php echo get_site_url(); ?>/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.svg"></a>
			</div>
		</div>
	</div>
	<div class="footer_link">
		<div class="custom_container">
			<ul class="footer_links_inner">
				<li>
					<a href="<?php echo get_site_url(); ?>">シューリスについて<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow1.svg"></a>
				</li>
				<li>
					<a href="<?php echo get_site_url(); ?>/category/often-case/">よくある症状<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow1.svg"></a>
				</li>
				<li>
					<a href="<?php echo get_site_url(); ?>/category/help-info/">お役立ち情報<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow1.svg"></a>
				</li>
				<li>
					<a href="<?php echo get_site_url(); ?>/blog/">記事一覧<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow1.svg"></a>
				</li>
			</ul>
			<ul>
				<li>
					<a href="<?php echo get_site_url(); ?>/rsearch/">店舗一覧はこちら&nbsp;<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow1.svg"></a>
				</li>
				<li>
					<a href="javascript:void(0)">よくある質問&nbsp;<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow1.svg"></a>
				</li>
				<li>
					<a href="javascript:void(0)">運営会社について&nbsp;<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow1.svg"></a>
				</li>
				<li>
					<a href="javascript:void(0)">プライバシーポリシー&nbsp;<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow1.svg"></a>
				</li>
			</ul>
			<p class="copyright_text">000000000Corporation</p>
		</div>
	</div>
</footer>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.min.js"></script>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/fonts-awesome-5.js"></script>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/slick.js"></script>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/intersection-observer-polyfill.js"></script>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/mCustomScrollbar.min.js"></script>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/ajaxzip3-source.js"></script>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/custom.js"></script>
<?php wp_footer(); ?>

</body>
</html>
