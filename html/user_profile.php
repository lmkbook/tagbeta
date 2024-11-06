<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['iduser'])) {
    header("Location: IniciaSesion.php");
    exit();
}

// Conexión a la base de datos
include_once('../model/connect.php');
include_once('../model/segurity.php');

// Obtener información del usuario
try {
    $dochash = MAILHASH;
    $idUser = $_SESSION['iduser'];
    $queryUser = Connect::ObtainInstance()->prepare("SELECT Pname, Email, Ncel FROM rusers WHERE idRusers = :id");
    $queryUser->bindParam(':id', $idUser, PDO::PARAM_STR);
    $queryUser->execute();
    $userData = $queryUser->fetch(PDO::FETCH_ASSOC);

    // Obtener las mascotas del usuario
    $queryPets = Connect::ObtainInstance()->prepare("SELECT * FROM pets WHERE idPets = :id");
    $queryPets->bindParam(':id', $idUser, PDO::PARAM_STR);
    $queryPets->execute();
    $petsData = $queryPets->fetchAll(PDO::FETCH_ASSOC);

} catch (Exception $e) {
    echo "Error al obtener la información: " . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/UserProfile.css">
    <title>Perfil de Usuario - Tag My Pet</title>
    <link rel="icon" href="../IMG/favicon.ico" type="image/x-icon">
</head>
<body>

    <?php include('main_header.php'); ?>

    <div class="slider">
        <div class="slide active" style="background-image: url('../IMG/mascota1.jpg');"></div>
        <div class="slide" style="background-image: url('../IMG/mascota2.jpg');"></div>
        <div class="slide" style="background-image: url('../IMG/mascota3.jpg');"></div>
    </div>

    <div class="main-content">
        <section class="user-profile">
            <h1>Perfil de Usuario</h1>
            
            <!-- Información personal del usuario -->
            <div class="personal-info">
                <h2>Información Personal</h2>
                <form id="personal-info-form" method="POST" action="update_user_info.php">
                    <label for="name">Nombre:</label>
                    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($userData['Pname']); ?>"><br>

                    <label for="email">Correo Electrónico:</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($userData['Email']); ?>"><br>

                    <label for="phone">Número de Teléfono:</label>
                    <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($userData['Ncel']); ?>"><br>

                    <button type="submit">Guardar Cambios</button>
                </form>
            </div>

            <!-- Cambio de contraseña -->
            <div class="change-password">
                <h2>Cambio de Contraseña</h2>
                <form id="password-form" method="POST" action="update_password.php">
                    <label for="current-password">Contraseña Actual:</label>
                    <input type="password" id="current-password" name="current-password" required><br>

                    <label for="new-password">Nueva Contraseña:</label>
                    <input type="password" id="new-password" name="new-password" required><br>

                    <label for="confirm-password">Confirmar Nueva Contraseña:</label>
                    <input type="password" id="confirm-password" name="confirm-password" required><br>

                    <button type="submit">Actualizar Contraseña</button>
                </form>
            </div>

            <!-- Lista de mascotas del usuario -->
            <div class="my-pets">
                <h2>Mis Mascotas Registradas</h2>
                <ul id="pet-list">
                    <?php foreach ($petsData as $pet): ?>
                        <li onclick="showPetDetails(<?php echo $pet['idMascota']; ?>)">
                            <?php echo htmlspecialchars($pet['nombre']); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <!-- Detalles de la mascota con opciones de edición y eliminación -->
                <div id="pet-details">
                    <h3>Detalles de la Mascota</h3>
                    <form id="pet-info-form" method="POST" action="update_pet_info.php" enctype="multipart/form-data">
                        <input type="hidden" name="pet_id" id="pet_id" value="">

                        <label for="pet_name">Nombre:</label>
                        <input type="text" id="pet_name" name="pet_name" value=""><br>

                        <label for="pet_color">Color:</label>
                        <input type="text" id="pet_color" name="pet_color" value=""><br>

                        <label for="pet_weight">Peso:</label>
                        <input type="number" id="pet_weight" name="pet_weight" value=""><br>

                        <label for="pet_photos">Fotografías:</label>
                        <input type="file" id="pet_photos" name="pet_photos[]" multiple><br>
                        <small>* Puede subir hasta 4 fotografías nuevas.</small><br>

                        <button type="submit">Actualizar Mascota</button>
                        <button type="button" onclick="deletePet()">Eliminar Mascota</button>
                    </form>
                </div>
            </div>
        </section>
    </div>

    <script src="../javascript/slider.js"></script>
    <script src="../javascript/UserProfile.js"></script>
    <script src="../javascript/footer.js"></script>

    <script>
        function showPetDetails(petId) {
            // AJAX para cargar detalles de la mascota
            fetch(`get_pet_details.php?pet_id=${petId}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('pet_id').value = data.idMascota;
                    document.getElementById('pet_name').value = data.nombre;
                    document.getElementById('pet_color').value = data.color;
                    document.getElementById('pet_weight').value = data.peso;
                    // Mostrar detalles de la mascota
                    document.getElementById('pet-details').style.display = 'block';
                })
                .catch(error => console.error('Error al cargar detalles de la mascota:', error));
        }

        function deletePet() {
            const petId = document.getElementById('pet_id').value;
            if (confirm("¿Está seguro de que desea eliminar esta mascota?")) {
                fetch(`delete_pet.php?pet_id=${petId}`, { method: 'GET' })
                    .then(response => response.text())
                    .then(result => {
                        alert(result);
                        location.reload();
                    })
                    .catch(error => console.error('Error al eliminar la mascota:', error));
            }
        }
    </script>
</body>
</html>
