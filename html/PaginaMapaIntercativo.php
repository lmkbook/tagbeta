<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/PaginaMapaInteractivo.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="../javascript/Ineteracmap.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmXFdiO3WTIWBUz1PS1xZHutNnmi_cFDM&callback=initMap"></script>
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
                <button id="losspet">Mascotas Perdidas</button>
                <button id="ptfound">Mascotas Encontradas</button>
                <button onclick="showAllPins()">Mostrar Todas</button>
            </div>
            <div id="map"></div>
            <p id="coords"></p>
        </div>
    </main>
    <script>
        
    </script>
    <script src="../javascript/slider.js"></script>
    <script src="../javascript/footer.js"></script>
</body>
</html>

