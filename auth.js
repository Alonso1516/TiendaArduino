// Validar formulario de inicio de sesión
document.addEventListener("DOMContentLoaded", () => {
    const loginForm = document.querySelector("form[action='login.php']");
    if (loginForm) {
        loginForm.addEventListener("submit", (event) => {
            const username = document.getElementById("username").value.trim();
            const password = document.getElementById("password").value.trim();

            if (username === "" || password === "") {
                alert("Por favor, completa todos los campos.");
                event.preventDefault();
            }
        });
    }

    // Validar formulario de registro
    const registerForm = document.querySelector("form[action='register.php']");
    if (registerForm) {
        registerForm.addEventListener("submit", (event) => {
            const username = document.getElementById("username").value.trim();
            const email = document.getElementById("email").value.trim();
            const password = document.getElementById("password").value.trim();

            if (username === "" || email === "" || password === "") {
                alert("Por favor, completa todos los campos.");
                event.preventDefault();
            } else if (!email.includes("@")) {
                alert("Por favor, introduce un correo electrónico válido.");
                event.preventDefault();
            }
        });
    }
});
