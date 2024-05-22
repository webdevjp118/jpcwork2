<?php /* Template Name: Complete */ ?>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
get_header();
// PHPMailer 使用のため言語・文字コーディングを明示的に指定
mb_language("Japanese");
mb_internal_encoding("UTF-8");

/**
 * 出力用
 */
function _h($s)
{
	echo htmlspecialchars($s, ENT_QUOTES,'UTF-8');
}

/**
 * 変換のみ
 */
function _hr($s)
{
	return htmlspecialchars($s, ENT_QUOTES,'UTF-8');
}


/**
 * Eメールアドレス形式判定
 * 完璧ではないがある程度判定可能。
 * 
 * @param type $ma
 * @return type
 */
function is_emailaddress2($ma)
{
	// see also : http://fdays.blogspot.com/2007/10/rfc-2822-j0hn-d0e-10-pregmatch-9.html
	$ok = preg_match('/^[-+.\\w]+@[-a-z0-9]+(\\.[-a-z0-9]+)*\\.[a-z]{2,6}$/i', $ma);
	return $ok;
}

/**
 * 改行無しテキストを指定文字列で折りたたむ。
 * $fold は改行文字（列）。通常は "\n" を指定。
 * 
 * @param string $str
 * @param int $width
 * @param string $fold
 * @return string
 */
function foldtext($str, $width, $fold)
{
	$lines = explode("\n", $str);
	foreach ($lines as $line) {
		//	分割位置
		$pos = 0;
		$len = strlen($line);
		if (0 == $len) {
			$rval .= $fold;
		} else {
			while ($pos < $len) {
				$tmp = mb_strcut($line, $pos, $width, "UTF-8");
				$rval .= $tmp.$fold;
				$pos += strlen($tmp);
			}
		}
	}
	return $rval;
}

/**
 * ブラウザのキャッシュを抑制
 * 
 * @return none
 */
function controlcache()
{
//	header("Pragma: no-cache");
//	header("Expires: -1");
//	header('Cache-Control: no-cache');
//	header('Cache-Control: no-store');
	header('Expires:-1');
	header('Cache-Control:');
	header('Pragma:');
}


/**
 * POST セッションの出力用
 * セッションは $_SESSION["post"] 固定。
 * 
 * @param type $post_sess_name
 * @param type $echo
 * @param type $print_noinput
 * @return type
 */
function print_post_session($post_sess_name, $echo = 1, $print_noinput = 0)
{
	$s = "";
	if (empty($_SESSION["post"][$post_sess_name]) and 1 == $print_noinput) {
		$s = "（未入力）";
	} else {
		$s = $_SESSION["post"][$post_sess_name];
	}
	if ($echo) {
		_h($s);
	} else {
		return $s;
	}
}

/**
 * POST セッションの出力用（電話番号・郵便番号）
 * セッションは $_SESSION["post"] 固定。
 * 
 * @param type $post_sess_name
 * @param type $echo
 * @param type $print_noinput
 * @return type
 */
function print_post_session_num($post_sess_name, $echo = 1, $print_noinput = 0)
{
	$s = "";
	if (is_array($post_sess_name)) {
		$tmp = "";
		$tmp2 = "";
		foreach ($post_sess_name as $val) {
			$tmp .= $_SESSION["post"][$val];
			$tmp2 .= $_SESSION["post"][$val]."-";
		}
		$tmp2 = substr($tmp2, 0, -1);
	} else {
		$tmp = $_SESSION["post"][$post_sess_name];
		$tmp2 = $_SESSION["post"][$post_sess_name];
	}
	if (empty($tmp) and 1 == $print_noinput) {
		$s = "（未入力）";
	} else {
		$s = $tmp2;
	}
	if ($echo) {
		_h($s);
	} else {
		return $s;
	}
}



/**
 * strtotime()の日本語対応版
 *
 * @param string $sDate
 * @param boolean $blnNow
 * @return integer 
 */
function mb_strtotime($sDate = null, $blnNow = true)
{
	// 日本語版の対応
	if (preg_match('/^([0-9]{4})[年]{1}([0-9]{1,2})[月]{1}([0-9]{1,2})[日]{1}[\s　]([0-9]{1,2})[時]{1}([0-9]{1,2})[分]{1}([0-9]{1,2})[秒]{1}[\s　]*$/u', $sDate, $match)) { // YYYY年MM月DD日HH時MI分SS秒
		$sTimestamp = mktime($match[4], $match[5], $match[6], $match[2], $match[3], $match[1]);
	} else if (preg_match('/^([0-9]{4})[年]([0-9]{1,2})[月]([0-9]{1,2})[日][\s　]([0-9]{1,2})[時]([0-9]{1,2})[分][\s　]*$/u', $sDate, $match)) { // YYYY年MM月DD日HH時MI分
		$sTimestamp = mktime($match[4], $match[5], 0, $match[2], $match[3], $match[1]);
	} else if (preg_match('/^([0-9]{4})[年]([0-9]{1,2})[月]([0-9]{1,2})[日][\s　]*$/u', $sDate, $match)) { // YYYY年MM月DD日
		$sTimestamp = mktime(0, 0, 0, $match[2], $match[3], $match[1]);
	// 通常
	} else {
		$sTimestamp = strtotime($sDate, $blnNow);
	}
	return $sTimestamp;
}



