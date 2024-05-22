<?php
/**
 * The template for displaying property archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tomorrow_Land
 */

get_header();

?>
<div class="filler_header cpc"></div>

<main id="primary" class="site-main">


<div class="sp_header_bar">
    <a href=""><img  src="<?php echo get_stylesheet_directory_uri(); ?>/images/menu-logo.svg"></a>
</div>
<section class="normal_banner_section pg_property">
	<div class="normal_banner_text pg_property">
        <div class="banner_content">
            <div class="banner_deco_left"></div>
            <div class="text_wrap">
                <h1>おすすめ物件紹介</h1>
		        <p>Recommend　property</p>
            </div>
            <div class="banner_deco_right"></div>
        </div>
	</div>
</section>	
<?php
// print_r(get_query_var());
// print_r($wp_query);
$pageno = max(1, get_query_var('paged'));
$total_pages = max(1, $wp_query->max_num_pages);
$twoprev_page = max(1, $pageno-2);
$twonext_page = min($total_pages, $pageno+2);
$prev_page = $pageno - 1;
$next_page = $pageno + 1;
?>
<section class="blog_sec">
	<div class="custom_container_medium">
        <p><a class="pankuzu" href="<?php echo get_site_url(); ?>">ホーム</a> / おすすめ物件紹介 </p>
		<div class="grid_wrap pg_aproperty">
            <div class="grid_inner pg_aproperty">
<?php
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		$loop_ID = get_the_ID();
		$loop_image = catch_first_image($loop_ID);
		$loop_link = get_permalink();
		if(empty($loop_image)) $loop_image = get_stylesheet_directory_uri().'/images/noimage.jpg';
		if(strpos($loop_image, 'default.jpg') !== false) $loop_image = get_stylesheet_directory_uri().'/images/noimage.jpg';
			
?>
                <div class="grid_item pg_aproperty">
					<img class="centered_img" src="<?php echo $loop_image; ?>">	
					<a href="<?php echo $loop_link; ?>" class="contact_btn"><span>詳細を見る</span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/menu-arrow-r.svg"></a>
                </div>
<?php
	endwhile;
endif;
?>
			</div>
		</div>
		<div class="apagenation_wrap">
			<a href="<?php echo get_site_url().'/property/page/'.$twoprev_page; ?>" class="pgn_prev"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/pgn_prev.svg"></a>
			<?php if($prev_page >= 1) : ?>
				<a class="pgn_number" href="<?php echo get_site_url().'/property/page/'.$prev_page; ?>"><?php echo $prev_page; ?></a>
			<?php endif; ?>
			<a class="pgn_number" href="<?php echo get_site_url().'/property/page/'.$pageno; ?>"><?php echo $pageno; ?></a>
			<?php if($next_page <= $total_pages) : ?>
				<a class="pgn_number" href="<?php echo get_site_url().'/property/page/'.$next_page; ?>"><?php echo $next_page; ?></a>
			<?php endif; ?>
			<a href="<?php echo get_site_url().'/property/page/'.$twonext_page; ?>" class="pgn_next"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/pgn_next.svg"></a>
		</div>
	</div>
</section>

</main><!-- #main -->

<?php
get_footer();
