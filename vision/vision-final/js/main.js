$(document).ready(function(){

});
$('.owl-carousel.pictogram_owl').owlCarousel({
    loop: true,
	items: 3, 
	slideBy: 3,
    margin:10,
    nav:true,
	navText: ["<img src='img/prev_btn.png'>","<img src='img/next_btn.png'>"],
    responsive:{
        0:{
            items:3
        },
        600:{
            items:3
        },
        1000:{
            items:3
        }
    }
});
$('.owl-carousel.p51_owl').owlCarousel({
    loop: true,
    margin:10,
    nav:true,
	navText: ["<img src='img/prev_btn.png'>","<img src='img/next_btn.png'>"],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
});
$('.owl-carousel.sp_owl').owlCarousel({
    loop: true,
    margin:10,
    nav:true,
	navText: ["<img src='img/prev_btn.png'>","<img src='img/next_btn.png'>"],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
});
$('.owl-carousel.sphis_owl').owlCarousel({
    loop: true,
    margin:10,
    nav:true,
	navText: ["<img src='img/prev_btn.png'>","<img src='img/next_btn.png'>"],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
});
function g_JQaddClass(selname, clname, delay) {
	if(delay > 0) {
		setTimeout(function () {
			if(!$(selname).hasClass(clname)) $(selname).addClass(clname);
		}, delay);	
	}
	else {
		if(!$(selname).hasClass(clname)) $(selname).addClass(clname);
	}
}
function g_JQremoveClass(selname, clname, delay) {
	if(delay > 0) {
		setTimeout(function () {
			$(selname).removeClass(clname);
		}, delay);	
	}
	else {
		$(selname).removeClass(clname);
	}
}
function g_clearAllAnim(selname) {
	var classNames = $(selname).attr("class").toString().split(' ');
	for(let i=0;i<classNames.length;i++) {
		if(classNames[i].substring(0,4) == 'ani-') {
			$(selname).removeClass(classNames[i]);
		}
	}
}
function g_StartAnimClass(selname, clanim, clpre, duration, delay) {
	g_clearAllAnim(selname);
	if (!delay) delay = 10;
	g_animOrder = g_animOrder + 1;
	var curAnimID = g_animOrder;
	g_animList.push(curAnimID);
	g_JQaddClass(selname, clpre);
	let alltime = duration + delay;
	setTimeout(function () {
	  g_JQaddClass(selname, clanim);
	}, delay);
	setTimeout(function () {
	  $(selname).removeClass(clpre);
	  var delIndex = g_animList.indexOf(curAnimID);
	  if (delIndex > -1) {
		g_animList.splice(delIndex, 1);
	  }
	}, alltime);
}
function g_setPageAnimatingFlag(duration) {
	g_pageAnimating = true;
	setTimeout(function () {
		g_pageAnimating = false;
	}, duration);
}
function g_startAnimTime(duration) {
	g_animOrder = g_animOrder + 1;
	var curAnimID = g_animOrder;
	g_animList.push(curAnimID);
	setTimeout(function () {
	  var delIndex = g_animList.indexOf(curAnimID);
  
	  if (delIndex > -1) {
		g_animList.splice(delIndex, 1);
	  }
	}, duration);
}
 
// fade in experience
function start() {
	
	$('body').removeClass("loading").addClass('loaded');

	g_StartAnimClass('.section-bg', 'ani-bgfadeout', 'pre-bgfadeout', 2000 , 1000);
	g_StartAnimClass('.content_main', 'ani-blurin-content', 'pre-blurin-content', 3000, 1500);
}
function init() {
	
	// start up after 2sec no matter what
	g_setPageAnimatingFlag(3500);
	window.setTimeout(function(){
        start();
    }, 2000);
}
var g_animOrder = 0;
var g_animList = [];
var g_viewH = 768;
var g_pageAnimating = false;
var g_scrollDelta = 0;
var g_secs = [];
var g_CurPageNo = 1;
var g_CurSecNo = 1;
function init_secs() {
	g_secs = [];
	let scrollerobj = $('.content_main');
	for(let i=1; i<=5;i++) {
		let cursec = {pages:[]};
		let pagecount = $('.page_content[data-index='+i+'][data-page=1]').data('pages');
		cursec.pagecount = pagecount;
		for(let j=1;j<=pagecount;j++){
			let jqPageObj = $('.page_content[data-index='+i+'][data-page='+j+']');
			let jqPageTopObj = $('.page_top[data-index='+i+'][data-page='+j+']');
			let jqPageBottomObj = $('.page_bottom[data-index='+i+'][data-page='+j+']');
			let tPos = jqPageTopObj.position().top - scrollerobj.offset().top;
			let bPos = jqPageBottomObj.position().top - scrollerobj.offset().top;
			let once = jqPageObj.data('once');
			let curpage = {
				jqPageObj: jqPageObj,
				jqPageTopObj: jqPageTopObj,
				jqPageBottomObj: jqPageBottomObj,
				tPos: tPos,
				bPos: bPos,
				once: once,
			}
			cursec.pages.push(curpage);
		}				
		g_secs.push(cursec);
	}
}
function resetPage() {
	if(g_secs.length<=0) return;
	if(g_pageAnimating) return;
	console.log(g_secs);
	let index = g_CurSecNo;
	let pageno = g_CurPageNo;
	console.log(index, pageno);
	let scroller = $('.content_main');
	let position = g_secs[index-1].pages[pageno-1].tPos; //- scroller.offset().top + scroller.scrollTop();
	// scroller.scrollTop(position);
	console.log(position);
	scroller.scrollTop(position);
}
$(window).load(function() {
	g_viewH = $('.section-bg').height();
	// fade in page
	var swidth = (window.innerWidth > 0) ? window.innerWidth : screen.width;
    if(swidth>600) {
		init_secs();
		init();
	}
	else {
		setTimeout(function () {
			$('body').removeClass("loading").addClass('loaded');
		}, 2000);	
	}
});

var original_scroll_height = document.getElementById('front_scroller').scrollHeight;
var resizing = false;
$(window).resize(function() {
	if(resizing) return;
	resizing = true;
	$('body').removeClass("loaded").addClass("loading");
	g_viewH = $('.section-bg').height();
	var swidth = (window.innerWidth > 0) ? window.innerWidth : screen.width;
    if(swidth>600) {
		setTimeout(function () {
			console.log("hello");
			console.log(g_CurSecNo, g_CurPageNo);
			let scroller = $('.content_main');
			console.log($('.page_top[data-index='+g_CurSecNo+'][data-page='+g_CurPageNo+']'));
			let position = $('.page_top[data-index='+g_CurSecNo+'][data-page='+g_CurPageNo+']').position().top - scroller.offset().top + scroller.scrollTop();
			console.log(position);
			scroller.scrollTop(position);
			$('body').removeClass("loading").addClass("loaded");
			resizing = false;
		}, 2000);	 
	}

});
var g_tStamp = 0;
var g_scroller = null;

