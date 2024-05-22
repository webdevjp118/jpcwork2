<?php /* Template Name: News*/ ?>
<?php 
get_header(); 
?>


<main id="primary" class="site-main">


<!-- banner -->
<!-- news -->
<?php
$pageno = 1;
if(isset($_GET['pageno'])) $pageno = $_GET['pageno'];
if($pageno <= 0) $pageno = 1;
$post_per_page = 10;
$fetch_key = array(
    'post_type' => 'post',
    // 'author' => $user_id,
	'posts_per_page' => $post_per_page,
);
$fetch_query = new WP_Query($fetch_key);
$total_count =$fetch_query->found_post;

?>
<section class="notice_section">
	<div class="notice_inner">
		<div class="header_textwrap">
			<div class="heading_text">
				<h5>NEWS</h5>
				<p>新着情報</p>
			</div>
		</div>
        <div class="news_sec">
<?php 
if ( $fetch_query->have_posts() ) :
    while ( $fetch_query->have_posts() ) :
        $fetch_query->the_post();
        $post_id = $fetch_query->get_the_ID();
        $loop_url = get_the_permalink($post_id);
        $loop_category = get_the_category($post_id);
        $loop_catname = '';
        if(count($loop_category) > 0) $loop_catname = $loop_category[0]->name;
        $loop_date = get_the_date('Y/m/d ', $post_id);
		$post_time = get_the_time('h時i分', $post_id);
		$loop_date .= ' '.$post_time;
        $loop_title = get_the_title($post_id);
        $loop_photo = get_the_post_thumbnail_url($post_id);
        $loop_content = get_the_excerpt($post_id);
        if(empty($loop_photo)) $loop_photo = catch_first_image($post_id);
        if(strpos($loop_photo, "default.jpg") !== false) $loop_photo = "";
        if(empty($loop_photo)) $loop_photo = get_stylesheet_directory_uri().'/images/noimage.jpg';
?>
            <div class="news_sec_a">
                <div class="news_sec_inner">
                    <div class="custom_row">
                        <div class="news_sec_inner_image">
                            <img src="<?php echo $loop_photo; ?>">
                        </div>
                        <div class="news_sec_inner_text">
                            <div>
                                <h5 class="news_title truncate"><?php echo $loop_title; ?></h5>
                                <div class="title_line"></div>
                                <p class="news_date"><?php echo $loop_date; ?></p>
                                <div class="news_cate"><?php echo $loop_catname; ?></div>
                                <p class="news_content"><?php echo $loop_content; ?></a>
                                <p class="view_more"><a href="<?php echo $loop_url; ?>" >もっと読む＞＞＞</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php
    endwhile;
endif;
$prev_pageno = 0;
$next_pageno = 0;
$prev_pageno = $pageno-1;
$next_pageno = $pageno+1;
$prev_page_link = get_site_url().'/news/?pageno='.$prev_pageno;
$next_page_link = get_site_url().'/news/?pageno='.$next_pageno;
if($total_count - ($next_pageno-1)*$posts_per_page <= 0) $next_pageno = 0;
?>
            <div class="pagination_sec">
                <div>
                    <ul>
                        <li>
<?php //if($prev_pageno > 0): ?>
                            <a href="<?php echo $prev_page_link; ?>">戻る</a>
<?php //endif; ?>
                            <a href="#"><?php echo $pageno; ?></a>
<?php //if($next_pageno > 0): ?>
                            <a href="<?php echo $next_page_link; ?>">次へ</a>
<?php //endif; ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


</main><!-- #main -->

<?php
get_footer();