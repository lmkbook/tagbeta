// Simulación de la obtención del nombre del usuario
document.addEventListener('DOMContentLoaded', function() {
    const userName = 'Juan';  // Aquí deberías obtener el nombre del usuario desde la sesión o la base de datos
    document.getElementById('user-name').textContent = userName;
});

// Funciones para redirigir a las diferentes páginas
function goToProfile() {
    window.location.href = 'user_profile.html';
}

function goToMessages() {
    window.location.href = 'foro.html';
}

function showNotification() {
    document.getElementById('notification-popup').style.display = 'block';
}

function viewNotification() {
    window.location.href = 'notifications.html';
}

function dismissNotification() {
    document.getElementById('notification-popup').style.display = 'none';
}
