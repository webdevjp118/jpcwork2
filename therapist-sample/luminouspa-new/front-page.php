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
 * @package luminouspa-new
 */

get_header();
?>
<main id="primary" class="site-main">



<!-- banner_section -->
<section class="banner_section">
	<div class="banner_image">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/banner.png" class="banner_desktop">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/banner-mobile.png" class="banner_mobile">
	</div>
</section>
<!-- schedule_section #A48BAD -->
<section class="schedule_section">
	<div class="medium_custom_container">
		<div class="heading_text">
			<!-- <h5>TODAY’S <img src="/images/heart.png"></h5> -->
			<h5>TODAY’S ♥</h5>
			<p>本日出勤予定のセラピスト</p>
		</div>
		<div class="schedule_image_box_sec">
			<div class="custom_row">
<?php
$total_count = 0;
$posts_per_page = 20;
$pageno = 1;
if(isset($_GET['pageno'])) $pageno = $_GET['pageno'];
$search_key = array(
    'post_type' => 'therapist',
    'posts_per_page' => $posts_per_page,
    'paged' => $pageno,
);
$item_query = new WP_Query($search_key);
$total_count = $item_query->found_posts;
$show_count = 0;
if($item_query->have_posts()) : 
	while ($item_query->have_posts()) :
		$item_query->the_post();
		$loop_id = get_the_ID();
		$loop_tname = get_post_field( 'name', $loop_id );
		$loop_age = get_post_field( 'age', $loop_id );
		$loop_url = get_the_permalink();
		$loop_photo = get_post_field('therapist_img1', $loop_id);
		if(empty($loop_photo)) $loop_photo = get_stylesheet_directory_uri().'/images/noimage.jpg';
		$loop_twitter = get_post_field('twitter', $loop_id);
		$loop_twitter = str_replace('@', '', $loop_twitter);
		if(!empty($loop_twitter)) $loop_twitter = 'https://twitter.com/'.$loop_twitter;
		if($show_count < 4):	
			$dateTime = new DateTime();
			$schedule_list = [];
			$baseDateTime = $dateTime->format('Y-m-d H:i:s');
			$workDate = get_date_from_gmt($baseDateTime, 'Ymd');
			$open_hh = get_post_meta($loop_id, $workDate.'open_hh', true);
			$open_mi = get_post_meta($loop_id, $workDate.'open_mi', true);
			$close_hh = get_post_meta($loop_id, $workDate.'close_hh', true);
			$close_mi = get_post_meta($loop_id, $workDate.'close_mi', true);
			
			$month = get_date_from_gmt($baseDateTime, 'm') + 0;
			$day = get_date_from_gmt($baseDateTime, 'd') + 0;
			if(!empty($open_hh) && !empty($open_mi) && !empty($close_hh) && !empty($close_mi)):
				$worktime = $open_hh.'：'.$open_mi.'～'.$close_hh.'：'.$close_mi;

?>
				<div class="custom_col_3 js_button" data-href="<?php echo $loop_url;?>">
					<div class="schedule_image_box">
						<div class="schedule_image_box_image">
							<img src="<?php echo $loop_photo; ?>">
						</div>
<?php 		if(!empty($loop_twitter)): ?>
						<a href="<?php echo $loop_twitter; ?>" class="twitter_btn"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/twitter.png"></a>
<?php		endif; ?>
						<a href="<?php echo $loop_url;?>" class="schedule_btn light_purple"><?php echo $loop_tname; ?>(<?php echo $loop_age; ?>)</a>
						<a href="<?php echo $loop_url;?>" class="schedule_btn dark_purple"><?php echo $worktime; ?></a>
					</div>
				</div>
<?php			$show_count = $show_count + 1;
			endif;
		endif;
	endwhile;
