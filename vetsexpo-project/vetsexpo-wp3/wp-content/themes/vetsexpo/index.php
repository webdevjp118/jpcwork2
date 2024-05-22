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
  'meta_query' => array(
        'relation' => 'OR',
        array(
          'key'       => 'company_public',
          'compare'   => '=',
          'value'     => 1,
          'type'      => 'numeric'
        ),
      ),
  'meta_key' => 'company_no',
  'orderby' => 'meta_value_num',
	'order' => 'ASC',
  'posts_per_page' => -1,
);
$company_query = new WP_Query($search_key);

?>

	<main id="primary" class="site-main">

  
  
  
<div class="hero-banner">
  <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/hero-banner_bg.jpg"/>
  <div class="hero__scroll__area"><p>SCROLL</p></div>
</div>
  
<div class="total-3d">
    <div class="flexslider" data-ref="<?php echo $i; ?>">
        <ul class="slides">
            <li>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/total_3d1.jpg"/>
            </li>
            <li>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/total_3d2.jpg"/>
            </li>
        </ul>
    </div>
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

<?php 
if( current_user_can('editor') || current_user_can('administrator') ) :  
    $private_key = array(
      'post_type' => 'company',
      'meta_query' => array(
            'relation' => 'OR',
            array(
              'key'       => 'company_public',
              'compare'   => 'NOT EXISTS',
            ),
            array(
              'key'       => 'company_public',
              'compare'   => '=',
              'value'     => 0,
            ),
          ),
      'meta_key' => 'company_no',
      'orderby' => 'meta_value_num',
      'order' => 'ASC',
      'posts_per_page' => -1,
    );
    $private_query = new WP_Query($private_key);
?>
<div class="sec-header">
  <h2>出展企業一覧</h2>  
  <p>非公開</p>
</div>
<div class="sponsor-ship">
<?php 
if($private_query->have_posts()) : 
    while ($private_query->have_posts()) : 
        $private_query->the_post(); 
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
<?php endif; ?>

	</main><!-- #main -->
<script defer src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.flexslider.js"></script>
<script type="text/javascript">
  $(window).load(function(){
    $('.flexslider').flexslider({
      animation: "slide",
      controlNav: "thumbnails",
      start: function(slider){
        $('body').removeClass('loading');
      },
    });
  });
</script>
<?php
get_footer();
