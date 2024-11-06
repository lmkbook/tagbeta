document.getElementById('contact-form').addEventListener('submit', function(event) {
    event.preventDefault();

    // Validación simple de los campos
    let name = document.getElementById('name').value.trim();
    let email = document.getElementById('email').value.trim();
    let subject = document.getElementById('subject').value.trim();
    let message = document.getElementById('message').value.trim();
    let formMessages = document.getElementById('form-messages');

    if (name === "" || email === "" || subject === "" || message === "") {
        formMessages.textContent = "Por favor, complete todos los campos obligatorios.";
        formMessages.className = "error";
        return;
    }

    // Simulación del envío del formulario
    formMessages.textContent = "Tu mensaje ha sido enviado correctamente. ¡Gracias por contactarnos!";
    formMessages.className = "success";

    // Resetear el formulario después del envío
    document.getElementById('contact-form').reset();
});
