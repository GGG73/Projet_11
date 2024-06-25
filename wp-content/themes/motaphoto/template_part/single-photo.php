<?php
/**
 * Template Name: Single Photo
 * Template Post Type: photo
 */

get_header(); ?>
<body>
    

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <?php
        // Start the loop
        while (have_posts()) :
            the_post();

            
            // Récupérer les champs ACF
            $reference = get_field('reference');
            $type = get_field('type');
            $annee = get_field('annee');

            // Récupérer l'URL de l'image mise en avant
            $image_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');

        ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h1><?php the_title(); ?></h1>
                <div class="entry-content">
                    <?php
                    // Afficher l'image mise en avant
                    if ($image_url) {
                        echo '<img src="' . esc_url($image_url) . '" alt="' . esc_attr(get_the_title()) . '">';
                    }

                    // Afficher les détails sous forme de tableau
                    if ($reference || $type || $annee) {
                        echo '<p>';
                        if ($reference) echo esc_html($reference) . '<br>';
                        if ($type) echo esc_html($type) . '<br>';
                        if ($annee) echo esc_html($annee);
                        echo '</p>';
                    }
                    ?>
                </div>
            </article>
        <?php
        // End the loop
        endwhile;
        ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
