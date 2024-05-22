function findGetParam(paramName) {
    var result = null,
        tmp = [];
    var items = location.search.substr(1).split("&");
    for (var index = 0; index < items.length; index++) {
        tmp = items[index].split("=");
        if (tmp[0] === paramName) result = decodeURIComponent(tmp[1]);
    }
    return result;
}
function submit_filter_form() {
    let gender = $("#temp_gender").val();
    let brand = $("#temp_catcd").val();
    if(brand && brand != "undefined") {
       if(gender && gender != "undefined") {
           brand = brand + gender;
       }
    }
    $("#filter_brand").val(brand);
    document.forms["filter_form"].submit();
}
function submit_bigcd_form(cd) {
    $("#filter_brand").val(cd);
    document.forms["filter_form"].submit();
}
function top_select_bigcd(cd) {
    if(cd == 'ACCESSORY') {
        $('.code_top_brand_list_sec').removeClass('brand_selected').addClass('accessory_selected');
        $('#code_pg_top_brand_tab').removeClass('c-tab-item-selected');
        $('#code_pg_top_accessory_tab').removeClass('c-tab-item-selected').addClass('c-tab-item-selected');
    }
    else {
        $('.code_top_brand_list_sec').removeClass('accessory_selected').addClass('brand_selected');
        $('#code_pg_top_accessory_tab').removeClass('c-tab-item-selected');
        $('#code_pg_top_brand_tab').removeClass('c-tab-item-selected').addClass('c-tab-item-selected');
    }
}
function modal_select_bigcd(cd) {
    if(cd == 'ACCESSORY') {
        $('#code_modal_brand_layer').removeClass('layer_closed').addClass('layer_closed');
        $('#code_modal_accessory_layer').removeClass('layer_closed');
        $('#code_modal_brand_tab').removeClass('c-tab-item-selected');
        $('#code_modal_accessory_tab').removeClass('c-tab-item-selected').addClass('c-tab-item-selected');
    }
    else {
        $('#code_modal_accessory_layer').removeClass('layer_closed').addClass('layer_closed');
        $('#code_modal_brand_layer').removeClass('layer_closed');
        $('#code_modal_accessory_tab').removeClass('c-tab-item-selected');
        $('#code_modal_brand_tab').removeClass('c-tab-item-selected').addClass('c-tab-item-selected');
    }
}
function get_catcd_info(id) {
    for(let i=0;i<brand_info_list.length;i++) {
        if(id==brand_info_list[i].id) return brand_info_list[i];
    }
    for(let i=0;i<acce_info_list.length;i++) {
        if(id==acce_info_list[i].id) return acce_info_list[i];
    }
    return null;
}
function get_brand_id_from_link(link) {
    let temp_arr = link.split("/");
console.log(temp_arr);
    for(let j=0;j<temp_arr.length;j++) {
        if(temp_arr[j] == 'category') {
console.log(temp_arr[j]);
            if(temp_arr.length > j+1) {
                let id_term = temp_arr[j+1];
console.log(id_term);
                let term_arr = id_term.split(".");
console.log(term_arr);
                return term_arr[0];
            }
        }
    }
    return null;
}
function get_bigcd(cd) {
    let default_cd = 'BRAND';
    if(!cd) return default_cd;
    for(let i=0;i<brand_info_list.length;i++) {
        if(brand_info_list[i].id == cd) return 'BRAND'; 
    }
    for(let i=0;i<acce_info_list.length;i++) {
        if(acce_info_list[i].id == cd) return 'ACCESSORY';
    }
    if(cd=='BRAND') return default_cd;
    if(cd=='ACCESSORY') return cd;
    return default_cd;
}
var brand_info_list = [];
var acce_info_list = [];
var gTop_brand_list = [];
var rankno_img_list = [];

