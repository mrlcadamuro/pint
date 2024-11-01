document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('search');
    const cards = document.querySelectorAll('#cards-container .card');

    // Função para filtrar produtos
    function filterProducts() {
        const searchValue = searchInput.value.toLowerCase();
        cards.forEach(card => {
            const productName = card.querySelector('.card-title').textContent.toLowerCase();
            if (productName.includes(searchValue)) {
                card.style.display = 'block'; // Mostra o card se corresponder à pesquisa
            } else {
                card.style.display = 'none'; // Esconde o card se não corresponder
            }
        });
    }

    // Adiciona evento de input para pesquisa em tempo real
    searchInput.addEventListener('input', filterProducts);

    // Evento de submit para o formulário
    const searchForm = document.getElementById('search-container').querySelector('form');
    searchForm.addEventListener('submit', function (event) {
        const searchValue = searchInput.value.trim();
        if (!searchValue) {
            event.preventDefault(); // Previne o envio do formulário
            alert('Por favor, insira um termo de busca.'); // Alerta se o campo de busca estiver vazio
        }
    });
});
