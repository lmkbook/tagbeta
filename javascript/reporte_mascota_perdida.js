document.addEventListener('DOMContentLoaded', function() {
    // Obtener la lista de mascotas registradas del usuario desde la base de datos (simulado)
    const petSelect = document.getElementById('pet_name');
    const registeredPets = ['Fido', 'Mimi'];  // Ejemplo de mascotas registradas del usuario
    
    // Llenar el select de mascotas
    registeredPets.forEach(pet => {
        const option = document.createElement('option');
        option.value = pet;
        option.textContent = pet;
        petSelect.appendChild(option);
    });
    
    // Inicializar el mapa
    initMap();
});

function initMap() {
    // Configuración inicial del mapa en Bogotá, Colombia
    var map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: 4.7110, lng: -74.0721 },
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
        console.log('Latitud: ' + latLng.lat() + ', Longitud: ' + latLng.lng());
        document.getElementById('latitud').value = latLng.lat();
        document.getElementById('longitud').value = latLng.lng();
    });
}

// Manejo de envío de formulario
document.getElementById('frm').addEventListener('submit', function(event) {
    event.preventDefault();  // Evitar recarga de la página

    // Crear un objeto FormData para capturar los datos del formulario
    const formData = new FormData(document.getElementById('frm'));

    // Enviar la solicitud POST al archivo PHP de procesamiento
    fetch('../backend/procesar_reporte.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Reporte enviado con éxito');
            // Redirigir o realizar otra acción
        } else {
            alert('Hubo un error al enviar el reporte');
        }
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
