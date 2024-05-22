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
	$product_name = get_post_meta($loop_id, 'product_name', true);
	$product_name_en = get_post_meta($loop_id, 'product_name_en', true);
	$product_desc = get_post_meta($loop_id, 'product_desc', true);
	$product_pic = get_post_meta($loop_id, 'product_pic', true);
	$patent_pic = get_post_meta($loop_id, 'patent_pic', true);
?>
<section class="site_breadcrumb products_details_breadcrumb">
    <img src="<?php echo $product_pic; ?>" />
    <img src="<?php echo $patent_pic; ?>" class="products_details_image">
    <div class="breadcrumb_content">
        <p><?php echo $product_name; ?></p>
        <h2><?php echo $product_name_en; ?></h2>
    </div>
</section>
<section class="product_inquery">
    <div class="custom_container">
        <h2><?php the_title(); ?></h2>
        <p><?php echo $product_desc; ?></p>
        <div class="bttn_wrapper">
            <a href="#" class="form_submit">
                製品お問い合わせ <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon_arrow_right_white.png" align="arrow icon">
            </a>
        </div>
    </div>
</section>

<div class="pmhwp">
	<?php the_content(); ?>
</div>

<?php
endwhile; // End of the loop.
?>

<section class="product_contact_section">
    <div class="custom_container">
        <div class="slash_heading">
            <h2>お困りごとやご相談などお気軽にお問い合わせください。</h2>
        </div>
        <div class="form_shadow_box">
            <h2>CONTACT</h2>
            <h5>お問い合わせフォーム</h5>
            <div class="contact_form_wrap">
<?php
    echo do_shortcode('[contact-form-7 id="376" title="コンタクトフォーム"]'); //server
    // echo do_shortcode('[contact-form-7 id="27" title="Contact form 1"]'); //local
?>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
