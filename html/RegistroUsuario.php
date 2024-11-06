<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/RegistroUsuario.css">
    <!-- Este link se conecta con bootstrappara mostrar los iconos de los ojos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/PaginaInicioSlider.css"> <!-- Incluye el CSS -->
    <title>REGISTRO</title>
    <link rel="icon" href="../IMG/favicon.ico" type="image/x-icon">
</head>
<body>
    <?php include('main_header.php'); ?>
    <div id="container">
        <div id="container1">
            <h1>TAG MY PET</h1>
            <h2>REGISTRO USUARIO</h2>
        </div>
        <div id="container2">
            <form method="POST" action="" id="frm">
                <label for="names"><strong>Nombre(s)  <strong class="red">*</strong></strong></label>
                <input type="text" placeholder="NOMBRE/S" name="nombre"  id="names" required maxlength="50" pattern="[A-Za-z\s]+"><br>
    
                <label for="surname"><strong>Apellido(s)  <strong class="red">*</strong></strong></label>
                <input type="text" placeholder="APELLIDO/S" name="apellidos" id="surname" required maxlength="50" pattern="[A-Za-z\s]+"><br>

                <label for="tpdc"><strong>Tipo de Documento  <strong class="red">*</strong></strong></label>
                <select id="tpdc" name="doctis" required onchange="validateDocumentType()">
                    <?php
                        try{
                            include_once('../model/connect.php');
                            $cdel = Connect::ObtainInstance()->prepare("SELECT `idTpdoc`, `Nombre` FROM `Tpdoc` ORDER BY `Nombre` ASC");
                            if(!$cdel->execute()){
                                echo "<option value='" . htmlspecialchars(trim('-')) . "'>" . htmlspecialchars(trim('No ha establecido nada')) . "</option>"; 
                            }else{
                                $svaerow = $cdel->fetchAll(PDO::FETCH_ASSOC);
                                echo "<option value='" . htmlspecialchars(trim('-')) . "'>" . htmlspecialchars(trim('-')) . "</option>";
                                foreach($svaerow as $rowsave){
                                    echo "<option value='" . htmlspecialchars(trim($rowsave['idTpdoc'])) . "'>" . htmlspecialchars(trim($rowsave['Nombre'])) . "</option>";
                                }
                            }
                        }catch(Exception $e){
                            error_log("Ocurrio un error: " . $e->getMessage());
                            die("Error");
                        }
                    ?>
                </select><br>

                <label for="cel"><strong>Número de Documento  <strong class="red">*</strong></strong></label>
                <input type="text" placeholder="NÚMERO DE DOCUMENTO" id="ndoc" name="numdoc" required><br>

                <label for="fcnc"><strong>Fecha de Nacimiento  <strong class="red">*</strong></strong></label>
                <input type="date" id="fcnc" max="2006-01-01" min="1924-01-01" name="nacifech" required onchange="calculateAge()"><br>

                <label for="edad"><strong>Edad  <strong class="red">*</strong></strong></label>
                <input type="number" id="edad" name="age" readonly><br>

                <label for="address"><strong>Dirección de Residencia  <strong class="red">*</strong></strong></label>
                <input type="text" placeholder="DIRECCIÓN DE RESIDENCIA" id="address" name="direcion" required maxlength="50" pattern="[A-Za-z0-9\s]+"><br>

                <label for="barrio"><strong>Barrio <strong class="red">*</strong></strong></label>
                <input type="text" id="barrio" placeholder="BARRIO" name="getho" required maxlength="30" pattern="[A-Za-z0-9\s]+"><br>

                <label for="cel"><strong>Número de Celular  <strong class="red">*</strong></strong></label>
                <input type="tel" placeholder="NÚMERO DE CELULAR" id="cel" name="nmcel" required><br>

                <label for="altcle">Número Alternativo</label>
                <input type="text" placeholder="NÚMERO ALTERNATIVO" id="altcle" name="altcel"><br>

                <label for="mail"><strong>Correo Electrónico  <strong class="red">*</strong></strong></label>
                <input type="email" placeholder="DIRECCIÓN DE CORREO" id="mail" name="correo" required><br>

                <label for="ciu"><strong>Ciudad  <strong class="red">*</strong></strong></label>
                <select id="ciu" name="ciudad" required>
                    <?php
                        try{
                            include_once('../model/connect.php');
                            $ciiu = Connect::ObtainInstance()->prepare("SELECT * FROM `Ciudad` ORDER BY `Nombre` ASC");
                            if(!$ciiu->execute()){
                                echo "<option value='" . htmlspecialchars(trim('-')) . "'>" . htmlspecialchars(trim('No establecido nada')) . "</option>"; 
                            }else{
                                $syti = $ciiu->fetchAll(PDO::FETCH_ASSOC);
                                echo "<option value='" . htmlspecialchars(trim('-')) . "'>" . htmlspecialchars(trim('-')) . "</option>";
                                foreach($syti as $ticy){
                                    echo "<option value='" . htmlspecialchars(trim($ticy['idCiudad'])) . "'>" . htmlspecialchars(trim($ticy['Nombre'])) . "</option>";
                                }
                            }
                        }catch(Exception $e){
                            error_log("Ocurrio un error: " . $e->getMessage());
                            die("Error");
                        }
                    ?>
                </select><br>

                <label for="pass"><strong>Contraseña  <strong class="red">*</strong></strong></label>
                <div class="password-container">
                    <input type="password" id="pass" name="passoword" size="20" placeholder="CONTRASEÑA" required oninput="checkPasswordStrength()">
                    <i class="bi bi-eye-fill" id="xx" onclick="cambiarojo('xx', 'pass')"></i>
                </div>
                <div id="password-rules">
                    <p id="length-rule" class="rule">Al menos 8 caracteres maximo 12</p>
                    <p id="special-rule" class="rule">Al menos un caracter especial valido  $ ¿ ? ¡ ! #  % * + -  & @ </p>
                    <p id="letter-rule" class="rule">Al menos una letra mayúscula o minúscula</p>
                    <p id="number-rule" class="rule">Al menos dos numeros</p>
                </div>
                <br>

                <label for="passwo"><strong>Confirmar Contraseña  <strong class="red">*</strong></strong></label>
                <div class="password-container">
                    <input type="password" placeholder="CONFIRME SU CONTRASEÑA" id="passrw" required>
                    <i class="bi bi-eye-fill" id="ff" onclick="cambiarojo('ff', 'passrw')"></i>
                </div><br>

                <div class="checkbox-group">
                    <label class="lab"><span><input type="checkbox" id="acptdog" required><strong id="acpter"> Acepto los <a href="#">Términos</a> y <a href="#">Condiciones de Uso </a><strong class="red">*</strong></strong></label><br>
                    <label class="lab"><input type="checkbox" id="dogacpt" required><strong id="privacept"> Acepto la <a href="#">Politica de Privacidad</a> y <a href="#">Tratamiento de Datos </a><strong class="red">*</strong></strong></label><br>
                </div>

                <input type="submit" value="Finalizar Registro" name="envi" id="enviado">
            </form>
            <p class="required-note"> <strong class="red">*</strong> Campos obligatorios</p>
        </div>
    </div>
   
    <div class="contenedor"> <!-- No Borrar -->
        <div id="contenedor1">  <!-- No Borrar -->

        </div>
    </div>
    <div id="respo">
        <?php
            try{
                if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["envi"]) === true){
                    include_once('../model/connect.php');
                    include_once('../model/segurity.php');
                    function vermsj($msj){
                        echo "<script> const mnje = document.getElementById('respo');
                        mnje.innerHTML = '<strong>" . htmlspecialchars($msj) . "</strong>';
                        mnje.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        setTimeout(()=>{
                            mnje.remove();
                            window.location.href = '../html/InicioSesion.php';
                        }, 2500) </script>";
                    }
                    function mjsjj($msg){
                        echo "<script> const mnje = document.getElementById('respo');
                            mnje.innerHTML = '<strong>" . htmlspecialchars($msg) . "</strong>';
                            mnje.scrollIntoView({ behavior: 'smooth', block: 'center' });
                            setTimeout(()=>{
                                mnje.remove();
                            }, 5000) </script>";
                    }
                    $name = $_POST["nombre"] ?? null;
                    $surname = $_POST["apellidos"] ?? null;
                    // SEPARADOR POR SI TIENE DOS NOMBRES
                    $sepname = explode(" ", $name);
                    // SEPARADOR POR SI TIENE DOS APELLIDOS
                    $sepsuname = explode(" ", $surname);          
                    $onename = $sepname[0] ?? null; //ACCEDER AL PRIMER NOMBRE
                    $twoname = $sepname[1] ?? null; //ACCEDER AL SEGUNDO NOMBRE
                    $onesurname = $sepsuname[0] ?? null; //ACCEDER AL PRIMER APELLIDO
                    $twosurname = $sepsuname[1] ?? null;  //ACCEDER AL SEGUNDO APELLIDO
                    $doctip = $_POST["doctis"] ?? null;
                    $numdoc = $_POST["numdoc"] ?? null;
                    $fechnaci = $_POST["nacifech"] ?? null;
                    $edad = $_POST["age"] ?? null;
                    $dir = $_POST["direcion"] ?? null;
                    $barr = $_POST["getho"] ?? null;
                    $celnum = $_POST["nmcel"] ?? null;
                    $altercel = $_POST["altcel"] ?? null;
                    $email = $_POST["correo"] ?? null;
                    $city = $_POST["ciudad"] ?? null;
                    $pass = $_POST["passoword"] ?? null;
                    $mailhash = MAILHASH; //contraseña de cifrado para el correo
                    $dochash = DOCHASH; // contraseña de cifrado para el documento
                    //PREPARACION DE LA CONSULTA
                    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                        mjsjj("ESTE CORREO NO ES VALIDO");
                    }
                    $query = Connect::ObtainInstance()->prepare("SELECT AES_DECRYPT(UNHEX(`Ndoc`), :doc), `Ncel`, `Nopcel`, AES_DECRYPT(UNHEX(`Email`), :mail) 
                    FROM `Rusers` WHERE AES_DECRYPT(UNHEX(Ndoc), :dochs)=:val1 OR Ncel=:val2 OR Nopcel=:val3 OR AES_DECRYPT(UNHEX(Email), :mailsh)=:val4");
                    $query->bindValue(':doc', $dochash, PDO::PARAM_STR);
                    $query->bindValue(':mail', $mailhash, PDO::PARAM_STR);
                    $query->bindValue(':dochs', $dochash, PDO::PARAM_STR); 
                    $query->bindValue(':val1', $numdoc, PDO::PARAM_STR);
                    $query->bindValue(':val2', $celnum, PDO::PARAM_INT);
                    $query->bindValue(':val3', $altercel, PDO::PARAM_STR);
                    $query->bindValue(':mailsh', $mailhash, PDO::PARAM_STR);     
                    $query->bindValue(':val4', $email, PDO::PARAM_STR);
                    if(!$query->execute()){
                        echo htmlspecialchars("OCURRIO UN ERROR EN LA EJECUCION");
                    }else{
                        $query->fetchAll(PDO::FETCH_ASSOC);
                        if($query->rowCount() >= 1){
                            mjsjj("EXISTE UN DATO DUPLICADO");
                        }else{
                          
                            try{
                                $hash = password_hash($pass, PASSWORD_DEFAULT);
                                $insert = Connect::ObtainInstance()->prepare("INSERT INTO `Rusers`
                                (`Pname`, `Sname`, `Psname`, `Ssname`, `idTpdoc`, `Ndoc`, `Fbirth`, `Edad`, `Address`, `Ncel`, `Barrio`, `Nopcel`, `Email`, `idCiudad`, `Pass`)
                                VALUES
                                (:vl1, :vl2, :vl3, :vl4, :vl5, HEX(AES_ENCRYPT(:vl6, :dochash)), :vl7, :vl8, :vl9, :vl10, :vl11, :vl12, HEX(AES_ENCRYPT(:vl13, :hasmail)), :vl14, :vl15)");
                                $insert->bindValue(':vl1', $onename, PDO::PARAM_STR);
                                $insert->bindValue(':vl2', $twoname, $twoname === null ? PDO::PARAM_NULL : PDO::PARAM_STR);
                                $insert->bindValue(':vl3', $onesurname, PDO::PARAM_STR);
                                $insert->bindValue(':vl4', $twosurname, $twosurname === null ? PDO::PARAM_NULL : PDO::PARAM_STR);
                                $insert->bindValue(':vl5', $doctip, PDO::PARAM_INT);
                                $insert->bindValue(':vl6', $numdoc, PDO::PARAM_STR);
                                $insert->bindValue(':dochash', $dochash, PDO::PARAM_STR);
                                $insert->bindValue(':vl7', $fechnaci, PDO::PARAM_STR);
                                $insert->bindValue(':vl8', $edad, PDO::PARAM_INT);
                                $insert->bindValue(':vl9', $dir, PDO::PARAM_STR);
                                $insert->bindValue(':vl10', $celnum, PDO::PARAM_INT);
                                $insert->bindValue(':vl11', $barr, PDO::PARAM_STR);
                                $insert->bindValue(':vl12', $altercel, $altercel === null ? PDO::PARAM_NULL : PDO::PARAM_STR);
                                $insert->bindValue(':vl13', $email, PDO::PARAM_STR);
                                $insert->bindValue(':hasmail', $mailhash, PDO::PARAM_STR);
                                $insert->bindValue(':vl14', $city, PDO::PARAM_INT);
                                $insert->bindValue(':vl15', $hash, PDO::PARAM_STR);
                                if(!$insert->execute()){
                                    echo htmlspecialchars("Error al insertar los datos");
                                }else{
                                    if($altercel !== ''){
                                        vermsj("USUARIO REGISTRADO CORRECTAMENTE");
                                    }else{
                                        $maxid = Connect::ObtainInstance()->prepare("SELECT MAX(idRusers) AS id_max FROM Rusers");
                                        if(!$maxid->execute()){
                                            echo htmlspecialchars("Error asociado con el usuario");
                                        }else{
                                            $row = $maxid->fetchAll(PDO::FETCH_ASSOC);
                                            $idd = $row[0]['id_max'];
                                            $update = Connect::ObtainInstance()->prepare("UPDATE Rusers SET Nopcel=:nl WHERE idRusers=:id");
                                            $update->bindValue(':nl', NULL, PDO::PARAM_NULL);
                                            $update->bindValue(':id', $idd, PDO::PARAM_INT);
                                            if(!$update->execute()){
                                                echo htmlspecialchars("Error de usuario");
                                            }else{
                                                vermsj("USUARIO REGISTRADO CORRECTAMENTE");
                                            }
                                        }
                                    }
                                }  
                            }catch(Exception $e){
                                error_log("INESPERADO ERROR: " . $e->getMessage());
                                mjsjj("VAYA OCURRIO UN INESPERADO ERRROR");
                            }                          
                        }
                    }
                }    
            }catch(Exception $e){
                error_log("ERROR INESPERADO: " . $e->getMessage());
                mjsjj("VAYA OCURRIO UN ERROR INESPERADO");
            }
        ?>
    </div>

    <div class="slider">
        <div class="slide active" style="background-image: url('../IMG/mascota1.jpg');"></div>
        <div class="slide" style="background-image: url('../IMG/mascota2.jpg');"></div>
        <div class="slide" style="background-image: url('../IMG/mascota3.jpg');"></div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="../javascript/RegistroUsuario.js"></script>
    <script src="../javascript/slider.js"></script>
    <script src="../javascript/footer.js"></script>                       

    
</body>
</html>

