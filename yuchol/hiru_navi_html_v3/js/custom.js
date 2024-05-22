$(".mobile-menu-icon-hp").click(function() {
	$(".menu-toggle-btn").toggleClass("open");
	$(this).toggleClass("open");
	if($(".menu-toggle-btn").hasClass("open") == true){
		$(".menu-text-hp").text("CLOSE");	
	}
	else
	{
		$(".menu-text-hp").text("MENU");	
	}
	$(".navigation").slideToggle();
	$(".overlay-mobile-menu-hp").fadeToggle();
});

$('#gototop'). click(function() {
	$('html, body'). animate({
		scrollTop: 0
	}, 1000);
});

$(window).scroll(function() {
    if ($(this).scrollTop()) {
        $('#gototop').fadeIn();
    } else {
        $('#gototop').fadeOut();
    }
});

$("#gototop").click(function () {
   //1 second of animation time
   //html works for FFX but not Chrome
   //body works for Chrome but not FFX
   //This strange selector seems to work universally
   $("html, body").animate({scrollTop: 0}, 1000);
});

/*--1--*/
$(function(){
	$(".submit_btn_1").prop("disabled", true);
	$(".q1").click(function(){
		submitCheck();
	});
    submitCheck();

    function submitCheck() {
        if ($('input[name=\'shugyo[]\']:checked').length == 0) {
            $(".submit_btn_1").prop("disabled", true);
        } else {
            $(".submit_btn_1").prop("disabled", false);
        }
    }
	$(".submit_btn_1").click(function(){
		$(".form-boxes-1-hp").css("display","none");
		$(".form-boxes-2-hp").fadeIn();
		$(".step-hp").removeClass("active");
		$(".step-2-hp").addClass("active");
	});
});

/*--2--*/
$(function(){
	$(".submit_btn_2").prop("disabled", true);
    
	$('.form-option-2-hp input:required').keyup(function () {
        submitCheck_2();
    });
    submitCheck_2();

    function submitCheck_2() {
        let flag = true;
        $('.form-option-2-hp input:required').each(function (e) {
            if ($('.form-option-2-hp input:required').eq(e).val() === "") {
                flag = false;
            }
        });
        if (flag) {
            $('.submit_btn_2').prop("disabled", false);
        }
        else {
            $('.submit_btn_2').prop("disabled", true);
        }
    }
	
	$(".submit_btn_2").click(function(){
		$(".form-boxes-2-hp").css("display","none");
		$(".form-boxes-3-hp").fadeIn();
		$(".step-hp").removeClass("active");
		$(".step-3-hp").addClass("active");
	});
	
	$(".back_btn_2").click(function(){
		$(".form-boxes-2-hp").css("display","none");
		$(".form-boxes-1-hp").fadeIn();
		$(".step-hp").removeClass("active");
		$(".step-1-hp").addClass("active");
	});
});

/*--3--*/
$(function(){
	$(".submit_btn_3").prop("disabled", true);
	$(".q3").click(function(){
        submitCheck_3();
	});
    submitCheck_3();
    
    function submitCheck_3() {
        if ($('input[name=\'kinmuchi[]\']:checked').length == 0) {
            $(".submit_btn_3").prop("disabled", true);
        } else {
            $(".submit_btn_3").prop("disabled", false);
        }
    }
	
	$(".submit_btn_3").click(function(){
		$(".form-boxes-3-hp").css("display","none");
		$(".form-boxes-4-hp").fadeIn();
		$(".step-hp").removeClass("active");
		$(".step-4-hp").addClass("active");
	});
	
	$(".back_btn_3").click(function(){
		$(".form-boxes-3-hp").css("display","none");
		$(".form-boxes-2-hp").fadeIn();
		$(".step-hp").removeClass("active");
		$(".step-2-hp").addClass("active");
	});
});

/*--4--*/
$(function(){
	$(".submit_btn_4").prop("disabled", true);
    $(".name2").prop("disabled", true);
    
	$('.name1').keyup(function () {
        name1Check();
    });
    
	$('.name2').keyup(function () {
        name2Check();
    });
    name1Check();
    name2Check();

    function name1Check() {
        let flag = true;
        $('.name1').each(function (e) {
            if ($('.name1').eq(e).val() === "") {
                flag = false;
            }
        });
        if (flag) {
            $('.name2').prop("disabled", false);
        }
        else {
            $('.name2').prop("disabled", true);
        }
    }
    
    function name2Check() {
        let flag = true;
        $('.name2').each(function (e) {
            if ($('.name2').eq(e).val() === "") {
                flag = false;
            }
        });
        if (flag) {
            $('.submit_btn_4').prop("disabled", false);
        }
        else {
            $('.submit_btn_4').prop("disabled", true);
        }
    }
	
	$(".submit_btn_4").click(function(){
		$(".form-boxes-4-hp").css("display","none");
		$(".form-boxes-5-hp").fadeIn();
		$(".step-hp").removeClass("active");
		$(".step-5-hp").addClass("active");
	});
	
	$(".back_btn_4").click(function(){
		$(".form-boxes-4-hp").css("display","none");
		$(".form-boxes-3-hp").fadeIn();
		$(".step-hp").removeClass("active");
		$(".step-3-hp").addClass("active");
	});
});

/*--5--*/
$(function(){
	$(".submit_btn_5").prop("disabled", true);
    $(".email").prop("disabled", true);
    
	$('.tel').keyup(function () {
        telCheck();
    });
    
	$('.email').keyup(function () {
        emailCheck();
    });
    telCheck();
    emailCheck();

    function telCheck() {
        let flag = true;
        $('.tel').each(function (e) {
            if ($('.tel').eq(e).val() === "") {
                flag = false;
            }
        });
        if (flag) {
            $('.email').prop("disabled", false);
        }
        else {
            $('.email').prop("disabled", true);
        }
    }

    function emailCheck() {
        let flag = true;
        $('.email').each(function (e) {
            if ($('.email').eq(e).val() === "") {
                flag = false;
            }
        });
        if (flag) {
            $('.submit_btn_5').prop("disabled", false);
        }
        else {
            $('.submit_btn_5').prop("disabled", true);
        }
    }
	
	$(".back_btn_5").click(function(){
		$(".form-boxes-5-hp").css("display","none");
		$(".form-boxes-4-hp").fadeIn();
		$(".step-hp").removeClass("active");
		$(".step-4-hp").addClass("active");
	});
});