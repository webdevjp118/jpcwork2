<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package paralysis
 */

get_header();
?>
<main id="primary" class="site-main">
<?php
while ( have_posts() ) :
	the_post();
	$loop_id = get_the_ID();
	$loop_date = get_the_date('Y.m.d');
	$loop_title = get_the_title();
	$loop_permalink = get_the_permalink();
	$loop_category = get_the_category();
	$loop_catname = '未分類';
	if(count($loop_category) > 0) $loop_catname = $loop_category[0]->name;
?>
<section class="inner_page_banner">
	<h2 class="io fade">お知らせ</h2>
</section>
<section class="breadcrumb_section">
	<div class="custom_container">
		<ul>
			<li><a href="<?php echo get_site_url(); ?>">TOP</a></li>
			<li><span>お知らせ</span></li>
		</ul>
	</div>
</section>
<div class="notice_date"><?php echo $loop_date; ?></div>
<section class="search_details_section">
	<div class="custom_container">
		<div class="search_details_card">
			<div class="search_details_card_header pg_notice">
				<h3><?php echo $loop_title; ?></h3>
				<span><?php echo $loop_catname; ?></span>
			</div>
			<div class="search_details_card_body">
				<div class="inner_custom_container">
					<div class="pmhwp" style="min-height: 80vh;">
						<?php echo the_content(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<div style="content:''; height:40px;"></div>
<?php
endwhile;
?>
</main><!-- #main -->
<?php
get_footer();
