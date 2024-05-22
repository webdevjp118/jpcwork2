<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package repair
 */

?>
<?php
global $g_this_post_id;
$all_tags = get_tags(array(
	'hide_empty' => false
));
$pickup_filter = array(
	'relation' => 'OR',
	array(
		'key' => 'pickup',
		'value' => 'pickup', //array
		'compare' => '=',
	)
);
$pickup_args = array(
    'post_type' => 'post',
    'meta_query' => $pickup_filter,
	'posts_per_page' => -1,
    // 'orderby' => 'meta_value_num',
    // 'meta_key' => 'kenv_point',
    // 'order' => 'DESC',
);
$pickup_query = new WP_Query($pickup_args);
?>
<div class="pickup_col">
	<div class="pickup_list_container">
		<h3><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/list_icon.png" alt="list_icon"><span class="h3_span">PICK UP</span><span>おすすめの記事</span></h3>
		<ul class="pickup_list">
<?php
if($pickup_query->have_posts()) : 
    while ($pickup_query->have_posts()) : 
		$pickup_query->the_post();
		$loop_id = get_the_ID();
		$loop_title = get_the_title();
		$loop_date = get_the_date('Y年m月d日');
		$loop_page_url = get_permalink($loop_id);
		$loop_summary = get_post_meta($loop_id, 'summary', true);
		$loop_featured_img = get_the_post_thumbnail_url();
		if(empty($loop_featured_img)) $loop_featured_img = get_stylesheet_directory_uri()."/images/blank.jpg";
		$category_wp = get_the_category();
		$loop_cat_name = "";
		if(count($category_wp)>0) $loop_cat_name = $category_wp[0]->cat_name;
		if($loop_id != $g_this_post_id) :
?>
			<li class="single_pickup js_button" data-href="<?php echo $loop_page_url; ?>">
				<div class="pickup_image">
					<img src="<?php echo $loop_featured_img; ?>" alt="image">
					<span><?php echo $loop_cat_name; ?></span>
				</div>
				<div class="pickup_text">
					<a href="javascript:void(0)"><?php echo $loop_title; ?></a>
				</div>
			</li>
<?php
		endif;
	endwhile;
endif;
?>
		</ul>
	</div>
	<div class="recommended_article_tag_list_container">
		<h4>おすすめの記事のタグ</h4>
		<ul class="article_tag_list">
<?php
foreach ($all_tags as $each_tag) {
	if(get_term_meta($each_tag->term_id, 'recommend', true) == 'recommend') {
?>
            <li class="single_article_tag"><a class="tag_button" href="<?php echo get_tag_link($each_tag->term_id); ?>"><?php echo $each_tag->name; ?></a></li>
<?php
	}
}
?>
		</ul>
		<div class="tagmore_btnwrap small_sized">
			<a class="js_modalbtn" data-tag="id_more_tag_modal" href="javascript:void(0)">タグ一覧へ<svg class="svg_r_arrow1"><use xlink:href="#svg_r_arrow1"></use></svg></a>
		</div>
		
	</div>
</div>