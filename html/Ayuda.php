<?php
session_start(); // Mantén este session_start al inicio de la página
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Ayuda.css"> <!-- Enlace al CSS -->
    <link rel="stylesheet" href="../css/PaginaInicioSlider.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Centro de Ayuda - Tag My Pet</title>
    <link rel="icon" href="../IMG/favicon.ico" type="image/x-icon">
</head>

<body>
    <?php include('main_header.php'); ?>

    <div class="contenedor">
    <div class="titulo">
    <h1>¿Cómo podemos ayudarte?</h1>
    </div>
    <div class="busqueda">
        <input type="text" placeholder="Buscar tutoriales..." id="search-bar">
        <button id="search-button">
        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" viewBox="0 0 16 16">
        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
        </svg>
        </button>
    </div>
    <div class="galeria">
        <div class="video-item"  data-video="../video/registrarse.mp4">
            <img src="../IMG/Ayuda_registro.jpg" alt="Video 1" width="200" height="150">
            <p>¿Cómo registrarme en Tag My Pet?</p>
        </div>
        <div class="video-item" data-video="../video/iniciasesion.mp4">
            <img src="../IMG/Ayuda_iniciosesion.jpg" alt="Video 2" width="200" height="150">
            <p>¿Cómo iniciar sesión?</p>
        </div>
        <div class="video-item" data-video="../video/registromascota.mp4">
            <img src="../IMG/Ayuda_registromascota.jpg" alt="Video 3" width="200" height="150">
            <p>¿Cómo registro mi mascota(s)?</p>
        </div>
        <div class="video-item" data-video="../video/alertamascotaper.mp4">
            <img src="../IMG/Ayuda_generaralertamasco.jpg" alt="Video 4"  width="200" height="150">
            <p>¡Generar alerta de mascota perdida!</p>
        </div>
        <div class="video-item" data-video="../video/reportemasencontrada.mp4">
            <img src="../IMG/Ayuda_encontrarmasco.jpg" alt="Video 5" width="200" height="150">
            <p>¿Cómo reportar una mascota que encontre?</p>
        </div>
        <div class="video-item" data-video="../video/foro.mp4">
            <img src="../IMG/Ayuda_foro.jpg" alt="Video 4" width="200" height="150">
            <p>Ingresar al foro</p>
        </div>
        <div class="video-item" data-video="../video/actualizadatos.mp4">
            <img src="../IMG/Ayuda_actualizadatosuser.jpg" alt="Video 4" width="200" height="150">
            <p>Actualizar mis datos de usuario</p>
        </div>
        <div class="video-item" data-video="../video/contactarnos.mp4">
            <img src="../IMG/Ayuda_contactanos.jpg" alt="Video 4" width="200" height="150"> 
            <p>¿Cómo contactarnos?</p>
        </div>
    </div>
    <!-- Reproductor de video -->
    <div class="modal" id="videoModal">
        <span id="closeBtn">✖</span>
        <video controls id="videoPlayer" muted>
            <source src="" type="video/mp4">
        </video>
    </div>
</div>

    
    <div class="slider">
        <div class="slide active" style="background-image: url('../IMG/mascota1.jpg');"></div>
        <div class="slide" style="background-image: url('../IMG/mascota2.jpg');"></div>
        <div class="slide" style="background-image: url('../IMG/mascota3.jpg');"></div>
    </div>

    <script src="../javascript/Ayuda.js"></script> <!-- Enlace al JavaScript -->
    <script src="../javascript/slider.js"></script> 
    <script src="../javascript/footer.js"></script>
</body>
</html>

