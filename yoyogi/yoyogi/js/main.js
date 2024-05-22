$(document).ready(function(){
    //Sticky Header
    $(window).scroll(function(){
        var headerHeight = $('#header').outerHeight();
        var scroll = $(window).scrollTop();
        var windowWidth = $(window).width();
        
        if (scroll >= 1 && windowWidth <= 991){ 
            $('#header').addClass('sticky');
            $("body").css({"padding-top": headerHeight});
        }else{
            $('#header').removeClass('sticky');
            $("body").css({"padding-top": "0px"});
        }
    });
    
    // toggle button js
    $('button.menu-toggle-btn').click(function(){
        $('nav.header-nav').toggleClass('menu-active');
        $('main#main').toggleClass('pos-fix');
    });

    // banner slider js
    $('.banner-slider-nav').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        centerMode: true,
        focusOnSelect: true,
        centerPadding: '36.5%',
        prevArrow: '<button type="button" class="slick-prev slick-arrow"><i class="fa fa-angle-left" aria-hidden="true"></i></button>',
        nextArrow: '<button type="button" class="slick-next slick-arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></button>',
        responsive: [
        {
            breakpoint: 1281,
            settings: {
                centerPadding: '34%',
            }
        },
        {
            breakpoint: 768,
            settings: {
                centerPadding: '0%',
            }
        }
        ]
    });
	$('.js_button').click(function() {
		if($(this).attr('data-href')) {
			if($(this).attr('data-target')) {
				window.open($(this).attr('data-href'), '_blank');
			}
			else {
				location.href = $(this).attr('data-href');
			}
			
		}
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

