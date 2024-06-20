<?php get_header(); ?>

<div class="filtre-container">
    <form id="filter-form">
        <!-- Filtrer par catégories -->
        <label for="event-type">Catégories</label>
        <select id="event-type" name="event_type">
            <option value=""></option>
            <?php
            $terms = get_terms(array(
                'taxonomy' => 'categorie',
                'hide_empty' => false,
            ));

            foreach ($terms as $term) {
                echo '<option value="' . esc_attr($term->slug) . '">' . esc_html($term->name) . '</option>';
            }
            ?>
        </select>

        <!-- Filtrer par formats -->
        <label for="image-format">Formats</label>
        <select id="image-format" name="image_format">
            <option value=""></option>
            <?php
            $format_terms = get_terms(array(
                'taxonomy' => 'format',
                'hide_empty' => false,
            ));

            foreach ($format_terms as $format) {
                echo '<option value="' . esc_attr($format->slug) . '">' . esc_html($format->name) . '</option>';
            }
            ?>
        </select>

        <!-- Trier par date -->
        <label for="sort-order">Trier par</label>
        <select id="sort-order" name="sort_order">
            <option value="desc">À partir des plus récentes</option>
            <option value="asc">À partir des plus anciennes</option>
        </select>
    </form>
</div>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="photo-grid">
            <?php
            $args = array(
                'post_type' => 'photo',
                'posts_per_page' => 8, // Limite à 8 articles par page
            );

            // Filtrer par catégorie (taxonomie 'categorie')
            if (isset($_GET['event_type']) && !empty($_GET['event_type'])) {
                $args['tax_query'] = array(
                    array(
                        'taxonomy' => 'categorie',
                        'field' => 'slug',
                        'terms' => sanitize_text_field($_GET['event_type']),
                    ),
                );
            }

            // Filtrer par format d'image (taxonomie 'format')
            if (isset($_GET['image_format']) && !empty($_GET['image_format'])) {
                $args['tax_query'][] = array(
                    'taxonomy' => 'format',
                    'field' => 'slug',
                    'terms' => sanitize_text_field($_GET['image_format']),
                );
            }

            // Trier par date
            if (isset($_GET['sort_order']) && $_GET['sort_order'] == 'asc') {
                $args['order'] = 'ASC';
            } else {
                $args['order'] = 'DESC';
            }

            $query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    $image_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                    if ($image_url) :
            ?>
                        <a href="<?php the_permalink(); ?>" class="photo-item">
                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                        </a>
            <?php
                    endif;
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>Aucune photo trouvée.</p>';
            endif;
            ?>
        </div><!-- .photo-grid -->
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
