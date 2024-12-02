<?php
    try{
        include_once('../model/connect.php');
        include_once('../model/segurity.php');
        $hasemail = MAILHASH;
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $query = Connect::ObtainInstance()->prepare("SELECT `idPet`, `Petname` FROM `Repets` WHERE idPet= :petid");
            $query->bindParam(':petid', $_POST['idmacot'], PDO::PARAM_STR);
            if(!$query->execute()){
                $err = $query->errorInfo();
                error_log("Ocurrion un error " . $err[2]);
                echo htmlspecialchars(trim("Lo sentimos ocurrio un error en la consulta"));
            }else{
                $rws = $query->fetch(PDO::FETCH_ASSOC);
                if($query->rowCount() <= 0){
                    echo htmlspecialchars(trim("Lo lamentamos este id no se encuntra registrado"));
                }else{
                    if(!filter_var($_POST['ctemail'], FILTER_VALIDATE_EMAIL)){
                        echo htmlspecialchars(trim("Este correo electronico no es valido"));
                    }else{
                        $co = Connect::ObtainInstance()->prepare("SELECT AES_DECRYPT(UNHEX(`Email`), :hs) AS Email, `Tcle` FROM `Petfound` WHERE AES_DECRYPT(UNHEX(`Email`), :ahs) = :mail OR Tcle = :tl");
                        $co->bindParam(':hs', $hasemail, PDO::PARAM_STR);
                        $co->bindParam(':ahs', $hasemail, PDO::PARAM_STR);
                        $co->bindParam(':mail', $_POST['ctemail'], PDO::PARAM_STR);
                        $co->bindParam(':tl', $_POST['ctphone'], PDO::PARAM_INT);
                        $co->execute();
                        if($co->rowCount() >= 1){
                            echo htmlspecialchars(trim("Ya has reportado que encontraste a la mascota " . $rws['Petname']));
                        }else{
                            $busq = Connect::ObtainInstance()->prepare("SELECT P.`idRepets` AS `petsid`, P.`Petname`, U.`idRusers` AS `idusr`, U.`Pname` FROM `Repets` P INNER JOIN `Rusers` U ON P.idRusers = U.idRusers WHERE idPet = :petid");
                            $busq->bindParam(':petid', $_POST['idmacot'], PDO::PARAM_STR);
                            if(!$busq->execute()){
                                $error = $busq->errorInfo();
                                error_log("Error en la consulta " . $error[2]);
                                echo htmlspecialchars(trim("Lo sentimos ocurrio un error en la consulta"));
                            }else{
                                try{
                                    $row = $busq->fetch(PDO::FETCH_ASSOC);
                                    $idusr = $row['idusr'];
                                    $ipt = $row['petsid'];
                                    $nameusr = $row['Pname'];
                                    $petname = $row['Petname'];
                                    $insert = Connect::ObtainInstance()->prepare("INSERT INTO `Petfound` (`idRusers`, `idRepets`, `Lttd`, `Lngtd`, `Nmae`, `Email`, `Tcle`, `idpet`) VALUES (:vl1, :vl2, :vl3, :vl4, :vl5, HEX(AES_ENCRYPT(:vl6, :has)), :vl7, :vl8)");
                                    $insert->bindParam(':vl1', $idusr, PDO::PARAM_INT);
                                    $insert->bindParam(':vl2', $ipt, PDO::PARAM_INT);
                                    $insert->bindParam(':vl3', $_POST['ltt'], PDO::PARAM_STR);
                                    $insert->bindParam(':vl4', $_POST['lngtd'], PDO::PARAM_STR);
                                    $insert->bindParam(':vl5', $_POST['ctname'], PDO::PARAM_STR);
                                    $insert->bindParam(':vl6', $_POST['ctemail'], PDO::PARAM_STR);
                                    $insert->bindParam(':has', $hasemail, PDO::PARAM_STR);
                                    $insert->bindParam(':vl7', $_POST['ctphone'], PDO::PARAM_INT);
                                    $insert->bindParam(':vl8', $_POST['idmacot'], PDO::PARAM_STR);
                                    if(!$insert->execute()){
                                        $rro = $insert->errorInfo();
                                        error_log("Ocurrio un error al insertar los datos " . $rro[2]);
                                        echo htmlspecialchars(trim("Lo sentimos ocurrio un error en la consulta"));
                                    }else{  
                                        echo htmlspecialchars(trim("Le avisaremos a" . " " . $nameusr . " " . "que su mascota" . " " . $petname . " " . "ha sido encontrada"));
                                    }
                                }catch(Exception $e){
                                    error_log("Error inesperado " . $e->getMessage());
                                    echo htmlspecialchars(trim("Error insesperado"));
                                }
                            }
                        }

                    }
                }
            }
        }
    }catch(Exception $e){
        error_log("Ocurrio un error inesperado " . $e->getMessage());
        echo htmlspecialchars(trim("Insesperado error"));
    }
?>