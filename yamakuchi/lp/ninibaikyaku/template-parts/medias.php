<?php /* Template Name: Medias*/ ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/jquery-ui.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/jquery.fancybox.css">
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
$fetch_key = array(
    'post_type' => 'cmedia',
    // 'author' => $user_id,
	'posts_per_page' => -1,
    'fields' => 'ids',
);
function date_cmp($a, $b)
{
    return $a['weight'] < $b['weight'];
}
function year_cmp($a, $b)
{
    return $a < $b;
}
$category_list = get_media_category();
$fetch_query = new WP_Query($fetch_key);
$da_posts = [];
$sort_list = [];
$year_list = [];
if($fetch_query->have_posts()) : 
    while ($fetch_query->have_posts()) : 
        $fetch_query->the_post(); 
        $loop_id = get_the_id();
		$loop_date = get_post_meta($loop_id, 'mdate', true);
		$loop_y = date( "Y", strtotime( $loop_date ) );
		$loop_m = date( "m", strtotime( $loop_date ) );
		$loop_d = date( "d", strtotime( $loop_date ) );
        $da_posts[$loop_y]['total'] = $da_posts[$loop_y]['total'] + 1;
		if(!in_array($loop_y, $year_list)) array_push($year_list, $loop_y);
        $loop_category = get_post_meta($loop_id, 'category', true);
        if(empty($cat_key) && empty($y_key)) {
			array_push($sort_list, array('weight' => ($loop_y*10000 + $loop_m*100 + $loop_d), 'id' => $loop_id));
            // array_push($show_ids, $loop_id);
        }
        else if(!empty($cat_key) && $cat_key == $loop_category) {
			array_push($sort_list, array('weight' => ($loop_y*10000 + $loop_m*100 + $loop_d), 'id' => $loop_id));
            // array_push($show_ids, $loop_id);
        }
        else if(!empty($y_key) && $y_key == $loop_y) {
			array_push($sort_list, array('weight' => ($loop_y*10000 + $loop_m*100 + $loop_d), 'id' => $loop_id));
            // array_push($show_ids, $loop_id);
        }
    endwhile;
endif;
usort($sort_list, "date_cmp");
usort($year_list, "year_cmp");
$show_ids = [];
foreach($sort_list as $item) {
	array_push($show_ids, $item['id']);
}

$total_count =count($show_ids);
$posts_per_page = 10;

?>

<main id="primary" class="site-main">

<!-- publication_section -->
<section class="publication_section">
	<div class="publication_inner_sec">
		<div class="breadcrumb_sec">
			<ul>
				<li>
					<a href="https://ninibaikyaku-dr.com/">トップ </a>
				</li>
				<li>
					<a href="#">メディア掲載</a>
				</li>
			</ul>
		</div>
		<div class="heading_text">
			<h2>メディア掲載</h2>
		</div>
		<div class="publication_box_sec">
			<div class="publication_box_sec_inner">
