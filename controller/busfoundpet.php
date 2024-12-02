<?php
    try{
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            include_once('../model/connect.php');
            include_once('../model/segurity.php');
            $hasmail = MAILHASH;
            $sql = Connect::ObtainInstance()->prepare("SELECT `Lttd`, `Lngtd`, `Nmae`, AES_DECRYPT(UNHEX(`Email`), :hs) AS Mail, `Tcle` FROM `Petfound` WHERE idRepets = :ipet");
            $sql->bindParam(':hs', $hasmail, PDO::PARAM_STR);
            $sql->bindParam(':ipet', $_POST['petid'], PDO::PARAM_INT);
            if(!$sql->execute()){
                $err = $sql->errrorInfo();
                error_log("Error en la consulta de el usuario que encontro la mascota " . $err[2]);
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Ocurrio un error codigo 400'
                ]);
            }else{
                $row = $sql->fetch(PDO::PARAM_STR);
                echo json_encode([
                    'lltd' => $row['Lttd'],
                    'lggtd' => $row['Lngtd'],
                    'Nameusrfound' => $row['Nmae'],
                    'Email' => $row['Mail'],
                    'Cel' => $row['Tcle']
                ]);
            }
        }
    }catch(Exception $e){
        error_log("Ocurrio un error al buscar los datos de la persona que econtro la mascota: " . $e->getMessage());
        echo json_encode([
            'status' => 'Error',
            'message' => 'Ocurrio un error en la ejecucion'
        ]);
    }
?>