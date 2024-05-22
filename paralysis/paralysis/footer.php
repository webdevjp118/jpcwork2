<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package paralysis
 */

?>

<footer class="site_footer io fade upS">
	<div class="footer_about">
		<div class="custom_container">
			<ul>
				<li>
					<a href="<?php echo get_site_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_white.png"></a>
				</li>
				<li>
					<a href="#">麻痺のセラピスト協会</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="footer_content">
		<div class="custom_container">
			<ul>
				<li>
					<p><span>運営</span>ファンクショナルマッサージ株式会社</p>
				</li>
				<li>
					<p><span>住所</span>神奈川県藤沢市鵠沼石上1-2-5ダイイチミヤビル２C</p>
				</li>
			</ul>
		</div>
	</div>
</footer>

</div><!-- #page -->

<?php wp_footer(); ?>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/fonts-awesome-5.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/slick.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/intersection-observer-polyfill.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/custom.js"></script>
</body>
</html>
