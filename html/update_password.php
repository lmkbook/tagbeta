<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['iduser'])) {
    header("Location: IniciaSesion.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['update_password'])) {
    include_once('../model/connect.php');
    include_once('../model/segurity.php');

    $idUser = $_SESSION['iduser'];
    $currentPassword = $_POST['current-password'];
    $newPassword = $_POST['new-password'];
    $confirmPassword = $_POST['confirm-password'];

    try {
        // Verificar la contraseña actual
        $query = Connect::ObtainInstance()->prepare("SELECT Pass FROM Rusers WHERE idRusers = :id");
        $query->bindParam(':id', $idUser, PDO::PARAM_INT);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);

        if (!$user || !password_verify($currentPassword, $user['Pass'])) {
            header('Location: user_profile.php?error=incorrect_password');
            exit();
        }

        // Verificar que la nueva contraseña coincida con la confirmación
        if ($newPassword !== $confirmPassword) {
            header('Location: user_profile.php?error=password_mismatch');
            exit();
        }

        // Actualizar la contraseña
        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
        $updateQuery = Connect::ObtainInstance()->prepare("UPDATE Rusers SET Pass = :newPassword WHERE idRusers = :id");
        $updateQuery->bindParam(':newPassword', $hashedPassword, PDO::PARAM_STR);
        $updateQuery->bindParam(':id', $idUser, PDO::PARAM_INT);

        if ($updateQuery->execute()) {
            $_SESSION['actuExito'] = 'password_updated';
            header('Location: user_profile.php');
            exit();
        } else {
            echo "Error al actualizar la contraseña.";
            exit();
        }
    } catch (Exception $e) {
        echo "Error al procesar la solicitud: " . $e->getMessage();
        exit();
    }
} else {
    // Si no es una solicitud POST, redirigir de vuelta al formulario
    header('Location: user_profile.php');
    exit();
}
?>
