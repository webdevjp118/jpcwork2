<?php
get_header();
?>

<section class="banner_section">
    <div class="banner_content">
        <div class="banner_image">
            <video autoplay="" loop="" muted="" playsinline="">
                <source src="<?php echo get_stylesheet_directory_uri(); ?>/video/banner_video1.mp4" type="video/mp4">
            </video>
            <!-- <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/banner_image.png" alt="banner image"> -->
            <p>Scroll down <span></span></p>
        </div>
        <h1>フォークリフト<span class="text_small">の</span>作業<span class="text_small">を</span><br>
            「 もっと<span class="text_big">楽</span>に」「 もっと<span class="text_big">安全</span>に」「 もっと<span class="text_big">美しく</span>」。
        </h1>
        <p>株式会社ループは 、まったく新しいフォークリフトアタッチメントを企画・製造する企業です。</p>
    </div>
</section>
<section class="strengths_section">
    <div class="heading">
        <h3>OUR STRENGTHS</h3>
        <p>ループの強み</p>
        <h1>OUR<br>STRENGTHS</h1>
    </div>
    <div class="strengths_point_box strengths_point_first_box">
        <div class="custom_container">
            <div class="custom_row">
                <div class="custom_col_image">
                    <div class="strengths_image">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/strengths_image.png" alt="strengths image">
                    </div>
                </div>
                <div class="custom_col_text">
                    <div class="strengths_text">
                        <div class="strengths_text_inner">
                            <h3 class="point_text"><span>P</span>oint.<span>01</span></h3>
                            <h4>フォークリフトのすべてを熟知</h4>
                            <p>株式会社ループは、使用済み亜鉛などの再生事業を手がける<a href="https://eco-material-metal.jp/" target="_blank">「株式会社エコ・マテリアル」</a>からスピンアウトしたベンチャー企業です。<br>
                            スクラップ業界の現状はもちろん、自らの事業でフォークリフトを駆使ししているため、その構造をだれよりも熟知しています。</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="strengths_point_box strengths_point_second_box">
        <div class="custom_container">
            <div class="custom_row custom_row_reverse">
                <div class="custom_col_image">
                    <div class="strengths_image">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/strengths_image_2.png" alt="strengths image">
                    </div>
                </div>
                <div class="custom_col_text">
                    <div class="strengths_text">
                        <div class="strengths_text_inner">
                            <h3 class="point_text"><span>P</span>oint.<span>02</span></h3>
                            <h4>クオリティを最大化する専門家集団</h4>
                            <p>スクラップ業界に精通した「設計士」「デザイナー」「エンジニア」が、徹底的に「機能」「美しさ」「作業効率」を追求。<br>
                            人手不足や安全性が問題となっている業界に一石を投じる「最高のクオリティ」をもった製品を創造しています。</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="strengths_point_box strengths_point_third_box">
        <div class="custom_container">
            <div class="custom_row">
                <div class="custom_col_image">
                    <div class="strengths_image">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/strengths_image_3.png" alt="strengths image">
                    </div>
                </div>
                <div class="custom_col_text">
                    <div class="strengths_text">
                        <div class="strengths_text_inner">
                            <h3 class="point_text"><span>P</span>oint.<span>03</span></h3>
                            <h4>顧客ニーズを深化するファブレス経営</h4>
                            <p>工場を持たない「ファブレス形式」を採用。<br>
                                だからこそ、どこまでもお客様のニーズに柔軟に対応し、深化させることに集中しています。すべてのリソースを製品の「価値向上」に注力する。<br>
                            私たちのこだわりです。</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="product_section">
    <div class="custom_container">
        <div class="product_heading">
            <h3>PRODUCTS</h3>
            <p>製品情報</p>
            <h1>PRODUCTS</h1>
        </div>
        <div class="product_content">
<?php
query_posts( 'posts_per_page=3&post_type=product' );
while ( have_posts() ) :
    the_post();
    $loop_id = get_the_ID();
    $loop_url = get_permalink(); 
    $featured_img_url = get_the_post_thumbnail_url(); 
    $product_name = get_post_meta($loop_id, 'product_name', true);
	$product_name_en = get_post_meta($loop_id, 'product_name_en', true);
	$product_desc = get_post_meta($loop_id, 'product_desc', true);
    if(empty($featured_img_url)) $featured_img_url = get_stylesheet_directory_uri()."/images/noimage.jpg";
    $loop_date = get_the_date('Y/m/d');
?>
            <div class="custom_row">
                <div class="custom_col_image">
                    <div class="product_image">
                        <img src="<?php echo $featured_img_url; ?>" alt="product image">
                    </div>
                </div>
                <div class="custom_col_text">
                    <div class="product_text">
                        <h3><?php echo $product_name; ?><br>
                            <span><?php echo $product_name_en; ?></span>
                        </h3>
                        <p><?php echo $product_desc; ?></p>
                        <a href="<?php echo $loop_url; ?>">詳しくみる <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon_arrow_right.png" alt="icon arrow right"></a>
                    </div>
                </div>
            </div>
