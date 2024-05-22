<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ninibaikyaku
 */

get_header();
?>

<main id="primary" class="site-main">

<section class="news_page_sec">
	<div class="pagetitle_wrap">
        <div class="custom_container">    
            <div class="pankuzu_sec">
                <ul><li><a href="https://ninibaikyaku-dr.com/">トップ </a></li><li><a href="#">お知らせ</a></li></ul>
            </div>
            <div class="pagetitle">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/news-heading-image.png">
                <h2>お知らせ</h2>
            </div>
        </div>
    </div>
	<div class="custom_container">
		<div class="news_content_wrap">
			<div class="shape02_container"><div class="shape02_cover"></div><div class="shape02_cover1"></div></div>
<?php
while ( have_posts() ) :
	the_post();
	$loop_date = get_the_date('Y.m.d', $post_id);
    $loop_title = get_the_title($post_id);
    // $loop_content = get_the_content();
?>
			<div class="single_news">
				<h2><?php echo $loop_title; ?></h2>
				<div class="news_date">
					<p><?php echo $loop_date; ?></p>
					<a href="<?php echo get_site_url(); ?>/news/">お知らせ一覧 <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
				</div>
				
			</div>
			<div class="blog_content">
				<div class="entry-content">
					<?php
					the_content();

					the_post_navigation(
						array(
							'prev_text' => '<i class="fa fa-chevron-left"></i> 前へ',
							'next_text' => '次へ <i class="fa fa-chevron-right"></i>',
						)
					);
					?>
				</div><!-- .entry-content -->
			</div>
<?php 
endwhile; // End of the loop.
?>
		</div>
	</div>
</section>

</main><!-- #main -->

<?php
get_footer();
