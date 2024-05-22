<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package paqingko
 */

?>


<footer class="site_footer">
	<div class="custom_container">
		<ul>
			<li>
				<a href="<?php echo get_site_url(); ?>/kouyaka/">公約</a>
			</li>
			<li>
				<a href="https://mobile.twitter.com/tokai_slot" target="_blank">東海スロット情報</a>
			</li>
			<li>
				<a href="<?php echo get_site_url(); ?>/about/">東海来店情報</a>
			</li>
		</ul>
		<p>Copyright (C) tokai_slot. all rights reseved.</p>
	</div>
</footer>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery-ui.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/fonts-awesome-5.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/slick.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/intersection-observer-polyfill.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/custom.js"></script>
<?php wp_footer(); ?>
</body>
</html>