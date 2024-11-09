<?php
session_start();
include_once('../model/connect.php');

// Verificar si el ID de la imagen y el campo están presentes en la solicitud
if (!isset($_GET['id']) || !isset($_GET['field'])) {
    http_response_code(400);
    echo "Error: Faltan parámetros 'id' o 'field'.";
    exit();
}

// Obtener parámetros de la solicitud
$petId = intval($_GET['id']);
$field = preg_replace('/[^a-zA-Z0-9_]/', '', $_GET['field']); // Sanear el campo

// Verificar si $field es uno de los campos permitidos
$allowedFields = ['Foncarnet', 'Ftoncarnet', 'Ftrecarnet', 'Fpetone', 'Fpetwo', 'Fpetre', 'Fpetfor'];
if (!in_array($field, $allowedFields)) {
    http_response_code(400);
    echo "Error: Campo no permitido.";
    exit();
}

try {
    // Consultar la imagen en la base de datos
    $stmt = Connect::ObtainInstance()->prepare("SELECT $field FROM Repets WHERE idRepets = :id LIMIT 1");
    $stmt->bindParam(':id', $petId, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verificar si se obtuvo la imagen
    if (!$row || empty($row[$field])) {
        http_response_code(404);
        echo "Error: Imagen no encontrada.";
        exit();
    }

    // Crear un nombre único para el archivo temporal
    $tempDir = '../temp_images/';
    if (!file_exists($tempDir)) {
        mkdir($tempDir, 0777, true); // Crear el directorio si no existe
    }
    $tempFile = $tempDir . uniqid('image_') . '.jpg';

    // Guardar el contenido BLOB en el archivo temporal
    file_put_contents($tempFile, $row[$field]);

    // Mostrar la imagen desde el archivo temporal
    header("Content-Type: image/jpeg");
    header("Content-Length: " . filesize($tempFile));
    readfile($tempFile);

    // Opcional: Programar la eliminación del archivo después de un tiempo
    register_shutdown_function(function() use ($tempFile) {
        unlink($tempFile); // Eliminar el archivo temporal
    });
    
} catch (PDOException $e) {
    http_response_code(500);
    echo "Error al cargar la imagen: " . $e->getMessage();
    exit();
}