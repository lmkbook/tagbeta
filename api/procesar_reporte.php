<?php
session_start();
include('../html/conexion.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Verificar si es un reporte de mascota perdida o encontrada
    $tipo_reporte = $_POST["tipo_reporte"]; // 'perdida' o 'encontrada'
    $id_mascota = $_POST["id_mascota"];
    $descripcion = $_POST["descripcion"];
    $latitud = $_POST["latitud"];
    $longitud = $_POST["longitud"];
    $contacto = $_POST["contacto"];
    $fecha = $_POST["fecha_reporte"];
    $hora = $_POST["hora_reporte"];

    // Preparar e insertar el reporte en la tabla `reportes_mascotas`
    $stmt = $nsql->prepare("
        INSERT INTO reportes_mascotas (id_mascota, descripcion, fecha, hora, latitud, longitud, contacto, estado)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)
    ");
    $stmt->bind_param("isssddss", $id_mascota, $descripcion, $fecha, $hora, $latitud, $longitud, $contacto, $tipo_reporte);

    // Ejecutar la consulta y manejar el resultado
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => "Reporte de mascota $tipo_reporte guardado exitosamente"]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al guardar el reporte']);
    }

    $stmt->close();
    $nsql->close();
}
?>

