<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin_dashboard.css">
    <title>Dashboard del Administrador - Tag My Pet</title>
    <link rel="icon" href="../IMG/favicon.ico" type="image/x-icon">
</head>
<body>
    <?php include('../admin/admin_header.html'); ?>

    <main>
        <h1>Dashboard del Administrador</h1>
        <section class="stats">
            <div class="stat-box">
                <h2>Usuarios Registrados</h2>
                <p id="user-count">150</p> <!-- Este número se actualizaría dinámicamente -->
            </div>
            <div class="stat-box">
                <h2>Mascotas Registradas</h2>
                <p id="pet-count">80</p> <!-- Este número se actualizaría dinámicamente -->
            </div>
            <div class="stat-box">
                <h2>Alertas Activas</h2>
                <p id="alert-count">5</p> <!-- Este número se actualizaría dinámicamente -->
            </div>
            <div class="stat-box">
                <h2>Publicaciones Recientes</h2>
                <p id="post-count">12</p> <!-- Este número se actualizaría dinámicamente -->
            </div>
        </section>

        <section class="quick-access">
            <h2>Accesos Rápidos</h2>
            <div class="access-box">
                <a href="../admin/admin_usuarios.html">Gestión de Usuarios</a>
            </div>
            <div class="access-box">
                <a href="../admin/admin_mascotas.html">Gestión de Mascotas</a>
            </div>
            <div class="access-box">
                <a href="../admin/admin_publicaciones.html">Gestión de Publicaciones</a>
            </div>
            <div class="access-box">
                <a href="../admin/admin_notificaciones.html">Gestión de Notificaciones</a>
            </div>
        </section>

        <section class="activity-log">
            <h2>Actividad Reciente</h2>
            <ul>
                <li>Nuevo usuario registrado: <strong>Juan Pérez</strong></li>
                <li>Mascota encontrada reportada: <strong>Gato Blanco</strong></li>
                <li>Publicación aprobada: <strong>Perro encontrado en el parque</strong></li>
                <li>Notificación enviada: <strong>Recordatorio de vacuna</strong></li>
            </ul>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Tag My Pet. Todos los derechos reservados.</p>
    </footer>
</body>
</html>