<?php
/**
 * Yoyogi functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Yoyogi
 */
if ( is_user_logged_in() ) {
// require_once(ABSPATH . 'wp-admin/includes/media.php');
	wp_enqueue_media();
}
if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'yoyogi_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function yoyogi_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Yoyogi, use a find and replace
		 * to change 'yoyogi' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'yoyogi', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'yoyogi' ),
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
				'yoyogi_custom_background_args',
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
add_action( 'after_setup_theme', 'yoyogi_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function yoyogi_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'yoyogi_content_width', 640 );
}
add_action( 'after_setup_theme', 'yoyogi_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function yoyogi_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'yoyogi' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'yoyogi' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'yoyogi_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function yoyogi_scripts() {
	wp_enqueue_style( 'yoyogi-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'yoyogi-style', 'rtl', 'replace' );

	wp_enqueue_script( 'yoyogi-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'yoyogi_scripts' );

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


/************Custom Code Start********************************************/

add_action('init', 'register_post_type_cevent');
function register_post_type_cevent() {
  register_post_type(
    'cevent'                                                 // カスタム投稿タイプ名
    , array(
      'labels' => array(
                    'name'           => '活動'            //ダッシュボードに表示される名前
                    , 'add_new_item' => '活動を新規追加'  // 新規追加画面に表示される名前
                    , 'edit_item'    => '活動の編集'      // 編集画面に表示される名前
                    , 
                  )
      , 'public'       => true                                // ダッシュボードに表示するか否か
      , 'hierarchical' => true                                // 階層型にするか否か
      , 'has_archive'  => true                                // アーカイブ（一覧表示機能）を持つか否か
      , 'supports'     => array(                              // カスタム投稿ページに表示される項目
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
	//-1になると項目が変わったことになるので、項目を更新する
	if( $data != get_post_meta($post_id, $data_name, true)){
	  update_post_meta($post_id, $data_name,$data);
	}elseif($data == ""){
	  delete_post_meta($post_id, $data_name,get_post_meta($post_id,$data_name,true));
	}
}
function save_custom_postdata($post_id){
	/* 活動
	-------------------------*/
	doSave($post_id, 'mtitle');
	doSave($post_id, 'mdate');
	doSave($post_id, 'content');
	doSave($post_id, 'image');
}

function custom_event_info_area(){
	//これがないと入力欄が更新されない！
	global $post;
	echo 'タイトル　：<input type="text" name="mtitle" value="'.get_post_meta($post->ID,'mtitle',true).'"><br>';
	echo '日付　：<input type="date" min="2010-01-01" max="2025-12-31" name="mdate" value="'.get_post_meta($post->ID,'mdate',true).'"><br>';
	echo '内容　：<textarea cols="70" rows="5" name="content">'.get_post_meta($post->ID,'content',true).'</textarea><br>';
	echo 'イメージ　：<input type="text" name="image" class="input-media" data-type="image" value="'.get_post_meta($post->ID,'image',true).'"><button type="button" class="admin-media" data-type="image">選択</button><br>';
}

function add_custom_inputbox() {
	add_meta_box( 'cmedia_id','活動情報', 'custom_event_info_area', 'cevent', 'normal' );
}
add_action('admin_menu', 'add_custom_inputbox');
function manage_cevent_columns ($columns) {
	unset($columns['title']);
	unset($columns['date']);
	$columns['mtitle']  = 'タイトル';
	$columns['mdate']  = '日付';
	$columns['image'] = 'イメージ';
	
	return $columns;
}
function add_cevent_column ($column_name, $post_id) {
	$column_val = '';

	switch ($column_name) {
		case 'mtitle':
		$name = get_post_meta($post_id,'mtitle',true);
		if (isset($name) && $name) {
			echo edit_post_link($name,'','');
		} else {
			echo edit_post_link(__('None'),'','');
		}
		break;
		case 'mdate':
		$age = get_post_meta($post_id,'mdate',true);
		if (isset($age) && $age) {
			echo $age;
		} else {
			echo __('None');
		}
		break;
		case 'image':
		// 画像1だけ表示
		$image = get_post_meta($post_id,'image',true);
		if (isset($image) && $image) {
	?>
			<div>
			<img class="img-responsive" alt="" src="<?php echo $image; ?>" width="80px" height="auto">
			</div>
	<?php
		} else {
			echo __('None');
		}
		break;
		default:
	}
}
add_filter('manage_edit-cevent_columns', 'manage_cevent_columns');
add_action('manage_cevent_posts_custom_column', 'add_cevent_column', 10, 2);

function custom_admin_enqueue($hook) {
    // Only add to the edit.php admin page.
    // See WP docs.
    // if ('edit.php' !== $hook) {
    //     return;
    // }
    wp_enqueue_script('custom_admin_script', get_template_directory_uri().'/js/adminscript.js');
}

add_action('admin_enqueue_scripts', 'custom_admin_enqueue');