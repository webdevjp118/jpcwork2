<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nopain
 */

get_header('front');
?>
<main id="primary" class="site-main">

		
<section class="home_banner_section loader_with_banner_logo_animation animate" id="first_view">
    <div class="loader_bg"></div>
    <div class="custom_container">
        <div class="banner_content">
            <ul>
                <li><a href="<?php echo get_site_url(); ?>/muscle"><span>線維<br>筋痛症</span></a></li>
                <li><a href="<?php echo get_site_url(); ?>/joint"><span>顎<br>関節症</span></a></li>
                <li><a href="<?php echo get_site_url(); ?>/joint"><span>股関節の<br>痛み</span></a></li>
                <li><a href="<?php echo get_site_url(); ?>/numbness"><span>手足の<br>しびれや痛み</span></a></li>
            </ul>
            <p>治らない痛みを改善して人生を取り戻す！</p>
            <div class="banner_logo">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home_banner_logo.svg" alt="home banner logo">
            </div>
        </div>
    </div>
    <!-- <a href="javascript:void(0)" class="move_down">
        <span></span>
    </a> -->
    <div id="id_move_down1" class="ButtonScroll"><div class="ButtonScroll-text">SCROLL</div><div class="ButtonScroll-line"></div></div>
    <div id="id_move_down2" class="HomeNavDots-neighbor"><div class="HomeNavDots-neighbor-arrow"><svg aria-labelledby="homeNavDots-arrowBottom-title" role="img" class="icon"><title id="homeNavDots-arrowBottom-title">next</title><desc>next</desc><use xlink:href="#arrow-bottom"></use></svg></div></div>
</section>
<section class="about_the_study_group_section io fade">
    <div class="custom_container">
        <div class="about_the_study_group_sec">
            <div class="common_section_title io fade upS">
                <h2 class="title">治らない痛みの研究会®︎について</h2>
            </div>
            <div class="about_the_study_group_content">
                <ul class="about_the_study_group_list io fade upS">
                    <li>
                        <p class="about_the_list_lable">①</p>
                        <p>治らない痛みの研究会®︎は『疼痛』『しびれ』を徒手または鍼治療で和らげ、<br class="cpc">改善する専門家の研究会です。</p>
                    </li>
                    <li>
                        <p class="about_the_list_lable">②</p>
                        <p>線維筋痛症、顎関節症、変形性股関節症、頭痛（片頭痛）など<br class="cpc">慢性的な疼痛に対する改善プログラムを提供します。</p>
                    </li>
                    <li>
                        <p class="about_the_list_lable">③</p>
                        <p>坐骨神経痛、手足のしびれ、ヘルニア後のしびれ、外傷後のしびれ、<br class="cpc">手術後のしびれに対して根本的に改善するプログラムを提供します。</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="common_btn_section">
        <div class="custom_container">
            <div class="search_btn io fade upS">
                <div class="btn_content">
                    <p>全国の治らない痛みの研究会®︎</p>
                    <h5>認定院を探す</h5>
                    <a href="#">search</a>
                </div>
            </div>
            <div class="download_btn io fade upS">
                <div class="btn_content">
                    <p>難治性疼痛を改善したい方向け冊子</p>
                    <h5>「治らない痛みを改善する方法」</h5>
                    <a href="#">download</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="contact_us_if_you_like_section io fade">
    <div class="bg_black_heading">
        <h2 class="heading_title">このような方はご相談ください</h2>
    </div>
    <div class="contact_us_if_you_like_content">
        <div class="custom_container">
            <div class="custom_row">
                <div class="custom_col_2 io fade upS">
                    <div class="contact_us_if_you_like_box">
                        <div class="contact_us_if_image">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/pain_1.png">
                        </div>
                        <p>線維筋痛症と<br>
                        診断された</p>
                    </div>
                </div>
                <div class="custom_col_2 io fade upS">
                    <div class="contact_us_if_you_like_box">
                        <div class="contact_us_if_image">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/pain_2.png">
                        </div>
                        <p>様々な理由での<br>
                        股関節痛</p>
                    </div>
                </div>
                <div class="custom_col_2 io fade upS">
                    <div class="contact_us_if_you_like_box">
                        <div class="contact_us_if_image">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/pain_3.png">
                        </div>
                        <p>いつまでも続く<br>
                        手足の痺れ</p>
                    </div>
                </div>
                <div class="custom_col_2 io fade upS">
                    <div class="contact_us_if_you_like_box">
                        <div class="contact_us_if_image">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/pain_4.png">
                        </div>
                        <p>歯科にも見放された<br>
                        顎関節症</p>
                    </div>
                </div>
                <div class="custom_col_2 io fade upS">
                    <div class="contact_us_if_you_like_box">
                        <div class="contact_us_if_image">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/pain_5.png">
                        </div>
                        <p>繰り返す<br>
                        ぎっくり腰</p>
                    </div>
                </div>
                <div class="custom_col_2 io fade upS">
                    <div class="contact_us_if_you_like_box">
                        <div class="contact_us_if_image">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/pain_6.png">
                        </div>
                        <p>ヘルニアの<br>
                        後遺症</p>
                    </div>
                </div>
                <div class="custom_col_2 io fade upS">
                    <div class="contact_us_if_you_like_box">
                        <div class="contact_us_if_image">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/pain_7.png">
                        </div>
                        <p>激しい<br>
                        生理痛</p>
                    </div>
                </div>
                <div class="custom_col_2 io fade upS">
                    <div class="contact_us_if_you_like_box">
                        <div class="contact_us_if_image">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/pain_8.png">
                        </div>
                        <p>繰り返す<br>
                        頭痛や偏頭痛</p>
                    </div>
                </div>
                <div class="custom_col_2 io fade upS">
                    <div class="contact_us_if_you_like_box">
                        <div class="contact_us_if_image">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/pain_9.png">
                        </div>
                        <p>産後の<br>
                        腱鞘炎</p>
                    </div>
                </div>
                <div class="custom_col_2 io fade upS">
                    <div class="contact_us_if_you_like_box">
                        <div class="contact_us_if_image">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/pain_10.png">
                        </div>
                        <p>歩行時の<br>
                        痛み</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="contact_us_if_you_like_image_box io fade upS">
        <div class="custom_container">
            <p>これらの痛みの原因はレントゲンやMRIで判断できるものと、判断できないものに分けられます。</p>
            <p>間違いなく痛みや痺れがあるのに、クリニックさんに行っても『原因不明』と説明されるケースも多くあります。</p>
            <p>治らない痛みの研究会®︎では、そんなどこに行っても治らない症状に対して、徒手施術や鍼治療で改善を促すための研究会です。</p>
            <p>全国の提携サロンとともに、痛みや痺れに悩まれている方々への新しい解決策を提供させていただきます。</p>
        </div>
    </div>
