<?php
get_header();
?>
<!-- CONTAIN_START -->
<section id="contain">    	        
    <div class="pgtitle_block">
        <div class="container">
            <div class="pgtitle initani initani_wbk">
                <h1>Contact Us</h1>
                <p>お問い合わせ</p>
            </div>
        </div>
    </div>
    <div class="pgfeature_block">
        <div class="pgfeature_right initani initani_ww">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/contact_feature.jpg">
        </div>
    </div>
    <div class="hx10"></div>
    <div class="contactform_block">
        <div class="contactform_width">
            <div class="contact_other">
                <a class="contactother_item" href="#">
                    <p class="contactother1">046-200-1095</p>
                    <span>（土日を除く平日9:00～18:00）</span>
                </a>
                <a class="contactother_item" href="#">
                    <p class="contactother2">046-200-1095</p>
                    <span>（24時間受付可）</span>
                </a>
            </div>
            <div class="contactother_desc">
                <p>
                    ※システム障害などで電話が切断された際にご連絡できるよう、電話番号の通知をお願いしております。<br>
                    ※非通知設定の場合は、おかけいただいた番号の前に「184」をつけておかけ直しください。
                </p>
            </div>
            <div class="hx3"></div>
            <div class="about_title initani initani_wbk">
                <h2>お問い合わせ</h2>
                <h3>Contact Form</h3>
            </div>
            <div class="contactform_desc">
                <p>弊社へのお問い合わせ誠にありがとうございます。以下のフォームより必要事項をご入力の上、個人情報保護方針に同意してご送信下さい。</p>
                <p>※機種依存文字・半角カタカナ・旧漢字は文字化け及びシステムエラーの原因となりますので、ご使用をお控え下さい。</p>
            </div>
            <?php //echo do_shortcode('[contact-form-7 id="1013" title="コンタクトフォーム 1"]'); //local?>
            <?php echo do_shortcode('[contact-form-7 id="18" title="Contact form 1"]'); ?>
        </div>
    </div>
    <div class="hx10"></div>
</section>
<!-- CONTAIN_END -->
<?php
get_footer();
