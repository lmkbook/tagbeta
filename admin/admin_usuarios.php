<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin_usuarios.css">
    <title>Gestión de Usuarios - Tag My Pet</title>
    <link rel="icon" href="../IMG/favicon.ico" type="image/x-icon">
</head>
<body>
    <?php include('../admin/admin_header.html'); ?>

    <main>
        <h1>Gestión de Usuarios</h1>

        <section class="search-filter">
            <input type="text" id="search-bar" placeholder="Buscar por nombre, correo, o estado...">
            <button onclick="searchUsers()">Buscar</button>
        </section>

        <section class="user-list">
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo Electrónico</th>
                        <th>Fecha de Registro</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Juan Pérez</td>
                        <td>juan.perez@example.com</td>
                        <td>01/09/2024</td>
                        <td>Activo</td>
                        <td>
                            <button onclick="editUser('juan.perez@example.com')">Editar</button>
                            <button onclick="toggleUserStatus('juan.perez@example.com')">Suspender</button>
                            <button onclick="deleteUser('juan.perez@example.com')">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>María López</td>
                        <td>maria.lopez@example.com</td>
                        <td>15/08/2024</td>
                        <td>Suspendido</td>
                        <td>
                            <button onclick="editUser('maria.lopez@example.com')">Editar</button>
                            <button onclick="toggleUserStatus('maria.lopez@example.com')">Reactivar</button>
                            <button onclick="deleteUser('maria.lopez@example.com')">Eliminar</button>
                        </td>
                    </tr>
                    <!-- Más filas de usuarios -->
                </tbody>
            </table>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Tag My Pet. Todos los derechos reservados.</p>
    </footer>

    <script src="../javascript/admin_usuarios.js"></script>
</body>
</html>
