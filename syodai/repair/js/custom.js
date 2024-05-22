// document.querySelectorAll('.all_forms_sec input[type="text"]').forEach(e => {
// 	e.addEventListener('focusout', setInputBackground)
// });
  
// function setInputBackground() {
// 	this.style.backgroundColor = !!this.value ? "white" : "#f0f5fa";
// }
// on page scroll animations js
$(window).on('load',function() {
	$('.loader-wrapper').fadeOut('slow');
	$('.api-loader-wrapper').fadeOut();
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
	//get current location
	$('#id_get_cur_location').click(function(){
		console.log('hello');
		// navigator.geolocation.getCurrentPosition(
		// 	function( position ){ // success cb
		// 		console.log( position );
		// 	},
		// 	function(){ // fail cb
		// 		console.log('location failed!');
		// 	}
		// );
		var latitude = '35.6811673';
		var longitude = '139.7648629';
		var apiKey = 'your-key';
		var requestURL = 'https://maps.googleapis.com/maps/api/geocode/json?language=ja&sensor=false';
		requestURL += '&latlng=' + latitude + ',' + longitude;
		requestURL += '&key=' + apiKey;
		requestAjax(requestURL, function(response){
		if (response.error_message) {
			console.log(response.error_message);
		} else {
			var formattedAddress = response.results[0]['formatted_address'];
			// 住所は「日本、〒100-0005 東京都千代田区丸の内一丁目」の形式
			var data = formattedAddress.split(' ');
			if (data[1]) {
			// id=addressに住所を設定する
				//document.getElementById('address').innerHTML = data[1];
			}
		}
		});
		
	});
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
    	nextArrow: '<a href="#" class="slick-next slick-arrow article_next"></a>',
    	prevArrow: '<a href="#" class="slick-prev slick-arrow article_prev"></a>',
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
    // $(".has_custom_drop_menu h4").click(function(e){
    // 	e.preventDefault();
    // 	if($(this).next().hasClass('open_drop_down') == true && $(this).hasClass('drop_icon_rotate')){
    // 		$(".custom_drop_menu").slideUp().removeClass('open_drop_down');
    // 		$(".has_custom_drop_menu h4").removeClass('drop_icon_rotate');
    // 	}else {
    // 		$(".custom_drop_menu").slideUp().removeClass('open_drop_down');
    // 		$(".has_custom_drop_menu h4").removeClass('drop_icon_rotate');
    // 		$(this).next().slideDown().addClass('open_drop_down');
    // 		$(this).addClass("drop_icon_rotate");
    // 	}
    // });

    // form tab JS
	// $('.all_forms_tab_list ul li a').click(function(){
	// 	$('.all_forms_tab_list ul li a').removeClass('active_tab');
	// 	$(this).addClass('active_tab');
	// 	var tagid = $(this).data('tag');
	// 	$('.all_forms_tab_content_sec .all_forms_tab_content').removeClass('tab_content_active').hide();
	// 	$('#'+tagid).addClass('tab_content_active').show();
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

	// custom scroll JS
	$(".all_form_scroll_custom").mCustomScrollbar();
	$(".cscroll_obj").mCustomScrollbar();

	/*custom form control customize*/
	$(".cinput_obj input, .cselect_obj input, .ctreesel_obj input").click(function(){
		$(".cselobj_options, .ctreesel_options").css({"display":"none"});
		$(".cinput_obj, .cselect_obj, .ctreesel_obj").removeClass("cstt_opened");
		$(".cinput_obj, .cselect_obj, .ctreesel_obj").removeClass("cstt_error");
		$(this).addClass("cstt_opened");
	});
	$(".cinput_obj input").blur(function(){
		if($(this).val() == ""){
			$(this).closest('.cinput_obj').removeClass("cinput_filled");
		}	
		else {
			$(this).closest('.cinput_obj').removeClass("cinput_filled").addClass("cinput_filled");
		}
	});
	$(".cinput_obj input").keyup(function(){
		if($(this).val() == ""){
			$(this).closest('.cinput_obj').removeClass("cinput_filled");
		}	
		else {
			$(this).closest('.cinput_obj').addClass("cinput_filled");
		}
	});
	$(".cinput_obj .cinput_clear").click(function(){
		$(this).closest('.cinput_obj').removeClass("cinput_filled");
		$(this).closest('.cinput_obj').find("input").val("");
	});
	$(".cselect_obj input").click(function(){
		// $(this).parent().parent().find(".cselobj_options").addClass("active");
		$(this).closest('.cselect_obj').find(".cselobj_options").slideToggle();
		$(this).closest('.cselect_obj').addClass("cstt_opened");
	});
	$(".cselobj_option_close").click(function(){
		$(this).closest('.cselect_obj').find("input").val("");
		$(this).closest('.cselect_obj').removeClass("cselect_filled");
		$(this).closest('.cselect_obj').removeClass("cstt_opened");
		$(this).closest('.cselect_obj').find(".cselobj_options").slideToggle();
	});
	$(".cselect_darrow").click(function(){
		if($(this).closest('.cselect_obj').hasClass('cstt_opened')) {
			$(this).closest('.cselect_obj').removeClass("cstt_opened");
			$(this).closest('.cselect_obj').find(".cselobj_options").slideToggle();
		}
		else {
			$(this).closest('.cselect_obj').find(".cselobj_options").slideToggle();
			$(this).closest('.cselect_obj').addClass("cstt_opened");
		}
	})
	$(".cselobj_option").click(function() {
		$(this).closest('.cselect_obj').find("input").val($(this).data("value"));
		$(this).closest('.cselect_obj').addClass("cselect_filled");
		$(this).closest('.cselect_obj').removeClass("cstt_opened");
		$(this).closest('.cselect_obj').find(".cselobj_options").slideToggle();
	});
	$(".cselect_clear").click(function(){
		$(this).closest('.cselect_obj').find("input").val("");
		$(this).closest('.cselect_obj').removeClass("cselect_filled");
	});
	$(".ctreesel_obj input").click(function(){
		// $(this).parent().parent().find(".cselobj_options").addClass("active");
		$(this).parent().parent().find(".ctreesel_options").slideToggle();
	});
	$(".ctree1_option").click(function() {
		$(this).parent().parent().parent().parent().parent().addClass("ctree2_active");
	});
	$(".ctree_prev").click(function() {
		$(this).parent().parent().removeClass("ctree2_active");
	});
	$(".ctreesel_option_close").click(function() {
		$(this).parent().parent().parent().removeClass("ctreesel_filled");
		$(this).parent().parent().parent().find("input").val("");
		$(this).parent().parent().removeClass("ctree2_active");
		$(this).parent().parent().slideToggle();
	});
	$(".ctree2_option").click(function(){
		$(this).parent().parent().parent().parent().parent().parent().find("input").val($(this).data("value"));
		$(this).parent().parent().parent().parent().parent().parent().addClass("ctreesel_filled");
		$(this).parent().parent().parent().parent().parent().removeClass("ctree2_active");
		$(this).parent().parent().parent().parent().parent().slideToggle();
	});
	$(".ctreesel_clear").click(function(){
		$(this).parent().find("input").val("");
		$(this).parent().removeClass("ctreesel_filled");
	});
	/**********************/
	$(".more_search_box_sec .more_search_button1").click(function(e){
    	e.preventDefault();
		if($(this).hasClass("dropdown_opened")) {
			$(this).removeClass("dropdown_opened");
		} 
		else {
			$(this).addClass("dropdown_opened");
		}
		$(".more_search_detail").slideToggle();
		$(".more_search_clear").slideToggle();
    	// if($(this).next().hasClass('open_drop_down') == true && $(this).hasClass('drop_icon_rotate')){
    	// 	$(".custom_drop_menu").slideUp().removeClass('open_drop_down');
    	// 	$(".has_custom_drop_menu .store_more_view").removeClass('drop_icon_rotate');
    	// }else {
    	// 	$(".custom_drop_menu").slideUp().removeClass('open_drop_down');
    	// 	$(".has_custom_drop_menu .store_more_view").removeClass('drop_icon_rotate');
    	// 	$(this).next().slideDown().addClass('open_drop_down');
    	// 	$(this).addClass("drop_icon_rotate");
    	// }
    });
	/* dropdown customize */
	$(".js_dropdown").click(function() {
		console.log("hello");
		if($(this).hasClass("rotate_icon")) {
			$(this).toggleClass("rotated");
		}
		else {
			$(this).find(".rotate_icon").toggleClass("rotated");
		}
		var tagid = $(this).data('tag');
		$('#'+tagid).slideToggle();
	});
	/* all custom link */
	$('.js_button').click(function() {
		console.log("hello");
		if($(this).attr('data-href')) {
			if($(this).attr('data-target')) {
				window.open($(this).attr('data-href'), '_blank');
			}
			else {
				location.href = $(this).attr('data-href');
			}
			
		}
	});
	// custom modal JS
	$(".js_modalbtn").click(function() {
		var tagid = $(this).data('tag');
		$('#'+tagid).fadeIn();
		$('body').toggleClass('no_scroll');
	});
	$('.cmodal_close, .js_modalclose').click(function(){
		$(this).closest('.cmodal').fadeOut();
		$('body').removeClass('no_scroll');
	});
	// custom file uploader 
	$('.cfileup').on("dragenter", function(e) {
		$(this).addClass('cfileup_dragover');

	}).on("dragleave", function(e) {
		$(this).removeClass('cfileup_dragover');
	}).on("dragover", function(e) {
		e.stopPropagation();
		e.preventDefault();
	}).on("drop", function(e) {
		e.preventDefault();
		$(this).removeClass('cfileup_dragover').addClass('cfileup_uploaded');
		$(this).find('.cfileup_btn').html('画像を変更する');
		$(this).find('.cfileup_preview').html(e.originalEvent.dataTransfer.files[0].name);
	});
	$('.cfileup_input').on("change", function() {
		let file_list=$(this).prop('files');
		if(file_list.length>0) {
			let file=file_list[0];
			console.log(file.name);
			console.log(file.size);
			console.log(file.type);
			$(this).closest('.cfileup').removeClass('cfileup_dragover').addClass('cfileup_uploaded');
			$(this).closest('.cfileup').find('.cfileup_btn').html('画像を変更する');
			$(this).closest('.cfileup').find('.cfileup_preview').html(file.name);
		}
	});
	/************************************************** */
	$('.js_checkable').click(function(){
		if($(this).hasClass('stt_checked')) {
			$(this).removeClass('stt_checked');
		}
		else {
			$(this).addClass('stt_checked');
		}
		
	})
	$('.more_search_clear').click(function(){
		$(this).closest('.more_search_box').find('#id_more_search_detail').slideUp();
		$(this).closest('.more_search_box').find('#id_more_search_tags').slideUp();
		$(this).closest('.more_search_box').find('.js_dropdown').removeClass('rotated');
		$(this).closest('.more_search_box').find('.js_checkable').removeClass('stt_checked');
		$(this).closest('.more_search_box1').find('#id_more_search_detail').slideUp();
		$(this).closest('.more_search_box1').find('#id_more_search_tags').slideUp();
		$(this).closest('.more_search_box1').find('.js_dropdown').removeClass('rotated');
		$(this).closest('.more_search_box1').find('.js_checkable').removeClass('stt_checked');
	});
	/************ */
	$('.js_submit_search').click(function(){
		$('input[name="cur_address"]').closest('.cinput_obj').addClass('cstt_error');
		$('input[name="device_name"]').closest('.cselect_obj').addClass('cstt_error');
		$('input[name="station_name"]').closest('.cselect_obj').addClass('cstt_error');
	});
});