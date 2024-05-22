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
 * @package ninibaikyaku
 */

get_header();
?>
<main id="primary" class="site-main">






<?php

query_posts( 'posts_per_page=5' );

?>

<!-- banner_section -->
<section class="banner_section">
	<div class="banner_top_arch">
		<!-- <img src="//echo get_stylesheet_directory_uri(); ?>/images/banner_top_arch.png"> -->
	</div>
	<div class="banner slider">
		<div>
			<div class="banner_image banner_slide_first">
				<div class="banner_text">
					<h1>
						住宅ローンの悩み・滞納<br>
						元・金融機関の専門家<br>
						任意売却ドクターが解決します。
					</h1>
				</div>
			</div>
		</div>
		<div>
			<div class="banner_image banner_slide_second">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/banner-2.png">
				<div class="banner_text">
					<h1>
						費用は0円<br>
						持ち出しは一切なし
					</h1>
				</div>
			</div>
		</div>
		<div>
			<div class="banner_image banner_slide_third">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/banner-3.png">
				<div class="banner_text">
					<h1>
						そのまま住み続ける<br>
						こともできる
					</h1>
				</div>
			</div>
		</div>
	</div>
	<div class="banner_btn_sec">
		<!-- <div class="banner_btn_arch"> -->
			<!-- <img src=" echo get_stylesheet_directory_uri(); ?>/images/four-box-bg.svg"> -->
		<!-- </div> -->
		<div class="custom_container">
			<div class="custom_row">
				<div class="banner_btn_round">
					<div class="banner_btn_round_inner">
						<a class="js_scrollto" data-href="#id_whatis">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/dot-image.png" class="banner_btn_dot_image">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Mortgage.png" class="banner_btn_image">
							<p>住宅ローン滞納と任意売却</p>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/down-arrow.png" class="banner_btn_down_image">
						</a>
					</div>
				</div>
				<div class="banner_btn_round">
					<div class="banner_btn_round_inner">
						<a class="js_scrollto" data-href="#id_service">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/dot-image.png" class="banner_btn_dot_image">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/service.png" class="banner_btn_image">
							<p>任意売却Dr.のサービス</p>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/down-arrow.png" class="banner_btn_down_image">
						</a>
					</div>
				</div>
				<div class="banner_btn_round">
					<div class="banner_btn_round_inner">
						<a class="js_scrollto" data-href="#id_flow">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/dot-image.png" class="banner_btn_dot_image">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/menu_merit.png" class="banner_btn_image">
							<p>任意売却7つのメリット</p>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/down-arrow.png" class="banner_btn_down_image">
						</a>
					</div>
				</div>
				<div class="banner_btn_round">
					<div class="banner_btn_round_inner">
						<a class="js_scrollto" data-href="#id_about">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/dot-image.png" class="banner_btn_dot_image">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/thoughts.png" class="banner_btn_image">
							<p>私たちの想い</p>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/down-arrow.png" class="banner_btn_down_image">
						</a>
					</div>
				</div>
				<div class="banner_btn_round">
					<div class="banner_btn_round_inner">
						<a class="js_scrollto" data-href="#id_learnvideo">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/dot-image.png" class="banner_btn_dot_image">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/videos.png" class="banner_btn_image">
							<p>動画で学ぼう！</p>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/down-arrow.png" class="banner_btn_down_image">
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="scroll_pos" id="id_whatis"></div>
	<div class="voluntary_sale_section">
		<div class="custom_container">
			<div class="voluntary_sale_inner pg_concept">
				<div class="heading_text">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/heading-image.png" class="heading_image">
					<h2>任意売却とは</h2>
				</div>
				<div class="voluntary_sale_inner_text">
					<h3>住宅ローンの返済が滞ってしまった時に、金融機関の承諾を得て、<br class="cpc9">
                        不動産を売却して解決をする<span class="jpend">方法です。</span><br>
                        （例）解雇や雇い止め・離婚・病気やケガなどが<span class="jpend">原因・・・</span></h3>
					<p>滞納が6か月分を超えてしまうと、<br class="cpc9">
						対応が借入先の銀行から「保証会社」や「債権回収会社」という<br class="cpc9">
					特殊な金融機関に移行して<span class="jpend">しまいます。</span></p>
					<p>移行後は、これまでのような月々の返済はできません。</p>
					<p>「残金一括返済」または「裁判所による強制競売」を求められますが、<br class="cpc9">
					金融機関の承諾を得て不動産売却によって解決する方法が<span class="jpend">あります。</span></p>
					<p style="margin: 0">&nbsp;</p>
					<div><a href="<?php echo get_site_url(); ?>/concept/" class="more_details_btn front_video">もっと詳しく <i class="fa fa-chevron-right"></i></a></div>
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/voluntary.png" class="voluntary_image">
				</div>
				<div class="scroll_pos" id="id_learnvideo" style="transform: translateY(0px)"></div>
				<div class="voluntary_sale_inner_text_second">
					<div class="voluntary_sale_video">
						<div class="voluntary_sale_video_innre">
							<iframe width="560" height="315" src="https://www.youtube.com/embed/f4bL6t734D8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						</div>
					</div>
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/stand.png" class="stand_image">
					<h3>任意売却のしくみについて<br class="cpc9">
					3分で分かるかんたん解説<span class="jpend">動画です。</span></h3>
					<div><a href="<?php echo get_site_url(); ?>/video/" class="more_details_btn front_video">もっと詳しく <i class="fa fa-chevron-right"></i></a></div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- benefits_voluntary_sale_section -->
