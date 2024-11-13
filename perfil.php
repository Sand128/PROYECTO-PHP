<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php"); // Redirigir si no está autenticado
    exit();
}

// Datos del usuario (esto debería venir de la base de datos)
$usuario = $_SESSION['usuario'];
$nombreCompleto = "Nombre Apellido"; // Cambia esto por el nombre real del usuario
$correo = "usuario@example.com"; // Cambia esto por el correo real del usuario
$fotoPerfil = "ruta/a/la/foto.jpg"; // Cambia esto por la ruta real de la foto
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="perfil.css"> <!-- Archivo de estilos -->
    <title>Perfil de Usuario</title>
</head>
<body>
    <div class="container">
        <header>
            <h1>Perfil de Usuario</h1>
            <a href="logout.php">Cerrar sesión</a>
        </header>

        <div class="content">
            <aside class="menu">
                <h2>Menú</h2>
                <ul>
                    <li><a href="inicioUsuario.php">Inicio</a></li>
                    <li><a href="#">Configuraciones</a></li>
                    <li><a href="#">Historial de Compras</a></li>
                    <li><a href="#">Soporte</a></li>
                </ul>
            </aside>

            <main class="user-data">
                <h2>Datos del Usuario</h2>
                <div class="user-info">
                    <img src="<?php echo $fotoPerfil; ?>" alt="Foto de perfil" class="profile-pic">
                    <p><strong>Usuario:</strong> <?php echo htmlspecialchars($usuario); ?></p>
                    <p><strong>Nombre Completo:</strong> <?php echo htmlspecialchars($nombreCompleto); ?></p>
                    <p><strong>Correo Electrónico:</strong> <?php echo htmlspecialchars($correo); ?></p>
                    <!-- Agrega más datos del usuario aquí -->
                </div>
            </main>
        </div>
    </div>
</body>
</html>