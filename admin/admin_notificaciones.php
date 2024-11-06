<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin_notificaciones.css">
    <title>Gestión de Notificaciones - Tag My Pet</title>
    <link rel="icon" href="../IMG/favicon.ico" type="image/x-icon">
</head>
<body>
    <?php include('../admin/admin_header.html'); ?>

    <main>
        <h1>Gestión de Notificaciones</h1>

        <section class="search-filter">
            <input type="text" id="search-bar" placeholder="Buscar por tipo, usuario, estado...">
            <button onclick="searchNotifications()">Buscar</button>
        </section>

        <section class="notification-list">
            <table>
                <thead>
                    <tr>
                        <th>ID Notificación</th>
                        <th>Fecha</th>
                        <th>Tipo</th>
                        <th>Usuario</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>NOT123</td>
                        <td>01/09/2024</td>
                        <td>Mascota Perdida</td>
                        <td>Juan Pérez</td>
                        <td>Enviado</td>
                        <td>
                            <button onclick="resendNotification('NOT123')">Reenviar</button>
                            <button onclick="editNotification('NOT123')">Editar</button>
                            <button onclick="deleteNotification('NOT123')">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>NOT456</td>
                        <td>02/09/2024</td>
                        <td>Mascota Encontrada</td>
                        <td>María López</td>
                        <td>Pendiente</td>
                        <td>
                            <button onclick="resendNotification('NOT456')">Reenviar</button>
                            <button onclick="editNotification('NOT456')">Editar</button>
                            <button onclick="deleteNotification('NOT456')">Eliminar</button>
                        </td>
                    </tr>
                    <!-- Más filas de notificaciones -->
                </tbody>
            </table>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Tag My Pet. Todos los derechos reservados.</p>
    </footer>

    <script src="../javascript/admin_notificaciones.js"></script>
</body>
</html>
