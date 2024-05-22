<?php /* Template Name: Contact*/ ?>
<?php 
get_header(); 
?>


<div class="filler_header cpc"></div>

<main id="primary" class="site-main">
<div class="sp_header_bar">
    <a href=""><img  src="<?php echo get_stylesheet_directory_uri(); ?>/images/menu-logo.svg"></a>
</div>
<section class="normal_banner_section pg_contact">
	<div class="normal_banner_text">
        <div class="banner_content">
            <div class="banner_deco_left">
                
            </div>
            <div class="text_wrap">
                <h1>お問い合わせ</h1>
		        <p>Contact</p>
            </div>
            <div class="banner_deco_right">
            </div>
        </div>
	</div>
</section>
<div class="blog_sec pg_contact">
    <div class="custom_container_medium">
        <p><a class="pankuzu" href="<?php echo get_site_url(); ?>">ホーム</a> / お問い合わせ</p>
<?php
    echo do_shortcode('[contact-form-7 id="794" title="コンタクトフォーム2"]'); 
    // echo do_shortcode('[contact-form-7 id="46" title="お問い合わせ"]');
?>
    </div>
    <div class="cpc" style="height:100px; content:'';"></div>
</div>
</main><!-- #main -->
<script>
$('#check-privacy').on( "click", function() {
  console.log("hello");
  let privacy_val =  $("input[name=check-privacy]").val();
  console.log(privacy_val);
  if(privacy_val == "checked") privacy_val = "unchecked";
  else privacy_val = "checked";
  $("input[name=check-privacy]").val(privacy_val);
  if(privacy_val == "checked") {
    if(!$(this).hasClass('selected')) $(this).addClass('selected');
  }
  else {
    $(this).removeClass('selected');
  }
});
</script>
<?php
get_footer();