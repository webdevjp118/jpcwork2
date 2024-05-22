<?php
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
			<p class="message">エラー： 不正な画面遷移が検出されました。<br>最初からやり直してください。</p>
			<div class="topBtn"><a href="./">&raquo;&nbsp;入力画面に戻る</a></div>
		</div><!-- /contactCotainer -->
	</section><!-- /inner -->
</main>
<?php require($_SERVER['DOCUMENT_ROOT'].'/common/include/footer.php'); ?>
</body>
</html>
<?php
// 不要配列の削除
unset($_POST);
// 不要セッションの削除
unset($_SESSION["post"]);
unset($_SESSION["token"]);
