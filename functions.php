<?php 
// Afficher menu dans wordpress
function montheme_supports()
{
    register_nav_menu('header', 'En tête du menu');
    register_nav_menu('footer', 'Pied de page');
}

add_action('after_setup_theme', 'montheme_supports');

// Afficher logo dans wordpress
add_theme_support( 'custom-logo' );
function themename_custom_logo_setup() { 
    $defaults = array( 
      'height' => 100, 
      'width' => 300, 
      'flex-height' => true, 
      'flex-width' => true, 
      'header-text' => array( 'site-title', 'site-description' ), 
      'unlink-homepage-logo' => false, 
    ); 
 
    add_theme_support( 'custom-logo', $defaults ); 
 } 
 add_action( 'after_setup_theme', 'themename_custom_logo_setup' );


// Ajout de la section contact au menu
function add_search_form($items, $args) {
    if($args->theme_location == 'header' ){
    $items .= '<li class="myBtn">'
            . 'CONTACT'
            . '</li>';
    }
  return $items;
}
add_filter('wp_nav_menu_items', 'add_search_form', 10, 2);

// Appeler le CSS
function theme_enqueue_style() {
  wp_enqueue_style('header-style', get_template_directory_uri() . '/style.css');
 }
add_action('wp_enqueue_scripts', 'theme_enqueue_style');

// Appeler le JS
function scripts() {
 wp_enqueue_script('script-name', get_stylesheet_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'scripts');