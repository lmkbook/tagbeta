<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<header>
    <nav>
        <ul>
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
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
                <button onclick="showNotification()" class="icon-button">
                    <img src="../IMG/notification.png" alt="Notificaciones">
                </button>
                <button onclick="logout()" class="icon-button" id="logout-button">
                    Cerrar Sesión
                </button>
            </div>
        </div>
    <?php endif; ?>
</header>

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
        // Lógica para mostrar notificaciones
        alert("Notificaciones");
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
