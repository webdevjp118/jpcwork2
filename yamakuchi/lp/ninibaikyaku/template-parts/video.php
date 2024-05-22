<?php /* Template Name: Video*/ ?>
<?php 
get_header(); 
?>
<main id="primary" class="site-main">

<section class="video_page_sec">
    <div class="pagetitle_wrap">
        <div class="custom_container">    
            <div class="pankuzu_sec">
                <ul><li><a href="https://ninibaikyaku-dr.com/">トップ </a></li><li><a href="#">動画で学ぼう！</a></li></ul>
            </div>
            <div class="pagetitle">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/video-heading-image.png">
                <h2>動画で学ぼう！</h2>
            </div>
        </div>
    </div>
    <div class="custom_container">
        <div class="first_video_sec">
            <div class="shape02_container">
                <div class="shape02_cover"></div><div class="shape02_cover1"></div>
            </div>
            <div class="video_title">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/heading-image.png">
                <h2>お金に関することはむずかしい話が<br class="csp6">多くて苦手・・・という方必見！<br>
                    「任意売却」や「住宅ローン」を<br class="csp6">スキマ時間にサクッと学ぼう！</h2>
            </div>
            <div class="video_wrap">
                <div class="video_inner">
                    <div class="youtube_link"></div>
                </div>
            </div>
            <div class="titledeco_wrap">
                <div class="title_decoration">
                    <h3>3分でわかる！住宅ローンの返済に<br class="csp">困ったら『任意売却Dr.』</h3>
                </div>
                <div class="video_time">
                    <p>2分45秒</p>
                </div>
            </div>
            <h4>この動画で学べること</h4>
            <p>「任意売却Dr.」の概要がサクッと理解していただけます♪<br>
                住宅ローンを長期滞納してしまうと、一体どうなってしまうのでしょうか？<br>
                通常、６か月分の滞納を超えると、あなたの住宅ローン契約は「債権回収会社」や「保証会社」に移行されてしまいます。<br>
                家は「差押え」されてしまうのでしょうか？<br>
                誰に、何をどのように相談して良いかわからない・・・<br>
                そんな時は、金融機関出身者が設立した住宅ローンの専門家「任意売却ドクター」までご相談ください。<br>
                住宅ローンのプロだからこそ出来る、あなたに合った適切な解決方法をご提案いたします。</p>
        </div>
<?php
$video_key = array(
    'post_type' => 'cvideo',
    // 'author' => $user_id,
	'posts_per_page' => -1,
    'fields' => 'ids',
);
$video_query = new WP_Query($video_key);
if($video_query->have_posts()) : 
    while ($video_query->have_posts()) : 
        $video_query->the_post(); 
        $loop_id = get_the_id();
		$loop_date = get_post_meta($loop_id, 'vdate', true);
		$loop_date = date( "Y.m.d", strtotime( $loop_date ) );
        $loop_title = get_post_meta($loop_id, 'vtitle', true);
        $loop_url = get_post_meta($loop_id, 'vurl', true);
        $loop_url = str_replace('https://youtu.be/','https://www.youtube.com/embed/',$loop_url);
        $loop_duration = get_post_meta($loop_id, 'vduration', true);
        $loop_content = get_post_meta($loop_id, 'vcontent', true);
        $loop_content = wpautop($loop_content);
        $loop_vpeople = get_post_meta($loop_id, 'vpeople', true);
        $loop_wpeople = wpautop($loop_vpeople);
		
?>
        <div class="video_sec">
            <div class="video_wrap">
                <div class="video_inner">
                    <iframe width="100%" height="100%" src="<?php echo $loop_url; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <div class="video_text_wrap">
                <h2><?php echo $loop_title; ?></h2>
                <div class="video_time"><?php echo $loop_duration; ?></div>
                <p><?php echo $loop_content; ?></p>
            </div>
            <?php if(!empty($loop_vpeople)) { ?>
            <div class="video_text_wrap">
                <p style="margin-top:20px; font-weight:bold;">出演</p>
                <p><?php echo $loop_wpeople; ?></p>
            </div>
            <?php } ?>
        </div>
<?php 
    endwhile;
endif;
?>
    </div>
</section>
<section class="studio_sec">
    <div class="custom_container">
        <div  class="studio_title_deco"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/heading-image.png" class=""></div>
        <div class="studio_title">
            <h2>自社スタジオから日々発信中！</h2>
        </div>
    </div>
    <div class="studio_slick slider">
        <div class="studio_photo">
            <div class="studio_photo_wrap">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/studio_01.jpg"></img>
            </div>
        </div>
        <div class="studio_photo">
            <div class="studio_photo_wrap">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/studio_02.jpg"></img>
            </div>
        </div>
        <div class="studio_photo">
            <div class="studio_photo_wrap">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/studio_03.jpg"></img>
            </div>
        </div>
        <div class="studio_photo">
            <div class="studio_photo_wrap">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/studio_04.jpg"></img>
            </div>
        </div>
        <div class="studio_photo">
            <div class="studio_photo_wrap">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/studio_01.jpg"></img>
            </div>
        </div>
        <div class="studio_photo">
            <div class="studio_photo_wrap">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/studio_02.jpg"></img>
            </div>
        </div>
        <div class="studio_photo">
            <div class="studio_photo_wrap">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/studio_03.jpg"></img>
            </div>
        </div>
        <div class="studio_photo">
            <div class="studio_photo_wrap">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/studio_04.jpg"></img>
            </div>
        </div>
    </div>
    <div class="custom_container">
        <div class="studio_p">
            <p class="studio_p">
                任意売却Dr.では自社スタジオを設営し、代表の山口とアナウンサーとのQ&A形式や、ゲストを招いたトーク動画などを撮影。よくある知識動画とは違い、分かりやすく、ご相談者さまの目線に立った情報を発信しています。文字を読むだけではなかなか分かりづらい、住宅ローンやお金の話。動画ならスキマ時間に気軽な気持ちで触れていただけます。また、私たち任意売却Dr.のことをより知っていただける機会となると思います。任意売却Dr.公式Youtubeチャンネルをチャンネル登録していただき、気軽な気持ちでご覧ください♪
            </p>
        </div>
        <div class="studio_btn">
            <a target="_blank" href="https://www.youtube.com/channel/UC8YaQp62H-3L_nlAXJtZ-vg/videos">任意売却Dr.公式Youtubeチャンネル<i class="fa fa-chevron-right"></i></a>
        </div>
    </div>
</section>

</main><!-- #main -->
<?php
get_footer();