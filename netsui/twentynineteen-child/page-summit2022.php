<?php get_header(); ?>
<?php 
/*constants*/
$uploads_path = "/worktest/netsui2/wp-content/uploads";
$uploads_path = "/wp/wp-content/uploads";
$person_list = array(
    array(
		'id' => 22,
		'imgname' => 'speaker_22.jpg',
		'name' => '吉田雄人',
		'company' => '（一社）熱意ある地方創生ベンチャー連合',
		'jobtitle' => '代表理事',
		'bio' => '1975年生まれ。早稲田大学政治経済学部を卒業後、アクセンチュアにて3年弱勤務。退職後、早稲田大学大学院（政治学修士）に通いながら、2003年の横須賀市議会議員選挙に立候補し、初当選。2009年の横須賀市長選挙で初当選し、2013年に再選。2017年7月に退任するまで、完全無所属を貫いた。現在、地域課題解決のためには良質で戦略的な官民連携手法である日本版GR：ガバメント・リレーションズが必要であるという考え方の元、Glocal Government Relationz株式会社を設立。熱意ある地方創生ベンチャー連合代表理事に2021年3月就任、現在に至る。',
		'uploadtime' => '2020/06'
	),

	// array(
	// 	'id' => 27,
	// 	'imgname' => 'speaker_27.jpg',
	// 	'name' => '坂本哲志',
	// 	'jobtitle' => '一億総活躍担当　まち・ひと・しごと創生担当　大臣 内閣府特命担当大臣（少子化対策　地方創生）',
	// 	'bio' => '生年月日：昭和25年11月６日<br>出身地：熊本県<br>昭和50年　　　中央大学法学部政治学科卒業 <br>昭和50年～平成２年　 熊本日日新聞社記者<br>平成３年～平成15年　 熊本県議会議員（４期）<br> 平成15年～平成17年　衆議院議員（１期）<br>平成19年～　　　　　 衆議院議員（２～６期）<br>平成20年～平成21年　総務大臣政務官<br>平成24年～平成25年　総務副大臣兼内閣府副大臣<br>平成25年～平成26年　衆議院　農林水産委員長<br>平成28年～平成29年　衆議院　総務委員会筆頭理事<br> 令和元年～令和２年　  衆議院　予算委員会筆頭理事<br>令和２年９月～　　　一億総活躍担当まち・ひと・しごと創生担当<br>内閣府特命担当大臣（少子化対策、地方創生）（菅内閣）',
	// 	'uploadtime' => '2021/01',  //'2020/06',  '2020/11'
	// ),
	// array(
	// 	'id' => 1,
	// 	'imgname' => 'speaker_01.jpg',
	// 	'name' => '山野智久',
	// 	'company' => '（一社）熱意ある地方創生ベンチャー連合',
	// 	'jobtitle' => '理事',
	// 	'company1' => 'アソビュー株式会社',
	// 	'jobtitle1' => '代表取締役 CEO',
	// 	'bio' => "アクティビティ・体験教室・レジャーチケットなど「遊び」の予約ができる日本最大級のマーケットプレイス「アソビュー！」、思い出を贈る「asoview! GIFT」などWEBサービスを運営。観光庁アドバイザリーボード・各種委員を歴任するなど多方面で活動。明治大学法学部法律学科卒。新卒にて株式会社リクルートに入社。2011年アソビュー株式会社を設立。",
	// 	'uploadtime' => '2020/06'
	// ),
	// array(
	// 	'id' => 2,
	// 	'imgname' => 'speaker_02.jpg',
	// 	'name' => '秋好陽介',
	// 	'company' => '（一社）熱意ある地方創生ベンチャー連合',
	// 	'jobtitle' => '理事',
	// 	'company1' => 'ランサーズ株式会社',
	// 	'jobtitle1' => '代表取締役CEO',
	// 	'bio' => "1981年大阪府生まれ。2005年、ニフティ株式会社 新卒入社。2008年､「ランサーズ株式会社」を創業。「テクノロジーで自分らしく働ける社会をつくる」をビジョンに、副業・フリーランス向けマッチングサービスや企業向けの人材サービスを展開。2019年4月、経済同友会の規制改革副委員長に就任し、現在に至る。",
	// 	'uploadtime' => '2020/06'
	// ),
	array(
		'id' => 3,
		'imgname' => 'speaker202201_03.jpg',
		'name' => '高島宗一郎',
		'company' => 'スタートアップ都市推進協議会会長',
		'jobtitle' => '',
		'company1' => '福岡市長',
		'jobtitle1' => '',
		'bio' => "1974年11月生まれ。<br>キャスター生活を経て2010年に36歳で福岡市長に就任。2014年、2018年いずれも史上最多得票で再選し、現在３期目。<br>国家戦略特区を活用し、スタートアップビザをはじめとする規制緩和や制度改革を実現。数々の施策でムーブメントを生み出し、日本のスタートアップシーンを力強く牽引する。<br>スタートアップ都市推進協議会会長、政府のデシタル臨時行政調査会や行政改革推進会議の構成員を務める。",
		'uploadtime' => '2022/01'
	),
	// array(
	// 	'id' => 11,
	// 	'imgname' => 'speaker_11.jpg',
	// 	'name' => '鈴木英敬',
	// 	'jobtitle' => '三重県知事',
	// 	'bio' => "1974年生まれ。経済産業省時代に一円起業やジョブカフェなどを手掛ける。３６歳（歴代２番目の若さ）で三重県知事に当選し、現在３期目。伊勢志摩サミットの誘致を牽引し、「オール三重」で無事かつ成功裏に完遂。現在、全国知事会の地方創生対策本部長や国の高度情報通信ネットワーク社会推進戦略本部委員なども務める。家族は五輪メダリストの妻・武田美保と一男一女。現職知事として初めて第一子、第二子とも育休を取得。",
	// 	'uploadtime' => '2020/06'
	// ),
	array(
		'id' => 12,
		'imgname' => 'speaker2022_01_12.jpg',
		'name' => '鈴木康友',
		'company' => '浜松市長',
		'jobtitle' => '',
		'bio' => "１９５７年静岡県浜松市生まれ。<br>１９８０年慶應義塾大学法学部を卒業後、松下政経塾に入塾（第１期生）。２０００年６月に衆議院議員に初当選（２期）。２００７年５月浜松市長に就任し、現在４期目。三遠南信地域（愛知県東三河地域、静岡県遠州地域、長野県南信州地域）連携ビジョン推進会議（ＳＥＮＡ）会長。２０１１年１２月から指定都市市長会副会長。",
		'uploadtime' => '2022/01'
	),
	// array(
	// 	'id' => 18,
	// 	'imgname' => 'speaker_18.jpg',
	// 	'name' => '崎田恭平',
	// 	'jobtitle' => '日南市長',
	// 	'bio' => "１９７９年５月生まれ。日南市出身。九州大学工学部を卒業後、宮崎県庁職員を経て２０１３年４月に九州最年少で日南市長に就任。現在２期目。民間人を積極的に登用した地域課題解決が注目を集める。その取り組みに共感した若者や移住者が新しいビジネスにチャレンジする事例が増加しており、スタートアップの動きが加速している。「人づくり」を政策の柱とする「創客創人」をコンセプトに掲げ、地方創生の実現に奔走中。",
	// 	'uploadtime' => '2020/06'
	// ),
	// array(
	// 	'id' => 21,
	// 	'imgname' => 'speaker2022_01_21.jpg',
	// 	'name' => '長野恭紘',
	// 	'company' => '別府市長',
	// 	'jobtitle' => '',
	// 	'bio' => "1975年4月生まれ。<br>衆議院議員秘書、別府市議会議員を経て、2015年、最年少（40歳）別府市長として当選。<br>現在は、別府市で戦後初の無投票という市民からの期待を背負い2期目を担う。座右の銘は「やりすぎくらいがちょうどいい」。<br>「起業・創業等の推進」、「人財育成」、「ヒト・企業とのつながり強化」の３つを柱とした『別府ツーリズムバレー構想』を掲げ、儲かる別府の実現に向けた取り組みを進めている。",
	// 	'uploadtime' => '2022/01'
	// ),
	array(
		'id' => 24,
		'imgname' => 'speaker_24.jpg',
		'name' => '五十嵐立青',
		'company' => 'つくば市長',
		'jobtitle' => '',
		'bio' => "1978年生まれ。筑波大学国際総合学類、ロンドン大学 UCL公共政策研究所修士課程、筑波大学大学院人文社会科学研究科修了、博士(国際政治経済学)。<br>つくば市議を経て、2016年よりつくば市長。<br>いがらしコーチングオフィス代表として経営層にコーチングプログラムを提供。地域では障害のあるスタッフが働く農場「ごきげんファーム」を設立 (現在は代表退任)。マニフェスト大賞において2017年首長部門優秀賞受賞、2020年優秀マニフェスト推進賞受賞。",
		'uploadtime' => '2020/06'
	),
	array(
		'id' => 26,
		'imgname' => 'speaker_26.jpg',
		'name' => '小野寺晃彦',
		'company' => '青森市長',
		'jobtitle' => '',
		'bio' => "１９７５年７月生まれ。<br>青森市出身。総務省地域政策課理事官等を経て、２０１６年１１月、青森市長に就任。２０２０年１１月に再選し、現在２期目。<br>青森駅前に設置したビジネス支援拠点「ＡＯＭＯＲＩ　ＳＴＡＲＴＵＰ　ＣＥＮＴＥＲ」を中心に、経営相談窓口、学生によるビジネスプランコンテスト（ABC-GATE）、アクセラレータープログラムの実施など、複数の事業を連携した「新ビジネス挑戦支援プロジェクト」を実施。",
		'uploadtime' => '2020/12',  //'2020/06',  '2020/11'
	),
	// array(
	// 	'id' => 28,
	// 	'imgname' => 'speaker_28.jpg',
	// 	'name' => '石坂茂',
	// 	'company' => '株式会社IBJ',
	// 	'jobtitle' => '代表取締役社長',
	// 	'bio' => "東東京都浅草生まれ。「人と人をつなぐのは、人だと思う。」をブランドステートメントに掲げ、全国に加盟店数約2,600社、登録会員数67,000名の規模を誇る日本最大級の結婚相談所ネットワーク「日本結婚相談所連盟」を始めとする婚活事業を基軸に、ライフデザインビジネス分野にも事業展開。2019年に日本の成婚組数58万組の1.4％（8,286組）、2020年には約1.6％（9,732組）を創出する企業へと成長させた。日本の深刻な人口減少問題に対して、IBJから成婚カップルを生み出すことで、直接的に人口増加へ寄与し、より一層の成婚数創出を目指す。",
	// 	'uploadtime' => '2021/02',
	// ),
	// array(
	// 	'id' => 29,
	// 	'imgname' => 'speaker_29.jpg',
	// 	'name' => '大山 敬義',
	// 	'company' => '株式会社バトンズ',
	// 	'jobtitle' => '代表取締役',
	// 	'bio' => "1967年 神奈川県生まれ。1991年に日本M&Aセンターの設立に参画し、同社初のM&Aコンサルタントとなる。長年の経験にもとづくM&Aに関する知見を活かし、近年では中小企業のハッピーなM&Aの実態を広く伝えるため、普及・著作活動に積極的で、金融機関や商工会議所、会計事務所などでの年間講演数は100回を超える。News picksのpro pickerとしても有名。2018年4月、小規模ビジネス向け専用のM&Aサービスを提供する「アンドビズ株式会社」（現 株式会社バトンズ）を設立、代表取締役に就任。2019年6月、日本M&Aセンター常務取締役を退任し、バトンズの経営に専念。",
	// 	'uploadtime' => '2021/02',
	// ),
	// array(
	// 	'id' => 30,
	// 	'imgname' => 'speaker_30.jpg',
	// 	'name' => '鈴木 賢治',
	// 	'company' => '株式会社47PLANNING',
	// 	'jobtitle' => '代表取締役社長',
	// 	'bio' => "1982年生まれ、福島県いわき市出身。2009年、(株)47PLANNINGを創業。東日本大震災が発生し実家も全壊する中、福島県いわき市駅前に復興飲食店街の夜明け市場を設立し、空きシャッター街を年間１０万人訪れる場所に再生する。他地域では、宿場町の元酒蔵を高付加価値型オーベルジュに再生するなど、地域に賑わいを創るための種火を発掘し、磨き上げ、発信している。EO東北第2期会長。",
	// 	'uploadtime' => '2021/02',
	// ),
	// array(
	// 	'id' => 31,
	// 	'imgname' => 'speaker_31.jpg',
	// 	'name' => '松丘啓司',
	// 	'company' => '株式会社アジャイルHR',
	// 	'jobtitle' => '代表取締役社長',
	// 	'bio' => "1986年 東京大学法学部卒業。アクセンチュア入社。1992年 人と組織の変革を支援するチェンジマネジメントサービスの立ち上げに参画。以後、一貫して人材・組織変革のコンサルティングに従事。1997年 同社パートナー昇進。以後、ヒューマンパフォーマンスサービスライン統括パートナー、エグゼクティブコミッティメンバーを歴任。2005年 企業の人材・組織変革を支援するエム・アイ・アソシエイツ（株）を設立し、代表取締役に就任（現任）。2018年 パフォーマンスマネジメントを支援するスマートフォンアプリ「1on1navi」をリリース後、（株）アジャイルHRを設立し代表取締役に就任し、日本企業のパフォーマンスマネジメント変革の支援をミッションとして活動中。著書は多数に上るが、「1on1マネジメント」（2018年）はピープルマネジメントの教科書として多くの企業で活用されている。「人事評価はもういらない」（2016年）は人事だけでなく一般の読者にも広く読まれベストセラーとなった。",
	// 	'uploadtime' => '2021/02',
	// ),
	// array(
	// 	'id' => 32,
	// 	'imgname' => 'speaker_32.jpg',
	// 	'name' => '古田智子',
	// 	'company' => '株式会社LGブレイクスルー',
	// 	'jobtitle' => '代表取締役',
	// 	'bio' => "1990年慶應義塾大学文学部史学科卒。官公庁を専門としたコンサル会社で中央省庁や自治体受託業務に携わり、多岐にわたる事業領域に従事。2000年頃から自治体職員の人材育成に携わる。指導分野は公務員倫理、公共マーケティング、折衝・交渉、政策形成など。2021年1月現在、指導した全国の自治体職員数は概算で2万人を超える。2013年２月、株式会社LGブレイクスルー創業。社会課題の解決と利益の創造の両立を実現すべく、民間企業へのコンサルティング・研修事業を展開している。日経BP社、宣伝会議、日本経営合理化協会、日本経営協会などでの講演多数。",
	// 	'uploadtime' => '2021/02',
	// ),
	// array(
	// 	'id' => 33,
	// 	'imgname' => 'speaker_33.jpg',
	// 	'name' => '水野 雄介',
	// 	'company' => 'ライフイズテック株式会社',
	// 	'jobtitle' => '代表取締役',
	// 	'bio' => "1982年、北海道生まれ。慶應義塾大学理工学部物理情報工学科卒、同大学院修了。大学院在学中に、開成高等学校の物理非常勤講師を２年間務める。大学院修了後、人材コンサルティング会社を経て、「教育を変えたい」という思いから、2010年7月 ライフイズテック株式会社を設立。シリコンバレーIT教育法をモチーフとした中高生向けプログラミング・IT教育キャンプ／スクール「Life is Tech ! 」を立ち上げ、現在延べ5万人の中高生が参加。14年、同社がコンピューターサイエンスやICT教育の普及に貢献している組織に与えられる “Google RISE Awards ” に東アジアで初受賞。学校向けオンラインプログラミング教材「ライフイズテックレッスン」やウォルト・ディズニー・ジャパンとライセンス契約したオンラインプログラミング教材「テクノロジア魔法学校」も提供。オフライン、オンライン両軸で新しいサービスを提供し続けている。",
	// 	'uploadtime' => '2021/02',
	// ),
	// array(
	// 	'id' => 34,
	// 	'imgname' => 'speaker_34.jpg',
	// 	'name' => '松野 茂樹',
	// 	'company' => 'KDDI株式会社',
	// 	'jobtitle' => '理事 経営戦略本部 副本部長',
	// 	'bio' => "1985年に国際電信電話株式会社（現：KDDI）入社。2003年以来、一貫してM&Aを担当。2010年に経営戦略本部企業戦略部長に就任し、一般的なM&Aだけでなくベンチャー企業への出資やM&Aも担当。大企業によるベンチャーとのオープンイノベーションの先駆けとなるKDDIのベンチャー投資ファンド「KDDI Open Innovation Fund（KOIF）」の立ち上げ企画の他、ソラコム、nanapi、LUXAなど数々のKDDIによるベンチャー企業のM&Aを実施。2019年からはKDDIの地方創生の全社統括も担当し、地域の企業家育成やICT技術を支える人材育成など『人づくり』をテーマに地域の教育機関や地方創生に熱心なベンチャーとの連携を推進している。",
	// 	'uploadtime' => '2021/02',
	// ),
	// array(
	// 	'id' => 35,
	// 	'imgname' => 'speaker_35.jpg',
	// 	'name' => '幸田八州雄',
	// 	'company' => '株式会社コウダプロ',
	// 	'jobtitle' => '代表取締役社長',
	// 	'bio' => "あらゆる業界で企画、営業、CSなど多岐にわたる仕事をしていく中で築き上げた独自のマーケティング理論を武器としている。「現在の日本社会には、優れたアイデアに価値があるという認識が不足しているのではないか」という自らの疑問から、2006年の春、福岡で、「実行可能で成果に直結するアイデア」を基盤とするコウダプロを立ち上げた。次々と面白くて新しいアイデアが浮かんでくるため、日々ワクワクが止まらない。まわりにはあきれられるほどの馬鹿馬鹿しいことが大好き。",
	// 	'uploadtime' => '2021/02',
	// ),
	// array(
	// 	'id' => 36,
	// 	'imgname' => 'speaker_36.jpg',
	// 	'name' => '吉田博詞',
	// 	'company' => '株式会社地域ブランディング研究所',
	// 	'jobtitle' => '代表取締役',
	// 	'bio' => "1981年、広島県廿日市市生まれ。2013年㈱地域ブランディング研究所を設立。欧米豪や富裕層等をターゲットとした地域資源のプレミアム化事業を展開。全国の地方自治体・DMO等と連携し、観光まちづくりを通じた地域の課題解決に努める。コロナ禍を受け、ワーケーションやサステナブルツーリズムなど新たな価値基準の地域ブランディング戦略を発信。クラウドシフトによるテレワークやスタッフの地方移住など、自社の働き方改革にも取り組んでいる。",
	// 	'uploadtime' => '2021/02',
	// ),
	// array(
	// 	'id' => 37,
	// 	'imgname' => 'speaker_37.jpg',
	// 	'name' => '中村 亮',
	// 	'company' => '株式会社マネーフォワード',
	// 	'jobtitle' => '事業推進本部　九州・沖縄支社長',
	// 	'bio' => "1983年生まれ、鹿児島県立出水高等学校卒業　佐賀大学経済学部卒業。2013年スターフェスティバル株式会社（飲食業界×IT）へ福岡拠点立ち上げでジョイン。スターフェスティバルの福岡支店長を経て、2016年株式会社マネーフォワード（金融×IT）へ福岡拠点立ち上げでジョイン。現在は九州・沖縄支社長を務める。2020年11月よりアビスパ福岡グローバルアソシエイツ理事も兼務。",
	// 	'uploadtime' => '2021/02',
	// ),
	// array(
	// 	'id' => 38,
	// 	'imgname' => 'speaker_38.jpg',
	// 	'name' => '桑畑健',
	// 	'company' => '一般社団法人 日本医療デザインセンター',
	// 	'jobtitle' => '代表理事',
	// 	'bio' => "筑波大学芸術専門学群卒業。多摩美術大学 情報デザイン修了。2008年にJump Start（株）を設立し代表取締役に就任。以後、医療機関のブランディングを中心に300以上のプロジェクトを手がける。鎌倉の地域活性団体「カマコン」の発起人の一人。2014-16年の2年間、湘南ビーチFMのトーク番組のパーソナリティを務める。2018年に（一社）日本医療デザインセンターを設立し代表理事に就任。現在、「医療 x 地域活性」をテーマに、常時30プロジェクト以上のクリエイティブワークを展開中。",
	// 	'uploadtime' => '2021/02',
	// ),
	// array(
	// 	'id' => 39,
	// 	'imgname' => 'speaker_39.jpg',
	// 	'name' => '小池 克典',
	// 	'company' => '株式会社LIFULL',
	// 	'jobtitle' => '地方創生推進部 LivingAnywhere Commons事業責任者',
	// 	'bio' => "株式会社LIFULL 地方創生推進部 LivingAnywhere Commons事業責任者　株式会社LIFULL ArchiTech 代表取締役社長。場の制約に縛られないライフスタイルの実現を目指した「LivingAnywhere Commons」の推進を通じて働き方改革の推進や持続可能な地域活性を行う。また、名古屋工業大学との産学連携で生まれた「インスタントハウス」という新しい建築を広めるLIFULL ArchiTechの代表も兼務。",
	// 	'uploadtime' => '2021/02',
	// ),
	// array(
	// 	'id' => 40,
	// 	'imgname' => 'speaker_40.jpg',
	// 	'name' => '西郷 俊彦',
	// 	'company' => 'リノベる株式会社',
	// 	'jobtitle' => '都市創造本部本部長',
	// 	'bio' => "1975年大阪府生まれ。大阪芸術大学卒業後、設計事務所勤務。2010年に「日本の暮らしを、世界で一番、かしこく素敵に。」をミッションに掲げるリノベる株式会社に入社。マンションのワンストップリノベーションサービス「リノベる。」に加え、2015年に一棟リノベーションのワンストップサービスを都市創造事業としてスタートし、都市創造本部本部長に就任。現在に至る。",
	// 	'uploadtime' => '2021/02',
	// ),
	// array(
	// 	'id' => 41,
	// 	'imgname' => 'speaker_41.jpg',
	// 	'name' => '岡井大輝',
	// 	'company' => '株式会社Luup',
	// 	'jobtitle' => '代表取締役',
	// 	'bio' => "東京大学農学部を卒業。その後、戦略系コンサルティングファームにて上場企業のPMI、PEファンドのビジネスDDを主に担当。その後、株式会社Luupを創業。代表取締役社長兼CEOを務める。2019年5月には国内の主要電動キックボード事業者を中心に、新たなマイクロモビリティ技術の社会実装促進を目的とする「マイクロモビリティ推進協議会」を設立し、会長に就任。",
	// 	'uploadtime' => '2021/02',
	// ),
	// array(
	// 	'id' => 42,
	// 	'imgname' => 'speaker_42.jpg',
	// 	'name' => '大富部 貴彦',
	// 	'company' => 'アマゾンウェブサービスジャパン株式会社',
	// 	'jobtitle' => 'パブリックセクター営業本部 本部長',
	// 	'bio' => "外資系大手企業を経て、AWSに入社。AWSでは日本のパブリックセクターの立ち上げを担当し、現在は営業本部長として、政府機関、教育機関、医療機関、非営利組織などのお客様を担当。行政分野のクラウド活用を促進するために、以下の活動を実施。行政情報システム2020年8月号寄稿 「公共機関で実践されるクラウドセキュリティのベストプラクティス」、2019年 日経クロステック寄稿 「行政業務の効率化から市民参加型サービスまで加速するクラウド利活用」",
	// 	'uploadtime' => '2021/02',
	// ),
	// array(
	// 	'id' => 43,
	// 	'imgname' => 'speaker_43.jpg',
	// 	'name' => '桂城漢大',
	// 	'company' => 'canow株式会社',
	// 	'jobtitle' => '代表取締役',
	// 	'bio' => "前職では「情報銀行」の構想を完成させ、最高戦略責任者を務めるとともに、国外暗号資産取引所や企業との交渉、FIN/SUM 2019、Delta summitをはじめとした世界各国のカンファレンスにスピーカーとして参加。これらの経験を元に、国内外の架け橋となるため、ブロックチェーン技術を活用し分散型IDを中心とした情報活用プラットフォームを推進するために『canow株式会社』を設立。",
	// 	'uploadtime' => '2021/02',
	// ),
	// array(
	// 	'id' => 44,
	// 	'imgname' => 'speaker_44.jpg',
	// 	'name' => '谷孝 大',
	// 	'company' => '株式会社フューチャーヒット',
	// 	'jobtitle' => '代表取締役',
	// 	'bio' => "1977年兵庫県生まれ。大阪大学工学部在学中の1996年 フューチャースピリッツを創業。「IT技術で未来をもっと楽しくする」というミッションの元、サーバーホスティング事業を中心に、クラウドサービス事業、WEBプロデュース事業を展開。2004年フューチャーヒット設立、現在は地域ポイントサービスを提供。2010年に中国企業Bohan ITと資本提携、その後、マレーシア、タイ、ベトナムにて合弁会社を設立。自身の育児休暇の取得や、就業時間中の副業を認める「働かない制度」、働く場所の選択制の導入など働き方の多様性にも取り組む。",
	// 	'uploadtime' => '2021/02',
	// ),
	// array(
	// 	'id' => 45,
	// 	'imgname' => 'speaker_45.jpg',
	// 	'name' => '渋谷 修太',
	// 	'company' => 'フラー株式会社',
	// 	'jobtitle' => '代表取締役会長',
	// 	'bio' => "1988年生。新潟県出身。国立長岡工業高等専門学校卒業後、筑波大学理工学科社会工学類経営工学へ編入学。グリー株式会社を経て、2011年11月フラー株式会社を創業、代表取締役に就任。2016年には、世界有数の経済誌であるForbesにより30歳未満の重要人物「30アンダー30」に選出される。2020年6月、故郷の新潟へUターン移住。2020年9月、新潟ベンチャー協会代表理事に選任。 2020年10月、長岡高専客員教授に就任。",
	// 	'uploadtime' => '2021/02',
	// ),
	// array(
	// 	'id' => 46,
	// 	'imgname' => 'speaker_46.jpg',
	// 	'name' => '大橋 優輝',
	// 	'company' => '株式会社クリーマ',
	// 	'jobtitle' => '取締役 イベント・ストア・ビジネスアライアンスDiv. GM',
	// 	'bio' => "慶應義塾大学卒業後、マンション開発大手に新卒入社。2009年3月に現在のクリーマを共同創業し、2015年より現職。日本最大級のクリエイターの祭典「ハンドメイドインジャパンフェス（東京ビッグサイト）」や、エディトリアルショップ「クリーマストア」等を展開するイベント・ストアサービスを始め、行政や地方自治体・企業とのビジネスアライアンス、地方創生活動など、クリーマにおける全てのリアル関連サービスを立ち上げ、統括する。",
	// 	'uploadtime' => '2021/02',
	// ),
	// array(
	// 	'id' => 47,
	// 	'imgname' => 'speaker_47.jpg',
	// 	'name' => '小川　淳',
	// 	'company' => 'フューチャベンチャーキャピタル株式会社',
	// 	'jobtitle' => 'FVC Tohoku（株）代表取締役社長',
	// 	'bio' => "岩手県出身で岩手県を中心に東北で活動するベンチャーキャピタリスト。キャリアは18年にわたる。地域に根ざした投資育成活動を重視する。これまでに、東北三県（岩手、山形、青森）の地域ベンチャーファンド（いわてファンド等）の組成とその運営を担当し、50数社への投資決定とその後の育成支援、回収に関与。最近では7件の地方創生ファンド（もりおか起業ファンド等）を立ち上げ、創業間もない企業向群に注力し、関与投資先企業数は50社を超える。東北企業にリスクマネー（投資資金）を供給し、東北の産業振興に寄与することをミッションとしている。",
	// 	'uploadtime' => '2021/02',
	// ),
	// array(
	// 	'id' => 48,
	// 	'imgname' => 'speaker_48.jpg',
	// 	'name' => '渡邊 大路',
	// 	'company' => '株式会社レベルフォーデザイン',
	// 	'jobtitle' => 'クリエイティブディレクター/デザイナー',
	// 	'bio' => "秋田県出身。美大を卒業後上京、2002年、レベルフォーデザインに入社。入社後、企業のグラフィックやWEBを中心に活動し、最近はその経験を活かし、地域ブランディングに取り組んでいます。地域の方々に寄り添い伴走しながら、デザインの力を課題解決や挑戦のために役立て、その先にある社会の変革や発展を目指しています。",
	// 	'uploadtime' => '2021/02',
	// ),
	// array(
	// 	'id' => 49,
	// 	'imgname' => 'speaker_49.jpg',
	// 	'name' => '大森章平',
	// 	'company' => '（一社）熱意ある地方創生ベンチャー連合',
	// 	'jobtitle' => '理事',
	// 	'company1' => 'Whiskey&Co.株式会社',
	// 	'jobtitle1' => '代表取締役',
	// 	'bio' => "同志社大学法学部法律学科卒業。2001年株式会社ベンチャー•リンク入社。6業態1,000店舗超のフランチャイズチェーンのコンサルティングと居抜き物件のwebマッチングサービス立上げにグループ会社役員として従事。2010年リノべる株式会社を共同創業•取締役副社長就任。中古物件+リノベーションという住宅購入手法を提案するポータルサイト「リノベる。」の全国エリア展開及びBtoBアライアンス、ユーザー向けサービス構築及び営業推進を担当。2021年Whiskey&Co.株式会社を設立。新たにウィスキー/スピリッツ蒸留事業を2021年中にスタート予定。",
	// 	'uploadtime' => '2021/02',
	// ),
	array(
		'id' => 50,
		'imgname' => 'speaker2022_01_50.jpg',
		'name' => '仲川げん',
		'company' => '奈良市長',
		'jobtitle' => '',
		'bio' => "1976年生まれ。奈良県出身。立命館大学経済学部卒業。<br>帝国石油株式会社（現 株式会社INPEX）及び奈良NPOセンターでの勤務を経て2009年7月、当時全国で2番目に若い33歳で奈良市長に初当選。2021年7月に4期目就任。中核市市長会顧問。座右の銘は『未来を信じ、未来に生きる』。",
		'uploadtime' => '2022/01',
	),
	array(
		'id' => 51,
		'imgname' => 'speaker2022_01_51.jpg',
		'name' => '東修平',
		'company' => '四條畷市長',
		'jobtitle' => '',
		'bio' => "京都大学で原子力について学び、外務省に入省。その後、野村総研インド在職中、父の病をきっかけに地元の現状を知り、生まれ育った故郷を未来へと繋ぐべく、出馬を決意。2017年1月、28歳で初当選。着任3年で約150回にわたる市民との直接の意見交換を行うなど、対話を重視したまちづくりを理念に掲げる。11年ぶりの人口の社会増や、31年ぶりの財政構造の健全化を達成。2020年12月に再選し、現在2期目。",
		'uploadtime' => '2022/01',
	),
);
function person_by_id($id) {
	global $person_list;
	foreach($person_list as $person) {
		if($person['id'] == $id) return $person;
	}
	return $person_list[0];
}
function speaker_title($title) {
	if($title=='オープニング' || $title=='基調講演' || $title=='クロージング')
		return '登壇者';
	return '登壇者（企業）';
}
$schedule_list = array(
	array(
		'time' => '11:00〜11:20',
		'title' => 'オープニング',
		'content' => '',
		'header' => array(3),
		'speakers' => array(1,2),
		'moderators'=> array(22),
		'header_names' => array(),
		'speaker_names' => array(),
	 ),
	array(
		'time' => '11:30〜12:00',
		'title' => '基調講演',
		'content' => '「今後の地方創生の展望」「ベンチャー企業をはじめとした民間企業や地方自治体に期待する役割」等について、坂本哲志地方創生担当大臣に基調講演いただく。',
		'header' => array(),
		'speakers' => array(27),
		'header_names' => array(),
		'speaker_names' => array(),
	 ),
	 array(
		'time' => '12:00〜13:00',
		'title' => '「関係人口」',
		'content' => '少子化や都心への流出の結果として地方の人口減少が進む中、期待されているのが「関係人口」の創出である。「一見さん」の観光客ではなく、何らかの形態で地域に関わる人が増えてきている。また新型コロナウイルス感染拡大を横目にオンライン視察ツアーやガバメントクラウドファンディングなど、地域との新しい関わり方をベンチャー企業が提供するようになった。有権者・納税者ではない「関係人口」の創出というテーマに、自治体のリーダーは何を考え、どのようなソリューションを望むのか。温泉の町を沸かすような長野別府市長との議論を刮目して欲しい。',
		'header' => array(21),
		'speakers' => array(28,29,30),
		'moderators'=> array(1),
		'header_names' => array(),
		'speaker_names' => array(),
	 ),
	array(
		'time' => '13:00〜14:00',
		'title' => '「人材育成」',
		'content' => '人口減少が進む中で、地域内での人材不足が懸念されている。大学進学で離れた人材が戻って来ず、地域企業の事業の継続が困難になるなどの課題が表面化している。一方で、Society5.0時代に向けたGIGAスクール構想は、コロナ禍でより加速化した推進が求められている。その結果として、プログラミングなどを活用した新しい事業を若い世代が作り上げることも容易になった。外部人材の活用がしやすい環境も整えられつつある。地方創生の人材をどこに求めていくのか。やらまいか精神溢れる鈴木浜松市長の反応を見る。',
		'header' => array(12),
		'speakers' => array(31,32,33,34),
		'moderators'=> array(2),
		'header_names' => array(),
		'speaker_names' => array(),
	 ),
	array(
		'time' => '14:00〜15:00',
		'title' => '「働き方」',
		'content' => '新型コロナウイルス感染拡大の影響で、「テレワーク」「ワーケーション」といった働き方が広がっている。また、公務員も含めて兼業・副業が幅広く認められるような労働環境が整備されつつある。都心で働く企業戦士が、地域課題解決の請負人になることもありえない話ではなくなってきている。このような働き方を導入する企業が増え、企業移住を促進する自治体も増えていくと考えられる。新型コロナウイルス感染拡大前から、働き方改革のソリューションを開発しているベンチャー企業が、今年５月から民間人となる崎田日南市長の声を聞く。',
		'header' => array(18),
		'speakers' => array(35,36,37),
		'moderators'=> array(49),
		'header_names' => array(),
		'speaker_names' => array(),
	 ),
	 array(
		'time' => '15:00〜16:00',
		'title' => '「都市／交通計画」',
		'content' => '新型コロナウイルスの感染拡大により求められている新しい生活様式（ニューノーマル）は、定義が定まっているようでいて、未だ曖昧なところもある。特に、都市のあり方、建物・施設の姿、公共交通の方法など、既存のハードやインフラ面での「新しさ」はまだ見えてきていない。一方で、「MaaS」と呼ばれるモビリティの活用や、ハードのリノベーションという手法、デザインによる革新、ドローンの活用など、ベンチャースピリットが活きてくるフィールドでもある。空飛ぶ車などを他の自治体に先んじて検討する三重県知事の胸を借りる。',
		'header' => array(11),
		'speakers' => array(38,39,40,41),
		'moderators'=> array(49),
		'header_names' => array(),
		'speaker_names' => array(),
	 ),
	 array(
		'time' => '16:00〜17:00',
		'title' => '「自治体DX」',
		'content' => '2020年には新型コロナウイルス感染拡大により、国や各自治体からは様々な支援施策が実施される中、課題が浮き彫りとなったのは、行政手続きの遅れや連携不足であった。新たに発足した菅内閣では、デジタル庁の新設に向けて動き出し、各行政機関がシームレスにつながることが期待されている。地方自治体におけるデジタル化、いわゆる自治体DXの推進に貢献するベンチャー企業のソリューションも枚挙にいとまがない。そこで、全国で初めてRPAを導入した五十嵐つくば市長と、今後求められる行政サービスについて展望する。',
		'header' => array(24),
		'speakers' => array(42,43,44,45),
		'moderators' => array(22),
		'header_names' => array(),
		'speaker_names' => array(),
	 ),
	 array(
		'time' => '17:00〜18:00',
		'title' => '「創業支援」',
		'content' => '近年、各自治体で地域発スタートアップを輩出するための支援施策が数多く繰り出されている。しかし他の先進諸国に比べて起業数が低い水準が続いている。スモールビジネス・コミュニティビジネスなどの創業支援も含めて、まさに「産官学金労言」の連携が求められる地域全体の課題である。人材・資金・ネットワーキング・PRなど様々な観点からベンチャーのリソースも活用していくことができるフィールドでもある。「あお★スタピッチ交流会」の開催などで勇名を馳せる小野寺青森市長とともに考える。',
		'header' => array(26),
		'speakers' => array(46,47,48,34),
		'moderators' => array(22),
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
			company: "<?php echo empty($person['company'])?'':$person['company']; ?>",
			jobtitle: "<?php echo $person['jobtitle']; ?>",
			company1: "<?php echo empty($person['company1'])?'':$person['company1']; ?>",
			jobtitle1: "<?php echo empty($person['jobtitle1'])?'':$person['jobtitle1']; ?>",
			bio: "<?php echo $person['bio']; ?>",
			uploadtime: "<?php echo $person['uploadtime']; ?>"
		}, 
<?php endforeach; ?>
	];		
