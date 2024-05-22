jQuery.support.cors = true;
function sendPost (page, pageSize) {
	var format = "<h3>受注番号：{slipNo}　" + 
					"購入日時：{slipDate}　" + 
					"購入店舗：{shopName}　" + 
					"<button id=\"{slipNo}\" value=\"{cpUniqueSlipNo}\">詳細表示</button>" + 
					"</h3><div id=\"{cpUniqueSlipNo}\" hidden></div>";
	var memberId = $("#memberId").text();
	var shopId = $("#shopId").val();
	var token = $("#token").text();
	var shopDiv = $("#shopDiv").text();
	var v4ApiUrlOrderHead = getv4ApiUrlOrderHead();//APIエンドポイント取得


	$.ajax({
		type: "POST",
		cache: false,
		url: v4ApiUrlOrderHead ,
		crossDomain: true,
		data: { shopId: shopId, memberId: memberId, page: page, pageSize: pageSize, shopDiv: shopDiv, oneTimeToken: token}
	}).done(function( msg ) {
		var ret = JSON.parse(msg);
		var slip_list = ret.slip_list;
		var divText = "";
		
		if (slip_list.length > 0) {
			// 購買履歴の描画
			slip_list.forEach(function(val,index,ar){
				var row = format;
				row = row.replace(/{slipNo}/g, val.slipNo);
				row = row.replace(/{slipDate}/g, val.slipDate);
				row = row.replace(/{slipNo}/g, val.slipNo);
				row = row.replace(/{cpUniqueSlipNo}/g, val.cpUniqueSlipNo);
				row = row.replace(/{shopName}/g, val.shopName);
				divText = divText + row;
			});
			$("#token").html(ret.token);
		}		
		
		if(shopDiv == "1"){	
			$("#otherSlipList").html(divText);
			$("#otherPager").html(ret.pager);
			$("#otherSlipMessage").text(ret.message);
			$("#otherPager").show();
			$("#otherSlipList").show();
		}
	}).fail(function(xhr, textStatus, errorThrown) {
		alert( "購買履歴の取得に失敗しました。" );
	});
}

$(document).on("click", "#prev", function(){
	var page = 1;
	var pageSize = 15;
	var shopDiv = $("#shopDiv").text();
	if(shopDiv == "1"){
		page = parseInt($("#otherPager > .pagelink > #current").text()) - 1;
		pageSize = $("#otherPager > .pagelink > #pageSize").val();
	}
	sendPost(page, pageSize);
});

$(document).on("click", "#next", function(){
	var page = 1;
	var pageSize = 15;
	var shopDiv = $("#shopDiv").text();
	if(shopDiv == "1"){
		page = parseInt($("#otherPager > .pagelink > #current").text()) + 1;
		pageSize = $("#otherPager > .pagelink > #pageSize").val();
	}
	sendPost(page, pageSize);
});

$(document).on("click", ".pagelink > a:not(#next,#prev)", function(){
	var page = $(this).text();
	var pageSize = 15;
	var shopDiv = $("#shopDiv").text();
	if(shopDiv == "1"){
		pageSize = $("#otherPager > .pagelink > #pageSize").val();
	}
	sendPost(page, pageSize);
});

$(document).on("change", "#pageSize", function(){
	var pageSize = 15;
	var shopDiv = $("#shopDiv").text();
	if(shopDiv == "1"){
		pageSize = $("#otherPager > .pagelink > #pageSize").val();
	}
	sendPost(1, pageSize);
});

$(function() {
	 $("#tabs").tabs();
	 $("#tabs").bind('tabsactivate', function(event, ui) {
		// クリックされたタブのインデックス
		var i = ui.newTab.index()
		if(i == 0){
			$("#shopDiv").html("2");
		} else {
			$("#shopDiv").html("1");
			if (!$("#otherPager").text()){
				sendPost(1, 15);
			}
		}
	});
});

$(document).ready(function(){
	var token = $("#token").text();
	if (token != "") {
		sendPost(1, 15);
	}
});

