<?php
get_template_part('template_part/modal');

?>

<?php wp_footer(); ?>

</body>
<div>
    <?php
    // Affichage du menu de footer
    wp_nav_menu([
        'theme_location' => 'footer',
        'menu_id'        => 'footer-menu',
        'menu_class'     => 'footer-menu',
    ]);
    ?>
</div>

</html>