<?php
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        try{
            include_once('../model/connect.php');
            include_once('../model/segurity.php');
            $del = Connect::ObtainInstance()->prepare("DELETE FROM `Petfound` WHERE idRepets = :vl");
            $del->bindParam(':vl', $_POST['idPet'], PDO::PARAM_STR);
            if(!$del->execute()){
                $err = $del->errorInfo();
                error_log("Ocurrio un error al borrar los datos " . $err[2]);
                echo json_encode([
                    'status' => 'fail',
                    'mnsje' => 'Ocurrio un error en la consulta'
                ]);
            }else{
                echo json_encode([
                    'status' => 'fully',
                    'mnsje' => 'Lamentamos que aun no hayas encontrado a tu mascota'
                ]);
            }
        }catch(Exception $e){
            error_log("Ocurrio un error con la ejecucion " . $e->getMessage());
            echo json_encode([
                'status' => 'error',
                'mode' => 'exeption',
                'mnsje' => 'Ocurrio un error inesperado'
            ]);
        }
    }
?>