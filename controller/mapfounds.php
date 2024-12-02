<?php

    try{

        include_once('../model/connect.php');
        include_once('../model/segurity.php');
        $qery = Connect::ObtainInstance()->prepare("SELECT `Lttd`, `Lngtd` FROM `SipetFounf`");
        if(!$qery->execute()){
            $error = $qery->errorInfo();
            echo htmlspecialchars(trim("Ocurrio un error de ejecucion " . $error[2]));
        }else{
            $yreq = [];
            foreach($qery as $row){
                $yreq[] = $row;
            }
            echo json_encode($yreq);
        }
    }catch(Exception $e){
        echo "Ocurrio un error";
    }

?>