jQuery(function ($) {
	const isTouchDevice = (window.ontouchstart === null);
	const eventClick = isTouchDevice ? 'touchstart' : 'click';
	const $body = $('body');

	// mobile navigation trigger
	$('#js-mobileNav-open').on(eventClick, function () {
		$body.addClass('is-open-mobileNav');
	});
	$('#js-mobileNav-close').on(eventClick, function () {
		$body.removeClass('is-open-mobileNav');
	});

	// product carousel
	$('.js-product-carousel').slick({
		dots: false,
		prevArrow: '<button type="button" class="c-slider-arrow -prev -gray"></button>',
		nextArrow: '<button type="button" class="c-slider-arrow -next -gray"></button>',
		slidesToShow: 4,
		slidesToScroll: 4,
		responsive: [
			{
				breakpoint: 1023,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 3
				}
			},
			{
				breakpoint: 767,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2
				}
			}
		]
	});

	// product carousel
	$('.js-top-lineup-slider').slick({
		dots: true,
		prevArrow: '<button type="button" class="c-slider-arrow -prev -gray"></button>',
		nextArrow: '<button type="button" class="c-slider-arrow -next -gray"></button>',
		slidesToShow: 4,
		slidesToScroll: 4,
		responsive: [
			{
				breakpoint: 1023,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 3
				}
			},
			{
				breakpoint: 767,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2
				}
			}
		]
	});

	// icons matchHeight
	if ($('.c-product-item-icons')[0]) {
		$('.c-product-item-icons').matchHeight();
	}

	// lightbox
	lightbox.option({
		'resizeDuration': 300,
		'fadeDuration': 300,
		'wrapAround': true
	});

	// top visual slider
	if ($('#js-top-visual-slider')[0]) {
		$('#js-top-visual-slider').slick({
			dots: false,
			autoplay: true,
			prevArrow: '<button type="button" class="top-visual-slider-arrow c-slider-arrow -prev -white"></button>',
			nextArrow: '<button type="button" class="top-visual-slider-arrow c-slider-arrow -next -white"></button>'
		});
	}
	if ($('#js-top-news-slider')[0]) {
		$('#js-top-news-slider').slick({
			dots: false,
			prevArrow: '<button type="button" class="top-news-slider-arrow c-slider-arrow -prev -white"></button>',
			nextArrow: '<button type="button" class="top-news-slider-arrow c-slider-arrow -next -white"></button>',
			slidesToShow: 4,
			slidesToScroll: 4,
			responsive: [
				{
					breakpoint: 1023,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 3
					}
				},
				{
					breakpoint: 767,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 2
					}
				},
				{
					breakpoint: 640,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					}
				}
			]
		});
	}

	// top news
	if ($('.top-news-item-text')[0]) {
		$('.top-news-item-text').matchHeight();
	}

	// top brand
	if ($('.top-brand-item-detail')[0]) {
		if (isTouchDevice) {
			$('.top-brand-item-detail').remove();
		}
	}

	// item_detail slider
	if ($('#js-itemDetail-slider')[0] && $('#js-itemDetail-slider-thumbnails')[0]) {
		const $slider = $('#js-itemDetail-slider');
		const $thumbnail = $('#js-itemDetail-slider-thumbnails');
		const $thumbnailItem = $thumbnail.find('a');
		const currentSliderClass = 'is-current';
		$thumbnailItem.eq(0).addClass(currentSliderClass);
		$slider.slick({
			dots: false,
			infinite: false,
			prevArrow: '<button type="button" class="c-slider-arrow -prev -gray"></button>',
			nextArrow: '<button type="button" class="c-slider-arrow -next -gray"></button>'
		});
		$thumbnailItem.on(eventClick, function (e) {
			$slider.slick('slickGoTo', $thumbnailItem.index(this), false);
			e.preventDefault();
		});
		$slider.on('beforeChange', function (event, slick, currentSlide, nextSlide) {
			$thumbnailItem.removeClass(currentSliderClass).eq(nextSlide).addClass(currentSliderClass);
		});
	}

	// product stock
	if ($('#js-itemDetail-stock')[0]) {
		const $stock = $('#js-itemDetail-stock');
		const stockNum = parseInt($('#js-itemDetail-stock-num').html().replace(/[^0-9^\.]/g, ""), 10);
		const stockAlert = parseInt($('#js-itemDetail-stock-alert').html(), 10);
		if (stockNum >= stockAlert) {
			$stock.html('○');
		} else if (stockNum > 0) {
			$stock.html('△');
		} else {
			$stock.html('×');
		}
	}

	// product contact link
	if ($('#js-itemDetail-code')[0] && $('#js-itemDetail-name')[0]) {
		const code = $('#js-itemDetail-code').html();
		const name = $('#js-itemDetail-name').html();

		if ($('#js-reservation-link')[0]) {
			let url = $('#js-reservation-link').attr('href') + '&f1=' + code + '&f2=' + name + '&f3=02';
			$('#js-reservation-link').attr('href', url);
		}

		if ($('#js-contact-link')[0]) {
			let url = $('#js-contact-link').attr('href') + '&f1=' + code + '&f2=' + name + '&f3=01';
			$('#js-contact-link').attr('href', url);
		}
	}

	// contact
	if (location.pathname.match('apply.html') && location.search.match('id=APPLY2')) {
		// get url params
		const pair = location.search.substring(1).split('&');
		let arg = {};
		for (let i = 0; pair[i]; i++) {
			const kv = pair[i].split('=');
			arg[kv[0]] = kv[1];
		}

		// set cookie from url params
		if ('f1' in arg) {
			const f1 = decodeURIComponent(arg['f1']);
			$('#FREE_ITEM1').val(f1);
		}
		if ('f2' in arg) {
			const f2 = decodeURIComponent(arg['f2']);
			$('#FREE_ITEM2').val(f2);
		}
		if ('f3' in arg) {
			const f3 = decodeURIComponent(arg['f3']);
			$('#FREE_ITEM3').val(f3);
		}
	}
        // product contact
	if (location.pathname.match('apply.html') && location.search.match('id=APPLY1')) {
		// get url params
		const pair = location.search.substring(1).split('&');
		let arg = {};
		for (let i = 0; pair[i]; i++) {
			const kv = pair[i].split('=');
			arg[kv[0]] = kv[1];
		}

		// set cookie from url params
		if ('f2' in arg) {
			const f2 = decodeURIComponent(arg['f2']);
			$('#FREE_ITEM9').val(f2);
		}
            let name_kanji = $('#FREE_ITEM1').val() + ' ' + $('#FREE_ITEM10').val();
            $('#FREE_ITEM1').val(name_kanji);
            let name_kana = $('#FREE_ITEM2').val() + ' ' + $('#FREE_ITEM11').val();
            $('#FREE_ITEM2').val(name_kana);
            //$('#FREE_ITEM10').parent().parent().parent().remove();
            //$('#FREE_ITEM11').parent().parent().parent().remove();
	}

    // contact confirm
    let el_ctinfotr_list = document.querySelectorAll("th.title");
    if(!!el_ctinfotr_list) {
        for(let i=0;i<el_ctinfotr_list.length;i++) {
            if(
                (el_ctinfotr_list[i].innerText.indexOf('お名前(漢字)1') !== -1) ||
                (el_ctinfotr_list[i].innerText.indexOf('お名前(カナ)1') !== -1 )
             ) {
                if(!!el_ctinfotr_list[i].parentElement){
                    if(!!el_ctinfotr_list[i].parentElement.parentElement) el_ctinfotr_list[i].parentElement.parentElement.removeChild(el_ctinfotr_list[i].parentElement);
                }
            } 
        }
    }
    console.log('table>>>tr');
    console.log(el_ctinfotr_list);


    //Kmdepart
    let el_code_rankno_h3_list = document.getElementsByClassName("code_rankno_h3");
    for( let i=0;i<el_code_rankno_h3_list.length;i++) {
        el_code_rankno_h3_list[i].innerHTML = (i+1)+"位";
    }
    let el_code_var_rankno_img_list = document.getElementsByClassName("code_var_rankno_img");
    for( let i=0;i<el_code_var_rankno_img_list.length;i++) {
        rankno_img_list.push(el_code_var_rankno_img_list[i].getAttribute('src'));
    }
    let code_rankno_img_list = document.getElementsByClassName("code_rankno_img");
    for( let i=0;i<code_rankno_img_list.length;i++) {
        let rankno_img_link = "";
        if(i<4) rankno_img_link = rankno_img_list[i];
        else rankno_img_link = rankno_img_list[3];
        code_rankno_img_list[i].setAttribute('src', rankno_img_link);
    }
    let code_brand_info_list = document.getElementsByClassName("code_brand_info_list");

    brand_info_list = [];
    for( let i=0;i<code_brand_info_list.length;i++) {
        let brand_info = {
            link: null,
            img: null,
            name: null,
            id: null,
            html: null,
        };
        let code_brand_link_a = code_brand_info_list[i].getElementsByTagName('a')[0];
        let temp_link = code_brand_link_a.href;
        brand_info.link = temp_link;
        let temp_brand_name= code_brand_link_a.textContent;
        let temp_arr = temp_link.split("/");
        for(let j=0;j<temp_arr.length;j++) {
            if(temp_arr[j] == 'category') {
                if(temp_arr.length > j+2) {
                    brand_info.id = temp_arr[j+1];
                    brand_info.name = temp_brand_name;
                }
            }
        }
        let code_brand_html = code_brand_info_list[i].getElementsByTagName('div');
        if(code_brand_html.length > 0) code_brand_html = code_brand_html[0].innerHTML;
        else code_brand_html = null;
        brand_info.html = code_brand_html;
        let code_brand_img = code_brand_info_list[i].querySelector('.code_brand_info_img');
console.log(code_brand_img);
        if(code_brand_img) code_brand_img = code_brand_img.getAttribute('src');
        else code_brand_img = null;
        brand_info.img= code_brand_img;
        brand_info_list.push(brand_info);
    }

    let code_acce_info_list = document.getElementsByClassName("code_acce_info_list");
    acce_info_list = [];
    for( let i=0;i<code_acce_info_list.length;i++) {
        let acce_info = {
            link: null,
            img: null,
            name: null,
            id: null,
            html: null,
        };
        let code_acce_link_a = code_acce_info_list[i].getElementsByTagName('a')[0];
        let temp_link = code_acce_link_a.href;
        acce_info.link = temp_link;
        let temp_acce_name= code_acce_link_a.textContent;
        let temp_arr = temp_link.split("/");
        for(let j=0;j<temp_arr.length;j++) {
            if(temp_arr[j] == 'category') {
                if(temp_arr.length > j+2) {
                    acce_info.id = temp_arr[j+1];
                    acce_info.name = temp_acce_name;
                }
            }
        }
        let code_acce_html = code_acce_info_list[i].getElementsByTagName('div');
        if(code_acce_html.length > 0) code_acce_html = code_acce_html[0].innerHTML;
        else code_acce_html = null;
        acce_info.html = code_acce_html;
        let code_acce_img = code_acce_info_list[i].querySelector('.code_acce_info_img');
console.log(code_acce_img);
        if(code_acce_img) code_acce_img = code_acce_img.getAttribute('src');
        else code_acce_img = null;
        acce_info.img= code_acce_img;
        acce_info_list.push(acce_info);
    }
