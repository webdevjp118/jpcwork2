<?php
/**
 * luminouspa-new functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package luminouspa-new
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'luminouspa_new_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function luminouspa_new_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on luminouspa-new, use a find and replace
		 * to change 'luminouspa-new' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'luminouspa-new', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'luminouspa-new' ),
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
				'luminouspa_new_custom_background_args',
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
add_action( 'after_setup_theme', 'luminouspa_new_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function luminouspa_new_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'luminouspa_new_content_width', 640 );
}
add_action( 'after_setup_theme', 'luminouspa_new_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function luminouspa_new_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'luminouspa-new' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'luminouspa-new' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'luminouspa_new_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function luminouspa_new_scripts() {
	wp_enqueue_style( 'luminouspa-new-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'luminouspa-new-style', 'rtl', 'replace' );

	wp_enqueue_script( 'luminouspa-new-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'luminouspa_new_scripts' );

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
//======================================================================================================================================================
// カスタムフィールドの設定
//======================================================================================================================================================

//======================================================================================================================================================
// 投稿ページ等への投稿ページを追加するためのアクションフック
//======================================================================================================================================================
add_action('admin_menu', 'add_custom_inputbox');

//======================================================================================================================================================
// 追加した表示項目のデータ更新・保存のためのアクションフック
//======================================================================================================================================================
add_action('save_post', 'save_custom_postdata');
// 保存メソッド
function doSave($post_id, $data_name){
	
	$data = '';
	if(isset($_POST[$data_name])){
		$data = $_POST[$data_name]; 
		if($data_name == 'twitter_post') {
			if(strpos($data, 'twitterpostid=') === false) $data = 'twitterpostid='.base64_encode($_POST[$data_name]);
		}
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
	$post_type = get_post_type($post_id);
	if($post_type == 'therapist' || $post_type == 'therapist') {
		idSlugSave($post_id);
	}
	/* キャスト
	-------------------------*/
	doSave($post_id, 'name', 'therapist');
	doSave($post_id, 'age');
	doSave($post_id, 'start_date');
	doSave($post_id, 'blood');
	doSave($post_id, 'hobby');
	doSave($post_id, 'skill');
	doSave($post_id, 'like');
	doSave($post_id, 'comment');
	doSave($post_id, 'img_auth');
	doSave($post_id, 'price');
	doSave($post_id, 'twitter');
	doSave($post_id, 'twitter_post');
	doSave($post_id, 'link_auth_enter');
	doSave($post_id, 'link_auth_exit');
	doSave($post_id, 'link_logo');
	$product_img = array();
	$product_img_chk = array();
	for($i = 1; $i <= 5; $i++){
		// キャスト画像
		if(isset($_POST['product_img'.$i])){
			$product_img[$i] = $_POST['product_img'.$i];
		}else{
			$product_img[$i] = '';
		}
		if($product_img[$i] != get_post_meta($post_id, 'product_img'.$i, true)){
			update_post_meta($post_id, 'product_img'.$i,$product_img[$i]);
		}elseif($product_img[$i] == ''){
			delete_post_meta($post_id, 'product_img'.$i,get_post_meta($post_id,'product_img'.$i,true));
		}
	
		// チェックボックス
		if(isset($_POST['product_img_chk'.$i])){
			$product_img_chk[$i] = $_POST['product_img_chk'.$i];
		}else{
			$product_img_chk[$i] = '';
		}
		if($product_img_chk[$i] != get_post_meta($post_id, 'product_img_chk'.$i, true)){
			update_post_meta($post_id, 'product_img_chk'.$i,$product_img_chk[$i]);
		}elseif($product_img_chk[$i] == ''){
			delete_post_meta($post_id, 'product_img_chk'.$i,get_post_meta($post_id,'product_img_chk'.$i,true));
		}
	}
  
	/* ABOUT
	-------------------------*/
	doSave($post_id, 'about_comment');
  
	/* 料金システム
	-------------------------*/
	doSave($post_id, 'system_price');
  
	/* アクセス
	-------------------------*/
	doSave($post_id, 'shop_name');
	doSave($post_id, 'access');
	doSave($post_id, 'shop_open_hh');
	doSave($post_id, 'shop_open_mi');
	doSave($post_id, 'shop_close_hh');
	doSave($post_id, 'shop_close_mi');
	doSave($post_id, 'tel');
	doSave($post_id, 'web_reservation');
	doSave($post_id, 'map');
  
	/* トップバナー
	-------------------------*/
	$top_baner_img = array();
	for($i = 1; $i <= 5; $i++){
	  if(isset($_POST['top_baner'.$i])){
		$top_baner_img[$i] = $_POST['top_baner'.$i];
	  }else{
		$top_baner_img[$i] = '';
	  }
	  if($top_baner_img[$i] != get_post_meta($post_id, 'top_baner'.$i, true)){
		update_post_meta($post_id, 'top_baner'.$i,$top_baner_img[$i]);
	  }elseif($top_baner_img[$i] == ''){
		delete_post_meta($post_id, 'top_baner'.$i,get_post_meta($post_id,'top_baner'.$i,true));
	  }
	}
	/* SNS
	-------------------------*/
	doSave($post_id, 'sns_fb');
	doSave($post_id, 'sns_tw');
	doSave($post_id, 'sns_isg');
	
	/* copyright
	-------------------------*/
	doSave($post_id, 'copyright');
	
	/* 出勤スケジュール
	-------------------------*/
	doSave($post_id, 'shop_name');
	doSave($post_id, 'access');
	doSave($post_id, 'open_hh');
	doSave($post_id, 'open_mi');
	doSave($post_id, 'close_hh');
	doSave($post_id, 'close_mi');
	doSave($post_id, 'tel');
	doSave($post_id, 'web_reservation');
	doSave($post_id, 'map');
	for($i = 1; $i <= 5; $i++){
	  // キャスト画像
	  if(isset($_POST['product_img'.$i])){
		$product_img[$i] = $_POST['product_img'.$i];
	  }else{
		$product_img[$i] = '';
	  }
	  if($product_img[$i] != get_post_meta($post_id, 'product_img'.$i, true)){
		update_post_meta($post_id, 'product_img'.$i,$product_img[$i]);
	  }elseif($product_img[$i] == ''){
		delete_post_meta($post_id, 'product_img'.$i,get_post_meta($post_id,'product_img'.$i,true));
	  }
	}
	for($i = 1; $i <= 5; $i++){
		// Therapist images
		if(isset($_POST['therapist_img'.$i])){
		  $therapist_img[$i] = $_POST['therapist_img'.$i];
		}else{
		  $therapist_img[$i] = '';
		}
		if($therapist_img[$i] != get_post_meta($post_id, 'therapist_img'.$i, true)){
		  update_post_meta($post_id, 'therapist_img'.$i,$therapist_img[$i]);
		}elseif($therapist_img[$i] == ''){
		  delete_post_meta($post_id, 'therapist_img'.$i,get_post_meta($post_id,'therapist_img'.$i,true));
		}
	}
  
	$dateTime = new DateTime();
	for($i = 0; $i < 31; $i++) {
	  $baseDateTime = $dateTime->format('Y-m-d H:i:s');
	  $workDate = get_date_from_gmt($baseDateTime, 'Ymd');
	  doSave($post_id, $workDate.'open_hh');
	  doSave($post_id, $workDate.'open_mi');
	  doSave($post_id, $workDate.'close_hh');
	  doSave($post_id, $workDate.'close_mi');
	  $dateTime->modify('1 day');
	}
	
}
//======================================================================================================================================================
// 入力項目がどの投稿タイプのページに表示されるのかの設定
//======================================================================================================================================================
function add_custom_inputbox() {
  // 第一引数：編集画面のhtmlに挿入されるid属性名
  // 第二引数：管理画面に表示されるカスタムフィールド名
  // 第三引数：メタボックスの中に出力される関数名
  // 第四引数：管理画面に表示するカスタムフィールドの場所（postなら投稿、pageなら固定ページ、カスタム投稿タイプも指定できる）
  // 第五引数：配置される順序
  add_meta_box( 'about_id','ABOUT', 'custom_area5', 'page', 'normal' );
  add_meta_box( 'system_price_id','料金システム', 'custom_area4', 'page', 'normal' );
  add_meta_box( 'access_id','アクセス', 'custom_area2', 'page', 'normal' );
  add_meta_box( 'top_baner_id','トップバナー', 'custom_area3', 'page', 'normal' );
  add_meta_box( 'product_id','キャスト 情報','custom_area','product','normal');
  add_meta_box( 'sns_id','SNS', 'custom_area6', 'page', 'normal' );
  add_meta_box( 'copyright_id','copyright', 'custom_area7', 'page', 'normal' );
  add_meta_box( 'img_auth_id','年齢認証ページ', 'custom_area8', 'page', 'normal' );
  add_meta_box( 'work_schedule_id','出勤スケジュール', 'custom_area9', 'product', 'normal' );


  add_meta_box( 'therapist_id','セラピスト情報', 'custom_therapist_info_area', 'therapist', 'normal' );
  add_meta_box( 'therapist_schedule_id','出勤スケジュール', 'custom_therapist_schedule_area', 'therapist', 'normal' );
}

