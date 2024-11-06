<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reporte_mascota_perdida.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/PaginaInicioSlider.css"> <!-- Incluye el CSS -->
    <title>Reporte de Mascota Perdida</title>
    <link rel="icon" href="../IMG/favicon.ico" type="image/x-icon">
</head>
<body>
    <?php include('main_header.php'); ?>

    <main>
        <div id="container">
            <div id="container1">
                <h1>TAG MY PET</h1>
                <h2>Reporte de Mascota Perdida</h2>
            </div>
            <div id="container2">
                <h2 id="ff">Reporte de Mascota Perdida</h2>
        <form id="reportePerdidaForm">
            <label for="id_mascota">Nombre de la mascota</label>
            <input type="text" id="id_mascota" name="id_mascota" required><br>

            <label for="descripcion">Descripción de la Mascota</label>
            <textarea id="descripcion" name="descripcion" required></textarea><br>

            <label for="fecha_perdida">Fecha de Pérdida</label>
            <input type="date" id="fecha_perdida" name="fecha_reporte" required><br>

            <label for="hora_perdida">Hora de Pérdida</label>
            <input type="time" id="hora_perdida" name="hora_reporte" required><br>

            <label for="location">Lugar de Pérdida</label>
            <div id="map" style="height: 400px;"></div>
            <input type="hidden" id="latitud" name="latitud">
            <input type="hidden" id="longitud" name="longitud"><br>

            <label for="contacto">Información de Contacto</label>
            <input type="text" id="contacto" name="contacto" required><br>

            <button type="submit">Enviar Reporte</button>
        </form>
                <p class="required-note"><strong>*</strong> Campo obligatorio</p>
            </div>
        </div>
    </main>

    <div class="slider">
        <div class="slide active" style="background-image: url('../IMG/mascota1.jpg');"></div>
        <div class="slide" style="background-image: url('../IMG/mascota2.jpg');"></div>
        <div class="slide" style="background-image: url('../IMG/mascota3.jpg');"></div>
    </div>

    <script src="../javascript/slider.js"></script> <!-- Incluye el JavaScript -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmXFdiO3WTIWBUz1PS1xZHutNnmi_cFDM&callback=initMap"></script>
    <script src="../javascript/reporte_mascota_perdida.js"></script>
    <script src="../javascript/footer.js"></script>
</body>
</html>

