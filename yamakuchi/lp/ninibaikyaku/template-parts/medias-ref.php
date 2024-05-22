<?php /* Template Name: News*/ ?>
<?php 
get_header(); 
?>

<div class="filler_header cpc"></div>

<main id="primary" class="site-main">


<!-- banner -->
<section class="normal_banner_section pg_news">
	<div class="normal_banner_text pg_news">
		<h1>News</h1>
		<p>お知らせ</p>
		<div class="sp_booking_area">
			<a class="sp_booking_btn">
				<svg><use xlink:href="#svg_marrow_r" style="visibility:hidden"></use></svg>
				<div>
					<span>宿泊予約</span><br>
					Booking	
				</div>
				<svg><use xlink:href="#svg_marrow_r"></use></svg>
			</a>
		</div>
	</div>
</section>
<!-- news -->
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

if($fetch_query->have_posts()) : 
    while ($fetch_query->have_posts()) : 
        $fetch_query->the_post(); 
        $loop_id = get_the_id();
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
$post_per_page = 10;

?>
<section class="news_section_page">
    <div class="custom_container_medium">
        <div class="header_text">
            <h5><a class="pankuzu" href="<?php echo get_site_url(); ?>">ホーム</a> / お知らせ</h5>
        </div>
        <div class="custom_row">
            <div class="news_sec">
<?php 
for($i=($pageno-1)*$post_per_page;$i<$pageno*$post_per_page;$i++) {
    if($i>=count($show_ids)) break;
    $post_id = $show_ids[$i];
    $loop_url = get_the_permalink($post_id);
    $loop_category = get_the_category($post_id);
    $loop_catname = '';
    if(count($loop_category) > 0) $loop_catname = $loop_category[0]->name;
    $loop_date = get_the_date('Y.m.d', $post_id);
    $loop_title = get_the_title($post_id);
    $loop_photo = get_the_post_thumbnail_url($post_id);
    if(empty($loop_photo)) $loop_photo = catch_first_image($post_id);
    if(strpos($loop_photo, "default.jpg") !== false) $loop_photo = "";
    if(empty($loop_photo)) $loop_photo = get_stylesheet_directory_uri().'/images/noimage.jpg';
?>
                <a href="<?php echo $loop_url; ?>" class="news_sec_a">
                    <div class="news_sec_inner">
                        <div class="custom_row">
                            <div class="news_sec_inner_image">
                                <img src="<?php echo $loop_photo; ?>">
                            </div>
                            <div class="news_sec_inner_text">
                                <div>
                                    <p><?php echo $loop_date; ?></p>
                                    <span><?php echo $loop_catname; ?></span>
                                    <h5><?php echo $loop_title; ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
<?php
}
$prev_pageno = 0;
$next_pageno = 0;
$prev_pageno = $pageno-1;
$next_pageno = $pageno+1;
$prev_page_link = get_site_url().'/news/?pageno='.$prev_pageno.'&cat_key='.$cat_key.'&y_key='.$y_key.'&m_key='.$m_key;
$next_page_link = get_site_url().'/news/?pageno='.$next_pageno.'&cat_key='.$cat_key.'&y_key='.$y_key.'&m_key='.$m_key;
if($total_count - ($next_pageno-1)*$post_per_page <= 0) $next_pageno = 0;
?>
                <div class="pagination_sec">
                    <div>
                        <ul>
                            <li>
<?php if($prev_pageno > 0): ?>
                                <a href="<?php echo $prev_page_link; ?>"><img class="img_l" src="<?php echo get_stylesheet_directory_uri(); ?>/images/news_arrow_l.png">戻る</a>
<?php endif; ?>
                                <a href="#"><?php echo $pageno; ?></a>
<?php if($next_pageno > 0): ?>
                                <a href="<?php echo $next_page_link; ?>">次へ<img class="img_r" src="<?php echo get_stylesheet_directory_uri(); ?>/images/news_arrow.png"></a>
<?php endif; ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="archive_sec">
                <div class="category_archive">
                    <div class="archive_heading">
                        <h4>Category Archive <span>/カテゴリー</span></h4>
                    </div>
                    <div class="category_text">
                        <p>ALL</p>
<?php
$cat_terms = get_categories();
foreach($cat_terms as $cat_term) { ?>
                        <a href="<?php echo get_site_url(); ?>/news/?cat_key=<?php echo $cat_term->name; ?>"><?php echo $cat_term->name.' ('.$cat_term->count.')'; ?></a>
<?php    
}
?>
                    </div>
                </div>
                <div class="monthly_archive">
                    <div class="archive_heading">
                        <h4>Monthly Archive <span>/過去の記事</span></h4>
                    </div>
                    <div class="category_text">
<?php
foreach($da_posts as $year_key=>$year_posts) {
    echo '<a href="'.get_site_url().'/news/?y_key='.$year_key.'">'.$year_key.'年の記事一覧 ('.$year_posts['total'].')</a>';
    foreach($year_posts as $month_key=>$month_posts) {
        if($month_key != 'total'){
            echo '<a href="'.get_site_url().'/news/?y_key='.$year_key.'&m_key='.$month_key.'" class="month_count">'.$year_key.'/'.$month_key.' ('.$month_posts.')</a>';
        }
    }
}
?>
                        <!-- <a href="#">2021年の記事一覧 (2)</a>
                        <a href="#" class="month_count">2021/01 (2)</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php echo_recommend_sec(); ?>
<?php echo_reserve_sec(); ?>


</main><!-- #main -->

<?php
get_footer();