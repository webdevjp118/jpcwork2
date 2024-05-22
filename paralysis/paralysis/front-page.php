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
 * @package paralysis
 */

get_header();
?>
<main id="primary" class="site-main">

<section class="banner_section">
    <div class="banner_full_width_slider">
        <div class="banner_single_slide">
            <div class="banner_image">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/banner.png" alt="banner image">
            </div>
        </div>
        <div class="banner_single_slide">
            <div class="banner_image">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/banner.png" alt="banner image">
            </div>
        </div>
        <div class="banner_single_slide">
            <div class="banner_image">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/banner.png" alt="banner image">
            </div>
        </div>
        <div class="banner_single_slide">
            <div class="banner_image">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/banner.png" alt="banner image">
            </div>
        </div>
    </div>
    <h1 class="">神経麻痺<span>を治して</span><br>人生を取り戻す！</h1>
</section>

<section class="notification_section">
    <div class="custom_container">
        <div class="common_heading">
            <h2>お知らせ</h2>
        </div>
        <div class="notification_table_sec">
            <div class="notification_table">
<?php
$notice_key = array(
    'post_type' => 'notice',
);
$notice_query = new WP_Query($notice_key);
if($notice_query->have_posts()) : 
	while ($notice_query->have_posts()) :
		$notice_query->the_post();
		$loop_id = get_the_ID();
        $loop_date = get_the_date('Y.m.d');
        $loop_title = get_the_title();
        $loop_permalink = get_the_permalink();
        $loop_category = get_the_category();
        $loop_catname = '未分類';
        if(count($loop_category) > 0) $loop_catname = $loop_category[0]->name;
?>
                <div class="notification_table_row">
                    <div class="notification_table_td">
                        <span><?php echo $loop_catname; ?></span>
                    </div>
                    <div class="notification_table_td">
                        <p class="notification_date"><?php echo $loop_date; ?></p>
                    </div>
                    <div class="notification_table_td js_button" data-href="<?php echo $loop_permalink; ?>">
                        <p><?php echo $loop_title; ?></p>
                    </div>
                </div>
<?php
    endwhile;
endif; ?>
            </div>
        </div>
    </div>
</section>
<section class="experienced_section">
    <div class="custom_container">
        <div class="common_heading io fade">
            <h2>経験豊富なセラピストの施術が<br>
            神経麻痺にアプローチします</h2>
        </div>
        <div class="experienced_therapyround io fade upS">
            <div class="experienced_green">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/experienced_image.png">
                <p>認知運動療法</p>
            </div>
            <div class="experienced_blue">
                <p>神経セラピー<br>
                鍼or手技</p>
            </div>
        </div>
        <div class="experienced_content">
            <div class="custom_row">
                <div class="custom_col_4 io fade upS">
                    <div class="experienced_content_box">
                        <div class="experienced_content_image_box">
                            <div class="experienced_content_case">
                                <p>CASE</p>
                                <h5>1</h5>
                            </div>
                            <div class="experienced_content_image">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/experienced_image_2.png">
                            </div>
                        </div>
                        <div class="experienced_content_text_box">
                            <h3>顔面神経麻痺</h3>
                            <p>顔面神経麻痺の後遺症を<br>
                            治したい</p>
                        </div>
                    </div>
                </div>
                <div class="custom_col_4 experienced_content_spacing io fade upS">
                    <div class="experienced_content_box">
                        <div class="experienced_content_image_box">
                            <div class="experienced_content_case">
                                <p>CASE</p>
                                <h5>2</h5>
                            </div>
                            <div class="experienced_content_image">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/experienced_image_3.png">
                            </div>
                        </div>
                        <div class="experienced_content_text_box">
                            <h3>下垂手・下垂足</h3>
                            <p>元のように動かせるように<br>
                            なりたい</p>
                        </div>
                    </div>
                </div>
                <div class="custom_col_4 io fade upS">
                    <div class="experienced_content_box">
                        <div class="experienced_content_image_box">
                            <div class="experienced_content_case">
                                <p>CASE</p>
                                <h5>3</h5>
                            </div>
                            <div class="experienced_content_image">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/experienced_image_4.png">
                            </div>
                        </div>
                        <div class="experienced_content_text_box">
                            <h3>しびれや感覚麻痺</h3>
                            <p>麻痺後のしびれや<br>
                            感覚麻痺を治したい</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="problem_section">
    <div class="custom_container">
        <div class="problem_content io fade upS">
            <div class="problem_heading">
                <h4>こんなお悩みありませんか？</h4>
            </div>
            <ul>
                <li>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/checkmark.svg">
                    <p>最近病院の通院が終わってしまったが、症状が改善していない</p>
                </li>
                <li>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/checkmark.svg">
                    <p>飲食が思うようにできず、誰かと食事をするのが苦痛</p>
                </li>
                <li>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/checkmark.svg">
                    <p>少しでも思い通りに手や足を動かせるようになりたい</p>
                </li>
                <li>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/checkmark.svg">
                    <p>鍼が良いと聞いて試したが変化がなかった</p>
                </li>
                <li>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/checkmark.svg">
                    <p>早めの治療を勧められるが、具体的にどうしたら<br>
                    良いかわからない</p>
                </li>
                <li>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/checkmark.svg">
                    <p>病院以外でもできることをしたい</p>
                </li>
                <li>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/checkmark.svg">
                    <p>手術したが、改善しない</p>
                </li>
                <li>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/checkmark.svg">
                    <p>これ以上治らないと言われたがなんとかしたい</p>
                </li>
            </ul>
        </div>
    </div>
