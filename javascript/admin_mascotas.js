function searchPets() {
    const searchQuery = document.getElementById('search-bar').value.toLowerCase();
    const rows = document.querySelectorAll('.pet-list tbody tr');

    rows.forEach(row => {
        const name = row.cells[0].textContent.toLowerCase();
        const type = row.cells[1].textContent.toLowerCase();
        const owner = row.cells[3].textContent.toLowerCase();

        if (name.includes(searchQuery) || type.includes(searchQuery) || owner.includes(searchQuery)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}

function editPet(petId) {
    alert(`Editar mascota con ID: ${petId}`);
    // Aquí puedes redirigir a una página de edición o abrir un modal para editar detalles de la mascota
}

function verifyAlert(petId) {
    alert(`Verificar alerta para mascota con ID: ${petId}`);
    // Aquí puedes realizar la verificación de la alerta de la mascota
}

function deletePet(petId) {
    if (confirm(`¿Estás seguro de que deseas eliminar la mascota con ID: ${petId}? Esta acción no se puede deshacer.`)) {
        alert(`Mascota eliminada con ID: ${petId}`);
        // Aquí puedes realizar la acción para eliminar la mascota del sistema
    }
}
