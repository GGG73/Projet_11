<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
/** Template Name: Single */
/** Template Post Type: photo */
    get_header(); ?>


<div id="primary" class="content-area">
    <main id="main" class="site-main">
    <?php get_template_part('content'); ?>

        <?php
        // Start the loop
        while (have_posts()) :
            the_post();

            // Récupérer les champs ACF
            $references = get_field('references');
            $type = get_field('type');
            $annee = get_field('annee');

            // Récupérer l'URL de l'image mise en avant
            $image_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
        ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
             
                    <?php the_title('<h1>', '</h1>'); ?>
               

                <div class="entry-content">
                    <?php
                    // Afficher l'image mise en avant
                    if ($image_url) {
                        echo '<img src="' . esc_url($image_url) . '" alt="' . esc_attr(get_the_title()) . '">';
                    }

                    // Afficher les détails sous forme de tableau
                    if ($references || $type || $annee) {
                    
                        if ($references) echo '<p>,</p> ' . esc_html($references) . '<br>';
                        if ($type) echo '<p>,p> ' . esc_html($type) . '<br>';
                        if ($annee) echo '<p>,</p> ' . esc_html($annee);
                        echo '</p>';
                    }
                    ?>
                </div>
            </article>
            <?php
        // End the loop
        endwhile;
        ?> 

<?php get_footer(); ?>