<div class="scroll_pos" id="id_flow" style="transform:translateY(-50px)"></div>
<section class="benefits_voluntary_sale_section">
	<div class="custom_container">
		<div class="heading_text">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/heading-image.png" class="heading_image">
			<h2>任意売却7つのメリット</h2>
		</div>
		<div class="benefits_box_sec">
			<div class="custom_row">
				<div class="custom_col_3">
					<div class="benefits_box">
						<div class="benefits_box_image">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/benefits-1.png">
						</div>
						<h5>費用は0円<br>
						持ち出しは一切なし</h5>
					</div>
				</div>
				<div class="custom_col_3">
					<div class="benefits_box">
						<div class="benefits_box_image">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/benefits-2.png">
						</div>
						<h5>引越し時期が<br>
						希望に合わせやすい</h5>
					</div>
				</div>

				<div class="custom_col_3">
					<div class="benefits_box">
						<div class="benefits_box_image">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/benefits-3.png">
						</div>
						<h5>その後の生活が<br>
						再スタートしやすい</h5>
					</div>
				</div>

				<div class="custom_col_3">
					<div class="benefits_box">
						<div class="benefits_box_image">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/benefits-4.png">
						</div>
						<h5>賃貸として<br>
							そのまま住み続ける<br>
						こともできる</h5>
					</div>
				</div>
				<h3>競売と違って･･･</h3>
				<div class="custom_col_3">
					<div class="benefits_box">
						<div class="benefits_box_image">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/benefits-5.png">
						</div>
						<h5>その後の賃貸の審査が<br>
						通りやすい</h5>
					</div>
				</div>

				<div class="custom_col_3">
					<div class="benefits_box">
						<div class="benefits_box_image">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/benefits-6.png">
						</div>
						<h5>安価で落札されず<br>
						適切な資産価値で売却</h5>
					</div>
				</div>

				<div class="custom_col_3">
					<div class="benefits_box">
						<div class="benefits_box_image">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/benefits-7.png">
						</div>
						<h5>ご近所に売却理由が<br>
						知られない</h5>
					</div>
				</div>
			</div>
			<div class="our_vision_box_btn front_merit">
                <a href="<?php echo get_site_url(); ?>/step">任意売却Dr.ご相談から解決までの<br>流れを知りたい方はこちら <i class="fa fa-chevron-right"></i></a>
            </div>
		</div>
	</div>
