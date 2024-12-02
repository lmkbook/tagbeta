<?php
    session_start();
    try{
        
        if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['fuesese']) === true){
            include_once('../model/connect.php');
            include_once('../model/segurity.php');
            $user = $_POST['correo'] ?? null;
            $pss = $_POST['contra'] ?? null;
            $mail = MAILHASH;

            $query = Connect::ObtainInstance()->prepare("SELECT `idRusers`, `Pname`, `Psname`, AES_DECRYPT(UNHEX(`Email`), :mailhas), `Pass`, `idRol` FROM `Rusers` WHERE AES_DECRYPT(UNHEX(Email), :hasmail)=:mail");
            $query->bindParam(':mailhas', $mail, PDO::PARAM_STR);
            $query->bindParam(':hasmail', $mail, PDO::PARAM_STR);
            $query->bindParam(':mail', $user, PDO::PARAM_STR);

            if(!$query->execute()){
                $_SESSION['qryerr'] = "ocurrio un error";
                header('Location: ../html/InicioSesion.php');
                exit();
            } else {
                $row = $query->fetch(PDO::FETCH_ASSOC);
                $passw = $row['Pass'];

                if($row === false || !password_verify($pss, $passw)){
                    $_SESSION['usrdeni'] = "Usuario o contraseña incorrecta";
                    header('Location: ../html/InicioSesion.php');
                    exit();
                } else {
                    // Aquí configuramos todas las variables de sesión necesarias
                    $_SESSION['loggedin'] = true; // Asegura que esta variable se configure
                    $_SESSION['iduser'] = $row['idRusers'];
                    $_SESSION['name'] = $row['Pname'];
                    $_SESSION['surname'] = $row['Psname'];

                    // Redirección basada en el rol
                    switch($row['idRol']){
                        case 1:
                            header('Location: ../html/PaginaInicioSesionOn.php');
                            exit();
                        case 2:
                            header('Location: ../html/Pagina.html');
                            exit();
                        case 3:
                            header('Location: ../admin/admin_dashboard.php');
                            exit();
                        default:
                            $_SESSION['errrol'] = "Error: no se encontró una página disponible para este rol";
                            header('Location: ../html/InicioSesion.php');
                            exit();
                            break;
                    }
                }
            }
        }
    }catch(Exception $e){
        error_log("Ocurrio un error en la ejecucion: " . $e->getMessage());
        $_SESSION['ejecuerr'] = "Lo sentimos ocurrio un error inseperado";
        header('Location: ../html/InicioSesion.php');
        exit();
    }
?>