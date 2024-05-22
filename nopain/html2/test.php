<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Ikenmen
 */

get_header();

global $shop_tag_dict;

?>


<?php

$ltype = "";
if(isset($_GET['type'])) $ltype = $_GET['type'];
$ltag = "";
if(isset($_GET['tag'])) $ltag = $_GET['tag'];
function get_params_url($ltype, $ltag) {
	$params_url = '?';
	if(empty($ltype) && empty($ltag)) {
		return '';
	}
	else if(!empty($ltype) && empty($ltag)) {
		return '?type='.$ltype.'';
	}
	else if(empty($ltype) && !empty($ltag)) {
		return '?tag='.$ltag.'';
	}
	else if(!empty($ltype) && !empty($ltag)) {
		return '?type='.$ltype.'&tag='.$ltag.'';
	}
	return '';
}

$area_id = -1;
$area_slug = '';
$area_title = '';
while ( have_posts() ) :
	the_post();
	$area_id = get_the_ID();
	$area_title = get_the_title();
	$area_post = get_post($area_id);
	$area_slug = $area_post->post_name;
endwhile;
if(empty($area_slug)) $area_slug = 'all';
$area_name = get_area_name($area_slug);
if(empty($area_name)) $area_name = '全国';

$area_deep = get_area_deep($area_slug);
$area_deep_length = count($area_deep);
$sub_areas = get_sub_area($area_deep);
if($area_slug == 'all') $sub_areas = $jp_area_dict;

if($area_deep_length > 0) {
	if($ltype == 'ranking') {
		$main_filter = array(
			'relation' => 'OR',
			array(
				'key' => 'area_sub'.$area_deep_length,
				'value' => $area_deep[$area_deep_length-1],
				'compare' => '=',
			)
		);
		$main_key = array(
			'post_type' => 'shop',
			// 'author' => $user_id,
			'meta_query' => $main_filter,
			'posts_per_page' => -1,
			'orderby' => 'meta_value_num',
			'meta_key' => 'rank_points',
		);
	}
	else {
		$main_filter = array(
			'relation' => 'OR',
			array(
				'key' => 'area_sub'.$area_deep_length,
				'value' => $area_deep[$area_deep_length-1],
				'compare' => '=',
			)
		);
		$main_key = array(
			'post_type' => 'shop',
			// 'author' => $user_id,
			'meta_query' => $main_filter,
			'posts_per_page' => -1,
			'order' => 'ASC',
			'orderby' => 'meta_value_num',
			'meta_key' => 'shop_order',
		);
	}
}
else {
	if($ltype == 'ranking') {
		$main_key = array(
			'post_type' => 'shop',
			// 'author' => $user_id,
			'posts_per_page' => -1,
			'orderby' => 'meta_value_num',
			'meta_key' => 'rank_points',
		);
	}
	else {
		$main_key = array(
			'post_type' => 'shop',
			// 'author' => $user_id,
			'posts_per_page' => -1,
			'orderby' => 'meta_value_num',
			'meta_key' => 'shop_order',
			'order' => 'ASC',
		);
	}
}
$main_query = new WP_Query($main_key);
$shop_ids  = [];
$pickup_ids = [];
$newshop_ids = [];
if($main_query->have_posts()) :
	while ($main_query->have_posts()) :
		$main_query->the_post();
		$loop_id = get_the_id();
		$loop_shop_tagstr = get_post_meta($loop_id, 'shop_tags', true);
		$loop_shop_tags = [];
		if(!empty($loop_shop_tagstr)) $loop_shop_tags = explode(',',$loop_shop_tagstr);
		if(!empty($ltag)) {
			if(in_array($ltag, $loop_shop_tags)) array_push($shop_ids, $loop_id);
		}
		else {
			array_push($shop_ids, $loop_id);
		}
		if(get_post_meta($loop_id, 'pickup', true) == "pickup") {
			array_push($pickup_ids, $loop_id);
		}
		if(get_post_meta($loop_id, 'newshop', true) == "newshop") {
			array_push($newshop_ids, $loop_id);
		}
	endwhile;
endif;
shuffle($pickup_ids);
if(count($pickup_ids) > 0) $pickup_ids = [$pickup_ids[0]];
?>

<section class="breadcrumb_section border_bottom">
	<div class="custom_container">
		<ul>
			<li>
				<a href="<?php echo get_site_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home.svg" alt="home icon">ホーム</a>
			</li>
<?php 
if(count($area_deep) > 0) :
	for($i=0;$i<count($area_deep);$i++) { 
		$breadcrum = get_area_name($area_deep[$i]);
		if($i==0) $breadcrum = $breadcrum."エリアのレディースエステ";
		else $breadcrum = $breadcrum."のレディースエステ";
?>
			<li>
				<a href="<?php echo get_site_url(); ?>/<?php echo $area_deep[$i]; ?>/"><?php echo $breadcrum; ?></a>
			</li>
<?php
	}
else:
?>
			<li>
				<a href="#">全国のレディースエステ</a>
			</li>
<?php
endif; 
?>
		</ul>
	</div>
