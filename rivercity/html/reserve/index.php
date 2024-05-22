<?php
// 設定ファイル読み込み
require_once("./config.php");
// 共通ファイル読み込み
require_once("./include/const.php");
require_once("./include/func.php");
require_once("./include/init.php");

// マルチチェックボックス用の連想配列作成
$artmp = array();
$arkey = array(
	"ご相談内容・がん先進治療",
	"ご相談内容・がん予防・再発防止",
	"ご相談内容・がん超早期発見検査",
	"ご相談内容・その他",
	);
if (!empty($arkey)) {
	foreach ($arkey as $keytmp => $valtmp) {
		if (!is_null($_SESSION["post"][$valtmp])) {
			foreach ($_SESSION["post"][$valtmp] as $key => $val) {
				$artmp[$valtmp][$val] = " checked";
			}
		}
	}
}

	/* ==================== data ==================== */

	//初期設定
	require('./common/include/define.php');

	//ページ設定
	$bodyClass = "transition contents contact";
	$pagename = "ご予約";
	$catname = "";
	$pagetitle = $pagename.(($catname!="") ? " | ".$catname : "");
	$pagekeywords = "";
	$pageDescription = "";
	$pageOgpImg = "";

	/* ==================== /data ==================== */
?>
<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<!DOCTYPE html>
<html lang="ja">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
<?php require('./common/include/meta.php'); ?>
<link rel="stylesheet" href="./css/style.css">

<!-- プライバシーポリシー同意チェック -->
<script>
window.onpageshow = function(event) {
	var checkAgreement = document.getElementById('check');
	checkAgreement.checked = false;
};

function checkValue(check){
	var submitGo = document.getElementById('submit_go');

	if (check.checked) {
		submitGo.classList.remove("disabled");
		submitGo.removeAttribute("disabled");
	} else {
		submitGo.classList.add("disabled")
		submitGo.setAttribute("disabled", "disabled");
	}
}
</script>

<!-- 日付カレンダーIE対応 -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$( function() {
$( "#datepicker1,#datepicker2" ).datepicker( {
	dateFormat: 'yy年mm月dd日',
	monthNames: ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"],
	minDate: '+1d'
});
} );
</script>
</head>
<body id="PAGETOP" class="<?php echo $bodyClass;?>">
<div class="scrollup"><span> <i class="fas fa-chevron-up"></i></span></div>
<header>
	<div class="header_bar">
		<h1><a href="/"><img src="../images/header-logo.png" alt="<?php echo $sitename;?>"></a></h1>
	</div><!-- /header_bar -->
