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
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/column-fv.jpg" />
    <div class="breadcrumb_content">
        <h2>COLUMN</h2>
        <p>コラム一覧</p>
    </div>
</section>
<section class="column_section">
    <div class="custom_container">
        <div class="column_content">
			<div class="column_catlist">
<?php
$categories = get_categories();
foreach($categories as $category) {
   echo '<a class="column_cat" href="' . get_category_link($category->term_id) . '">' . $category->name . '<i class="fas fa-angle-right"></i></a>';
}
?>
			</div>
            <div class="custom_row">
<?php
if(have_posts()) : 
	while (have_posts()) : 
		the_post(); 
		$loop_id = get_the_id();
		$loop_title = get_the_title($loop_id);
		$loop_date = get_the_date('Y/m/d');
		$loop_url = get_the_permalink($loop_id);
		$loop_category = get_the_category($loop_id); // $loop_category[0]->name
		$loop_catname = '';
    	if(count($loop_category) > 0) $loop_catname = $loop_category[0]->name;
		$featured_img_url = get_the_post_thumbnail_url($loop_id);
		if(empty($featured_img_url)) $featured_img_url = get_stylesheet_directory_uri()."/images/blank.jpg";
?>
                <div class="custom_col_4">
                    <div class="column_box js_button" data-href="<?php echo $loop_url; ?>">
                        <div class="column_image">
							<?php if(!empty($loop_catname)) : ?>
								<div class="column_image_text">
									<p><?php echo $loop_catname; ?></p>
								</div>
							<?php endif; ?>
                            <img src="<?php echo $featured_img_url; ?>" alt="column image">
                        </div>
                        <div class="column_text">
                            <h6><?php echo $loop_date; ?></h6>
                            <p><?php echo $loop_title; ?></p>
                        </div>
                    </div>
					<div class="under_columnitem"></div>
                </div>
<?php
	endwhile;
endif;
?>
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
        </div>
    </div>
</section>

<?php
get_footer();
