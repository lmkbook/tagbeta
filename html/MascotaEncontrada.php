<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/MascotaEncontrada.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/PaginaInicioSlider.css"> <!-- Incluye el CSS -->
    <title>Notificación de Mascota Encontrada - Tag My Pet</title>
    <link rel="icon" href="../IMG/favicon.ico" type="image/x-icon">
</head>
<body>
    <?php include('main_header.php'); ?>

    <main>
        <div id="container">
            <div id="container1">
                <h1>TAG MY PET</h1>
                <h2>Notificación de Mascota Encontrada</h2>
            </div>
            <div id="container2">
                <form id="reporteEncontradaForm">
                    <label for="id_mascota">ID de Mascota (si aplica)</label>
                    <input type="text" id="id_mascota" name="id_mascota"><br>
        
                    <label for="descripcion">Descripción de la Mascota</label>
                    <textarea id="descripcion" name="descripcion" required></textarea><br>
        
                    <label for="location">Lugar donde se encontró</label>
                    <div id="map" style="height: 400px;"></div>
                    <input type="hidden" id="latitud" name="latitud">
                    <input type="hidden" id="longitud" name="longitud"><br>

                    <label for="contact_name">Tu Nombre *</label>
                    <input type="text" id="contact_name" placeholder="Tu Nombre" maxlength="50" required><br>

                    <label for="contact_email">Correo Electrónico *</label>
                    <input type="email" id="contact_email" placeholder="Correo Electrónico" required><br>

                    <label for="contact_phone">Número de Teléfono *</label>
                    <input type="tel" id="contact_phone" placeholder="Número de Teléfono" maxlength="15" required><br>

                    <input type="submit" value="Enviar Notificación">
                </form>
            </div>
        </div>
    </main>

    <div class="slider">
        <div class="slide active" style="background-image: url('../IMG/mascota1.jpg');"></div>
        <div class="slide" style="background-image: url('../IMG/mascota2.jpg');"></div>
        <div class="slide" style="background-image: url('../IMG/mascota3.jpg');"></div>
    </div>

    <script src="../javascript/slider.js"></script>
    <script src="../javascript/MascotaEncontrada.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmXFdiO3WTIWBUz1PS1xZHutNnmi_cFDM&callback=initMap" async defer></script>
    <script src="../javascript/footer.js"></script>
</body>
</html>
