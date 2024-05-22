<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package soulpre
 */

?>

<footer class="site_footer">
	<div class="footer_content">
		<div class="custom_container">
			<div class="custom_row">
				<div class="footer_about_col">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" alt="logo image">
					<p>〒370-3347<br>
					群馬県高崎市中室田町4213-1</p>
				</div>
				<div class="footer_news_col">
					<div class="footer_text">
						<h5>NEWS</h5>
						<a href="<?php echo get_site_url(); ?>/news/">お知らせ一覧</a>
						<div class="footer_text_inner">
							<h5>COMPANY</h5>
							<a href="<?php echo get_site_url(); ?>/company/">会社概要</a>
						</div>
					</div>
				</div>
				<div class="footer_product_col">
					<div class="footer_text">
						<h5>PRODUCTS</h5>
						<a href="<?php echo get_site_url(); ?>/product/">製品情報</a>
<?php
query_posts( 'posts_per_page=3&post_type=product' );
while ( have_posts() ) :
    the_post();
    $loop_id = get_the_ID();
    $loop_url = get_permalink(); 
	$product_name_en = get_post_meta($loop_id, 'product_name_en', true);
?>
						<a href="<?php echo $loop_url; ?>"><?php echo '・'.$product_name_en; ?></a>
<?php
endwhile;
wp_reset_postdata();
?>
					</div>
				</div>
				<div class="footer_column_col">
					<div class="footer_text">
						<h5>COLUMN</h5>
						<a href="<?php echo get_site_url(); ?>/column/">コラム一覧</a>
					</div>
				</div>
				<div class="footer_btn_col">
					<div class="footer_btn">
						<h4>お気軽にお問い合わせください。</h4>
						<div class="footer_btn_inner">
							<a href="<?php echo get_site_url(); ?>/contact/" class="font0"><i class="fas fa-envelope"></i>お問い合わせ</a>
							<a href="tel:0273816594"><i class="fas fa-phone-alt"></i>027-381-6594
								<span>受付時間 9:00-18:00<br>
								[ 土・日・祝日除く ]</span>
							</a>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>
	<div class="copyright_text">
		<p>Copyright ©Loop Inc. All Rights Reserved.</p>
	</div>
</footer>

<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery-ui.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/fonts-awesome-5.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/intersection-observer-polyfill.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/custom.js"></script>

<?php wp_footer(); ?>
</body>
</html>