</section>
<section class="shop_details_banner_section">
	<div class="custom_container">
		<div class="custom_row">
			<div class="custom_col_9">
				<div class="main_body_content">
					<div class="ladies_beauty_treatment_salon_container">
						<div class="ladies_beauty_treatment_salon_content">
							<div class="ladies_beauty_treatment_salon_text">
								<h3 class="page_title"><?php echo $area_title; ?></h3>
								<p>イケメンセラピ.comでは男性セラピストによる、<br>アロマエステやオイルマッサージ店を紹介しています。<br>ぜひ、お気に入りのレディースエステ店を見つけてください。</p>
							</div>
						</div>
					</div>
					<div class="pickup_recommended_store_content_container">
						<div class="full_width_title_with_bg">
							<h3><span>PICK UP</span>イチオシ店舗</h3>
						</div>
<!-- Pickup list start -->
<?php
for($i=0;$i<count($pickup_ids);$i++) {
	$loop_id = $pickup_ids[$i];
	$loop_url = get_permalink($loop_id);
	$loop_banner = get_post_meta($loop_id, 'shop_banner', true);
	$loop_title = get_the_title($loop_id);
	$loop_desc = get_post_meta($loop_id, 'desc', true);
	$loop_access = get_post_meta($loop_id, 'access', true);
	$loop_phone_num1 = get_post_meta($loop_id, 'phone_num1', true);
	$loop_phone_num2 = get_post_meta($loop_id, 'phone_num2', true);
	$loop_phone_num3 = get_post_meta($loop_id, 'phone_num3', true);
	$loop_phone_num = $loop_phone_num1.$loop_phone_num2.$loop_phone_num3;
	$loop_phone_num_text = $loop_phone_num1.'-'.$loop_phone_num2.'-'.$loop_phone_num3;
	$loop_shop_open = get_post_meta($loop_id, 'shop_open_time', true);
	$loop_shop_close = get_post_meta($loop_id, 'shop_close_time', true);
	$loop_shop_tagstr = get_post_meta($loop_id, 'shop_tags', true);
	$loop_like_state = get_kaction_state($loop_id, 'like');
	$loop_shop_homepage =  get_post_meta($loop_id, 'home_page_link', true);
	$loop_shop_tags = [];
	if(!empty($loop_shop_tagstr)) $loop_shop_tags = explode(',',$loop_shop_tagstr);
?>
<div class="shoplist_item">
	<div class="shoplist_img">
		<img class="js_button" data-href="<?php echo $loop_shop_homepage; ?>" src="<?php echo $loop_banner; ?>" alt="store image">
	</div>
	<div class="shoplist_titlerow">
		<div class="shoplist_ranking no_ranking" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/rank1.png)">1</div>
		<div class="shoplist_title">
			<a href="<?php echo $loop_url; ?>"><?php echo $loop_title; ?></a>
		</div>
	</div>
	<div class="shoplist_contentrow">
		<div class="shoplist_content">
			<p><?php echo $loop_desc; ?></p>
			<p>アクセス：<?php echo $loop_access; ?></p>
			<p>営業時間：<?php echo $loop_shop_open; ?>〜<?php echo $loop_shop_close; ?></p>
		</div>
		<div class="shoplist_actions">
			<div class="shoplist_tags">
<?php
	for($j=0;$j<count($loop_shop_tags);$j++) {
		echo '<span class="js_button" data-href="#">'.$loop_shop_tags[$j].'</span>';
	}
?>
			</div>
			<div class="shoplist_btns">
				<div class="shoplist_btns_row">
					<a class="shoplist_phone_btn" href="tel:<?php echo $loop_phone_num; ?>"><i class="fa fa-phone" aria-hidden="true"></i><?php echo $loop_phone_num_text; ?></a>
				</div>
				<div class="shoplist_btns_row">
					<div class="shoplist_btns_col">
						<a class="<?php echo $loop_like_state?'action-btn '.'liked':'action-btn'; ?>" href="#" data-tid="<?php echo $loop_id; ?>" data-ktype="like">
							<svg xmlns="http://www.w3.org/2000/svg" width="21.875" height="20.269" viewBox="0 0 21.875 20.269"><path id="Icon_ionic-md-heart" data-name="Icon ionic-md-heart" d="M13.812,23.769,12.3,22.4c-5.375-4.935-8.924-8.138-8.924-12.128A5.676,5.676,0,0,1,9.116,4.5a6.175,6.175,0,0,1,4.7,2.205,6.174,6.174,0,0,1,4.7-2.205,5.676,5.676,0,0,1,5.741,5.776c0,3.99-3.549,7.193-8.924,12.128Z" transform="translate(-2.875 -4)" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path></svg>
							<span><?php echo $loop_like_state?'お気に入り解除':'お気に入り追加'; ?></span>
						</a>
					</div>
					<div class="shoplist_btns_col">
						<a href="<?php echo $loop_url; ?>" class="">
							詳細を見る<i class="fa fa-angle-double-right" aria-hidden="true"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
}
?>
<!-- Pickup list end -->
					</div>
					<div class="new_store_list_content_container">
						<div class="full_width_title_with_bg">
							<h3><span>NEW</span>新着レディースエステ店</h3>
						</div>
						<div class="new_store_list_content">
							<div class="new_store_list_table">
