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
        </div>
        <!--Menu mobile-->
        <div class="menu-toggle" id="menu-toggle">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <nav id="site-navigation" class="main-navigation"><!--site-navigation -->
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_id'        => 'primary-menu',
            )); /*Menu header et footer*/
            ?>
            <p>CONTACT</p>
        </nav>
        
    </header>
<body>