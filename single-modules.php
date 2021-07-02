<?php get_header() ?>
<article class="container project">
    <picture class="project-featured">
        <img src="<?php the_field( 'image_article' ); ?>">
    </picture>
    <div class="project-summary">
        <h1 class="h2-like"><?php the_title(); ?></h1>
        <div class="project-summary-content">
            <p><?php the_excerpt(); ?></p>
        </div>
        <div class="project-summary-metadata">
            <ul class="category-list">
                <?php if( have_rows('category') ): while( have_rows('category') ) : the_row(); ?>
                    <li class="category-item">
                        <a href="#"><?php echo get_sub_field('category_item'); ?></a>
                    </li>
                <?php endwhile; endif; ?>
            </ul>
            <ul class="language-list">
                <?php if( have_rows('language') ): while( have_rows('language') ) : the_row(); ?>
                    <li class="category-item">
                        <a href="#"><?php echo get_sub_field('language_item'); ?></a>
                    </li>
                <?php endwhile; endif; ?>
            </ul>
        </div>
        <a href="<?php the_field( 'link_to_project' ); ?>" class="btn-secondary"><?php the_field('btn_article');?></a>
    </div>
    <div class="project-content">
        <h2 class="h3-like"><?php the_field( 'content_title' ); ?></h2>
        <p><?php the_content(); ?></p>
        <h2 class="h3-like"><?php the_field( 'image_title' ); ?></h2>
        <?php if( have_rows('img_content') ): while( have_rows('img_content') ) : the_row(); ?>
            <picture class="project-featured">
                <img src="<?php echo get_sub_field('image_preview'); ?>">
            </picture>
        <?php endwhile; endif; ?>
    </div>
</article>
<nav class="pagination" aria-label="Projects">
    <div class="container">
        <h2 class="screen-reader-text">Projects navigation</h2>
        <ul class="pagination-list">
            <li>
                <?php  
                if( get_adjacent_post(false, '', false) ) { 
                    next_post_link('%link', '%title<span>Previous Project</span>');
                } else { 
                    $last = new WP_Query('posts_per_page=1&order=ASC&post_type=modules'); $last->the_post();
                    echo '<a href="' . get_permalink() . '">'. get_the_title() .'<span>Previous Project</span></a>';
                    wp_reset_query();
                };  
                ?>
            </li>
            <li> 
                <?php 
                if( get_adjacent_post(false, '', true) ) { 
                    previous_post_link('%link', '%title<span>Next Project</span>');
                } else { 
                    $first = new WP_Query('posts_per_page=1&order=DESC&post_type=modules'); $first->the_post();
                    echo '<a href="' . get_permalink() . '">' . get_the_title() . '<span>Next Project</span></a>';
                    wp_reset_query();
                };  
                ?> 
            </li>
        </ul>
    </div>
</nav>
<?php get_footer() ?>