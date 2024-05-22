<?php /* Template Name: Company Edit */ ?>
<?php 
wp_enqueue_media();
require_once(ABSPATH . 'wp-admin/includes/image.php');
require_once(ABSPATH . 'wp-admin/includes/file.php');
require_once(ABSPATH . 'wp-admin/includes/media.php');
get_header(); 
error_reporting(E_ALL);
function delete_link($oldlink) {
    $site_url = get_site_url();
    $root_path = getcwd();
    $oldlink = str_replace($site_url,$root_path, $oldlink);
    @unlink($oldlink);
}

?>
<div style="margin-top:160px;"></div>
<?php
$post_id = '';
$company_no = 0;
$company_name = '';
$maker_name = '';
$phone_number = '';
$company_email = '';
$company_3dcg = '';
$company_catalog = '';

$product = [];
$product_fields = [];
$product_name_fields = [];
$product_desc_fields = [];
$product_pdf_fields = [];
for($i=1;$i<=5;$i++) {
    array_push($product_name_fields, 'product'.$i.'_name');
    array_push($product_desc_fields, 'product'.$i.'_desc');
    array_push($product_pdf_fields, 'product'.$i.'_pdf');
}
$product_img_fields = [];
$product_video_fields = [];
for($i=1;$i<=5;$i++) {
    for($j=1;$j<=5;$j++) {
        array_push($product_img_fields, 'product'.$i.'_img'.$j);    
        array_push($product_video_fields, 'product'.$i.'_video'.$j);
    }
}
$product_fields = array_merge($product_name_fields, $product_desc_fields, $product_pdf_fields, $product_img_fields, $product_video_fields);
foreach($product_fields as $field) $product[$field] = '';

$error = '';

$noimage = get_stylesheet_directory_uri()."/images/noimage.jpg";
$pdfcover = get_stylesheet_directory_uri()."/images/pdf-cover.jpg";
$videocover = get_stylesheet_directory_uri()."/images/video-cover.jpg";

if(isset($_GET['id'])){
    $post_id = $_GET['id'];
}
if(isset($_POST['post_id'])) {
    $post_id = $_POST['post_id'];
}
if(!empty($post_id)){
    $content_post = get_post($post_id);
    $company_no = intval( get_post_meta( $post_id, 'company_no', true ) );
    $company_name = get_post_meta( $post_id, 'company_name', true );
    $maker_name = get_post_meta( $post_id, 'maker_name', true );
    $phone_number = get_post_meta( $post_id, 'phone_number', true );
    $company_email = get_post_meta( $post_id, 'company_email', true );
    $company_logo = get_post_meta( $post_id, 'company_logo', true );
    $company_3dcg = get_post_meta( $post_id, 'company_3dcg', true );
    $company_catalog = get_post_meta( $post_id, 'company_catalog', true );
    foreach($product_fields as $field){
        $product[$field] = get_post_meta( $post_id, $field, true );
    }

}
if(empty($laundry_photo)) {
    $laundry_photo = $noimage;
}

