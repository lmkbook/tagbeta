<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/comunidad.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/PaginaInicioSlider.css"> <!-- Incluye el CSS -->
    <title>Comunidad - Tag My Pet</title>
    <link rel="icon" href="../IMG/favicon.ico" type="image/x-icon">
</head>
<body>
    <?php include('main_header.php'); ?>

    <main>
        <div class="community-container">
            <h1>Comunidad - Tag My Pet</h1>

            <section class="discussion-topics">
                <h2>Temas de Discusión</h2>
                
                <div class="topic">
                    <h3>Perdí a mi perro en el parque</h3>
                    <p class="description">Se me escapó mi perro mientras jugábamos en el parque. Es un labrador de 4 años, color dorado. Agradezco cualquier información.</p>
                    <div class="responses">
                        <h4>Respuestas:</h4>
                        <div class="response">
                            <p><strong>Pedro89:</strong> Lo siento mucho, yo también perdí a mi perro en ese parque. Intenta preguntar a los vecinos, así lo recuperé.</p>
                        </div>
                        <div class="response">
                            <p><strong>LauraG:</strong> Vi un perro similar cerca de la salida del parque. ¿Has intentado buscar en esa zona?</p>
                        </div>
                        <div class="add-response">
                            <textarea placeholder="Añadir una respuesta..."></textarea>
                            <button onclick="addResponse('Perdí a mi perro en el parque')">Enviar</button>
                        </div>
                    </div>
                </div>

                <div class="topic">
                    <h3>¿Qué hacer si mi gato se pierde?</h3>
                    <p class="description">Mi gato se escapó de casa ayer. Es un gato blanco con manchas negras, tiene un collar azul. ¿Qué me recomiendan hacer?</p>
                    <div class="responses">
                        <h4>Respuestas:</h4>
                        <div class="response">
                            <p><strong>CarlosM:</strong> Revisa los techos y lugares altos, los gatos suelen esconderse en esos lugares. También avisa a los vecinos.</p>
                        </div>
                        <div class="response">
                            <p><strong>AnaCat:</strong> No te preocupes, los gatos suelen volver solos. Deja un poco de comida afuera, eso puede ayudar a que regrese.</p>
                        </div>
                        <div class="add-response">
                            <textarea placeholder="Añadir una respuesta..."></textarea>
                            <button onclick="addResponse('¿Qué hacer si mi gato se pierde?')">Enviar</button>
                        </div>
                    </div>
                </div>

                <div class="topic">
                    <h3>Consejos para encontrar mascotas perdidas</h3>
                    <p class="description">¿Alguien tiene consejos generales sobre cómo encontrar mascotas perdidas? Sería muy útil para todos.</p>
                    <div class="responses">
                        <h4>Respuestas:</h4>
                        <div class="response">
                            <p><strong>MartinR:</strong> Imprime carteles con la foto y la información de contacto. También es útil publicar en redes sociales y grupos locales.</p>
                        </div>
                        <div class="response">
                            <p><strong>PilarL:</strong> No olvides revisar los refugios y veterinarias cercanas, a veces llevan a las mascotas allí.</p>
                        </div>
                        <div class="add-response">
                            <textarea placeholder="Añadir una respuesta..."></textarea>
                            <button onclick="addResponse('Consejos para encontrar mascotas perdidas')">Enviar</button>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <div class="slider">
        <div class="slide active" style="background-image: url('../IMG/mascota1.jpg');"></div>
        <div class="slide" style="background-image: url('../IMG/mascota2.jpg');"></div>
        <div class="slide" style="background-image: url('../IMG/mascota3.jpg');"></div>
    </div>

    <script src="../javascript/slider.js"></script>

    <script src="../javascript/comunidad.js"></script>
    <script src="../javascript/footer.js"></script>
</body>
</html>

