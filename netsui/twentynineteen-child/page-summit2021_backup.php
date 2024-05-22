<?php get_header(); ?>
<?php 
$person_list = array(
	array(
		'id' => 1,
		'imgname' => 'speaker_01.jpg',
		'name' => '山野智久',
		'jobtitle' => '（一社）熱意ある地方創生ベンチャー連合 共同代表理事 / アソビュー株式会社 代表取締役 CEO',
		'bio' => "アクティビティ・体験教室・レジャーチケットなど「遊び」の予約ができる日本最大級のマーケットプレイス「アソビュー！」、思い出を贈る「asoview! GIFT」などWEBサービスを運営。観光庁アドバイザリーボード・各種委員を歴任するなど多方面で活動。明治大学法学部法律学科卒。新卒にて株式会社リクルートに入社。2011年アソビュー株式会社を設立。",
		'uploadtime' => '2020/06'
	),
	array(
		'id' => 2,
		'imgname' => 'speaker_02.jpg',
		'name' => '秋好陽介',
		'jobtitle' => '（一社）熱意ある地方創生ベンチャー連合 共同代表理事 / ランサーズ株式会社 代表取締役CEO',
		'bio' => "1981年大阪府生まれ。2005年、ニフティ株式会社 新卒入社。2008年､「ランサーズ株式会社」を創業。「テクノロジーで自分らしく働ける社会をつくる」をビジョンに、副業・フリーランス向けマッチングサービスや企業向けの人材サービスを展開。2019年4月、経済同友会の規制改革副委員長に就任し、現在に至る。",
		'uploadtime' => '2020/06'
	),
	array(
		'id' => 3,
		'imgname' => 'speaker_03.jpg',
		'name' => '高島宗一郎',
		'jobtitle' => '福岡市長',
		'bio' => "1974年生まれ。アナウンサーから2010年に史上最年少の36歳で福岡市長に就任。国家戦略特区を獲得し数々の規制緩和や制度改革を実現。日本のスタートアップシーンを強力にけん引し，テクノロジーで新しい価値を生み出す未来志向のまちづくりを行う。2017年，日本の市長で初めて世界経済フォーラム（ダボス会議）に招待される。",
		'uploadtime' => '2020/06'
	),
	// array(
	// 	'id' => 4,
	// 	'imgname' => 'speaker_04.jpg',
	// 	'name' => '米良はるか',
	// 	'jobtitle' => 'READYFOR株式会社 代表取締役 CEO',
	// 	'bio' => "1987年生まれ。慶應義塾大学経済学部卒業。2011年に日本初・国内最大のクラウドファンディングサービス「READYFOR」の立ち上げを行い、2014年より株式会社化、代表取締役に就任。World Economic Forumグローバルシェイパーズ2011に選出、日本人史上最年少でダボス会議に参加。現在は首相官邸「人生100年時代構想会議」の議員や内閣官房「歴史的資源を活用した観光まちづくり推進室」専門家を務める。",
	//	'uploadtime' => '2020/06'
	// ),
	// array(
	// 	'id' => 5,
	// 	'imgname' => 'speaker_05.jpg',
	// 	'name' => '森まさこ',
	// 	'jobtitle' => '法務大臣',
	// 	'bio' => "当選1期目で内閣府特命担当大臣（消費者及び食品安全、少子化対策、男女共同参画）に就任し、「地方少子化交付金創設」、「地方女性活躍交付金創設」、「育休給付金世界一」など、女性活躍、少子化に向き合った政策づくりを行った。日本人初の国際危機管理士。法務大臣就任後、ゴーン事件における海外発信、新型コロナウイルス入国管理など、精力的な活動を行なっている。また、ライフワークとして出身地でもある福島県のビジョンを実現するべく、福島県イノベーションコースト構想、福島再エネ構想、いわきバッテリーバレー構想を推進している。1995年弁護士登録。夫と二女(大学生、高校生)。趣味はマラソン。",
	//	'uploadtime' => '2020/06'
	// ),
	// array(
	// 	'id' => 6,
	// 	'imgname' => 'speaker_06.jpg',
	// 	'name' => '小野寺青森市長',
	// 	'jobtitle' => '',
	// 	'bio' => "",
	//	'uploadtime' => '2020/06'
	// ),
	// array(
	// 	'id' => 7,
	// 	'imgname' => 'speaker_07.jpg',
	// 	'name' => '仲川げん',
	// 	'jobtitle' => '奈良市長',
	// 	'bio' => "1976年奈良県生まれ。立命館大学卒業後、国際石油開発帝石株式会社及び奈良NPOセンターを経て2009年7月、奈良市長に就任。入札制度改革や土地開発公社の解散、ごみ行政の刷新など様々な市政改革に取組む。1300年の歴史を有する日本のルーツとして、世界から尊敬される都市をめざす。2017年5月から中核市市長会顧問。2019年5月から奈良県市長会会長。現在三期目。",
	//	'uploadtime' => '2020/06'
	// ),
	// array(
	// 	'id' => 8,
	// 	'imgname' => 'speaker_08.jpg',
	// 	'name' => '湯崎英彦',
	// 	'jobtitle' => '広島県知事',
	// 	'bio' => "昭和４０年広島県生まれ。平成２年３月東京大学法学部卒業。平成７年６月スタンフォード大学経営学修士。平成２年４月通商産業省（現：経済産業省）に入省，平成１２年３月退官。㈱アッカ・ネットワークスを設立し，平成１２年１２月代表取締役副社長，平成２０年３月同社退任。平成２１年１１月から広島県知事，現在３期目。",
	//	'uploadtime' => '2020/06'
	// ),
	// array(
	// 	'id' => 9,
	// 	'imgname' => 'speaker_09.jpg',
	// 	'name' => '太田直樹',
	// 	'jobtitle' => '株式会社NewStories代表・総務省政策アドバイザー',
	// 	'bio' => "New Stories代表。総務省政策アドバイザー。 挑戦する地方都市を「生きたラボ」として、行政、 企業、大学、ソーシャルビジネスを越境し、未来 をプロトタイピングすることを企画・運営。2015年1月から17年8月まで、総務大臣補佐官として、地方の活性化とIoTやAIの社会実装の 政策立案と実行に従事。その前は、ボストンコンサルティングの経営メンバーとして、アジアのテクノロジーグループを統括。シビックテックを推進する Code for Japan理事などの社会的事業に関わり、国内外のイノベー ション人材とつながっている。",
	//	'uploadtime' => '2020/06'
	// ),
	// array(
	// 	'id' => 10,
	// 	'imgname' => 'speaker_10.jpg',
	// 	'name' => '津田大介',
	// 	'jobtitle' => 'ジャーナリスト／メディア・アクティビスト',
	// 	'bio' => 'ジャーナリスト／メディア・アクティビスト。ポリタス編集長。大阪経済大学情報社会学部客員教授。1973年生まれ。東京都出身。早稲田大学社会科学部卒。テレ朝チャンネル2「津田大介 日本にプラス＋」キャスター。J-WAVE「JAM THE WORLD」ニュース・スーパーバイザー。メディアとジャーナリズム、著作権、コンテンツビジネス、表現の自由などを専門分野として執筆活動を行う。近年は地域課題の解決や社会起業、テクノロジーが社会をどのように変えるかをテーマに取材を続ける。主な著書に『情報戦争を生き抜く』（朝日新書）、『ウェブで政治を動かす！』（朝日新書）、『動員の革命』（中公新書ラクレ）、『情報の呼吸法』（朝日出版社）、『Twitter社会論』（洋泉社新書）ほか。2011年9月より週刊有料メールマガジン「メディアの現場」を配信中。',
	//	'uploadtime' => '2020/06'
	// ),
	array(
		'id' => 11,
		'imgname' => 'speaker_11.jpg',
		'name' => '鈴木英敬',
		'jobtitle' => '三重県知事',
		'bio' => "1974年生まれ。経済産業省時代に一円起業やジョブカフェなどを手掛ける。３６歳（歴代２番目の若さ）で三重県知事に当選し、現在３期目。伊勢志摩サミットの誘致を牽引し、「オール三重」で無事かつ成功裏に完遂。現在、全国知事会の地方創生対策本部長ほか。家族は五輪メダリストの妻・武田美保と一男一女。現職知事として初めて第一子、第二子とも育休を取得。",
		'uploadtime' => '2020/06'
	),
	array(
		'id' => 12,
		'imgname' => 'speaker_12.jpg',
		'name' => '鈴木康友',
		'jobtitle' => '浜松市長',
		'bio' => "1957年静岡県浜松市生まれ。1980年慶應義塾大学法学部を卒業後、松下政経塾に入塾（第１期生）。2000年６月に衆議院議員に初当選（２期）。2007年５月浜松市長に就任し、現在４期目。三遠南信地域（愛知県東三河地域、静岡県遠州地域、長野県南信州地域）連携ビジョン推進会議（ＳＥＮＡ）会長。2011年12月から指定都市市長会副会長。",
		'uploadtime' => '2020/06'
	),
	// array(
	// 	'id' => 13,
	// 	'imgname' => 'speaker_13.jpg',
	// 	'name' => '倉林啓士郎',
	// 	'jobtitle' => 'FC琉球 取締役会長',
	// 	'bio' => "1981年6月生まれ。東京都出身。多摩川グラウンドの近くで育ち、幼い頃からサッカーに明け暮れる。東京大学在学時に、株式会社 DeNA にて新規事業を担当。事業立ち上げのやりがいを知り、付加価値のある「ものづくり」をしたいと決意、大学 4 年時にパキスタンから高品質な手縫いのサッカーボールの輸入を開始しスポーツブランド「sfida(スフィーダ)」を立ち上げ、株式会社イミオ設立。2016 年 12 月、sfida がスポンサードをしていた FC 琉球の代表取締役社長に就任。FC 琉球は 2018 年、J3 優勝・J2 昇格を果たす。2019 年 6 月より取締役会長に就任。座右の銘は「力愛不二」、夢はワールドカップの公式球を製造すること。",
	//	'uploadtime' => '2020/06'
	// ),
	// array(
	// 	'id' => 14,
	// 	'imgname' => 'speaker_14.jpg',
	// 	'name' => '高橋靖',
	// 	'jobtitle' => '水戸市長',
	// 	'bio' => "1965年水戸市生まれ。明治大学大学院政治経済学研究科修士課程修了。国会議員秘書を経て，水戸市議会議員3期，茨城県議会議員2期。2011年に水戸市長に初当選し，2019年から3期目。常磐大学客員教授，水戸市スポーツ協会会長，茨城県行政書士会顧問等役職多数。著書に「水戸市役所『みとの魅力発信課』」，「実践　市民とつくる公共政策」がある。",
	//	'uploadtime' => '2020/06'
	// ),
	// array(
	// 	'id' => 15,
	// 	'imgname' => 'speaker_15.jpg',
	// 	'name' => '重松大輔',
	// 	'jobtitle' => '株式会社スペースマーケット 代表取締役CEO',
	// 	'bio' => "1976年千葉県生まれ。千葉東高校、早稲田大学法学部卒。2000年NTT東日本入社。2006年株式会社フォトクリエイトに参画。2014年1月、株式会社スペースマーケットを創業し、2019年12月に東証マザーズ上場。2016年1月一般社団法人シェアリングエコノミー協会を設立し代表理事に就任。",
	//	'uploadtime' => '2020/06'
	// ),
	// array(
	// 	'id' => 16,
	// 	'imgname' => 'speaker_16.jpg',
	// 	'name' => '楠本正幸',
	// 	'jobtitle' => 'NTTアーバンソリューションズ株式会社 取締役副社長／NTT都市開発株式会社 代表取締役副社長',
	// 	'bio' => "1979年東京大学工学部卒、日本電電公社入社。1982年よりパリ・ラ・ヴィレット建築大学院へ留学、1985年フランス政府公認建築家の資格取得。NTT都市開発にて商業、ホテル、グローバル事業等を牽引、2017年同社代表取締役副社長就任。2019年7月NTTアーバンソリューションズが設立され現在に至る。",
	//	'uploadtime' => '2020/06'
	// ),
	// array(
	// 	'id' => 17,
	// 	'imgname' => 'speaker_17.jpg',
	// 	'name' => '熊谷俊人',
	// 	'jobtitle' => '千葉市長',
	// 	'bio' => "１９７８年生まれ、神戸市出身。２００１年早稲田大学政治経済学部卒業、ＮＴＴコミュニケーションズ株式会社入社。２００７年５月から２年間、千葉市議会議員を務め、２００９年６月、千葉市長選挙に立候補し当選。当時全国最年少市長（３１歳）、政令指定都市では歴代最年少市長となる。現在３期目。",
	//	'uploadtime' => '2020/06'
	// ),
	array(
		'id' => 18,
		'imgname' => 'speaker_18.jpg',
		'name' => '崎田恭平',
		'jobtitle' => '日南市長',
		'bio' => "１９７９年５月生まれ。日南市出身。九州大学工学部を卒業後、宮崎県庁職員を経て２０１３年４月に九州最年少で日南市長に就任。現在２期目。民間人を積極的に登用した地域課題解決が注目を集める。その取り組みに共感した若者や移住者が新しいビジネスにチャレンジする事例が増加しており、スタートアップの動きが加速している。「人づくり」を政策の柱とする「創客創人」をコンセプトに掲げ、地方創生の実現に奔走中。",
		'uploadtime' => '2020/06'
	),
	// array(
	// 	'id' => 19,
	// 	'imgname' => 'speaker_19.jpg',
	// 	'name' => '林篤志',
	// 	'jobtitle' => 'Next Commons Lab 代表',
	// 	'bio' => "ポスト資本主義社会を具現化するための社会OS「Next Commons Lab」を創設。2016年、一般社団法人Next Commons Labを設立。自治体・企業・起業家など多様なセクターと協業しながら、新たな社会システムの構築を目指す。日本財団 特別ソーシャルイノベーターに選出（2016）。Forbes Japan ローカル・イノベーター・アワード 地方を変えるキーマン55人に選出（2017）。",
	//	'uploadtime' => '2020/06'
	// ),
	// array(
	// 	'id' => 20,
	// 	'imgname' => 'speaker_20.jpg',
	// 	'name' => '井上高志',
	// 	'jobtitle' => '株式会社LIFULL 代表取締役社長',
	// 	'bio' => "1997年株式会社ネクスト（現LIFULL）を設立。インターネットを活用した不動産情報インフラの構築を目指して、不動産・住宅情報サイト「HOME'S（現：LIFULL HOME'S）」を立ち上げ、日本最大級のサイトに育て上げる。現在は、国内外併せて約20社のグループ会社、世界63ヶ国にサービス展開している。",
	//	'uploadtime' => '2020/06'
	// ),
	array(
		'id' => 21,
		'imgname' => 'speaker_21.jpg',
		'name' => '長野恭紘',
		'jobtitle' => '別府市長',
		'bio' => "別府生まれの別府育ち。2015年に最年少（40歳）別府市長として当選。現在は別府市で戦後初の無投票という市民からの期待を背負い2期目を担う。「湯～園地」公約ムービーを公開し、2017年に3日間限定で実現し話題に。RWC2019日本大会では5カ国の強豪国のキャンプ誘致に成功。今後も市民の幸せのために様々な取組を展開し、市民も観光客も「ワクワク、ドキドキ、感動するまち」を目指し、日々奮闘中。",
		'uploadtime' => '2020/06'
	),
	// array(
	// 	'id' => 22,
	// 	'imgname' => 'speaker_22.jpg',
	// 	'name' => '吉田雄人',
	// 	'jobtitle' => '一般社団法人熱意ある地方創生ベンチャー連合事務局長',
	// 	'bio' => '1975年生まれ。早稲田大学政治経済学部を卒業後、アクセンチュアにて3年弱勤務。退職後、早稲田大学大学院（政治学修士）に通いながら、2003年の横須賀市議会議員選挙に立候補し、初当選。2009年の横須賀市長選挙で初当選し、2013年に再選。2017年7月に退任するまで、完全無所属を貫いた。現在、地域課題解決のためには良質で戦略的な官民連携手法である日本版GR：ガバメント・リレーションズが必要であるという考え方の元、Glocal Government Relationz株式会社を設立。熱意ある地方創生ベンチャー連合の事務局長に2019年1月に就任、現在に至る。',
	//	'uploadtime' => '2020/06'
	// ),
	// array(
	// 	'id' => 23,
	// 	'imgname' => 'speaker_23.jpg',
	// 	'name' => '東修平',
	// 	'jobtitle' => '四條畷市長',
	// 	'bio' => "1988年大阪府四條畷市生まれ。京都大学卒業、同大学院修士課程修了（原子核工学）。外務省、野村総合研究所インドを経て、2017年1月、四條畷市長に初当選。現役最年少市長となる。民間出身のママ副市長とともに、日本一前向きな市役所を掲げ、就任直後より公民連携施策を多数展開。11年ぶりの人口増加を達成する。",
	//	'uploadtime' => '2020/06'
	// ),
	array(
		'id' => 24,
		'imgname' => 'speaker_24.jpg',
		'name' => '五十嵐立青',
		'jobtitle' => 'つくば市長',
		'bio' => "１９７８年生まれ、つくば市出身。筑波大学大学院博士課程修了（国際政治経済学）。２００４年からつくば市議会議員２期。NPO法人つくばアグリチャレンジを設立し障害のあるスタッフが働く農場経営（現在代表退任）や、いがらしコーチングオフィス㈱代表取締役として経営層にコーチングも行う。２０１６年よりつくば市長。",
		'uploadtime' => '2020/06'
	),
	// array(
	// 	'id' => 25,
	// 	'imgname' => 'speaker_25.jpg',
	// 	'name' => '伊藤徳宇',
	// 	'jobtitle' => '桑名市長',
	// 	'bio' => "１９７６年生まれ、三重県桑名郡多度町（現桑名市）出身。早稲田大学政治経済学部卒業、株式会社フジテレビジョン入社。２００６年に桑名市議会議員選挙に立候補し当選。２０１０年には桑名市議会議員選挙に再度立候補し当選。２０１２年には桑名市長選挙に立候補し当選、桑名市長に就任。現在２期目。",
	//	'uploadtime' => '2020/06'
	// ),
	array(
		'id' => 26,
		'imgname' => 'speaker_26.jpg',
		'name' => '小野寺晃彦',
		'jobtitle' => '青森市長',
		'bio' => "",
		'uploadtime' => '2020/12',  //'2020/06',  '2020/11'
	),
);


