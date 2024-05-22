<?php
/**
 * repair functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package repair
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
function repair_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on repair, use a find and replace
		* to change 'repair' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'repair', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'repair' ),
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
			'repair_custom_background_args',
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
add_action( 'after_setup_theme', 'repair_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function repair_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'repair_content_width', 640 );
}
add_action( 'after_setup_theme', 'repair_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function repair_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'repair' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'repair' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'repair_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function repair_scripts() {
	wp_enqueue_style( 'repair-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'repair-style', 'rtl', 'replace' );

	wp_enqueue_script( 'repair-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'repair_scripts' );

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


/*******************************Custom Code*************************************/
/* Register Admin Javascript */
function custom_admin_enqueue($hook) {
    // Only add to the edit.php admin page.
    // See WP docs.
    // if ('edit.php' !== $hook) {
    //     return;
    // }
	wp_enqueue_script('custom_admin_ajaxzip3_js', get_template_directory_uri().'/js/ajaxzip3-source.js');
    wp_enqueue_script('custom_admin_js', get_template_directory_uri().'/js/adminscript.js');
	wp_localize_script('custom_admin_js', 'adminjs', array(
		'ajaxurl' => admin_url('admin-ajax.php'),
		'security' => wp_create_nonce('shapi-string'),
	));
}
add_action('admin_enqueue_scripts', 'custom_admin_enqueue');
if ( is_user_logged_in() ) {
	// require_once(ABSPATH . 'wp-admin/includes/media.php');
		wp_enqueue_media();
}
/* Register API */
function create_api_tables() {
	global $wpdb;
	$table_name = $wpdb->prefix."think_table";
	global $charset_collate;
	$charset_collate = $wpdb->get_charset_collate();
	global $db_version;

	if($wpdb->get_var("SHOW TABLES LIKE '".$table_name."'") != $table_name) {
		$create_sql = "CREATE TABLE ".$table_name."(
			id INT(11) NOT NULL auto_increment,
			post_id INT(11) NOT NULL,
			client_ip VARCHAR(40) NOT NULL,
			
			PRIMARY KEY (id))$charset_collate;";
		require_once(ABSPATH."wp-admin/includes/upgrade.php");
		dbDelta($create_sql);
	}

	if(!isset($wpdb->think_table)) {
		$wpdb->think_table = $table_name;
		$wpdb->tables[] = str_replace($wpdb->prefix, '', $table_name);
	}
}
add_action('init', 'create_api_tables');
function shapi_script() {
	wp_enqueue_script('shapi-script', get_template_directory_uri().'/js/shapi.js', array('jquery'), '1.0.0', true);
	wp_localize_script('shapi-script', 'shapi', array(
		'ajaxurl' => admin_url('admin-ajax.php'),
		'security' => wp_create_nonce('shapi-string'),
	));
}
add_action('wp_enqueue_scripts', 'shapi_script');
function shapi_callback() {
	check_ajax_referer('shapi-string', 'security');
	
	$sh_type = $_POST['sh_type'];
	$client_ip = get_client_ip();
	global $wpdb;
	if($sh_type == 'add_think' || $sh_type == 'del_think') {
		$post_id = intval($_POST['sh_id']);
		$res=[];
		if($sh_type == 'add_think') {
			$row = $wpdb->get_results("SELECT id FROM $wpdb->think_table WHERE client_ip = '$client_ip' AND post_id = '$post_id'");
			if(empty($row)) {
				$wpdb->insert($wpdb->think_table, array('post_id' => $post_id, 'client_ip' => $client_ip), array('%d', '%s'));
			}
			$res['rs_type'] = 'add_think';
		}
		else if($sh_type == 'del_think') {
			$wpdb->delete($wpdb->think_table, array('post_id' => $post_id, 'client_ip' => $client_ip), array('%d', '%s'));
			$res['rs_type'] = 'del_think';
		}
		$totalrow = $wpdb->get_results("SELECT post_id FROM $wpdb->think_table WHERE client_ip = '$client_ip'");
		$res['rs_id'] = $post_id;
		$think_list = [];
		foreach($totalrow as $eachrow) {
			$think_post = [];
			$loop_id = $eachrow->post_id;
			$think_post['post_id'] = $loop_id;
			$think_post['title'] = get_the_title($loop_id);
			$think_post['description'] = get_post_meta($loop_id, 'description', true);
			$think_post['off_days'] = get_post_meta($loop_id, 'off_days', true); if(empty($think_post['off_days'])) $think_post['off_days'] = "　";
			$think_post['station'] = get_post_meta($loop_id, 'station', true); if(empty($think_post['station'])) $think_post['station'] = "　";
			$think_post['photo_big'] = get_post_meta($loop_id, 'photo_big', true);
			if(empty($think_post['photo_big'])) $think_post['photo_big'] = get_stylesheet_directory_uri().'/images/default.jpg';
			$think_list[] = $think_post;
		}
		$res['think_list'] = $think_list;
	}
	else if($sh_type='get_cities') {
		$prefecture = $_POST['prefecture'];
		$res = [];
		$res['rs_type'] = 'get_cities';
		$totalrow = $wpdb->get_results("SELECT id FROM prefectures WHERE name = '$prefecture'");
		$pref_id = 0;
		foreach($totalrow as $eachrow) {
			$pref_id = $eachrow->id;
		}
		$totalrow = $wpdb->get_results("SELECT name FROM cities WHERE area_id = $pref_id");
		$cities = [];
		foreach($totalrow as $eachrow) {
			array_push($cities, $eachrow->name);
		}
		$res['cities'] = $cities;
	}

	echo json_encode($res);
	
	die();	
} 
add_action('wp_ajax_shapi', 'shapi_callback');
add_action('wp_ajax_nopriv_shapi', 'shapi_callback');
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



/* Admin CSS styles */
function adminStylesCss() {
    $url = get_settings('siteurl');
    $url = get_stylesheet_directory_uri().'/css/admin.css';
    echo '<link rel="stylesheet" type="text/css" href="' . $url . '" />';
}
add_action('admin_head', 'adminStylesCss');

