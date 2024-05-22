<?php /* Template Name: Guest Room*/ ?>
<?php 
get_header(); 
?>

<div class="filler_header cpc"></div>

<main id="primary" class="site-main">


<!-- banner -->
<section class="normal_banner_section pg_guest">
    <div class="normal_banner_text">
        <div class="guest_banner_text">
            <h1>Guest Rooms</h1>
            <p>客室</p>
        </div>
        <div class="sp_booking_area">
                <a class="sp_booking_btn">
                    <svg><use xlink:href="#svg_marrow_r" style="visibility:hidden"></use></svg>
                    <div>
                        <span>宿泊予約</span><br>
                        Booking	
                    </div>
                    <svg><use xlink:href="#svg_marrow_r"></use></svg>
                </a>
        </div>
    </div>
</section>
<!-- white_text -->
<section class="white_text_section">
    <div class="custom_container_medium">
        <div class="header_text">
            <div class="header_text">
                <h2><a class="pankuzu" href="<?php echo get_site_url(); ?>">ホーム</a> / 客室</h2>
            </div>
        </div>
        <div class="white_text_sec">
            <h1>心地よい安らぎと、<br class="csp">ゆとりある贅沢なお部屋</h1>
            <p>清潔で安心、安全をモットーに温かみのある空間を提供するホスピタリティあふれるホテルです。</p>
            <p>用途に応じて4種類のお部屋をご用意しております。</p>
        </div>
    </div>