<?php
for($i=0;$i<count($newshop_ids);$i++) {
	$loop_id = $newshop_ids[$i];
	$loop_url = get_permalink($loop_id);
	$loop_date = get_the_date( 'Y.m.d', $post_id );
	$loop_title = get_the_title($loop_id);
	$loop_newshop_address = get_post_meta($loop_id, 'newshop_address', true);
	$loop_show_line1 = $loop_date;
	if(!empty($loop_newshop_address)) $loop_show_line1 = $loop_show_line1.' 【'.$loop_newshop_address.'】';
	$loop_show_line2 = "";
	if(!empty($loop_title)) $loop_show_line2 = '『'.$loop_title.'』様の店舗情報を掲載';
?>
									<div class="new_store_table_row js_button" data-href="<?php echo $loop_url; ?>">
										<div class="new_store_table_head">
											<p><?php echo $loop_show_line1; ?></p>
										</div>
										<div class="new_store_table_data">
											<p><?php echo $loop_show_line2; ?></p>
										</div>
									</div>
<?php
}
?>
							</div>
						</div>
					</div>
					<div style="content:'';height:20px; width:100%"></div>
					<div class="shop_list_content_container">
						<div class="full_width_title_with_bg">
							<h3>
								<span><?php echo ($ltype=='ranking')?'RANKING':'SHOP LIST'; ?></span>
								<?php echo ($ltype=='ranking')?'北海道エリアレディースエステランキング':'北海道エリアレディースエステ店舗一覧'; ?></h3>
						</div>
						<div class="shop_list_sorting_content">
							<div class="sorting_options">
								<ul>
									<li><p>並び替え</p></li>
<?php if($ltype == 'ranking'): ?>
									<li><a href="<?php echo get_site_url().'/'.$area_slug.'/'; ?>" class="publication_order">掲載順</a></li>
									<li><a href="#" class="sort_active ranking_order">ランキング</a></li>
<?php else: ?>
									<li><a href="#" class="sort_active publication_order">掲載順</a></li>
									<li><a href="<?php echo get_site_url().'/'.$area_slug.'/?type=ranking'; ?>" class="ranking_order">ランキング</a></li>
<?php endif; ?>
									
								</ul>
							</div>
							<div class="other_filters_options">
							<?php

if(count($sub_areas) > 0):
?>
								<div class="filter_by_options">
									<p>エリアで絞り込む</p>
									<ul>
<?php 
for($i=0;$i<count($sub_areas);$i++) {
	echo '<li><a href="'.get_site_url().'/'.$sub_areas[$i]['key'].'/">'.$sub_areas[$i]['name'].'</a></li>';
}
?>
									</ul>
								</div>
<?php 
endif;
?>
								<div class="filter_by_options">
									<p>タグで絞り込む</p>
									<ul>
									<?php
for($i=0;$i<count($shop_tag_dict);$i++) {
	echo '<li><a href="'.get_site_url().'/'.$area_slug.'/'.get_params_url($ltype, $shop_tag_dict[$i]).'">'.$shop_tag_dict[$i].'</a></li>';
}
?>
									</ul>
								</div>
							</div>
						</div>
						<div class="full_width_tab_content_title">
							<h6><?php echo ($ltype=='ranking')?'ランキング':'掲載順'; ?></h6>
						</div>
						<div class="shop_list_store">
