<?php
function Nathalie_Mota_Photo_supports (){
    //Logo
    add_theme_support('custom-logo');
}
add_action('after_setup_theme', 'Nathalie_Mota_Photo_supports');

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function theme_enqueue_styles() {  
    //style du thème enfant
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function register_primary_menu() {
    //Menu
	register_nav_menu( 'primary', __( 'Primary Menu', 'theme-text-domain' ) );
    register_nav_menu( 'footer', __( 'Footer Menu', 'theme-text-domain' ) );
}
add_action( 'after_setup_theme', 'register_primary_menu');

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function enqueue_child_theme_scripts() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('child-script', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_child_theme_scripts');


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Image hero header

function theme_customizer_settings($wp_customize) {
    // Ajout d'une section pour l'image hero
    $wp_customize->add_section('hero_section', array(
        'title'    => __('Image Hero', 'theme-text-domain'),
        'priority' => 30,
    ));

    // Ajout du contrôle pour l'image hero
    $wp_customize->add_setting('hero_image', array(
        'default' => '',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'hero_image', array(
        'label'    => __('Image Hero', 'theme-text-domain'),
        'section'  => 'hero_section',
        'mime_type' => 'image',
    )));

    // Ajout d'un paramètre et d'un contrôle pour le titre de l'image hero
    $wp_customize->add_setting('hero_title', array(
        'default' => __('PHOTOGRAPHE EVENT', 'theme-text-domain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_title', array(
        'label'    => __('Titre de l\'image Hero', 'theme-text-domain'),
        'section'  => 'hero_section',
        'type'     => 'text',
    ));
}
add_action('customize_register', 'theme_customizer_settings');


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Polices Poppins et Space Mono
function enqueue_google_fonts() {
    // Préconnecter aux serveurs Google Fonts
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';

    // Inclure les polices Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;500&family=Space+Mono:ital,wght@1,400;1,700&display=swap', [], null);
}
add_action('wp_head', 'enqueue_google_fonts');

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// AJAX
add_action('wp_ajax_custom_filter_photos', 'custom_filter_photos');
add_action('wp_ajax_nopriv_custom_filter_photos', 'custom_filter_photos');
function custom_filter_photos() {
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
        ob_start(); // Début du tampon de sortie

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

        $output = ob_get_clean(); // Récupérer le contenu du tampon de sortie
        echo $output; // Envoyer le contenu en réponse AJAX
    else :
        echo '<p>Aucune photo trouvée.</p>';
    endif;

    wp_die(); // Terminer le processus WordPress
}



?>