window.onload = function() {
    generatePetID();
};

// Función para generar un ID alfanumérico de 6 caracteres

function generatePetID() {
    const characters = 'AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz0123456789';
    let petID = '';
    for (let i = 0; i < 20; i++) {
        petID += characters.charAt(Math.floor(Math.random() * characters.length));
    }
    document.getElementById('pet_id').value = petID;
}

// function updateRazaOptions() {
//     const tipoMascota = document.getElementById('tipo_mascota').value;

//     const razaSelect = document.getElementById('raza');
//     razaSelect.innerHTML = ''; // Limpiar opciones

//     let opciones = [];

//     if (tipoMascota === '1') {
//         opciones = [
//             "Labrador Retriever", "Bulldog", "Pastor Alemán", "Criollo o Mestizo", "Otro"
//         ];
//     } else if (tipoMascota === '2') {
//         opciones = [
//             "Siamés", "Persa", "Maine Coon", "Criollo o Mestizo", "Otro"
//         ];
//     }

//     opciones.forEach(raza => {
//         const option = document.createElement('option');
//         option.value = raza;
//         option.textContent = raza;
//         razaSelect.appendChild(option);
//     });

//     razaSelect.addEventListener('change', function () {
//         const otraRazaContainer = document.getElementById('otro_raza_container');
//         if (razaSelect.value === 'Otro') {
//             otraRazaContainer.style.display = 'block';
//             document.getElementById('otra_raza').required = true;
//         } else {
//             otraRazaContainer.style.display = 'none';
//             document.getElementById('otra_raza').required = false;
//         }
//     });
// }

function saveAndResetForm() {
   const form = document.getElementById('frm');
    form.reset();

    // Generar un nuevo ID de mascota único para la siguiente mascota
    generatePetID();
}