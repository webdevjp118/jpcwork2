$(function(){

	// 会員割引価格
	priceCalcDiscountRate();

	/****************************************************************************
	* AJAX complete
	****************************************************************************/
	var a = 0;
	$(document).ajaxStop(function() {
		setTimeout(function(){
	
			if(a==0){
	
				// 会員割引価格
				priceCalcDiscountRate();

				a++;
			};
		},500);
	});

});



function priceCalcDiscountRate(){

	// 商品、価格、割引率　それぞれのクラスの設定
	var itemBoxClassName = '.item_price_box';
	var itemPriceClassName = '.item_price';

	var itemPriceMax, itemPriceMin, itemPricies, currentItemPrice, 
		itemPriceDiscountRate, discountRateString, itemPriceAreas, itemPriceAreaHtml;
	var itemBox = $(itemBoxClassName);

	// 商品の数分処理を行う
	itemBox.each(function(){
		
		// 比較用最大金額、最小金額を初期化
		itemPriceMax = [];
		itemPriceMin = [];
		
		// 商品ごとの価格系を取得
		itemPricies = $(this).find(itemPriceClassName);
		
		// 商品の中に価格が複数ある場合のみ「○○％引き」表示を行う
		if(itemPricies.length > 1){
			
			// 先頭の金額を取得
			currentItemPrice = getItemPrice(itemPricies, 0);
			
			// デフォルトとして先頭の金額を最大と最小に設定
			itemPriceMax = currentItemPrice;
			itemPriceMin = currentItemPrice;
			
			// 2番目以降の価格と最大・最小の比較
			for(var i=1;i<itemPricies.length;i++){
				
				// i番目の金額を取得
				currentItemPrice = getItemPrice(itemPricies, i);
				
				// 最大値の比較
				if(itemPriceMax['val'] < currentItemPrice['val'])
					itemPriceMax = currentItemPrice;
				
				// 最小値の比較
				if(itemPriceMin['val'] > currentItemPrice['val'])
					itemPriceMin = currentItemPrice;
				
			}
			
			// 割引率計算
			if(itemPriceMin['val'] > 0 && itemPriceMax['val'] > 0)
				itemPriceDiscountRate = Math.floor( itemPriceMin['val'] / itemPriceMax['val'] * 100 );
			else
				itemPriceDiscountRate = 100;
			
			// 割引率が正しく求められた場合割引率を表示し、最安値以外に2重線を引く
			if(itemPriceDiscountRate < 100){
				
				// 2重取り消し線書き込み処理
				itemPriceAreas = $(this).find('.item_teika');
				for(var i=0;i<itemPriceAreas.length;i++){
					
					// 最小値以外に2重線をつける
					if(i != itemPriceMin['key']){
						itemPriceAreaHtml = itemPriceAreas.eq(i).html();
						itemPriceAreaHtml = $('<s></s>').html(itemPriceAreaHtml);
						itemPriceAreas.eq(i).html(itemPriceAreaHtml);
					}
					
				}
			}
		}
	});
}

/*==================================================
* 価格を取得し、{ key:i番目, val:金額 } の形で返す
==================================================*/
function getItemPrice(itemPricies, i){
	// デフォルトとして最初の値を最大と最小に設定
	var itemPrice = itemPricies.eq(i).text().match(/([0-9,]+)/);
	if(itemPrice != null){
		itemPrice = itemPrice[1];
		itemPrice = itemPrice.replace(/,/g,'');
		
		// 数値として認識できる場合は価格を数値化、それ以外は0
		if(itemPrice)
			itemPrice = parseInt(itemPrice);
		else
			itemPrice = 0;
		
	}
	// 数値として値が取れない場合は0円
	else
		itemPrice = 0;
	
	var result = { key:i, val:itemPrice };
	return result;
}
