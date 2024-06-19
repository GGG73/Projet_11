<?php 

/**Template Name: Single */

get_header(); ?>

<div class="container">
<div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">


                        // Récupérer les champs ACF
                        $titre_photo_services = get_field('titre_photo_services');
                        $ref_photo_services = get_field('ref_photo_services');
      
        </main>
    </div>
</div>
<?php get_footer(); ?>

