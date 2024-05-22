<?php
// 設定ファイル読み込み
error_reporting(E_ERROR | E_WARNING | E_PARSE);
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
// 表示時にエンティティ変換
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


<link rel="stylesheet" href="css/style.css">
</head>
<body id="PAGETOP" class="<?php echo $bodyClass;?>">



<svg aria-hidden="true" style="display: none;" version="1.1" xmlns="http://www.w3.org/2000/svg">
	<defs>
		<filter id="filter_blur">
			<feGaussianBlur in="SourceGraphic" stdDeviation="2" result="blur" />
		</filter>

		<filter id="filter_monotone">
			<feColorMatrix type="saturate" values="0" />
		</filter>


		<symbol id="icon_sns_fb" viewBox="0 0 32 32">
			<path d="M32,16.1A16,16,0,1,0,13.5,31.9V20.72H9.44V16.1H13.5V12.57c0-4,2.39-6.22,6-6.22a24.77,24.77,0,0,1,3.58.31V10.6h-2a2.31,2.31,0,0,0-2.61,2.5v3h4.44l-.71,4.62H18.5V31.9A16,16,0,0,0,32,16.1Z"></path>
		</symbol>

		<symbol id="icon_sns_insta" viewbox="0 0 32 32">
			<path d="M16 2.88c4.28 0 4.787 0 6.467 0.093 1.071 0.014 2.091 0.213 3.035 0.567l-0.062-0.020c0.717 0.273 1.326 0.682 1.825 1.199l0.001 0.001c0.523 0.501 0.932 1.117 1.189 1.807l0.011 0.033c0.347 0.882 0.552 1.902 0.56 2.97l0 0.003c0.067 1.68 0.093 2.187 0.093 6.453s0 4.787-0.093 6.467c-0.008 1.071-0.213 2.092-0.58 3.031l0.020-0.058c-0.263 0.723-0.668 1.338-1.185 1.839l-0.001 0.001c-0.504 0.518-1.119 0.927-1.806 1.189l-0.034 0.011c-0.883 0.335-1.903 0.534-2.968 0.547l-0.005 0c-1.68 0.080-2.187 0.093-6.453 0.093s-4.787 0-6.467-0.093c-1.071-0.012-2.091-0.212-3.035-0.567l0.061 0.020c-0.721-0.273-1.336-0.682-1.839-1.199l-0.001-0.001c-0.518-0.504-0.927-1.119-1.189-1.806l-0.011-0.034c-0.334-0.878-0.533-1.894-0.547-2.954l-0-0.006c-0.080-1.693-0.093-2.2-0.093-6.467s0-4.787 0.093-6.467c0.014-1.071 0.213-2.091 0.567-3.035l-0.020 0.062c0.273-0.717 0.682-1.326 1.199-1.825l0.001-0.001c0.504-0.522 1.119-0.935 1.806-1.202l0.034-0.012c0.878-0.334 1.894-0.533 2.954-0.547l0.006-0c1.68 0 2.187-0.093 6.467-0.093zM16 0c-4.347 0-4.88 0-6.587 0.093-1.406 0.028-2.74 0.299-3.973 0.774l0.080-0.027c-1.116 0.414-2.069 1.036-2.853 1.826l-0.001 0.001c-0.791 0.784-1.413 1.737-1.809 2.8l-0.017 0.054c-0.445 1.149-0.716 2.478-0.746 3.867l-0 0.013c-0.093 1.72-0.093 2.253-0.093 6.6s0 4.893 0.093 6.667c0.029 1.401 0.3 2.731 0.774 3.96l-0.027-0.080c0.427 1.089 1.047 2.017 1.826 2.786l0.001 0.001c0.776 0.794 1.719 1.42 2.774 1.822l0.053 0.018c1.149 0.446 2.479 0.718 3.868 0.746l0.012 0c1.733 0.080 2.28 0.080 6.627 0.080s4.88 0 6.587-0.093c1.401-0.026 2.731-0.298 3.959-0.774l-0.079 0.027c2.162-0.84 3.84-2.518 4.661-4.625l0.019-0.055c0.44-1.129 0.711-2.434 0.746-3.798l0-0.015c0.107-1.773 0.107-2.307 0.107-6.667s0-4.893-0.093-6.6c-0.029-1.401-0.3-2.731-0.774-3.96l0.027 0.080c-0.398-1.122-1.023-2.077-1.825-2.851l-0.002-0.002c-0.787-0.786-1.739-1.408-2.799-1.809l-0.055-0.018c-1.13-0.435-2.436-0.701-3.8-0.733l-0.014-0c-1.773-0.107-2.32-0.107-6.667-0.107z"></path>
			<path d="M16 7.787c-4.543 0-8.227 3.683-8.227 8.227s3.683 8.227 8.227 8.227c4.543 0 8.227-3.683 8.227-8.227 0-0.005 0-0.009 0-0.014v0.001c0 0 0 0 0 0 0-4.536-3.677-8.213-8.213-8.213-0.005 0-0.009 0-0.014 0h0.001zM16 21.333c-2.946 0-5.333-2.388-5.333-5.333s2.388-5.333 5.333-5.333c2.946 0 5.333 2.388 5.333 5.333v0c0 2.946-2.388 5.333-5.333 5.333v0z"></path>
			<path d="M26.467 7.453c0 1.060-0.86 1.92-1.92 1.92s-1.92-0.86-1.92-1.92c0-1.060 0.86-1.92 1.92-1.92v0c0.004-0 0.009-0 0.013-0 1.053 0 1.907 0.854 1.907 1.907 0 0.005-0 0.009-0 0.014v-0.001z"></path>
		</symbol>

		<symbol id="icon_sns_tw" viewbox="0 0 32 32">
			<path d="M31.693 6.267c-1.075 0.49-2.323 0.847-3.631 1.007l-0.062 0.006c1.325-0.812 2.322-2.047 2.813-3.514l0.013-0.046c-1.177 0.731-2.547 1.29-4.010 1.599l-0.083 0.015c-1.178-1.251-2.845-2.030-4.694-2.030-3.539 0-6.412 2.855-6.44 6.388l-0 0.003c-0 0.011-0 0.024-0 0.037 0 0.503 0.063 0.991 0.182 1.457l-0.009-0.041c-5.355-0.257-10.072-2.785-13.242-6.635l-0.025-0.031c-0.539 0.919-0.858 2.025-0.858 3.205 0 2.211 1.119 4.161 2.822 5.314l0.023 0.014c-1.076-0.032-2.078-0.325-2.952-0.817l0.032 0.017v0.080c-0 0.018-0 0.038-0 0.059 0 3.109 2.202 5.703 5.132 6.307l0.042 0.007c-0.511 0.144-1.097 0.227-1.702 0.227-0.001 0-0.003 0-0.004 0h0c-0.454-0.047-0.867-0.126-1.265-0.239l0.052 0.012c0.854 2.572 3.212 4.406 6.006 4.467l0.007 0c-2.166 1.72-4.941 2.76-7.958 2.76-0.015 0-0.029-0-0.044-0h0.002c-0.017 0-0.038 0-0.058 0-0.525 0-1.041-0.034-1.548-0.1l0.060 0.006c2.777 1.814 6.178 2.893 9.831 2.893 0.017 0 0.035-0 0.052-0h-0.003c0.040 0 0.087 0 0.133 0 10.044 0 18.187-8.142 18.187-18.187 0-0.028-0-0.057-0-0.085l0 0.004c0-0.28 0-0.56 0-0.827 1.264-0.923 2.33-2.027 3.184-3.287l0.030-0.046z"></path>
		</symbol>



		<symbol id="icon_close" viewbox="0 0 32 32">
			<path d="M25.24 8.64l-1.88-1.88-7.36 7.36-7.36-7.36-1.88 1.88 7.36 7.36-7.36 7.36 1.88 1.88 7.36-7.36 7.36 7.36 1.88-1.88-7.36-7.36 7.36-7.36z"></path>
		</symbol>

		<symbol id="icon_plus" viewbox="0 0 32 32">
			<path d="M25.333 14.667h-8v-8h-2.667v8h-8v2.667h8v8h2.667v-8h8v-2.667z"></path>
		</symbol>

		<symbol id="icon_minus" viewbox="0 0 32 32">
			<path d="M6.667 14.667h18.667v2.667h-18.667v-2.667z"></path>
		</symbol>

		<symbol id="icon_mail" viewbox="0 0 32 32">
			<path d="M29.333 5.333h-26.667v21.333h26.667zM26.667 24h-21.333v-13.333l10.667 6.667 10.667-6.667zM16 14.667l-10.667-6.667h21.333z"></path>
		</symbol>

		<symbol id="icon_mail_nega" viewbox="0 0 32 32">
			<path d="M29.333 5.333h-26.667v21.333h26.667zM26.667 10.667l-10.667 6.667-10.667-6.667v-2.667l10.667 6.667 10.667-6.667z"></path>
		</symbol>

		<symbol id="icon_phone" viewbox="0 0 32 32">
			<path d="M25.64 20.347l-3.387-0.347c-0.091-0.011-0.197-0.017-0.305-0.017-0.735 0-1.4 0.297-1.882 0.778l-2.453 2.453c-3.805-1.959-6.828-4.982-8.734-8.675l-0.052-0.112 2.467-2.52c0.452-0.477 0.73-1.123 0.73-1.833 0-0.125-0.009-0.247-0.025-0.367l0.002 0.014-0.333-3.36c-0.159-1.335-1.284-2.36-2.649-2.36-0.002 0-0.003 0-0.005 0h-3.68c-0.736 0-1.333 0.597-1.333 1.333v0c0 12.518 10.148 22.667 22.667 22.667v0c0.736 0 1.333-0.597 1.333-1.333v0-3.68c-0.005-1.361-1.028-2.481-2.347-2.639l-0.013-0.001z"></path>
		</symbol>
		
		<symbol id="icon_doc" viewbox="0 0 32 32">
			<path d="M17.52 3.613h-11.84v24.773h20.64v-16zM17.973 7.84l4.133 4.16h-4.133zM8.347 25.72v-19.44h7.653v7.693h7.68v11.747z"></path>
		</symbol>

		<symbol id="icon_blank" viewbox="0 0 32 32">
			<path d="M22.093 24.76h-14.853v-14.853h7.427v-2.667h-10.093v20.187h20.187v-10.093h-2.667v7.427z"></path>
			<path d="M17.787 4.573v2.667h5.093l-9.16 9.147 1.893 1.893 9.147-9.16v5.093h2.667v-9.64h-9.64z"></path>
		</symbol>

		<symbol id="icon_dl" viewbox="0 0 32 32">
			<path d="M24 18.653v5.333h-16v-5.333h-2.667v8h21.333v-8h-2.667z"></path>
			<path d="M22.813 13.28l-1.88-1.893-3.6 3.6v-8.307h-2.667v8.307l-3.6-3.6-1.88 1.893 6.813 6.813 6.813-6.813z"></path>
		</symbol>

		<symbol id="icon_search" viewbox="0 0 32 32">
			<path d="M20.667 18.667h-1.053l-0.373-0.36c1.301-1.509 2.093-3.489 2.093-5.653 0-4.794-3.886-8.68-8.68-8.68s-8.68 3.886-8.68 8.68c0 4.794 3.886 8.68 8.68 8.68 2.165 0 4.144-0.792 5.665-2.103l-0.011 0.009 0.36 0.373v1.053l6.667 6.667 1.987-2zM12.667 18.667c-3.314 0-6-2.686-6-6s2.686-6 6-6c3.314 0 6 2.686 6 6v0c0 0.004 0 0.009 0 0.013 0 3.306-2.68 5.987-5.987 5.987-0.005 0-0.009 0-0.014-0h0.001z"></path>
		</symbol>

		<symbol id="icon_cart" viewbox="0 0 32 32">
			<path d="M22.067 17.333c0.007 0 0.015 0 0.024 0 0.982 0 1.84-0.531 2.303-1.321l0.007-0.013 4.773-8.653c0.117-0.194 0.187-0.429 0.187-0.68 0-0.736-0.597-1.333-1.333-1.333-0.009 0-0.019 0-0.028 0l0.001-0h-19.72l-1.253-2.667h-4.36v2.667h2.667l4.8 10.12-1.8 3.213c-0.225 0.383-0.357 0.842-0.357 1.333 0 1.473 1.194 2.667 2.667 2.667 0.008 0 0.017-0 0.025-0h15.999v-2.667h-16l1.467-2.667zM9.547 8h16.2l-3.68 6.667h-9.333zM10.667 24c-1.473 0-2.667 1.194-2.667 2.667s1.194 2.667 2.667 2.667c1.473 0 2.667-1.194 2.667-2.667v0c0-1.473-1.194-2.667-2.667-2.667v0zM24 24c-1.473 0-2.667 1.194-2.667 2.667s1.194 2.667 2.667 2.667c1.473 0 2.667-1.194 2.667-2.667v0c0-1.473-1.194-2.667-2.667-2.667v0z"></path>
		</symbol>

		<symbol id="icon_calendar" viewbox="0 0 32 32">
			<path d="M29.333 4h-4v-2.667h-2.667v2.667h-13.333v-2.667h-2.667v2.667h-4v26.667h26.667zM26.667 28h-21.333v-17.333h21.333z"></path>
		</symbol>

		<symbol id="icon_pin" viewbox="0 0 32 32">
			<path d="M16 3.24c-5.25 0-9.507 4.256-9.507 9.507v0c0.037 1.715 0.487 3.317 1.254 4.721l-0.027-0.054c2.718 4.294 5.445 7.997 8.404 11.497l-0.124-0.151c2.835-3.35 5.562-7.053 8.034-10.934l0.246-0.413c0.74-1.35 1.19-2.952 1.226-4.655l0-0.011c0-5.25-4.256-9.507-9.507-9.507v0zM16 15.907c-0.004 0-0.009 0-0.013 0-1.745 0-3.16-1.415-3.16-3.16s1.415-3.16 3.16-3.16c1.745 0 3.16 1.415 3.16 3.16v0c0 0 0 0 0 0 0 1.741-1.407 3.152-3.146 3.16h-0.001z"></path>
		</symbol>



		<symbol id="arrow_right" viewbox="0 0 32 32">
			<path d="M12.28 26.28l-1.893-1.893 8.4-8.387-8.4-8.387 1.893-1.893 10.267 10.28-10.267 10.28z"></path>
		</symbol>

		<symbol id="arrow_right_w" viewbox="0 0 32 32">
			<path d="M7.947 26.28l-1.88-1.893 8.387-8.387-8.387-8.387 1.88-1.893 10.28 10.28-10.28 10.28z"></path>
			<path d="M16.6 26.28l-1.88-1.893 8.387-8.387-8.387-8.387 1.88-1.893 10.28 10.28-10.28 10.28z"></path>
		</symbol>

		<symbol id="arrow_right_line" viewbox="0 0 32 32">
			<path d="M17.040 5.72l-1.893 1.893 7.067 7.053h-15.64v2.667h15.64l-7.067 7.053 1.893 1.893 10.267-10.28-10.267-10.28z"></path>
		</symbol>

		<symbol id="arrow_right_large1" viewbox="0 0 32 32">
			<path d="M9.176 30.488l-0.56-0.568 13.92-13.92-13.92-13.92 0.56-0.568 14.496 14.488-14.496 14.488z"></path>
		</symbol>

		<symbol id="arrow_right_large2" viewbox="0 0 32 32">
			<path d="M9.464 30.768l-1.136-1.128 13.64-13.64-13.64-13.64 1.136-1.128 14.768 14.768-14.768 14.768z"></path>
		</symbol>

		<symbol id="arrow_right_large3" viewbox="0 0 32 32">
			<path d="M9.232 31.336l-2.264-2.264 13.072-13.072-13.072-13.072 2.264-2.264 15.336 15.336-15.336 15.336z"></path>
		</symbol>



		<symbol id="arrow_left" viewbox="0 0 32 32">
			<path d="M19.72 26.28l-10.267-10.28 10.267-10.28 1.893 1.893-8.4 8.387 8.4 8.387-1.893 1.893z"></path>
		</symbol>

		<symbol id="arrow_left_w" viewbox="0 0 32 32">
			<path d="M24.053 26.28l-10.28-10.28 10.28-10.28 1.88 1.893-8.387 8.387 8.387 8.387-1.88 1.893z"></path>
			<path d="M15.4 26.28l-10.28-10.28 10.28-10.28 1.88 1.893-8.387 8.387 8.387 8.387-1.88 1.893z"></path>
		</symbol>

		<symbol id="arrow_left_line" viewbox="0 0 32 32">
			<path d="M25.427 14.667h-15.64l7.067-7.053-1.893-1.893-10.267 10.28 10.267 10.28 1.893-1.893-7.067-7.053h15.64v-2.667z"></path>
		</symbol>

		<symbol id="arrow_left_large1" viewbox="0 0 32 32">
			<path d="M22.816 30.488l-14.488-14.488 14.488-14.488 0.568 0.568-13.92 13.92 13.92 13.92-0.568 0.568z"></path>
		</symbol>

		<symbol id="arrow_left_large2" viewbox="0 0 32 32">
			<path d="M22.536 30.768l-14.768-14.768 14.768-14.768 1.136 1.128-13.64 13.64 13.64 13.64-1.136 1.128z"></path>
		</symbol>

		<symbol id="arrow_left_large3" viewbox="0 0 32 32">
			<path d="M22.768 31.336l-15.336-15.336 15.336-15.336 2.264 2.264-13.072 13.072 13.072 13.072-2.264 2.264z"></path>
		</symbol>



		<symbol id="arrow_up" viewbox="0 0 32 32">
			<path d="M24.387 21.613l-8.387-8.4-8.387 8.4-1.893-1.893 10.28-10.267 10.28 10.267-1.893 1.893z"></path>
		</symbol>

		<symbol id="arrow_up_line" viewbox="0 0 32 32">
			<path d="M26.28 14.96l-10.28-10.267-10.28 10.267 1.893 1.893 7.053-7.067v15.64h2.667v-15.64l7.053 7.067 1.893-1.893z"></path>
		</symbol>

		<symbol id="arrow_up_large1" viewbox="0 0 53 32">
			<path d="M49.867 28.307l-23.2-23.2-23.2 23.2-0.947-0.947 24.147-24.147 24.147 24.147-0.947 0.947z"></path>
		</symbol>

		<symbol id="arrow_up_large2" viewbox="0 0 53 32">
			<path d="M49.4 28.787l-22.733-22.733-22.733 22.733-1.893-1.893 24.627-24.613 24.627 24.613-1.893 1.893z"></path>
		</symbol>

		<symbol id="arrow_up_large3" viewbox="0 0 53 32">
			<path d="M48.453 31.053l-21.787-21.787-21.787 21.787-3.773-3.773 25.56-25.56 25.56 25.56-3.773 3.773z"></path>
		</symbol>



		<symbol id="arrow_down" viewbox="0 0 32 32">
			<path d="M16 22.547l-10.28-10.267 1.893-1.893 8.387 8.4 8.387-8.4 1.893 1.893-10.28 10.267z"></path>
		</symbol>

		<symbol id="arrow_line_down" viewbox="0 0 32 32">
			<path d="M24.387 15.147l-7.053 7.067v-15.64h-2.667v15.64l-7.053-7.067-1.893 1.893 10.28 10.267 10.28-10.267-1.893-1.893z"></path>
		</symbol>

		<symbol id="arrow_down_large1" viewbox="0 0 53 32">
			<path d="M26.667 28.787l-24.147-24.147 0.947-0.947 23.2 23.2 23.2-23.2 0.947 0.947-24.147 24.147z"></path>
		</symbol>

		<symbol id="arrow_down_large2" viewbox="0 0 53 32">
			<path d="M26.667 29.72l-24.627-24.613 1.893-1.88 22.733 22.72 22.733-22.72 1.893 1.88-24.627 24.613z"></path>
		</symbol>

		<symbol id="arrow_down_large3" viewbox="0 0 53 32">
			<path d="M26.667 30.28l-25.56-25.56 3.773-3.773 21.787 21.787 21.787-21.787 3.773 3.773-25.56 25.56z"></path>
		</symbol>



		<symbol id="arrow_bottom" viewbox="0 0 14 30">
			<path d="m0,0h6v26h-1v-1h-1v-1h-1v-1h-1v-1h-2zm8,0h6v22h-2v1h-1v1h-1v1h-1v1h-1zm-5,21h-1v1h1zm9,0h-1v1h1zm-7,2h-1v1h1zm5,0h-1v1h1zm-10,1h1v1h1v1h1v1h1v1h1v1h1v1h-6zm13,0h1v6h-6v-1h1v-1h1v-1h1v-1h1v-1h1zm-11,2h-1v1h1zm11,0h-1v1h1zm-9,2h-1v1h1zm7,0h-1v1h1z" opacity="0"/>
			<path d="m6,0h2v26h1v-1h1v-1h1v-1h1v-1h2v2h-1v1h-1v1h-1v1h-1v1h-1v1h-1v1h-2v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1v-2h2v1h1v1h1v1h1v1h1z"/>
			<path d="m2,21h1v1h-1zm9,0h1v1h-1zm-7,2h1v1h-1zm5,0h1v1h-1zm-8,3h1v1h-1zm11,0h1v1h-1zm-9,2h1v1h-1zm7,0h1v1h-1z" fill="#aaa" opacity="0"/>
		</symbol>
		
		<symbol id="arrow_top" viewbox="0 0 14 30">
			<path d="m0 0h6v1h-1v1h-1v1h-1v1h-1v1h-1v1h-1zm4 1h-1v1h1zm4-1h6v6h-1v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1zm3 1h-1v1h1zm-9 2h-1v1h1zm11 0h-1v1h1zm-8 1h1v26h-6v-22h2v-1h1v-1h1v-1h1zm3 0h1v1h1v1h1v1h1v1h2v22h-6zm-3 2h-1v1h1zm5 0h-1v1h1zm-7 2h-1v1h1zm9 0h-1v1h1z" opacity="0"/>
			<path d="m6 0h2v1h1v1h1v1h1v1h1v1h1v1h1v2h-2v-1h-1v-1h-1v-1h-1v-1h-1v26h-2v-26h-1v1h-1v1h-1v1h-1v1h-2v-2h1v-1h1v-1h1v-1h1v-1h1v-1h1z"/>
			<path d="m3 1h1v1h-1zm7 0h1v1h-1zm-9 2h1v1h-1zm11 0h1v1h-1zm-8 3h1v1h-1zm5 0h1v1h-1zm-7 2h1v1h-1zm9 0h1v1h-1z" fill="#aaa" opacity="0"/>
		</symbol>
		
		<symbol id="arrow_btn" viewbox="0 0 30 8">
			<path d="m0 0h19v1h1v-1h1v1h1v1h1v1h1v1h1v1h1v1h-26zm24 0h6v6h-1v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1zm3 1h-1v1h1zm-5 1h-1v1h1zm7 1h-1v1h1z" opacity="0"/>
			<path d="m19 0h1v1h-1zm7 1h1v1h-1zm-5 1h1v1h-1z" fill="#aaa" opacity="0"/>
			<path d="m21 0h3v1h1v1h1v1h1v1h1v1h1v1h1v2h-30v-2h26v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1z"/>
			<path d="m28 3h1v1h-1z" opacity="0"/>
		</symbol>
		
		<symbol id="arrow_link" viewbox="0 0 120 14">
			<path d="m0,0h106v2h1v1h1v1h1v1h1v1h1v1h1v1h1v1h1v1h1v1h1v1h-116zm108,0h12v12h-1v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1z" opacity="0"/>
			<path d="m106,0h2v1h1v1h1v1h1v1h1v1h1v1h1v1h1v1h1v1h1v1h1v1h1v1h1v2h-120v-2h116v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1z"/>
		</symbol>
	</defs>
