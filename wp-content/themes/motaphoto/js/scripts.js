//Menu burger max-width: 768px//

document.addEventListener('DOMContentLoaded', function() {
    var menuToggle = document.getElementById('menu-toggle');
    var navMenu = document.getElementById('site-navigation');

    menuToggle.addEventListener('click', function() {
        navMenu.classList.toggle('toggled');
    });
});


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Modale de contact Menu

document.addEventListener('DOMContentLoaded', (event) => {
    // Récupère la modale
    var modal = document.getElementById('myModal');

    // Récupère le bouton qui ouvre la modale
    var btn = document.getElementById('myBtn');

    // Récupère l'élément <span> qui ferme la modale
    var span = document.getElementsByClassName('close')[0];

   

    // Lorsque l'utilisateur clique sur le bouton, ouvre la modale
    if (btn) {
        btn.onclick = function() {
            modal.style.display = 'block';
        }
    }

    // Lorsque l'utilisateur clique sur <span> (x), ferme la modale
    if (span) {
        span.onclick = function() {
            modal.style.display = 'none';
        }
    }

    // Lorsque l'utilisateur clique n'importe où en dehors de la modale, ferme-la
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }
});



    document.getElementById('myBtn').onclick = function() {
    document.getElementById('myModal').style.display = 'block';
};

