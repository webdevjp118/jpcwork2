<?php /* Template Name: Event*/ ?>
<?php 
get_header(); 
?>

<div class="container">
    <div class="breadcrumb_sec">
        <ul>
            <li>
                <a href="<?php echo get_site_url(); ?>">トップ </a>
            </li>
            <li>
                <a href="#">活動紹介</a>
            </li>
        </ul>
    </div>
</div>
<section class="activities-sec">
    <div class="guide-background-clip activities-background-clip">
        <img class="img img1" src="<?php echo get_stylesheet_directory_uri(); ?>/images/background-clip05.png" />
        <img class="img img2" src="<?php echo get_stylesheet_directory_uri(); ?>/images/background-clip01.png" />
        <img class="img img3" src="<?php echo get_stylesheet_directory_uri(); ?>/images/background-clip02.png" />
    </div>
    <div class="container">
        <div class="head">
            <h2>活動の一部をご紹介します</h2>
            <p>GALLERY</p>
        </div>
        <div class="cont">
            <p>教室の雰囲気をお伝えします。<br/>
                学習支援は特に力を入れています。</p>
        </div>
    </div>
    <div class="activities-wrapper">
        <div class="activities-flex">
<?php
$cpt_key = array(
    'post_type' => 'cevent',
    'orderby' => 'mdate',
    'order'   => 'DESC',
    // 'author' => $user_id,
	'posts_per_page' => -1,
    'fields' => 'ids',
);
$cpt_query = new WP_Query($cpt_key);
if($cpt_query->have_posts()) : 
    while ($cpt_query->have_posts()) : 
        $cpt_query->the_post(); 
        $loop_id = get_the_id();
		$loop_date = get_post_meta($loop_id, 'mdate', true);
		$loop_date = date( "Y.m.d", strtotime( $loop_date ) );
        $loop_title = get_post_meta($loop_id, 'mtitle', true);
        $loop_image = get_post_meta($loop_id, 'image', true);
        if(empty($loop_image)) $loop_image = get_stylesheet_directory_uri().'/images/no-picture.jpg';
?>
            <div class="col">
                <div class="activities-bx">
                    <div class="img">
                        <img src="<?php echo $loop_image; ?>" />
                    </div>
                    <div class="cont">
                        <div class="cont-flex">
                            <span><?php echo $loop_date; ?></span>
                            <a href="#">室内遊び</a>
                        </div>
                        <p><?php echo $loop_title; ?></p>
                    </div>
                </div>
            </div>
<?php endwhile; 
endif;
?>
            
        </div>
    </div>
</section>
<section class="gallery-sec">
    <img class="before-img" src="<?php echo get_stylesheet_directory_uri(); ?>/images/admin-before-img.png" />
    <div class="gallery-wrapper">
        <div class="gallery-flex">
            <div class="col">
                <div class="gallery-bx">
                    <div class="img">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/gallery-img01.png" />
                    </div>
                    <div class="cont">
                        <p>発達診断<br/>
                            レポ一ト</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="gallery-bx pos-top">
                    <div class="img">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/gallery-img02.png" />
                    </div>
                    <div class="cont">
                        <p>ソ一シャルスキル<br/>
                            トレ一二ング(SST)</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="gallery-bx pos-top">
                    <div class="img">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/gallery-img03.png" />
                    </div>
                    <div class="cont">
                        <p>体操教室</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="gallery-bx">
                    <div class="img">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/gallery-img04.png" />
                    </div>
                    <div class="cont">
                        <p>ダンス教室</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="gallery-bx">
                    <div class="img">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/gallery-img05.png" />
                    </div>
                    <div class="cont">
                        <p>プログラミング</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="gallery-bx">
                    <div class="img">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/gallery-img06.png" />
                    </div>
                    <div class="cont">
                        <p>野外活動</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="gallery-bx">
                    <div class="img">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/gallery-img07.png" />
                    </div>
                    <div class="cont">
                        <p>算数ラボ</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="gallery-bx">
                    <div class="img">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/gallery-img08.png" />
                    </div>
                    <div class="cont">
                        <p>物理実験</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="gallery-bx">
                    <div class="img">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/gallery-img09.png" />
                    </div>
                    <div class="cont">
                        <p>ボクササイズ</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="gallery-bx pos-btm">
                    <div class="img">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/gallery-img10.png" />
                    </div>
                    <div class="cont">
                        <p>言語訓練</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="gallery-bx pos-btm">
                    <div class="img">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/gallery-img11.png" />
                    </div>
                    <div class="cont">
                        <p>論理エンジン</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="gallery-bx">
                    <div class="img">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/gallery-img12.png" />
                    </div>
                    <div class="cont">
                        <p>などなど</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="after-school-sec event-page">
    <div class="aft-scl-contact">
        <div class="aft-scl-contact-wrap">
            <div class="aft-scl-contact-row">
            <div class="col">
                    <div class="aft-scl-contact-bx one">
                        <h4>長与校</h4>
                        <p>西彼長与町斉藤郷49-3</p>
                        <div class="contact-flex js_button" data-href="tel:+0958014194">
                            <div class="contact-icon">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                            </div>
                            <div class="contact-text">
                                095-801-4194
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="aft-scl-contact-bx two">
                        <h4>松山校</h4>
                        <p>長崎市岡町4-2-2F</p>
                        <div class="contact-flex js_button" data-href="tel:+0958947156">
                            <div class="contact-icon">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                            </div>
                            <div class="contact-text">
                                095-894-7156
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="aft-scl-contact-bx three">
                        <h4>浜の町校</h4>
                        <p>長崎市万屋町6-13-4F</p>
                        <div class="contact-flex js_button" data-href="tel:+0958935033">
                            <div class="contact-icon">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                            </div>
                            <div class="contact-text">
                                095-893-5033
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="aft-scl-contact-bx two">
                        <h4>葉山校</h4>
                        <p>長崎市滑石2-5-15</p>
                        <div class="contact-flex js_button" data-href="tel:">
                            <div class="contact-icon">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                            </div>
                            <div class="contact-text">
                                095-800-6307
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
get_footer();