</section>
<section class="chronic_pain_section home_page io fade upS">
    <div class="custom_container">
        <div class="common_section_title">
            <h2 class="title">治らない痛みへのアプローチ</h2>
        </div>
        <div class="chronic_pain_gray_box io fade upS">
            <p>例えば股関節が変形しているケースでも『痛みがある』ケースと『痛みがない』ケースに分かれます。</p>
            <p>ものすごく変形していても、全く問題無いケースがあるんです。</p>
            <p>よくあるケースとして、「椎間板ヘルニア」があったとしても同じケースがあります。</p>
            <p class="chronic_pain_text_spacing">一つの考え方として「変形」が痛みや痺れの100%要因ではない！と考えて欲しいんです！</p>
            <p>そしてその原因を細胞レベルから考えることで、様々な疼痛や痺れに対して改善策を提供することが可能です。</p>
        </div>
        <div class="possible_causes_sec io fade upS">
            <h4>【疼痛の原因として考えられるもの】</h4>
            <div class="custom_row">
                <div class="custom_col_4 io fade upS">
                    <div class="possible_causes_box">
                        <h5>神経の慢性炎症で<br class="cpc">痛みが続く</h5>
                        <p>神経にストレスがかかる<br class="cpc">物理的要因を解決する<br class="cpc">必要があります。
                        </p>
                    </div>
                </div>
                <div class="custom_col_4 io fade upS">
                    <div class="possible_causes_box">
                        <h5>ストレス過多による<br class="cpc">
                            副腎疲労で症状が<br class="cpc">おさまらない
                        </h5>
                        <p>慢性のストレスによって内臓が<br class="cpc">機能低下することで、慢性的な<br class="cpc">疼痛症状が出るケースは<br class="cpc">とても多いです。
                        </p>
                    </div>
                </div>
                <div class="custom_col_4 io fade upS">
                    <div class="possible_causes_box">
                        <h5>脳のストレスで痛みの<br class="cpc">回路に変調が起きる
                        </h5>
                        <p>高ストレス環境に長くいると、<br class="cpc">脳の痛みを抑制する回路が<br class="cpc">暴走します。
                        </p>
                    </div>
                </div>
                <div class="custom_col_4 io fade upS">
                    <div class="possible_causes_box">
                        <h5>炎症体質で<br class="cpc">
                            痛みが抜けない
                        </h5>
                        <p>食事の内容が悪い、または消化機能が<br class="cpc">低下することでの炎症体質は<br class="cpc">慢性疼痛の元凶です。
                        </p>
                    </div>
                </div>
                <div class="custom_col_4 io fade upS">
                    <div class="possible_causes_box">
                        <h5>低栄養で細胞の<br class="cpc">
                            エネルギーが枯渇している
                        </h5>
                        <p>神経や全身の細胞が正常に働くだけの<br class="cpc">エネルギーがつくれないケースも<br class="cpc">とても多いです。
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="chronic_pain_yellow_box io fade upS">
            <p>これらの痛みや痺れを改善するには、単純に痛む部分にアプローチするだけでは不可能です。</p>
            <p>治らない痛みの研究会®︎では、これら疼痛の原因として考えられるものに対して全てにアプローチ<br class="csp6">します。</p>
        </div>
    </div>
