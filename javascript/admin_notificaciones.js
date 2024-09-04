function searchNotifications() {
    const searchQuery = document.getElementById('search-bar').value.toLowerCase();
    const rows = document.querySelectorAll('.notification-list tbody tr');

    rows.forEach(row => {
        const id = row.cells[0].textContent.toLowerCase();
        const type = row.cells[2].textContent.toLowerCase();
        const user = row.cells[3].textContent.toLowerCase();
        const status = row.cells[4].textContent.toLowerCase();

        if (id.includes(searchQuery) || type.includes(searchQuery) || user.includes(searchQuery) || status.includes(searchQuery)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}

function resendNotification(notificationId) {
    alert(`Notificación con ID: ${notificationId} reenviada.`);
    // Aquí puedes realizar la acción para reenviar la notificación
}

function editNotification(notificationId) {
    alert(`Editar notificación con ID: ${notificationId}`);
    // Aquí puedes redirigir a una página de edición o abrir un modal para editar la notificación
}

function deleteNotification(notificationId) {
    if (confirm(`¿Estás seguro de que deseas eliminar la notificación con ID: ${notificationId}? Esta acción no se puede deshacer.`)) {
        alert(`Notificación eliminada con ID: ${notificationId}`);
        // Aquí puedes realizar la acción para eliminar la notificación del sistema
    }
}
