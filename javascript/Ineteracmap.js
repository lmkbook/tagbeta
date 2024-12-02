let map;

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: 4.7110, lng: -74.0721 }, // Centro en Bogotá, Colombia
        zoom: 8
    });
    
    document.getElementById('losspet').addEventListener("click", function(){
        fillost();
    })
    document.getElementById('ptfound').addEventListener("click", function(){
        filfound();
    });
}

function filfound(){
    $.ajax({
        url: '../controller/mapfounds.php',
        method: 'POST',
        success: function(rpta) {
            const jsS = JSON.parse(rpta);
            for (let i = 0; i < jsS.length; i++) {
                let lti = jsS[i].Lttd;  // Latitud
                let lngi = jsS[i].Lngtd;  // Longitud
                // Convertir las coordenadas a números (en caso de que sean cadenas de texto)
                lti = parseFloat(lti);
                lngi = parseFloat(lngi);
                // Verificar si las coordenadas son válidas
                if (isFinite(lti) && isFinite(lngi)) {
                    // Crear el marcador en el mapa
                    new google.maps.Marker({
                        position: { lat: lti, lng: lngi },
                        map: map,
                        title: `Marcador ${i + 1}`,  // Título del marcador
                        draggable: false
                    });
                } else {
                    console.log(`Coordenadas inválidas en el índice ${i}: lat: ${lti}, logit: ${lngi}`);
                }
            }
        },
        error: function(err) {
            console.log("Ocurrió un error", err);
        }
    });
}
function fillost() {
    $.ajax({
        url: '../controller/maploss.php',
        method: 'POST',
        success: function(rpta) {
            const jsS = JSON.parse(rpta);
            for (let i = 0; i < jsS.length; i++) {
                let lti = jsS[i].lat;  // Latitud
                let lngi = jsS[i].logit;  // Longitud
                // Convertir las coordenadas a números (en caso de que sean cadenas de texto)
                lti = parseFloat(lti);
                lngi = parseFloat(lngi);
                // Verificar si las coordenadas son válidas
                if (isFinite(lti) && isFinite(lngi)) {
                    // Crear el marcador en el mapa
                    new google.maps.Marker({
                        position: { lat: lti, lng: lngi },
                        map: map,
                        title: `Marcador ${i + 1}`,  // Título del marcador
                        draggable: false
                    });
                } else {
                    console.log(`Coordenadas inválidas en el índice ${i}: lat: ${lti}, logit: ${lngi}`);
                }
            }
        },
        error: function(err) {
            console.log("Ocurrió un error", err);
        }
    });
}
