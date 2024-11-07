<?php
    session_start();
    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['actuser']) === true){
        include_once('../model/connect.php');
        include_once('../model/segurity.php');
        $dochash = MAILHASH;
        $id = $_SESSION['iduser'];
        $nme = $_POST['name'] ?? null;
        $email = $_POST['email'] ?? null;
        $cel = $_POST['phone'] ?? null;
        $quey = Connect::ObtainInstance()->prepare("UPDATE `Rusers` SET Pname = :nom, Email = HEX(AES_ENCRYPT(:email, :hasmail)), Ncel = :cel WHERE idRusers = :id");
        $quey->bindParam(':nom', $nme, PDO::PARAM_STR);
        $quey->bindParam(':email', $email, PDO::PARAM_STR);
        $quey->bindParam(':hasmail', $dochash, PDO::PARAM_STR);
        $quey->bindParam(':cel', $cel, PDO::PARAM_INT);
        $quey->bindParam(':id', $id, PDO::PARAM_INT);
        if(!$quey->execute()){
            $errorInfo = $info->errorInfo();
            echo htmlspecialchars(trim("Error en la consulta: " . $errorInfo[2]));
        }else{
            $_SESSION['actuExito'] = '';
            header('Location: ../html/user_profile.php');
            exit();
            
        }
    } else {
    // Si no es una solicitud POST, redirigir de vuelta al formulario
        header('Location: ../html/user_profile.php');
        exit();
    }
    
?>