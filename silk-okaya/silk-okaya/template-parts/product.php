<?php /* Template Name: Product*/ ?>
<?php 
get_header(); 
?>
<main id="primary" class="site-main">


<div class="main_body_content">
    <div class="right_side_contet">
<?php echo_header(); ?>
        <section class="custom_breadcrumb_section">
            <h1>岡谷シルク製品</h1>
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/svg/infinite_sign.svg" alt="infinite sign icon">
        </section>
        <section class="inner_page_banner_section">
            <div class="banner_image_box">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/product-hero.jpg" alt="okaya silk story banner image">
            </div>
        </section>
        <section class="education_program_section" id="tab1">
            <div class="custom_container">
                <h2 class="common_section_title">開発ストーリー</h2>
                <p class="common_section_sub_title" style="text-align:left">「岡谷シルク」では養蚕、製糸、製品化までオール岡谷産シルク製品の開発を進めています。シルク岡谷の歴史・文化が詰まった地域の誇りとなるものとは？プロジェクト進行の様子はブログでお伝えしていきます。</p>
                <div class="custom_row">
                    <div class="custom_col_12">
                        <div class="education_program_single_block" style="display: block;">
                            <div class="education_program_button_container">
                                <a class="blue_text_link" href="<?php echo get_site_url(); ?>/blogs/">News & Blog<span class="button_blue button_icon_only"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/svg/right_up_arrow.svg" alt="right arrow"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="custom_row">
                    <div class="custom_col_12">
                        <div class="education_program_single_block">
                            <div class="education_program_image_box">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/producting.jpg" alt="okaya city image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div style="content:''; height:100px;" class="cpc"></div>

        <section class="left_side_bar_bottom csp">
            <div class="custom_container">
                <ul>
                    <li>
                        <a href="#tab1">開発ストーリー</a>
                    </li>
                    <li>
                        <a href="#tab2">商品、企業紹介</a>
                    </li>
                    <li>
                        <a href="#tab3">SHOP LIST</a>
                    </li>
                </ul>
            </div>
        </section>
    </div>
    <div class="left_side_bar cpc">
        <div class="left_side_bar_inner">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_black.png" alt="logo image" class="cpc js_button" data-href="<?php get_site_url(); ?>">
            <ul>
                <li>
                    <a href="#tab1">開発ストーリー</a>
                </li>
                <li>
                    <a href="#tab2">商品、企業紹介</a>
                </li>
                <li>
                    <a href="#tab3">SHOP LIST</a>
                </li>
            </ul>
        </div>
    </div>
</div>


</main><!-- <main id="primary" class="site-main"> -->
<?php
get_footer();