?>
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri();?>/assets/code.css" media="screen,print">
<script>
	var person_list = [
<?php foreach($person_list as $person) : ?>
		{
			id: "<?php echo $person['id']; ?>",
			imgname: "<?php echo $person['imgname']; ?>",
			name: "<?php echo $person['name']; ?>",
			jobtitle: "<?php echo $person['jobtitle']; ?>",
			bio: "<?php echo $person['bio']; ?>",
			uploadtime: "<?php echo $person['uploadtime']; ?>"
		}, 
<?php endforeach; ?>
	];		
</script>
        <div data-barba="wrapper">
            <div data-barba="container" data-barba-namespace="page-top">
                <div class="topIndexArea topIndexAreaSlider">
					<a href="<?php echo get_site_url(); ?>/summit2021/entry" class="float-banner-second" id="float-banner-second">
					    事前エントリーは<br>こちら
                    </a>
                    <div class="event-titlediv second">
                        <img src="/wp/wp-content/uploads/2020/12/hero-banner-headline2.png">
                    </div>
                    <a href="https://netsui.or.jp/magazine" class="mail-register-second" style="display:none">
                            地方創生に取り組むベンチャー企業と自治体首長が一堂に集結！<br>
                            「地方創生のニューノーマルに必要なソリューションを見極める」
                    </a>
                    <section>
                        <div class="js-hksd c-hksd viewed">
                            <div class="c-hksd-frame">
                                <div class="c-hksd-slider" data-parallax="0.8">
                                    <div class="c-hksd-slider_inner">
                                        <div class="c-hksd-slider_slide active">
                                            <div class="c-hksd-slider_slide_inner">
                                                <figure>
                                                    <picture>
                                                        <source class="img" media="(max-width: 767px)" srcset="/wp/wp-content/uploads/2020/12/secondlp-hero-banner1.jpg">
                                                        <img class="js-rq-image objectFitImg01 img" src="/wp/wp-content/uploads/2020/12/secondlp-hero-banner1.jpg" alt="">
                                                    </picture>
                                                </figure>
                                            </div>
                                        </div>
                                        <div class="c-hksd-slider_slide">
                                            <div class="c-hksd-slider_slide_inner">
                                                <figure>
                                                    <picture>
                                                        <source class="img" media="(max-width: 767px)" srcset="/wp/wp-content/uploads/2020/12/secondlp-hero-banner2.jpg">
                                                        <img class="js-rq-image objectFitImg02 img" src="/wp/wp-content/uploads/2020/12/secondlp-hero-banner2.jpg" alt="">
                                                    </picture>
                                                </figure>
                                            </div>
                                        </div>
                                        <div class="c-hksd-slider_slide pre">
                                            <div class="c-hksd-slider_slide_inner">
                                                <figure>
                                                    <picture>
                                                        <source class="img" media="(max-width: 767px)" srcset="/wp/wp-content/uploads/2020/12/secondlp-hero-banner3.jpg">
                                                        <img class="js-rq-image objectFitImg03 img" src="/wp/wp-content/uploads/2020/12/secondlp-hero-banner3.jpg" alt="">
                                                    </picture>
                                                </figure>
                                            </div>
                                        </div>
                                        <div class="c-hksd-slider_slide pre">
                                            <div class="c-hksd-slider_slide_inner">
                                                <figure>
                                                    <picture>
                                                        <source class="img" media="(max-width: 767px)" srcset="/wp/wp-content/uploads/2020/12/secondlp-hero-banner4.jpg">
                                                        <img class="js-rq-image objectFitImg04 img" src="/wp/wp-content/uploads/2020/12/secondlp-hero-banner4.jpg" alt="">
                                                    </picture>
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="c-hksd_progress">
                                <div class="c-hksd-progress viewed">
                                    <div class="c-hksd-progress_bg"></div>
                                    <div class="c-hksd-progress_inner">
                                        <div class="c-hksd-progress_top">
                                            <div class="c-hksd-nomax">
                                                <div class="c-hksd-nomax_no"><span class="">01</span><span class="active">02</span><span class="">03</span><span>04</span></div>
                                            </div>
                                            <div class="c-hksd-progress_bars">
                                                <div class="c-hksd-progress_bar">
                                                    <div class="c-hksd-progress_bar_inner">
                                                        <div class="c-hksd-progress_bar_bg"></div>
                                                        <div class="c-hksd-progress_bar_line active"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="c-hksd-nomax">
                                                <div class="c-hksd-nomax_max"><span>01</span><span>02</span><span>03</span><span class="active">04</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
