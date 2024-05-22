<?php
/**
 * The template for displaying all property posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Tomorrow_Land
 */

get_header();
while ( have_posts() ) :
    the_post();
    $title = get_the_title();
    $prev_post = get_previous_post(); 
    $prev_link = get_permalink($prev_post->ID);
    $next_post = get_next_post(); 
    $next_link = get_permalink($next_post->ID);
?>
<div class="filler_header cpc"></div>
<main id="primary" class="site-main">


<div class="sp_header_bar">
    <a href=""><img  src="<?php echo get_stylesheet_directory_uri(); ?>/images/menu-logo.svg"></a>
</div>
<section class="normal_banner_section pg_property">
	<div class="normal_banner_text pg_property">
        <div class="banner_content">
            <div class="banner_deco_left">
                
            </div>
            <div class="text_wrap">
                <h1>おすすめ物件紹介</h1>
		        <p>Recommend　property</p>
            </div>
            <div class="banner_deco_right">
            </div>
        </div>
	</div>
</section>
<section class="blog_sec">
    <div class="custom_container_medium">
        <p><a class="pankuzu" href="<?php echo get_site_url(); ?>">ホーム</a> / <a class="pankuzu" href="<?php echo get_site_url(); ?>/property">おすすめ物件紹介</a> / <?php echo $title; ?></p>
        <h1 class="cpc"><?php echo $title; ?></h1>
        <?php echo get_the_content(); ?>
        <div class="pagination_wrap">
            <?php if(!empty($prev_link)) : ?>
            <a href="<?php echo $prev_link; ?>" class="prev_btn"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/pgn_prev.svg"><span>前へ</span></a>
            <?php endif; ?>
            <?php if(!empty($prev_link && !empty($next_link))) : ?>
            <div class="spliter"></div>
            <?php endif; ?>
            <?php if(!empty($next_link)) : ?>
            <a href="<?php echo $next_link; ?>" class="next_btn"><span>次へ</span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/pgn_next.svg"></a>
            <?php endif; ?>
        </div>
    </div>
</section>


</main><!-- #main -->
<?php
endwhile;
get_footer();
