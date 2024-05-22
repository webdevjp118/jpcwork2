<?php
/**
 * 定数定義
 */

// URLパス
define("CHILD_PATH", "/reserve");

// メール関連
define("EMAIL_SUBJECT", "ご予約");
define("EMAIL_FROM", "info@rivercity-clinic.jp");
define("EMAIL_FROM_NAME", "りんくうメディカルクリニック");
// 通知メール宛先（複数対応）
$email = array(
	'info@rivercity-clinic.jp',
    'yamaguchi@onelife-clinic.com',
	//'mail@wakisakanaonobu.jp',
	//'fujita@digitalbox.jp',
);
// メール署名
$mail_signature = <<<EOF
==============================================================

りんくうメディカルクリニック

〒598-0047 大阪府泉佐野市りんくう往来南3-41 メディカルりんくうポート2階
TEL：0724-24-0024
E-MAIL：info@rivercity-clinic.jp
https://rinku-medical-clinic.com

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
