<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<nav class="skip-links">
		<ul>
			<li><a href="#menu">Skip to main menu</a></li>
			<li><a href="#main-content">Skip to main content</a></li>
		</ul>
	</nav>

	<header class="site-header">
		<div class="container">
			<a href="<?php echo home_url( '/' ); ?>" class="logo">
				<picture>
					<img class='style-svg' src="<?php the_field('logo_website','option') ?>">
				</picture>
				<span class="screen-reader-text"><?php bloginfo('name'); ?></span>
			</a>
			<nav class="main-nav"role="navigation" aria-label="Menu principal">
				<button aria-expanded="false" aria-controls="menu" aria-label="Toggle menu">
					<span class="bar"></span>
					<span class="bar"></span>
					<span class="bar"></span>
				</button>
				<?php wp_nav_menu(
                    array(
                        'theme_location' => 'primary',
                        'container' => '',
                        'items_wrap' => '<ul id="menu" class="menu" hidden>%3$s</ul>'
                    ));?>
			</nav>
		</div>
	</header>

	<main id="main-content">
    <?php wp_body_open(); ?>

