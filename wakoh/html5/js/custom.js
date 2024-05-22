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
	setTimeout(() => {
		$('.loader-wrapper').fadeOut('slow');
	}, 2000);
	// navbar toggle js
	$('.navbar_toggler').click(function(){
		$('body').toggleClass('no_scroll');
		$(this).toggleClass('open_menu');
		$(this).next("nav").toggleClass('navbar_animate');
	});

	//model house slider Js
	$('.model_house_slider').slick({
		dots: true,
		infinite: false,
		speed: 300,
		autoplay: true,
		autoplaySpeed: 2000,
		slidesToShow: 4.5,
		slidesToScroll: 1,
		nextArrow:'.next_btn',
		prevArrow:'.prev_btn',
		responsive: [
		{
			breakpoint: 1367,
			settings: {
				slidesToShow: 3.5,
			}
		},
		{
			breakpoint: 1025,
			settings: {
				slidesToShow: 3,
			}
		},
		{
			breakpoint: 901,
			settings: {
				slidesToShow: 2.5,
			}
		},
		{
			breakpoint: 576,
			settings: {
				slidesToShow: 1.5,
			}
		}
		]
	});

	//customer example slider Js
	var $status = $('.pagingInfo');
	var $slickElement = $('.customer_example_image_slider');

	$slickElement.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
		// currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
		var i = (currentSlide ? currentSlide : 0) + 1;
		$status.html('<span>0'+ i + '</span>' + '<span>0' + slick.slideCount + '</span>');
	});

	$slickElement.slick({
		dots: true,
		infinite: true,
		arrows: true,
		autoplay: true,
		autoplaySpeed: 2000,
		nextArrow: '<button class="slick-next slick-arrow" type="button"><i class="fas fa-chevron-right"></i></button>',
		prevArrow: '<button class="slick-prev slick-arrow" type="button"><i class="fas fa-chevron-left"></i></button>',
		speed: 300,
		slidesToShow: 1,
		slidesToScroll: 1,
		asNavFor: '.customer_example_slider_small'
	});

	// customer_example_slider_small
	$('.customer_example_slider_small').slick({
		dots: false,
		infinite: true,
		arrows: true,
		autoplay: true,
		autoplaySpeed: 2000,
		nextArrow: '<button class="slick-next slick-arrow" type="button"><i class="fas fa-chevron-right"></i></button>',
		prevArrow: '<button class="slick-prev slick-arrow" type="button"><i class="fas fa-chevron-left"></i></button>',
		speed: 300,
		slidesToShow: 1,
		slidesToScroll: 1,
		asNavFor: '.customer_example_image_slider'
	});

	// 
	$(".grant_freedom_text_box_inner a").click(function(e){
		e.preventDefault();
		$(".grant_freedom_text_box_content").slideToggle();
		$(this).toggleClass("active_btn")
	});
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
});