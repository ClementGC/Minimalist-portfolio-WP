<?php get_header() ?>
<section class="hero">
    <div class="container">
        <picture class="hero-illustration">
            <?php the_post_thumbnail(); ?>
        </picture>
        <div class="hero-content">
            <h1 class="hero-title"><?php bloginfo('description'); ?></h1>
            <a href="#about" class="btn-primary"><?php the_field( 'texte_bouton_hero' ); ?></a>
        </div>
    </div>
</section>
<section class="about" id="about">
    <div class="container">
        <picture class="about-illustration">
            <img src="<?php the_field( 'image_section' ); ?>">
        </picture>
        <div class="about-content">
            <h2><?php the_field( 'section_title' ); ?></h2>
            <p><?php the_field( 'section_text' ); ?></p>
            <a href="<?php echo get_post_type_archive_link( 'modules' ); ?>" class="btn-secondary"><?php the_field( 'texte_bouton_section' ); ?></a>
        </div>
    </div>
</section>

<?php get_footer() ?>