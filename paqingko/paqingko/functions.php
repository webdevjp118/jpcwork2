<?php
/**
 * paqingko functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package paqingko
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
function paqingko_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on paqingko, use a find and replace
		* to change 'paqingko' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'paqingko', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'paqingko' ),
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
			'paqingko_custom_background_args',
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
add_action( 'after_setup_theme', 'paqingko_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function paqingko_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'paqingko_content_width', 640 );
}
add_action( 'after_setup_theme', 'paqingko_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function paqingko_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'paqingko' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'paqingko' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'paqingko_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function paqingko_scripts() {
	wp_enqueue_style( 'paqingko-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'paqingko-style', 'rtl', 'replace' );

	wp_enqueue_script( 'paqingko-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'paqingko_scripts' );

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

/******************************** Custom code **************************/

add_action('init', 'register_post_type_slot');
function register_post_type_slot() {
  register_post_type(
    'slot'                                                 // カスタム投稿タイプ名
    , array(
      'labels' => array(
                    'name'           => 'スロット情報'            //ダッシュボードに表示される名前
                    , 'add_new_item' => 'スロット情報を新規追加'  // 新規追加画面に表示される名前
                    , 'edit_item'    => 'スロット情報の編集'      // 編集画面に表示される名前
                    , 
                  )
      , 'public'       => true                                // ダッシュボードに表示するか否か
      , 'hierarchical' => true                                // 階層型にするか否か
      , 'has_archive'  => true                                // アーカイブ（一覧表示機能）を持つか否か
      , 'supports'     => array(	                              // カスタム投稿ページに表示される項目
                             'custom-fields'                  // カスタムフィールド
                          )
      , 'menu_position' => 5                                  // ダッシュボードで投稿の下に表示
      , 'rewrite'       => array('with_front' => false)       // パーマリンクの編集（productの前の階層URLを消して表示）
      )
  );
}

