<?php get_header(); ?>

<div class="filtre-container">
<form id="filter-form">
    <!-- Filtrer par type d'événement -->
    <label for="event-type">CATÉGORIES</label>
    <select id="event-type" name="event_type">
        <option value="mariage">Mariage</option>
        <option value="concert">Concert</option>
        <option value="television">Télévision</option>
        <option value="reception">Réception</option>
    </select>

    <!-- Filtrer par format de l'image -->
    <label for="image-format">FORMATS </label>
    <select id="image-format" name="image_format">
        <option value="paysage">Paysage</option>
        <option value="portrait">Portrait</option>
    </select>

    <!-- Trier par date -->
    <label for="sort-order">TRIER PAR</label>
    <select id="sort-order" name="sort_order">
        <option value="asc">À partir des plus récentes</option>
        <option value="desc">À partir des plus anciennes</option>
    </select>
</form>
</div>

Les photos seront ici.


<?php get_footer(); ?>