// JAVASCRIPT
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