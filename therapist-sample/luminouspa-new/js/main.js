
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
	// toggle
	$('.navbar-toggler').on("click", function(){
		$(this).toggleClass('menu_open');
		$('.spmenu_wrap').toggleClass('toggle_open');
		$('body').toggleClass('overlay');
	});
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

	//buttons not by <a>tag
	$('.js_button').click(function() {
		console.log("hello");
		console.log($(this).attr('data-href'));
		if($(this).attr('data-href')) {
			location.href = $(this).attr('data-href');
		}
	});
});

$(document).ready(function() {
    // grab the initial top offset of the navigation 
    var stickyNavTop = $('#floating-1').offset().top;

    // our function that decides weather the navigation bar should have "fixed" css position or not.
    var stickyNav = function() {
        var scrollTop = $(window).scrollTop(); // our current vertical position from the top
		console.log(stickyNavTop,  scrollTop);
        // if we've scrolled more than the navigation, change its position to fixed to stick to top,
        // otherwise change it back to relative
        if (scrollTop > stickyNavTop) {
            // $('#floating-1').css("opacity", "0");
            $('#floating').css("top", "0px");
        } else {
            // $('#floating-1').css("opacity", "1");
            $('#floating').css("top", "-250px");
        }
    };

    stickyNav();
    // and run it again every time you scroll
    $(window).scroll(function() {
        stickyNav();
    });
});