</section>
<!-- service_section -->
<div class="scroll_pos" id="id_service"></div>
<section class="service_section">
	<div class="custom_container">
		<div class="heading_text pg_top">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/heading-image.png">
			<h2><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/service-logo.png">のサービス</h2>
			<p>任意売却Dr.では、金融機関出身者としての知見・知識・ネットワークを最大限提供し、<br class="cpc9">
				ご相談者様にとってベストな方法をご提案して<span class="jpend">います！</span>
			</p>
		</div>
	</div>
	<div class="service_box_text_image_sec">
		<div class="service_box_inner_image">
			<div class="service_box_inner_image_inner">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/service-image.png">
			</div>
		</div>
		<div class="service_box_inner_text">
			<h3><span class="uline_cyan">ご相談を受けるスタッフは全員金融機関出身者</span><span class="jpend uline_cyan">です！</span></h3>
			<p>皆さまが聞いたことのあるメガバンクの元担当者や、任意売却では日本で<br class="cpc9">１番整備されている「住宅金融支援機構（フラット35等）」の任意売却・<br class="cpc9">元担当者（審査員）が親身になってご相談を<span class="jpend">伺います！</span></p>
		</div>
	</div>
	<div class="service_box_sec">
		<div class="custom_container">
			<div class="custom_row">
				<div class="custom_col_4">
					<div class="service_box">
						<div class="service_box_image">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/service-1.png">
						</div>
						<div class="service_box_text">
							<h5>納得いくまで<span class="jpend">ご説明します</span></h5>
							<p>現状を分析し、納得いくまでわかりやすくご説明することを大切に<span class="jpend">しています。</span></p>
							<ul>
								<li>
									<p class="dot_p">適正な手順の提示</p>
								</li>
								<li>
									<p class="dot_p">必要書類の収集・作成</p>
								</li>
								<li>
									<p class="dot_p">解決までの<span class="jpend">スケジューリング作成</span></p>
								</li>
								<li>
									<p class="dot_p">その他各種申請の<span class="jpend">お手伝い</span></p>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="custom_col_4">
					<div class="service_box">
						<div class="service_box_image">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/service-2.png">
						</div>
						<div class="service_box_text">
							<h5>査定や費用算出は<span class="jpend">お任せください</span></h5>
							<p>金融機関と同じ方法で査定や調査。気になる費用も金融機関出身者が正確に<span class="jpend">算出します。</span></p>
							<ul>
								<li>
									<p class="dot_p">不動産適正査定</p>
								</li>
								<li>
									<p class="dot_p">周辺相場の調査</p>
								</li>
								<li>
									<p class="dot_p">控除される費用の算出</p>
								</li>
								<li>
									<p class="dot_p">延滞損害金の算出</p>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="custom_col_4">
					<div class="service_box">
						<div class="service_box_image">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/service-3.png">
						</div>
						<div class="service_box_text">
							<h5>関係者との調整や専門家の<span class="jpend">ご紹介も</span></h5>
							<p>避けては通れない関係者とのやりとりは私たちが行います。難しい問題を伴うケースでも<span class="jpend">ご安心ください。</span></p>
							<ul>
								<li>
									<p class="dot_p">利害関係者との調整</p>
								</li>
								<li>
									<p class="dot_p">離婚や相続に必要な<span class="jpend">手続きのサポート</span></p>
								</li>
								<li>
									<p class="dot_p">連帯債務者や連帯保証人の<span class="jpend">サポート・フォロー</span></p>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="custom_col_4">
					<div class="service_box">
						<div class="service_box_image">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/service-4.png">
						</div>
						<div class="service_box_text">
							<h5>売却、そして次の<span class="jpend">住まいまで</span></h5>
							<p>当社の厳しい審査を通過した不動産店をご紹介。適正価格で売却し、安心できる次の住まいを<span class="jpend">探しましょう。</span></p>
							<ul>
								<li>
									<p class="dot_p">地域優良協力店（弊社加盟店）の<span class="jpend">ご紹介</span></p>
								</li>
								<li>
									<p class="dot_p">不動産会社の販売管理</p>
								</li>
								<li>
									<p class="dot_p">より高額売却の為のお片付け<span class="jpend">サポート</span></p>
								</li>
								<li>
									<p class="dot_p">賃貸物件、引越業者の<span class="jpend">手配</span></p>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="custom_col_4">
					<div class="service_box">
						<div class="service_box_image">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/service-5.png">
						</div>
						<div class="service_box_text">
							<h5>売って終わりではありません</h5>
							<p>任意売却が終わっても残ったローン返済や手続きは続きます。あなたの再スタートまで徹底<span class="jpend">サポート。</span></p>
							<ul>
								<li>
									<p class="dot_p">残った住宅ローンの分割返済申請<span class="jpend">アドバイス</span></p>
								</li>
								<li>
									<p class="dot_p">競売取下げ</p>
								</li>
								<li>
									<p class="dot_p">差押え解除</p>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="custom_col_4">
					<div class="service_box">
						<div class="service_box_image">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/service-6.png">
						</div>
						<div class="service_box_text">
							<h5>セカンドオピニオン</h5>
							<p>他店・他社様にてご相談中、依頼中という方でも、何か不安なことなどあれば、遠慮なく<span class="jpend">ご相談ください。</span></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- about_section -->
