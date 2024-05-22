<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="page-top-head">
            <div class="inner">
                <h2>レポート</h2>
            </div>
        </div>
			<div class="goback-list" ><div class="goback-list-wrap"><a href="/report">一覧へ戻る</a></div></div>
			<?php

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content/content', 'single' );

				if ( is_singular( 'attachment' ) ) {
					// Parent post navigation.
					the_post_navigation(
						array(
							/* translators: %s: parent post link */
							'prev_text' => sprintf( __( '<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'twentynineteen' ), '%title' ),
						)
					);
				} elseif ( is_singular( 'post' ) ) {
					// Previous/next post navigation.
					the_post_navigation(
						array(
							'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next Post', 'twentynineteen' ) . '</span> ' .
								'<span class="screen-reader-text">' . __( 'Next post:', 'twentynineteen' ) . '</span> <br/>' .
								'<span class="post-title">%title</span>',
							'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous Post', 'twentynineteen' ) . '</span> ' .
								'<span class="screen-reader-text">' . __( 'Previous post:', 'twentynineteen' ) . '</span> <br/>' .
								'<span class="post-title">%title</span>',
						)
					);
				}

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}

			endwhile; // End of the loop.
			?>
			<?php 
			global $prelink, $nextlink;
			$prelink = get_previous_post();
			$nextlink = get_next_post();
			?>
			<div class="nextlink-wrap">
			<?php if(!empty( $nextlink ) ): ?>
			<div class="single-next-link">
				<p>次のレポート</p>
				<?php next_post_link('%link', '%title'); ?>
				</div>
			<?php else: ?>
				<div></div>
			<?php endif; ?>
			<?php if(!empty( $prelink ) ): ?>
			<div class="single-pre-link">
				<p>前のレポート</p>
				<?php previous_post_link('%link', '%title'); ?>
				</div>
			<?php else: ?>
				<div></div>
			<?php endif; ?>
			</div>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
