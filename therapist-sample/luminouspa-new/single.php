<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package luminouspa-new
 */

get_header();
?>

	<main id="primary" class="site-main">

<!-- notice -->
<section class="notice_section">
	<div class="notice_inner">
		<div class="header_textwrap">
			<div class="heading_text">
				<h5>NEWS</h5>
				<p>新着情報</p>
			</div>
		</div>
	
<?php
	while ( have_posts() ) :
		the_post();
		$post_category = '';
		$post_categories = get_the_category(get_the_ID());
		$post_date = get_the_date('Y/m/d ');
		$post_time = get_the_time('h時i分');
		$post_date .= ' '.$post_time;
		if ($post_categories) {
			foreach($post_categories as $category) {
				$post_category = $category->name; 
			}
		}
		// 
?>
		<div class="title_box">
			<p class="notice_date"><?php echo $post_date; ?></p>
			<h1 class="notice_title"><?php the_title(); ?></h1>
			<div class="title_line"></div>
			<div class="notice_cate"><?php echo $post_category; ?></div>
		</div>
		<div class="blog_content">

			<?php the_content(); ?>

		</div>
	</div>
</section>
<?php
	endwhile; // End of the loop.
?>
		

	</main><!-- #main -->

<?php
get_footer();
