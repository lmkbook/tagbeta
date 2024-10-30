<?php
include('../html/conexion.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $latitud = $_POST['latitud'];
    $longitud = $_POST['longitud'];
    $descripcion = $_POST['descripcion'];
    $fecha_perdida = $_POST['fecha_perdida'];
    $hora_perdida = $_POST['hora_perdida'];
    // Otros datos...

    $query = $nsql->prepare("INSERT INTO ReportesMascotasPerdidas (latitud, longitud, descripcion, fecha_perdida, hora_perdida) VALUES (?, ?, ?, ?, ?)");
    $query->bind_param("ddsss", $latitud, $longitud, $descripcion, $fecha_perdida, $hora_perdida);
    
    if ($query->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Error al guardar el reporte.']);
    }
}
?>
