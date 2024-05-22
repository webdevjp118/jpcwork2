// JAVASCRIPT
$(document).ready(function(){

    // Header Toggle JS
    $('#header-nav-controller button').click(function(){
        $('#header').toggleClass('menu-active');
        $('body').toggleClass('no-scroll');
    });

    // Banner Slider JS
    $('.banner-slide').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        fade: true,
        autoplaySpeed: 3000,
        arrows: false,
        dots: false
    });

    // Fixed Position Button
    $(window).scroll(function() {    
        var scroll = $(window).scrollTop();
    
        if (scroll > 300) {
            $(".sticky-btm-btn").addClass("pos-fix");
        }else{
            $(".sticky-btm-btn").removeClass("pos-fix");
        }
    });

});