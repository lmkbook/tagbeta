<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<header>
    <nav>
        <ul>
            <?php if (isset($_SESSION['loggedin']) === true): ?>
                <!-- Header para usuario con sesión activa -->
                <li><a href="PaginaInicioSesionOn.php">Inicio</a></li>
                <li><a href="pet_registration.php">Registra tu Mascota</a></li>
                <li><a href="reporte_mascota_perdida.php">Generar Alerta</a></li>
                <li><a href="MascotaEncontradaQueHacer.php">¿Encontraste una Mascota?</a></li>
                <li><a href="comunidad.php">Comunidad</a></li>
                <li><a href="contacto.php">Contáctanos</a></li>
            <?php else: ?>
                <!-- Header para usuario sin sesión activa -->
                <li><a href="index.php">Inicio</a></li>
                <li><a href="MascotaEncontradaQueHacer.php">¿Encontraste una Mascota?</a></li>
                <li><a href="contacto.php">Contáctanos</a></li>
                <li><a href="Ayuda.php">Ayuda</a></li>
            <?php endif; ?>
        </ul>
    </nav>

    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
        <!-- Sección de íconos y botón de Cerrar Sesión solo para sesión activa -->
        <div class="user-info">
            <div class="icon-buttons">
                <button onclick="goToProfile()" class="icon-button">
                    <img src="../IMG/User.png" alt="Perfil">
                </button>
                <button onclick="goToMessages()" class="icon-button">
                    <img src="../IMG/message.png" alt="Foro">
                </button>
                <button id="ntif" onclick="showNotification()" class="icon-button">
                    <img src="../IMG/notification.png" alt="Notificaciones">
                </button>
                <div id="popupBox" class="popup-box" style="display:none;">
                    <div class="popup-content">
                        <p id="notificationMessage">Cargando...</p> <!-- Mensaje que se actualizará con la respuesta -->
                        <div id="buttonContainer"></div>

                        <!-- Botón que desencadenará la creación del nuevo botón -->
                        <button id="addButton" onclick="masinfo()">Obtener mas info</button><br>
                        <button id="closeBoxBtn" onclick="crrcu()">Cerrar</button>
                    </div>
                </div>
                <button onclick="logout()" class="icon-button" id="logout-button">
                    Cerrar Sesión
                </button>
            </div>
        </div>
    <?php endif; ?>
</header>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
        // Función para cerrar sesión
    function logout() {
        fetch('logout.php')
            .then(() => window.location.href = 'index.php')
            .catch(error => console.error('Error cerrando sesión:', error));
    }
    // Funciones para redirigir a otras secciones
    function goToProfile() {
        window.location.href = 'user_profile.php';
    }
    function goToMessages() {
        window.location.href = 'foro.php';
    } 
    function showNotification() {
        $.ajax({
            url: '../controller/foundpetnotuser.php',
            method: 'POST',
            dataType: 'json',  // El servidor devuelve JSON
            success: function(rpt) {
                // Si la respuesta es exitosa, actualiza el mensaje y muestra el cuadro
                if (rpt.status === 'success') {
                    document.getElementById('notificationMessage').innerText = rpt.message;
                    document.getElementById('popupBox').style.display = 'block';  // Muestra el cuadro
                } else {
                    document.getElementById('notificationMessage').innerText = 'No hay nuevas notificaciones';
                    document.getElementById('popupBox').style.display = 'block';  // Muestra el cuadro
                }
            },
            error: function(xhr, status, err) {
                console.log("Error en la solicitud AJAX");
                console.log("Código de error:", xhr.status);
                console.log("Estado:", status);
                console.log("Error:", err);
                console.log("Respuesta del servidor:", xhr.responseText);
            }
        });
    }
    function crrcu(){
        document.getElementById('popupBox').style.display = 'none';
    }
    
    function masinfo(){
        window.location.href = '../html/notifi.php';
    }
    
</script>


<style>
    /* Estilos específicos para los iconos en el header */
    .user-info .icon-buttons .icon-button img {
        width: 24px;
        height: 24px;
    }

    .user-info .icon-buttons {
        display: flex;
        gap: 10px;
        align-items: center;
    }
</style>

<style>
    #showBoxBtn {
        font-size: 24px;
        background-color: transparent;
        border: none;
        cursor: pointer;
    }
    /* Estilo del cuadro desplegable (inicialmente oculto) */
    .popup-box {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%); /* Centra el cuadro */
        background-color: white;
        width: 200px;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        display: none; /* Oculto por defecto */
        z-index: 9999;  /* Asegura que esté por encima de otros elementos */
    }
    /* Estilo del contenido dentro del cuadro */
    .popup-content {
        text-align: center;
    }
    /* Estilo para el botón de cerrar */
    #closeBoxBtn {
        margin-top: 10px;
        background-color: #f44336; /* Rojo */
        color: white;
        border: none;
        padding: 5px 10px;
        border-radius: 4px;
        cursor: pointer;
    }
    #closeBoxBtn:hover {
        background-color: #d32f2f;
    }
    /* Estilos específicos para los iconos en el header */
    .user-info .icon-buttons .icon-button {
        background-color: #3B9C9C;
        color: #FFFFFF;
        border: none;
        cursor: pointer;
        padding: 10px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
        width: calc(100% - 20px);
        margin-bottom: 15px;
    }

    .user-info .icon-buttons .icon-button img {
        width: 24px;
        height: 24px;
    }

    /* Efecto hover para cambiar el color de fondo */
    .user-info .icon-buttons .icon-button:hover {
        background-color: #2F7A7A;
    }

    .user-info .icon-buttons {
        display: flex;
        gap: 10px;
        align-items: center;
    }
</style>
