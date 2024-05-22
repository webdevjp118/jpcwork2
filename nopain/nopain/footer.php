<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nopain
 */

?>

<footer class="site_footer">
	<div class="custom_container">
		<div class="custom_row">
			<div class="custom_col_image">
				<a href="<?php echo get_site_url(); ?>" class="footer_logo">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_yellow.svg">
				</a>
			</div>
			<div class="custom_col_text">
				<div class="footer_links">
					<ul>
						<li>
							<p class="footer_links_text">痛みにお困りの方</p>
							<ul class="footer_inner_links">
								<li><a href="<?php echo get_site_url(); ?>/muscle/">線維筋痛症改善プログラム</a></li>
								<li><a href="<?php echo get_site_url(); ?>/joint/">顎関節症改善プログラム</a></li>
								<li><a href="<?php echo get_site_url(); ?>/numbness/">しびれ解消プログラム</a></li>
								<li><a href="<?php echo get_site_url(); ?>/explore/">治らない痛みの研究会®︎認定院を探す</a></li>
							</ul>
						</li>
						<li>
							<a href="<?php echo get_site_url(); ?>/interest/" class="footer_links_text">疼痛改善に興味のある整骨院、鍼灸院、整体院の先生</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="footer_copyright">
			<p>©2021 治らない痛みの研究会®︎ All Rights Reserved.</p>
		</div>
	</div>
</footer>
<div class="pagetop" style="display: none;"><a href="javascript:void(0)"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/button_image.svg">top</a></div>


</div><!-- #page -->

<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery-ui.js"></script>
<script defer src="<?php echo get_stylesheet_directory_uri(); ?>/js/custom.js"></script>
<!-- intersection observer -->
<script defer src="<?php echo get_stylesheet_directory_uri(); ?>/js/intersection-observer-polyfill.js"></script>
<script type="text/javascript">
	$(window).on('load',function() {
		$('.loader-wrapper').fadeOut('slow');
		$('.navbar_toggler').css({'right': '0'});
	});
	$(window).on('load scroll',function(){
		var	windowTop = $(window).scrollTop();
		if(windowTop > 600) {
			$('.pagetop').fadeIn();
		} else {
			$('.pagetop').fadeOut();
		}
	});
	$('.pagetop').on('click', function (event) {
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0
		}, 800);
	});
	$( "#accordion_hokkaido" ).accordion({
		heightStyle: "content",
		collapsible: true
	});
	$( "#accordion_tohoku" ).accordion({
		heightStyle: "content",
		collapsible: true
	});
</script>
<?php wp_footer(); ?>

</body>
</html>