add_action('init', 'register_post_type_kouyaka');
function register_post_type_kouyaka() {
  register_post_type(
    'kouyaka'                                                 // カスタム投稿タイプ名
    , array(
      'labels' => array(
                    'name'           => '公約'            //ダッシュボードに表示される名前
                    , 'add_new_item' => '公約を新規追加'  // 新規追加画面に表示される名前
                    , 'edit_item'    => '公約の編集'      // 編集画面に表示される名前
                    , 
                  )
      , 'public'       => true                                // ダッシュボードに表示するか否か
      , 'hierarchical' => true                                // 階層型にするか否か
      , 'has_archive'  => true                                // アーカイブ（一覧表示機能）を持つか否か
      , 'supports'     => array(	                              // カスタム投稿ページに表示される項目
							 'title', 
                             'custom-fields',                  // カスタムフィールド
							 'editor',
							 'thumbnail',
                          )
      , 'menu_position' => 5                                  // ダッシュボードで投稿の下に表示
      , 'rewrite'       => array('with_front' => false)       // パーマリンクの編集（productの前の階層URLを消して表示）
      )
  );
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
function idSlugSave($post_id){
	remove_action( 'save_post', 'save_custom_postdata' );
	wp_update_post([
		"post_name" => $post_id,
		"ID" => $post_id,
	]);
	add_action( 'save_post', 'save_custom_postdata' );
}

add_action('save_post', 'save_custom_postdata');
function save_custom_postdata($post_id){
	global $post;
	$post_type = get_post_type($post_id);
	if($post_type == 'slot' || $post_type == 'house') {
		idSlugSave($post_id);
	}
	//contributor
	doSave($post_id, 'nickname');
	doSave($post_id, 'profile_pic');
	for($i = 1; $i <= 2; $i++){
		doSave($post_id, 'kenkattu_act_img'.$i);
	}
	doSave($post_id, 'level_type');
	doSave($post_id, 'level');
	doSave($post_id, 'ken_years');
	doSave($post_id, 'gender');
	doSave($post_id, 'ten_age');
	doSave($post_id, 'job');
	doSave($post_id, 'address');
	doSave($post_id, 'bio');
}

function add_custom_inputbox_slot() {
	add_meta_box( 'slot_id','スロット情報', 'custom_slot_info_area', 'slot', 'normal' );
}
add_action('admin_menu', 'add_custom_inputbox_slot');
function custom_slot_info_area() {
	global $post;
	global $area_dict;
	echo 'エリア　:<select name="area">';
	$post_area = get_post_meta($post->ID,'area',true);
	for($i=0;$i<count($area_dict);$i++) {
		if($post_area == $area_dict[$i]) {
			echo '<option selected value="'.$area_dict[$i].'">'.$area_dict[$i].'</option>';
		}
		else {
			echo '<option value="'.$area_dict[$i].'">'.$area_dict[$i].'</option>';
		}
	}
	echo '</select>';

	echo '　'.date("Y.m.d").'⽇付';
}


$area_dict = array (
	"愛知",
	"静岡",
	"岐阜",
	"三重",
);


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
//banner link image
function echo_line_banner() {
	echo '<a target="_blank" href="'.get_option( 'myoptions_line_banner' ).'"><img src="'.get_stylesheet_directory_uri().'/images/sidebar-img.png"/></a>';
}
function echo_footer_common() {
?>
<div class="bfooter_common">
	<div class="visit_by_area">
		<div class="custom_header_darkblue">
			<h3>エリアで探す</h3>
		</div>
		<ul class="custom_bttn_group">
			<li><a href="#" class="custom_bttn_lightblue">愛知</a></li>
			<li><a href="#" class="custom_bttn_lightblue">静岡</a></li>
			<li><a href="#" class="custom_bttn_lightblue">岐阜</a></li>
			<li><a href="#" class="custom_bttn_lightblue">三重</a></li>
		</ul>
	</div>
	<div class="visit_by_hallname">
		<div class="custom_header_darkblue">
			<h3>ホール名で探す</h3>
		</div>
		<div class="custom_form_group">
			<div class="custom_form_select_filled">
				<select>
					<option>エリア</option>
					<option>ホール名</option>
				</select>
			</div>
			<div class="custom_form_search_filled">
				<input type="search" placeholder="ホール名を入力">
			</div>
		</div>
	</div>
</div>
<?php
}
/*******My Site Option Plulgin*****************/
 // Add a Menu and add an option management page
 add_action( 'admin_menu', 'register_custom_site_options_page' );
 function register_custom_site_options_page() {
	 add_menu_page(
		  'サイトオプション', // Page title
		  'サイトオプション', // menu name;
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
//-------------------
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
  
	 // Line Banner link section
	  add_settings_section(
		 'myoptions_line_banner_section', // name of section group
		 'LINEバーナー', // section title
		 'myoptions_line_banner_text_function', // section explanation callback
		 'myoptions' // slug of menu page
	 );
	 // field group Pickup Banner
	 add_settings_field(
		 'myoptions_line_banner', // field ID
		 'LINEバーナー', // field name
		 'myoptions_line_banner_field_html_func', // section field group A markup callback func
		 'myoptions', // menu page slug
		 'myoptions_line_banner_section' // name of section group
	 );
	 register_setting(
		'myoptions_section', // option page global field group
		'myoptions_line_banner', // field ID
		'myoptions_line_banner_sanitize_func' // Sanitize callback func
	);
 }
 function myoptions_line_banner_text_function() {
 }
 function myoptions_register_email_text_function() {
 }

 function myoptions_line_banner_field_html_func() {
	 $myoptions_line_banner = get_option( 'myoptions_line_banner' );
 ?>
	  <div style="margin-bottom: 1.5em;">
	  	LINEバーナーリンク　：<input type="text" id="myoptions_line_banner" name="myoptions_line_banner" value="<?php echo $myoptions_line_banner; ?>">
	  </div>
 <?php
 }
 function myoptions_register_email_field_html_func() {
	 $myoptions_register_email = get_option( 'myoptions_register_email' );
 ?>
	  <div style="margin-bottom: 1.5em;">
		  掲載申込受付E-mail　：<input type="text" id="myoptions_register_email" name="myoptions_register_email" value="<?php echo $myoptions_register_email; ?>">
	  </div>
 <?php
 }