<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario Web</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/inicio.css"> <!-- Estilos específicos para la página de inicio -->
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
        <form action="busqueda.php" method="POST" class="search-form">
            <input type="text" id="Dato" name="Dato" placeholder="Buscar ..." required>
            <button type="submit" class="search-btn">
                <img src="iconos/icons8-search-50.png" alt="Buscar" class="search-icon"> <!-- Ícono de lupa -->
            </button>
        </form>

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
                    <?php
                    include("conexcion.php");
                    $sql = "SELECT marca,modelo FROM vehiculo";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        echo "<table border='1'>
                                <tr>
                                    <td>Marca</td>
                                    <td>Modelo</td>
                                </tr>";
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                        <td>" . $row['marca'] . "</td>
                                        <td>" . $row['modelo'] . "</td>
                                </tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "No hay reguistros disponibles.";
                    }
                    // Cerrar la conexión
                    mysqli_close($conn);
                    ?>
                </div>
                <div class="inventario-item">
                    <h3>Herramientas</h3>
                    <?php
                    include("conexcion.php");
                    $sql = "SELECT nombre,marca,modelo FROM herramienta";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        echo "<table border='1'>
                                <tr>
                                    <td>Nombre</td>
                                    <td>Marca</td>
                                    <td>Modelo</td>
                                </tr>";
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                        <td>" . $row['marca'] . "</td>
                                        <td>" . $row['marca'] . "</td>
                                        <td>" . $row['modelo'] . "</td>
                                </tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "No hay reguistros disponibles.";
                    }
                    // Cerrar la conexión
                    mysqli_close($conn);
                    ?>
                </div>
                <div class="inventario-item">
                    <h3>Equipo</h3>
                    <?php
                    include("conexcion.php");
                    $sql = "SELECT nombre,categoria FROM equipo";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        echo "<table border='1'>
                                <tr>
                                    <td>Nombre</td>
                                    <td>Categoria</td>
                                </tr>";
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                        <td>" . $row['nombre'] . "</td>
                                        <td>" . $row['categoria'] . "</td>
                                </tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "No hay reguistros disponibles.";
                    }
                    // Cerrar la conexión
                    mysqli_close($conn);
                    ?>
                </div>
            </section>
        </main>

        <footer>
            <p>&copy; 2024 Sistema web de control de inventario y préstamo. Todos los derechos reservados.</p>
        </footer>
</body>

</html>