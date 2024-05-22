<?php
/**
 * soulpre functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package soulpre
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function soulpre_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on soulpre, use a find and replace
		* to change 'soulpre' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'soulpre', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'soulpre' ),
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
			'soulpre_custom_background_args',
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
add_action( 'after_setup_theme', 'soulpre_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function soulpre_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'soulpre_content_width', 640 );
}
add_action( 'after_setup_theme', 'soulpre_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function soulpre_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'soulpre' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'soulpre' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'soulpre_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function soulpre_scripts() {
	wp_enqueue_style( 'soulpre-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'soulpre-style', 'rtl', 'replace' );

	wp_enqueue_script( 'soulpre-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'soulpre_scripts' );

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
function custom_admin_enqueue($hook) {
    // Only add to the edit.php admin page.
    // See WP docs.
    // if ('edit.php' !== $hook) {
    //     return;
    // }
    wp_enqueue_script('custom_admin_script', get_template_directory_uri().'/js/adminscript.js');

	if ( is_user_logged_in() ) {
		wp_enqueue_media();
	}
}
add_action('admin_enqueue_scripts', 'custom_admin_enqueue');


add_action('init', 'register_post_type_news');
function register_post_type_news() {
  register_post_type(
    'news'                                                 // カスタム投稿タイプ名
    , array(
      'labels' => array(
                    'name'           => 'NEWS'            //ダッシュボードに表示される名前
                    , 'add_new_item' => 'NEWSを新規追加'  // 新規追加画面に表示される名前
                    , 'edit_item'    => 'NEWSの編集'      // 編集画面に表示される名前
                    , 
                  )
      , 'public'       => true                                // ダッシュボードに表示するか否か
      , 'hierarchical' => true                                // 階層型にするか否か
      , 'has_archive'  => true                                // アーカイブ（一覧表示機能）を持つか否か
	  , 'taxonomies'   => array( 'category' )
      , 'supports'     => array(   
							'title',                           // カスタム投稿ページに表示される項目
							'editor',
                             'custom-fields'                  // カスタムフィールド
                          )
      , 'menu_position' => 5                                  // ダッシュボードで投稿の下に表示
      , 'rewrite'       => array('with_front' => false)       // パーマリンクの編集（productの前の階層URLを消して表示）
      )
  );
}

add_action('init', 'register_post_type_column');
function register_post_type_column() {
  register_post_type(
    'column'                                                 // カスタム投稿タイプ名
    , array(
      'labels' => array(
                    'name'           => 'コラム'            //ダッシュボードに表示される名前
                    , 'add_new_item' => 'コラムを新規追加'  // 新規追加画面に表示される名前
                    , 'edit_item'    => 'コラムの編集'      // 編集画面に表示される名前
                    , 
                  )
      , 'public'       => true                                // ダッシュボードに表示するか否か
      , 'hierarchical' => true                                // 階層型にするか否か
      , 'has_archive'  => true                                // アーカイブ（一覧表示機能）を持つか否か
	  , 'taxonomies'   => array( 'category' )
      , 'supports'     => array(   
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

add_action('init', 'register_post_type_product');
function register_post_type_product() {
  register_post_type(
    'product'                                                 // カスタム投稿タイプ名
    , array(
      'labels' => array(
                    'name'           => '製品情報'            //ダッシュボードに表示される名前
                    , 'add_new_item' => '製品情報を新規追加'  // 新規追加画面に表示される名前
                    , 'edit_item'    => '製品情報の編集'      // 編集画面に表示される名前
                    , 
                  )
      , 'public'       => true                                // ダッシュボードに表示するか否か
      , 'hierarchical' => true                                // 階層型にするか否か
      , 'has_archive'  => true                                // アーカイブ（一覧表示機能）を持つか否か
	  , 'taxonomies'   => array( 'category' )
      , 'supports'     => array(   
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

add_action('admin_menu', 'add_custom_inputbox');
function add_custom_inputbox() {
	add_meta_box( 'product_id','製品情報', 'custom_product_info_area', 'product', 'normal' );
}

function custom_product_info_area(){
	global $post;
	$current_post_id = $post->ID;
	echo '製品名 ：<input type="text" name="product_name" value="'.get_post_meta($post->ID,'product_name',true).'"><br><br>';
	echo '製品名（EN) ：<input type="text" name="product_name_en" value="'.get_post_meta($post->ID,'product_name_en',true).'"><br><br>';
	echo '製品説明 ：<input type="text" name="product_desc" value="'.get_post_meta($post->ID,'product_desc',true).'"><br><br>';
	echo '製品画像　：<input type="text" class="admin-input-media" data-id="product_pic"  name="product_pic" value="'.get_post_meta($post->ID,'product_pic',true).'"><button type="button" class="admin-upbutton" data-id="product_pic">選択</button><br><br>';
	echo 'パテント　：<input type="text" class="admin-input-media" data-id="patent_pic"  name="patent_pic" value="'.get_post_meta($post->ID,'patent_pic',true).'"><button type="button" class="admin-upbutton" data-id="patent_pic">選択</button><br><br>';
}

add_action('save_post', 'save_custom_postdata');
function save_custom_postdata($post_id){
	global $post;
	$post_type = get_post_type($post_id);
	if($post_type == 'product') {
		doSave($post_id, 'product_name');
		doSave($post_id, 'product_name_en');
		doSave($post_id, 'product_desc');
		doSave($post_id, 'product_pic');
		doSave($post_id, 'patent_pic');
	}
}

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
	
	if( $data_name == "user_id") {
		$nickname = get_post_meta($data, 'nickname', true);
		update_post_meta($post_id, 'nickname', $nickname);
	}
}