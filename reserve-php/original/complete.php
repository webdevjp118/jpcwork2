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
<?php require($_SERVER['DOCUMENT_ROOT'].'/common/include/footer.php'); ?>
</body>
</html>