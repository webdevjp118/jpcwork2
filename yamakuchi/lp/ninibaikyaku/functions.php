<?php
/**
 * ninibaikyaku functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ninibaikyaku
 */
if ( is_user_logged_in() ) {
// require_once(ABSPATH . 'wp-admin/includes/media.php');
	wp_enqueue_media();
}
if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'ninibaikyaku_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ninibaikyaku_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on ninibaikyaku, use a find and replace
		 * to change 'ninibaikyaku' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ninibaikyaku', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'ninibaikyaku' ),
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
				'ninibaikyaku_custom_background_args',
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

		// add_editor_style();
		// add_theme_support('editor-styles');
	}
endif;
add_action( 'after_setup_theme', 'ninibaikyaku_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ninibaikyaku_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ninibaikyaku_content_width', 640 );
}
add_action( 'after_setup_theme', 'ninibaikyaku_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ninibaikyaku_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'ninibaikyaku' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'ninibaikyaku' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'ninibaikyaku_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ninibaikyaku_scripts() {
	wp_enqueue_style( 'ninibaikyaku-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'ninibaikyaku-style', 'rtl', 'replace' );

	wp_enqueue_script( 'ninibaikyaku-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ninibaikyaku_scripts' );

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

add_action('init', 'register_post_type_cmedia');
function register_post_type_cmedia() {
  register_post_type(
    'cmedia'                                                 // カスタム投稿タイプ名
    , array(
      'labels' => array(
                    'name'           => '会社メディア'            //ダッシュボードに表示される名前
                    , 'add_new_item' => 'メディアを新規追加'  // 新規追加画面に表示される名前
                    , 'edit_item'    => 'メディアの編集'      // 編集画面に表示される名前
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

add_action('init', 'register_post_type_cfaq');
function register_post_type_cfaq() {
  register_post_type(
    'cfaq'                                                 // カスタム投稿タイプ名
    , array(
      'labels' => array(
                    'name'           => 'よくある質問'            //ダッシュボードに表示される名前
                    , 'add_new_item' => 'よくある質問を新規追加'  // 新規追加画面に表示される名前
                    , 'edit_item'    => 'よくある質問の編集'      // 編集画面に表示される名前
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

add_action('init', 'register_post_type_cvideo');
function register_post_type_cvideo() {
  register_post_type(
    'cvideo'                                                 // カスタム投稿タイプ名
    , array(
      'labels' => array(
                    'name'           => 'ビデオ'            //ダッシュボードに表示される名前
                    , 'add_new_item' => 'ビデオを新規追加'  // 新規追加画面に表示される名前
                    , 'edit_item'    => 'ビデオの編集'      // 編集画面に表示される名前
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
// add_action('wp_insert_post', 'change_slug');
// function change_slug( $post_id ) {
//        // Making sure this runs only when a 'therapist' post type is created
//        $slug = 'cmedia';
//        if ( $slug != $_POST['post_type'] ) {
//           return;
//        }
//        wp_update_post( array(
//         'ID' => $post_id,
//         'post_name' => $post_id // slug
//        ));
// 	   return;
// }

//======================================================================================================================================================
// 追加した表示項目のデータ更新・保存のためのアクションフック
//======================================================================================================================================================
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
	/* メディア
	-------------------------*/
	doSave($post_id, 'mtitle');
	doSave($post_id, 'mdate');
	doSave($post_id, 'content');
	doSave($post_id, 'category');
	doSave($post_id, 'description');
	doSave($post_id, 'image');
	doSave($post_id, 'pdf');
	doSave($post_id, 'website');

	/* よくある質問
	-------------------------*/
	doSave($post_id, 'question');
	doSave($post_id, 'answer');
	doSave($post_id, 'order');
	doSave($post_id, 'toporder');
	doSave($post_id, 'category');

	/* ビデオ
	-------------------------*/
	doSave($post_id, 'vurl');
	doSave($post_id, 'vtitle');
	doSave($post_id, 'vcontent');
	doSave($post_id, 'vdate');
	doSave($post_id, 'vduration');
	doSave($post_id, 'vpeople');
}
function custom_media_info_area(){
	$media_cats = get_media_category();
	//これがないと入力欄が更新されない！
	global $post;
	echo 'タイトル　：<input type="text" name="mtitle" value="'.get_post_meta($post->ID,'mtitle',true).'"><br>';
	echo '日付　：<input type="date" min="2010-01-01" max="2025-12-31" name="mdate" value="'.get_post_meta($post->ID,'mdate',true).'"><br>';
	echo '内容　：<textarea cols="70" rows="5" name="content">'.get_post_meta($post->ID,'content',true).'</textarea><br>';
	echo 'カテゴリ　：<select name="category">';
	$post_category = get_post_meta($post->ID, 'category', true);
	foreach($media_cats as $category) {
		if($category == $post_category) echo '<option value="'.$category.'" selected>'.$category.'</option>';
		else echo '<option value="'.$category.'">'.$category.'</option>';
	}
	echo '</select><br>';
	echo 'イメージ　：<input type="text" name="image" class="input-media" data-type="image" value="'.get_post_meta($post->ID,'image',true).'"><button type="button" class="admin-media" data-type="image">選択</button><br>';
	echo 'PDF　：<input type="text" name="pdf" class="input-media" data-type="pdf" value="'.get_post_meta($post->ID,'pdf',true).'"><button type="button" class="admin-media" data-type="pdf">選択</button><br>';
	echo 'ウェブサイト　：<input type="text" name="website" class="input-media" value="'.get_post_meta($post->ID,'website',true).'"><br>';
}
function custom_faq_info_area(){
	$media_cats = get_faq_category();
	//これがないと入力欄が更新されない！
	global $post;
	echo 'Q　：<textarea cols="70" rows="5" name="question">'.get_post_meta($post->ID,'question',true).'</textarea><br>';
	echo 'A　：<textarea cols="70" rows="5" name="answer">'.get_post_meta($post->ID,'answer',true).'</textarea><br>';
	echo 'カテゴリ　：<select name="category">';
	$post_category = get_post_meta($post->ID, 'category', true);
	$index = 0;
	foreach($media_cats as $category) {
		if($index == $post_category) echo '<option value="'.$index.'" selected>'.$category.'</option>';
		else echo '<option value="'.$index.'">'.$category.'</option>';
		$index = $index + 1;
	}
	echo '</select><br>';
	echo '表示オーダー　：<input type="number" name="order" value="'.get_post_meta($post->ID,'order',true).'"><br>';
	echo 'トップページ表示オーダー　：<input type="number" name="toporder" value="'.get_post_meta($post->ID,'toporder',true).'"><br>';
}

function custom_video_info_area(){
	//これがないと入力欄が更新されない！
	global $post;
	echo 'タイトル　：<input type="text" name="vtitle" value="'.get_post_meta($post->ID,'vtitle',true).'"><br>';
	echo 'URL　：<input type="text" name="vurl" value="'.get_post_meta($post->ID,'vurl',true).'"><br>';
	echo '日付　：<input type="date" min="2010-01-01" max="2025-12-31" name="vdate" value="'.get_post_meta($post->ID,'vdate',true).'"><br>';
	echo '時間　：<input type="text" name="vduration" value="'.get_post_meta($post->ID,'vduration',true).'"><br>';
	echo '内容　：<textarea cols="70" rows="5" name="vcontent">'.get_post_meta($post->ID,'vcontent',true).'</textarea><br>';
	echo '出演　：<textarea cols="70" rows="5" name="vpeople">'.get_post_meta($post->ID,'vpeople',true).'</textarea><br>';
}
//======================================================================================================================================================
// 入力項目がどの投稿タイプのページに表示されるのかの設定
//======================================================================================================================================================
function add_custom_inputbox() {
	add_meta_box( 'cmedia_id','メディア情報', 'custom_media_info_area', 'cmedia', 'normal' );
	add_meta_box( 'cfaq_id','よくある質問情報', 'custom_faq_info_area', 'cfaq', 'normal' );
	add_meta_box( 'cvideo_id','ビデオ情報', 'custom_video_info_area', 'cvideo', 'normal' );
}
//======================================================================================================================================================
// 投稿ページ等への投稿ページを追加するためのアクションフック
//======================================================================================================================================================
add_action('admin_menu', 'add_custom_inputbox');

function manage_cmedia_columns ($columns) {
	unset($columns['title']);
	unset($columns['date']);
	$columns['mtitle']  = 'タイトル';
	$columns['mdate']  = '日付';
	$columns['category']   = 'カテゴリ';
	$columns['image'] = 'イメージ';
	
	return $columns;
}
function manage_cfaq_columns ($columns) {
	unset($columns['title']);
	unset($columns['date']);
	$columns['question']  = 'Q';
	$columns['answer']  = 'A';
	$columns['category']   = 'カテゴリ';
	$columns['order'] = '表示オーダー';
	$columns['toporder'] = 'トップページ表示オーダー';
	
	return $columns;
}
function manage_cvideo_columns ($columns) {
	unset($columns['title']);
	unset($columns['date']);
	$columns['vtitle']  = 'タイトル';
	$columns['vdate']  = '日付';
	$columns['vduration']   = '時間';
	return $columns;
}
function add_cmedia_column ($column_name, $post_id) {
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
		case 'category':
			$category = get_post_meta($post_id,'category',true);
			if (isset($category) && $category) {
				echo edit_post_link($category,'','');
			} else {
				echo edit_post_link(__('None'),'','');
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
function add_cfaq_column ($column_name, $post_id) {
	$column_val = '';

	switch ($column_name) {
		case 'question':
			$name = get_post_meta($post_id,'question',true);
			if (isset($name) && $name) {
				echo edit_post_link($name,'','');
			} else {
				echo edit_post_link(__('None'),'','');
			}
		break;
		case 'answer':
			$name = get_post_meta($post_id,'answer',true);
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
		case 'category':
			$category = get_post_meta($post_id,'category',true);
			$cfaq_cats = get_faq_category();
			$category_name = $cfaq_cats[$category];
			if (isset($category_name) && $category_name) {
				echo edit_post_link($category_name,'','');
			} else {
				echo edit_post_link(__('None'),'','');
			}
			break;
		case 'order':
			$order = get_post_meta($post_id,'order',true);
			if (isset($order) && $order) {
				echo edit_post_link($order,'','');
			} else {
				echo edit_post_link(__('None'),'','');
			}
		break;
		case 'toporder':
			$toporder = get_post_meta($post_id,'toporder',true);
			if (isset($toporder) && $toporder) {
				echo edit_post_link($toporder,'','');
			} else {
				echo edit_post_link(__('None'),'','');
			}
		break;
		default:
	}
}

function add_cvideo_column ($column_name, $post_id) {
	$column_val = '';

	switch ($column_name) {
		case 'vtitle':
			$name = get_post_meta($post_id,'vtitle',true);
			if (isset($name) && $name) {
				echo edit_post_link($name,'','');
			} else {
				echo edit_post_link(__('None'),'','');
			}
			break;
		case 'vdate':
			$age = get_post_meta($post_id,'vdate',true);
			if (isset($age) && $age) {
				echo $age;
			} else {
				echo __('None');
			}
			break;
		case 'vduration':
			$age = get_post_meta($post_id,'vduration',true);
			if (isset($age) && $age) {
				echo $age;
			} else {
				echo __('None');
			}
			break;
		default:
	}
}

add_filter('manage_edit-cmedia_columns', 'manage_cmedia_columns');
add_action('manage_cmedia_posts_custom_column', 'add_cmedia_column', 10, 2);

add_filter('manage_edit-cfaq_columns', 'manage_cfaq_columns');
add_action('manage_cfaq_posts_custom_column', 'add_cfaq_column', 10, 2);

add_filter('manage_edit-cvideo_columns', 'manage_cvideo_columns');
add_action('manage_cvideo_posts_custom_column', 'add_cvideo_column', 10, 2);

function custom_admin_enqueue($hook) {
    // Only add to the edit.php admin page.
    // See WP docs.
    // if ('edit.php' !== $hook) {
    //     return;
    // }
    wp_enqueue_script('custom_admin_script', get_template_directory_uri().'/js/adminscript.js');
}

add_action('admin_enqueue_scripts', 'custom_admin_enqueue');













//メディア category
function get_media_category() {
	return array(
		'ラジオ',
		'web',
		'新聞',
		'雑誌',
		'コラボ企画',
	);
}
function get_faq_category() {
	return array(
		'任意売却Dr.について',
		'任意売却Dr.のサービスについて',
		'住宅ローン滞納・任意売却について',
	);
}
function get_media_color($media_cat) {
	$color = '#ff909d';
	switch($media_cat) {
		case 'ラジオ':
			$color = '#f2bd66';
			break;
		case 'web':
			$color = '#abd475';
			break;
		case '新聞':
			$color = '#8ac8e7';
			break;
		case '雑誌':
			$color = '#c3b4e3';
			break;
		case 'コラボ企画':
			$color = '#ff909d';
			break;
		default:
			$color = '#ff909d';
	}
	return $color;
}