//======================================================================================================================================================
// 管理画面に表示する画面の設定
//======================================================================================================================================================
function custom_area(){
	//これがないと入力欄が更新されない！
	global $post;
	echo '名前　：<input type="text" name="name" value="'.get_post_meta($post->ID,'name',true).'"><br>';
	echo '年齢　：<input type="text" name="age" value="'.get_post_meta($post->ID,'age',true).'"><br>';
	  echo '指名料　：<input type="text" name="price" value="'.get_post_meta($post->ID,'price',true).'"><br>';
	echo '血液型　：<input type="text" name="blood" value="'.get_post_meta($post->ID,'blood',true).'">型<br>';
	  echo '身長　：<input type="text" name="height" value="'.get_post_meta($post->ID,'height',true).'">cm<br>';
	echo '趣味　：<input type="text" name="hobby" value="'.get_post_meta($post->ID,'hobby',true).'"><br>';
	echo '好きなタイプ　：<input type="text" name="like" value="'.get_post_meta($post->ID,'like',true).'"><br>';
	echo 'Twitter　：<input type="text" name="twitter" value="'.get_post_meta($post->ID,'twitter',true).'"><br>';
	echo 'コメント　：<textarea cols="70" rows="5" name="comment">'.get_post_meta($post->ID,'comment',true).'</textarea><br>';
	for($i = 1; $i <= 5; $i++){
	  echo '画像'.$i.'　　：<input type="text" name="product_img'.$i.'" value="'.get_post_meta($post->ID,'product_img'.$i,true).'">';
	  echo '<input type="checkbox" name="product_img_chk'.$i.'"';
	  if('on' == get_post_meta($post->ID,'product_img_chk'.$i,true)){
		echo ' checked="checked"';
	  }
	  echo '><br>';
	}
  }
