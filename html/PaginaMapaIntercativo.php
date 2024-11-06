<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/PaginaMapaInteractivo.css">
    <title>Mapa Interactivo - Tag My Pet</title>
    <link rel="icon" href="../IMG/favicon.ico" type="image/x-icon">
</head>
<body>
    <?php include('main_header.php'); ?>

    <div class="slider">
        <div class="slide active" style="background-image: url('../IMG/mascota1.jpg');"></div>
        <div class="slide" style="background-image: url('../IMG/mascota2.jpg');"></div>
        <div class="slide" style="background-image: url('../IMG/mascota3.jpg');"></div>
    </div>

    <main>
        <div class="map-container">
            <h2>Mapa Interactivo</h2>
            <div class="filter-options">
                <button onclick="filterPins('lost')">Mascotas Perdidas</button>
                <button onclick="filterPins('found')">Mascotas Encontradas</button>
                <button onclick="showAllPins()">Mostrar Todas</button>
            </div>
            <div id="map"></div>
            <p id="coords"></p>
        </div>
    </main>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmXFdiO3WTIWBUz1PS1xZHutNnmi_cFDM&callback=initMap"></script>
    <script src="../javascript/slider.js"></script>
    <script src="../javascript/mapaInteractivo.js"></script>
    <script src="../javascript/footer.js"></script>
</body>
</html>

