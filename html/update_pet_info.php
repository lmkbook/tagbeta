<?php
session_start();
var_dump($_POST); // Depuración para ver los datos que llegan en POST

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['iduser'])) {
    header("Location: IniciaSesion.php");
    exit();
}

// Resto del código...


include_once('../model/connect.php');
include_once('../model/segurity.php');

try {
    if ($_SERVER["REQUEST_METHOD"] === 'POST') {
        $idUser = $_SESSION['iduser'];
        $petId = $_POST['pet_id'] ?? null;

        // Validar que se haya proporcionado un ID de mascota
        if (!$petId) {
            throw new Exception("ID de la mascota no proporcionado.");
        }

        // Construir la consulta de actualización dinámicamente
        $fieldsToUpdate = [];
        $params = [':petId' => $petId, ':idUser' => $idUser];

        if (!empty($_POST['pet_name'])) {
            $fieldsToUpdate[] = "Petname = :petName";
            $params[':petName'] = $_POST['pet_name'];
        }

        if (!empty($_POST['pet_color'])) {
            $fieldsToUpdate[] = "Color = :petColor";
            $params[':petColor'] = $_POST['pet_color'];
        }

        if (!empty($_POST['pet_weight'])) {
            if ($_POST['pet_weight'] <= 0) {
                throw new Exception("El peso debe ser un valor positivo.");
            }
            $fieldsToUpdate[] = "Peso = :petWeight";
            $params[':petWeight'] = $_POST['pet_weight'];
        }

        // Verificar si hay campos a actualizar
        if (empty($fieldsToUpdate)) {
            throw new Exception("No hay campos para actualizar.");
        }

        // Crear la consulta SQL de actualización dinámica
        $updateQuery = "UPDATE Repets SET " . implode(", ", $fieldsToUpdate) . " WHERE idRepets = :petId AND idRusers = :idUser";
        $stmt = Connect::ObtainInstance()->prepare($updateQuery);

        // Ejecutar la consulta con los parámetros preparados
        if (!$stmt->execute($params)) {
            throw new Exception("Error al actualizar la información de la mascota.");
        }

        // Manejo de archivos subidos (fotografías)
        if (isset($_FILES['pet_photos']) && count($_FILES['pet_photos']['name']) > 0) {
            $allowedTypes = ['image/jpeg', 'image/png'];
            $maxFiles = 4;
            $maxFileSize = 2 * 1024 * 1024; // 2MB

            for ($i = 0; $i < min(count($_FILES['pet_photos']['name']), $maxFiles); $i++) {
                if ($_FILES['pet_photos']['error'][$i] === UPLOAD_ERR_OK) {
                    // Validar tipo y tamaño de archivo
                    if (!in_array($_FILES['pet_photos']['type'][$i], $allowedTypes) || $_FILES['pet_photos']['size'][$i] > $maxFileSize) {
                        throw new Exception("Cada foto debe ser JPEG o PNG y no superar los 2MB.");
                    }

                    // Obtener y guardar el contenido de la imagen
                    $photoData = file_get_contents($_FILES['pet_photos']['tmp_name'][$i]);
                    $photoData = addslashes($photoData);

                    // Insertar la fotografía en la base de datos
                    $insertPhotoQuery = Connect::ObtainInstance()->prepare("INSERT INTO RepetsPhotos (idRepets, Foto) VALUES (:petId, :photoData)");
                    $insertPhotoQuery->bindParam(':petId', $petId, PDO::PARAM_INT);
                    $insertPhotoQuery->bindParam(':photoData', $photoData, PDO::PARAM_LOB);

                    if (!$insertPhotoQuery->execute()) {
                        throw new Exception("Error al subir la fotografía de la mascota.");
                    }
                }
            }
        }

        // Redirigir con mensaje de éxito
        $_SESSION['updatePetSuccess'] = "La información de la mascota se ha actualizado correctamente.";
        header("Location: user_profile.php");
        exit();
    }
} catch (Exception $e) {
    echo "Error al procesar la solicitud: " . $e->getMessage();
    exit();
}
