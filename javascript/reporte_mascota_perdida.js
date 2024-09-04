function openMap() {
    window.open('https://www.google.com/maps', '_blank');
}

// Simulación de la obtención de las mascotas registradas del usuario
document.addEventListener('DOMContentLoaded', function() {
    const petSelect = document.getElementById('pet_name');
    const registeredPets = ['Fido', 'Mimi'];  // Aquí deberías obtener las mascotas registradas del usuario desde la base de datos
    
    registeredPets.forEach(pet => {
        const option = document.createElement('option');
        option.value = pet;
        option.textContent = pet;
        petSelect.appendChild(option);
    });
});

// Simulación de la función para enviar el formulario
document.getElementById('frm').addEventListener('submit', function(event) {
    event.preventDefault();
    alert('Reporte enviado con éxito');
    // Aquí puedes agregar la lógica para enviar los datos al servidor
});

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