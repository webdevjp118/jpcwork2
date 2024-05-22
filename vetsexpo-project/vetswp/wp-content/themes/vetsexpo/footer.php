<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vetsexpo
 */

?>

</div><!-- #page -->



<div class="pagetop"><a href="#PAGETOP"><svg class="arrow_top"><use xlink:href="#arrow_top"></use></svg>TOP</a></div>
<footer class="io fade upS">
  
  <div class="footer_info">
    
    <div class="contact">
      <h3>お問い合わせ</h3>
      <p>
        (株）歯愛メディカル 東京オフィス Vetsセミナー担当<br/>
        EMAIL：vets-ac@ci-medical.com<br/>
        TEL ：03-5577-7978<br/>
        （受付時間：月～金 10:00-18:00）
      </p>
    </div>
    
    <div class="host">
      <figure>
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/head_logo.png"/>
        <figcaption>統括本部</figcaption>
      </figure>
      <figure>
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/host_logo.png"/>
        <figcaption>主催</figcaption>
      </figure>
    </div>
  
  </div>	
	
	<div class="footer_copyright">&copy;株式会社歯愛メディカル & 株式会社グラッド・ユー All Rights Reserved.</div>
</footer>

<?php wp_footer(); ?>



<!-- SmoothScroll -->
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/smooth-scroll.polyfills.js"></script>
<script>
	var scroll = new SmoothScroll('a[href*="#"]', {
		speed: 400,
		easing:'easeOutQuint'
	});
</script>

</body>
</html>
