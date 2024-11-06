class UI{
    ShowMensage(Mensage){
        const div = document.createElement('div');
        div.className = 'msje';
        div.appendChild(document.createTextNode(Mensage));
        const contenedor = document.querySelector('.contenedor');
        const contenedor1 = document.querySelector('#contenedor1');
        contenedor.insertBefore(div, contenedor1);
        div.scrollIntoView({ behavior: 'smooth', block: 'center' });
        setTimeout(function(){
            document.querySelector('.msje').remove();
        }, 4000)
    }
}

//ELIMINA TODO DATO CUANDO SE RERESCA LA PAGINA
if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}

function setDateRestrictions() {
    const today = new Date();
    const minDate = new Date(today.getFullYear() - 99, today.getMonth(), today.getDate());
    const maxDate = new Date(today.getFullYear() - 18, today.getMonth(), today.getDate());

    const dateInput = document.getElementById('fcnc');
    dateInput.setAttribute('min', formatDate(minDate));
    dateInput.setAttribute('max', formatDate(maxDate));
}

function formatDate(date) {
    const day = String(date.getDate()).padStart(2, '0');
    const month = String(date.getMonth() + 1).padStart(2, '0'); // Los meses son indexados desde 0
    const year = date.getFullYear();
    return `${year}-${month}-${day}`;
}

function validateDocumentType() {
    const docType = document.getElementById('tpdc').value;
    const docNumber = document.getElementById('ndoc');

    if (docType === 'CC') {
        docNumber.setAttribute('maxlength', '10');
        docNumber.setAttribute('pattern', '[0-9]{1,10}');
    } else if (docType === 'Pasaporte') {
        docNumber.setAttribute('maxlength', '9');
        docNumber.setAttribute('pattern', '[A-Za-z]{3}[0-9]{6}');
    } else if (docType === 'CEX') {
        docNumber.setAttribute('maxlength', '7');
        docNumber.setAttribute('pattern', '[0-9]{1,7}');
    } else {
        docNumber.removeAttribute('pattern');
        docNumber.removeAttribute('maxlength');
    }
}

function calculateAge() {
    const birthDate = new Date(document.getElementById('fcnc').value);
    const today = new Date();
    let age = today.getFullYear() - birthDate.getFullYear();
    const monthDifference = today.getMonth() - birthDate.getMonth();
    if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    document.getElementById('edad').value = age;
}


function checkPasswordStrength() {
    const password = document.getElementById('pass').value;

    // Reglas de validacion
    const lengthRule = document.getElementById('length-rule');
    const specialRule = document.getElementById('special-rule');
    const letterRule = document.getElementById('letter-rule');
    const numRule = document.getElementById('number-rule');
    let vaspec;
    special = ["$", "¿", "?", "¡", "!", "#", "%", "*", "+", "-", "&", "@"];

    // Reglas caracteres especiales
    for (i = 0; i <= password.length; i++){  //Ciclo que recorre letra por letra para validar si contiene un caracter valido
        if(special.includes(password[i])){
            vaspec = true;
            break;
        }
    }
    // reglas tamaño de la contraseña
    if (password.length >= 8 && password.length <= 12){
        lengthRule.classList.add('valid');
    }else{
        lengthRule.classList.remove('valid');
    }
    // Validacion de reglas caracteres especiales
    const pecvas = vaspec; 
    if(pecvas !== true){
        specialRule.classList.remove('valid');
    }else{
        specialRule.classList.add('valid');
    }
    // Validacion de letra
    const lettup = /[a-zA-Z]/;
    if(lettup.test(password)){
        letterRule.classList.add('valid');
    }else{
        letterRule.classList.remove('valid');
    }

    const num = /\d.*\d/;
    if(num.test(password)){
        numRule.classList.add('valid');
    }else{
        numRule.classList.remove('valid');
    }
}


function cambiarojo(id, passwor){
    
    const ver = document.getElementById(id)
    const pass = document.getElementById(passwor);
    if (pass.type !== "password"){
        pass.type = "password";
        ver.classList.remove('bi-eye-slash-fill');
        ver.classList.add('bi-eye-fill');
    }else{
        pass.type = "text";
        ver.classList.add('bi-eye-slash-fill');
        ver.classList.remove('bi-eye-fill');
    }
}



document.getElementById('frm'),addEventListener("submit", function(e){
    const ui = new UI();
    const password = document.getElementById('pass').value;
    const pass = document.getElementById('passrw').value
    if (password !== pass){
        ui.ShowMensage("Las contraseñas no coinciden");
        e.preventDefault();
        return;
    }
    const lengthValid = password.length >= 8 && password.length <= 12;
    const numberValid = /\d.*\d/.test(password);
    const letterValid = /[a-zA-Z]/.test(password);
    let vaspec;
    special = ["$", "¿", "?", "¡", "!", "#", "%", "*", "+", "-", "&", "@"];

    // Reglas caracteres especiales
    for (i = 0; i <= password.length; i++){  //Ciclo que recorre letra por letra para validar si contiene un caracter valido
        if(special.includes(password[i])){
            vaspec = true;
            break;
        }
    }

    if (!lengthValid ){
        ui.ShowMensage("La contraseña no tiene los caracteres minimos");
        e.preventDefault();
        return;
    }

    if(!numberValid){
        ui.ShowMensage("Tiene que tener como minimo 2 numeros en la contraseña");
        e.preventDefault();
        return;
    }

    if(!letterValid){
        ui.ShowMensage("La contraseña tiene que tener almenos una letra mayuscula o minuscula");
        e.preventDefault();
        return;
    }

    if(vaspec !== true){
        ui.ShowMensage("La contraseña no tiene ningun caracter especial valido");
        e.preventDefault();
        return;
    }
    
    const celuco = document.getElementById('cel').value;
    const opceluco = document.getElementById('altcle').value;

    const comit = /^[0-9]*$/;
    if(comit.test(celuco) !== true){
        ui.ShowMensage("El numero de celular tiene que tener solo numeros");
        e.preventDefault();
        return;
    }else{
        if(celuco.length !== 10){
            ui.ShowMensage("El celular no cumple con los requisitos minimos")
            e.preventDefault();
            return;
        }
    }

    if(opceluco !==''){
        if(comit.test(opceluco) !== true){
            ui.ShowMensage("El numero del contacto opcional tiene que ser de solo numeros");
            e.preventDefault();
            return;
        }else{
            if(opceluco.length !== 10){
                ui.ShowMensage("El contacto opcional no cumple con los requisitos minimos");
                e.preventDefault();
                return;
            }
        }
    }

    // const names = document.getElementById('names').value;
    // const surnames = document.getElementById('surname').value;
    // const tpdoc = document.getElementById('tpdc').value;
    // const numDoc = document.getElementById('ndoc').value;
    // const Fchna = document.getElementById('fcnc').value;
    // const edad = document.getElementById('edad').value;
    // const direc = document.getElementById('address').value;
    // const barrio = document.getElementById('barrio').value;
    // const celuco = document.getElementById('cel').value;
    // const opceluco = document.getElementById('altcle').value;
    // const correo = document.getElementById('mail').value;
    // const ciudad = document.getElementById('ciu').value;

    
})

