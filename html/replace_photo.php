<?php
include_once('../model/connect.php');
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['iduser'])) {
    echo "Error: No ha iniciado sesión.";
    exit();
}

// Verificar si se han proporcionado los datos necesarios
if (!isset($_POST['pet_id'], $_POST['photo_field']) || empty($_FILES['photo']['name'])) {
    echo "No se ha proporcionado la imagen o el ID de la mascota es inválido.";
    exit();
}

$petId = $_POST['pet_id'];
$photoField = strtolower($_POST['photo_field']);  // Usamos minúsculas para el nombre del campo
$userId = $_SESSION['iduser'];
$allowedFields = ['foncarnet', 'ftoncarne', 'ftrecarnet', 'fpetone', 'fpetwo', 'fpetre', 'fpetfor'];

// Validar que el campo de la foto sea permitido
if (!in_array($photoField, $allowedFields)) {
    echo "Campo de foto no válido.";
    exit();
}

// Validar si el archivo es una imagen
if ($_FILES['photo']['error'] !== UPLOAD_ERR_OK || !in_array($_FILES['photo']['type'], ['image/jpeg', 'image/png'])) {
    echo "El archivo debe ser una imagen válida (JPEG o PNG).";
    exit();
}

try {
    // Conectar a la base de datos
    $db = Connect::ObtainInstance();

    // Verificar que la mascota pertenece al usuario actual
    $checkOwnership = $db->prepare("SELECT idrepets FROM repets WHERE idrepets = :petId AND idrusers = :userId");
    $checkOwnership->bindParam(':petId', $petId, PDO::PARAM_INT);
    $checkOwnership->bindParam(':userId', $userId, PDO::PARAM_INT);
    $checkOwnership->execute();

    if ($checkOwnership->rowCount() === 0) {
        echo "Error: No tiene permisos para modificar esta mascota.";
        exit();
    }

    // Procesar la nueva imagen
    $imageData = file_get_contents($_FILES['photo']['tmp_name']);  // Eliminamos addslashes para datos de tipo BLOB

    // Actualizar la foto en la base de datos
    $updatePhoto = $db->prepare("UPDATE repets SET $photoField = :imageData WHERE idrepets = :petId");
    $updatePhoto->bindParam(':imageData', $imageData, PDO::PARAM_LOB);
    $updatePhoto->bindParam(':petId', $petId, PDO::PARAM_INT);

    if ($updatePhoto->execute()) {
        echo "La foto ha sido reemplazada exitosamente.";
    } else {
        echo "Error al reemplazar la foto.";
    }

} catch (Exception $e) {
    echo "Error en la base de datos: " . $e->getMessage();
}