</script>
        <div data-barba="wrapper">
            <div data-barba="container" data-barba-namespace="page-top">
                <div class="topIndexArea topIndexAreaSlider">
					<a href="<?php echo get_site_url(); ?>/magazine/" class="float-banner-second" id="float-banner-second">
                        事前エントリーは<br>こちら
                    </a>
                    <div class="event-titlediv second">
                        <img src="<?php echo $uploads_path; ?>/2021/12/hero-banner-headline3.png">
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
                                                        <source class="img" media="(max-width: 767px)" srcset="<?php echo $uploads_path; ?>/2021/12/thirdlp-hero-banner1.jpg">
                                                        <img class="js-rq-image objectFitImg01 img" src="<?php echo $uploads_path; ?>/2021/12/thirdlp-hero-banner1.jpg" alt="">
                                                    </picture>
                                                </figure>
                                            </div>
                                        </div>
                                        <div class="c-hksd-slider_slide">
                                            <div class="c-hksd-slider_slide_inner">
                                                <figure>
                                                    <picture>
                                                        <source class="img" media="(max-width: 767px)" srcset="<?php echo $uploads_path; ?>/2021/12/thirdlp-hero-banner2.jpg">
                                                        <img class="js-rq-image objectFitImg02 img" src="<?php echo $uploads_path; ?>/2021/12/thirdlp-hero-banner2.jpg" alt="">
                                                    </picture>
                                                </figure>
                                            </div>
                                        </div>
                                        <div class="c-hksd-slider_slide pre">
                                            <div class="c-hksd-slider_slide_inner">
                                                <figure>
                                                    <picture>
                                                        <source class="img" media="(max-width: 767px)" srcset="<?php echo $uploads_path; ?>/2021/12/thirdlp-hero-banner3.jpg">
                                                        <img class="js-rq-image objectFitImg03 img" src="<?php echo $uploads_path; ?>/2021/12/thirdlp-hero-banner3.jpg" alt="">
                                                    </picture>
                                                </figure>
                                            </div>
                                        </div>
                                        <div class="c-hksd-slider_slide pre">
                                            <div class="c-hksd-slider_slide_inner">
                                                <figure>
                                                    <picture>
                                                        <source class="img" media="(max-width: 767px)" srcset="<?php echo $uploads_path; ?>/2021/12/thirdlp-hero-banner4.jpg">
                                                        <img class="js-rq-image objectFitImg04 img" src="<?php echo $uploads_path; ?>/2021/12/thirdlp-hero-banner4.jpg" alt="">
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
			<h2 class="lp3-title"><font color="red">C</font>OMING SOON</h2>
			<p style="font-weight:bold; font-size:20px; margin-bottom:20px; display:none">
                COMING SOON
			</p>
            <div class="desktop-content">
                <p>
                    2015年に地方創生という種（シード）が植えられました。<br>
                    人口減少や東京一極集中という全国的な課題と、<br>
                    活動の担い手不足や経済活動の縮小といった地域的な課題が、<br>
                    その背景にありました。<br>
                    そうした課題意識に一番敏感だった自治体は、<br>
                    ベンチャー企業に注目しました。<br>
                    地域の中で起業の機会や環境を作る、<br>
                    あるいは地域に呼び込む魅力作りやその発信を行ってきたのが、<br>
                    スタートアップ都市推進協議会（スタ協）加盟自治体でした。<br>
                    一方で、ベンチャーによるイノベーションこそが<br>
                    地方創生の鍵となると信じた企業が集まってできたのが<br>
                    熱意ある地方創生ベンチャー連合（熱ベン）でした。<br>
                    この両者が繋がることで、地方創生の鍵は<br>
                    「良質で戦略的な官民連携」にあることが明らかになってきました。<br>
                    2022年、設立から7年目を迎え、地方創生の種は芽吹き、<br>
                    コロナ禍が吹き荒れる中でも、あるものはより高く、<br>
                    あるものはより広く、成長しています。<br>
                    その姿を「課題提起」「事業創出」「事例紹介」といった形で、<br>
                    深掘りしていきます。<br>
                </p>
            </div>
            <div class="mobile-content">
                <p>
                    2015年に地方創生という種（シード）が<br>
                    植えられました。<br>
                    人口減少や東京一極集中という全国的な課題と、<br>
                    活動の担い手不足や経済活動の<br>
                    縮小といった地域的な課題が、<br>
                    その背景にありました。<br>
                    そうした課題意識に一番敏感だった自治体は、<br>
                    ベンチャー企業に注目しました。<br>
                    地域の中で起業の機会や環境を作る、あるいは<br>
                    地域に呼び込む魅力作りやその発信を<br>
                    行ってきたのが、スタートアップ都市推進協議会<br>
                    （スタ協）加盟自治体でした。<br>
                    一方で、ベンチャーによるイノベーションこそが<br>
                    地方創生の鍵となると信じた企業が<br>
                    集まってできたのが熱意ある<br>
                    地方創生ベンチャー連合（熱ベン）でした。<br>
                    この両者が繋がることで、地方創生の鍵は<br>
                    「良質で戦略的な官民連携」にあることが<br>
                    明らかになってきました。<br>
                    2022年、設立から7年目を迎え、<br>
                    地方創生の種は芽吹き、<br>
                    コロナ禍が吹き荒れる中でも、<br>
                    あるものはより高く、あるものはより広く、<br>
                    成長しています。<br>
                    その姿を「課題提起」「事業創出」「事例紹介」<br>
                    といった形で、深掘りしていきます。<br>
                </p>
            </div>

			<div align="center" style="display:none">
                <!--<video controls>-->
                	<iframe width="560" height="315" src="https://www.youtube.com/embed/tyKRaqtIbM8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <!--<source src="<?php echo $uploads_path; ?>/2021/01/lpsecond.mp4" type="video/mp4">-->
                <!--</video> -->  
            </div>
			<p style="display: none"><a href="https://www.youtube.com/watch?v=tyKRaqtIbM8" class="online-register second">動画配信ページはこちら</a></p>
		</div>
    </div>
    <div class="lp-speakers third">
		<div class="inner">
    		<h2 class="lp3-title"><font color="red">S</font>PEAKER</h2>
			<div class="flex-container ">
