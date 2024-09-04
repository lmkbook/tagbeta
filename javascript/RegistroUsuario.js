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
    const docNumber = document.getElementById('cel');

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

function togglePassword(id) {
    const passwordField = document.getElementById(id);
    const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordField.setAttribute('type', type);
}

function checkPasswordStrength() {
    const password = document.getElementById('pass').value;

    // Reglas de validación
    const lengthRule = document.getElementById('length-rule');
    const numberRule = document.getElementById('number-rule');
    const letterRule = document.getElementById('letter-rule');

    // Al menos 8 caracteres
    if (password.length >= 8) {
        lengthRule.classList.add('valid');
    } else {
        lengthRule.classList.remove('valid');
    }

    // Al menos 2 números
    const numberPattern = /\d.*\d/; // Busca al menos dos dígitos
    if (numberPattern.test(password)) {
        numberRule.classList.add('valid');
    } else {
        numberRule.classList.remove('valid');
    }

    // Al menos una letra mayúscula o minúscula
    const letterPattern = /[a-zA-Z]/; // Busca al menos una letra
    if (letterPattern.test(password)) {
        letterRule.classList.add('valid');
    } else {
        letterRule.classList.remove('valid');
    }
}

function validatePasswords() {
    const password = document.getElementById('pass').value;
    const confirmPassword = document.getElementById('passrw').value;

    // Validar que las contraseñas coincidan
    if (password !== confirmPassword) {
        alert('Las contraseñas no coinciden. Por favor, verifícalas.');
        return false;
    }

    // Validar que la contraseña cumpla con las reglas
    const lengthValid = password.length >= 8;
    const numberValid = /\d.*\d/.test(password);
    const letterValid = /[a-zA-Z]/.test(password);

    if (!lengthValid || !numberValid || !letterValid) {
        alert('La contraseña no cumple con los requisitos de seguridad. Por favor, revisa las normas.');
        return false;
    }

    return true;
}

window.onload = function() {
    setDateRestrictions();
    // Otras funciones que quieras ejecutar al cargar la página
};

document.getElementById('frm').addEventListener('submit', function(event) {
    if (!validatePasswords()) {
        event.preventDefault(); // Previene el envío del formulario si las contraseñas no coinciden o no cumplen las reglas
    }
});