</section>
<section class="approach_to_pain_section home_page io fade upS">
    <div class="custom_container">
        <div class="common_section_title">
            <h2 class="title">治らない痛みへのアプローチ</h2>
        </div>
        <div class="approach_to_pain_content_sec">
            <div class="custom_row">
                <div class="custom_col_2 io fade upS">
                    <div class="approach_to_pain_box">
                        <h5>トリガーポイントアプローチ</h5>
                        <div class="approach_to_pain_box_image">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/pain_approach_1.png">
                        </div>
                        <p>痛みや痺れの原因である<br class="cpc">筋膜や腱に対して<br>アプローチします</p>
                    </div>
                </div>
                <div class="custom_col_2 approach_to_pain_content_spacing">
                    <div class="approach_to_pain_box io fade upS">
                        <h5>分子栄養学的アプローチ</h5>
                        <div class="approach_to_pain_box_image">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/pain_approach_2.png">
                        </div>
                        <p>クリニックと連携し、<br class="cpc">栄養状態を向上しながら<br>アプローチします。
                        </p>
                    </div>
                </div>
                <div class="custom_col_2">
                    <div class="approach_to_pain_box io fade upS">
                        <h5>心理的アプローチ</h5>
                        <div class="approach_to_pain_box_image">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/pain_approach_3.png">
                        </div>
                        <p>脳の疲労を<br class="cpc">改善するプログラムを<br class="cpc">構築します。</p>
                    </div>
                </div>
                <div class="custom_col_2 approach_to_pain_content_spacing">
                    <div class="approach_to_pain_box io fade upS">
                        <h5>神経内臓アプローチ</h5>
                        <div class="approach_to_pain_box_image">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/pain_approach_4.png">
                        </div>
                        <p>内臓が原因となる<br class="cpc">慢性炎症に対する<br class="cpc">アプローチです。</p>
                    </div>
                </div>
                <div class="custom_col_2">
                    <div class="approach_to_pain_box io fade upS">
                        <h5>副腎疲労アプローチ</h5>
                        <div class="approach_to_pain_box_image">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/pain_approach_5.png">
                        </div>
                        <p>身体の消防士である<br class="cpc">副腎を回復させるための<br">プログラムです。</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="operating_company_section io fade upS">
    <div class="custom_container">
        <div class="heading_title">
            <h3>運営会社</h3>
        </div>
        <div class="operating_company_table_box">
            <ul>
                <li>
                    <p>認定院名が入ります</p>
                </li>
                <li>
                    <div class="custom_row">
                        <div class="custom_col_text_small">
                            <p>横浜セラピールーム（GYNECO-LABO）</p>
                        </div>
                        <div class="custom_col_text_big">
                            <p>神奈川県横浜市中区山下町201-1</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="custom_row">
                        <div class="custom_col_text_small">
                            <p>新宿セラピールーム（functional 新宿）</p>
                        </div>
                        <div class="custom_col_text_big">
                            <p>東京都新宿区西新宿8-1-11リーフアネックス３F</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="custom_row">
                        <div class="custom_col_text_small">
                            <p>茅ヶ崎セラピールーム（functional茅ヶ崎）</p>
                        </div>
                        <div class="custom_col_text_big">
                            <p>神奈川県茅ヶ崎市十間坂1-1-30グランテリア湘南１F</p>
                        </div>
                    </div>
                </li>
                <li>
                    <p>本社　神奈川県藤沢市鵠沼石上1-2-5第一ミヤビル２C</p>
                </li>
            </ul>
        </div>
    </div>
</section>
<section class="common_btn_section home_page">
    <div class="custom_container">
        <div class="search_btn io fade upS">
            <div class="btn_content">
                <p>全国の治らない痛みの研究会®︎</p>
                <h5>認定院を探す</h5>
                <a href="explore.html">search</a>
            </div>
        </div>
        <div class="download_btn io fade upS">
            <div class="btn_content">
                <p>難治性疼痛を改善したい方向け冊子</p>
                <h5>「治らない痛みを改善する方法」</h5>
                <a href="#">download</a>
            </div>
        </div>
    </div>
</section>




</main><!-- #main -->
<?php
get_footer('front');
