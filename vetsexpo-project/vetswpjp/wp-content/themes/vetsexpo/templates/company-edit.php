<?php /* Template Name: Company Edit */ ?>
<?php 
wp_enqueue_media();
require_once(ABSPATH . 'wp-admin/includes/image.php');
require_once(ABSPATH . 'wp-admin/includes/file.php');
require_once(ABSPATH . 'wp-admin/includes/media.php');
get_header(); 
?>
<div style="margin-top:160px;"></div>
<?php
$post_id = '';
$company_name = '';
$maker_name = '';
$phone_number = '';
$company_email = '';
$company_3dcg = '';
$error = '';


if(isset($_GET['id'])){
    $post_id = $_GET['id'];
}

if(!empty($post_id)){
    $content_post = get_post($post_id);
    $company_name = get_post_meta( $post_id, 'company_name', true );
    $maker_name = get_post_meta( $post_id, 'maker_name', true );
    $phone_number = get_post_meta( $post_id, 'phone_number', true );
    $company_email = get_post_meta( $post_id, 'company_email', true );
    $company_3dcg = get_post_meta( $post_id, 'company_3dcg', true );
}
if(empty($laundry_photo)) {
    $laundry_photo = get_stylesheet_directory_uri()."/images/noimage.png";
}

if( isset($_POST['action']) && $_POST['action'] == 'add_company' ) { // Check what the post type is here instead

    // Do some minor form validation to make sure there is content
    if ($_POST['company_name'] != '' ) { $company_name =  $_POST['company_name']; } else { $error .=  '出展企業名：なし'; }
    if ($_POST['maker_name'] != '' ) { $maker_name =  $_POST['maker_name']; } else { $maker_name =''; }
    if ($_POST['phone_number'] != '' ) { $phone_number =  $_POST['phone_number']; } else { $phone_number =''; }
    if ($_POST['company_email'] != '' ) { $company_email =  $_POST['company_email']; } else { $company_email =''; }
    
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
                    'post_name' => $post_id,
                )
            );
        }
        
        update_post_meta( $post_id, 'company_name', sanitize_text_field( $company_name ) );
        update_post_meta( $post_id, 'maker_name', sanitize_text_field( $maker_name ) );
        update_post_meta( $post_id, 'phone_number', sanitize_text_field( $phone_number ) );
        update_post_meta( $post_id, 'company_email', sanitize_text_field( $company_email ) );
        if($_FILES['uploadedfile']['name'] != ''){
            $uploadedfile = $_FILES['uploadedfile'];
            $upload_overrides = array( 'test_form' => false );
            $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
            $imageurl = "";
            if ( $movefile && ! isset( $movefile['error'] ) ) {
                $imageurl = $movefile['url'];
                echo "url : ".$imageurl;
            } else {
                echo $movefile['error'];
            }
            update_post_meta( $post_id, 'company_3dcg', $imageurl );
        }

        wp_redirect(get_site_url().'/company/'.$post_id.'/');
        exit();
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
._heading {
    width: 120px;
    height: 50px;
}
._content input { 
    width: 100%;
}
.imgupload-div {
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
<div style="width:800px; min-height:600px; margin:0 auto 100px auto;">
<form method="POST" action="<?php echo get_site_url(); ?>/company-edit/?id=<?php echo $post_id; ?>" accept-charset="UTF-8" class="c-form" enctype="multipart/form-data">
<input name="action" type="hidden" id="action" value="add_company" />
<input type="hidden" name="post_id" value="<?php echo $post_id; ?>" />
<table>
    <tbody>
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
    <div>3DCG展示ホール</div>
    <div class="img-preview" data-spec="1" style="width:300px;height:200px;background-image:url(<?php echo $company_3dcg; ?>); background-repeat: no-repeat; background-size: cover; background-position: center;">
    </div>
    <input type="file" title="" class="img-input" name="uploadedfile1" data-spec="1"/>
</div>
<div class="imgupload-div">
    <div>出展企業製品カタログ - PDF</div>
    <div class="img-preview" data-spec="1" style="width:300px;height:200px;background-image:url(<?php echo $company_3dcg; ?>); background-repeat: no-repeat; background-size: cover; background-position: center;">
    </div>
    <input type="file" title="" class="img-input" name="uploadedfile1" data-spec="1"/>
</div>
<div class="_grayline"></div>
<div class="imgupload-div">
    <div>3DCG展示ホール</div>
    <div class="img-preview" data-spec="2" style="width:300px;height:200px;background-image:url(<?php echo $company_3dcg; ?>); background-repeat: no-repeat; background-size: cover; background-position: center;">
    </div>
    <input type="file" title="" class="img-input" name="uploadedfile2" data-spec="2"/>
</div>
<div>
    <div>
    <a class="c-btn c-btn_action" onclick="$(this).closest('form').get(0).submit(); return false"><span>登録</span></a>
    </div>
</div>

</form><!-- form -->
<div>
</main><!-- class=site-main -->
<script>
 
$(".img-input").change(function(e) {
    e.stopPropagation();
  if(this.files && this.files[0]) {
      var reader = new FileReader();
      var data_spec = $(this).attr('data-spec');
      reader.onload = function(e) {
        console.log($('.img-preview[data-spec="'+data_spec+'"]'));
        $('.img-preview[data-spec="'+data_spec+'"]').css('background-image', 'url(' + e.target.result +')');
      }
      reader.readAsDataURL(this.files[0]);
  }
});
</script>
<?php get_footer(); ?>