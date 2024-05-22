<?php /* Template Name: Contact*/ ?>
<?php 
get_header(); 
?>

<main id="primary" class="site-main">

<section class="contact_form_section">
    <div class="custom_container">
        <div class="contact_form_inner_sec">
            <div class="breadcrumb_sec">
                <ul>
                    <li>
                        <a href="https://ninibaikyaku-dr.com/">トップ </a>
                    </li>
                    <li>
                        <a href="#">お問い合わせ</a>
                    </li>
                </ul>
            </div>
            <div class="heading_text">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/contact-heading-image.png">
                <h2>お問い合わせ</h2>
            </div>
            <div class="contact_form_details_sec">
                <div class="shape01_bg"></div>
                <div class="shape01_top"></div>
                <div class="shape01_right"></div>
                <div class="shape01_bottom"></div>
                <div class="shape01_left"></div>
                <div class="line_second_left"></div>
                <div class="line_second_right"></div>
                <h2>お急ぎの方はお電話で<span class="jpend">お問い合わせください。</span></h2>
                <a href="tel:0120-109-506"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images//contact-call-icon.png"> 0120-109-506</a>
                <p>受付時間 9:00～20:00 土日祝も<span class="jpend">対応しております。</span></p>
            </div>
            <div class="contact_form_text_sec">
                <div class="contact_form_text_sec_inner">
                    <h2>お問い合わせ、ご相談は無料です。</h2>
                    <p>住宅ローンのことで不安に思っていることや、<br class="cpc">任意売却が必要な状況かまだわからない等でも<span class="jpend">かまいません！</span><br>
                    お気軽にご相談ください。</p>
                </div>
            </div>
            <div class="correspondence_box_sec">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images//girl-image.png" class="girl_image">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images//line-3.png" class="correspondence_line_image">
                <div class="correspondence_box_sec_inner">
                    <div class="heading_text">
                        <h4>対応エリア</h4>
                    </div>
                    <div class="correspondence_box_sec_inner_text">
                        <h3>東京都｜神奈川県｜千葉県｜<br class="csp">埼玉県｜大阪府｜兵庫県｜福岡県</h3>
                        <p>※エリアは随時拡大中です。</p>
                        <p>近県でご対応可能な場合もありますので、お気軽に<span class="jpend">お問合せください。</span></p>
                    </div>
                </div>
            </div>
            <div class="contact_form_sec">
<?php
    // echo do_shortcode('[contact-form-7 id="52" title="Contact form 1"]');
    echo do_shortcode('[contact-form-7 id="3902" title="無料相談・お問い合わせ"]');
    //'北海道' '青森県' '岩手県' '宮城県' '秋田県' '山形県' '福島県' '茨城県' '栃木県' '群馬県' '埼玉県' '千葉県' '東京都' '神奈川県' '新潟県' '富山県' '石川県' '福井県' '山梨県' '長野県' '岐阜県' '静岡県' '愛知県' '三重県' '滋賀県' '京都府' '大阪府' '兵庫県' '奈良県' '和歌山県' '鳥取県' '島根県' '岡山県' '広島県' '山口県' '徳島県' '香川県' '愛媛県' '高知県' '福岡県' '佐賀県' '長崎県' '熊本県' '大分県' '宮崎県' '鹿児島県' '沖縄県'
?>          <div class="privacy_link">
                <a href="<?php echo get_site_url(); ?>/privacy/" target="_blank">プライバシーポリシーを確認  <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
            </div>
            <div class="note_box_sec">
                <div class="note_box_sec_inner_main">
                    <div class="shape02_container">
                        <div class="shape02_cover"></div>
                        <div class="shape02_cover1"></div>
                    </div>
                    <div class="note_box_sec_inner">
                        <h3>任意売却Dr.からのメールが<br class="csp6">届かないお客様へ</h3>
                        <p>携帯電話のメールアドレスの場合、迷惑メール防止機能によって、当社からの返信が届かない場合があります。2営業日経過しても当社から返信がない場合には、誠に申し訳ございませんが、携帯電話のメール受信設定や迷惑メールフォルダを再度ご確認いただくか、電話またはLINEにて再度<span class="jpend">ご相談ください。</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</main><!-- #main -->
<script>
$( ".checkbox_question" ).click(function() {
    let clickno = $(this).data('ref');
    if(clickno == 1) $( "#id_question" ).val("住宅ローンの返済・滞納について");
    else if(clickno == 2) $( "#id_question" ).val("任意売却や競売について");
    else if(clickno == 3) $( "#id_question" ).val("離婚や相続に関する住宅ローンについて");
    else if(clickno == 4) $( "#id_question" ).val("その他");
    console.log(clickno);
    $( ".checkbox_question" ).prop( "checked", false );
    $(this).prop( "checked", true );
});
$( ".checkbox_category" ).click(function() {
    let clickno = $(this).data('ref');
    if(clickno == 1) $( "#id_category" ).val("戸建");
    else if(clickno == 2) $( "#id_category" ).val("マンション");
    else if(clickno == 3) $( "#id_category" ).val("その他");
    console.log(clickno);
    $( ".checkbox_category" ).prop( "checked", false );
    $(this).prop( "checked", true );
});
</script>
<?php
get_footer();