function custom_therapist_info_area(){
	//これがないと入力欄が更新されない！
	global $post;
	echo '名前　：<input type="text" name="name" value="'.get_post_meta($post->ID,'name',true).'"><br>';
	echo '年齢　：<input type="text" name="age" value="'.get_post_meta($post->ID,'age',true).'"><br>';
	echo '入店日　：<input type="text" name="start_date" value="'.get_post_meta($post->ID,'start_date',true).'"><br>';
	echo '指名料　：<input type="text" name="price" value="'.get_post_meta($post->ID,'price',true).'"><br>';
	echo '血液型　：<input type="text" name="blood" value="'.get_post_meta($post->ID,'blood',true).'">型<br>';
	echo '身長　：<input type="text" name="height" value="'.get_post_meta($post->ID,'height',true).'">cm<br>';
	echo '趣味　：<input type="text" name="hobby" value="'.get_post_meta($post->ID,'hobby',true).'"><br>';
	echo '好きなタイプ　：<input type="text" name="like" value="'.get_post_meta($post->ID,'like',true).'"><br>';
	echo 'コメント　：<textarea cols="70" rows="5" name="comment">'.get_post_meta($post->ID,'comment',true).'</textarea><br>';
	echo 'Twitter　：<input type="text" name="twitter" value="'.get_post_meta($post->ID,'twitter',true).'"><br>';
	echo 'Twitter Post　：<textarea name="twitter_post">'.get_post_meta($post->ID,'twitter_post',true).'</textarea><br>';
	for($i = 1; $i <= 5; $i++){
		echo '画像'.$i.'　　：<input type="text" name="therapist_img'.$i.'" value="'.get_post_meta($post->ID,'therapist_img'.$i,true).'">';
		echo '<input type="checkbox" name="therapist_img_chk'.$i.'"';
		if('on' == get_post_meta($post->ID,'therapist_img_chk'.$i,true)){
			echo ' checked="checked"';
		}
		echo '><br>';
	}
}
  function custom_area2(){
	//これがないと入力欄が更新されない！
	global $post;
	echo '店舗名　：<input type="text" name="shop_name" value="'.get_post_meta($post->ID,'shop_name',true).'"><br>';
	echo 'アクセス　：<textarea cols="70" rows="10" name="access">'.get_post_meta($post->ID,'access',true).'</textarea><br>';
	echo '営業開始時刻　：<input type="text" size="2" maxlength="2" pattern="([0-2][0-9]|30)" title="必須。半角数字。入力範囲(00～30)" name="shop_open_hh" value="'.get_post_meta($post->ID,'shop_open_hh',true).'">：<input type="text" size="2" maxlength="2" pattern="([0-5][0-9])" title="必須。半角数字。入力範囲(00～59)" name="shop_open_mi" value="'.get_post_meta($post->ID,'shop_open_mi',true).'"><br>';
	echo '営業終了時刻　：<input type="text" size="2" maxlength="2" pattern="([0-3][0-9])" title="半角数字。入力範囲(00～39)" name="shop_close_hh" value="'.get_post_meta($post->ID,'shop_close_hh',true).'">：<input type="text" size="2" maxlength="2" pattern="([0-5][0-9])" title="半角数字。入力範囲(00～59)" name="shop_close_mi" value="'.get_post_meta($post->ID,'shop_close_mi',true).'"><br>';
	echo '電話　：<input type="text" name="tel" value="'.get_post_meta($post->ID,'tel',true).'"><span style="color:#aaa;">例：03-1234-5678</span><br>';
	echo 'WEB予約URL　：<input type="text" name="web_reservation" value="'.get_post_meta($post->ID,'web_reservation',true).'"><br>';
	echo '地図　：<textarea cols="70" rows="5" name="map">'.get_post_meta($post->ID,'map',true).'</textarea><br>';
	echo '<span style="color:#aaa;">　　　　　　　　　　　　　　　　　　　　　　　　　　　Googleマップなどからそのまま貼り付け可能です</span><br>';
	echo 'ロゴURL　：<input type="text" name="link_logo" value="'.get_post_meta($post->ID,'link_logo',true).'"><br>';
  }
  
  function custom_area3(){
	//これがないと入力欄が更新されない！
	global $post;
	for($i = 1; $i <= 5; $i++){
	  echo '画像'.$i.'　　：<input type="text" name="top_baner'.$i.'" value="'.get_post_meta($post->ID,'top_baner'.$i,true).'"><br><br>';
	}
  }
  
  function custom_area4(){
	//これがないと入力欄が更新されない！
	global $post;
	echo '<textarea cols="100" rows="15" name="system_price">'.get_post_meta($post->ID,'system_price',true).'</textarea><br>';
  }
  
  function custom_area5(){
	//これがないと入力欄が更新されない！
	global $post;
	echo '<textarea cols="100" rows="15" name="about_comment">'.get_post_meta($post->ID,'about_comment',true).'</textarea><br>';
  }
  
  function custom_area6(){
	  //これがないと入力欄が更新されない！
	  global $post;
	  echo 'Facebook URL　：<input type="text" name="sns_fb" value="'.get_post_meta($post->ID,'sns_fb',true).'"><br>';
	  echo 'Twitter URL　：<input type="text" name="sns_tw" value="'.get_post_meta($post->ID,'sns_tw',true).'"><br>';
	  echo 'Instagram URL　：<input type="text" name="sns_isg" value="'.get_post_meta($post->ID,'sns_isg',true).'"><br>';
  }
  function custom_area7(){
	//これがないと入力欄が更新されない！
	global $post;
	echo 'copyright　：<input type="text" name="copyright" value="'.get_post_meta($post->ID,'copyright',true).'"><br>';
  }
  function custom_area8(){
	//これがないと入力欄が更新されない！
	global $post;
	echo '背景画像URL　：<input type="text" name="img_auth" value="'.get_post_meta($post->ID,'img_auth',true).'"><br>';
	echo 'ENTERボタンリンク先　：<input type="text" name="link_auth_enter" value="'.get_post_meta($post->ID,'link_auth_enter',true).'"><br>';
	echo 'EXITボタンリンク先　：<input type="text" name="link_auth_exit" value="'.get_post_meta($post->ID,'link_auth_exit',true).'"><br>';
  }
  function custom_area9(){
	//これがないと入力欄が更新されない！
	global $post;
	$weekjp = array('日','月','火','水','木','金','土');
	$dateTime = getTodayYYYYMMDD();
	echo '※24時以降の時間を入力したい場合は、「26:00」といった形式でご入力ください。<br>';
	echo '※店舗の開店時間・閉店時間を入力いただいた当日の出退勤入力はできませんのでご注意ください。<br>';
	for($i = 0; $i < 31; $i++) {
	  $baseDateTime = $dateTime->format('Y-m-d H:i:s');
	  $workDateFormat = get_date_from_gmt($baseDateTime, 'Y/m/d').' （'.$weekjp[get_date_from_gmt($baseDateTime, 'w')].'）';
	  $workDate = get_date_from_gmt($baseDateTime, 'Ymd');
	  echo $workDateFormat.'　：';
	  echo '<input type="text" size="2" maxlength="2" pattern="([0-2][0-9]|30)" title="半角数字。入力範囲(00～30)" name="'.$workDate.'open_hh" value="'.get_post_meta($post->ID,$workDate.'open_hh',true).'">：<input type="text" size="2" maxlength="2" pattern="([0-5][0-9])" title="半角数字。入力範囲(00～59)" name="'.$workDate.'open_mi" value="'.get_post_meta($post->ID,$workDate.'open_mi',true).'">';
	  echo ' ～ ';
	  echo '<input type="text" size="2" maxlength="2" pattern="([0-3][0-9])" title="半角数字。入力範囲(00～39)" name="'.$workDate.'close_hh" value="'.get_post_meta($post->ID,$workDate.'close_hh',true).'">：<input type="text" size="2" maxlength="2" pattern="([0-5][0-9])" title="半角数字。入力範囲(00～59)" name="'.$workDate.'close_mi" value="'.get_post_meta($post->ID,$workDate.'close_mi',true).'"><br>';
	  $dateTime->modify('1 day');
	}
  }