endif; ?>
			</div>
			<a href="<?php echo get_site_url(); ?>/therapist/" class="schedule_more_btn">
				<svg xmlns="http://www.w3.org/2000/svg" width="69.606" height="69.606" viewBox="0 0 69.606 69.606" class="icon-more-svg">
					<path id="Icon_ionic-ios-arrow-dropright-circle" data-name="Icon ionic-ios-arrow-dropright-circle" d="M3.375,36.678a33.3,33.3,0,1,0,33.3-33.3A33.3,33.3,0,0,0,3.375,36.678Zm39.147,0L29.409,23.693a3.091,3.091,0,0,1,4.371-4.371L49.055,34.645a3.087,3.087,0,0,1,.1,4.259L34.1,54a3.085,3.085,0,1,1-4.371-4.355Z" transform="translate(-1.875 -1.875)"/>
				</svg>
				<br>
			more</a>
		</div>
		<div class="therapists_schedule_box_sec">
			<div class="custom_row">
				<div class="therapists_box_sec ho_pu_f">
					<p>THERAPISTS</p>
					<a href="<?php echo get_site_url(); ?>/therapist/">セラピスト一覧 <svg xmlns="http://www.w3.org/2000/svg" width="69.606" height="69.606" viewBox="0 0 69.606 69.606" class="icon-more-svg">
					<path id="Icon_ionic-ios-arrow-dropright-circle" data-name="Icon ionic-ios-arrow-dropright-circle" d="M3.375,36.678a33.3,33.3,0,1,0,33.3-33.3A33.3,33.3,0,0,0,3.375,36.678Zm39.147,0L29.409,23.693a3.091,3.091,0,0,1,4.371-4.371L49.055,34.645a3.087,3.087,0,0,1,.1,4.259L34.1,54a3.085,3.085,0,1,1-4.371-4.355Z" transform="translate(-1.875 -1.875)"/>
				</svg></a>
				</div>
				<div class="schedule_box_sec ho_pu_f">
					<p>SCHEDULE</p>
					<a href="<?php echo get_site_url(); ?>/therapist/">最新の出勤情報 <svg xmlns="http://www.w3.org/2000/svg" width="69.606" height="69.606" viewBox="0 0 69.606 69.606" class="icon-more-svg">
					<path id="Icon_ionic-ios-arrow-dropright-circle" data-name="Icon ionic-ios-arrow-dropright-circle" d="M3.375,36.678a33.3,33.3,0,1,0,33.3-33.3A33.3,33.3,0,0,0,3.375,36.678Zm39.147,0L29.409,23.693a3.091,3.091,0,0,1,4.371-4.371L49.055,34.645a3.087,3.087,0,0,1,.1,4.259L34.1,54a3.085,3.085,0,1,1-4.371-4.355Z" transform="translate(-1.875 -1.875)"/>
				</svg></a>
				</div>
			</div>
		</div>
		<div class="news_blog_box_sec">
			<div class="custom_row">
				<div class="news_box_sec">
					<div class="heading_text">
						<h5>NEWS</h5>
						<p>新着情報</p>
					</div>
					<div class="news_box_inner">
<?php
// query_posts( array( 'post_type' => array('post'), 'posts_per_age'=>3 ) );
query_posts( 'posts_per_page=4' );
if ( have_posts() ) : 
	while(have_posts()) :
		the_post();
		$post_id = get_the_ID();
		$loop_link = get_permalink();
		$loop_category = get_the_category($post_id);
        $loop_catname = '';
        if(count($loop_category) > 0) $loop_catname = $loop_category[0]->name;
        $loop_date = get_the_date('Y.m.d ', $post_id);
        $loop_title = get_the_title($post_id);
?>
						<a href="<?php echo $loop_link; ?>">
							<div class="news_box_inner_text">
								<p><?php echo $loop_date; ?> <span><?php echo $loop_catname; ?></span></p>
								<h6 class="truncate"><?php echo $loop_title; ?></h6>
							</div>
						</a>
