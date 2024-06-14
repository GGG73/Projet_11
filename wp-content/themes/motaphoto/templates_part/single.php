<?php get_header(); ?>

<div class="container">
<div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <?php
            while ( have_posts() ) : the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                   
                    <div class="entry-content">
                        <?php
                        // Récupérer les champs ACF
                        $titre_photo_services = get_field('titre_photo_services');
                        $ref_photo_services = get_field('ref_photo_services');
                        $categorie_photo_services = get_field('categorie_photo_services');
                        $format_photo_services = get_field('format_photo_services');
                        $type_photo_services = get_field('type_photo_services');
                        $annee_photo_services = get_field('annee_photo_services');
                        $separateur_photo_services = get_field('separateur_photo_services');
                        $contact_bouton_services = get_field('contact_bouton_services');
                        ?>

                        <h1><strong></strong> <?php echo esc_html($titre_photo_services); ?></h1>
                        <p><strong>Référence :</strong> <?php echo esc_html($ref_photo_services); ?></p>
                        <p><strong>Catégorie :</strong> <?php echo esc_html($categorie_photo_services); ?></p>
                        <p><strong>Format :</strong> <?php echo esc_html($format_photo_services); ?></p>
                        <p><strong>Type :</strong> <?php echo esc_html($type_photo_services); ?></p>
                        <p><strong>Année :</strong> <?php echo esc_html($annee_photo_services); ?></p>
                        <p><strong></strong> <?php echo esc_html($separateur_photo_services); ?></p>
                        <p><strong>Cette photo vous intéresse ? :</strong> <a href="<?php echo esc_url($contact_bouton_services); ?>">CONTACT</a></p>

                        <?php
                        // Vérifier si le champ de l'image est rempli
                        $image = get_field('photo_services');
                        if ($image) :
                        ?>
                            <figure>
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                <figcaption><?php echo esc_html($titre_photo_services); ?></figcaption>
                            </figure>
                        <?php endif; ?>
                    </div>

                </article>
                <?php
            endwhile;
            ?>
        </main>
    </div>
</div>
<?php get_footer(); ?>