<div class="entry-content">
	<div class="lp-introduce second">
		<div class="inner">
			<p class="lp2-title">2021年2月27日開催決定</p>
			<p style="font-weight:bold; font-size:20px; margin-bottom:20px">
				地方創生に取り組むベンチャー企業と自治体首長が一堂に集結！<br>
                地方創生のニューノーマルに必要なソリューションを見極める」
			</p>
            <div class="desktop-content">
                <p>
                        地方創生の黎明期である第1期（2015年〜2019年）では、<br>
                        様々な事例が全国に生み出され就労環境などは大きく改善されました。<br>
                        ただ一方で、人口の東京一極集中に歯止めはかけられないまま、<br>
                        地方創生は第2期にそのステージを移しました。<br>
                        折しも、新型コロナウイルスの感染拡大により、新しい生活様式に基づく行動が求められ、<br>
                        自ずと地方創生のあり方も変わりつつあります。<br>
                        この状況下で、これまでと同じような事例を繰り返すのではなく、<br>
                        新しい生活様式をチャンスととらえ、<br>
                        それに適応した事例を生み出していく必要があります。<br>
                        改めて、高い熱量と新たなイノベーションを有するベンチャー企業が、<br>
                        地方創生で果たすべき役割に注目が集まっています。<br>
                        今回の地方創生ベンチャーサミットでは、<br>
                        <font color="#E10816">熱意ある地方創生ベンチャー連合の会員企業のソリューションが集結し、<br>
                        スタートアップ都市推進協議会加盟自治体の首長が課題テーマに即してフィードバックする、</font><br>
                        と言う今までにない企画を用意しました。<br>
                        ベンチャー企業のソリューションが、地方の現場でどうすれば受け入れられるのか、<br>
                        地域の課題解決にどうすれば繋がるのか、どのような事業であれば首長のハートをつかめるのか、<br>
                        などについて学ぶ機会を提供していきます。

                </p>
            </div>
            <div class="mobile-content">
                <p>
                        地方創生の黎明期である第1期<br>
                        （2015年〜2019年）では、<br>
                        様々な事例が全国に生み出され就労環境などは<br>
                        大きく改善されました。<br>
                        ただ一方で、人口の東京一極集中に<br>
                        歯止めはかけられないまま、<br>
                        地方創生は第2期にそのステージを移しました。<br>
                        折しも、新型コロナウイルスの感染拡大により、<br>
                        新しい生活様式に基づく行動が求められ、<br>
                        自ずと地方創生のあり方も変わりつつあります。<br>
                        この状況下で、<br>
                        これまでと同じような事例を繰り返すのではなく、<br>
                        新しい生活様式をチャンスととらえ、<br>
                        それに適応した事例を生み出していく必要があります。<br>
                        改めて、高い熱量と新たなイノベーションを<br>
                        有するベンチャー企業が、<br>
                        地方創生で果たすべき役割に<br>
                        注目が集まっています。<br>
                        今回の地方創生ベンチャーサミットでは、<br>
                        熱意ある地方創生ベンチャー連合の<br>
                        会員企業のソリューションが集結し、<br>
                        スタートアップ都市推進協議会加盟自治体の首長が<br>
                        課題テーマに即してフィードバックする、<br>
                        と言う今までにない企画を用意しました。<br>
                        ベンチャー企業のソリューションが、<br>
                        地方の現場でどうすれば受け入れられるのか、<br>
                        地域の課題解決にどうすれば繋がるのか、<br>
                        どのような事業であれば首長のハートをつかめるのか、<br>
                        などについて学ぶ機会を提供していきます。
                </p>
            </div>

			<div class="video-div" style="display:none">
                <video controls>
                    <source src="#" type="video/mp4">
                    Your browser does not support the video tag.
                </video>    
            </div>
			<p style="display: none"><a href="" class="online-register second">オンライン会場はこちら</a></p>
		</div>
    </div>
    <div class="lp-speakers second">
		<div class="inner">
    		<p class="lp2-title">Speaker</p>
			<div class="flex-container ">
