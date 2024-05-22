<?php /* Template Name: Rsearch Design */ ?>
<?php get_header(); ?>

<?php
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
$shop_ids  = [];
if($main_query->have_posts()) :
	while ($main_query->have_posts()) :
        $main_query->the_post();
		$loop_id = get_the_id();
        if($loop_id != $starshop_id) array_push($shop_ids, $loop_id);
    endwhile;
endif;
?>
<!-- fixed, modal part -->
<?php echo_all_tags_modal(); ?>
<!-- fixed, modal part end -->


<div class="cmodal" id="id_store_modal" style="display:none">
    <div class="cmodal_window">
        <a href="javascript:void(0);" class="cmodal_close"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_cicle_close2.svg"></a>
        <div class="store_modal_content">
            <div class="store_modal_body">
                <div class="store_modal_body_inner">
                    <h2 class="store_modal_heading">見積り選択中の店舗（最大10件）</h2>
                    <div class="store_modal_content_inner_text cscroll_obj">
                        <div class="store_name_content_sec">
                            <h3>店舗名が入ります<span>（32文字）</span></h3>
                            <div class="store_name_content_box">
                                <div class="store_name_content_box_inner">
                                    <div class="custom_row">
                                        <div class="custom_col_image">
                                            <div class="store_name_content_box_image">
                                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/artical_image.png">
                                            </div>
                                        </div>
                                        <div class="custom_col_text">
                                            <div class="store_name_content_box_text">
                                                <p class="cpc">店舗の説明文章が入ります店舗の説明文章が入ります店舗の説明文章が入ります店舗の説明文章が入ります（最大52文字）</p>
                                                <ul>
                                                    <li>
                                                        <p class="time_text"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/time_icon.svg">00:00~00:00</p>
                                                    </li>
                                                    <li>
                                                        <p class="day_text"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/day_icon.svg">火 水 金</p>
                                                    </li>
                                                    <li>
                                                        <p class="station_text"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/station_icon.svg">●●駅</p>
                                                    </li>
                                                </ul>
                                                <a href="javascript:void(0)">× 見積りから外す</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="store_name_content_sec">
                            <h3>店舗名が入ります<span>（32文字）</span></h3>
                            <div class="store_name_content_box">
                                <div class="store_name_content_box_inner">
                                    <div class="custom_row">
                                        <div class="custom_col_image">
                                            <div class="store_name_content_box_image">
                                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/artical_image.png">
                                            </div>
                                        </div>
                                        <div class="custom_col_text">
                                            <div class="store_name_content_box_text">
                                                <p class="cpc">店舗の説明文章が入ります店舗の説明文章が入ります店舗の説明文章が入ります店舗の説明文章が入ります（最大52文字）</p>
                                                <ul>
                                                    <li>
                                                        <p class="time_text"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/time_icon.svg">00:00~00:00</p>
                                                    </li>
                                                    <li>
                                                        <p class="day_text"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/day_icon.svg">火 水 金</p>
                                                    </li>
                                                    <li>
                                                        <p class="station_text"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/station_icon.svg">●●駅</p>
                                                    </li>
                                                </ul>
                                                <a href="javascript:void(0)">× 見積りから外す</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="store_name_model_btns">
                <div class="store_name_model_btns_inner">
                    <ul>
                        <li class="custom_col_text">
                            <p>戻る</p>
                        </li>
                        <li class="custom_col_btn">
                            <a href="javascript:void(0)"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.png">一括見積リス</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="estimate_list_box_section">
    <h5>見積り一覧</h5>
    <div class="estimate_list_box_content">
        <h1>選択中 <span>00</span>件</h1>
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
            <div class="csp" style="content:''; height:20px; width:100%"></div>
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
                                                <button>現在地から</button>
                                            </div>
                                        </div>
                                        <div class="nationwide_tab_content" style="display: none;" id="tab2">
                                            <div class="nationwide_tab_content_input">
                                                <div class="station_search_box1">
                                                    <div class="ctreesel_obj">
                                                        <input type="text" readonly="readonly" placeholder="駅から検索">
                                                        <span class="ctreesel_clear"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_cicle_close1.svg"></span>
                                                        <div class="ctreesel_options">
                                                            <div class="ctreesel_options_wrap">
                                                                <div class="ctree1_options cscroll_obj">
                                                                    <div class="ctree1_option" data-value="1"><div class="station1_item"><span>駅から検索</span><span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow3.svg"></span></div></div>
                                                                    <div class="ctree1_option" data-value="1"><div class="station1_item"><span>駅から検索</span><span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow3.svg"></span></div></div>
                                                                    <div class="ctree1_option" data-value="1"><div class="station1_item"><span>駅から検索</span><span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow3.svg"></span></div></div>
                                                                    <div class="ctree1_option" data-value="1"><div class="station1_item"><span>駅から検索</span><span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow3.svg"></span></div></div>
                                                                    <div class="ctree1_option" data-value="1"><div class="station1_item"><span>駅から検索</span><span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow3.svg"></span></div></div>
                                                                    <div class="ctree1_option" data-value="1"><div class="station1_item"><span>駅から検索</span><span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow3.svg"></span></div></div>
                                                                    <div class="ctree1_option" data-value="1"><div class="station1_item"><span>駅から検索</span><span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow3.svg"></span></div></div>
                                                                    <div class="ctree1_option" data-value="1"><div class="station1_item"><span>駅から検索</span><span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow3.svg"></span></div></div>
                                                                    <div class="ctree1_option" data-value="1"><div class="station1_item"><span>駅から検索</span><span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow3.svg"></span></div></div>
                                                                    <div class="ctree1_option" data-value="1"><div class="station1_item"><span>駅から検索</span><span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow3.svg"></span></div></div>
                                                                    <div class="ctree1_option" data-value="1"><div class="station1_item"><span>駅から検索</span><span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow3.svg"></span></div></div>
                                                                    
                                                                </div>
                                                                <div class="ctree2_options cscroll_obj">
                                                                    <div class="ctree2_option" data-value="1"><div class="station2_item"><span>岡山駅</span><span>選択する<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow4.svg"></span></div></div>
                                                                    <div class="ctree2_option" data-value="1"><div class="station2_item"><span>岡山駅</span><span>選択する<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow4.svg"></span></div></div>
                                                                    <div class="ctree2_option" data-value="1"><div class="station2_item"><span>岡山駅</span><span>選択する<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow4.svg"></span></div></div>
                                                                    <div class="ctree2_option" data-value="1"><div class="station2_item"><span>岡山駅</span><span>選択する<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow4.svg"></span></div></div>
                                                                    <div class="ctree2_option" data-value="1"><div class="station2_item"><span>岡山駅</span><span>選択する<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow4.svg"></span></div></div>
                                                                    <div class="ctree2_option" data-value="1"><div class="station2_item"><span>岡山駅</span><span>選択する<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow4.svg"></span></div></div>
                                                                    <div class="ctree2_option" data-value="1"><div class="station2_item"><span>岡山駅</span><span>選択する<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow4.svg"></span></div></div>
                                                                    <div class="ctree2_option" data-value="1"><div class="station2_item"><span>岡山駅</span><span>選択する<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow4.svg"></span></div></div>
                                                                    <div class="ctree2_option" data-value="1"><div class="station2_item"><span>岡山駅</span><span>選択する<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow4.svg"></span></div></div>
                                                                    <div class="ctree2_option" data-value="1"><div class="station2_item"><span>岡山駅</span><span>選択する<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow4.svg"></span></div></div>
                                                                    <div class="ctree2_option" data-value="1"><div class="station2_item"><span>岡山駅</span><span>選択する<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow4.svg"></span></div></div>
                                                                    <div class="ctree2_option" data-value="1"><div class="station2_item"><span>岡山駅</span><span>選択する<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow4.svg"></span></div></div>
                                                                    <div class="ctree2_option" data-value="1"><div class="station2_item"><span>岡山駅</span><span>選択する<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow4.svg"></span></div></div>
                                                                    <div class="ctree2_option" data-value="1"><div class="station2_item"><span>岡山駅</span><span>選択する<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow4.svg"></span></div></div>
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="ctreesel_control">
                                                                <div class="ctree_prev">
                                                                    <span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_l_arrow2.svg"></i>戻る</span>
                                                                </div>
                                                                <div class="ctreesel_option_close">
                                                                    <span>× リセットして閉じる</span>
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
                                                                <span>× リセットして閉じる</span>
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
                                                    <input type="text" readonly="readonly" placeholder="機種を選択する">
                                                    <span class="cselect_clear"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_cicle_close1.svg"></span>
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
                                                                <span>× リセットして閉じる</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="contents_form_text csp">
                                <li>
                                    <p>こだわり条件の内容</p>
                                </li>
                                <li>
                                    <p>こだわり条件の内容</p>
                                </li>
                                <li>
                                    <p>こだわり条件の内容</p>
                                </li>
                                <li>
                                    <p>こだわり条件の内容</p>
                                </li>
                                <li>
                                    <p>こだわり条件の内容</p>
                                </li>
                                <li>
                                    <p>こだわり条</p>
                                </li>
                            </ul>
                            <div class="contents_content_box_search">
                                <div class="custom_row">
                                    <div class="custom_col_contents_content">
                                        <div class="discerning_search_box_sec">
                                            <a href="javascript:void(0)" class="discerning_search_box">
                                                <h4>こだわり検索</h4>
                                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/plus_circle2.svg">
                                            </a>
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
                <ul class="contents_form_text">
                    <li>
                        <p>こだわり条件の内容</p>
                    </li>
                    <li>
                        <p>こだわり条件の内容</p>
                    </li>
                    <li>
                        <p>こだわり条件の内容</p>
                    </li>
                    <li>
                        <p>こだわり条件の内容</p>
                    </li>
                    <li>
                        <p>こだわり条件の内容</p>
                    </li>
                    <li>
                        <p>こだわり条</p>
                    </li>
                </ul>
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
                                                    <p class="time_text"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/time_icon.svg">00:00~00:00</p>
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
                                <ul class="store_box_tag_list csp-675">
                                    <?php 
                                        if($loop_tags) {
                                            foreach($loop_tags as $loop_tag) {
                                                echo '<li><p>'.$loop_tag->name.'</p></li>';
                                            }
                                        }
                                    ?>
                                </ul>
                                <div class="custom_row">
                                    <div class="custom_col_image">
                                        <div class="store_box_tag_list_image">
                                            <img src="<?php echo $loop_photo_small; ?>">
                                        </div>
                                    </div>
                                    <div class="custom_col_text">
                                        <div class="store_box_tag_list_text">
                                            <p><?php echo '住所 ： '.$loop_full_address; ?></p>
                                            <a target="_blank" href="<?php echo $loop_maplink; ?>"><img src="<?php echo get_stylesheet_directory_uri();?>/images/ic_map1.svg">MAPで見る</a>
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
                            <a href="javascript:void(0)" class="store_name_link"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/plus_circle4.svg">見積りに入れる</a>
                        </div>
                    </div>
