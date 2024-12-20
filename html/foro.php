<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/foro.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/PaginaInicioSlider.css"> <!-- Incluye el CSS -->
    <title>Foro - Tag My Pet</title>
    <link rel="icon" href="../IMG/favicon.ico" type="image/x-icon">
</head>
<body>
    <?php include('main_header.php'); ?>

    <main>
        <div class="forum-container">
            <h1>Comunidad - Tag My Pet</h1>

            <section class="forum-topics">
                <h2>Temas de Discusión</h2>
                <div class="topic">
                    <h3><a href="#tema1">Perdí a mi perro en el parque</a></h3>
                    <p>Descripción breve del tema. Respuestas: 14</p>
                </div>
                <div class="topic">
                    <h3><a href="#tema2">¿Qué hacer si mi gato se pierde?</a></h3>
                    <p>Descripción breve del tema. Respuestas: 9</p>
                </div>
                <div class="topic">
                    <h3><a href="#tema3">Consejos para encontrar mascotas perdidas</a></h3>
                    <p>Descripción breve del tema. Respuestas: 23</p>
                </div>
            </section>

            <section class="user-profile">
                <h2>Perfil del Usuario</h2>
                <div class="user-info">
                    <p><strong>Usuario:</strong> Juan123</p>
                    <p><strong>Temas Creados:</strong> 5</p>
                    <p><strong>Respuestas:</strong> 20</p>
                </div>

                <form method="USE" action="#" class="create-topic-form">
                    <label for="topic-title"><strong>Tema a Discutir *</strong></label>
                    <input type="text" id="topic-title" name="topic-title" maxlength="50" placeholder="Escribe el tema a discutir" required><br>

                    <label for="topic-description"><strong>Descripción *</strong></label>
                    <textarea id="topic-description" name="topic-description" maxlength="4000" placeholder="Escribe la descripción del tema" required></textarea><br>

                    <label for="topic-photos">Fotos (opcional)</label>
                    <input type="file" id="topic-photos" name="topic-photos" multiple><br>

                    <input type="submit" value="Crear Nuevo Tema" class="create-topic-button">
                </form>

                <p class="required-note">* Campos obligatorios</p>
            </section>
        </div>
    </main>

    <div class="slider">
        <div class="slide active" style="background-image: url('/IMG/mascota1.jpg');"></div>
        <div class="slide" style="background-image: url('/IMG/mascota2.jpg');"></div>
        <div class="slide" style="background-image: url('/IMG/mascota3.jpg');"></div>
    </div>

    <script src="../javascript/slider.js"></script> <!-- Incluye el JavaScript -->

    <script src="../javascript/PaginaInicioSesionOn.js"></script>
    <script src="../javascript/footer.js"></script>
</body>
</html>

