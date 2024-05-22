<?php /* Template Name: backup_top0 */ ?>
<?php get_header(); ?>

<!-- fixed, modal part -->
<?php echo_all_tags_modal(); ?>
<?php
global $wpdb;
$client_ip = get_client_ip();
$totalrow = $wpdb->get_results("SELECT post_id FROM $wpdb->think_table WHERE client_ip = '$client_ip'");
$think_ids=[];
foreach($totalrow as $eachrow) {
    array_push($think_ids, $eachrow->post_id);
}
?>
<div class="think_state_box">
    <a href="<?php echo get_site_url(); ?>/rsearch/" class="move_rsearch"><img src="<?php echo get_stylesheet_directory_uri();?>/images/ic_search2.svg"><span>修理店を検索する</span><img src="<?php echo get_stylesheet_directory_uri();?>/images/ic_r_arrow1.svg"></a>
    <a href="javascript:void(0)" class="think_check js_modalbtn" data-tag="id_store_modal" style="<?php echo (count($think_ids)<=0)?'display:none;':''; ?>">
        <svg class="svg_file"><use xlink:href="#svg_file"></use></svg>
        <span>選択店舗を確認する</span>
        <svg class="svg_r_arrow0"><use xlink:href="#svg_r_arrow0"></use></svg>
        <div class="think_count"><?php echo count($think_ids); ?></div>
    </a>
