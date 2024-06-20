<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php if (has_site_icon()) : ?>
        <link rel="icon" href="<?php echo esc_url(get_site_icon_url()); /*Icone site*/?>">
    <?php endif; ?>
    <?php wp_head() /*Bar administrateur WP*/?>
</head>
    <header id="masthead" class="site-header"><!-- #masthead -->
        <div class="site">
            <?php
            if (function_exists('the_custom_logo')) {
                the_custom_logo();/*Logo Nathalie Mota*/
            }
            ?>                     
        

        <!--Menu mobile-->
        <div class="menu-toggle" id="menu-toggle">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <nav id="site-navigation" class="main-navigation"><!--site-navigation -->
            <?php /*Menu header et footer*/
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_id'        => 'primary-menu',
            )); 
            ?>
       
           
        </nav>
        </div>



<?php
$hero_title = get_theme_mod('hero_title', __('PHOTOGRAPHE EVENT', 'theme-text-domain'));/*Titre hero header*/

// Initialisation d'un tableau pour stocker les URLs des images mises en avant
$hero_images = array();

// Arguments de la requête WP_Query pour récupérer tous les articles de type 'photo'
$args = array(
    'post_type' => 'photo',
    'posts_per_page' => -1, // Récupérer tous les articles
);

$query = new WP_Query($args);

if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();

        // Récupérer l'URL de l'image mise en avant
        $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); // 'full' est la taille de l'image

        if ($image_url) {
            // Ajouter l'URL de l'image au tableau $hero_images
            $hero_images[] = $image_url;
        }
    }

    // Réinitialisation de la requête WP_Query
    wp_reset_postdata();
}

// Mélanger le tableau $hero_images pour obtenir un ordre aléatoire
shuffle($hero_images);

// Vérifier s'il y a au moins une image dans $hero_images
if (!empty($hero_images)) {
    // Utiliser la première image (aléatoire) pour le hero header
    $hero_image_url = $hero_images[0];}
?>


        <div class="hero" style="background-image: url('<?php echo esc_url($hero_image_url); ?>');">
            <div class="hero-content">
                <!-- Affiche le titre récupéré depuis le Customizer -->
                <h1><?php echo esc_html($hero_title); ?></h1>
            </div>
        </div>


        
    </header>
<body>