<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php"); // Redirigir si no está autenticado
    exit();
}

// Datos del usuario (esto debería venir de la base de datos)
$usuario = $_SESSION['usuario'];
$fotoPerfil = "ruta/a/la/foto.jpg"; // Cambia esto por la ruta real de la foto
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/inicioUsuario.css"> <!-- Si está en una carpeta llamada 'css' -->
    <title>InicioUsuario</title>
</head>
<body>
    <div class="container">
        <header>
            <h1>Bienvenido</h1>
            <p>Has iniciado sesión correctamente.</p>
            <a href="logout.php">Cerrar sesión</a>
        </header>

        <div class="content">
            <aside class="menu">
                <h2>Menú</h2>
                <ul>
                    <li><a href="#">Perfil</a></li>
                    <li><a href="#">Configuraciones</a></li>
                    <li><a href="#">Historial de Compras</a></li>
                    <li><a href="#">Soporte</a></li>
                </ul>
            </aside>

            <main class="user-data">
                <h2>Datos del Usuario</h2>
                <div class="user-info">
                    <img src="<?php echo $fotoPerfil; ?>" alt="Foto de perfil" class="profile-pic">
                    <p>Usuario: <?php echo htmlspecialchars($usuario); ?></p>
                    <!-- Agrega más datos del usuario aquí -->
                </div>
            </main>
        </div>
    </div>
</body>
</html>