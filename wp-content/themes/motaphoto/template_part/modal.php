<?php
/**Template Name: Modal */
?>
<div id="myModal" class="modal">
    <div class="modal-content">
    <?php $image_url = get_stylesheet_directory_uri() . '/assets/Contact-header.png'; ?>
        <img src="<?php echo esc_url($image_url); ?>" alt="Bannière de contact">
        <?php echo do_shortcode('[contact-form-7 id="529fc27" title="Modale Contact"]') ?>
    </div>
</div>

