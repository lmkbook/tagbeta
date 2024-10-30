<?php
header("Content-Type: application/json");
include('../html/conexion.php');

// Inicializamos el array para almacenar mascotas perdidas y encontradas
$mascotas = [
    "perdidas" => [],
    "encontradas" => []
];

try {
    // Consulta para mascotas perdidas
    $queryPerdidas = $nsql->prepare("SELECT id, nombre, tipo, descripcion, latitud, longitud, 'perdida' AS estado FROM mascotas_perdidas");
    $queryPerdidas->execute();
    $resultPerdidas = $queryPerdidas->get_result();

    // Almacenar resultados de mascotas perdidas
    while ($row = $resultPerdidas->fetch_assoc()) {
        $mascotas["perdidas"][] = [
            "id" => $row["id"],
            "nombre" => $row["nombre"],
            "tipo" => $row["tipo"],
            "descripcion" => $row["descripcion"],
            "latitud" => $row["latitud"],
            "longitud" => $row["longitud"],
            "estado" => $row["estado"]
        ];
    }

    // Consulta para mascotas encontradas
    $queryEncontradas = $nsql->prepare("SELECT id, nombre, tipo, descripcion, latitud, longitud, 'encontrada' AS estado FROM mascotas_encontradas");
    $queryEncontradas->execute();
    $resultEncontradas = $queryEncontradas->get_result();

    // Almacenar resultados de mascotas encontradas
    while ($row = $resultEncontradas->fetch_assoc()) {
        $mascotas["encontradas"][] = [
            "id" => $row["id"],
            "nombre" => $row["nombre"],
            "tipo" => $row["tipo"],
            "descripcion" => $row["descripcion"],
            "latitud" => $row["latitud"],
            "longitud" => $row["longitud"],
            "estado" => $row["estado"]
        ];
    }

    // Devolver los datos en formato JSON
    echo json_encode(["success" => true, "data" => $mascotas]);
} catch (Exception $e) {
    // En caso de error, devolvemos un mensaje de error
    echo json_encode(["success" => false, "message" => "Error al obtener datos de mascotas"]);
}
?>
