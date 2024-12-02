<?php
session_start(); // Mantén este session_start al inicio de la página
function mjsjj($msg){
    echo "<script> const mnje = document.getElementById('rpt');
        mnje.innerHTML = '<strong>" . htmlspecialchars(trim($msg)) . "</strong>';
        mnje.scrollIntoView({ behavior: 'smooth', block: 'center' });
        setTimeout(()=>{ mnje.remove(); }, 5000); </script>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/InicioSesion.css"> <!-- Enlace al CSS -->
    <link rel="stylesheet" href="../css/PaginaInicioSlider.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Iniciar Sesión - Tag My Pet</title>
    <link rel="icon" href="../IMG/favicon.ico" type="image/x-icon">
</head>

<body>
    <?php include('main_header.php'); ?>
    <div class="formulario">
        <form method="POST" action="../controller/Iniciar.php"  id="form">
            <img src="../IMG/Logo.png" alt="Logo Tag My Pet">
            <h2>¡Bienvenido!</h2>
            <h3>Inicia Sesión</h3>
            <input type="email" class="input1" placeholder="Ingrese su Correo" id="email" name="correo">
            <input type="password" class="passw" placeholder="Ingrese la Contraseña" id="password" name="contra">       
            <input type="submit" value="Iniciar Sesión" class="inicia" id="iniciase" name="fuesese">
            <a href="Recuperar_contrasena.php" class="olvido_password" id="olvido_password">¿Olvidó su Contraseña?</a>

        </form>
    </div>

    <div id="rpt">
        <?php
            try{
                if(isset($_SESSION['usrdeni'])){
                    mjsjj($_SESSION['usrdeni']);
                    unset($_SESSION['usrdeni']);
                }

                if(isset($_SESSION['ejecuerr'])){
                    mjsjj($_SESSION['ejecuerr']);
                    unset($_SESSION['ejecuerr']);
                }
                if(isset($_SESSION['errrol'])){
                    mjsjj($_SESSION['errrol']);
                    unset($_SESSION['errrol']);
                }
                if(isset($_SESSION['qryerr'])){
                    mjsjj($_SESSION['qryerr']);
                    unset($_SESSION['qryerr']);
                }
            } catch(Exception $e){
                error_log("Error de validacion: " . $e->getMessage());
                echo htmlspecialchars(trim("Error"));
            }
        ?>
    </div>
    <div class="slider">
        <div class="slide active" style="background-image: url('../IMG/mascota1.jpg');"></div>
        <div class="slide" style="background-image: url('../IMG/mascota2.jpg');"></div>
        <div class="slide" style="background-image: url('../IMG/mascota3.jpg');"></div>
    </div>

    <script src="../javascript/InicioSesion.js"></script> <!-- Enlace al JavaScript -->
    <script src="../javascript/slider.js"></script> 
    <script src="../javascript/footer.js"></script>
</body>
</html>
