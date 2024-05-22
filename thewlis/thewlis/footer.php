<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Thewlis
 */

?>

<a href="<?php echo get_site_url(); ?>">
<img style="width:100%" src="<?php echo get_stylesheet_directory_uri(); ?>/images/tmp_footer_logo.png">
</a>
<style>
	.menu_wrap {
		display: flex;
		justify-content: center;
		align-items: center;
		color: white;
	}
	.menu_wrap a {
		margin: 20px;
		color: white;
		cursor: pointer;
	}
</style>
<footer id="colophon" class="site-footer" style="padding: 40px 0; background-color:#00c0ed">
	<div class="menu_wrap">
		<a href="<?php echo get_site_url(); ?>/about/">シューリスについて</a>
		<a href="<?php echo get_site_url(); ?>/about/#anchor_question">よくある症状</a>
		<a>お役立ち情報</a>
		<a>記事一覧</a>
	</div>
	<div class="menu_wrap">
		<a>店舗一覧</a>
		<a href="<?php echo get_site_url(); ?>/about/#anchor_question">よくある質問</a>
		<a href="<?php echo get_site_url(); ?>/about/#anchor_aboutcompany">運営会社について</a>
		<a href="<?php echo get_site_url(); ?>/about/#anchor_privacy">プライバシーポリシー</a>
	</div>
	<div style="color:white; text-align:center;">
		0000000Corperation
	</div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