<!-- shop list start -->
<?php
for($i=0;$i<count($shop_ids);$i++) {
	$loop_id = $shop_ids[$i];
	$loop_url = get_permalink($loop_id);
	$loop_banner = get_post_meta($loop_id, 'shop_banner', true);
	$loop_title = get_the_title($loop_id);
	$loop_desc = get_post_meta($loop_id, 'desc', true);
	$text = "Some context";
	$desc_limit = 135;
	$more_char = "&hellip;";
	$loop_desc = wp_trim_words( $loop_desc, $desc_limit, $more_char );

	$loop_access = get_post_meta($loop_id, 'access', true);
	$loop_phone_num1 = get_post_meta($loop_id, 'phone_num1', true);
	$loop_phone_num2 = get_post_meta($loop_id, 'phone_num2', true);
	$loop_phone_num3 = get_post_meta($loop_id, 'phone_num3', true);
	$loop_phone_num = $loop_phone_num1.$loop_phone_num2.$loop_phone_num3;
	$loop_phone_num_text = $loop_phone_num1.'-'.$loop_phone_num2.'-'.$loop_phone_num3;
	$loop_shop_open = get_post_meta($loop_id, 'shop_open_time', true);
	$loop_shop_close = get_post_meta($loop_id, 'shop_close_time', true);
	$loop_like_state = get_kaction_state($loop_id, 'like');
	$loop_shop_homepage =  get_post_meta($loop_id, 'home_page_link', true);
	$loop_shop_tagstr = get_post_meta($loop_id, 'shop_tags', true);
	$loop_shop_tags = [];
	if(!empty($loop_shop_tagstr)) $loop_shop_tags = explode(',',$loop_shop_tagstr);
	$loop_rank_classes = "shoplist_ranking no_ranking";
	if($ltype == 'ranking') $loop_rank_classes = "shoplist_ranking";
	$loop_rank_text = $i+1;
	$loop_rank_icon = get_stylesheet_directory_uri().'/images/rank'.($i+1).'.png';
	if($i > 2) {
		$loop_rank_text = $loop_rank_text.'位';
		$loop_rank_icon = get_stylesheet_directory_uri().'/images/rank4.png';
	}
?>
<div class="shoplist_item">
	<div class="shoplist_img">
		<img class="js_button" data-href="<?php echo $loop_shop_homepage; ?>" src="<?php echo $loop_banner; ?>" alt="store image">
	</div>
	<div class="shoplist_titlerow">
		<div class="<?php echo $loop_rank_classes; ?>" style="background-image: url(<?php echo $loop_rank_icon; ?>)"><?php echo $loop_rank_text; ?></div>
		<div class="shoplist_title">
			<a href="<?php echo $loop_url; ?>"><?php echo $loop_title; ?><span class="fake_favorite"></span></a>
			<div class="<?php echo $loop_like_state?'shoplist_title_favorite action-btn '.'liked':'shoplist_title_favorite action-btn'; ?>" data-tid="<?php echo $loop_id; ?>" data-ktype="like">
				<svg xmlns="http://www.w3.org/2000/svg" width="21.875" height="20.269" viewBox="0 0 21.875 20.269"><path id="Icon_ionic-md-heart" data-name="Icon ionic-md-heart" d="M13.812,23.769,12.3,22.4c-5.375-4.935-8.924-8.138-8.924-12.128A5.676,5.676,0,0,1,9.116,4.5a6.175,6.175,0,0,1,4.7,2.205,6.174,6.174,0,0,1,4.7-2.205,5.676,5.676,0,0,1,5.741,5.776c0,3.99-3.549,7.193-8.924,12.128Z" transform="translate(-2.875 -4)" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path></svg>
			</div>
		</div>
	</div>
	<div class="shoplist_contentrow">
		<div class="shoplist_content">
			<p><?php echo $loop_desc; ?></p>
		</div>
		<div class="shoplist_actions">
			<div class="shoplist_access">
				<p><?php echo $loop_access; ?></p>
				<p>営業時間：<?php echo $loop_shop_open; ?>〜<?php echo $loop_shop_close; ?></p>
			</div>
			<div class="shoplist_tags">
<?php
	for($j=0;$j<count($loop_shop_tags);$j++) {
		echo '<span class="js_button" data-href="#">'.$loop_shop_tags[$j].'</span>';
	}
?>
			</div>
			<div class="shoplist_btns">
				<a href="tel:<?php echo $loop_phone_num; ?>"><?php echo $loop_phone_num_text; ?></a>
				<a href="<?php echo $loop_url; ?>" class="">詳細を見る</a>
			</div>
		</div>
	</div>
</div>
<?php 
}
?>
<!-- shop list end -->
						</div>
						<div class="shop_list_sorting_content">
							<div class="sorting_options">
								<ul>
									<li><p>並び替え</p></li>
<?php if($ltype == 'ranking'): ?>
									<li><a href="<?php echo get_site_url().'/'.$area_slug.'/'; ?>" class="publication_order">掲載順</a></li>
									<li><a href="#" class="sort_active ranking_order">ランキング</a></li>
<?php else: ?>
									<li><a href="#" class="sort_active publication_order">掲載順</a></li>
									<li><a href="<?php echo get_site_url().'/'.$area_slug.'/?type=ranking'; ?>" class="ranking_order">ランキング</a></li>
<?php endif; ?>
								</ul>
							</div>
							<div class="other_filters_options">
<?php
if(count($sub_areas) > 0):
?>
								<div class="filter_by_options">
									<p>エリアで絞り込む</p>
									<ul>
<?php 
for($i=0;$i<count($sub_areas);$i++) {
	echo '<li><a href="'.get_site_url().'/'.$sub_areas[$i]['key'].'/">'.$sub_areas[$i]['name'].'</a></li>';
}
?>
									</ul>
								</div>
<?php 
endif;
?>
								<div class="filter_by_options">
									<p>タグで絞り込む</p>
									<ul>
<?php
for($i=0;$i<count($shop_tag_dict);$i++) {
	echo '<li><a href="'.get_site_url().'/'.$area_slug.'/'.get_params_url($ltype, $shop_tag_dict[$i]).'">'.$shop_tag_dict[$i].'</a></li>';
}
?>
									</ul>
								</div>
							</div>
						</div>
						<a href="<?php echo get_site_url(); ?>/contact-paid/" class="listed_stores_button"><span>掲載店舗募集中</span></a>
					</div>
<?php echo_area_links_bottom(); ?>
					<div class="column_image_container">
						<div class="full_width_title_with_bg_image">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_white.svg" alt="logo image">
							<h3><span>COLUMN</span>コラム</h3>
						</div>
					</div>
				</div>
			</div>
<?php echo_area_links_side(); ?>
		</div>
	</div>
</section>
<section class="breadcrumb_section border_top">
	<div class="custom_container">
		<ul>
			<li>
				<a href="<?php echo get_site_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home.svg" alt="home icon">ホーム</a>
			</li>
<?php 
if(count($area_deep) > 0) :
	for($i=0;$i<count($area_deep);$i++) { 
		$breadcrum = get_area_name($area_deep[$i]);
		if($i==0) $breadcrum = $breadcrum."エリアのレディースエステ";
		else $breadcrum = $breadcrum."のレディースエステ";
?>
			<li>
				<a href="<?php echo get_site_url(); ?>/<?php echo $area_deep[$i]; ?>/"><?php echo $breadcrum; ?></a>
			</li>
<?php
	}
else:
?>
			<li>
				<a href="#">全国のレディースエステ</a>
			</li>
<?php
endif; 
?>
		</ul>
	</div>
</section>


