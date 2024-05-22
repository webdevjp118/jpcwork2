<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package soulpre
 */

get_header();
?>
<?php
while ( have_posts() ) :
	the_post();
	$loop_id = get_the_ID();
	$loop_date = get_the_date('Y/m/d');
	$featured_img_url = get_the_post_thumbnail_url();
		if(empty($featured_img_url)) $featured_img_url = get_stylesheet_directory_uri()."/images/blank.jpg";
?>
<section class="news_blog_section">
	<div class="blog_container">
		<div class="blog_info">
			<div class="blog_date"><?php echo $loop_date; ?></div>
			<div class="blog_cats">
<?php
	$loop_category = '';
	$loop_categories = get_the_category($loop_id);
	if ($loop_categories) {
		foreach($loop_categories as $category) {
?>
					<div class="blog_cat"><?php echo $category->name; ?></div>
<?php
		}
	}
?>
			</div>
		</div>
		<h1 class="blog_title"><?php the_title(); ?></h1>
		<div class="blog_featured"><img src="<?php echo $featured_img_url; ?>"></div>
		<div class="pmhwp">
			<?php the_content(); ?>
		</div>
		<div class="under_column_content"></div>
		<div class="blogs_buttons">
<?php
$prev_post = get_previous_post();
$prev_link = "";
if(!empty($prev_post)) $prev_link = get_the_permalink($prev_post->ID);
$next_post = get_next_post();
$next_link = "";
if(!empty($next_post)) $next_link = get_the_permalink($next_post->ID);
?>
<?php if(!empty($prev_link)): ?>
			<a href="<?php echo $prev_link; ?>" class="blog_btn_prev">前の記事へ</a>
<?php endif; ?>
			<a href="<?php echo get_site_url(); ?>/column/" class="blog_btn_list">一覧に戻る</a>
<?php if(!empty($next_link)): ?>
			<a href="<?php echo $next_link; ?>" class="blog_btn_next">次の記事へ</a>
<?php endif; ?>
		</div>
	</div>
</section>
<?php
endwhile; // End of the loop.
?>

<?php
get_footer();
