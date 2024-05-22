<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package luminouspa-new
 */

get_header();
?>
<main id="primary" class="site-main">



<div class="io fade upS" style="content:''; width:100%; height:300px; background-color:red; display:flex; justify-content:center; align-items:center">Test Div1</div>
<div class="io fade upS" style="content:''; width:100%; height:300px; background-color:green; display:flex; justify-content:center; align-items:center">Test Div2</div>
<div class="io fade upS" style="content:''; width:100%; height:300px; background-color:blue; display:flex; justify-content:center; align-items:center">Test Div3</div>
<div class="io fade upS" style="content:''; width:100%; height:300px; background-color:blue; display:flex; justify-content:center; align-items:center">Test Div4</div>
<div class="io fade upS" style="content:''; width:100%; height:300px; background-color:pupple; display:flex; justify-content:center; align-items:center">Test Div5</div>
<div class="io fade upS" style="content:''; width:100%; height:300px; background-color:cyan; display:flex; justify-content:center; align-items:center">
	<a href="<?php echo get_site_url(); ?>">Test Div6</a>
</div>
























</main><!-- #main -->
<?php
get_footer();
