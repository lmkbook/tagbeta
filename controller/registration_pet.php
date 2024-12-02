<?php
    try {
        session_start();
        $ID = $_SESSION['iduser'];
        function carimg($_fil) { 
            $ary = array();
            foreach ($_fil as $campo => $info) { 
                foreach ($info['name'] as $index => $filName) { 
                    $ary[$campo][$index] = array(
                        'name' => $info['name'][$index],
                        'type' => $info['type'][$index],
                        'tmp_name' => $info['tmp_name'][$index],
                        'error' => $info['error'][$index],
                        'size' => $info['size'][$index],
                    );
                }
            }
            return $ary;
        } 
        if ($_SERVER["REQUEST_METHOD"] === 'POST' && isset($_POST['finalize'])) {
            include_once('../model/connect.php');
            include_once('../model/segurity.php');
            $name = $_POST['ptname'] ?? null;
            $tpMasc = $_POST['tpmac'] ?? null;
            $raz = $_POST['raza'] ?? null;
            $peso = $_POST['weight'] ?? null;
            $color = $_POST['clor'] ?? null;
            $sexo = $_POST['sex'] ?? null;
            $steril = $_POST['stril'] ?? null;
            $edad = $_POST['age'] ?? null;
            $meses = $_POST['months'] ?? null;
            $disiase = $_POST['enfer'] ?? null;
            $idpet = $_POST['idUnic'] ?? null;
            if (!isset($_FILES['bacu']) && !isset($_FILES['dog'])) {
                $_SESSION['Nofto'] =  "No existe ninguna foto";
                header('Location: ../html/pet_registration.php');
                exit();
            } else {
                try {
                    $query = Connect::ObtainInstance()->prepare("SELECT `idPet` FROM `Repets` WHERE idPet = :petid");
                    $query->bindParam(':petid', $idpet, PDO::PARAM_STR);
                    $query->execute();
                    $query->fetch(PDO::FETCH_ASSOC);
                    if($query->rowCount() >= 1){
                        $_SESSION['idocu'] = "El Id unico de la mascota se encuentra ocupado";
                        header('Location: ../html/pet_registration.php');
                        exit();
                    }else{
                        $imgs = carimg($_FILES);
                        $bacuOne = isset($imgs['bacu'][0]['tmp_name']) ? file_get_contents($imgs['bacu'][0]['tmp_name']) : null;
                        $bacuTwo = isset($imgs['bacu'][1]['tmp_name']) ? file_get_contents($imgs['bacu'][1]['tmp_name']) : null;
                        $bacuTree = isset($imgs['bacu'][2]['tmp_name']) ? file_get_contents($imgs['bacu'][2]['tmp_name']) : null;
                        $oneDog = isset($imgs['dog'][0]['tmp_name']) ? file_get_contents($imgs['dog'][0]['tmp_name']) : null;
                        $twoDog = isset($imgs['dog'][1]['tmp_name']) ? file_get_contents($imgs['dog'][1]['tmp_name']) : null;
                        $treeDog = isset($imgs['dog'][2]['tmp_name']) ? file_get_contents($imgs['dog'][2]['tmp_name']) : null;
                        $forDog = isset($imgs['dog'][3]['tmp_name']) ? file_get_contents($imgs['dog'][3]['tmp_name']) : null;
                        $sqli = Connect::ObtainInstance()->prepare("INSERT INTO `Repets`
                        (`idRusers`, `Petname`, `Raza`, `Peso`, `Color`, `idStrilpets`, `Edad`, `Meses`, `Foncarnet`, `Ftoncarnet`, `Ftrecarnet`, `Disease`, `Fpetone`, `Fpetwo`, `Fpetre`, `Fpetfor`, `idSx`, `idPets`, `idPet`)
                        VALUES
                        (:vl1, :vl2, :vl3, :vl4, :vl5, :vl6, :vl7, :vl8, :vl9, :vl10, :vl11, :vl12, :vl13, :vl14, :vl15, :vl16, :vl17, :vl18, :vl19)");
                        $sqli->bindParam(':vl1', $ID, PDO::PARAM_INT);
                        $sqli->bindParam(':vl2', $name, PDO::PARAM_STR);
                        $sqli->bindParam(':vl3', $raz, PDO::PARAM_STR);
                        $sqli->bindParam(':vl4', $peso, PDO::PARAM_INT);
                        $sqli->bindParam(':vl5', $color, PDO::PARAM_STR);
                        $sqli->bindParam(':vl6', $steril, PDO::PARAM_INT);
                        $sqli->bindParam(':vl7', $edad, PDO::PARAM_INT);
                        $sqli->bindParam(':vl8', $meses, PDO::PARAM_INT);
                        $sqli->bindParam(':vl9', $bacuOne, PDO::PARAM_LOB);
                        $sqli->bindParam(':vl10', $bacuTwo, PDO::PARAM_LOB);
                        $sqli->bindParam(':vl11', $bacuTree, PDO::PARAM_LOB);
                        $sqli->bindParam(':vl12', $disiase, PDO::PARAM_STR);
                        $sqli->bindParam(':vl13', $oneDog, PDO::PARAM_LOB);
                        $sqli->bindParam(':vl14', $twoDog, PDO::PARAM_LOB);
                        $sqli->bindParam(':vl15', $treeDog, PDO::PARAM_LOB);
                        $sqli->bindParam(':vl16', $forDog, PDO::PARAM_LOB);
                        $sqli->bindParam(':vl17', $sexo, PDO::PARAM_INT);
                        $sqli->bindParam(':vl18', $tpMasc, PDO::PARAM_INT);
                        $sqli->bindParam(':vl19', $idpet, PDO::PARAM_STR);
                        if ($sqli->execute()) {
                            $_SESSION['mscregi'] = "Su mascota se registro con exito";
                            header('Location: ../html/pet_registration.php');
                            exit();
                        } else {
                            $_SESSION['errje'] = "Ocurrió un error al registrar la mascota";
                            header('Location: ../html/pet_registration.php');
                            exit();
                        }
                    }
                } catch (Exception $e) {
                    error_log("Error al cargar la imagen: " . $e->getMessage());
                    $_SESSION['catcherr'] = "Error al procesar las imágenes";
                    header('Location: ../html/pet_registration.php');
                    exit();
                }
            }
        }
    } catch (Exception $e) {
        error_log("Error inesperado: " . $e->getMessage());
        $_SESSION['rroerr'] = "ERROR INESPERADO";
        header('Location: ../html/pet_registration.php');
        exit();
    }
?>