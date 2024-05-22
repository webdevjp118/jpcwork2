
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
AOS.init();
$('.main_slider').owlCarousel({
	loop:true,
	margin:0,
	items:1,
	nav:false,
	dots:false,
	autoplay:true,
	autoplayTimeout:5000,
	animateOut: 'fadeOut',
	animateIn: 'fadeIn',
});
$('.notice-slider-hp').owlCarousel({
	loop:true,
	margin:15,
	items:3,
	nav:false,
	dots:false,
	autoplay:true,
	autoplayTimeout:3000,
	responsiveClass:true,
	responsive:{
		0:{
			items:1
		},
		576:{
			items:2
		},
		768:{
			items:3
		}
	}
});
$(".mobile-menu-icon-hp").click(function() {
	$(".menu-toggle-btn").toggleClass("open");
	$(this).toggleClass("open");
	var width = $(window).width();
	if(width > 0 && width < 992)
	{
		$(".navigation").slideToggle();
		$(".overlay-mobile-menu-hp").fadeToggle();
	}
});
$(".nav-link").click(function() {
	if($(".menu-toggle-btn").hasClass("open")) {
		$(".mobile-menu-icon-hp").removeClass("open");
		$(".menu-toggle-btn").removeClass("open");
		$(".navigation").slideToggle();
		$(".overlay-mobile-menu-hp").fadeToggle();
	}
});
$('#gototop'). click(function() {
	$('html, body'). animate({
		scrollTop: 0
	}, 1000);
});

$(window).scroll(function() {
    if ($(this).scrollTop()) {
        $('#gototop').fadeIn();
    } else {
        $('#gototop').fadeOut();
    }
});

$("#gototop").click(function () {
   //1 second of animation time
   //html works for FFX but not Chrome
   //body works for Chrome but not FFX
   //This strange selector seems to work universally
   $("html, body").animate({scrollTop: 0}, 1000);
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