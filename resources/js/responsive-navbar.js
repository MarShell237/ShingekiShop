var toggle_menu = document.querySelector('.responsive-menu');
var menu = document.querySelector('.responsive-nav-bar');
toggle_menu.onclick = function(){
    toggle_menu.classList.toggle('active');
    menu.classList.toggle('responsive');
}

const p1 = document.querySelector('.acceuil ') 