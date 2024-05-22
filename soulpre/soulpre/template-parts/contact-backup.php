<?php /* Template Name: Contact Backup*/ ?>
<?php get_header(); ?>

<section class="site_breadcrumb">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images//products_breadcrumb.jpg" />
    <div class="breadcrumb_content">
        <h2>CONTACT</h2>
        <p>お問い合わせ</p>
    </div>
</section>
<section class="contact_page_section">
    <div class="custom_container">
        <p class="inquiry_text">ご相談・お問い合わせは以下フォームより受け付けております。<br>お気軽にお問い合わせください。</p>
        <div class="form_shadow_box">
            <h4>お問い合わせフォーム</h4>
            <form>
                <div class="single_input">
                    <label>企業名</label>
                    <input type="text" name="" placeholder="例）株式会社ループ">
                </div>
                <div class="single_input">
                    <label>お名前</label>
                    <input type="text" name="" placeholder="例）山田　太郎">
                </div>
                <div class="single_input">
                    <label>お電話番号</label>
                    <input type="text" name="" placeholder="例）027-381-6594">
                </div>
                <div class="single_input">
                    <label>メールアドレス</label>
                    <input type="email" name="" placeholder="例）loop@sample.com">
                </div>
                <div class="single_input address_inputs">
                    <label>住所</label>
                    <div class="address_input_row">
                        <span class="t_pin">〒</span>
                        <input type="text" name="" placeholder="000">
                        <span class="saperator"></span>
                        <input type="text" name="" placeholder="000">
                        <a class="autofill_addredd" href="javascript:void(0)">住所自動入力</a>
                    </div>
                    <input type="text" name="" placeholder="例）群馬県高崎市中室田町4213-1">
                </div>
                <div class="single_input">
                    <label>内容</label>
                    <textarea placeholder="ご自由にご入力ください。"></textarea>
                </div>
                <button type="submit" class="form_submit">
                    送信する <img src="<?php echo get_stylesheet_directory_uri(); ?>/images//icon_arrow_right_white.png" align="arrow icon">
                </button>
            </form>
        </div>
    </div>
</section>

<?php get_footer(); ?>