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
/* Admin CSS styles */
function adminStylesCss() {
    $url = get_settings('siteurl');
    $url = get_stylesheet_directory_uri().'/css/admin.css';
    echo '<link rel="stylesheet" type="text/css" href="' . $url . '" />';
}
add_action('admin_head', 'adminStylesCss');

function add_custom_inputbox() {
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

add_action('save_post', 'save_custom_postdata');
function save_custom_postdata($post_id) {
	$post_type = get_post_type($post_id);
	if($post_type == 'post') {
		doSave($post_id, 'pickup');
		doSave($post_id, 'summary');
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
		saveDefault($post_id, 'order', 0);
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
add_action('init', 'define_maker_category');
function define_maker_category() {
	register_taxonomy('maker_category', 'maker',
		array('hierarchical'=>true, 'label'=>'カテゴリー', 'query_var'=>true, 'rewrite'=>true));
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
    } elseif (current_filter() == 'add_tag_form_fields') {
        ?>
        <div class="form-field">
            <label for="order"><?php _e('表示順'); ?></label>
            <input type="number" value=""  name="order">
        </div>  
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
}
add_action('create_term', 'extra_save_tag_fields', 10, 2);
add_action('edit_term', 'extra_save_tag_fields', 10, 2);
function manage_tags_columns ($columns) {
	$columns['order']   = '表示順';
	return $columns;
}

function add_tags_column ($string1, $column_name, $term_id) {
	switch ($column_name) {
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
add_filter('manage_edit-post_tag_columns', 'manage_tags_columns');
add_action('manage_post_tag_custom_column', 'add_tags_column', 10, 3);
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
	// $args =& $query->query_vars;
	// $args['meta_key'] = 'order';
	// $args['orderby']  = 'meta_value_num';
	
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
	var_dump($term);
	echo '<br><br>';
	var_dump($texonomy);
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
// A callback function to add a custom field to our "presenters" taxonomy  
function maker_category_custom_fields($tag) {  
	// Check for existing taxonomy meta for the term you're editing  
	//$t_id = $tag->term_id; // Get the ID of the term you're editing  
	//$term_meta = get_option( "taxonomy_term_$t_id" ); // Do the check  
 	?>  
   
	<tr class="form-field">  
		<th scope="row" valign="top">  
			<label for="presenter_id"><?php _e('WordPress User ID'); ?></label>  
		</th>  
		<td>  
			<input type="text" name="term_meta[presenter_id]" id="term_meta[presenter_id]" size="25" style="width:60%;" value="<?php echo $term_meta['presenter_id'] ? $term_meta['presenter_id'] : ''; ?>"><br />  
			<span class="description"><?php _e('The Presenter\'s WordPress User ID'); ?></span>  
		</td>  
	</tr>  
 <?php  
}  
// Add the fields to the "presenters" taxonomy, using our callback function  
add_action( 'maker_category_edit_form_fields', 'maker_category_custom_fields', 10, 2 );  
// A callback function to save our extra taxonomy field(s)  
function save_taxonomy_custom_fields( $term_id ) {  
    if ( isset( $_POST['term_meta'] ) ) {  
        $t_id = $term_id;  
        $term_meta = get_option( "taxonomy_term_$t_id" );  
        $cat_keys = array_keys( $_POST['term_meta'] );  
            foreach ( $cat_keys as $key ){  
            if ( isset( $_POST['term_meta'][$key] ) ){  
                $term_meta[$key] = $_POST['term_meta'][$key];  
            }  
        }  
        //save the option array  
        update_option( "taxonomy_term_$t_id", $term_meta );  
    }  
}  
 
// Save the changes made on the "presenters" taxonomy, using our callback function  
add_action( 'edited_maker_category', 'save_taxonomy_custom_fields', 10, 2 );  