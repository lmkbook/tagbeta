document.addEventListener('DOMContentLoaded', function() {
    if (!navigator.geolocation) {
        alert('Geolocalización no soportada en este navegador.');
    } else {
        // Opciones para obtener una ubicación más precisa
        const options = {
            enableHighAccuracy: true, // Activa la alta precisión
            maximumAge: 0             // No usar la ubicación almacenada en caché
        };

        navigator.geolocation.getCurrentPosition((position) => {
            console.log("Latitud: " + position.coords.latitude);
            console.log("Longitud: " + position.coords.longitude);
        }, (error) => {
            switch(error.code) {
                case error.PERMISSION_DENIED:
                    console.error("Permiso denegado.");
                    break;
                case error.POSITION_UNAVAILABLE:
                    console.error("Posición no disponible.");
                    break;
                case error.TIMEOUT:
                    console.error("Tiempo de espera agotado.");
                    break;
                case error.UNKNOWN_ERROR:
                    console.error("Error desconocido.");
                    break;
                }
            },
            options
        );
    }
});