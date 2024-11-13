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
                <li><a href="https://umb.edomex.gob.mx/acerca_umb" target="_blank">Acerca de la UMB</a></li>
                <li><a href="infMecanica.php">Ingeniería Mecánica Automotriz</a></li>
                <li><a href="contacto.php">Contacto</a></li>
                <li><a href="login.php" class="btn-login">Iniciar Sesión</a></li> <!-- Botón de iniciar sesión -->
            </ul>
        </nav>
        <div class="search-container">
            <label for="search-input" class="visually-hidden">Buscar</label> <!-- Etiqueta para accesibilidad -->
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

    <main>
        <section class="hero">
            <h1>Ingeniería Mecánica Automotriz</h1>
            <a href="#inventario" class="btn-primary">Ver inventario</a>
        </section>

        <section class="galeria">
            <input type="radio" id="slide1" name="slider" checked>
            <input type="radio" id="slide2" name="slider">
            <input type="radio" id="slide3" name="slider">
            <input type="radio" id="slide4" name="slider">
            <input type="radio" id="slide5" name="slider">

            <div class="slides">
                <div class="slide">
                    <img src="imagenes/umb_mecanica.jpg" alt="Imagen de Ingeniería Mecánica">
                </div>
                <div class="slide">
                    <img src="imagenes/taller.jpg" alt="Imagen de Taller">
                </div>
                <div class="slide">
                    <img src=" imagenes/descarga.jfif" alt="Imagen de Descarga">
                </div>
                <div class="slide">
                    <img src="imagenes/WhatsApp Image 2024-11-12 at 11.53.17 AM" alt="Imagen de WhatsApp 1">
                </div>
                <div class="slide">
                    <img src="imagenes/WhatsApp Image 2024-11-12 at 11.53.18 AM (1).jpeg" alt="Imagen de WhatsApp 2">
                </div>
            </div>

            <div class="navegacion">
                <label for="slide1"></label>
                <label for="slide2"></label>
                <label for="slide3"></label>
                <label for="slide4"></label>
                <label for="slide5"></label>
            </div>
        </section>

        <section id="inventario" class="inventario">
            <h2>Nuestro inventario</h2>
            <div class="inventario-item">
                <h3>Vehículos</h3>
                <p>Descripción detallada del producto 1.</p>
            </div>
            <div class="inventario-item">
                <h3>Herramientas</h3>
                <p>Descripción detallada del producto 2.</p>
            </div>
            <div class="inventario-item">
                <h3>Material</h3>
                <p>Descripción detallada del producto 3.</p>
            </div>
            <div class="inventario-item">
                <h3>Equipo</h3>
                <p>Descripción detallada del producto 4.</p>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Sistema web de control de inventario y préstamo. Todos los derechos reservados.</p>
    </footer>

    <script src="js/inicio.js" defer></script>
</body>

</html>