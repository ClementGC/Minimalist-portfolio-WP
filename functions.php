<?php 
/*Theme initialisation*/
function dwwm_setup_theme() {
    // Ajouter la prise en charge des images mises en avant
    add_theme_support( 'post-thumbnails' );

    // Ajouter automatiquement le titre du site dans l'en-tête du site
    add_theme_support( 'title-tag' );

    // Menu
    register_nav_menus(
        array(
            'primary' => 'Main Nav',
            'secondary' => 'Secondary Nav',
            'reseaux' => 'Réseaux'
        )
        ); 
}
add_action('after_setup_theme', 'dwwm_setup_theme');

function project_enqueue() {
    wp_enqueue_style('base', get_template_directory_uri().'/css/base.css');
    wp_enqueue_style('style', get_template_directory_uri().'/css/style.css',['base']);

    wp_enqueue_script('jquery');
    wp_enqueue_script('nav', get_template_directory_uri().'/js/navigation.js', array('jquery'), false, true);
}
add_action('wp_enqueue_scripts','project_enqueue');

add_action( 'wp_enqueue_scripts', 'enqueue_load_fa' );
function enqueue_load_fa() {
wp_enqueue_style( 'load-fa', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css' );
}

// function firstwd_enqueue() {
//     if (is_page('contact')) {
//         wp_enqueue_script('jquery');
//         wp_enqueue_script('form-validation', get_template_directory_uri().'/js/form-validation.js', array('jquery'), false, true);
//     }
// }
// add_action('wp_enqueue_scripts','firstwd_enqueue');
// fonction pour le script de validation du formulaire qui n'est pas utilisé , il y a déjà l'extention ContactForm7

function module() {
	
    // CPT Portfolio
    $labels = array(
        'name' => 'Portfolio',
        'all_items' => 'Tous les projets',  // affiché dans le sous menu
        'singular_name' => 'Portfolio',
        'add_new_item' => 'Ajouter un projet',
        'edit_item' => 'Modifier le projet',
        'menu_name' => 'Portfolio'
    );

	$args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'has_archive' => true,
        'supports' => array( 'title', 'editor','thumbnail', 'excerpt' ),
        'rewrite' => array('slug' => 'portfolio'),
        'menu_position' => 5, 
        'menu_icon' => 'dashicons-book',
	);

	register_post_type( 'modules', $args );
}
add_action( 'init', 'module' ); 

function my_acf_op_init() {

    if ( function_exists('acf_add_options_page') ) {
    
        $option_page = acf_add_options_page(array(
            'page_title' => 'Réglages généraux',
            'menu_title' => 'Réglages',
            'menu_slug' => 'theme-general-settings',
        ));
    }
}
add_action('acf/init', 'my_acf_op_init');

/* Masquer le menu des articles car il n'est pas utilisé */
function remove_posts_menu() {
    remove_menu_page('edit.php');
}
add_action('admin_menu', 'remove_posts_menu');

function set_posts_per_page_cpt( $query ) {
    if ( !is_admin() && $query->is_main_query() && is_post_type_archive( 'modules' ) ) {
      $query->set( 'posts_per_page', '4' );
    }
}
add_action( 'pre_get_posts', 'set_posts_per_page_cpt' );

/* Masquer les erreurs de connexion à l'administration */
add_filter('login_errors', 'wpm_hide_errors');

function wpm_hide_errors() {
	// On retourne notre propre phrase d'erreur
	return "L'identifiant ou le mot de passe est incorrect";
}