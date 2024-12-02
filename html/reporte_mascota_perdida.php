<?php
session_start();
include_once('../model/connect.php');
include_once('../model/segurity.php');
$iduser = $_SESSION['iduser'];
function vms($mess){
    echo "<script> const mnje = document.getElementById('rpt');
        mnje.innerHTML = '<strong>" . htmlspecialchars(trim($mess)) . "</strong>';
        mnje.scrollIntoView({ behavior: 'smooth', block: 'center' });
        setTimeout(()=>{ mnje.remove(); }, 5000); </script>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reporte_mascota_perdida.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/PaginaInicioSlider.css"> <!-- Incluye el CSS -->
    <title>Reporte de Mascota Perdida</title>
    <link rel="icon" href="../IMG/favicon.ico" type="image/x-icon">
</head>
<body>
    <?php include('main_header.php'); ?>

    <main>
        <div id="container">
            <div id="container1">
                <h1>TAG MY PET</h1>
                <h2>Reporte de Mascota Perdida</h2>
            </div>
            <div id="container2">
                <h2 id="ff">Reporte de Mascota Perdida</h2>
                <form id="reportePerdidaForm" method="POST" action="../controller/repmaspetloss.php">
                    <label for="id_mascota">Nombre de la mascota</label>
                    <select name="petname">
                        <?php
                            try {
                                include_once('../model/connect.php');
                                
                                $masc = Connect::ObtainInstance()->prepare("SELECT `idRepets`, `Petname` FROM `Repets` WHERE idRusers = :id");
                                $masc->bindParam(':id', $iduser, PDO::PARAM_INT);
                                if (!$masc->execute()) {
                                    echo "<option value='" . htmlspecialchars(trim('-')) . "'>" . htmlspecialchars(trim('-')) . "</option>"; 
                                } else {
                                    $syti = $masc->fetchAll(PDO::FETCH_ASSOC);
                                    echo "<option value='" . htmlspecialchars(trim('-')) . "'>" . htmlspecialchars(trim('-')) . "</option>";
                                    foreach ($syti as $ticy) {
                                        echo "<option value='" . htmlspecialchars(trim($ticy['idRepets'])) . "'>" . htmlspecialchars(trim($ticy['Petname'])) . "</option>";
                                    }
                                }
                            } catch(Exception $e) {
                                error_log("Error al obtener opciones: " . $e->getMessage());
                            }
                        ?>
                    </select><br>
        
                    <label for="descripcion">Descripción de la Mascota</label>
                    <textarea id="descripcion" name="descripcion" required></textarea><br>
        
                    <label for="fecha_perdida">Fecha de Pérdida</label>
                    <input type="date" id="fecha_perdida" name="fecha_reporte" required><br>
        
                    <label for="hora_perdida">Hora de Pérdida</label>
                    <input type="time" id="hora_perdida" name="hora_reporte" required><br>
        
                    <label for="location">Lugar de Pérdida</label>
                    <div id="map" style="height: 400px;"></div>
                    <input type="hidden" id="latitud" name="latitud">
                    <input type="hidden" id="longitud" name="longitud"><br>
        
                    <label for="contacto">Información de Contacto</label>
                    <select name="infcont">
                        <?php
                            try {
                                include_once('../model/connect.php');
                                $has = MAILHASH;
                                $info = Connect::ObtainInstance()->prepare("SELECT  idRusers, AES_DECRYPT(UNHEX(`Email`), :mail) AS Correo, `Ncel` FROM `Rusers` WHERE idRusers = :iduser");
                                $info->bindParam(':mail', $has, PDO::PARAM_STR);
                                $info->bindParam(':iduser' , $iduser, PDO::PARAM_INT);
                                if (!$info->execute()) {
                                    echo "OCUERRIO UN Error al ejecutar la consuta"; 
                                } else {
                                    $userinfo = $info->fetchAll(PDO::FETCH_ASSOC);
                                    
                                }
                            } catch(Exception $e) {
                                error_log("Error al obtener opciones: " . $e->getMessage());
                            }
                        ?>
                        <optgroup label="Correo">
                            <?php
                                foreach($userinfo as $infusr){
                                    echo "<option value='" . htmlspecialchars(trim($infusr['idRusers'])) . "'>" . htmlspecialchars(trim($infusr['Correo'])) . "</option>";
                                }
                            ?>
                        </optgroup>
                        <optgroup label="Celular">
                            <?php
                                foreach($userinfo as $infusr){
                                    echo "<option value='" . htmlspecialchars(trim($infusr['idRusers'])) . "'>" . htmlspecialchars(trim($infusr['Ncel'])) . "</option>";
                                }
                            ?>
                        </optgroup>
                    </select><br>
        
                    <button type="submit" name="fuesese">Enviar Reporte</button>
                </form>
                <p class="required-note"><strong>*</strong> Campo obligatorio</p>
                
            </div>
            
        </div>
        
    </main>
    <div id="rpt">
        <?php
            if(isset($_SESSION['errcodr'])){
                vms($_SESSION['errcodr']);
                unset($_SESSION['errcodr']);
            }
            if(isset($_SESSION['duplipet'])){
                vms($_SESSION['duplipet']);
                unset($_SESSION['duplipet']);
            }
            if(isset($_SESSION['actpet'])){
                vms($_SESSION['actpet']);
                unset($_SESSION['actpet']);
            }
        ?>
    </div>
    <div class="slider">
        <div class="slide active" style="background-image: url('../IMG/mascota1.jpg');"></div>
        <div class="slide" style="background-image: url('../IMG/mascota2.jpg');"></div>
        <div class="slide" style="background-image: url('../IMG/mascota3.jpg');"></div>
    </div>

    <script src="../javascript/slider.js"></script> <!-- Incluye el JavaScript -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmXFdiO3WTIWBUz1PS1xZHutNnmi_cFDM&callback=initMap"></script>
    <script src="../javascript/reporte_mascota_perdida.js"></script>
    <script src="../javascript/footer.js"></script>
</body>
</html>


