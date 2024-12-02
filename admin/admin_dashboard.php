<?php
    session_start();
    include_once('../model/connect.php');
    $uluser = Connect::ObtainInstance()->prepare("SELECT `Pname`, `Psname` FROM `Rusers` ORDER BY `idRusers` DESC LIMIT 1");
    $uluser->execute();
    $row = $uluser->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin_dashboard.css">
    <title>Dashboard del Administrador - Tag My Pet</title>
    <link rel="icon" href="../IMG/favicon.ico" type="image/x-icon">
</head>
<body>
    <?php include('../admin/admin_header.html'); ?>

    <main>
        <h1>Dashboard del Administrador</h1>
        <section class="stats">
            <div class="stat-box">
                <h2>Usuarios Registrados</h2>
                <p id="user-count">
                    <?php
                        try{
                            include_once('../model/segurity.php');
                            $nuUSer = Connect::ObtainInstance()->prepare("SELECT COUNT(idRusers) - 1 AS UTotal FROM Rusers");
                            if(!$nuUSer->execute()){
                                $error = $nuUSer->errorInfo();
                                echo htmlspecialchars(trim("Error en la consulta: " . $error[2]));
                            }else{
                                $usernum = $nuUSer->fetch(PDO::FETCH_ASSOC);
                                echo htmlspecialchars(trim($usernum['UTotal']));
                            }
                        }catch(Exception $e){
                            error_log("Ourrio un error inesperado en los totales de los usuarios" . $e->getMessage());
                            echo htmlspecialchars(trim("Ocurrio un error"));
                        }
                    ?>
                </p> <!-- Este número se actualizaría dinámicamente -->
            </div>
            <div class="stat-box">
                <h2>Mascotas Registradas</h2>
                <p id="pet-count">
                    <?php
                        try{
                            include_once('../model/connect.php');
                            include_once('../model/segurity.php');
                            $nuUSer = Connect::ObtainInstance()->prepare("SELECT COUNT(idRepets) AS TotalR FROM Repets");
                            if(!$nuUSer->execute()){
                                $error = $nuUSer->errorInfo();
                                echo htmlspecialchars(trim("Error en la consulta: " . $error[2]));
                            }else{
                                $usernum = $nuUSer->fetch(PDO::FETCH_ASSOC);
                                echo htmlspecialchars(trim($usernum['TotalR']));
                            }
                        }catch(Exception $e){
                            error_log("Ourrio un error inesperado en los totales de mascota " . $e->getMessage());
                            echo htmlspecialchars(trim("Ocurrio un error"));
                        }
                    ?>
                </p> <!-- Este número se actualizaría dinámicamente -->
            </div>
            <div class="stat-box">
                <h2>Alertas Activas</h2>
                <p id="alert-count">5</p> <!-- Este número se actualizaría dinámicamente -->
            </div>
            <div class="stat-box">
                <h2>Publicaciones Recientes</h2>
                <p id="post-count">12</p> <!-- Este número se actualizaría dinámicamente -->
            </div>
        </section>

        <section class="quick-access">
            <h2>Accesos Rápidos</h2>
            <div class="access-box">
                <a href="../admin/admin_usuarios.html">Gestión de Usuarios</a>
            </div>
            <div class="access-box">
                <a href="../admin/admin_mascotas.html">Gestión de Mascotas</a>
            </div>
            <div class="access-box">
                <a href="../admin/admin_publicaciones.html">Gestión de Publicaciones</a>
            </div>
            <div class="access-box">
                <a href="../admin/admin_notificaciones.html">Gestión de Notificaciones</a>
            </div>
        </section>

        <section class="activity-log">
            <h2>Actividad Reciente</h2>
            <ul>
                <li>Nuevo usuario registrado: <strong><?php echo htmlspecialchars(trim($row['Pname'] . " " . $row['Psname'])); ?></strong></li>
                <li>Mascota encontrada reportada: <strong>Gato Blanco</strong></li>
                <li>Publicación aprobada: <strong>Perro encontrado en el parque</strong></li>
                <li>Notificación enviada: <strong>Recordatorio de vacuna</strong></li>
            </ul>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Tag My Pet. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
