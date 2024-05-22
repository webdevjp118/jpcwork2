<?php /* Template Name: Blogs*/ ?>
<?php 
get_header(); 
?>

<?php
$pageno = 1;
if(isset($_GET['pageno'])) $pageno = $_GET['pageno'];
if($pageno <= 0) $pageno = 1;
$cat_key = '';
if(isset($_GET['cat_key'])) $cat_key = $_GET['cat_key'];
$y_key = '';
if(isset($_GET['y_key'])) $y_key = $_GET['y_key'];
$m_key = '';
if(isset($_GET['m_key'])) $ym_key = $_GET['m_key'];
$fetch_key = array(
    'post_type' => 'post',
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
        $loop_category = get_the_category();
        $loop_catname = '';
        if(count($loop_category) > 0) $loop_catname = $loop_category[0]->name;
        if(empty($cat_key) && empty($y_key) && empty($m_key) ) {
            array_push($show_ids, $loop_id);
        }
        else if(!empty($cat_key) && $cat_key == $loop_catname) {
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
$post_per_page = 9;
$total_page_count = intval($total_count/$post_per_page);
if($total_count % $post_per_page) $total_page_count++;

$rowcol_arr = [];
$rowcol_arr_posts = [];
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
    $rowcol_arr_post = [];
    $rowcol_arr_post['title'] = $loop_title;
    $rowcol_arr_post['url'] = $loop_url;
    $rowcol_arr_post['photo'] = $loop_photo;
    $rowcol_arr_post['date'] = $loop_date;
    $rowcol_arr_post['text'] = $loop_text;
    array_push($rowcol_arr_posts, $rowcol_arr_post);
    if(count($rowcol_arr_posts) >= 3) {
        array_push($rowcol_arr, $rowcol_arr_posts);
        $rowcol_arr_posts = [];
    }
}
if(count($rowcol_arr_posts)>0) array_push($rowcol_arr, $rowcol_arr_posts);
?>
<main id="primary" class="site-main">

<div class="main_body_content">
    <div class="right_side_contet">
<?php echo_header(); ?>
        <section class="custom_breadcrumb_section" id="tab1">
            <h1>News & BIog <br class="csp"><span class="small_h1">－岡谷シルク日記－</span></h1>
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/svg/infinite_sign.svg" alt="infinite sign icon">
        </section>
        <section class="blogs_section">
            <div class="blogs_container">
<?php
for($i=0;$i<count($rowcol_arr);$i++) {
    $rowcol_arr_posts = $rowcol_arr[$i];
    if(count($rowcol_arr_posts)>0) {
        $rowcol_arr_post = $rowcol_arr_posts[0];
        $loop_title = $rowcol_arr_post['title'];
        $loop_url = $rowcol_arr_post['url'];
        $loop_photo = $rowcol_arr_post['photo'];
        $loop_date = $rowcol_arr_post['date'];
        $loop_text = $rowcol_arr_post['text'];
        
?>
                <div class="blogs_row">
                    <div class="blogs_col1">
                        <a class="blogs_item_big" href="<?php echo $loop_url; ?>">
                            <div class="blogs_item_image_box">
                                <img src="<?php echo $loop_photo; ?>" alt="okaya industry image">
                                <span class="outlink_big"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/svg/right_arrow.svg" alt="right arrow"></span>
                            </div>
                            <div class="blogs_item_desc">
                                <div class="blogs_item_title"><?php echo $loop_title; ?></div>
                                <div class="blogs_item_date"><?php echo $loop_date; ?></div>
                                <div class="blogs_item_text"><?php echo $loop_text; ?></div>
                            </div>
                        </a>
                    </div>
<?php        
        if(count($rowcol_arr_posts)>1) {
            $rowcol_arr_post = $rowcol_arr_posts[1];
            $loop_title = $rowcol_arr_post['title'];
            $loop_url = $rowcol_arr_post['url'];
            $loop_photo = $rowcol_arr_post['photo'];
            $loop_date = $rowcol_arr_post['date'];
            $loop_text = $rowcol_arr_post['text'];
?>
                    <div class="blogs_col2">
                        <div class="blogs_vcol_top">
                            <a class="blogs_item" href="<?php echo $loop_url; ?>">
                                <div class="blogs_item_image_box">
                                    <img src="<?php echo $loop_photo; ?>" alt="okaya industry image">
                                    <span class="outlink"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/svg/right_arrow.svg" alt="right arrow"></span>
                                </div>
                                <div class="blogs_item_desc">
                                    <div class="blogs_item_title"><?php echo $loop_title; ?></div>
                                    <div class="blogs_item_date"><?php echo $loop_date; ?></div>
                                    <div class="blogs_item_text"><?php echo $loop_text; ?></div>
                                </div>
                            </a>
                        </div>
<?php
            if(count($rowcol_arr_posts)>2) {
                $rowcol_arr_post = $rowcol_arr_posts[2];
                $loop_title = $rowcol_arr_post['title'];
                $loop_url = $rowcol_arr_post['url'];
                $loop_photo = $rowcol_arr_post['photo'];
                $loop_date = $rowcol_arr_post['date'];
                $loop_text = $rowcol_arr_post['text'];
?>
                        <div class="blogs_vcol_bottom" href="<?php echo $loop_url; ?>">
                            <a class="blogs_item" href="<?php echo $loop_url; ?>">
                                <div class="blogs_item_image_box">
                                    <img src="<?php echo $loop_photo; ?>" alt="okaya industry image">
                                    <span class="outlink"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/svg/right_arrow.svg" alt="right arrow"></span>
                                </div>
                                <div class="blogs_item_desc">
                                    <div class="blogs_item_title"><?php echo $loop_title; ?></div>
                                    <div class="blogs_item_date"><?php echo $loop_date; ?></div>
                                    <div class="blogs_item_text"><?php echo $loop_text; ?></div>
                                </div>
                            </a>
                        </div>
                    </div>                        
<?php
            }
            else { //count=2
?>
                    </div>
<?php
            }
        }
        else { //count=1
?>
<?php
        }
?>
                </div>
<?php
    }    
}
?>
            </div>
            <div class="pagination_row pg_blogs">
                <div class="pagination">
<?php
for($i=1;$i<=$total_page_count;$i++) {
?>
<?php 
    if($pageno == $i) {
        echo '<a href="'.get_site_url().'/blogs/?pageno='.$i.'&y_key='.$year_key.'&m_key='.$month_key.'" class="current">'.$i.'</a>';
    }
    else {
        echo '<a href="'.get_site_url().'/blogs/?pageno='.$i.'&y_key='.$year_key.'&m_key='.$month_key.'">'.$i.'</a>';
    }
?>
<?php
}
?>
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
foreach($da_posts as $year_key=>$year_posts) {
    foreach($year_posts as $month_key=>$month_posts) {
        if($month_key != 'total'){
            echo '<li><a href="'.get_site_url().'/blogs/?y_key='.$year_key.'&m_key='.$month_key.'" class="month_count">'.$year_key.'年'.$month_key.'月</a></li>';
        }
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
foreach($da_posts as $year_key=>$year_posts) {
    foreach($year_posts as $month_key=>$month_posts) {
        if($month_key != 'total'){
            echo '<li><a href="'.get_site_url().'/blogs/?y_key='.$year_key.'&m_key='.$month_key.'" class="month_count">'.$year_key.'年'.$month_key.'月</a></li>';
        }
    }
}
?>
            </ul>
        </div>
    </div>
</div>



</main><!-- #main -->

<?php
get_footer();