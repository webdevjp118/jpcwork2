<?php
/**
 * Tomorrow Land functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Tomorrow_Land
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'tomorrow_land_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function tomorrow_land_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Tomorrow Land, use a find and replace
		 * to change 'tomorrow-land' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'tomorrow-land', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'tomorrow-land' ),
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
				'tomorrow_land_custom_background_args',
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
add_action( 'after_setup_theme', 'tomorrow_land_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tomorrow_land_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'tomorrow_land_content_width', 640 );
}
add_action( 'after_setup_theme', 'tomorrow_land_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tomorrow_land_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'tomorrow-land' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'tomorrow-land' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'tomorrow_land_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function tomorrow_land_scripts() {
	wp_enqueue_style( 'tomorrow-land-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'tomorrow-land-style', 'rtl', 'replace' );

	wp_enqueue_script( 'tomorrow-land-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tomorrow_land_scripts' );

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


// get the first image in content
function catch_first_image($post_id) {
	$first_img = '';
	$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 1680,470 ), false, '' );
	if(is_array($src) && count($src)>0) $first_img = $src[0]; 
	if(!empty($first_img)) return $first_img;
    $post = get_post($post_id);
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches [1] [0];
	
    if(empty($first_img)){ //Defines a default image
      $first_img = "/images/default.jpg";
    }
    return $first_img;
}

// Contact Form
add_filter( 'wpcf7_validate_email*', 'custom_email_confirmation_validation_filter', 20, 2 );
  
function custom_email_confirmation_validation_filter( $result, $tag ) {
	if ( 'your-email-confirm' == $tag->name ) {
		$your_email = isset( $_POST['your-email'] ) ? trim( $_POST['your-email'] ) : '';
		$your_email_confirm = isset( $_POST['your-email-confirm'] ) ? trim( $_POST['your-email-confirm'] ) : '';
	
		if ( $your_email != $your_email_confirm ) {
		$result->invalidate( $tag, "メールアドレスの形式が正しくないようです。" );
		}
	}
	return $result;
}
add_filter( 'wpcf7_validate_text*', 'custom_text_validation_filter', 20, 2 );
  
function custom_text_validation_filter( $result, $tag ) {
	if ( 'check-privacy' == $tag->name ) {
		$check_privacy = isset( $_POST['check-privacy'] ) ? trim( $_POST['check-privacy'] ) : '';
		if ( $check_privacy != "checked" ) {
			$result->invalidate( $tag, "個人情報の取扱規程の同意がないため送信できません。" );
		}
	}
	return $result;
}