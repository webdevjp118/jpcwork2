<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package vetsexpo
 */

get_header();
?>
<?php 
$post_id = get_the_id();
$company_name = get_post_meta( $post_id, 'company_name', true );
$maker_name = get_post_meta( $post_id, 'maker_name', true );
$phone_number = get_post_meta( $post_id, 'phone_number', true );
$company_email = get_post_meta( $post_id, 'company_email', true );
$company_3dcg = get_post_meta( $post_id, 'company_3dcg', true );
$company_catalog = get_post_meta( $post_id, 'company_catalog', true );

$noimage = get_stylesheet_directory_uri()."/images/noimage.jpg";
$pdfcover = get_stylesheet_directory_uri()."/images/pdf-cover.jpg";
$videocover = get_stylesheet_directory_uri()."/images/video-cover.jpg";

if(empty($company_3dcg)) $company_3dcg = $noimage;

?>
<main id="primary" class="site-main">

<div class="hero-banner">
  <img src="<?php echo $company_3dcg; ?>"/>
  <div class="banner-caption"><?php echo $company_name; ?> 3DCG展示ホール</div>
  <div class="hero__scroll__area"><p>SCROLL</p></div>
</div>
<?php if( current_user_can('editor') || current_user_can('administrator') ) {  ?>
<p style="text-align:center">
    <a class="c-btn c-btn_primary" href="<?php echo get_site_url().'/company-edit/?id='.$post_id ?>">編集</a>
</p>
<?php } ?>
<div class="company-info">
  
  <div class="text-area">  
    <h4><?php echo $company_name;?></h4>
    <p><strong>担当者：</strong><?php echo " ".$maker_name; ?></p>
    <p><strong>連絡先：</strong><?php echo " ".$phone_number."   "; ?>&nbsp;<a href="mailto:<?php echo $company_email; ?>"><?php echo $company_email; ?></a></p>
  </div>
  
  <div class="btn-area">
<?php if(!empty($company_catalog)) {?>
    <a class="c-btn c-btn_primary" target="_blank" href="<?php echo $company_catalog; ?>">製品カタログ</a>
<?php }?>
  </div>
  
</div>
<?php 
$product_name = [];
$product_desc = [];
$product_pdf = [];
for($i=1;$i<=5;$i++){ 
    $product_name[$i] = get_post_meta( $post_id, 'product'.$i.'_name', true ); 
    $product_desc[$i] = get_post_meta( $post_id, 'product'.$i.'_desc', true ); 
    $product_desc[$i] = wpautop($product_desc[$i]);
    $product_pdf[$i] = get_post_meta( $post_id, 'product'.$i.'_pdf', true ); 
    if(!empty($product_name[$i])) {
?>
<div class="product-container">
  
  <h2><?php echo $product_name[$i]; ?></h2>
  
  <div class="product-img">    

<?php
        $sliders = [];
        $thumbs = [];
        $videoflags= [];
        for($j=1;$j<=5;$j++) {
          $video = get_post_meta( $post_id, 'product'.$i.'_video'.$j, true ); 
          $slider = get_post_meta( $post_id, 'product'.$i.'_img'.$j, true ); 
          if(!empty($video)) {
            array_push($sliders, $video);
            if(empty($slider))
              array_push($thumbs, $videocover);
            else
              array_push($thumbs, $slider); 
            array_push($videoflags, true);
          }
          else if(empty($video) && !empty($slider)) {
            array_push($sliders, $slider);
            array_push($thumbs, $slider);
            array_push($videoflags, false);
          }
        }
        if(!count($sliders)) {
          array_push($sliders, $noimage);
          array_push($thumbs, $noimage);
          array_push($videoflags, false);
        }
?>
    <div class="flexslider">
      <ul class="slides">
<?php 
        for($j=0;$j<count($sliders);$j++){ 
?>
<?php
          if($videoflags[$j]):
?>
        <li data-thumb="<?php echo $thumbs[$j]; ?>" class="video">
            <video controls>
                <source src="<?php echo $sliders[$j]; ?>" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </li>
<?php     else: ?>
        <li data-thumb="<?php echo $thumbs[$j]; ?>">
          <img src="<?php echo $sliders[$j]; ?>" id="p1"/>
        </li>
<?php     endif; ?>
       
<?php 
        }
?>

      </ul>
    </div>
  </div>
  
  <div class="product-caption">    
    <div><?php echo $product_desc[$i]; ?></div>
    <a class="c-btn c-btn_action">オンライン商談はこちら</a>
    <a class="c-btn c-btn_primary" href="<?php echo get_site_url(); ?>/contact">問い合わせはこちら</a>  
<?php 
        if(!empty($product_pdf[$i])) { 
?>
    <a class="c-btn c-btn_primary" target="_blank" href="<?php echo $product_pdf[$i]; ?>">製品カタログ</a>
<?php 
        }
?>
  </div>
  
</div>
<?php 
    }
}
?>


</main><!-- #main -->
<script defer src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.flexslider.js"></script>
<script type="text/javascript">
  $(window).load(function(){
    $('.flexslider').flexslider({
      animation: "slide",
      controlNav: "thumbnails",
      start: function(slider){
        $('body').removeClass('loading');
      }
    });
  });
</script>

<?php
get_footer();
