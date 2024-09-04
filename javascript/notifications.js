// Simular el despliegue de notificaciones basadas en la ubicación
function toggleNotifications() {
    const notificationList = document.getElementById('notification-list');
    notificationList.style.display = notificationList.style.display === 'none' ? 'block' : 'none';
}

// Función para ver detalles de la alerta
function viewAlertDetails() {
    // Lógica para ver los detalles de la alerta, posiblemente redirigir a otra página o mostrar más información.
    alert('Ver detalles de la alerta');
}

// Función para redirigir al perfil
function goToProfile() {
    window.location.href = 'user_profile.html';
}

// Función para redirigir a los mensajes
function goToMessages() {
    window.location.href = 'messages.html';
}
