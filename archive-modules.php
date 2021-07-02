<?php get_header(); ?>
<div class="container">
    <h1 class="screen-reader-text"><?php single_cat_title(); ?></h1>
    <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
        <article class="portfolio-item">
            <picture class="portfolio-item-illustration">
                <?php the_post_thumbnail(); ?>
            </picture>
            <div class="portfolio-item-content">
                <h2><?php the_title(); ?></h2>
                <p><?php the_excerpt(); ?></p>
                <a href="<?php the_permalink(); ?>" class="btn-secondary"><?php the_field( 'texte_bouton' ); ?></a>
            </div>
        </article>
    <?php endwhile; endif; ?>
    <nav class="pagination" aria-label="Projects">
        <div class="container">
            <h2 class="screen-reader-text">Portfolio navigation</h2>
            <ul class="pagination-list">
                <li><?php previous_posts_link('Previous Page'); ?></li>
                <li><?php next_posts_link('Next Page'); ?></li>
            </ul>
        </div>
	</nav>
</div>
<?php get_footer(); ?>