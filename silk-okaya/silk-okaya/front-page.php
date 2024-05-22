<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SILK_OKAYA
 */

get_header();

echo_first_header();

?>

<main id="primary" class="site-main">


<section class="banner_slider_section">
    <div class="banner_slider">
        <div class="single_banner_slide">
            <img class="cpc" src="<?php echo get_stylesheet_directory_uri(); ?>/images/banner01.png" alt="banner slider image">
            <img class="csp" src="<?php echo get_stylesheet_directory_uri(); ?>/images/mob_banner01.png" alt="banner slider image">
        </div>
        <div class="single_banner_slide">
            <img class="cpc" src="<?php echo get_stylesheet_directory_uri(); ?>/images/banner02.png" alt="banner slider image">
            <img class="csp" src="<?php echo get_stylesheet_directory_uri(); ?>/images/mob_banner02.png" alt="banner slider image">
        </div>
        <div class="single_banner_slide">
            <img class="cpc" src="<?php echo get_stylesheet_directory_uri(); ?>/images/banner03.png" alt="banner slider image">
            <img class="csp" src="<?php echo get_stylesheet_directory_uri(); ?>/images/mob_banner03.png" alt="banner slider image">
        </div>
        <div class="single_banner_slide">
            <img class="cpc" src="<?php echo get_stylesheet_directory_uri(); ?>/images/banner04.png" alt="banner slider image">
            <img class="csp" src="<?php echo get_stylesheet_directory_uri(); ?>/images/mob_banner04.png" alt="banner slider image">
        </div>
        <div class="single_banner_slide">
            <img class="cpc" src="<?php echo get_stylesheet_directory_uri(); ?>/images/banner05.png" alt="banner slider image">
            <img class="csp" src="<?php echo get_stylesheet_directory_uri(); ?>/images/mob_banner05.png" alt="banner slider image">
        </div>
    </div>
    <div class="banner_logo_with_text">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_white.png" alt="logo image">
        <h4 class="cpc">美しいものづくり　美しい人づくり</h4>
        <h4 class="csp">美しいものづくり<br>美しい人づくり</h4>
    </div>
    <p class="scroll_note cpc">
        <span class="scroll_line"></span>
        <span class="scroll_text">scroll</span>
    </p>
</section>
<section class="city_of_threads_section">
    <div class="home_container">
        <div class="image_with_text">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/city_of_thread.png" alt="city of thread image">
            <div class="text_description">
                <h3>糸の都<span class="cpc">　</span><br class="csp">信州おかや</h3>
                <p>日本のほぼ真ん中にある長野県。<br> その長野県のほぼ真ん中にある<br> 諏訪湖のほとりに岡谷市はあります。<br> 世界にその名を知られたシルクのまち。<br> ここには「美しいものづくり」「美しい<br class="csp">人づくり」の物語があります。</p>
            </div>
        </div>
    </div>
</section>
<section class="news_section">
    <div class="news_section_table">
        <h3>News</h3>
        <ul class="news_table">
<?php
$term_id = -1;
$cat_key = "";
$categories = get_categories();
foreach($categories as $category) {
    if($category->slug == 'notification' || $category->name == 'お知らせ') {
        $term_id = $category->term_id;
        $cat_key = $category->name;
    } 
}
$news_url = get_site_url()."/blogs/?cat_key=".$cat_key;
$fetch_key = array(
    'post_type' => 'post',
    'tax_query' => array(
        'relation' => 'AND',
            array(
                'taxonomy' => 'category',
                'field'    => 'term_id',
                'terms'    => $term_id,
            ),
    ),
    // 'author' => $user_id,
	'posts_per_page' => 5,
    'fields' => 'ids',
);
$fetch_query = new WP_Query($fetch_key);
if($fetch_query->have_posts()) : 
    while ($fetch_query->have_posts()) : 
        $fetch_query->the_post(); 
        $post_id = get_the_id();
        $loop_url = get_permalink($post_id);
        $loop_date = get_the_date('Y.m.d', $post_id);
        $loop_title = get_the_title($post_id);
?>
            <li>
                <p class="date"><?php echo $loop_date; ?></p>
                <a href="<?php echo $loop_url; ?>" class="news_title"><?php echo $loop_title; ?></a>
            </li>
            
<?php
    endwhile;
endif;
?>
        </ul>
        <a href="<?php echo $news_url; ?>" class="button_blue">お知らせをさらに表示する<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/svg/right_arrow.svg" alt="right arrow"></a>
    </div>