function custom_therapist_schedule_area(){
	//これがないと入力欄が更新されない！
	global $post;
	$weekjp = array('日','月','火','水','木','金','土');
	$dateTime = getTodayYYYYMMDD();
	echo '※24時以降の時間を入力したい場合は、「26:00」といった形式でご入力ください。<br>';
	echo '※店舗の開店時間・閉店時間を入力いただいた当日の出退勤入力はできませんのでご注意ください。<br>';
	for($i = 0; $i < 31; $i++) {
		$baseDateTime = $dateTime->format('Y-m-d H:i:s');
		$workDateFormat = get_date_from_gmt($baseDateTime, 'Y/m/d').' （'.$weekjp[get_date_from_gmt($baseDateTime, 'w')].'）';
		$workDate = get_date_from_gmt($baseDateTime, 'Ymd');
		echo $workDateFormat.'　：';
		echo '<input type="text" size="2" maxlength="2" pattern="([0-2][0-9]|30)" title="半角数字。入力範囲(00～30)" name="'.$workDate.'open_hh" value="'.get_post_meta($post->ID,$workDate.'open_hh',true).'">：<input type="text" size="2" maxlength="2" pattern="([0-5][0-9])" title="半角数字。入力範囲(00～59)" name="'.$workDate.'open_mi" value="'.get_post_meta($post->ID,$workDate.'open_mi',true).'">';
		echo ' ～ ';
		echo '<input type="text" size="2" maxlength="2" pattern="([0-3][0-9])" title="半角数字。入力範囲(00～39)" name="'.$workDate.'close_hh" value="'.get_post_meta($post->ID,$workDate.'close_hh',true).'">：<input type="text" size="2" maxlength="2" pattern="([0-5][0-9])" title="半角数字。入力範囲(00～59)" name="'.$workDate.'close_mi" value="'.get_post_meta($post->ID,$workDate.'close_mi',true).'"><br>';
		$dateTime->modify('1 day');
	}
} 
  // 今日の取得
  function getTodayYYYYMMDD() {
	$get_page_id = get_page_by_path("home");
	$get_page_id = $get_page_id->ID;
	$shopCloseHHMI = get_post_meta($get_page_id,'shop_close_hh' ,true).get_post_meta($get_page_id,'shop_close_mi' ,true);
  
	$d = new DateTime();
	$dateTime = clone $d;
	$baseDateTime = $dateTime->format('Y-m-d H:i:s');
	$now = (get_date_from_gmt($baseDateTime, 'H')+24).get_date_from_gmt($baseDateTime, 'i');
	if (intval($now) <= intval($shopCloseHHMI)) {
	  $dateTime = clone $d;
	  $dateTime->modify('-1 day');
	  $baseDateTime = $dateTime->format('Y-m-d H:i:s');
	}
	return $dateTime;
  }
  



