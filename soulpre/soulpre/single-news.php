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
		<div class="pmhwp">
			<?php the_content(); ?>
		</div>
		<div class="column_content">
			<a href="<?php echo get_site_url(); ?>/news/" class="form_submit">一覧に戻る <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon_arrow_right_white.png" align="arrow icon"></a>
		</div>
	</div>
</section>

<?php
endwhile; // End of the loop.
?>

<?php
get_footer();