console.log(brand_info_list);
console.log(acce_info_list);
    
    let code_filter_brand_set = document.getElementById("code_filter_brand_set");
    for(let i=0;i<brand_info_list.length;i++) {
        let temp_html = '<div class="input-group-col mr-0"><label><input type="checkbox" class="code_filter_brand_chk" value="' + brand_info_list[i].id + '" data-tag="' + brand_info_list[i].id + '" /><span></span><div class="text"><p class="eng">' + brand_info_list[i].name + '</p></div></label></div>';
        code_filter_brand_set.innerHTML += temp_html;
    }

    let code_filter_acce_set = document.getElementById("code_filter_acce_set");
    for(let i=0;i<acce_info_list.length;i++) {
        let temp_html = '<div class="input-group-col mr-0"><label><input type="checkbox" class="code_filter_acce_chk" value="' + acce_info_list[i].id + '" data-tag="' + acce_info_list[i].id + '" /><span></span><div class="text"><p class="eng">' + acce_info_list[i].name + '</p></div></label></div>';
        code_filter_acce_set.innerHTML += temp_html;
    }

    let minPrice = parseInt(findGetParam('minPrice'));
    let maxPrice = parseInt(findGetParam('maxPrice'));
    if(maxPrice > 0) { 
        document.getElementById("code_input_price_sel").value=minPrice+"-"+maxPrice;
    }  
    let category_cd = findGetParam('category_cd');
    let keyword = findGetParam('keyword');
    $(".code_input_keyword").val(keyword);
    $("#filter_keyword").val(keyword);

    let check_g = "";
    let gender = "";
    if(category_cd && category_cd != "undefined") {
        check_g = category_cd.substring(category_cd.length - 2, category_cd.length);
    }
    
    if(check_g == '_M' || check_g == '_L') {
        category_cd =  category_cd.substring(0, category_cd.length-2);
        gender = check_g;
    }
    
    $("#temp_catcd").val(category_cd);
    $("#temp_gender").val(gender);

    var code_filter_brand_chk_list = document.getElementsByClassName("code_filter_brand_chk");
    for( let i=0;i<code_filter_brand_chk_list.length;i++) {
        let code_filter_brand_chk = code_filter_brand_chk_list[i];
        if( code_filter_brand_chk.value == category_cd ) code_filter_brand_chk.checked = true;
    }
    var code_filter_acce_chk_list = document.getElementsByClassName("code_filter_acce_chk");
    for( let i=0;i<code_filter_acce_chk_list.length;i++) {
        let code_filter_acce_chk = code_filter_acce_chk_list[i];
        if( code_filter_acce_chk.value == category_cd ) code_filter_acce_chk.checked = true;
    }
    var code_filter_gender_chk_list = document.getElementsByClassName("code_filter_gender_chk");
    for( let i=0;i<code_filter_gender_chk_list.length;i++) {
        let code_filter_gender_chk = code_filter_gender_chk_list[i];
        if( code_filter_gender_chk.value == gender ) code_filter_gender_chk.checked = true;
    }
        

    $('#code_input_price_sel').on('change', function() {
        let selvalue = this.value;
        if(selvalue && selvalue != "undefined") {
            twoVals = selvalue.split("-");
            $("#filter_minPrice").val(twoVals[0]);
            $("#filter_maxPrice").val(twoVals[1]); 
        }
        else {
            $("#filter_minPrice").val('');
            $("#filter_maxPrice").val('');
        }
    });
    $(".code_input_keyword").change(function() {
        $("#filter_keyword").val($(this).val());
    });

    $( ".code_filter_brand_chk" ).click(function() {
        let brand_tag= $(this).data('tag');
        $( ".code_filter_brand_chk" ).prop( "checked", false );
        $( ".code_filter_acce_chk" ).prop( "checked", false );
        $(this).prop( "checked", true );
        $("#temp_catcd").val(brand_tag);
    });
    $( ".code_filter_acce_chk" ).click(function() {
        let acce_tag= $(this).data('tag');
        $( ".code_filter_brand_chk" ).prop( "checked", false );
        $( ".code_filter_acce_chk" ).prop( "checked", false );
        $( ".code_filter_gender_chk" ).prop( "checked", false );
        $(this).prop( "checked", true );
        $("#temp_catcd").val(acce_tag);
        $("#temp_gender").val('');
    });
    $( ".code_filter_gender_chk" ).click(function() {
        let gender= $(this).val();
        let checked=$(this).prop("checked");
        $( ".code_filter_gender_chk" ).prop( "checked", false );
        if(checked){
            $(this).prop("checked", true);
            $("#temp_gender").val(gender);
        }
        else {
            $("#temp_gender").val('');
        }
    });

    //Top small brands
    let el_code_big_brand_link = document.getElementsByClassName("code_big_brand_link");
