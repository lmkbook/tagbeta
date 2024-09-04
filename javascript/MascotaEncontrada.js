function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 4.7110, lng: -74.0721}, // Centro en Bogotá, Colombia
        zoom: 12
    });

    var marker = new google.maps.Marker({
        position: map.getCenter(),
        map: map,
        draggable: true,
        title: 'Lugar de la Mascota Encontrada'
    });

    google.maps.event.addListener(marker, 'dragend', function() {
        var latLng = marker.getPosition();
        console.log('Latitud: ' + latLng.lat() + ', Longitud: ' + latLng.lng());
    });
}

// Simulación de la obtención de datos del usuario registrado
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
