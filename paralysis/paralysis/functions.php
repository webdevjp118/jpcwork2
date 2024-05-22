<?php
/**
 * paralysis functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package paralysis
 */

/* Plugin List 
Custom Post Type UI
Advanced Custom Fields
ACF: Better Search
*********/

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'paralysis_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function paralysis_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on paralysis, use a find and replace
		 * to change 'paralysis' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'paralysis', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'paralysis' ),
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
				'paralysis_custom_background_args',
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
add_action( 'after_setup_theme', 'paralysis_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function paralysis_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'paralysis_content_width', 640 );
}
add_action( 'after_setup_theme', 'paralysis_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function paralysis_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'paralysis' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'paralysis' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'paralysis_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function paralysis_scripts() {
	wp_enqueue_style( 'paralysis-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'paralysis-style', 'rtl', 'replace' );

	wp_enqueue_script( 'paralysis-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'paralysis_scripts' );

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

add_action( 'save_post', 'salon_save_post_callback' );

function salon_save_post_callback( $post_id ) {
    // verify post is not a revision
    if ( ! wp_is_post_revision( $post_id ) ) {
		$post_type = get_post_type($post_id);
		if($post_type == 'salon' || $post_type == 'notice') {
			// unhook this function to prevent infinite looping
			remove_action( 'save_post', 'salon_save_post_callback' );

			// update the post slug
			wp_update_post( array(
				'ID' => $post_id,
				'post_name' => $post_id,
			));

			// re-hook this function
			add_action( 'save_post', 'salon_save_post_callback' );
		}
    }
}

function get_full_area2($area2) {
	if(empty($area2)) return '';
	if($area2 == '北海道') return '北海道';
	if($area2 == '東京') return '東京都';
	if($area2 == '京都') return '京都府';
	if($area2 == '大阪') return '大阪府';
	return $area2.'県';
}
function get_full_area3($area3) {
	if(empty($area3)) return '';
	return $area3.'市';
}


$jp_area_dict = array(
	array(
		'key' => 'hokkaido-tohoku', 'name' => '北海道・東北',
		'sub' => array(
			array( 'key' => 'hokkaido', 'name' => '北海道', ),
			array( 'key' => 'aomori', 'name' => '青森', ),
			array( 'key' => 'iwate', 'name' => '岩手 ', ),
			array( 'key' => 'miyagi', 'name' => '宮城', ),
			array( 'key' => 'akita', 'name' => '秋田', ),
			array( 'key' => 'yamagata', 'name' => '山形', ),
			array( 'key' => 'fukushima', 'name' => '福島', ),
		),
	),
	array(
		'key' => 'kanto', 'name' => '関東',
		'sub' => array(
			array( 'key' => 'ibaraki', 'name' => '茨城', ),
			array( 'key' => 'tochigi', 'name' => '栃木', ),
			array( 'key' => 'gunma', 'name' => '群馬', ),
			array( 'key' => 'saitama', 'name' => '埼玉', ),
			array( 'key' => 'chiba', 'name' => '千葉', ),
			array( 
				'key' => 'tokyo', 'name' => '東京', 
				// 'sub' => array(
				// 	array( 'key' => 'shibuya-yoyogi-harajuku', 'name' => '渋谷・代々木・原宿', ),
				// 	array( 'key' => 'ebisu-nakameguro-daikanyama', 'name' => '恵比寿・中目黒・代官山', ),
				// 	array( 'key' => 'shinjuku', 'name' => '新宿', ),
				// ),
			),
			array( 'key' => 'kanagawa', 'name' => '神奈川', ),
			array( 'key' => 'niigata', 'name' => '新潟', ),
		),
	),
	array(
		'key' => 'chubu', 'name' => '中部',
		'sub' => array(
			
			array( 'key' => 'toyama', 'name' => '富山', ),
			array( 'key' => 'ishikawa', 'name' => '石川', ),
			array( 'key' => 'fukui', 'name' => '福井', ),
			array( 'key' => 'yamanashi', 'name' => '山梨', ),
			array( 'key' => 'nagano', 'name' => '長野', ),
			array( 'key' => 'gifu', 'name' => '岐阜', ),
			array( 'key' => 'shizuoka', 'name' => '静岡', ),
			array( 'key' => 'aichi', 'name' => '愛知', ),
		),
	),
	array(
		'key' => 'kinki', 'name' => '近畿',
		'sub' => array(
			array( 'key' => 'mie', 'name' => '三重', ),
			array( 'key' => 'shiga', 'name' => '滋賀', ),
			array( 'key' => 'kyoto', 'name' => '京都', ),
			array( 'key' => 'osaka', 'name' => '大阪', ),
			array( 'key' => 'hyougo', 'name' => '兵庫', ),
			array( 'key' => 'nara', 'name' => '奈良', ),
			array( 'key' => 'wakayama', 'name' => '和歌山', ),
		),
	),
	array(
		'key' => 'chugoku-shikoku', 'name' => '中国・四国',
		'sub' => array(
			array( 'key' => 'tottori', 'name' => '鳥取', ),
			array( 'key' => 'shimane', 'name' => '島根', ),
			array( 'key' => 'okayama', 'name' => '岡山', ),
			array( 'key' => 'hiroshima', 'name' => '広島', ),
			array( 'key' => 'yamaguchi', 'name' => '山口', ),
			array( 'key' => 'tokushima', 'name' => '徳島', ),
			array( 'key' => 'kagawa', 'name' => '香川', ),
			array( 'key' => 'ehime', 'name' => '愛媛', ),
			array( 'key' => 'kouchi', 'name' => '高知', ),
		),
	),
	array(
		'key' => 'kyushu-okinawa', 'name' => '九州・沖縄',
		'sub' => array(
			array( 'key' => 'fukuoka', 'name' => '福岡', ),
			array( 'key' => 'saga', 'name' => '佐賀', ),
			array( 'key' => 'nagasaki', 'name' => '長崎', ),
			array( 'key' => 'kumamoto', 'name' => '熊本', ),
			array( 'key' => 'oita', 'name' => '大分', ),
			array( 'key' => 'miyazaki', 'name' => '宮崎', ),
			array( 'key' => 'kagoshima', 'name' => '鹿児島', ),
			array( 'key' => 'okinawa', 'name' => '沖縄', ),
		),
	),
);