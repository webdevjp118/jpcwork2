<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Tomorrow_Land
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">


<!-- CSS -->
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/cssreset.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/html5-doctor-reset-stylesheet.min.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/com.css">
<!-- slick slider -->
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/slick.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/jquery.fancybox.css">
<!-- Javascript -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery-1.12.4.min.js"><\/script>')</script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/slick.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.fancybox.js"></script>
<script defer src="<?php echo get_stylesheet_directory_uri(); ?>/js/com.js"></script>
<!-- intersection observer -->
<script defer src="<?php echo get_stylesheet_directory_uri(); ?>/js/intersection-observer-polyfill.js"></script>
<script>
$(function() {
	var observer = new IntersectionObserver(function(entries) {
		entries.forEach(function(e) {
			if (!e.isIntersecting) return;
			e.target.classList.add('move'); // 交差した時の処理
			observer.unobserve(e.target);
			// target element:
		    //   e.target				ターゲット
		    //   e.isIntersecting		交差しているかどうか
		    //   e.intersectionRatio	交差している領域の割合
		    //   e.intersectionRect		交差領域のgetBoundingClientRect()
		    //   e.boundingClientRect	ターゲットのgetBoundingClientRect()
		    //   e.rootBounds			ルートのgetBoundingClientRect()
		    //   e.time					変更が起こったタイムスタンプ
		})

	},{
    	// オプション設定
		rootMargin: '0px 0px -5% 0px' //下端から5%入ったところで発火
		//threshold: [0, 0.5, 1.0]
	});

	var target = document.querySelectorAll('.io'); //監視したい要素をNodeListで取得
	for(var i = 0; i < target.length; i++ ) {
	    observer.observe(target[i]); // 要素の監視を開始
	}

	//アニメーションによる各要素のはみ出しを解消
	$("body").wrapInner("<div style='overflow:hidden;'></div>");

});
</script>
<!-- matchHeight -->
<script defer src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.matchHeight.js"></script>
<script>
$(function() {
	$(window).on('load',function(){
		$(".contents_nav ul > li").matchHeight();
	});
});
</script>
<!-- GoogleMap iFrame-->
<script>
	$(window).on('load', function(){
		// $('.footer_map').append('<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3281.716854825455!2d135.533682!3d34.661853!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb86b7d525bf8bd79!2sFIVE%20HOTEL%20OSAKA!5e0!3m2!1sja!2sjp!4v1612921196467!5m2!1sja!2sjp" frameborder="0" style="border:0" allowfullscreen></iframe>');
		$('.map_object').append('<iframe width="100%" height="100%" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3281.716854825455!2d135.533682!3d34.661853!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb86b7d525bf8bd79!2sFIVE%20HOTEL%20OSAKA!5e0!3m2!1sja!2sjp!4v1612921196467!5m2!1sja!2sjp" frameborder="0" style="border:0" allowfullscreen></iframe>');
		
	});
</script>
<!--svgxuse for IE -->
<script defer src="<?php echo get_stylesheet_directory_uri(); ?>/js/svgxuse.js"></script>
<!--[if lt IE 9]>
<script src="js/IE9.js"></script>
<script src="js/html5shiv.js"></script>
<script>
	document.createElement('main');
</script>
<![endif]-->


<!-- 日付カレンダーIE対応 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$( function() {
$( "#datepicker1,#datepicker2" ).datepicker( {
	dateFormat: 'yy/mm/dd',
	monthNames: ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"],
	minDate: '+1d'
});
} );
</script>

	<?php wp_head(); ?>
</head>

