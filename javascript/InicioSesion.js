// Función para mostrar y ocultar la contraseña
function togglePassword(fieldId) {
    const field = document.getElementById(fieldId);
    field.type = field.type === 'password' ? 'text' : 'password';
}

// Clase para mostrar mensajes de error o éxito
class UI {
    ShowMenssage(Mensage) {
        const div = document.createElement('div');
        div.className = 'mens';
        div.appendChild(document.createTextNode(Mensage));
        const container1 = document.querySelector('.container1');
        const contenedor1 = document.querySelector('#contenedor1');
        container1.insertBefore(div, contenedor1);
        div.scrollIntoView({ behavior: 'smooth', block: 'center' });
        setTimeout(function () {
            document.querySelector('.mens').remove();
        }, 4000);
    }
}

document.getElementById('form').addEventListener("submit", function(e) {
    const user = document.getElementById('email').value;
    const psword = document.getElementById('password').value;
    const ui = new UI();
    verif(user, psword, ui);
    e.preventDefault();
});

function verif(ser, ord, ui) {
    if (ser === "" || ord === "") {
        ui.ShowMenssage("Tiene que escribir su correo y contraseña");
    }
}