function add_custom_inputbox() {
	add_meta_box( 'shop_id','店舗情報', 'custom_shop_inpubox', 'shop', 'normal' );
	add_meta_box( 'cpost_id','投稿情報', 'custom_post_info_area', 'post', 'normal' );
	add_meta_box( 'maker_id','メーカー情報', 'custom_maker_info_area', 'maker', 'normal' );
}
add_action('admin_menu', 'add_custom_inputbox');
function custom_post_info_area(){
	//これがないと入力欄が更新されない！
	global $post;

	echo '<table class="am_table">';
	echo '<tr><td>PICKUP記事　：</td>';
	$post_pickup = get_post_meta($post->ID,'pickup',true);
	if(!empty($post_pickup)) {
		echo '<td><div><input type="checkbox" name="pickup" value="pickup" checked></td></tr>';
	}
	else {
		echo '<td><div><input type="checkbox" name="pickup" value="pickup"></td></tr>';
	}
	echo '<tr><td>要約　：</td><td><textarea name="summary" style="width:400px;">'.get_post_meta($post->ID,'summary',true).'</textarea></td></tr>';
	echo '<tr><td>店舗ID　：</td><td><input type="text" name="shop_id" value="'.get_post_meta($post->ID,'shop_id',true).'"></td></tr>';
	echo '</table>';
}
function custom_maker_info_area(){
	//これがないと入力欄が更新されない！
	global $post;

	echo '<table class="am_table">';
	echo '<tr><td>表示順　：</td><td><div><input type="number" name="order" value="'.get_post_meta($post->ID,'order',true).'"></td></tr>';
	echo '<tr><td>URL　：</td><td><div><input type="text" name="url" value="'.get_post_meta($post->ID,'url',true).'"></td></tr>';
	echo '</table>';
}
function custom_shop_inpubox(){
	//これがないと入力欄が更新されない！
	global $post;
	global $g_shop_props;

	echo '<table class="am_table">';
	echo '<tr><th>ID</th><td>'.$post->ID.'</td></tr>';
	echo '<tr><th>電話番号</th><td><input type="text" name="tel" value="'.get_post_meta($post->ID,'tel',true).'"></td></tr>';
	echo '<tr><th>店舗HP URL</th><td><input type="text" name="url" value="'.get_post_meta($post->ID,'url',true).'"></td></tr>';
	echo '<tr><th>開店時間</th><td>';
	$time_list = [];
	for($i=0;$i<24;$i++){
		$each_time = '';
		if($i<10) $each_time = '0'.$i;
		else $each_time = $i;
		array_push($time_list, $each_time.':00');
		array_push($time_list, $each_time.':30');
	}
	echo '<select name="open_time"><option value=""></option>';
	foreach($time_list as $each_time) {
		if(get_post_meta($post->ID,'open_time',true) == $each_time) echo '<option selected value="'.$each_time.'">'.$each_time.'</option>';
		else echo '<option value="'.$each_time.'">'.$each_time.'</option>';
	}
	echo '</select></td></tr>';
	echo '<tr><th>閉店時間</th><td>';
	echo '<select name="close_time"><option value=""></option>';
	foreach($time_list as $each_time) {
		if(get_post_meta($post->ID,'close_time',true) == $each_time) echo '<option selected value="'.$each_time.'">'.$each_time.'</option>';
		else echo '<option value="'.$each_time.'">'.$each_time.'</option>';
	}
	echo '</select></td></tr>';
	echo '<tr><th>定休日</th><td>';
	$comma_str = get_post_meta($post->ID,'off_days',true);
	if(empty($comma_str)) $comma_str = "";
	$comma_words = explode(',',$comma_str);
	for($i=0;$i<count($g_shop_props['off_days']);$i++) {
		if(in_array($g_shop_props['off_days'][$i], $comma_words)) {
			echo '<div class="checkbox_wrap"><input checked type="checkbox" name="off_days'.$i.'" value="'.$g_shop_props['off_days'][$i].'">'.$g_shop_props['off_days'][$i].'</div>';
		}
		else {
			echo '<div class="checkbox_wrap"><input type="checkbox" name="off_days'.$i.'" value="'.$g_shop_props['off_days'][$i].'">'.$g_shop_props['off_days'][$i].'</div>';
		}
	}
	echo '</td></tr>';
	echo '<tr><th>定休日以外の詳細</th><td><div><input type="text" name="off_days_more" value="'.get_post_meta($post->ID,'off_days_more',true).'"></td></tr>';
	echo '<tr><th>店舗郵便番号</th><td><div>';
	echo '<input type="text" name="zip" value="'.get_post_meta($post->ID,'zip',true).'" style="width:200px">';
	echo '<button type="button" class="ziptoaddress">郵便番号から住所入力</button>';
	echo '<input type="text" name="temp_prefecture" style="display:none"><input type="text" name="temp_city" style="display:none">';
	echo '</td></tr>';
	echo '<tr><th>店舗住所</th><td>';
	echo '<div style="margin-bottom:6px">住所①';
	echo '<select name="address1"><option value="">選択してください</value>';
	global $wpdb;
	$totalrow = $wpdb->get_results("SELECT name FROM prefectures");
	foreach($totalrow as $each_row) {
		if(get_post_meta($post->ID, 'address1', true) == $each_row->name) echo '<option selected value="'.$each_row->name.'">'.$each_row->name.'</option>';
		else echo '<option value="'.$each_row->name.'">'.$each_row->name.'</option>';
	}
	echo '</select></div>';
	echo '<div style="margin-bottom:6px">住所②';
	echo '<select name="address2"><option value="">▼市区町村</option>';
	$totalrow = $wpdb->get_results("SELECT id FROM prefectures WHERE name = '".get_post_meta($post->ID, 'address1', true)."'");
	$pref_id = 0;
	foreach($totalrow as $eachrow) {
		$pref_id = $eachrow->id;
	}
	$totalrow = $wpdb->get_results("SELECT name FROM cities WHERE area_id = $pref_id");
	foreach($totalrow as $each_row) {
		if(get_post_meta($post->ID, 'address2', true) == $each_row->name) echo '<option selected value="'.$each_row->name.'">'.$each_row->name.'</option>';
		else echo '<option value="'.$each_row->name.'">'.$each_row->name.'</option>';
	}
	echo '</select></div>';
	echo '<div style="margin-bottom:6px">町名番地<input type="text" name="address3" value="'.get_post_meta($post->ID,'address3',true).'"></div>';
	echo '<div style="margin-bottom:6px">建物名<input type="text" name="building" value="'.get_post_meta($post->ID,'building',true).'"></div>';
	echo '</td></tr>';
	echo '<tr><th>店舗の経度</th><td><div><input type="text" name="longitude" value="'.get_post_meta($post->ID,'longitude',true).'"></td></tr>';
	echo '<tr><th>店舗の緯度</th><td><div><input type="text" name="latitude" value="'.get_post_meta($post->ID,'latitude',true).'"></td></tr>';
	echo '<tr><th>店舗のマップリンク</th><td><div><input type="text" name="map_link" value="'.get_post_meta($post->ID,'map_link',true).'"></td></tr>';
	echo '<tr><th>最寄り駅</th><td><div><input type="text" name="station" value="'.get_post_meta($post->ID,'station',true).'"></td></tr>';
	echo '<tr><th>店舗紹介文</th><td><div><textarea name="description">'.get_post_meta($post->ID,'description',true).'</textarea></td></tr>';
	echo '<tr><th>店舗写真大</th><td><div><input class="input-media" data-type="photo_big" type="text" name="photo_big" value="'.get_post_meta($post->ID,'photo_big',true).'"><button type="button" class="admin-media" data-type="photo_big">選択</button></td></tr>';
	echo '<tr><th>店舗写真小</th><td><div><input class="input-media" data-type="photo_small" type="text" name="photo_small" value="'.get_post_meta($post->ID,'photo_small',true).'"><button type="button" class="admin-media" data-type="photo_small">選択</button></td></tr>';
	echo '<tr><th>登録者情報</th><td>';
	echo '<select name="owner_type"><option value=""></option>';
	$owner_type = get_post_meta($post->ID, 'owner_type', true);
	for($i=0;$i<count($g_shop_props['owner_type']);$i++) {
		if($owner_type == $g_shop_props['owner_type'][$i]) {
			echo '<option selected value="'.$g_shop_props['owner_type'][$i].'">'.$g_shop_props['owner_type'][$i].'</option>';
		}
		else {
			echo '<option value="'.$g_shop_props['owner_type'][$i].'">'.$g_shop_props['owner_type'][$i].'</option>';
		}
	}
	echo '</select></td></tr>';
	echo '<tr><th>法人名もしくは事業者名</th><td><div><input type="text" name="owner_regular" value="'.get_post_meta($post->ID,'owner_regular',true).'"></td></tr>';
	echo '<tr><th>ご担当者名</th><td><div><input type="text" name="owner_name" value="'.get_post_meta($post->ID,'owner_name',true).'"></td></tr>';
	echo '<tr><th>メールアドレス</th><td><div><input type="text" name="email" value="'.get_post_meta($post->ID,'email',true).'"></td></tr>';
	echo '<tr><th>Andorid修理期間</th><td>';
	echo '<select name="android_time"><option value=""></option>';
	$android_time = get_post_meta($post->ID, 'android_time', true);
	for($i=0;$i<count($g_shop_props['android_time']);$i++) {
		if($android_time == $g_shop_props['android_time'][$i]) {
			echo '<option selected value="'.$g_shop_props['android_time'][$i].'">'.$g_shop_props['android_time'][$i].'</option>';
		}
		else {
			echo '<option value="'.$g_shop_props['android_time'][$i].'">'.$g_shop_props['android_time'][$i].'</option>';
		}
	}
	echo '</select></td></tr>';
	echo '<tr><th>感染症対策</th><td>';
	echo '<select name="anti_virus"><option value=""></option>';
	$anti_virus = get_post_meta($post->ID, 'anti_virus', true);
	for($i=0;$i<count($g_shop_props['anti_virus']);$i++) {
		if($anti_virus == $g_shop_props['anti_virus'][$i]) {
			echo '<option selected value="'.$g_shop_props['anti_virus'][$i].'">'.$g_shop_props['anti_virus'][$i].'</option>';
		}
		else {
			echo '<option value="'.$g_shop_props['anti_virus'][$i].'">'.$g_shop_props['anti_virus'][$i].'</option>';
		}
	}
	echo '</select></td></tr>';
	echo '<tr><th>クーポン・割引</th><td>';
	$comma_str = get_post_meta($post->ID,'discount',true);
	if(empty($comma_str)) $comma_str = "";
	$comma_words = explode(',',$comma_str);
	for($i=0;$i<count($g_shop_props['discount']);$i++) {
		if(in_array($g_shop_props['discount'][$i], $comma_words)) {
			echo '<div class="checkbox_wrap"><input checked type="checkbox" name="discount'.$i.'" value="'.$g_shop_props['discount'][$i].'">'.$g_shop_props['discount'][$i].'</div>';
		}
		else {
			echo '<div class="checkbox_wrap"><input type="checkbox" name="discount'.$i.'" value="'.$g_shop_props['discount'][$i].'">'.$g_shop_props['discount'][$i].'</div>';
		}
	}
	echo '</td></tr>';
	echo '<tr><th>出張修理</th><td>';
	echo '<select name="on_site"><option value=""></option>';
	$on_site = get_post_meta($post->ID, 'on_site', true);
	for($i=0;$i<count($g_shop_props['on_site']);$i++) {
		if($on_site == $g_shop_props['on_site'][$i]) {
			echo '<option selected value="'.$g_shop_props['on_site'][$i].'">'.$g_shop_props['on_site'][$i].'</option>';
		}
		else {
			echo '<option value="'.$g_shop_props['on_site'][$i].'">'.$g_shop_props['on_site'][$i].'</option>';
		}
	}
	echo '</select></td></tr>';
	echo '<tr><th>修理可能な端末</th><td>';
	$comma_str = get_post_meta($post->ID,'repairable',true);
	if(empty($comma_str)) $comma_str = "";
	$comma_words = explode(',',$comma_str);
	for($i=0;$i<count($g_shop_props['repairable']);$i++) {
		if(in_array($g_shop_props['repairable'][$i], $comma_words)) {
			echo '<div class="checkbox_wrap"><input checked type="checkbox" name="repairable'.$i.'" value="'.$g_shop_props['repairable'][$i].'">'.$g_shop_props['repairable'][$i].'</div>';
		}
		else {
			echo '<div class="checkbox_wrap"><input type="checkbox" name="repairable'.$i.'" value="'.$g_shop_props['repairable'][$i].'">'.$g_shop_props['repairable'][$i].'</div>';
		}
	}
	echo '</td></tr>';
	echo '<tr><th>Android即日対応</th><td>';
	echo '<select name="android_onday"><option value=""></option>';
	$android_onday = get_post_meta($post->ID, 'android_onday', true);
	for($i=0;$i<count($g_shop_props['android_onday']);$i++) {
		if($android_onday == $g_shop_props['android_onday'][$i]) {
			echo '<option selected value="'.$g_shop_props['android_onday'][$i].'">'.$g_shop_props['android_onday'][$i].'</option>';
		}
		else {
			echo '<option value="'.$g_shop_props['android_onday'][$i].'">'.$g_shop_props['android_onday'][$i].'</option>';
		}
	}
	echo '</select></td></tr>';
	echo '<tr><th>保証期間</th><td>';
	echo '<select name="repair_time"><option value=""></option>';
	$repair_time = get_post_meta($post->ID, 'repair_time', true);
	for($i=0;$i<count($g_shop_props['repair_time']);$i++) {
		if($repair_time == $g_shop_props['repair_time'][$i]) {
			echo '<option selected value="'.$g_shop_props['repair_time'][$i].'">'.$g_shop_props['repair_time'][$i].'</option>';
		}
		else {
			echo '<option value="'.$g_shop_props['repair_time'][$i].'">'.$g_shop_props['repair_time'][$i].'</option>';
		}
	}
	echo '</select></td></tr>';
	echo '</table>';
}
add_action('save_post', 'save_custom_postdata');
function save_custom_postdata($post_id) {
	global $g_shop_props;
	$post_type = get_post_type($post_id);

	if($post_type == 'shop') {
		doSave($post_id,'tel');
		doSave($post_id,'url');
		doSave($post_id,'open_time');
		doSave($post_id,'close_time');
		doSaveComma($post_id,'off_days', $g_shop_props['off_days']);
		doSave($post_id,'off_days_more');
		doSave($post_id,'zip');
		doSave($post_id,'address1');
		doSave($post_id,'address2');
		doSave($post_id,'address3');
		doSave($post_id,'building');
		doSave($post_id,'longitude');
		doSave($post_id,'latitude');
		doSave($post_id,'station');
		doSave($post_id, 'map_link');
		doSave($post_id,'description');
		doSave($post_id,'photo_big');
		doSave($post_id,'photo_small');
		doSave($post_id,'owner_type');
		doSave($post_id,'owner_regular');
		doSave($post_id,'owner_name');
		doSave($post_id,'email');
		doSave($post_id,'android_time');
		doSave($post_id,'anti_virus');
		doSaveComma($post_id,'discount', $g_shop_props['discount']);
		doSave($post_id,'on_site');
		doSaveComma($post_id,'repairable', $g_shop_props['repairable']);
		doSave($post_id,'android_onday');
		doSave($post_id,'repair_time');
	}

	if($post_type == 'post') {
		doSave($post_id, 'pickup');
		doSave($post_id, 'summary');
		doSave($post_id, 'shop_id');
	}
	if($post_type == 'maker') {
		doSave($post_id, 'url');
		doSave($post_id, 'order');
	}
	//set default values
	if($post_type == 'post') {
		saveDefault($post_id, 'pickup', '');
	}
	if($post_type == 'maker') {
		saveDefault($post_id, 'order', 999);
	}
	if($post_type == 'shop') {
		doSave($post_id,'tel');
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
}
function doSaveComma($post_id, $data_name, $comma_arr){
	$comma_words = [];
	for($i=0;$i<count($comma_arr);$i++) {
		if(isset($_POST[$data_name.$i])){
			array_push($comma_words, $_POST[$data_name.$i]); 
		}	
	}
	$comma_str = implode(',', $comma_words);

	if(isset($_POST[$data_name])){
		$data = $_POST[$data_name]; 
	}else{
	  $data = '';
	}
	if( $comma_str != get_post_meta($post_id, $data_name, true)){
	  update_post_meta($post_id, $data_name, $comma_str);
	}elseif($comma_str == ""){
		delete_post_meta($post_id, $data_name,get_post_meta($post_id,$data_name,true));
	}
}
function saveDefault($post_id, $data_name, $init_val){
	if(empty(get_post_meta($post_id, $data_name, true))){
	  update_post_meta($post_id, $data_name,$init_val);
	}
}

add_filter('manage_edit-post_columns', 'manage_post_columns');
add_action('manage_post_posts_custom_column', 'add_post_column', 10, 2);
function manage_post_columns ($columns) {
	$columns['pickup']  = 'PICKUP記事';

	return $columns;
}
function add_post_column ($column_name, $post_id) {
	$column_val = '';

	switch ($column_name) {
		case 'pickup':
			$pickup = get_post_meta($post_id,'pickup',true);
			if($pickup == 'pickup') {
				echo '✓';
			}
			break;
		case 'profile_pic':
			// 画像1だけ表示
			$image = get_post_meta($post_id,'profile_pic',true);
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
		case 'ken_years':
			$name = get_post_meta($post_id,'ken_years',true);
			if (isset($name) && $name) {
				echo edit_post_link($name,'','');
			} else {
				echo edit_post_link(__('None'),'','');
			}
			break;
		case 'gender':
			$name = get_post_meta($post_id,'gender',true);
			if (isset($name) && $name) {
				echo edit_post_link($name,'','');
			} else {
				echo edit_post_link(__('None'),'','');
			}
			break;
		case 'ten_age':
			$name = get_post_meta($post_id,'ten_age',true);
			if (isset($name) && $name) {
				echo edit_post_link($name,'','');
			} else {
				echo edit_post_link(__('None'),'','');
			}
			break;
		case 'address':
			$name = get_post_meta($post_id,'address',true);
			if (isset($name) && $name) {
				echo edit_post_link($name,'','');
			} else {
				echo edit_post_link(__('None'),'','');
			}
			break;
		default:
	}
}

//CPT Maker --------------------------------
add_action('init', 'register_post_type_maker');
function register_post_type_maker() {
  register_post_type(
    'maker'                                                 // カスタム投稿タイプ名
    , array(
      'labels' => array(
                    'name'           => 'メーカー'            //ダッシュボードに表示される名前
                    , 'add_new_item' => 'メーカー新規追加'  // 新規追加画面に表示される名前
                    , 'edit_item'    => 'メーカー編集'      // 編集画面に表示される名前
                    , 
                  )
      , 'public'       => true                                // ダッシュボードに表示するか否か
      , 'hierarchical' => true                                // 階層型にするか否か
      , 'has_archive'  => true                                // アーカイブ（一覧表示機能）を持つか否か
	  , 'texonomies'   => true	
      , 'supports'     => array(                              // カスタム投稿ページに表示される項目
							'title',
                            'custom-fields',                  // カスタムフィールド
                          )
      , 'menu_position' => 5                                  // ダッシュボードで投稿の下に表示
      , 'rewrite'       => array('with_front' => false)       // パーマリンクの編集（productの前の階層URLを消して表示）
      )
  );
}
add_action('init', 'define_custom_categories_tags');
function define_custom_categories_tags() {
	register_taxonomy(
		'maker_category', 
		'maker',
		array(
			'label'=>'カテゴリー', 
			'hierarchical'=>true, 
			'query_var'=>true, 
			'rewrite'=>true
		)
	);
	register_taxonomy(
		'shop_tag',
		'shop',
		array(
			'label'        => 'タグ',
			'rewrite'      => false,
			'hierarchical' => false,
			'query_var'=>true, 
			//   'capabilities' => array( 'edit_terms' => 'manage_categories' )
		)
	);
}
function manage_maker_columns ($columns) {
	$columns['url']  = 'URL';
	$columns['order']   = '表示順';
	return $columns;
}

function add_maker_column ($column_name, $post_id) {
	$column_val = '';

	switch ($column_name) {
		case 'url':
			$url = get_post_meta($post_id,'url',true);
			if (isset($url) && $url) {
				echo '<a target="_blank" href="'.$url.'">'.$url.'"</a>';
			} 
			break;
		case 'order':
			$order = get_post_meta($post_id,'order',true);
			if(!empty($order)) {
				echo $order;
			}
			break;
		default:
	}
}

add_filter('manage_edit-maker_columns', 'manage_maker_columns');
add_action('manage_maker_posts_custom_column', 'add_maker_column', 10, 2);
//Table Of Content -------------------------------
// Inject the TOC on each post.
add_filter('the_content', function ($content) {
    global $tableOfContents;
    $tableOfContents = "
        <div class='toc_wrap'>
    ";
    $index = 1;
    // Insert the IDs and create the TOC.
    $content = preg_replace_callback('#<(h[1-6])(.*?)>(.*?)</\1>#si', function ($matches) use (&$index, &$tableOfContents) {
        $tag = $matches[1];
        $title = strip_tags($matches[3]);
        $hasId = preg_match('/id=(["\'])(.*?)\1[\s>]/si', $matches[2], $matchedIds);
        $id = $hasId ? $matchedIds[2] : $index++ . '-' . sanitize_title($title);
        $tableOfContents .= "<div class='toc_$tag'><a href='#$id'>$title</a></div>";
        if ($hasId) {
            return $matches[0];
        }
        return sprintf('<%s%s id="%s">%s</%s>', $tag, $matches[2], $id, $matches[3], $tag);
    }, $content);
    $tableOfContents .= '</div>';
    return $content;
});
function get_the_table_of_contents()
{
    global $tableOfContents;
    return $tableOfContents;
}
//Table Of Content End---------------------------
//All Tags Modal-------------------------
function echo_all_tags_modal() {
	$all_tags = get_tags(array(
		'hide_empty' => false
	));
?>
<div class="cmodal" id="id_more_tag_modal" style="display:none">
    <div class="cmodal_window">
        <a href="javascript:void(0);" class="cmodal_close"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_cicle_close2.svg"></a>
        <div class="tags_modal_content">
            <div class="tags_modal_header">
                <h3>タグ一覧</h3>
            </div>
            <div class="tags_modal_body cscroll_obj">
                <ul>
<?php
foreach ($all_tags as $each_tag) {
?>
            		<li><a class="tag_button" href="<?php echo get_tag_link($each_tag->term_id); ?>"><?php echo $each_tag->name; ?></a></li>
<?php
}
?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php
}
//All Tags Modal End-------------------------
//Thank Table Modal-------------------------
function echo_think_modal() {
	global $g_think_ids;
?>
<div class="cmodal" id="id_store_modal" style="display:none">
    <div class="cmodal_window">
        <a href="javascript:void(0);" class="cmodal_close"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_cicle_close2.svg"></a>
        <div class="store_modal_content">
            <div class="store_modal_body">
                <div class="store_modal_body_inner">
                    <h2 class="store_modal_heading">見積り選択中の店舗（最大10件）</h2>
                    <div class="store_modal_content_inner_text cscroll_obj">
                        <div class="think_list_node">
<?php
foreach($g_think_ids as $loop_id) {
    $loop_title = get_the_title($loop_id);
    $loop_photo_big = get_post_meta($loop_id, 'photo_big', true);
    if(empty($loop_photo_big)) $loop_photo_big = get_stylesheet_directory_uri().'/images/default.jpg';
    $loop_photo_small = get_post_meta($loop_id, 'photo_small', true);
    if(empty($loop_photo_small)) $loop_photo_small = get_stylesheet_directory_uri().'/images/default.jpg';
    $loop_desc = get_post_meta($loop_id, 'description', true); 
    $loop_open_close = get_post_meta($loop_id, 'open_time', true).'~'.get_post_meta($loop_id, 'close_time', true); 
    $loop_off_days = get_post_meta($loop_id, 'off_days', true); if(empty($loop_off_days)) $loop_off_days = " ";
    $loop_off_days_more = get_post_meta($loop_id, 'off_days_more', true);
    if(!empty(get_post_meta($loop_id, 'off_days', true))) {
        $loop_off_days_more = $loop_off_days.'<br>'.$loop_off_days_more;
    }
    $loop_station = get_post_meta($loop_id, 'station', true); if(empty($loop_station)) $loop_station = "　";
    $loop_full_address = get_post_meta($loop_id, 'address1', true).get_post_meta($loop_id, 'address2', true).get_post_meta($loop_id, 'address3', true).get_post_meta($loop_id, 'building', true);
    $loop_maplink = get_post_meta($loop_id, 'map_link', true);
    $loop_anti_virus = get_post_meta($loop_id, 'anti_virus', true);
    $loop_discount = get_post_meta($loop_id, 'discount', true);
    $loop_on_site = get_post_meta($loop_id, 'on_site', true);
    $loop_repairable = get_post_meta($loop_id, 'repairable', true);
    $loop_android_onday = get_post_meta($loop_id, 'android_onday', true);
    $loop_repair_time = get_post_meta($loop_id, 'repair_time', true);
    $loop_tags = get_the_terms($loop_id, 'shop_tag');
    $loop_zip = get_post_meta($loop_id, 'zip', true);
    $loop_shop_url = get_post_meta($loop_id, 'url', true);
    $loop_tel = get_post_meta($loop_id, 'tel', true);
    $store_class = "store_name_content_sec";
    if($loop_id == $starshop_id) $store_class = "store_name_content_sec cio_content_sec";
    $loop_addthink_style = "";
    if(in_array($loop_id, $g_think_ids)) $loop_addthink_style = "display:none";
    $loop_delthink_style = "";
    if(!in_array($loop_id, $g_think_ids)) $loop_delthink_style = "display:none";
?>
                            <div class="store_name_content_sec">
                                <h3><?php echo $loop_title; ?></h3>
                                <div class="store_name_content_box">
                                    <div class="store_name_content_box_inner">
                                        <div class="custom_row">
                                            <div class="custom_col_image">
                                                <div class="store_name_content_box_image">
                                                    <img src="<?php echo $loop_photo_big; ?>">
                                                </div>
                                            </div>
                                            <div class="custom_col_text">
                                                <div class="store_name_content_box_text">
                                                    <p class="cpc"><?php echo $loop_desc; ?></p>
                                                    <ul>
                                                        <li>
                                                            <p class="time_text"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/time_icon.svg"><?php echo $loop_open_close; ?></p>
                                                        </li>
                                                        <li>
                                                            <p class="day_text"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/day_icon.svg"><?php echo $loop_off_days; ?></p>
                                                        </li>
                                                        <li>
                                                            <p class="station_text"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/station_icon.svg"><?php echo $loop_station; ?></p>
                                                        </li>
                                                    </ul>
                                                    <div class="calign_right">
                                                        <a href="javascript:void(0)" class="api_think" data-sh_type="del_think" data-sh_id="<?php echo $loop_id; ?>">× 見積りから外す</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
<?php    
}
?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="store_name_model_btns">
                <div class="store_name_model_btns_inner">
                    <ul>
                        <li class="custom_col_text">
                            <div class="storemodal_prev js_modalclose">戻る</div>
                        </li>
                        <li class="custom_col_btn">
                            <a href="<?php echo get_site_url(); ?>/estimation/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.png">一括見積リス</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
}
//-----------------Thank Table Modal-------------------------
//Add Custom Filed for Tags
function extra_tag_fields($term) {		
    if (current_filter() == 'edit_tag_form_fields') {	
        $order = get_term_meta( $term->term_id, 'order', true ); 	
?>
        <tr class="form-field">
            <th valign="top" scope="row"><label for="order"><?php _e('表示順'); ?></label></th>
            <td>
                <input type="number" value="<?php echo esc_attr( $order ) ? esc_attr( $order ) : ''; ?>"  name="order"><br/>
            </td>
        </tr>  
<?php 
		if($term->taxonomy == 'post_tag') {
			$recommend = get_term_meta( $term->term_id, 'recommend', true ); 	
?>
				<tr class="form-field">
					<th valign="top" scope="row"><label for="recommend"><?php _e('おすすめタグ'); ?></label></th>
					<td>
<?php
							if($recommend == 'recommend') {
								echo '<input checked type="checkbox" name="recommend" value="recommend"><br/>';
							}
							else
							{
								echo '<input type="checkbox" name="recommend" value="recommend"><br/>';
							}
?>
					</td>
				</tr>   
<?php
		}
?>
		<tr class="form-field">
            <th valign="top" scope="row"><label for="order"><?php _e('非表示'); ?></label></th>
            <td>
<?php
		$noshow = get_term_meta( $term->term_id, 'noshow', true );
		if($noshow == 'noshow') {
			echo '<input checked type="checkbox" name="noshow" value="noshow"><br/>';
		}
		else
		{
			echo '<input type="checkbox" name="noshow" value="noshow"><br/>';
		}
?>
            </td>
        </tr> 
<?php
    } elseif (current_filter() == 'add_tag_form_fields') {
?>
        <div class="form-field">
            <label for="order"><?php _e('表示順1'); ?></label>
            <input type="number" value=""  name="order">
        </div>  
<?php
		if($term == 'post_tag') {
?>
		<tr class="form-field">
			<th valign="top" scope="row"><label for="recommend"><?php _e('おすすめタグ'); ?></label></th>
			<td>
				<input type="checkbox" name="recommend" value="recommend"><br/>
				<p>&nbsp;</p>
			</td>
		</tr>   
<?php
		}
?>
		<tr class="form-field">
            <th valign="top" scope="row"><label for="order"><?php _e('非表示'); ?></label></th>
            <td>
<?php
		$noshow = get_term_meta( $term->term_id, 'noshow', true );
		if($noshow == 'noshow') {
			echo '<input checked type="checkbox" name="noshow" value="noshow"><br/>';
		}
		else
		{
			echo '<input type="checkbox" name="noshow" value="noshow"><br/>';
		}
?>
				<p>&nbsp;</p>
            </td>
        </tr> 
<?php
    }
}
add_action('add_tag_form_fields', 'extra_tag_fields' ,10,2) ;
add_action('edit_tag_form_fields', 'extra_tag_fields' ,10,2) ;
function extra_save_tag_fields($term_id) {
	$old_order = get_term_meta($term_id, 'order', true);
	if(empty($old_order)) $old_order = 999;
	if ( isset( $_REQUEST['order'] ) ) {
        $order = $_REQUEST['order'];
        if( $order ) {
                update_term_meta( $term_id, 'order', $order );
        }
		else {
			update_term_meta( $term_id, 'order', $old_order );
		}
    } 	
	else {
		update_term_meta( $term_id, 'order', $old_order );
	}
	if ( isset( $_REQUEST['recommend'] ) ) {
		if($_REQUEST['recommend'] == 'recommend') {
			update_term_meta( $term_id, 'recommend', $_REQUEST['recommend'] );
		}
		else {
			delete_term_meta($term_id, 'recommend');
		}
	}
	if ( isset( $_REQUEST['noshow'] ) ) {
		if($_REQUEST['noshow'] == 'noshow') {
			update_term_meta( $term_id, 'noshow', $_REQUEST['noshow'] );
		}
		else {
			delete_term_meta($term_id, 'noshow');
		}
	}
}
add_action('create_term', 'extra_save_tag_fields', 10, 2);
add_action('edit_term', 'extra_save_tag_fields', 10, 2);
function manage_tags_columns ($columns) {
	unset($columns['description']);
	$columns['order']   = '表示順';
	$columns['noshow']   = '非表示';
	return $columns;
}
function manage_post_tags_columns ($columns) {
	unset($columns['description']);
	$columns['order']   = '表示順';
	$columns['recommend']   = 'おすすめタグ';
	$columns['noshow']   = '非表示';
	return $columns;
}
function add_tags_column ($string1, $column_name, $term_id) {
	switch ($column_name) {
		case 'noshow':
			$noshow = get_term_meta($term_id,'noshow',true);
			if($noshow == 'noshow') {
				echo '✓';
			}
			break;
		case 'order':
			$order = get_term_meta($term_id,'order',true);
			if(!empty($order)) {
				echo $order;
			}
			break;
		default:
	}
}
function add_post_tags_column ($string1, $column_name, $term_id) {
	switch ($column_name) {
		case 'noshow':
			$noshow = get_term_meta($term_id,'noshow',true);
			if($noshow == 'noshow') {
				echo '✓';
			}
			break;
		case 'recommend':
			$recommend = get_term_meta($term_id,'recommend',true);
			if($recommend == 'recommend') {
				echo '✓';
			}
			break;
		case 'order':
			$order = get_term_meta($term_id,'order',true);
			if(!empty($order)) {
				echo $order;
			}
			break;
		default:
	}
}
function filter_manage_post_tag_custom_column($string, $column_name, $term_id) {
	var_dump($string);
	var_dump($column_name);
	var_dump($term_id);
	return 'hello';
}
add_filter('manage_edit-post_tag_columns', 'manage_post_tags_columns');
add_action('manage_post_tag_custom_column', 'add_post_tags_column', 10, 3);
add_filter('manage_edit-shop_tag_columns', 'manage_tags_columns');
add_action('manage_shop_tag_custom_column', 'add_tags_column', 10, 3);
// add_filter('manage_post_tag_custom_column', 'filter_manage_post_tag_custom_column', 10, 3);

function quick_edit_tag_field( $column_name, $screen ) {
    // If we're not iterating over our custom column, then skip
    if ( $screen != 'edition' && $column_name != 'order' ) {
        return false;
    }
    ?>
    <fieldset>
        <div id="gwp-first-appeared" class="inline-edit-col">
            <label>
                <span class="title">Order</span>
                <span class="input-text-wrap"><input id="id_admin_tag_order" type="text" name="<?php echo esc_attr( $column_name ); ?>" class="ptitle" value=""></span>
            </label>
        </div>
    </fieldset>
	<script>
		jQuery('#the-list').on('click', 'button.editinline', function(){
			var now = jQuery(this).closest('tr').find('td.column-order').text();
			jQuery('#id_admin_tag_order').val( now );
		});
    </script>
    <?php
}
add_action( 'quick_edit_custom_box', 'quick_edit_tag_field', 10, 2 );
function quick_edit_save_tag_field( $term_id ) {
    if ( isset( $_POST['order'] ) ) {
        update_term_meta( $term_id, 'order', $_POST['order'] );
    }
}
add_action( 'edited_edition', 'quick_edit_save_tag_field' );

add_action( 'parse_term_query', 'new_parse_term_query' );
function new_parse_term_query( $query ) { //category-tag sort functiion
	$args =& $query->query_vars;
	// var_dump($args); exit;
	if(empty($args['orderby'])) {
		$args['meta_key'] = 'order';
		$args['orderby']  = 'meta_value_num';
	}
	if(!is_admin()) {
	}
	// $args =& $query->query_vars;
    // if ( is_admin() && 'order' === $args['orderby'] ) {
    //     $args['meta_query'] = isset( $args['meta_query'] ) ?
    //         (array) $args['meta_query'] : array();

    //     $args['meta_query'][] = array(
    //         'relation'      => 'OR',
    //         'order'    => array( // include categories that have the meta
    //             'key'  => 'order',
    //             'type' => 'NUMERIC',
    //         ),
    //         'no_order' => array( // and categories that don't have the meta
    //             'key'     => 'order',
    //             'compare' => 'NOT EXISTS',
    //         ),
    //     );
    // }

    // if ( is_admin() && 'sort_order' === $args['orderby'] ) {
    //     $args['meta_key'] = 'sort_order';
    //     $args['orderby']  = 'meta_value_num';
    // }
}

//Add Custom Filed for Category
function category_fields_new( $taxonomy ) { // Function has one field to pass – Taxonomy
	//wp_nonce_field( 'category_meta_new', 'category_meta_new_nonce' ); // Create a Nonce so that we can verify the integrity of our data
?>
	<label for='category_fa'>表示順</label>
	<input type='number' name='order' style='width: 100%'>
	<p>&nbsp;</p>
<?php
}
add_action( 'category_add_form_fields', 'category_fields_new', 10 );

function category_fields_edit( $term, $taxonomy ) {
	// $old_order = get_option( '{$taxonomy}_{$term->term_id}_order' ); // Get the imageUrl if one is set already
	$old_order = get_term_meta($term->term_id, 'order', true);
	?>
	<tr class='form-field'>
		<th scope='row' valign='top'>
			<label for='category_fa'>表示順</label>
		</th>
		<td>
			<input  type='number' name='order' id='category_fa'	value='<?php echo $old_order; ?>' style='width:100%;' />
			<p>&nbsp;</p>
		</td>
	</tr> 
	<?php
}
add_action( 'category_edit_form_fields', 'category_fields_edit', 10, 2 );
function save_category_fields( $term_id ) {
 
	$taxonomy = $_POST['taxonomy'];
	// $old_order = get_option( '{$taxonomy}_{$term_id}_order' ); // Grab our imageUrl if one exists
	$old_order = get_term_meta($term->term_id);
	if(empty($old_order)) $old_order = 999; 
	if( ! empty( $_POST['order'] ) ) { // IF the user has entered text, update our field.
		// update_option( '{$taxonomy}_{$term_id}_order', $_POST['order'] ); // Sanitize our data before adding to the database
		update_term_meta($term->term_id, 'order', $_POST['order']);
	} elseif( ! empty( $old_order ) ) { // Category imageUrl IS empty but the option is set, they may not want an imageUrl on this category
		// update_option( '{$taxonomy}_{$term_id}_order', $old_order ); // Delete our option
		update_term_meta($term->term_id, 'order', $old_order);
	}
	 
} // End Function
add_action ( 'created_category', 'save_category_fields' );
add_action ( 'edited_category', 'save_category_fields' );

// To show the column header
function category_order_column_header( $columns ){
	$columns['order'] = '表示順'; 
	return $columns;
}
add_filter( "manage_edit-category_columns", 'category_order_column_header', 10);
// To show the column value
function category_order_column_content( $value, $column_name, $term_id ){
	switch ($column_name) {
		case 'order':
			$order = get_term_meta($term_id,'order',true);
			if(!empty($order)) {
				echo $order;
			}
			break;
		default:
	}
	//return $term_id ;
}
add_action( "manage_category_custom_column", 'category_order_column_content', 10, 3);

/*************Add Custom Filed for Maker Category********************/
add_action( 'maker_category_add_form_fields', 'category_fields_new', 10 );
add_filter( "manage_edit-maker_category_columns", 'category_order_column_header', 10);
add_action( "manage_maker_category_custom_column", 'category_order_column_content', 10, 3);

/* Sort posts on the blog posts page according to the custom sort order */
function custom_maker_post_order_sort( $query ){
	if(isset($query->query['post_type']) &&  $query->query['post_type'] == 'maker') {
		$query->set( 'orderby', 'meta_value_num' );
		$query->set( 'meta_key', 'order' );
		$query->set( 'order' , 'ASC' );
	}
}
add_action( 'pre_get_posts' , 'custom_maker_post_order_sort' );

/*****Repair Shop CPT Register */
add_action('init', 'register_post_type_shop');
function register_post_type_shop() {
  register_post_type(
    'shop'                                                 // カスタム投稿タイプ名
    , array(
      'labels' => array(
                    'name'           => '店舗'            //ダッシュボードに表示される名前
                    , 'add_new_item' => '新規追加'  // 新規追加画面に表示される名前
                    , 'edit_item'    => '店舗編集'      // 編集画面に表示される名前
                    , 
                  )
      , 'public'       => true                                // ダッシュボードに表示するか否か
      , 'hierarchical' => true                                // 階層型にするか否か
      , 'has_archive'  => true                                // アーカイブ（一覧表示機能）を持つか否か
	  , 'texonomies'   => true	
      , 'supports'     => array(                              // カスタム投稿ページに表示される項目
							'title',
                            'custom-fields',                  // カスタムフィールド
                          )
      , 'menu_position' => 5                                  // ダッシュボードで投稿の下に表示
      , 'rewrite'       => array('with_front' => false)       // パーマリンクの編集（productの前の階層URLを消して表示）
      )
  );
}
// add_action('init', 'define_maker_category');
// function define_maker_category() {
// 	register_taxonomy('maker_category', 'maker',
// 		array('hierarchical'=>true, 'label'=>'カテゴリー', 'query_var'=>true, 'rewrite'=>true));
// }
function manage_shop_columns ($columns) {
	$columns['shop_id'] = 'ID';
	$columns['title']  = '店舗名';
	$columns['zip'] = '郵便番号';
	$columns['address1'] = '住所①';
	$columns['address2'] = '住所②';
	$columns['tel'] = '電話番号';

	return $columns;
}

function add_shop_column ($column_name, $post_id) {
	$column_val = '';

	switch ($column_name) {
		case 'shop_id':
			echo $post_id;
			break;
		case 'zip':
			echo get_post_meta($post_id,'zip',true);
			break;
		case 'address1':
			echo get_post_meta($post_id,'address1',true);
			break;
		case 'address2':
			echo get_post_meta($post_id,'address2',true);
			break;
		case 'tel':
			echo get_post_meta($post_id,'tel',true);
			break;
		default:
	}
}

add_filter('manage_edit-shop_columns', 'manage_shop_columns');
add_action('manage_shop_posts_custom_column', 'add_shop_column', 10, 2);

function shop_change_title_text( $title ){
	$screen = get_current_screen();
  	if  ( 'shop' == $screen->post_type ) {
		 $title = '店舗名';
	}
	return $title;
}
add_filter( 'enter_title_here', 'shop_change_title_text' );

/* shop properties */
$g_shop_props = array(
	'off_days' => ['日～土', '年中無休', '不定休', '祝日'],
	'owner_type' => ['法人（1店舗）', '法人直営店舗', '個人事業主', 'FC店'],
	'android_time' => ['当日修理可', '翌日まで', '2～3日以内', '1週間以内'],
	'anti_virus' => ['なし', 'あり'],
	'discount' => ['リピーター割引','学生割引','同時修理割引','クーポン','その他割引あり','なし'], 
	'on_site' => ['出張あり','出張なし'],
	'repairable' => ['Android','iPhone','iPad','ゲーム機','パソコン','その他'],
	'android_onday' => ['あり','無し'],
	'repair_time' => ['30日','45日','60日','3か月','6ヵ月','1年','無期限'],
);

/*shop tags********/
// add_action( 'maker_category_add_form_fields', 'category_fields_new', 10 );
// add_filter( "manage_edit-maker_category_columns", 'category_order_column_header', 10);
// add_action( "manage_maker_category_custom_column", 'category_order_column_content', 10, 3);


/* Global Option Page */
/*******My Site Option Plulgin*****************/
 // Add a Menu and add an option management page
 add_action( 'admin_menu', 'register_custom_site_options_page' );
 function register_custom_site_options_page() {
	 add_menu_page(
		  'シューリス設定', // Page title
		  'シューリス設定', // menu name;
		  'manage_options', // capability
		  'myoptions', // slug
		  'myoptions_func', // callback for option page
		  'dashicons-star-half', // menu icon
		  2 // 80 (Settings, 설정)
	  );
 }
 // callback for option page, myoptions_func
 function myoptions_func() {
	 if ( isset( $_GET['settings-updated'] ) ) {
		 // The message after saved
		 add_settings_error( 'myoptions_messages', 'myoptions_message', '設定を保存しました。', 'updated' );
	 }
	 settings_errors( 'myoptions_messages' );
 ?>
	 <div class="wrap">
		 <h1><?php echo esc_html( get_admin_page_title() ); // option page title ?></h1>
		 <form method="post" action="options.php">
 <?php
			 do_settings_sections( 'myoptions' );
			 settings_fields( 'myoptions_section' );
			 submit_button( '変更を保存' );
 ?>
		 </form>
	 </div>
 <?php
 }
 /**
  * myoptions_section_settings
  * section group
  */
 add_action( 'admin_init', 'myoptions_section_settings' );
 function myoptions_section_settings() {
 
	 /**
	  * myoptions_first_section
	  */
	 // // First section
	 // add_settings_section(
	 //     'myoptions_first_section', // name of section group
	 //     'Site Global Code', // section title
	 //     'myoptions_first_text_function', // section explanation callback
	 //     'myoptions' // slug of menu page
	 // );
 
	 // // field group A
	 // add_settings_field(
	 //     'myoptions_headfoot', // field ID
	 //     'Top and Bottom code', // field name
	 //     'myoptions_headfoot_field_html_func', // section field group A markup callback func
	 //     'myoptions', // menu page slug
	 //     'myoptions_first_section' // name of section group
	 // );
	 // register_setting(
	 //     'myoptions_section', // option page global field group
	 //     'myoptions_headfoot', // field ID
	 //     'myoptions_headfoot_sanitize_func' // Sanitize callback func
	 // );
 
	// add section
	 add_settings_section(
		'myoptions_rsearch_section', // name of section group
		'店舗検索', // section title
		'myoptions_rsearch_section_text_function', // section explanation callback
		'myoptions' // slug of menu page
	);
	// add field ID
	add_settings_field(
		'myoptions_starshop', // field ID
		'常に表示店舗のID', // field name
		'myoptions_starshop_field_html_func', // section field group A markup callback func
		'myoptions', // menu page slug
		'myoptions_rsearch_section' // name of section group
	);
	// register field
	register_setting(
		'myoptions_section', // option page global field group
		'myoptions_starshop', // field ID
		'myoptions_starshop_sanitize_func' // Sanitize callback func
	);
}
function myoptions_rsearch_section_text_function() {
}
function myoptions_starshop_field_html_func() {
	$myoptions_starshop = get_option( 'myoptions_starshop' ); //field ID
?>
	 <div style="margin-bottom: 1.5em;">
		 <input type="text" id="myoptions_starshop" name="myoptions_starshop" value="<?php echo $myoptions_starshop; ?>">
	 </div>
<?php
}



/*WP admin search bar allows custom fields. */

/**
 * Extend WordPress search to include custom fields
 *
 * https://adambalee.com
 */

/**
 * Join posts and postmeta tables
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_join
 */
function cf_search_join( $join ) {
    global $wpdb;

    if ( is_search() ) {    
        $join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
    }

    return $join;
}
add_filter('posts_join', 'cf_search_join' );

/**
 * Modify the search query with posts_where
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_where
 */
function cf_search_where( $where ) {
    global $pagenow, $wpdb;

    if ( is_search() ) {
        $where = preg_replace(
            "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
            "(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
    }

    return $where;
}
add_filter( 'posts_where', 'cf_search_where' );

/**
 * Prevent duplicates
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_distinct
 */
function cf_search_distinct( $where ) {
    global $wpdb;

    if ( is_search() ) {
        return "DISTINCT";
    }

    return $where;
}
add_filter( 'posts_distinct', 'cf_search_distinct' );

/****************WP admin search bar allows custom fields. */
function get_category_by_name($cat_name) {
	$categories = get_categories();
	foreach($categories as $category) {
		if($category->name == $cat_name) return $category;
	}
}
/****************Excerpt Length***********/
function my_excerpt_length($length){
	return 24;
}
add_filter('excerpt_length', 'my_excerpt_length');