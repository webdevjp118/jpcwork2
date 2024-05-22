<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>
</div><!-- #content -->
<footer id="colophon" class="site-footer">
    <?php get_template_part( 'template-parts/footer/footer', 'widgets' ); ?>
    <div class="site-info">
        <div class="inner">
            <div class="footer-menu-1">
                <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <img src="/wp/wp-content/uploads/2019/11/logo-1-1.png" alt=""></a></p>
                <?php if ( has_nav_menu( 'footer' ) ) : ?>
                <nav class="footer-navigation" aria-label="<?php esc_attr_e( 'Footer Menu', 'twentynineteen' ); ?>">
                    <?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer',
							'menu_class'     => 'footer-menu',
							'depth'          => 1,
						)
					);
					?>
                </nav><!-- .footer-navigation -->
                <?php endif; ?>
            </div>
            <div class="footer-menu-2"><a href="/guide">入会のご案内</a><a href="/inquiry">お問い合わせ</a><a href="<?php echo get_site_url(); ?>/magazine/">イベントのご案内</a>
            </div>
        </div>
        <div class="copyright">&copy; Enthusiasm Local Creation Ventures</div>
    </div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>

</html>