</section>
<!-- rooms_section -->
<section class="rooms_section">
    <div class="custom_container_medium">
        <div class="rooms_option io fade upS">
            <div class="custom_row">
                <div class="options_select">
                    <div class="options">
                        <a href="#guest_single">
                            シングル/<br>デラックスダブルルーム
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/pg_gr_arrow_down.png">
                        </a>
                    </div>
                </div>
                <div class="options_select">
                    <div class="options">
                        <a href="#guest_economy">
                            エコノミーツインルーム
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/pg_gr_arrow_down.png">
                        </a>
                    </div>
                </div>
                <div class="options_select">
                    <div class="options">
                        <a href="#guest_twin">
                            ツインルーム
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/pg_gr_arrow_down.png">
                        </a>
                    </div>
                </div>
                <div class="options_select">
                    <div class="options">
                        <a href="#guest_deluxe">
                            デラックスツインルーム
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/pg_gr_arrow_down.png">
                        </a>
                    </div>
                </div>
                <div class="options_select">
                    <div class="options">
                        <a href="#guest_family">
                            ファミリールーム
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/pg_gr_arrow_down.png">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="rooms_sec io fade upS" id="guest_single">
        <div class="header_text">
            <h2>シングル/<br class="csp">デラックスダブルルーム</h2>
            <span>Single/Deluxe Double Room</span>
        </div>
        <div class="custom_row">
            <div class="rooms_sec_image room1">
            </div>
            <div class="rooms_sec_text">
                <div class="rooms_sec_text_inner">
                    <div class="rooms_inner_text">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/line1.png">
                        <h2>シックで機能的なダブルベッドのお部屋です。心地よく快適にお寛ぎ頂けます。</h2>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/line2.png">
                    </div>
                    <div class="rooms_inner_text_detail">
                        <div class="custom_row">
                            <div class="rooms_inner_text_details">
                                <h6>定員</h6>
                                <h6>定員</h6>
                                <p>ベッドサイズ</p>
                                <h6>客室数</h6>
                                <p>チェックイン/アウト</p>
                            </div>
                            <div class="rooms_inner_text_details">
                                <p>1~2名</p>
                                <p>18㎡～20㎡</p>
                                <p>205cm×140cm</p>
                                <p>5室</p>
                                <p>15:00/11:00</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="rooms_sec_text_detail">
            <div class="custom_container_medium">
                <div class="custom_row">
                    <div class="rooms_text_detail_inner">
                        <div class="custom_row">
                            <div class="rooms_detail_inner_text">
                                <p>設備・備品・サービス</p>
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/line3.png" class="rooms_text_img">
                            </div>
                            <div class="rooms_sec_detail_inner_text">
                                <div class="custom_row">
                                    <div class="rooms_detail_inner_texts">
                                        <p>マルチ電源コンセント</p>
                                        <p>客室WI-FI</p>
                                        <p>高速インターネット</p>
                                        <p>空気清浄機</p>
                                        <p>寝具：羽毛布団</p>
                                        <p>ドライヤー</p>
                                    </div>
                                    <div class="rooms_detail_inner_texts">
                                        <p>コーヒーティポット</p>
                                        <p>ティーバッグ</p>
                                        <p>ミネラルウォーター</p>
                                        <p>冷蔵庫</p>
                                        <p>ウォシュレット</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rooms_text_detail_inner ">
                        <div class="custom_row">
                            <div class="rooms_detail_inner_text rooms_detail_inner_text_sec">
                                <p>アメニティ</p>
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/line3.png" class="rooms_text_img_sec">
                            </div>
                            <div class="rooms_sec_detail_inner_text">
                                <div class="custom_row">
                                    <div class="rooms_detail_inner_texts rooms_text_detail_inner_sec">
                                        <p>コンディショナー</p>
                                        <p>ボディソープ</p>
                                        <p>歯ブラシ</p>
                                        <p>くし、コーム</p>
                                        <p>歯磨き粉</p>
                                        <p>シャンプー</p>
                                    </div>
                                    <div class="rooms_detail_inner_texts rooms_text_detail_inner_sec">
                                        <p>カミソリ</p>
                                        <p>ルームウェア</p>
                                        <p>スリッパ</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="rooms_sec_link">
            <a href="https://reserve.489ban.net/client/fivehotel-osaka/0/plan/room/17220">この部屋に宿泊する
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/readmore-picker-r.svg" class="read_more_img">
            </a>
        </div>
    </div>
    <div class="rooms_sec io fade upS" id="guest_economy">
        <div class="header_text">
            <h2>エコノミーツインルーム</h2>
            <span>Economy Twin Room</span>
        </div>
        <div class="custom_row">
            <div class="rooms_sec_image room2">
            </div>
            <div class="rooms_sec_text">
                <div class="rooms_sec_text_inner">
                    <div class="rooms_inner_text">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/line1.png">
                        <h2>シングルベッドを２台配した南側の明るいお部屋です。こだわりの備品やアメニティと最上の眠りのためのシモンズベッドを完備</h2>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/line2.png">
                    </div>
                    <div class="rooms_inner_text_detail">
                        <div class="custom_row">
                            <div class="rooms_inner_text_details">
                                <h6>定員</h6>
                                <h6>定員</h6>
                                <p>ベッドサイズ</p>
                                <h6>客室数</h6>
                                <p>チェックイン/アウト</p>
                            </div>
                            <div class="rooms_inner_text_details">
                                <p>1~2名</p>
                                <p>20㎡～22㎡</p>
                                <p>195cm×110cm×2台</p>
                                <p>18室</p>
                                <p>15:00/11:00</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="rooms_sec_text_detail">
            <div class="custom_container_medium">
                <div class="custom_row">
                    <div class="rooms_text_detail_inner">
                        <div class="custom_row">
                            <div class="rooms_detail_inner_text">
                                <p>設備・備品・サービス</p>
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/line3.png" class="rooms_text_img">
                            </div>
                            <div class="rooms_sec_detail_inner_text">
                                <div class="custom_row">
                                    <div class="rooms_detail_inner_texts">
                                        <p>マルチ電源コンセント</p>
                                        <p>客室WI-FI</p>
                                        <p>高速インターネット</p>
                                        <p>空気清浄機</p>
                                        <p>寝具：羽毛布団</p>
                                        <p>ドライヤー</p>
                                    </div>
                                    <div class="rooms_detail_inner_texts">
                      
                                        <p>コーヒーティポット</p>
                                        <p>ティーバッグ</p>
                                        <p>ミネラルウォーター</p>
                                        <p>冷蔵庫</p>
                                        <p>ウォシュレット</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rooms_text_detail_inner">
                        <div class="custom_row">
                            <div class="rooms_detail_inner_text rooms_detail_inner_text_sec rooms_detail_inner_text_sec">
                                <p>アメニティ</p>
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/line3.png" class="rooms_text_img_sec">
                            </div>
                            <div class="rooms_sec_detail_inner_text">
                                <div class="custom_row">
                                    <div class="rooms_detail_inner_texts rooms_text_detail_inner_sec">
                    
                                        <p>コンディショナー</p>
                                        <p>ボディソープ</p>
                                        <p>歯ブラシ</p>
                                        <p>くし、コーム</p>
                                        <p>歯磨き粉</p>
                                        <p>シャンプー</p>
                                    </div>
                                    <div class="rooms_detail_inner_texts rooms_text_detail_inner_sec">
            
                                        <p>カミソリ</p>
                                        <p>ルームウェア</p>
                                        <p>スリッパ</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="rooms_sec_link">
            <a href="https://reserve.489ban.net/client/fivehotel-osaka/0/plan/room/17217">この部屋に宿泊する
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/readmore-picker-r.svg" class="read_more_img">
            </a>
        </div>
    </div>

    <div class="rooms_sec io fade upS" id="guest_twin">
        <div class="header_text">
            <h2>ツインルーム</h2>
            <span>Twin Room</span>
        </div>
        <div class="custom_row">
            <div class="rooms_sec_image room3">
            </div>
            <div class="rooms_sec_text">
                <div class="rooms_sec_text_inner">
                    <div class="rooms_inner_text">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/line1.png">
                        <h2>ツインルームとして、快適にお過ごしいただけます。ご家族やご友人とのご旅行などに。</h2>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/line2.png">
                    </div>
                    <div class="rooms_inner_text_detail">
                        <div class="custom_row">
                            <div class="rooms_inner_text_details">
                                <h6>定員</h6>
                                <h6>定員</h6>
                                <p>ベッドサイズ</p>
                                <h6>客室数</h6>
                                <p>チェックイン/アウト</p>
                            </div>
                            <div class="rooms_inner_text_details">
                                <p>1~2名</p>
                                <p>22㎡～23㎡</p>
                                <p>195cm×110cm×2台</p>
                                <p>58室</p>
                                <p>15:00/11:00</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="rooms_sec_text_detail">
            <div class="custom_container_medium">
                <div class="custom_row">
                    <div class="rooms_text_detail_inner">
                        <div class="custom_row">
                            <div class="rooms_detail_inner_text">
                                <p>設備・備品・サービス</p>
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/line3.png" class="rooms_text_img">
                            </div>
                            <div class="rooms_sec_detail_inner_text">
                                <div class="custom_row">
                                    <div class="rooms_detail_inner_texts">
                        
                                        <p>マルチ電源コンセント</p>
                                        <p>客室WI-FI</p>
                                        <p>高速インターネット</p>
                                        <p>空気清浄機</p>
                                        <p>寝具：羽毛布団</p>
                                        <p>ドライヤー</p>                                    
                                    </div>
                                    <div class="rooms_detail_inner_texts">
                                        

                                        <p>コーヒーティポット</p>
                                        <p>ティーバッグ</p>
                                        <p>ミネラルウォーター</p>
                                        <p>冷蔵庫</p>
                                        <p>ウォシュレット</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rooms_text_detail_inner">
                        <div class="custom_row">
                            <div class="rooms_detail_inner_text rooms_detail_inner_text_sec rooms_detail_inner_text_sec">
                                <p>アメニティ</p>
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/line3.png" class="rooms_text_img_sec">
                            </div>
                            <div class="rooms_sec_detail_inner_text">
                                <div class="custom_row">
                                    <div class="rooms_detail_inner_texts rooms_text_detail_inner_sec">

                                        <p>コンディショナー</p>
                                        <p>ボディソープ</p>
                                        <p>歯ブラシ</p>
                                        <p>くし、コーム</p>
                                        <p>歯磨き粉</p>
                                        <p>シャンプー</p>
                                    </div>
                                    <div class="rooms_detail_inner_texts rooms_text_detail_inner_sec">

                                        <p>カミソリ</p>
                                        <p>ルームウェア</p>
                                        <p>スリッパ</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="rooms_sec_link">
            <a href="https://reserve.489ban.net/client/fivehotel-osaka/0/plan/room/17215">この部屋に宿泊する
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/readmore-picker-r.svg" class="read_more_img">
            </a>
        </div>
    </div>

    <div class="rooms_sec io fade upS" id="guest_deluxe">
        <div class="header_text">
            <h2>デラックスツインルーム</h2>
            <span>Deluxe Twin Room</span>
        </div>
        <div class="custom_row">
            <div class="rooms_sec_image room4">
            </div>
            <div class="rooms_sec_text">
                <div class="rooms_sec_text_inner">
                    <div class="rooms_inner_text">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/line1.png">
                        <h2>お部屋の窓際にゆったり寛げるチェアとテーブルを配したお部屋です。</h2>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/line2.png">
                    </div>
                    <div class="rooms_inner_text_detail">
                        <div class="custom_row">
                            <div class="rooms_inner_text_details">
                                <h6>定員</h6>
                                <h6>定員</h6>
                                <p>ベッドサイズ</p>
                                <h6>客室数</h6>
                                <p>チェックイン/アウト</p>
                            </div>
                            <div class="rooms_inner_text_details">
                                <p>1~2名</p>
                                <p>23㎡～24㎡</p>
                                <p>195cm×110cm×2台</p>
                                <p>37室</p>
                                <p>15:00/11:00</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="rooms_sec_text_detail">
            <div class="custom_container_medium">
                <div class="custom_row">
                    <div class="rooms_text_detail_inner">
                        <div class="custom_row">
                            <div class="rooms_detail_inner_text">
                                <p>設備・備品・サービス</p>
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/line3.png" class="rooms_text_img">
                            </div>
                            <div class="rooms_sec_detail_inner_text">
                                <div class="custom_row">
                                    <div class="rooms_detail_inner_texts">

                                        <p>マルチ電源コンセント</p>
                                        <p>客室WI-FI</p>
                                        <p>高速インターネット</p>
                                        <p>空気清浄機</p>
                                        <p>寝具：羽毛布団</p>
                                        <p>ドライヤー</p>
                                    </div>
                                    <div class="rooms_detail_inner_texts">

                                        <p>コーヒーティポット</p>
                                        <p>ティーバッグ</p>
                                        <p>ミネラルウォーター</p>
                                        <p>冷蔵庫</p>
                                        <p>ウォシュレット</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rooms_text_detail_inner">
                        <div class="custom_row">
                            <div class="rooms_detail_inner_text rooms_detail_inner_text_sec">
                                <p>アメニティ</p>
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/line3.png" class="rooms_text_img_sec">
                            </div>
                            <div class="rooms_sec_detail_inner_text">
                                <div class="custom_row">
                                    <div class="rooms_detail_inner_texts rooms_text_detail_inner_sec">

                                        <p>コンディショナー</p>
                                        <p>ボディソープ</p>
                                        <p>歯ブラシ</p>
                                        <p>くし、コーム</p>
                                        <p>歯磨き粉</p>
                                        <p>シャンプー</p>
                                    </div>
                                    <div class="rooms_detail_inner_texts rooms_text_detail_inner_sec">

                                        <p>カミソリ</p>
                                        <p>ルームウェア</p>
                                        <p>スリッパ</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="rooms_sec_link">
            <a href="https://reserve.489ban.net/client/fivehotel-osaka/0/plan/room/17216">この部屋に宿泊する
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/readmore-picker-r.svg" class="read_more_img">
            </a>
        </div>
    </div>
    <div class="rooms_sec io fade upS" id="guest_family">
        <div class="header_text">
            <h2>ファミリールーム</h2>
            <span>Family Room</span>
        </div>
        <div class="custom_row">
            <div class="rooms_sec_image room5">
            </div>
            <div class="rooms_sec_text">
                <div class="rooms_sec_text_inner">
                    <div class="rooms_inner_text">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/line1.png">
                        <h2>旅先での疲れもしっかりリフレッシュ、ご家族、お子様連れのご旅行にもお勧めです。土足厳禁なので赤ちゃんもハイハイ出来ます。</h2>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/line2.png">
                    </div>
                    <div class="rooms_inner_text_detail">
                        <div class="custom_row">
                            <div class="rooms_inner_text_details">
                                <h6>定員</h6>
                                <h6>定員</h6>
                                <p>ベッドサイズ</p>
                                <h6>客室数</h6>
                                <p>チェックイン/アウト</p>
                            </div>
                            <div class="rooms_inner_text_details">
                                <p>1~2名</p>
                                <p>23㎡～24㎡</p>
                                <p>195cm×110cm×2台</p>
                                <p>1室</p>
                                <p>15:00/11:00</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="rooms_sec_text_detail">
            <div class="custom_container_medium">
                <div class="custom_row">
                    <div class="rooms_text_detail_inner">
                        <div class="custom_row">
                            <div class="rooms_detail_inner_text">
                                <p>設備・備品・サービス</p>
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/line3.png" class="rooms_text_img">
                            </div>
                            <div class="rooms_sec_detail_inner_text">
                                <div class="custom_row">
                                    <div class="rooms_detail_inner_texts">
                                        <p>マルチ電源コンセント</p>
                                        <p>客室WI-FI</p>
                                        <p>高速インターネット</p>
                                        <p>空気清浄機</p>
                                        <p>寝具：羽毛布団</p>
                                        <p>ドライヤー</p>
                                    </div>
                                    <div class="rooms_detail_inner_texts">

                                        <p>コーヒーティポット</p>
                                        <p>ティーバッグ</p>
                                        <p>ミネラルウォーター</p>
                                        <p>冷蔵庫</p>
                                        <p>ウォシュレット</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rooms_text_detail_inner">
                        <div class="custom_row">
                            <div class="rooms_detail_inner_text rooms_detail_inner_text_sec">
                                <p>アメニティ</p>
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/line3.png" class="rooms_text_img_sec">
                            </div>
                            <div class="rooms_sec_detail_inner_text">
                                <div class="custom_row">
                                    <div class="rooms_detail_inner_texts rooms_text_detail_inner_sec">

                                        <p>コンディショナー</p>
                                        <p>ボディソープ</p>
                                        <p>歯ブラシ</p>
                                        <p>くし、コーム</p>
                                        <p>歯磨き粉</p>
                                        <p>シャンプー</p>
                                    </div>
                                    <div class="rooms_detail_inner_texts rooms_text_detail_inner_sec">

                                        <p>カミソリ</p>
                                        <p>ルームウェア</p>
                                        <p>スリッパ</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="rooms_sec_link">
            <a href="https://reserve.489ban.net/client/fivehotel-osaka/0/plan/room/17219">この部屋に宿泊する
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/readmore-picker-r.svg" class="read_more_img">
            </a>
        </div>
    </div>
</section>

<?php echo_recommend_sec(); ?>
<?php echo_reserve_sec(); ?>

</main><!-- #main -->

<?php
get_footer();