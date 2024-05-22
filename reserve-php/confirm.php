<?php
// 設定ファイル読み込み
require_once("./config.php");
// 共通ファイル読み込み
require_once("./include/const.php");
require_once("./include/func.php");
require_once("./include/init.php");

// POST が無い場合は遷移
if (empty($_POST)) {
	header("Location: " . BASE_URL . CHILD_PATH . "/");
	exit();
}

// POST 前処理しない
// 表示時にエンティティ変換
$_LOCAL["post"] = $_POST;

// 入力値チェック
require_once("./check.php");

// エラーがある場合は入力フォームへ
if (!empty($_SESSION["error"])) {
	header("Location: " . BASE_URL . CHILD_PATH . "/");
	exit();
}

	/* ==================== data ==================== */

	//初期設定
	require($_SERVER['DOCUMENT_ROOT'].'/common/include/define.php');

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
<?php require($_SERVER['DOCUMENT_ROOT'].'/common/include/meta.php'); ?>
<link rel="stylesheet" href="./css/style.css">
</head>
<body id="PAGETOP" class="<?php echo $bodyClass;?>">
<?php require($_SERVER['DOCUMENT_ROOT'].'/common/include/header.php'); ?>
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
<?php require($_SERVER['DOCUMENT_ROOT'].'/common/include/footer.php'); ?>
</body>
</html>