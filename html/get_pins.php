<?php
include('../html/conexion.php');

// Consultar datos de mascotas perdidas y encontradas
$lostQuery = "SELECT 'lost' AS type, pet_id, name, description, latitud, longitud FROM lost_pets";
$foundQuery = "SELECT 'found' AS type, pet_id, name, description, latitud, longitud FROM found_pets";

$resultLost = $nsql->query($lostQuery);
$resultFound = $nsql->query($foundQuery);

$pins = [];
if ($resultLost) {
    while ($row = $resultLost->fetch_assoc()) {
        $pins[] = $row;
    }
}
if ($resultFound) {
    while ($row = $resultFound->fetch_assoc()) {
        $pins[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($pins);
?>