<?php foreach($person_list as $person): ?>
				<div class="person-item second modal-toggle" person-id="<?php echo $person['id']; ?>">
					<div class="__thumb second">
						<img src="/wp/wp-content/uploads/<?php echo $person['uploadtime']; ?>/<?php echo $person['imgname']; ?>">
					</div>
					<p class="person-name second"><?php echo $person['name']; ?></p>
                    <p class="person-detail "><?php echo $person['jobtitle']; ?></p>
                    <div class="space-filler"></div>
                    <div class="person-profilediv"><a>Profile</a></div>
				</div>
<?php endforeach; ?>
				
			</div>
		</div>
    </div>
    <div style="text-align: center;
            padding-top: 60px;
            padding-bottom: 60px;
            font-size: 32px;
            background-color: #fff5d9;">
        登壇者は決定次第<br class="mobile-content">紹介していきます
    </div>
	<div class="member " style="display:none">
		<div class="inner ">
			<div class="member-banner ">
				<a href="https://www.asoview.co.jp/ " target="_blank " rel="noopener noreferrer "><img src="/wp/wp-content/uploads/2019/11/05-1.png "></a>
				<p>アソビュー<br> 株式会社
				</p>
			</div>
			<div class="member-banner ">
				<a href="http://www.lancers.co.jp/ " target="_blank " rel="noopener noreferrer "><img src="/wp/wp-content/uploads/2019/11/06.png "></a>
				<p>ランサーズ<br> 株式会社
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://www.renoveru.jp/corporate/ " target="_blank " rel="noopener noreferrer "><img src="/wp/wp-content/uploads/2019/11/54.png "></a>
				<p>リノベる<br> 株式会社
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://readyfor.jp/ " target="_blank " rel="noopener noreferrer "><img src="/wp/wp-content/uploads/2020/01/7c4e866123723e03ef075d660bf377c4.png "></a>
				<p>READYFOR<br> 株式会社
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://lifull.com/ " target="_blank " rel="noopener noreferrer "><img src="/wp/wp-content/uploads/2020/05/lifull.png "></a>
				<p>株式会社<br> LIFULL
				</p>
			</div>
			<div class="member-banner ">
				<a href="http://agri-hd.com/ " target="_blank " rel="noopener noreferrer "><img src="/wp/wp-content/uploads/2019/11/53.png "></a>
				<p>アグリホールディングス<br> 株式会社
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://agilehr.co.jp/ " target="_blank " rel="noopener noreferrer "><img src="/wp/wp-content/uploads/2020/04/AHR.jpg "></a>
				<p>株式会社<br> アジャイルHR
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://mdc-japan.org " target="_blank " rel="noopener noreferrer "><img src="/wp/wp-content/uploads/2019/11/84.png "></a>
				<p>一般社団法人日本医療<br> デザインセンター
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://in-fit.co.jp/ " target="_blank " rel="noopener noreferrer "><img src="/wp/wp-content/uploads/2019/11/75.jpg "></a>
				<p>株式会社<br> Infit
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://sb-ja.jp/ " target="_blank " rel="noopener noreferrer "><img src="/wp/wp-content/uploads/2020/01/1fb5df747a9ab94203aefbfe5b2f3a9e.png "></a>
				<p>エスビージャパン<br> 株式会社
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://www.lgbreakthrough.jp " target="_blank " rel="noopener noreferrer "><img src="/wp/wp-content/uploads/2019/11/86.jpg "></a>
				<p>株式会社<br> LGブレイクスルー
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://www.oisixdotdaichi.co.jp/ " target="_blank " rel="noopener noreferrer "><img src="/wp/wp-content/uploads/2019/11/31.jpg "></a>
				<p>オイシックス・ラ・大地<br> 株式会社
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://www.kaneto.jp " target="_blank " rel="noopener noreferrer "><img src="/wp/wp-content/uploads/2019/11/85.png "></a>
				<p>株式会社<br> カネト
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://www.kiramex.com/ " target="_blank " rel="noopener noreferrer "><img src="/wp/wp-content/uploads/2019/11/02-1.png "></a>
				<p>キラメックス<br> 株式会社
				</p>
			</div>
			<div class="member-banner ">
				<a href="http://www.gc-c.co.jp " target="_blank " rel="noopener noreferrer "><img src="/wp/wp-content/uploads/2020/04/goodcreate.jpg "></a>
				<p>株式会社<br> グッドクリエイト
				</p>
			</div>
			<div class="member-banner ">
				<a href="http://www.creema.co.jp/ " target="_blank " rel="noopener noreferrer "><img src="/wp/wp-content/uploads/2019/11/51.png "></a>
				<p>株式会社<br> クリーマ
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://www.gldaily.com/ " target="_blank " rel="noopener noreferrer "><img src="/wp/wp-content/uploads/2019/12/87.jpg "></a>
				<p>株式会社<br> グローバル・デイリー
				</p>
			</div>
			<div class="member-banner ">
				<a href="http://www.globiscapital.co.jp/ " target="_blank " rel="noopener noreferrer "><img src="/wp/wp-content/uploads/2019/11/21.png "></a>
				<p>株式会社グロービス・<br> キャピタル・パートナーズ
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://www.kddi.com/ " target="_blank " rel="noopener noreferrer "><img src="/wp/wp-content/uploads/2019/11/70.jpg "></a>
				<p>KDDI株式会社</p>
			</div>
			<div class="member-banner ">
				<a href="http://kotozna.com/ " target="_blank " rel="noopener noreferrer "><img src="/wp/wp-content/uploads/2019/11/69.png "></a>
				<p>Kotozna株式会社</p>
			</div>
			<div class="member-banner ">
				<a href="http://www.jigyonary.com " target="_blank " rel="noopener noreferrer "><img src="/wp/wp-content/uploads/2019/11/83.png "></a>
				<p>ジギョナリーカンパニー<br> 株式会社
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://sitateru.co.jp/ " target="_blank " rel="noopener noreferrer "><img src="/wp/wp-content/uploads/2019/11/73.png "></a>
				<p>シタテル<br> 株式会社
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://www.subak-tech.com/ " target="_blank " rel="noopener noreferrer "><img src="/wp/wp-content/uploads/2020/04/subak.png "></a>
				<p>株式会社<br> スバックテクノロジーズ
				</p>
			</div>
			<div class="member-banner ">
				<a href="http://spacemarket.co.jp/ " target="_blank " rel="noopener noreferrer "><img src="/wp/wp-content/uploads/2019/11/03-1.png "></a>
				<p>株式会社<br> スペースマーケット
				</p>
			</div>
			<div class="member-banner ">
				<a href="http://skyer.info/ " target="_blank " rel="noopener noreferrer "><img src="/wp/wp-content/uploads/2019/11/62.png "></a>
				<p>株式会社<br> skyer
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://zenkigen.co.jp/ " target="_blank " rel="noopener noreferrer "><img src="/wp/wp-content/uploads/2019/11/76.png "></a>
				<p>株式会社<br> ZENKIGEN
				</p>
			</div>
			<div class="member-banner ">
				<a href="http://chibra.co.jp/ " target="_blank " rel="noopener noreferrer "><img src="/wp/wp-content/uploads/2019/11/13.png "></a>
				<p>株式会社<br> 地域ブランディング 研究所
				</p>
			</div>
			<div class="member-banner ">
				<a href="http://www.toshin-seminar.co.jp/ " target="_blank " rel="noopener noreferrer "><img src="/wp/wp-content/uploads/2019/11/48.png "></a>
				<p>株式会社<br> 東進
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://trippiece.com/ " target="_blank " rel="noopener noreferrer "><img src="/wp/wp-content/uploads/2019/11/24.png "></a>
				<p>株式会社<br> trippiece
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://happylogue.com/ " target="_blank " rel="noopener noreferrer "><img src="/wp/wp-content/uploads/2019/11/65.jpg "></a>
				<p>ハピログ<br> 株式会社
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://prtimes.co.jp/ " target="_blank " rel="noopener noreferrer "><img src="/wp/wp-content/uploads/2019/11/77.png "></a>
				<p>株式会社<br> PRTIMES
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://pixta.co.jp/ " target="_blank " rel="noopener noreferrer "><img src="/wp/wp-content/uploads/2019/11/09.png "></a>
				<p>ピクスタ<br> 株式会社
				</p>
			</div>
			<div class="member-banner ">
				<a href="http://www.b-tm.co.jp/ " target="_blank " rel="noopener noreferrer "><img src="/wp/wp-content/uploads/2019/11/71.png "></a>
				<p>株式会社BTM</p>
			</div>
			<div class="member-banner ">
				<a href="http://www.bizreach.co.jp/ " target="_blank " rel="noopener noreferrer "><img src="/wp/wp-content/uploads/2019/11/19.png "></a>
				<p>株式会社<br> ビズリーチ
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://www.fukushim-a-live.com/ " target="_blank " rel="noopener noreferrer "><img src="/wp/wp-content/uploads/2019/11/68.png "></a>
				<p>株式会社<br> FGSM
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://fuller-inc.com " target="_blank " rel="noopener noreferrer "><img src="/wp/wp-content/uploads/2019/11/80.png "></a>
				<p>フラー<br> 株式会社
				</p>
			</div>
			<div class="member-banner ">
				<a href="http://peraichi.co.jp/ " target="_blank " rel="noopener noreferrer "><img src="/wp/wp-content/uploads/2019/11/59.png "></a>
				<p>株式会社<br> ペライチ
				</p>
			</div>
			<div class="member-banner ">
				<a href="http://www.zaigenkakuho.com/ " target="_blank " rel="noopener noreferrer "><img src="/wp/wp-content/uploads/2019/11/10.png "></a>
				<p>株式会社<br> ホープ
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://www.hallheart.co.jp/ " target="_blank " rel="noopener noreferrer "><img src="/wp/wp-content/uploads/2019/11/67.jpg "></a>
				<p>株式会社<br> ホールハート
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://minden.co.jp/ " target="_blank " rel="noopener noreferrer "><img src="/wp/wp-content/uploads/2019/11/74.jpg "></a>
				<p>みんな電力<br> 株式会社
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://komorebinook.jp/ " target="_blank " rel="noopener noreferrer "><img src="/wp/wp-content/uploads/2020/03/KOMOREBINOOK-logo2-e1584674334529.jpg "></a>
				<p>株式会社<br> むらやま建設
				</p>
			</div>
			<div class="member-banner ">
				<a href="http://meltingpot.tokyo/ " target="_blank " rel="noopener noreferrer "><img src="/wp/wp-content/uploads/2019/11/82.png "></a>
				<p>株式会社<br> MeltingPot
				</p>
			</div>
			<div class="member-banner ">
				<a href="http://47planning.jp/ " target="_blank " rel="noopener noreferrer "><img src="/wp/wp-content/uploads/2019/11/78.png "></a>
				<p>株式会社<br> 47PLANNING
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://lifeistech.co.jp/ " target="_blank " rel="noopener noreferrer "><img src="/wp/wp-content/uploads/2019/11/52.png "></a>
				<p>ライフイズテック<br> 株式会社
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://luup.sc/ " target="_blank " rel="noopener noreferrer "><img src="/wp/wp-content/uploads/2019/11/72.png "></a>
				<p>株式会社<br> LUUP
				</p>
			</div>
			<div class="member-banner ">
			</div>
			<div class="member-banner ">
			</div>
			<div class="member-banner ">
			</div>
			<div class="member-banner ">
			</div>
		</div>
	</div>
	<div class="lp-schedule " style="display:none">
		<div class="inner ">
			<div class="lp-sectiontitle ">
				<p class="background double "><span>タイムテーブル</span></p>
			</div>
			<div class="inner-container ">
				<div class="schedule-itemdiv flex-container ">
					<div class="schedule-left ">
						<p>11:30～12:00</p>
					</div>
					<div class="schedule-right ">
						<p class="schedule-title ">オープニング</p>
						<div class="scheduleperson-div flex-container ">
							<div class="scheduleperson-item modal-toggle" person-id="1">
								<div class="__thumb ">
									<img src="/wp/wp-content/uploads/2020/06/speaker_01.jpg ">
								</div>
							</div>
							<div class="scheduleperson-info ">
								<p class="scheduleperson-name ">山野智久</p>
								<p class="scheduleperson-detail ">（一社）熱意ある地方創生ベンチャー連合 共同代表理事 / アソビュー株式会社 代表取締役 CEO</p>
							</div>
						</div>
						<div class="scheduleperson-div flex-container ">
							<div class="scheduleperson-item modal-toggle" person-id="2">
								<div class="__thumb ">
									<img src="/wp/wp-content/uploads/2020/06/speaker_02.jpg ">
								</div>
							</div>
							<div class="scheduleperson-info ">
								<p class="scheduleperson-name ">秋好陽介</p>
								<p class="scheduleperson-detail ">（一社）熱意ある地方創生ベンチャー連合 共同代表理事 / ランサーズ株式会社 代表取締役CEO</p>
							</div>
						</div>
						<div class="scheduleperson-div flex-container ">
							<div class="scheduleperson-item modal-toggle" person-id="3">
								<div class="__thumb ">
									<img src="/wp/wp-content/uploads/2020/06/speaker_03.jpg ">
								</div>
							</div>
							<div class="scheduleperson-info ">
								<p class="scheduleperson-name ">高島宗一郎</p>
								<p class="scheduleperson-detail ">福岡市長</p>
							</div>
						</div>
					</div>
				</div>
				<div class="schedule-itemdiv flex-container ">
					<div class="schedule-left ">
						<p>12:00～13:00</p>
					</div>
					<div class="schedule-right ">
						<p class="schedule-title ">「防災×地方創生」で強靭なまちづくりを考える</p>
						<p class="schedule-detail ">災害時にまとめる臨時法令ではなく災害復興法の制定を訴える背景や、首長の能力の差によって市民の安全が左右されないように危機管理人材を進める思いを、現役大臣に語っていただく。また、コロナ禍という「災害時」において、全国トップクラスの対策と発信を行った福岡市長から現場での思いを語っていただく。加えて平時からの対策として、持続可能な「防災タウン」のビジョンや、ボランティアデータベースの構想、外国人向け災害時情報発信システムなどについても議論する。</p>
						<div class="scheduleperson-div flex-container ">
							<div class="scheduleperson-item modal-toggle" person-id="5">
								<div class="__thumb ">
									<img src="/wp/wp-content/uploads/2020/06/speaker_05.jpg ">
								</div>
							</div>
							<div class="scheduleperson-info ">
								<p class="scheduleperson-name ">森まさこ</p>
								<p class="scheduleperson-detail ">法務大臣</p>
							</div>
						</div>
						<div class="scheduleperson-div flex-container ">
							<div class="scheduleperson-item modal-toggle" person-id="3">
								<div class="__thumb ">
									<img src="/wp/wp-content/uploads/2020/06/speaker_03.jpg ">
								</div>
							</div>
							<div class="scheduleperson-info ">
								<p class="scheduleperson-name ">高島宗一郎</p>
								<p class="scheduleperson-detail ">福岡市長</p>
							</div>
						</div>
						<div class="scheduleperson-div flex-container ">
							<div class="scheduleperson-item modal-toggle" person-id="4">
								<div class="__thumb ">
									<img src="/wp/wp-content/uploads/2020/06/speaker_04.jpg ">
								</div>
							</div>
							<div class="scheduleperson-info ">
								<p class="scheduleperson-name ">米良はるか</p>
								<p class="scheduleperson-detail ">READYFOR株式会社 代表取締役 CEO</p>
							</div>
						</div>
					</div>
				</div>
				<div class="schedule-itemdiv flex-container ">
					<div class="schedule-left ">
						<p>13:00～14:00</p>
					</div>
					<div class="schedule-right ">
						<p class="schedule-title ">ポストコロナの地域観光のあるべき姿</p>
						<p class="schedule-detail ">新型コロナウイルスによって大打撃を受けた地域観光。しかし、体験チケットの先買い、特産品のふるさと納税での応援、デジタル通貨によるプレミアム商品券の発行などの対策を始める事業者や自治体が現れてきた。そうは言っても、ポストコロナの新しい体験観光のあり方やインバウンド旅行客の取り込み方法などの発想の転換が待たれるところ。さらに「Go To キャンペーン」など政府の支援の方向性やそのあるべき姿などについて、徹底的に議論していただく。</p>
						<div class="scheduleperson-div flex-container ">
							<div class="scheduleperson-item modal-toggle" person-id="18">
								<div class="__thumb ">
									<img src="/wp/wp-content/uploads/2020/06/speaker_18.jpg ">
								</div>
							</div>
							<div class="scheduleperson-info ">
								<p class="scheduleperson-name ">崎田恭平（ビデオ出演）</p>
								<p class="scheduleperson-detail ">日南市長</p>
							</div>
						</div>
						<div class="scheduleperson-div flex-container ">
							<div class="scheduleperson-item modal-toggle" person-id="7">
								<div class="__thumb ">
									<img src="/wp/wp-content/uploads/2020/06/speaker_07.jpg ">
								</div>
							</div>
							<div class="scheduleperson-info ">
								<p class="scheduleperson-name ">仲川げん</p>
								<p class="scheduleperson-detail ">奈良市長</p>
							</div>
						</div>
						<div class="scheduleperson-div flex-container ">
							<div class="scheduleperson-item modal-toggle" person-id="8">
								<div class="__thumb ">
									<img src="/wp/wp-content/uploads/2020/06/speaker_08.jpg ">
								</div>
							</div>
							<div class="scheduleperson-info ">
								<p class="scheduleperson-name ">湯崎英彦</p>
								<p class="scheduleperson-detail ">広島県知事</p>
							</div>
						</div>
						<div class="scheduleperson-div flex-container ">
							<div class="scheduleperson-item modal-toggle" person-id="1">
								<div class="__thumb ">
									<img src="/wp/wp-content/uploads/2020/06/speaker_01.jpg ">
								</div>
							</div>
							<div class="scheduleperson-info ">
								<p class="scheduleperson-name ">山野智久</p>
								<p class="scheduleperson-detail ">（一社）熱意ある地方創生ベンチャー連合 共同代表理事 / アソビュー株式会社 代表取締役 CEO</p>
							</div>
						</div>
					</div>

				</div>
				<div class="schedule-itemdiv flex-container ">
					<div class="schedule-left ">
						<p>14:00～15:00</p>
					</div>
					<div class="schedule-right ">
						<p class="schedule-title ">withコロナ時代のアートの地方創生の可能性</p>
						<p class="schedule-detail ">新型コロナウイルスの感染拡大によって、観客が密集する芸術や密閉空間での作品展示などが軒並み中止になった。一方、ドイツのモニカ・グリュッタース文化相は「アーティストは今、生命維持に必要不可欠な存在」と断言。大きな話題になった。芸術祭や文化系大学によるまちづくりなどを進めてきた自治体が指し示すべき次のステージの姿は何か、地域社会における文化の果たすべき役割は何か、その形を探っていく。</p>
						<div class="scheduleperson-div flex-container ">
							<div class="scheduleperson-item modal-toggle" person-id="12">
								<div class="__thumb ">
									<img src="/wp/wp-content/uploads/2020/06/speaker_12.jpg ">
								</div>
							</div>
							<div class="scheduleperson-info ">
								<p class="scheduleperson-name ">鈴木康友（ビデオ出演）</p>
								<p class="scheduleperson-detail ">浜松市長</p>
							</div>
						</div>
						<div class="scheduleperson-div flex-container ">
							<div class="scheduleperson-item modal-toggle" person-id="10">
								<div class="__thumb ">
									<img src="/wp/wp-content/uploads/2020/06/speaker_10.jpg ">
								</div>
							</div>
							<div class="scheduleperson-info ">
								<p class="scheduleperson-name ">津田大介</p>
								<p class="scheduleperson-detail ">ジャーナリスト／メディア・アクティビスト</p>
							</div>
						</div>
						<div class="scheduleperson-div flex-container ">
							<div class="scheduleperson-item modal-toggle" person-id="11">
								<div class="__thumb ">
									<img src="/wp/wp-content/uploads/2020/06/speaker_11.jpg ">
								</div>
							</div>
							<div class="scheduleperson-info ">
								<p class="scheduleperson-name ">鈴木英敬</p>
								<p class="scheduleperson-detail ">三重県知事</p>
							</div>
						</div>
						<div class="scheduleperson-div flex-container ">
							<div class="scheduleperson-item modal-toggle" person-id="9">
								<div class="__thumb ">
									<img src="/wp/wp-content/uploads/2020/06/speaker_09.jpg ">
								</div>
							</div>
							<div class="scheduleperson-info ">
								<p class="scheduleperson-name ">太田直樹</p>
								<p class="scheduleperson-detail ">株式会社NewStories代表・総務省政策アドバイザー</p>
							</div>
						</div>
					</div>
				</div>
				<div class="schedule-itemdiv flex-container ">
					<div class="schedule-left ">
						<p>15:10～16:10</p>
					</div>
					<div class="schedule-right ">
						<p class="schedule-title ">withコロナ時代のスポーツの地方創生の可能性</p>
						<p class="schedule-detail ">沖縄県の社会人３部リーグから、J2まで駆け上がった琉球FC。クラブのミッションに「地方創生のさきがけモデルをつくる」と宣言する茨城ロボッツを有する水戸市。こうした事例を中心に、スポーツｘ地方創生を読み解く。またwithコロナの時代に、スポーツを地域で持続可能なものにするための、官民連携のあるべき姿を提言していただく。そして、東京オリンピック・パラリンピック延期をチャンスと捉える仕掛けについて、学ぶ機会を設計する。</p>
						<div class="scheduleperson-div flex-container ">
							<div class="scheduleperson-item modal-toggle" person-id="12">
								<div class="__thumb ">
									<img src="/wp/wp-content/uploads/2020/06/speaker_12.jpg ">
								</div>
							</div>
							<div class="scheduleperson-info ">
								<p class="scheduleperson-name ">鈴木康友（ビデオ出演）</p>
								<p class="scheduleperson-detail ">浜松市長</p>
							</div>
						</div>
						<div class="scheduleperson-div flex-container ">
							<div class="scheduleperson-item modal-toggle" person-id="13">
								<div class="__thumb ">
									<img src="/wp/wp-content/uploads/2020/06/speaker_13.jpg ">
								</div>
							</div>
							<div class="scheduleperson-info ">
								<p class="scheduleperson-name ">倉林啓士郎</p>
								<p class="scheduleperson-detail ">FC琉球 取締役会長</p>
							</div>
						</div>
						<div class="scheduleperson-div flex-container ">
							<div class="scheduleperson-item modal-toggle" person-id="14">
								<div class="__thumb ">
									<img src="/wp/wp-content/uploads/2020/06/speaker_14.jpg ">
								</div>
							</div>
							<div class="scheduleperson-info ">
								<p class="scheduleperson-name ">高橋靖</p>
								<p class="scheduleperson-detail ">水戸市長</p>
							</div>
						</div>
						<div class="scheduleperson-div flex-container ">
							<div class="scheduleperson-item modal-toggle" person-id="2">
								<div class="__thumb ">
									<img src="/wp/wp-content/uploads/2020/06/speaker_02.jpg ">
								</div>
							</div>
							<div class="scheduleperson-info ">
								<p class="scheduleperson-name ">秋好陽介</p>
								<p class="scheduleperson-detail ">（一社）熱意ある地方創生ベンチャー連合 共同代表理事 / ランサーズ株式会社 代表取締役CEO</p>
							</div>
						</div>
					</div>
				</div>
				<div class="schedule-itemdiv flex-container ">
					<div class="schedule-left ">
						<p>16:10～17:10</p>
					</div>
					<div class="schedule-right ">
						<p class="schedule-title ">ハコモノをイキモノに変えていく遊休資産活用術</p>
						<p class="schedule-detail ">高度成長期に作られてきた公共施設が、人口減少社会でどのように適正配置されるべきか、各自治体でファシリティマネジメントの計画づくりが急がれている。またデベロッパーは「ハコモノを建てる」のではなく、建築物をまちづくりの中に息づく「イキモノ」にしていけるかが、問われている。千葉市では「資産経営基本方針」「公共施設等総合管理計画」「個別施設計画」と、明確に計画行政の中に位置づけながら、民間活用の手法などを検討している。また、NTTでは旧京都中央電話局や旧清水小学校等などをはじめとする、遊休資産活用（廃校利用・歴史的建築物活用）などの多くの好事例をストックしている。こうした取り組みを紹介しつつ、そのあり方を追求する。</p>
						<div class="scheduleperson-div flex-container ">
							<div class="scheduleperson-item modal-toggle" person-id="16">
								<div class="__thumb ">
									<img src="/wp/wp-content/uploads/2020/06/speaker_16.jpg ">
								</div>
							</div>
							<div class="scheduleperson-info ">
								<p class="scheduleperson-name ">楠本正幸</p>
								<p class="scheduleperson-detail ">NTTアーバンソリューションズ株式会社 取締役副社長／NTT都市開発株式会社 代表取締役副社長</p>
							</div>
						</div>
						<div class="scheduleperson-div flex-container ">
							<div class="scheduleperson-item modal-toggle" person-id="17">
								<div class="__thumb ">
									<img src="/wp/wp-content/uploads/2020/06/speaker_17.jpg ">
								</div>
							</div>
							<div class="scheduleperson-info ">
								<p class="scheduleperson-name ">熊谷俊人</p>
								<p class="scheduleperson-detail ">千葉市長</p>
							</div>
						</div>
						<div class="scheduleperson-div flex-container ">
							<div class="scheduleperson-item modal-toggle" person-id="15">
								<div class="__thumb ">
									<img src="/wp/wp-content/uploads/2020/06/speaker_15.jpg ">
								</div>
							</div>
							<div class="scheduleperson-info ">
								<p class="scheduleperson-name ">重松大輔</p>
								<p class="scheduleperson-detail ">株式会社スペースマーケット 代表取締役CEO</p>
							</div>
						</div>
					</div>

				</div>
				<div class="schedule-itemdiv flex-container ">
					<div class="schedule-left ">
						<p>17:10～18:10</p>
					</div>
					<div class="schedule-right ">
						<p class="schedule-title ">ポストコロナ時代に暮らし方・働き方を再考する</p>
						<p class="schedule-detail ">地方創生の第１期の５年間、住む人も企業もますます東京一極集中が進む結果になってしまった。その結果、新型コロナウイルスのクラスターが大量発生し、感染爆発や医療崩壊のリスクも集中した。今こそ地方での暮らしや働き方を考え直すべき時代に、ビフォーコロナから下田・会津磐梯や遠野で、コミュニティーづくりから取り組んできた２つの「志」と、APUや温泉といった地域資源を存分に活用する別府市の取り組みに耳を傾ける。</p>
						<div class="scheduleperson-div flex-container ">
							<div class="scheduleperson-item modal-toggle" person-id="18">
								<div class="__thumb ">
									<img src="/wp/wp-content/uploads/2020/06/speaker_18.jpg ">
								</div>
							</div>
							<div class="scheduleperson-info ">
								<p class="scheduleperson-name ">崎田恭平（ビデオ出演）</p>
								<p class="scheduleperson-detail ">日南市長</p>
							</div>
						</div>
						<div class="scheduleperson-div flex-container ">
							<div class="scheduleperson-item modal-toggle" person-id="20">
								<div class="__thumb ">
									<img src="/wp/wp-content/uploads/2020/06/speaker_20.jpg ">
								</div>
							</div>
							<div class="scheduleperson-info ">
								<p class="scheduleperson-name ">井上高志</p>
								<p class="scheduleperson-detail ">株式会社LIFULL 代表取締役社長</p>
							</div>
						</div>
						<div class="scheduleperson-div flex-container ">
							<div class="scheduleperson-item modal-toggle" person-id="21">
								<div class="__thumb ">
									<img src="/wp/wp-content/uploads/2020/06/speaker_21.jpg ">
								</div>
							</div>
							<div class="scheduleperson-info ">
								<p class="scheduleperson-name ">長野恭紘</p>
								<p class="scheduleperson-detail ">別府市長</p>
							</div>
						</div>
						<div class="scheduleperson-div flex-container ">
							<div class="scheduleperson-item modal-toggle" person-id="19">
								<div class="__thumb ">
									<img src="/wp/wp-content/uploads/2020/06/speaker_19.jpg ">
								</div>
							</div>
							<div class="scheduleperson-info ">
								<p class="scheduleperson-name ">林篤志</p>
								<p class="scheduleperson-detail ">Next Commons Lab 代表</p>
							</div>
						</div>
					</div>
				</div>
				<div class="schedule-itemdiv flex-container ">
					<div class="schedule-left ">
						<p>18:10～19:10</p>
					</div>
					<div class="schedule-right ">
						<p class="schedule-title ">都市近郊の地方創生の『これから』を考える</p>
						<p class="schedule-detail ">「ベッドタウン」、満員電車、文化住宅、集合団地など、特色のないイメージの強かった「都市近郊」が、変わり始めている。首長の危機感とリーダーシップによって、違いが生まれ始めている。特に、地方の過疎化などの文脈で語られがちな「地方創生」も、実は都市近郊でもさまざまな取り組みがなされている。特に国の「地方創生交付金」や新型コロナウイルス対策として設けられた「地方創生臨時交付金」の使い道を中心に、都市近郊の可能性を探る。</p>
						<div class="scheduleperson-div flex-container ">
							<div class="scheduleperson-item modal-toggle" person-id="23">
								<div class="__thumb ">
									<img src="/wp/wp-content/uploads/2020/06/speaker_23.jpg ">
								</div>
							</div>
							<div class="scheduleperson-info ">
								<p class="scheduleperson-name ">東修平</p>
								<p class="scheduleperson-detail ">四條畷市長</p>
							</div>
						</div>
						<div class="scheduleperson-div flex-container ">
							<div class="scheduleperson-item modal-toggle" person-id="24">
								<div class="__thumb ">
									<img src="/wp/wp-content/uploads/2020/06/speaker_24.jpg ">
								</div>
							</div>
							<div class="scheduleperson-info ">
								<p class="scheduleperson-name ">五十嵐立青</p>
								<p class="scheduleperson-detail ">つくば市長</p>
							</div>
						</div>
						<div class="scheduleperson-div flex-container modal-toggle" person-id="25">
							<div class="scheduleperson-item ">
								<div class="__thumb ">
									<img src="/wp/wp-content/uploads/2020/06/speaker_25.jpg ">
								</div>
							</div>
							<div class="scheduleperson-info ">
								<p class="scheduleperson-name ">伊藤徳宇</p>
								<p class="scheduleperson-detail ">桑名市長</p>
							</div>
						</div>
					</div>
				</div>
				<div class="schedule-itemdiv flex-container ">
					<div class="schedule-left ">
						<p>19:10～19:20</p>
					</div>
					<div class="schedule-right ">
						<p class="schedule-title ">クロージング</p>
						<div class="scheduleperson-div flex-container">
							<div class="scheduleperson-item  modal-toggle" person-id="22">
								<div class="__thumb ">
									<img src="/wp/wp-content/uploads/2020/06/speaker_22.jpg ">
								</div>
							</div>
							<div class="scheduleperson-info ">
								<p class="scheduleperson-name">吉田雄人</p>
								<p class="scheduleperson-detail ">一般社団法人熱意ある地方創生ベンチャー連合事務局長</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="lp-sponsor " style="display:none">
		<div class="inner ">
			<div class="lp-sectiontitle ">
				<p class="background double "><span>ゴールドスポンサー</span></p>
			</div>
			<div class="flex-container ">
				<div class="lpsponsor-item ">
					<a href="https://www.kddi.com/ " target="_blank " rel="noopener noreferrer "><img src="/wp/wp-content/uploads/2020/06/lplogo-kddi.png "></a>
				</div>
			</div>
		</div>
	</div>
	<div class="lp-sponsor " style="display:none">
		<div class="inner ">
			<div class="lp-sectiontitle ">
				<p class="background double "><span>レギュラースポンサー</span></p>
			</div>
			<div class="flex-container ">
				<div class="lpsponsor-item ">
					<a href="https://aws.amazon.com/jp/ " target="_blank " rel="noopener noreferrer ">アマゾン<br>ウェブサービスジャパン<br>株式会社</a>
				</div>
				<div class="lpsponsor-item ">
					<a href="https://prtimes.jp/ " target="_blank " rel="noopener noreferrer "><img src="/wp/wp-content/uploads/2020/06/lplogo-prtimes.png "></a>
				</div>
				<div class="lpsponsor-item ">
					<a href="https://www.zaigenkakuho.com/ " target="_blank " rel="noopener noreferrer "><img src="/wp/wp-content/uploads/2020/06/lplogo-hopeinc.png "></a>
				</div>
				<div class="lpsponsor-item ">
					<a href="https://lifull.com/ " target="_blank " rel="noopener noreferrer "><img src="/wp/wp-content/uploads/2020/06/lplogo-lifull.png "></a>
				</div>

			</div>
		</div>
	</div>
	<div class="lp-hosting">
		<div class="inner ">
			<div class="lp-sectiontitle ">
				<p class="background double"><span>共催</span></p>
			</div>
		</div>
		<div class="hosting-item">
			<a href="http://startup-toshi.com/" target="_blank" rel="noopener noreferrer"><img src="/wp/wp-content/uploads/2019/11/Mask-Group-39.png"></a>
		</div>
	</div>
</div>
<div class="modal">
	<div class="modal-overlay modal-toggle"></div>
	<div class="modal-wrapper modal-transition">
		<div class="modal-header">
			<button class="modal-close modal-toggle"><a>&#10006;</a></button>
			<h2 class="modal-heading">登壇者プロフィール</h2>
		</div>
		<div class="modal-body" style="padding: 16px;">
			<p class="messagep" id="msgbody"></p>
		</div>
	</div>
</div>
    <script src="<?php echo get_stylesheet_directory_uri();?>/assets/jquery.min.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri();?>/assets/anime.min.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri();?>/assets/ofi.min.js"></script>

    <script src="<?php echo get_stylesheet_directory_uri();?>/assets/bundle.js"></script>
<?php get_footer(); ?>