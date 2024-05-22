// --------------ゼウストークン決済用jsから、UIの部分を再構成(PC版)--------------
zeusTokenClass.prototype.initCardFormItems = function () {
	var label, input, select, option, span, zeus_registerd_card_area, zeus_new_card_area;
	var card_info_area = document.getElementById('zeus_token_card_info_area');
	card_info_area.textContent = null;

	input = document.createElement('input');
	input.setAttribute('type', 'hidden');
	input.setAttribute('value', '');
	input.setAttribute('id', 'zeus_token_value');
	input.setAttribute('name', 'zeus_token_value');
	card_info_area.appendChild(input);

	input = document.createElement('input');
	input.setAttribute('type', 'hidden');
	input.setAttribute('value', '');
	input.setAttribute('id', 'zeus_token_masked_card_no');
	input.setAttribute('name', 'zeus_token_masked_card_no');
	card_info_area.appendChild(input);

	input = document.createElement('input');
	input.setAttribute('type', 'hidden');
	input.setAttribute('value', '');
	input.setAttribute('id', 'zeus_token_return_card_expires_month');
	input.setAttribute('name', 'zeus_token_return_card_expires_month');
	card_info_area.appendChild(input);

	input = document.createElement('input');
	input.setAttribute('type', 'hidden');
	input.setAttribute('value', '');
	input.setAttribute('id', 'zeus_token_return_card_expires_year');
	input.setAttribute('name', 'zeus_token_return_card_expires_year');
	card_info_area.appendChild(input);

	input = document.createElement('input');
	input.setAttribute('type', 'hidden');
	input.setAttribute('value', '');
	input.setAttribute('id', 'zeus_token_masked_cvv');
	input.setAttribute('name', 'zeus_token_masked_cvv');
	card_info_area.appendChild(input);

	input = document.createElement('input');
	input.setAttribute('type', 'hidden');
	input.setAttribute('value', '');
	input.setAttribute('id', 'zeus_token_return_card_name');
	input.setAttribute('name', 'zeus_token_return_card_name');
	card_info_area.appendChild(input);


	input = document.createElement('input');
	input.setAttribute('type', 'hidden');
	input.setAttribute('value', 'prev');
	input.setAttribute('id', 'zeus_token_action_type_quick');
	input.setAttribute('name', 'zeus_card_option');
	card_info_area.appendChild(input);

	zeus_registerd_card_area = document.createElement('div');
	zeus_registerd_card_area.setAttribute('id', 'zeus_registerd_card_area');

	// ゼウス用UIの登録カードを使用する際のものだが、標準の物を使用するためhiddenタグにする。
	input = document.createElement('hidden');
	input.setAttribute('type', 'tel');
	input.setAttribute('value', '');
	input.setAttribute('id', 'zeus_token_card_cvv_for_registerd_card');
	input.setAttribute('name', 'zeus_token_card_cvv_for_registerd_card');
	input.setAttribute('size', '4');
	input.setAttribute('maxlength', '5');
	zeus_registerd_card_area.appendChild(input);

	card_info_area.appendChild(zeus_registerd_card_area);
	
	
	zeus_new_card_area = document.createElement('div');
	zeus_new_card_area.setAttribute('id', 'zeus_new_card_area');
	zeus_new_card_area.setAttribute('style', 'margin: 0 0 0 0;');
	
	card_info_area.appendChild(zeus_new_card_area);
	
	table = document.createElement('table');
	zeus_new_card_area.appendChild(table);
	
	tr = document.createElement('tr');
	table.appendChild(tr);
	
	td = document.createElement('td');
	tr.appendChild(td);
	
	div = document.createElement('div');
	td.appendChild(div);

	// -----新しいカードを使用する際のラジオボタン-----
	input = document.createElement('input');
	input.setAttribute('type', 'radio');
	input.setAttribute('value', 'new');
	input.setAttribute('id', 'zeus_token_action_type_new');
	input.setAttribute('name', 'zeus_card_option');
	// カード登録、定期変更画面は非表示にする
	if (location.pathname.indexOf("member_credit_entry") != -1
			|| location.pathname.indexOf("teiki_renew") != -1) {
		input.setAttribute('style', 'display: none;');
	}
	div.appendChild(input);

	// -----新しいカードを使用する際のラジオボタンのラベル-----
	// カート精算画面のみ表示
	if (location.pathname.indexOf("cart_") != -1) {
		label = document.createElement('label');
		label.setAttribute('for', 'zeus_token_action_type_new');
		label.textContent = this.zeusTokenItem["zeus_token_action_type_new_label"];
		label.setAttribute('style', 'display: inline;');
		div.appendChild(label);
	}

	// -----新しいカードのカード番号のラベル-----
	label = document.createElement('label');
	label.setAttribute('for', 'zeus_token_card_number');
	label.textContent = this.zeusTokenItem["zeus_token_card_number_label"];
	td.appendChild(label);

	// -----新しいカードのカード番号の入力フォーム-----
	input = document.createElement('input');
	input.setAttribute('type', 'tel');
	input.setAttribute('value', '');
	input.setAttribute('id', 'zeus_token_card_number');
	input.setAttribute('name', 'zeus_token_card_number');
	input.setAttribute('autocomplete', 'off');
	td.appendChild(input);

	// -----新しいカードの有効期限のラベル-----
	label = document.createElement('label');
	label.setAttribute('for', 'zeus_token_card_expires_month');
	label.textContent = this.zeusTokenItem["zeus_token_card_expires_label"];
	td.appendChild(label);

	// -----新しいカードの有効期限(月)-----
	select = document.createElement('select');
	select.setAttribute('id', 'zeus_token_card_expires_month');
	select.setAttribute('name', 'zeus_token_card_expires_month');
	option = document.createElement('option');
	option.setAttribute('value', '');
	option.textContent = '--';
	select.appendChild(option);
	for (var month=1; month<=12; month++) {
		var tmp = ("0"+month).slice(-2);
		option = document.createElement('option');
		option.setAttribute('value', tmp);
		option.textContent = tmp;
		select.appendChild(option);
	}
	td.appendChild(select);

	span = document.createElement('span');
	span.setAttribute('id', 'zeus_token_card_expires_month_suffix');
	span.textContent = this.zeusTokenItem["zeus_token_card_expires_month_suffix"] + '/';
	td.appendChild(span);

	// -----新しいカードの有効期限(年)-----
	select = document.createElement('select');
	select.setAttribute('id', 'zeus_token_card_expires_year');
	select.setAttribute('name', 'zeus_token_card_expires_year');
	option = document.createElement('option');
	option.setAttribute('value', '');
	option.textContent = '--';
	select.appendChild(option);
	var today = new Date();
	for (var year=today.getFullYear(); year<=today.getFullYear()+10; year++) {
		option = document.createElement('option');
		option.setAttribute('value', year);
		option.textContent = year;
		select.appendChild(option);
	}
	td.appendChild(select);

	span = document.createElement('span');
	span.setAttribute('id', 'zeus_token_card_expires_year_suffix');
	span.textContent = this.zeusTokenItem["zeus_token_card_expires_year_suffix"];
	td.appendChild(span);

	td.appendChild(document.createElement('br'));

	// -----新しいカードの有効期限の入力例-----
	span = document.createElement('span');
	span.setAttribute('id', 'zeus_token_card_expires_note');
	span.textContent = this.zeusTokenItem["zeus_token_card_expires_note"];
	td.appendChild(span);

	// -----新しいカードのカード名義のラベル-----
	label = document.createElement('label');
	label.setAttribute('for', 'zeus_token_card_name');
	label.textContent = this.zeusTokenItem["zeus_token_card_name_label"];
	td.appendChild(label);

	// -----新しいカードのカード名義の入力フォーム-----
	input = document.createElement('input');
	input.setAttribute('type', 'text');
	input.setAttribute('value', '');
	input.setAttribute('id', 'zeus_token_card_name');
	input.setAttribute('name', 'zeus_token_card_name');
	td.appendChild(input);
	
	var is_exist_cvv_request_url = jQuery("script[src='https://linkpt.cardservice.co.jp/api/token/1.0/zeus_token_cvv.js']").size();
	// リクエストURLがセキュリティコードありの物だった場合のみ表示
	if (is_exist_cvv_request_url) {
		// カート精算画面のみ別テーブルにする
		if (location.pathname.indexOf("cart_") != -1) {
			table = document.createElement('table');
			zeus_new_card_area.appendChild(table);
	
			tr = document.createElement('tr');
			table.appendChild(tr);
	
			td = document.createElement('td');
			tr.appendChild(td);
		}
	
		// -----セキュリティコードのラベル-----
		label = document.createElement('label');
		label.setAttribute('for', 'zeus_token_card_cvv');
		label.textContent = this.zeusTokenItem["zeus_token_card_cvv_for_new_card_label"];
		td.appendChild(label);
		
		// -----セキュリティコードの入力フォーム-----
		input = document.createElement('input');
		input.setAttribute('type', 'tel');
		input.setAttribute('value', '');
		input.setAttribute('id', 'zeus_token_card_cvv');
		input.setAttribute('name', 'zeus_token_card_cvv');
		input.setAttribute('size', '4');
		input.setAttribute('maxlength', '5');
		td.appendChild(input);
	}
	
	// ゼウストークンjsで新しいカードのラジオボタンがデフォルトでcheckedになるため、
	// 登録カードはチェックを外す
	jQuery('input[name=SAVED_CARD_VERI_TORIHIKI_ID]').attr('checked', false);
	
};

