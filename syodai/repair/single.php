<?php get_header(); ?>
<?php
while ( have_posts() ) :
	the_post();
	$cur_post_id = get_the_ID();
    $cur_tags = get_the_tags($cur_post_id);
    if($cur_tags) {
        foreach($cur_tags as $each_tag) {
            $visit_tag = get_term_meta($each_tag->term_id, 'visit', true);
            $visit_tag = intval($visit_tag) + 1;
            update_term_meta($each_tag->term_id, 'visit', $visit_tag);
        }
    }
    $cur_post = get_post($cur_post_id);
	$cur_post_date = get_the_date('Y年m月d日');
    $cur_post_summary = get_post_meta($cur_post_id, 'summary', true);
    $cur_shop_id = get_post_meta($cur_post_id, 'shop_id', true);
    $cur_post_content = apply_filters('the_content', $cur_post->post_content); 
	$cur_featured_img = get_the_post_thumbnail_url();
	if(empty($cur_featured_img)) $cur_featured_img = get_stylesheet_directory_uri()."/images/blank.jpg";
    $category_wp = get_the_category();
    $cur_cat_name = "";
    $cur_cat_link = "javascript:void(0)";
    if(count($category_wp)>0) {
        $cur_cat_name = $category_wp[0]->cat_name;
        $cur_cat_link = get_category_link($category_wp[0]->term_id);
    } 
endwhile;
wp_reset_query();
$g_this_post_id = $cur_post_id;

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

<section class="custom_breadcrumb_section">
    <div class="custom_container">
        <ul>
            <li><a href="<?php echo get_site_url(); ?>">シューリス</a></li>
            <li><a href="<?php echo get_site_url(); ?>/blog/">記事一覧</a></li>
            <li><a href="<?php echo $cur_cat_link;  ?>"><?php echo $cur_cat_name; ?></a></li>
        </ul>
    </div>
</section>
<section class="latest_article_section">
    <div class="custom_container">
        <div class="custom_row">
            <div class="article_details_col">
                <div class="full_border_content">
                    <div class="image_container">
                        <img src="<?php echo $cur_featured_img; ?>" alt="blog details image">
                    </div>
                    <div class="tags_related_to_the_blog">
                        <h5>
                            <?php if($cur_tags && count($cur_tags)>0) echo 'この記事に関連するタグ';
                                    else echo 'この記事に関連するタグがありません';
                            ?>
                        </h5>
                        <ul>
<?php
if($cur_tags && count($cur_tags)>0) :
    foreach ($cur_tags as $each_tag) {
?>
            		        <li><a class="tag_button" href="<?php echo get_tag_link($each_tag->term_id); ?>"><?php echo $each_tag->name; ?></a></li>
<?php
    }
endif;
?>
                        </ul>
                    </div>
                    <div class="title_of_the_blog">
                        <div class="border_title">
                            <p><span><?php echo $cur_cat_name; ?></span><?php echo $cur_post_date; ?></p>
                            <h2><?php the_title(); ?></h2>
                        </div>
                        <ul class="social_btns">
                            <li><a href="javascript:void(0)">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_twitter.svg" alt="social link image">
                            </a></li>
                            <li><a href="javascript:void(0)">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_facebook.svg" alt="social link image">
                            </a></li>
                            <li><a href="javascript:void(0)">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_line.svg" alt="social link image">
                            </a></li>
                        </ul>
                        <p><?php echo $cur_post_summary; ?></p>
                    </div>
                    <div class="table_of_content">
                        <div class="toc_header"><p>目次</p></div>
                        <?php echo get_the_table_of_contents(); ?>
                    </div>
                    <div class="blog_content_wrap">
                        <div class="blog_content">
                            <div class="pmhwp">
                                <?php echo $cur_post_content; ?>
                            </div>  
                        </div>
                    </div>
<?php
if(!empty($cur_shop_id)) {
?>
                    <div class="apply_for_the_quotes js_modalbtn api_addview_think" data-sh_type="add_think" data-sh_id="<?php echo $cur_shop_id; ?>" data-tag="id_store_modal">
                        <ul>
                            <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon_thewlis.png" alt="link icon"></li>
                            <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon_email.png" alt="link icon"></li>
                        </ul>
                        <p>シューリスから記事の店舗に<br>見積りを申し込む</p>
                    </div>
<?php
}
?>
                    <div class="button_list_of_articles_top">
                        <a href="<?php echo get_site_url(); ?>/blog/">記事一覧 TOPへ<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow1.svg"></a>
                    </div>
                </div>
            </div>
			<?php get_sidebar(); ?>
        </div>
    </div>
</section>

<?php
get_footer();


