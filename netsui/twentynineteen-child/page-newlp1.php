<?php get_header(); ?>
<?php 
/*constants*/
$uploads_path = "/worktest/netsui2/wp-content/uploads";
$uploads_path = "/wp/wp-content/uploads";
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
		'bio' =>  "1974年11月生まれ。<br>アナウンサー生活を経て2010年に史上最年少の36歳で福岡市長に就任。<br>2014年、2018年いずれも史上最多得票で再選し、現在３期目。<br>国家戦略特区を活用し、スタートアップビザをはじめとする規制緩和や制度改革を実現。数々の施策でムーブメントを生み出し、日本のスタートアップシーンを力強く牽引する。<br>また、日本の市長として初めて世界経済フォーラム（ダボス会議）に出席。",
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
		'bio' => "1974年生まれ。経済産業省時代に一円起業やジョブカフェなどを手掛ける。３６歳（歴代２番目の若さ）で三重県知事に当選し、現在３期目。伊勢志摩サミットの誘致を牽引し、「オール三重」で無事かつ成功裏に完遂。現在、全国知事会の地方創生対策本部長や国の高度情報通信ネットワーク社会推進戦略本部委員なども務める。家族は五輪メダリストの妻・武田美保と一男一女。現職知事として初めて第一子、第二子とも育休を取得。",
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
		'bio' =>  "大分県別府市生まれの別府育ち。<br>代議士秘書、別府市議会議員を経て、2015年、最年少（40歳）別府市長として当選。<br>現在は、別府市で戦後初の無投票という市民からの期待を背負い2期目を担う。<br>「起業・創業等の推進」、「人財育成」、「ヒト・企業とのつながり強化」の３つを柱とした『別府ツーリズムバレー構想』を掲げ、観光産業や宇宙産業・サービス業の産学集積としての基盤強化となるように力を注いでいる。",
		'uploadtime' => '2020/06'
	),
	array(
		'id' => 22,
		'imgname' => 'speaker_22.jpg',
		'name' => '吉田雄人',
		'jobtitle' => '一般社団法人熱意ある地方創生ベンチャー連合事務局長',
		'bio' => '1975年生まれ。早稲田大学政治経済学部を卒業後、アクセンチュアにて3年弱勤務。退職後、早稲田大学大学院（政治学修士）に通いながら、2003年の横須賀市議会議員選挙に立候補し、初当選。2009年の横須賀市長選挙で初当選し、2013年に再選。2017年7月に退任するまで、完全無所属を貫いた。現在、地域課題解決のためには良質で戦略的な官民連携手法である日本版GR：ガバメント・リレーションズが必要であるという考え方の元、Glocal Government Relationz株式会社を設立。熱意ある地方創生ベンチャー連合の事務局長に2019年1月に就任、現在に至る。',
		'uploadtime' => '2020/06'
	),
	array(
		'id' => 23,
		'imgname' => 'speaker_23.jpg',
		'name' => '東修平',
		'jobtitle' => '四條畷市長',
		'bio' => "1988年大阪府四條畷市生まれ。京都大学卒業、同大学院修士課程修了（原子核工学）。外務省、野村総合研究所インドを経て、2017年1月、四條畷市長に初当選。現役最年少市長となる。民間出身のママ副市長とともに、日本一前向きな市役所を掲げ、就任直後より公民連携施策を多数展開。11年ぶりの人口増加を達成する。",
		'uploadtime' => '2020/06'
	),
	array(
		'id' => 24,
		'imgname' => 'speaker_24.jpg',
		'name' => '五十嵐立青',
		'jobtitle' => 'つくば市長',
		'bio' => "１９７８年生まれ、つくば市出身。筑波大学大学院博士課程修了（国際政治経済学）。２００４年からつくば市議会議員２期。NPO法人つくばアグリチャレンジを設立し障害のあるスタッフが働く農場経営（現在代表退任）や、いがらしコーチングオフィス㈱代表取締役として経営層にコーチングも行う。２０１６年よりつくば市長。現在２期目。",
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
		'bio' => "１９７５年７月生まれ。青森市出身。総務省地域政策課理事官等を経て、２０１６年１１月、青森市長に就任。２０２０年１１月に再選し、現在２期目。青森駅前に設置したビジネス支援拠点「ＡＯＭＯＲＩ　ＳＴＡＲＴＵＰ　ＣＥＮＴＥＲ」を中心に、起業・創業支援のほか、チャレンジマインドの醸成に向けた「あおもりスタートアップ支援セミナー（あお☆スタ）」等、複数の事業を連携した「新ビジネス挑戦支援プロジェクト」を実施。",
		'uploadtime' => '2020/12',  //'2020/06',  '2020/11'
	),
	array(
		'id' => 27,
		'imgname' => 'speaker_27.jpg',
		'name' => '坂本哲志',
		'jobtitle' => '一億総活躍担当　まち・ひと・しごと創生担当　大臣 内閣府特命担当大臣（少子化対策　地方創生）',
		'bio' => '生年月日：昭和25年11月６日<br>出身地：熊本県<br>昭和50年　　　中央大学法学部政治学科卒業 <br>昭和50年～平成２年　 熊本日日新聞社記者<br>平成３年～平成15年　 熊本県議会議員（４期）<br> 平成15年～平成17年　衆議院議員（１期）<br>平成19年～　　　　　 衆議院議員（２～６期）<br>平成20年～平成21年　総務大臣政務官<br>平成24年～平成25年　総務副大臣兼内閣府副大臣<br>平成25年～平成26年　衆議院　農林水産委員長<br>平成28年～平成29年　衆議院　総務委員会筆頭理事<br> 令和元年～令和２年　  衆議院　予算委員会筆頭理事<br>令和２年９月～　　　一億総活躍担当まち・ひと・しごと創生担当<br>内閣府特命担当大臣（少子化対策、地方創生）（菅内閣）',
		'uploadtime' => '2021/01',  //'2020/06',  '2020/11'
	),
	array(
		'id' => 28,
		'imgname' => 'speaker_26.jpg',
		'name' => '松丘啓司',
		'jobtitle' => '代表取締役社長',
		'bio' => "1986年 東京大学法学部卒業。<br>アクセンチュア入社<br>1992年 人と組織の変革を支援するチェンジマネジメントサービスの立ち上げに参画。以後、一貫して人材・組織変革のコンサルティングに従事<br>1997年 同社パートナー昇進。以後、ヒューマンパフォーマンスサービスライン統括パートナー、エグゼクティブコミッティメンバーを歴任<br>2005年 企業の人材・組織変革を支援するエム・アイ・アソシエイツ（株）を設立し、代表取締役に就任（現任）<br>2018年 パフォーマンスマネジメントを支援するスマートフォンアプリ「1on1navi」をリリース後、（株）アジャイルHRを設立し代表取締役に就任し、日本企業のパフォーマンスマネジメント変革の支援をミッションとして活動中<br>著書は多数に上るが、「1on1マネジメント」（2018年）はピープルマネジメントの教科書として多くの企業で活用されている。「人事評価はもういらない」（2016年）は人事だけでなく一般の読者にも広く読まれベストセラーとなった。",
		'uploadtime' => '2020/12',  //'2020/06',  '2020/11'
	),
);
function person_by_id($id) {
	global $person_list;
	foreach($person_list as $person) {
		if($person['id'] == $id) return $person;
	}
	return $person_list[0];
}
$schedule_list = array(
	array(
		'time' => '11:00〜11:20',
		'title' => 'オープニング',
		'content' => '熱意ある地方創生ベンチャー連合の活動紹介<br>スタートアップ都市推進協議会の活動紹介',
		'header' => array(3),
		'speakers' => array(1,2),
		'header_names' => array(),
		'speaker_names' => array(),
	 ),
	array(
		'time' => '11:30〜12:00',
		'title' => '基調講演',
		'content' => '「今後の地方創生の展望」「ベンチャー企業をはじめとした民間企業や地方自治体に期待する役割」等について、地方創生を担当する坂本内閣府特命担当大臣に基調講演いただく。',
		'header' => array(27),
		'speakers' => array(),
		'header_names' => array(),
		'speaker_names' => array(),
	 ),
	 array(
		'time' => '12:10〜13:00',
		'title' => '「関係人口」',
		'content' => '少子化や都心への流出の結果として地方の人口減少が進む中、期待されているのが「関係人口」の創出である。「一見さん」の観光客ではなく、何らかの形態で地域に関わる人が増えてきている。また新型コロナウイルス感染拡大を横目にオンライン視察ツアーやガバメントクラウドファンディングなど、地域との新しい関わり方をベンチャー企業が提供するようになった。有権者・納税者ではない「関係人口」の創出というテーマに、自治体のリーダーは何を考え、どのようなソリューションを望むのか。温泉の町を沸かすような長野別府市長との議論を刮目して欲しい。',
		'header' => array(21),
		'speakers' => array(),
		'header_names' => array(),
		'speaker_names' => array(),
	 ),
	array(
		'time' => '13:10〜14:00',
		'title' => '「人材育成」',
		'content' => '人口減少が進む中で、地域内での人材不足が懸念されている。大学進学で離れた人材が戻って来ず、地域企業の事業の継続が困難になるなどの課題が表面化している。一方で、Society5.0時代に向けたGIGAスクール構想は、コロナ禍でより加速化した推進が求められている。その結果として、プログラミングなどを活用した新しい事業を若い世代が作り上げることも容易になった。外部人材の活用がしやすい環境も整えられつつある。地方創生の人材をどこに求めていくのか。やらまいか精神溢れる鈴木浜松市長の反応を見る。',
		'header' => array(12),
		'speakers' => array(),
		'header_names' => array(),
		'speaker_names' => array(),
	 ),
	array(
		'time' => '14:10〜15:00',
		'title' => '「働き方」',
		'content' => '新型コロナウイルス感染拡大の影響で、「テレワーク」「ワーケーション」といった働き方が広がっている。また、公務員も含めて兼業・副業が幅広く認められるような労働環境が整備されつつある。都心で働く企業戦士が、地域課題解決の請負人になることもありえない話ではなくなってきている。このような働き方を導入する企業が増え、企業移住を促進する自治体も増えていくと考えられる。新型コロナウイルス感染拡大前から、働き方改革のソリューションを開発しているベンチャー企業が、今年５月から民間人となる崎田日南市長の声を聞く。',
		'header' => array(18),
		'speakers' => array(),
		'header_names' => array(),
		'speaker_names' => array(),
	 ),
	 array(
		'time' => '15:10〜16:00',
		'title' => '「都市／交通計画」',
		'content' => '新型コロナウイルスの感染拡大により求められている新しい生活様式（ニューノーマル）は、定義が定まっているようでいて、未だ曖昧なところもある。特に、都市のあり方、建物・施設の姿、公共交通の方法など、既存のハードやインフラ面での「新しさ」はまだ見えてきていない。一方で、「MaaS」と呼ばれるモビリティの活用や、ハードのリノベーションという手法、デザインによる革新、ドローンの活用など、ベンチャースピリットが活きてくるフィールドでもある。空飛ぶ車などを他の自治体に先んじて検討する三重県知事の胸を借りる。',
		'header' => array(11),
		'speakers' => array(),
		'header_names' => array(),
		'speaker_names' => array(),
	 ),
	 array(
		'time' => '16:10〜17:00',
		'title' => '「自治体DX」',
		'content' => '2020年には新型コロナウイルス感染拡大により、国や各自治体からは様々な支援施策が実施される中、課題が浮き彫りとなったのは、行政手続きの遅れや連携不足であった。新たに発足した菅内閣では、デジタル庁の新設に向けて動き出し、各行政機関がシームレスにつながることが期待されている。地方自治体におけるデジタル化、いわゆる自治体DXの推進に貢献するベンチャー企業のソリューションも枚挙にいとまがない。そこで、全国で初めてRPAを導入した五十嵐つくば市長と、今後求められる行政サービスについて展望する。',
		'header' => array(24),
		'speakers' => array(),
		'header_names' => array(),
		'speaker_names' => array(),
	 ),
	 array(
		'time' => '17:10〜18:00',
		'title' => '「創業支援」',
		'content' => '近年、各自治体で地域発スタートアップを輩出するための支援施策が数多く繰り出されている。しかし他の先進諸国に比べて起業数が低い水準が続いている。スモールビジネス・コミュニティビジネスなどの創業支援も含めて、まさに「産官学金労言」の連携が求められる地域全体の課題である。人材・資金・ネットワーキング・PRなど様々な観点からベンチャーのリソースも活用していくことができるフィールドでもある。「あお★スタピッチ交流会」の開催などで勇名を馳せる小野寺青森市長とともに考える。',
		'header' => array(26),
		'speakers' => array(),
		'header_names' => array(),
		'speaker_names' => array(),
	 ),
	 array(
		'time' => '18:00〜18:10',
		'title' => 'クロージング',
		'content' => '',
		'header' => array(),
		'speakers' => array(22),
		'header_names' => array(),
		'speaker_names' => array(),
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
                        <img src="<?php echo $uploads_path; ?>/2020/12/hero-banner-headline2.png">
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
                                                        <source class="img" media="(max-width: 767px)" srcset="<?php echo $uploads_path; ?>/2020/12/secondlp-hero-banner1.jpg">
                                                        <img class="js-rq-image objectFitImg01 img" src="<?php echo $uploads_path; ?>/2020/12/secondlp-hero-banner1.jpg" alt="">
                                                    </picture>
                                                </figure>
                                            </div>
                                        </div>
                                        <div class="c-hksd-slider_slide">
                                            <div class="c-hksd-slider_slide_inner">
                                                <figure>
                                                    <picture>
                                                        <source class="img" media="(max-width: 767px)" srcset="<?php echo $uploads_path; ?>/2020/12/secondlp-hero-banner2.jpg">
                                                        <img class="js-rq-image objectFitImg02 img" src="<?php echo $uploads_path; ?>/2020/12/secondlp-hero-banner2.jpg" alt="">
                                                    </picture>
                                                </figure>
                                            </div>
                                        </div>
                                        <div class="c-hksd-slider_slide pre">
                                            <div class="c-hksd-slider_slide_inner">
                                                <figure>
                                                    <picture>
                                                        <source class="img" media="(max-width: 767px)" srcset="<?php echo $uploads_path; ?>/2020/12/secondlp-hero-banner3.jpg">
                                                        <img class="js-rq-image objectFitImg03 img" src="<?php echo $uploads_path; ?>/2020/12/secondlp-hero-banner3.jpg" alt="">
                                                    </picture>
                                                </figure>
                                            </div>
                                        </div>
                                        <div class="c-hksd-slider_slide pre">
                                            <div class="c-hksd-slider_slide_inner">
                                                <figure>
                                                    <picture>
                                                        <source class="img" media="(max-width: 767px)" srcset="<?php echo $uploads_path; ?>/2020/12/secondlp-hero-banner4.jpg">
                                                        <img class="js-rq-image objectFitImg04 img" src="<?php echo $uploads_path; ?>/2020/12/secondlp-hero-banner4.jpg" alt="">
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

			<div class="video-div">
                <video controls>
                    <source src="<?php echo $uploads_path; ?>/2021/01/lpsecond.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>    
            </div>
			<p style="display: none"><a href="" class="online-register second">オンライン会場はこちら</a></p>
		</div>
    </div>
    <div class="lp-speakers second" style="display:none">
		<div class="inner">
    		<p class="lp2-title">Speaker</p>
			<div class="flex-container ">
<?php foreach($person_list as $person): ?>
				<div class="person-item second modal-toggle" person-id="<?php echo $person['id']; ?>">
					<div class="__thumb second">
						<img src="<?php echo $uploads_path; ?>/<?php echo $person['uploadtime']; ?>/<?php echo $person['imgname']; ?>">
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
    <div style="text-align: center; display: none;
            padding-top: 60px;
            padding-bottom: 60px;
            font-size: 32px;
            background-color: #fff5d9;">
        登壇者は決定次第<br class="mobile-content">紹介していきます
    </div>
	<div class="lp-schedule second">
		<div class="inner ">
			<div style="title-div">
				<p class="lp2-title">タイムテーブル</p>
			</div>
<?php foreach($schedule_list as $schedule): ?>
			<div class="schedule-container">
				<div class="schedule-title-second"><?php echo $schedule['title']; ?></div>
				<div class="schedule-time"><?php echo $schedule['time']; ?></div>
				<div class="schedule-content-second"><?php echo $schedule['content']; ?></div>
<?php 		if(count($schedule['header']) > 0) : ?>
				<div class="speaker-level">登壇者（首長・大臣）</div>
				<div class="flex-container ">
<?php			foreach($schedule['header'] as $header): 
					$person = person_by_id($header);
?>
					<div class="person-item second modal-toggle" person-id="<?php echo $person['id']; ?>">
						<div class="__thumb second">
							<img src="<?php echo $uploads_path; ?>/<?php echo $person['uploadtime']; ?>/<?php echo $person['imgname']; ?>">
						</div>
						<p class="person-name second"><?php echo $person['name']; ?></p>
						<p class="person-detail "><?php echo $person['jobtitle']; ?></p>
					</div>
<?php			endforeach; ?>
				</div>
<?php		endif; ?>
<?php 		if(count($schedule['speakers']) > 0) : ?>
				<div class="speaker-level regular">登壇者（熱ベン）</div>
				<div class="flex-container ">
<?php			foreach($schedule['speakers'] as $speaker): 
					$person = person_by_id($speaker);
?>
					<div class="person-item second modal-toggle" person-id="<?php echo $person['id']; ?>">
						<div class="__thumb second">
							<img src="<?php echo $uploads_path; ?>/<?php echo $person['uploadtime']; ?>/<?php echo $person['imgname']; ?>">
						</div>
						<p class="person-name second"><?php echo $person['name']; ?></p>
						<p class="person-detail "><?php echo $person['jobtitle']; ?></p>
					</div>
<?php			endforeach; ?>
				</div>
<?php		endif; ?>
			</div>
<?php endforeach; ?>
		</div>
	</div>
	<div class="lp-sponsor ">
		<div class="inner ">
			<div class="sponsor-gold-title">
				<p><span>ゴールドスポンサー</span></p>
			</div>
			<div class="flex-container ">
				<div class="lpsponsor-item ">
					<a href="https://www.kddi.com/ " target="_blank " rel="noopener noreferrer "><img src="<?php echo $uploads_path; ?>/2020/06/lplogo-kddi.png "></a>
				</div>
			</div>
		</div>
	</div>
	<div class="lp-sponsor ">
		<div class="inner ">
			<div class="sponsor-regular-title">
				<p><span>レギュラースポンサー</span></p>
			</div>
			<div class="flex-container ">
				<div class="lpsponsor-item ">
					<a href="https://aws.amazon.com/jp/ " target="_blank " rel="noopener noreferrer ">アマゾン<br>ウェブサービスジャパン<br>株式会社</a>
				</div>
				<div class="lpsponsor-item ">
					<a href="https://lifull.com/ " target="_blank " rel="noopener noreferrer "><img src="<?php echo $uploads_path; ?>/2020/06/lplogo-lifull.png "></a>
				</div>
				<div class="lpsponsor-item ">
					<a href="https://www.zaigenkakuho.com/ " target="_blank " rel="noopener noreferrer "><img src="<?php echo $uploads_path; ?>/2020/06/lplogo-hopeinc.png "></a>
				</div>
				<div class="lpsponsor-item ">
					<a href="https://prtimes.jp/ " target="_blank " rel="noopener noreferrer "><img src="<?php echo $uploads_path; ?>/2020/06/lplogo-prtimes.png "></a>
				</div>

			</div>
		</div>
	</div>
	<div class="lp-hosting">
		<div class="inner ">
			<div class="sponsor-title">
				<p><span>共催</span></p>
			</div>
		</div>
		<div class="hosting-item">
			<a href="http://startup-toshi.com/" target="_blank" rel="noopener noreferrer"><img src="<?php echo $uploads_path; ?>/2019/11/Mask-Group-39.png"></a>
		</div>
	</div>
	<div class="member ">
		<div class="inner ">
			<div style="width:100%;color: #333333; text-align: center; line-height: 200%; padding-bottom: 40px;">
				<p class="lp2-title">熱意ある地方創生ベンチャー連合とは</p>
				<p>
					「地方創生」をテーマに、行政とベンチャー企業との架け橋となり、みなさんと共に新時代を切り拓きます。<br>
					労働人口の減少・事業の後継者不足・空き家の増加・オーバーツーリズム…前例のない社会課題が顕在化しています。<br>
					行政だからこそできること、そしてベンチャー企業だからこそできることがあるのではないでしょうか。<br>
					地方創生に熱意を持って取り組む約50社のベンチャーがあつまった団体です。<br>
					地方創生に取り組むベンチャー企業の参画を募集しています。<br>
				<p>
			</div>
			<div class="member-banner ">
				<a href="https://www.asoview.co.jp/ " target="_blank " rel="noopener noreferrer "><img src="<?php echo $uploads_path; ?>/2019/11/05-1.png "></a>
				<p>アソビュー<br> 株式会社
				</p>
			</div>
			<div class="member-banner ">
				<a href="http://www.lancers.co.jp/ " target="_blank " rel="noopener noreferrer "><img src="<?php echo $uploads_path; ?>/2019/11/06.png "></a>
				<p>ランサーズ<br> 株式会社
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://www.renoveru.jp/corporate/ " target="_blank " rel="noopener noreferrer "><img src="<?php echo $uploads_path; ?>/2019/11/54.png "></a>
				<p>リノベる<br> 株式会社
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://readyfor.jp/ " target="_blank " rel="noopener noreferrer "><img src="<?php echo $uploads_path; ?>/2020/01/7c4e866123723e03ef075d660bf377c4.png "></a>
				<p>READYFOR<br> 株式会社
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://lifull.com/ " target="_blank " rel="noopener noreferrer "><img src="<?php echo $uploads_path; ?>/2020/05/lifull.png "></a>
				<p>株式会社<br> LIFULL
				</p>
			</div>
			<div class="member-banner ">
				<a href="http://agri-hd.com/ " target="_blank " rel="noopener noreferrer "><img src="<?php echo $uploads_path; ?>/2019/11/53.png "></a>
				<p>アグリホールディングス<br> 株式会社
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://agilehr.co.jp/ " target="_blank " rel="noopener noreferrer "><img src="<?php echo $uploads_path; ?>/2020/04/AHR.jpg "></a>
				<p>株式会社<br> アジャイルHR
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://mdc-japan.org " target="_blank " rel="noopener noreferrer "><img src="<?php echo $uploads_path; ?>/2019/11/84.png "></a>
				<p>一般社団法人日本医療<br> デザインセンター
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://in-fit.co.jp/ " target="_blank " rel="noopener noreferrer "><img src="<?php echo $uploads_path; ?>/2019/11/75.jpg "></a>
				<p>株式会社<br> Infit
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://sb-ja.jp/ " target="_blank " rel="noopener noreferrer "><img src="<?php echo $uploads_path; ?>/2020/01/1fb5df747a9ab94203aefbfe5b2f3a9e.png "></a>
				<p>エスビージャパン<br> 株式会社
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://www.lgbreakthrough.jp " target="_blank " rel="noopener noreferrer "><img src="<?php echo $uploads_path; ?>/2019/11/86.jpg "></a>
				<p>株式会社<br> LGブレイクスルー
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://www.oisixdotdaichi.co.jp/ " target="_blank " rel="noopener noreferrer "><img src="<?php echo $uploads_path; ?>/2019/11/31.jpg "></a>
				<p>オイシックス・ラ・大地<br> 株式会社
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://www.kaneto.jp " target="_blank " rel="noopener noreferrer "><img src="<?php echo $uploads_path; ?>/2019/11/85.png "></a>
				<p>株式会社<br> カネト
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://www.kiramex.com/ " target="_blank " rel="noopener noreferrer "><img src="<?php echo $uploads_path; ?>/2019/11/02-1.png "></a>
				<p>キラメックス<br> 株式会社
				</p>
			</div>
			<div class="member-banner ">
				<a href="http://www.gc-c.co.jp " target="_blank " rel="noopener noreferrer "><img src="<?php echo $uploads_path; ?>/2020/04/goodcreate.jpg "></a>
				<p>株式会社<br> グッドクリエイト
				</p>
			</div>
			<div class="member-banner ">
				<a href="http://www.creema.co.jp/ " target="_blank " rel="noopener noreferrer "><img src="<?php echo $uploads_path; ?>/2019/11/51.png "></a>
				<p>株式会社<br> クリーマ
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://www.gldaily.com/ " target="_blank " rel="noopener noreferrer "><img src="<?php echo $uploads_path; ?>/2019/12/87.jpg "></a>
				<p>株式会社<br> グローバル・デイリー
				</p>
			</div>
			<div class="member-banner ">
				<a href="http://www.globiscapital.co.jp/ " target="_blank " rel="noopener noreferrer "><img src="<?php echo $uploads_path; ?>/2019/11/21.png "></a>
				<p>株式会社グロービス・<br> キャピタル・パートナーズ
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://www.kddi.com/ " target="_blank " rel="noopener noreferrer "><img src="<?php echo $uploads_path; ?>/2019/11/70.jpg "></a>
				<p>KDDI株式会社</p>
			</div>
			<div class="member-banner ">
				<a href="http://kotozna.com/ " target="_blank " rel="noopener noreferrer "><img src="<?php echo $uploads_path; ?>/2019/11/69.png "></a>
				<p>Kotozna株式会社</p>
			</div>
			<div class="member-banner ">
				<a href="http://www.jigyonary.com " target="_blank " rel="noopener noreferrer "><img src="<?php echo $uploads_path; ?>/2019/11/83.png "></a>
				<p>ジギョナリーカンパニー<br> 株式会社
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://sitateru.co.jp/ " target="_blank " rel="noopener noreferrer "><img src="<?php echo $uploads_path; ?>/2019/11/73.png "></a>
				<p>シタテル<br> 株式会社
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://www.subak-tech.com/ " target="_blank " rel="noopener noreferrer "><img src="<?php echo $uploads_path; ?>/2020/04/subak.png "></a>
				<p>株式会社<br> スバックテクノロジーズ
				</p>
			</div>
			<div class="member-banner ">
				<a href="http://spacemarket.co.jp/ " target="_blank " rel="noopener noreferrer "><img src="<?php echo $uploads_path; ?>/2019/11/03-1.png "></a>
				<p>株式会社<br> スペースマーケット
				</p>
			</div>
			<div class="member-banner ">
				<a href="http://skyer.info/ " target="_blank " rel="noopener noreferrer "><img src="<?php echo $uploads_path; ?>/2019/11/62.png "></a>
				<p>株式会社<br> skyer
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://zenkigen.co.jp/ " target="_blank " rel="noopener noreferrer "><img src="<?php echo $uploads_path; ?>/2019/11/76.png "></a>
				<p>株式会社<br> ZENKIGEN
				</p>
			</div>
			<div class="member-banner ">
				<a href="http://chibra.co.jp/ " target="_blank " rel="noopener noreferrer "><img src="<?php echo $uploads_path; ?>/2019/11/13.png "></a>
				<p>株式会社<br> 地域ブランディング 研究所
				</p>
			</div>
			<div class="member-banner ">
				<a href="http://www.toshin-seminar.co.jp/ " target="_blank " rel="noopener noreferrer "><img src="<?php echo $uploads_path; ?>/2019/11/48.png "></a>
				<p>株式会社<br> 東進
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://trippiece.com/ " target="_blank " rel="noopener noreferrer "><img src="<?php echo $uploads_path; ?>/2019/11/24.png "></a>
				<p>株式会社<br> trippiece
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://happylogue.com/ " target="_blank " rel="noopener noreferrer "><img src="<?php echo $uploads_path; ?>/2019/11/65.jpg "></a>
				<p>ハピログ<br> 株式会社
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://prtimes.co.jp/ " target="_blank " rel="noopener noreferrer "><img src="<?php echo $uploads_path; ?>/2019/11/77.png "></a>
				<p>株式会社<br> PRTIMES
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://pixta.co.jp/ " target="_blank " rel="noopener noreferrer "><img src="<?php echo $uploads_path; ?>/2019/11/09.png "></a>
				<p>ピクスタ<br> 株式会社
				</p>
			</div>
			<div class="member-banner ">
				<a href="http://www.b-tm.co.jp/ " target="_blank " rel="noopener noreferrer "><img src="<?php echo $uploads_path; ?>/2019/11/71.png "></a>
				<p>株式会社BTM</p>
			</div>
			<div class="member-banner ">
				<a href="http://www.bizreach.co.jp/ " target="_blank " rel="noopener noreferrer "><img src="<?php echo $uploads_path; ?>/2019/11/19.png "></a>
				<p>株式会社<br> ビズリーチ
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://www.fukushim-a-live.com/ " target="_blank " rel="noopener noreferrer "><img src="<?php echo $uploads_path; ?>/2019/11/68.png "></a>
				<p>株式会社<br> FGSM
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://fuller-inc.com " target="_blank " rel="noopener noreferrer "><img src="<?php echo $uploads_path; ?>/2019/11/80.png "></a>
				<p>フラー<br> 株式会社
				</p>
			</div>
			<div class="member-banner ">
				<a href="http://peraichi.co.jp/ " target="_blank " rel="noopener noreferrer "><img src="<?php echo $uploads_path; ?>/2019/11/59.png "></a>
				<p>株式会社<br> ペライチ
				</p>
			</div>
			<div class="member-banner ">
				<a href="http://www.zaigenkakuho.com/ " target="_blank " rel="noopener noreferrer "><img src="<?php echo $uploads_path; ?>/2019/11/10.png "></a>
				<p>株式会社<br> ホープ
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://www.hallheart.co.jp/ " target="_blank " rel="noopener noreferrer "><img src="<?php echo $uploads_path; ?>/2019/11/67.jpg "></a>
				<p>株式会社<br> ホールハート
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://minden.co.jp/ " target="_blank " rel="noopener noreferrer "><img src="<?php echo $uploads_path; ?>/2019/11/74.jpg "></a>
				<p>みんな電力<br> 株式会社
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://komorebinook.jp/ " target="_blank " rel="noopener noreferrer "><img src="<?php echo $uploads_path; ?>/2020/03/KOMOREBINOOK-logo2-e1584674334529.jpg "></a>
				<p>株式会社<br> むらやま建設
				</p>
			</div>
			<div class="member-banner ">
				<a href="http://meltingpot.tokyo/ " target="_blank " rel="noopener noreferrer "><img src="<?php echo $uploads_path; ?>/2019/11/82.png "></a>
				<p>株式会社<br> MeltingPot
				</p>
			</div>
			<div class="member-banner ">
				<a href="http://47planning.jp/ " target="_blank " rel="noopener noreferrer "><img src="<?php echo $uploads_path; ?>/2019/11/78.png "></a>
				<p>株式会社<br> 47PLANNING
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://lifeistech.co.jp/ " target="_blank " rel="noopener noreferrer "><img src="<?php echo $uploads_path; ?>/2019/11/52.png "></a>
				<p>ライフイズテック<br> 株式会社
				</p>
			</div>
			<div class="member-banner ">
				<a href="https://luup.sc/ " target="_blank " rel="noopener noreferrer "><img src="<?php echo $uploads_path; ?>/2019/11/72.png "></a>
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