<section class="about_section">
	<div class="custom_container">
		<div class="about_text_inner_sec">
			<div class="heading_text">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/heading-image.png" class="heading_image">
				<h2>ご利用料金について</h2>
			</div>
			<div class="about_text_inner_box">
				<div class="about_text_inner_box_image">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/about-image.png">
				</div>
				<div class="about_text_inner_box_text pg_top">
					<h4>任意売却Dr.ではご相談から解決まで<span>全サービスが一切無料</span>です。</h4>
					<p>当社ではご相談者様から費用を頂くことは一切ございません。提携先へのサポート収益や広告収入、投資家や実業家の皆さまからの出資によって運営されている為です。安心してご相談ください。</p>
				</div>
			</div>
			<a href="<?php echo get_site_url(); ?>/service/" class="more_details_btn">もっと詳しく <i class="fa fa-chevron-right"></i></a>
		</div>
		<div class="scroll_pos" id="id_about" style="transform: translateY(0);"></div>
		<div class="about_text_inner_sec_second">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/profile-line.png" class="line_image_first">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/profile-line.png" class="line_image_second">
			<div class="about_text_inner_sec_second_inner">
				<div class="heading_text">
					<h2>私たちの想い</h2>
				</div>
				<p>私たちは任意売却Dr.<br>
				住宅ローン問題のお医者さんだと思ってもらえると嬉しいです。</p>
				<h3>住宅ローンは「お金の問題」。</h3>
				<p>だから、相談スタッフは全員金融機関出身者、お金のプロです。<br>
				私たちに「治療」という名の「解決」のお手伝いをさせてもらえませんか？</p>
				<p class="about_text_sec_second_inner_text">それは突然のことだった。<br>
					親族のもとに銀行から届いた1通の手紙。<br>
					「約3,000万円の一括請求」<br>
					目を疑い、思わず手が震えた。<br>
					誰に相談したらよいのか<br>
					どうすれば助かるのか<br>
				家族みんなが動揺した。</p>
			</div>
		</div>
		<div class="profile_box_sec">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/profile-image.png" class="profile_image">
			<p>これ、実は全部代表である私・山口の実体験なんです。</p>
			<p>私自身が「住宅ローン問題」の当事者だったことが「任意売却Dr.」をスタートするきっかけとなりました。</p>
		</div>
		<div class="about_text_text">
			<div class="about_text_text_inner">
				<p>任意売却Dr.代表</p>
				<h2>山口 剛平</h2>
			</div>
		</div>
		<a href="<?php echo get_site_url(); ?>/vision/" class="more_details_btn about_more_details_btn">私たちの想い <i class="fa fa-chevron-right"></i></a>
	</div>
</section>
<!-- customers_voice_section -->
<section class="customers_voice_section">
	<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/customers_voice_box_bg.png" class="customers_voice_box_bg">
	<div class="medium_custom_container">
		<div class="customers_voice_box_sec">
			<div class="heading_text">
				<h2>お客様の声</h2>
				<p>確かな経験と実績をもつ「任意売却の専門家」として、すでに1,500件以上をサポート。<br>
					多くのご相談者様からご満足の声が届いて<span class="jpend">います</span>。
				</p>
			</div>
			<div class="customers_voice_box_inner">
				<div class="custom_row">
					<div class="custom_col_4">
						<div class="customers_voice_box customers_voice_blue_box">
							<div class="customers_voice_box_image">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/customers_voice_box_image_1.png">
								<div class="customers_voice_box_image_text">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/customers_voice_box_1.png">
									<p>埼玉県 Aさん</p>
								</div>
							</div>
							<div class="customers_voice_box_text">
								<h6>任意売却で人生を再スタート！</h6>
								<p>リストラで失職し住宅ローンが払えなくなり、任意売却ドクターに相談を。すると任意売却について丁寧に説明してくれ、まずはほっとしました。その後無事売却でき、新しい人生を始めることが<span class="jpend">できました。</span></p>
							</div>
						</div>
					</div>
					<div class="custom_col_4">
						<div class="customers_voice_box customers_voice_red_box">
							<div class="customers_voice_box_image">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/customers_voice_box_image_2.png">
								<div class="customers_voice_box_image_text">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/customers_voice_box_2.png">
									<p>東京都 Tさん</p>
								</div>
							</div>
							<div class="customers_voice_box_text">
								<h6>離婚後に来た督促にも解決策</h6>
								<p>前の主人が自己破産し、以前一緒に住んでいた家の住宅ローンを延滞したため、連帯保証人だった私に督促状が来ました。元主人に会うのもいやでしたが、任意売却ドクターが間に入ってくれ、解決できました。</p>
							</div>
						</div>
					</div>
					<div class="custom_col_4">
						<div class="customers_voice_box customers_voice_purple_box">
							<div class="customers_voice_box_image">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/customers_voice_box_image_3.png">
								<div class="customers_voice_box_image_text">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/customers_voice_box_3.png">
									<p>大阪府 Oさん</p>
								</div>
							</div>
							<div class="customers_voice_box_text">
								<h6>親族間売買で不動産を維持</h6>
								<p>私の場合、任意売却ドクターから親族間売買を提案されました。不動産の一部を息子に購入してもらい、その売却金額で借金を完済したのです。そんな方法があったのか、と感動を覚えました。</p>
							</div>
						</div>
					</div>
				</div>
				<div class="customers_voice_box_inner_btn">
					<a href="<?php echo get_site_url(); ?>/reviews/">もっと見る <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
				</div>
			</div>
		</div>
	</div>
	<div class="notice_faq_box_sec">
		<div class="custom_container">
			<div class="custom_row">
				<div class="custom_col_6">
					<div class="notice_box">
						<div class="notice_heading">
							<p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/noice-image.png">お知らせ</p>
							<a href="<?php echo get_site_url(); ?>/news/">もっと見る <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
						</div>
						<div class="notice_table_box">
							<table>