<?php
get_footer();
<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Ikenmen
 */

get_header();

global $shop_tag_dict;

?>


<?php

$ltype = "";
if(isset($_GET['type'])) $ltype = $_GET['type'];
$ltag = "";
if(isset($_GET['tag'])) $ltag = $_GET['tag'];
function get_params_url($ltype, $ltag) {
	$params_url = '?';
	if(empty($ltype) && empty($ltag)) {
		return '';
	}
	else if(!empty($ltype) && empty($ltag)) {
		return '?type='.$ltype.'';
	}
	else if(empty($ltype) && !empty($ltag)) {
		return '?tag='.$ltag.'';
	}
	else if(!empty($ltype) && !empty($ltag)) {
		return '?type='.$ltype.'&tag='.$ltag.'';
	}
	return '';
}

$area_id = -1;
$area_slug = '';
$area_title = '';
while ( have_posts() ) :
	the_post();
	$area_id = get_the_ID();
	$area_title = get_the_title();
	$area_post = get_post($area_id);
	$area_slug = $area_post->post_name;
endwhile;
if(empty($area_slug)) $area_slug = 'all';
$area_name = get_area_name($area_slug);
if(empty($area_name)) $area_name = '全国';

$area_deep = get_area_deep($area_slug);
$area_deep_length = count($area_deep);
$sub_areas = get_sub_area($area_deep);
if($area_slug == 'all') $sub_areas = $jp_area_dict;

if($area_deep_length > 0) {
	if($ltype == 'ranking') {
		$main_filter = array(
			'relation' => 'OR',
			array(
				'key' => 'area_sub'.$area_deep_length,
				'value' => $area_deep[$area_deep_length-1],
				'compare' => '=',
			)
		);
		$main_key = array(
			'post_type' => 'shop',
			// 'author' => $user_id,
			'meta_query' => $main_filter,
			'posts_per_page' => -1,
			'orderby' => 'meta_value_num',
			'meta_key' => 'rank_points',
		);
	}
	else {
		$main_filter = array(
			'relation' => 'OR',
			array(
				'key' => 'area_sub'.$area_deep_length,
				'value' => $area_deep[$area_deep_length-1],
				'compare' => '=',
			)
		);
		$main_key = array(
			'post_type' => 'shop',
			// 'author' => $user_id,
			'meta_query' => $main_filter,
			'posts_per_page' => -1,
			'order' => 'ASC',
			'orderby' => 'meta_value_num',
			'meta_key' => 'shop_order',
		);
	}
}
else {
	if($ltype == 'ranking') {
		$main_key = array(
			'post_type' => 'shop',
			// 'author' => $user_id,
			'posts_per_page' => -1,
			'orderby' => 'meta_value_num',
			'meta_key' => 'rank_points',
		);
	}
	else {
		$main_key = array(
			'post_type' => 'shop',
			// 'author' => $user_id,
			'posts_per_page' => -1,
			'orderby' => 'meta_value_num',
			'meta_key' => 'shop_order',
			'order' => 'ASC',
		);
	}
}
$main_query = new WP_Query($main_key);
$shop_ids  = [];
$pickup_ids = [];
$newshop_ids = [];
if($main_query->have_posts()) :
	while ($main_query->have_posts()) :
		$main_query->the_post();
		$loop_id = get_the_id();
		$loop_shop_tagstr = get_post_meta($loop_id, 'shop_tags', true);
		$loop_shop_tags = [];
		if(!empty($loop_shop_tagstr)) $loop_shop_tags = explode(',',$loop_shop_tagstr);
		if(!empty($ltag)) {
			if(in_array($ltag, $loop_shop_tags)) array_push($shop_ids, $loop_id);
		}
		else {
			array_push($shop_ids, $loop_id);
		}
		if(get_post_meta($loop_id, 'pickup', true) == "pickup") {
			array_push($pickup_ids, $loop_id);
		}
		if(get_post_meta($loop_id, 'newshop', true) == "newshop") {
			array_push($newshop_ids, $loop_id);
		}
	endwhile;
endif;
shuffle($pickup_ids);
if(count($pickup_ids) > 0) $pickup_ids = [$pickup_ids[0]];
?>

<section class="breadcrumb_section border_bottom">
	<div class="custom_container">
		<ul>
			<li>
				<a href="<?php echo get_site_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home.svg" alt="home icon">ホーム</a>
			</li>
<?php 
if(count($area_deep) > 0) :
	for($i=0;$i<count($area_deep);$i++) { 
		$breadcrum = get_area_name($area_deep[$i]);
		if($i==0) $breadcrum = $breadcrum."エリアのレディースエステ";
		else $breadcrum = $breadcrum."のレディースエステ";
?>
			<li>
				<a href="<?php echo get_site_url(); ?>/<?php echo $area_deep[$i]; ?>/"><?php echo $breadcrum; ?></a>
			</li>
<?php
	}
else:
?>
			<li>
				<a href="#">全国のレディースエステ</a>
			</li>
<?php
endif; 
?>
		</ul>
	</div>
