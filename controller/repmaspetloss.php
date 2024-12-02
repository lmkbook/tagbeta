<?php
    try {
        session_start();
        $iduser = $_SESSION['iduser'];
        if ($_SERVER["REQUEST_METHOD"] === 'POST' && isset($_POST['fuesese'])) {
            include_once('../model/connect.php');
            include_once('../model/segurity.php');
            $longg = filter_var($_POST['longitud'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $latt = filter_var($_POST['latitud'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            if(empty($longg) && empty($latt)){
                $_SESSION['errcodr'] = "Por favor indique en el mapa el lugar en el que se perdio su mascota";
                header('Location: ../html/reporte_mascota_perdida.php');
                exit();
            }else{
                $namepet = $_POST['petname'] ?? null;
                $descrip = $_POST['descripcion'] ?? null;
                $fechrep = $_POST['fecha_reporte'] ?? null;
                $hrarept = $_POST['hora_reporte'] ?? null;
                $continf = $_POST['infcont'] ?? null;
                $query = Connect::ObtainInstance()->prepare("SELECT `idRepets` FROM `Petperdi` WHERE idRepets = :idpet");
                $query->bindParam(':idpet', $namepet, PDO::PARAM_INT);
                if(!$query->execute()){
                    echo htmlspecialchars(trim("Error con las mascota"));
                }else{
                    try{
                        $query->fetch(PDO::FETCH_ASSOC);
                        if($query->rowCount() >= 1){
                            $_SESSION['duplipet'] = "Lo sentimos tu mascota ya se encuentra resgistrada como perdida.";
                            header('Location: ../html/reporte_mascota_perdida.php');
                            exit();
                        }else{
                            $insert = Connect::ObtainInstance()->prepare("INSERT INTO `Petperdi` (`idRusers`,`idRepets`, `Dscpet`, `FchPer`, `hrs`, `lat`, `logit`, `inf`) VALUES (:vl1, :vl2, :vl3, :vl4, :vl5, :vl6, :vl7, :vl8)");
                            $insert->bindParam('vl1', $iduser, PDO::PARAM_INT);
                            $insert->bindParam('vl2', $namepet, PDO::PARAM_INT);
                            $insert->bindParam('vl3', $descrip, PDO::PARAM_STR);
                            $insert->bindParam('vl4', $fechrep, PDO::PARAM_STR);
                            $insert->bindParam('vl5', $hrarept, PDO::PARAM_STR);
                            $insert->bindParam('vl6', $latt, PDO::PARAM_STR);
                            $insert->bindParam('vl7', $longg, PDO::PARAM_STR);
                            $insert->bindParam('vl8', $continf, PDO::PARAM_STR);
                            if(!$insert->execute()){
                                echo htmlspecialchars(trim("Error con el formulario"));
                            }else{
                                $_SESSION['actpet'] = "Tu mascota ha sido activada como perdida lamentamos la perdida de ella.";
                                header('Location: ../html/reporte_mascota_perdida.php');
                                exit();
                            }
                        }
                    }catch(Exception $e){
                        error_log("Error en la inesercion de datos " . $e->getMessage());
                        echo htmlspecialchars(trim("Lamentamos el error vuelve a intentar mas tarde"));
                    }
                }
            }
        }    
    } catch (Exception $e) {
        error_log("Ocurrio un error " . $e->getMessage());
        echo htmlspecialchars(trim("Ocurrio un error inesperado"));
    }
?>
