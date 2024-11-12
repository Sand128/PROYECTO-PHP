<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario Web</title>
    <link rel="stylesheet" href="css/global.css"> <!-- Estilos comunes para toda la web -->
    <link rel="stylesheet" href="css/inicio.css"> <!-- Estilos específicos para la página de inicio -->
    <link rel="stylesheet" href="css/login.css"> <!-- Estilos específicos para el botón de login -->
</head>

<body>
    <header>
        <div class="logo">
            <img src="logos/umb.png" alt="Logo de la UMB">
        </div>
        <nav>
            <ul>
                <li><a href="inicio.php">Inicio</a></li>
                <li><a href="https://umb.edomex.gob.mx/acerca_umb">Acerca de la UMB</a></li>
                <li><a href="infMecanica.php">Ingeniería Mecánica Automotriz</a></li>
                <li><a href="contacto.php">Contacto</a></li>
                <li><a href="login.php" class="btn-login">Iniciar Sesión</a></li> <!-- Botón de iniciar sesión -->
            </ul>
        </nav>
        <div class="search-container">
            <input type="text" id="search-input" placeholder="Buscar...">
            <button id="search-button">Buscar</button>
        </div>

        <!-- Modal para mostrar resultados -->
        <div id="resultados-modal" class="modal">
            <div class="modal-content">
                <span class="close" id="close-modal">&times;</span>
                <h2>Resultados de Búsqueda</h2>
                <div id="resultados"></div>
            </div>
        </div>
    </header>

    <section class="hero">
        <h1>Ingeniería Mecánica Automotriz</h1>
        <a href="#inventario" class="btn-primary">Ver inventario</a>
    </section>

    <div class="imagenes">
        <img src="imagenes/umb_mecanica.jpg" alt="Imagen 1" class="img-thumbnail">
        <img src="imagenes/taller.jpg" alt="Imagen 2" class="img-thumbnail">
        <img src="imagenes/descarga.jfif" alt="Imagen 3" class="img-thumbnail">
        <img src="imagenes/joven-automotriz-guantes.webp" alt="Imagen 4" class="img-thumbnail">
    </div>

    <section id="inventario" class="inventario">
        <h2>Nuestro inventario</h2>
        <div class="inventario-item">
            <h3>Vehículos</h3>
            <p>Descripción del producto 1.</p>
        </div>
        <div class="inventario-item">
            <h3>Herramientas</h3>
            <p>Descripción del producto 2.</p>
        </div>
        <div class="inventario-item">
            <h3>Material</h3>
            <p>Descripción del producto 3.</p>
        </div>
        <div class="inventario-item">
            <h3>Equipo</h3>
            <p>Descripción del producto 4.</p>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 Sistema web de control de inventario y préstamo. Todos los derechos reservados.</p>
    </footer>
    <script src="js/inicio.js" defer></script>
</body>

</html>