<?php get_header(); ?>

<?php
    $hero_image_id = get_theme_mod('hero_image');
    if ($hero_image_id) :
        $hero_image_url = wp_get_attachment_url($hero_image_id);
    ?>
        <div class="hero" style="background-image: url('<?php echo esc_url($hero_image_url); ?>');">
            <div class="hero-content">
                <!-- Ajoutez ici le Titre à superposer à l'image hero MAIS PAS EN DUR -->
                <h1>PHOTOGRAPHE EVENT</h1>
            </div>
        </div>
    <?php endif; ?>



<?php get_footer(); ?>