<?php
endwhile;
wp_reset_postdata();
?>
        </div>
        <div class="product_link">
            <ul>
                <li>
                    <a href="javascript:void(0)">その他の製品も順次アップデートしていきます</a>
                </li>
                <li>
                    <a href="<?php echo get_site_url(); ?>/product/">製品情報一覧<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon_arrow_right_white.png" alt="icon_arrow_right_white.png"></a>
                </li>
            </ul>
        </div>
    </div>
</section>
<section class="column_section">
    <div class="custom_container">
        <div class="heading">
            <h3>COLUMN</h3>
            <p>コラム</p>
            <h1>COLUMN</h1>
        </div>
        <div class="column_content">
            <div class="custom_row">
<?php
query_posts( 'posts_per_page=3&post_type=column' );
while ( have_posts() ) :
    the_post();
    $loop_url = get_permalink(); 
    $featured_img_url = get_the_post_thumbnail_url(); 
    if(empty($featured_img_url)) $featured_img_url = get_stylesheet_directory_uri()."/images/blank.jpg";
    $loop_date = get_the_date('Y/m/d');
    $category_detail=get_the_category();//$post->ID
    $cat_list = [];
    foreach($category_detail as $cd){
        array_push($cat_list, $cd->cat_name);
    }
?>
                <div class="custom_col_4">
                    <div class="column_box js_button" data-href="<?php echo $loop_url; ?>">
                        <div class="column_image">
                            
                            <?php if(count($cat_list)>0) : ?>
                            <div class="column_image_text">
                                <p><?php echo $cat_list[0]; ?></p>
                            </div>
                            <?php endif; ?>
                            <img src="<?php echo $featured_img_url; ?>" alt="column image">
                        </div>
                        <div class="column_text">
                            <h6><?php echo $loop_date; ?></h6>
                            <p><?php the_title(); ?></p>
                        </div>
                    </div>
                </div>
<?php
endwhile;
wp_reset_postdata();
?>
            </div>
            <a href="<?php echo get_site_url(); ?>/column/" class="form_submit">
                コラム一覧 <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon_arrow_right_white.png" align="arrow icon">
            </a>
        </div>
    </div>
</section>
<section class="news_section">
    <div class="news_heading">
        <h1>NEWS</h1>
    </div>
    <div class="news_content">
        <div class="custom_container">
            <div class="custom_row">
                <div class="custom_col_heading">
                    <div class="heading">
                        <h3>NEWS</h3>
                        <p>新着情報</p>
                    </div>
                    <div class="news_btn cpc">
                        <a href="<?php echo get_site_url(); ?>/news/" class="form_submit">詳しくみる <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon_arrow_right_white.png" align="arrow icon"></a>
                    </div>
                </div>
                <div class="custom_col_text">
                    <div>
                        <div class="news_table">
<?php
query_posts( 'posts_per_page=3&post_type=news' );
while ( have_posts() ) :
    the_post();
    $loop_url = get_permalink(); 
    $featured_img_url = get_the_post_thumbnail_url(); 
    if(empty($featured_img_url)) $featured_img_url = get_stylesheet_directory_uri()."/images/noimage.jpg";
    $loop_date = get_the_date('Y/m/d');
    $category_detail=get_the_category();//$post->ID
    $cat_list = [];
    foreach($category_detail as $cd){
        array_push($cat_list, $cd->cat_name);
    }
?>
                            <div class="news_table_row js_button" data-href="<?php echo $loop_url; ?>">
                                <div class="news_table_td">
                                    <span><?php echo $loop_date; ?></span>
                                </div>
                                <div class="news_table_td">
                                    <?php if(count($cat_list)>0) : ?>
                                        <label><?php echo $cat_list[0]; ?></label>
                                    <?php endif; ?>
                                </div>
                                <div class="news_table_td">
                                    <p><?php the_title(); ?></p>
                                </div>
                            </div>
<?php
endwhile;
wp_reset_postdata();
?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="news_btn csp">
                <a href="#" class="form_submit">詳しくみる <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon_arrow_right_white.png" align="arrow icon"></a>
            </div>
        </div>
    </div>
</section>
<section class="product_contact_section contact_section">
    <div class="custom_container">
        <div class="slash_heading">
            <h2>お困りごとやご相談などお気軽にお問い合わせください。</h2>
        </div>
        <div class="form_shadow_box">
            <h2>CONTACT</h2>
            <h5>お問い合わせフォーム</h5>
            <div class="contact_form_wrap">
<?php
    echo do_shortcode('[contact-form-7 id="376" title="コンタクトフォーム"]'); //server
    // echo do_shortcode('[contact-form-7 id="27" title="Contact form 1"]'); //local
?>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
