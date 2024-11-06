function initMap() {
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 8,
        center: { lat: 4.610, lng: -74.083 }, // Coordenadas de Bogotá
        
    });

    // Añadir un marcador
    const marker = new google.maps.Marker({
        position: { lat: 4.610, lng: -74.083 },
        map: map,
        draggable: true,

    });
    //Interactuar con el marcador
    google.maps.event.addListener(marker, 'dragend', function() {
        var position = marker.getPosition();
        const lt = document.getElementById('latitud').value = position.lat();
        const lg =document.getElementById('longitud').value = position.lng();
        console.log("Cordenadas: " + lt + " " + lg);
    });

}

