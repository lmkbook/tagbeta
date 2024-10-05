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
                    <option value="">-</option>
                    <option value="CC">Cédula de Ciudadanía</option>
                    <option value="Pasaporte">Pasaporte</option>
                    <option value="CEX">Cédula de Extranjería</option>
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
                    <option value="">-</option>
                    <option value="Bogotá">Bogotá</option>
                    <option value="Soacha">Soacha</option>
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

                <input type="submit" value="Registra a tu mascota" name="envi" id="enviado">
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
                    $name = $_POST["nombre"] ?? null;
                    $surname = $_POST["apellidos"] ?? null;
                    // SEPARADOR POR SI TIENE DOS NOMBRES
                    $sepname = explode(" ", $name);
                    $sepsuname = explode(" ", $surname);
                    // SEPARADOR POR SI TIENE DOS APELLIDOS
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
                    //PREPARACION DE LA CONSULTA
                    $query = $sqli->prepare("SELECT `Ndoc`, `Ncel`, `Nopcel`, AES_DECRYPT(UNHEX(Email),?) 
                    FROM `Rusers` 
                    WHERE Ndoc=? 
                    OR Ncel=? 
                    OR Nopcel=? 
                    OR AES_DECRYPT(UNHEX(Email),?) = ?");
                    //EXPIFICACION DE LOS PARAMETROS PARA LA CONSULTA
                    $query->bind_param("ssisss", $mailhash, $numdoc, $celnum, $altercel, $mailhash, $email);
                    //EJECUCION DE LA CONSULTA
                    if(!$query->execute()){
                        echo htmlspecialchars("Error en la ejecucion de busqueda");
                        exit();
                    }else{
                        $row = $query->get_result();
                        if($row->num_rows > 0){
                            echo "<script> const mnsj = document.getElementById('respo');
                            mnsj.innerHTML = '<strong>" . htmlspecialchars("UNO DE LOS REGISTROS SE ENCUENTRA DUPLICADO") . "</strong>';
                            mnsj.scrollIntoView({ behavior: 'smooth', blook: 'center' });
                            setTimeout(function (e){
                                mnsj.remove();
                                e.preventDefault();
                            }, 4000) </script>";
                        }else{
                            switch($doctip){
                                case "CC":
                                    $Idtpdoc = 1;
                                    break;
                                case "Pasaporte":
                                    $Idtpdoc = 2;
                                    break;
                                case "CEX":
                                    $Idtpdoc = 3;
                                    break;
                                default:
                                    echo htmlspecialchars("No selecciono nigun tipo de documento");
                                    break;
                            }
                            switch($city){
                                case "Bogotá":
                                    $idCity = 1;
                                    break;
                                case "Soacha":
                                    $idCity = 2;
                                    break;
                                default:
                                    echo htmlspecialchars("NO HA SELECCIONADO NINGUNA CIUDAD");
                                    break;
                            }
                            try{
                                $hash = password_hash($pass, PASSWORD_DEFAULT);
                                $insert = $sqli->prepare("INSERT INTO `Rusers`
                                (`Pname`, `Sname`, `Psname`, `Ssname`, `idTpdoc`, `Ndoc`, `Fbirth`, `Edad`, `Address`, `Ncel`, `Barrio`, `Nopcel`, `Email`, `idCiudad`, `Pass`)
                                VALUES
                                (?,?,?,?,?,?,?,?,?,?,?,?,HEX(AES_ENCRYPT(?,?)),?,?)");
                                $insert->bind_param("ssssissisissssis", $onename, $twoname, $onesurname, $twosurname, $Idtpdoc, $numdoc, $fechnaci, $edad, $dir, $celnum, $barr, $altercel, $email, $mailhash, $idCity, $hash);
                                if(!$insert->execute()){
                                    echo htmlspecialchars("ERROR AL INTRODUCIR EL USUARIO");
                                    exit();
                                }else{
                                    if($altercel !== ''){
                                        echo "<script> const mnsj = document.getElementById('respo');
                                        mnsj.innerHTML = '<strong>" . htmlspecialchars("EL USUARIO SE HA REGISTRADO CORRECTAMENTE") . "</strong>';
                                        mnsj.scrollIntoView({ behavior: 'smooth', blook: 'center' });
                                        setTimeout(function (){
                                            mnsj.remove();
                                            window.location.href = '../html/InicioSesion.html';
                                        }, 4000) </script>";
                                    }else{
                                        $null = $sqli->prepare("SELECT MAX(idRusers) AS max_id FROM `Rusers`");
                                        if(!$null->execute()){
                                            echo htmlspecialchars("Error al ejecutar la consulta del id");
                                        }else{
                                            $savenull = $null->get_result();
                                            $row = $savenull->fetch_assoc();
                                            $id = $row['max_id'];
                                            $llun = NULL;
                                            $update = $sqli->prepare("UPDATE `Rusers` SET Nopcel=? WHERE idRusers=?");
                                            $update->bind_param("si", $llun, $id);
                                            if(!$update->execute()){
                                                echo htmlspecialchars("ERROR EN LA CONSULTA DE ACUTALIZACION");
                                            }else{
                                                echo "<script> const mnsj = document.getElementById('respo');
                                                mnsj.innerHTML = '<strong>" . htmlspecialchars("EL USUARIO SE HA REGISTRADO CORRECTAMENTE") . "</strong>';
                                                mnsj.scrollIntoView({ behavior: 'smooth', blook: 'center' });
                                                setTimeout(function (){
                                                    mnsj.remove();
                                                    window.location.href = '../html/InicioSesion.html';
                                                }, 4000) </script>";
                                            }
                                        }   
                                    }
                                }    
                            }catch(Exception $e){
                                die("Error: " . $e->getMessage());
                            }
                        }
                    }
                }
            }catch(Exception $e){
                die("ERROR INSEPERADO: " . $e->getMessage());
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