if( isset($_POST['action']) && $_POST['action'] == 'add_company' ) { // Check what the post type is here instead

    // Do some minor form validation to make sure there is content
    if ($_POST['company_name'] != '' ) { $company_name =  $_POST['company_name']; } else { $error .=  '出展企業名：なし'; }
    $company_no = intval( $_POST['company_no'] );
    if ($_POST['maker_name'] != '' ) { $maker_name =  $_POST['maker_name']; } else { $maker_name =''; }
    if ($_POST['phone_number'] != '' ) { $phone_number =  $_POST['phone_number']; } else { $phone_number =''; }
    if ($_POST['company_email'] != '' ) { $company_email =  $_POST['company_email']; } else { $company_email =''; }
    foreach($product_fields as $field) {
        if (isset($_POST[$field]) && ($_POST[$field] != '')) { 
            $product[$field] =  $_POST[$field]; } else { $product[$field] =''; 
        }
    }
    
    if($error == ''){
        // Add the content of the form to $post as an array
        
        if(empty($post_id)){ //Add Company 
            $post = array(
                'post_title'	=> 'company',
                'post_content'	=> '',
                'post_status'	=> 'publish', 
                'post_type'		=> 'company' ,
                'post_author'   => get_current_user_id()
            );
            $post_id = wp_insert_post($post);   
            wp_update_post(
                array (
                    'ID'        => $post_id,
                    'post_title' => $company_name.' - '.$post_id,
                    'post_name' => $post_id,
                )
            );
        }
        update_post_meta( $post_id, 'company_no', $company_no );
        update_post_meta( $post_id, 'company_name', sanitize_text_field( $company_name ) );
        update_post_meta( $post_id, 'maker_name', sanitize_text_field( $maker_name ) );
        update_post_meta( $post_id, 'phone_number', sanitize_text_field( $phone_number ) );
        update_post_meta( $post_id, 'company_email', sanitize_text_field( $company_email ) );

        foreach($product_name_fields as $field) update_post_meta( $post_id, $field, sanitize_text_field( $product[$field] ) );
        foreach($product_desc_fields as $field) update_post_meta( $post_id, $field, $product[$field] );


        $uploads = array('company_logo', 'company_3dcg', 'company_catalog');
        $uploads = array_merge($uploads, $product_img_fields, $product_video_fields, $product_pdf_fields);
        
        foreach($uploads as $upload) {
            if(isset($_POST[$upload.'_delete']) && ($_POST[$upload.'_delete'] == $upload)) {
                $oldlink = '';
                $oldlink = get_post_meta( $post_id, $upload, true );
                if(!empty($oldlink)) delete_link($oldlink);
                update_post_meta( $post_id, $upload, '' );
            } 
        }
        foreach($uploads as $upload) {
            if(isset($_FILES[$upload]) && ($_FILES[$upload]['name'] != '')){
                $uploadedfile = $_FILES[$upload];
                $upload_overrides = array( 'test_form' => false );
                $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
                $imageurl = "";
                if ( $movefile && !isset( $movefile['error'] ) ) {
                    $imageurl = $movefile['url'];
                    // echo "url : ".$imageurl."<br>";
                } else {
                    // echo $movefile['error'];
                }
                $oldlink = '';
                $oldlink = get_post_meta( $post_id, $upload, true );
                if(!empty($oldlink)) delete_link($oldlink);
                update_post_meta( $post_id, $upload, $imageurl );
            }
        }
        $company_logo = get_post_meta( $post_id, 'company_logo', true );
        $company_3dcg = get_post_meta( $post_id, 'company_3dcg', true );
        $company_catalog = get_post_meta( $post_id, 'company_catalog', true );
        foreach($product_fields as $field){
            $product[$field] = get_post_meta( $post_id, $field, true );
        }

        // wp_redirect(get_site_url().'/company/'.$post_id.'/');
        // exit;
    }
}
?>
    
<main id="primary" class="site-main"> <!-- main start----------------------------------------------------------------------------------------------->
<?php
if ( !empty($error) ){
    echo "<div class='error-box'>";
    echo '<p><strong>';
    echo '<span class="icon-warning-sign"> </span>'.$error;
    echo '</strong></p>';
    echo "</div>";
}
?>
<style>
._media-title {
    width:300px;
    display: flex;
    justify-content: space-between;
}
._heading {
    width: 120px;
    height: 50px;
}
._content input { 
    width: 100%;
}
.imgupload-div {
    margin-top : 20px;
    margin-bottom: 20px;
}
.img-preview {
    background-color: #f3f3f3;
}
._grayline {
    border: solid 1px #f3f3f3;
    height: 0;
    margin-bottom: 10px;
}
</style>
<p style="font-size: 32px; text-align:center; margin-bottom: 30px;">出展企業ページ編集</p>
<div style="width:800px; min-height:600px; margin:0 auto 100px auto;">
<form method="POST" action="<?php echo get_site_url(); ?>/company-edit" accept-charset="UTF-8" class="c-form" enctype="multipart/form-data">

<div style="position:fixed; right: 200px; top: 600px; z-index: 999;">
    <div>
    <a class="c-btn c-btn_action" onclick="$(this).closest('form').get(0).submit(); return false"><span>更新</span></a>
    </div>
</div>
<div style="position:fixed; right: 200px; top: 700px; z-index: 999;">
    <div>
    <a class="c-btn" href="<?php echo get_site_url().'/company/'.$post_id.'/'; ?>"><span>表示</span></a>
    </div>
</div>

<input name="action" type="hidden" id="action" value="add_company" />
<input type="hidden" name="post_id" value="<?php echo $post_id; ?>" />
<table>
    <tbody>
        <tr>
            <th class="_heading">出展企業番号</th>
            <td class="_content" colspan="2">
                <div>
                <input placeholder="" name="company_no" type="number" value="<?php echo $company_no; ?>">
                </div>
            </td>
        </tr>
        <tr>
            <th class="_heading">施設名</th>
            <td class="_content" colspan="2">
                <div>
                <input placeholder="" name="company_name" type="text" value="<?php echo $company_name; ?>">
                </div>
            </td>
        </tr>
        <tr>
            <th class="_heading">担当者</th>
            <td class="_content" colspan="2">
                <div>
                <input placeholder="" name="maker_name" type="text" value="<?php echo $maker_name; ?>">
                </div>
            </td>
        </tr>
        <tr>
            <th class="_heading">連絡先</th>
            <td class="_content" colspan="2">
                <div>
                <input placeholder="" name="phone_number" type="text" value="<?php echo $phone_number; ?>">
                </div>
            </td>
        </tr>
        <tr>
            <th class="_heading">メールアドレス</th>
            <td class="_content" colspan="2">
                <div>
                <input placeholder="" name="company_email" type="text" value="<?php echo $company_email; ?>">
                </div>
            </td>
        </tr>
    </tbody>