<?php    
}
?>
                    <div class="store_name_content_sec">
                        <h3>店舗名が入ります<span>（32文字）</span></h3>
                        <div class="store_name_content_box">
                            <div class="store_name_content_box_inner">
                                <div class="custom_row">
                                    <div class="custom_col_image">
                                        <div class="store_name_content_box_image">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/artical_image.png">
                                        </div>
                                    </div>
                                    <div class="custom_col_text">
                                        <div class="store_name_content_box_text">
                                            <p class="cpc">店舗の説明文章が入ります店舗の説明文章が入ります店舗の説明文章が入ります店舗の説明文章が入ります（最大52文字）</p>
                                            <ul>
                                                <li>
                                                    <p class="time_text"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/time_icon.svg">00:00~00:00</p>
                                                </li>
                                                <li>
                                                    <p class="day_text"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/day_icon.svg">火 水 金</p>
                                                </li>
                                                <li>
                                                    <p class="station_text"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/station_icon.svg">●●駅</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="store_name_content_box_tag_list_sec">
                                <ul class="store_box_tag_list csp-675">
                                    <li>
                                        <p>タグ名が入ります</p>
                                    </li>
                                    <li>
                                        <p>タグ名が入ります</p>
                                    </li>
                                    <li>
                                        <p>タグ名が入ります</p>
                                    </li>
                                    <li>
                                        <p>タグ名が入ります</p>
                                    </li>
                                </ul>
                                <div class="custom_row">
                                    <div class="custom_col_image">
                                        <div class="store_box_tag_list_image">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/artical_image.png">
                                        </div>
                                    </div>
                                    <div class="custom_col_text">
                                        <div class="store_box_tag_list_text">
                                            <p>住所 ： 奈良県奈良市二条大路1-3-1 ミ・ナーラ2F</p>
                                            <a href="javascript:void(0)"><img src="<?php echo get_stylesheet_directory_uri();?>/images/ic_map1.svg">MAPで見る</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="store_name_content_box_dropdown">
                                <div class="has_custom_drop_menu">
                                    <div class="store_more_view js_dropdown" data-tag="id_store_more_view">詳細を見る<img class="rotate_icon" src="<?php echo get_stylesheet_directory_uri();?>/images/ic_d_arrow1.svg"></div>
                                    <div class="custom_drop_menu" id="id_store_more_view" style="display: none;">
                                        <div class="drop_menu_item_container">
                                            <div class="store_name_table">
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>感染症対策</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <p>あり</p>
                                                    </div>
                                                </div>
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>クーポン・割引</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <p>なし</p>
                                                    </div>
                                                </div>
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>出張修理</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <p>出張なし</p>
                                                    </div>
                                                </div>
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>修理可能な端末</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <p>Android / iPhone / iPad / ゲーム機 / パソコン</p>
                                                    </div>
                                                </div>
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>Android即日対応</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <p>あり</p>
                                                    </div>
                                                </div>
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>保証期間</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <p>3カ月</p>
                                                    </div>
                                                </div>
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>定休日</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <p>定休日と定休日の詳細が入ります</p>
                                                    </div>
                                                </div>
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>店舗情報</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <ul>
                                                            <li>
                                                                <p>店舗名が入ります</p>
                                                            </li>
                                                            <li>
                                                                <p>〒000-0000<br>
                                                                    奈良県奈良市二条大路1-3-1<br>
                                                                ミ・ナーラ2F </p>
                                                            </li>
                                                            <li>
                                                                <a href="tel:0０００００００００">TEL 0０-００００-００００</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="store_name_table_link">お店のホームページを見る</a>
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
                            <a href="javascript:void(0)" class="store_name_link"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/plus_circle4.svg">見積りに入れる</a>
                        </div>
                    </div>
                    <div class="store_name_content_sec">
                        <h3>店舗名が入ります<span>（32文字）</span></h3>
                        <div class="store_name_content_box">
                            <div class="store_name_content_box_inner">
                                <div class="custom_row">
                                    <div class="custom_col_image">
                                        <div class="store_name_content_box_image">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/artical_image.png">
                                        </div>
                                    </div>
                                    <div class="custom_col_text">
                                        <div class="store_name_content_box_text">
                                            <p class="cpc">店舗の説明文章が入ります店舗の説明文章が入ります店舗の説明文章が入ります店舗の説明文章が入ります（最大52文字）</p>
                                            <ul>
                                                <li>
                                                    <p class="time_text"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/time_icon.svg">00:00~00:00</p>
                                                </li>
                                                <li>
                                                    <p class="day_text"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/day_icon.svg">火 水 金</p>
                                                </li>
                                                <li>
                                                    <p class="station_text"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/station_icon.svg">●●駅</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="store_name_content_box_tag_list_sec">
                                <ul class="store_box_tag_list csp-675">
                                    <li>
                                        <p>タグ名が入ります</p>
                                    </li>
                                    <li>
                                        <p>タグ名が入ります</p>
                                    </li>
                                    <li>
                                        <p>タグ名が入ります</p>
                                    </li>
                                    <li>
                                        <p>タグ名が入ります</p>
                                    </li>
                                </ul>
                                <div class="custom_row">
                                    <div class="custom_col_image">
                                        <div class="store_box_tag_list_image">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/artical_image.png">
                                        </div>
                                    </div>
                                    <div class="custom_col_text">
                                        <div class="store_box_tag_list_text">
                                            <p>住所 ： 奈良県奈良市二条大路1-3-1 ミ・ナーラ2F</p>
                                            <a href="javascript:void(0)"><img src="<?php echo get_stylesheet_directory_uri();?>/images/ic_map1.svg">MAPで見る</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="store_name_content_box_dropdown">
                                <div class="has_custom_drop_menu">
                                    <div class="store_more_view js_dropdown" data-tag="id_store_more_view">詳細を見る<img class="rotate_icon" src="<?php echo get_stylesheet_directory_uri();?>/images/ic_d_arrow1.svg"></div>
                                    <div class="custom_drop_menu" id="id_store_more_view" style="display: none;">
                                        <div class="drop_menu_item_container">
                                            <div class="store_name_table">
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>感染症対策</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <p>あり</p>
                                                    </div>
                                                </div>
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>クーポン・割引</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <p>なし</p>
                                                    </div>
                                                </div>
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>出張修理</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <p>出張なし</p>
                                                    </div>
                                                </div>
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>修理可能な端末</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <p>Android / iPhone / iPad / ゲーム機 / パソコン</p>
                                                    </div>
                                                </div>
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>Android即日対応</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <p>あり</p>
                                                    </div>
                                                </div>
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>保証期間</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <p>3カ月</p>
                                                    </div>
                                                </div>
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>定休日</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <p>定休日と定休日の詳細が入ります</p>
                                                    </div>
                                                </div>
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>店舗情報</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <ul>
                                                            <li>
                                                                <p>店舗名が入ります</p>
                                                            </li>
                                                            <li>
                                                                <p>〒000-0000<br>
                                                                    奈良県奈良市二条大路1-3-1<br>
                                                                ミ・ナーラ2F </p>
                                                            </li>
                                                            <li>
                                                                <a href="tel:0０００００００００">TEL 0０-００００-００００</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="store_name_table_link">お店のホームページを見る</a>
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
                            <a href="javascript:void(0)" class="store_name_link"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/plus_circle4.svg">見積りに入れる</a>
                        </div>
                    </div>
                    <div class="store_name_content_sec">
                        <h3>店舗名が入ります<span>（32文字）</span></h3>
                        <div class="store_name_content_box">
                            <div class="store_name_content_box_inner">
                                <div class="custom_row">
                                    <div class="custom_col_image">
                                        <div class="store_name_content_box_image">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/artical_image.png">
                                        </div>
                                    </div>
                                    <div class="custom_col_text">
                                        <div class="store_name_content_box_text">
                                            <p class="cpc">店舗の説明文章が入ります店舗の説明文章が入ります店舗の説明文章が入ります店舗の説明文章が入ります（最大52文字）</p>
                                            <ul>
                                                <li>
                                                    <p class="time_text"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/time_icon.svg">00:00~00:00</p>
                                                </li>
                                                <li>
                                                    <p class="day_text"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/day_icon.svg">火 水 金</p>
                                                </li>
                                                <li>
                                                    <p class="station_text"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/station_icon.svg">●●駅</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="store_name_content_box_tag_list_sec">
                                <ul class="store_box_tag_list csp-675">
                                    <li>
                                        <p>タグ名が入ります</p>
                                    </li>
                                    <li>
                                        <p>タグ名が入ります</p>
                                    </li>
                                    <li>
                                        <p>タグ名が入ります</p>
                                    </li>
                                    <li>
                                        <p>タグ名が入ります</p>
                                    </li>
                                </ul>
                                <div class="custom_row">
                                    <div class="custom_col_image">
                                        <div class="store_box_tag_list_image">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/artical_image.png">
                                        </div>
                                    </div>
                                    <div class="custom_col_text">
                                        <div class="store_box_tag_list_text">
                                            <p>住所 ： 奈良県奈良市二条大路1-3-1 ミ・ナーラ2F</p>
                                            <a href="javascript:void(0)"><img src="<?php echo get_stylesheet_directory_uri();?>/images/ic_map1.svg">MAPで見る</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="store_name_content_box_dropdown">
                                <div class="has_custom_drop_menu">
                                    <div class="store_more_view js_dropdown" data-tag="id_store_more_view">詳細を見る<img class="rotate_icon" src="<?php echo get_stylesheet_directory_uri();?>/images/ic_d_arrow1.svg"></div>
                                    <div class="custom_drop_menu" id="id_store_more_view" style="display: none;">
                                        <div class="drop_menu_item_container">
                                            <div class="store_name_table">
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>感染症対策</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <p>あり</p>
                                                    </div>
                                                </div>
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>クーポン・割引</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <p>なし</p>
                                                    </div>
                                                </div>
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>出張修理</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <p>出張なし</p>
                                                    </div>
                                                </div>
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>修理可能な端末</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <p>Android / iPhone / iPad / ゲーム機 / パソコン</p>
                                                    </div>
                                                </div>
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>Android即日対応</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <p>あり</p>
                                                    </div>
                                                </div>
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>保証期間</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <p>3カ月</p>
                                                    </div>
                                                </div>
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>定休日</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <p>定休日と定休日の詳細が入ります</p>
                                                    </div>
                                                </div>
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>店舗情報</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <ul>
                                                            <li>
                                                                <p>店舗名が入ります</p>
                                                            </li>
                                                            <li>
                                                                <p>〒000-0000<br>
                                                                    奈良県奈良市二条大路1-3-1<br>
                                                                ミ・ナーラ2F </p>
                                                            </li>
                                                            <li>
                                                                <a href="tel:0０００００００００">TEL 0０-００００-００００</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="store_name_table_link">お店のホームページを見る</a>
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
                            <a href="javascript:void(0)" class="store_name_link"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/plus_circle4.svg">見積りに入れる</a>
                        </div>
                    </div>
                    <div class="store_name_content_sec">
                        <h3>店舗名が入ります<span>（32文字）</span></h3>
                        <div class="store_name_content_box">
                            <div class="store_name_content_box_inner">
                                <div class="custom_row">
                                    <div class="custom_col_image">
                                        <div class="store_name_content_box_image">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/artical_image.png">
                                        </div>
                                    </div>
                                    <div class="custom_col_text">
                                        <div class="store_name_content_box_text">
                                            <p class="cpc">店舗の説明文章が入ります店舗の説明文章が入ります店舗の説明文章が入ります店舗の説明文章が入ります（最大52文字）</p>
                                            <ul>
                                                <li>
                                                    <p class="time_text"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/time_icon.svg">00:00~00:00</p>
                                                </li>
                                                <li>
                                                    <p class="day_text"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/day_icon.svg">火 水 金</p>
                                                </li>
                                                <li>
                                                    <p class="station_text"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/station_icon.svg">●●駅</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="store_name_content_box_tag_list_sec">
                                <ul class="store_box_tag_list csp-675">
                                    <li>
                                        <p>タグ名が入ります</p>
                                    </li>
                                    <li>
                                        <p>タグ名が入ります</p>
                                    </li>
                                    <li>
                                        <p>タグ名が入ります</p>
                                    </li>
                                    <li>
                                        <p>タグ名が入ります</p>
                                    </li>
                                </ul>
                                <div class="custom_row">
                                    <div class="custom_col_image">
                                        <div class="store_box_tag_list_image">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/artical_image.png">
                                        </div>
                                    </div>
                                    <div class="custom_col_text">
                                        <div class="store_box_tag_list_text">
                                            <p>住所 ： 奈良県奈良市二条大路1-3-1 ミ・ナーラ2F</p>
                                            <a href="javascript:void(0)"><img src="<?php echo get_stylesheet_directory_uri();?>/images/ic_map1.svg">MAPで見る</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="store_name_content_box_dropdown">
                                <div class="has_custom_drop_menu">
                                    <div class="store_more_view js_dropdown" data-tag="id_store_more_view">詳細を見る<img class="rotate_icon" src="<?php echo get_stylesheet_directory_uri();?>/images/ic_d_arrow1.svg"></div>
                                    <div class="custom_drop_menu" id="id_store_more_view" style="display: none;">
                                        <div class="drop_menu_item_container">
                                            <div class="store_name_table">
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>感染症対策</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <p>あり</p>
                                                    </div>
                                                </div>
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>クーポン・割引</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <p>なし</p>
                                                    </div>
                                                </div>
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>出張修理</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <p>出張なし</p>
                                                    </div>
                                                </div>
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>修理可能な端末</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <p>Android / iPhone / iPad / ゲーム機 / パソコン</p>
                                                    </div>
                                                </div>
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>Android即日対応</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <p>あり</p>
                                                    </div>
                                                </div>
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>保証期間</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <p>3カ月</p>
                                                    </div>
                                                </div>
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>定休日</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <p>定休日と定休日の詳細が入ります</p>
                                                    </div>
                                                </div>
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>店舗情報</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <ul>
                                                            <li>
                                                                <p>店舗名が入ります</p>
                                                            </li>
                                                            <li>
                                                                <p>〒000-0000<br>
                                                                    奈良県奈良市二条大路1-3-1<br>
                                                                ミ・ナーラ2F </p>
                                                            </li>
                                                            <li>
                                                                <a href="tel:0０００００００００">TEL 0０-００００-００００</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="store_name_table_link">お店のホームページを見る</a>
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
                            <a href="javascript:void(0)" class="store_name_link"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/plus_circle4.svg">見積りに入れる</a>
                        </div>
                    </div>
                    <div class="store_name_content_sec">
                        <h3>店舗名が入ります<span>（32文字）</span></h3>
                        <div class="store_name_content_box">
                            <div class="store_name_content_box_inner">
                                <div class="custom_row">
                                    <div class="custom_col_image">
                                        <div class="store_name_content_box_image">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/artical_image.png">
                                        </div>
                                    </div>
                                    <div class="custom_col_text">
                                        <div class="store_name_content_box_text">
                                            <p class="cpc">店舗の説明文章が入ります店舗の説明文章が入ります店舗の説明文章が入ります店舗の説明文章が入ります（最大52文字）</p>
                                            <ul>
                                                <li>
                                                    <p class="time_text"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/time_icon.svg">00:00~00:00</p>
                                                </li>
                                                <li>
                                                    <p class="day_text"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/day_icon.svg">火 水 金</p>
                                                </li>
                                                <li>
                                                    <p class="station_text"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/station_icon.svg">●●駅</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="store_name_content_box_tag_list_sec">
                                <ul class="store_box_tag_list csp-675">
                                    <li>
                                        <p>タグ名が入ります</p>
                                    </li>
                                    <li>
                                        <p>タグ名が入ります</p>
                                    </li>
                                    <li>
                                        <p>タグ名が入ります</p>
                                    </li>
                                    <li>
                                        <p>タグ名が入ります</p>
                                    </li>
                                </ul>
                                <div class="custom_row">
                                    <div class="custom_col_image">
                                        <div class="store_box_tag_list_image">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/artical_image.png">
                                        </div>
                                    </div>
                                    <div class="custom_col_text">
                                        <div class="store_box_tag_list_text">
                                            <p>住所 ： 奈良県奈良市二条大路1-3-1 ミ・ナーラ2F</p>
                                            <a href="javascript:void(0)"><img src="<?php echo get_stylesheet_directory_uri();?>/images/ic_map1.svg">MAPで見る</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="store_name_content_box_dropdown">
                                <div class="has_custom_drop_menu">
                                    <div class="store_more_view js_dropdown" data-tag="id_store_more_view">詳細を見る<img class="rotate_icon" src="<?php echo get_stylesheet_directory_uri();?>/images/ic_d_arrow1.svg"></div>
                                    <div class="custom_drop_menu" id="id_store_more_view" style="display: none;">
                                        <div class="drop_menu_item_container">
                                            <div class="store_name_table">
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>感染症対策</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <p>あり</p>
                                                    </div>
                                                </div>
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>クーポン・割引</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <p>なし</p>
                                                    </div>
                                                </div>
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>出張修理</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <p>出張なし</p>
                                                    </div>
                                                </div>
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>修理可能な端末</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <p>Android / iPhone / iPad / ゲーム機 / パソコン</p>
                                                    </div>
                                                </div>
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>Android即日対応</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <p>あり</p>
                                                    </div>
                                                </div>
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>保証期間</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <p>3カ月</p>
                                                    </div>
                                                </div>
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>定休日</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <p>定休日と定休日の詳細が入ります</p>
                                                    </div>
                                                </div>
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>店舗情報</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <ul>
                                                            <li>
                                                                <p>店舗名が入ります</p>
                                                            </li>
                                                            <li>
                                                                <p>〒000-0000<br>
                                                                    奈良県奈良市二条大路1-3-1<br>
                                                                ミ・ナーラ2F </p>
                                                            </li>
                                                            <li>
                                                                <a href="tel:0０００００００００">TEL 0０-００００-００００</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="store_name_table_link">お店のホームページを見る</a>
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
                            <a href="javascript:void(0)" class="store_name_link"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/plus_circle4.svg">見積りに入れる</a>
                        </div>
                    </div>
                    <div class="store_name_content_sec cio_content_sec">
                        <span class="cio_content_tab">郵送で修理する</span>
                        <h3>CIO REPAIR SOLUTIONS</h3>
                        <div class="store_name_content_box">
                            <div class="store_name_content_box_inner">
                                <div class="custom_row">
                                    <div class="custom_col_image">
                                        <div class="store_name_content_box_image">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cio_image_2.png">
                                        </div>
                                    </div>
                                    <div class="custom_col_text">
                                        <div class="store_name_content_box_text">
                                            <p class="cpc">店舗の説明文章が入ります店舗の説明文章が入ります店舗の説明文章が入ります店舗の説明文章が入ります（最大52文字）</p>
                                            <ul>
                                                <li>
                                                    <p class="time_text"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/time_icon.svg">00:00~00:00</p>
                                                </li>
                                                <li>
                                                    <p class="day_text"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/day_icon.svg">火 水 金</p>
                                                </li>
                                                <li>
                                                    <p class="station_text"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/station_icon.svg">●●駅</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="store_name_content_box_tag_list_sec">
                                <div class="custom_row">
                                    <div class="custom_col_image">
                                        <div class="store_box_tag_list_image">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cio_image.png">
                                        </div>
                                    </div>
                                    <div class="custom_col_text">
                                        <div class="store_box_tag_list_text">
                                            <p>住所 ： 奈良県奈良市二条大路1-3-1 ミ・ナーラ2F</p>
                                            <a href="javascript:void(0)"><img src="<?php echo get_stylesheet_directory_uri();?>/images/ic_map1.svg">MAPで見る</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="store_name_content_box_dropdown">
                                <div class="has_custom_drop_menu">
                                    <div class="store_more_view js_dropdown" data-tag="id_store_more_view1">詳細を見る<img class="rotate_icon" src="<?php echo get_stylesheet_directory_uri();?>/images/ic_d_arrow1.svg"></div>
                                    <div class="custom_drop_menu" id="id_store_more_view1" style="display: none;">
                                        <div class="drop_menu_item_container">
                                            <div class="store_name_table">
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>感染症対策</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <p>あり</p>
                                                    </div>
                                                </div>
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>クーポン・割引</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <p>なし</p>
                                                    </div>
                                                </div>
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>出張修理</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <p>出張なし</p>
                                                    </div>
                                                </div>
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>修理可能な端末</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <p>Android / iPhone / iPad / ゲーム機 / パソコン</p>
                                                    </div>
                                                </div>
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>Android即日対応</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <p>あり</p>
                                                    </div>
                                                </div>
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>保証期間</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <p>3カ月</p>
                                                    </div>
                                                </div>
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>定休日</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <p>定休日と定休日の詳細が入ります</p>
                                                    </div>
                                                </div>
                                                <div class="store_name_table_row">
                                                    <div class="store_name_table_th">
                                                        <p>店舗情報</p>
                                                    </div>
                                                    <div class="store_name_table_td">
                                                        <ul>
                                                            <li>
                                                                <p>店舗名が入ります</p>
                                                            </li>
                                                            <li>
                                                                <p>〒000-0000<br>
                                                                    奈良県奈良市二条大路1-3-1<br>
                                                                ミ・ナーラ2F </p>
                                                            </li>
                                                            <li>
                                                                <a href="tel:0０００００００００">TEL 0０-００００-００００</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="store_name_table_link">お店のホームページを見る</a>
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
                            <a href="javascript:void(0)" class="store_name_link"><img src="<?php echo get_stylesheet_directory_uri();?>/images/plus_circle4.svg">見積りに入れる</a>
                        </div>
                    </div>
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