function menuShow() {
    let menuResponsivo = document.querySelector('.menu-responsivo');
    
    if (menuResponsivo.classList.contains('open')) {
        menuResponsivo.classList.remove('open');
        document.querySelector('.icon').src = "../assets/img/menu_white_36dp.svg";
    } else {
        menuResponsivo.classList.add('open');
        document.querySelector('.icon').src = "../assets/img/close_white_36dp.svg"
    }
}