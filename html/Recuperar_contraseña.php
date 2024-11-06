<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Recuperar_contraseña.css">  <!--enlace al css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/PaginaInicioSlider.css">
    <link rel="icon" href="../IMG/favicon.ico" type="image/x-icon">
    <title>Recuperar Contraseña</title>
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
    <form method="POST" action="#" id="form">
    <img src="../IMG/Logo.png" alt="Logo Tag My Pet">
<div>
    <h2>Recuperar Contraseña</h2>
</div>
<div>
        <input type="email" id="input1" class="email" name="correo" placeholder="Ingrese su Correo">
        <input type="submit" class="enviar_email" id="input2" value="Enviar Link">
    </div>
    <div>
        <p class="opcion_cuenta">
        <span>¿Ya es usuario?</span>
        <a href="../html/Iniciasesion.html">
        <button class="iniciase" id="iniciase">Inicia Sesión</button>
        </a>
        </p>
    </div>
</form>
</div>
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
</div>
<script src="../javascript/InicioSesion.js"></script> <!-- Enlace al JavaScript -->
<script src="../javascript/slider.js"></script> 
<script src="../javascript/footer.js"></script>
</body>
</html>