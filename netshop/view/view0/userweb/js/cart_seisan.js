$(function(){
		   
	/* ********************************************************************************
	//クレジットカードエリアの表示・非表示
	***********************************************************************************/
	//カード情報入力欄を非表示にする
	$('#if_credit').hide();
	
	var creditCardId = 'jp.co.interfactory.util.httpKESSAI_ID.217'; //クレジットカードのラジオボタンid
	var creditCardRadioButton = $('input[id="' + creditCardId + '"]');
	
	//ページ読み込み時にクレジットカードを選択していたらカード情報入力欄を表示する
	if(creditCardRadioButton.prop('checked')) $('#if_credit').show();
	
	//支払方法でクレジットカードを選択したらカード情報入力欄を表示する
	$('input[id^="jp.co.interfactory.util.httpKESSAI_ID.217"]').click(function(){
		if ($(this).attr("id") == creditCardId){
			$('#if_credit').fadeIn();
		}else{
			$('#if_credit').fadeOut();
		}
	});	
});