</section>
<section class="silk_okaya_section colored_bg">
    <div class="home_container">
        <div class="home_row">
            <div class="home_col_5">
                <ul class="image_list top_out">
                    <li>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/silk_okaya_image1.png" alt="silk okaya image">
                    </li>
                    <li>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/silk_okaya_image2.png" alt="silk okaya image">
                    </li>
                </ul>
            </div>
            <div class="home_col_7 align_content_flex_center">
                <div class="text_description">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/svg/infinite_sign.svg" alt="infinite sign icon">
                    <h3>SILK OKAYA <br class="csp">物語</h3>
                    <p>岡谷は明治から昭和初期にかけて日本の製糸業の中心地でした。<br>生糸の輸出を通して日本の近代化を支えた歴史を持ちます。<br>岡谷の生糸は「信州上一番格」として<br>世界一の輸出生産量を誇り、<br>海外からは“SILK OKAYA”、<br>国内では「糸都（しと）岡谷」と呼ばれ、<br>その名は世界に響き渡りました。</p>
                    <a href="<?php echo get_site_url(); ?>/story/" class="button_blue">READ MORE<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/svg/right_arrow.svg" alt="right arrow"></a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="silk_okaya_section">
    <div class="home_container">
        <div class="home_row home_row_reverse">
            <div class="home_col_5">
                <ul class="image_list">
                    <li>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/silk_okaya_image3.png" alt="silk okaya image">
                    </li>
                    <li>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/silk_okaya_image4.png" alt="silk okaya image">
                    </li>
                </ul>
            </div>
            <div class="home_col_7 align_content_flex_center">
                <div class="text_description">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/svg/infinite_sign.svg" alt="infinite sign icon">
                    <h3>岡谷シルクに<br class="csp">ついて</h3>
                    <p>新しいシルク文化が生まれるまちへ<br>「岡谷シルク」とは、まちの歴史と文化を活かし、<br>「新しいシルク文化」を創造する取り組みのこと。<br>糸の都岡谷だから体験・体感できる価値を提供していきます。</p>
                    <a href="<?php echo get_site_url(); ?>/concept/" class="button_blue">READ MORE<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/svg/right_arrow.svg" alt="right arrow"></a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="silk_okaya_section colored_bg">
    <div class="home_container">
        <div class="home_row">
            <div class="home_col_5">
                <ul class="image_list top_out">
                    <li>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/silk_okaya_image5.png" alt="silk okaya image">
                    </li>
                    <li>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/silk_okaya_image6.png" alt="silk okaya image">
                    </li>
                </ul>
            </div>
            <div class="home_col_7 align_content_flex_center">
                <div class="text_description">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/svg/infinite_sign.svg" alt="infinite sign icon">
                    <h3>美しい<br class="csp">ものづくり</h3>
                    <p>岡谷で育ったカイコの繭を<br>岡谷で生糸にして<br>MADE IN JAPANのものづくりをしていきます。</p>
                    <a href="<?php echo get_site_url(); ?>/create/" class="button_blue">READ MORE<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/svg/right_arrow.svg" alt="right arrow"></a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="silk_okaya_section extra_padding">
    <div class="home_container">
        <div class="home_row home_row_reverse">
            <div class="home_col_5">
                <ul class="image_list">
                    <li>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/silk_okaya_image7.png" alt="silk okaya image">
                    </li>
                    <li>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/silk_okaya_image8.png" alt="silk okaya image">
                    </li>
                </ul>
            </div>
            <div class="home_col_7 align_content_flex_center">
                <div class="text_description">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/svg/infinite_sign.svg" alt="infinite sign icon">
                    <h3>美しい<br class="csp">人づくり</h3>
                    <p>「シルクを教育に活かす」活動<br>それは生き物と共にものづくりを体験する、<br>創造性と想像性を育む教育です。</p>
                    <a href="<?php echo get_site_url(); ?>/people/" class="button_blue">READ MORE<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/svg/right_arrow.svg" alt="right arrow"></a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="new_and_blog_section">
    <div class="home_container">
        <ul class="news_and_blog_list">
            <li>
                <a href="<?php echo get_site_url(); ?>/blogs/">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/news_and_blog_1.png" alt="news and blog image">
                    <h4>News & BIog <span class="cpc">－岡谷シルク日記－</span></h4>
                    <span class="button_blue cpc button_icon_only"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/svg/right_arrow.svg" alt="right arrow"></span>
                </a>
            </li>
            <li>
                <a href="<?php echo get_site_url(); ?>/interviews/">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/news_and_blog_2.png" alt="news and blog image">
                    <h4>シルクで頑張る人</h4>
                    <span class="button_blue cpc button_icon_only"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/svg/right_arrow.svg" alt="right arrow"></span>
                </a>
            </li>
            <li>
                <a href="<?php echo get_site_url(); ?>/product/">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/news_and_blog_3.png" alt="news and blog image">
                    <h4>OKAYA SILK 製品</h4>
                    <span class="button_blue cpc button_icon_only"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/svg/right_arrow.svg" alt="right arrow"></span>
                </a>
            </li>
        </ul>
    </div>
</section>


</main><!-- <main id="primary" class="site-main"> -->
<?php
get_footer();
?>