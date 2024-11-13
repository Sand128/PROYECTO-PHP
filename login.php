<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Inventario Web</title>
    <link rel="stylesheet" href="css/global.css"> <!-- Estilos comunes para toda la web -->
    <link rel="stylesheet" href="css/login.css"> <!-- Estilos específicos para el login -->
</head>
<body class="login-page">
    
    <div class="login-container">
        <h2>Iniciar Sesión</h2>
        
        <!-- Imagen del usuario -->
        <img src="iconos/icons8-avatar-30.png" alt="usuario" class="icon"> <!-- Asegúrate de cambiar la ruta de la imagen -->
        
        <!-- Login Form -->
        <form action="validarlogin.php" method="POST">
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" required placeholder="Ingresa tu usuario">
            
            <label for="contra">Contraseña:</label>
            <input type="password" id="contra" name="contra" required placeholder="Ingresa tu contraseña">
            
            <input type="submit" value="Iniciar Sesión">
        </form>

        <!-- Display error message if login failed -->
        <?php
            if (isset($_GET['error'])) {
                echo "<p class='error-message'>Usuario o contraseña incorrectos.</p>";
            }
        ?>
    </div>

</body>
</html>