</header>
<main>
	<section class="contents_ttl">
		<h2><?php echo $pagename;?></h2>
	</section>
	<section class="inner">
		<div class="contactCotainer">
			<div class="form_flow">
				<p class="active">入力</p>
				<p>内容確認</p>
				<p>送信完了</p>
			</div>
			<form id="application" action="./confirm.php" method="post">
				<div class="form_area">
					<dl> 
						<dt>お名前<span>必須</span></dt>
						<dd class="short<?php print_error_class("お名前", 0); ?>"><em>姓</em><input type="text" name="お名前" value="<?php print_post_session("お名前"); ?>" placeholder=""><em>名</em><input type="text" name="お名前・名" value="<?php print_post_session("お名前・名"); ?>" placeholder=""><?php print_error_each_message("お名前", "b"); ?>
						</dd>
						<dt>フリガナ<span>必須</span></dt>
						<dd class="short<?php print_error_class("フリガナ", 0); ?>"><em>姓</em><input type="text" name="フリガナ" value="<?php print_post_session("フリガナ"); ?>" placeholder=""><em>名</em><input type="text" name="フリガナ・名" value="<?php print_post_session("フリガナ・名"); ?>" placeholder=""><?php print_error_each_message("フリガナ", "b"); ?>
						</dd>
						<dt>性別<span>必須</span></dt>
						<dd<?php print_error_class("性別", 1); ?>>
							<label><input type="radio" name="性別" value="男性"<?php print_checked("性別", "男性"); ?>>男性</label>
							<label><input type="radio" name="性別" value="女性"<?php print_checked("性別", "女性"); ?>>女性</label><?php print_error_each_message("性別", "b"); ?>
						</dd>
						<dt>年齢<span>必須</span></dt>
						<dd<?php print_error_class("年齢", 1); ?>>
							<input type="number" name="年齢" value="<?php print_post_session("年齢"); ?>">歳<?php print_error_each_message("年齢", "b"); ?>
							<!--<p class="excuse">※未成年者様の場合、保護者の同意書をお持ちくださいませ。ダウンロードは<a href="../common/pdf/approval.pdf" target="_blank">こちら</a></p>-->
						</dd>
						<dt>電話番号<span>必須</span></dt>
						<dd<?php print_error_class("電話番号", 1); ?>>
							<input type="tel" inputmode="tel" name="電話番号" maxlength="4" value="<?php print_post_session("電話番号"); ?>"> - <input type="tel" inputmode="tel" name="電話番号2" maxlength="4" value="<?php print_post_session("電話番号2"); ?>"> - <input type="tel" inputmode="tel" name="電話番号3" maxlength="4" value="<?php print_post_session("電話番号3"); ?>"><span class="excuse">（半角英数字）</span><?php print_error_each_message("電話番号", "b"); ?>
							<p class="excuse">※ご連絡可能な電話番号をご記入ください。<br>※ご不在の場合は留守番電話にメッセージを残させていただく場合もございますのでご了承ください。</p>
						</dd>
						<dt>お電話可能な時間帯<span>必須</span></dt>
						<dd<?php print_error_class("お電話可能な時間帯", 1); ?>>
							<label><input type="radio" name="お電話可能な時間帯" value="10時～12時"<?php print_checked("お電話可能な時間帯", "10時～12時"); ?>>10時～12時</label>
							<label><input type="radio" name="お電話可能な時間帯" value="12時～13時"<?php print_checked("お電話可能な時間帯", "12時～13時"); ?>>12時～13時</label>
							<label><input type="radio" name="お電話可能な時間帯" value="13時～18時"<?php print_checked("お電話可能な時間帯", "13時～18時"); ?>>13時～18時</label>
							<label><input type="radio" name="お電話可能な時間帯" value="18時～19時"<?php print_checked("お電話可能な時間帯", "18時～19時"); ?>>18時～19時</label>
							<label><input type="radio" name="お電話可能な時間帯" value="何時でも"  <?php print_checked("お電話可能な時間帯", "何時でも"); ?>>何時でも</label><?php print_error_each_message("お電話可能な時間帯", "b"); ?>
						</dd>
						<dt>メールアドレス<span>必須</span></dt>
						<dd<?php print_error_class("メールアドレス", 1); ?>><input type="email" inputmode="email" name="メールアドレス" value="<?php print_post_session("メールアドレス"); ?>"><span class="excuse">（半角英数字）</span><?php print_error_each_message("メールアドレス", "b"); ?></dd>
						<dt>メールアドレス（確認）<span>必須</span></dt>
						<dd<?php print_error_class("メールアドレス（確認）", 1); ?>><input type="email" inputmode="email" name="メールアドレス（確認）" value="<?php print_post_session("メールアドレス（確認）"); ?>"><span class="excuse">（半角英数字）</span><?php print_error_each_message("メールアドレス（確認）", "b"); ?></dd>
						<dt>住所</dt>
						<dd<?php print_error_class("住所", 1); ?>><input type="text" name="住所" value="<?php print_post_session("住所"); ?>"><?php print_error_each_message("住所", "b"); ?></dd>
						<dt>ご希望の診察日<span>必須</span></dt>
						<dd class="short<?php print_error_class("第一希望日", 0); ?>">
							<strong>第一希望</strong>
							<input type="text" id="datepicker1" name="第一希望日" value="<?php print_post_session("第一希望日"); ?>">
							<select name="第一希望時間">
								<option value="">お時間をお選びください</option>
								<option value="9:30〜10:30"<?php print_selected("第一希望時間", "9:30〜10:30"); ?>>9:30〜10:30</option>
								<option value="10:30〜11:30"<?php print_selected("第一希望時間", "10:30〜11:30"); ?>>10:30〜11:30</option>
								<option value="11:30〜12:30"<?php print_selected("第一希望時間", "11:30〜12:30"); ?>>11:30〜12:30</option>
								<option value="14:30〜15:30"<?php print_selected("第一希望時間", "14:30〜15:30"); ?>>14:30〜15:30</option>
								<option value="15:30〜16:30"<?php print_selected("第一希望時間", "15:30〜16:30"); ?>>15:30〜16:30</option>
								<option value="16:30〜17:30"<?php print_selected("第一希望時間", "16:30〜17:30"); ?>>16:30〜17:30</option>
								<option value="17:30〜18:30"<?php print_selected("第一希望時間", "17:30〜18:30"); ?>>17:30〜18:30</option>
							</select>
							<?php print_error_each_message("第一希望日", "b"); ?>
						</dd>
						<dd class="short<?php print_error_class("第二希望日", 0); ?>">
							<strong>第二希望</strong>
							<input type="text" id="datepicker2" name="第二希望日" value="<?php print_post_session("第二希望日"); ?>">
							<select name="第二希望時間">
								<option value="">お時間をお選びください</option>
								<option value="9:30〜10:30"<?php print_selected("第二希望時間", "9:30〜10:30"); ?>>9:30〜10:30</option>
								<option value="10:30〜11:30"<?php print_selected("第二希望時間", "10:30〜11:30"); ?>>10:30〜11:30</option>
								<option value="11:30〜12:30"<?php print_selected("第二希望時間", "11:30〜12:30"); ?>>11:30〜12:30</option>
								<option value="14:30〜15:30"<?php print_selected("第二希望時間", "14:30〜15:30"); ?>>14:30〜15:30</option>
								<option value="15:30〜16:30"<?php print_selected("第二希望時間", "15:30〜16:30"); ?>>15:30〜16:30</option>
								<option value="16:30〜17:30"<?php print_selected("第二希望時間", "16:30〜17:30"); ?>>16:30〜17:30</option>
								<option value="17:30〜18:30"<?php print_selected("第二希望時間", "17:30〜18:30"); ?>>17:30〜18:30</option>
							</select>
							<?php print_error_each_message("第二希望日", "b"); ?>
						</dd>
						<dt>その他</dt>
						<dd<?php print_error_class("その他", 1); ?>><textarea name="その他"><?php print_post_session("その他"); ?></textarea><?php print_error_each_message("その他", "b"); ?></dd>
					</dl>
				</div>
				
				<div class="attention">
					<h3>注意事項</h3>
					<p>こちらのフォームは仮のご予約受付です。ご入力いただいた連絡先に、当クリニックよりお電話かメールで折り返しご連絡させていただき、提示した日時のご了承を頂いた時点でご予約完了となります。</p>
					<p>・ご入力された内容に誤りがある場合、ご利用いただけない場合があります。<br>
						・メール送信後、内容確認メールが届かない場合は、再度ご記入いただくか、お電話でご予約ください。<br>
						・お電話でご連絡がつかない場合は、メールにてご連絡させていただくこともございますのでご確認くださいませ。<br>
						・お申込み（フォーム送信時間）より24時間が過ぎてもご本人様とご連絡がつかない場合は、自動的にキャンセルとなりますのでご注意くださいませ。<br>
						・お急ぎの方はお電話でもご予約を承ります。
					</p>
					<em>お電話でのお問い合せ</em>
					<p>TEL: <a href="tel:0120474770">0120-474-770</a><br>受付時間　9:30～18:30（月～金）</p>
					<em>メールアドレスの記載について</em>
					<p>携帯電話のメールアドレスで、迷惑メールの設定をされている場合、<a href="mailto:info@rivercity-clinic.jp">info@rivercity-clinic.jp</a>からの受信が行えるよう、設定のご確認をお願い致します。</p>
				</div>
				
				<div class="privacypolicy">
					<h3>プライバシーポリシー</h3>
					<div class="scroll">
						<p>リバーシティクリニック東京（以下当クリニック）は、個人の人格尊重の理念のもとに、ご利用される皆様のプライバシーを尊重し、個人情報の管理・保護に努めます。</p>
						<em>個人情報の収集について</em>
						<p>当クリニックが収集した個人情報は、ご利用者のお問い合わせやご相談への対応、医療サービスに対するご意見をいただくのに必要です。その他の目的に個人情報を利用する場合は、利用目的をあらかじめお知らせし、ご了解を得た上で実施致します。</p>
						<em>個人情報の利用について</em>
						<p>個人情報の利用にあたっては、その利用目的を特定することとし、特定された利用目的以外の利用はいたしません。</p>
						<em>個人情報の提供・開示について</em>
						<p>当クリニックでは、ご本人の同意を得ている場合を除き、取得した個人情報を第三者に提供することはいたしません。ただし、下記の項目に該当する場合、ご提供いただいた個人情報を開示することがあります。
							<span>・法令の規定による場合<br>情報主体または公衆の生命、健康、財産などの重大な利益を保護するために必要な場合</span>
							<span>・個人情報の管理<br>個人情報への不当なアクセスまたは個人情報の紛失、破壊、改ざん、漏洩等個人情報に関するリスクに対して、技術面および組織面において合理的な安全対策が必要な場合</span>
						</p>
						<em>個人情報に関する法令およびその他規範の遵守</em>
						<p>当クリニックは、個人情報保護を適切に実行する為に、「個人情報保護規定」を策定し、これを遵守いたします。また、院内規定・院内体制を定期的に見直し、継続的な維持改善に努めます。</p>
						<em>個人情報保護マネジメントシステムの継続的改善について</em>
						<p>当クリニックは、社会情勢・環境の変化を踏まえて、継続的に個人情報保護マネジメントシステムを見直し、 個人情報保護への取り組みを改善していきます。</p>
						<em>ホームページのクッキー（cookie）について</em>
						<p>サイトの最適化によるお客様サービスの向上を目的としたトラフィックデータの収集のため、当サイトではcookieの使用をしています。</p>
						<em>アクセスログ収集とその利用について</em>
						<p>本サイトでは、ご利用される皆様のアクセスをログ（履歴）として収集しております。これらのアクセスログは、サーバの運用状況や、ユーザー利便性向上のために利用され、それ以外の目的で利用されることはございません。</p>
						<em>内容改訂について</em>
						<p>当クリニックは「プライバシーポリシー」の内容を予告なく改訂する場合がございます。重要な改訂の場合、当ホームページ上にて皆様にお知らせいたします。</p>
						<em>個人情報の取扱いに関するお問合せについて</em>
						<p>当クリニックは、個人情報の取扱いに関する苦情及び相談を受けた場合は、その内容について迅速に事実関係等を調査し、 合理的な期間内に誠意をもって対応致します。当クリニックの個人情報の取扱いに関するご相談や苦情等のお問い合わせについては、 下記の窓口までご連絡いただきますよう、お願い申し上げます。</p>
						<em>［お問い合わせ先］</em>
						<p>リバーシティクリニック東京<br>TEL: <a href="tel:0120474770">0120-474-770</a><br>受付時間　9:30～18:30（月～金）</p>
					</div>
					<div class="privacypolicy_agree">
						<label><input type="checkbox" id="check" onclick="checkValue(this)">プライバシーポリシーに同意する</label>
					</div>
				</div>
				<div class="confirmBtn"><input type="submit" id="submit_go" class="disabled" value="内容を確認する" disabled="disabled"></div>
                <input type="hidden" name="token" value="<?php _h($_SESSION["token"]); ?>">
			</form>
		</div><!-- /contactCotainer -->
	</section><!-- /inner -->
</main>
<footer>
	<div class="inner-container">
		<p>
			© 医療法人社団わかと会<br class="sp"> リバーシティクリニック東京
		</p>
	</div>
</footer>
<script src="./common/js/smooth-scroll.polyfills.js"></script>
<script>
var scroll = new SmoothScroll('a[href*="#"]', {
	speed: 400,
	easing:'easeOutQuint'
});
$(function() {
	// Scroll_top_top
	jQuery(window).on("scroll", function() {
		console.log("hihih");
		if (jQuery(this).scrollTop() > 100) {
			jQuery(".scrollup").addClass("active");
		} else {
			jQuery(".scrollup").removeClass("active");
		}
	});

	jQuery(".scrollup").on("click", function() {
		jQuery("html, body").animate({
			scrollTop: 0
		}, 600);
		return false;
	});
});
</script>
</body>
</html>
<?php
// 不要セッションの削除
unset($_SESSION["post"]);
unset($_SESSION["error"]);
