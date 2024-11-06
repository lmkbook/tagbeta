<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/PaginaInicioSlider.css"> <!-- Incluye el CSS -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/contacto.css">
    <title>Contacto - Tag My Pet</title>
    <link rel="icon" href="../IMG/favicon.ico" type="image/x-icon">
</head>
<body>
    <?php include('main_header.php'); ?>

    <!-- Slider de imágenes como fondo -->
    <div class="slider">
        <div class="slide active" style="background-image: url('/IMG/mascota1.jpg');"></div>
        <div class="slide" style="background-image: url('/IMG/mascota2.jpg');"></div>
        <div class="slide" style="background-image: url('/IMG/mascota3.jpg');"></div>
    </div>

    <main>
        <div id="contact-container">
            <h1>Contáctanos</h1>
            <p>Si tienes alguna pregunta, sugerencia o necesitas ayuda, no dudes en contactarnos a través del siguiente formulario:</p>

            <form action="#" method="POST" id="contact-form">
                <label for="name">Nombre *</label>
                <input type="text" id="name" name="name" placeholder="Tu nombre" required maxlength="50">

                <label for="email">Correo Electrónico *</label>
                <input type="email" id="email" name="email" placeholder="Tu correo electrónico" required>

                <label for="subject">Asunto *</label>
                <input type="text" id="subject" name="subject" placeholder="Asunto" required maxlength="100">

                <label for="message">Mensaje *</label>
                <textarea id="message" name="message" placeholder="Escribe tu mensaje aquí" required maxlength="1000"></textarea>

                <input type="submit" value="Enviar Mensaje">
            </form>

            <div id="form-messages"></div>

            <div id="contact-info">
                <h2>Otras formas de contacto</h2>
                <p>Email: <a href="mailto:soporte@tagmypet.com">soporte@tagmypet.com</a></p>
                <p>Teléfono: +57 123 456 7890</p>
                <p>Dirección: Calle 123, Bogotá, Colombia</p>
            </div>
        </div>
    </main>

    <!-- Footer reutilizado -->

    <script src="../javascript/slider.js"></script> <!-- Slider JavaScript -->
    <script src="../javascript/contacto.js"></script>
    <script src="../javascript/footer.js"></script>
</body>
</html>
