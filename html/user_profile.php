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

function mjsjj($msg){
    echo "<script> const mnje = document.getElementById('rptuser');
        mnje.innerHTML = '<strong>" . htmlspecialchars(trim($msg)) . "</strong>';
        mnje.scrollIntoView({ behavior: 'smooth', block: 'center' });
        setTimeout(()=>{ mnje.remove(); }, 5000) </script>";
}

// Obtener información del usuario
try {
    $dochash = MAILHASH;
    $idUser = $_SESSION['iduser'];
    $info = Connect::ObtainInstance()->prepare("SELECT Pname, AES_DECRYPT(UNHEX(Email), :mail) AS email, Ncel FROM Rusers WHERE idRusers = :id");
    $info->bindParam(':mail', $dochash, PDO::PARAM_STR);
    $info->bindParam(':id', $idUser, PDO::PARAM_INT);
    $info->execute();
    $save = $info->fetch(PDO::FETCH_ASSOC);

    // Obtener las mascotas del usuario
    $queryPets = Connect::ObtainInstance()->prepare("SELECT idRepets, Petname FROM Repets WHERE idRusers = :id");
    $queryPets->bindParam(':id', $idUser, PDO::PARAM_INT);
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
    <style>
        /* Estilos para el modal de imagen */
        .modal {
            display: none; /* Ocultar por defecto */
            position: fixed;
            z-index: 1000;
            padding-top: 60px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.8); /* Fondo semi-transparente */
        }

        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            animation: zoom 0.3s; /* Animación de zoom */
        }

        @keyframes zoom {
            from {transform: scale(0)}
            to {transform: scale(1)}
        }

        /* Botón de cierre */
        .close {
            position: absolute;
            top: 20px;
            right: 35px;
            color: #fff;
            font-size: 40px;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
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
                    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($save['Pname']); ?>"><br>

                    <label for="email">Correo Electrónico:</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($save['email']); ?>"><br>

                    <label for="phone">Número de Teléfono:</label>
                    <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($save['Ncel']); ?>"><br>

                    <button type="submit" name="actuser">Guardar Cambios</button>
                </form>
                <div id="rptuser">
                    <?php if(isset($_SESSION['actuExito'])) { mjsjj("Los datos del usuario han sido actualizados correctamente."); } ?>
                </div>
            </div>

            <!-- Cambio de contraseña -->
            <div class="change-password">
                <h2>Cambio de Contraseña</h2>
                <form id="password-form" method="POST" action="update_password.php" autocomplete="off">
                    <label for="current-password">Contraseña Actual:</label>
                    <input type="password" id="current-password" name="current-password" required><br>

                    <label for="new-password">Nueva Contraseña:</label>
                    <input type="password" id="new-password" name="new-password" required><br>

                    <label for="confirm-password">Confirmar Nueva Contraseña:</label>
                    <input type="password" id="confirm-password" name="confirm-password" required><br>

                    <button type="submit" name="update_password">Actualizar Contraseña</button>
                </form>
            </div>

            <!-- Lista de mascotas del usuario -->
            <div class="my-pets">
                <h2>Mis Mascotas Registradas</h2>
                <ul id="pet-list">
                    <?php foreach ($petsData as $pet): ?>
                        <li onclick="showPetDetails(<?php echo $pet['idRepets']; ?>)">
                            <h3><?php echo htmlspecialchars($pet['Petname']); ?></h3>
                            <!-- Mostrar la imagen de la mascota con funcionalidad de modal -->
                            <img src="get_image.php?id=<?php echo $pet['idRepets']; ?>&field=Fpetone" 
                                 alt="Foto de <?php echo htmlspecialchars($pet['Petname']); ?>" 
                                 width="100" height="100" 
                                 onclick="openModal(this.src)" style="cursor: pointer;">
                        </li>
                    <?php endforeach; ?>
                </ul>

                <!-- Detalles de la mascota con opciones de edición, reemplazo y eliminación de fotos -->
                <div id="pet-details" style="display: none;">
                    <h3>Detalles de la Mascota</h3>
                    <form id="pet-info-form" method="POST" action="update_pet_info.php">
                        <input type="hidden" name="pet_id" id="pet_id" value="">

                        <label for="pet_name">Nombre:</label>
                        <input type="text" id="pet_name" name="pet_name"><br>

                        <label for="pet_color">Color:</label>
                        <input type="text" id="pet_color" name="pet_color"><br>

                        <label for="pet_weight">Peso:</label>
                        <input type="number" id="pet_weight" name="pet_weight"><br>

                        <h4>Reemplazar Fotos de Carnet</h4>
                        <div id="carnet_photos">
                            <?php foreach (['Foncarnet', 'Ftoncarnet', 'Ftrecarnet'] as $field): ?>
                                <div>
                                    <img src="get_image.php?id=<?php echo $pet['idRepets']; ?>&field=<?php echo $field; ?>" alt="Foto de Carnet" width="100" height="100" onclick="openModal(this.src)" style="cursor: pointer;">
                                    <input type="file" id="photo_<?php echo $field; ?>" name="photo_<?php echo $field; ?>">
                                    <button type="button" onclick="replacePhoto(<?php echo $pet['idRepets']; ?>, '<?php echo $field; ?>')">Reemplazar</button>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <h4>Reemplazar Fotos Generales</h4>
                        <div id="pet_photos">
                            <?php foreach (['Fpetone', 'Fpetwo', 'Fpetre', 'Fpetfor'] as $field): ?>
                                <div>
                                    <img src="get_image.php?id=<?php echo $pet['idRepets']; ?>&field=<?php echo $field; ?>" alt="Foto de la Mascota" width="100" height="100" onclick="openModal(this.src)" style="cursor: pointer;">
                                    <input type="file" id="photo_<?php echo $field; ?>" name="photo_<?php echo $field; ?>">
                                    <button type="button" onclick="replacePhoto(<?php echo $pet['idRepets']; ?>, '<?php echo $field; ?>')">Reemplazar</button>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <button type="submit">Actualizar Mascota</button>
                        
                        <!-- Confirmación de eliminación de mascota dentro del formulario -->
                        <div id="delete-pet-confirmation" style="margin-top: 15px;">
                            <p>¿Está seguro de que desea eliminar esta mascota? Confirme de nuevo para eliminar.</p>
                            <button type="button" onclick="finalConfirmDeletePet()">Sí, eliminar</button>
                            <button type="button" onclick="clearDeleteMessage()">Cancelar</button>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal para visualización de imagen en tamaño grande -->
    <div id="imageModal" class="modal" onclick="closeModal()">
        <span class="close" onclick="closeModal()">&times;</span>
        <img class="modal-content" id="modalImage">
    </div>

    <script src="../javascript/slider.js"></script>
    <script src="../javascript/UserProfile.js"></script>
    <script src="../javascript/footer.js"></script>

    <script>
    function openModal(src) {
        const modal = document.getElementById('imageModal');
        const modalImg = document.getElementById('modalImage');
        modal.style.display = 'block';
        modalImg.src = src;
    }

    function closeModal() {
        document.getElementById('imageModal').style.display = 'none';
    }

    function showPetDetails(petId) {
        fetch(`get_pet_details.php?pet_id=${petId}`)
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    console.error("Error del servidor:", data.error);
                } else {
                    document.getElementById('pet_id').value = data.idRepets;
                    document.getElementById('pet_name').value = data.Petname;
                    document.getElementById('pet_color').value = data.Color;
                    document.getElementById('pet_weight').value = data.Peso;

                    // Cargar y mostrar las fotos de carnet y generales
                    loadImages(data, petId);
                    document.getElementById('pet-details').style.display = 'block';
                }
            })
            .catch(error => console.error('Error al cargar detalles de la mascota:', error));
    }

    function loadImages(data, petId) {
        const carnetContainer = document.getElementById('carnet_photos');
        const petPhotoContainer = document.getElementById('pet_photos');
        carnetContainer.innerHTML = '';
        petPhotoContainer.innerHTML = '';

        ['Foncarnet', 'Ftoncarnet', 'Ftrecarnet'].forEach(field => {
            if (data[field]) {
                carnetContainer.innerHTML += `<div>
                    <img src="get_image.php?id=${petId}&field=${field}" alt="Foto de carnet" width="100" height="100" onclick="openModal(this.src)" style="cursor: pointer;">
                    <input type="file" id="photo_${field}" name="photo_${field}">
                    <button type="button" onclick="replacePhoto(${petId}, '${field}')">Reemplazar</button>
                </div>`;
            }
        });

        ['Fpetone', 'Fpetwo', 'Fpetre', 'Fpetfor'].forEach(field => {
            if (data[field]) {
                petPhotoContainer.innerHTML += `<div>
                    <img src="get_image.php?id=${petId}&field=${field}" alt="Foto de la mascota" width="100" height="100" onclick="openModal(this.src)" style="cursor: pointer;">
                    <input type="file" id="photo_${field}" name="photo_${field}">
                    <button type="button" onclick="replacePhoto(${petId}, '${field}')">Reemplazar</button>
                </div>`;
            }
        });
    }

    function finalConfirmDeletePet() {
        const petId = document.getElementById('pet_id').value;
        fetch(`delete_pet.php?pet_id=${petId}`, { method: 'GET' })
            .then(response => response.text())
            .then(result => {
                alert(result);
                location.reload();
            })
            .catch(error => console.error('Error al eliminar la mascota:', error));
    }

    function showDeleteConfirmation() {
        document.getElementById('second-confirmation').style.display = 'block';
    }

    function hideDeleteConfirmation() {
        document.getElementById('second-confirmation').style.display = 'none';
    }

    function confirmDeletePet() {
        const petId = document.getElementById('pet_id').value;
        fetch(`delete_pet.php?pet_id=${petId}`, { method: 'GET' })
            .then(response => response.text())
            .then(result => {
                alert(result);
                location.reload();
            })
            .catch(error => console.error('Error al eliminar la mascota:', error));
    }

    function replacePhoto(petId, photoField) {
        const formData = new FormData();
        const fileInput = document.getElementById(`photo_${photoField}`);
        if (fileInput.files.length === 0) {
            alert("Por favor, seleccione una foto para subir.");
            return;
        }

        formData.append('pet_id', petId);
        formData.append('photo_field', photoField);
        formData.append('photo', fileInput.files[0]);

        fetch('replace_photo.php', { method: 'POST', body: formData })
            .then(response => response.text())
            .then(result => {
                alert(result);
                location.reload();
            })
            .catch(error => console.error('Error al reemplazar foto:', error));
    }


    </script>

</body>
</html>
