<?php
get_template_part('template_part/modal');

?>

<div id="lightbox" class="lightbox">
    <span class="close">&times;</span>
    <img class="lightbox-content" id="lightbox-img">
</div>

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