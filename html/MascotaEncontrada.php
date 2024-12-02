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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmXFdiO3WTIWBUz1PS1xZHutNnmi_cFDM&callback=initMap" async defer></script>

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
                    <label for="id_mascota">ID de Mascota *</label>
                    <input type="text" id="id_mascota" name="idmascota" require><br>
        
                    <label for="descripcion">Descripción de la Mascota *</label>
                    <textarea id="descripcion" name="descrion" required></textarea><br>
        
                    <label for="location">Lugar donde se encontró</label>
                    <div id="map" style="height: 400px;"></div>
                    <input type="hidden" id="latitud" name="latitud">
                    <input type="hidden" id="longitud" name="longitud"><br>
                    <p>*Tenga en cuenta de que si no selecciono el lugar en el que encontro la mascota automaticamente la pagina tomara las cordenadas por defecto que tiene el marcador (Latitud: 4.61, Longitud: -74.083) </p><br>

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
    <div class="tainer"> <!-- NO BORRAR -->
        <div id="cont"> <!-- NO BORRAR -->

        </div>
    </div>

    <div class="slider">
        <div class="slide active" style="background-image: url('../IMG/mascota1.jpg');"></div>
        <div class="slide" style="background-image: url('../IMG/mascota2.jpg');"></div>
        <div class="slide" style="background-image: url('../IMG/mascota3.jpg');"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="../javascript/slider.js"></script>
    <script src="../javascript/MascotaEncontrada.js"></script>
    <script src="../javascript/footer.js"></script>
</body>
</html>
