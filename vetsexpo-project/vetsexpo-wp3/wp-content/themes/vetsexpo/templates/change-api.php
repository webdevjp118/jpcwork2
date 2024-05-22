<?php /* Template Name: Change Api */ ?>
<?php

$post_id = '';
if(isset($_GET['id'])) $post_id = $_GET['id'];
if(empty($post_id)) wp_redirect(get_site_url());
$from = 0;
$to = 0;
if(isset($_GET['from'])) $from = intval($_GET['from']);
if(isset($_GET['to'])) $to = intval($_GET['to']);
if($from == $to || $from <= 0  || $to <= 0) wp_redirect(get_site_url().'/company-edit/?id='.$post_id);

$temp_name = get_post_meta($post_id, 'product'.$to.'_name', true);
$temp_desc = get_post_meta($post_id, 'product'.$to.'_desc', true);
$temp_pdf = get_post_meta($post_id, 'product'.$to.'_pdf', true);
$temp_img = [];
$temp_video = [];
for($j=1;$j<=$max_product_images;$j++) {
    $temp_img[$j] = get_post_meta( $post_id, 'product'.$to.'_img'.$j, true);    
    $temp_video[$j] =  get_post_meta( $post_id, 'product'.$to.'_video'.$j, true);
}

update_post_meta( $post_id, 'product'.$to.'_name', get_post_meta($post_id, 'product'.$from.'_name',true));
update_post_meta( $post_id, 'product'.$to.'_desc', get_post_meta($post_id, 'product'.$from.'_desc',true));
update_post_meta( $post_id, 'product'.$to.'_pdf', get_post_meta($post_id, 'product'.$from.'_pdf',true));

for($j=1;$j<=$max_product_images;$j++) {
    update_post_meta( $post_id, 'product'.$to.'_img'.$j, get_post_meta( $post_id, 'product'.$from.'_img'.$j, true));    
    update_post_meta( $post_id, 'product'.$to.'_video'.$j, get_post_meta( $post_id, 'product'.$from.'_video'.$j, true));
}

update_post_meta( $post_id, 'product'.$from.'_name', $temp_name);
update_post_meta( $post_id, 'product'.$from.'_desc', $temp_desc);
update_post_meta( $post_id, 'product'.$from.'_pdf', $temp_pdf);
for($j=1;$j<=$max_product_images;$j++) {
    update_post_meta( $post_id, 'product'.$from.'_img'.$j, $temp_img[$j]);    
    update_post_meta( $post_id, 'product'.$from.'_video'.$j, $temp_video[j]);
}



wp_redirect(get_site_url().'/company-edit/?id='.$post_id);
?>