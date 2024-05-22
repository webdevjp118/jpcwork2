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
            <h1>シルクで頑張る人</h1>
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/svg/infinite_sign.svg" alt="infinite sign icon">
        </section>
<?php
$post_id = -1;
while ( have_posts() ) :
	the_post();
	$post_date = get_the_date('Y.m.d');
	$post_id = get_the_ID();
	$post_photo = get_the_post_thumbnail_url($post_id);
    if(strpos($post_photo, "default.jpg") !== false) $post_photo = "";
    if(empty($post_photo)) $post_photo = catch_first_image($post_id);
	if(strpos($post_photo, "default.jpg") !== false) $post_photo = "";
    if(empty($post_photo)) $post_photo = get_stylesheet_directory_uri().'/images/noimage.jpg';
    $post_vol = get_post_meta($post_id, 'vol', true);
    $post_namae = get_post_meta($post_id, 'namae', true);
    $post_job = get_post_meta($post_id, 'job', true);
    $post_bio = get_post_meta($post_id, 'bio', true);
?>
        <section class="interview_vol_section">
            <div class="custom_container">
                <div class="interview_vol"><?php echo 'Vol.'.$post_vol; ?></div>
                <div class="interview_stitle">シルクで芸術を描く次世代アーティスト</div>
            </div>
        </section>
        <section class="inner_page_banner_section">
            <div class="banner_image_box">
                <img src="<?php echo $post_photo; ?>" alt="okaya silk story banner image">
            </div>
        </section>
		<section class="interview_header_section">
			<div class="custom_container">
				<div class="interview_header">
                    <div class="silkmaker_name"><?php echo $post_namae; ?></div>
                    <div class="silkmaker_job"><?php echo $post_job; ?></div>
                    <div class="silkmaker_bio"><?php echo $post_bio; ?></div>
				</div>
			</div>
		</section>
		<section class="blog_content_section">
			<div class="custom_container">
                <h2 class="interview_title">
                    <?php the_title(); ?>
                </h2>
				<div class="pmhwp">
					<?php the_content(); ?>
				</div>
			</div>
		</section>
<?php
endwhile; // End of the loop.
?>
<?php
$fetch_key = array(
    'post_type' => 'silkmaker',
    // 'author' => $user_id,
	'posts_per_page' => -1,
    'fields' => 'ids',
);
$fetch_query = new WP_Query($fetch_key);
$id_list = [];
if($fetch_query->have_posts()) : 
    while ($fetch_query->have_posts()) : 
        $fetch_query->the_post(); 
        $loop_id = get_the_id();
        array_push($id_list, $loop_id);
    endwhile;
endif;
$post_prev_link = "";
$post_next_link = "";
for($i=0;$i<count($id_list);$i++) {
    if($id_list[$i] == $post_id) {
        if($i-1 >= 0 ) $post_next_link = get_permalink($id_list[$i-1]);
        if($i+1 < count($id_list)) $post_prev_link = get_permalink($id_list[$i+1]);
    }
}
?>
		<section class="blog_back_section">
<?php if(!empty($post_prev_link)): ?>
		    <a class="blog_back_btn" href="<?php echo $post_prev_link; ?>"><span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/svg/left_arrow.svg" alt="right arrow"></span>前の記事へ</a>
<?php endif; ?>
<?php if(!empty($post_prev_link) && !empty($post_next_link)): ?>
            <div class="blog_vert_line"></div>
<?php endif; ?>
<?php if(!empty($post_next_link)): ?>
            <a class="blog_back_btn right_btn" href="<?php echo $post_next_link; ?>">次の記事へ<span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/svg/right_arrow.svg" alt="right arrow"></span></a>
<?php endif; ?>
		</section>
        <section class="left_side_bar_bottom csp">
            <div class="custom_container">
                <ul>
					<li style="border:none">
                        <div class="side_achive">ARCHIVE</div>
                    </li>   
<?php
for($i=0;$i<count($id_list); $i++) {
    $loop_id = $id_list[$i];
    $loop_vol = get_post_meta($loop_id, 'vol', true);
    $loop_link = get_permalink($loop_id);
    if($loop_id != $post_id){
            echo '<li><a href="'.$loop_link.'">Vol.'.$loop_vol.'</a></li>';
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
for($i=0;$i<count($id_list); $i++) {
    $loop_id = $id_list[$i];
    $loop_vol = get_post_meta($loop_id, 'vol', true);
    $loop_link = get_permalink($loop_id);
    if($loop_id != $post_id){
            echo '<li><a href="'.$loop_link.'">Vol.'.$loop_vol.'</a></li>';
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
