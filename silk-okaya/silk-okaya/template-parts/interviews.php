<?php /* Template Name: Interviews*/ ?>
<?php 
get_header(); 
?>
<?php
$pageno = 1;
if(isset($_GET['pageno'])) $pageno = $_GET['pageno'];
if($pageno <= 0) $pageno = 1;
$y_key = '';
if(isset($_GET['y_key'])) $y_key = $_GET['y_key'];
$m_key = '';
if(isset($_GET['m_key'])) $ym_key = $_GET['m_key'];
$fetch_key = array(
    'post_type' => 'silkmaker',
    // 'author' => $user_id,
	'posts_per_page' => -1,
    'fields' => 'ids',
);
$fetch_query = new WP_Query($fetch_key);
$da_posts = [];
$show_ids = [];
$id_list=[];

if($fetch_query->have_posts()) : 
    while ($fetch_query->have_posts()) : 
        $fetch_query->the_post(); 
        $loop_id = get_the_id();
        array_push($id_list, $loop_id);
        $loop_y = get_the_date('Y');
        $da_posts[$loop_y]['total'] = $da_posts[$loop_y]['total'] + 1;
        $loop_m = get_the_date('m');
        $da_posts[$loop_y][$loop_m] = $da_posts[$loop_y][$loop_m] + 1;
        if(empty($y_key) && empty($m_key) ) {
            array_push($show_ids, $loop_id);
        }
        else if(!empty($y_key) && !empty($m_key) && $y_key == $loop_y && $m_key == $loop_m) {
            array_push($show_ids, $loop_id);
        }
        else if(!empty($y_key) && $y_key == $loop_y) {
            array_push($show_ids, $loop_id);
        }
    endwhile;
endif;
$total_count =count($show_ids);
$post_per_page = 12;
$total_page_count = intval($total_count/$post_per_page);
if($total_count % $post_per_page) $total_page_count++;

?>


<main id="primary" class="site-main">


<div class="main_body_content">
    <div class="right_side_contet">
<?php echo_header(); ?>
        <section class="custom_breadcrumb_section">
            <h1>シルクで頑張る人</h1>
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/svg/infinite_sign.svg" alt="infinite sign icon">
        </section>
        <section class="related_facilities_section pg_vol" id="tab3">
            <div class="custom_container">
                <div class="custom_row">
<?php
for($i=($pageno-1)*$post_per_page;$i<$pageno*$post_per_page;$i++) {
    if($i>=count($show_ids)) break;
    $post_id = $show_ids[$i];
    $loop_url = get_the_permalink($post_id);
    $loop_text = get_the_excerpt($post_id);
    $loop_category = get_the_category($post_id);
    $loop_catname = '';
    if(count($loop_category) > 0) $loop_catname = $loop_category[0]->name;
    $loop_date = get_the_date('Y.m.d', $post_id);
    $loop_title = get_the_title($post_id);
    $loop_photo = get_the_post_thumbnail_url($post_id);
    if(strpos($loop_photo, "default.jpg") !== false) $loop_photo = "";
    if(empty($loop_photo)) $loop_photo = catch_first_image($post_id);
    if(strpos($loop_photo, "default.jpg") !== false) $loop_photo = "";
    if(empty($loop_photo)) $loop_photo = get_stylesheet_directory_uri().'/images/noimage.jpg';
    $loop_vol = get_post_meta( $loop_id, 'vol', true);
?>
                    <div class="custom_col_4 pg_vol">
                        <a href="<?php echo $loop_url; ?>" class="single_facility_box pg_vol">
                            <div class="facility_image_box pg_vol">
                                <img src="<?php echo $loop_photo; ?>" alt="facility image">
                                <span class="button_blue button_icon_only"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/svg/right_up_arrow.svg" alt="right arrow"></span>
                            </div>
                            <div class="vol_item_desc">
                                <div class="vol_item_no"><?php echo 'Interview Vol.'.$loop_vol; ?></div>
                                <div class="vol_item_title"><?php echo $loop_title; ?></div>
                                <div class="vol_item_date"><?php echo $loop_date; ?></div>
                            </div>
                        </a>
                    </div>
<?php
}
?>
                </div>
                <div class="pagination_row">
                    <div class="pagination">
<?php
for($i=1;$i<=$total_page_count;$i++) {
?>
<?php 
    if($pageno == $i) {
        echo '<a href="'.get_site_url().'/interviews/?pageno='.$i.'&y_key='.$year_key.'&m_key='.$month_key.'" class="current">'.$i.'</a>';
    }
    else {
        echo '<a href="'.get_site_url().'/interviews/?pageno='.$i.'&y_key='.$year_key.'&m_key='.$month_key.'">'.$i.'</a>';
    }
?>
<?php
}
?>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="left_side_bar_bottom csp">
            <div class="custom_container">
                <ul>
                    <li style="border:none">
                        <div class="side_achive">ARCHIVE</div>
                    </li>  
<?php
for($i=0;$i<count($id_list); $i++) {
    $loop_id = $id_list[$i];
    $loop_vol = get_post_meta($loop_id, 'vol', true);
    $loop_link = get_permalink($loop_id);
    if($loop_id != $post_id){
            echo '<li><a href="'.$loop_link.'">Vol.'.$loop_vol.'</a></li>';
    }
}
?>
                </ul>
            </div>
        </section>
    </div>
    <div class="left_side_bar cpc">
        <div class="left_side_bar_inner">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_black.png" alt="logo image" class="cpc js_button" data-href="<?php echo get_site_url(); ?>">
            <div class="side_achive">
                ARCHIVE
            </div>
            <ul>
<?php
for($i=0;$i<count($id_list); $i++) {
    $loop_id = $id_list[$i];
    $loop_vol = get_post_meta($loop_id, 'vol', true);
    $loop_link = get_permalink($loop_id);
    if($loop_id != $post_id){
            echo '<li><a href="'.$loop_link.'">Vol.'.$loop_vol.'</a></li>';
    }
}
?>
            </ul>
        </div>
    </div>
</div>


</main><!-- <main id="primary" class="site-main"> -->
<?php
get_footer();