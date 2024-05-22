<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nopain
 */

?>

<footer class="site_footer">
	<div class="custom_container">
		<div class="custom_row">
			<div class="custom_col_image">
				<a href="<?php echo get_site_url(); ?>" class="footer_logo">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_yellow.svg">
				</a>
			</div>
			<div class="custom_col_text">
				<div class="footer_links">
					<ul>
						<li>
							<p class="footer_links_text">痛みにお困りの方</p>
							<ul class="footer_inner_links">
								<li><a href="<?php echo get_site_url(); ?>/muscle/">線維筋痛症改善プログラム</a></li>
								<li><a href="<?php echo get_site_url(); ?>/joint/">顎関節症改善プログラム</a></li>
								<li><a href="<?php echo get_site_url(); ?>/numbness/">しびれ解消プログラム</a></li>
								<li><a href="<?php echo get_site_url(); ?>/explore/">治らない痛みの研究会®︎認定院を探す</a></li>
							</ul>
						</li>
						<li>
							<a href="<?php echo get_site_url(); ?>/interest/" class="footer_links_text">疼痛改善に興味のある整骨院、鍼灸院、整体院の先生</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="footer_copyright">
			<p>©2021 治らない痛みの研究会®︎ All Rights Reserved.</p>
		</div>
	</div>
</footer>
<div class="pagetop" style="display: none;"><a href="javascript:void(0)"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/button_image.svg">top</a></div>


</div><!-- #page -->

<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery-ui.js"></script>
<script defer src="<?php echo get_stylesheet_directory_uri(); ?>/js/custom.js"></script>
<!-- intersection observer -->
<script defer src="<?php echo get_stylesheet_directory_uri(); ?>/js/intersection-observer-polyfill.js"></script>
<script type="text/javascript">
    var body_animating = true;
    $(window).on('load',function() {
        $('body').css('overflow','hidden');
        var logoHeight = $('.banner_logo img').height();
        var logoWidth = $('.banner_logo img').width();
        var windowHeight = $(window).height();
        var windowWidth = $(window).width();
        var logoPositionX = (windowWidth / 2) - (logoWidth / 2);
        var logoPositionY = (windowHeight / 2) - (logoHeight / 2);
        $('.banner_logo img').css({'top': logoPositionY, 'left': logoPositionX, 'visibility': 'visible'});
        setTimeout(function() {
            $(window).scrollTop(0);
            if (windowWidth > 900) {
                var logoMovePositionX = $('.banner_logo').position().left;
                var logoMovePositionY = $('.banner_logo').position().top;
                $('.banner_logo img').css({'top': logoMovePositionY, 'left': logoMovePositionX, 'transition':'all 0.4s'});
            }
            if (windowWidth < 901) {
                var bannerLogoWidth = $('.banner_logo').width() - $('.banner_logo img').width();
                var logoMovePositionX = $('.banner_logo').position().left + (bannerLogoWidth / 2);
                var logoMovePositionY = $('.banner_logo').position().top; 
                $('.banner_logo img').css({'top': logoMovePositionY, 'left': logoMovePositionX, 'transition':'all 0.4s'});
            }
        }, 2000);
        setTimeout(function() {
            $('.loader_with_banner_logo_animation').removeClass('loader_with_banner_logo_animation');
            $('.banner_logo img').css({'top': 'auto', 'left': 'auto'});
        }, 2500);
        setTimeout(function() {
            $('.loader_bg').fadeOut('slow');
            $('.banner_logo img').removeAttr('style');
            $('.navbar_toggler').css({'right': '0'});
            body_animating = false;
        }, 3000);
    });
    $(document).ready( function(){
        // $('a.move_down').click(function () {
        // 	$('.home_banner_section').removeClass('animate');
        // 	$('.about_the_study_group_section').addClass('animate');
        // 	$('.pagetop').fadeIn();
        // });
        // $('.home_banner_section').bind('mousewheel', function() {
        // 	return false;
        // });
        // touchMove = function(event) {
        // 	event.preventDefault();
        // }
        $('#id_move_down1, #id_move_down2').click(function () {
            moveDown();
        });
    });
    $(window).on('load scroll',function(){
        var	windowTop = $(window).scrollTop();
        if(windowTop > 600) {
            $('.pagetop').fadeIn();
        } else {
            $('.pagetop').fadeOut();
        }
    });
    $('.pagetop').on('click', function (event) {
        // $('.pagetop').fadeOut();
        event.preventDefault();
        moveUp();
        // setTimeout(() => {
        // 	$('.home_banner_section, .about_the_study_group_section').toggleClass('animate');
        // }, 1200);
    });

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
        if(body_animating) return;
        if (direction < 0) {
            if($("body").css("overflow") == "hidden")
            {
                moveDown();
            }
        } else if(direction > 0) {
            if($("body").css("overflow") == "hidden")
            {
                moveUp();
            }
            
        }
    }
    function moveDown() {
        if(body_animating) return;
        body_animating = true;
        $("body").css("overflow", "hidden");
        $('body,html').animate({
            scrollTop: $('.about_the_study_group_section').offset().top
            }, { duration: 500, easing: "swing", complete: function() {
            
        }});
        setTimeout(() => {
            $("body").css("overflow", "unset");
            body_animating = false;
        }, 1000);
    }
    function moveUp() {
        if(body_animating) return;
        body_animating = true;
        $("body").css("overflow", "hidden");
        $('body,html').animate({
            scrollTop: 0,
        },  { duration: 500, easing: "swing", complete: function() {
                
        }});
        setTimeout(() => {
            $("body").css("overflow", "hidden");
            body_animating = false;
        }, 1000);
    }
    window.addEventListener('scroll', function() {
        if(body_animating) return;
        if($("body").css("overflow") == "hidden")
        {
            return;
        }
        var element = document.querySelector('#first_view');
        var position = element.getBoundingClientRect();

        // checking whether fully visible
        if(position.top >= 0 && position.bottom <= window.innerHeight) {
        }

        // checking for partial visibility
        if(position.top < window.innerHeight && position.bottom >= 0) {
            $("body").css("overflow", "hidden");
            moveUp();
        }
    });
</script>
<?php wp_footer(); ?>

</body>
</html>