</table>
<div class="imgupload-div">
    <div class="_media-title">
        <div>会社ロゴ</div>
        <button type="button" class="delete-button" data-spec="company_logo">削除</button>
    </div>
    <div class="img-preview" data-spec="company_logo" style="width:300px;height:200px;background-image:url(<?php echo !empty($company_logo)?$company_logo:$noimage; ?>); background-repeat: no-repeat; background-size: cover; background-position: center;">
    </div>
    <input type="file" title="" class="img-input" name="company_logo" data-spec="company_logo"/>
    <input type="hidden" class="delete-hidden" name="company_logo_delete" data-spec="company_logo" value="">
</div>
<div class="imgupload-div">
    <div class="_media-title">
        <div>3DCG展示ホール</div>
        <button type="button" class="delete-button" data-spec="company_3dcg">削除</button>
    </div>
    <div class="img-preview" data-spec="company_3dcg" style="width:300px;height:200px;background-image:url(<?php echo !empty($company_3dcg)?$company_3dcg:$noimage; ?>); background-repeat: no-repeat; background-size: cover; background-position: center;">
    </div>
    <input type="file" title="" class="img-input" name="company_3dcg" data-spec="company_3dcg"/>
    <input type="hidden" class="delete-hidden" name="company_3dcg_delete" data-spec="company_3dcg" value="">
</div>
<div class="imgupload-div">
    <div class="_media-title">
        <div>出展企業製品カタログ - PDF</div>
        <button type="button" class="delete-button" data-spec="company_catalog">削除</button>
    </div>
    <div class="pdf-preview" data-spec="company_catalog" style="width:300px;height:200px;background-image:url(<?php echo !empty($company_catalog)?$pdfcover:$noimage; ?>); background-repeat: no-repeat; background-size: cover; background-position: center;">
    </div>
    <input type="file" title="" class="pdf-input" name="company_catalog" data-spec="company_catalog"/>
    <input type="hidden" class="delete-hidden" name="company_catalog_delete" data-spec="company_catalog" value="">
</div>
<?php for($i=1;$i<=5;$i++) { ?>
<div class="_grayline"></div>
<p style="font-size: 32px; text-align:center; margin-bottom: 30px; margin-top: 30px;">出展企業製品 - <?php echo $i; ?></p>
<table>
    <tbody>
        <tr>
            <th class="_heading">製品名</th>
            <td class="_content" colspan="2">
                <div>
                <input placeholder="" name="<?php echo 'product'.$i.'_name'; ?>" type="text" value="<?php echo $product['product'.$i.'_name']; ?>">
                </div>
            </td>
        </tr>
        <tr>
            <th class="_heading"><div style="position: absolute;">製品説明</div></th>
            <td class="_content" colspan="2">
                <div>
                <textarea placeholder="" rows="10" cols="50" name="<?php echo 'product'.$i.'_desc'; ?>" ><?php echo $product['product'.$i.'_desc']; ?></textarea>
                </div>
            </td>
        </tr>
    </tbody>
</table>
<div class="imgupload-div">
    <div class="_media-title">
        <div>製品カタログ - PDF</div>
        <button type="button" class="delete-button" data-spec="<?php echo 'product'.$i.'_pdf'; ?>">削除</button>
    </div>
    <div class="pdf-preview" data-spec="<?php echo 'product'.$i.'_pdf'; ?>" style="width:300px;height:200px;background-image:url(<?php echo !empty($product['product'.$i.'_pdf'])?$pdfcover:$noimage; ?>); background-repeat: no-repeat; background-size: cover; background-position: center;">
    </div>
    <input type="file" title="" class="pdf-input" name="<?php echo 'product'.$i.'_pdf'; ?>" data-spec="<?php echo 'product'.$i.'_pdf'; ?>"/>
    <input type="hidden" class="delete-hidden" name="<?php echo 'product'.$i.'_pdf_delete'; ?>" data-spec="<?php echo 'product'.$i.'_pdf'; ?>" value=""/>
</div>
<?php for($j=1;$j<=5;$j++) { ?>
<div style="display:flex;">
    <div class="imgupload-div">
        <div class="_media-title">
            <div>製品画像 - <?php echo $j; ?></div>
            <button type="button" class="delete-button" data-spec="<?php echo 'product'.$i.'_img'.$j; ?>">削除</button>
        </div>
        <div class="img-preview" data-spec="<?php echo 'product'.$i.'_img'.$j; ?>" style="width:300px;height:200px;background-image:url(<?php echo !empty($product['product'.$i.'_img'.$j])?$product['product'.$i.'_img'.$j]:$noimage; ?>); background-repeat: no-repeat; background-size: cover; background-position: center;">
        </div>
        <input type="file" title="" class="img-input" name="<?php echo 'product'.$i.'_img'.$j; ?>" data-spec="<?php echo 'product'.$i.'_img'.$j; ?>"/>
        <input type="hidden" class="delete-hidden" name="<?php echo 'product'.$i.'_img'.$j.'_delete'; ?>" data-spec="<?php echo 'product'.$i.'_img'.$j; ?>" value=""/>
    </div>
    <div class="imgupload-div" style="margin-left: 20px;">
        <div class="_media-title">
            <div>動画 - <?php echo $j; ?></div>
            <button type="button" class="delete-button" data-spec="<?php echo 'product'.$i.'_video'.$j; ?>">削除</button>
        </div>
        <div class="video-preview" data-spec="<?php echo 'product'.$i.'_video'.$j; ?>" style="width:300px;height:200px;background-image:url(<?php echo !empty($product['product'.$i.'_video'.$j])?$videocover:$noimage; ?>); background-repeat: no-repeat; background-size: cover; background-position: center;">
        </div>
        <input type="file" title="" class="video-input" name="<?php echo 'product'.$i.'_video'.$j; ?>" data-spec="<?php echo 'product'.$i.'_video'.$j; ?>"/>
        <input type="hidden" class="delete-hidden" name="<?php echo 'product'.$i.'_video'.$j.'_delete'; ?>" data-spec="<?php echo 'product'.$i.'_video'.$j; ?>" value=""/>
    </div>
</div>
<?php }?>
<?php }?>

