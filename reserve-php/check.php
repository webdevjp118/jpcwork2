<?php
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
