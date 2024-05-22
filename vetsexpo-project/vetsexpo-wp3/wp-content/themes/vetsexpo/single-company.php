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

$booth_expired = get_option('booth_expired');

$post_id = get_the_id();
$company_no = get_post_meta($post_id, 'company_no', true);
$company_name = get_post_meta( $post_id, 'company_name', true );
$maker_job = get_post_meta( $post_id, 'maker_job', true );
$maker_name = get_post_meta( $post_id, 'maker_name', true );
$phone_number = get_post_meta( $post_id, 'phone_number', true );
$company_email = get_post_meta( $post_id, 'company_email', true );
$company_3dcg = get_post_meta( $post_id, 'company_3dcg', true );
$company_catalog = get_post_meta( $post_id, 'company_catalog', true );
$company_qrcode = get_post_meta( $post_id, 'company_qrcode', true );
$company_detail = get_post_meta( $post_id, 'company_detail', true );
$company_website = get_post_meta( $post_id, 'company_website', true );
$company_store = get_post_meta( $post_id, 'company_store', true );
$company_zoom_id = get_post_meta( $post_id, 'zoom_id', true );
$company_zoom_pass = get_post_meta( $post_id, 'zoom_pass', true );

$meeting_url = get_post_meta( $post_id, 'meeting_url', true );
if(!empty($company_zoom_id)) $meeting_url = get_site_url().'/meeting/?id='.$post_id;
if($company_no == $yourlink_no) $meeting_url = get_site_url().'/meeting/?id='.$post_id;

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
  <?php if(!empty($maker_name) && !empty($maker_job)) {?>
    <p><?php echo $maker_job."　".$maker_name; ?></p>
  <?php } elseif(!empty($maker_name)) {?>
    <p><strong>担当者：</strong><?php echo " ".$maker_name; ?></p>
  <?php }?>
    <p><strong>連絡先：</strong><?php echo " ".$phone_number."   "; ?>&nbsp;<a href="mailto:<?php echo $company_email; ?>"><?php echo $company_email; ?></a></p>
  <?php if(!empty($meeting_url)) {
          if($booth_expired == 'expired') {?>
    <span class="c-btn c-btn_action">オンライン商談は受付終了しました</span>
  <?php   }else{ ?>
    <a class="c-btn c-btn_action" href="<?php echo $meeting_url; ?>">オンライン商談はこちら</a>            
  <?php   }
        }?>
  </div>
  
  <div class="btn-area">
<?php if(!empty($company_catalog)) {?>
    <a class="c-btn c-btn_primary" target="_blank" href="<?php echo $company_catalog; ?>">製品カタログ</a>
<?php }?>
<?php if(!empty($company_detail)) {?>
    <a class="c-btn c-btn_primary" target="_blank" href="<?php echo $company_detail; ?>">詳しくはこちら</a>
<?php }?>
<?php if(!empty($company_website)) {?>
    <a class="c-btn c-btn_primary" target="_blank" href="<?php echo $company_website; ?>">ウェブサイト</a>
<?php }?>
<?php if(!empty($company_store)) {?>
    <a class="c-btn c-btn_action" target="_blank" href="<?php echo $company_store; ?>">オンラインストア</a>
<?php }?>
<?php if(!empty($company_qrcode)) {?>
    <a href=""><img src="<?php echo $company_qrcode; ?>"></a>
<?php }?>
  </div>
</div>
<?php 
$product_name = [];
$product_desc = [];
$product_pdf = [];
$product_links = [];
$product_linkcaps = [];
for($i=1;$i<=$max_product_count;$i++){ 
    $product_name[$i] = get_post_meta( $post_id, 'product'.$i.'_name', true ); 
    $product_desc[$i] = get_post_meta( $post_id, 'product'.$i.'_desc', true ); 
    $product_desc[$i] = wpautop($product_desc[$i]);
    $product_pdf[$i] = get_post_meta( $post_id, 'product'.$i.'_pdf', true ); 
    if(!empty($product_name[$i])) {
?>
<div class="product-container">
  
  <h2 style="<?php echo ($company_no == $yourlink_no)?'font-size: 32px;text-align: center;':''; ?>"><?php echo $product_name[$i]; ?></h2>
  
  <div class="product-img">    

<?php
        $sliders = [];
        $thumbs = [];
        $videoflags= [];
        for($j=1;$j<=$max_product_images;$j++) {
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
    <div class="flexslider" data-ref="<?php echo $i; ?>">
      <ul class="slides" style="display:flex; align-items:center;">
<?php 
        for($j=0;$j<count($sliders);$j++){ 
?>
<?php
          if($videoflags[$j]):
?>
        <li data-thumb="<?php echo $thumbs[$j]; ?>" class="video">
            <video onended="videoOnEnded(<?php echo $i; ?>)" onplay="videoOnPlay(<?php echo $i; ?>)" controls disablePictureInPicture controlsList="nodownload">
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
    <?php if(!empty($meeting_url)) {
          if($booth_expired == 'expired') {?>
    <span class="c-btn c-btn_action">オンライン商談は受付終了しました</span>
    <?php   }else{ ?>
      <a class="c-btn c-btn_action" href="<?php echo $meeting_url; ?>">オンライン商談はこちら</a>            
    <?php   }
          }?>
    <?php for($j=1;$j<=$max_product_links;$j++) {
            $product_linkcaps[$i][$j] = get_post_meta($post_id, 'product'.$i.'_linkcap'.$j, true);
            $product_linkcols[$i][$j] = get_post_meta($post_id, 'product'.$i.'_linkcol'.$j, true);
            $product_links[$i][$j] = get_post_meta($post_id, 'product'.$i.'_link'.$j, true);
            if(!empty($product_linkcaps[$i][$j])) {
                if($product_linkcols[$i][$j] == 'red') {?>
    <a class="c-btn c-btn_action" href="<?php echo $product_links[$i][$j]; ?>"><?php echo $product_linkcaps[$i][$j]; ?></a>
    <?php       } else { ?>
    <a class="c-btn c-btn_primary" href="<?php echo $product_links[$i][$j]; ?>"><?php echo $product_linkcaps[$i][$j]; ?></a>
    <?php       }
            }
          }?>
    

    <a class="c-btn c-btn_primary" href="<?php echo get_site_url().'/contact/?id='.$post_id; ?>">問い合わせはこちら</a>  
    <?php if(!empty($product_pdf[$i])) { ?>
    <a class="c-btn c-btn_primary" target="_blank" href="<?php echo $product_pdf[$i]; ?>">製品カタログ</a>
    <?php }?>
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
      },
    });
  });
function videoOnPlay(no) {
  $('.flexslider[data-ref="'+no+'"]').flexslider("pause");
}
function videoOnEnded(no) {
  $('.flexslider[data-ref="'+no+'"]').flexslider("play");
}
</script>

<?php
get_footer();
