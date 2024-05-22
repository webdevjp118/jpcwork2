$(document).ready(function(){
    //Sticky Header
    $(window).scroll(function(){
        var headerHeight = $('#header').outerHeight();
        var scroll = $(window).scrollTop();
        var windowWidth = $(window).width();
        
        if (scroll >= 1 && windowWidth <= 991){ 
            $('#header').addClass('sticky');
            $("body").css({"padding-top": headerHeight});
        }else{
            $('#header').removeClass('sticky');
            $("body").css({"padding-top": "0px"});
        }
    });
    
    // toggle button js
    $('button.menu-toggle-btn').click(function(){
        $('nav.header-nav').toggleClass('menu-active');
        $('main#main').toggleClass('pos-fix');
    });

    // banner slider js
    $('.banner-slider-nav').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        centerMode: true,
        focusOnSelect: true,
        centerPadding: '36.5%',
        prevArrow: '<button type="button" class="slick-prev slick-arrow"><i class="fa fa-angle-left" aria-hidden="true"></i></button>',
        nextArrow: '<button type="button" class="slick-next slick-arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></button>',
        responsive: [
        {
            breakpoint: 1281,
            settings: {
                centerPadding: '34%',
            }
        },
        {
            breakpoint: 768,
            settings: {
                centerPadding: '0%',
            }
        }
        ]
    });
});
