<?php
/**
 * The template for displaying all property posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Tomorrow_Land
 */

get_header();
?>
<div class="filler_header cpc"></div>
<main id="primary" class="site-main">


<div class="sp_header_bar">
    <a href=""><img  src="<?php echo get_stylesheet_directory_uri(); ?>/images/menu-logo.svg"></a>
</div>
<section class="normal_banner_section pg_reform">
	<div class="normal_banner_text pg_reform">
        <div class="banner_content">
            <div class="banner_deco_left">
                
            </div>
            <div class="text_wrap">
                <h1>リフォーム内容</h1>
		        <p>Renovate </p>
            </div>
            <div class="banner_deco_right">
            </div>
        </div>
	</div>
</section>
<section class="blog_sec">
    <div class="custom_container_medium">
        <p><a class="pankuzu" href="<?php echo get_site_url(); ?>">ホーム</a> / <a class="pankuzu" href="<?php echo get_site_url(); ?>/reform">リフォーム事例</a> / リフォーム内容<p>
        <div class="reform_content_list">
            <div class="reform_detail_wrap first">
                <h3>※当社で取り扱いのリフォームメニューの一部の例です。詳しくはお問い合わせください。<h3>
            </div>
            <div class="reform_detail_wrap">
                <h2>クロス張り替え</h2>
                <div class="photo_wrap"><img class="centered_img" src="<?php echo get_stylesheet_directory_uri(); ?>/images/reform_content1.jpg"></div>
                <div class="price_wrap">
                    <div class="price_detail">➤(6畳間目安)</div>
                    <div class="price_value">38,000</div><div class="price_unit">円〜</div>
                </div>
            </div>
            <div class="reform_detail_wrap">
                <h2>フローリング張り替え</h2>
                <div class="photo_wrap"><img class="centered_img" src="<?php echo get_stylesheet_directory_uri(); ?>/images/reform_content2.jpg"></div>
                <div class="price_wrap">
                    <div class="price_detail">➤(6畳間目安)</div>
                    <div class="price_value">85,000</div><div class="price_unit">円〜</div>
                </div>
            </div>
            <div class="reform_detail_wrap">
                <h2>CF張り替え洗面室クロス張り替え</h2>
                <div class="photo_wrap"><img class="centered_img" src="<?php echo get_stylesheet_directory_uri(); ?>/images/reform_content3.jpg"></div>
                <div class="price_wrap">
                    <div class="price_detail">➤</div>
                    <div class="price_value">38,000</div><div class="price_unit">円〜</div>
                </div>
            </div>
            <div class="reform_detail_wrap">
                <h2>システムキッチン交換 Lixil シエラ</h2>
                <div class="photo_wrap"><img class="centered_img" src="<?php echo get_stylesheet_directory_uri(); ?>/images/reform_content4.jpg"></div>
                <div class="price_wrap">
                    <div class="price_detail">➤工事費込み</div>
                    <div class="price_value">500,000</div><div class="price_unit">円〜</div>
                </div>
            </div>
            <div class="reform_detail_wrap">
                <h2>トイレ交換　Lixil アメージュZ</h2>
                <div class="photo_wrap"><img class="centered_img" src="<?php echo get_stylesheet_directory_uri(); ?>/images/reform_content5.jpg"></div>
                <div class="price_wrap">
                    <div class="price_detail">➤工事費込み</div>
                    <div class="price_value">130,000</div><div class="price_unit">円〜</div>
                </div>
            </div>
            <div class="reform_detail_wrap">
                <h2>システムバス　Lixil アライズ/リノビオ</h2>
                <div class="photo_wrap"><img class="centered_img" src="<?php echo get_stylesheet_directory_uri(); ?>/images/reform_content6.jpg"></div>
                <div class="price_wrap">
                    <div class="price_detail">➤工事費込み</div>
                    <div class="price_value">500,000</div><div class="price_unit">円〜</div>
                </div>
            </div>
            <div class="reform_detail_wrap">
                <h2>ニッチ棚新設</h2>
                <div class="photo_wrap"><img class="centered_img" src="<?php echo get_stylesheet_directory_uri(); ?>/images/reform_content7.jpg"></div>
                <div class="price_wrap">
                    <div class="price_detail">➤工事費込み</div>
                    <div class="price_value">40,000</div><div class="price_unit">円〜</div>
                </div>
            </div>
            <div class="reform_detail_wrap" style="margin-bottom:10px;">
                <h2>玄関ドア1Dayリフォーム <br>
                    カバー工法　Lixil リシェント</h2>
                <div class="photo_wrap"><img class="centered_img" src="<?php echo get_stylesheet_directory_uri(); ?>/images/reform_content8.jpg"></div>
                <div class="price_wrap">
                    <div class="price_detail">➤工事費込み</div>
                    <div class="price_value">300,000</div><div class="price_unit">円〜</div>
                </div>
            </div>
        </div>

    </div>
</section>


</main><!-- #main -->
<?php
get_footer();
