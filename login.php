<!DOCTYPE hyml>
<html lang= "es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Iniciar Sesión</title>
    </head>
    <body>
        <h2>Iniciar Sesión</h2>
        <form action="validarlogin.php" method="POST">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" required><br><br>
            <label for="contra">Contraseña.</label>
            <input type="password" name="contra" required><br><br>
            <input type="submit" value="Iniciar Sesión">
        </form>
    </body>
</html>