<?php foreach($person_list as $person): 
			$company_job1 = "";
			if(!empty($person['company'])) $company_job1 = $person['company'];
			if(!empty($company_job1)) $company_job1 = $company_job1.' <span style="word-break: keep-all;">'.$person['jobtitle'].'</span>';
			else $company_job1 = $person['jobtitle'];

			$company_job2 = "";
			if(!empty($person['company1'])) $company_job2 = $person['company1'];
			if(!empty($company_job2)) $company_job2 = $company_job2.' <span style="word-break: keep-all;">'.$person['jobtitle1'].'</span>';
			else $company_job2 = $person['jobtitle1'];
?>
				<div class="person-item third modal-toggle" person-id="<?php echo $person['id']; ?>">
					<div class="__thumb third">
						<img src="<?php echo $uploads_path; ?>/<?php echo $person['uploadtime']; ?>/<?php echo $person['imgname']; ?>">
					</div>
					<p class="person-name third"><?php echo $person['name']; ?></p>
				<?php if(!empty($company_job1)): ?>
					<p class="person-detail" style="font-weight:bold;"><?php echo $company_job1; ?></p>
				<?php endif; ?>
				<?php if(!empty($company_job2)): ?>
					<p class="person-detail" style="font-weight:bold;"><?php echo $company_job2; ?></p>
				<?php endif; ?>
                    <div class="space-filler"></div>
                    <div class="person-profilediv"><a>Profile</a></div>
				</div>
