<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/PaginaInicioSesionOn.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/PaginaInicioSlider.css"> 
    <title>Página de Inicio - Sesión Iniciada</title>
    <link rel="icon" href="../IMG/favicon.ico" type="image/x-icon">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.html">Inicio</a></li>
                <li><a href="reporte_mascota_perdida.html">Generar Alerta</a></li>
                <li><a href="MascotaEncontradaQueHacer.html">¿Encontraste una Mascota?</a></li>
                <li><a href="comunidad.html">Comunidad</a></li>
                <li><a href="contacto.html">Contáctanos</a></li>
            </ul>
        </nav>
        <div class="user-info">
            <?php
                session_start();
                echo htmlspecialchars(trim(ucfirst(strtolower($_SESSION['name'])))) . " " . htmlspecialchars(trim(ucfirst(strtolower($_SESSION['surname']))));
            ?>
            <div class="icon-buttons">
                <button onclick="goToProfile()" class="icon-button">
                    <img src="../IMG/User.png" alt="Perfil">
                </button>
                <button onclick="goToMessages()" class="icon-button">
                    <img src="../IMG/message.png" alt="Foro"> <!-- Cambia el texto alternativo si es necesario -->
                </button>
                
                <button onclick="showNotification()" class="icon-button">
                    <img src="../IMG/notification.png" alt="Notificaciones">
                </button>
            </div>
        </div>
    </header>


    <div class="main-content">
        <section class="features">
            <div class="feature">
                <a href="reporte_mascota_perdida.html">
                    <img src="../IMG/Alert.png" alt="Genera una Alerta">
                    <p>Genera una Alerta</p>
                </a>
            </div>
            <div class="feature">
                <a href="publicaciones_mascotas_encontradas.html">
                    <img src="../IMG/Found.png" alt="Mascotas Encontradas">
                    <p>Mascotas Encontradas</p>
                </a>
            </div>
            <div class="feature">
                <a href="comunidad.html">
                    <img src="../IMG/Comunity.png" alt="Comunidad">
                    <p>Comunidad</p>
                </a>
            </div>
            <div class="feature">
                <a href="PaginaMapaIntercativo.html">
                    <img src="../IMG/Map.png" alt="Mapa Interactivo">
                    <p>Mapa Interactivo</p>
                </a>
            </div>
            <div class="feature">
                <a href="MascotaEncontradaQueHacer.html">
                    <img src="../IMG/WhatToDo.png" alt="Mascota Encontrada ¿Qué hacer?">
                    <p>Mascota Encontrada ¿Qué hacer?</p>
                </a>
            </div>
        </section>
    </div>

    <div id="notification-popup" class="notification-popup" style="display: none;">
        <p>Notificación: Mascota perdida/encontrada</p>
        <button onclick="viewNotification()">Visualizar</button>
        <button onclick="dismissNotification()">Visualizar Después</button>
    </div>

    <div class="slider">
        <div class="slide active" style="background-image: url('../IMG/mascota1.jpg');"></div>
        <div class="slide" style="background-image: url('../IMG/mascota2.jpg');"></div>
        <div class="slide" style="background-image: url('../IMG/mascota3.jpg');"></div>
    </div>

    <script src="../javascript/slider.js"></script> <!-- Incluye el JavaScript -->

    <script src="../javascript/PaginaInicioSesionOn.js"></script>
    <script src="../javascript/footer.js"></script>
</body>
</html>
