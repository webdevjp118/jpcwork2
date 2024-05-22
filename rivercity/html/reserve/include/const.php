<?php
/**
 * 定数定義
 */

// ホスト名取得（ポート番号削除）
$hostname = str_replace(":443", "", $_SERVER["HTTP_HOST"]);

define("SITE_DOMAIN", "rinku-medical-clinic.com");
define("SITE_URL", $protocol."".SITE_DOMAIN);

// ホスト名により定数設定
switch ($hostname) {
// テスト用サーバ
case "rinku.wakisakanaonobu.jp":
	// 開発環境
	define("IS_DEVELOPMENT", 0);
	// URL
	define("BASE_URL", $protocol."rinku.wakisakanaonobu.jp");
	break;
// 本番用サーバ
case "www.rinku-medical-clinic.com":
case "rinku-medical-clinic.com":
default:
	// 開発環境
	define("IS_DEVELOPMENT", 0);
	// URL
	define("BASE_URL", $protocol."rinku-medical-clinic.com");
	break;
}

// マルチバイト文字のバイト数（UTF-8 なので 3バイト）
define("MBWIDTH", 3);

// sha1() 用の salt
define('SALT', "_himitsu");

// CSRF対策用のトークン長（16 * 2 = 32バイト）
define('TOKEN_LENGTH', 16);
