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
 * @package Tomorrow_Land
 */

get_header();


$recent_post_title = '';
$recent_post_url = '';
query_posts( 'name=blog-corona' );
if ( have_posts() ) : 
	the_post();
	$recent_post_title = get_the_title();
	$recent_post_url = get_site_url().'/blog-corona';
endif;
query_posts( 'posts_per_page=6' );
?>

	<main id="primary" class="site-main">

<section class="banner_section">
	<div class="pg1_banner_text">
		<div class="sp_header_bar">
			<img  src="<?php echo get_stylesheet_directory_uri(); ?>/images/menu-logo.svg">
		</div>

		<div class="custom_container_medium">
			<h1>毎日を過ごす<br class="csp"><span>”家”</span>だから。</h1>
			<p>想い溢れる空間を、一緒に素敵なおうち探し。</p>
		</div>
		<div class="first_header_bar">
			<ul class="main_menu">
				<li>
					<div><a href="<?php echo get_site_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/menu-logo.svg"></a></div>
				</li>
				<li class="home_li">
					<div><a href="<?php echo get_site_url(); ?>" class="flowline_a">ホーム</a></div>
				</li>
				<li class="company_li">
					<div><a href="<?php echo get_site_url(); ?>/business" class="flowline_a">会社概要</a></div>
				</li>
				<li class="sell_li">
					<div><a href="<?php echo get_site_url(); ?>/service" class="flowline_a">買取・売却</a></div>
				</li>
				<li class="example_li">
					<div class="dropdown">
						<span>リフォーム事例</span>
						<div class="dropdown-content">
							<a href="<?php echo get_site_url(); ?>/reform" class="flowline_a">リフォーム事例</a>
							<a href="<?php echo get_site_url(); ?>/reform-content" class="flowline_a">リフォーム内容</a>
						</div>
					</div>
				</li>
				<li class="recommend_li">
					<div><a href="<?php echo get_site_url(); ?>/property" class="flowline_a">おすすめ物件紹介</a></div>
				</li>
				<li class="faq_li">
					<div><a href="<?php echo get_site_url(); ?>/faq" class="flowline_a"><span>FAQ</span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/faq-white.svg"></a></div>
				</li>
				<li>
					<div><a href="<?php echo get_site_url(); ?>/contact" class="contact_btn"><span>お問い合わせ</span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/menu-arrow-r.svg"></a></div>
				</li>
			</ul>
		</div><!-- /header_bar -->
		<div class="hero__scroll__area"><p>SCROLL</p></div>
	</div>
</section>
<section class="client_mind_sec" id="menu-floatpoint">
	<div class="text_part io fade upS">
        <h2>お客様それぞれの想いを聞かせてください。</h2>
		<p>「毎日を過ごす家だから、こだわって決めたい」<br>
			「毎日を過ごす家だから、慎重に決めたい」<br>
			「毎日を過ごす家だから、豊かで快適な生活を送る工夫がしたい」etc…<br>
			<br>
			一緒に素敵な家探しをお手伝いさせてほしいです。<br>
			<br>
			毎日を過ごす”家”だから<br>
			想い溢れる空間に。<br>
		</p>
    </div>
	<div class="img_part io fade upS">
		<div class="img_box img_half_box">
			<div class="img_wrap">
        	    <img class="centered_img" src="<?php echo get_stylesheet_directory_uri(); ?>/images/client_mind1.jpg">
            </div>
		</div>
		<div class="img_box img_half_box">
			<div class="img_wrap">
        	    <img class="centered_img" src="<?php echo get_stylesheet_directory_uri(); ?>/images/client_mind2.jpg">
            </div>
		</div>
		<div class="img_box img_full_box">
			<div class="img_wrap">
        	    <img class="centered_img" src="<?php echo get_stylesheet_directory_uri(); ?>/images/client_mind3.jpg">
            </div>
		</div>
	</div>
	<a class="readmore_btn" href="#">
		<span>READ MORE</span>
		<img class="normal" src="<?php echo get_stylesheet_directory_uri(); ?>/images/circle-arrow-r.svg">
		<img class="hover" src="<?php echo get_stylesheet_directory_uri(); ?>/images/circle-arrow-r-invert.svg">
	</a>
