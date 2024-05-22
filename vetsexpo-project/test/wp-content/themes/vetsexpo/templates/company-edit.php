<?php /* Template Name: Company Edit */ ?>
<?php 
error_reporting(E_ERROR | E_WARNING | E_PARSE);
wp_enqueue_media();
require_once(ABSPATH . 'wp-admin/includes/image.php');
require_once(ABSPATH . 'wp-admin/includes/file.php');
require_once(ABSPATH . 'wp-admin/includes/media.php');
get_header(); 
// error_reporting(E_ALL);

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
$company_public = 0;
$company_no = 0;
$company_name = '';
$maker_job = '';
$maker_name = '';
$phone_number = '';
$company_email = '';
$company_sendmail = '';
$company_3dcg = '';
$company_catalog = '';
$zoom_id = '';
$zoom_pass = '';
$meeting_url = '';
$company_qrcode = '';
$company_detail = '';
$company_website = '';
$company_store = '';

$product = [];
$product_fields = [];
$product_name_fields = [];
$product_desc_fields = [];
$product_pdf_fields = [];
for($i=1;$i<=$max_product_count;$i++) {
    array_push($product_name_fields, 'product'.$i.'_name');
    array_push($product_desc_fields, 'product'.$i.'_desc');
    array_push($product_pdf_fields, 'product'.$i.'_pdf');
}
$product_img_fields = [];
$product_video_fields = [];
for($i=1;$i<=$max_product_count;$i++) {
    for($j=1;$j<=$max_product_images;$j++) {
        array_push($product_img_fields, 'product'.$i.'_img'.$j);    
        array_push($product_video_fields, 'product'.$i.'_video'.$j);
    }
}
$product_fields = array_merge($product_name_fields, $product_desc_fields, $product_pdf_fields, $product_img_fields, $product_video_fields);
foreach($product_fields as $field) $product[$field] = '';

$product_links = [];
$product_linkcaps = [];
$product_linkcols = [];
for($i=1;$i<=$max_product_count;$i++) {
    for($j=1;$j<=$max_product_links;$j++) {
        $product_links[$i][$j] = '';
        $product_linkcaps[$i][$j] = '';
        $product_linkcols[$i][$j] = '';
    }
}

$error = '';

$noimage = get_stylesheet_directory_uri()."/images/noimage.jpg";
$pdfcover = get_stylesheet_directory_uri()."/images/pdf-cover.jpg";
$videocover = get_stylesheet_directory_uri()."/images/video-cover.jpg";
$page_scroll = 0;
if(isset($_POST['page_scroll'])) $page_scroll = $_POST['page_scroll'];

if(isset($_GET['id'])){
    $post_id = $_GET['id'];
}
if(isset($_GET['public'])){
    $company_public = $_GET['public'];
    if(!empty($post_id)) {
        if($company_public) {
            update_post_meta( $post_id, 'company_public', 1 );
        }
        else {
            update_post_meta( $post_id, 'company_public', 0 );
        }
        wp_redirect(get_site_url());
    }
}
if(isset($_POST['post_id'])) {
    $post_id = $_POST['post_id'];
}
if(!empty($post_id)){
    $content_post = get_post($post_id);
    $company_public = get_post_meta( $post_id, 'company_public', true );
    $company_no = intval( get_post_meta( $post_id, 'company_no', true ) );
    $company_name = get_post_meta( $post_id, 'company_name', true );
    $maker_job = get_post_meta( $post_id, 'maker_job', true );
    $maker_name = get_post_meta( $post_id, 'maker_name', true );
    $phone_number = get_post_meta( $post_id, 'phone_number', true );
    $company_email = get_post_meta( $post_id, 'company_email', true );
    $company_sendmail = get_post_meta( $post_id, 'company_sendmail', true );
    $company_logo = get_post_meta( $post_id, 'company_logo', true );
    $company_3dcg = get_post_meta( $post_id, 'company_3dcg', true );
    $company_qrcode = get_post_meta( $post_id, 'company_qrcode', true );
    $company_catalog = get_post_meta( $post_id, 'company_catalog', true );
    $zoom_id = get_post_meta( $post_id, 'zoom_id', true );
    $zoom_pass = get_post_meta( $post_id, 'zoom_pass', true );
    $meeting_url = get_post_meta( $post_id, 'meeting_url', true );
    $company_detail = get_post_meta( $post_id, 'company_detail', true );
    $company_website = get_post_meta( $post_id, 'company_website', true );
    $company_store = get_post_meta( $post_id, 'company_store', true );
    foreach($product_fields as $field){
        $product[$field] = get_post_meta( $post_id, $field, true );
    }
    for($i=1;$i<=$max_product_count;$i++) {
        for($j=1;$j<=$max_product_links;$j++) {
            $product_links[$i][$j] = get_post_meta( $post_id, 'product'.$i.'_link'.$j, true );
            $product_linkcaps[$i][$j] = get_post_meta( $post_id, 'product'.$i.'_linkcap'.$j, true );
            $product_linkcols[$i][$j] = get_post_meta( $post_id, 'product'.$i.'_linkcol'.$j, true );
        }
    }

}
if(empty($laundry_photo)) {
    $laundry_photo = $noimage;
}

