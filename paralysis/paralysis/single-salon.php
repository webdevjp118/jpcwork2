<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package paralysis
 */

get_header();
?>
<main id="primary" class="site-main">
<?php
while ( have_posts() ) :
	the_post();
	$loop_id = get_the_ID();
	$loop_date = get_the_date('Y.m.d');
	$loop_title = get_the_title();
	$loop_permalink = get_the_permalink();
	$loop_category = get_the_category();
	$loop_catname = '未分類';
	$loop_image = "";
	if(count($loop_category) > 0) $loop_catname = $loop_category[0]->name;
	if (has_post_thumbnail( $loop_id )) {
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop_id ), 'single-post-thumbnail' );
		$loop_image = $image[0];
	}
	if(empty($loop_image)) $loop_image = get_stylesheet_directory_uri().'/images/noimage.jpg';
	$loop_salon_name = get_post_meta($loop_id, 'salon_name', true);
	$loop_phone_num = get_post_meta($loop_id, 'phone_num', true);
	$loop_address = get_post_meta($loop_id, 'address', true);
	$loop_access = get_post_meta($loop_id, 'access', true);
	$loop_parking = get_post_meta($loop_id, 'parking', true);
	$loop_open_time = get_post_meta($loop_id, 'open_time', true);
	$loop_off_day = get_post_meta($loop_id, 'off_day', true);
	$loop_home_page = get_post_meta($loop_id, 'home_page', true);
	$loop_area1 = get_post_meta($loop_id, 'area1', true);
	$loop_area2 = get_post_meta($loop_id, 'area2', true);
	$loop_area3 = get_post_meta($loop_id, 'area3', true);
?>
<section class="inner_page_banner">
	<h2 class="io fade">全国のサロンを探す</h2>
</section>
<section class="breadcrumb_section">
	<div class="custom_container">
		<ul>
			<li><a href="<?php echo get_site_url(); ?>">TOP</a></li>
			<li><a href="<?php echo get_site_url(); ?>/search">全国の麻痺施術サロンを探す</a></li>
<?php
	if(!empty($loop_area1)) {
		echo '<li><a href="'.get_site_url().'">'.$loop_area1.'</a></li>';
	}
?>
<?php
	if(!empty($loop_area2)) {
		echo '<li><a href="'.get_site_url().'">'.$loop_area2.'</a></li>';
	}
?>
<?php
	if(!empty($loop_area3)) {
		echo '<li><a href="'.get_site_url().'">'.$loop_area3.'</a></li>';
	}
?>
			<li><span><?php echo $loop_salon_name; ?></span></li>
		</ul>
	</div>
</section>
<section class="search_details_section">
	<div class="custom_container">
		<div class="search_details_card">
			<div class="search_details_card_header">
				<h3><?php echo $loop_salon_name; ?></h3>
				<span><?php echo get_full_area2($loop_area2).get_full_area3($loop_area3); ?></span>
			</div>
			<div class="search_details_card_body">
				<div class="inner_custom_container">
					<div class="inner_custom_row">
						<div class="custom_col_image io fade upS">
							<img src="<?php echo $loop_image; ?>" alt="search detail image">
						</div>
						<div class="custom_col_text io fade upS">
							<h4><?php echo $loop_title; ?></h4>
							<div class="pmhwp">
								<?php the_content(); ?>
							</div>
						</div>
					</div>
					<div class="shop_details_table io fade upS">
						<div class="shop_details_row">
							<div class="shop_details_head">
								<p>院名</p>
							</div>
							<div class="shop_details_data">
								<p><?php echo $loop_salon_name; ?></p>
							</div>
						</div>
						<div class="shop_details_row">
							<div class="shop_details_head">
								<p>電話番号</p>
							</div>
							<div class="shop_details_data">
								<p><a href="tel:<?php echo str_replace('-','',$loop_phone_num); ?>"><?php echo $loop_phone_num; ?></a></p>
							</div>
						</div>
						<div class="shop_details_row">
							<div class="shop_details_head">
								<p>住所</p>
							</div>
							<div class="shop_details_data">
								<p><?php echo $loop_address; ?></p>
							</div>
						</div>
						<div class="shop_details_row">
							<div class="shop_details_head">
								<p>交通手段</p>
							</div>
							<div class="shop_details_data">
								<p><?php echo $loop_access; ?></p>
							</div>
						</div>
						<div class="shop_details_row">
							<div class="shop_details_head">
								<p>駐車場</p>
							</div>
							<div class="shop_details_data">
								<p><?php echo $loop_parking; ?></p>
							</div>
						</div>
						<div class="shop_details_row">
							<div class="shop_details_head">
								<p>治療時間</p>
							</div>
							<div class="shop_details_data">
								<p><?php echo $loop_open_time; ?></p>
							</div>
						</div>
						<div class="shop_details_row">
							<div class="shop_details_head">
								<p>定休日</p>
							</div>
							<div class="shop_details_data">
								<p><?php echo $loop_off_day; ?></p>
							</div>
						</div>
						<div class="shop_details_row">
							<div class="shop_details_head">
								<p>ホームページ</p>
							</div>
							<div class="shop_details_data">
								<p><a target="_blank" href="<?php echo $loop_home_page; ?>"><?php echo $loop_home_page; ?></a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<a href="<?php echo get_site_url(); ?>/search" class="return_to_search_page io fade upS">検索画面に戻る</a>
	</div>
</section>
<?php
endwhile;
?>
</main><!-- #main -->
<?php
get_footer();
