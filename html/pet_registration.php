<?php
    // FUNCION PARA ACCEDER A LAS FOTOS
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

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/pet_registration.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/PaginaInicioSlider.css">
    <title>REGISTRO DE MASCOTA</title>
    <link rel="icon" href="../IMG/favicon.ico" type="image/x-icon">
</head>
<body>
    <?php include('main_header.php'); ?>

    <main>
        <div id="container">
        <?php
            try {
                include_once('../model/connect.php');
                include_once('../model/segurity.php');
                $has = MAILHASH;
                $ID = $_SESSION['iduser'];
                echo "Bienvenido " . htmlspecialchars(trim(ucfirst(strtolower($_SESSION['name'])))) . " " . htmlspecialchars(trim(ucfirst(strtolower($_SESSION['surname'])))) . ", por favor registra a tu amigo de cuatro patas.";

                $quey = Connect::ObtainInstance()->prepare("SELECT AES_DECRYPT(UNHEX(`Email`), :hasmail) AS `Correo`, `Nombre`, `Barrio` FROM `Rusers` U INNER JOIN `Ciudad` C ON U.idCiudad=C.idCiudad WHERE idRusers=:id");
                $quey->bindParam(':hasmail', $has, PDO::PARAM_STR);
                $quey->bindParam(':id', $ID, PDO::PARAM_INT);
                if (!$quey->execute()) {
                    echo "Error en la consulta.";
                } else {
                    $row = $quey->fetch(PDO::FETCH_ASSOC);
                    $correo = $row['Correo'];
                    $name = $row['Nombre'];
                    $barr = $row['Barrio'];
                }

            } catch(Exception $e) {
                echo "Error en la conexión o consulta: " . $e->getMessage();
            }
        ?>
            <div id="container1">
                <h1>TAG MY PET</h1>
                <h2>REGISTRO DE MASCOTA</h2>
            </div>
            <div id="container2">
            <form method="POST" action="#" id="frm" enctype="multipart/form-data">
                <!-- Formulario de entrada -->
                <label for="names"><strong>Nombre(s) Propietario <strong id="ff">*</strong></strong></label>
                <input type="text" id="names" readonly value="<?php echo htmlspecialchars(trim(ucfirst(strtolower($_SESSION['name'])))) ?>"><br>

                <label for="surname"><strong>Apellido(s) Propietario <strong id="ff">*</strong></strong></label>
                <input type="text" id="surname" readonly value="<?php echo htmlspecialchars(trim(ucfirst(strtolower($_SESSION['surname'])))) ?>"><br>

                <label for="mail"><strong>Correo Electrónico Propietario <strong id="ff">*</strong></strong></label>
                <input type="email" id="mail" readonly value="<?php echo htmlspecialchars(trim($correo)) ?>"><br>

                <label for="ciu"><strong>Ciudad <strong id="ff">*</strong></strong></label>
                <input type="text" id="ciu" readonly value="<?php echo htmlspecialchars(trim(ucfirst(strtolower($name)))) ?>"><br>

                <label for="barrio"><strong>Barrio <strong id="ff">*</strong></strong></label>
                <input type="text" id="barrio" readonly value="<?php echo htmlspecialchars(trim(ucfirst(strtolower($barr)))) ?>"><br>

                <label for="pet_name"><strong>Nombre de Mascota <strong id="ff">*</strong></strong></label>
                <input type="text" id="pet_name" name="ptname" placeholder="NOMBRE DE MASCOTA" required maxlength="20" pattern="[A-Za-z\s]+"><br>

                <label for="tipo_mascota"><strong>Tipo de Mascota <strong id="ff">*</strong></strong></label>
                <select id="tipo_mascota" name="tpmac" required>
                    <option value="-">-</option>
                    <option value="1">Perro</option>
                    <option value="2">Gato</option>
                </select><br>

                <label for="otra_raza"><strong>Especificar Raza <strong id="ff">*</strong></strong></label>
                <input type="text" id="otra_raza" name="raza" maxlength="20" pattern="[A-Za-z\s]+"><br>

                <label for="peso"><strong>Peso (KG) <strong id="ff">*</strong></strong></label>
                <input type="number" id="peso" name="weight" placeholder="PESO EN KG" min="1" max="150" required><br>

                <label for="color"><strong>Color <strong id="ff">*</strong></strong></label>
                <input type="text" id="color" name="clor" placeholder="COLOR" required><br>

                <label for="sexo"><strong>Sexo <strong id="ff">*</strong></strong></label>
                <select id="sexo" name="sex" required>
                    <option value="-">-</option>
                    <option value="1">Macho</option>
                    <option value="2">Hembra</option>
                </select><br>

                <label for="esterilizado"><strong>¿Esterilizado? <strong id="ff">*</strong></strong></label>
                <select id="esterilizado" name="stril" required>
                    <?php
                        try {
                            $ciiu = Connect::ObtainInstance()->prepare("SELECT `idStrilpets`, `Stril` FROM `Strilpets`");
                            if (!$ciiu->execute()) {
                                echo "<option value='-'>No establecido</option>"; 
                            } else {
                                $syti = $ciiu->fetchAll(PDO::FETCH_ASSOC);
                                echo "<option value='-'>-</option>";
                                foreach ($syti as $ticy) {
                                    echo "<option value='" . htmlspecialchars(trim($ticy['idStrilpets'])) . "'>" . htmlspecialchars(trim($ticy['Stril'])) . "</option>";
                                }
                            }
                        } catch(Exception $e) {
                            error_log("Error al obtener opciones: " . $e->getMessage());
                        }
                    ?>
                </select><br>

                <label for="edad"><strong>Edad <strong id="ff">*</strong></strong></label>
                <input type="number" id="edad" name="age" placeholder="Años" min="0" max="25" required>
                <input type="number" id="meses" name="months" placeholder="Meses" min="0" max="11" required><br>
                <small>* Si la mascota tiene menos de un año, coloque "0" en años y especifique los meses.</small><br>

                <label for="vacunas"><strong>Carnet de Vacunas <strong id="ff">*</strong></strong></label>
                <input type="file" multiple id="vacunas" name="bacu[]" required><br>

                <label for="enfermedades"><strong>Enfermedades <strong id="ff">*</strong></strong></label>
                <textarea id="enfermedades" placeholder="ENFERMEDADES" name="enfer" required></textarea><br>

                <label for="foto"><strong>Fotografía <strong id="ff">*</strong></strong></label>
                <input type="file" multiple id="foto" name="dog[]" required><br>
                <small>* Debe subir un mínimo de 4 fotografías de la mascota.</small><br>

                <label><input type="checkbox" id="acptdog" required><strong id="dogacpt"> Acepto los <a href="#">Términos</a> y <a href="#">Condiciones de Uso *</a></strong></label><br>

                <input type="submit" value="FINALIZAR REGISTRO" name="finalize">
            </form>

            <div id="resp">
                <?php
                    try {
                        function mjsjj($msg) {
                            echo "<script> const mnje = document.getElementById('resp');
                                mnje.innerHTML = '<strong>" . htmlspecialchars(trim($msg)) . "</strong>';
                                mnje.scrollIntoView({ behavior: 'smooth', block: 'center' });
                                setTimeout(()=>{ mnje.remove(); }, 5000); </script>";
                        }
                        if ($_SERVER["REQUEST_METHOD"] === 'POST' && isset($_POST['finalize'])) {
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

                            if (!isset($_FILES['bacu']) && !isset($_FILES['dog'])) {
                                mjsjj("No existe ninguna foto");
                            } else {
                                try {
                                    $imgs = carimg($_FILES);
                                    $bacuOne = isset($imgs['bacu'][0]['tmp_name']) ? file_get_contents($imgs['bacu'][0]['tmp_name']) : null;
                                    $bacuTwo = isset($imgs['bacu'][1]['tmp_name']) ? file_get_contents($imgs['bacu'][1]['tmp_name']) : null;
                                    $bacuTree = isset($imgs['bacu'][2]['tmp_name']) ? file_get_contents($imgs['bacu'][2]['tmp_name']) : null;
                                    $oneDog = isset($imgs['dog'][0]['tmp_name']) ? file_get_contents($imgs['dog'][0]['tmp_name']) : null;
                                    $twoDog = isset($imgs['dog'][1]['tmp_name']) ? file_get_contents($imgs['dog'][1]['tmp_name']) : null;
                                    $treeDog = isset($imgs['dog'][2]['tmp_name']) ? file_get_contents($imgs['dog'][2]['tmp_name']) : null;
                                    $forDog = isset($imgs['dog'][3]['tmp_name']) ? file_get_contents($imgs['dog'][3]['tmp_name']) : null;

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

                                    if ($sqli->execute()) {
                                        mjsjj("SU MASCOTA HA SIDO REGISTRADA CON EXITO");
                                    } else {
                                        mjsjj("Ocurrió un error al registrar la mascota");
                                    }
                                } catch (Exception $e) {
                                    error_log("Error al cargar la imagen: " . $e->getMessage());
                                    mjsjj("Error al procesar las imágenes");
                                }
                            }
                        }
                    } catch (Exception $e) {
                        error_log("Error inesperado: " . $e->getMessage());
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