if( isset($_POST['action']) && $_POST['action'] == 'add_company' ) { // Check what the post type is here instead

    // Do some minor form validation to make sure there is content
    if ($_POST['company_name'] != '' ) { $company_name =  $_POST['company_name']; } else { $error .=  '出展企業名：なし'; }
    $company_no = intval( $_POST['company_no'] );
    if ($_POST['maker_job'] != '' ) { $maker_job =  $_POST['maker_job']; } else { $maker_job =''; }
    if ($_POST['maker_name'] != '' ) { $maker_name =  $_POST['maker_name']; } else { $maker_name =''; }
    if ($_POST['phone_number'] != '' ) { $phone_number =  $_POST['phone_number']; } else { $phone_number =''; }
    if ($_POST['company_email'] != '' ) { $company_email =  $_POST['company_email']; } else { $company_email =''; }
    if ($_POST['company_sendmail'] != '' ) { $company_sendmail =  $_POST['company_sendmail']; } else { $company_sendmail =''; }
    if ($_POST['zoom_id'] != '' ) { $zoom_id =  $_POST['zoom_id']; } else { $zoom_id =''; }
    if ($_POST['zoom_pass'] != '' ) { $zoom_pass =  $_POST['zoom_pass']; } else { $zoom_pass =''; }
    if ($_POST['meeting_url'] != '' ) { $meeting_url =  $_POST['meeting_url']; } else { $meeting_url =''; }
    if ($_POST['company_detail'] != '' ) { $company_detail =  $_POST['company_detail']; } else { $company_detail =''; }
    if ($_POST['company_website'] != '' ) { $company_website =  $_POST['company_website']; } else { $company_website =''; }
    if ($_POST['company_store'] != '' ) { $company_store =  $_POST['company_store']; } else { $company_store =''; }
    foreach($product_fields as $field) {
        if (isset($_POST[$field]) && ($_POST[$field] != '')) { 
            $product[$field] =  $_POST[$field]; } else { $product[$field] =''; 
        }
    }
    for($i=1;$i<=$max_product_count;$i++) {
        for($j=1;$j<=$max_product_links;$j++) {
            $product_links[$i][$j] = $_POST['product'.$i.'_link'.$j];
            $product_linkcaps[$i][$j] = $_POST['product'.$i.'_linkcap'.$j];
            $product_linkcols[$i][$j] = $_POST['product'.$i.'_linkcol'.$j];
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
        $post_update = array(
            'ID'         => $post_id,
            'post_title' => $company_name,
        );
        wp_update_post( $post_update );
        update_post_meta( $post_id, 'company_no', $company_no );
        update_post_meta( $post_id, 'company_name', sanitize_text_field( $company_name ) );
        update_post_meta( $post_id, 'maker_job', sanitize_text_field( $maker_job ) );
        update_post_meta( $post_id, 'maker_name', sanitize_text_field( $maker_name ) );
        update_post_meta( $post_id, 'phone_number', sanitize_text_field( $phone_number ) );
        update_post_meta( $post_id, 'company_email', sanitize_text_field( $company_email ) );
        update_post_meta( $post_id, 'company_sendmail', sanitize_text_field( $company_sendmail ) );
        update_post_meta( $post_id, 'zoom_id', sanitize_text_field( $zoom_id ) );
        update_post_meta( $post_id, 'zoom_pass', sanitize_text_field( $zoom_pass ) );
        update_post_meta( $post_id, 'meeting_url', sanitize_text_field( $meeting_url ) );
        update_post_meta( $post_id, 'company_detail', sanitize_text_field( $company_detail ) );
        update_post_meta( $post_id, 'company_website', sanitize_text_field( $company_website ) );
        update_post_meta( $post_id, 'company_store', sanitize_text_field( $company_store ) );

        foreach($product_name_fields as $field) update_post_meta( $post_id, $field, sanitize_text_field( $product[$field] ) );
        foreach($product_desc_fields as $field) update_post_meta( $post_id, $field, $product[$field] );


        $uploads = array('company_logo', 'company_3dcg', 'company_catalog', 'company_qrcode');
        $uploads = array_merge($uploads, $product_img_fields, $product_video_fields, $product_pdf_fields);
        
        foreach($uploads as $upload) {
            if(isset($_POST[$upload.'_delete']) && ($_POST[$upload.'_delete'] == $upload)) {
                update_post_meta( $post_id, $upload, '' );
            } 
        }
        foreach($uploads as $upload) {
            if(isset($_POST[$upload]) && (!empty($_POST[$upload]))) {
                update_post_meta( $post_id, $upload, $_POST[$upload]);
            }
        }

        for($i=1;$i<=$max_product_count;$i++) {
            for($j=1;$j<=$max_product_links;$j++) {
                update_post_meta( $post_id, 'product'.$i.'_link'.$j,  $product_links[$i][$j] );
                update_post_meta( $post_id, 'product'.$i.'_linkcap'.$j,  $product_linkcaps[$i][$j] );
                update_post_meta( $post_id, 'product'.$i.'_linkcol'.$j,  $product_linkcols[$i][$j] );
            }
        }

        $company_logo = get_post_meta( $post_id, 'company_logo', true );
        $company_3dcg = get_post_meta( $post_id, 'company_3dcg', true );
        $company_catalog = get_post_meta( $post_id, 'company_catalog', true );
        $company_qrcode = get_post_meta( $post_id, 'company_qrcode', true );
        foreach($product_fields as $field){
            $product[$field] = get_post_meta( $post_id, $field, true );
        }
        
        for($i=1;$i<=$max_product_count;$i++) {
            for($j=1;$j<=$max_product_links;$j++) {
                $product_links[$i][$j] = get_post_meta( $post_id, 'product'.$i.'_link'.$j, true );
                $product_linkcaps[$i][$j] = get_post_meta( $post_id, 'product'.$i.'_linkcap'.$j, true );
                $product_linkcols[$i][$j] = get_post_meta( $post_id, 'product'.$i.'_linkcol'.$j, true );
            }
        }
        // wp_redirect(get_site_url().'/company/'.$post_id.'/');
        // exit;
    }
}
?>
    
<main id="primary" class="site-main"> <!-- main start----------------------------------------------------------------------------------------------->
<?php 
 echo do_shortcode("[wordpress_file_upload]");
?>
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
    width:300px;
    height:200px;
    background-repeat: no-repeat; 
    background-size: cover; 
    background-position: center;
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

<div style="position:fixed; right: 200px; bottom: 300px; z-index: 999;">
    <div>
    <a class="c-btn c-btn_action" onclick="$(this).closest('form').get(0).submit(); return false"><span>更新</span></a>
    </div>
</div>
<div style="position:fixed; right: 200px; bottom: 200px; z-index: 999;">
    <div>
    <a class="c-btn" href="<?php echo get_site_url().'/company/'.$post_id.'/'; ?>"><span>表示</span></a>
    </div>
</div>
<?php if(!empty($post_id)):
        if($company_public):?>
<div style="position:fixed; right: 200px; bottom: 100px; z-index: 999;">
    <div>
    <a class="c-btn" href="<?php echo get_site_url().'/company-edit/?id='.$post_id.'&public=0'; ?>"><span>非公開</span></a>
    </div>
</div>
<?php   else: ?>
<div style="position:fixed; right: 200px; bottom: 100px; z-index: 999;">
    <div>
    <a class="c-btn" href="<?php echo get_site_url().'/company-edit/?id='.$post_id.'&public=1'; ?>"><span>公開</span></a>
    </div>
</div>
<?php   endif;
    endif; ?>




<input name="action" type="hidden" id="action" value="add_company" />
<input type="hidden" name="post_id" value="<?php echo $post_id; ?>" />
<input type="hidden" id="page_scroll" name="page_scroll" value="<?php echo $page_scroll; ?>" />
<table>
    <tbody>
        <tr>
            <th class="_heading">出展社番号</th>
            <td class="_content" colspan="2">
                <div>
                <input placeholder="" name="company_no" type="number" value="<?php echo $company_no; ?>">
                </div>
            </td>
        </tr>
        <tr>
            <th class="_heading">出展社名</th>
            <td class="_content" colspan="2">
                <div>
                <input placeholder="" name="company_name" type="text" value="<?php echo $company_name; ?>">
                </div>
            </td>
        </tr>
        <tr>
            <th class="_heading">担当者職業</th>
            <td class="_content" colspan="2">
                <div>
                <input placeholder="" name="maker_job" type="text" value="<?php echo $maker_job; ?>">
                </div>
            </td>
        </tr>
        <tr>
            <th class="_heading">担当者名</th>
            <td class="_content" colspan="2">
                <div>
                <input placeholder="" name="maker_name" type="text" value="<?php echo $maker_name; ?>">
                </div>
            </td>
        </tr>
        <tr>
            <th class="_heading">連絡先（TEL）</th>
            <td class="_content" colspan="2">
                <div>
                <input placeholder="" name="phone_number" type="text" value="<?php echo $phone_number; ?>">
                </div>
            </td>
        </tr>
        <tr>
            <th class="_heading">連絡先（メール）</th>
            <td class="_content" colspan="2">
                <div>
                <input placeholder="" name="company_email" type="text" value="<?php echo $company_email; ?>">
                </div>
            </td>
        </tr>
        <tr>
            <th class="_heading">受信メール</th>
            <td class="_content" colspan="2">
                <div>
                <input placeholder="" name="company_sendmail" type="text" value="<?php echo $company_sendmail; ?>">
                </div>
            </td>
        </tr>
        <tr>
            <th class="_heading">詳しくはこちら</th>
            <td class="_content" colspan="2">
                <div>
                <input placeholder="" name="company_detail" type="text" value="<?php echo $company_detail; ?>">
                </div>
            </td>
        </tr>
        <tr>
            <th class="_heading">マイミーティング ID</th>
            <td class="_content" colspan="2">
                <div>
                <input placeholder="" name="zoom_id" type="text" value="<?php echo $zoom_id; ?>">
                </div>
            </td>
        </tr>
        <tr>
            <th class="_heading">マイミーティング パスワード</th>
            <td class="_content" colspan="2">
                <div>
                <input placeholder="" name="zoom_pass" type="text" value="<?php echo $zoom_pass; ?>">
                </div>
            </td>
        </tr>
        <tr>
            <th class="_heading">マイミーティング リンク</th>
            <td class="_content" colspan="2">
                <div>
                <input placeholder="" name="meeting_url" type="text" value="<?php echo $meeting_url; ?>">
                </div>
            </td>
        </tr>
        <tr>
            <th class="_heading">ウェブサイト</th>
            <td class="_content" colspan="2">
                <div>
                <input placeholder="" name="company_website" type="text" value="<?php echo $company_website; ?>">
                </div>
            </td>
        </tr>
        <tr>
            <th class="_heading">オンラインストア</th>
            <td class="_content" colspan="2">
                <div>
                <input placeholder="" name="company_store" type="text" value="<?php echo $company_store; ?>">
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
    <div class="img-preview" data-spec="company_logo" style="background-image:url(<?php echo !empty($company_logo)?$company_logo:$noimage; ?>);">
    </div>
    <div class="c-btn img-input" data-spec="company_logo" data-type="image">選択</div>
    <input type="hidden" class="input-hidden" name="company_logo" data-spec="company_logo" value="<?php echo $company_logo; ?>">
    <input type="hidden" class="delete-hidden" name="company_logo_delete" data-spec="company_logo" value="">
</div>
<div class="imgupload-div">
    <div class="_media-title">
        <div>QRコード</div>
        <button type="button" class="delete-button" data-spec="company_qrcode">削除</button>
    </div>
    <div class="img-preview" data-spec="company_qrcode" style="background-image:url(<?php echo !empty($company_qrcode)?$company_qrcode:$noimage; ?>);"></div>
    <div class="c-btn img-input" data-spec="company_qrcode" data-type="image">選択</div>
    <input type="hidden" class="input-hidden" name="company_qrcode" data-spec="company_qrcode" value="<?php echo $company_qrcode; ?>">
    <input type="hidden" class="delete-hidden" name="company_qrcode_delete" data-spec="company_qrcode" value="">
</div>
<div class="imgupload-div">
    <div class="_media-title">
        <div>3DCG展示ホール</div>
        <button type="button" class="delete-button" data-spec="company_3dcg">削除</button>
    </div>
    <div class="img-preview" data-spec="company_3dcg" style="background-image:url(<?php echo !empty($company_3dcg)?$company_3dcg:$noimage; ?>);"></div>
    <div class="c-btn img-input" data-spec="company_3dcg" data-type="image">選択</div>
    <input type="hidden" class="input-hidden" name="company_3dcg" data-spec="company_3dcg" value="<?php echo $company_3dcg; ?>">
    <input type="hidden" class="delete-hidden" name="company_3dcg_delete" data-spec="company_3dcg" value="">
</div>
<div class="imgupload-div">
    <div class="_media-title">
        <div>出展企業製品カタログ - PDF</div>
        <button type="button" class="delete-button" data-spec="company_catalog">削除</button>
    </div>
    <div class="img-preview" data-spec="company_catalog" style="background-image:url(<?php echo !empty($company_catalog)?$pdfcover:$noimage; ?>);"></div>
    <div class="c-btn img-input" data-spec="company_catalog" data-type="pdf">選択</div>
    <input type="hidden" class="input-hidden" name="company_catalog" data-spec="company_catalog" value="<?php echo $company_catalog; ?>">
    <input type="hidden" class="delete-hidden" name="company_catalog_delete" data-spec="company_catalog" value="">
</div>
<?php for($i=1;$i<=$max_product_count;$i++) { ?>
<div class="_grayline"></div>
<div class="display:flex;">
    <div style="display:inline-block; width: 300px; font-size: 32px; margin-bottom: 30px; margin-top: 30px;">
        出展企業製品 - <?php echo $i; ?>
    </div>
    <div style="display:inline-block; width: 300px;">
        <input style="width: 60px;" class="change-input" data-ref="<?php echo $i; ?>" type="number" value="">
        <button type="button" class="change-button" data-ref="<?php echo $i; ?>">交換</button>
    </div>
</div>
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
<?php for($j=1;$j<=$max_product_links;$j++) { ?>
        <tr>
            <th class="_heading">リンク名 - <?php echo $j; ?></th>
            <td class="_content" colspan="2">
                <input style="width:inherit" placeholder="" name="<?php echo 'product'.$i.'_linkcap'.$j; ?>" type="text" value="<?php echo $product_linkcaps[$i][$j]; ?>">
                <input style="width:inherit" type="checkbox" id="<?php echo 'product'.$i.'_linkcol'.$j; ?>" name="<?php echo 'product'.$i.'_linkcol'.$j; ?>" value="red" <?php echo ($product_linkcols[$i][$j]=='red' ? 'checked' : '');?>>
                <label for="<?php echo 'product'.$i.'_linkcol'.$j; ?>">赤色</label><br>
            </td>
        </tr>
        <tr>
            <th class="_heading">リンク - <?php echo $j; ?></th>
            <td class="_content" colspan="2">
                <div>
                <input placeholder="" name="<?php echo 'product'.$i.'_link'.$j; ?>" type="text" value="<?php echo $product_links[$i][$j]; ?>">
                </div>
            </td>
        </tr>
<?php }?>
    </tbody>
</table>
<div class="imgupload-div">
    <div class="_media-title">
        <div>製品カタログ - PDF</div>
        <button type="button" class="delete-button" data-spec="<?php echo 'product'.$i.'_pdf'; ?>">削除</button>
    </div>
    <div class="img-preview" data-spec="<?php echo 'product'.$i.'_pdf'; ?>" style="background-image:url(<?php echo !empty($product['product'.$i.'_pdf'])?$pdfcover:$noimage; ?>);"></div>
    <div class="c-btn img-input" data-spec="<?php echo 'product'.$i.'_pdf'; ?>" data-type="pdf">選択</div>
    <input type="hidden" class="input-hidden" name="<?php echo 'product'.$i.'_pdf'; ?>" data-spec="<?php echo 'product'.$i.'_pdf'; ?>" value="<?php echo $product['product'.$i.'_pdf']; ?>">
    <input type="hidden" class="delete-hidden" name="<?php echo 'product'.$i.'_pdf_delete'; ?>" data-spec="<?php echo 'product'.$i.'_pdf'; ?>" value=""/>
</div>
<?php for($j=1;$j<=$max_product_images;$j++) { ?>
<div style="display:flex;">
    <div class="imgupload-div">
        <div class="_media-title">
            <div>製品画像 - <?php echo $j; ?></div>
            <button type="button" class="delete-button" data-spec="<?php echo 'product'.$i.'_img'.$j; ?>">削除</button>
        </div>
        <div class="img-preview" data-spec="<?php echo 'product'.$i.'_img'.$j; ?>" style="background-image:url(<?php echo !empty($product['product'.$i.'_img'.$j])?$product['product'.$i.'_img'.$j]:$noimage; ?>);"></div>
        <div class="c-btn img-input" data-spec="<?php echo 'product'.$i.'_img'.$j; ?>" data-type="image">選択</div>
        <input type="hidden" class="input-hidden" name="<?php echo 'product'.$i.'_img'.$j; ?>" data-spec="<?php echo 'product'.$i.'_img'.$j; ?>" value="<?php echo $$product['product'.$i.'_img'.$j]; ?>">
        <input type="hidden" class="delete-hidden" name="<?php echo 'product'.$i.'_img'.$j.'_delete'; ?>" data-spec="<?php echo 'product'.$i.'_img'.$j; ?>" value=""/>
    </div>
    <div class="imgupload-div" style="margin-left: 20px;">
        <div class="_media-title">
            <div>動画 - <?php echo $j; ?></div>
            <button type="button" class="delete-button" data-spec="<?php echo 'product'.$i.'_video'.$j; ?>">削除</button>
        </div>
        <div class="img-preview" data-spec="<?php echo 'product'.$i.'_video'.$j; ?>" style="background-image:url(<?php echo !empty($product['product'.$i.'_video'.$j])?$videocover:$noimage; ?>);"></div>
        <div class="c-btn img-input" data-spec="<?php echo 'product'.$i.'_video'.$j; ?>" data-type="video">選択</div>
        <input type="hidden" class="input-hidden" name="<?php echo 'product'.$i.'_video'.$j; ?>" data-spec="<?php echo 'product'.$i.'_video'.$j; ?>" value="<?php echo $$product['product'.$i.'_video'.$j]; ?>">
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
<?php echo 'var post_id = "'.$post_id.'";'; ?>
<?php echo 'var site_url = "'.get_site_url().'";'; ?>
<?php echo 'var page_scroll = '.intval($page_scroll).';';?>

var custom_uploader;
window.onscroll = function() {catch_scroll()};
setTimeout(() => {
    window.scrollTo(0, page_scroll);
}, 100);

function catch_scroll() {
    let scroll_top = window.scrollY;
    document.getElementById("page_scroll").value = scroll_top;
}

$(".change-button").click(function(e) {
    e.stopPropagation();
    let from = $(this).attr('data-ref');
    let to = $('.change-input[data-ref="'+from+'"]').val();
    location.href = site_url + '/change-api/?id=' + post_id + '&from=' + from + '&to=' + to;
});
$(".delete-button").click(function(e) {
    e.stopPropagation();
    let data_spec = $(this).attr('data-spec');
    $('.delete-hidden[data-spec="'+data_spec+'"]').val(data_spec);
    $('.img-preview[data-spec="'+data_spec+'"]').css('background-image', 'url(' + noimage_url + ')');
    $('.input-hidden[data-spec="'+data_spec+'"]').val('');
});
$('.img-input').click(function(e) {

    e.preventDefault();
    let data_spec = $(this).attr('data-spec');
    let data_type = $(this).attr('data-type');
    //If the uploader object has already been created, reopen the dialog
    if (custom_uploader) {
        custom_uploader.open();
        return;
    }

    //Extend the wp.media object
    custom_uploader = wp.media.frames.file_frame = wp.media({
        title: '選択',
        button: {
            text: '選択'
        },
        multiple: true
    });
    console.log('img-input'+data_spec);
    //When a file is selected, grab the URL and set it as the text field's value
    custom_uploader.on('select', function() {
        //console.log(custom_uploader.state().get('selection').toJSON());
        console.log('media-selector'+data_spec);
        attachment = custom_uploader.state().get('selection').first().toJSON();
        if(data_type == "image") $('.img-preview[data-spec="'+data_spec+'"]').css('background-image', 'url(' + attachment.url +')');
        else if(data_type == "video") $('.img-preview[data-spec="'+data_spec+'"]').css('background-image', 'url(' + videocover_url +')');
        else if(data_type == "pdf") $('.img-preview[data-spec="'+data_spec+'"]').css('background-image', 'url(' + pdfcover_url +')');

        $('.input-hidden[data-spec="'+data_spec+'"]').val(attachment.url);
    });

    //Open the uploader dialog
    custom_uploader.open();

});
</script>
<?php get_footer(); ?>