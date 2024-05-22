<?php /* Template Name: Contact1*/ ?>
<?php get_header();?>

<!-- contact_form_section -->
<section class="contact_form_section">
    <div class="medium_custom_container">
        <div class="heading_text">
            <h5>CONTACT</h5>
            <p>ご予約＆お問い合わせ</p>
        </div>
        <div class="contact_form_sec">
<?php
    // echo do_shortcode('[contact-form-7 id="19" title="お問い合わせ"]'); 
    echo do_shortcode('[contact-form-7 id="807" title="コンタクトフォーム2"]');
?>
        </div>
    </div>
</section>

</main><!-- #main -->

<script>
$( ".opt-duration" ).click(function() {
    let clickno = $(this).data('ref');
    if(clickno == 1) $( ".fake-input" ).val("90分");
    else if(clickno == 2) $( ".fake-input" ).val("120分");
    else if(clickno == 3) $( ".fake-input" ).val("150分");
    else if(clickno == 4) $( ".fake-input" ).val("180分");
    console.log(clickno);
    $( ".opt-duration" ).prop( "checked", false );
    $(this).prop( "checked", true );
});
</script>

<?php
get_footer();