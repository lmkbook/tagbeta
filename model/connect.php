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
            $sqli = new PDO("mysql:host=127.0.0.1; dbname=tagmypet", 'root', '');
            $sqli->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die("Error con la base de datos: " . $e->getMessage());
        }
    ?>
</body>
</html>