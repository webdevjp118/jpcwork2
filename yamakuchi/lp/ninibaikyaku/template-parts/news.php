<?php /* Template Name: News*/ ?>
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
function date_cmp($a, $b)
{
    return $a['weight'] < $b['weight'];
}
function year_cmp($a, $b)
{
    return $a < $b;
}
query_posts( 'posts_per_page=-1' );
$da_posts = [];
$sort_list = [];
$year_list = [];
$show_ids = [];
if(have_posts()) : 
    while (have_posts()) : 
        the_post(); 
        $loop_id = get_the_id();
		$loop_y = get_the_date("Y");
        if(!in_array($loop_y, $year_list)) array_push($year_list, $loop_y);
		$loop_m = date( "m", strtotime( $loop_date ) );
		$loop_d = date( "d", strtotime( $loop_date ) );
        $da_posts[$loop_y]['total'] = $da_posts[$loop_y]['total'] + 1;
		if(empty($y_key)) {
			array_push($show_ids, $loop_id);
        }
        else if(!empty($y_key) && $y_key == $loop_y) {
			array_push($show_ids, $loop_id);
        }
    endwhile;
endif;

$total_count = count($show_ids);
$posts_per_page = 9;

?>

<main id="primary" class="site-main">

<section class="news_page_sec">
    <div class="pagetitle_wrap">
        <div class="custom_container">    
            <div class="pankuzu_sec">
                <ul><li><a href="https://ninibaikyaku-dr.com/">トップ </a></li><li><a href="#">お知らせ一覧</a></li></ul>
            </div>
            <div class="pagetitle">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/news-heading-image.png">
                <h2>お知らせ一覧</h2>
            </div>
        </div>
    </div>
    <div class="publication_inner_sec">
        <div class="publication_box_sec">
            <div class="publication_box_sec_inner">
                <div class="news_wrap">
<?php 
for($i=($pageno-1)*$posts_per_page;$i<$pageno*$posts_per_page;$i++) {
    if($i>=count($show_ids)) break;
    $post_id = $show_ids[$i];
    $loop_date = get_the_date('Y.m.d', $post_id);
    $loop_title = get_the_title($post_id);
    $loop_post = get_post($post_id);
    $loop_content = get_the_excerpt($post_id);
    $loop_url = get_the_permalink($post_id);
?>
                    <div class="news_div">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/news_deco.png" class="news_deco">
                        <div class="news_inner">
                            <div class="news_title">
                                <h4><?php echo $loop_date; ?></h4>
                            </div>
                            <div class="news_text">
                                <h3><?php echo $loop_title; ?></h3>
                                <p><?php echo $loop_content; ?></p>
                            </div>
                            <div class="news_detail">
					            <a href="<?php echo $loop_url; ?>">もっと見る <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
				            </div>
                        </div>
                    </div>
<?php } ?>
                </div>
<?php
//$total_count = 0; //test
$first_pageno = 1;
$first_page_link = get_site_url().'/news/?pageno='.$first_pageno.'&cat_key='.$cat_key.'&y_key='.$y_key;
$prev_pageno = 0;
$next_pageno = 0;
$prev_pageno = $pageno-1;
$next_pageno = $pageno+1;
$prev_page_link = get_site_url().'/news/?pageno='.$prev_pageno.'&cat_key='.$cat_key.'&y_key='.$y_key;
$next_page_link = get_site_url().'/news/?pageno='.$next_pageno.'&cat_key='.$cat_key.'&y_key='.$y_key;
$last_page_posts = $total_count % $posts_per_page;
if($last_page_posts > 0) $last_pageno = 1+ ( ($total_count - $last_page_posts) / $posts_per_page );
else $last_pageno = $total_count / $posts_per_page;
$last_page_link = get_site_url().'/news/?pageno='.$last_pageno.'&cat_key='.$cat_key.'&y_key='.$y_key;

$first_show = false;
if($first_pageno < ($pageno-1)) $first_show = true;
$prev_show = false;
if($prev_pageno > 0) $prev_show = true;
$prev_hidden = false;
if($prev_show && $prev_pageno > 2) $prev_hidden = true;
$next_show = false;
if($next_pageno <= $last_pageno) $next_show = true;
$last_show = false;
if($last_pageno > $next_pageno) $last_show = true;
$next_hidden = false;
if($last_show && $last_pageno > ($next_pageno + 1)) $next_hidden = true;
?>
<?php if($total_count > 0):?>
				<div class="pagination_box">
					<div class="pagination">
						<div class="pagination_left">
							<?php if($first_show): ?>	<a class="page_circle" href="<?php echo $first_page_link; ?>"><?php echo $first_pageno; ?></a>		
							<?php endif; ?>
							<?php if($prev_hidden): ?>	<div class="page_hidden">...</div>							
							<?php endif; ?>
							<?php if($prev_show): ?>	<a class="page_circle" href="<?php echo $prev_page_link; ?>"><?php echo $prev_pageno; ?></a>		
							<?php endif; ?>
						</div>
						<div class="pagination_center">
							<div class="page_circle page_selected"><?php echo $pageno; ?></div>
						</div>
						<div class="pagination_right">
							<?php if($next_show): ?>	<a class="page_circle" href="<?php echo $next_page_link; ?>"><?php echo $next_pageno; ?></a>		
							<?php endif; ?>
							<?php if($next_hidden): ?>	<div class="page_hidden">...</div>							
							<?php endif; ?>
							<?php if($last_show): ?>	<a class="page_circle" href="<?php echo $last_page_link; ?>"><?php echo $last_pageno; ?></a>		
							<?php endif; ?>
						</div>
					</div>
				</div>
<?php else: ?>
				<div class="pagination_box">
					<div class="pagination">メディアがありません。</div>
				</div>
<?php endif; ?>
               
            </div>
            <div class="archive_media_box_sec">
				<div class="archive_media_box_sec_inner">
					<div class="archive_box_sec">
						<div class="archive_box_sec_inner">
							<h5>アーカイブ</h5>
                        <?php foreach($year_list as $year_cap): ?>
							<?php if($year_cap == $y_key): ?>
								<a href="<?php echo get_site_url().'/news?y_key='.$year_cap; ?>" class="active_btn"><i class="fa fa-angle-left" aria-hidden="true"></i><?php echo ' '.$year_cap.'年'; ?></a>
							<?php else: ?>
								<a href="<?php echo get_site_url().'/news?y_key='.$year_cap; ?>"><i class="fa fa-angle-left" aria-hidden="true"></i><?php echo ' '.$year_cap.'年'; ?></a>
							<?php endif; ?>
                        <?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
    </div>
</section>

</main><!-- #main -->
<?php
get_footer();