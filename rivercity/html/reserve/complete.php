<?php
// PHPMailer 使用のため言語・文字コーディングを明示的に指定
mb_language("Japanese");
mb_internal_encoding("UTF-8");

	/* ==================== data ==================== */

	//初期設定
	require('./common/include/define.php');

	//ページ設定
	$bodyClass = "transition contents contact";
	$pagename = "ご予約";
	$pagekeywords = "";
	$pageDescription = "";
	$pageOgpImg = "";

	/* ==================== /data ==================== */

// 設定ファイル読み込み
require_once("./config.php");
// 共通ファイル読み込み
require_once("./include/const.php");
require_once("./include/func.php");
require_once("./include/init.php");

// POST が無い場合は遷移
if (empty($_POST)) {
	header("Location: ./");
	exit();
}

// POST 前処理しない
// 表示しないのでエンティティ変換不要
$_LOCAL["post"] = $_POST;

// 入力値チェック
require_once("./check.php");

// エラーがある場合は入力フォームへ
if (!empty($_SESSION["error"])) {
	// header("Location: " . BASE_URL . CHILD_PATH . "/"); test
	// exit(); test
}

// マルチチェックボックス
$arkey = array(
	"ご相談内容・がん先進治療",
	"ご相談内容・がん予防・再発防止",
	"ご相談内容・がん超早期発見検査",
	"ご相談内容・その他",
	);
if (!empty($arkey)) {
	foreach ($arkey as $keytmp => $val) {
		$key = $val;
		if (!empty($_LOCAL["post"][$key])) {
			foreach ($_LOCAL["post"][$key] as $key2 => $val2) {
				$armsg[$key] .= "・" . $val2 . "\n";
			}
		}
	}
}

// メール本文作成
$msg .= "お名前"."： ".print_post_session("お名前", 0, 1)." ".print_post_session("お名前・名", 0, 1)."\n";
$msg .= "フリガナ"."： ".print_post_session("フリガナ", 0, 1)." ".print_post_session("フリガナ・名", 0, 1)."\n";
$msg .= "性別"."： ".print_post_session("性別", 0, 1)."\n";
$msg .= "年齢"."： ".print_post_session("年齢", 0, 1)."歳"."\n";
$msg .= "電話番号"."： ".print_post_session_num(array("電話番号", "電話番号2", "電話番号3"), 0, 1)."\n";
$msg .= "お電話可能な時間帯"."： ".print_post_session("お電話可能な時間帯", 0, 1)."\n";
$msg .= "メールアドレス"."： ".print_post_session("メールアドレス", 0, 1)."\n";
$msg .= "住所"."： ".print_post_session("住所", 0, 1)."\n";
$msg .= "ご希望の診察日"."： "."\n";
$msg .= "　・第一希望　".print_post_session("第一希望日", 0, 1)."　".print_post_session("第一希望時間", 0, 1)."\n";
$msg .= "　・第二希望　".print_post_session("第二希望日", 0, 1)."　".print_post_session("第二希望時間", 0, 1)."\n";

// RFC2822 によると998文字(CRLFを除く)を超えた行は不可
// http://www.ietf.org/rfc/rfc2822.txt
$msg .= "その他"."： "."\n".foldtext(print_post_session("その他", 0, 1), 996, "\n")."\n";

