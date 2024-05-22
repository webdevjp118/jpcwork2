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
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/news-fv.jpg" />
    <div class="breadcrumb_content">
        <h2>NEWS</h2>
        <p>お知らせ一覧</p>
    </div>
</section>
<section class="news_section pg_newslist">
	<div class="blog_container">
		<div class="news_table">
<?php
if(have_posts()) : 
	while (have_posts()) : 
		the_post(); 
		$loop_id = get_the_id();
		$loop_title = get_the_title($loop_id);
		$loop_date = get_the_date('Y/m/d');
		$loop_url = get_the_permalink($post_id);
		$loop_category = get_the_category($loop_id); // $loop_category[0]->name
		$loop_catname = '';
    	if(count($loop_category) > 0) $loop_catname = $loop_category[0]->name;
?>
			<div class="news_table_row js_button" data-href="<?php echo $loop_url; ?>">
				<div class="news_table_td">
					<span><?php echo $loop_date; ?></span>
				</div>
				<div class="news_table_td">
					<label><?php echo $loop_catname; ?></label>
				</div>
				<div class="news_table_td">
					<p><?php echo $loop_title; ?></p>
				</div>
			</div>
<?php
	endwhile;
endif;
?>
		</div>
		<div class="under_newstable"></div>
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
</section>

<?php
get_footer();
