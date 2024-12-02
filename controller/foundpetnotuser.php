<?php
    try{
        session_start();
        $iduser = $_SESSION['iduser'];
        include_once('../model/connect.php');
        include_once('../model/segurity.php');
        $sql = Connect::ObtainInstance()->prepare("SELECT P.`idPet`, P.`idRepets`, F.`idRusers` FROM `Repets` P INNER JOIN  `Petfound` F ON P.idPet = F.idpet WHERE F.idRusers = :idusr");
        $sql->bindParam(':idusr', $iduser, PDO::PARAM_INT);
        if(!$sql->execute()){
            echo json_encode(['status' => 'error', 'message' => 'Error en la ejecución de la consulta']);
        }else{
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            if($sql->rowCount() >= 1){
                echo json_encode(['status' => 'success', 'message' => 'Alguien notificó que ha encontrado a tu mascota']);            
            }
        }

    }catch(Exception $e){
        error_log("Error en la ejecucion " . $e->getMessage());
        echo json_encode(['status' => 'exepcion', 'message' => 'Ocurrio un error inesperado']);
    }
?>