zeusTokenClass.prototype.disableRegisterdCardArea = function () {

};

// エラー文言は<head>に入れたjsより取得する
zeusTokenClass.prototype.getErrorMessage = function (error_code) {
	if (typeof this.zeusTokenItem["zeus_token_error_messages"] != "object") {
		return error_code + "An error has occurred.";
	}
	if (typeof this.zeusTokenItem["zeus_token_error_messages"][error_code] == null) {
		return error_code + "An error has occurred.";
	}
	if (typeof this.zeusTokenItem["zeus_token_error_messages"][error_code] != "string") {
		return error_code + " : An error has occurred.";
	}
	return error_code + ' : ' + zeusTokenCustomItem["zeus_token_error_messages"][error_code]
}

//--------------ゼウストークン決済用jsから、UIの部分を再構成　ここまで--------------

//新しいカードのラジオボタンをクリックしたら、登録済みカードのラジオボタンのチェックをはずず
jQuery(document).on('click','#zeus_token_action_type_new',function(){
	var value = jQuery('input[name=SAVED_CARD_VERI_TORIHIKI_ID]').attr('value');
	jQuery('input[name=SAVED_CARD_VERI_TORIHIKI_ID][value='+value+']').attr('checked', false);
});

// 登録済みカードのラジオボタンをクリックしたら、新しいカードのラジオボタンのチェックをはずず
jQuery(document).on('click','input[name=SAVED_CARD_VERI_TORIHIKI_ID]',function(){
	jQuery('#zeus_token_action_type_new').attr('checked', false);
});