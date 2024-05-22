!function($){
    var swidth = (window.innerWidth > 0) ? window.innerWidth : screen.width;
    if(swidth>600) {

        var settings = {
            easing: "cubic-bezier(0,.45,.25,1)",
            animationTime: 900,
            pagination: true,
            updateURL: false
        };
        var onepage_scroll_el = $('.main');
        var sections = $("section");
        var topPos = 0;

        function transformPage(settings, pos) {
            onepage_scroll_el.css({
                "-webkit-transform": "translate3d(0, " + pos + "%, 0)", 
                "-webkit-transition": "all " + settings.animationTime + "ms " + settings.easing,
                "-moz-transform": "translate3d(0, " + pos + "%, 0)", 
                "-moz-transition": "all " + settings.animationTime + "ms " + settings.easing,
                "-ms-transform": "translate3d(0, " + pos + "%, 0)", 
                "-ms-transition": "all " + settings.animationTime + "ms " + settings.easing,
                "transform": "translate3d(0, " + pos + "%, 0)", 
                "transition": "all " + settings.animationTime + "ms " + settings.easing
            });
        }

        function moveDown() {
            if(g_secs.length<=0) return;
            if(g_pageAnimating) return;
            let index = g_CurSecNo;
            let pageno = g_CurPageNo;
            let pagecount = g_secs[index-1].pagecount;
            let secount = g_secs.length;
            if(index>=secount && pageno>=pagecount) return;
            let once = g_secs[index-1].pages[pageno-1].once;
            let is_newsec = false;
            if(index<secount && pageno >= pagecount) is_newsec = true;
            let next_triggered = true;
            if(once >= 1) next_triggered = true;
            if(index>=secount && pageno >= pagecount) next_triggered = false;
            if(next_triggered) {
                if(is_newsec) {

                    g_clearAllAnim('.content_main');
                    $('.content_main').addClass('ani-blurout-content');
                    setTimeout(function() {
                        
                        g_CurPageNo = 1;
                        g_CurSecNo = g_CurSecNo + 1;

                        console.log(g_CurSecNo, g_CurPageNo);
                        let scroller = $('.content_main');
                        console.log($('.page_top[data-index='+g_CurSecNo+'][data-page='+g_CurPageNo+']'));
                        let position = $('.page_top[data-index='+g_CurSecNo+'][data-page='+g_CurPageNo+']').position().top - scroller.offset().top + scroller.scrollTop();
                        console.log(position);
                        scroller.scrollTop(position);

                        setTimeout(function () {
                            g_clearAllAnim('.content_main');
                            $('.content_main').addClass('ani-blurin-content');
                        }, 10);

                    }, 1010);
                    
                    g_JQremoveClass('.page_content[data-index='+index+'][data-page='+pageno+']','page_active', 1000);
                    g_JQaddClass('.page_content[data-index='+(index+1)+'][data-page=1]','page_active', 1000);

                    g_clearAllAnim('.section-bg[data-index='+(index+1)+']', 'ani-bgfadeout');
                    g_JQaddClass('.section-bg[data-index='+(index+1)+']', 'pre-bgfadeout');

                    setTimeout(function() {

                        g_StartAnimClass('.section-bg[data-index='+(index+1)+']', 'ani-bgfadeout', 'pre-bgfadeout', 1000, 1000);

                        $("body")[0].className = $("body")[0].className.replace(/\bviewing-page-\d.*?\b/g, '');
                        $("body").addClass("viewing-page-"+(index+1));
                        
                        pos = (index * 100) * -1;
                        transformPage(settings, pos);

                    }, 10);
                    g_setPageAnimatingFlag(1500);
                }
                else {

                    g_clearAllAnim('.content_main');
                    $('.content_main').addClass('ani-blurout-content');

                    g_JQremoveClass('.page_content[data-index='+index+'][data-page='+pageno+']','page_active', 1000, 1000);
                    g_JQaddClass('.page_content[data-index='+index+'][data-page='+(pageno+1)+']','page_active', 1000);
                    setTimeout(function() {
                        g_CurPageNo = g_CurPageNo + 1;

                        console.log(g_CurSecNo, g_CurPageNo);
                        let scroller = $('.content_main');
                        console.log($('.page_top[data-index='+g_CurSecNo+'][data-page='+g_CurPageNo+']'));
                        let position = $('.page_top[data-index='+g_CurSecNo+'][data-page='+g_CurPageNo+']').position().top - scroller.offset().top + scroller.scrollTop();
                        console.log(position);
                        scroller.scrollTop(position);


                        g_clearAllAnim('.content_main');
                        $('.content_main').addClass('ani-blurin-content');
                    }, 1010);
                    g_setPageAnimatingFlag(1500);

                    return;
                }
            } 
        }
        function moveUp() {
            if(g_secs.length<=0) return;
            if(g_pageAnimating) return;
            let index = g_CurSecNo;
            let pageno = g_CurPageNo;
            let pagecount = g_secs[index-1].pagecount;
            let secount = g_secs.length;
            if(index<=1 && pageno <= 1) return;
            let once = g_secs[index-1].pages[pageno-1].once;
            let is_newsec = false;
            if(index<=secount && pageno <= 1) is_newsec = true;
            let next_triggered = true;
            if(once >= 1) next_triggered = true;
            if(index<=1 && pageno <= 1) next_triggered = false;

            if(next_triggered) {
                if(is_newsec) {
                    
                    g_clearAllAnim('.content_main');
                    $('.content_main').addClass('ani-blurout-content');
                    setTimeout(function() {

                        g_CurSecNo = index-1;
                        g_CurPageNo = 1;

                        console.log(g_CurSecNo, g_CurPageNo);
                        let scroller = $('.content_main');
                        console.log($('.page_top[data-index='+g_CurSecNo+'][data-page='+g_CurPageNo+']'));
                        let position = $('.page_top[data-index='+g_CurSecNo+'][data-page='+g_CurPageNo+']').position().top - scroller.offset().top + scroller.scrollTop();
                        console.log(position);
                        scroller.scrollTop(position);
                        
                        setTimeout(function () {
                            g_clearAllAnim('.content_main');
                            $('.content_main').addClass('ani-blurin-content');
                        }, 10);

                    }, 1100);
                    g_JQremoveClass('.page_content[data-index='+index+'][data-page='+pageno+']','page_active', 1000);
                    g_JQaddClass('.page_content[data-index='+(index-1)+'][data-page=1]','page_active', 1000);

                    g_clearAllAnim('.section-bg[data-index='+(index-1)+']', 'ani-bgfadeout');
                    g_JQaddClass('.section-bg[data-index='+(index-1)+']', 'pre-bgfadeout');

                    setTimeout(function() {
                        g_StartAnimClass('.section-bg[data-index='+(index-1)+']', 'ani-bgfadeout', 'pre-bgfadeout', 2000, 1000);

                        $("body")[0].className = $("body")[0].className.replace(/\bviewing-page-\d.*?\b/g, '');
                        $("body").addClass("viewing-page-"+(index-1));
                        
                        pos = ((index-2) * 100) * -1;
                        transformPage(settings, pos);

                    }, 10);
                    g_setPageAnimatingFlag(1500);
                }
                else {
                    g_clearAllAnim('.content_main');
                    $('.content_main').addClass('ani-blurout-content');

                    g_JQremoveClass('.page_content[data-index='+index+'][data-page='+pageno+']','page_active', 1000);
                    g_JQaddClass('.page_content[data-index='+index+'][data-page='+(pageno-1)+']','page_active', 1000);
                    setTimeout(function() {
                        g_CurPageNo = g_CurPageNo - 1;
                        
                        console.log(g_CurSecNo, g_CurPageNo);
                        let scroller = $('.content_main');
                        console.log($('.page_top[data-index='+g_CurSecNo+'][data-page='+g_CurPageNo+']'));
                        let position = $('.page_top[data-index='+g_CurSecNo+'][data-page='+g_CurPageNo+']').position().top - scroller.offset().top + scroller.scrollTop();
                        console.log(position);
                        scroller.scrollTop(position);

                        g_clearAllAnim('.content_main');
                        $('.content_main').addClass('ani-blurin-content');
                    }, 1100);
                    g_setPageAnimatingFlag(1500);
                }
            }

        }
        function onepage_scroll (){
            onepage_scroll_el.addClass("onepage-wrapper").css("position","relative");
            $.each( sections, function(i) {
                $(this).css({
                position: "absolute",
                top: topPos + "%"
                }).addClass("section").attr("data-index", i+1);
                topPos = topPos + 100;
            });
        
            if(window.location.hash != "" && window.location.hash != "#1") {
                let init_index =  window.location.hash.replace("#", "")
                $(settings.sectionContainer + "[data-index='" + init_index + "']").addClass("active")
                $("body").addClass("viewing-page-"+ init_index)
            
                next = $(settings.sectionContainer + "[data-index='" + (init_index) + "']");
                if(next) {
                next.addClass("active")
                $("body")[0].className = $("body")[0].className.replace(/\bviewing-page-\d.*?\b/g, '');
                $("body").addClass("viewing-page-"+next.data("index"))
                if (history.replaceState && settings.updateURL == true) {
                    var href = window.location.href.substr(0,window.location.href.indexOf('#')) + "#" + (init_index);
                    history.pushState( {}, document.title, href );
                }
                }
                pos = ((init_index - 1) * 100) * -1;
                onepage_scroll_el.transformPage(settings, pos);
            
            }else{
                $("section[data-index='1']").addClass("active")
                $("body").addClass("viewing-page-1")
            }
        
            return false;
        }
        onepage_scroll();
        var g_SSpeed = 300;
        var g_SStep = 200;
        var g_CurSPos = 0;
        var key = { left: 37, up: 38, right: 39, down: 40, spacebar: 32, 
            pageup: 33, pagedown: 34, end: 35, home: 36 };
        $(document).bind('keydown', function(event) {
    
            switch (event.keyCode) {
                case key.up:
                    customOnScroll(1);
                    break;
                case key.down:
                    customOnScroll(-1);
                    break;         
                case key.spacebar: // (+ shift)
                    customOnScroll(1);
                    break;
                case key.pageup:
                    customOnScroll(1);
                    break;
                case key.pagedown:
                    customOnScroll(-1);
                    break;
                case key.home:
                    customOnScroll(1);
                    break;
                case key.end:
                    customOnScroll(-1);
                    break;
                default:
                    return true; // a key we don't care about
            }
        });
        var g_mobileStartY = 0;
        $(document).bind('touchstart', function(event) {
            var touches = event.originalEvent.touches;
            if (touches && touches.length) {
                g_mobileStartY = touches[0].pageY;
            }
        });
        $(document).bind('touchmove', function(event) {

            var touches = event.originalEvent.touches;
            if (touches && touches.length) {
                var deltaY = g_mobileStartY - touches[0].pageY;

                if (deltaY >= 10) {
                    g_mobileStartY = touches[0].pageY;
                    customOnScroll(-1);
                }
                if (deltaY <= -10) {
                    g_mobileStartY = touches[0].pageY;
                    customOnScroll(1);
                }
            }
        });
        $(document).bind('mousewheel DOMMouseScroll', function(event) {
            if(g_secs.length<=0)return;
            if(g_pageAnimating) return;
            // event.preventDefault();
            g_scrollDelta = event.originalEvent.wheelDelta || -event.originalEvent.detail;
            let curSPos = $('.content_main').scrollTop();
            if (g_scrollDelta < 0) {
                customOnScroll(-1);
            } else {
                customOnScroll(1);
            }

        });
        function customOnScroll(direction) {
            if(g_secs.length<=0)return;
            if(g_pageAnimating) return;
            let curSPos = $('.content_main').scrollTop();
            if (direction < 0) {
                moveDown();
            } else if(direction > 0) {
                moveUp();
            }
        }
    }
}(window.jQuery);


