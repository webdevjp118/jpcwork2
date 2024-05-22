<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// PHPMailer 使用のため言語・文字コーディングを明示的に指定
mb_language("Japanese");
mb_internal_encoding("UTF-8");

	/* ==================== data ==================== */

	//初期設定
	//共通
	$siteURL = (empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"];
	$pageURL = (empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
	$sitename = "SiteName___replace";
	$keywords = "Keywords___replace";
	$description = "Description___replace";

	//ページ設定
	$bodyClass = "transition contents contact";
	$pagename = "ご予約";
	$pagekeywords = "";
	$pageDescription = "";
	$pageOgpImg = "";

	/* ==================== /data ==================== */

// 設定ファイル読み込み


/**
 * 定数定義
 */

// URLパス
define("CHILD_PATH", "/reserve");

// メール関連
define("EMAIL_SUBJECT", "Email Subject___replace");
define("EMAIL_FROM", "info@sitedomain___replace.com");
define("EMAIL_FROM_NAME", "SITEDOMAIN___replace");
// 通知メール宛先（複数対応）
$email = array(
	'info@sitedomain___replace.com',
	// 'info@sitedomain.com',
);
// メール署名
$mail_signature = <<<EOF
==============================================================

SITEDOMAIN

Address___replace
TEL：PhoneNumber___replace
E-MAIL：info@sitedomain___replace.com
https://sitedomain___replace.com

==============================================================
EOF;

// HTTPS 経由か判定
if (is_https()) {
	$protocol = "https://";
} else {
	$protocol = "http://";
}


/**
 * HTTPS 経由での接続かどうか判定する。
 * @return bool
 */
function is_https()
{
	// Apache
	if (isset($_SERVER['HTTPS']) === true) {
		return ($_SERVER['HTTPS'] === 'on' or $_SERVER['HTTPS'] === '1');
	// IIS
	} else if (isset($_SERVER['SSL']) === true) {
		return ($_SERVER['SSL'] === 'on');
	// Reverse proxy
	} else if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) === true) {
		return (strtolower($_SERVER['HTTP_X_FORWARDED_PROTO']) === 'https');
	// Reverse proxy
	} else if (isset($_SERVER['HTTP_X_FORWARDED_PORT']) === true) {
		return ($_SERVER['HTTP_X_FORWARDED_PORT'] === '443');
	} elseif (isset($_SERVER['SERVER_PORT']) === true) {
		return ($_SERVER['SERVER_PORT'] === '443');
	}

	return false;
}


// 共通ファイル読み込み



// ホスト名取得（ポート番号削除）
$hostname = str_replace(":443", "", $_SERVER["HTTP_HOST"]);

define("SITE_DOMAIN", "sitedomain___replace.com");
define("SITE_URL", $protocol."".SITE_DOMAIN);

// ホスト名により定数設定
switch ($hostname) {
// テスト用サーバ
case "sitedomain___replace.work.com":
	// 開発環境
	define("IS_DEVELOPMENT", 0);
	// URL
	define("BASE_URL", $protocol."sitedomain___replace.work.com");
	break;
// 本番用サーバ
case "www.sitedomain___replace.com":
case "sitedomain___replace.com":
default:
	// 開発環境
	define("IS_DEVELOPMENT", 0);
	// URL
	define("BASE_URL", $protocol."sitedomain___replace.com");
	break;
}

// マルチバイト文字のバイト数（UTF-8 なので 3バイト）
define("MBWIDTH", 3);

// sha1() 用の salt
define('SALT', "_himitsu");

// CSRF対策用のトークン長（16 * 2 = 32バイト）
define('TOKEN_LENGTH', 16);



/**
 * 問い合わせフォーム用関数群
 */

/**
 * POST の前処理
 * 
 * @param array $ars
 * @param array $ard
 * @return boolean
 */
function preproc_post(&$ars, &$ard)
{
	// 配列の場合は処理
	if (is_array($ars)) {
		foreach ($ars as $key => $val) {
			// 配列（チェックボックス）なら再帰処理
			if (is_array($val)) {
				preproc_post($ars[$key], $ard[$key]);
			} else {
				// 特殊文字を HTML エンティティに変換
				$tmp = htmlspecialchars($val);
				// magic_quotes_gpc が On なら stripslashes()
				if (get_magic_quotes_gpc()) {
					// '\' を取り除く
					$tmp = stripslashes($tmp);
				}
				$ard[$key] = $tmp;
			}
		}
		return TRUE;
	} else {
		return FALSE;
	}
}

/**
 * GET の前処理
 * 
 * @param array $ars
 * @param array $ard
 * @return boolean
 */
function preproc_get(&$ars, &$ard)
{
	if (is_array($ars)) {
		// 特殊文字を HTML エンティティに変換
		foreach ($ars as $key => $val) {
			$ard[$key] = htmlspecialchars($val);
		}
		return TRUE;
	} else {
		return FALSE;
	}
}

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
 * セッション終了処理
 * 
 * @return boolean
 */
