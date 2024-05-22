$(function() {

	/****************************************************************************
	* Page Scroll　ページ内リンクの位置調整
	****************************************************************************/
	
	var header_h = $("header").height(); //header高さを取得
	var scrollTop = $(document).scrollTop();//スクロール位置を取得

	// 同一ページ内リンク（href値にページurlが含まれている場合にも対応）
	$('a').click(function() {

		// clickしたaタグのhref内に"#"があるとき
		if(~$(this).attr('href').indexOf('#')){
			header_h = $("header").height();//header高さを再取得
			var clickHash = encodeURI($(this).attr("href")).match(/(#[\w-]+)$/);

			if(clickHash !== null){
				clickHash = clickHash[1];
				var position = $(clickHash).offset().top;
				//PCのみ位置調整する
				if (isSmartPhone()) {//スマホなら
					// スマホ スクロール
					$('body,html').animate({scrollTop:position}, 400, 'swing');
				}else{
					// PC スクロール
					position = $(clickHash).offset().top - (header_h); //headerの高さを引く
					$('body,html').animate({scrollTop:position}, 400, 'swing');
				}
			}
		}
		
	});
	
	// 他URLからのページ内リンク（ページ読み込み時にURLに#が付与されている場合に対応）
	$(window).on("load",function(){
		
			// ページ読み込み時にハッシュタグの要素がページ内に存在する時
			if($(location.hash).length){
				var position = $(location.hash).offset().top;
				//スマホのみ位置調整する
				if (isSmartPhone()) {//スマホなら
				}else{
					position = $(location.hash).offset().top - (header_h); //headerの高さを引く
				}
				$('body,html').animate({scrollTop:position}, 200, 'swing'); // url内のハッシュの要素の位置にスクロール
			}
	});

});

/****************************************************************************
* レスポンシブ　ブレイクポイントとスマホ判定
****************************************************************************/
var MaxSpSize = '(max-width:599px)';
function isSmartPhone(){
		if (window.matchMedia(MaxSpSize).matches) {
				return true;
		}
				return false;
}
