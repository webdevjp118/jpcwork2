
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
	$('a:not([href*="#"], [href^="mailto"], [href^="tel"], [target], .no-transition, .fancybox)').on('click', function(e){ //汎用
	/* $('header nav ul li a').on('click', function(e){ */ //グローバルナビのみ
		e.preventDefault(); //ナビゲートをキャンセル
		url = $(this).attr('href'); //遷移先のURLを取得
		$("#loader").remove(); //リンク元ページではloaderを削除
		if (url !== '') {
			$('body').removeClass('evacuation');
			$('body').addClass('transition');
			setTimeout(function(){
				window.location = url;
			}, 800); //0.8秒後に取得したURLに遷移
		}
		return false;
	});
	
	// ブラウザバックで再ロードさせる処理
	$(window).on("pageshow",function() {
		if (event.persisted) {
			window.location.reload();
		}
	});


	/* ------------- ページトップボタンの挙動 ------------- */

	if (_ua != 'sp') {
		$(window).on('load scroll',function(){
			var	winHeight = $(window).height();
			var	footerTop = $("footer").offset();
			if($(window).scrollTop() > winHeight/2) {
				$('.pagetop').addClass('exist');
			} else {
				$('.pagetop').removeClass('exist');
			}
			if($(window).scrollTop() > footerTop.top - winHeight + 50) {
				$('.pagetop').addClass('white');
			} else {
				$('.pagetop').removeClass('white');
			}
		});
	}


	/* ------------- グローバルナビの現在地の表示 ------------- */

	if(location.pathname != "/") {
		var path = location.pathname;
		var pathNum = path.split("/").length;

		// URL内に#があった時の配慮
		if(path.indexOf("#") != -1){
			var hash ='#'+ path.split("#")[1];
		} else {
			var hash ='';
		}

		// 末尾が.phpや.htmlの時の配慮
		if(path.indexOf(".") != -1){
			var working_file = path.split("/")[pathNum-1];
			$('a[href$="/'+working_file+hash+'"]').addClass('active');
		} 

		var tmpPath = new Array();
		tmpPath[0] = "";
		
		for (var i = 1; i<=pathNum-2; i++) {
			tmpPath[i] = tmpPath[i-1] + path.split("/")[i] + "/";
			$('a[href$="/'+tmpPath[i]+hash+'"]').addClass('active'); //上位階層含む
			/* $('a[href$="/'+tmpPath[pathNum-2]+hash+'"]').addClass('active'); */ //上位階層はずす
		}

	}


	/* ------------- マウスオーバーで画像置換 ------------- */

	if (_ua != 'sp') {
		var targetImgs = $('.example img');
		targetImgs.each(function(){
			if(this.src.match('_off')){
				this.rollOverImg = new Image();
				this.rollOverImg.src = this.getAttribute("src").replace("_off", "_on");
				$(this.rollOverImg).css({position: 'absolute', top: 0 + 'px', left: 0 + 'px', opacity: 0});
				$(this).before(this.rollOverImg);
				$(this.rollOverImg).mousedown(function(){
					$(this).stop().animate({opacity: 0}, {duration: 0, queue: false});
				});
				$(this.rollOverImg).hover(function(){
					$(this).stop().animate({opacity: 1}, {duration: 80, queue: false});
				},function(){
					$(this).stop().animate({opacity: 0}, {duration: 80, queue: false});
				});
			}
		});
	}


	/* ------------- スライドトグル ------------- */

	$(".toggle").next().css({'display':'none'});
	$(".toggle").on("click", function() {
		$(this).next().stop().slideToggle();
		$(this).toggleClass("open"); //.openで矢印のデザイン変更
	});


	/* ------------- target="_blank"のa要素にrel属性を追加 ------------- */

	$("a[target='_blank']").each(function(){
		$(this).attr({
			rel:"noopener noreferrer"
		});
	});



	/*---------------------------------------------------
		ナビ
	---------------------------------------------------*/

	/* ------------- メニュー挙動 ------------- */
	
	$('nav').addClass('evacuation'); //ページ遷移時に退避

	$("#nav_btn, nav a").on("click", function() {
		$("#nav_btnwrapper").toggleClass("close");
		$("nav").toggleClass("show");

		//退避処理　0.6秒後にスタイル追加 ex)z-index for IE10
		if($('nav').hasClass('evacuation')) {
			$('nav').removeClass('evacuation')
		} else {
			setTimeout(function(){
				$('nav').addClass('evacuation');
			}, 600);
		}

		//ナビ出現時に背景のスクロールを止める処理（タッチデバイス配慮）
		$("body").toggleClass("noscroll");
		if (navigator.userAgent.indexOf('iPhone') > 0 || navigator.userAgent.indexOf('iPad') > 0) {
			if($("body").hasClass("noscroll")){
				document.addEventListener('touchmove', handleTouchMove, { passive: false });
			} else {
				document.removeEventListener('touchmove', handleTouchMove, { passive: false });
			}
		}
    });
    
    function handleTouchMove(e) {
		e.preventDefault();
	}

	// マウスが外れたら（header以外にmouseenterしたら）閉じる場合
	$('main, footer').mouseenter(function(){
		$("#nav_btnwrapper").removeClass("close");
		$('nav').removeClass("show");
	});

	// スマホ時三階層目へのリンクをトグルで出す
	var winWidth = $(window).width();
	if (winWidth < 812) {
		$(".sp_toggle").next().css({'display':'none'});
		$(".sp_toggle").on("click", function() {
			$(".sp_toggle").removeClass("open").next().stop().slideUp();
			$(this).next().stop().slideToggle();
			$(this).toggleClass("open"); //.openで矢印のデザイン変更
		});
	} else {
		$(".sp_toggle").next().css({'display':'block'});
		$(this).removeClass("open");
	}