</section>
<section class="various_sec">
	<div class="various_text various_no1 io fade upS">
		<div class="custom_container_medium">
			<div class="title_h2"><h2>買取・売却</h2></div>
			<p>不動産の買取・売却は当社におまかせください！<br>
				無料でカンタン！いくらで売れるかすぐにわかる！
			</p>
		</div>
	</div>
	<div class="various_img various_no1 io fade upS">
		<img class="centered_img" src="<?php echo get_stylesheet_directory_uri(); ?>/images/various_img1.jpg">
		<a class="various_btn various_no1" href="<?php echo get_site_url(); ?>/service">
			無料見積もり
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/various-arrow.svg">
			<img class="variousbtn_dec" src="<?php echo get_stylesheet_directory_uri(); ?>/images/various-btn-dec1.png">
		</a>
	</div>
	<div class="various_text various_no2 io fade upS">
		<div class="custom_container_medium">
			<div class="title_h2"><h2>リフォーム・<br class="csp">リノベーション</h2></div>
			<p>ささいなことでもお任せください！<br>
				弊社専門スタッフはお客様と共に考えていきます！
			</p>
		</div>
	</div>
	<div class="various_img various_no2 io fade upS">
		<img class="centered_img" src="<?php echo get_stylesheet_directory_uri(); ?>/images/various_img2.jpg">
		<a class="various_btn various_no2" href="<?php echo get_site_url(); ?>/reform-content">
			実施工績
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/various-arrow.svg">
			<img class="variousbtn_dec" src="<?php echo get_stylesheet_directory_uri(); ?>/images/various-btn-dec2.png">
		</a>
	</div>
	<div class="various_text various_no3 io fade upS">
		<div class="custom_container_medium">
			<div class="title_h2"><h2>よくある質問</h2></div>
			<p>お客様からよくいただくご質問を掲載しております。<br class="cpc">
				わからないことがあれば、ご参考にしてみてください。
			</p>
		</div>
	</div>
	<div class="various_img various_no3 io fade upS">
		<img class="centered_img" src="<?php echo get_stylesheet_directory_uri(); ?>/images/various_img3.jpg">
		<a class="various_btn various_no3" href="<?php echo get_site_url(); ?>/faq">
			FAQを見る
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/various-arrow.svg">
			<img class="variousbtn_dec" src="<?php echo get_stylesheet_directory_uri(); ?>/images/various-btn-dec3.png">
		</a>
	</div>
</section>
<section class="recommend_sec io fade upS">
	<div class="custom_container_medium">
		<h2 class="recommend_title">おすすめ物件紹介</h2>
		<div class="recommend_main">
			<div class="recommend_inner">
<?php
query_posts( array( 'post_type' => array('property') ) );
if ( have_posts() ) : 
	while(have_posts()) :
		the_post();
		$loop_ID = get_the_ID();
		$loop_link = get_permalink();
		$loop_image = catch_first_image($loop_ID);
		if(empty($loop_image)) $loop_image = get_stylesheet_directory_uri().'/images/noimage.jpg';
		if(strpos($loop_image, 'default.jpg') !== false) $loop_image = get_stylesheet_directory_uri().'/images/noimage.jpg';
?>
				<div class="recommend_item">
					<img class="centered_img" src="<?php echo $loop_image; ?>">
					<a href="<?php echo $loop_link; ?>" class="contact_btn"><span>詳細を見る</span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/menu-arrow-r.svg"></a>
				</div>
<?php
	endwhile;
endif;
?>
			</div>
		</div>
		<div class="recommend_more">
			<a class="readmore_btn" href="<?php echo get_site_url(); ?>/property">
				<span>一覧を見る</span>
				<img class="normal" src="<?php echo get_stylesheet_directory_uri(); ?>/images/circle-arrow-r.svg">
				<img class="hover" src="<?php echo get_stylesheet_directory_uri(); ?>/images/circle-arrow-r-invert.svg">
			</a>
		</div>
	</div>
</section>
	</main><!-- #main -->
<?php
get_footer();
