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
});
