<?php
    try{
        session_start();
        $iduser = $_SESSION['iduser'];
        include_once('../model/connect.php');
        include_once('../model/segurity.php');
        $hasmai = MAILHASH;
        $sql = Connect::ObtainInstance()->prepare("SELECT MIN(`idRepets`) AS `idRepets`, AES_DECRYPT(UNHEX(`Email`), :mail) AS `Email` FROM `Petfound` WHERE idRusers = :id GROUP BY idRepets");
        $sql->bindParam(':mail', $hasmai, PDO::PARAM_STR);
        $sql->bindParam(':id', $iduser, PDO::PARAM_INT);
        if(!$sql->execute()){
            $err = $sql->errorInfo();
            error_log("Error en la consulta " . $err[2]);
            echo json_encode([
                'status' => 'Error', 
                'message' => 'Error al buscar las mascotas encotradas'
            ]);
        }else{
            $row = $sql->fetchAll(PDO::FETCH_ASSOC);
            $datos = [];
            foreach($row as $wor){
                $query = Connect::ObtainInstance()->prepare("SELECT `idRepets`, `Petname` FROM `Repets` WHERE idRepets = :idpet");
                $query->bindParam(':idpet', $wor['idRepets'], PDO::PARAM_INT);
                $query->execute();
                $result = $query->fetch(PDO::FETCH_ASSOC);
                $datos[] = [
                    'idpet' => $result['idRepets'],
                    'namepet' => $result['Petname'],
                    'mailfound' => $wor['Email']
                ];
            
            }
            echo json_encode([
                'status' => 'successfully', 
                'message' => 'Se encontraron las mascotas con exito',
                'data' => $datos
            ]);
        }

    }catch(Exception $e){
        error_log("Error en la ejecucion " . $e->getMessage());
        echo json_encode([
            'status' => 'excepcion', 'message' => 'Ocurrio un error inesperado'
        ]);
    }
?>
