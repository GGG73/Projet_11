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
        <button id="myBtn"><p>CONTACT</p></button>
            <div id="myModal" class="modal">
            <div class="modal-content">
            <span class="close">x</span>
             
            <?php $image_url = get_stylesheet_directory_uri() . '/assets/Contact-header.png'; ?>
            <img src="<?php echo esc_url($image_url); ?>" alt="Bannière de contact">
            
            <?php echo do_shortcode('[contact-form-7 id="529fc27" title="Modale Contact"]') ?>
            </div>
            </div>
        </nav>
        </div>



<?php
    $hero_image_id = get_theme_mod('hero_image');/*Image hero header*/
    $hero_title = get_theme_mod('hero_title', __('PHOTOGRAPHE EVENT', 'theme-text-domain'));/*Titre hero header*/

    if ($hero_image_id) :
        $hero_image_url = wp_get_attachment_url($hero_image_id);
?>
        <div class="hero" style="background-image: url('<?php echo esc_url($hero_image_url); ?>');">
            <div class="hero-content">
                <!-- Affiche le titre récupéré depuis le Customizer -->
                <h1><?php echo esc_html($hero_title); ?></h1>
            </div>
        </div>
<?php endif; ?>

        
    </header>
<body>