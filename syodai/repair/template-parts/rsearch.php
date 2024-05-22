<?php /* Template Name: Rsearch */ ?>
<?php get_header(); ?>

<?php

$pageno = 1;

$starshop_id = get_option( 'myoptions_starshop' );

$main_filter = array(
    'relation' => 'OR',
    array(
        // 'key' => 'area_sub'.$area_deep_length,
        // 'value' => $area_deep[$area_deep_length-1],
        // 'compare' => '=',
    )
);
$main_key = array(
    'post_type' => 'shop',
    'post_status' => 'publish',
    'meta_query' => $main_filter,
    // 'orderby' => 'meta_value_num',
    // 'meta_key' => 'rank_point',
);
$main_query = new WP_Query($main_key);
$temp_ids  = [];
if($main_query->have_posts()) :
	while ($main_query->have_posts()) :
        $main_query->the_post();
		$loop_id = get_the_id();
        if($loop_id != $starshop_id) array_push($temp_ids, $loop_id);
    endwhile;
endif;
$shop_ids = [];
if($pageno == 1) {
    if(count($temp_ids) < 4) {
        array_push($temp_ids, $starshop_id);
        $shop_ids = $temp_ids;
    }
    else {
        for($i=0;$i<count($temp_ids);$i++) {
            array_push($shop_ids, $temp_ids[$i]);
            if($i==3) {
                array_push($shop_ids, $starshop_id);
            }
        }
    }
}
else {
    $shop_ids = $temp_ids;
}
wp_reset_query();
global $wpdb;
$client_ip = get_client_ip();
$totalrow = $wpdb->get_results("SELECT post_id FROM $wpdb->think_table WHERE client_ip = '$client_ip'");
$g_think_ids=[];
foreach($totalrow as $eachrow) {
    array_push($g_think_ids, $eachrow->post_id);
}
?>
<!-- fixed, modal part -->
<?php echo_all_tags_modal(); ?>
<?php echo_think_modal(); ?>
<!-- fixed, modal part end -->

<section class="estimate_list_box_section">
    <h5>見積り一覧</h5>
    <div class="estimate_list_box_content">
        <h1>選択中 <span class="api_think_count">
<?php
if(count($g_think_ids)<10) echo '0'.count($g_think_ids);
else echo count($g_think_ids);
?>            
        </span>件</h1>
        <p class="js_modalbtn" data-tag="id_store_modal"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/file_icon.svg"><span>選択店舗を見る</span></p>
        <a href="<?php echo get_site_url(); ?>/estimation" class="model_btn"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_thewlis.svg">一括見積リス</a>
    </div>
</section>
<section class="contents_form_section">
    <div class="custom_container">
        <div class="contents_form_sec">
            <div class="rsearch_control js_dropdown rotate_icon" data-tag="id_rsearch_form">
                <span>検索内容を変更する</span>
                <img class="ic_plus" src="<?php echo get_stylesheet_directory_uri(); ?>/images/plus_circle3.svg">
                <img class="ic_minus" src="<?php echo get_stylesheet_directory_uri(); ?>/images/minus_circle1.svg">
            </div>
