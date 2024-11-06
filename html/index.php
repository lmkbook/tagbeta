<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/PaginaInicioSlider.css"> 
    <title>Página de Inicio - Tag My Pet</title>
    <link rel="icon" href="../IMG/favicon.ico" type="image/x-icon">
</head>
<body>
    <?php include('main_header.php'); ?>

    <div class="welcome-container">
        <img src="../IMG/Logo.png" alt="Tag My Pet Logo" class="logo">
        <h1 class="welcome-text">¡Bienvenido!</h1>
        <h2 class="welcome-subtext">a Tag My Pet</h2>
    </div>

    <div class="button-container">
        <a href="RegistroUsuario.php" class="main-button">Registrarse</a>
        <a href="InicioSesion.php" class="main-button">Iniciar Sesión</a>
    </div>

    <div class="main-content">
        <section class="features">
            <div class="feature">
                <a href="publicaciones_mascotas_encontradas.php">
                    <img src="../IMG/Found.png" alt="Mascotas Encontradas">
                    <p>Mascotas Encontradas</p>
                </a>
            </div>
            <div class="feature">
                <a href="comunidad.php">
                    <img src="../IMG/Comunity.png" alt="Comunidad">
                    <p>Comunidad</p>
                </a>
            </div>
            <div class="feature">
                <a href="PaginaMapaIntercativo.php">
                    <img src="../IMG/Map.png" alt="Mapa Interactivo">
                    <p>Mapa Interactivo</p>
                </a>
            </div>
            <div class="feature">
                <a href="MascotaEncontradaQueHacer.php">
                    <img src="../IMG/WhatToDo.png" alt="Mascota Encontrada ¿Qué hacer?">
                    <p>Mascota Encontrada ¿Qué hacer?</p>
                </a>
            </div>
        </section>
    </div>
    
    <div class="slider">
        <div class="slide active" style="background-image: url('../IMG/mascota1.jpg');"></div>
        <div class="slide" style="background-image: url('../IMG/mascota2.jpg');"></div>
        <div class="slide" style="background-image: url('../IMG/mascota3.jpg');"></div>
    </div>

    <script src="../javascript/slider.js"></script> 
    <script src="../javascript/footer.js"></script>
</body>
</html>
