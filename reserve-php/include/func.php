<?php
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
		header("Location: ".BASE_URL.CHILD_PATH."/error.php");
		exit();
	}
	if (is_array($url)) {
		$rval = 0;
		// リファラーが配列内に存在しない場合はトップに遷移
		if (!in_array($_SERVER["HTTP_REFERER"], $url, true)) {
			header("Location: ".BASE_URL.CHILD_PATH."/error.php");
			exit();
		}
		// リファラーが指定のものと異なる場合はトップに遷移
	} else if ($_SERVER["HTTP_REFERER"] !== $url) {
		header("Location: ".BASE_URL.CHILD_PATH."/error.php");
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