/*---------------------------------------------------
	SNIPPETS
---------------------------------------------------*/
	
/*

	//ウィンドウイベント
	$(window).on('load resize scroll orientationchange',function(){
	});

	//モバイルはこれ以下のスクリプトを無効化
	if(navigator.userAgent.match(/(iPhone|iPad|iPod|Android)/)) return;


	//スマホ縦横の挙動
	function spOrientation(){
		var orientation = window.orientation;
		if(navigator.userAgent.toLowerCase().match(/(iphone|android)/)) {
			if(orientation == 0){
				//縦持ちの処理
		    }else{
				//横持ちの処理
		    }
		}
	}

	$(window).on('load orientationchange',function(){
		spOrientation();
	});


	// プリロード
	jQuery.preloadImages = function(){
		for(var i = 0; i < arguments.length; i++){
			jQuery("<img>").attr("src", arguments[i]);
		}
	};
	$.preloadImages("image path");


	// ナビゲーションのウィンドウ上部固定
	$(window).on('load resize',function(){
		var	offset = $('nav').offset();
		var	navHeight = $('nav').height();
		$(window).on('scroll',function(){
			if($(window).scrollTop() > offset.top) {
				$('nav').addClass('windowfix');
				$('nav').next().css('margin-top', navHeight +'px');
			} else {
				$('nav').removeClass('windowfix');
				$('nav').next().css('margin-top', '0');
			}
		});
	});


	// worksImgリサイズ＋フェード表示
	$(".selector img").each(function(){
		$(this).css({'opacity': 0});
	});

	function worksImgResize(){
		$(".selector img").each(function(){
			var imgHeight = $(this).height();
			var imgWidth = $(this).width();
			var fixScale = imgWidth / imgHeight;
			var maxHeight = $(window).height() - 120; //上下のアキ
			$(this).css({
				'width': maxHeight*fixScale + 'px',
				'height': 'auto',
				'max-width': 100 + '%'
			}).fadeTo("fast", 1);
		});
	}

	$(window).on('load resize',function(){
		worksImgResize();
	});


	//スクロール視差
	$(window).on('load resize orientationchange',function(){
		pallaraxBG();
	});
	
	function pallaraxBG() {
		var winHeight = $(window).height();
		var $target = $('.target');

		$(window).on('scroll', $.throttle ( 1000/60, //needs jquery.ba-throttle-debounce.min.js
			function(){
				var scrollTop = $(window).scrollTop();
				var scrollBottom = scrollTop + winHeight;
				$target.each(function() {
					var targetPosition = $(this).offset().top;
					var targetHeight = $(this).outerHeight();
					if (scrollBottom > targetPosition && scrollTop < targetPosition + targetHeight) {
						$(this).css({'background-position-y': Math.floor((scrollTop - targetPosition) * 0.3) + 'px'}); //background-attachment:auto
					}
				});
			})
		)
	}


*/



});

