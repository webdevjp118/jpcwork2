<?php
get_header();
global $wp_query;
$query = $wp_query;
?>
<?php
if ( $query->have_posts() ) :
    while ( $query->have_posts() ) :
        $query->the_post();
        $loop_id = get_the_id();
        $loop_title = get_the_title();
        $loop_content = get_the_excerpt();
        $loop_date = get_the_date('Y.m.d');
        $loop_permalink = get_the_permalink($loop_id);
        $loop_thumb_url = get_thumb_url($loop_id);
        $author_id = get_the_author_ID();
        $loop_author_name = get_the_author_meta('display_name', get_the_author_ID());
	endwhile;
endif;
?>
<!-- CONTAIN_START -->
<section id="contain">    	        
    <div class="container">
        <div class="pgtitle_block">
            <div class="pgtitle initani initani_wbk">
                <h1>BLOG</h1>
                <p>ブログ</p>
            </div>
        </div>
    </div>
    <div class="container">
		<div class="sblog_title">
			<h1><?php echo $loop_title; ?></h1>
		</div>
		<div class="hx3"></div>
		<div class="sblog_date">
			<p><?php echo $loop_date; ?></p>
		</div>
		<div class="hx8"></div>
		<div class="pmhwp">
			<?php echo the_content(); ?>
		</div>
		<div class="hx10"></div>
    </div>
</section>
<!-- CONTAIN_END -->
<?php
get_footer();
