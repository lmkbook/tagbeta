<?php
session_start();
header('Content-Type: application/json'); // Asegura que la salida sea JSON

include_once('../model/connect.php');
include_once('../model/segurity.php');

// Verificar si el usuario ha iniciado sesión; si no, responde con JSON de error
if (!isset($_SESSION['iduser'])) {
    echo json_encode(['error' => 'Usuario no autenticado']);
    exit();
}

// Verificar que se haya proporcionado el ID de la mascota
if (isset($_GET['pet_id'])) {
    $petId = $_GET['pet_id'];
    $idUser = $_SESSION['iduser'];

    try {
        // Consultar los detalles de la mascota, incluyendo las fotos de carnet y generales
        $query = Connect::ObtainInstance()->prepare("
            SELECT idRepets, Petname, Color, Peso, Foncarnet, Ftoncarnet, Ftrecarnet, Fpetone, Fpetwo, Fpetre, Fpetfor
            FROM Repets
            WHERE idRepets = :petId AND idRusers = :idUser
        ");
        $query->bindParam(':petId', $petId, PDO::PARAM_INT);
        $query->bindParam(':idUser', $idUser, PDO::PARAM_INT);
        $query->execute();
        $petData = $query->fetch(PDO::FETCH_ASSOC);

        if ($petData) {
            // Convertir las fotos en base64 solo si tienen contenido
            $photoFields = ['Foncarnet', 'Ftoncarnet', 'Ftrecarnet', 'Fpetone', 'Fpetwo', 'Fpetre', 'Fpetfor'];
            foreach ($photoFields as $field) {
                if (!empty($petData[$field])) {
                    $petData[$field] = 'data:image/jpeg;base64,' . base64_encode($petData[$field]);
                } else {
                    $petData[$field] = null; // Marcar como nulo si no hay imagen
                }
            }

            echo json_encode($petData); // Enviar datos de la mascota en JSON
            exit();
        } else {
            echo json_encode(['error' => 'Mascota no encontrada']);
            exit();
        }
    } catch (Exception $e) {
        echo json_encode(['error' => 'Error al obtener los detalles de la mascota: ' . $e->getMessage()]);
        exit();
    }
} else {
    echo json_encode(['error' => 'ID de mascota no proporcionado']);
    exit();
}
