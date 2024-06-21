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