<!--  -->   <div class="csp" style="content:''; height:20px; width:100%"></div>
            <div id="id_rsearch_form">
                <form>
                    <div class="custom_row">
                        <div class="contents_tab_col">
                            <div class="contents_tab_box">
                                <div class="nationwide_contnet_tabs_sec">
                                    <div class="nationwide_list_tab_title">
                                        <ul>
                                            <li><a class="area_tab" href="javascript:void(0);" data-tag="tab1">エリアから検索</a></li>
                                            <li><a class="station_tab" href="javascript:void(0);" data-tag="tab2">駅から検索</a></li>
                                        </ul>
                                    </div>
                                    <div class="nationwide_list_tab_content">
                                        <div class="nationwide_tab_content" id="tab1">
                                            <div class="nationwide_tab_content_input tab_content_active">
                                                <div class="area_input_box1">
                                                    <div class="cinput_obj">
                                                        <input type="text" placeholder="東京都">
                                                        <span class="cinput_clear"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_cicle_close1.svg"></span>
                                                    </div>
                                                </div>
                                                <div class="cur_geo">
                                                    <svg class="svg_map_mark0"><use xlink:href="#svg_map_mark0"></use></svg>現在地から
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nationwide_tab_content" style="display: none;" id="tab2">
                                            <div class="nationwide_tab_content_input">
                                                <div class="station_search_box1">
                                                    <div class="cselect_obj">
                                                        <input name="station_name" type="text" readonly="readonly" placeholder="選択してください" class="cstt_opened">
                                                        <span class="cselect_clear"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_cicle_close1.svg"></span>
                                                        <span class="cselect_darrow"><svg class="svg_d_arrow0"><use xlink:href="#svg_d_arrow0"></use></svg></span>
                                                        <span class="cerror_box1">入力してください</span>
                                                        <div class="cselobj_options" style="display: none;">
                                                            <div class="cselobj_options_scroll cscroll_obj mCustomScrollbar _mCS_3 mCS_no_scrollbar"><div id="mCSB_3" class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside" tabindex="0" style="max-height: none;"><div id="mCSB_3_container" class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y" style="position:relative; top:0; left:0;" dir="ltr">
                                                                <div class="cselobj_options_wrap">
                                                                    <div class="cselobj_option" data-value="1">
                                                                        <div class="station_option">
                                                                            <div class="stopt_text">北海道・東北</div>
                                                                            <div class="stopt_btn1">
                                                                                <svg class="svg_r_arrow1"><use xlink:href="#svg_r_arrow1"></use></svg>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cselobj_option" data-value="1">
                                                                        <div class="station_option">
                                                                            <div class="stopt_text">北海道・東北</div>
                                                                            <div class="stopt_btn2">
                                                                                選択する<svg class="svg_r_arrow1"><use xlink:href="#svg_r_arrow1"></use></svg>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cselobj_option" data-value="1">
                                                                        <div class="station_option">
                                                                            <div class="stopt_text">北海道・東北</div>
                                                                            <div class="stopt_btn1">
                                                                                <svg class="svg_r_arrow1"><use xlink:href="#svg_r_arrow1"></use></svg>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cselobj_option" data-value="1">
                                                                        <div class="station_option">
                                                                            <div class="stopt_text">北海道・東北</div>
                                                                            <div class="stopt_btn2">
                                                                                選択する<svg class="svg_r_arrow1"><use xlink:href="#svg_r_arrow1"></use></svg>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cselobj_option" data-value="1">
                                                                        <div class="station_option">
                                                                            <div class="stopt_text">北海道・東北</div>
                                                                            <div class="stopt_btn1">
                                                                                <svg class="svg_r_arrow1"><use xlink:href="#svg_r_arrow1"></use></svg>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cselobj_option" data-value="1">
                                                                        <div class="station_option">
                                                                            <div class="stopt_text">北海道・東北</div>
                                                                            <div class="stopt_btn2">
                                                                                選択する<svg class="svg_r_arrow1"><use xlink:href="#svg_r_arrow1"></use></svg>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cselobj_option" data-value="1">
                                                                        <div class="station_option">
                                                                            <div class="stopt_text">北海道・東北</div>
                                                                            <div class="stopt_btn1">
                                                                                <svg class="svg_r_arrow1"><use xlink:href="#svg_r_arrow1"></use></svg>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cselobj_option" data-value="1">
                                                                        <div class="station_option">
                                                                            <div class="stopt_text">北海道・東北</div>
                                                                            <div class="stopt_btn2">
                                                                                選択する<svg class="svg_r_arrow1"><use xlink:href="#svg_r_arrow1"></use></svg>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cselobj_option" data-value="1">
                                                                        <div class="station_option">
                                                                            <div class="stopt_text">北海道・東北</div>
                                                                            <div class="stopt_btn1">
                                                                                <svg class="svg_r_arrow1"><use xlink:href="#svg_r_arrow1"></use></svg>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cselobj_option" data-value="1">
                                                                        <div class="station_option">
                                                                            <div class="stopt_text">北海道・東北</div>
                                                                            <div class="stopt_btn2">
                                                                                選択する<svg class="svg_r_arrow1"><use xlink:href="#svg_r_arrow1"></use></svg>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><div id="mCSB_3_scrollbar_vertical" class="mCSB_scrollTools mCSB_3_scrollbar mCS-light mCSB_scrollTools_vertical" style="display: none;"><div class="mCSB_draggerContainer"><div id="mCSB_3_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 30px; top: 0px; display: block; height: 80px; max-height: 190px;"><div class="mCSB_dragger_bar" style="line-height: 30px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div></div>
                                                            <div class="cselobj_control">
                                                                <div class="cselobj_prev">
                                                                    <svg class="svg_r_arrow1"><use xlink:href="#svg_r_arrow1"></use></svg><span>戻る</span>
                                                                </div>
                                                                <div class="cselobj_middle">
                                                                    &nbsp;
                                                                </div>
                                                                <div class="cselobj_option_close">
                                                                    <span>× 閉じる</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="contents_content_col">
                            <div class="contents_content_box">
                                <div class="contents_content_box_select">
                                    <div class="custom_row">
                                        <div class="custom_col_6">
                                            <div class="model_name_select light_blue">
                                                <label>機種名</label>
                                                <div class="model_name_select_dark_blue">
                                                    <div class="cselect_obj">
                                                        <input type="text" readonly="readonly" placeholder="機種を選択する">
                                                        <span class="cselect_clear"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_cicle_close1.svg"></span>
                                                        <span class="cselect_darrow"><svg class="svg_d_arrow0"><use xlink:href="#svg_d_arrow0"></use></svg></span>
                                                        <div class="cselobj_options">
                                                            <div class="cselobj_options_scroll cscroll_obj">
                                                                <div class="cselobj_option" data-value="1">
                                                                    <div class="modelname_option"><p>北海道・東北</p>
                                                                    </div>
                                                                </div>
                                                                <div class="cselobj_option" data-value="1">
                                                                    <div class="modelname_option"><p>北海道・東北</p>
                                                                    </div>
                                                                </div>
                                                                <div class="cselobj_option" data-value="1">
                                                                    <div class="modelname_option"><p>北海道・東北</p>
                                                                    </div>
                                                                </div>
                                                                <div class="cselobj_option" data-value="1">
                                                                    <div class="modelname_option"><p>北海道・東北</p>
                                                                    </div>
                                                                </div>
                                                                <div class="cselobj_option" data-value="1">
                                                                    <div class="modelname_option"><p>北海道・東北</p>
                                                                    </div>
                                                                </div>
                                                                <div class="cselobj_option" data-value="1">
                                                                    <div class="modelname_option"><p>北海道・東北</p>
                                                                    </div>
                                                                </div>
                                                                <div class="cselobj_option" data-value="1">
                                                                    <div class="modelname_option"><p>北海道・東北</p>
                                                                    </div>
                                                                </div>
                                                                <div class="cselobj_option" data-value="1">
                                                                    <div class="modelname_option"><p>北海道・東北</p>
                                                                    </div>
                                                                </div>
                                                                <div class="cselobj_option" data-value="1">
                                                                    <div class="modelname_option"><p>北海道・東北</p>
                                                                    </div>
                                                                </div>
                                                                <div class="cselobj_option" data-value="1">
                                                                    <div class="modelname_option"><p>北海道・東北</p>
                                                                    </div>
                                                                </div>
                                                                <div class="cselobj_option" data-value="1">
                                                                    <div class="modelname_option"><p>北海道・東北</p>
                                                                    </div>
                                                                </div>
                                                                <div class="cselobj_option" data-value="1">
                                                                    <div class="modelname_option"><p>北海道・東北</p>
                                                                    </div>
                                                                </div>
                                                                <div class="cselobj_option" data-value="1">
                                                                    <div class="modelname_option"><p>北海道・東北</p>
                                                                    </div>
                                                                </div>
                                                                <div class="cselobj_option" data-value="1">
                                                                    <div class="modelname_option"><p>北海道・東北</p>
                                                                    </div>
                                                                </div>
                                                                <div class="cselobj_option" data-value="1">
                                                                    <div class="modelname_option"><p>北海道・東北</p>
                                                                    </div>
                                                                </div>
                                                                <div class="cselobj_option" data-value="1">
                                                                    <div class="modelname_option"><p>北海道・東北</p>
                                                                    </div>
                                                                </div>
                                                                <div class="cselobj_option" data-value="1">
                                                                    <div class="modelname_option"><p>北海道・東北</p>
                                                                    </div>
                                                                </div>
                                                                <div class="cselobj_option" data-value="1">
                                                                    <div class="modelname_option"><p>北海道・東北</p>
                                                                    </div>
                                                                </div>
                                                                <div class="cselobj_option" data-value="1">
                                                                    <div class="modelname_option"><p>北海道・東北</p>
                                                                    </div>
                                                                </div>
                                                                <div class="cselobj_option" data-value="1">
                                                                    <div class="modelname_option"><p>北海道・東北</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="cselobj_control">
                                                                <div class="cselobj_option_close">
                                                                    <span>× 閉じる</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="custom_col_6">
                                            <div class="model_name_select dark_blue">
                                                <label>修理項目</label>
                                                <div class="model_name_select_light_blue">
                                                    <div class="cselect_obj">
                                                        <input type="text" readonly="readonly" placeholder="項目を選択する">
                                                        <span class="cselect_clear"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_cicle_close1.svg"></span>
                                                        <span class="cselect_darrow"><svg class="svg_d_arrow0"><use xlink:href="#svg_d_arrow0"></use></svg></span>
                                                        <div class="cselobj_options">
                                                            <div class="cselobj_options_scroll cscroll_obj">
                                                                <div class="cselobj_option" data-value="1">
                                                                    <div class="modelname_option"><p>北海道・東北</p>
                                                                    </div>
                                                                </div>
                                                                <div class="cselobj_option" data-value="1">
                                                                    <div class="modelname_option"><p>北海道・東北</p>
                                                                    </div>
                                                                </div>
                                                                <div class="cselobj_option" data-value="1">
                                                                    <div class="modelname_option"><p>北海道・東北</p>
                                                                    </div>
                                                                </div>
                                                                <div class="cselobj_option" data-value="1">
                                                                    <div class="modelname_option"><p>北海道・東北</p>
                                                                    </div>
                                                                </div>
                                                                <div class="cselobj_option" data-value="1">
                                                                    <div class="modelname_option"><p>北海道・東北</p>
                                                                    </div>
                                                                </div>
                                                                <div class="cselobj_option" data-value="1">
                                                                    <div class="modelname_option"><p>北海道・東北</p>
                                                                    </div>
                                                                </div>
                                                                <div class="cselobj_option" data-value="1">
                                                                    <div class="modelname_option"><p>北海道・東北</p>
                                                                    </div>
                                                                </div>
                                                                <div class="cselobj_option" data-value="1">
                                                                    <div class="modelname_option"><p>北海道・東北</p>
                                                                    </div>
                                                                </div>
                                                                <div class="cselobj_option" data-value="1">
                                                                    <div class="modelname_option"><p>北海道・東北</p>
                                                                    </div>
                                                                </div>
                                                                <div class="cselobj_option" data-value="1">
                                                                    <div class="modelname_option"><p>北海道・東北</p>
                                                                    </div>
                                                                </div>
                                                                <div class="cselobj_option" data-value="1">
                                                                    <div class="modelname_option"><p>北海道・東北</p>
                                                                    </div>
                                                                </div>
                                                                <div class="cselobj_option" data-value="1">
                                                                    <div class="modelname_option"><p>北海道・東北</p>
                                                                    </div>
                                                                </div>
                                                                <div class="cselobj_option" data-value="1">
                                                                    <div class="modelname_option"><p>北海道・東北</p>
                                                                    </div>
                                                                </div>
                                                                <div class="cselobj_option" data-value="1">
                                                                    <div class="modelname_option"><p>北海道・東北</p>
                                                                    </div>
                                                                </div>
                                                                <div class="cselobj_option" data-value="1">
                                                                    <div class="modelname_option"><p>北海道・東北</p>
                                                                    </div>
                                                                </div>
                                                                <div class="cselobj_option" data-value="1">
                                                                    <div class="modelname_option"><p>北海道・東北</p>
                                                                    </div>
                                                                </div>
                                                                <div class="cselobj_option" data-value="1">
                                                                    <div class="modelname_option"><p>北海道・東北</p>
                                                                    </div>
                                                                </div>
                                                                <div class="cselobj_option" data-value="1">
                                                                    <div class="modelname_option"><p>北海道・東北</p>
                                                                    </div>
                                                                </div>
                                                                <div class="cselobj_option" data-value="1">
                                                                    <div class="modelname_option"><p>北海道・東北</p>
                                                                    </div>
                                                                </div>
                                                                <div class="cselobj_option" data-value="1">
                                                                    <div class="modelname_option"><p>北海道・東北</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="cselobj_control">
                                                                <div class="cselobj_option_close">
                                                                    <span>× 閉じる</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="csp9">
                                    <div class="selected_kodawari">
                                        <div class="each_kodawari">こだわり条件の内容</div>
                                        <div class="each_kodawari">こだわり条件の内容</div>
                                        <div class="each_kodawari">こだわり条件の内容</div>
                                        <div class="each_kodawari">こだわり条件の内容</div>
                                        <div class="each_kodawari">こだわり条件の内容</div>
                                        <div class="each_kodawari">こだわり条件の内容</div>
                                        <div class="each_kodawari">こだわり条件の内容</div>
                                    </div>
                                </div>
                                <div class="contents_content_box_search">
                                    <div class="custom_row">
                                        <div class="custom_col_contents_content">
                                            <div class="more_search_box_wrap1">
                                                <div class="more_search_box1">
                                                    <div class="more_search_button js_dropdown rotate_icon" data-tag="id_more_search_detail">
                                                        こだわり検索
                                                        <img class="more_search_plus_img" src="<?php echo get_stylesheet_directory_uri(); ?>/images/plus_circle2.svg">
                                                        <img class="more_search_minus_img" src="<?php echo get_stylesheet_directory_uri(); ?>/images/minus_circle2.svg">
                                                    </div>
                                                    <div class="more_search_detail" id="id_more_search_detail" style="display:none">
                                                    <div class="main_drop_item">
                                                        <div class="drop_item_title">
                                                            修理希望時間
                                                        </div>
                                                        <div class="main_drop_select">
                                                            <div class="coselect_wrap">
                                                                <select>
                                                                    <option>選択する</option>
                                                                    <option>選択する</option>
                                                                    <option>選択する</option>
                                                                    <option>選択する</option>
                                                                </select>
                                                                <span class="coselect_darrow"><svg class="svg_d_arrow0"><use xlink:href="#svg_d_arrow0"></use></svg></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="main_drop_item">
                                                        <div class="drop_item_title">
                                                        距離
                                                        </div>
                                                        <div class="main_drop_select">
                                                            <div class="coselect_wrap">
                                                                <select>
                                                                    <option>選択する</option>
                                                                    <option>選択する</option>
                                                                    <option>選択する</option>
                                                                    <option>選択する</option>
                                                                </select>
                                                                <span class="coselect_darrow"><svg class="svg_d_arrow0"><use xlink:href="#svg_d_arrow0"></use></svg></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="main_drop_item">
                                                        <div class="drop_item_title">
                                                        こだわり内容
                                                        </div>
                                                        <ul class="search_particularity">
                                                            <li>
                                                                <a class="js_checkable" href="javascript:void(0)">タグ名が入ります</a>
                                                            </li>
                                                            <li>
                                                                <a class="js_checkable" href="javascript:void(0)">タグ名</a>
                                                            </li>
                                                            <li>
                                                                <a class="js_checkable" href="javascript:void(0)">タグ名</a>
                                                            </li>
                                                            <li>
                                                                <a class="js_checkable" href="javascript:void(0)">タグ名が入ります</a>
                                                            </li>
                                                            <li>
                                                                <a class="js_checkable" href="javascript:void(0)">タグ名が入ります</a>
                                                            </li>
                                                        </ul>
                                                        <div class="search_see_more js_dropdown rotate_icon" data-tag="id_more_search_tags">
                                                            <a hrsf="#">
                                                                <h5>もっと見る</h5>
                                                                <img class="more_search_tags_plus_img" src="<?php echo get_stylesheet_directory_uri(); ?>/images/plus_circle2.svg">
                                                                <img class="more_search_tags_minus_img" src="<?php echo get_stylesheet_directory_uri(); ?>/images/minus_circle2.svg">
                                                            </a>
                                                        </div>
                                                        <ul class="search_particularity_grey" id="id_more_search_tags" style="display:none">
                                                            <li>
                                                                <a class="js_checkable" href="javascript:void(0)">タグ名</a>
                                                            </li>
                                                            <li>
                                                                <a class="js_checkable" href="javascript:void(0)">タグタグ</a>
                                                            </li>
                                                            <li>
                                                                <a class="js_checkable" href="javascript:void(0)">タグタグタグ</a>
                                                            </li>
                                                            <li>
                                                                <a class="js_checkable" href="javascript:void(0)">タグ名タグ</a>
                                                            </li>
                                                            <li>
                                                                <a class="js_checkable" href="javascript:void(0)">タグタグタグタグ</a>
                                                            </li>
                                                            <li>
                                                                <a class="js_checkable" href="javascript:void(0)">タグ名</a>
                                                            </li>
                                                            <li>
                                                                <a class="js_checkable" href="javascript:void(0)">タグ名</a>
                                                            </li>
                                                            <li>
                                                                <a class="js_checkable" href="javascript:void(0)">タグ名</a>
                                                            </li>
                                                            <li>
                                                                <a class="js_checkable" href="javascript:void(0)">タグタグタグ名</a>
                                                            </li>
                                                        </ul>
                                                        <a href="javascript:void(0)" class="more_search_clear">こだわり検索をすベてクリアにする</a>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="custom_col_contents_content_btn">
                                            <a href="javascript:void(0)" class="blue_btn no_shadow"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_search2.svg">検索する</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="cpc9">
                    <div class="selected_kodawari">
                        <div class="each_kodawari">こだわり条件の内容</div>
                        <div class="each_kodawari">こだわり条件の内容</div>
                        <div class="each_kodawari">こだわり条件の内容</div>
                        <div class="each_kodawari">こだわり条件の内容</div>
                        <div class="each_kodawari">こだわり条件の内容</div>
                        <div class="each_kodawari">こだわり条件の内容</div>
                        <div class="each_kodawari">こだわり条件の内容</div>
                    </div>
                </div>
                <div class="csp" style="content:''; height:20px; width:100%"></div>
            </div>
        </div>
    </div>