<body id="PAGETOP" <?php body_class(['transition', 'contents']); ?>>
<svg aria-hidden="true" style="display: none;" version="1.1" xmlns="http://www.w3.org/2000/svg">
	<defs>
		<filter id="filter_blur">
			<feGaussianBlur in="SourceGraphic" stdDeviation="2" result="blur" />
		</filter>
		<filter id="filter_monotone">
			<feColorMatrix type="saturate" values="0" />
		</filter>
		<symbol id="icon_sns_fb" viewBox="0 0 32 32">
			<path d="M32,16.1A16,16,0,1,0,13.5,31.9V20.72H9.44V16.1H13.5V12.57c0-4,2.39-6.22,6-6.22a24.77,24.77,0,0,1,3.58.31V10.6h-2a2.31,2.31,0,0,0-2.61,2.5v3h4.44l-.71,4.62H18.5V31.9A16,16,0,0,0,32,16.1Z"></path>
		</symbol>
		<symbol id="icon_sns_insta" viewbox="0 0 32 32">
			<path d="M16 2.88c4.28 0 4.787 0 6.467 0.093 1.071 0.014 2.091 0.213 3.035 0.567l-0.062-0.020c0.717 0.273 1.326 0.682 1.825 1.199l0.001 0.001c0.523 0.501 0.932 1.117 1.189 1.807l0.011 0.033c0.347 0.882 0.552 1.902 0.56 2.97l0 0.003c0.067 1.68 0.093 2.187 0.093 6.453s0 4.787-0.093 6.467c-0.008 1.071-0.213 2.092-0.58 3.031l0.020-0.058c-0.263 0.723-0.668 1.338-1.185 1.839l-0.001 0.001c-0.504 0.518-1.119 0.927-1.806 1.189l-0.034 0.011c-0.883 0.335-1.903 0.534-2.968 0.547l-0.005 0c-1.68 0.080-2.187 0.093-6.453 0.093s-4.787 0-6.467-0.093c-1.071-0.012-2.091-0.212-3.035-0.567l0.061 0.020c-0.721-0.273-1.336-0.682-1.839-1.199l-0.001-0.001c-0.518-0.504-0.927-1.119-1.189-1.806l-0.011-0.034c-0.334-0.878-0.533-1.894-0.547-2.954l-0-0.006c-0.080-1.693-0.093-2.2-0.093-6.467s0-4.787 0.093-6.467c0.014-1.071 0.213-2.091 0.567-3.035l-0.020 0.062c0.273-0.717 0.682-1.326 1.199-1.825l0.001-0.001c0.504-0.522 1.119-0.935 1.806-1.202l0.034-0.012c0.878-0.334 1.894-0.533 2.954-0.547l0.006-0c1.68 0 2.187-0.093 6.467-0.093zM16 0c-4.347 0-4.88 0-6.587 0.093-1.406 0.028-2.74 0.299-3.973 0.774l0.080-0.027c-1.116 0.414-2.069 1.036-2.853 1.826l-0.001 0.001c-0.791 0.784-1.413 1.737-1.809 2.8l-0.017 0.054c-0.445 1.149-0.716 2.478-0.746 3.867l-0 0.013c-0.093 1.72-0.093 2.253-0.093 6.6s0 4.893 0.093 6.667c0.029 1.401 0.3 2.731 0.774 3.96l-0.027-0.080c0.427 1.089 1.047 2.017 1.826 2.786l0.001 0.001c0.776 0.794 1.719 1.42 2.774 1.822l0.053 0.018c1.149 0.446 2.479 0.718 3.868 0.746l0.012 0c1.733 0.080 2.28 0.080 6.627 0.080s4.88 0 6.587-0.093c1.401-0.026 2.731-0.298 3.959-0.774l-0.079 0.027c2.162-0.84 3.84-2.518 4.661-4.625l0.019-0.055c0.44-1.129 0.711-2.434 0.746-3.798l0-0.015c0.107-1.773 0.107-2.307 0.107-6.667s0-4.893-0.093-6.6c-0.029-1.401-0.3-2.731-0.774-3.96l0.027 0.080c-0.398-1.122-1.023-2.077-1.825-2.851l-0.002-0.002c-0.787-0.786-1.739-1.408-2.799-1.809l-0.055-0.018c-1.13-0.435-2.436-0.701-3.8-0.733l-0.014-0c-1.773-0.107-2.32-0.107-6.667-0.107z"></path>
			<path d="M16 7.787c-4.543 0-8.227 3.683-8.227 8.227s3.683 8.227 8.227 8.227c4.543 0 8.227-3.683 8.227-8.227 0-0.005 0-0.009 0-0.014v0.001c0 0 0 0 0 0 0-4.536-3.677-8.213-8.213-8.213-0.005 0-0.009 0-0.014 0h0.001zM16 21.333c-2.946 0-5.333-2.388-5.333-5.333s2.388-5.333 5.333-5.333c2.946 0 5.333 2.388 5.333 5.333v0c0 2.946-2.388 5.333-5.333 5.333v0z"></path>
			<path d="M26.467 7.453c0 1.060-0.86 1.92-1.92 1.92s-1.92-0.86-1.92-1.92c0-1.060 0.86-1.92 1.92-1.92v0c0.004-0 0.009-0 0.013-0 1.053 0 1.907 0.854 1.907 1.907 0 0.005-0 0.009-0 0.014v-0.001z"></path>
		</symbol>
		<symbol id="icon_sns_tw" viewbox="0 0 32 32">
			<path d="M31.693 6.267c-1.075 0.49-2.323 0.847-3.631 1.007l-0.062 0.006c1.325-0.812 2.322-2.047 2.813-3.514l0.013-0.046c-1.177 0.731-2.547 1.29-4.010 1.599l-0.083 0.015c-1.178-1.251-2.845-2.030-4.694-2.030-3.539 0-6.412 2.855-6.44 6.388l-0 0.003c-0 0.011-0 0.024-0 0.037 0 0.503 0.063 0.991 0.182 1.457l-0.009-0.041c-5.355-0.257-10.072-2.785-13.242-6.635l-0.025-0.031c-0.539 0.919-0.858 2.025-0.858 3.205 0 2.211 1.119 4.161 2.822 5.314l0.023 0.014c-1.076-0.032-2.078-0.325-2.952-0.817l0.032 0.017v0.080c-0 0.018-0 0.038-0 0.059 0 3.109 2.202 5.703 5.132 6.307l0.042 0.007c-0.511 0.144-1.097 0.227-1.702 0.227-0.001 0-0.003 0-0.004 0h0c-0.454-0.047-0.867-0.126-1.265-0.239l0.052 0.012c0.854 2.572 3.212 4.406 6.006 4.467l0.007 0c-2.166 1.72-4.941 2.76-7.958 2.76-0.015 0-0.029-0-0.044-0h0.002c-0.017 0-0.038 0-0.058 0-0.525 0-1.041-0.034-1.548-0.1l0.060 0.006c2.777 1.814 6.178 2.893 9.831 2.893 0.017 0 0.035-0 0.052-0h-0.003c0.040 0 0.087 0 0.133 0 10.044 0 18.187-8.142 18.187-18.187 0-0.028-0-0.057-0-0.085l0 0.004c0-0.28 0-0.56 0-0.827 1.264-0.923 2.33-2.027 3.184-3.287l0.030-0.046z"></path>
		</symbol>
		<symbol id="icon_close" viewbox="0 0 32 32">
			<path d="M25.24 8.64l-1.88-1.88-7.36 7.36-7.36-7.36-1.88 1.88 7.36 7.36-7.36 7.36 1.88 1.88 7.36-7.36 7.36 7.36 1.88-1.88-7.36-7.36 7.36-7.36z"></path>
		</symbol>
		<symbol id="icon_plus" viewbox="0 0 32 32">
			<path d="M25.333 14.667h-8v-8h-2.667v8h-8v2.667h8v8h2.667v-8h8v-2.667z"></path>
		</symbol>
		<symbol id="icon_minus" viewbox="0 0 32 32">
			<path d="M6.667 14.667h18.667v2.667h-18.667v-2.667z"></path>
		</symbol>
		<symbol id="icon_mail" viewbox="0 0 32 32">
			<path d="M29.333 5.333h-26.667v21.333h26.667zM26.667 24h-21.333v-13.333l10.667 6.667 10.667-6.667zM16 14.667l-10.667-6.667h21.333z"></path>
		</symbol>
		<symbol id="icon_mail_nega" viewbox="0 0 32 32">
			<path d="M29.333 5.333h-26.667v21.333h26.667zM26.667 10.667l-10.667 6.667-10.667-6.667v-2.667l10.667 6.667 10.667-6.667z"></path>
		</symbol>
		<symbol id="icon_phone" viewbox="0 0 32 32">
			<path d="M25.64 20.347l-3.387-0.347c-0.091-0.011-0.197-0.017-0.305-0.017-0.735 0-1.4 0.297-1.882 0.778l-2.453 2.453c-3.805-1.959-6.828-4.982-8.734-8.675l-0.052-0.112 2.467-2.52c0.452-0.477 0.73-1.123 0.73-1.833 0-0.125-0.009-0.247-0.025-0.367l0.002 0.014-0.333-3.36c-0.159-1.335-1.284-2.36-2.649-2.36-0.002 0-0.003 0-0.005 0h-3.68c-0.736 0-1.333 0.597-1.333 1.333v0c0 12.518 10.148 22.667 22.667 22.667v0c0.736 0 1.333-0.597 1.333-1.333v0-3.68c-0.005-1.361-1.028-2.481-2.347-2.639l-0.013-0.001z"></path>
		</symbol>
		<symbol id="icon_doc" viewbox="0 0 32 32">
			<path d="M17.52 3.613h-11.84v24.773h20.64v-16zM17.973 7.84l4.133 4.16h-4.133zM8.347 25.72v-19.44h7.653v7.693h7.68v11.747z"></path>
		</symbol>
		<symbol id="icon_blank" viewbox="0 0 32 32">
			<path d="M22.093 24.76h-14.853v-14.853h7.427v-2.667h-10.093v20.187h20.187v-10.093h-2.667v7.427z"></path>
			<path d="M17.787 4.573v2.667h5.093l-9.16 9.147 1.893 1.893 9.147-9.16v5.093h2.667v-9.64h-9.64z"></path>
		</symbol>
		<symbol id="icon_dl" viewbox="0 0 32 32">
			<path d="M24 18.653v5.333h-16v-5.333h-2.667v8h21.333v-8h-2.667z"></path>
			<path d="M22.813 13.28l-1.88-1.893-3.6 3.6v-8.307h-2.667v8.307l-3.6-3.6-1.88 1.893 6.813 6.813 6.813-6.813z"></path>
		</symbol>

		<symbol id="icon_search" viewbox="0 0 32 32">
			<path d="M20.667 18.667h-1.053l-0.373-0.36c1.301-1.509 2.093-3.489 2.093-5.653 0-4.794-3.886-8.68-8.68-8.68s-8.68 3.886-8.68 8.68c0 4.794 3.886 8.68 8.68 8.68 2.165 0 4.144-0.792 5.665-2.103l-0.011 0.009 0.36 0.373v1.053l6.667 6.667 1.987-2zM12.667 18.667c-3.314 0-6-2.686-6-6s2.686-6 6-6c3.314 0 6 2.686 6 6v0c0 0.004 0 0.009 0 0.013 0 3.306-2.68 5.987-5.987 5.987-0.005 0-0.009 0-0.014-0h0.001z"></path>
		</symbol>
		<symbol id="icon_cart" viewbox="0 0 32 32">
			<path d="M22.067 17.333c0.007 0 0.015 0 0.024 0 0.982 0 1.84-0.531 2.303-1.321l0.007-0.013 4.773-8.653c0.117-0.194 0.187-0.429 0.187-0.68 0-0.736-0.597-1.333-1.333-1.333-0.009 0-0.019 0-0.028 0l0.001-0h-19.72l-1.253-2.667h-4.36v2.667h2.667l4.8 10.12-1.8 3.213c-0.225 0.383-0.357 0.842-0.357 1.333 0 1.473 1.194 2.667 2.667 2.667 0.008 0 0.017-0 0.025-0h15.999v-2.667h-16l1.467-2.667zM9.547 8h16.2l-3.68 6.667h-9.333zM10.667 24c-1.473 0-2.667 1.194-2.667 2.667s1.194 2.667 2.667 2.667c1.473 0 2.667-1.194 2.667-2.667v0c0-1.473-1.194-2.667-2.667-2.667v0zM24 24c-1.473 0-2.667 1.194-2.667 2.667s1.194 2.667 2.667 2.667c1.473 0 2.667-1.194 2.667-2.667v0c0-1.473-1.194-2.667-2.667-2.667v0z"></path>
		</symbol>
		<symbol id="icon_calendar" viewbox="0 0 32 32">
			<path d="M29.333 4h-4v-2.667h-2.667v2.667h-13.333v-2.667h-2.667v2.667h-4v26.667h26.667zM26.667 28h-21.333v-17.333h21.333z"></path>
		</symbol>
		<symbol id="icon_pin" viewbox="0 0 32 32">
			<path d="M16 3.24c-5.25 0-9.507 4.256-9.507 9.507v0c0.037 1.715 0.487 3.317 1.254 4.721l-0.027-0.054c2.718 4.294 5.445 7.997 8.404 11.497l-0.124-0.151c2.835-3.35 5.562-7.053 8.034-10.934l0.246-0.413c0.74-1.35 1.19-2.952 1.226-4.655l0-0.011c0-5.25-4.256-9.507-9.507-9.507v0zM16 15.907c-0.004 0-0.009 0-0.013 0-1.745 0-3.16-1.415-3.16-3.16s1.415-3.16 3.16-3.16c1.745 0 3.16 1.415 3.16 3.16v0c0 0 0 0 0 0 0 1.741-1.407 3.152-3.146 3.16h-0.001z"></path>
		</symbol>
		<symbol id="arrow_right" viewbox="0 0 32 32">
			<path d="M12.28 26.28l-1.893-1.893 8.4-8.387-8.4-8.387 1.893-1.893 10.267 10.28-10.267 10.28z"></path>
		</symbol>
		<symbol id="arrow_right_w" viewbox="0 0 32 32">
			<path d="M7.947 26.28l-1.88-1.893 8.387-8.387-8.387-8.387 1.88-1.893 10.28 10.28-10.28 10.28z"></path>
			<path d="M16.6 26.28l-1.88-1.893 8.387-8.387-8.387-8.387 1.88-1.893 10.28 10.28-10.28 10.28z"></path>
		</symbol>
		<symbol id="arrow_right_line" viewbox="0 0 32 32">
			<path d="M17.040 5.72l-1.893 1.893 7.067 7.053h-15.64v2.667h15.64l-7.067 7.053 1.893 1.893 10.267-10.28-10.267-10.28z"></path>
		</symbol>
		<symbol id="arrow_right_large1" viewbox="0 0 32 32">
			<path d="M9.176 30.488l-0.56-0.568 13.92-13.92-13.92-13.92 0.56-0.568 14.496 14.488-14.496 14.488z"></path>
		</symbol>
		<symbol id="arrow_right_large2" viewbox="0 0 32 32">
			<path d="M9.464 30.768l-1.136-1.128 13.64-13.64-13.64-13.64 1.136-1.128 14.768 14.768-14.768 14.768z"></path>
		</symbol>
		<symbol id="arrow_right_large3" viewbox="0 0 32 32">
			<path d="M9.232 31.336l-2.264-2.264 13.072-13.072-13.072-13.072 2.264-2.264 15.336 15.336-15.336 15.336z"></path>
		</symbol>
		<symbol id="arrow_left" viewbox="0 0 32 32">
			<path d="M19.72 26.28l-10.267-10.28 10.267-10.28 1.893 1.893-8.4 8.387 8.4 8.387-1.893 1.893z"></path>
		</symbol>
		<symbol id="arrow_left_w" viewbox="0 0 32 32">
			<path d="M24.053 26.28l-10.28-10.28 10.28-10.28 1.88 1.893-8.387 8.387 8.387 8.387-1.88 1.893z"></path>
			<path d="M15.4 26.28l-10.28-10.28 10.28-10.28 1.88 1.893-8.387 8.387 8.387 8.387-1.88 1.893z"></path>
		</symbol>
		<symbol id="arrow_left_line" viewbox="0 0 32 32">
			<path d="M25.427 14.667h-15.64l7.067-7.053-1.893-1.893-10.267 10.28 10.267 10.28 1.893-1.893-7.067-7.053h15.64v-2.667z"></path>
		</symbol>
		<symbol id="arrow_left_large1" viewbox="0 0 32 32">
			<path d="M22.816 30.488l-14.488-14.488 14.488-14.488 0.568 0.568-13.92 13.92 13.92 13.92-0.568 0.568z"></path>
		</symbol>
		<symbol id="arrow_left_large2" viewbox="0 0 32 32">
			<path d="M22.536 30.768l-14.768-14.768 14.768-14.768 1.136 1.128-13.64 13.64 13.64 13.64-1.136 1.128z"></path>
		</symbol>
		<symbol id="arrow_left_large3" viewbox="0 0 32 32">
			<path d="M22.768 31.336l-15.336-15.336 15.336-15.336 2.264 2.264-13.072 13.072 13.072 13.072-2.264 2.264z"></path>
		</symbol>
		<symbol id="arrow_up" viewbox="0 0 32 32">
			<path d="M24.387 21.613l-8.387-8.4-8.387 8.4-1.893-1.893 10.28-10.267 10.28 10.267-1.893 1.893z"></path>
		</symbol>
		<symbol id="arrow_up_line" viewbox="0 0 32 32">
			<path d="M26.28 14.96l-10.28-10.267-10.28 10.267 1.893 1.893 7.053-7.067v15.64h2.667v-15.64l7.053 7.067 1.893-1.893z"></path>
		</symbol>
		<symbol id="arrow_up_large1" viewbox="0 0 53 32">
			<path d="M49.867 28.307l-23.2-23.2-23.2 23.2-0.947-0.947 24.147-24.147 24.147 24.147-0.947 0.947z"></path>
		</symbol>
		<symbol id="arrow_up_large2" viewbox="0 0 53 32">
			<path d="M49.4 28.787l-22.733-22.733-22.733 22.733-1.893-1.893 24.627-24.613 24.627 24.613-1.893 1.893z"></path>
		</symbol>
		<symbol id="arrow_up_large3" viewbox="0 0 53 32">
			<path d="M48.453 31.053l-21.787-21.787-21.787 21.787-3.773-3.773 25.56-25.56 25.56 25.56-3.773 3.773z"></path>
		</symbol>
		<symbol id="arrow_down" viewbox="0 0 32 32">
			<path d="M16 22.547l-10.28-10.267 1.893-1.893 8.387 8.4 8.387-8.4 1.893 1.893-10.28 10.267z"></path>
		</symbol>
		<symbol id="arrow_line_down" viewbox="0 0 32 32">
			<path d="M24.387 15.147l-7.053 7.067v-15.64h-2.667v15.64l-7.053-7.067-1.893 1.893 10.28 10.267 10.28-10.267-1.893-1.893z"></path>
		</symbol>
		<symbol id="arrow_down_large1" viewbox="0 0 53 32">
			<path d="M26.667 28.787l-24.147-24.147 0.947-0.947 23.2 23.2 23.2-23.2 0.947 0.947-24.147 24.147z"></path>
		</symbol>
		<symbol id="arrow_down_large2" viewbox="0 0 53 32">
			<path d="M26.667 29.72l-24.627-24.613 1.893-1.88 22.733 22.72 22.733-22.72 1.893 1.88-24.627 24.613z"></path>
		</symbol>
		<symbol id="arrow_down_large3" viewbox="0 0 53 32">
			<path d="M26.667 30.28l-25.56-25.56 3.773-3.773 21.787 21.787 21.787-21.787 3.773 3.773-25.56 25.56z"></path>
		</symbol>
		<symbol id="arrow_bottom" viewbox="0 0 14 30">
			<path d="m0,0h6v26h-1v-1h-1v-1h-1v-1h-1v-1h-2zm8,0h6v22h-2v1h-1v1h-1v1h-1v1h-1zm-5,21h-1v1h1zm9,0h-1v1h1zm-7,2h-1v1h1zm5,0h-1v1h1zm-10,1h1v1h1v1h1v1h1v1h1v1h1v1h-6zm13,0h1v6h-6v-1h1v-1h1v-1h1v-1h1v-1h1zm-11,2h-1v1h1zm11,0h-1v1h1zm-9,2h-1v1h1zm7,0h-1v1h1z" opacity="0"/>
			<path d="m6,0h2v26h1v-1h1v-1h1v-1h1v-1h2v2h-1v1h-1v1h-1v1h-1v1h-1v1h-1v1h-2v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1v-2h2v1h1v1h1v1h1v1h1z"/>
			<path d="m2,21h1v1h-1zm9,0h1v1h-1zm-7,2h1v1h-1zm5,0h1v1h-1zm-8,3h1v1h-1zm11,0h1v1h-1zm-9,2h1v1h-1zm7,0h1v1h-1z" fill="#aaa" opacity="0"/>
		</symbol>
		<symbol id="arrow_top" viewbox="0 0 14 30">
			<path d="m0 0h6v1h-1v1h-1v1h-1v1h-1v1h-1v1h-1zm4 1h-1v1h1zm4-1h6v6h-1v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1zm3 1h-1v1h1zm-9 2h-1v1h1zm11 0h-1v1h1zm-8 1h1v26h-6v-22h2v-1h1v-1h1v-1h1zm3 0h1v1h1v1h1v1h1v1h2v22h-6zm-3 2h-1v1h1zm5 0h-1v1h1zm-7 2h-1v1h1zm9 0h-1v1h1z" opacity="0"/>
			<path d="m6 0h2v1h1v1h1v1h1v1h1v1h1v1h1v2h-2v-1h-1v-1h-1v-1h-1v-1h-1v26h-2v-26h-1v1h-1v1h-1v1h-1v1h-2v-2h1v-1h1v-1h1v-1h1v-1h1v-1h1z"/>
			<path d="m3 1h1v1h-1zm7 0h1v1h-1zm-9 2h1v1h-1zm11 0h1v1h-1zm-8 3h1v1h-1zm5 0h1v1h-1zm-7 2h1v1h-1zm9 0h1v1h-1z" fill="#aaa" opacity="0"/>
		</symbol>
		<symbol id="arrow_btn" viewbox="0 0 30 8">
			<path d="m0 0h19v1h1v-1h1v1h1v1h1v1h1v1h1v1h1v1h-26zm24 0h6v6h-1v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1zm3 1h-1v1h1zm-5 1h-1v1h1zm7 1h-1v1h1z" opacity="0"/>
			<path d="m19 0h1v1h-1zm7 1h1v1h-1zm-5 1h1v1h-1z" fill="#aaa" opacity="0"/>
			<path d="m21 0h3v1h1v1h1v1h1v1h1v1h1v1h1v2h-30v-2h26v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1z"/>
			<path d="m28 3h1v1h-1z" opacity="0"/>
		</symbol>
		<symbol id="arrow_link" viewbox="0 0 120 14">
			<path d="m0,0h106v2h1v1h1v1h1v1h1v1h1v1h1v1h1v1h1v1h1v1h1v1h-116zm108,0h12v12h-1v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1z" opacity="0"/>
			<path d="m106,0h2v1h1v1h1v1h1v1h1v1h1v1h1v1h1v1h1v1h1v1h1v1h1v1h1v2h-120v-2h116v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1z"/>
		</symbol>
		<symbol id="svg_phone" viewBox="0 0 15.697 17.608">
  			<path d="M16.455,14.1v2.5a1.771,1.771,0,0,1-.479,1.235,1.377,1.377,0,0,1-1.131.432,13.6,13.6,0,0,1-6.377-2.559,15.453,15.453,0,0,1-4.433-5A17.891,17.891,0,0,1,1.766,3.483a1.8,1.8,0,0,1,.38-1.273,1.4,1.4,0,0,1,1.09-.543H5.453A1.545,1.545,0,0,1,6.931,3.1a11.812,11.812,0,0,0,.517,2.342A1.822,1.822,0,0,1,7.116,7.2L6.178,8.258a12.672,12.672,0,0,0,4.433,5l.938-1.058a1.358,1.358,0,0,1,1.559-.375,8.6,8.6,0,0,0,2.077.583A1.621,1.621,0,0,1,16.455,14.1Z" transform="translate(-1.26 -1.167)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
		</symbol>
		<symbol id="svg_tri_right" viewBox="0 0 256 256">
  			<path stroke="null" d="m98,206.3609l70.65,-79.68045l-70.65,-79.68045l0,159.3609z"/>
		</symbol>
		<symbol id="svg_mail" viewBox="0 0 256 256">
			<path stroke-width="16" stroke-linejoin="round" stroke-linecap="round" fill="none" d="m54.62754,45.4237l148.93411,0a19.97579,19.97579 0 0 1 18.61848,20.99035l0,125.96949a19.97579,19.97579 0 0 1 -18.61848,20.99035l-148.93411,0a19.97579,19.97579 0 0 1 -18.61848,-20.99035l0,-125.96949a19.97579,19.97579 0 0 1 18.61848,-20.99035z"/>
   			<path stroke-width="16" stroke-linejoin="round" stroke-linecap="round" fill="none" d="m222.16641,66.41404l-93.07868,73.48677l-93.07868,-73.48677"/>
		</symbol>
		
		<symbol id="svg_wechat" viewBox="0 0 256 256">
			<path d="m244.03335,140.10532a71.38135,71.38135 0 0 0 -30.99606,-35.63256a76.77983,76.77983 0 0 0 -76.50862,0.28413a70.3869,70.3869 0 0 0 -33.88903,47.12693a67.0419,67.0419 0 0 0 6.81913,44.80223a73.26695,73.26695 0 0 0 49.852,36.73034a81.85544,81.85544 0 0 0 43.49781,-3.22876c8.44643,3.68078 15.96297,9.66044 24.1511,14.09029c-2.11806,-7.9944 -4.37819,-15.8984 -6.78039,-23.77656a74.4293,74.4293 0 0 0 22.49798,-28.03852a67.82972,67.82972 0 0 0 1.35608,-52.35752zm-99.51028,-107.05266a91.21884,91.21884 0 0 0 -83.09528,-7.29699a87.04728,87.04728 0 0 0 -43.58822,38.68051a80.47353,80.47353 0 0 0 -8.00732,55.61211a85.11003,85.11003 0 0 0 32.71376,49.90366c-3.0092,9.60878 -5.86342,19.21756 -8.57558,28.89092c9.77668,-5.77302 19.55335,-11.79142 29.34294,-17.65484a97.53428,97.53428 0 0 0 36.70451,5.86342a78.123,78.123 0 0 1 -2.58301,-33.37243a73.61565,73.61565 0 0 1 19.99246,-40.19156a80.62851,80.62851 0 0 1 65.16923,-24.09944a84.98088,84.98088 0 0 0 -38.34471,-56.32243l0.27122,0l0,-0.01292l0,-0.00001zm17.38363,112.96774a9.49254,9.49254 0 0 1 -16.19544,3.97783a11.92057,11.92057 0 0 1 3.56455,-18.35225c7.36157,-3.49997 15.85965,6.07006 12.6309,14.37442l-0.00001,0zm48.08265,1.04612a9.49254,9.49254 0 0 1 -15.80799,3.04795a17.95189,17.95189 0 0 1 -3.44831,-8.2527c1.04612,-5.16601 4.2103,-10.55158 9.32465,-10.79696c7.06452,-1.11069 13.39288,8.74347 9.77668,16.01463l0.15498,0l0,-0.01292l-0.00001,0zm-71.75589,-72.99573a12.26928,12.26928 0 0 1 -20.00538,10.33202a14.76188,14.76188 0 0 1 3.39665,-23.86697a12.64381,12.64381 0 0 1 16.55706,13.4058l0,0.14207l0.05166,-0.01292l0.00001,0zm-60.70063,2.76382a11.98514,11.98514 0 0 1 -19.51461,7.67153a14.90394,14.90394 0 0 1 3.46123,-24.09944c8.69181,-3.80993 18.63638,6.21213 15.9888,16.42791l0.06458,0z"/>
		</symbol>
		<symbol id="svg_marrow_r" viewBox="0 0 256 256">
			<path stroke="null" d="m85,47l83.962,83.962l-83.962,83.962l41.17298,-83.962l-41.17298,-83.962z"/>
		</symbol>
		<symbol id="svg_newsarrow_r" viewBox="0 0 200 200">
			<circle class="fill_back" stroke="null" fill="#fff" r="90" cy="100" cx="100" />
			<path class="fill_front" stroke="null" fill="#866a34" d="m131.75072,102.38486l-42.85832,42.85832l-12.76631,-12.76631l30.09201,-30.09201l-30.09201,-30.09201l12.76631,-12.76631l42.85832,42.85832z"/>
  		</symbol>
	</defs>
