<?php
session_start();
include 'model/connect.php'; // Conectar a la base de datos

// Variables recibidas desde el formulario de inicio de sesión
$username = $_POST['username'];
$password = $_POST['password'];

try {
    // Consulta para verificar el usuario
    $query = Connect::ObtainInstance()->prepare("SELECT * FROM Rusers WHERE Email = :username");
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->execute();

    if ($query->rowCount() > 0) {
        echo "Usuario encontrado<br>"; // Línea de depuración
        $user = $query->fetch();

        // Verifica la contraseña
        if (password_verify($password, $user['Pass'])) {
            echo "Contraseña verificada<br>"; // Línea de depuración

            // Guardar información en la sesión
            $_SESSION['loggedin'] = true;
            $_SESSION['iduser'] = $user['idRusers'];
            $_SESSION['name'] = $user['Pname'];
            $_SESSION['surname'] = $user['surname'];

            echo "Sesión establecida correctamente<br>"; // Línea de depuración

            header("Location: PaginaInicioSesionOn.php");
            exit();
        } else {
            echo "Contraseña incorrecta.<br>";
        }
    } else {
        echo "Usuario no encontrado en la base de datos.<br>";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
