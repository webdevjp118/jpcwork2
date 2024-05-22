<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package paqingko
 */

get_header();
?>

<section class="page_layout">
    <div class="custom_container">
        <div class="custom_row custom_row_reverse">
            <div class="custom_col_content">
<?php
	while ( have_posts() ) :
		the_post();
        $loop_id = get_the_ID(); 
        $loop_post = get_post($loop_id); 
        $content = apply_filters('the_content', $loop_post->post_content); 
        $featured_img_url = get_the_post_thumbnail_url();
		if(empty($featured_img_url)) $featured_img_url = get_stylesheet_directory_uri()."/images/blank.jpg";
?>
                <div class="event_pledge_head">
                    <h2><span><?php the_date('Y/m/d'); ?></span>&nbsp;<?php echo the_title(); ?></h2>
                </div>
                <div class="blog_feature_img">
                    <img src="<?php echo $featured_img_url; ?>">
                </div>
                <div class="event_pledge_list">
                    <div class="custom_header_darkblue">
                        <h3>目次［閉じる］</h3>
                    </div>
                    <?php echo get_the_table_of_contents(); ?>
                </div>
                <div class="event_pledge_dtl">
                    <div class="pmhwp">
                        <?php echo $content; ?>
                    </div>
                </div>
                <?php echo_footer_common(); ?>
            </div>
<?php
endwhile; // End of the loop.
?>
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
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sidebar-img.png"/>
                        </div>
					</div>
				</div>
			</div>
		</div>
    </div>
</section>

<?php
get_footer();
