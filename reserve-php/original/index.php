<?php
	/* ==================== data ==================== */

	//初期設定
	require($_SERVER['DOCUMENT_ROOT'].'/common/include/define.php');

	//ページ設定
	$bodyClass = "transition contents contact";
	$pagename = "预约";
	$catname = "";
	$pagetitle = $pagename.(($catname!="") ? " | ".$catname : "");
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

<!-- プライバシーポリシー同意チェック -->
<script>
window.onpageshow = function(event) {
	var checkAgreement = document.getElementById('check');
	checkAgreement.checked = false;
};

function checkValue(check){
	var submitGo = document.getElementById('submit_go');

	if (check.checked) {
		submitGo.classList.remove("disabled");
		submitGo.removeAttribute("disabled");
	} else {
		submitGo.classList.add("disabled")
		submitGo.setAttribute("disabled", "disabled");
	}
}
</script>

<!-- 日付カレンダーIE対応 -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$( function() {
$( "#datepicker1,#datepicker2" ).datepicker( {
	dateFormat: 'yy年mm月dd日',
	monthNames: ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"]
});
} );
</script>
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
				<p class="active">输入内容</p>
				<p>确认内容</p>
				<p>发送完毕</p>
			</div>
			<form id="application" action="./confirm.php" method="post">
				<div class="form_area">
					<dl> 
						<dt>姓名<span>必填</span></dt>
						<dd class="name"><em>姓</em><input type="text" name="姓名" value="" placeholder=""><em>名</em><input type="text" name="姓名" value="" placeholder="">
						</dd>
						<dt>フリガナ<span>必填</span></dt>
						<dd class="name"><em>姓</em><input type="text" name="姓名" value="" placeholder=""><em>名</em><input type="text" name="姓名" value="" placeholder="">
						</dd>
						<dt>性別<span>必填</span></dt>
						<dd>
							<label><input type="radio" name="性別" value="女">女</label>
							<label><input type="radio" name="性別" value="男">男</label>
						</dd>
						<dt>年龄<span>必填</span></dt>
						<dd>
							<input type="number" name="年龄" value="">岁
							<p class="excuse">※未成年人，请出示监护人同意书。下载请点击<a href="/common/pdf/douisho.pdf" target="_blank">这里</a></p>
						</dd>
						<dt>联系电话<span>必填</span></dt>
						<dd>
							<input type="tel" inputmode="tel" name="联系电话" maxlength="4" value=""> - <input type="tel" inputmode="tel" name="联系电话2" maxlength="4" value=""> - <input type="tel" inputmode="tel" name="联系电话3" maxlength="4" value=""><span class="excuse">（半角数字）</span>
							<p class="excuse">※请填写可通话的电话号码。<br>※未接电话时，我们可能会给您留言，请您谅解。</p>
						</dd>
						<dt>可通话的时间段<span>必填</span></dt>
						<dd>
							<label><input type="radio" name="可通话的时间段" value="10点～12点">10点～12点</label>
							<label><input type="radio" name="可通话的时间段" value="12点～13点">12点～13点</label>
							<label><input type="radio" name="可通话的时间段" value="13点～18点">13点～18点</label>
							<label><input type="radio" name="可通话的时间段" value="18点～19点">18点～19点</label>
							<label><input type="radio" name="可通话的时间段" value="随时">随时</label>
						</dd>
						<dt>邮箱地址<span>必填</span></dt>
						<dd><input type="email" inputmode="email" name="邮箱地址" value=""><span class="excuse">（半角英文数字）</span></dd>
						<dt>邮箱地址（確認）<span>必填</span></dt>
						<dd><input type="email" inputmode="email" name="邮箱地址（確認）" value=""><span class="excuse">（半角英文数字）</span></dd>
						<dt>咨询内容<span>必填</span></dt>
						<dd>
							<strong>癌症尖端治疗</strong>
							<label><input type="checkbox" name="咨询内容" value="癌症基因治疗">癌症基因治疗</label>
							<label><input type="checkbox" name="咨询内容" value="癌症光免疫疗法">癌症光免疫疗法</label>
							<label><input type="checkbox" name="咨询内容" value="高分子抗癌药物">高分子抗癌药物</label>
							<label><input type="checkbox" name="咨询内容" value="血管内栓塞术">血管内栓塞术</label>
							<label><input type="checkbox" name="咨询内容" value="热疗法">热疗法</label>
							<strong>癌症预防·防止复发</strong>
							<label><input type="checkbox" name="咨询内容" value="低水平激光治疗（LLLT）">低水平激光治疗（LLLT）</label>
							<label><input type="checkbox" name="咨询内容" value="基因预防">基因预防</label>
							<label><input type="checkbox" name="咨询内容" value="apheresis（血液净化疗法）">apheresis（血液净化疗法）</label>
							<label><input type="checkbox" name="咨询内容" value="臭氧疗法（血液净化）">臭氧疗法（血液净化）</label>
							<strong>癌症早期筛查</strong>
							<label><input type="checkbox" name="咨询内容" value="CTC（循环肿瘤细胞）检测">CTC（循环肿瘤细胞）检测</label>
							<label><input type="checkbox" name="咨询内容" value="生物芯片检查">生物芯片检查</label>
							<label><input type="checkbox" name="咨询内容" value="滴血验癌">滴血验癌</label>
							<label><input type="checkbox" name="咨询内容" value="唾液检测">唾液检测</label>
							<label><input type="checkbox" name="咨询内容" value="癌基因检测">癌基因检测</label>
						</dd>
						<dt>您希望的就诊日期<span>必填</span></dt>
						<dd>
							<strong>第一希望</strong>
							<input type="text" id="datepicker1" name="第一希望日">
							<select name="第一希望時間">
								<option value="">请选择时间</option>
								<option value="9:00〜10:00">9:00〜10:00</option>
								<option value="10:00〜11:00">10:00〜11:00</option>
								<option value="11:00〜12:00">11:00〜12:00</option>
								<option value="12:00〜13:00">12:00〜13:00</option>
								<option value="13:00〜14:00">13:00〜14:00</option>
								<option value="14:00〜15:00">14:00〜15:00</option>
								<option value="15:00〜16:00">15:00〜16:00</option>
								<option value="16:00〜17:00">16:00〜17:00</option>
								<option value="17:00〜18:00">17:00〜18:00</option>
								<option value="18:00〜19:00">18:00〜19:00</option>
								<option value="18:00〜19:00">19:00〜20:00</option>
							</select>
							<strong>第二希望</strong>
							<input type="text" id="datepicker2" name="第二希望日">
							<select name="第二希望時間">
								<option value="">请选择时间</option>
								<option value="9:00〜10:00">9:00〜10:00</option>
								<option value="10:00〜11:00">10:00〜11:00</option>
								<option value="11:00〜12:00">11:00〜12:00</option>
								<option value="12:00〜13:00">12:00〜13:00</option>
								<option value="13:00〜14:00">13:00〜14:00</option>
								<option value="14:00〜15:00">14:00〜15:00</option>
								<option value="15:00〜16:00">15:00〜16:00</option>
								<option value="16:00〜17:00">16:00〜17:00</option>
								<option value="17:00〜18:00">17:00〜18:00</option>
								<option value="18:00〜19:00">18:00〜19:00</option>
								<option value="18:00〜19:00">19:00〜20:00</option>
							</select>
						</dd>
					</dl>
				</div>
				
				<div class="attention">
					<h3>注意事项</h3>
					<p>该表格为临时预约填写表。发送后，我们将会通过您所填写的联系方式以电话或邮件的形式回复您，在您同意我们安排的时间后，即预约完毕。</p>
					<p>・ご入力された内容に誤りがある場合、ご利用いただけない場合があります。<br>
						・メール送信後、内容確認メールが届かない場合は、再度ご記入いただくか、お電話でご予約ください。<br>
						・无法通过电话与您取得联系时，我们也可能用邮件的形式联系您，请您确认邮件。<br>
						・如果在您提交申请日（预约表格发送日）24小时后无法与您本人取得联系，您的预约将自动取消，敬请注意。<br>
						・有紧急情况者也可通过电话预约。
					</p>
					<em>电话咨询</em>
					<p>（免费热线）0081-0120-000-000<br>受理时间　00:00～00:00（周〇定休　全年无休）</p>
					<em>关于邮箱的设定</em>
					<p>手机邮箱设有垃圾邮件时，请确认设置，以便可以接收来自<a href="mailto:info@rinku-medical-clinic.com">info@rinku-medical-clinic.com</a>的邮件。</p>
				</div>
				
				<div class="privacypolicy">
					<h3>隐私权政策</h3>
					<div class="scroll">
						<p>临空医疗诊所 先进医疗中心（以下称本院），本着尊重个人人格的理念，尊重患者的隐私权，积极致力于个人信息的管理和保护。</p>
						<em>关于个人信息的收集</em>
						<p>本院收集的个人信息，用于回答患者的咨询、提问，以及收集对医疗服务的意见。需要将个人信息用于其他用途时，我们将事先通知本人使用目的，并在征得本人同意后再使用。</p>
						<em>关于个人信息的使用</em>
						<p>在使用个人信息时，我们将明确其使用目的，不会将其用于其他用途。</p>
						<em>关于个人信息的提供与公开</em>
						<p>本院除经本人同意外，不会将获得的个人信息提供给第三方。但在以下情况时，可能会公开您提供的个人信息。
							<span>・根据法律规定的要求<br>为了保护信息主体或公众的生命、健康、财产等重大利益而需要时</span>
							<span>・个人信息的管理<br>为了规避非法访问个人信息或个人信息的丢失、破坏、篡改、泄露等风险，在技术及组织层面上采取合理安全策略而需要时</span>
						</p>
						<em>遵守个人信息相关法律法令及其他规范</em>
						<p>本院为了切实保护个人信息，制定了《个人信息保护规定》并贯彻遵守。此外，还定期重审院内规定和院内体制，积极进行持续维护和改善。</p>
						<em>关于持续改善个人信息保护管理系统</em>
						<p>本院根据社会形势和环境的变化，致力于持续重审个人信息保护管理系统，积极开展信息保护活动。</p>
						<em>关于网页的cookie</em>
						<p>为了收集以通过网页的优化而提高客户服务为目的的通信量数据，本网页使用cookie。</p>
						<em>关于访问记录的收集及其使用</em>
						<p>本网站收集访问者的访问记录。这些访问记录用于掌握服务器的使用状况和提高用户的使用便利性，不会用于其他用途。</p>
						<em>关于内容的修订</em>
						<p>当本院的《隐私权政策》可能不经预告而进行修订。重大修订时，我们将在网页上通知大家。</p>
						<em>关于个人信息使用的咨询</em>
						<p>本院在接到有关个人信息使用的投诉和咨询时，将迅速对具体内容进行查实，并在合理的期限内认真采取相应措施。关于本院个人信息使用的咨询或投诉，请联系以下窗口。</p>
						<em>［联系方式］</em>
						<p>临空医疗诊所 先进医疗中心<br>电话：0081-0120-000-000 （受理时间：平日00:00〜00:00）</p>
					</div>
					<div class="privacypolicy_agree">
						<label><input type="checkbox" id="check" onclick="checkValue(this)">同意隐私权政策</label>
					</div>
				</div>
				<div class="confirmBtn"><input type="submit" id="submit_go" class="disabled" value="送信内容を確認する" disabled="disabled"></div>
			</form>
		</div><!-- /contactCotainer -->
	</section><!-- /inner -->
</main>
<?php require($_SERVER['DOCUMENT_ROOT'].'/common/include/footer.php'); ?>
</body>
</html>