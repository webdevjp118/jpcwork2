<?php
get_header();
global $wp_query;
$query = $wp_query;
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
        <div class="pgblog_grid">
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
        $loop_author_id = get_the_author_ID();
        $loop_author_name = get_the_author_meta('display_name', $loop_author_id);
?>
            <div class="pgblog_cell">
                <a href="<?php echo $loop_permalink; ?>">
                    <div class="pgblog_cellin">
                        <div class="pgblog_img initani initani_wy anistart">
                            <img src="<?php echo $loop_thumb_url; ?>">
                        </div>
                        <div class="pgblog_date js_opac">
                            <p><?php echo $loop_date; ?></p>
                        </div>
                        <div class="pgblog_cap js_opac">
                            <h3><?php echo $loop_title; ?></h3>
                        </div>
                        <div class="pgblog_user js_opac"><?php echo $loop_author_name; ?></div>
                    </div>
                </a>
            </div>
<?php
    endwhile;
endif;
?>
        </div>
        <div class="hx8"></div>
        <div class="pgblog_pagination">
            <div class="pagination_wrap">
                <?php wp_pagenavi(array('query' => $query)); ?>
            </div>
        </div>
        <div class="hx12"></div>
    </div>
</section>
<!-- CONTAIN_END -->
<?php
get_footer();
