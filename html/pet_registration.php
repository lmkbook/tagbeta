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
    <?php
        try{
            
            include('../html/conexion.php');
            $Uregi = $nsql->prepare("SELECT `Pname`, `Psname`, `Email`, `Barrio`, `Nombre` FROM Rusers 
            INNER JOIN Ciudad ON Rusers.idCiudad = Ciudad.idCiudad ORDER BY Rusers.idRusers DESC LIMIT 1");
            if(!$Uregi->execute()){
                die("Error de ejecucion");
            }else{
                $save = $Uregi->get_result();
                $row = $save->fetch_assoc();
                $Pname = $row['Pname'];
                $Surname = $row['Psname'];
                $mail = $row['Email'];
                $barrio = $row['Barrio'];
                $city = $row['Nombre'];
            }

        }catch(Exception $e){
            die("Error: " . $getMessage());
        }
    ?>
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
            <div id="container1">
                <h1>TAG MY PET</h1>
                <h2>REGISTRO DE MASCOTA</h2>
            </div>
            <div id="container2">
            <form method="POST" action="#" id="frm">
                    <label for="names"><strong>Nombre(s) Propietario *</strong></label>
                    <input type="text" id="names" readonly value="<?php echo htmlspecialchars($Pname) ?>"><br>

                    <label for="surname"><strong>Apellido(s) Propietario *</strong></label>
                    <input type="text" id="surname" readonly value="<?php echo htmlspecialchars($Surname) ?>"><br>

                    <label for="mail"><strong>Correo Electrónico Propietario *</strong></label>
                    <input type="email" id="mail" readonly value="<?php echo htmlspecialchars($mail) ?>"><br>

                    <label for="ciu"><strong>Ciudad *</strong></label>
                    <input type="text" id="ciu" readonly value="<?php echo htmlspecialchars($city) ?>"><br>

                    <label for="barrio"><strong>Barrio *</strong></label>
                    <input type="text" id="barrio" readonly value="<?php echo htmlspecialchars($barrio) ?>"><br>

                    <label for="pet_id"><strong>ID Único de Mascota *</strong></label>
                    <input type="text" id="pet_id" readonly><br>
                    <small>* Este ID es único para su mascota. Por favor, anótelo y guárdelo.</small><br>

                    <label for="pet_name"><strong>Nombre de Mascota *</strong></label>
                    <input type="text" id="pet_name" placeholder="NOMBRE DE MASCOTA" required maxlength="20" pattern="[A-Za-z\s]+"><br>

                    <label for="tipo_mascota"><strong>Tipo de Mascota *</strong></label>
                    <select id="tipo_mascota" required onchange="updateRazaOptions()">
                        <option value="">Seleccione</option>
                        <option value="Perro">Perro</option>
                        <option value="Gato">Gato</option>
                    </select><br>

                    <label for="raza"><strong>Raza *</strong></label>
                    <select id="raza" required>
                        <!-- Opciones de raza dinámicas -->
                    </select><br>

                    <div id="otro_raza_container" style="display:none;">
                        <label for="otra_raza"><strong>Especificar Raza *</strong></label>
                        <input type="text" id="otra_raza" maxlength="20" pattern="[A-Za-z\s]+"><br>
                    </div>

                    <label for="peso"><strong>Peso (KG) *</strong></label>
                    <input type="number" id="peso" placeholder="PESO EN KG" min="1" max="150" required><br>

                    <label for="color"><strong>Color *</strong></label>
                    <input type="text" id="color" placeholder="COLOR" required><br>

                    <label for="sexo"><strong>Sexo *</strong></label>
                    <select id="sexo" required>
                        <option value="Macho">Macho</option>
                        <option value="Hembra">Hembra</option>
                    </select><br>

                    <label for="esterilizado"><strong>¿Esterilizado? *</strong></label>
                    <select id="esterilizado" required>
                        <option value="Si">Sí</option>
                        <option value="No">No</option>
                    </select><br>

                    <label for="edad"><strong>Edad *</strong></label>
                    <input type="number" id="edad" placeholder="EDAD" min="0" max="25" required>
                    <input type="number" id="meses" placeholder="Meses" min="0" max="11" required><br>
                    <small>* Si la mascota tiene menos de un año, coloque "0" en años y especifique los meses.</small><br>

                    <label for="vacunas"><strong>Carnet de Vacunas *</strong></label>
                    <input type="file" id="vacunas" required><br>

                    <label for="enfermedades"><strong>Enfermedades *</strong></label>
                    <textarea id="enfermedades" placeholder="ENFERMEDADES" required></textarea><br>

                    <label for="foto"><strong>Fotografía *</strong></label>
                    <input type="file" id="foto" required multiple><br>
                    <small>* Debe subir un mínimo de 4 fotografías de la mascota.</small><br>

                    <label><input type="checkbox" id="acptdog" required><strong id="dogacpt"> Acepto los <a href="#">Términos</a> y <a href="#">Condiciones de Uso *</a></strong></label><br>

                    <button type="button" id="add_pet" onclick="saveAndResetForm()">Añadir otra Mascota</button><br>
                    <input type="submit" value="FINALIZAR REGISTRO" name="finalize">
                </form>
                <p class="required-note"><strong>*</strong> Campos obligatorios</p>
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
