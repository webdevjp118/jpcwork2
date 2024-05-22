<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
  wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style')
);
}
function jba_remove_twentynineteen_menu_filters() {
	remove_filter( 'wp_nav_menu', 'twentynineteen_add_ellipses_to_nav' );
	remove_filter( 'wp_nav_menu_objects', 'twentynineteen_add_mobile_parent_nav_menu_items' );
	remove_filter( 'walker_nav_menu_start_el', 'twentynineteen_add_dropdown_icons' );
	remove_filter( 'nav_menu_link_attributes', 'twentynineteen_nav_menu_link_attributes' );
}
add_action( 'init', 'jba_remove_twentynineteen_menu_filters' );

function jba_dequeue_twentynineteen_menu_scripts() {
	wp_dequeue_script( 'twentynineteen-priority-menu' );
	wp_dequeue_script( 'twentynineteen-touch-navigation' );
}
add_action( 'wp_print_scripts', 'jba_dequeue_twentynineteen_menu_scripts', 100 );

function my_widget_init() {
  register_sidebar( array(
    'name'          => 'サイドバー',
    'id'            => 'sidebar',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<div class="widget-title">',
    'after_title'   => '</div>',
  ) );
	register_sidebar( array(
    'name'          => 'サイドバー2',
    'id'            => 'sidebar2',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<div class="widget-title">',
    'after_title'   => '</div>',
  ) );
}
add_action( 'widgets_init', 'my_widget_init' );

function my_excerpt_length($length) {
	return 50;
}
add_filter('excerpt_length', 'my_excerpt_length', 999);

function my_excerpt_more($more) {
	return '…';
}
add_filter('excerpt_more', 'my_excerpt_more');

function catch_that_image() {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches [1] [0];
    return $first_img;
}

function short_php($params = array()) {
  extract(shortcode_atts(array(
    'file' => 'default'
  ), $params));
  ob_start();
  include(STYLESHEETPATH . "/$file.php");
  return ob_get_clean();
}
add_shortcode('custom-post-list', 'short_php');

add_action('wp_head', 'fc_opengraph');
function fc_opengraph() {

  if( is_single() || is_page() ) {

    $post_id = get_queried_object_id();

    $url = get_permalink($post_id);
    $title = get_the_title($post_id);
    $site_name = get_bloginfo('name');

    $description = wp_trim_words( get_post_field('post_content', $post_id), 25 );
//     $description = "OGP Test";

    $image = get_the_post_thumbnail_url($post_id);
    if( !empty( get_post_meta($post_id, 'og_image', true) ) ) $image = get_post_meta($post_id, 'og_image', true);

    $locale = get_locale();

    echo '<meta property="og:locale" content="' . esc_attr($locale) . '" />';
    echo '<meta property="og:type" content="article" />';
    echo '<meta property="og:title" content="' . esc_attr($title) . ' | ' . esc_attr($site_name) . '" />';
    echo '<meta property="og:description" content="' . esc_attr($description) . '" />';
    echo '<meta property="og:url" content="' . esc_url($url) . '" />';
    echo '<meta property="og:site_name" content="' . esc_attr($site_name) . '" />';

    if($image) echo '<meta property="og:image" content="' . esc_url($image) . '" />';

    // Twitter Card
    echo '<meta name="twitter:card" content="" />';
    echo '<meta name="twitter:site" content="" />';
    echo '<meta name="twitter:creator" content="" />';

  }
}

/*============================================================
 年別, 月別アーカイブのパーマリンクを変更
*============================================================*/
add_action('init', 'custom_news_rewrite_rule');
function custom_news_rewrite_rule() {
	$rule_array = array(
		'news/page/?([0-9]{1,})/'  =>  'index.php?post_type=news&&paged=$matches[1]',
		'report/page/?([0-9]{1,})/'  =>  'index.php?post_type=report&&paged=$matches[1]',
	);
	
	foreach ( $rule_array as $regex => $rule ) {
		$regex = $regex . '?$';
		add_rewrite_rule($regex, $rule, 'top');
	}
}

function my_page_navi() {
  global $wp_query;
  $bignum = 999999999;
  if ( $wp_query->max_num_pages <= 1 )
    return;
  echo '<nav class="pagination">';
  echo paginate_links( array(
    'base'         => str_replace( $bignum, '%#%', esc_url( get_pagenum_link($bignum) ) ),
    'format'       => '',
    'current'      => max( 1, get_query_var('paged') ),
    'total'        => $wp_query->max_num_pages,
    'prev_text'    => '&larr;',
    'next_text'    => '&rarr;',
    'type'         => 'list',
    'end_size'     => 1,
    'mid_size'     => 1
  ) );
  echo '</nav>';
}

add_action( 'pre_get_posts', 'my_custom_query_vars' );
function my_custom_query_vars( $query ) {
	if ( !is_admin() && $query->is_main_query()) {
		if ( is_post_type_archive('news') ) {
			$query->set( 'posts_per_page' , 2 );//表示したい数
		}
		else if ( is_post_type_archive('report') ) {
			$query->set( 'posts_per_page' , 2 );//表示したい数
		}
	}
	return $query;
}


?>
