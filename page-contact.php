<?php get_header() ?>
<main id="main-content">
		<div class="container">
        <h1 class="screen-reader-text"><?php the_title(); ?></h1>
			<section class="get-in-touch">
				<h2><?php the_field('contact_section_title');?></h2>
				<div class="get-in-touch-content">
					<p><?php the_content();?></p>
					<nav class="social-nav">
						<?php wp_nav_menu(
						array(
							'theme_location' => 'reseaux',
							'container' => '',
							'items_wrap' => '<ul class="menu">%3$s</ul>'
						));?>
					</nav>
				</div>
			</section>
            <?php echo do_shortcode('[contact-form-7 id="57" html_class="contact-form" title="Formulaire de contact"]')?>
        </div>
</main>
<?php get_footer() ?>