class UI {
    ShowMenssage(Mensage) {
        const div = document.createElement('div');
        div.className = 'mens';
        div.appendChild(document.createTextNode(Mensage));
        const container1 = document.querySelector('.container1');
        const contenedor1 = document.querySelector('#contenedor1');
        container1.insertBefore(div, contenedor1);
        setTimeout(function () {
            document.querySelector('.mens').remove();
        }, 4000);
    }
}


function verif(ser, ord, ui, e) {
    if (ser === "" || ord === "") {
        ui.ShowMenssage("Tiene que escribir su correo y contraseña");
        e.preventDefault();
    }
}


// Función para mostrar y ocultar la contraseña
function togglePassword(ojo, contra) {
    const field = document.getElementById(ojo);
    const con = document.getElementById(contra);
    if (con.type !== "password"){
        con.type = "password";
        field.classList.remove('bi-eye-slash-fill');
        field.classList.add('bi-eye-fill');
    }else{
        con.type = "text";
        field.classList.add('bi-eye-slash-fill');
        field.classList.remove('bi-eye-fill');
    }
}
document.getElementById('form').addEventListener("submit", function(e) {
    const user = document.getElementById('email').value;
    const psword = document.getElementById('password').value;
    const ui = new UI();
    verif(user, psword, ui, e);
});







