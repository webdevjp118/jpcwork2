<?php /* Template Name: List*/ ?>
<?php 
get_header(); 
?>
<?php
$key = '';
$posts_per_page = 10;
$areakey = '';
if(isset($_GET['key'])) $key = $_GET['key'];
if(isset($_GET['areakey'])) $areakey = $_GET['areakey'];
$pageno = 1;
if(isset($_GET['pageno'])) $pageno = $_GET['pageno'];
if(!empty($key)) {
    $query_var = array (
        'post_type' => 'salon',
        's' => $key,
        'posts_per_page' => $posts_per_page,
	    'paged' => $pageno,
    );
}
else if(!empty($areakey)) {
    $meta_query = array(
        'relation' => 'OR',
        array(
            'key' => 'area1',
            'value' => $areakey,
            'compare' => '='
        ),
        array(
            'key' => 'area2',
            'value' => $areakey,
            'compare' => '='
        ),
        array(
            'key' => 'area3',
            'value' => $areakey,
            'compare' => '='
        ),
    );
    $query_var = array (
        'post_type' => 'salon',
        'meta_query' => $meta_query,
        'posts_per_page' => $posts_per_page,
	    'paged' => $pageno,
    );
}
else {
    $query_var = array (
        'post_type' => 'salon',
        'posts_per_page' => $posts_per_page,
	    'paged' => $pageno,
    );
}
$query = new WP_Query($query_var);
$total_count = $query->found_posts;
$total_pages = $query->max_num_pages;
function get_list_url($key, $area, $pageno) {
    $params = [];
    if(!empty($key)) array_push($params, 'key='.$key);
    if(!empty($areakey)) array_push($params, 'areakey='.$areakey);
    if(!empty($pageno)) array_push($params, 'pageno='.$pageno);
    $result = implode("&", $params);
    if(empty($result)) {
        return get_site_url().'/list';
    }
    else {
        return get_site_url().'/list/?'.$result;
    }
}   
?>
<section class="inner_page_banner">
    <h2 class="io fade">全国のサロンを探す</h2>
</section>
<section class="breadcrumb_section">
    <div class="custom_container">
        <ul>
            <li><a href="<?php get_site_url(); ?>">TOP</a></li>
            <li><a href="<?php get_site_url(); ?>/search">全国の麻痺施術サロンを探す</a></li>
<?php
if(!empty($areakey)) {
    echo '<li><span>'.$areakey.'</span></li>';
}
?>
        </ul>
    </div>
</section>
<section class="search_result_section">
    <div class="custom_container">
        <div class="common_section_title io fade upS">
            <h2>検索結果</h2>
        </div>
<?php 
if($query->have_posts()) : 
    while ($query->have_posts()) : 
        $query->the_post(); 
        $loop_title = get_the_title();
        $loop_date = get_the_date("Y.m.d");
        $loop_id = get_the_ID();
        $loop_permalink = get_the_permalink();
        $loop_image = "";
        if (has_post_thumbnail( $loop_id )) {
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop_id ), 'single-post-thumbnail' );
            $loop_image = $image[0];
        }
        if(empty($loop_image)) $loop_image = get_stylesheet_directory_uri().'/images/noimage.jpg';
        $loop_salon_name = get_post_meta($loop_id, 'salon_name', true);
        $loop_phone_num = get_post_meta($loop_id, 'phone_num', true);
        $loop_address = get_post_meta($loop_id, 'address', true);
        $loop_area1 = get_post_meta($loop_id, 'area1', true);
        $loop_area2 = get_post_meta($loop_id, 'area2', true);
        $loop_area3 = get_post_meta($loop_id, 'area3', true);
?>
        <div class="search_result_card io fade upS">
            <div class="search_result_card_header">
                <h3><i class="fas fa-caret-right"></i><?php echo $loop_salon_name; ?></h3>
                <span><?php echo get_full_area2($loop_area2).get_full_area3($loop_area3); ?></span>
            </div>
            <div class="search_result_card_body">
                <div class="card_custom_container">
                    <div class="card_custom_row">
                        <div class="card_custom_col_details">
                            <div class="inner_custom_row">
                                <div class="custom_col_image">
                                    <img src="<?php echo $loop_image; ?>" alt="image">
                                </div>
                                <div class="custom_col_text">
                                    <p><?php the_content(); ?></p>
                                    <ul>
                                        <li><span>住所</span><?php echo $loop_address; ?></li>
                                        <li><span>電話番号</span><a href="tel:<?php echo str_replace('-','',$loop_phone_num); ?>"><?php echo $loop_phone_num; ?></a></li>
                                    </ul>
                                    <a href="<?php echo $loop_permalink; ?>" class="see_more_btn csp-1160">詳しく見る</a>
                                </div>
                            </div>
                        </div>
                        <div class="card_custom_col_btn cpc-1160">
                            <a href="<?php echo $loop_permalink; ?>" class="see_more_btn">詳しく見る</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    endwhile;
endif;
?>
<?php if($total_count <= 0 ) : ?>
    <p class="no_search_result">検索結果がありません。</p>
<?php endif; ?>
        <div class="custom_pagination io fade upS">
            <ul>
<?php
for($i=1;$i<=$total_pages;$i++) {
    if($i == $pageno) {
        echo '<li class="active"><a href="javascript:void(0);">'.$i.'</a></li>';
    }
    else {
        echo '<li><a href="'.get_list_url($key, $areakey, $i).'">'.$i.'</a></li>';
    }
}
?>
            </ul>
        </div>
    </div>
</section>
<?php
get_footer();
?>