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
            include('../html/conexion.php');
            if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["envi"])){
                $name = $_POST["nombre"];
                $surname = $_POST["apellidos"];
                $doctip = $_POST["doctis"];
                $numdoc = $_POST["numdoc"];
                $fechnaci = $_POST["nacifech"];
                $edad = $_POST["age"];
                $dir = $_POST["direcion"];
                $barr = $_POST["getho"];
                $celnum = $_POST["nmcel"];
                $altercel = $_POST["altcel"];
                $email = $_POST["correo"];
                $city = $_POST["ciudad"];
                $pass = $_POST["passoword"];
                $newuser = $nsql->prepare("SELECT `Ndoc`, `Ncel`, `Nopcel`, `Email` FROM Rusers WHERE Ndoc=? OR Ncel=? OR Nopcel=? OR Email=?");
                $newuser->bind_param("siss", $numdoc, $celnum, $altercel, $email);
                if(!$newuser->execute()){
                    echo htmlspecialchars("Error al ejecutar la consulta");
                }else{
                    $result = $newuser->get_result();
                    if($result->num_rows > 0){
                        echo "<script> const mnsj = document.getElementById('respo');
                        mnsj.innerHTML = '<strong>" . htmlspecialchars("Uno de los registros se encuentra duplicado") . "</strong>';
                        mnsj.scrollIntoView({ behavior: 'smooth', blook: 'center' });
                        setTimeout(function (){
                            mnsj.remove();
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
                        $sepname = explode(" ", $name);
                        $sepsuname = explode(" ", $surname);
                        $onename = $sepname[0];
                        $twoname = $sepname[1];
                        $onesurname = $sepsuname[0];
                        $twosurname = $sepsuname[1];
                        $hash = password_hash($pass, PASSWORD_DEFAULT);
                        $query = $nsql->prepare("INSERT INTO `Rusers`
                        (`Pname`, `Sname`, `Psname`, `Ssname`, `idTpdoc`, `Ndoc`, `Fbirth`, `Edad`, `Address`, `Ncel`, `Barrio`, `Nopcel`, `Email`, `idCiudad`, `Pass`)
                        VALUES
                        (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                        $query->bind_param("ssssissisisssis", $onename, $twoname, $onesurname, $twosurname, $Idtpdoc, $numdoc, $fechnaci, $edad, $dir, $celnum, $barr, $altercel, $email, $idCity, $hash);
                        if(!$query->execute()){
                            echo htmlspecialchars("ERROR AL EJECUTAR LA INSERTAR LOS DATOS");
                        }else{
                            if($altercel !== ''){
                                echo "<script> window.location.href = '../html/pet_registration.php';</script>";
                                exit();
                            }else{
                                $null = $nsql->prepare("SELECT MAX(idRusers) AS max_id FROM `Rusers`");
                                if(!$null->execute()){
                                    echo htmlspecialchars("Error al ejecutar la consulta del id");
                                }else{
                                    $savenull = $null->get_result();
                                    $row = $savenull->fetch_assoc();
                                    $id = $row['max_id'];
                                    $llun = NULL;
                                    $update = $nsql->prepare("UPDATE `Rusers` SET Nopcel=? WHERE idRusers=?");
                                    $update->bind_param("si", $llun, $id);
                                    if(!$update->execute()){
                                        echo htmlspecialchars("ERROR EN LA CONSULTA DE ACUTALIZACION");
                                    }else{
                                        echo "<script> window.location.href = '../html/pet_registration.php';</script>";
                                        exit();
                                    }
                                }   
                            }
                        }
                    }          
                }
            }        
        ?>
    </div>
    <footer>
        <p>&copy; 2024 Tag My Pet. Todos los derechos reservados.</p>
    </footer>
    <div class="slider">
        <div class="slide active" style="background-image: url('../IMG/mascota1.jpg');"></div>
        <div class="slide" style="background-image: url('../IMG/mascota2.jpg');"></div>
        <div class="slide" style="background-image: url('../IMG/mascota3.jpg');"></div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="../javascript/RegistroUsuario.js"></script>
    <script src="../javascript/slider.js"></script> 

    
</body>
</html>