</section>
<section class="shop_details_banner_section">
	<div class="custom_container">
		<div class="custom_row">
			<div class="custom_col_9">
				<div class="main_body_content">
					<div class="ladies_beauty_treatment_salon_container">
						<div class="ladies_beauty_treatment_salon_content">
							<div class="ladies_beauty_treatment_salon_text">
								<h3 class="page_title"><?php echo $area_title; ?></h3>
								<p>イケメンセラピ.comでは男性セラピストによる、<br>アロマエステやオイルマッサージ店を紹介しています。<br>ぜひ、お気に入りのレディースエステ店を見つけてください。</p>
							</div>
						</div>
					</div>
					<div class="pickup_recommended_store_content_container">
						<div class="full_width_title_with_bg">
							<h3><span>PICK UP</span>イチオシ店舗</h3>
						</div>
<!-- Pickup list start -->
<?php
for($i=0;$i<count($pickup_ids);$i++) {
	$loop_id = $pickup_ids[$i];
	$loop_url = get_permalink($loop_id);
	$loop_banner = get_post_meta($loop_id, 'shop_banner', true);
	$loop_title = get_the_title($loop_id);
	$loop_desc = get_post_meta($loop_id, 'desc', true);
	$loop_access = get_post_meta($loop_id, 'access', true);
	$loop_phone_num1 = get_post_meta($loop_id, 'phone_num1', true);
	$loop_phone_num2 = get_post_meta($loop_id, 'phone_num2', true);
	$loop_phone_num3 = get_post_meta($loop_id, 'phone_num3', true);
	$loop_phone_num = $loop_phone_num1.$loop_phone_num2.$loop_phone_num3;
	$loop_phone_num_text = $loop_phone_num1.'-'.$loop_phone_num2.'-'.$loop_phone_num3;
	$loop_shop_open = get_post_meta($loop_id, 'shop_open_time', true);
	$loop_shop_close = get_post_meta($loop_id, 'shop_close_time', true);
	$loop_shop_tagstr = get_post_meta($loop_id, 'shop_tags', true);
	$loop_like_state = get_kaction_state($loop_id, 'like');
	$loop_shop_homepage =  get_post_meta($loop_id, 'home_page_link', true);
	$loop_shop_tags = [];
	if(!empty($loop_shop_tagstr)) $loop_shop_tags = explode(',',$loop_shop_tagstr);
?>
<div class="shoplist_item">
	<div class="shoplist_img">
		<img class="js_button" data-href="<?php echo $loop_shop_homepage; ?>" src="<?php echo $loop_banner; ?>" alt="store image">
	</div>
	<div class="shoplist_titlerow">
		<div class="shoplist_ranking no_ranking" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/rank1.png)">1</div>
		<div class="shoplist_title">
			<a href="<?php echo $loop_url; ?>"><?php echo $loop_title; ?></a>
		</div>
	</div>
	<div class="shoplist_contentrow">
		<div class="shoplist_content">
			<p><?php echo $loop_desc; ?></p>
			<p>アクセス：<?php echo $loop_access; ?></p>
			<p>営業時間：<?php echo $loop_shop_open; ?>〜<?php echo $loop_shop_close; ?></p>
		</div>
		<div class="shoplist_actions">
			<div class="shoplist_tags">
<?php
	for($j=0;$j<count($loop_shop_tags);$j++) {
		echo '<span class="js_button" data-href="#">'.$loop_shop_tags[$j].'</span>';
	}
?>
			</div>
			<div class="shoplist_btns">
				<div class="shoplist_btns_row">
					<a class="shoplist_phone_btn" href="tel:<?php echo $loop_phone_num; ?>"><i class="fa fa-phone" aria-hidden="true"></i><?php echo $loop_phone_num_text; ?></a>
				</div>
				<div class="shoplist_btns_row">
					<div class="shoplist_btns_col">
						<a class="<?php echo $loop_like_state?'action-btn '.'liked':'action-btn'; ?>" href="#" data-tid="<?php echo $loop_id; ?>" data-ktype="like">
							<svg xmlns="http://www.w3.org/2000/svg" width="21.875" height="20.269" viewBox="0 0 21.875 20.269"><path id="Icon_ionic-md-heart" data-name="Icon ionic-md-heart" d="M13.812,23.769,12.3,22.4c-5.375-4.935-8.924-8.138-8.924-12.128A5.676,5.676,0,0,1,9.116,4.5a6.175,6.175,0,0,1,4.7,2.205,6.174,6.174,0,0,1,4.7-2.205,5.676,5.676,0,0,1,5.741,5.776c0,3.99-3.549,7.193-8.924,12.128Z" transform="translate(-2.875 -4)" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path></svg>
							<span><?php echo $loop_like_state?'お気に入り解除':'お気に入り追加'; ?></span>
						</a>
					</div>
					<div class="shoplist_btns_col">
						<a href="<?php echo $loop_url; ?>" class="">
							詳細を見る<i class="fa fa-angle-double-right" aria-hidden="true"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
}
?>
<!-- Pickup list end -->
					</div>
					<div class="new_store_list_content_container">
						<div class="full_width_title_with_bg">
							<h3><span>NEW</span>新着レディースエステ店</h3>
						</div>
						<div class="new_store_list_content">
							<div class="new_store_list_table">
