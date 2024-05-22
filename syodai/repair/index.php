<?php get_header(); ?>

<?php
global $wp;
// get current url with query string.
$current_url =  home_url( $wp->request ); 
// get the position where '/page.. ' text start.
$pos = strpos($current_url , '/page');
// remove string from the specific postion
if($pos>0) $this_page_url = substr($current_url,0,$pos);
else $this_page_url = $current_url;

$pageno = (get_query_var('paged')) ? get_query_var('paged') : 1;
global $wp_query;
$page_count = $wp_query ? $wp_query->max_num_pages : 1;
if($pageno <= 1) $prev_link = "javascript:void(0)";
else $prev_link = $this_page_url.'/page/'.($pageno-1);
if($pageno >= $page_count) $next_link = "javascript:void(0)";
else $next_link = $this_page_url.'/page/'.($pageno+1);
$post_loop = [];
while ( have_posts() ) :
	the_post();
    $loop_id = get_the_ID();
    array_push($post_loop, $loop_id);
endwhile;
wp_reset_query();
global $wpdb;
$client_ip = get_client_ip();
$totalrow = $wpdb->get_results("SELECT post_id FROM $wpdb->think_table WHERE client_ip = '$client_ip'");
$g_think_ids=[];
foreach($totalrow as $eachrow) {
    array_push($g_think_ids, $eachrow->post_id);
}
?>



<!-- fixed, modal part -->
<?php echo_all_tags_modal(); ?>
<?php echo_think_modal(); ?>
<div class="think_state_box">
    <a href="<?php echo get_site_url(); ?>/rsearch/" class="move_rsearch"><img src="<?php echo get_stylesheet_directory_uri();?>/images/ic_search2.svg"><span>修理店を検索する</span><img src="<?php echo get_stylesheet_directory_uri();?>/images/ic_r_arrow1.svg"></a>
    <a href="javascript:void(0)" class="think_check js_modalbtn" data-tag="id_store_modal" style="<?php echo (count($g_think_ids)<=0)?'display:none;':''; ?>">
        <svg class="svg_file"><use xlink:href="#svg_file"></use></svg>
        <span>選択店舗を確認する</span>
        <svg class="svg_r_arrow0"><use xlink:href="#svg_r_arrow0"></use></svg>
        <div class="think_count"><?php echo count($g_think_ids); ?></div>
    </a>
</div>

<!-- fixed, modal part end -->


<section class="blog_list_banner_section">
    <div class="blog_list_image_container">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/blog_banner_bg.jpg" alt="bg image">
        <h1>記事一覧</h1>
    </div>
</section>
<section class="blog_list_button_category_section">
    <div class="category_bottons_list_container">
        <ul>
<?php
$categories = get_categories();
foreach($categories as $category) {
?>
            <li>
                <a href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name; ?><span class="icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_d_arrow_circle1.svg"></span></a>
            </li>
<?php
}
?>
        </ul>
    </div>
</section>
<section class="pupular_tag_section">
    <div class="custom_container">
        <h3>人気のタグ</h3>
        <div class="custom_row">
            <div class="tag_list_col">
                <ul class="tags_list">
                <?php
$top_tags = get_tags(array(
	'hide_empty' => false,
    'orderby' => 'meta_value_num',
    'meta_key' => 'visit',
));
foreach ($top_tags as $each_tag) {
?>
                    <li><a class="tag_button" href="<?php echo get_tag_link($each_tag->term_id); ?>"><?php echo $each_tag->name; ?></a></li>
<?php
}
?>
                </ul>
            </div>
            <div class="more_list_col">
                <div class="tagmore_btnwrap small_sized">
			        <a class="js_modalbtn" data-tag="id_more_tag_modal" href="javascript:void(0)">タグ一覧へ<svg class="svg_r_arrow1"><use xlink:href="#svg_r_arrow1"></use></svg></a>
		        </div>
            </div>
        </div>
    </div>
</section>
<section class="latest_article_section">
    <div class="custom_container">
        <div class="custom_row">
            <div class="article_col">
                <h2>最新記事</h2>
                <ul class="article_list">
<?php
for($i=0;$i<count($post_loop);$i++) {
    $loop_id = $post_loop[$i];
    $loop_title = get_the_title($loop_id);
    $loop_date = get_the_date('Y年m月d日');
    $loop_page_url = get_permalink($loop_id);
    $loop_summary = get_post_meta($loop_id, 'summary', true);
    $loop_featured_img = get_the_post_thumbnail_url($loop_id);
    if(empty($loop_featured_img)) $loop_featured_img = get_stylesheet_directory_uri()."/images/blank.jpg";
    $category_wp = get_the_category($loop_id);
    $loop_cat_name = "";
    $loop_excerpt = get_the_excerpt($loop_id);
    if(count($category_wp)>0) $loop_cat_name = $category_wp[0]->cat_name;
?>
                    <li class="single_article js_button" data-href="<?php echo $loop_page_url; ?>">
                        <div class="article_image_col">
                            <div class="image_box">
                                <img src="<?php echo $loop_featured_img; ?>" class="artical image">
                            </div>
                        </div>
                        <div class="article_text_col">
                            <span><?php echo $loop_cat_name; ?></span>
                            <a href="javascript:void(0)"><?php echo $loop_title; ?></a>
                            <p><?php echo $loop_excerpt; ?></p>
                        </div>
                    </li>
<?php    
}
?>
                </ul>
                <div class="custom_pagination">
                    <ul>
                        <li><a href="<?php echo $prev_link; ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_l_arrow2.svg"></a></li>
                        <li><p><span class="active_page"><?php echo $pageno; ?></span><?php echo ' / '.$page_count; ?></p></li>
                        <li><a href="<?php echo $next_link; ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow2.svg"></a></li>
                    </ul>
                </div>
            </div>
			<?php get_sidebar(); ?>
        </div>
    </div>
</section>





<?php
get_footer();
