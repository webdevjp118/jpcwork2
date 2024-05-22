<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ninibaikyaku
 */

get_header();
?>
<main id="primary" class="site-main">

<?php 
$pageno = 1;
if(isset($_GET['pageno'])) $pageno = $_GET['pageno'];
if($pageno <= 0) $pageno = 1;
$cat_key = '';
if(isset($_GET['cat_key'])) $cat_key = $_GET['cat_key'];
$y_key = '';
if(isset($_GET['y_key'])) $y_key = $_GET['y_key'];
$m_key = '';
if(isset($_GET['m_key'])) $ym_key = $_GET['m_key'];
$fetch_key = array(
    'post_type' => 'cmedia',
	'posts_per_page' => -1,
    'fields' => 'ids',
);
$fetch_query = new WP_Query($fetch_key);
$da_posts = [];
$show_ids = [];

if($fetch_query->have_posts()) : 
    while ($fetch_query->have_posts()) : 
        $fetch_query->the_post(); 
        $loop_id = get_the_id();
        $loop_y = get_the_date('Y');
        $da_posts[$loop_y]['total'] = $da_posts[$loop_y]['total'] + 1;
        $loop_m = get_the_date('m');
        $da_posts[$loop_y][$loop_m] = $da_posts[$loop_y][$loop_m] + 1;
        $loop_category = get_the_category();
        $loop_catname = '';
        if(count($loop_category) > 0) $loop_catname = $loop_category[0]->name;
        if(empty($cat_key) && empty($y_key) && empty($m_key) ) {
            array_push($show_ids, $loop_id);
        }
        else if(!empty($cat_key) && $cat_key == $loop_catname) {
            array_push($show_ids, $loop_id);
        }
        else if(!empty($y_key) && !empty($m_key) && $y_key == $loop_y && $m_key == $loop_m) {
            array_push($show_ids, $loop_id);
        }
        else if(!empty($y_key) && $y_key == $loop_y) {
            array_push($show_ids, $loop_id);
        }
    endwhile;