<?php endforeach; ?>
				
			</div>
			<p style="width:100%; text-align:center;">＼ 登壇者は順次公開していきます。／</p>
		</div>
    </div>
    <div style="text-align: center; display: none;
            padding-top: 60px;
            padding-bottom: 60px;
            font-size: 32px;
            background-color: #fff5d9;">
        登壇者は決定次第<br class="mobile-content">紹介していきます
    </div>
	<div class="lp-schedule second" style="display:none;">
		<div class="inner ">
			<div style="title-div">
				<p class="lp2-title">タイムテーブル</p>
				<p class="person-name second">各セッションの動画をご覧いただけます。映像の右上にあるリストをご覧ください。</p>
			</div>
			<div align="center" style="display:block">
                <!--<video controls>-->
                	<iframe width="560" height="315" src="https://www.youtube.com/embed/videoseries?list=PLc0Z7FW6lukyaME00s0tAsd677IIUU0Zo" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    <!--<source src="<?php echo $uploads_path; ?>/2021/01/lpsecond.mp4" type="video/mp4">-->
                <!--</video> -->  
            </div>
<?php foreach($schedule_list as $schedule): ?>
			<div class="schedule-container">
				<div class="schedule-title-second"><?php echo $schedule['title']; ?></div>
				<div class="schedule-time"><?php echo $schedule['time']; ?></div>
				<div class="schedule-content-second"><?php echo $schedule['content']; ?></div>
