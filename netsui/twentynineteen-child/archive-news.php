<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>
<section id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php if ( have_posts() ) : ?>
        <header class="page-header">
            <?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
			?>
        </header><!-- .page-header -->
        <div class="page-top-head">
            <div class="inner">
                <h2>お知らせ</h2>
            </div>
        </div>
        <div class="flex-side">
            <div class="news-list">
            <?php
			$i = 0;
			// Start the Loop.
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content/content', 'excerpt' );

				// End the loop.
			endwhile;

			// Previous/next page navigation.
			//twentynineteen_the_posts_navigation();
			my_page_navi();

			// If no content, include the "No posts found" template.
			else :
			get_template_part( 'template-parts/content/content', 'none' );

			endif;
			?>
            </div>
				<div class="sidebar">
                <?php
					if ( is_active_sidebar( 'sidebar' ) ) {
  						dynamic_sidebar( 'sidebar' );
					}
				?>
            </div>
        </div>
    </main><!-- #main -->
</section><!-- #primary -->
<?php
get_footer();