</svg>

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
	</section>
	<section class="inner">
		<div class="contactCotainer">
			<div class="form_flow">
				<p class="complete">入力</p>
				<p class="active">内容確認</p>
				<p>送信完了</p>
			</div>
			<form id="application" action="./complete.php" method="post">
				<p class="message">以下の内容でよろしければ、送信してください。</p>
				<div class="form_area">
					<dl> 
						<dt>お名前<span>必須</span></dt>
						<dd class="name"><?php print_post_session("お名前", 1, 1); ?> <?php print_post_session("お名前・名", 1, 1); ?></dd>
						<dt>フリガナ<span>必須</span></dt>
						<dd class="name"><?php print_post_session("フリガナ", 1, 1); ?> <?php print_post_session("フリガナ・名", 1, 1); ?></dd>
						<dt>性別<span>必須</span></dt>
						<dd><?php print_post_session("性別", 1, 1); ?></dd>
						<dt>年齢<span>必須</span></dt>
						<dd><?php print_post_session("年齢", 1, 1); ?><?php if (!empty($_SESSION["post"]["年齢"])) { ?>歳<?php } ?></dd>
						<dt>電話番号<span>必須</span></dt>
						<dd><?php print_post_session_num(array("電話番号", "電話番号2", "電話番号3"), 1, 1); ?></dd>
						<dt>お電話可能な時間帯<span>必須</span></dt>
						<dd><?php print_post_session("お電話可能な時間帯", 1, 1); ?></dd>
						<dt>メールアドレス<span>必須</span></dt>
						<dd><?php print_post_session("メールアドレス", 1, 1); ?></dd>
						<dt>住所</dt>
						<dd><?php print_post_session("住所", 1, 1); ?></dd>
						<dt>かかりつけ</dt>
						<dd><?php print_post_session("かかりつけ", 1, 1); ?></dd>
						<dt>ご紹介者</dt>
						<dd><?php print_post_session("ご紹介者", 1, 1); ?></dd>
						<dt>診察について<span>必須</span></dt>
						<dd><?php print_post_session("診察について", 1, 1); ?></dd>
						<dt>ご相談内容<span>必須</span></dt>
						<dd>
							<?php
							if (!empty($_SESSION["post"]["ご相談内容・がん先進治療"])) { ?>
							<strong>がん先進治療</strong>
								<?php
								foreach ($_SESSION["post"]["ご相談内容・がん先進治療"] as $val) { ?>
							<p>・<?php echo $val; ?></p>
								<?php
								}
							} ?>
							<?php
							if (!empty($_SESSION["post"]["ご相談内容・がん予防・再発防止"])) { ?>
							<strong>がん予防・再発防止</strong>
								<?php
								foreach ($_SESSION["post"]["ご相談内容・がん予防・再発防止"] as $val) { ?>
							<p>・<?php echo $val; ?></p>
								<?php
								}
							} ?>
							<?php
							if (!empty($_SESSION["post"]["ご相談内容・がん超早期発見検査"])) { ?>
							<strong>がん超早期発見検査</strong>
								<?php
								foreach ($_SESSION["post"]["ご相談内容・がん超早期発見検査"] as $val) { ?>
							<p>・<?php echo $val; ?></p>
								<?php
								}
							} ?>
							<?php
							if (!empty($_SESSION["post"]["ご相談内容・その他"])) { ?>
							<strong>その他</strong>
								<?php
								foreach ($_SESSION["post"]["ご相談内容・その他"] as $val) { ?>
							<p>・<?php echo $val; ?></p>
								<?php
								}
							} ?>
						</dd>
						<dt>ご希望の診察日<span>必須</span></dt>
						<dd>
							<strong>第一希望</strong>
							<p>・<?php print_post_session("第一希望日", 1, 1); ?>　<?php print_post_session("第一希望時間", 1, 1); ?></p>
							<strong>第二希望</strong>
							<p>・<?php print_post_session("第二希望日", 1, 1); ?>　<?php print_post_session("第二希望時間", 1, 1); ?></p>
						</dd>
						<dt>その他</dt>
						<dd><?php echo nl2br(_hr(print_post_session("その他", 0, 1))); ?></dd>
					</dl>
				</div>
				<div class="btn_wrap">
					<div class="backBtn"><a href="./">&laquo;&nbsp;戻る</a></div>
					<div class="submitBtn"><input type="submit" id="submit_go" value="送信する"></div>
				</div>
<?php
// hidden の作成
foreach ($_SESSION["post"] as $key => $val) {
	if (is_array($val)) {
		foreach ($val as $key2 => $val2) {
?>
<input type="hidden" name="<?php _h($key); ?>[]" value="<?php _h($val2); ?>">
<?php
		}
	} else {
?>
<input type="hidden" name="<?php _h($key); ?>" value="<?php _h($val); ?>">
<?php
	}
}
// hidden の作成（ここまで）
?>
                <input type="hidden" name="token" value="<?php _h($_SESSION["token"]); ?>">
			</form>
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