<?php 		if(count($schedule['header']) > 0) : ?>
				<div class="speaker-level">登壇者（首長）</div>
				<div class="flex-container ">
<?php			foreach($schedule['header'] as $header): 
					$person = person_by_id($header);
?>
					<div class="person-item second modal-toggle" person-id="<?php echo $person['id']; ?>">
						<div class="__thumb second">
							<img src="<?php echo $uploads_path; ?>/<?php echo $person['uploadtime']; ?>/<?php echo $person['imgname']; ?>">
						</div>
						<p class="person-name second"><?php echo $person['name']; ?></p>
						<?php if(!empty($person['company'])): ?>
							<p class="person-detail" style="font-weight:bold;"><?php echo $person['company']; ?></p>
						<?php endif; ?>
						<p class="person-detail "><?php echo $person['jobtitle']; ?></p>
					</div>
<?php			endforeach; ?>
				</div>
<?php		endif; ?>
<?php 		if(count($schedule['speaker_names']) > 0) : ?>
				<div class="speaker-level regular"><?php echo speaker_title($schedule['title']); ?></div>
				<div class="flex-container ">
<?php			foreach($schedule['speaker_names'] as $speaker): 
					$person = person_by_id($speaker);
?>
					<div class="person-item second">
						<p class="person-name second"><?php echo $speaker; ?></p>
					</div>
