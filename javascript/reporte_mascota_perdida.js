document.addEventListener('DOMContentLoaded', function() {
    // Inicializar el mapa
    initMap();
});

function initMap() {
    // Configuración inicial del mapa en Bogotá, Colombia
    var map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: 4.7110, lng: -74.0721 }, // Bogotá
        zoom: 12
    });

    // Colocar un marcador en el centro inicial del mapa (Bogotá)
    var marker = new google.maps.Marker({
        position: map.getCenter(),
        map: map,
        draggable: true,
        title: 'Lugar de la Mascota Perdida'
    });

    // Escuchar el evento de finalización del arrastre del marcador
    google.maps.event.addListener(marker, 'dragend', function() {
        var latLng = marker.getPosition();
        document.getElementById('latitud').value = latLng.lat();
        document.getElementById('longitud').value = latLng.lng();
    });
}

// Manejo de envío de formulario
document.getElementById('reportePerdidaForm').addEventListener('submit', function(event) {
    event.preventDefault();  // Evitar recarga de la página

    // Crear un objeto FormData para capturar los datos del formulario
    const formData = new FormData(document.getElementById('reportePerdidaForm'));
    formData.append('tipo_reporte', 'perdida');

    // Enviar la solicitud POST al archivo PHP de procesamiento
    fetch('../backend/procesar_reporte.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
        if (data.success) location.reload();
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Hubo un problema al conectar con el servidor');
    });
});

// Redireccionamiento a secciones específicas
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