<?php
if ( have_posts() ) : 
	while(have_posts()) :
		the_post();
		$loop_ID = get_the_ID();
		$loop_title = get_the_title();
		$loop_date = get_the_date('Y.m.d');
		$loop_link = get_permalink();
?>
								<tr>
									<td><p class="notice_date"><?php echo $loop_date; ?></p></td>
									<td><p class="notice_text"><?php echo $loop_title; ?></p></td>
								</tr>
<?php endwhile;
endif; ?>
							</table>
						</div>
					</div>
				</div>
				<div class="custom_col_6">
					<div class="faq_box">
						<div class="faq_heading">
							<p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/faq-image.png">よくある質問</p>
							<a href="<?php echo get_site_url(); ?>/faq/">もっと見る <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
						</div>
<?php
$fetch_key = array(
    'post_type' => 'cfaq',
    // 'author' => $user_id,
	'posts_per_page' => -1,
    'fields' => 'ids',
);
$fetch_query = new WP_Query($fetch_key);
$faq_list = [];
if($fetch_query->have_posts()) : 
    while ($fetch_query->have_posts()) : 
        $fetch_query->the_post(); 
        $loop_id = get_the_id();
		$loop_toporder = get_post_meta($loop_id, 'toporder', true);
        if($loop_toporder > 0){
            array_push(array('id'=>$loop_id, 'order'=>$loop_toporder));
        }
    endwhile;
endif;
function order_cmp($a, $b)
{
    return $a['order'] < $b['order'];
}
usort($faq_list, "order_cmp");
$faq_showids = [];
foreach($faq_list as $item) {
	array_push($faq_showids, $item['id']);
}
?>
						<div class="faq_table_box">
							<div id="accordion">
<?php foreach($faq_showids as $faq_id):
			$loop_id = $faq_id;
			$loop_question = get_post_meta($loop_id, 'question', true);
			$loop_answer = get_post_meta($loop_id, 'answer', true);
?>

								<h3> <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image.png"> 任意売却専門業者との違いは何ですか？</h3>
								<div>
									<p><a href="<?php echo get_site_url(); ?>/faq/#id_faq01">
										金融機関出身者が設立した相談会社なので、住宅ローンの悩み・問題、任意売却や競売など、どんな質問でもお答えできます。金融機関で審査や手続きを行っていた...
									</a></p>
								</div>
<?php endforeach; ?>
								<h3> <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image.png"> 離婚していて、元夫（元妻）に会いたくないのですが</h3>
								<div>
									<p><a href="<?php echo get_site_url(); ?>/faq/#id_faq02">
										私たちが両者の間に入ってしっかりサポートするので、お二人が一度も顔を合わせることなく解決できます。もちろん、相手方に現住所を知られることもありません。
									</a></p>
								</div>
								<h3> <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image.png"> 住宅ローン滞納前ですが、ご相談できますか？</h3>
								<div>
									<p><a href="<?php echo get_site_url(); ?>/faq/#id_faq03">
										もちろんです。ご相談は１日でも早い方が解決方法の選択肢が広がります。お早めにご相談ください。
									</a></p>
								</div>
								<h3> <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/q-image.png"> 任意売却はブラックリストに載りますか？</h3>
								<div>
									<p><a href="<?php echo get_site_url(); ?>/faq/#id_faq04">
									そもそも「ブラックリスト」というものは存在しません。ですが、「個人信用情報」に、住宅ローン「滞納」の記録が残され、5～7年間、新たな金融商品（ローンやクレジットなど）の契約は、審査通過が難しくなるでしょう。
									</a></p>
								</div>
							</div>
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