<?php			endforeach; ?>
				</div>
<?php 		elseif(count($schedule['speakers']) > 0) : ?>
				<div class="speaker-level regular"><?php echo speaker_title($schedule['title']); ?></div>
				<div class="flex-container ">
<?php			foreach($schedule['speakers'] as $speaker): 
					$person = person_by_id($speaker);
?>
					<div class="person-item second modal-toggle" person-id="<?php echo $person['id']; ?>">
						<div class="__thumb second">
							<img src="<?php echo $uploads_path; ?>/<?php echo $person['uploadtime']; ?>/<?php echo $person['imgname']; ?>">
						</div>
						<p class="person-name second"><?php echo $person['name']; ?></p>
						<?php if(!empty($person['company'])): ?>
							<p class="person-detail" style="font-weight:bold;"><?php echo $person['company']; ?></p>
						<?php endif; ?>
						<p class="person-detail "><?php echo $person['jobtitle']; ?></p>
					</div>
<?php			endforeach; ?>
				</div>
<?php		endif; ?>
<?php 		if(count($schedule['moderators']) > 0) : ?>
				<div class="speaker-level" style="background-color: #D0E9FF;">モデレーター</div>
				<div class="flex-container ">
<?php			foreach($schedule['moderators'] as $moderator): 
					$person = person_by_id($moderator);
