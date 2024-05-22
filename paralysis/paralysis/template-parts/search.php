<?php /* Template Name: Search*/ ?>
<?php 
get_header(); 
?>
<section class="inner_page_banner">
    <h2 class="io fade">全国のサロンを探す</h2>
</section>
<section class="breadcrumb_section">
    <div class="custom_container">
        <ul>
            <li><a href="<?php echo get_site_url(); ?>">TOP</a></li>
            <li><span>全国の麻痺施術サロンを探す</span></li>
        </ul>
    </div>
</section>
<section class="map_and_form_search_section">
    <div class="custom_container">
        <div class="common_section_title io fade upS">
            <h2>全国から探す</h2>
        </div>
        <div class="national_search_border_container io fade upS">
            <div class="search_box_title">
                <h6><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/search.svg" alt="search icon">フリーワード検索</h6>
            </div>
            <div class="search_form">
                <label>エリアやジャンルで検索できます（例：治療院　整骨院）</label>
                <input type="text" id="id_search_key">
                <button type="button" id="id_search_btn" data-href="<?php echo get_site_url(); ?>/list">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10.461" height="10.455" viewBox="0 0 10.461 10.455">
                        <g id="search" transform="translate(-5.993 -2.299)">
                            <path id="Path_2008" data-name="Path 2008" d="M13.919,9.438a4.431,4.431,0,1,0-.781.781l.024.025,2.347,2.348a.554.554,0,1,0,.783-.783L13.944,9.461l-.025-.023ZM12.77,4.374a3.32,3.32,0,1,1-4.7,0,3.32,3.32,0,0,1,4.7,0Z" fill-rule="evenodd"/>
                        </g>
                    </svg>
                    検索
                </button>
            </div>
        </div>
        <div class="map_container io fade upS">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/japan_map.png" alt="map image">
            <div class="location_list_container">
                <ul class="location_list location_list_1">
                    <li><a href="<?php echo get_site_url(); ?>/list/?areakey=北海道">北海道</a></li>
                </ul>
                <ul class="location_list location_list_2">
                    <li><a href="<?php echo get_site_url(); ?>/list/?areakey=福岡">福岡</a></li>
                    <li><a href="<?php echo get_site_url(); ?>/list/?areakey=佐賀">佐賀</a></li>
                    <li><a href="<?php echo get_site_url(); ?>/list/?areakey=長崎">長崎</a></li>
                    <li><a href="<?php echo get_site_url(); ?>/list/?areakey=熊本">熊本</a></li>
                    <li><a href="<?php echo get_site_url(); ?>/list/?areakey=大分">大分</a></li>
                    <li><a href="<?php echo get_site_url(); ?>/list/?areakey=宮崎">宮崎</a></li>
                    <li><a href="<?php echo get_site_url(); ?>/list/?areakey=鹿児島">鹿児島</a></li>
                </ul>
                <ul class="location_list location_list_3">
                    <li><a href="<?php echo get_site_url(); ?>/list/?areakey=岡山">岡山</a></li>
                    <li><a href="<?php echo get_site_url(); ?>/list/?areakey=広島">広島</a></li>
                    <li><a href="<?php echo get_site_url(); ?>/list/?areakey=鳥取">鳥取</a></li>
                    <li><a href="<?php echo get_site_url(); ?>/list/?areakey=島根">島根</a></li>
                    <li><a href="<?php echo get_site_url(); ?>/list/?areakey=山口">山口</a></li>
                </ul>
                <ul class="location_list location_list_4">
                    <li><a href="<?php echo get_site_url(); ?>/list/?areakey=石川">石川</a></li>
                    <li><a href="<?php echo get_site_url(); ?>/list/?areakey=富山">富山</a></li>
                    <li><a href="<?php echo get_site_url(); ?>/list/?areakey=福井">福井</a></li>
                </ul>
                <ul class="location_list location_list_5">
                    <li><a href="<?php echo get_site_url(); ?>/list/?areakey=新潟">新潟</a></li>
                    <li><a href="<?php echo get_site_url(); ?>/list/?areakey=山梨">山梨</a></li>
                    <li><a href="<?php echo get_site_url(); ?>/list/?areakey=長野">長野</a></li>
                </ul>
                <ul class="location_list location_list_6">
                    <li><a href="<?php echo get_site_url(); ?>/list/?areakey=青森">青森</a></li>
                    <li><a href="<?php echo get_site_url(); ?>/list/?areakey=秋田">秋田</a></li>
                    <li><a href="<?php echo get_site_url(); ?>/list/?areakey=山形">山形</a></li>
                </ul>
                <ul class="location_list location_list_7">
                    <li><a href="<?php echo get_site_url(); ?>/list/?areakey=岩手">岩手</a></li>
                    <li><a href="<?php echo get_site_url(); ?>/list/?areakey=宮城">宮城</a></li>
                    <li><a href="<?php echo get_site_url(); ?>/list/?areakey=福島">福島</a></li>
                </ul>
                <ul class="location_list location_list_8">
                    <li><a href="<?php echo get_site_url(); ?>/list/?areakey=東京">東京</a></li>
                    <li><a href="<?php echo get_site_url(); ?>/list/?areakey=神奈川">神奈川</a></li>
                    <li><a href="<?php echo get_site_url(); ?>/list/?areakey=埼玉">埼玉</a></li>
                </ul>
                <ul class="location_list location_list_9">
                    <li><a href="<?php echo get_site_url(); ?>/list/?areakey=千葉">千葉</a></li>
                    <li><a href="<?php echo get_site_url(); ?>/list/?areakey=栃木">栃木</a></li>
                    <li><a href="<?php echo get_site_url(); ?>/list/?areakey=茨城">茨城</a></li>
                </ul>
                <ul class="location_list location_list_10">
                    <li><a href="<?php echo get_site_url(); ?>/list/?areakey=群馬">群馬</a></li>
                </ul>
            </div>
            <div class="location_list_container">
                <ul class="location_list location_list_11">
                    <li><a href="<?php echo get_site_url(); ?>/list/?areakey=沖縄">沖縄</a></li>
                </ul>
                <ul class="location_list location_list_12">
                    <li><a href="<?php echo get_site_url(); ?>/list/?areakey=愛媛">愛媛</a></li>
                    <li><a href="<?php echo get_site_url(); ?>/list/?areakey=高知">高知</a></li>
                </ul>
                <ul class="location_list location_list_13">
                    <li><a href="<?php echo get_site_url(); ?>/list/?areakey=香川">香川</a></li>
                    <li><a href="<?php echo get_site_url(); ?>/list/?areakey=徳島">徳島</a></li>
                </ul>
                <ul class="location_list location_list_14">
                    <li><a href="<?php echo get_site_url(); ?>/list/?areakey=大阪">大阪</a></li>
                    <li><a href="<?php echo get_site_url(); ?>/list/?areakey=兵庫">兵庫</a></li>
                    <li><a href="<?php echo get_site_url(); ?>/list/?areakey=京都">京都</a></li>
                </ul>
                <ul class="location_list location_list_15">
                    <li><a href="<?php echo get_site_url(); ?>/list/?areakey=滋賀">滋賀</a></li>
                    <li><a href="<?php echo get_site_url(); ?>/list/?areakey=奈良">奈良</a></li>
                    <li><a href="<?php echo get_site_url(); ?>/list/?areakey=和歌山">和歌山</a></li>
                </ul>
                <ul class="location_list location_list_16">
                    <li><a href="<?php echo get_site_url(); ?>/list/?areakey=愛知">愛知</a></li>
                    <li><a href="<?php echo get_site_url(); ?>/list/?areakey=岐阜">岐阜</a></li>
                    <li><a href="<?php echo get_site_url(); ?>/list/?areakey=静岡">静岡</a></li>
                    <li><a href="<?php echo get_site_url(); ?>/list/?areakey=三重">三重</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="prefecture_search_section">
    <div class="custom_container">
        <div class="national_search_border_container io fade upS">
            <div class="search_box_title">
                <h6><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/search.svg" alt="search icon">都道府県から探す</h6>
            </div>
            <div class="prefecture_table">
                <div class="prefecture_row">
                    <div class="prefecture_head">
                        <p>北海道・東北</p>
                    </div>
                    <div class="prefecture_data">
                        <a href="<?php echo get_site_url(); ?>/list/?areakey=北海道">北海道</a>
                        <a href="<?php echo get_site_url(); ?>/list/?areakey=青森">青森</a>
                        <a href="<?php echo get_site_url(); ?>/list/?areakey=秋田">秋田</a>
                        <a href="<?php echo get_site_url(); ?>/list/?areakey=山形">山形</a>
                        <a href="<?php echo get_site_url(); ?>/list/?areakey=岩手">岩手</a>
                        <a href="<?php echo get_site_url(); ?>/list/?areakey=宮城">宮城</a>
                        <a href="<?php echo get_site_url(); ?>/list/?areakey=福島">福島</a>
                    </div>
                </div>
                <div class="prefecture_row">
                    <div class="prefecture_head">
                        <p>関東</p>
                    </div>
                    <div class="prefecture_data">
                        <a href="<?php echo get_site_url(); ?>/list/?areakey=東京">東京</a>
                        <a href="<?php echo get_site_url(); ?>/list/?areakey=神奈川">神奈川</a>
                        <a href="<?php echo get_site_url(); ?>/list/?areakey=埼玉">埼玉</a>
                        <a href="<?php echo get_site_url(); ?>/list/?areakey=千葉">千葉</a>
                        <a href="<?php echo get_site_url(); ?>/list/?areakey=栃木">栃木</a>
                        <a href="<?php echo get_site_url(); ?>/list/?areakey=茨城">茨城</a>
                        <a href="<?php echo get_site_url(); ?>/list/?areakey=群馬">群馬</a>
                    </div>
                </div>
                <div class="prefecture_row">
                    <div class="prefecture_head">
                        <p>甲信越</p>
                    </div>
                    <div class="prefecture_data">
                        <a href="<?php echo get_site_url(); ?>/list/?areakey=新潟">新潟</a>
                        <a href="<?php echo get_site_url(); ?>/list/?areakey=山梨">山梨</a>
                        <a href="<?php echo get_site_url(); ?>/list/?areakey=長野">長野</a>
                    </div>
                </div>
                <div class="prefecture_row">
                    <div class="prefecture_head">
                        <p>北陸</p>
                    </div>
                    <div class="prefecture_data">
                        <a href="<?php echo get_site_url(); ?>/list/?areakey=石川">石川</a>
                        <a href="<?php echo get_site_url(); ?>/list/?areakey=富山">富山</a>
                        <a href="<?php echo get_site_url(); ?>/list/?areakey=福井">福井</a>
                    </div>
                </div>
                <div class="prefecture_row">
                    <div class="prefecture_head">
                        <p>東海</p>
                    </div>
                    <div class="prefecture_data">
                        <a href="<?php echo get_site_url(); ?>/list/?areakey=愛知">愛知</a>
                        <a href="<?php echo get_site_url(); ?>/list/?areakey=岐阜">岐阜</a>
                        <a href="<?php echo get_site_url(); ?>/list/?areakey=静岡">静岡</a>
                        <a href="<?php echo get_site_url(); ?>/list/?areakey=三重">三重</a>
                    </div>
                </div>
                <div class="prefecture_row">
                    <div class="prefecture_head">
                        <p>近畿</p>
                    </div>
                    <div class="prefecture_data">
                        <a href="<?php echo get_site_url(); ?>/list/?areakey=大阪">大阪</a>
                        <a href="<?php echo get_site_url(); ?>/list/?areakey=兵庫">兵庫</a>
                        <a href="<?php echo get_site_url(); ?>/list/?areakey=京都">京都</a>
                        <a href="<?php echo get_site_url(); ?>/list/?areakey=滋賀">滋賀</a>
                        <a href="<?php echo get_site_url(); ?>/list/?areakey=奈良">奈良</a>
                        <a href="<?php echo get_site_url(); ?>/list/?areakey=和歌山">和歌山</a>
                    </div>
                </div>
                <div class="prefecture_row">
                    <div class="prefecture_head">
                        <p>中国</p>
                    </div>
                    <div class="prefecture_data">
                        <a href="<?php echo get_site_url(); ?>/list/?areakey=岡山">岡山</a>
                        <a href="<?php echo get_site_url(); ?>/list/?areakey=広島">広島</a>
                        <a href="<?php echo get_site_url(); ?>/list/?areakey=鳥取">鳥取</a>
                        <a href="<?php echo get_site_url(); ?>/list/?areakey=島根">島根</a>
                        <a href="<?php echo get_site_url(); ?>/list/?areakey=山口">山口</a>
                    </div>
                </div>
                <div class="prefecture_row">
                    <div class="prefecture_head">
                        <p>四国</p>
                    </div>
                    <div class="prefecture_data">
                        <a href="<?php echo get_site_url(); ?>/list/?areakey=香川">香川</a>
                        <a href="<?php echo get_site_url(); ?>/list/?areakey=徳島">徳島</a>
                        <a href="<?php echo get_site_url(); ?>/list/?areakey=愛媛">愛媛</a>
                        <a href="<?php echo get_site_url(); ?>/list/?areakey=高知">高知</a>
                    </div>
                </div>
                <div class="prefecture_row">
                    <div class="prefecture_head">
                        <p>九州・沖縄</p>
                    </div>
                    <div class="prefecture_data">
                        <a href="<?php echo get_site_url(); ?>/list/?areakey=福岡">福岡</a>
                        <a href="<?php echo get_site_url(); ?>/list/?areakey=佐賀">佐賀</a>
                        <a href="<?php echo get_site_url(); ?>/list/?areakey=長崎">長崎</a>
                        <a href="<?php echo get_site_url(); ?>/list/?areakey=熊本">熊本</a>
                        <a href="<?php echo get_site_url(); ?>/list/?areakey=大分">大分</a>
                        <a href="<?php echo get_site_url(); ?>/list/?areakey=宮崎">宮崎</a>
                        <a href="<?php echo get_site_url(); ?>/list/?areakey=鹿児島">鹿児島</a>
                        <a href="<?php echo get_site_url(); ?>/list/?areakey=沖縄">沖縄</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();
?>