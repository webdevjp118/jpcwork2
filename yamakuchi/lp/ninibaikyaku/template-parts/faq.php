<?php /* Template Name: Faq*/ ?>
<?php 
get_header(); 
?>

<?php
$scrollid = "";
if(isset($_GET['scrollid'])) $scrollid = $_GET['scrollid'];
$scrollid_category = 0;
$scrollsec_no0 = 0;
$scrollsec_no1 = 0;
$scrollsec_no2 = 0;

$fetch_key = array(
    'post_type' => 'cfaq',
    // 'author' => $user_id,
	'posts_per_page' => -1,
    'fields' => 'ids',
);
$category_list = get_faq_category();
$fetch_query = new WP_Query($fetch_key);
$list0 = [];
$list1 = [];
$list2 = [];
if($fetch_query->have_posts()) : 
    while ($fetch_query->have_posts()) : 
        $fetch_query->the_post(); 
        $loop_id = get_the_id();
        $loop_category = get_post_meta($loop_id, 'category', true);
        $loop_order = get_post_meta($loop_id, 'order', true);
        if($loop_category == 0){
            array_push($list0, array('id'=>$loop_id, 'order'=>$loop_order));
        }
        else if($loop_category == 1) {
            array_push($list1, array('id'=>$loop_id, 'order'=>$loop_order));
        }
        else if($loop_category == 2) {
            array_push($list2, array('id'=>$loop_id, 'order'=>$loop_order));
        }
    endwhile;
endif;

function order_cmp($a, $b)
{
    return $a['order'] > $b['order'];
}
usort($list0, "order_cmp");
usort($list1, "order_cmp");
usort($list2, "order_cmp");
$faq_list0 = [];
$faq_list1 = [];
$faq_list2 = [];
foreach($list0 as $item) {
    array_push($faq_list0, $item['id']);
} 
foreach($list1 as $item) {
    array_push($faq_list1, $item['id']);
} 
foreach($list2 as $item) {
    array_push($faq_list2, $item['id']);
} 
$index = 0;
foreach($faq_list0 as $faq_id) {
    if($faq_id == $scrollid){
        $scrollsec_no0 = $index;
        $scrollpos_id = "id_".$faq_id;
    } 
    $index = $index + 1;
}
$index = 0;
foreach($faq_list1 as $faq_id) {
    if($faq_id == $scrollid){
        $scrollsec_no1 = $index;
        $scrollpos_id = "id_".$faq_id;
    } 
    $index = $index + 1;
}
$index = 0;
foreach($faq_list2 as $faq_id) {
    if($faq_id == $scrollid){
        $scrollsec_no2 = $index;
        $scrollpos_id = "id_".$faq_id;
    } 
    $index = $index + 1;
}

?>

<main id="primary" class="site-main">


<section class="faq_section inner_page_heading_image">
    <div class="custom_container">
        <div class="faq_inner_sec">
            <div class="breadcrumb_sec">
                <ul>
                    <li>
                        <a href="https://ninibaikyaku-dr.com/">トップ </a>
                    </li>
                    <li>
                        <a href="#">よくある質問</a>
                    </li>
                </ul>
            </div>
            <div class="heading_text">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/faq-heading-image.png">
                <h2>よくある質問</h2>
            </div>
            <div class="faq_inner_boxs_sec">
                <div class="faq_inner_boxs_sec_inner">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/faq-girl-image.png" class="faq_girl_image">
                    <div class="custom_row">
                        <div class="custom_col_4">
                            <div class="faq_inner_boxs_links faq_inner_boxs_links_active">
                                <a class="faq_active_btn js_scrollto" data-href="#id_about">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/faq-icon-1.png">
                                    <span>任意売却Dr.<br>
                                    について</span>
                                </a>
                            </div>
                        </div>
                        <div class="custom_col_4">
                            <div class="faq_inner_boxs_links">
                                <a class="js_scrollto" data-href="#id_aboutservice">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/faq-icon-2.png">
                                    <span>任意売却Dr.の<br>
                                    サービスについて</span>
                                </a>
                            </div>
                        </div>
                        <div class="custom_col_4">
                            <div class="faq_inner_boxs_links">
                                <a class="js_scrollto" data-href="#id_aboutselling">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/faq-icon-3.png">
                                    <span>住宅ローン滞納<br>
                                    任意売却について</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="scroll_pos" id="id_about" style="transform:translateY(-50px)"></div>
            <div class="about_voluntary_sale_dr_tab_sec">
                <div class="about_voluntary_sale_dr_tab_heading">
                    <p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/faq-image.png">任意売却Dr.について</p>
                </div>
                <div class="about_voluntary_sale_dr_tab ">
                    <div id="faq_accordion0">