?>
					<div class="person-item second modal-toggle" person-id="<?php echo $person['id']; ?>">
						<div class="__thumb second">
							<img src="<?php echo $uploads_path; ?>/<?php echo $person['uploadtime']; ?>/<?php echo $person['imgname']; ?>">
						</div>
						<p class="person-name second"><?php echo $person['name']; ?></p>
						<?php if(!empty($person['company'])): ?>
							<p class="person-detail" style="font-weight:bold;"><?php echo $person['company']; ?></p>
						<?php endif; ?>
						<p class="person-detail "><?php echo $person['jobtitle']; ?></p>
					</div>
<?php			endforeach; ?>
				</div>
<?php		endif; ?>
			</div>
<?php endforeach; ?>
		</div>
	</div>
	<div class="lp-sponsor " style="display:none;">
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
	<div class="lp-sponsor " style="display:none">
		<div class="inner ">
			<div class="sponsor-regular-title">
				<p><span>レギュラースポンサー</span></p>
			</div>
			<div class="flex-container "> 
				<div class="lpsponsor-item ">
					<a href="https://aws.amazon.com/jp/ " target="_blank " rel="noopener noreferrer ">アマゾン<br>ウェブサービスジャパン<br>株式会社</a>
				</div>
			</div>
			<div class="flex-container " style="display:none">
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
	<div class="lp-hosting" style="display:none;">
		<div class="inner ">
			<div class="sponsor-title">
				<p><span>共催</span></p>
			</div>
		</div>
		<div class="hosting-item">
			<a href="http://startup-toshi.com/" target="_blank" rel="noopener noreferrer"><img src="<?php echo $uploads_path; ?>/2019/11/Mask-Group-39.png"></a>
		</div>
	</div>
	<div class="member " style="display:none;">
		<div class="inner">
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
			<div class="member-banner">
				<a href="https://www.asoview.co.jp/" target="_blank" rel="noopener noreferrer"><img src="/wp/wp-content/uploads/2019/11/05-1.png"></a>
				<p>アソビュー<br>
				株式会社</p>
			</div>
			<div class="member-banner">
				<a href="http://www.lancers.co.jp/" target="_blank" rel="noopener noreferrer"><img src="/wp/wp-content/uploads/2019/11/06.png"></a>
				<p>ランサーズ<br>
				株式会社</p>
			</div>
			<div class="member-banner">
				<a href="https://www.renoveru.jp/corporate/" target="_blank" rel="noopener noreferrer"><img src="/wp/wp-content/uploads/2019/11/54.png"></a>
				<p>リノベる<br>
				株式会社</p>
			</div>
			<div class="member-banner">
				<a href="https://readyfor.jp/" target="_blank" rel="noopener noreferrer"><img src="/wp/wp-content/uploads/2020/01/7c4e866123723e03ef075d660bf377c4.png"></a>
				<p>READYFOR<br>
				株式会社</p>
			</div>
			<div class="member-banner">
				<a href="https://lifull.com/" target="_blank" rel="noopener noreferrer"><img src="/wp/wp-content/uploads/2020/05/lifull.png"></a>
				<p>株式会社<br>
				LIFULL</p>
			</div>
			<div class="member-banner">
				<a href="https://agilehr.co.jp/" target="_blank" rel="noopener noreferrer"><img src="/wp/wp-content/uploads/2020/04/AHR.jpg"></a>
				<p>株式会社<br>
				アジャイルHR</p>
			</div>
			<div class="member-banner">
				<a href="https://mdc-japan.org" target="_blank" rel="noopener noreferrer"><img src="/wp/wp-content/uploads/2019/11/84.png"></a>
				<p>一般社団法人日本医療<br>
				デザインセンター</p>
			</div>
			<div class="member-banner">
				<a href="https://www.lgbreakthrough.jp" target="_blank" rel="noopener noreferrer"><img src="/wp/wp-content/uploads/2019/11/86.jpg"></a>
				<p>株式会社<br>
				LGブレイクスルー</p>
			</div>
			<div class="member-banner">
			<a href="https://www.oisixdotdaichi.co.jp/" target="_blank" rel="noopener noreferrer"><img src="/wp/wp-content/uploads/2019/11/31.jpg"></a>
				<p>オイシックス・ラ・大地<br>
				株式会社</p>
			</div>
			<div class="member-banner">
				<a href="https://www.oca.ac.jp/" target="_blank" rel="noopener noreferrer"><img src="/wp/wp-content/uploads/2020/07/oca.jpg"></a>
				<p>OCA大阪デザイン＆IT専門学校</p>
			</div>
			<div class="member-banner">
				<a href="https://www.kiramex.com/" target="_blank" rel="noopener noreferrer"><img src="/wp/wp-content/uploads/2019/11/02-1.png"></a>
				<p>キラメックス<br>
				株式会社</p>
			</div>
			<div class="member-banner">
				<a href="http://www.creema.co.jp/" target="_blank" rel="noopener noreferrer"><img src="/wp/wp-content/uploads/2019/11/51.png"></a>
				<p>株式会社<br>
				クリーマ</p>
			</div>
			<div class="member-banner">
				<a href="https://www.gldaily.com/" target="_blank" rel="noopener noreferrer"><img src="/wp/wp-content/uploads/2019/12/87.jpg"></a>
				<p>株式会社<br>
				グローバル・デイリー</p>
			</div>
			<div class="member-banner">
				<a href="http://www.globiscapital.co.jp/" target="_blank" rel="noopener noreferrer"><img src="/wp/wp-content/uploads/2019/11/21.png"></a>
				<p>株式会社グロービス・<br>
				キャピタル・パートナーズ</p>
			</div>
			<div class="member-banner">
				<a href="https://www.kddi.com/" target="_blank" rel="noopener noreferrer"><img src="/wp/wp-content/uploads/2019/11/70.jpg"></a>
				<p>KDDI株式会社</p>
			</div>
			<div class="member-banner">
				<a href="https://kouda-pro.co.jp/" target="_blank" rel="noopener noreferrer"><img src="/wp/wp-content/uploads/2021/01/kouda-pro.png"></a>
				<p>株式会社<br>
				コウダプロ</p>
			</div>
			<div class="member-banner">
				<a href="http://kotozna.com/" target="_blank" rel="noopener noreferrer"><img src="/wp/wp-content/uploads/2019/11/69.png"></a>
				<p>Kotozna株式会社</p>
			</div>
			<div class="member-banner">
				<a href="https://www.subak-tech.com/" target="_blank" rel="noopener noreferrer"><img src="/wp/wp-content/uploads/2020/04/subak.png"></a>
				<p>株式会社<br>
				スバックテクノロジーズ</p>
			</div>
			<div class="member-banner">
				<a href="http://skyer.info/" target="_blank" rel="noopener noreferrer"><img src="/wp/wp-content/uploads/2019/11/62.png"></a>
				<p>株式会社<br>
				skyer</p>
			</div>
			<div class="member-banner">
				<a href="https://zenkigen.co.jp/" target="_blank" rel="noopener noreferrer"><img src="/wp/wp-content/uploads/2019/11/76.png"></a>
				<p>株式会社<br>
				ZENKIGEN</p>
			</div>
			<div class="member-banner">
				<a href="http://chibra.co.jp/" target="_blank" rel="noopener noreferrer"><img src="/wp/wp-content/uploads/2019/11/13.png"></a>
				<p>株式会社<br>
				地域ブランディング
				研究所</p>
			</div>
			<div class="member-banner">
				<a href="http://www.toshin-seminar.co.jp/" target="_blank" rel="noopener noreferrer"><img src="/wp/wp-content/uploads/2019/11/48.png"></a>
				<p>株式会社<br>
				東進</p>
			</div>
			<div class="member-banner">
				<a href="https://batonz.jp/" target="_blank" rel="noopener noreferrer"><img src="/wp/wp-content/uploads/2020/06/batonz.png"></a>
				<p>株式会社<br>
				バトンズ</p>
			</div>
			<div class="member-banner">
				<a href="https://prtimes.co.jp/" target="_blank" rel="noopener noreferrer"><img src="/wp/wp-content/uploads/2019/11/77.png"></a>
				<p>株式会社<br>
				PRTIMES</p>
			</div>
			<div class="member-banner">
				<a href="https://pixta.co.jp/" target="_blank" rel="noopener noreferrer"><img src="/wp/wp-content/uploads/2019/11/09.png"></a>
				<p>ピクスタ<br>
				株式会社</p>
			</div>
			<div class="member-banner">
				<a href="http://www.b-tm.co.jp/" target="_blank" rel="noopener noreferrer"><img src="/wp/wp-content/uploads/2019/11/71.png"></a>
				<p>株式会社BTM</p>
			</div>
			<div class="member-banner">
				<a href="https://www.fvc.co.jp/" target="_blank" rel="noopener noreferrer"><img src="/wp/wp-content/uploads/2020/07/fvc_logo-1.png"></a>
				<p>フューチャベンチャーキャピタル<br>
				株式会社</p>
			</div>
			<div class="member-banner">
				<a href="https://fuller-inc.com" target="_blank" rel="noopener noreferrer"><img src="/wp/wp-content/uploads/2019/11/80.png"></a>
				<p>フラー<br>
				株式会社</p>
			</div>
			<div class="member-banner">
				<a href="http://peraichi.co.jp/" target="_blank" rel="noopener noreferrer"><img src="/wp/wp-content/uploads/2019/11/59.png"></a>
				<p>株式会社<br>
				ペライチ</p>
			</div>
			<div class="member-banner">
				<a href="https://www.vertex-p.com/" target="_blank" rel="noopener noreferrer"><img src="/wp/wp-content/uploads/2020/08/vertex.jpg"></a>
				<p>株式会社<br>
				ベルテクス・パートナーズ</p>
			</div>
			<div class="member-banner">
				<a href="http://www.zaigenkakuho.com/" target="_blank" rel="noopener noreferrer"><img src="/wp/wp-content/uploads/2019/11/10.png"></a>
				<p>株式会社<br>
				ホープ</p>
			</div>
			<div class="member-banner">
				<a href="https://komorebinook.jp/" target="_blank" rel="noopener noreferrer"><img src="/wp/wp-content/uploads/2020/03/KOMOREBINOOK-logo2-e1584674334529.jpg"></a>
				<p>株式会社<br>
				むらやま建設</p>
			</div>
			<div class="member-banner">
				<a href="http://47planning.jp/" target="_blank" rel="noopener noreferrer"><img src="/wp/wp-content/uploads/2019/11/78.png"></a>
				<p>株式会社<br>
				47PLANNING</p>
			</div>
			<div class="member-banner">
				<a href="https://lifeistech.co.jp/" target="_blank" rel="noopener noreferrer"><img src="/wp/wp-content/uploads/2019/11/52.png"></a>
				<p>ライフイズテック<br>
				株式会社</p>
			</div>
			<div class="member-banner">
				<a href="https://luup.sc/" target="_blank" rel="noopener noreferrer"><img src="/wp/wp-content/uploads/2019/11/72.png"></a>
				<p>株式会社<br>
				LUUP</p>
			</div>
			<div class="member-banner">
				<a href="http://l4d.jp/" target="_blank" rel="noopener noreferrer"><img src="/wp/wp-content/uploads/2020/07/level4design.png"></a>
				<p>株式会社<br>
				レベルフォーデザイン</p>
			</div>

			<div class="member-banner">
			</div>
			<div class="member-banner">
			</div>
			<div class="member-banner">
			</div>
			<div class="member-banner">
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