endif;
$total_count =count($show_ids);
$post_per_page = 10;
?>
<!-- publication_section -->
<section class="publication_section">
	<div class="publication_inner_sec">
		<div class="breadcrumb_sec">
			<ul>
				<li>
					<a href="#">トップ </a>
				</li>
				<li>
					<a href="#">メディア掲載</a>
				</li>
			</ul>
		</div>
		<div class="heading_text">
			<h2>メディア掲載</h2>
		</div>
		<div class="publication_box_sec">
			<div class="publication_box_sec_inner">
				<div class="publication_box publication_box_first">
					<div class="publication_box_inner">
						<div class="publication_box_image">
							<div class="publication_box_image_inner">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/publication-image-1.png">
							</div>
						</div>
						<div class="publication_box_text">
							<p class="publication_box_inner_text">2021.04.26<span class="text_box_orange">ラジオ</span></p>
							<h6>『あかいゆかりのお福わけRADIO』に出演いたしました。</h6>
							<p>ホンマルラジオ♪ランキング上位の『あかいゆかりのお福わけRADIO』に、弊社代表が出演いたしました。</p>
							<a href="#">ホームページはこちら <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
				<div class="publication_box publication_box_second">
					<div class="publication_box_inner">
						<div class="publication_box_image">
							<div class="publication_box_image_inner">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/publication-image-2.png">
							</div>
						</div>
						<div class="publication_box_text">
							<p class="publication_box_inner_text">2021.04.26<span class="text_box_green">web</span></p>
							<h6>不動産一括査定サイト『すまいステップ』に掲載。</h6>
							<p>東京証券取引場JASDAQ市場に上場している、株式会社Speee様の運営サイト「すまいステップ」こちらのサイト内記事で、弊社が「任意売却の専門家」として取り上げて頂きました。</p>
						</div>
					</div>
				</div>
				<div class="publication_box publication_box_third">
					<div class="publication_box_inner">
						<div class="publication_box_image">
							<div class="publication_box_image_inner">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/publication-image-6.png">
							</div>
						</div>
						<div class="publication_box_text">
							<p class="publication_box_inner_text">2021.04.26<span class="text_box_blue">新聞</span></p>
							<h6>朝日新聞に掲載</h6>
							<p>今朝の朝日新聞（朝刊）内、マイベストプロ東京（PR）欄に、弊社代表の写真が掲載されました。</p>
						</div>
					</div>
				</div>
				<div class="publication_box publication_box_fourth">
					<div class="publication_box_inner">
						<div class="publication_box_image">
							<div class="publication_box_image_inner">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/publication-image-2.png">
							</div>
						</div>
						<div class="publication_box_text">
							<p class="publication_box_inner_text">2021.04.26<span class="text_box_green">web</span></p>
							<h6>国内No.1の不動産一括査定サイト『イエウール』記事監修</h6>
							<p>任意売却の解説に関するコラム記事について、光栄にも弊社代表が監修を承り、本日10/26に公開されました。</p>
							<p>『イエウール』はJASDAQスタンダード市場に上場している(株)Speee様が運営しているサービスです。</p>
						</div>
					</div>
				</div>
				<div class="publication_box publication_box_fifth">
					<div class="publication_box_inner">
						<div class="publication_box_image">
							<div class="publication_box_image_inner">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/publication-image-3.png">
							</div>
						</div>
						<div class="publication_box_text">
							<p class="publication_box_inner_text">2021.04.26<span class="text_box_purple">雑誌</span></p>
							<h6>新規事業の専門誌「ビジネスチャンス」に掲載されました。</h6>
							<p>弊社『任意売却Dr.フランチャイズシステム』に関して、ビジネスチャンス様より取材を受けまして、注目のNewFCビジネスとして、本日10/22発売（12月号）に掲載されました。</p>
						</div>
					</div>
				</div>
				<div class="publication_box publication_box_sixth">
					<div class="publication_box_inner">
						<div class="publication_box_image">
							<div class="publication_box_image_inner">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/publication-image-4.png">
							</div>
						</div>
						<div class="publication_box_text">
							<p class="publication_box_inner_text">2021.04.26<span class="text_box_blue">新聞</span></p>
							<h6>全国賃貸住宅新聞に取材記事が掲載されました。</h6>
							<p>弊社『任意売却Dr.フランチャイズシステム』に関して、全国賃貸住宅新聞様より取材を受けまして、本日9/21発刊号に掲載して頂きました。</p>
						</div>
					</div>
				</div>
				<div class="publication_box publication_box_seven">
					<div class="publication_box_inner">
						<div class="publication_box_image">
							<div class="publication_box_image_inner">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/publication-image-5.png">
							</div>
						</div>
						<div class="publication_box_text">
							<p class="publication_box_inner_text">2021.04.26<span class="text_box_blue">新聞</span></p>
							<h6>朝日新聞に掲載</h6>
							<p>今朝の朝日新聞（朝刊）内、マイベストプロ東京（PR）欄に、弊社代表の写真が掲載されました。</p>
						</div>
					</div>
				</div>
				<div class="publication_box publication_box_eighth">
					<div class="publication_box_inner">
						<div class="publication_box_image">
							<div class="publication_box_image_inner">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/publication-image-7.png">
							</div>
						</div>
						<div class="publication_box_text">
							<p class="publication_box_inner_text">2021.04.26<span class="text_box_red">コラボ企画</span></p>
							<h6>落語家「桂 三若」様とのコラボ企画！創作落語「住宅ローン滞納」が完成しました。</h6>
							<p>吉本興業㈱の「桂 三若」（六代文枝一門）様と、弊社「任意売却Dr.」が、共同制作しました教育系創作落語「住宅ローン滞納」が完成し、公式チャンネルに公開されました。</p>
						</div>
					</div>
				</div>
				<div class="publication_box publication_box_ninth">
					<div class="publication_box_inner">
						<div class="publication_box_image">
							<div class="publication_box_image_inner">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/publication-image-8.png">
							</div>
						</div>
						<div class="publication_box_text">
							<p class="publication_box_inner_text">2021.04.26<span class="text_box_blue">新聞</span></p>
							<h6>朝日新聞に掲載</h6>
							<p>今朝の朝日新聞（朝刊）内、マイベストプロ東京（PR）欄に、弊社代表の写真が掲載されました。</p>
						</div>
					</div>
				</div>
				<div class="publication_box publication_box_tenth">
					<div class="publication_box_inner">
						<div class="publication_box_image">
							<div class="publication_box_image_inner">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/publication-image-9.png">
							</div>
						</div>
						<div class="publication_box_text">
							<p class="publication_box_inner_text">2021.04.26<span class="text_box_green">web</span></p>
							<h6>マイベストプロ東京に掲載されました。</h6>
							<p>朝日新聞がオススメする専門家・プロ紹介WEBサイト"マイベストプロ "の審査に通過し、「任意売却のノウハウを熟知する住宅ローンの専門家」として取材を受け、本日掲載頂きました。</p>
						</div>
					</div>
				</div>
			</div>
			<div class="archive_media_box_sec">
				<div class="archive_media_box_sec_inner">
					<div class="archive_box_sec">
						<div class="archive_box_sec_inner">
							<h5>アーカイブ</h5>
							<a href="#" class="active_btn"><i class="fa fa-angle-left" aria-hidden="true"></i> 2021年</a>
							<a href="#"><i class="fa fa-angle-left" aria-hidden="true"></i> 2021年</a>
							<a href="#"><i class="fa fa-angle-left" aria-hidden="true"></i> 2021年</a>
						</div>
					</div>
					<div class="media_box_sec">
						<div class="archive_box_sec_inner">
							<h5>メディア</h5>
							<a href="#" class="active_btn"><i class="fa fa-angle-left" aria-hidden="true"></i> 新聞</a>
							<a href="#"><i class="fa fa-angle-left" aria-hidden="true"></i> web</a>
							<a href="#"><i class="fa fa-angle-left" aria-hidden="true"></i> ラジオ</a>
							<a href="#"><i class="fa fa-angle-left" aria-hidden="true"></i> コラボ企画</a>
							<a href="#"><i class="fa fa-angle-left" aria-hidden="true"></i> 雑誌</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>



</main><!-- #main -->
<?php
get_footer();