</div>

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
foreach($think_ids as $loop_id) {
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
    if(in_array($loop_id, $think_ids)) $loop_addthink_style = "display:none";
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
                                                    <a href="javascript:void(0)" class="api_del_think" data-sh_type="del_think" data-sh_id="<?php echo $loop_id; ?>">× 見積りから外す</a>
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
<!-- fixed, modal part end -->

<section class="nationwide_section">
    <div class="nationwide_contnet_sec">
        <div class="nationwide_contnet_inner">
            <h2>全国のスマホ修理店を検索</h2>
            <h3>修理店を探して一括見積リス！<br class="csp"><span>（会員登録不要）</span></h3>
            <div class="nationwide_contnet_tabs_sec">
                <div class="nationwide_list_tab_title">
                    <ul>
                        <li><a href="javascript:void(0);" class="area_tab" data-tag="tab1">エリアから検索</a></li>
                        <li><a href="javascript:void(0);" class="station_tab" data-tag="tab2">駅から検索</a></li>
                    </ul>
                </div>
                <div class="nationwide_list_tab_content">
                    <div class="nationwide_tab_content" id="tab1">
                        <div class="nationwide_tab_content_input tab_content_active">
                            <div class="area_input_box">
                                <div class="cinput_obj">
                                    <input name="cur_address" type="text" placeholder="住所を入力（例：大阪市）">
                                    <span class="cinput_clear"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_cicle_close1.svg"></span>
                                    <span class="cerror_box1">入力してください</span>
                                </div>
                            </div>
                            <div class="cur_geo">
                                <svg class="svg_map_mark0"><use xlink:href="#svg_map_mark0"></use></svg>現在地から探す
                            </div>
                        </div>
                    </div>
                    <div class="nationwide_tab_content" style="display: none;" id="tab2">
                        <div class="nationwide_tab_content_input">
                            <div class="station_search_box">
                                <div class="ctreesel_obj">
                                    <input type="text" readonly="readonly" placeholder="選択してください">
                                    <span class="ctreesel_clear"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_cicle_close1.svg"></span>
                                    <span class="cerror_box1">入力してください</span>
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
            <div class="model_name_sec">
                <div class="model_name_select light_blue">
                    <label>機種名</label>
                    <div class="model_name_select_dark_blue">
                        <div class="cselect_obj">
                            <input name="device_name" type="text" readonly="readonly" placeholder="機種を選択する">
                            <span class="cselect_clear"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_cicle_close1.svg"></span>
                            <span class="cselect_darrow"><svg class="svg_d_arrow0"><use xlink:href="#svg_d_arrow0"></use></svg></span>
                            <span class="cerror_box1">入力してください</span>
                            <div class="cselobj_options">
                                <div class="cselobj_options_scroll cscroll_obj">
                                    <div class="cselobj_option" data-value="1">
                                        <div class="modelname_option"><p>北海道・東北</p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow3.svg">
                                        </div>
                                    </div>
                                    <div class="cselobj_option" data-value="1">
                                        <div class="modelname_option"><p>北海道・東北</p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow3.svg">
                                        </div>
                                    </div>
                                    <div class="cselobj_option" data-value="1">
                                        <div class="modelname_option"><p>北海道・東北</p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow3.svg">
                                        </div>
                                    </div>
                                    <div class="cselobj_option" data-value="1">
                                        <div class="modelname_option"><p>北海道・東北</p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow3.svg">
                                        </div>
                                    </div>
                                    <div class="cselobj_option" data-value="1">
                                        <div class="modelname_option"><p>北海道・東北</p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow3.svg">
                                        </div>
                                    </div>
                                    <div class="cselobj_option" data-value="1">
                                        <div class="modelname_option"><p>北海道・東北</p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow3.svg">
                                        </div>
                                    </div>
                                    <div class="cselobj_option" data-value="1">
                                        <div class="modelname_option"><p>北海道・東北</p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow3.svg">
                                        </div>
                                    </div>
                                    <div class="cselobj_option" data-value="1">
                                        <div class="modelname_option"><p>北海道・東北</p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow3.svg">
                                        </div>
                                    </div>
                                    <div class="cselobj_option" data-value="1">
                                        <div class="modelname_option"><p>北海道・東北</p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow3.svg">
                                        </div>
                                    </div>
                                    <div class="cselobj_option" data-value="1">
                                        <div class="modelname_option"><p>北海道・東北</p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow3.svg">
                                        </div>
                                    </div>
                                    <div class="cselobj_option" data-value="1">
                                        <div class="modelname_option"><p>北海道・東北</p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow3.svg">
                                        </div>
                                    </div>
                                    <div class="cselobj_option" data-value="1">
                                        <div class="modelname_option"><p>北海道・東北</p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow3.svg">
                                        </div>
                                    </div>
                                    <div class="cselobj_option" data-value="1">
                                        <div class="modelname_option"><p>北海道・東北</p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow3.svg">
                                        </div>
                                    </div>
                                    <div class="cselobj_option" data-value="1">
                                        <div class="modelname_option"><p>北海道・東北</p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow3.svg">
                                        </div>
                                    </div>
                                    <div class="cselobj_option" data-value="1">
                                        <div class="modelname_option"><p>北海道・東北</p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow3.svg">
                                        </div>
                                    </div>
                                    <div class="cselobj_option" data-value="1">
                                        <div class="modelname_option"><p>北海道・東北</p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow3.svg">
                                        </div>
                                    </div>
                                    <div class="cselobj_option" data-value="1">
                                        <div class="modelname_option"><p>北海道・東北</p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow3.svg">
                                        </div>
                                    </div>
                                    <div class="cselobj_option" data-value="1">
                                        <div class="modelname_option"><p>北海道・東北</p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow3.svg">
                                        </div>
                                    </div>
                                    <div class="cselobj_option" data-value="1">
                                        <div class="modelname_option"><p>北海道・東北</p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow3.svg">
                                        </div>
                                    </div>
                                    <div class="cselobj_option" data-value="1">
                                        <div class="modelname_option"><p>北海道・東北</p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow3.svg">
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
                                        <div class="modelname_option"><p>北海道・東北</p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow3.svg">
                                        </div>
                                    </div>
                                    <div class="cselobj_option" data-value="1">
                                        <div class="modelname_option"><p>北海道・東北</p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow3.svg">
                                        </div>
                                    </div>
                                    <div class="cselobj_option" data-value="1">
                                        <div class="modelname_option"><p>北海道・東北</p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow3.svg">
                                        </div>
                                    </div>
                                    <div class="cselobj_option" data-value="1">
                                        <div class="modelname_option"><p>北海道・東北</p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow3.svg">
                                        </div>
                                    </div>
                                    <div class="cselobj_option" data-value="1">
                                        <div class="modelname_option"><p>北海道・東北</p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow3.svg">
                                        </div>
                                    </div>
                                    <div class="cselobj_option" data-value="1">
                                        <div class="modelname_option"><p>北海道・東北</p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow3.svg">
                                        </div>
                                    </div>
                                    <div class="cselobj_option" data-value="1">
                                        <div class="modelname_option"><p>北海道・東北</p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow3.svg">
                                        </div>
                                    </div>
                                    <div class="cselobj_option" data-value="1">
                                        <div class="modelname_option"><p>北海道・東北</p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow3.svg">
                                        </div>
                                    </div>
                                    <div class="cselobj_option" data-value="1">
                                        <div class="modelname_option"><p>北海道・東北</p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow3.svg">
                                        </div>
                                    </div>
                                    <div class="cselobj_option" data-value="1">
                                        <div class="modelname_option"><p>北海道・東北</p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow3.svg">
                                        </div>
                                    </div>
                                    <div class="cselobj_option" data-value="1">
                                        <div class="modelname_option"><p>北海道・東北</p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow3.svg">
                                        </div>
                                    </div>
                                    <div class="cselobj_option" data-value="1">
                                        <div class="modelname_option"><p>北海道・東北</p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow3.svg">
                                        </div>
                                    </div>
                                    <div class="cselobj_option" data-value="1">
                                        <div class="modelname_option"><p>北海道・東北</p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow3.svg">
                                        </div>
                                    </div>
                                    <div class="cselobj_option" data-value="1">
                                        <div class="modelname_option"><p>北海道・東北</p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow3.svg">
                                        </div>
                                    </div>
                                    <div class="cselobj_option" data-value="1">
                                        <div class="modelname_option"><p>北海道・東北</p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow3.svg">
                                        </div>
                                    </div>
                                    <div class="cselobj_option" data-value="1">
                                        <div class="modelname_option"><p>北海道・東北</p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow3.svg">
                                        </div>
                                    </div>
                                    <div class="cselobj_option" data-value="1">
                                        <div class="modelname_option"><p>北海道・東北</p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow3.svg">
                                        </div>
                                    </div>
                                    <div class="cselobj_option" data-value="1">
                                        <div class="modelname_option"><p>北海道・東北</p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow3.svg">
                                        </div>
                                    </div>
                                    <div class="cselobj_option" data-value="1">
                                        <div class="modelname_option"><p>北海道・東北</p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow3.svg">
                                        </div>
                                    </div>
                                    <div class="cselobj_option" data-value="1">
                                        <div class="modelname_option"><p>北海道・東北</p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_r_arrow3.svg">
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
            <div class="more_search_box_sec">
                <div class="more_search_box">
                    <div class="more_search_button js_dropdown rotate_icon" data-tag="id_more_search_detail">
                        こだわり検索
                        <img class="more_search_plus_img" src="<?php echo get_stylesheet_directory_uri(); ?>/images/plus_circle.svg">
                        <img class="more_search_minus_img" src="<?php echo get_stylesheet_directory_uri(); ?>/images/minus_circle1.svg">
                    </div>
                    <div class="more_search_detail" id="id_more_search_detail" style="display:none">
                        <div class="main_drop_item">
                            <div class="drop_item_title">
                                修理希望時間
                            </div>
                            <div class="model_name_select dark_blue">
                                <div class="model_name_select_light_blue">
                                    <select>
                                        <option>選択する</option>
                                        <option>選択する</option>
                                        <option>選択する</option>
                                        <option>選択する</option>
                                    </select>
                                    <span class="cselect_clear"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_cicle_close1.svg"></span>
                                    <div class="cselect_options" style="display: none;">
                                        <ul>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="main_drop_item">
                            <div class="drop_item_title">
                            距離
                            </div>
                            <div class="model_name_select dark_blue">
                                <div class="model_name_select_light_blue">
                                    <select>
                                        <option>選択する</option>
                                        <option>選択する</option>
                                        <option>選択する</option>
                                        <option>選択する</option>
                                    </select>
                                    <span class="cselect_clear"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_cicle_close1.svg"></span>
                                    <div class="cselect_options" style="display: none;">
                                        <ul>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="main_drop_item">
                            <div class="drop_item_title">
                            こだわり内容
                            </div>
                            <ul class="search_particularity">
                                <li>
                                    <a href="javascript:void(0)">タグ名が入ります</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">タグ名</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">タグ名</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">タグ名が入ります</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">タグ名が入ります</a>
                                </li>
                            </ul>
                            <div class="search_see_more js_dropdown rotate_icon" data-tag="id_more_search_tags">
                                <a hrsf="#">
                                    <h5>
                                    もっと見る  
                                    </h5>
                                    <img class="more_search_tags_plus_img" src="<?php echo get_stylesheet_directory_uri(); ?>/images/plus_circle.svg">
                                    <img class="more_search_tags_minus_img" src="<?php echo get_stylesheet_directory_uri(); ?>/images/minus_circle1.svg">
                                </a>
                            </div>
                            <ul class="search_particularity_grey" id="id_more_search_tags" style="display:none">
                                <li>
                                    <a href="javascript:void(0)">タグ名</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">タグタグ</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">タグタグタグ</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">タグ名タグ</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">タグタグタグタグ</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">タグ名</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">タグ名</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">タグ名</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">タグタグタグ名</a>
                                </li>
                            </ul>
                            <a href="javascript:void(0)" class="more_search_clear">こだわり検索をすベてクリアにする</a>
                        </div>
                    </div>
                </div>
            </div>
            <a href="javascript:void(0)" class="blue_btn js_submit_search" data-tag="id_form_search">修理店を検索する</a>
        </div>
    </div>
</section>
<section class="chosen_section">
    <div class="custom_container">
        <h3 class="common_heading">シューリスが選ばれる理由</h3>
        <div class="chosen_content_box_sec">
            <div class="custom_row">
                <div class="custom_col_3">
                    <div class="chosen_box">
                        <div class="chosen_box_image">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/chosen_image_1.png">
                        </div>
                        <div class="chosen_box_text">
                            <h4>完全無料 0円</h4>
                            <p>会員登録不要で使用料0円！<br>誰でも無料で検索・見積もりができます。</p>
                        </div>
                    </div>
                </div>
                <div class="custom_col_3">
                    <div class="chosen_box">
                        <div class="chosen_box_image">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/chosen_image_2.png">
                        </div>
                        <div class="chosen_box_text">
                            <h4>一括見積もり比較</h4>
                            <p>こだわり検索で希望に合った店舗を検索。比較できるよう一括見積もりを可能に！</p>
                        </div>
                    </div>
                </div>
                <div class="custom_col_3">
                    <div class="chosen_box">
                        <div class="chosen_box_image">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/chosen_image_3.png">
                        </div>
                        <div class="chosen_box_text">
                            <h4>最短５分で返信</h4>
                            <p>店舗からの見積もりは最短5分！<br>お急ぎの方も修理費用をすぐに確認できます。</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="symptoms_section">
    <div class="custom_container">
        <div class="custom_row">
            <div class="custom_col_6">
                <div class="symptoms_information_image">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/symptoms_image_2.png">
                    <h4>よくある症状</h4>
                </div>
            </div>
            <div class="custom_col_6">
                <div class="symptoms_information_text">
                    <ul>
<?php
$spec_category = get_category_by_name('よくある症状');
$spec_cat_link = "javascript:void(0)";
if(!empty($spec_category)) {
    $spec_cat_link = get_category_link( $spec_category->term_id );
}
$top_tags = get_tags(array(
	'hide_empty' => false,
    'orderby' => 'meta_value_num',
    'meta_key' => 'visit',
));
foreach ($top_tags as $each_tag) {
?>
                    <li><a href="<?php echo get_tag_link($each_tag->term_id); ?>"><?php echo $each_tag->name; ?></a></li>
<?php
}
?>

                    </ul>
                    <div class="tagmore_btnwrap">
                        <a class="js_modalbtn" data-tag="id_more_tag_modal" href="javascript:void(0)">もっと見る<svg class="svg_r_arrow1"><use xlink:href="#svg_r_arrow1"></use></svg></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="information_section">
    <div class="custom_container">
        <div class="custom_row">
            <div class="custom_col_6">
                <div class="symptoms_information_image">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/information_image_2.png">
                    <h4>お役立ち情報</h4>
                </div>
            </div>
            <div class="custom_col_6">
                <div class="symptoms_information_text">
                    <ul>
<?php
$spec_category = get_category_by_name('お役立ち情報');
$spec_cat_link = "javascript:void(0)";
if(!empty($spec_category)) {
    $spec_cat_link = get_category_link( $spec_category->term_id );
}
foreach ($top_tags as $each_tag) {
?>
                        <li><a href="<?php echo get_tag_link($each_tag->term_id); ?>"><?php echo $each_tag->name; ?></a></li>
<?php
}
?>

                    </ul>
                    <div class="tagmore_btnwrap">
                        <a class="js_modalbtn" data-tag="id_more_tag_modal" href="javascript:void(0)">もっと見る<svg class="svg_r_arrow1"><use xlink:href="#svg_r_arrow1"></use></svg></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
$post_loop = [];
$blog_query = new WP_Query([
    'post_type' => 'post',
	'posts_per_page' => 6,
]);
while ($blog_query->have_posts()) {
    $blog_query->the_post();
    $loop_id = get_the_ID();
    array_push($post_loop, $loop_id);
}
wp_reset_query();
?>
<section class="article_section">
    <h3 class="common_heading">最新記事</h3>
    <div class="article_slider_sec">
        <div class="article_slider">
<?php
foreach($post_loop as $loop_id) {
    $loop_title = get_the_title($loop_id);
    $loop_date = get_the_date('Y年m月d日');
    $loop_permalink = get_permalink($loop_id);
    $loop_summary = get_post_meta($loop_id, 'summary', true);
    $loop_featured_img = get_the_post_thumbnail_url($loop_id);
    if(empty($loop_featured_img)) $loop_featured_img = get_stylesheet_directory_uri()."/images/blank.jpg";
    $category_wp = get_the_category($loop_id);
    $loop_cat_name = "";
    $loop_excerpt = get_the_excerpt($loop_id);
    if(count($category_wp)>0) $loop_cat_name = $category_wp[0]->cat_name;
?>
            <div>
                <div class="article_box">
                    <div class="article_box_image">
                        <img src="<?php echo $loop_featured_img; ?>">
                    </div>
                    <div class="article_box_text">
                        <label><?php echo $loop_cat_name; ?></label>
                        <a href="<?php echo $loop_permalink; ?>"><h4><?php echo $loop_title; ?></h4></a>
                        <p><?php echo $loop_excerpt; ?></p>
                    </div>
                </div>
            </div>
<?php
}
?>
        </div>
        <a href="<?php echo get_site_url(); ?>/blog/" class="blue_border_btn">記事一覧へ</a>
    </div>
</section>
<?php
$post_loop = [];
$maker_query = new WP_Query([
    'post_type' => 'maker',
	'posts_per_page' => -1,
]);
while ($maker_query->have_posts()) {
    $maker_query->the_post();
    $loop_id = get_the_ID();
    array_push($post_loop, $loop_id);
}
wp_reset_query();
?>
<section class="repair_guide_section">
    <div class="repair_prefecture_content">
        <div class="custom_container">
            <div class="cpc-675">
                <h4 class="common_heading_small">メーカー別修理ガイド</h4>
                <ul>
<?php
foreach($post_loop as $loop_id) {
    $loop_title = get_the_title($loop_id);
    $loop_url = get_post_meta($loop_id, 'url', true);
?>
                    <li>
                        <a target="_blank" href="<?php echo $loop_url; ?>"><?php echo $loop_title; ?></a>
                    </li>
<?php
}
?>

                </ul>
            </div>
            <div class="has_custom_drop_menu csp-675">
                <h4 class="common_heading_small js_dropdown" data-tag="id_search_maker">メーカー別修理ガイド<span><img class="rotate_icon" src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_d_arrow1.svg"></span></h4>
                <div class="custom_drop_menu" id="id_search_maker">
                    <div class="drop_menu_item_container">
                        <ul>
<?php
foreach($post_loop as $loop_id) {
    $loop_title = get_the_title($loop_id);
    $loop_url = get_post_meta($loop_id, 'url', true);
?>
                    <li>
                        <a target="_blank" href="<?php echo $loop_url; ?>"><?php echo $loop_title; ?></a>
                    </li>
<?php
}
?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="prefecture_section">
    <div class="repair_prefecture_content">
        <div class="custom_container">
            <div class="cpc-675">
                <h4 class="common_heading_small">都道府県から探す</h4>
                <ul>
<?php
global $wpdb;
$totalrow = $wpdb->get_results("SELECT name FROM prefectures");
foreach($totalrow as $each_row) {
    $each_pref = str_replace('県','', $each_row->name);
    echo '<li><a href="javascript:void(0)">'.$each_pref.'</a></li>';
}
?>
                </ul>
            </div>
            <div class="has_custom_drop_menu csp-675">
                <h4 class="common_heading_small js_dropdown" data-tag="id_search_province">都道府県から探す<span><img class="rotate_icon" src="<?php echo get_stylesheet_directory_uri(); ?>/images/ic_d_arrow1.svg"></span></h4>
                <div class="custom_drop_menu" id="id_search_province">
                    <div class="drop_menu_item_container">
                        <ul>
<?php
global $wpdb;
$totalrow = $wpdb->get_results("SELECT name FROM prefectures");
foreach($totalrow as $each_row) {
    $each_pref = str_replace('県','', $each_row->name);
    echo '<li><a href="javascript:void(0)">'.$each_pref.'</a></li>';
}
?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>