<?php
for($i=0;$i<count($newshop_ids);$i++) {
	$loop_id = $newshop_ids[$i];
	$loop_url = get_permalink($loop_id);
	$loop_date = get_the_date( 'Y.m.d', $post_id );
	$loop_title = get_the_title($loop_id);
	$loop_newshop_address = get_post_meta($loop_id, 'newshop_address', true);
	$loop_show_line1 = $loop_date;
	if(!empty($loop_newshop_address)) $loop_show_line1 = $loop_show_line1.' 【'.$loop_newshop_address.'】';
	$loop_show_line2 = "";
	if(!empty($loop_title)) $loop_show_line2 = '『'.$loop_title.'』様の店舗情報を掲載';
?>
									<div class="new_store_table_row js_button" data-href="<?php echo $loop_url; ?>">
										<div class="new_store_table_head">
											<p><?php echo $loop_show_line1; ?></p>
										</div>
										<div class="new_store_table_data">
											<p><?php echo $loop_show_line2; ?></p>
										</div>
									</div>
<?php
}
?>
							</div>
						</div>
					</div>
					<div style="content:'';height:20px; width:100%"></div>
					<div class="shop_list_content_container">
						<div class="full_width_title_with_bg">
							<h3>
								<span><?php echo ($ltype=='ranking')?'RANKING':'SHOP LIST'; ?></span>
								<?php echo ($ltype=='ranking')?'北海道エリアレディースエステランキング':'北海道エリアレディースエステ店舗一覧'; ?></h3>
						</div>
						<div class="shop_list_sorting_content">
							<div class="sorting_options">
								<ul>
									<li><p>並び替え</p></li>
<?php if($ltype == 'ranking'): ?>
									<li><a href="<?php echo get_site_url().'/'.$area_slug.'/'; ?>" class="publication_order">掲載順</a></li>
									<li><a href="#" class="sort_active ranking_order">ランキング</a></li>
<?php else: ?>
									<li><a href="#" class="sort_active publication_order">掲載順</a></li>
									<li><a href="<?php echo get_site_url().'/'.$area_slug.'/?type=ranking'; ?>" class="ranking_order">ランキング</a></li>
<?php endif; ?>
									
								</ul>
							</div>
							<div class="other_filters_options">
							<?php

if(count($sub_areas) > 0):
?>
								<div class="filter_by_options">
									<p>エリアで絞り込む</p>
									<ul>
<?php 
for($i=0;$i<count($sub_areas);$i++) {
	echo '<li><a href="'.get_site_url().'/'.$sub_areas[$i]['key'].'/">'.$sub_areas[$i]['name'].'</a></li>';
}
?>
									</ul>
								</div>
<?php 
endif;
?>
								<div class="filter_by_options">
									<p>タグで絞り込む</p>
									<ul>
									<?php
for($i=0;$i<count($shop_tag_dict);$i++) {
	echo '<li><a href="'.get_site_url().'/'.$area_slug.'/'.get_params_url($ltype, $shop_tag_dict[$i]).'">'.$shop_tag_dict[$i].'</a></li>';
}
?>
									</ul>
								</div>
							</div>
						</div>
						<div class="full_width_tab_content_title">
							<h6><?php echo ($ltype=='ranking')?'ランキング':'掲載順'; ?></h6>
						</div>
						<div class="shop_list_store">
