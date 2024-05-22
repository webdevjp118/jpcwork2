<?php
/**
 * SILK OKAYA functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package SILK_OKAYA
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'silk_okaya_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function silk_okaya_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on SILK OKAYA, use a find and replace
		 * to change 'silk-okaya' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'silk-okaya', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'silk-okaya' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'silk_okaya_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'silk_okaya_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function silk_okaya_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'silk_okaya_content_width', 640 );
}
add_action( 'after_setup_theme', 'silk_okaya_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function silk_okaya_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'silk-okaya' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'silk-okaya' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'silk_okaya_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function silk_okaya_scripts() {
	wp_enqueue_style( 'silk-okaya-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'silk-okaya-style', 'rtl', 'replace' );

	wp_enqueue_script( 'silk-okaya-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'silk_okaya_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/*****************************************Custom Code*******************************/
add_action('init', 'register_post_type_silkmaker');
function register_post_type_silkmaker() {
  register_post_type(
    'silkmaker'                                                 // カスタム投稿タイプ名
    , array(
      'labels' => array(
                    'name'           => 'シルクで頑張る人'            //ダッシュボードに表示される名前
                    , 'add_new_item' => 'シルクで頑張る人を新規追加'  // 新規追加画面に表示される名前
                    , 'edit_item'    => 'シルクで頑張る人の編集'      // 編集画面に表示される名前
                    , 
                  )
      , 'public'       => true                                // ダッシュボードに表示するか否か
      , 'hierarchical' => true                                // 階層型にするか否か
      , 'has_archive'  => true                                // アーカイブ（一覧表示機能）を持つか否か
      , 'supports'     => array(	                              // カスタム投稿ページに表示される項目
							'title',                           // カスタム投稿ページに表示される項目
							'editor',
							'thumbnail',
                            'custom-fields'                  // カスタムフィールド
                          )
      , 'menu_position' => 5                                  // ダッシュボードで投稿の下に表示
      , 'rewrite'       => array('with_front' => false)       // パーマリンクの編集（productの前の階層URLを消して表示）
      )
  );
}

add_action('save_post', 'save_custom_postdata');

// 保存メソッド
function doSave($post_id, $data_name){
	$data = '';
	if(isset($_POST[$data_name])){
		$data = $_POST[$data_name]; 
	}else{
	  $data = '';
	}
	if( $data != get_post_meta($post_id, $data_name, true)){
	  update_post_meta($post_id, $data_name,$data);
	}elseif($data == ""){
	  delete_post_meta($post_id, $data_name,get_post_meta($post_id,$data_name,true));
	}
}
function idSlugSave($post_id){
	remove_action( 'save_post', 'save_custom_postdata' );
	wp_update_post([
		"post_name" => $post_id,
		"ID" => $post_id,
	]);
	add_action( 'save_post', 'save_custom_postdata' );
}
function save_custom_postdata($post_id){
	$post_type = get_post_type($post_id);
	if($post_type == 'silkmaker' || $post_type == 'news') {
		idSlugSave($post_id);
	}
	
	doSave($post_id, 'vol');
	doSave($post_id, 'namae');
	doSave($post_id, 'job');
	doSave($post_id, 'bio');
}
function custom_silkmaker_info_area(){
	//これがないと入力欄が更新されない！
	global $post;
	
	echo 'Interview Vol　：<input type="number" name="vol" value="'.get_post_meta($post->ID,'vol',true).'"><br>';
	echo '名前　：<input type="text" name="namae" value="'.get_post_meta($post->ID,'namae',true).'"><br>';
	echo '肩書き　：<input type="text" name="job" value="'.get_post_meta($post->ID,'job',true).'"><br>';
	echo '略歴　：<textarea cols="70" rows="5" name="bio">'.get_post_meta($post->ID,'bio',true).'</textarea><br>';
}
function add_custom_inputbox() {
	add_meta_box( 'silkmaker_id','シルクで頑張る人情報', 'custom_silkmaker_info_area', 'silkmaker', 'normal' );
}
add_action('admin_menu', 'add_custom_inputbox');


