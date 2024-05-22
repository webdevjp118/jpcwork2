$(document).ready(function(){
	// banner
	$(".banner").slick({
		dots: true,
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false
	});

	// toggle
	$(window).resize(function(){
		$(".navbar_links").removeAttr('style');
		$(".navbar-toggler").removeClass('menu_open');
	});

	$('.navbar-toggler').on("click", function(){
		$(this).toggleClass('menu_open');
		$(".navbar_links").slideToggle();
	});

	$( "#accordion" ).accordion({
		heightStyle: "content"
	});

	// bottom to top
	var btn = $('.topbtn');

	btn.on('click', function(e) {
		e.preventDefault();
		$('html, body').animate({scrollTop:0}, '300');
	});
});