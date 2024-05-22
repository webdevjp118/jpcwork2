<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package paralysis
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/slick.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/responsive.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/pmhwp.css">
<script>
	(function(d) {
		var config = {
			kitId: 'rex5kal',
			scriptTimeout: 3000,
			async: true
		},
		h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
	})(document);

	(function(d) {
		var config = {
			kitId: 'vix5xiy',
			scriptTimeout: 3000,
			async: true
		},
		h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
	})(document);
</script>
</head>

<body <?php body_class(); ?>>
<div class="loader-wrapper"><div class="loader"></div></div>
<?php wp_body_open(); ?>
<div id="page" class="site">
	
<header class="site_header">
	<a class="header_logo" href="<?php echo get_site_url(); ?>/">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png">
	</a>
	<nav class="custom_navbar">
		<ul>
			<li>
				<a href="<?php echo get_site_url(); ?>/about">麻酔施術とは</a>
			</li>
			<li>
				<a href="<?php echo get_site_url(); ?>/search" class="find_salons_box">
					<svg xmlns="http://www.w3.org/2000/svg" width="10.461" height="10.455" viewBox="0 0 10.461 10.455">
						<g id="search" transform="translate(-5.993 -2.299)">
							<path id="Path_2008" data-name="Path 2008" d="M13.919,9.438a4.431,4.431,0,1,0-.781.781l.024.025,2.347,2.348a.554.554,0,1,0,.783-.783L13.944,9.461l-.025-.023ZM12.77,4.374a3.32,3.32,0,1,1-4.7,0,3.32,3.32,0,0,1,4.7,0Z" fill-rule="evenodd"/>
						</g>
					</svg>
					全国のサロンを探す
				</a>
			</li>
		</ul>
	</nav>
</header>
<div class="therapist_popup_section">
	<a class="therapist_btn paralysis_btn active_tab" href="<?php echo get_site_url(); ?>/search" data-tag="tab1">
		<span>サロンを探す</span>
		<span>全国の麻痺施術</span>
	</a>
	<a class="therapist_btn interested_btn" href="javascript:void(0);" data-tag="tab2">
		<span class="cpc9">フォ｜ム</span>
		<span class="csp9">フォーム</span>
		<span>お問い合わせ</span>
	</a>
	<div class="therapist_content paralysis_content tab_content_active" id="tab1">
		Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
	</div>
	<div class="therapist_content interested_content" id="tab2" style="display: none;">
		Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
	</div>
</div>