<?php 
for($i=($pageno-1)*$posts_per_page;$i<$pageno*$posts_per_page;$i++) {
    if($i>=count($show_ids)) break;
    $post_id = $show_ids[$i];
    $loop_url = get_the_permalink($post_id);
    $loop_category = get_post_meta($post_id, 'category', true);
	$loop_color = get_media_color($loop_category);
    $loop_date = get_post_meta($post_id, 'mdate', true);
	$loop_date = date( "Y.m.d", strtotime( $loop_date ) );
    $loop_title = get_post_meta($post_id, 'mtitle', true);
	$loop_content = get_post_meta($post_id, 'content', true);
    $loop_image = get_post_meta($post_id, 'image', true);
	$loop_pdf = get_post_meta($post_id, 'pdf', true);
	$loop_website = get_post_meta($post_id, 'website', true);
	$loop_photo = $loop_image;
	if(!empty($loop_pdf) && empty($loop_photo)) $loop_photo = get_stylesheet_directory_uri().'/images/pdf-cover.jpg';
	if(empty($loop_photo)) $loop_photo = get_stylesheet_directory_uri().'/images/company-logo2.png';
?>
				<div class="publication_box publication_box_first">
					<div class="publication_box_inner">
						<div class="publication_box_image">
							<div class="publication_box_image_inner">
								<?php if(!empty($loop_pdf)): ?>
									<a href="<?php echo $loop_pdf; ?>" target="_blank">
										<img src="<?php echo $loop_photo; ?>" alt="image" >
									</a>
								<?php elseif(!empty($loop_image)): ?>
									<a href="<?php echo $loop_photo; ?>" data-fancybox="gallery">
										<img src="<?php echo $loop_photo; ?>" alt="image" >
									</a>									
								<?php else: ?>
									<img src="<?php echo $loop_photo; ?>" alt="image" >
								<?php endif; ?>
							</div>
						</div>
						<div class="publication_box_text">
							<p class="publication_box_inner_text"><?php echo $loop_date; ?><span style="background-color:<?php echo $loop_color; ?>;"><?php echo $loop_category; ?></span></p>
							<h6><?php echo $loop_title; ?></h6>
							<p><?php echo $loop_content; ?></p>
							<?php if(!empty($loop_website)): ?>
								<a href="<?php echo $loop_website; ?>" target="_blank">詳しくはこちら <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
							<?php endif; ?>
						</div>
					</div>
				</div>
<?php
}
//$total_count = 0; //test
$first_pageno = 1;
$first_page_link = get_site_url().'/medias/?pageno='.$first_pageno.'&cat_key='.$cat_key.'&y_key='.$y_key;
$prev_pageno = 0;
$next_pageno = 0;
$prev_pageno = $pageno-1;
$next_pageno = $pageno+1;
$prev_page_link = get_site_url().'/medias/?pageno='.$prev_pageno.'&cat_key='.$cat_key.'&y_key='.$y_key;
$next_page_link = get_site_url().'/medias/?pageno='.$next_pageno.'&cat_key='.$cat_key.'&y_key='.$y_key;
$last_page_posts = $total_count % $posts_per_page;
if($last_page_posts > 0) $last_pageno = 1+ ( ($total_count - $last_page_posts) / $posts_per_page );
else $last_pageno = $total_count / $posts_per_page;
$last_page_link = get_site_url().'/medias/?pageno='.$last_pageno.'&cat_key='.$cat_key.'&y_key='.$y_key;

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
								<a href="<?php echo get_site_url().'/medias?y_key='.$year_cap; ?>" class="active_btn"><i class="fa fa-angle-left" aria-hidden="true"></i><?php echo ' '.$year_cap.'年'; ?></a>
							<?php else: ?>
								<a href="<?php echo get_site_url().'/medias?y_key='.$year_cap; ?>"><i class="fa fa-angle-left" aria-hidden="true"></i><?php echo ' '.$year_cap.'年'; ?></a>
							<?php endif; ?>
<?php endforeach; ?>
						</div>
					</div>
					<div class="media_box_sec">
						<div class="archive_box_sec_inner">
							<h5>メディア</h5>
<?php foreach($category_list as $cat_cap): ?>
							<?php if($cat_cap == $cat_key): ?>
								<a href="<?php echo get_site_url().'/medias?cat_key='.$cat_cap; ?>" class="active_btn"><i class="fa fa-angle-left" aria-hidden="true"></i><?php echo ' '.$cat_cap; ?></a>
							<?php else: ?>
								<a href="<?php echo get_site_url().'/medias?cat_key='.$cat_cap; ?>"><i class="fa fa-angle-left" aria-hidden="true"></i><?php echo ' '.$cat_cap; ?></a>
							<?php endif; ?>
<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>



</main><!-- #main -->
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.fancybox.js"></script>
<?php
get_footer();
