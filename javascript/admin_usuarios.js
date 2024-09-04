function searchUsers() {
    const searchQuery = document.getElementById('search-bar').value.toLowerCase();
    const rows = document.querySelectorAll('.user-list tbody tr');

    rows.forEach(row => {
        const name = row.cells[0].textContent.toLowerCase();
        const email = row.cells[1].textContent.toLowerCase();
        const status = row.cells[3].textContent.toLowerCase();

        if (name.includes(searchQuery) || email.includes(searchQuery) || status.includes(searchQuery)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}

function editUser(email) {
    alert(`Editar usuario: ${email}`);
    // Aquí puedes redirigir a una página de edición o abrir un modal para editar detalles del usuario
}

function toggleUserStatus(email) {
    alert(`Cambiar estado del usuario: ${email}`);
    // Aquí puedes cambiar el estado del usuario de Activo a Suspendido o viceversa
}

function deleteUser(email) {
    if (confirm(`¿Estás seguro de que deseas eliminar al usuario: ${email}? Esta acción no se puede deshacer.`)) {
        alert(`Usuario eliminado: ${email}`);
        // Aquí puedes realizar la acción para eliminar al usuario del sistema
    }
}
