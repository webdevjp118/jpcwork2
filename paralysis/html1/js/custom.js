(function(d) {
	var config = {
		kitId: 'rex5kal',
		scriptTimeout: 3000,
		async: true
	},
	h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
})(document);

(function(d) {
	var config = {
		kitId: 'vix5xiy',
		scriptTimeout: 3000,
		async: true
	},
	h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
})(document);

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
	});
});

$(document).ready(function(){
	$(window).scroll(function(){
        var windowheight = $(window).height();
        var scrollTop = $(window).scrollTop();
        var headerheight = $('header').innerHeight();

        if(scrollTop > windowheight / 2 ){
            $(".site_header").addClass("header_animate");
        } else{
            $(".site_header").removeClass("header_animate");
        }
        if(scrollTop > headerheight){
            $(".site_header").addClass("fixed_header");
        } else{
            $(".site_header").removeClass("fixed_header");
        }
    });
    // $('.therapist_btn').click(function(){
    //     if($(this).hasClass('active_tab')){
    //     	$('.therapist_popup_section').toggleClass('open_side_box');
    //     }else {
    //     	$('.therapist_popup_section').addClass('open_side_box');        	
    //     }
    //     $('.therapist_btn').removeClass('active_tab');
    //     $(this).addClass('active_tab');
    //     var tagid = $(this).data('tag');
    //     $('.therapist_content').removeClass('tab_content_active').hide();
    //     $('#'+tagid).addClass('tab_content_active').show();
    // });
    $('.banner_full_width_slider').slick({
        dots: false,
        arrows: false,
        speed: 1000,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 3500,
        fade: true,
        cssEase: 'linear',
    });
});