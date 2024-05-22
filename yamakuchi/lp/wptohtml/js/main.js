$(document).ready(function(){
	// banner
	$(".banner").slick({
		dots: true,
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		autoplay:true,
  		autoplaySpeed:3000,
		speed: 2000,
	});

	// toggle
	$(window).resize(function(){
		$(".sp_menu_wrap").removeAttr('style');
		$(".navbar-toggler").removeClass('menu_open');
	});

	$('.navbar-toggler').on("click", function(){
		$(this).toggleClass('menu_open');
		$(".sp_menu_wrap").slideToggle();
	});

	$( "#accordion" ).accordion({
		heightStyle: "content"
	});

	// bottom to top
	var btn = $('.topbtn');

	btn.on('click', function(e) {
		e.preventDefault();
		$('html, body').animate({scrollTop:0}, '300');
	});
});
/*---------------------------------------------------
	デバイス判定
---------------------------------------------------*/

var _ua = (function(){
	var ua = navigator.userAgent;
	if (ua.indexOf('iPhone') > 0 || ua.indexOf('iPod') > 0 || (ua.indexOf('Android') > 0 && ua.indexOf('Mobile') > 0) || ua.indexOf('Windows Phone') > 0) {
		return 'sp'
	} else if (ua.indexOf('iPad') > 0 || (ua.indexOf('Android') > 0 && ua.indexOf('Mobile') == -1) || (ua.indexOf('Windows') > 0 && ua.indexOf('Touch') > 0)) {
		return 'tablet'
	} else {
		return 'pc'
	}
})();

/*
	if (_ua == 'sp') {
		//スマホ
	} else if (_ua == 'tablet') {
		//タブレット
	} else if (_ua == 'pc') {
		//PC
	}
	
	if (_ua == 'sp') {
		//スマホ
	}
	
	if (_ua != 'sp') {
		//スマホ以外
	}	
*/


$(function() {

	/*---------------------------------------------------
		共通
	---------------------------------------------------*/

	/* ------------- ページ遷移時のトランジション（bodyに.transitionを付与） ------------- */

	$(window).on('load pageshow', function(){
		$('body').removeClass('transition');
		setTimeout(function(){
			$('body').addClass('evacuation'); //0.8秒後に退避用スタイル追加 ex)z-index
		}, 800);
	});

	$('body').delay(8000).queue(function() { //8秒経ったら強制的にclassを削除
		$(this).removeClass('transition').dequeue();
	});

	/* $('a:not([href*="#"]):not([href^="mailto"]):not([href^="tel"]):not([target]):not(.no-transition):not(.fancybox)').on('click', function(e){ */ //汎用
	$('a:not([href*="#"], [href^="mailto"], [href^="tel"], [target], .no-transition, .fancybox)').on('click', function(e){ //汎用
	/* $('header nav ul li a').on('click', function(e){ */ //グローバルナビのみ
		e.preventDefault(); //ナビゲートをキャンセル
		url = $(this).attr('href'); //遷移先のURLを取得
		$("#loader").remove(); //リンク元ページではloaderを削除
		if (url !== '') {
			$('body').removeClass('evacuation');
			$('body').addClass('transition');
			setTimeout(function(){
				window.location = url;
			}, 800); //0.8秒後に取得したURLに遷移
		}
		return false;
	});
	
	// ブラウザバックで再ロードさせる処理
	$(window).on("pageshow",function() {
		if (event.persisted) {
			window.location.reload();
		}
	});

});

