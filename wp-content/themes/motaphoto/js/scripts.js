//Menu burger max-width: 768px//

document.addEventListener('DOMContentLoaded', function() {
    let menuToggle = document.getElementById('menu-toggle');
    let navMenu = document.getElementById('site-navigation');

    menuToggle.addEventListener('click', function() {
        navMenu.classList.toggle('toggled');
    });
});


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Modale de contact Menu

document.addEventListener('DOMContentLoaded', function() {
    let modal = document.getElementById('myModal');
    let btn = document.getElementById('menu-item-144');

    if (btn) {
        btn.onclick = function() {
            modal.style.display = 'block';
        };

        window.onclick = function(event) {
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        };
    }
});


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Traiter la requête AJAX pour mettre à jour le contenu

jQuery(function($) {
    $('#filter-form').on('change', 'select', function() {
        var formData = $('#filter-form').serialize();
        
        $.ajax({
            url: ajax_object.ajaxurl, // URL de l'action AJAX définie par WordPress
            type: 'GET',
            data: formData + '&action=custom_filter_photos', // Ajoutez l'action et les données du formulaire
            beforeSend: function() {},
            success: function(response) {
                // Mettre à jour la grille de photos avec les nouveaux résultats
                $('.photo-grid').html(response);
            },
            error: function() {
                // Gérer les erreurs si nécessaire
                $('.photo-grid').html('<p>Une erreur est survenue.</p>');
            }
        });
    });
});


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Affiché la lightbox suite au clic sur le logo plein ecran dans la photo 
jQuery(function($) {
    function attachLightboxEvents() {
        let lightbox = document.getElementById('lightbox');
        let lightboxImg = document.getElementById('lightbox-img');
        let closeBtn = document.querySelector('.close');
        let fullscreenIcons = document.querySelectorAll('.fullscreen-icon');

        fullscreenIcons.forEach(function(icon) {
            icon.addEventListener('click', function(event) {
                event.preventDefault();
                lightbox.style.display = 'flex';
                lightboxImg.src = this.getAttribute('href');
            });
        });

        closeBtn.addEventListener('click', function() {
            lightbox.style.display = 'none';
        });

        lightbox.addEventListener('click', function(event) {
            if (event.target === lightbox) {
                lightbox.style.display = 'none';
            }
        });
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//AJAX pour inclure une réinitialisation des événements de clic après chaque mise à jour de la grille de photos.

    $('#filter-form').on('change', 'select', function() {
        var formData = $('#filter-form').serialize();
        
        $.ajax({
            url: ajax_object.ajaxurl, // URL de l'action AJAX définie par WordPress
            type: 'GET',
            data: formData + '&action=custom_filter_photos', // Ajoutez l'action et les données du formulaire
            beforeSend: function() {},
            success: function(response) {
                // Mettre à jour la grille de photos avec les nouveaux résultats
                $('.photo-grid').html(response);

                // Réattacher les événements de clic pour la lightbox
                attachLightboxEvents();
            },
            error: function() {
                // Gérer les erreurs si nécessaire
                $('.photo-grid').html('<p>Une erreur est survenue.</p>');
            }
        });
    });

    // Initial attachment of events
    attachLightboxEvents();
});



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Script icnoe info --> Single Page

jQuery(document).ready(function($) {
    $('.info-icon').click(function(e) {
        e.preventDefault(); // Empêche le comportement par défaut du lien
        var permalink = $(this).data('permalink');
        window.location.href = permalink;
    });
});


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Affiché 8 photos supplémentaire

jQuery(function($) {
    let page = 1; // Compteur de page pour le chargement des photos suivantes
    const perPage = 8; // Nombre de photos par page

    $('#load-more-button').on('click', function(e) {
        e.preventDefault();

        // Données à envoyer via AJAX (page suivante et filtres actuels)
        let formData = $('#filter-form').serialize(); // Récupérer les filtres actuels
        formData += '&page=' + page; // Ajouter la page suivante à envoyer

        $.ajax({
            url: ajax_object.ajaxurl,
            type: 'GET',
            data: formData + '&action=custom_filter_photos', // Action personnalisée pour le filtrage des photos
            beforeSend: function() {
                // Ajouter ici un indicateur de chargement si nécessaire
                $('#load-more-button').attr('disabled', true).text('Chargement en cours...');
            },
            success: function(response) {
                // Ajouter les nouvelles photos à la grille existante
                $('.photo-grid').append(response);

                // Réactiver le bouton "Charger plus" et augmenter le compteur de page
                $('#load-more-button').attr('disabled', false).text('Charger plus');
                page++;
            },
            error: function() {
                // Gérer les erreurs si nécessaire
                $('.photo-grid').html('<p>Une erreur est survenue.</p>');
            }
        });
    });
});
