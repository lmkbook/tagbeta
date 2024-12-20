<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin_mascotas.css">
    <title>Gestión de Mascotas - Tag My Pet</title>
    <link rel="icon" href="../IMG/favicon.ico" type="image/x-icon">
</head>
<body>
    <?php include('../admin/admin_header.html'); ?>

    <main>
        <h1>Gestión de Mascotas</h1>

        <section class="search-filter">
            <input type="text" id="search-bar" placeholder="Buscar por nombre, tipo, propietario...">
            <button onclick="searchPets()">Buscar</button>
        </section>

        <section class="pet-list">
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>ID de Mascota</th>
                        <th>Propietario</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Luna</td>
                        <td>Perro</td>
                        <td>ABC123</td>
                        <td>Juan Pérez</td>
                        <td>Registrado</td>
                        <td>
                            <button onclick="editPet('ABC123')">Editar</button>
                            <button onclick="verifyAlert('ABC123')">Verificar Alerta</button>
                            <button onclick="deletePet('ABC123')">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Michi</td>
                        <td>Gato</td>
                        <td>DEF456</td>
                        <td>María López</td>
                        <td>Perdido</td>
                        <td>
                            <button onclick="editPet('DEF456')">Editar</button>
                            <button onclick="verifyAlert('DEF456')">Verificar Alerta</button>
                            <button onclick="deletePet('DEF456')">Eliminar</button>
                        </td>
                    </tr>
                    <!-- Más filas de mascotas -->
                </tbody>
            </table>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Tag My Pet. Todos los derechos reservados.</p>
    </footer>

    <script src="../javascript/admin_mascotas.js"></script>
</body>
</html>
