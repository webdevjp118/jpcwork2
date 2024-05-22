<?php /* Template Name: Faq-backup*/ ?>
<?php 
get_header(); 
?>

<?php
$scrollid = 0;
if(isset($_GET['scrollid'])) $pageno = $_GET['scrollid'];
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
$faq_list0 = [];
$faq_list1 = [];
$faq_list2 = [];
if($fetch_query->have_posts()) : 
    while ($fetch_query->have_posts()) : 
        $fetch_query->the_post(); 
        $loop_id = get_the_id();
        $loop_category = get_post_meta($loop_id, 'category', true);
        if($loop_category == 0){
            if(!in_array($loop_id, $faq_list0)) array_push($faq_list0, $loop_id);
        }
        else if($loop_category == 1) {
            if(!in_array($loop_id, $faq_list1)) array_push($faq_list1, $loop_id);
        }
        else if($loop_category == 2) {
            if(!in_array($loop_id, $faq_list2)) array_push($faq_list2, $loop_id);
        }
    endwhile;
endif;

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
                                <a href="#" class="faq_active_btn">
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
                        <h3><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image.png" class="q_image"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image-white.png" class="q_image_white">
                            <a class="scroll_posa" id="id_faq01"></a>他の任意売却専門業者との違いは何ですか？</h3>
                        <div>
                            <p>金融機関出身者が設立した相談会社なので、住宅ローンの悩み・問題、任意売却や競売など、どんな質問でもお答えできます。金融機関で審査や手続きを行っていた側ですから、ご相談者様の状況に合わせた的確なアドバイスやサポートができます！その結果、不安解消や解決までのスピードが圧倒的に早く、安心して頂けます。住宅ローンは不動産ではなく、お金の問題です。お金まわりの手続きについて明確に回答できない業者さんは意外と多いものです。</p>
                        </div>
                        <h3><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image.png" class="q_image"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image-white.png" class="q_image_white">任意売却Dr.では、どんなスタッフが相談対応してくれるのですか？</h3>
                        <div>
                            <p>相談スタッフは全員、金融機関出身者です！皆さまが聞いたことのあるメガバンクの元担当者や、任意売却では日本で１番整備されていると言われている「住宅金融支援機構（フラット35等）」の任意売却・元担当者（審査員）が親身になってご相談を伺います。</p>
                        </div>
                        <h3><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image.png" class="q_image"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image-white.png" class="q_image_white">任意売却Dr.に、不動産会社の出身者はいますか？</h3>
                        <div>
                            <p>もちろんです。宅建士や不動産証券化マスター保有者など、不動産のプロも在籍しています。</p>
                        </div>
                        <h3><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image.png" class="q_image"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image-white.png" class="q_image_white">任意売却に関する専門店では、二重契約など違法な不動産取引を勧める悪質業者も多いと聞くので不安です。</h3>
                        <div>
                            <p>当社では国内最大級の法律事務所と顧問契約を締結し、全ての業務・取引内容についてリーガルチェック＆サービスの提供を受けております。安心してご相談ください。</p>
                        </div>
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
                        <h3><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image.png" class="q_image"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image-white.png" class="q_image_white">
                            任意売却Dr.に相談すると、借入先の金融機関に個人の情報や状況を知らされますか？</h3>
                        <div>
                            <p>ご相談者様の情報を、勝手に金融機関側に伝えることはありません。むしろ、ご相談者様の承諾なしに個人情報を開示することは「個人情報の漏洩」に該当する為、絶対にありえませんので安心してご相談ください。</p>
                        </div>
                        <h3><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image.png" class="q_image"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image-white.png" class="q_image_white">任意売却Dr.で任意売却の相談をした場合、不動産会社は選択できますか？</h3>
                        <div>
                            <p>もちろんです。ご相談者様の地域、もしくは隣接地域における弊社加盟店の中より、お選び頂けます。</p>
                        </div>
                        <h3><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image.png" class="q_image"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image-white.png" class="q_image_white">任意売却以外にも、他にサポートはありますか？</h3>
                        <div>
                            <p>もちろんです。より高く売却できるように物件の片付けのお手伝い、賃貸の手配、格安引越し業者の手配、生活保護など各種申請のお手伝い等、私たちはご相談者様に寄り添って、より良い再スタートを実現して頂くまで最大限サポートいたします。上記以外でも不安な事柄がありましたら、お気軽にご相談ください。</p>
                        </div>
                        <h3><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image.png" class="q_image"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image-white.png" class="q_image_white">本当に最後まで無料で相談できるのですか？</h3>
                        <div>
                            <p>当社では、ご相談者様より費用を頂くことは一切ございません。提携先へのサポート収益や広告収入、投資家や実業家の皆さまからの出資によって運営されている為です。安心してご相談ください。</p>
                        </div>
                        <h3><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image.png" class="q_image"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image-white.png" class="q_image_white">他店で相談中（依頼中）でも、相談できますか？</h3>
                        <div>
                            <p>セカンドオピニオンも無料で受付しております。何か不安なことがあれば、遠慮なくご相談下さい。</p>
                        </div>
                        <h3><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image.png" class="q_image"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image-white.png" class="q_image_white">
                            <a class="scroll_posa" id="id_faq02"></a>離婚していて、元夫（元妻）に会いたくないのですが</h3>
                        <div>
                            <p>私たちが両者の間に入ってしっかりサポートするので、お二人が一度も顔を合わせることなく解決できます。もちろん、相手方に現住所を知られることもありません。</p>
                        </div>
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
                        <h3><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image.png" class="q_image"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image-white.png" class="q_image_white">
                            <a class="scroll_posa" id="id_faq03"></a>住宅ローン滞納前ですが、ご相談できますか？</h3>
                        <div>
                            <p>もちろんです。ご相談は１日でも早い方が解決方法の選択肢が広がります。お早めにご相談ください。</p>
                        </div>
                        <h3><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image.png" class="q_image"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image-white.png" class="q_image_white">住宅ローン滞納を放置すると、借入先から取り立てや電話などがありますか？</h3>
                        <div>
                            <p>電話（自宅・携帯・お勤め先）、手紙、訪問など、督促の手段やタイミングは、各金融機関で異なりますが、過度な取り立て（深夜や早朝の訪問、玄関前で大声で名前を呼ぶ。等）は絶対ありません。ただし、電話に出ない等の記録は残されています。</p>
                        </div>
                        <h3><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image.png" class="q_image"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image-white.png" class="q_image_white">住宅ローンの滞納によって、給料は差押えられますか？</h3>
                        <div>
                            <p>金融機関側が住宅ローン契約者に対して、給料や口座など資産の差押えを行うには、裁判所の許可が必要です。すぐに給料の差押えには至りません。</p>
                        </div>
                        <h3><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image.png" class="q_image"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image-white.png" class="q_image_white">延滞損害金はどれくらい発生しますか？</h3>
                        <div>
                            <p>ご相談者様の滞納状況によって異なりますが、金融機関の元担当者が適正に計算いたしますので、お気軽にお問合せください。</p>
                        </div>
                        <h3><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image.png" class="q_image"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image-white.png" class="q_image_white">住宅ローンの滞納や任意売却は、連帯保証人や連帯債務者に対して影響はありますか？</h3>
                        <div>
                            <p>もちろん、影響を及ぼします。ただし、状況によって影響内容が異なります。</p>
                        </div>
                        <h3><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image.png" class="q_image"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image-white.png" class="q_image_white">
                            <a class="scroll_posa" id="id_faq04"></a>任意売却はブラックリストに載りますか？</h3>
                        <div>
                            <p>そもそも「ブラックリスト」というものは存在しません。ですが、「個人信用情報」に、住宅ローン「滞納」の記録が残され、5～7年間、新たな金融商品（ローンやクレジットなど）の契約は、審査通過が難しくなるでしょう。</p>
                        </div>
                        <h3><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image.png" class="q_image"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image-white.png" class="q_image_white">任意売却するには破産が必要ですか？</h3>
                        <div>
                            <p>いえ、破産する必要はありません。むしろ破産を回避できる方法の１つでもあります</p>
                        </div>
                        <h3><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image.png" class="q_image"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image-white.png" class="q_image_white">任意売却では、解決までどれくらいの期間がかかりますか？</h3>
                        <div>
                            <p>金融機関のマニュアル上、ご相談者様の状況によって、引越し代などがどこまで控除できるかは異なります。金融機関の元審査員がご状況を伺って、お答えいたします。</p>
                        </div>
                        <h3><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image.png" class="q_image"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image-white.png" class="q_image_white">任意売却や競売などで、マイホームを手放さずに済む方法はありますか？</h3>
                        <div>
                            <p>借換え、リスケ、あるいは弁護士による法的手続き（個人再生など）によって、マイホームを手放さずに済む方法があります。</p>
                        </div>
                        <h3><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image.png" class="q_image"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image-white.png" class="q_image_white">任意売却で、親族や投資家に売却して、賃貸として住み続けることは出来ますか？</h3>
                        <div>
                            <p>可能です。ご相談者様のご要望に合わせた任意売却をサポート致します。</p>
                        </div>
                        <h3><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image.png" class="q_image"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image-white.png" class="q_image_white">任意売却、本当に上手くいくのですか？</h3>
                        <div>
                            <p>金融機関の同意は必要ですが、金融機関が同意したいと思う方法、順序、不動産会社選びなど、金融機関の元審査員だからこそ実現できる方法で完全サポート致します。</p>
                        </div>
                        <h3><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image.png" class="q_image"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image-white.png" class="q_image_white">任意売却で住宅ローンが残った場合、毎月いくらぐらい支払いが必要ですか？</h3>
                        <div>
                            <p>ご相談者様の年齢、収入、家族構成など、生活状況によって全く異なりますが、金融機関の元審査員が適正に計算いたします。</p>
                        </div>
                        <h3><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image.png" class="q_image"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image-white.png" class="q_image_white">他人に賃貸で貸しているのですが、ローンが払えなくなりました。任意売却できますか？</h3>
                        <div>
                            <p>可能です。ご相談者様のご要望に合わせた任意売却をサポート致します。</p>
                        </div>
                        <h3><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image.png" class="q_image"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image-white.png" class="q_image_white">自宅が税金未払いによって差押えられました。任意売却できますか？</h3>
                        <div>
                            <p>可能です。地域や滞納状況によって手順は異なりますので、お気軽にご相談ください。</p>
                        </div>
                        <h3><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image.png" class="q_image"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image-white.png" class="q_image_white">既に競売になってしまっているのですが、相談できますか？</h3>
                        <div>
                            <p>もちろん可能です。競売の進行状況の分析や、必要な手続きなど、再スタートまで完全にサポートいたします。</p>
                        </div>
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
    let scrollid = <?php echo $scrollpos_id; ?>;
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
        setTimeout(function() {
            $('html, body').animate({
                scrollTop: $(scrollid).offset().top
            }, 300);
        }, 100);
    }
});
</script>

</main><!-- #main -->
<?php
get_footer();