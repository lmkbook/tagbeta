<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/publicaciones_mascotas_encontradas.css">
    <link rel="stylesheet" href="../css/PaginaInicioSlider.css"> <!-- Incluye el CSS del slider -->
    <title>Publicaciones Mascotas Encontradas - Tag My Pet</title>
    <link rel="icon" href="../IMG/favicon.ico" type="image/x-icon">
</head>
<body>
    <?php include('main_header.php'); ?>

    <main>
        <div class="found-pets-container">
            <h1>Mascotas Encontradas</h1>
            
            <section class="found-pet">
                <h2>Perro Encontrado en el Parque Central</h2>
                <img src="../IMG/perro1.jpg" alt="Perro encontrado">
                <p><strong>ID de la Mascota:</strong> ABC123</p>
                <p><strong>Descripción:</strong> Labrador color dorado, aproximadamente 3 años de edad, encontrado en el Parque Central el 01/09/2024.</p>
                <p><strong>Contacto:</strong> Juan Pérez - juan.perez@example.com - +57 321 123 4567</p>
            </section>

            <section class="found-pet">
                <h2>Gato Encontrado Cerca de la Plaza</h2>
                <img src="../IMG/gato1.jpg" alt="Gato encontrado">
                <p><strong>ID de la Mascota:</strong> DEF456</p>
                <p><strong>Descripción:</strong> Gato blanco con manchas negras, joven, con collar azul, encontrado cerca de la Plaza el 02/09/2024.</p>
                <p><strong>Contacto:</strong> María López - maria.lopez@example.com - +57 312 987 6543</p>
            </section>

            <section class="found-pet">
                <h2>Perro Pequeño Encontrado en la Calle 50</h2>
                <img src="../IMG/perro2.jpg" alt="Perro encontrado">
                <p><strong>ID de la Mascota:</strong> GHI789</p>
                <p><strong>Descripción:</strong> Perro pequeño de raza chihuahua, color café, encontrado en la Calle 50, parece tener unos 2 años.</p>
                <p><strong>Contacto:</strong> Pedro Martínez - pedro.martinez@example.com - +57 311 222 3333</p>
            </section>

            <section class="found-pet">
                <h2>Gato Gris Encontrado en el Barrio San José</h2>
                <img src="../IMG/gato2.jpg" alt="Gato encontrado">
                <p><strong>ID de la Mascota:</strong> JKL012</p>
                <p><strong>Descripción:</strong> Gato gris con ojos verdes, aproximadamente 1 año, encontrado en el Barrio San José el 03/09/2024.</p>
                <p><strong>Contacto:</strong> Luisa Gómez - luisa.gomez@example.com - +57 310 444 5555</p>
            </section>
        </div>
    </main>

    <div class="slider">
        <div class="slide active" style="background-image: url('../IMG/mascota1.jpg');"></div>
        <div class="slide" style="background-image: url('../IMG/mascota2.jpg');"></div>
        <div class="slide" style="background-image: url('../IMG/mascota3.jpg');"></div>
    </div>

    <script src="../javascript/slider.js"></script> <!-- Slider JavaScript -->
    <script src="../javascript/publicaciones_mascotas_encontradas.js"></script>
    <script src="../javascript/footer.js"></script>
</body>
</html>