<?php endwhile;
endif; ?>
					</div>
					<a href="<?php echo get_site_url(); ?>/news/" class="news_blog_box_sec_more_btn">MORE</a>
				</div>
				<div class="blog_box_sec">
					<div class="heading_text">
						<h5>Twitter</h5>
						<p>セラピストブログ</p>
					</div>
					<div class="blog_box_inner">
						<a class="twitter-timeline" href="https://twitter.com/luminouspa_1?ref_src=twsrc%5Etfw"
							data-twitter-limit="5"
							data-height="360">Tweets by luminouspa_1</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
					</div>
					<a href="<?php echo get_site_url(); ?>/therapist/" class="news_blog_box_sec_more_btn">MORE</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- system_price_section -->
<div class="scroll_pos" id="system_price"></div>
<section class="system_price_section">
	<div class="medium_custom_container">
		<div class="heading_text">
			<h5>SYSTEM&PRICE</h5>
			<p>料金システム</p>
		</div>
		<div class="course_table_sec">
			<div class="custom_row">
				<div class="custom_col_6">
					<div class="course_table course_table_standared">
						<div class="course_table_heading">
							<h5>STANDARD COURSE</h5>
							<p>スタンダードコース</p>
						</div>
						<p class="ls-20">当店の基本となるコースです。<br>
							お客様のお身体に溜まった老廃物をリンパに流すことで疲れを癒し、
							リラックス効果をもたらすコースとなります。
						</p>
						<div class="course_table_price_box">
							<div class="course_table_price_box_inner">
								<div class="custom_row">
									<div class="price_box_border">
										<h4>90</h4>
										<p>分コース</p>
									</div>
									<div class="price_box_black">
										<h4>15,000</h4>
										<p>yen</p>
									</div>
									<div class="price_box_details">
										<h6>お試しコース</h6>
										<p class="ls-p08">
											お客様に身も心もゆだねて頂ける<br>
											ような出会いをお約束。
										</p>
									</div>
								</div>
							</div>
							<div class="course_table_price_box_inner">
								<div class="custom_row">
									<div class="price_box_border">
										<h4>120</h4>
										<p>分コース</p>
									</div>
									<div class="price_box_black">
										<h4>20,000</h4>
										<p>yen</p>
									</div>
									<div class="price_box_details">
										<h6>基本コース</h6>
										<p class="ls-p08">時間の無い方、初めて体験される<br>
										方にオススメです。</p>
									</div>
								</div>
							</div>
							<div class="course_table_price_box_inner">
								<div class="custom_row">
									<div class="price_box_border">
										<h4>150</h4>
										<p>分コース</p>
									</div>
									<div class="price_box_black">
										<h4>25,000</h4>
										<p>yen</p>
									</div>
									<div class="price_box_details">
										<h6>オススメコース</h6>
										<p class="ls-p08">１番人気！お時間に少し余裕を持ち、<br>
										リラックスしたい方にオススメ。</p>
									</div>
								</div>
							</div>
							<div class="course_table_price_box_inner">
								<div class="custom_row">
									<div class="price_box_border">
										<h4>180</h4>
										<p>分コース</p>
									</div>
									<div class="price_box_black">
										<h4>30,000</h4>
										<p>yen</p>
									</div>
									<div class="price_box_details">
										<h6>ゆったりコース</h6>
										<p class="ls-p08">お気に入りのセラピストとゆったり<br>
										特別な時間をお過ごしください。</p>
									</div>
								</div>
							</div>
							<div class="course_table_price_box_inner course_table_price_box_inner_second">
								<div class="custom_row">
									<div class="price_box_border">
										<p class="price_box_border_first">延長</p>
										<h4>30</h4>
										<p>分</p>
									</div>
									<div class="price_box_black">
										<h4>6,000</h4>
										<p>yen</p>
									</div>
								</div>
							</div>
							<div class="course_table_price_box_inner course_table_price_box_inner_third">
								<div class="custom_row">
									<div class="price_box_border price_box_border_second">
										<p class="margin-0">指名料</p>
									</div>
									<div class="price_box_black">
										<h4>1,000</h4>
										<p>yen</p>
									</div>
									<div class="price_box_black price_box_details">
										<h4>〜3,000</h4>
										<p>yen</p>
									</div>
								</div>
							</div>
						</div>
						<p class="ls-20 course_table_text_black">
							※初回のお客様にはフリーオーダー(ご指名をされないオーダー)をオススメさせていただいております。<br>
							ご希望のお時間でご案内ができますセラピストの中から、人気のあるオススメセラピストでご案内をさせていただきます。
						</p>
					</div>
				</div>
				<div class="custom_col_6">
					<div class="course_table course_table_luminous">
						<div class="course_table_heading">
							<h5>LUMINOUS COURSE</h5>
							<p>ルミナスコース</p>
						</div>
						<p class="ls-20">スタンダードコースと比べたっぷりとオイルを使い、<br>
							当店独自の手技でお客様により高いリラクゼーション効果をもたらすコースです。</p>
						<div class="course_table_price_box">
							<div class="course_table_price_box_inner">
								<div class="custom_row">
									<div class="price_box_border">
										<h4>90</h4>
										<p>分コース</p>
									</div>
									<div class="price_box_black">
										<h4>15,000</h4>
										<p>yen</p>
									</div>
									<div class="price_box_details">
										<h6>お試しコース</h6>
										<p class="ls-p08">時間の無い方、初めて体験される<br>
										方にオススメです。</p>
									</div>
								</div>
							</div>
							<div class="course_table_price_box_inner">
								<div class="custom_row">
									<div class="price_box_border">
										<h4>120</h4>
										<p>分コース</p>
									</div>
									<div class="price_box_black">
										<h4>20,000</h4>
										<p>yen</p>
									</div>
									<div class="price_box_details">
										<h6>基本コース</h6>
										<p class="ls-p08">お客様に身も心もゆだねて頂ける<br>
										ような出会いをお約束。</p>
									</div>
								</div>
							</div>
							<div class="course_table_price_box_inner">
								<div class="custom_row">
									<div class="price_box_border">
										<h4>150</h4>
										<p>分コース</p>
									</div>
									<div class="price_box_black">
										<h4>25,000</h4>
										<p>yen</p>
									</div>
									<div class="price_box_details">
										<h6>オススメコース</h6>
										<p class="ls-p08">１番人気！お時間に少し余裕を持ち、<br>
										リラックスしたい方にオススメ。</p>
									</div>
								</div>
							</div>
							<div class="course_table_price_box_inner">
								<div class="custom_row">
									<div class="price_box_border">
										<h4>180</h4>
										<p>分コース</p>
									</div>
									<div class="price_box_black">
										<h4>30,000</h4>
										<p>yen</p>
									</div>
									<div class="price_box_details">
										<h6>ゆったりコース</h6>
										<p class="ls-p08">お気に入りのセラピストとゆったり<br>
										特別な時間をお過ごしください。</p>
									</div>
								</div>
							</div>
							<div class="course_table_price_box_inner course_table_price_box_inner_second">
								<div class="custom_row">
									<div class="price_box_border">
										<p class="price_box_border_first margin0">延長</p>
										<h4>30</h4>
										<p>分</p>
									</div>
									<div class="price_box_black">
										<h4>6,000</h4>
										<p>yen</p>
									</div>
								</div>
							</div>
							<div class="course_table_price_box_inner course_table_price_box_inner_third">
								<div class="custom_row">
									<div class="price_box_border price_box_border_second">
										<p class="margin-0">指名料</p>
									</div>
									<div class="price_box_black">
										<h4>1,000</h4>
										<p>yen</p>
									</div>
									<div class="price_box_black price_box_details">
										<h4>〜3,000</h4>
										<p>yen</p>
									</div>
								</div>
							</div>
						</div>
						<p class="ls-20 course_table_text_black">
							※初回のお客様にはフリーオーダー(ご指名をされないオーダー)をオススメさせていただいております。<br>
							ご希望のお時間でご案内ができますセラピストの中から、人気のあるオススメセラピストでご案内をさせていただきます。
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="contact_btn_sec ho_no_f js_button" data-href="<?php echo get_site_url(); ?>/contact-us/">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/mail-bulk.png" class="mail_bulk_image">
			<p>CONTACT</p>
			<a href="<?php echo get_site_url(); ?>/contact-us/">ご予約&お問い合わせ <svg xmlns="http://www.w3.org/2000/svg" width="69.606" height="69.606" viewBox="0 0 69.606 69.606">
				<path id="Icon_ionic-ios-arrow-dropright-circle" data-name="Icon ionic-ios-arrow-dropright-circle" d="M3.375,36.678a33.3,33.3,0,1,0,33.3-33.3A33.3,33.3,0,0,0,3.375,36.678Zm39.147,0L29.409,23.693a3.091,3.091,0,0,1,4.371-4.371L49.055,34.645a3.087,3.087,0,0,1,.1,4.259L34.1,54a3.085,3.085,0,1,1-4.371-4.355Z" transform="translate(-1.875 -1.875)"/>
			</svg></a>
		</div>
		<div class="attention_text_sec">
			<div class="attention_heading">
				<h5>ATTENTION</h5>
				<p>ご利用規約</p>
			</div>
			<div class="attention_text">
				<p><span></span>〇当店はオイルトリートメントを提供するリラクゼーションサロンであり、医療法が定める病院や診療所・治療院や指圧・按摩マッサージ・鍼灸による施術所ではございません。</p>
				<p><span></span>〇回春や風俗的な性的サービスは一切ございません</p>
				<p><span></span>〇施術中は紙ショーツのご着用を必ずお願い致します。下半身を露出させる行為、自慰行為、性的サービスの要求を固くお断り致します。<br>
				セラピストが施術の続行が不可能であると判断した場合は、直ちに施術を中止し、ご退店をお願いする場合がございます。なお、その際のご返金には一切応じかねます。</p>
				<p><span></span>〇18歳未満の方、同業者、スカウト目的、暴力団関係者、泥酔状態の方、熱のある方、高血圧の方、痛風やリュウマチの方、重度の糖尿病の方、<br>
					心臓の病気を患われている方、脳の病気を患われている方、下肢に重度の静脈瘤がある方、足に重い水虫や炎症などの異常がある方、怪我や捻挫などの異常がある方、<br>その他当店がふさわしくないと判断した方はご利用頂けません。</p>
					<p>〇盗撮、盗聴等の行為があった際は施術中であっても中断し、即時所轄警察署に被害届を提出し損害賠償請求等の法的手続きをとります。</p>
					<p>〇無断キャンセルの場合、キャンセル料として全額を請求致します。</p>
					<p>〇紛失につきましては、当店や関係者に一切の賠償責任はございません。</p>
					<p>〇当店は安全管理に万全を期しておりますが、不慮の事故、皮膚のかぶれ、もみかえし等が生じた場合、当店や関係者に一切の賠償責任はございません。</p>
					<p>〇セラピストへの引き抜き行為、スカウト行為に対しては損害賠償請求等の法的措置をとり、威力業務妨害及び労働者派遣法違反で刑事告発をおこないます。</p>
					<p>〇暴力団、暴力団員、暴力団準構成員その他これらに準ずる方、又は反社会的勢力と関係を有する方は、当店のご利用をお断りいたします。</p>
					<p></p>
				</div>
			</div>
		</div>
	</section>
	<!-- contact_section -->
	<div class="scroll_pos" id="access_sec"></div>
	<section class="contact_section">
		<div class="custom_row column_reverse">
			<div class="map_sec">
				<div class="map_sec_inner">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13124.228610111597!2d135.504348!3d34.678507!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6000e7184e1f8959%3A0x7c94046d9fa34032!2z44CSNTQxLTAwNTkg5aSn6Ziq5bqc5aSn6Ziq5biC5Lit5aSu5Yy65Y2a5Yq055S6!5e0!3m2!1sja!2sjp!4v1619278108842!5m2!1sja!2sjp" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
				</div>
			</div>
			<div class="contact_details_sec">
				<div class="custom_row">
					<div class="contact_logo">
						<div class="contact_logo_inner">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png">
						</div>
						<a href="#" class="web_btn mobile_btn"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Icon-desktop.png">WEBで予約する</a>
						<a href="tel:090-8377-8050" class="call_btn mobile_btn"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Icon-call.png">電話で予約する</a>
					</div>
					<div class="contact_logo_details">
						<h4>堺筋本町ルーム</h4>
						<h5>〒550-0014 大阪市中央区博労町 </h5>
						<p>※詳細な所在地については、ご予約時にお問い合わせください</p>
						<h6>「堺筋本町駅」より徒歩5分</h6>
						<h6>「長堀橋駅」  より徒歩7分</h6>
						<a href="tel:090-8377-8050">TEL：090-8377-8050</a>
					</div>
					<a href="#" class="web_btn desktop_btn">
						<svg xmlns="http://www.w3.org/2000/svg" width="28.832" height="26.211" viewBox="0 0 28.832 26.211">
							<path id="Icon_material-desktop-windows" data-name="Icon material-desktop-windows" d="M27.711,3H4.121A2.629,2.629,0,0,0,1.5,5.621V21.348a2.629,2.629,0,0,0,2.621,2.621h9.174V26.59H10.674v2.621H21.158V26.59H18.537V23.969h9.174a2.629,2.629,0,0,0,2.621-2.621V5.621A2.629,2.629,0,0,0,27.711,3Zm0,18.348H4.121V5.621h23.59Z" transform="translate(-1.5 -3)" fill="#a48bad"/>
						</svg>

						WEBで予約する</a>
					<a href="tel:090-8377-8050" class="call_btn desktop_btn">
						<svg xmlns="http://www.w3.org/2000/svg" width="23.882" height="23.923" viewBox="0 0 23.882 23.923">
							<path id="Icon_feather-phone-call" data-name="Icon feather-phone-call" d="M16.656,5.67a5.212,5.212,0,0,1,4.118,4.118M16.656,1.5a9.382,9.382,0,0,1,8.288,8.277M23.9,18.1v3.127a2.085,2.085,0,0,1-2.273,2.085,20.631,20.631,0,0,1-9-3.2,20.329,20.329,0,0,1-6.255-6.255,20.631,20.631,0,0,1-3.2-9.038A2.085,2.085,0,0,1,5.251,2.542H8.378a2.085,2.085,0,0,1,2.085,1.793,13.385,13.385,0,0,0,.73,2.929,2.085,2.085,0,0,1-.469,2.2L9.4,10.789a16.68,16.68,0,0,0,6.255,6.255l1.324-1.324a2.085,2.085,0,0,1,2.2-.469,13.385,13.385,0,0,0,2.929.73A2.085,2.085,0,0,1,23.9,18.1Z" transform="translate(-2.167 -0.396)" fill="none" stroke="#a48bad" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
						</svg>
						電話で予約する
					</a>
				</div>
				<div class="contact_btn_sec ho_no_f js_button" data-href="<?php echo get_site_url(); ?>/contact-us/">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/mail-bulk.png" class="mail_bulk_image">
					<p>CONTACT</p>
					<a href="<?php echo get_site_url(); ?>/contact-us/">ご予約&お問い合わせ <svg xmlns="http://www.w3.org/2000/svg" width="69.606" height="69.606" viewBox="0 0 69.606 69.606">
						<path id="Icon_ionic-ios-arrow-dropright-circle" data-name="Icon ionic-ios-arrow-dropright-circle" d="M3.375,36.678a33.3,33.3,0,1,0,33.3-33.3A33.3,33.3,0,0,0,3.375,36.678Zm39.147,0L29.409,23.693a3.091,3.091,0,0,1,4.371-4.371L49.055,34.645a3.087,3.087,0,0,1,.1,4.259L34.1,54a3.085,3.085,0,1,1-4.371-4.355Z" transform="translate(-1.875 -1.875)"/>
					</svg></a>
				</div>
			</div>
		</div>
	</section>

























</main><!-- #main -->
<?php
get_footer();
