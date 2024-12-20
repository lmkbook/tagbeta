let map;
let allMarkers = [];
let markersPerdidas = [];
let markersEncontradas = [];

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: 4.7110, lng: -74.0721 }, // Centro en Bogotá, Colombia
        zoom: 12
    });
    
    // Cargar pines de mascotas desde la API
    fetchMascotasData();


    // Datos de los pines de ejemplo
    const markerData = [
        { lat: 4.6097, lng: -74.0821, type: 'lost', description: 'Luna es una labradora negra, se perdió cerca de la Plaza de Bolívar. Tiene una placa con su nombre.', date: '2024-10-25' },
        { lat: 4.6351, lng: -74.0703, type: 'lost', description: 'Max es un gato siamés, desapareció en el barrio La Candelaria. Es tímido y suele esconderse.', date: '2024-10-20' },
        { lat: 4.6486, lng: -74.1005, type: 'lost', description: 'Rocky es un bulldog blanco con manchas negras. Se perdió en el Parque Simón Bolívar.', date: '2024-10-18' },
        { lat: 4.6545, lng: -74.0890, type: 'lost', description: 'Nina es una gatita gris, se escapó de casa en el barrio Chapinero. Tiene collar morado.', date: '2024-10-15' },
        { lat: 4.6013, lng: -74.0650, type: 'lost', description: 'Bruno es un golden retriever juguetón, se perdió cerca del Museo del Oro.', date: '2024-10-10' },
        { lat: 4.6300, lng: -74.1000, type: 'found', description: 'Gato blanco y gris encontrado en la zona de Teusaquillo. Muy amistoso y parece estar perdido.', date: '2024-10-22' },
        { lat: 4.6672, lng: -74.1123, type: 'found', description: 'Perro pequeño de color marrón claro encontrado en el sector de Usaquén. Lleva un collar rojo.', date: '2024-10-18' },
        { lat: 4.6417, lng: -74.0791, type: 'found', description: 'Pastor alemán adulto encontrado en el Parque de la Independencia. Muy dócil y tranquilo.', date: '2024-10-17' }
    ];

        // Llamar a la función para cargar todos los pines en el mapa
        loadPins();
    }
    
    // Función para cargar pines desde la base de datos
    function loadPins() {
        fetch('../html/get_pins.php')
        .then(response => response.json())
        .then(pins => {
            pins.forEach(pin => {
                const position = { lat: parseFloat(pin.latitud), lng: parseFloat(pin.longitud) };
                const marker = new google.maps.Marker({
                    position: position,
                    map: map,
                    title: pin.nombre,
                    icon: pin.tipo === 'perdida' ? 'red-icon-url' : 'green-icon-url' // Ajusta según el tipo
                });
                
                const infoWindow = new google.maps.InfoWindow({
                    content: `<h3>${pin.nombre}</h3><p>${pin.descripcion}</p>`
                });

                marker.addListener('click', () => {
                    infoWindow.open(map, marker);
                });

                if (pin.tipo === 'perdida') {
                    lostPetsMarkers.push(marker);
                } else {
                    foundPetsMarkers.push(marker);
                }
            });
        })
        .catch(error => console.error('Error loading pins:', error));
}

    // Crear y almacenar los marcadores en el mapa
    markerData.forEach((data) => {
        const marker = new google.maps.Marker({
            position: { lat: data.lat, lng: data.lng },
            map: map,
            icon: data.type === 'lost' ? 'http://maps.google.com/mapfiles/ms/icons/red-dot.png' : 'http://maps.google.com/mapfiles/ms/icons/green-dot.png',
            visible: true, // Inicialmente visible
        });

        // Guardar el tipo de marcador para usar en los filtros
        marker.type = data.type;

        // Crear la ventana de información
        const infoWindow = new google.maps.InfoWindow({
            content: `<h3>${data.type === 'lost' ? 'Mascota Perdida' : 'Mascota Encontrada'}</h3><p>${data.description}</p><p><strong>Fecha:</strong> ${data.date}</p>`
        });

        // Mostrar la ventana de información al hacer clic en el marcador
        marker.addListener("click", () => {
            infoWindow.open(map, marker);
        });

        // Guardar el marcador en el array markers
        markers.push(marker);
    });


// Función para filtrar los pines según el tipo
function filterPins(type) {
    markers.forEach(marker => {
        if (type === 'all') {
            marker.setVisible(true);
        } else {
            marker.setVisible(marker.type === type);
        }
    });
}

// Función para mostrar todos los pines
function showAllPins() {
    filterPins('all');
}
