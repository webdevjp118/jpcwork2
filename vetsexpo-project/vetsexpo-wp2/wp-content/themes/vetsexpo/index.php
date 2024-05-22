<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vetsexpo
 */

get_header();

$noimage = get_stylesheet_directory_uri()."/images/noimage.jpg";
$search_key = array(
  'post_type' => 'company',
  'orderby' => 'date',
  'order'   => 'ASC',
  'posts_per_page' => -1,
  'meta_query' => array(
    'relation' => 'OR',
    array(
    ),
  ),
);
$company_query = new WP_Query($search_key);

?>

	<main id="primary" class="site-main">

  
  
  
	<div class="hero-banner">
  <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/hero-banner_bg.jpg"/>
  <div class="hero__scroll__area"><p>SCROLL</p></div>
</div>
  
<div class="total-3d">
  <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/total_3d.jpg"/>  
</div>
<div class="sec-header">
  <h2>出展企業一覧</h2>  
  <p>sponsorship</p>
</div>
  
<div class="sponsor-ship">

<?php 
if($company_query->have_posts()) : 
    while ($company_query->have_posts()) : 
        $company_query->the_post(); 
        $loop_id = get_the_id();

        $loop_logo = get_post_field( 'company_logo', $loop_id );
        $loop_name = get_post_field( 'company_name', $loop_id );
?>
  <figure>
    <a href="<?php echo get_site_url().'/company/'.$loop_id.'/'; ?>">
      <div class="img-container">
        <img src="<?php echo !empty($loop_logo)?$loop_logo:$noimage; ?>" alt="<?php echo $loop_name; ?>" width="100%" height="auto">
      </div>
    </a>
    <figcaption><?php echo $loop_name; ?></figcaption>
  </figure>
<?php
    endwhile;
endif;
?>
  <figure>
  </figure>
  <figure>
  </figure>
  <figure>
  </figure>
</div>

	</main><!-- #main -->

<?php
get_footer();
