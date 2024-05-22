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
						<dd class="name">臨空 花子</dd>
						<dt>フリガナ<span>必須</span></dt>
						<dd class="name">リンクウ ハナコ</dd>
						<dt>性別<span>必須</span></dt>
						<dd>女性</dd>
						<dt>年齢<span>必須</span></dt>
						<dd>40歳</dd>
						<dt>電話番号<span>必須</span></dt>
						<dd>000-0000-0000</p>
						</dd>
						<dt>お電話可能な時間帯<span>必須</span></dt>
						<dd>10時〜12時</dd>
						<dt>メールアドレス<span>必須</span></dt>
						<dd>example.com</dd>
						<dt>メールアドレス（確認）<span>必須</span></dt>
						<dd>example.com</dd>
						<dt>ご相談内容<span>必須</span></dt>
						<dd>
							<strong>がん先進治療</strong>
							<p>がん遺伝子治療</p>
							<p>光がん免疫療法</p>
							<strong>がん超早期発見検査</strong>
							<p>マイクロアレイ検査</p>
						</dd>
						<dt>ご希望の診察日<span>必須</span></dt>
						<dd>
							<strong>第一希望</strong>
							<p>2019年12月31日　9:00〜10:00</p>
							<strong>第二希望</strong>
							<p>2019年12月31日　9:00〜10:00</p>
						</dd>
					</dl>
				</div>
				<div class="btn_wrap">
					<div class="backBtn"><a href="./">&laquo;&nbsp;戻る</a></div>
					<div class="submitBtn"><input type="submit" id="submit_go" value="送信する"></div>
				</div>
			</form>
		</div><!-- /contactCotainer -->
	</section><!-- /inner -->
</main>
<?php require($_SERVER['DOCUMENT_ROOT'].'/common/include/footer.php'); ?>
</body>
</html>