<?php wp_footer(); ?>
</main>

<footer class="main-footer">

    <?php if (!!!is_page('8')) : the_post();?>
    <div class="top-footer container">
        <p class="h2-like top-footer-title"><?php the_field( 'top_footer_title', 'option' ); ?></p>
        <hr class="top-footer-separator">
        <a href="<?php echo get_page_link('8'); ?>" class="btn-secondary"><?php the_field( 'top_footer_text_button', 'option' ); ?></a>
    </div>
    <?php endif ?>
    <div class="bottom-footer">
        <div class="container">
            <a href="<?php echo home_url( '/' ); ?>" class="logo">
                <picture>
					<img class='style-svg' src="<?php the_field('logo_website_footer','option') ?>">
				</picture>
                <span class="screen-reader-text"><?php bloginfo('name'); ?></span>
            </a>
            <nav class="footer-nav">
                <?php wp_nav_menu(
                    array(
                        'theme_location' => 'secondary',
                        'container' => '',
                        'items_wrap' => '<ul class="menu">%3$s</ul>'
                    ));?>
            </nav>
            <nav class="social-nav">
                <?php wp_nav_menu(
                    array(
                        'theme_location' => 'reseaux',
                        'container' => '',
                        'items_wrap' => '<ul class="menu">%3$s</ul>'
                    ));?>
            </nav>
        </div>
    </div>
</footer>

</body>

</html>