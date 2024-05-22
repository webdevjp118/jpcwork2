<?php /* Template Name: Contact */ ?>
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
            <div class="contact_form_wrap">
<?php
    echo do_shortcode('[contact-form-7 id="376" title="コンタクトフォーム"]'); //server
    // echo do_shortcode('[contact-form-7 id="27" title="Contact form 1"]'); //local
?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>