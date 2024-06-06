<?php
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles() {
    //style du thème parent
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    //style du thème enfant
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'));
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

add_action( 'after_setup_theme', 'register_primary_menu' );
function register_primary_menu() {
    //Menu
	register_nav_menu( 'primary', __( 'Primary Menu', 'theme-text-domain' ) );
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

add_action('wp_enqueue_scripts', 'enqueue_child_theme_scripts');
function enqueue_child_theme_scripts() {
    //script js
    wp_enqueue_script('child-script', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery'), null, true);
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//Page administration, reglage thème enfant
function Nathalie_Mota_Photo_add_admin_pages() {
    add_menu_page('Paramètre du thème Nathalie_Mota_Photo', 'Nathalie_Mota_Photo', 'manage_options', 'motaphoto-settings', 'motaphoto_theme_settings', 'dashicons-admin-settings', 60);
}

function motaphoto_theme_settings() {
    echo '<h1>' . get_admin_page_title() . '</h1>';
}

add_action('admin_menu', 'Nathalie_Mota_Photo_add_admin_pages');
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


?>