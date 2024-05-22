<?php /* Template Name: Confirm */ ?>
<?php
get_header();
// 設定ファイル読み込み
error_reporting(E_ERROR | E_WARNING | E_PARSE);
/**
 * 定数定義
 */

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

?>

<main id="primary" class="site-main">
<section class="contents_ttl">
	<h2>お問い合わせフォーム</h2>
</section>
	<section class="inner">
		<div class="contactCotainer">
			<div class="form_flow">
				<p class="complete">入力</p>
				<p class="active">内容確認</p>
				<p>送信完了</p>
			</div>
			<form id="application" action="<?php echo get_site_url(); ?>/complete/" method="post">
				<p class="message">以下の内容でよろしければ、送信してください。</p>
				<div class="form_area">
					<dl> 
						<dt>病院様名<span>必須</span></dt>
						<dd class="name"><?php print_post_session("病院様名", 1, 1); ?></dd>
						<dt>お名前<span>必須</span></dt>
						<dd class="name"><?php print_post_session("お名前", 1, 1); ?></dd>
						<dt>メールアドレス<span>必須</span></dt>
						<dd><?php print_post_session("メールアドレス", 1, 1); ?></dd>
						<dt>電話番号<span>必須</span></dt>
						<dd><?php print_post_session_num(array("電話番号", "電話番号2", "電話番号3"), 1, 1); ?></dd>
						<?php if($product_count>0): ?>
						<dt>お問い合わせの製品<br class="disp_pc">【複数を選択可】</dt>
						<dd>
					<?php 	for($i=0;$i<=$max_product_count;$i++):
								if(!empty($product_values[$i])):
									echo $product_names[$i];
									echo "<br>";
								endif;
							endfor;
					?>
						</dd>
						<?php endif; ?>
						<dt>お問い合わせ内容</dt>
						<dd><?php echo nl2br(_hr(print_post_session("お問い合わせ内容", 0, 1))); ?></dd>
					</dl>
				</div>
				<div class="btn_wrap">
					<div class="backBtn"><a href="<?php echo get_site_url().'/contact/'; ?>">&laquo;&nbsp;戻る</a></div>
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

<?php
get_footer();


