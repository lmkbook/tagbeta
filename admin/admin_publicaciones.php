<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin_publicaciones.css">
    <title>Gestión de Publicaciones - Tag My Pet</title>
    <link rel="icon" href="../IMG/favicon.ico" type="image/x-icon">
</head>
<body>
    <?php include('../admin/admin_header.html'); ?>

    <main>
        <h1>Gestión de Publicaciones</h1>

        <section class="search-filter">
            <input type="text" id="search-bar" placeholder="Buscar por ID, usuario, estado...">
            <button onclick="searchPosts()">Buscar</button>
        </section>

        <section class="post-list">
            <table>
                <thead>
                    <tr>
                        <th>ID Publicación</th>
                        <th>Fecha</th>
                        <th>Usuario</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>PUB123</td>
                        <td>01/09/2024</td>
                        <td>Juan Pérez</td>
                        <td>Pendiente</td>
                        <td>
                            <button onclick="approvePost('PUB123')">Aprobar</button>
                            <button onclick="rejectPost('PUB123')">Rechazar</button>
                            <button onclick="editPost('PUB123')">Editar</button>
                            <button onclick="deletePost('PUB123')">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>PUB456</td>
                        <td>02/09/2024</td>
                        <td>María López</td>
                        <td>Aprobado</td>
                        <td>
                            <button onclick="editPost('PUB456')">Editar</button>
                            <button onclick="deletePost('PUB456')">Eliminar</button>
                        </td>
                    </tr>
                    <!-- Más filas de publicaciones -->
                </tbody>
            </table>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Tag My Pet. Todos los derechos reservados.</p>
    </footer>

    <script src="../javascript/admin_publicaciones.js"></script>
</body>
</html>
