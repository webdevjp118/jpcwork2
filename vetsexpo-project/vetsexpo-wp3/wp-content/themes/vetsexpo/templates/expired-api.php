<?php /* Template Name: Expired Api */ ?>
<?php
if(!( current_user_can('editor') || current_user_can('administrator') )) {  
    wp_redirect(get_site_url());
    exit;    
}

$booth_expired = get_option('booth_expired');
if($booth_expired == 'expired') {
    $booth_expired = '';
    update_option('booth_expired', $booth_expired);
    wp_redirect(get_site_url());
    exit;
}
else {
    $booth_expired = 'expired';
    update_option('booth_expired', $booth_expired);
    wp_redirect(get_site_url());
    exit;
}

?>