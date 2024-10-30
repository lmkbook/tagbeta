<?php
header('Content-Type: application/json');
include('../html/conexion.php');

// Consulta para obtener las mascotas perdidas/encontradas
$query = "SELECT nombre, descripcion, tipo, lat, lng, fecha FROM mascotas";
$result = $nsql->query($query);

$mascotas = [];
while ($row = $result->fetch_assoc()) {
    $mascotas[] = $row;
}

echo json_encode($mascotas);
?>
