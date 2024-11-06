<?php
    //FUNCION PARA ACCEDER A LAS FOTOS
    function carimg($_fil){ //Parametro que recibe todas las fotos de los campos file
        $ary = array(); //CREACION DEL ARRAY VACIO; $_fil => $_FILES, $campo => name del html[], $info => 'name''type'etc.
        foreach($_fil as $campo => $info){ // Primer bucle accede a los campos del html => $campo, Accede a los arrayas del campo =>$info 
            foreach($info['name'] as $index => $filName){ //Segundo bucle accedee al tipo de dato atraves de idices => $index, Accede al nombre => $filName 
                $ary[$campo][$index] = array( // Creacion del array $campo => Es el campo nombre html : dog[], bacu[], $index => 
                    'name' => $info['name'][$index], //Guarda un array  con el nombre [0], [1]
                    'type' => $info['type'][$index], // tipo de archivo
                    'tmp_name' => $info['tmp_name'][$index], // nombre de ruta temporal
                    'error' => $info['error'][$index], //errores por si se llega a producir uno en el array
                    'size' => $info['size'][$index], //Peso del archivo en bytes
                );
            }
        }
        return $ary;
    }    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/pet_registration.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/PaginaInicioSlider.css">
    <title>REGISTRO DE MASCOTA</title>
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

    <main>
        <div id="container">
        <?php
            try{
                include_once('../model/connect.php');
                include_once('../model/segurity.php');
                $has = MAILHASH;
                session_start();
                $ID = $_SESSION['iduser'];
                echo htmlspecialchars(trim(ucfirst(strtolower($_SESSION['name'])))) . " " . htmlspecialchars(trim(ucfirst(strtolower($_SESSION['surname']))));
                $quey = Connect::ObtainInstance()->prepare("SELECT AES_DECRYPT(UNHEX(`Email`), :hasmail) AS `Correo`, `Nombre`, `Barrio` FROM `Rusers` U INNER JOIN `Ciudad` C ON U.idCiudad=C.idCiudad WHERE idRusers=:id");
                $quey->bindParam(':hasmail', $has, PDO::PARAM_STR);
                $quey->bindParam(':id', $ID, PDO::PARAM_INT);
                if(!$quey->execute()){
                    echo "salio mal";
                }else{
                    $row = $quey->fetch(PDO::FETCH_ASSOC);
                    $correo = $row['Correo'];
                    $name = $row['Nombre'];
                    $barr = $row['Barrio'];
                }

            }catch(Exception $e){
                echo "error";
            }
        ?>
            <div id="container1">
                <h1>TAG MY PET</h1>
                <h2>REGISTRO DE MASCOTA</h2>
            </div>
            <div id="container2">
            <form method="POST" action="#" id="frm" enctype="multipart/form-data">
                    <label for="names"><strong>Nombre(s) Propietario <stron id="ff">*</strong></strong></label>
                    <input type="text" id="names" readonly value="<?php echo htmlspecialchars(trim(ucfirst(strtolower($_SESSION['name'])))) ?>"><br>

                    <label for="surname"><strong>Apellido(s) Propietario <stron id="ff">*</strong></strong></label>
                    <input type="text" id="surname" readonly value="<?php echo htmlspecialchars(trim(ucfirst(strtolower($_SESSION['surname'])))) ?>"><br>

                    <label for="mail"><strong>Correo Electrónico Propietario <stron id="ff">*</strong></strong></label>
                    <input type="email" id="mail" readonly value="<?php echo htmlspecialchars(trim($correo)) ?>"><br>

                    <label for="ciu"><strong>Ciudad <stron id="ff">*</strong></strong></label>
                    <input type="text" id="ciu" readonly value="<?php echo htmlspecialchars(trim(ucfirst(strtolower($name)))) ?>"><br>

                    <label for="barrio"><strong>Barrio <stron id="ff">*</strong></strong></label>
                    <input type="text" id="barrio" readonly value="<?php echo htmlspecialchars(trim(ucfirst(strtolower($barr)))) ?>"><br>

                    <label for="pet_name"><strong>Nombre de Mascota <stron id="ff">*</strong></strong></label>
                    <input type="text" id="pet_name" name="ptname" placeholder="NOMBRE DE MASCOTA" required maxlength="20" pattern="[A-Za-z\s]+"><br>

                    <label for="tipo_mascota"><strong>Tipo de Mascota <stron id="ff">*</strong></strong></label>
                    <select id="tipo_mascota" name="tpmac" required onchange="updateRazaOptions()">
                        <option value="-">-</option>
                        <option value="1">Perro</option>
                        <option value="2">Gato</option>
                    </select><br>

                    <label for="otra_raza"><strong>Especificar Raza <stron id="ff">*</strong></strong></label>
                    <input type="text" id="otra_raza" name="raza" maxlength="20" pattern="[A-Za-z\s]+"><br>

                    <label for="peso"><strong>Peso (KG) <stron id="ff">*</strong></strong></label>
                    <input type="number" id="peso" name="weight" placeholder="PESO EN KG" min="1" max="150" required><br>

                    <label for="color"><strong>Color <stron id="ff">*</strong></strong></label>
                    <input type="text" id="color" name="clor" placeholder="COLOR" required><br>

                    <label for="sexo"><strong>Sexo <stron id="ff">*</strong></strong></label>
                    <select id="sexo" name="sex" required>
                        <option value="-">-</option>
                        <option value="1">Macho</option>
                        <option value="2">Hembra</option>
                    </select><br>

                    <label for="esterilizado"><strong>¿Esterilizado? <stron id="ff">*</strong></strong></label>
                    <select id="esterilizado" name="stril" required>
                        <?php
                            try{
                                include_once('../model/connect.php');
                                $ciiu = Connect::ObtainInstance()->prepare("SELECT `idStrilpets`, `Stril` FROM `Strilpets`");
                                if(!$ciiu->execute()){
                                    echo "<option value='" . htmlspecialchars(trim('-')) . "'>" . htmlspecialchars(trim('No establecido nada')) . "</option>"; 
                                }else{
                                    $syti = $ciiu->fetchAll(PDO::FETCH_ASSOC);
                                    echo "<option value='" . htmlspecialchars(trim('-')) . "'>" . htmlspecialchars(trim('-')) . "</option>";
                                    foreach($syti as $ticy){
                                        echo "<option value='" . htmlspecialchars(trim($ticy['idStrilpets'])) . "'>" . htmlspecialchars(trim($ticy['Stril'])) . "</option>";
                                    }
                                }
                            }catch(Exception $e){
                                error_log("Ocurrio un error: " . $e->getMessage());
                                die("Error");
                            }
                        ?>
                    </select><br>

                    <label for="edad"><strong>Edad <stron id="ff">*</strong></strong></label>
                    <input type="number" id="edad" name="age" placeholder="EDAD" min="0" max="25" required>
                    <input type="number" id="meses" name="months" placeholder="Meses" min="0" max="11" required><br>
                    <small>* Si la mascota tiene menos de un año, coloque "0" en años y especifique los meses.</small><br>

                    <label for="vacunas"><strong>Carnet de Vacunas <stron id="ff">*</strong></strong></label>
                    <input type="file" multiple id="vacunas" name="bacu[]" required><br>

                    <label for="enfermedades"><strong>Enfermedades <stron id="ff">*</strong></strong></label>
                    <textarea id="enfermedades" placeholder="ENFERMEDADES" name="enfer" required></textarea><br>

                    <label for="foto"><strong>Fotografía <stron id="ff">*</strong></strong></label>
                    <input type="file" multiple id="foto" name="dog[]" required multiple><br>
                    <small>* Debe subir un mínimo de 4 fotografías de la mascota.</small><br>

                    <label><input type="checkbox" id="acptdog" required><strong id="dogacpt"> Acepto los <a href="#">Términos</a> y <a href="#">Condiciones de Uso *</a></strong></label><br>

                    <button type="button" id="add_pet" onclick="saveAndResetForm()">Añadir otra Mascota</button><br>
                    <input type="submit" value="FINALIZAR REGISTRO" name="finalize">
                </form>
                <p class="required-note"><strong><stron id="ff">*</strong></strong> Campos obligatorios</p>
            </div>
            <div id="resp">
                <?php
                    try{
                        function mjsjj($msg){
                            echo "<script> const mnje = document.getElementById('resp');
                                mnje.innerHTML = '<strong>" . htmlspecialchars(trim($msg)) . "</strong>';
                                mnje.scrollIntoView({ behavior: 'smooth', block: 'center' });
                                setTimeout(()=>{
                                    mnje.remove();
                                }, 5000) </script>";
                        }
                        if($_SERVER["REQUEST_METHOD"] === 'POST' && isset($_POST['finalize']) === true){
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
                            if(!isset($_FILES['bacu']) && !isset($_FILES['dog'])){
                                echo "No existe niguna foto";
                            }else{
                                try{
                                    // LLAMAR LA FUNCION PARA CARGAR LAS IMAGENES
                                    $imgs = carimg($_FILES);
                                    $bacuOne = $imgs['bacu'][0];
                                    $oneBacu = $bacuOne['tmp_name'];
                                    $bacuTwo = $imgs['bacu'][1];
                                    $twoBacu = $bacuTwo['tmp_name'];
                                    $bacuTree = $imgs['bacu'][2];
                                    $treeBacu = $bacuTree['tmp_name'];
                                    $oneDog = $imgs['dog'][0];
                                    $dogOne = $oneDog['tmp_name'];                                    
                                    $twoDog = $imgs['dog'][1];                                    
                                    $dogTwo = $twoDog['tmp_name'];                                    
                                    $treeDog = $imgs['dog'][2];
                                    $dogTree = $treeDog['tmp_name'];
                                    $forDog = $imgs['dog'][3];
                                    $dofFor = $forDog['tmp_name'];
                                    $oneSave = $dogOne ? addslashes(file_get_contents($dogOne)) : null;
                                    $twoSave = $dogTwo ? addslashes(file_get_contents($dogTwo)) : null;
                                    $treeSave = $dogTree ? addslashes(file_get_contents($dogTree)) : null;
                                    $forSave = $dofFor ? addslashes(file_get_contents($dofFor)) : null;
                                    $saveTree = $treeBacu ? addslashes(file_get_contents($treeBacu)) : null;
                                    $saveTwo = $twoBacu ? addslashes(file_get_contents($twoBacu)) : null;
                                    $saveOne = $oneBacu ? addslashes(file_get_contents($oneBacu)) : null;
                                    $sqli = Connect::ObtainInstance()->prepare("INSERT INTO `Repets`
                                    (`idRusers`, `Petname`, `Raza`, `Peso`, `Color`, `idStrilpets`, `Edad`, `Meses`, `Foncarnet`, `Ftoncarnet`, `Ftrecarnet`, `Disease`, `Fpetone`, `Fpetwo`, `Fpetre`, `Fpetfor`, `idSx`, `idPets`)
                                    VALUES
                                    (:vl1, :vl2, :vl3, :vl4, :vl5, :vl6, :vl7, :vl8, :vl9, :vl10, :vl11, :vl12, :vl13, :vl14, :vl15, :vl16, :vl17, :vl18)");
                                    $sqli->bindParam(':vl1', $ID, PDO::PARAM_INT);
                                    $sqli->bindParam(':vl2', $name, PDO::PARAM_STR);
                                    $sqli->bindParam(':vl3', $raz, PDO::PARAM_STR);
                                    $sqli->bindParam(':vl4', $peso, PDO::PARAM_INT);
                                    $sqli->bindParam(':vl5', $color, PDO::PARAM_STR);
                                    $sqli->bindParam(':vl6', $steril, PDO::PARAM_INT);
                                    $sqli->bindParam(':vl7', $edad, PDO::PARAM_INT);
                                    $sqli->bindParam(':vl8', $meses, PDO::PARAM_INT);
                                    $sqli->bindParam(':vl9', $saveOne, $saveOne === null ? PDO::PARAM_NULL : PDO::PARAM_LOB);
                                    $sqli->bindParam(':vl10', $saveTwo, $saveTwo === null ? PDO::PARAM_NULL : PDO::PARAM_LOB);
                                    $sqli->bindParam(':vl11', $saveTree, $saveTree === null ? PDO::PARAM_NULL : PDO::PARAM_LOB);
                                    $sqli->bindParam(':vl12', $disiase, PDO::PARAM_STR);
                                    $sqli->bindParam(':vl13', $oneSave, $oneSave === null ? PDO::PARAM_NULL : PDO::PARAM_LOB);
                                    $sqli->bindParam(':vl14', $twoSave, $twoSave === null ? PDO::PARAM_NULL : PDO::PARAM_LOB);
                                    $sqli->bindParam(':vl15', $treeSave, $treeSave === null ? PDO::PARAM_NULL : PDO::PARAM_LOB);
                                    $sqli->bindParam(':vl16', $forSave, $forSave === null ? PDO::PARAM_NULL: PDO::PARAM_LOB);
                                    $sqli->bindParam(':vl17', $sexo, PDO::PARAM_INT);
                                    $sqli->bindParam(':vl18', $tpMasc, PDO::PARAM_INT);
                                    if(!$sqli->execute()){
                                        echo "ocurrio un error";
                                    }else{
                                        mjsjj("SU MASCOTA HA SIDO REGISTRADA CON EXITO");
                                    }
                                }catch(Exception $e){
                                    error_log("ERROR AL CARGAR LA IMAGEN " . $e->getMessage());
                                    mjsjj("SE ENCUENTRA UN VALOR NULO EN LAS FOTOS, POR FAVOR VALIDE QUE CUMPLA CON 3 FOTOS DEL CARNET Y 4 FOTOS DE LA MASCOTA");
                                }
                            }

                        }
                    }catch(Exception $e){
                        error_log("ERROR INESPERADO " . $e->getMessage());
                        echo "ERROR INESPERADO";

                    }
                ?>
            </div>
        </div>
    </main>

    <div class="slider">
        <div class="slide active" style="background-image: url('../IMG/mascota1.jpg');"></div>
        <div class="slide" style="background-image: url('../IMG/mascota2.jpg');"></div>
        <div class="slide" style="background-image: url('../IMG/mascota3.jpg');"></div>
    </div>

    <script src="../javascript/slider.js"></script>

    <script src="../javascript/pet_registration.js"></script>
    <script src="../javascript/footer.js"></script>
</body>
</html>
