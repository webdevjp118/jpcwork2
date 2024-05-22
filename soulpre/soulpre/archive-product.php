<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package soulpre
 */

get_header();
?>
<?php
global $wp_query;
global $wp;
// get current url with query string.
$current_url =  home_url( $wp->request ); 
// get the position where '/page.. ' text start.
$pos = strpos($current_url , '/page');
// remove string from the specific postion
if(!empty($pos)) $finalurl = substr($current_url,0,$pos);
else $finalurl = $current_url;

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$prev_paged = $paged - 1;
if($prev_paged < 1) $prev_paged = 1;
$count_posts = wp_count_posts();
$total_pages = $wp_query->max_num_pages;
$next_paged = $paged + 1;
if($next_paged > $total_pages) $next_paged = $total_pages;
?>

<section class="site_breadcrumb">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/products_breadcrumb.jpg" />
    <div class="breadcrumb_content">
        <h2>PRODUCTS</h2>
        <p>製品情報</p>
    </div>
</section>
<section class="products_section">
    <div class="collection_bttn_group">
        <div class="custom_container">
            <ul>
                <!-- <li><a href="#">カテゴリー01</a></li>
                <li><a href="#">カテゴリー02</a></li>
                <li><a href="#">カテゴリー03</a></li> -->
            </ul>
        </div>
    </div>
    <div class="products_list">
        <div class="custom_container">
<?php
if(have_posts()) : 
	while (have_posts()) : 
		the_post(); 
		$loop_id = get_the_id();
		$loop_title = get_the_title($loop_id);
		$loop_product_name = get_post_meta($loop_id, 'product_name', true);
		$loop_product_name_en = get_post_meta($loop_id, 'product_name_en', true);
		$loop_product_desc = get_post_meta($loop_id, 'product_desc', true);
		$loop_date = get_the_date('Y/m/d');
		$loop_url = get_the_permalink($post_id);
		$loop_category = get_the_category($loop_id); // $loop_category[0]->name
		$loop_catname = '';
    	if(count($loop_category) > 0) $loop_catname = $loop_category[0]->name;
		$featured_img_url = get_the_post_thumbnail_url($loop_id);
		if(empty($featured_img_url)) $featured_img_url = get_stylesheet_directory_uri()."/images/blank.jpg";
?>
            <div class="products_card">
                <div class="products_card_img">
                    <img src="<?php echo $featured_img_url; ?>" />
                </div>
                <div class="products_card_content">
                    <h4><?php echo $loop_product_name; ?><br/><?php echo $loop_product_name_en; ?></h4>
                    <p><?php echo $loop_product_desc; ?></p>
                        <div class="bttn_wrapper">
                            <a href="<?php echo $loop_url; ?>">詳しくみる <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon_arrow_right.png" /></a>
                        </div>
                </div>
            </div>
<?php
	endwhile;
endif;
?>
        </div>
    </div>
    <div class="custom_pagination">
        <div class="container">
            <ul>
<?php
	for($i=1;$i<=$total_pages; $i++) {
		if($i==$paged) {
			echo '<li><a href="#" class="active">'.$i.'</a></li>';
		}
		else {
			echo '<li><a href="'.$finalurl.'/page/'.$i.'">'.$i.'</a></li>';
		}
	}
?>
            </ul>
        </div>
    </div>
</section>

<?php
get_footer();