<?php    foreach($faq_list0 as $faq_id) : 
                $loop_id = $faq_id;
                $loop_question = get_post_meta($loop_id, 'question', true);
                $loop_answer = get_post_meta($loop_id, 'answer', true);
                $loop_scrollid = "id_".$loop_id;
?>
                        <h3><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image.png" class="q_image"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image-white.png" class="q_image_white">
                            <a class="scroll_posa" id="<?php echo $loop_scrollid; ?>"></a><?php echo $loop_question; ?></h3>
                        <div>
                            <p><?php echo $loop_answer; ?></p>
                        </div>
<?php endforeach;?>
                    </div>
                </div>
            </div>
            <div class="scroll_pos" id="id_aboutservice"></div>
            <div class="about_voluntary_sale_dr_tab_sec about_voluntary_sale_dr_tab_sec_second">
                <div class="about_voluntary_sale_dr_tab_heading">
                    <p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/faq-image.png">任意売却Dr.のサービスについて</p>
                </div>
                <div class="about_voluntary_sale_dr_tab ">
                    <div id="faq_accordion1">
<?php    foreach($faq_list1 as $faq_id) : 
                $loop_id = $faq_id;
                $loop_question = get_post_meta($loop_id, 'question', true);
                $loop_answer = get_post_meta($loop_id, 'answer', true);
                $loop_scrollid = "id_".$loop_id;
?>
                        <h3><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image.png" class="q_image"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image-white.png" class="q_image_white">
                            <a class="scroll_posa" id="<?php echo $loop_scrollid; ?>"></a><?php echo $loop_question; ?></h3>
                        <div>
                            <p><?php echo $loop_answer; ?></p>
                        </div>
<?php endforeach;?>
                    </div>
                </div>
            </div>
            <div class="scroll_pos" id="id_aboutselling"></div>
            <div class="about_voluntary_sale_dr_tab_sec about_voluntary_sale_dr_tab_sec_third">
                <div class="about_voluntary_sale_dr_tab_heading">
                    <p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/faq-image.png">住宅ローン滞納・任意売却について</p>
                </div>
                <div class="about_voluntary_sale_dr_tab ">
                    <div id="faq_accordion2">
<?php    foreach($faq_list2 as $faq_id) : 
                $loop_id = $faq_id;
                $loop_question = get_post_meta($loop_id, 'question', true);
                $loop_answer = get_post_meta($loop_id, 'answer', true);
                $loop_scrollid = "id_".$loop_id;
?>
                        <h3><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image.png" class="q_image"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image-white.png" class="q_image_white">
                            <a class="scroll_posa" id="<?php echo $loop_scrollid; ?>"></a><?php echo $loop_question; ?></h3>
                        <div>
                            <p><?php echo $loop_answer; ?></p>
                        </div>
<?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
$(document).ready(function(){
    let active0 = <?php echo $scrollsec_no0; ?>;
    let active1 = <?php echo $scrollsec_no1; ?>;
    let active2 = <?php echo $scrollsec_no2; ?>;
    let scrollid = "<?php echo $scrollpos_id; ?>";
    $( "#faq_accordion0" ).accordion({
		heightStyle: "content",
		collapsible: true,
        active: active0,
	});
	$( "#faq_accordion1" ).accordion({
		heightStyle: "content",
		collapsible: true,
        active: active1,
	});
	$( "#faq_accordion2" ).accordion({
		heightStyle: "content",
		collapsible: true,
        active: active2,
	});
    if(scrollid.length > 0){
        console.log(scrollid);
        setTimeout(function() {
            $('html, body').animate({
                scrollTop: $('#'+scrollid).offset().top
            }, 300);
        }, 100);
    }
});
</script>

</main><!-- #main -->
<?php
get_footer();