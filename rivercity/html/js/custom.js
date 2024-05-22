+ function($) {
    $(document).ready(function() {
        // Shrink_header
        $(window).scroll(function() {
            if ($(document).scrollTop() > $(".hdr_top_outer").outerHeight()) {
                $('.header_outer').addClass('shrink');
            } else {
                $('.header_outer').removeClass('shrink');
            }
        });
        // Responsive_navigation
        $(".menu_btn").click(function() {
            $("body").toggleClass("addPnnl");
            $(".overlay").click(function() {
                $("body").removeClass("addPnnl");
            })
        });

        // Scroll_top_top
        jQuery(window).on("scroll", function() {
            if (jQuery(this).scrollTop() > 100) {
                jQuery(".scrollup").addClass("active");
            } else {
                jQuery(".scrollup").removeClass("active");
            }
        });

        jQuery(".scrollup").on("click", function() {
            jQuery("html, body").animate({
                scrollTop: 0
            }, 600);
            return false;
        });
        $(".bnr_btn a").click(function() {
        $([document.documentElement, document.body]).animate({
            scrollTop: $(".rght_choice_frm_outer").offset().top
        }, 1000);
    });
    });
// Mega_menu
        $(".hdr_menu li.menu-item-has-children > a").after("<span class='sub_menu_opener'><i class='fas fa-chevron-down'></i></span>");
        $(".sub_menu_opener").click(function() {
            $(".hdr_menu li.menu-item-has-children .sub-menu").slideToggle(500);
        });
        $(".sub_menu_opener").click(function() {
            $("body").toggleClass("mega_menu_open");
        });

 $(".abt_mnu").click(function() {
            $([document.documentElement, document.body]).animate({
                scrollTop: $(".about-section").offset().top - 75
            }, 1200);
    });
    $(".srprs_mnu").click(function() {
            $([document.documentElement, document.body]).animate({
                scrollTop: $(".surprising-effect-section").offset().top - 75
            }, 1200);
    });
    $(".ptnts_mnu").click(function() {
            $([document.documentElement, document.body]).animate({
                scrollTop: $(".patients-impression-section").offset().top - 75
            }, 1200);
    });
    $(".aging_mnu").click(function() {
            $([document.documentElement, document.body]).animate({
                scrollTop: $(".aging-section").offset().top - 75
            }, 1200);
    });
    $(".long_mnu").click(function() {
            $([document.documentElement, document.body]).animate({
                scrollTop: $(".longevity-section").offset().top - 75
            }, 1200);
    });
    $(".thrpy_mnu").click(function() {
            $([document.documentElement, document.body]).animate({
                scrollTop: $(".nmn-therapy-section").offset().top - 75
            }, 1200);
    });
    $(".mid_logo_mnu").click(function() {
            $([document.documentElement, document.body]).animate({
                scrollTop: $(".middle-logo-section").offset().top - 75
            }, 1200);
    });
    $(".map_mnu").click(function() {
            $([document.documentElement, document.body]).animate({
                scrollTop: $(".map-address-section").offset().top - 75
            }, 1200);
    });

}(jQuery);