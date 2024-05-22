<ul class="report-items">
<?php
	$wp_query = new WP_Query();
	$my_posts = array(
		'post_type' => 'report',
		'posts_per_page'=> '4',
	);
	$wp_query->query( $my_posts );
	if( $wp_query->have_posts() ): while( $wp_query->have_posts() ) : $wp_query->the_post();
?>
	<li>
		<a class="report-item-img" href="<?php the_permalink(); ?>"><img src="<?php echo catch_that_image(); ?>" /></a>
		<a class="report-item-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		<?php the_excerpt(); ?>
	</li>
<?php endwhile; endif; wp_reset_postdata(); ?>
</ul>