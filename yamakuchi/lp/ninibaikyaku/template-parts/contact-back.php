<?php /* Template Name: Contact1*/ ?>
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
                        <a href="#">メディア掲載</a>
                    </li>
                </ul>
            </div>
            <div class="heading_text">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/contact-heading-image.png">
                <h2>お問い合わせ</h2>
            </div>
            <div class="contact_form_details_sec">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images//line-2.png" class="line_second_left">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images//line-2.png" class="line_second_right">
                <h2>お急ぎの方はお電話でお問い合わせください。</h2>
                <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images//contact-call-icon.png"> 0120-109-506</a>
                <p>受付時間 9:00～20:00 土日祝も対応しております。</p>
            </div>
            <div class="contact_form_text_sec">
                <div class="contact_form_text_sec_inner">
                    <h2>お問い合わせ、ご相談は無料です。</h2>
                    <p>住宅ローンのことで不安に思っていることや、<br class="cpc">任意売却が必要な状況かまだわからない 等でもかまいません！<br>
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
                        <p>近県でご対応可能な場合もありますので、お気軽にお問合せください。</p>
                    </div>
                </div>
            </div>
            <div class="contact_form_sec">
                <div class="contact_form_green_box">
                    <ul>
                        <li>
                            <a href="#" class="active_btn">入力画面</a>
                        </li>
                        <li>
                            <a href="#">確認画面</a>
                        </li>
                        <li>
                            <a href="#">完了</a>
                        </li>
                    </ul>
                </div>
                <div class="contact_form_box">
                    <form>
                        <div class="contact_form">
                            <div class="contact_form_bg_cover"></div>
                            <div class="contact_form_box_inner">
                                <div class="contact_form_lable contact_form_lable_center">
                                    <p>ニックネーム</p>
                                </div>
                                <div class="contact_form_field">
                                    <input type="text" placeholder="（例）たろう" class="small_contact_field">
                                    <p>ニックネームはなんでもOKです！<br>
                                    メール相談では氏名や電話番号は不要です。</p>
                                </div>
                            </div>
                            <div class="contact_form_box_inner">
                                <div class="contact_form_lable">
                                    <p>メールアドレス <span>必 須</span></p>
                                </div>
                                <div class="contact_form_field">
                                    <input type="email" placeholder="（例）info@ninibaikyaku-dr.com" class="big_contact_field">
                                </div>
                            </div>
                            <div class="contact_form_box_inner contact_form_box_inner_third">
                                <div class="contact_form_lable">
                                    <p>お問い合わせ項目 <span>必 須</span></p>
                                </div>
                                <div class="contact_form_field">
                                    <div class="custom_checkbox">
                                        <input type="checkbox" id="inquiry_items">
                                        <label for="inquiry_items">住宅ローンの返済・滞納について</label>
                                    </div>
                                    <div class="custom_checkbox">
                                        <input type="checkbox" id="inquiry_items1">
                                        <label for="inquiry_items1">任意売却や競売について</label>
                                    </div>
                                    <div class="custom_checkbox">
                                        <input type="checkbox" id="inquiry_items2">
                                        <label for="inquiry_items2">離婚や相続に関する住宅ローンについて</label>
                                    </div>
                                    <div class="custom_checkbox">
                                        <input type="checkbox" id="inquiry_items3">
                                        <label for="inquiry_items3">その他</label>
                                    </div>
                                </div>
                            </div>
                            <div class="contact_form_box_inner">
                                <div class="contact_form_lable">
                                    <p>都道府県 <span>必 須</span></p>
                                </div>
                                <div class="contact_form_field">
                                    <div class="contact_form_field_inner small_contact_field">
                                        <select class="small_contact_field">
                                            <option>選択してください</option>
                                            <option>選択してください</option>
                                            <option>選択してください</option>
                                            <option>選択してください</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="contact_form_box_inner">
                                <div class="contact_form_lable">
                                    <p>物件のタイプ <span>必 須</span></p>
                                </div>
                                <div class="contact_form_field">
                                    <div class="custom_checkbox">
                                        <input type="checkbox" id="inquiry_items4">
                                        <label for="inquiry_items4">戸建</label>
                                    </div>
                                    <div class="custom_checkbox">
                                        <input type="checkbox" id="inquiry_items5">
                                        <label for="inquiry_items5">マンション</label>
                                    </div>
                                    <div class="custom_checkbox">
                                        <input type="checkbox" id="inquiry_items6">
                                        <label for="inquiry_items6">その他</label>
                                    </div>
                                </div>
                            </div>
                            <div class="contact_form_box_inner">
                                <div class="contact_form_lable">
                                    <p>お問い合わせ項目 <span>必 須</span></p>
                                </div>
                                <div class="contact_form_field">
                                    <textarea class="big_contact_field" placeholder="（例）住宅ローンの督促状が届いた。 離婚を検討しており、自宅の住宅ローンをどうするべきか 等"></textarea>
                                </div>
                            </div>
                        </div>
                        <button>
                            未入力の必須項目があります<br>
                            <p>※未入力の項目がある場合は送信できません</p>
                        </button>
                        <a href="#">プライバシーポリシーを確認  <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                    </form>
                </div>
            </div>
            <div class="note_box_sec">
                <div class="note_box_sec_inner_main">
                    <div class="note_box_sec_inner_main_bg_cover"></div>
                    <div class="note_box_sec_inner">
                        <h3>任意売却Dr.からのメールが<br class="csp575">届かないお客様へ</h3>
                        <p>携帯電話のメールアドレスの場合、迷惑メール防止機能によって、当社からの返信が届かない場合があります。2営業日経過しても当社から返信がない場合には、誠に申し訳ございませんが、携帯電話のメール受信設定や迷惑メールフォルダを再度ご確認いただくか、電話またはLINEにて再度ご相談ください。</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</main><!-- #main -->
<?php
get_footer();