<!-- shop list start -->
<?php
for($i=0;$i<count($shop_ids);$i++) {
	$loop_id = $shop_ids[$i];
	$loop_url = get_permalink($loop_id);
	$loop_banner = get_post_meta($loop_id, 'shop_banner', true);
	$loop_title = get_the_title($loop_id);
	$loop_desc = get_post_meta($loop_id, 'desc', true);
	$text = "Some context";
	$desc_limit = 135;
	$more_char = "&hellip;";
	$loop_desc = wp_trim_words( $loop_desc, $desc_limit, $more_char );

	$loop_access = get_post_meta($loop_id, 'access', true);
	$loop_phone_num1 = get_post_meta($loop_id, 'phone_num1', true);
	$loop_phone_num2 = get_post_meta($loop_id, 'phone_num2', true);
	$loop_phone_num3 = get_post_meta($loop_id, 'phone_num3', true);
	$loop_phone_num = $loop_phone_num1.$loop_phone_num2.$loop_phone_num3;
	$loop_phone_num_text = $loop_phone_num1.'-'.$loop_phone_num2.'-'.$loop_phone_num3;
	$loop_shop_open = get_post_meta($loop_id, 'shop_open_time', true);
	$loop_shop_close = get_post_meta($loop_id, 'shop_close_time', true);
	$loop_like_state = get_kaction_state($loop_id, 'like');
	$loop_shop_homepage =  get_post_meta($loop_id, 'home_page_link', true);
	$loop_shop_tagstr = get_post_meta($loop_id, 'shop_tags', true);
	$loop_shop_tags = [];
	if(!empty($loop_shop_tagstr)) $loop_shop_tags = explode(',',$loop_shop_tagstr);
	$loop_rank_classes = "shoplist_ranking no_ranking";
	if($ltype == 'ranking') $loop_rank_classes = "shoplist_ranking";
	$loop_rank_text = $i+1;
	$loop_rank_icon = get_stylesheet_directory_uri().'/images/rank'.($i+1).'.png';
	if($i > 2) {
		$loop_rank_text = $loop_rank_text.'位';
		$loop_rank_icon = get_stylesheet_directory_uri().'/images/rank4.png';
	}
?>
<div class="shoplist_item">
	<div class="shoplist_img">
		<img class="js_button" data-href="<?php echo $loop_shop_homepage; ?>" src="<?php echo $loop_banner; ?>" alt="store image">
	</div>
	<div class="shoplist_titlerow">
		<div class="<?php echo $loop_rank_classes; ?>" style="background-image: url(<?php echo $loop_rank_icon; ?>)"><?php echo $loop_rank_text; ?></div>
		<div class="shoplist_title">
			<a href="<?php echo $loop_url; ?>"><?php echo $loop_title; ?><span class="fake_favorite"></span></a>
			<div class="<?php echo $loop_like_state?'shoplist_title_favorite action-btn '.'liked':'shoplist_title_favorite action-btn'; ?>" data-tid="<?php echo $loop_id; ?>" data-ktype="like">
				<svg xmlns="http://www.w3.org/2000/svg" width="21.875" height="20.269" viewBox="0 0 21.875 20.269"><path id="Icon_ionic-md-heart" data-name="Icon ionic-md-heart" d="M13.812,23.769,12.3,22.4c-5.375-4.935-8.924-8.138-8.924-12.128A5.676,5.676,0,0,1,9.116,4.5a6.175,6.175,0,0,1,4.7,2.205,6.174,6.174,0,0,1,4.7-2.205,5.676,5.676,0,0,1,5.741,5.776c0,3.99-3.549,7.193-8.924,12.128Z" transform="translate(-2.875 -4)" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path></svg>
			</div>
		</div>
	</div>
	<div class="shoplist_contentrow">
		<div class="shoplist_content">
			<p><?php echo $loop_desc; ?></p>
		</div>
		<div class="shoplist_actions">
			<div class="shoplist_access">
				<p><?php echo $loop_access; ?></p>
				<p>営業時間：<?php echo $loop_shop_open; ?>〜<?php echo $loop_shop_close; ?></p>
			</div>
			<div class="shoplist_tags">
<?php
	for($j=0;$j<count($loop_shop_tags);$j++) {
		echo '<span class="js_button" data-href="#">'.$loop_shop_tags[$j].'</span>';
	}
?>
			</div>
			<div class="shoplist_btns">
				<a href="tel:<?php echo $loop_phone_num; ?>"><?php echo $loop_phone_num_text; ?></a>
				<a href="<?php echo $loop_url; ?>" class="">詳細を見る</a>
			</div>
		</div>
	</div>
</div>
<?php 
}
?>
<!-- shop list end -->
						</div>
						<div class="shop_list_sorting_content">
							<div class="sorting_options">
								<ul>
									<li><p>並び替え</p></li>
<?php if($ltype == 'ranking'): ?>
									<li><a href="<?php echo get_site_url().'/'.$area_slug.'/'; ?>" class="publication_order">掲載順</a></li>
									<li><a href="#" class="sort_active ranking_order">ランキング</a></li>
<?php else: ?>
									<li><a href="#" class="sort_active publication_order">掲載順</a></li>
									<li><a href="<?php echo get_site_url().'/'.$area_slug.'/?type=ranking'; ?>" class="ranking_order">ランキング</a></li>
<?php endif; ?>
								</ul>
							</div>
							<div class="other_filters_options">
<?php
if(count($sub_areas) > 0):
?>
								<div class="filter_by_options">
									<p>エリアで絞り込む</p>
									<ul>
<?php 
for($i=0;$i<count($sub_areas);$i++) {
	echo '<li><a href="'.get_site_url().'/'.$sub_areas[$i]['key'].'/">'.$sub_areas[$i]['name'].'</a></li>';
}
?>
									</ul>
								</div>
<?php 
endif;
?>
								<div class="filter_by_options">
									<p>タグで絞り込む</p>
									<ul>
<?php
for($i=0;$i<count($shop_tag_dict);$i++) {
	echo '<li><a href="'.get_site_url().'/'.$area_slug.'/'.get_params_url($ltype, $shop_tag_dict[$i]).'">'.$shop_tag_dict[$i].'</a></li>';
}
?>
									</ul>
								</div>
							</div>
						</div>
						<a href="<?php echo get_site_url(); ?>/contact-paid/" class="listed_stores_button"><span>掲載店舗募集中</span></a>
					</div>
<?php echo_area_links_bottom(); ?>
					<div class="column_image_container">
						<div class="full_width_title_with_bg_image">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_white.svg" alt="logo image">
							<h3><span>COLUMN</span>コラム</h3>
						</div>
					</div>
				</div>
			</div>
<?php echo_area_links_side(); ?>
		</div>
	</div>
</section>
<section class="breadcrumb_section border_top">
	<div class="custom_container">
		<ul>
			<li>
				<a href="<?php echo get_site_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home.svg" alt="home icon">ホーム</a>
			</li>
<?php 
if(count($area_deep) > 0) :
	for($i=0;$i<count($area_deep);$i++) { 
		$breadcrum = get_area_name($area_deep[$i]);
		if($i==0) $breadcrum = $breadcrum."エリアのレディースエステ";
		else $breadcrum = $breadcrum."のレディースエステ";
?>
			<li>
				<a href="<?php echo get_site_url(); ?>/<?php echo $area_deep[$i]; ?>/"><?php echo $breadcrum; ?></a>
			</li>
<?php
	}
else:
?>
			<li>
				<a href="#">全国のレディースエステ</a>
			</li>
<?php
endif; 
?>
		</ul>
	</div>
</section>


<?php
get_footer();