</svg>
<!-- Loading Animation -->

<div id="loader-wrapper"><div id="loader"></div></div>
<?php wp_body_open(); ?>
<header>
	<div class="sp_bottom_bar">
		<a href="tel:+072-983-0202"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sp-phone-icon.svg"></a>
		<a href="mailto:tomorrowland.gp@gmail.com"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sp-mail-icon.svg"></a>
		<div class="logo_a"><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/menu-logo.svg"></a></div>
		<div id="bottom_ham"><div class="bham_btn"><span class="bham_icon"></span></div></div>
	</div>
	<div class="<?php echo is_home()?'header_bar pg1':'header_bar'; ?>" id="<?php echo is_home()?'menu-floating':''; ?>">
		<ul class="main_menu">
			<li>
				<div><a href="<?php echo get_site_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/menu-logo.svg"></a></div>
			</li>
			<li class="home_li">
				<div><a href="<?php echo get_site_url(); ?>" class="flowline_a">ホーム</a></div>
			</li>
			<li class="company_li">
				<div><a href="<?php echo get_site_url(); ?>/business" class="flowline_a">会社概要</a></div>
			</li>
			<li class="sell_li">
				<div><a href="<?php echo get_site_url(); ?>/service" class="flowline_a">買取・売却</a></div>
			</li>
			<li class="example_li">
				<div class="dropdown">
					<span>リフォーム事例</span>
					<div class="dropdown-content">
						<a href="<?php echo get_site_url(); ?>/reform" class="flowline_a">リフォーム事例</a>
						<a href="<?php echo get_site_url(); ?>/reform-content" class="flowline_a">リフォーム内容</a>
					</div>
				</div>
			</li>
			<li class="recommend_li">
				<div><a href="<?php echo get_site_url(); ?>/property" class="flowline_a">おすすめ物件紹介</a></div>
			</li>
			<li class="faq_li">
				<div><a href="<?php echo get_site_url(); ?>/faq" class="flowline_a"><span>FAQ</span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/faq-black.svg"></a></div>
			</li>
			<li>
				<div><a href="<?php echo get_site_url(); ?>/contact" class="contact_btn"><span>お問い合わせ</span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/menu-arrow-r.svg"></a></div>
			</li>
		</ul>
	</div><!-- /header_bar -->
	<div id="nav_btnwrapper"><div id="nav_btn"><span id="nav_btn_icon"></span></div></div>
	<nav>
		<div class="scroller">
			<div class="nav_sp_contents">
				<img class="sp_logo" src="<?php echo get_stylesheet_directory_uri(); ?>/images/menu-logo.svg">
				<div class="custom_row">
					<div class="menu_list">
						<ul>
							<li>
								<a href="<?php echo get_site_url(); ?>">ホーム</a>
							</li>
							<li>
								<a href="<?php echo get_site_url(); ?>/business">会社概要</a>
							</li>
							<li>
								<a href="<?php echo get_site_url(); ?>/service">買取・売却</a>
							</li>
							<li>
								<a href="<?php echo get_site_url(); ?>/reform">リフォーム事例</a>
							</li>
							<li>
								<a href="<?php echo get_site_url(); ?>/reform-content">リフォーム内容</a>
							</li>
							<li>
								<a href="<?php echo get_site_url(); ?>/property">おすすめ物件紹介</a>
							</li>
							<li>
								<a href="<?php echo get_site_url(); ?>/contact">FAQ</a>
							</li>
						</ul>
					</div>
				</div>
				<a href="<?php echo get_site_url(); ?>/contact" class="contact_btn"><span>お問い合わせ</span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/menu-arrow-r.svg"></a>
				<div class="sp_about">
					<div><a href="<?php echo get_site_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/menu-logo.svg"></a></div>
					<p>〒577-0034　大阪府東大阪市御厨南2–4-45-315</p>
					<a href="tel:+06-6753-8352">TEL：06-6753-8352</a>
					<p href="#">FAX：06-6753-8354</p>
					<a href="mailto:info@tomorrowland.com">Mail：info@tomorrowland.com</a>
				</div>
			</div>
		</div>
	</nav>
</header>
	
