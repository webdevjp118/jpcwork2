// on page scroll animations js
$(window).on('load',function() {
	$('.loader-wrapper').fadeOut('slow');
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
		// $("#id_selectbox").on("change", function() {
		// 	$(this).removeClass("holder_col").addClass("active_col");
		// });
	});
});

$(document).ready(function(){

	// navbar toggle js
	// $('.navbar_toggler').click(function(){
	// 	$('body').toggleClass('no_scroll');
	// 	$(this).toggleClass('open_menu');
	// 	$(this).next("nav").toggleClass('navbar_animate');
	// });

	// got to page top js
	// $(window).on('load scroll',function(){
	// 	var	windowTop = $(window).scrollTop();
	// 	if(windowTop > 600) {
	// 		$('.pagetop').fadeIn();
	// 	} else {
	// 		$('.pagetop').fadeOut();
	// 	}
	// });
	// $('.pagetop').on('click', function (event) {
	// 	event.preventDefault();
	// 	$('body,html').animate({
	// 		scrollTop: 0,
	// 	}, 800);
	// });

	// responsive accordian tab JS
	$('.responsive_accordian_tab').responsiveTabs({
		startCollapsed: 'accordion',
		active: 0,
		animation: 'slide'
	});

	setTimeout(function(){
		var triggerEl = $('.active_tab_on_load').prev('.r-tabs-accordion-title').find('.r-tabs-anchor')
		triggerEl.trigger('click');
	},100);

	// assuming slider JS
	$('.assuming_slider').slick({
			dots: false,
			infinite: true,
			speed: 300,
			slidesToShow: 1,
			slidesToScroll: 1,
			nextArrow: '<button class="slick-next slick-arrow" type="button"><i class="fas fa-chevron-right"></i></button>',
			prevArrow: '<button class="slick-prev slick-arrow" type="button"><i class="fas fa-chevron-left"></i></button>',
		});

});
$( function() {
    $( ".jquery_ui_accordian" ).accordion();
});