</form><!-- form -->
<div>
</main><!-- class=site-main -->
<script>
 <?php echo 'var noimage_url = "'.$noimage.'";'; ?>
 <?php echo 'var pdfcover_url = "'.$pdfcover.'";'; ?>
 <?php echo 'var videocover_url = "'.$videocover.'";'; ?>
 $(".delete-button").click(function(e) {
    e.stopPropagation();
    var data_spec = $(this).attr('data-spec');
    $('.delete-hidden[data-spec="'+data_spec+'"]').val(data_spec);
    $('.img-preview[data-spec="'+data_spec+'"]').css('background-image', 'url(' + noimage_url + ')');
    $('.video-preview[data-spec="'+data_spec+'"]').css('background-image', 'url(' + noimage_url + ')');
    $('.pdf-preview[data-spec="'+data_spec+'"]').css('background-image', 'url(' + noimage_url + ')');
    var imginput = $('.img-input[data-spec="'+data_spec+'"]');
    imginput.replaceWith(imginput.val('').clone(true));
    var videoinput = $('.video-input[data-spec="'+data_spec+'"]');
    videoinput.replaceWith(videoinput.val('').clone(true));
    var pdfinput = $('.pdf-input[data-spec="'+data_spec+'"]');
    pdfinput.replaceWith(pdfinput.val('').clone(true));
});
$(".img-input").change(function(e) {
    e.stopPropagation();
  if(this.files && this.files[0]) {
      var reader = new FileReader();
      var data_spec = $(this).attr('data-spec');
      $('.delete-hidden[data-spec="'+data_spec+'"]').val('');
      reader.onload = function(e) {
        $('.img-preview[data-spec="'+data_spec+'"]').css('background-image', 'url(' + e.target.result +')');
      }
      reader.readAsDataURL(this.files[0]);
  }
});

$(".pdf-input").change(function(e) {
    e.stopPropagation();
  if(this.files && this.files[0]) {
      var reader = new FileReader();
      var data_spec = $(this).attr('data-spec');
      $('.delete-hidden[data-spec="'+data_spec+'"]').val('');
      reader.onload = function(e) {
        $('.pdf-preview[data-spec="'+data_spec+'"]').css('background-image', 'url(' + pdfcover_url +')');
      }
      reader.readAsDataURL(this.files[0]);
  }
});

$(".video-input").change(function(e) {
    e.stopPropagation();
  if(this.files && this.files[0]) {
      var reader = new FileReader();
      var data_spec = $(this).attr('data-spec');
      $('.delete-hidden[data-spec="'+data_spec+'"]').val('');
      reader.onload = function(e) {
        $('.video-preview[data-spec="'+data_spec+'"]').css('background-image', 'url(' + videocover_url +')');
      }
      reader.readAsDataURL(this.files[0]);
  }
});
</script>
<?php get_footer(); ?>