// function get_client_ip() {
// 	$ip=$_SERVER['REMOTE_ADDR']; 
// 	return $ip;
// }
function get_client_ip() {
	$ipaddress = '';
	if ($_SERVER['HTTP_CLIENT_IP'])
		$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
	else if($_SERVER['HTTP_X_FORWARDED_FOR'])
		$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
	else if($_SERVER['HTTP_X_FORWARDED'])
		$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
	else if($_SERVER['HTTP_FORWARDED_FOR'])
		$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
	else if($_SERVER['HTTP_FORWARDED'])
		$ipaddress = $_SERVER['HTTP_FORWARDED'];
	else if($_SERVER['REMOTE_ADDR'])
		$ipaddress = $_SERVER['REMOTE_ADDR'];
	else
		$ipaddress = 'UNKNOWN';
	
	return $ipaddress;
}

function get_company_email() {
	return 'xxx@yyy.co.jp';
	return 'prgfinal216@gmail.com';
}

// get the first image in content
function catch_first_image($post_id) {
    $post = get_post($post_id);
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches [1] [0];
  
    if(empty($first_img)){ //Defines a default image
      $first_img = "/images/default.jpg";
    }
    return $first_img;
}

function echo_first_header() {
?>
<header class="home_page_header">
	<a href="javascript:void(0);" class="navbar_toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		<div class="navbar_toggler_inner"></div>
	</a>
	<nav class="toggle_navbar_custom">
		<ul class="main_menu">
			<li>
				<a href="<?php echo get_site_url(); ?>/blogs/">News & BIog</a>
			</li>
			<li>
				<a href="<?php echo get_site_url(); ?>/story/">SILK OKAYA物語</a>
			</li>
			<li>
				<a href="<?php echo get_site_url(); ?>/concept/">岡谷シルクについて</a>
			</li>
			<li>
				<a href="<?php echo get_site_url(); ?>/product/">岡谷シルク製品</a>
			</li>
			<li>
				<a href="<?php echo get_site_url(); ?>/interviews/">シルクで頑張る人</a>
			</li>
		</ul>
		<ul class="social_menu">
			<li>
				<a href="#">
					<svg id="Group_1511" data-name="Group 1511" xmlns="http://www.w3.org/2000/svg" width="22.616" height="23" viewBox="0 0 22.616 23">
						<path id="Path_2360" data-name="Path 2360" d="M1399.266,4461.621h-9.615a6.5,6.5,0,0,0-6.5,6.5v10a6.5,6.5,0,0,0,6.5,6.5h9.615a6.5,6.5,0,0,0,6.5-6.5v-10A6.5,6.5,0,0,0,1399.266,4461.621Zm-13.807,6.5a4.2,4.2,0,0,1,4.192-4.192h9.615a4.2,4.2,0,0,1,4.193,4.192v10a4.2,4.2,0,0,1-4.193,4.192h-9.615a4.2,4.2,0,0,1-4.192-4.192Z" transform="translate(-1383.15 -4461.621)"/>
						<path id="Path_2361" data-name="Path 2361" d="M1397.645,4482.345a5.923,5.923,0,1,0-5.923-5.923A5.931,5.931,0,0,0,1397.645,4482.345Zm0-10a4.077,4.077,0,1,1-4.076,4.078A4.082,4.082,0,0,1,1397.645,4472.344Z" transform="translate(-1386.337 -4464.921)"/>
						<circle id="Ellipse_2" data-name="Ellipse 2" cx="1.327" cy="1.327" r="1.327" transform="translate(15.941 4.077)"/>
					</svg>
				</a>
			</li>
			<li>
				<a href="#">
					<svg xmlns="http://www.w3.org/2000/svg" width="22.616" height="22.616" viewBox="0 0 22.616 22.616">
						<path id="Path_2362" data-name="Path 2362" d="M1455.218,4461.926H1435.1a1.247,1.247,0,0,0-1.247,1.248v20.118a1.248,1.248,0,0,0,1.247,1.25h9.7v-7.555h-3.287v-3.806h3.287v-2.809a6.584,6.584,0,0,1,.2-1.671c0-.015.009-.029.014-.044.038-.142.082-.28.13-.413.039-.1.083-.2.128-.3.018-.042.035-.085.054-.126a4.34,4.34,0,0,1,.211-.385l.01-.019a4.2,4.2,0,0,1,.55-.709l.014-.016c.089-.091.184-.175.281-.258.022-.018.042-.039.064-.056.077-.063.159-.119.24-.176.049-.034.095-.071.145-.1s.109-.063.164-.1c.086-.049.169-.1.258-.142.016-.008.032-.014.048-.021a5.532,5.532,0,0,1,2.381-.494,26.679,26.679,0,0,1,2.937.152v3.4h-2.015c-1.579,0-1.887.752-1.887,1.854v2.431h3.77l-.491,3.806h-3.279v7.555h6.488a1.248,1.248,0,0,0,1.248-1.25v-20.118A1.247,1.247,0,0,0,1455.218,4461.926Z" transform="translate(-1433.85 -4461.926)"/>
					</svg>
				</a>
			</li>
		</ul>
	</nav>
	<nav class="cpc navbar_custom">
		<ul class="main_menu">
			<li>
				<a href="<?php echo get_site_url(); ?>/blogs/">News & BIog</a>
			</li>
			<li>
				<a href="<?php echo get_site_url(); ?>/story/">SILK OKAYA物語</a>
			</li>
			<li>
				<a href="<?php echo get_site_url(); ?>/concept/">岡谷シルクについて</a>
			</li>
			<li>
				<a href="<?php echo get_site_url(); ?>/product/">岡谷シルク製品</a>
			</li>
			<li>
				<a href="<?php echo get_site_url(); ?>/interviews/">シルクで頑張る人</a>
			</li>
		</ul>
		<ul class="social_menu">
			<li>
				<a href="#">
					<svg id="Group_1511" data-name="Group 1511" xmlns="http://www.w3.org/2000/svg" width="22.616" height="23" viewBox="0 0 22.616 23">
						<path id="Path_2360" data-name="Path 2360" d="M1399.266,4461.621h-9.615a6.5,6.5,0,0,0-6.5,6.5v10a6.5,6.5,0,0,0,6.5,6.5h9.615a6.5,6.5,0,0,0,6.5-6.5v-10A6.5,6.5,0,0,0,1399.266,4461.621Zm-13.807,6.5a4.2,4.2,0,0,1,4.192-4.192h9.615a4.2,4.2,0,0,1,4.193,4.192v10a4.2,4.2,0,0,1-4.193,4.192h-9.615a4.2,4.2,0,0,1-4.192-4.192Z" transform="translate(-1383.15 -4461.621)"/>
						<path id="Path_2361" data-name="Path 2361" d="M1397.645,4482.345a5.923,5.923,0,1,0-5.923-5.923A5.931,5.931,0,0,0,1397.645,4482.345Zm0-10a4.077,4.077,0,1,1-4.076,4.078A4.082,4.082,0,0,1,1397.645,4472.344Z" transform="translate(-1386.337 -4464.921)"/>
						<circle id="Ellipse_2" data-name="Ellipse 2" cx="1.327" cy="1.327" r="1.327" transform="translate(15.941 4.077)"/>
					</svg>
				</a>
			</li>
			<li>
				<a href="#">
					<svg xmlns="http://www.w3.org/2000/svg" width="22.616" height="22.616" viewBox="0 0 22.616 22.616">
						<path id="Path_2362" data-name="Path 2362" d="M1455.218,4461.926H1435.1a1.247,1.247,0,0,0-1.247,1.248v20.118a1.248,1.248,0,0,0,1.247,1.25h9.7v-7.555h-3.287v-3.806h3.287v-2.809a6.584,6.584,0,0,1,.2-1.671c0-.015.009-.029.014-.044.038-.142.082-.28.13-.413.039-.1.083-.2.128-.3.018-.042.035-.085.054-.126a4.34,4.34,0,0,1,.211-.385l.01-.019a4.2,4.2,0,0,1,.55-.709l.014-.016c.089-.091.184-.175.281-.258.022-.018.042-.039.064-.056.077-.063.159-.119.24-.176.049-.034.095-.071.145-.1s.109-.063.164-.1c.086-.049.169-.1.258-.142.016-.008.032-.014.048-.021a5.532,5.532,0,0,1,2.381-.494,26.679,26.679,0,0,1,2.937.152v3.4h-2.015c-1.579,0-1.887.752-1.887,1.854v2.431h3.77l-.491,3.806h-3.279v7.555h6.488a1.248,1.248,0,0,0,1.248-1.25v-20.118A1.247,1.247,0,0,0,1455.218,4461.926Z" transform="translate(-1433.85 -4461.926)"/>
					</svg>
				</a>
			</li>
		</ul>
	</nav>
</header>
<?php
}
function echo_header() {
?>
<header>
	<a href="javascript:void(0);" class="navbar_toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		<div class="navbar_toggler_inner"></div>
	</a>
	<nav class="toggle_navbar_custom">
		<ul class="main_menu">
			<li>
				<a href="<?php echo get_site_url(); ?>/blogs/">News & BIog</a>
			</li>
			<li>
				<a href="<?php echo get_site_url(); ?>/story/">SILK OKAYA物語</a>
			</li>
			<li>
				<a href="<?php echo get_site_url(); ?>/concept/">岡谷シルクについて</a>
			</li>
			<li>
				<a href="<?php echo get_site_url(); ?>/product/">岡谷シルク製品</a>
			</li>
			<li>
				<a href="<?php echo get_site_url(); ?>/interviews/">シルクで頑張る人</a>
			</li>
		</ul>
		<ul class="social_menu">
			<li>
				<a href="#">
					<svg id="Group_1511" data-name="Group 1511" xmlns="http://www.w3.org/2000/svg" width="22.616" height="23" viewBox="0 0 22.616 23">
						<path id="Path_2360" data-name="Path 2360" d="M1399.266,4461.621h-9.615a6.5,6.5,0,0,0-6.5,6.5v10a6.5,6.5,0,0,0,6.5,6.5h9.615a6.5,6.5,0,0,0,6.5-6.5v-10A6.5,6.5,0,0,0,1399.266,4461.621Zm-13.807,6.5a4.2,4.2,0,0,1,4.192-4.192h9.615a4.2,4.2,0,0,1,4.193,4.192v10a4.2,4.2,0,0,1-4.193,4.192h-9.615a4.2,4.2,0,0,1-4.192-4.192Z" transform="translate(-1383.15 -4461.621)"/>
						<path id="Path_2361" data-name="Path 2361" d="M1397.645,4482.345a5.923,5.923,0,1,0-5.923-5.923A5.931,5.931,0,0,0,1397.645,4482.345Zm0-10a4.077,4.077,0,1,1-4.076,4.078A4.082,4.082,0,0,1,1397.645,4472.344Z" transform="translate(-1386.337 -4464.921)"/>
						<circle id="Ellipse_2" data-name="Ellipse 2" cx="1.327" cy="1.327" r="1.327" transform="translate(15.941 4.077)"/>
					</svg>
				</a>
			</li>
			<li>
				<a href="#">
					<svg xmlns="http://www.w3.org/2000/svg" width="22.616" height="22.616" viewBox="0 0 22.616 22.616">
						<path id="Path_2362" data-name="Path 2362" d="M1455.218,4461.926H1435.1a1.247,1.247,0,0,0-1.247,1.248v20.118a1.248,1.248,0,0,0,1.247,1.25h9.7v-7.555h-3.287v-3.806h3.287v-2.809a6.584,6.584,0,0,1,.2-1.671c0-.015.009-.029.014-.044.038-.142.082-.28.13-.413.039-.1.083-.2.128-.3.018-.042.035-.085.054-.126a4.34,4.34,0,0,1,.211-.385l.01-.019a4.2,4.2,0,0,1,.55-.709l.014-.016c.089-.091.184-.175.281-.258.022-.018.042-.039.064-.056.077-.063.159-.119.24-.176.049-.034.095-.071.145-.1s.109-.063.164-.1c.086-.049.169-.1.258-.142.016-.008.032-.014.048-.021a5.532,5.532,0,0,1,2.381-.494,26.679,26.679,0,0,1,2.937.152v3.4h-2.015c-1.579,0-1.887.752-1.887,1.854v2.431h3.77l-.491,3.806h-3.279v7.555h6.488a1.248,1.248,0,0,0,1.248-1.25v-20.118A1.247,1.247,0,0,0,1455.218,4461.926Z" transform="translate(-1433.85 -4461.926)"/>
					</svg>
				</a>
			</li>
		</ul>
	</nav>
	<nav class="cpc-1200 navbar_custom">
		<ul class="main_menu">
			<li>
				<a href="<?php echo get_site_url(); ?>/blogs/">News & BIog</a>
			</li>
			<li>
				<a href="<?php echo get_site_url(); ?>/story/">SILK OKAYA物語</a>
			</li>
			<li>
				<a href="<?php echo get_site_url(); ?>/concept/">岡谷シルクについて</a>
			</li>
			<li>
				<a href="<?php echo get_site_url(); ?>/product/">岡谷シルク製品</a>
			</li>
			<li>
				<a href="<?php echo get_site_url(); ?>/interviews/">シルクで頑張る人</a>
			</li>
		</ul>
		<ul class="social_menu">
			<li>
				<a href="#">
					<svg id="Group_1511" data-name="Group 1511" xmlns="http://www.w3.org/2000/svg" width="22.616" height="23" viewBox="0 0 22.616 23">
						<path id="Path_2360" data-name="Path 2360" d="M1399.266,4461.621h-9.615a6.5,6.5,0,0,0-6.5,6.5v10a6.5,6.5,0,0,0,6.5,6.5h9.615a6.5,6.5,0,0,0,6.5-6.5v-10A6.5,6.5,0,0,0,1399.266,4461.621Zm-13.807,6.5a4.2,4.2,0,0,1,4.192-4.192h9.615a4.2,4.2,0,0,1,4.193,4.192v10a4.2,4.2,0,0,1-4.193,4.192h-9.615a4.2,4.2,0,0,1-4.192-4.192Z" transform="translate(-1383.15 -4461.621)"/>
						<path id="Path_2361" data-name="Path 2361" d="M1397.645,4482.345a5.923,5.923,0,1,0-5.923-5.923A5.931,5.931,0,0,0,1397.645,4482.345Zm0-10a4.077,4.077,0,1,1-4.076,4.078A4.082,4.082,0,0,1,1397.645,4472.344Z" transform="translate(-1386.337 -4464.921)"/>
						<circle id="Ellipse_2" data-name="Ellipse 2" cx="1.327" cy="1.327" r="1.327" transform="translate(15.941 4.077)"/>
					</svg>
				</a>
			</li>
			<li>
				<a href="#">
					<svg xmlns="http://www.w3.org/2000/svg" width="22.616" height="22.616" viewBox="0 0 22.616 22.616">
						<path id="Path_2362" data-name="Path 2362" d="M1455.218,4461.926H1435.1a1.247,1.247,0,0,0-1.247,1.248v20.118a1.248,1.248,0,0,0,1.247,1.25h9.7v-7.555h-3.287v-3.806h3.287v-2.809a6.584,6.584,0,0,1,.2-1.671c0-.015.009-.029.014-.044.038-.142.082-.28.13-.413.039-.1.083-.2.128-.3.018-.042.035-.085.054-.126a4.34,4.34,0,0,1,.211-.385l.01-.019a4.2,4.2,0,0,1,.55-.709l.014-.016c.089-.091.184-.175.281-.258.022-.018.042-.039.064-.056.077-.063.159-.119.24-.176.049-.034.095-.071.145-.1s.109-.063.164-.1c.086-.049.169-.1.258-.142.016-.008.032-.014.048-.021a5.532,5.532,0,0,1,2.381-.494,26.679,26.679,0,0,1,2.937.152v3.4h-2.015c-1.579,0-1.887.752-1.887,1.854v2.431h3.77l-.491,3.806h-3.279v7.555h6.488a1.248,1.248,0,0,0,1.248-1.25v-20.118A1.247,1.247,0,0,0,1455.218,4461.926Z" transform="translate(-1433.85 -4461.926)"/>
					</svg>
				</a>
			</li>
		</ul>
	</nav>
</header>
<?php
}