<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario Web</title>
    <link rel="stylesheet" href="css/global.css"> <!-- Estilos comunes para toda la web -->
    <link rel="stylesheet" href="css/login.css"> <!-- Estilos específicos para el botón de login -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
</head>
 
<body class="login-page">
    
    <div class="login-container">
        <h2>Iniciar Sesión</h2>
        
        <!-- Imagen del usuario -->
        <img src="iconos/icons8-avatar-30.png" alt="Usuario" class="icon"> <!-- Asegúrate de cambiar la ruta de la imagen -->
        
        <form action="validarlogin.php" method="POST">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" required>
            
            <label for="contra">Contraseña:</label>
            <input type="password" name="contra" required>
            
            <input type="submit" value="Iniciar Sesión">
        </form>
    </div>
</body>
</html>