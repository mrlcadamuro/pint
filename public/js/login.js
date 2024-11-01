document.addEventListener("DOMContentLoaded", function () {
    const infoText = document.querySelector(".info-text");
    const welcomeInfo = document.querySelector(".welcome-info");

    // Mensagens para interação
    const messages = [
        "Estamos prontos para transformar o seu ambiente!",
        "Navegue pelo site para conhecer nossos produtos.",
        "Não tem conta? Registre-se para mais benefícios.",
    ];

    let index = 0;

    // Troca a mensagem de boas-vindas a cada 5 segundos
    setInterval(() => {
        infoText.textContent = messages[index];
        index = (index + 1) % messages.length;
    }, 5000);

    // Adiciona interatividade ao campo de e-mail
    document.querySelector("input[name='email']").addEventListener("focus", () => {
        welcomeInfo.style.backgroundColor = "#e0f7fa";
    });

    document.querySelector("input[name='email']").addEventListener("blur", () => {
        welcomeInfo.style.backgroundColor = "transparent";
    });
});

// JavaScript para adicionar a animação de entrada
document.addEventListener("DOMContentLoaded", () => {
    const welcomeInfo = document.querySelector(".welcome-info");

    // Adiciona a classe de animação com um leve atraso para sincronizar com o login
    setTimeout(() => {
        welcomeInfo.classList.add("animate-left");
    }, 500); // O tempo de atraso pode ser ajustado conforme desejado
});
