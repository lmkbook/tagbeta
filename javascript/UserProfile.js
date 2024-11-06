// Funciones para mostrar y ocultar contraseñas
function togglePassword(fieldId) {
    const field = document.getElementById(fieldId);
    field.type = field.type === 'password' ? 'text' : 'password';
}

// Función para mostrar los detalles de una mascota
function showPetDetails(petId) {
    const petDetails = document.getElementById('pet-details');
    
    // Ocultar el contenedor si se está mostrando la misma mascota
    if (petDetails.dataset.currentPet === petId) {
        petDetails.style.display = 'none';
        petDetails.dataset.currentPet = '';
    } else {
        // Cargar dinámicamente los detalles de la mascota con base en petId
        if (petId === 'pet1') {
            petDetails.innerHTML = `
                <h3>Detalles de la Mascota</h3>
                <p>Nombre: Firulais</p>
                <p>Raza: Criollo</p>
                <p>Edad: 3 años</p>
                <p>Fotos:</p>
                <img src="/IMG/firulais1.jpg" alt="Foto 1" style="width:100px; height:auto;">
                <img src="/IMG/firulais2.jpg" alt="Foto 2" style="width:100px; height:auto;">
                <br>
                <button type="button" onclick="editPet('pet1')">Editar</button>
                <button type="button" onclick="deletePet('pet1')">Eliminar</button>
            `;
        } else if (petId === 'pet2') {
            petDetails.innerHTML = `
                <h3>Detalles de la Mascota</h3>
                <p>Nombre: Pelusa</p>
                <p>Raza: Siamés</p>
                <p>Edad: 2 años</p>
                <p>Fotos:</p>
                <img src="/IMG/pelusa1.jpg" alt="Foto 1" style="width:100px; height:auto;">
                <img src="/IMG/pelusa2.jpg" alt="Foto 2" style="width:100px; height:auto;">
                <br>
                <button type="button" onclick="editPet('pet2')">Editar</button>
                <button type="button" onclick="deletePet('pet2')">Eliminar</button>
            `;
        }
        
        petDetails.dataset.currentPet = petId;
        petDetails.style.display = 'block';
    }
}

// Función para editar una mascota
function editPet(petId) {
    alert(`Editar Mascota ${petId} - Funcionalidad aún por implementar.`);
}

// Función para eliminar una mascota
function deletePet(petId) {
    alert(`Eliminar Mascota ${petId} - Funcionalidad aún por implementar.`);
}

