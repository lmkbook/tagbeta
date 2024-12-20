<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin_configuracion.css">
    <title>Configuración del Sitio - Tag My Pet</title>
    <link rel="icon" href="../IMG/favicon.ico" type="image/x-icon">
</head>
<body>
    
<?php include('../admin/admin_header.html'); ?>

    <main>
        <h1>Configuración del Sitio</h1>

        <section class="config-section">
            <h2>Personalización</h2>
            <form id="personalization-form">
                <label for="site-title">Título del Sitio:</label>
                <input type="text" id="site-title" value="Tag My Pet"><br>

                <label for="site-logo">Logo del Sitio:</label>
                <input type="file" id="site-logo"><br>

                <label for="site-color">Color Primario:</label>
                <input type="color" id="site-color" value="#3B9C9C"><br>

                <button type="submit">Guardar Cambios</button>
            </form>
        </section>

        <section class="config-section">
            <h2>Políticas Legales</h2>
            <form id="legal-form">
                <label for="terms">Términos de Uso:</label>
                <textarea id="terms">[Texto de los términos de uso]</textarea><br>

                <label for="privacy">Política de Privacidad:</label>
                <textarea id="privacy">[Texto de la política de privacidad]</textarea><br>

                <button type="submit">Guardar Cambios</button>
            </form>
        </section>

        <section class="config-section">
            <h2>Gestión de Roles</h2>
            <form id="roles-form">
                <label for="admin-role">Roles de Administrador:</label>
                <select id="admin-role">
                    <option value="full-access">Acceso Completo</option>
                    <option value="limited-access">Acceso Limitado</option>
                </select><br>

                <label for="moderator-role">Roles de Moderador:</label>
                <select id="moderator-role">
                    <option value="content-moderation">Moderación de Contenido</option>
                    <option value="user-management">Gestión de Usuarios</option>
                </select><br>

                <button type="submit">Guardar Cambios</button>
            </form>
        </section>

        <section class="config-section">
            <h2>Configuración de Seguridad</h2>
            <form id="security-form">
                <label for="password-policy">Política de Contraseñas:</label>
                <select id="password-policy">
                    <option value="strong">Fuerte (Mínimo 8 caracteres, con números y letras)</option>
                    <option value="medium">Media (Mínimo 6 caracteres, con números o letras)</option>
                </select><br>

                <label for="session-timeout">Tiempo de Expiración de Sesión:</label>
                <input type="number" id="session-timeout" value="30" min="1" max="120"> minutos<br>

                <button type="submit">Guardar Cambios</button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Tag My Pet. Todos los derechos reservados.</p>
    </footer>

    <script src="../javascript/admin_configuracion.js"></script>
</body>
</html>