/**
 * 初期化処理
 */
// エラー全出力
//ini_set( 'display_errors', 1 );
// エラー表示抑止
//error_reporting(E_ALL ^ E_NOTICE);

// 文字コード指定 UTF-8
header('Content-Type: text/html; charset=UTF-8');

// XSS攻撃検知してブロック（XSS対策）
header("X-XSS-Protection: 1; mode=block");

// IEにファイルの内容からファイルの種類を決定させない（XSS対策）
header("X-Content-Type-Options: nosniff");
// IEでダウンロードしたファイルを直接開かせない。
header("X-Download-Options: noopen");

// Content Security Policy 設定（XSS対策・データインジェクション対策）
//header( "X-Content-Security-Policy: default-src 'self'" );	// Firefox
//header( "X-WebKit-CSP: default-src 'self'" );				// Chrome, Safari
//header( "Content-Security-Policy: default-src 'self'" );	// W3C

// このページを iframe に埋め込ませない
header("X-Frame-Options: DENY");

// セッション開始
session_start();

// セッションIDを再生成（セッションハイジャック対策）
session_regenerate_id(true);

// キャッシュを抑制
controlcache();


// タイムゾーン設定 JST
date_default_timezone_set('Asia/Tokyo');


// POST が無い場合は遷移
if (empty($_POST)) {
	wp_redirect(get_site_url());
	exit();
}
$post_id = '';
if(isset($_POST['id'])) $post_id = $_POST['id'];
if(empty($post_id)) {
	wp_redirect(get_site_url());
	exit();
}
$noimage = get_stylesheet_directory_uri()."/images/noimage.jpg";
$company_3dcg = get_post_meta( $post_id, 'company_3dcg', true );
$company_name = get_post_meta( $post_id, 'company_name', true );
$company_sendemail = get_post_meta( $post_id, 'company_sendmail', true );
// POST 前処理しない
// 表示しないのでエンティティ変換不要

// 入力値チェック



// POST 前処理しない
// 表示時にエンティティ変換
$_LOCAL["post"] = $_POST;

// -------------------------------------------------
// 入力必須（その他）
// -------------------------------------------------

// お名前
$key = "病院様名";
$tmp = mb_convert_kana(trim($_LOCAL["post"][$key]), "rnKV", "UTF-8");
if (0 == strlen($tmp)) {
	$_SESSION["error"][$key] = '「' . $key . '」は必須項目です。';
} else {
	// 当該のエラーメッセージセッションを消去
	unset($_SESSION["error"][$key]);
}
$_SESSION["post"][$key] = $tmp;

// お名前
$key = "お名前";
$tmp = mb_convert_kana(trim($_LOCAL["post"][$key]), "rnKV", "UTF-8");
if (0 == strlen($tmp)) {
	$_SESSION["error"][$key] = '「' . $key . '」は必須項目です。';
} else {
	// 当該のエラーメッセージセッションを消去
	unset($_SESSION["error"][$key]);
}
$_SESSION["post"][$key] = $tmp;

// 電話番号
$key1 = "電話番号";
$key2 = "電話番号2";
$key3 = "電話番号3";
$tmp1 = mb_convert_kana(trim($_LOCAL["post"][$key1]), "ask", "UTF-8");
$tmp2 = mb_convert_kana(trim($_LOCAL["post"][$key2]), "ask", "UTF-8");
$tmp3 = mb_convert_kana(trim($_LOCAL["post"][$key3]), "ask", "UTF-8");
$tmp = $tmp1 . $tmp2 . $tmp3;
if (0 == strlen($tmp)) {
    $_SESSION["error"][$key1] = '「' . $key1 . '」は必須項目です。';
} else if ((strlen($tmp) < 10) or (strlen($tmp) > 11) or (!is_numeric($tmp))) {
	$_SESSION["error"][$key1] = '「' . $key1 . '」を正しく入力してください。';
} else {
	// 当該のエラーメッセージセッションを消去
	unset($_SESSION["error"][$key1]);
}
$_SESSION["post"][$key1] = $tmp1;
$_SESSION["post"][$key2] = $tmp2;
$_SESSION["post"][$key3] = $tmp3;

// メールアドレス
$key = "メールアドレス";
$tmp = mb_convert_kana(trim($_LOCAL["post"][$key]), "ask", "UTF-8");
if (0 == strlen($tmp)) {
    $_SESSION["error"][$key] = '「' . $key . '」は必須項目です。';
} else if (!is_emailaddress2($tmp)) {
	$_SESSION["error"][$key] = '「' . $key . '」を正しく入力してください。';
} else {
	unset($_SESSION["error"][$key]);
}
$_SESSION["post"][$key] = $tmp;

