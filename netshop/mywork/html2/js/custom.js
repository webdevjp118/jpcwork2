// JAVASCRIPT
$(document).ready(function(){

    // Header Toggle JS
    $('#toggleNavButton').click(function(){
        $('#header').toggleClass('active');
        $('body').toggleClass('no-scroll');
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

    // Custom-Grid Slider JS
    $('.custom-grid-row.slide').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
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
                    slidesToShow: 1,
                }
            }
            ]
    });

    // Scroll-Top Button JS
    $("#scroll-top-btn").click(function () {
        $("html, body").animate({scrollTop: 0}, 1000);
    });

});