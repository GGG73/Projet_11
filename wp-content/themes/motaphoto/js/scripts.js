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