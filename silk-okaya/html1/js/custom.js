$(document).ready(function(){
    $(window).on('load',function() {
        $('.loader-wrapper').fadeOut('slow');
    });
    var lastId,
    sideMenu = $(".left_side_bar .left_side_bar_inner ul li, .left_side_bar_bottom ul li"),
    menuItems = sideMenu.find("a"),
    scrollItems = menuItems.map(function () {
        var item = $($(this).attr("href"));
        if (item.length) {
            return item;
        }
    });
    menuItems.click(function (e) {
        var href = $(this).attr("href"),
        offsetTop = href === "#" ? 0 : $(href).offset().top + 1;
        $('html, body').stop().animate({
            scrollTop: offsetTop
        }, 1200);
        e.preventDefault();
    });
    $(document).scroll(function () {
        var fromTop = $(this).scrollTop() + 1;
        var cur = scrollItems.map(function () {
            if ($(this).offset().top < fromTop)
                return this;
        });
        cur = cur[cur.length - 1];
        var id = cur && cur.length ? cur[0].id : "";

        if (lastId !== id) {
            lastId = id;
        }
    });
    $('.filter_btns li a').click(function(){
        $('.navbar-nav li a[href="#masonryFilter"]').trigger('click');
    });

    $('.banner_slider').slick({
        dots: true,
        fade: true,
        speed: 500,
        arrows: false,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 4000,
    });
    $('.navbar_toggler').click(function(){
        $('body').toggleClass('no_scroll');
        $(this).toggleClass('open_menu');
        $(this).next(".toggle_navbar_custom").toggleClass('navbar_animate');
    });
    $(window).on('load resize', function(){
        var hraderHeight = 0;
        var content_height = $('.left_side_bar').outerHeight();
        var fixedSideBarHeight = $('.left_side_bar_inner').outerHeight();
        var sidebar_wapper_width = $('.left_side_bar').width();
        $('.left_side_bar_inner').css({'width': sidebar_wapper_width});
        if(content_height >= fixedSideBarHeight){
            $(document).scroll(function(){
                var sideOffset = $('.left_side_bar').offset().top;
                var documentScrollTop = $(document).scrollTop();
                if(documentScrollTop >= sideOffset && (documentScrollTop - sideOffset) <= (content_height - fixedSideBarHeight)){
                    $('.left_side_bar_inner').css({'position': 'fixed', 'top': '0'});
                }
                else if((documentScrollTop - sideOffset) >= (content_height - fixedSideBarHeight)){
                    $('.left_side_bar_inner').css({'position': 'absolute', 'top': content_height - fixedSideBarHeight});
                }
                else{
                    $('.left_side_bar_inner').css({'position': 'relative', 'top': 0});
                }
            });
        }else if(content_height < fixedSideBarHeight){
            $('.left_side_bar_inner').css({'position': 'relative'});
        }
    });
});