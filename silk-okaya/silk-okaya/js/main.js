
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
	// $('a:not([href*="#"], [href^="mailto"], [href^="tel"], [target], .no-transition, .fancybox)').on('click', function(e){ //汎用
	// /* $('header nav ul li a').on('click', function(e){ */ //グローバルナビのみ
	// 	e.preventDefault(); //ナビゲートをキャンセル
	// 	url = $(this).attr('href'); //遷移先のURLを取得
	// 	$("#loader").remove(); //リンク元ページではloaderを削除
	// 	if (url !== '') {
	// 		$('body').removeClass('evacuation');
	// 		$('body').addClass('transition');
	// 		setTimeout(function(){
	// 			window.location = url;
	// 		}, 800); //0.8秒後に取得したURLに遷移
	// 	}
	// 	return false;
	// });
	
	// ブラウザバックで再ロードさせる処理
	$(window).on("pageshow",function() {
		if (event.persisted) {
			window.location.reload();
		}
	});

	// Custom
	// var lastId,
    // sideMenu = $(".left_side_bar .left_side_bar_inner ul li, .left_side_bar_bottom ul li"),
    // menuItems = sideMenu.find("a"),
    // scrollItems = menuItems.map(function () {
    //     var item = $($(this).attr("href"));
    //     if (item.length) {
    //         return item;
    //     }
    // });
    // menuItems.click(function (e) {
    //     var href = $(this).attr("href"),
    //     offsetTop = href === "#" ? 0 : $(href).offset().top + 1;
    //     $('html, body').stop().animate({
    //         scrollTop: offsetTop
    //     }, 1200);
    //     e.preventDefault();
    // });
    // $(document).scroll(function () {
    //     var fromTop = $(this).scrollTop() + 1;
    //     var cur = scrollItems.map(function () {
    //         if ($(this).offset().top < fromTop)
    //             return this;
    //     });
    //     cur = cur[cur.length - 1];
    //     var id = cur && cur.length ? cur[0].id : "";

    //     if (lastId !== id) {
    //         lastId = id;
    //     }
    // });
    $('.filter_btns li a').click(function(){
        $('.navbar-nav li a[href="#masonryFilter"]').trigger('click');
    });

    $('.banner_slider').slick({
        dots: true,
        fade: true,
        speed: 500,
        arrows: false,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 4000,
    });
    $('.navbar_toggler').click(function(){
        $('body').toggleClass('no_scroll');
        $(this).toggleClass('open_menu');
        $(this).next(".toggle_navbar_custom").toggleClass('navbar_animate');
    });
    $(window).on('load resize', function(){
        var hraderHeight = 0;
        var content_height = $('.left_side_bar').outerHeight();
        var fixedSideBarHeight = $('.left_side_bar_inner').outerHeight();
        var sidebar_wapper_width = $('.left_side_bar').width();
        $('.left_side_bar_inner').css({'width': sidebar_wapper_width});
        if(content_height >= fixedSideBarHeight){
            $(document).scroll(function(){
                var sideOffset = 0;
				if($('.left_side_bar').length) $('.left_side_bar').offset().top;
                var documentScrollTop = $(document).scrollTop();
                if(documentScrollTop >= sideOffset && (documentScrollTop - sideOffset) <= (content_height - fixedSideBarHeight)){
                    $('.left_side_bar_inner').css({'position': 'fixed', 'top': '0'});
                }
                else if((documentScrollTop - sideOffset) >= (content_height - fixedSideBarHeight)){
                    $('.left_side_bar_inner').css({'position': 'absolute', 'top': content_height - fixedSideBarHeight});
                }
                else{
                    $('.left_side_bar_inner').css({'position': 'relative', 'top': 0});
                }
            });
        }else if(content_height < fixedSideBarHeight){
            $('.left_side_bar_inner').css({'position': 'relative'});
        }
    });

	$('.js_button').click(function() {
		if($(this).attr('data-href')) {
			location.href = $(this).attr('data-href');
		}
	});
});
