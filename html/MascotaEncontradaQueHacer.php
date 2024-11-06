<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/MascotaEncontradaQueHacer.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/PaginaInicioSlider.css"> <!-- Incluye el CSS -->
    <title>Título de la Página</title>
    <title>Mascota Encontrada ¿Qué hacer? - Tag My Pet</title>
    <link rel="icon" href="../IMG/favicon.ico" type="image/x-icon">
</head>
<body>
    <?php include('main_header.php'); ?>

    <main>
        <div id="container">
            <div id="container1">
                <h1>¿Qué hacer si encuentras una mascota?</h1>
            </div>
            <div id="container2">
                <section>
                    <h2>Tips, Cuidados y Recomendaciones</h2>
                    <p>Al encontrar una mascota perdida, es importante seguir algunas recomendaciones para garantizar su bienestar y facilitar la reunificación con su dueño:</p>
                    <ul>
                        <li><strong>Seguridad:</strong> Antes de acercarte, asegúrate de que la mascota no esté asustada o agresiva. Usa un tono calmado y muévete despacio para evitar asustarla.</li>
                        <li><strong>Proporciónale agua y comida:</strong> Si es seguro hacerlo, ofrece agua y un poco de comida a la mascota, especialmente si parece estar desnutrida o deshidratada.</li>
                        <li><strong>Revisa si tiene identificación:</strong> Además de la etiqueta NFC, verifica si tiene una placa con un número de teléfono o una dirección. Esto puede acelerar la reunificación.</li>
                        <li><strong>Lleva la mascota a un lugar seguro:</strong> Si es posible, llévala a un lugar seguro, como tu casa o un refugio, mientras intentas contactar al dueño.</li>
                        <li><strong>Consulta a un veterinario:</strong> Si la mascota parece estar herida o enferma, llévala a un veterinario para que reciba atención médica.</li>
                        <li><strong>Comparte en redes sociales:</strong> Publica fotos y detalles sobre la mascota en redes sociales y en grupos de tu comunidad. Esto puede ayudar a localizar al dueño más rápido.</li>
                        <li><strong>Evita regalarla o adoptarla inmediatamente:</strong> Es importante dar tiempo suficiente para que el dueño pueda ser localizado antes de considerar otras opciones.</li>
                    </ul>
                </section>
                <section>
                    <h2>Paso 1: Verifica si la mascota tiene una etiqueta NFC</h2>
                    <p>Muchos animales llevan una etiqueta NFC en su collar. Este dispositivo permite acceder rápidamente a la información del propietario. Sigue los pasos para escanear la etiqueta en tu teléfono:</p>
                    <ul>
                        <li><strong>Android:</strong> Acerca la parte superior trasera de tu teléfono al collar de la mascota. Aparecerá una notificación o una aplicación sugerida para abrir el enlace NFC.</li>
                        <li><strong>iOS:</strong> A partir del iPhone 7, los dispositivos cuentan con un lector NFC integrado. Simplemente acerca la parte superior del iPhone al collar de la mascota.</li>
                        <li><strong>Aplicaciones recomendadas:</strong> Si tu teléfono no reconoce el NFC automáticamente, puedes utilizar apps como <a href="https://play.google.com/store/apps/details?id=com.nxp.taginfolite">NFC Tools</a> en Android o <a href="https://apps.apple.com/us/app/nfc-for-iphone/id1253888134">NFC for iPhone</a> en iOS.</li>
                    </ul>
                </section>

                <section>
                    <h2>Paso 2: ¿No puedes escanear la etiqueta? Busca el ID de la mascota</h2>
                    <p>En caso de no poder escanear la etiqueta NFC, busca el ID de la mascota en su collar o placa. Este número te permitirá identificar rápidamente al propietario a través del sistema de Tag My Pet.</p>
                    <p>Una vez que tengas el ID, sigue al siguiente paso para diligenciar el formulario.</p>
                </section>

                <section>
                    <h2>Paso 3: Diligenciar el formulario "Mascota Encontrada"</h2>
                    <p>Entra en en el siguiente enlace y diligencia el siguiente formulario <a href="MascotaEncontrada.php">"Reporte Mascota Encontrada"</a> en nuestro sitio web. Llena los siguientes campos con la información requerida:</p>
                    <ul>
                        <li><strong>ID de la Mascota:</strong> Ingresa el ID que encontraste en el collar. (Si no pudiste escanear la etiqueta NFC)</li>
                        <li><strong>Descripción de la Mascota:</strong> Proporciona detalles sobre la apariencia de la mascota.</li>
                        <li><strong>Ubicación:</strong> Indica dónde encontraste a la mascota. Puedes usar el mapa interactivo para mayor precisión.</li>
                        <li><strong>Contacto:</strong> Deja tu información de contacto para que el dueño pueda comunicarse contigo.</li>
                    </ul>
                    <p>Una vez completado el formulario, recibirás una confirmación y nosotros nos encargaremos de notificar al propietario.</p>
                </section>

                
            </div>
        </div>
    </main>

    <div class="slider">
        <div class="slide active" style="background-image: url('../IMG/mascota1.jpg');"></div>
        <div class="slide" style="background-image: url('../IMG/mascota2.jpg');"></div>
        <div class="slide" style="background-image: url('../IMG/mascota3.jpg');"></div>
    </div>

    <script src="../javascript/slider.js"></script> <!-- Incluye el JavaScript -->

    <script src="../javascript/MascotaEncontradaQueHacer.js"></script>
    <script src="../javascript/footer.js"></script>
</body>
</html>
