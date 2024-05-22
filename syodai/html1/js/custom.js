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
	$('.navbar_toggler').click(function(){
		$(this).toggleClass('open_menu');
		$(".custom_navbar").slideToggle();
	});
	$(window).resize(function(){
		$('.navbar_toggler').removeClass('open_menu');
		$('.custom_navbar').removeAttr('style');
	});

	// nationwide tab JS
	$('.nationwide_list_tab_title ul li a').click(function(){
		$('.nationwide_list_tab_title ul li a').removeClass('active_tab');
		$(this).addClass('active_tab');
		var tagid = $(this).data('tag');
		$('.nationwide_list_tab_content .nationwide_tab_content').removeClass('tab_content_active').hide();
		$('#'+tagid).addClass('tab_content_active').show();
	});

    // article slider JS
    $('.article_slider').slick({
    	dots: true,
    	infinite: true,
    	centerMode: true,
    	centerPadding: '150px',
    	slidesToShow: 3,
    	slidesToScroll: 1,
    	nextArrow: '<a href="#" class="slick-next slick-arrow article_next"><i class="fas fa-chevron-right"></i></a>',
    	prevArrow: '<a href="#" class="slick-prev slick-arrow article_prev"><i class="fas fa-chevron-left"></i></a>',
    	responsive: [
    	{
    		breakpoint: 1401,
    		settings: {
    			centerPadding: '420px',
    			slidesToShow: 1,
    		}
    	},
    	{
    		breakpoint: 1285,
    		settings: {
    			centerPadding: '350px',
    			slidesToShow: 1,
    		}
    	},
    	{
    		breakpoint: 1240,
    		settings: {
    			centerPadding: '300px',
    			slidesToShow: 1,
    		}
    	},
    	{
    		breakpoint: 1167,
    		settings: {
    			centerPadding: '220px',
    			slidesToShow: 1,
    		}
    	},
    	{
    		breakpoint: 901,
    		settings: {
    			centerPadding: '170px',
    			slidesToShow: 1,
    		}
    	},
    	{
    		breakpoint: 676,
    		settings: {
    			infinite: false,
    			centerMode: false,
    			centerPadding: '0px',
    			slidesToShow: 1.3,
    			arrows: false
    		}
    	}
    	]
    });

    // repair guide dropdown JS
    $(".has_custom_drop_menu h4").click(function(e){
    	e.preventDefault();
    	if($(this).next().hasClass('open_drop_down') == true && $(this).hasClass('drop_icon_rotate')){
    		$(".custom_drop_menu").slideUp().removeClass('open_drop_down');
    		$(".has_custom_drop_menu h4").removeClass('drop_icon_rotate');
    	}else {
    		$(".custom_drop_menu").slideUp().removeClass('open_drop_down');
    		$(".has_custom_drop_menu h4").removeClass('drop_icon_rotate');
    		$(this).next().slideDown().addClass('open_drop_down');
    		$(this).addClass("drop_icon_rotate");
    	}
    });

    // model JS
    $(".custom_model").hide();
	$('.model_btn').click(function(){
		var tagid = $(this).data('tag');
		console.log(tagid);
		$('#'+tagid).addClass('model_active').fadeIn();
		$('body').toggleClass('no_scroll');
	});
	$('.model_close_btn').click(function(){
		$(".custom_model").fadeOut();
		$('body').removeClass('no_scroll');
	});

	// form tab JS
	$('.all_forms_tab_list ul li a').click(function(){
		$('.all_forms_tab_list ul li a').removeClass('active_tab');
		$(this).addClass('active_tab');
		var tagid = $(this).data('tag');
		$('.all_forms_tab_content_sec .all_forms_tab_content').removeClass('tab_content_active').hide();
		$('#'+tagid).addClass('tab_content_active').show();
	});

	// custom scroll JS
	$(".all_form_scroll_custom").mCustomScrollbar()

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