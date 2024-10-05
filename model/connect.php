<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONEXION</title>
</head>
<body>
    <?php
        try{
            $sqli = new mysqli('127.0.0.1' , 'root', '', 'tagmypet');
            if($sqli->connect_errno){
                die("Error en la conexion: " . $sqli->connect_error);
            }
        }catch(Exception $e){
            die("Ocurrio un error con la base de datos: " . $e->getMessage());
        }
    ?>
</body>
</html>