</section>
<section class="therapy_btn_section">
    <div class="custom_container">
        <div class="custom_row">
            <div class="custom_col_6">
                <div class="exercise_therapy_btn therapy_btn io fade upS">
                    <div class="therapy_btn_heading">
                        <h3>認知運動療法</h3>
                    </div>
                    <p>手技や鍼による筋肉や神経への刺激により、<br>
                        麻痺により動かせなくなってしまっている筋肉を<br>
                    動かす手がかりを探します。</p>
                </div>
            </div>
            <div class="custom_col_6">
                <div class="neuro_therapy_btn therapy_btn io fade upS">
                    <div class="therapy_btn_heading">
                        <h3>神経セラピー</h3>
                    </div>
                    <p>手技や鍼によって、脳につながる神経を刺激し<br>
                        病気や障害によって失ってしまった神経の<br>
                    運動プログラムを回復します。</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="paralyzed_therapist_section">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/float_image_1.png" class="float_image float_image_1 io fade upS">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/float_image_2.png" class="float_image float_image_2 io fade upS">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/float_image_3.png" class="float_image float_image_3 io fade upS">
    <div class="custom_container">
        <div class="common_heading io fade">
            <h2>麻痺のセラピストについて</h2>
        </div>
        <div class="paralyzed_therapist_content">
            <div class="custom_row">
                <div class="custom_col_6">
                    <div class="paralyzed_therapist_image io fade upS">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/paralyzed_therapist_image.png">
                    </div>
                </div>
                <div class="custom_col_6">
                    <div class="paralyzed_therapist_text io fade upS">
                        <p>主催するファンクショナルマッサージ治療室は、婦人科鍼灸の老舗サロンであるとともに、創業時から難治性疼痛と神経麻痺の施術を専門分野として行っております。</p>
                        <p>「認知運動療法」「神経 therapy」を使った神経麻痺施術は神経麻痺のリハビリにおいて素晴らしい効果を発揮し続けており、全国から多くの治療家が、ファンクショナルマッサージ治療室の技術を身につけるために、セミナーに参加し、共に学んでおります。</p>
                        <p>醒脳開竅法を使った脳卒中後の鍼を併用したリハビリや、認知運動療法を併用した顔面神経麻痺施術、下垂足施術、下垂手施術は、ご自宅でのリハビリを併用しながら行うと抜群の効果を実感できます。</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="paralysis_treatment_section">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/float_image_4.png" class="float_image float_image_4 io fade upS">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/float_image_5.png" class="float_image float_image_5 io fade upS">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/float_image_6.png" class="float_image float_image_6 io fade upS">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/float_image_2.png" class="float_image float_image_2 io fade upS">
    <div class="custom_container">
        <div class="common_heading io fade">
            <h2>麻痺治療について</h2>
        </div>
        <div class="paralysis_treatment_profile_box">
            <div class="paralysis_treatment_profile_box_image io fade upS">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/profile.png">
            </div>
            <div class="paralysis_treatment_profile_box_text io fade upS">
                <p>はじめまして、ファンクショナルマッサージ治療室の粟木原と申します。</p>
                <p>東京と神奈川にサロンを7つ経営しております。</p>
                <p>創業時から『婦人科』『難治性疼痛』とともに、『麻痺』に対する施術を行なっており、<br>
                多くの末梢神経麻痺（顔面神経麻痺、下垂手、下垂足）と脳卒中後の後遺症の施術をさせて頂いておりました。</p>
                <a href="<?php echo get_site_url(); ?>/about" class="paralysis_treatment_btn">麻痺施術とは</a>
            </div>
        </div>
        <div class="paralysis_treatment_limit_box paralysis_treatment_content_box io fade upS">
            <div class="paralysis_treatment_heading_box">
                <h4>【クリニックの治療には限界がある】</h4>
                <div class="paralysis_treatment_point_box">
                    <p>POINT</p>
                    <h5>1</h5>
                </div>
            </div>
            <div class="paralysis_treatment_text_box">
                <p>麻痺になってファーストチョイスはクリニックの受診です。</p>
                <p>特に<span class="paralysis_treatment_text_red">顔面神経麻痺や脳卒中後の後遺症</span>は、まずはクリニックで適切な処置を受けてください！</p>
                <p>しかし、その後麻痺が<span class="paralysis_treatment_text_red">慢性期</span>になった時に、現在の保険制度では<br>なかなか<span class="paralysis_treatment_text_red">キチンとしたリハビリを受けるのは難しい</span>です。</p>
                <p>事実として、クリニックでの治療に限界を感じた方が全国から当院にいらっしゃいます。</p>
            </div>
        </div>
        <div class="paralysis_treatment_required_box paralysis_treatment_content_box io fade upS">
            <div class="paralysis_treatment_heading_box">
                <h4>【麻痺の改善には強いリハビリが必要！】</h4>
                <div class="paralysis_treatment_point_box">
                    <p>POINT</p>
                    <h5>2</h5>
                </div>
            </div>
            <div class="paralysis_treatment_text_box">
                <p>麻痺になってファーストチョイスはクリニックの受診です。</p>
                <p>慢性期に入った麻痺を改善するには、単純に<span class="paralysis_treatment_text_red">『動かす練習』『マッサージ』</span>だけでは<br>改善は困難だと認識しております。</p>
                <p>そこで必要なのが<span class="paralysis_treatment_text_red">『強い刺激』</span>です。</p>
                <p>鍼や手技で刺激を入れて、それを脳が感じて、その感覚を頼りに運動プログラムを探す。</p>
                <p>そんな<span class="paralysis_treatment_text_red">『認知運動療法』</span>と呼ばれる方法が必要となります。</p>
            </div>
            <div class="paralysis_treatment_acupuncture_box_sec">
                <div class="paralysis_treatment_acupuncture_box">
                    <p>認知刺激（手技や鍼）</p>
                </div>
                <div class="paralysis_treatment_acupuncture_box">
                    <p>脳が麻痺している部分に感覚を感じる</p>
                </div>
                <div class="paralysis_treatment_acupuncture_box">
                    <p>その感覚を頼りに運動プログラムをつくる</p>
                </div>
            </div>
            <p class="paralysis_treatment_box_text">このプログラムを定期的に行うことで、</p>
            <div class="paralysis_treatment_blue_box_sec">
                <div class="paralysis_treatment_blue_box_sec_inner">
                    <ul>
                        <li><p>ヘルニア後の下垂足で10年間装具を付けていた女性が装具なしで歩けるようになった。</p></li>
                        <li><p>サーフィンでの事故後に左腕に運動麻痺と感覚障害が起きた女性が完治した。</p></li>
                        <li><p>脳卒中後の後遺症で、車椅子でしか移動出来なかった方が一人で外出して
                        　お買い物ができるようになった。</p></li>
                    </ul>
                </div>
            </div>
            <p class="paralysis_treatment_box_text">など、普通で考えると奇跡としか思えないことを多く経験させて頂きました。</p>
        </div>
    </div>
</section>
<section class="participate_section">
    <div class="custom_container">
        <div class="participate_content_box io fade upS">
            <ul>
                <li><p>顔面神経麻痺が完全に治らない方</p></li>
                <li><p>オペ後の麻痺が残ってしまった方</p></li>
                <li><p>麻痺から回復して人生を取り戻したい方</p></li>
            </ul>
            <p>ぜひ体験メニューにご参加下さい！</p>
            <p>きっと人生を変える第一歩になります！</p>
        </div>
    </div>
</section>


</main><!-- #main -->
<?php
get_footer();
