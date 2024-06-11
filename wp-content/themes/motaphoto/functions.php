<?php
function Nathalie_Mota_Photo_supports (){
    //Logo
    add_theme_support('custom-logo');
}
add_action('after_setup_theme', 'Nathalie_Mota_Photo_supports');

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function theme_enqueue_styles() {  
    //style du thème enfant
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function register_primary_menu() {
    //Menu
	register_nav_menu( 'primary', __( 'Primary Menu', 'theme-text-domain' ) );
    register_nav_menu( 'footer', __( 'Footer Menu', 'theme-text-domain' ) );
}
add_action( 'after_setup_theme', 'register_primary_menu');

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function enqueue_child_theme_scripts() {
    //script js
    wp_enqueue_script('child-script', get_stylesheet_directory_uri() . '/js/scripts.js');
}
add_action('wp_enqueue_scripts', 'enqueue_child_theme_scripts');

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


?>