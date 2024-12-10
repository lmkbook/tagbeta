<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Paginainf.css">
    <title>Notificaciones</title>
    <link rel="icon" href="../IMG/favicon.ico" type="image/x-icon">
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmXFdiO3WTIWBUz1PS1xZHutNnmi_cFDM&callback=initMap"></script>

</head>
<body>
    <?php include('main_header.php'); ?>
    <div id="container1">
        <h2>CONFIRMACION DE MASCOTA ENCONTRADA</h2>
    </div>
    <div id="container2">
        <form method="POST" id="frm" enctype="multipart/form-data">
            <select id="select">
                <option value="-">-</option>
            </select>
            <input type="submit" value="Buscar Mascota">
        </form>
    </div>
    <div id="cmp">
        <div id="map" style="height: 400px;"></div>
    </div>
    <div class="cont"> <!-- NO BORRAR -->
        <div id="tainer"> <!-- NO BORRAR -->
        </div>
    </div>
    <div class="slider">
        <div class="slide active" style="background-image: url('../IMG/mascota1.jpg');"></div>
        <div class="slide" style="background-image: url('../IMG/mascota2.jpg');"></div>
        <div class="slide" style="background-image: url('../IMG/mascota3.jpg');"></div>
    </div>
</body>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="../javascript/notifi.js"></script>
    <script src="../javascript/slider.js"></script>
    <script src="../javascript/footer.js"></script>
</html>