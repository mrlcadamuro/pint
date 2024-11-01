
document.addEventListener("DOMContentLoaded", function() {    const produtoImg = document.querySelector('.produto-imagem img');
    
    if (produtoImg) {
        produtoImg.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.1)'; // Aumenta a imagem
            this.style.transition = 'transform 0.3s ease'; // Transição suave
        });
        
        produtoImg.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)'; // Retorna ao tamanho original
        });
    }
});
