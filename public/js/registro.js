document.addEventListener("DOMContentLoaded", function () {
    const welcomeTitle = document.querySelector(".left-section .display-4");
    const welcomeText = document.querySelector(".left-section .lead");
    const infoText = document.querySelector(".left-section .info-text");
    const registerForm = document.querySelector(".right-section .login-form");

    // Função para animar a entrada do texto da esquerda
    function animateWelcomeText() {
        welcomeTitle.style.opacity = 0;
        welcomeText.style.opacity = 0;
        infoText.style.opacity = 0;

        setTimeout(() => {
            welcomeTitle.style.opacity = 1;
            welcomeTitle.style.transform = "translateY(0)";
        }, 300);

        setTimeout(() => {
            welcomeText.style.opacity = 1;
            welcomeText.style.transform = "translateY(0)";
        }, 600);

        setTimeout(() => {
            infoText.style.opacity = 1;
            infoText.style.transform = "translateY(0)";
        }, 900);
    }

    // Função para animar a entrada do formulário
    function animateForm() {
        registerForm.style.opacity = 0;
        registerForm.style.transform = "translateX(50px)";

        setTimeout(() => {
            registerForm.style.opacity = 1;
            registerForm.style.transform = "translateX(0)";
        }, 300);
    }

    // Iniciar animações
    animateWelcomeText();
    animateForm();
});