console.log(el_code_big_brand_link);
    for( let i=0;i<el_code_big_brand_link.length;i++) {
        let big_brand_link = el_code_big_brand_link[i].getAttribute('href');
console.log(big_brand_link);
        let brand_id = get_brand_id_from_link(big_brand_link);
console.log(brand_id );
        if(brand_id) {
            gTop_brand_list.push(brand_id);
        }
    }
console.log(gTop_brand_list);
    let code_small_brand_set = document.getElementById("code_small_brand_set");
    if(!!code_small_brand_set) {
        for(let i=0;i<brand_info_list.length;i++) {
            if(!gTop_brand_list.includes(brand_info_list[i].id)) {
                let temp_html = '<div class="custom_col custom-grid-col brand-icon-col"><a href="' + brand_info_list[i].link + '" class="custom-grid-bx bg-trans"><div class="img"><img src="' + brand_info_list[i].img + '"/></div></a></div>';
                code_small_brand_set.innerHTML += temp_html;
            }
        }
    }
    let code_small_accessory_set = document.getElementById("code_small_accessory_set");
    if(!!code_small_accessory_set) {
        for(let i=0;i<acce_info_list.length;i++) {
            let temp_html = '<div class="custom_col custom-grid-col brand-icon-col"><a href="' + acce_info_list[i].link + '" class="custom-grid-bx bg-trans"><div class="img"><img src="' + acce_info_list[i].img + '"/></div></a></div>';
            code_small_accessory_set.innerHTML += temp_html;
        }
    }

    let brandsec_show = false;
    //Item Details page
