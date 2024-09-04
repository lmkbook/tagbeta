// Inicializar el mapa
function initMap() {
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 12,
        center: { lat: 4.710989, lng: -74.072092 }, // Coordenadas de Bogotá
    });

    // Agregar pines de ejemplo
    const lostPetPin = {
        url: '/IMG/lost-pin.png', // Ruta al ícono de mascota perdida
        scaledSize: new google.maps.Size(30, 30),
    };
    const foundPetPin = {
        url: '/IMG/found-pin.png', // Ruta al ícono de mascota encontrada
        scaledSize: new google.maps.Size(30, 30),
    };

    const markers = [
        new google.maps.Marker({
            position: { lat: 4.711, lng: -74.0721 },
            map,
            icon: lostPetPin,
            title: "Mascota Perdida",
        }),
        new google.maps.Marker({
            position: { lat: 4.712, lng: -74.0731 },
            map,
            icon: foundPetPin,
            title: "Mascota Encontrada",
        }),
    ];

    window.markers = markers; // Guardar los marcadores en una variable global para filtrar
}

// Filtrar pines
function filterPins(type) {
    window.markers.forEach(marker => {
        if (type === 'lost' && marker.title === "Mascota Perdida") {
            marker.setVisible(true);
        } else if (type === 'found' && marker.title === "Mascota Encontrada") {
            marker.setVisible(true);
        } else {
            marker.setVisible(false);
        }
    });
}

// Mostrar todos los pines
function showAllPins() {
    window.markers.forEach(marker => marker.setVisible(true));
}

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