// main.js

// Aguarda o carregamento completo do DOM
document.addEventListener('DOMContentLoaded', function () {
    // Seleciona o botão de toggler e a lista de navegação
    const toggler = document.querySelector('.navbar-toggler');
    const navbarNav = document.getElementById('navbarNav');

    // Adiciona um evento de clique ao botão de toggler
    toggler.addEventListener('click', function () {
        // Alterna a classe 'show' na lista de navegação ao clicar no botão
        navbarNav.classList.toggle('show');
    });

    // Seleciona todos os links de navegação
    const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
    
    // Adiciona evento de mouseover e mouseout aos links
    navLinks.forEach(link => {
        link.addEventListener('mouseover', function () {
            this.style.color = '#FFD700'; // Muda a cor quando o mouse está sobre
        });
        link.addEventListener('mouseout', function () {
            this.style.color = ''; // Retorna à cor original quando o mouse sai
        });
    });
});