//======================================================================================================================================================
// カスタム投稿タイプの設定
//======================================================================================================================================================
// add_action('init', 'register_post_type_and_taxonomy');
function register_post_type_and_taxonomy() {
  register_post_type(
    'product'                                                 // カスタム投稿タイプ名
    , array(
      'labels' => array(
                    'name'           => 'キャスト'            //ダッシュボードに表示される名前
                    , 'add_new_item' => 'キャストを新規追加'  // 新規追加画面に表示される名前
                    , 'edit_item'    => 'キャストの編集'      // 編集画面に表示される名前
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

  register_post_type(
    'campaign'                                                      // カスタム投稿タイプ名
    , array(
        'labels' => array(
                      'name'           => 'キャンペーン'            //ダッシュボードに表示される名前
                      , 'add_new_item' => 'キャンペーンを新規追加'  // 新規追加画面に表示される名前
                      , 'edit_item'    => 'キャンペーンの編集'      // 編集画面に表示される名前
                      , 
                    )
        , 'public'       => true                                    // ダッシュボードに表示するか否か
        , 'hierarchical' => true                                    // 階層型にするか否か
        , 'has_archive'  => true                                    // アーカイブ（一覧表示機能）を持つか否か
        , 'supports'     => array(                                  // カスタム投稿ページに表示される項目
                            )
        , 'menu_position' => 5                                      // ダッシュボードで投稿の下に表示
        , 'rewrite' => array('with_front' => false)                 // パーマリンクの編集（campaignの前の階層URLを消して表示）
      )
  );
}
add_action('init', 'register_post_type_therapist');
function register_post_type_therapist() {
  register_post_type(
    'therapist'                                                 // カスタム投稿タイプ名
    , array(
      'labels' => array(
                    'name'           => 'セラピスト'            //ダッシュボードに表示される名前
                    , 'add_new_item' => 'セラピストを新規追加'  // 新規追加画面に表示される名前
                    , 'edit_item'    => 'セラピストの編集'      // 編集画面に表示される名前
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
//======================================================================================================================================================
// 一覧画面にカスタムタクソノミーを追加
//======================================================================================================================================================
/* product */
function manage_product_columns ($columns) {
	unset($columns['title']);
	$date_escape = $columns['date'];
	unset($columns['date']);
	$columns['name']  = '名前';
	$columns['age']   = '年齢';
	$columns['image'] = 'イメージ';
	$columns['date']  = $date_escape;
	return $columns;
}

function add_product_column ($column_name, $post_id) {
	$column_val = '';

	switch ($column_name) {
		case 'name':
		$name = get_post_meta($post_id,'name',true);
		if (isset($name) && $name) {
			echo edit_post_link($name,'','');
		} else {
			echo edit_post_link(__('None'),'','');
		}
		break;
		case 'age':
		$age = get_post_meta($post_id,'age',true);
		if (isset($age) && $age) {
			echo $age;
		} else {
			echo __('None');
		}
		break;
		case 'image':
		// 画像1だけ表示
		$product_img = get_post_meta($post_id,'product_img1',true);
		if (isset($product_img) && $product_img) {
	?>
			<div>
			<img class="img-responsive" alt="" src="<?php echo $product_img; ?>" width="80px" height="auto">
			</div>
	<?php
		} else {
			echo __('None');
		}
		break;
		default:
	}
}

add_filter('manage_edit-product_columns', 'manage_product_columns');
add_action('manage_product_posts_custom_column', 'add_product_column', 10, 2);

/* therapist */
function manage_therapist_columns ($columns) {
	unset($columns['title']);
	$date_escape = $columns['date'];
	unset($columns['date']);
	$columns['name']  = '名前';
	$columns['age']   = '年齢';
	$columns['image'] = 'イメージ';
	$columns['date']  = $date_escape;
	return $columns;
}

function add_therapist_column ($column_name, $post_id) {
	$column_val = '';

	switch ($column_name) {
		case 'name':
		$name = get_post_meta($post_id,'name',true);
		if (isset($name) && $name) {
			echo edit_post_link($name,'','');
		} else {
			echo edit_post_link(__('None'),'','');
		}
		break;
		case 'age':
		$age = get_post_meta($post_id,'age',true);
		if (isset($age) && $age) {
			echo $age;
		} else {
			echo __('None');
		}
		break;
		case 'image':
		// 画像1だけ表示
		$therapist_img = get_post_meta($post_id,'therapist_img1',true);
		if (isset($therapist_img) && $therapist_img) {
	?>
			<div>
			<img class="img-responsive" alt="" src="<?php echo $therapist_img; ?>" width="80px" height="auto">
			</div>
	<?php
		} else {
			echo __('None');
		}
		break;
		default:
	}
}

add_filter('manage_edit-therapist_columns', 'manage_therapist_columns');
add_action('manage_therapist_posts_custom_column', 'add_therapist_column', 10, 2);

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

// increase excerpt length
function my_excerpt_length($length){
	return 360;
}
add_filter('excerpt_length', 'my_excerpt_length');

function idSlugSave($post_id){
	remove_action( 'save_post', 'save_custom_postdata' );
	wp_update_post([
		"post_name" => $post_id,
		"ID" => $post_id,
	]);
	add_action( 'save_post', 'save_custom_postdata' );
}