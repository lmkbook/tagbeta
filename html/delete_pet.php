<?php
// delete_pet.php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['iduser'])) {
    echo "No has iniciado sesión.";
    exit();
}

// Verificar si el parámetro pet_id está presente
if (!isset($_GET['pet_id'])) {
    echo "ID de mascota no especificado.";
    exit();
}

// Obtener el ID de usuario y el ID de la mascota
$idUser = $_SESSION['iduser'];
$petId = $_GET['pet_id'];

// Conectar a la base de datos
include_once('../model/connect.php');

try {
    $db = Connect::ObtainInstance();

    // Verificar que la mascota pertenece al usuario antes de eliminarla
    $checkQuery = $db->prepare("SELECT * FROM Repets WHERE idRepets = :petId AND idRusers = :idUser");
    $checkQuery->bindParam(':petId', $petId, PDO::PARAM_INT);
    $checkQuery->bindParam(':idUser', $idUser, PDO::PARAM_INT);
    $checkQuery->execute();

    if ($checkQuery->rowCount() > 0) {
        // Eliminar registros en fchpets que dependen de esta mascota
        $deleteChildQuery = $db->prepare("DELETE FROM fchpets WHERE idRepets = :petId");
        $deleteChildQuery->bindParam(':petId', $petId, PDO::PARAM_INT);
        $deleteChildQuery->execute();

        // Eliminar la mascota de Repets
        $deleteQuery = $db->prepare("DELETE FROM Repets WHERE idRepets = :petId");
        $deleteQuery->bindParam(':petId', $petId, PDO::PARAM_INT);
        $deleteQuery->execute();

        echo "La mascota y sus registros asociados han sido eliminados exitosamente.";
    } else {
        echo "No tienes permiso para eliminar esta mascota.";
    }
} catch (Exception $e) {
    echo "Error al intentar eliminar la mascota: " . $e->getMessage();
}
?>