// PHPMailer 読み込み（全部読み込む）
require "./phpmailer/src/PHPMailer.php";
require "./phpmailer/src/SMTP.php";
require "./phpmailer/src/POP3.php";
require "./phpmailer/src/Exception.php";
require "./phpmailer/src/OAuth.php";
require "./phpmailer/language/phpmailer.lang-ja.php";
// PHPMailer 使用
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// メール送信処理
$o_mail = new PHPMailer();
$o_mail->CharSet = 'UTF-8';
$from = EMAIL_FROM;
$to = print_post_session("メールアドレス", 0, 1);
$subject = print_post_session("お名前", 0, 1)." ".print_post_session("お名前・名", 0, 1) . " 様" . "：" . EMAIL_SUBJECT;
// メール本文作成
$body .= "" . "\n";
$body .= "ご連絡ありがとうございます。" . "\n";
$body .= "下記の通り、仮のご予約を受け付けましたのでご確認くださいませ。" . "\n";
$body .= "" . "\n";
$body .= $msg;
$body .= "" . "\n";
$body .= "こちらのメールは自動で送信しております。" . "\n";
$body .= "当クリニックよりあらためてご連絡させていただき、" . "\n";
$body .= "提示した日時のご了承を頂いた時点でご予約完了となります。" . "\n";
$body .= "今しばらくお待ちくださいませ。" . "\n";
$body .= "" . "\n";
$body .= $mail_signature . "\n";
$body .= "" . "\n";
// 送信先設定
$o_mail->AddAddress($to);
// 送信元設定
$o_mail->From = $from;
$o_mail->FromName = mb_encode_mimeheader(EMAIL_FROM_NAME); // BASE64 でエンコード（文字化け防止）
// 件名設定
$o_mail->Subject = mb_encode_mimeheader($subject); // BASE64 でエンコード（文字化け防止）
// 本文設定
$o_mail->Body = mb_convert_encoding($body, "UTF-8");
// SPF 対応
$o_mail->Hostname = "rinku-medical-clinic.com";
$o_mail->Sender = EMAIL_FROM;
// if (IS_DEVELOPMENT) {
// 	$debug_print  = "<!--\n";
// 	$debug_print .= $body . "\n";
// 	$debug_print .= "-->\n";
// 	echo $debug_print;
// } else {
// 	if (!$o_mail->Send()) {
// 		die('エラー：メールが送信できませんでした。システム管理者にご連絡ください。');  //test
// 	}
// }
// 通知送信用メール件名作成
$subject =  EMAIL_SUBJECT. " （" . print_post_session("お名前", 0, 1)." ".print_post_session("お名前・名", 0, 1) . " 様）";
// 通知送信用メール本文作成
$body  = "" . "\n";
$body .= "下記の通り、受け付けました。" . "\n";
$body .= "" . "\n";
$body .= EMAIL_SUBJECT . "\n";
$body .= "--" . "\n";
$body .= $msg;
$body .= "" . "\n";
// 通知送信用メール件名設定
$o_mail->Subject =  mb_encode_mimeheader($subject); // BASE64 でエンコード（文字化け防止）
// 通知送信用メール本文設定
$o_mail->Body = mb_convert_encoding($body, "UTF-8");
// 通知送信
$o_mail->ClearAddresses();
$o_mail->ClearBCCs();
// config.php で定義済みの配列
if (is_array($email)) {
	foreach ($email as $key => $val) {
		$o_mail->AddAddress($val);
	}
} else {
	// 配列でなければ文字列とみなしてそのままセット
	$o_mail->AddAddress($email);
}
// if (IS_DEVELOPMENT) {
// 	$debug_print  = "<!--\n";
// 	$debug_print .= $body . "\n";
// 	$debug_print .= "-->\n";
// 	echo $debug_print;
// } else {
// 	if (!$o_mail->send()) {
// 		die('エラー：メールが送信できませんでした。システム管理者にご連絡ください。'); //test
// 	}
// }
?>
<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<!DOCTYPE html>
<html lang="ja">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
<?php require('./common/include/meta.php'); ?>
<link rel="stylesheet" href="./css/style.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
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
		<p>送信が完了しました</p>
	</section>
	<section class="inner">
		<div class="contactCotainer">
			<div class="form_flow">
				<p class="complete">入力</p>
				<p class="complete">内容確認</p>
				<p class="active">送信完了</p>
			</div>
			<p class="message">ご予約ありがとうございます。<br>
			ご入力いただいたメールアドレスに、内容確認メールをお送りしました。<br>
			あらためてご連絡差し上げますので、今しばらくお待ちください。</p>
			<div class="topBtn"><a href="/">&raquo;&nbsp;トップページに戻る</a></div>
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
// 不要配列の削除
unset($_POST);
// 不要セッションの削除
unset($_SESSION["post"]);
unset($_SESSION["token"]);