</section>
<section class="latest_article_section search_result_section">
    <div class="custom_container">
        <div class="custom_row">
            <div class="repair_tokyo_col">
                <div class="repair_tokyo_content">
                    <h2>東京都でiPhone8の画面割れ修理を検索する。</h2>
                    <p>50件（1〜10件）</p>
<?php
for($i=0;$i<count($shop_ids);$i++) {
    $loop_id = $shop_ids[$i];
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
                    <div class="<?php echo $store_class; ?>">
<?php
if($loop_id == $starshop_id) :
?>
                        <span class="cio_content_tab">郵送で修理する</span>
<?php
endif;
?>
                        <h3><?php echo $loop_title; ?></h3>
                        <div class="csp">
                            <div class="store_description">
                                <p><?php echo $loop_desc; ?></p>
                            </div>
                        </div>
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="store_name_content_box_tag_list_sec">
                                <div class="store_tag_list_sp">
<?php 
    if($loop_tags) {
        foreach($loop_tags as $loop_tag) {
            echo '<span>'.$loop_tag->name.'</span>';
        }
    }
?>
                                </div>
                                <div class="custom_row">
                                    <div class="custom_col_image">
                                        <div class="store_box_tag_list_image">
                                            <img src="<?php echo $loop_photo_small; ?>">
                                        </div>
                                    </div>
                                    <div class="custom_col_text">
                                        <div class="store_box_tag_list_text">
                                            <div class="store_tag_list_pc">
<?php 
    if($loop_tags) {
        foreach($loop_tags as $loop_tag) {
            echo '<span>'.$loop_tag->name.'</span>';
        }
    }
?>
                                            </div>
                                            <p><?php echo '住所 ： '.$loop_full_address; ?></p>
                                            <a target="_blank" href="<?php echo $loop_maplink; ?>">
                                                <svg class="svg_map_mark0"><use xlink:href="#svg_map_mark0"></use></svg>MAPで見る
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="store_name_content_box_dropdown">
                                <div class="has_custom_drop_menu">
                                    <div class="store_more_view js_dropdown" data-tag="id_store_more_view<?php echo $loop_id; ?>">詳細を見る<img class="rotate_icon" src="<?php echo get_stylesheet_directory_uri();?>/images/ic_d_arrow1.svg"></div>
                                    <div class="custom_drop_menu" id="id_store_more_view<?php echo $loop_id; ?>" style="display: none;">
                                        <div class="drop_menu_item_container">
                                            <div class="store_name_table">
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>感染症対策</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <p><?php echo $loop_anti_virus; ?></p>
                                                    </div>
                                                </div>
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>クーポン・割引</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <p><?php echo $loop_discount; ?></p>
                                                    </div>
                                                </div>
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>出張修理</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <p><?php echo $loop_on_site; ?></p>
                                                    </div>
                                                </div>
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>修理可能な端末</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <p><?php echo $loop_repairable; ?></p>
                                                    </div>
                                                </div>
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>Android即日対応</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <p><?php echo $loop_android_onday; ?></p>
                                                    </div>
                                                </div>
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>保証期間</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <p><?php echo $loop_repair_time; ?></p>
                                                    </div>
                                                </div>
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>定休日</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <p><?php echo $loop_off_days_more; ?></p>
                                                    </div>
                                                </div>
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>店舗情報</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <ul>
                                                            <li>
                                                                <p><?php echo $loop_title; ?></p>
                                                            </li>
                                                            <li>
                                                                <p><?php echo $loop_zip; ?><br>
                                                                    <?php echo $loop_full_address; ?>    
                                                                </p>
                                                            </li>
                                                            <li>
                                                                <a href="tel:<?php echo $loop_tel; ?>">TEL<?php echo ' '.$loop_tel; ?></a>
                                                            </li>
                                                            <li>
                                                                <a target="_blank" href="<?php echo $loop_shop_url; ?>" class="store_name_table_link">お店のホームページを見る</a>
                                                            </li>
                                                            <li>
                                                                <h6>お店への直接ご予約の場合は、シューリスを見たと必ずお伝えください</h6>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="javascript:void(0)" class="store_name_link api_think" data-sh_type="add_think" data-sh_id="<?php echo $loop_id; ?>" style="<?php echo $loop_addthink_style; ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/plus_circle4.svg">見積りに入れる</a>
                            <a href="javascript:void(0)" class="del_store_name_link api_think" data-sh_type="del_think" data-sh_id="<?php echo $loop_id; ?>" style="<?php echo $loop_delthink_style; ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/minus_circle4.svg">見積りから外す</a>
                        </div>
                    </div>
<?php    
}
?>
                    <div class="custom_pagination">
                        <ul>
                            <li><a href="javascript:void(0)"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_l_arrow2.svg"></a></li>
                            <li><p><span class="active_page">1</span> / 15</p></li>
                            <li><a href="javascript:void(0)"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow2.svg"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>