<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package luminouspa-new
 */
get_header();

$total_count = 0;
$posts_per_page = 20;
$pageno = 1;
if(isset($_GET['pageno'])) $pageno = $_GET['pageno'];
$search_key = array(
    'post_type' => 'therapist',
    'posts_per_page' => $posts_per_page,
    'paged' => $pageno,
);
$item_query = new WP_Query($search_key);
$total_count = $item_query->found_posts;
?>


<main id="primary" class="site-main">

<section class="therapist_inner_page_section">
	<div class="medium_custom_container">
		<div class="heading_text">
			<h5>THERAPISTS</h5>
			<p>セラピスト一覧</p>
		</div>
		<div class="schedule_image_box_sec">
			<div class="custom_row">
<?php
if($item_query->have_posts()) : 
	while ($item_query->have_posts()) : 
		$item_query->the_post();
		$loop_id = get_the_ID();
		$loop_tname = get_post_field( 'name', $loop_id );
		$loop_age = get_post_field( 'age', $loop_id );
		$loop_url = get_the_permalink();
		$loop_photo = get_post_field('therapist_img1', $loop_id);
		if(empty($loop_photo)) $loop_photo = get_stylesheet_directory_uri().'/images/noimage.jpg';
		$loop_twitter = get_post_field('twitter', $loop_id);
		$loop_twitter = str_replace('@', '', $loop_twitter);
		if(!empty($loop_twitter)) $loop_twitter = 'https://twitter.com/'.$loop_twitter;
		$dateTime = new DateTime();
		$schedule_list = [];
		$baseDateTime = $dateTime->format('Y-m-d H:i:s');
		$workDate = get_date_from_gmt($baseDateTime, 'Ymd');
		$open_hh = get_post_meta($loop_id, $workDate.'open_hh', true);
		$open_mi = get_post_meta($loop_id, $workDate.'open_mi', true);
		$close_hh = get_post_meta($loop_id, $workDate.'close_hh', true);
		$close_mi = get_post_meta($loop_id, $workDate.'close_mi', true);
		
		$month = get_date_from_gmt($baseDateTime, 'm') + 0;
		$day = get_date_from_gmt($baseDateTime, 'd') + 0;
		if(!empty($open_hh) && !empty($open_mi) && !empty($close_hh) && !empty($close_mi)) {
			$worktime = $open_hh.'：'.$open_mi.'～'.$close_hh.'：'.$close_mi;
		}
		else {
			$worktime = "-";
		}
?>

				<div class="custom_col_3 js_button" data-href="<?php echo $loop_url; ?>">
					<div class="schedule_image_box">
						<div class="schedule_image_box_image">
							<img src="<?php echo $loop_photo; ?>">
						</div>
<?php if(!empty($loop_twitter)) : ?>
						<a href="<?php echo $loop_twitter; ?>" class="twitter_btn"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/twitter.png"></a>
<?php endif; ?>
						<a href="#" class="schedule_btn light_purple"><?php echo $loop_tname.'('.$loop_age.')'; ?></a>
						<a href="#" class="schedule_btn dark_purple"><?php echo $worktime; ?></a>
					</div>
				</div>
<?php endwhile;
endif; ?>
			</div>
		</div>
<?php
$prev_pageno = 0;
$next_pageno = 0;
$prev_pageno = $pageno-1;
$next_pageno = $pageno+1;
$prev_page_link = get_site_url().'/therapist/?pageno='.$prev_pageno;
$next_page_link = get_site_url().'/therapist/?pageno='.$next_pageno;
if($total_count - ($next_pageno-1)*$posts_per_page <= 0) $next_pageno = 0;
?>
            <div class="pagination_sec">
                <div>
                    <ul>
                        <li>
<?php if($prev_pageno > 0): ?>
                            <a href="<?php echo $prev_page_link; ?>">戻る</a>
<?php endif; ?>
                            <a href="#"><?php echo $pageno; ?></a>
<?php if($next_pageno > 0): ?>
                            <a href="<?php echo $next_page_link; ?>">次へ</a>
<?php endif; ?>
                        </li>
                    </ul>
                </div>
            </div>
	</div>
</section>
	


</main><!-- #main -->

<?php
get_footer();
