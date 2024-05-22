<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
<!-- Bootstrap -->
<link href="<?php echo get_stylesheet_directory_uri(); ?>/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo get_stylesheet_directory_uri(); ?>/css/fontawesome_all.css" rel="stylesheet" type="text/css">
<link href="<?php echo get_stylesheet_directory_uri(); ?>/css/fonts.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://use.typekit.net/hrj3xmc.css">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
<link href="<?php echo get_stylesheet_directory_uri(); ?>/css/owl.carousel.css" rel="stylesheet">
<link href="<?php echo get_stylesheet_directory_uri(); ?>/css/owl.theme.default.css" rel="stylesheet">
<link href="<?php echo get_stylesheet_directory_uri(); ?>/css/stylesheet.css" rel="stylesheet" type="text/css">
<link href="<?php echo get_stylesheet_directory_uri(); ?>/css/loading.css" rel="stylesheet" type="text/css">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="site_loader_overlay"><div id="site_loader_animation" class="c-load--type2"></div></div>
<div class="wrapper">
<!-- HEADER_START -->
<header id="header" class="">
    <div class="header_set">
        <a class="header_logo">
            <img class="headlogo_white" src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_white.png">
            <img class="headlogo_green" src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_green.png">
        </a>
        <div class="header_menu">
            <a class="headmenu_a" href="<?php echo get_site_url(); ?>/">
                <div class="headmenu_shape">
                    <div class="headmenu_cap">Top</div>
                    <div class="headmenu_uline"></div>
                </div>
            </a>
            <a class="headmenu_a" href="<?php echo get_site_url(); ?>/about/">
                <div class="headmenu_shape">
                    <div class="headmenu_cap">About Us</div>
                    <div class="headmenu_uline"></div>
                </div>
            </a>
            <a class="headmenu_a" href="<?php echo get_site_url(); ?>/service/">
                <div class="headmenu_shape">
                    <div class="headmenu_cap">Service</div>
                    <div class="headmenu_uline"></div>
                </div>
            </a>
            <a class="headmenu_a" href="<?php echo get_site_url(); ?>/recruit/">
                <div class="headmenu_shape">
                    <div class="headmenu_cap">Recruit</div>
                    <div class="headmenu_uline"></div>
                </div>
            </a>
            <a class="headmenu_a headmenu_contact" href="<?php echo get_site_url(); ?>/contact">
                <div class="headmenu_shape">
                    <div class="headmenu_cap">お問い合わせ</div>
                </div>
            </a>
        </div>
        <div class="hamburger_set js_hamburger">
            <a href="javascript:void(0)">
                <div class="hamburger_btn">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </a>
        </div>
    </div>
</header>
<!-- HEADER_END -->