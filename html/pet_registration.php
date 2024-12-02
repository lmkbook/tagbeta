<?php
    include_once('../model/connect.php');
    include_once('../model/segurity.php');
    // FUNCION PARA ACCEDER A LAS FOTOS
       
    function mjsjj($msg) {
        echo "<script> const mnje = document.getElementById('resp');
            mnje.innerHTML = '<strong>" . htmlspecialchars(trim($msg)) . "</strong>';
            mnje.scrollIntoView({ behavior: 'smooth', block: 'center' });
            setTimeout(()=>{ mnje.remove(); }, 5000); </script>";
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
            <form method="POST" action="../controller/registration_pet.php" id="frm" enctype="multipart/form-data">
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
                <label><stron>ID unico de la mascota</stron>
                <input type="text" onclick="generatePetID()" id="pet_id" name="idUnic"><br>
                <p>Este ID es unico y sera el identificador para poder reconecer a una mascota en caso de perdida</p><br>
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

            
        </div>
    </main>
    <div id="resp">
        <?php
            try{
                if(isset($_SESSION['Nofto'])){
                    mjsjj($_SESSION['Nofto']);
                    unset($_SESSION['Nofto']);
                }
                if(isset($_SESSION['idocu'])){
                    mjsjj($_SESSION['idocu']);
                    unset($_SESSION['mscregi']);
                }
                if(isset($_SESSION['mscregi'])){
                    mjsjj($_SESSION['mscregi']);
                    unset($_SESSION['mscregi']);
                }
                if(isset($_SESSION['catcherr'])){
                    mjsjj($_SESSION['catcherr']);
                    unset($_SESSION['catcherr']);
                }
                if(isset($_SESSION['errje'])){
                    mjsjj($_SESSION['errje']);
                    unset($_SESSION['errje']);
                }
                if(isset($_SESSION['rroerr'])){
                    mjsjj($_SESSION['rroerr']);
                    unset($_SESSION['rroerr']);
                }
            }catch(Exception $e){
                error_log("Ha ocurrido un error " . $e->getMessage());
                echo htmlspecialchars(trim("Error"));
            }
        ?>
    </div>
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