console.log("hello?");
    if($('#code_pg_item_related_brand').length>0) {
        let el_pg_item_related_brand= document.getElementById("code_pg_item_related_brand");
console.log("nice!!!!");
console.log(el_pg_item_related_brand);
        let pg_item_brand_id = el_pg_item_related_brand.textContent;
        let item_brand_info = get_catcd_info(pg_item_brand_id);
        if(item_brand_info && !!item_brand_info.html && (item_brand_info.html != "")) {
            brandsec_show = true;
            el_pg_item_related_brand.innerHTML = item_brand_info.name + 'の商品一覧へ';
            el_pg_item_related_brand.href = item_brand_info.link;
            document.getElementById("code_pg_item_brand_sec_h3").innerHTML = item_brand_info.name;
            document.getElementById("code_pg_item_brand_html").innerHTML = item_brand_info.html;
        }
    }
    else if($('#code_pg_item_brand_code').length>0) {
        let el_pg_item_brand_code= document.getElementById("code_pg_item_brand_code");
        let pg_item_brand_id = el_pg_item_brand_code.textContent;
        let item_brand_info = get_catcd_info(pg_item_brand_id);
        if(item_brand_info && !!item_brand_info.html && (item_brand_info.html != "")) {
            brandsec_show = true;
            document.getElementById("code_pg_item_brand_sec_h3").innerHTML = item_brand_info.name;
            document.getElementById("code_pg_item_brand_html").innerHTML = item_brand_info.html;
        }
    }
    //Item List page
    let pglist_brand = "";
    let url_cat_cd = findGetParam('category_cd');
    if(url_cat_cd && url_cat_cd != "undefined") pglist_brand = url_cat_cd;
    else {
        let page_cat_cd = get_brand_id_from_link(location.href);
        if(page_cat_cd && page_cat_cd != "undefined") pglist_brand = page_cat_cd;
    }
    if(pglist_brand.length>0) {
        let item_brand_info = get_catcd_info(pglist_brand);
        if(item_brand_info && !!item_brand_info.html && (item_brand_info.html != "")) {
            brandsec_show = true;
            let temp_el = document.getElementById("code_pg_item_brand_sec_h3");
            if(!!temp_el) temp_el.innerHTML = item_brand_info.name;
            temp_el = document.getElementById("code_pg_item_brand_html");
            if(!!temp_el) temp_el.innerHTML = item_brand_info.html;
        }
    }
    if(pglist_brand.length>0) {
        let big_cd = get_bigcd(pglist_brand);
        if(big_cd == 'BRAND') {
            $('#code_pg_list_brand_tab').removeClass('c-tab-item-selected').addClass('c-tab-item-selected');
            $('#code_pg_list_accessory_tab').removeClass('c-tab-item-selected');    
        }
        else {
            $('#code_pg_list_brand_tab').removeClass('c-tab-item-selected');
            $('#code_pg_list_accessory_tab').removeClass('c-tab-item-selected').addClass('c-tab-item-selected');
        }
    }
    else {
        $('#code_pg_list_brand_tab').removeClass('c-tab-item-selected').addClass('c-tab-item-selected');
        $('#code_pg_list_accessory_tab').removeClass('c-tab-item-selected');
    }
    if(pglist_brand.length>0) {
        if(pglist_brand == 'BRAND' || pglist_brand == 'WATCH' || pglist_brand == 'ACCESSORY') {
        }
        else {
            $(".code_pg_list_hide_tab").remove();
        }
    }
    if(!brandsec_show) {
        $("#code_pg_item_brand_sec").remove();
        $("#code_pg_item_related_sec").remove();
    }

    // Header Toggle JS
    $('#toggleNavButton').click(function(){
        $('#header').toggleClass('active');
        $('body').toggleClass('no-scroll');
    });
    $('.header-menu ul li').click(function(){
        if($('#header').hasClass('active')) $('#header').removeClass('active');
        if($('body').hasClass('no-scroll')) $('body').removeClass('no-scroll');
    });
    // Filter PopUp JS
    $('.filter-btn').click(function(){
        $('#filter-modal').fadeIn();
        $('body').toggleClass('no-scroll2');
    });
    $('.modal-close-btn').click(function(){
        $('#filter-modal').fadeOut();
        $('body').toggleClass('no-scroll2');
    });
    // Banner Slider JS
    $('.banner-slide').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        centerMode: true,
        focusOnSelect: true,
        centerPadding: '14.84%',
        autoplay: true,
        autoplaySpeed: 3000,
        arrows: false,
        dots: true,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    centerPadding: '0%',
                }
            }
        ]
    });
    if(screen.width < 600) {
        $('#id_news_slide').addClass("slide");
    }
    $('.js_add_slider').each(function(){
        if(screen.width < 600) {
            if($(this).children().length>1) $(this).addClass("slide");   
        }
        else {
            if($(this).children().length>4) $(this).addClass("slide");
        }
    });
    // Custom-Grid Slider JS
    $('.custom-grid-row.slide').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        //autoplay: true,
        //autoplaySpeed: 3000,
        prevArrow: '<button type="button" class="slick-prev slick-arrow"><i class="fa fa-angle-left" aria-hidden="true"></i></button>',
        nextArrow: '<button type="button" class="slick-next slick-arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></button>',
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 481,
                settings: {
                    slidesToShow: 2,
                }
            }
            ]
    });

    // Scroll-Top Button JS
    $("#scroll-top-btn").click(function () {
        $("html, body").animate({scrollTop: 0}, 10);
    });



    var code_pickup_list = document.getElementsByClassName("code_pickup");
    for( let i=0;i<code_pickup_list.length;i++) {
        let code_pickup = code_pickup_list[i];
        let atag = code_pickup.getElementsByTagName('a');
        if(atag.length>0) {
            let code_pickup_link = atag[0].getAttribute('href');
            let index = i+1;
            let target_id = "code_id_pickup_link_"+index;
            document.getElementById(target_id).setAttribute('href', code_pickup_link);
        }
        let imgtag = code_pickup.getElementsByTagName('img');
        if(imgtag.length>0) {
            let code_pickup_img = imgtag[0].getAttribute('src');
            let index = i+1;
            let target_id = "code_id_pickup_img_"+index;
            let target_el = document.getElementById(target_id);
            if(!!target_el) target_el.setAttribute('src', code_pickup_img);
        }
    }
    //会員登録
    $("input[name='MEMBER.FREE_ITEM3']").filter('[value=0]').prop('checked', true);
    $("input[name='SEX']").filter('[value=M]').prop('checked', true);

    $(".code_remove").remove();


    //Kmdepart End 
});
