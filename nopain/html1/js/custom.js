$(document).ready( function(){
	$('.navbar_toggler').click(function(){
        $('body').toggleClass('no_scroll');
        $(this).toggleClass('open_menu');
        $(this).next("nav").toggleClass('navbar_animate');
    });
});