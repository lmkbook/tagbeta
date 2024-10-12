<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/InicioSesion.css"> <!-- Enlace al CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/PaginaInicioSlider.css"> <!-- Incluye el CSS -->
        <title>Iniciar Sesión - Tag My Pet</title>
        <link rel="icon" href="../IMG/favicon.ico" type="image/x-icon">
    </head>
    
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.html">Inicio</a></li>
                <li><a href="reporte_mascota_perdida.html">Generar Alerta</a></li>
                <li><a href="MascotaEncontradaQueHacer.html">¿Encontraste una Mascota?</a></li>
                <li><a href="comunidad.html">Comunidad</a></li>
                <li><a href="contacto.html">Contáctanos</a></li>
            </ul>
        </nav>
    </header>
    <div class="formulario">
        <form method="POST" action="#" id="form">
            <img src="../IMG/Logo.png" alt="Logo Tag My Pet">
            <h2>¡Bienvenido!</h2>
            <h3>Inicia Sesión</h3>
            <input type="email" class="input1" placeholder="Ingrese su Correo" id="email" name="correo">
            <input type="password" class="passw" placeholder="Ingrese la Contraseña" id="password" name="contra">       
            <input type="submit" value="Iniciar Sesión" class="inicia" id="iniciase" name="fuesese">
            <a href="#" class="olvido_password" id="olvido_password">¿Olvidó su Contraseña?</a>
        </form>
    </div>
    <i class="bi bi-eye-fill" class="ojo" id="ojojo" onclick="togglePassword('ojojo', 'password')">
    <div class="slider">
        <div class="slide active" style="background-image: url('../IMG/mascota1.jpg');"></div>
        <div class="slide" style="background-image: url('../IMG/mascota2.jpg');"></div>
        <div class="slide" style="background-image: url('../IMG/mascota3.jpg');"></div>
    </div>
    <div class="container1"> <!-- No Borrar -->
        <div id="contenedor1">  <!-- No Borrar -->

        </div>
    </div>
    <div id="rpt">
        <?php
        
            function mens($message){
                echo "<script> msj = document.getElementById('rpt');
                msj.innerHTML = '<strong>" . htmlspecialchars($message) . "</strong>';
                setTimeout(()=>{
                    msj.remove();
                }, 5000) </script>";
            }

            if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["fuesese"])=== true){
                include_once('../model/connect.php');
                include_once('../model/segurity.php');
                $user = $_POST["correo"];
                $pass = $_POST["contra"];
                $mailhas = MAILHASH;
                $qury = $sqli->prepare("SELECT `idRusers`, AES_DECRYPT(UNHEX(Email), :pss), `Pass`, `Rol` FROM `Rusers` WHERE AES_DECRYPT(UNHEX(Email), :pss)=:mail");
                $qury->bindParam(':pss', $mailhas, PDO::PARAM_STR);
                $qury->bindParam(':pss', $mailhas, PDO::PARAM_STR);
                $qury->bindParam(':mail', $user, PDO::PARAM_STR);
                if(!$qury->execute()){
                    mens("Error al ejecutar la consulta");
                }else{
                    $row = $qury->fetch(PDO::FETCH_ASSOC);
                    $id = $row['idRusers'];
                    $pasword = $row['Pass'];
                    $rol = $row['Rol'];
                    $menssge = "Credenciales incorrectas";
                    if($row === false || !password_verify($pass, $pasword)){
                        mens($menssge);
                    }else{
                        switch($rol){
                            case 'Usuario':
                                header('Location: ../html/PaginaInicioSesionOn.html');
                                exit();
                                break;
                            case 'Administrador':
                                header('Location: ../html/paginaadmin.html');
                                exit();
                                break;
                            case 'Moderador':
                                header('Location: ../html/paginamoder.html');
                                exit();
                                break;
                            default:
                                mens("Rol no identificado");
                                break;
                        }
                    }
                }
            }
        ?>
    </div>
    <script src="../javascript/InicioSesion.js"></script> <!-- Enlace al JavaScript -->
    <script src="../javascript/slider.js"></script> 
    <script src="../javascript/footer.js"></script>
</body>
</html>
