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
            <?php //echo do_shortcode("[contact-form-7 id='11' title='コンタクトフォーム 1']"); //local ?>
            <?php echo do_shortcode('[contact-form-7 id="45" title="Contact form 1"]'); ?>
        </div>
    </div>
    <div class="hx10"></div>
</section>
<!-- CONTAIN_END -->
<?php
get_footer();
