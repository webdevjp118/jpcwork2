<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package SILK_OKAYA
 */

get_header();
?>
<main id="primary" class="site-main">


<div class="main_body_content">
    <div class="right_side_contet">
<?php echo_header(); ?>        
        <section class="custom_breadcrumb_section">
        <h1>News & BIog <br class="csp"><span class="small_h1">－岡谷シルク日記－</span></h1>
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/svg/infinite_sign.svg" alt="infinite sign icon">
        </section>
<?php
while ( have_posts() ) :
	the_post();
	$post_date = get_the_date('Y.m.d');
	$post_id = get_the_ID();
	$post_photo = get_the_post_thumbnail_url($post_id);
    if(strpos($post_photo, "default.jpg") !== false) $post_photo = "";
    if(empty($post_photo)) $post_photo = catch_first_image($post_id);
	if(strpos($post_photo, "default.jpg") !== false) $post_photo = "";
    if(empty($post_photo)) $post_photo = get_stylesheet_directory_uri().'/images/noimage.jpg';
?>
        <section class="inner_page_banner_section">
            <div class="banner_image_box">
                <img src="<?php echo $post_photo; ?>" alt="okaya silk story banner image">
            </div>
        </section>
		<section class="blog_header_section">
			<div class="custom_container">
				<div class="blog_date_cat">
					<div class="blog_date"><?php echo $post_date; ?></div>
<?php
	$post_category = '';
	$post_categories = get_the_category(get_the_ID());
	if ($post_categories) {
		foreach($post_categories as $category) {
?>
					<div class="blog_cat"><?php echo $category->name; ?></div>
<?php
		}
	}
?>
				</div>
				<div class="blog_title">
					<h2><?php the_title(); ?></h2>
				</div>
			</div>
		</section>
		<section class="blog_content_section">
			<div class="custom_container">
				<div class="pmhwp">
					<?php the_content(); ?>
				</div>
			</div>
		</section>
<?php
endwhile; // End of the loop.
?>
		<section class="blog_back_section">
		<a class="blog_back_btn" href="<?php echo get_site_url(); ?>/blogs/"><span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/svg/left_arrow.svg" alt="right arrow"></span>一覧に戻る</a>
		</section>
<?php
$fetch_key = array(
    'post_type' => 'post',
    // 'author' => $user_id,
	'posts_per_page' => -1,
    'fields' => 'ids',
);
$fetch_query = new WP_Query($fetch_key);
$da_posts = [];
if($fetch_query->have_posts()) : 
    while ($fetch_query->have_posts()) : 
        $fetch_query->the_post(); 
        $loop_id = get_the_id();
        $loop_y = get_the_date('Y');
        $da_posts[$loop_y]['total'] = $da_posts[$loop_y]['total'] + 1;
        $loop_m = get_the_date('m');
        $da_posts[$loop_y][$loop_m] = $da_posts[$loop_y][$loop_m] + 1;
    endwhile;
endif;
?>
        <section class="left_side_bar_bottom csp">
            <div class="custom_container">
                <ul>
					<li style="border:none">
                        <div class="side_achive">ARCHIVE</div>
                    </li>   
<?php
foreach($da_posts as $year_key=>$year_posts) {
    foreach($year_posts as $month_key=>$month_posts) {
        if($month_key != 'total'){
            echo '<li><a href="'.get_site_url().'/blogs/?y_key='.$year_key.'&m_key='.$month_key.'" class="month_count">'.$year_key.'年'.$month_key.'月</a></li>';
        }
    }
}
?>
                </ul>
            </div>
        </section>
    </div>
    <div class="left_side_bar cpc">
        <div class="left_side_bar_inner">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_black.png" alt="logo image" class="cpc js_button" data-href="<?php echo get_site_url(); ?>/">
            <ul>
				<li style="border:none">
                    <div class="side_achive">ARCHIVE</div>
                </li>   
<?php
foreach($da_posts as $year_key=>$year_posts) {
    foreach($year_posts as $month_key=>$month_posts) {
        if($month_key != 'total'){
            echo '<li><a href="'.get_site_url().'/blogs/?y_key='.$year_key.'&m_key='.$month_key.'" class="month_count">'.$year_key.'年'.$month_key.'月</a></li>';
        }
    }
}
?>
            </ul>
        </div>
    </div>
</div>


</main><!-- #main -->

<?php
get_footer();
