<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package paqingko
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

<section class="page_layout">
    <div class="custom_container">
        <div class="custom_row custom_row_reverse">
            <div class="custom_col_content">
				<div class="past_articles_section pg_akouyaka">
					<div class="past_articles_box custom_header_darkblue">
						<h3>イベント公約の記事-</h3>
					</div>
					<div class="past_articles_content">
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
		$loop_content = get_the_excerpt($loop_id);
    	if(count($loop_category) > 0) $loop_catname = $loop_category[0]->name;
		$featured_img_url = get_the_post_thumbnail_url($loop_id);
		if(empty($featured_img_url)) $featured_img_url = get_stylesheet_directory_uri()."/images/blank.jpg";
?>
						<div class="past_articles_content_inner">
							<div class="custom_row">
								<div class="custom_col_image">
									<div class="past_articles_image">
										<img src="<?php echo $featured_img_url; ?>" alt="past articles image">
									</div>
								</div>
								<div class="custom_col_text">
									<div class="past_articles_text">
										<p class="past_articles_date"><?php echo $loop_date; ?></p>
										<ul>
											<li>
												<p><?php echo $loop_title; ?></p>
											</li>
											<li>
												<p class="item_excerpt"><?php echo $loop_content; ?></p>
											</li>
										</ul>
										<a href="<?php echo $loop_url; ?>">詳しく見る</a>
									</div>
								</div>
							</div>
						</div>
<?php
	endwhile;
endif;
?>						
					</div>
				</div>
				<?php echo_footer_common(); ?>
            </div>
            <div class="custom_col_sidebar">
                <div class="kouyaka_sidebar">
                    <div class="custom_header_darkblue">
                        <h3>イベント公約の記事</h3>
                    </div>
                    <div class="kouyaka_mini_article">
                        <ul>
<?php

?>
                            <li>
                                <span>2022/3/2</span>
                                <p>東海スロットイベント公約一覧</p>
                                <a href="#">詳しく見る</a>
                            </li>
                            <li>
                                <span>2022/3/2</span>
                                <p>東海スロットイベント公約一覧</p>
                                <a href="#">詳しく見る</a>
                            </li>
                                <li>
                                    <span>2022/3/2</span>
                                    <p>東海スロットイベント公約一覧</p>
                                    <a href="#">詳しく見る</a>
                                </li>
                                <li>
                                    <span>2022/3/2</span>
                                    <p>東海スロットイベント公約一覧</p>
                                    <a href="#">詳しく見る</a>
                                </li>
                                <li>
                                    <span>2022/3/2</span>
                                    <p>東海スロットイベント公約一覧</p>
                                    <a href="#">詳しく見る</a>
                                </li>
                                <li>
                                    <span>2022/3/2</span>
                                    <p>東海スロットイベント公約一覧</p>
                                    <a href="#">詳しく見る</a>
                                </li>
                            </ul>
                        </div>
                        <div class="sidebar_img">
							<?php echo_line_banner(); ?>
                        </div>
					</div>
				</div>
			</div>
		</div>
    </div>
</section>

<?php
get_footer();
