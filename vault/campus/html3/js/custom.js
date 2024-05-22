// JAVASCRIPT
$(function() {
    var observer = new IntersectionObserver(function(entries) {
		entries.forEach(function(e) {
			if (!e.isIntersecting) return;
			e.target.classList.add('move'); // 交差した時の処理
			observer.unobserve(e.target);
			// target element:
		    //   e.target				ターゲット
		    //   e.isIntersecting		交差しているかどうか
		    //   e.intersectionRatio	交差している領域の割合
		    //   e.intersectionRect		交差領域のgetBoundingClientRect()
		    //   e.boundingClientRect	ターゲットのgetBoundingClientRect()
		    //   e.rootBounds			ルートのgetBoundingClientRect()
		    //   e.time					変更が起こったタイムスタンプ
		})

	},{
    	// オプション設定
		rootMargin: '0px 0px -5% 0px' //下端から5%入ったところで発火
		//threshold: [0, 0.5, 1.0]
	});

	var target = document.querySelectorAll('.io'); //監視したい要素をNodeListで取得
	for(var i = 0; i < target.length; i++ ) {
	    observer.observe(target[i]); // 要素の監視を開始
	}

	//アニメーションによる各要素のはみ出しを解消
	$("body").wrapInner("<div style='overflow:hidden;'></div>");
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
});
$(document).ready(function(){
    // AOS.init();

    // Header Toggle JS
    $('#header-nav-controller button').click(function(){
        $('#header').toggleClass('menu-active');
        $('body').toggleClass('no-scroll');
    });
    $(".spmenu_link").click(function() {
        if($("#header").hasClass("menu-active")) {
            $("#header").removeClass("menu-active");
            $(".menu-toggle-btn").removeClass("open");
            $('body').removeClass('no-scroll');
        }
    });
    // Banner Slider JS
    $('.banner-slide').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        fade: true,
        speed: 2000,
        autoplaySpeed: 3000,
        arrows: false,
        dots: false
    });

    // Fixed Position Button
    $(window).scroll(function() {    
        var scroll = $(window).scrollTop();
    
        if (scroll > 30) {
            $(".sticky-btm-btn").addClass("pos-fix");
        }else{
            $(".sticky-btm-btn").removeClass("pos-fix");
        }
    });

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