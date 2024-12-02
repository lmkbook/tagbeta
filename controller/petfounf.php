<?php
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        include_once('../model/connect.php');
        include_once('../model/segurity.php');
        $insert = Connect::ObtainInstance()->prepare("INSERT INTO `SipetFounf` SELECT * FROM `Petfound` WHERE idRepets = :vl1");
        $insert->bindParam(':vl1', $_POST['idp'], PDO::PARAM_INT);
        if(!$insert->execute()){
            $err = $insert->errorInfo();
            error_log("Ocurrio un error al insertar los datos " . $err[2]);
            echo json_encode([
                'status' => 'fail',
                'mse' => 'Ocurrio un error en la consulta'
            ]);
        }else{
            $del = Connect::ObtainInstance()->prepare("DELETE FROM `Petfound` WHERE idRepets = :vl");
            $del->bindParam(':vl', $_POST['idp'], PDO::PARAM_INT);
            if(!$del->execute()){
                $del = $del->errorInfo();
                error_log("Ocurrio un error al insertar los datos " . $err[2]);
                echo json_encode([
                    'status' => 'fail',
                    'mse' => 'Ocurrio un error en la consulta'
                ]);
            }else{
                $delete = Connect::ObtainInstance()->prepare("DELETE FROM `Petperdi` WHERE idRepets = :val");
                $delete->bindParam(':val', $_POST['idp'], PDO::PARAM_INT);
                if(!$delete->execute()){
                    $delete = $delete->errorInfo();
                    error_log("Ocurrio un error al insertar los datos " . $err[2]);
                    echo json_encode([
                        'status' => 'fail',
                        'mse' => 'Ocurrio un error en la consulta'
                    ]);
                }else{
                    echo json_encode([
                        'mse' => 'Nos alegra que hayas encontrado a tu mascota'
                    ]);
                }
            }
        }
    }
?>