function session_end()
{
	$_SESSION = array();
	return session_destroy();
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
 * ドキュメントルート取得
 * SSL が別ディレクトリの場合などに使う。
 * 
 * @return boolean
 */
function documentRoot()
{
	if (!isset($_SERVER["SCRIPT_NAME"]) || !isset($_SERVER["SCRIPT_FILENAME"])) {
		return false;
	}
	$name = $_SERVER["SCRIPT_NAME"];
	$filename = $_SERVER["SCRIPT_FILENAME"];
	$dr = substr($filename, 0, strlen($filename) - strlen($name));
	return str_replace("/", DIRECTORY_SEPARATOR, $dr);
}

/**
 * トークン生成
 * CSRF対策のためのトークンを生成する。
 * 
 * @return string
 */
function get_token()
{
	return bin2hex(openssl_random_pseudo_bytes(TOKEN_LENGTH));
}

/**
 * リファラーのチェック処理
 * CSRF対策としてリファラーのチェックを行なう
 * 
 * @param string $url
 * @return none
 */
function check_referer($url)
{
	// リファラーが存在しなければトップに遷移
	if (!isset($_SERVER["HTTP_REFERER"])) {
		header("Location: ./error.php");
		exit();
	}
	if (is_array($url)) {
		$rval = 0;
		// リファラーが配列内に存在しない場合はトップに遷移
		if (!in_array($_SERVER["HTTP_REFERER"], $url, true)) {
			header("Location: ./error.php");
			exit();
		}
		// リファラーが指定のものと異なる場合はトップに遷移
	} else if ($_SERVER["HTTP_REFERER"] !== $url) {
		header("Location: ./error.php");
		exit();
	}
}

/**
 * 入力値の文字エンコーディングチェック
 * UTF-8 で統一することが前提。
 * 
 * @example array_walk_recursive($array, 'check_encoding');
 */
function check_encoding($key, $value)
{
	if (!mb_check_encoding($value, 'UTF-8')) {
		die('不正な文字コード');
	}
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
 * エラー表示用クラス名出力
 * エラー発生時のセッションは $_SESSION["error"] 固定。
 * エラー表示用のクラス名は error 固定。
 * 
 * @param string $error_sess_name
 * @param boolean $class_string
 */
function print_error_class($error_sess_name, $class_string = 0)
{
	$s = "";
	if (!empty($_SESSION["error"][$error_sess_name])) {
		if ($class_string) {
			$s = ' class="error"';
		} else {
			$s .= ' error';
		}
	}
	echo $s;
}

/**
 * 項目ごとにエラーメッセージ表示
 * エラー発生時のセッションは $_SESSION["error"] 固定。
 * エラー表示用のクラス名は error 固定。
 * 
 * @param string $error_sess_name
 * @param string $elm
 */
function print_error_each_message($error_sess_name, $elm)
{
	$s = "";
	if (!empty($_SESSION["error"][$error_sess_name])) {
		$s = '<'.$elm.' class="error">';
		$s .= $_SESSION["error"][$error_sess_name];
		$s .= '</'.$elm.'>';
	}
	echo $s;
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
 * radio の checked 出力用
 * セッションは $_SESSION["post"] 固定。
 * 
 * @param type $post_sess_name
 * @param type $value_for_compare
 * @param type $echo
 * @return string
 */
function print_checked($post_sess_name, $value_for_compare, $echo = 1)
{
	$s = "";
	if ($value_for_compare == $_SESSION["post"][$post_sess_name]) {
		$s = " checked";
	} else {
		$s = "";
	}
	if ($echo) {
		echo $s;
	} else {
		return $s;
	}
}

/**
 * select の selected 出力用
 * セッションは $_SESSION["post"] 固定。
 * 
 * @param type $post_sess_name
 * @param type $value_for_compare
 * @param type $echo
 * @return string
 */
function print_selected($post_sess_name, $value_for_compare, $echo = 1)
{
	$s = "";
	if ($value_for_compare == $_SESSION["post"][$post_sess_name]) {
		$s = " selected";
	} else {
		$s = "";
	}
	if ($echo) {
		echo $s;
	} else {
		return $s;
	}
}

/**
 * 現在時刻とIPアドレスからキーを作成
 * 一意のIDとして使用・セッションにセットするのに使用
 * 
 * @return type
 */
function gen_key()
{
	return (sha1(date('Y-m-d H:i:s')." ".$_SERVER["REMOTE_ADDR"]));
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

// 「戻る」ボタンでの期限切れ表示の抑制
session_cache_limiter('private, must-revalidate');

// セッション開始
session_start();

// セッションIDを再生成（セッションハイジャック対策）
session_regenerate_id(true);

// キャッシュを抑制
controlcache();

// トークン設定・確認処理（CSRF対策）
if ('POST' != $_SERVER['REQUEST_METHOD']) {
	// GET の場合はトークンをセット（トークンのチェックは行なわない）
	$_SESSION["token"] = get_token();
} else {
	// POST の場合は一律にトークンをチェック（トークンのセットは行なわない）
    if (empty($_SESSION["token"])) {
		// トークンが空の場合は不正遷移
 		header("Location: ./error.php");
		exit();
    }
	if ($_SESSION["token"] != filter_input(INPUT_POST, "token")) {
		// トークンが一致しない場合は不正遷移
 		header("Location: ./error.php");
		exit();
	}
}

// タイムゾーン設定 JST
date_default_timezone_set('Asia/Tokyo');


// POST が無い場合は遷移
if (empty($_POST)) {
	header("Location: ./");
	exit();
}

// POST 前処理しない
// 表示しないのでエンティティ変換不要
$_LOCAL["post"] = $_POST;

// 入力値チェック


// -------------------------------------------------
// マルチチェックボックス
// -------------------------------------------------

$arkey = array(
	"ご相談内容・がん先進治療",
	"ご相談内容・がん予防・再発防止",
	"ご相談内容・がん超早期発見検査",
	"ご相談内容・その他",
	);
$flg_multi_checkbox = 0;
if (!empty($arkey)) {
	foreach ($arkey as $keytmp => $val) {
		$key = $val;
		$tmp = $_LOCAL["post"][$key];
		if (empty($tmp)) {
			//$_SESSION["error"][$key] = '「' . $key . '」は最低でも一つチェックしてください。';
		} else {
			$flg_multi_checkbox++;
		}
		$_SESSION["post"][$key] = $tmp;
	}
	if (0 == $flg_multi_checkbox) {
		$_SESSION["error"]["ご相談内容"] = '「ご相談内容」は最低でも一つチェックしてください。';
	} else {
		unset($_SESSION["error"]["ご相談内容"]);
	}
}

// -------------------------------------------------
// 入力必須（全角文字列）
// -------------------------------------------------

$arkey = array(
    "性別",
    "お電話可能な時間帯",
	);
if (!empty($arkey)) {
	foreach ($arkey as $keytmp => $val) {
		$key = $val;
		$tmp = mb_convert_kana(trim($_LOCAL["post"][$key]), "rnKV", "UTF-8");
		if (empty($tmp)) {
			$_SESSION["error"][$key] = '「' . $key . '」は必須項目です。';
		} else {
			unset($_SESSION["error"][$key]);
		}
		$_SESSION["post"][$key] = $tmp;
	}
}

// -------------------------------------------------
// 入力必須（全角カナ変換）
// -------------------------------------------------
$arkey = array(
	);
if (!empty($arkey)) {
	foreach ($arkey as $keytmp => $val) {
		$key = $val;
		$tmp = mb_convert_kana(trim($_LOCAL["post"][$key]), "rnCKV", "UTF-8");
		if (empty($tmp)) {
			$_SESSION["error"][$key] = '「' . $key . '」は必須項目です。';
		} else {
			unset($_SESSION["error"][$key]);
		}
		$_SESSION["post"][$key] = $tmp;
	}
}

// -------------------------------------------------
// 入力必須（その他）
// -------------------------------------------------

// お名前
$key1 = "お名前";
$key2 = "お名前・名";
$tmp1 = mb_convert_kana(trim($_LOCAL["post"][$key1]), "rnKV", "UTF-8");
$tmp2 = mb_convert_kana(trim($_LOCAL["post"][$key2]), "rnKV", "UTF-8");
if (0 == strlen($tmp1) or 0 == strlen($tmp2)) {
	$_SESSION["error"][$key1] = '「' . $key1 . '」は必須項目です。';
} else {
	// 当該のエラーメッセージセッションを消去
	unset($_SESSION["error"][$key1]);
}
$_SESSION["post"][$key1] = $tmp1;
$_SESSION["post"][$key2] = $tmp2;

// フリガナ
$key1 = "フリガナ";
$key2 = "フリガナ・名";
$tmp1 = mb_convert_kana(trim($_LOCAL["post"][$key1]), "rnKVC", "UTF-8");
$tmp2 = mb_convert_kana(trim($_LOCAL["post"][$key2]), "rnKVC", "UTF-8");
if (0 == strlen($tmp1) or 0 == strlen($tmp2)) {
	$_SESSION["error"][$key1] = '「' . $key1 . '」は必須項目です。';
} else {
	// 当該のエラーメッセージセッションを消去
	unset($_SESSION["error"][$key1]);
}
$_SESSION["post"][$key1] = $tmp1;
$_SESSION["post"][$key2] = $tmp2;

// 年齢
$key = "年齢";
$tmp = mb_convert_kana(trim($_LOCAL["post"][$key]), "rnKV", "UTF-8");
if (0 == strlen($tmp)) {
	$_SESSION["error"][$key] = '「'.$key.'」は必須項目です。';
} else if (!is_numeric($tmp)) {
	$_SESSION["error"][$key] = '「'.$key.'」は数字で入力してください。';
} else if (0 >= $tmp) {
	$_SESSION["error"][$key] = '「'.$key.'」は0以上の数字で入力してください。';
} else {
	unset($_SESSION["error"][$key]);
}
$_SESSION["post"][$key] = $tmp;


$_now = time();

// ご希望の診察日・第一希望
$key1 = "第一希望日";
$key2 = "第一希望時間";
$tmp1 = mb_convert_kana(trim($_LOCAL["post"][$key1]), "rnKV", "UTF-8");
$tmp2 = mb_convert_kana(trim($_LOCAL["post"][$key2]), "rnKV", "UTF-8");
$_time = mb_strtotime($tmp1." 00時00分00秒");
if (0 == strlen($tmp1) or 0 == strlen($tmp2)) {
	$_SESSION["error"][$key1] = '「第一希望」は必須項目です。';
} else if ($_now > $_time) {
	$_SESSION["error"][$key1] = '「第一希望」は明日以降の日付を選んでください。';
} else {
	// 当該のエラーメッセージセッションを消去
	unset($_SESSION["error"][$key1]);
}
$_SESSION["post"][$key1] = $tmp1;
$_SESSION["post"][$key2] = $tmp2;

// ご希望の診察日・第二希望
$key1 = "第二希望日";
$key2 = "第二希望時間";
$tmp1 = mb_convert_kana(trim($_LOCAL["post"][$key1]), "rnKV", "UTF-8");
$tmp2 = mb_convert_kana(trim($_LOCAL["post"][$key2]), "rnKV", "UTF-8");
$_time = mb_strtotime($tmp1." 00時00分00秒");
if (0 == strlen($tmp1) or 0 == strlen($tmp2)) {
	$_SESSION["error"][$key1] = '「第二希望」は必須項目です。';
} else if ($_now > $_time) {
	$_SESSION["error"][$key1] = '「第二希望」は明日以降の日付を選んでください。';
} else {
	// 当該のエラーメッセージセッションを消去
	unset($_SESSION["error"][$key1]);
}
$_SESSION["post"][$key1] = $tmp1;
$_SESSION["post"][$key2] = $tmp2;

//// 郵便番号
//$key1 = "郵便番号";
//$key2 = "郵便番号2";
//$tmp1 = mb_convert_kana(trim($_LOCAL["post"][$key1]), "ask", "UTF-8");
//$tmp2 = mb_convert_kana(trim($_LOCAL["post"][$key2]), "ask", "UTF-8");
//$tmp = $tmp1 . $tmp2;
//if (strlen($tmp) != 7 or !is_numeric($tmp)) {
//	$_SESSION["error"][$key1] = '「' . $key1 . '」を正しく入力してください。';
//} else {
//	// 当該のエラーメッセージセッションを消去
//	unset($_SESSION["error"][$key1]);
//}
//$_SESSION["post"][$key1] = $tmp1;
//$_SESSION["post"][$key2] = $tmp2;

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

//// FAX
//$key1 = "FAX";
//$key2 = "FAX2";
//$key3 = "FAX3";
//$tmp1 = mb_convert_kana(trim($_LOCAL["post"][$key1]), "ask", "UTF-8");
//$tmp2 = mb_convert_kana(trim($_LOCAL["post"][$key2]), "ask", "UTF-8");
//$tmp3 = mb_convert_kana(trim($_LOCAL["post"][$key3]), "ask", "UTF-8");
//$tmp = $tmp1 . $tmp2 . $tmp3;
//if (0 < strlen($tmp)) {
//    if ((strlen($tmp) < 10) or (strlen($tmp) > 11) or (!is_numeric($tmp))) {
//        $_SESSION["error"][$key1] = '「' . $key1 . '」を正しく入力してください。';
//    } else {
//        // 当該のエラーメッセージセッションを消去
//        unset($_SESSION["error"][$key1]);
//    }
//}
//$_SESSION["post"][$key1] = $tmp1;
//$_SESSION["post"][$key2] = $tmp2;
//$_SESSION["post"][$key3] = $tmp3;

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

// 診察について
$key = "診察について";
$tmp = mb_convert_kana(trim($_LOCAL["post"][$key]), "rnKV", "UTF-8");
if (0 == strlen($tmp)) {
	$_SESSION["error"][$key] = '「'.$key.'」は必須項目です。';
} else {
	unset($_SESSION["error"][$key]);
}
$_SESSION["post"][$key] = $tmp;

// -------------------------------------------------
// その他（入力必須ではない項目）
// -------------------------------------------------

//// ご質問など
//$key = "ご質問など";
//$tmp = mb_convert_kana(trim($_LOCAL["post"][$key]), "rnKV", "UTF-8");
//$_SESSION["post"][$key] = $tmp;

//// 会社名
//$key = "会社名";
//$tmp = mb_convert_kana(trim($_LOCAL["post"][$key]), "rnKV", "UTF-8");
//$_SESSION["post"][$key] = $tmp;

//// 電話番号
//$key1 = "電話番号";
//$key2 = "電話番号2";
//$key3 = "電話番号3";
//$tmp1 = mb_convert_kana(trim($_LOCAL["post"][$key1]), "ask", "UTF-8");
//$tmp2 = mb_convert_kana(trim($_LOCAL["post"][$key2]), "ask", "UTF-8");
//$tmp3 = mb_convert_kana(trim($_LOCAL["post"][$key3]), "ask", "UTF-8");
//$tmp = $tmp1 . $tmp2 . $tmp3;
//if (0 < strlen($tmp)) {
//	if ((strlen($tmp) < 10) or (strlen($tmp) > 11) or (!is_numeric($tmp))) {
//		$_SESSION["error"][$key1] = '「' . $key1 . '」を正しく入力してください。';
//	} else {
//		// 当該のエラーメッセージセッションを消去
//		unset($_SESSION["error"][$key1]);
//	}
//} else {
//	// 当該のエラーメッセージセッションを消去
//	unset($_SESSION["error"][$key1]);
//}
//$_SESSION["post"][$key1] = $tmp1;
//$_SESSION["post"][$key2] = $tmp2;
//$_SESSION["post"][$key3] = $tmp3;

//// 郵便番号
//$key1 = "郵便番号";
//$key2 = "郵便番号2";
//$tmp1 = mb_convert_kana(trim($_LOCAL["post"][$key1]), "ask", "UTF-8");
//$tmp2 = mb_convert_kana(trim($_LOCAL["post"][$key2]), "ask", "UTF-8");
//$tmp = $tmp1 . $tmp2;
//if (0 < strlen($tmp)) {
//	if (strlen($tmp) != 7 or !is_numeric($tmp)) {
//		$_SESSION["error"][$key1] = '「' . $key1 . '」を正しく入力してください。';
//	} else {
//		// 当該のエラーメッセージセッションを消去
//		unset($_SESSION["error"][$key1]);
//	}
//} else {
//	// 当該のエラーメッセージセッションを消去
//	unset($_SESSION["error"][$key1]);
//}
//$_SESSION["post"][$key1] = $tmp1;
//$_SESSION["post"][$key2] = $tmp2;

// 住所
$key = "住所";
$tmp = mb_convert_kana(trim($_LOCAL["post"][$key]), "rnKV", "UTF-8");
$_SESSION["post"][$key] = $tmp;

// かかりつけ
$key = "かかりつけ";
$tmp = mb_convert_kana(trim($_LOCAL["post"][$key]), "rnKV", "UTF-8");
$_SESSION["post"][$key] = $tmp;

// ご紹介者
$key = "ご紹介者";
$tmp = mb_convert_kana(trim($_LOCAL["post"][$key]), "rnKV", "UTF-8");
$_SESSION["post"][$key] = $tmp;

// その他
$key = "その他";
$tmp = mb_convert_kana(trim($_LOCAL["post"][$key]), "rnKV", "UTF-8");
$_SESSION["post"][$key] = $tmp;

// 入力値チェック（ここまで）



// エラーがある場合は入力フォームへ
if (!empty($_SESSION["error"])) {
	header("Location: ./");
	exit();
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
$msg .= "かかりつけ"."： ".print_post_session("かかりつけ", 0, 1)."\n";
$msg .= "ご紹介者"."： ".print_post_session("ご紹介者", 0, 1)."\n";
$msg .= "診察について"."： ".print_post_session("診察について", 0, 1)."\n";
$msg .= "ご相談内容"."： "."\n";
if (!empty($_SESSION["post"]["ご相談内容・がん先進治療"])) {
	$msg .= "　がん先進治療"."\n";
	foreach ($_SESSION["post"]["ご相談内容・がん先進治療"] as $val) {
		$msg .= "　・".$val."\n";
	}
}
if (!empty($_SESSION["post"]["ご相談内容・がん予防・再発防止"])) {
	$msg .= "　がん予防・再発防止"."\n";
	foreach ($_SESSION["post"]["ご相談内容・がん予防・再発防止"] as $val) {
		$msg .= "　・".$val."\n";
	}
}
if (!empty($_SESSION["post"]["ご相談内容・がん超早期発見検査"])) {
	$msg .= "　がん超早期発見検査"."\n";
	foreach ($_SESSION["post"]["ご相談内容・がん超早期発見検査"] as $val) {
		$msg .= "　・".$val."\n";
	}
}
if (!empty($_SESSION["post"]["ご相談内容・その他"])) {
	$msg .= "　その他"."\n";
	foreach ($_SESSION["post"]["ご相談内容・その他"] as $val) {
		$msg .= "　・".$val."\n";
	}
}
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
if (IS_DEVELOPMENT) {
	$debug_print  = "<!--\n";
	$debug_print .= $body . "\n";
	$debug_print .= "-->\n";
	echo $debug_print;
} else {
	if (!$o_mail->Send()) {
		die('エラー：メールが送信できませんでした。システム管理者にご連絡ください。');
	}
}
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
if (IS_DEVELOPMENT) {
	$debug_print  = "<!--\n";
	$debug_print .= $body . "\n";
	$debug_print .= "-->\n";
	echo $debug_print;
} else {
	if (!$o_mail->send()) {
		die('エラー：メールが送信できませんでした。システム管理者にご連絡ください。');
	}
}
?>
<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<!DOCTYPE html>
<html lang="ja">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">




<!-- Global site tag (gtag.js) - Google Analytics ___replace-->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-166622808-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-166622808-1');
</script>


<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="format-detection" content="email=no,telephone=no,address=no">
<meta name="viewport" content="width=device-width,initial-scale=1.0,shrink-to-fit=no">
<script type="text/javascript">
	if(!((navigator.userAgent.indexOf('iPhone') > 0) || navigator.userAgent.indexOf('iPod') > 0 || (navigator.userAgent.indexOf('Android') > 0 && navigator.userAgent.indexOf('Mobile') > 0))){
		document.write('<meta name="viewport" content="width=990">');
	}
</script>
<title>PageTitle___replace</title>
<meta name="robots" content="index,follow">
<meta name="keywords" content="keywords___replace">
<meta name="description" content="description___replace">
<!-- open graph protocol -->
<meta property="og:url" content="pageURL___replace">
<meta property="og:site_name" content="sitename___replace">
<meta property="og:title" content="pagetitle___replace">
<meta property="og:type" content="website/article___replace">
<meta property="og:description"  content="pageDescription___replace">
<meta property="og:image" content="ogImageUrl___replace">
<meta name="twitter:card" content="summary_large_image">
<!-- lang -->
<link rel="alternate" hreflang="ja" href="https://sitedomain___replace.com/">
<link rel="alternate" hreflang="en-gb" href="https://sitedomain___replace.com/en/">
<link rel="alternate" hreflang="en-us" href="https://sitedomain___replace.com/en/">
<link rel="alternate" hreflang="en" href="https://sitedomain___replace.com/en/">
<link rel="alternate" hreflang="zh-Hans" href="https://sitedomain___replace.com/ch/">
<link rel="alternate" hreflang="zh-Hant" href="https://sitedomain___replace.com/ch/">
<link rel="alternate" hreflang="x-default" href="https://sitedomain___replace.com/en/">
<!-- icon -->
<link rel="shortcut icon" href="/favicon.ico">
<link rel="apple-touch-icon-precomposed" href="/apple-touch-icon.png">
<!-- CSS -->
<link rel="stylesheet" href="css/cssreset.css">
<link rel="stylesheet" href="css/html5-doctor-reset-stylesheet.min.css">
<link rel="stylesheet" href="css/com.css">
<!-- Javascript -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery-1.12.4.min.js"><\/script>')</script>
<script defer src="js/com.js"></script>
<!-- intersection observer -->
<script defer src="js/intersection-observer-polyfill.js"></script>
<script>
$(function() {
	var observer = new IntersectionObserver(function(entries) {
		entries.forEach(function(e) {
			if (!e.isIntersecting) return;
			e.target.classList.add('move'); // 交差した時の処理
			observer.unobserve(e.target);
			// target element:
		    //   e.target				ターゲット
		    //   e.isIntersecting		交差しているかどうか
		    //   e.intersectionRatio	交差している領域の割合
		    //   e.intersectionRect		交差領域のgetBoundingClientRect()
		    //   e.boundingClientRect	ターゲットのgetBoundingClientRect()
		    //   e.rootBounds			ルートのgetBoundingClientRect()
		    //   e.time					変更が起こったタイムスタンプ
		})

	},{
    	// オプション設定
		rootMargin: '0px 0px -5% 0px' //下端から5%入ったところで発火
		//threshold: [0, 0.5, 1.0]
	});

	var target = document.querySelectorAll('.io'); //監視したい要素をNodeListで取得
	for(var i = 0; i < target.length; i++ ) {
	    observer.observe(target[i]); // 要素の監視を開始
	}

	//アニメーションによる各要素のはみ出しを解消
	$("body").wrapInner("<div style='overflow:hidden;'></div>");

});
</script>
<!-- matchHeight -->
<script defer src="js/jquery.matchHeight.js"></script>
<script>
$(function() {
	$(window).on('load',function(){
		$(".contents_nav ul > li").matchHeight();
	});
});
</script>
<!-- GoogleMap iFrame-->
<!-- <script>
	$(window).on('load', function(){
		$('.footer_map').append('<iframe src="" frameborder="0" style="border:0" allowfullscreen></iframe>');
	});
</script> -->
<!--svgxuse for IE -->
<script defer src="js/svgxuse.js"></script>
<!--[if lt IE 9]>
<script src="js/IE9.js"></script>
<script src="js/html5shiv.js"></script>
<script>
	document.createElement('main');
</script>
<![endif]-->



<link rel="stylesheet" href="./css/main.css">
</head>
<body id="PAGETOP" class="transition contents contact">

<?php require('images/com.svg'); ?>

<div id="loader-wrapper"><div id="loader"></div></div>
<header>
	<ul class="language">
		<li><a href="/">JP</a></li>
		<li><a href="/en/">EN</a></li>
		<li><a href="/ch/">CH</a></li>
	</ul>
	
	<div class="header_bar">
		<h1><a href="/"><img src="images/logo_head.svg" alt="<?php echo $sitename;?>"></a></h1>
		<ul class="header_logo">
			<li><a href="/menu1/">Menu1</a></li>
			<li><a href="/menu2/">Menu2</a></li>
			<li><a href="/menu3/">Menu3</a></li>
		</ul>
	</div><!-- /header_bar -->
	
	<div id="nav_btnwrapper"><div id="nav_btn"><span id="nav_btn_icon"></span></div></div>
	<nav>
		<div class="nav_inner">
			<a href="/"><img src="images/logo_nav.svg" alt="sitename____replace"></a>
			<ul>
				<li><span><a href="/Menu1">Menu1</a></span></li>
				<li>
					<span class="sp_toggle"><a href="/menu1/">Menu1</a></span>
					<ol>
						<li><a href="/menu2/submenu1"><svg><use xlink:href="#arrow_right"></use></svg>Menu2_Sub1</a></li>
						<li><a href="/menu2/submenu2"><svg><use xlink:href="#arrow_right"></use></svg>Menu2_Sub2</a></li>
						<li><a href="/menu2/submenu3"><svg><use xlink:href="#arrow_right"></use></svg>Menu2_Sub3</a></li>
					</ol>
				</li>
				<li>
					<span class="sp_toggle"><a href="/menu2/">Menu2</a></span>
					<ol>
						<li><a href="/menu3/submenu1"><svg><use xlink:href="#arrow_right"></use></svg>Menu3_Sub1</a></li>
						<li><a href="/menu3/submenu2"><svg><use xlink:href="#arrow_right"></use></svg>Menu3_Sub2</a></li>
						<li><a href="/menu3/submenu3"><svg><use xlink:href="#arrow_right"></use></svg>Menu3_Sub3</a></li>
						<li><a href="/menu3/submenu4"><svg><use xlink:href="#arrow_right"></use></svg>Menu3_Sub4</a></li>
					</ol>
				</li>
				<li>
				<span class="sp_toggle"><a href="/menu3/">Menu3</a></span>
					<ol>
						<li><a href="/menu4/submenu1"><svg><use xlink:href="#arrow_right"></use></svg>Menu4_Sub1</a></li>
						<li><a href="/menu4/submenu2"><svg><use xlink:href="#arrow_right"></use></svg>Menu4_Sub2</a></li>
						<li><a href="/menu4/submenu3"><svg><use xlink:href="#arrow_right"></use></svg>Menu4_Sub3</a></li>
						<li><a href="/menu4/submenu4"><svg><use xlink:href="#arrow_right"></use></svg>Menu4_Sub4</a></li>
					</ol>
				</li>

				<li><span><a href="/menu5">Menu5</a></span></li>
			</ul>
			<ul>
				<li><span><a href="/sidemenu1/">SideMenu1</a></span></li>
				<li><span><a href="/sidemenu2/">SideMenu2</a></span></li>
				<li><span><a href="/sidemenu3/">SideMenu3</a></span></li>
				<li><span><a href="/sidemenu4/">SideMenu4</a></span></li>
				<li><span><a href="/sidemenu5/">SideMenu5</a></span></li>
				<li class="nav_btn"><span><a href="/button1/">Button1<svg class="arrow_btn"><use xlink:href="#arrow_btn"></use></svg></a></span></li>
				<li class="nav_btn"><span><a href="/button2/">Button2<svg class="arrow_btn"><use xlink:href="#arrow_btn"></use></svg></a></span></li>
			</ul>
		</div>
	</nav>
</header>

<main>
	<section class="pankuzu"><div class="inner"><a href="/">TOP</a>&nbsp;&gt;&nbsp;<?php echo $pagename;?></div></section>
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

<section class="contents_nav inner">
	<ul class="io fade upS">
		<li>
			<a href="/menu1/" class="flex_container">Menu1<small>Menu1</small></a>
			<ol>
				<li><a href="/menu1/sub1"><svg><use xlink:href="#arrow_right"></use></svg>Menu1_Sub1</a></li>
				<li><a href="/menu1/sub2"><svg><use xlink:href="#arrow_right"></use></svg>Menu1_Sub2</a></li>
				<li><a href="/menu1/sub3"><svg><use xlink:href="#arrow_right"></use></svg>Menu1_Sub3</a></li>
			</ol>
		</li>
		<li>
			<a href="/menu2/" class="flex_container">Menu2<small>Menu2</small></a>
			<ol>
				<li><a href="/menu2/sub1/"><svg><use xlink:href="#arrow_right"></use></svg>Menu2_Sub1</a></li>
				<li><a href="/menu2/sub2/"><svg><use xlink:href="#arrow_right"></use></svg>Menu2_Sub2</a></li>
				<li class="col1"><a href="/menu2/sub3/"><svg><use xlink:href="#arrow_right"></use></svg>Menu2_Sub3</a></li>
				<li class="col1"><a href="/menu2/sub4/"><svg><use xlink:href="#arrow_right"></use></svg>Menu2_Sub4</a></li>
				<li class="col1"><a href="/menu2/sub5/"><svg><use xlink:href="#arrow_right"></use></svg>Menu2_Sub5</a></li>
			</ol>
		</li>
		<li>
			<a href="/menu3/" class="flex_container">Menu3<small>Menu3</small></a>
			<ol>
				<li class="col1"><a href="/menu3/sub1"><svg><use xlink:href="#arrow_right"></use></svg>Menu3_Sub1</a></li>
				<li class="col1"><a href="/menu3/sub1"><svg><use xlink:href="#arrow_right"></use></svg>Menu3_Sub2</a></li>
			</ol>
		</li>
	</ul>
</section>
<div class="pagetop"><a href="#PAGETOP"><svg class="arrow_top"><use xlink:href="#arrow_top"></use></svg>TOP</a></div>
<footer class="io fade upS">

	<div class="footer_map">
		<a href="/access/">アクセス<small>ACCESS</small><svg class="arrow_btn"><use xlink:href="#arrow_btn"></use></svg></a>
	</div>
	<div class="footer_contact inner io fade upS" id="CONTACT">
		<h2 class="io fade upS">ご予約・お問い合わせ<small>RESERVE / CONTACT</small></h2>
		<p class="io fade upS">当クリニックを受診される際は、ご予約が必要です。<small>※当クリニックの治療は、自由診療となります。</small></p>
		<div class="io fade upS">
			<h3><span>医療法人 紀隆会</span>SiteName____replace</h3>
			<div class="footer_contact_tel">
				<em>連絡先</em>
				<p><a href="tel:phonenumber___replace" class="tel"><svg class="icon_phone"><use xlink:href="#icon_phone"></use></svg>PhoneNumber___replace</a><small>受付時間　9:30〜18:30（月〜金）</small></p>
				<p><a href="mapaddress___replace" target="_blank">Address___replace</a></p>
			</div>
			<div class="footer_contact_time">
				<em>診察時間</em>
				<table>
					<tr><th></th><th>月</th><th>火</th><th>水</th><th>木</th><th>金</th><th>土</th><th>日</th></tr>
					<tr><th>午前<small>9:30〜13:00</small></th><td>&#9675;</td><td>&#9675;</td><td>&#9675;</td><td>&#9675;</td><td>&#9675;</td><td>&#10005;</td><td>&#10005;</td></tr>
					<tr><th>午後<small>14:30〜18:30</small></th><td>&#9675;</td><td>&#9675;</td><td>&#9675;</td><td>&#9675;</td><td>&#9675;</td><td>&#10005;</td><td>&#10005;</td></tr>
				</table>
				<small>休診日　土曜・日曜・祝日</small>
			</div>
		</div>
		<div class="footer_link io fade upS">
			<div><a href="/reserve/">ご予約<svg class="arrow_btn"><use xlink:href="#arrow_btn"></use></svg></a></div>
			<div><a href="/contact/">お問い合わせ<svg class="arrow_btn"><use xlink:href="#arrow_btn"></use></svg></a></div>
		</div>
		<div class="footer_nav io fade upS">
			<ul>
				<li><a href="/menu1">&raquo;&nbsp;Menu1</a></li>
				<li><a href="/menu2/">&raquo;&nbsp;Menu2</a></li>
				<li><a href="/menu3/">&raquo;&nbsp;Menu3</a></li>
			</ul>
			<ul>
				<li><a href="/menu4/">&raquo;&nbsp;Menu4</a></li>
				<li><a href="/menu5/">&raquo;&nbsp;Menu5</a></li>
				<li><a href="/menu6/">&raquo;&nbsp;Menu6</a></li>
			</ul>
			<ul>
				<li><a href="/menu7/">&raquo;&nbsp;Menu7</a></li>
				<li><a href="/menu8/">&raquo;&nbsp;Menu8</a></li>
				<li><a href="/menu9/">&raquo;&nbsp;Menu9</a></li>
				<li><a href="/menu10/">&raquo;&nbsp;Menu10</a></li>
			</ul>
			<ul>
				<li><a href="/menu11/">&raquo;&nbsp;Menu11</a></li>
				<li><a href="/menu12/">&raquo;&nbsp;Menu12</a></li>
				<li><a href="/menu13/">&raquo;&nbsp;Menu13</a></li>
			</ul>
		</div>
	</div><!-- /inner -->
	<ul class="language">
		<li><a href="/">JP</a></li>
		<li><a href="/en/">EN</a></li>
		<li><a href="/ch/">CH</a></li>
	</ul>
	<div class="footer_copyright">&copy; Copyright___replace</div>
</footer>

<!-- SmoothScroll -->
<script src="js/smooth-scroll.polyfills.js"></script>
<script>
	var scroll = new SmoothScroll('a[href*="#"]', {
		speed: 400,
		easing:'easeOutQuint'
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