// メールアドレス（確認）
$key = "メールアドレス";
$key1 = "メールアドレス（確認）";
$tmp = mb_convert_kana(trim($_LOCAL["post"][$key]), "ask", "UTF-8");
$tmp1 = mb_convert_kana(trim($_LOCAL["post"][$key1]), "ask", "UTF-8");
if (0 == strlen($tmp1)) {
    $_SESSION["error"][$key1] = '「' . $key1 . '」は必須項目です。';
} else if (!is_emailaddress2($tmp1)) {
	$_SESSION["error"][$key1] = '「' . $key1 . '」を正しく入力してください。';
} else if ($tmp!=$tmp1)  {
	$_SESSION["error"][$key1] = '入力されたメールアドレスが確認用メールアドレスと一致しません。';
} else {
	unset($_SESSION["error"][$key1]);
}
$_SESSION["post"][$key] = $tmp;
$_SESSION["post"][$key1] = $tmp1;

// -------------------------------------------------
// その他（入力必須ではない項目）
// -------------------------------------------------

$key = "お問い合わせ内容";
$tmp = mb_convert_kana(trim($_LOCAL["post"][$key]), "rnKV", "UTF-8");
$_SESSION["post"][$key] = $tmp;



$_SESSION["post"]["id"] = $_LOCAL["post"]["id"];
// 入力値チェック（ここまで）
$product_names = [];
$product_keys = [];
for($i=1;$i<=$max_product_count;$i++){
	$temp = get_post_meta( $post_id, 'product'.$i.'_name', true);
	$product_keys[$i] = 'product'.$i.'_name';
	$product_names[$i] = '';
	if(!empty($temp)){
		$product_names[$i] = $temp;
	} 
}
$product_values = [];
for($i=1;$i<=$max_product_count;$i++){
	$product_values[$i] = '';
	if(!empty($_LOCAL['post'][$product_keys[$i]])){
		$product_values[$i] = $_LOCAL['post'][$product_keys[$i]];
		$_SESSION["post"][$product_keys[$i]] = $product_values[$i];
	}  
}
$product_count = $max_product_count;
if($company_name == $elephant_name) $product_count = 0;

// エラーがある場合は入力フォームへ
if (!empty($_SESSION["error"])) {
	wp_redirect(get_site_url().'/contact/');
	exit();
}

// メール本文作成
$msg .= "病院様名"."： ".print_post_session("病院様名", 0, 1)."\n";
$msg .= "お名前"."： ".print_post_session("お名前", 0, 1)."\n";
$msg .= "メールアドレス"."： ".print_post_session("メールアドレス", 0, 1)."\n";
$msg .= "電話番号"."： ".print_post_session_num(array("電話番号", "電話番号2", "電話番号3"), 0, 1)."\n";
	if($product_count > 0) {
	$msg .= "お問い合わせの製品【複数を選択可】："."\n";
	for($i=0;$i<=$max_product_count;$i++){
		if(!empty($product_values[$i])) $msg.= "   ".$product_names[$i]."\n";
	}
}
$msg .= "お問い合わせ内容"."： "."\n".foldtext(print_post_session("お問い合わせ内容", 0, 1), 996, "\n")."\n";
// PHPMailer 読み込み（全部読み込む）

$from = 'vets-ac@ci-medical.com';
$to =  $company_sendemail;
$subject = "VETSEXPO2021お問い合わせ";
// メール本文作成
$body .= "" . "\n";
$body .= "平素より格別なご愛顧賜り誠にありがとうございます。" . "\n";
$body .= "" . "\n";
$body .= "下記の内容にて、受け付け致しました。" . "\n";
$body .= "" . "\n";
$body .= "" . "\n";
$body .= $msg;
$body .= "" . "\n";
// 送信先設定
wp_mail( $to, $subject, $body);

$from = 'vets-ac@ci-medical.com';
$to =  print_post_session("メールアドレス", 0, 1);
$subject = "VETSEXPO2021お問い合わせ";

$body = "";

$body .= "" . "\n";
$body .= "平素より格別なご愛顧賜り誠にありがとうございます。" . "\n";
$body .= "" . "\n";
$body .= "下記の内容にて、受け付け致しました。" . "\n";
$body .= "企業からの連絡をお待ちください。" . "\n";
$body .= "" . "\n";
$body .= "" . "\n";
$body .= $msg;
$body .= "" . "\n";

wp_mail( $to, $subject, $body);
?>

<main id="primary" class="site-main">
	<section class="contents_ttl">
		<h2>お問い合わせフォーム</h2>
		<p>送信が完了しました</p>
	</section>
	<section class="inner">
		<div class="contactCotainer">
			<div class="form_flow">
				<p class="complete">入力</p>
				<p class="complete">内容確認</p>
				<p class="active">送信完了</p>
			</div>
			<p class="message">お問い合わせありがとうございます。<br>
			<div class="topBtn"><a href="<?php echo get_site_url().'/company/'.$post_id; ?>">&raquo;&nbsp;<?php echo $company_name; ?>ページに戻る</a></div>
		</div><!-- /contactCotainer -->
	</section><!-- /inner -->
</main>

<?php
get_footer();
// 不要配列の削除
unset($_POST);
// 不要セッションの削除
unset($_SESSION["post"]);
unset($_SESSION["token"]);