//詳細表示 
function detailView (targetSlipNo, targetCpSlipNo){
	if (!$("#" + targetCpSlipNo).text()) {
		var memberId = $("#memberId").text();
		var shopId = $("#shopId").val();
		var cpUniqueSlipNo = targetCpSlipNo;
		var slipNo = targetSlipNo.replace("ORDER-", "");
		var shopDiv = $("#shopDiv").text();
		var token = $("#token").text();
		var ebisMartUrl ="https://service-dev.ebisumart.com/" + shopId;　//環境に併せて変更
		
		var header = "<table>"+
			"<tr><th>商品名</th>"+
			"<th>数量</th>"+
			"<th>単価</th>"+
			"<th>小計</th>";
			
		if(shopDiv == "1"){
			header = header + 
				"<th></th>"+
				"</tr>";
		}
		
		var orderDetailRow = "<tr><td>"+
		"<div class=\"img_box\"><div class=\"inner\"><img src=\"{itemImgUrl}\" /></div></div>"+"{itemCd}<br>{itemName}</td>"+
		"<td class=\"amount\">{salesNum}個</td>"+
		"<td class=\"price\">{unitPriceInTax}円</td>"+
		"<td class=\"price\">{shokeiPrice}円</td>";
		
		if(shopDiv == "1"){
			orderDetailRow = orderDetailRow +
				"<td class=\"cart\">" + 
				"</td></tr>";
		}
		
		var sendDataRow="<tr><td colspan=6>送付先：{sendName} 様　〒{zip} {address}</td></tr>";
		var paymentWayRow = "<tr><td colspan=6>決済方法{paymentWay}</td></tr></table>";
		var v4ApiUrlOrderHead =getv4ApiUrlOrderDetail();
		$.ajax({
			type: "POST",
			url: v4ApiUrlOrderHead ,
			crossDomain: true,
			data: { shopId: shopId, memberId: memberId, cpUniqueSlipNo:	cpUniqueSlipNo, slipNo: slipNo, shopDiv: shopDiv, oneTimeToken: token}
		}).done(function( msg ) {
			var ret = JSON.parse(msg);
			var slip_detail_list = ret.slip_detail_list;
			var message = ret.message;
			if(!message){
			var divText = header.replace(/{slipNo}/g, ret.slipNo);
			var status = ret.status;
			var itemCdList="";
			var teikaList = "";
			var quantityList = "";
			if (slip_detail_list.length > 0) {
				slip_detail_list.forEach(function(val,index,ar){
												  
				var row = orderDetailRow;
				
				row = row.replace(/{itemCd}/g, val.itemCd);
				if(!val.itemImgUrl){
					row = row.replace(/{itemImgUrl}/g, "/html/noimage.jpg");
				} else {
					row = row.replace(/{itemImgUrl}/g, "/client_info/"+shopId+"/itemimage/" + val.itemImgUrl);
				}
				row = row.replace(/{itemName}/g, val.itemName);
				row = row.replace(/{salesNum}/g, val.salesNum);
				row = row.replace(/{unitPriceInTax}/g, val.unitPriceInTax);
				row = row.replace(/{shokeiPrice}/g, val.shokeiPrice);
				row = row.replace(/{itemCd}/g, val.itemCd);
				row = row.replace(/{itemCd}/g, val.itemCd);
				row = row.replace(/{teika}/g, val.teika);
				divText = divText + row;
				});
				$("#token").html(ret.token);
			}
			if(shopDiv == "1"){
				divText = divText + "</table>";
			}
			$("#" + targetCpSlipNo).html(divText);
			$("#" + targetCpSlipNo).toggle("slow");
			} else {
				$("#" + targetCpSlipNo).html(message);
				$("#" + targetCpSlipNo).toggle("slow");
			}
		}).fail(function(xhr, textStatus, errorThrown) {
			alert( "購買履歴詳細の取得に失敗しました。" );
		});
	}else{
		$("#" + targetCpSlipNo).toggle("slow");
	}
}
$(document).on("click", "button", function(){
	var targetSlipNo = $(this).attr('id');
	var targetCpSlipNo = $(this).val();
	detailView(targetSlipNo, targetCpSlipNo);
});


function getv4ApiUrlOrderHead(){
	if(isProduct()){
		return "https://aladdinec.com/v4/view/getMemberHistoryAjax";
	}else{
		return "https://dev.aladdinec.com/v4app_demo/view/getMemberHistoryAjax";
	}
	
}
function getv4ApiUrlOrderDetail(){
	if(isProduct()){
		return "https://aladdinec.com/v4/view/getMemberHistoryDetailAjax";
	}else{
		return "https://dev.aladdinec.com/v4app_demo/view/getMemberHistoryDetailAjax";
	}
	
}

//本番判定
function isProduct(){
	if( location.host.match(/^demo\./) ){
		return false;
	}else{
		return true;
	}
}
