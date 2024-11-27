<?php
session_start();
include("conexcion.php");

// Verificar si el usuario está logueado
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$usuario = $_SESSION['usuario'];

// Obtener los datos del usuario
$sql = "SELECT * FROM usuario WHERE usser = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $userData = $result->fetch_assoc();
    if ($userData['status'] != 'activo') {
        header("Location: login.php?error=usuario_inactivo");
        exit();
    }
}

// Verificar tipo de usuario y asignar la clase al body
$typeClass = "";
switch ($userData['tipo_usuario']) {
    case 'alumno':
        $typeClass = 'alumno';
        break;
    case 'maestro':
        $typeClass = 'maestro';
        break;
    case 'administrativo':
        $typeClass = 'administrativo';
        break;
    case 'ayudante':
        $typeClass = 'ayudante';
        break;
    default:
        $typeClass = 'administrativo'; // Valor por defecto
        break;
}

// Simular si hay notificaciones
$hasNotifications = true; // Cambia esto según tu lógica
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Administrativo</title>
    <link rel="stylesheet" href="css/styles.css">
    
</head>

<body class="<?php echo $typeClass; ?>">
    <header>
        <h1>Bienvenido, <?php echo htmlspecialchars($userData['nombre']); ?></h1>
        <button id="notification-bell" class="notification-bell" onclick="openNotifications()">
            <img id="bell-icon" src="iconos/campana.png" alt="Campana" style="width: 100%; height: 100%;">
            <span id="unseen-badge">1</span> <!-- Ejemplo de badge -->
        </button>
    </header>

    <script>
        // Cambiar la imagen de la campana si hay notificaciones
        let hasNotifications = <?php echo json_encode($hasNotifications); ?>; // Cambia esto según tu lógica

        if (hasNotifications) {
            document.getElementById('unseen-badge').textContent = '1'; // Actualiza con el número real de notificaciones
            document.getElementById('bell-icon').src = 'iconos/campana_con_notificaciones.png'; // Cambia la imagen si hay notificaciones
        }

        function openNotifications() {
            // Abrir una nueva ventana o redirigir a la página de notificaciones
            window.open('tablaNotificaciones.php', '_blank'); // Cambia a tu página de notificaciones
        }
    </script>

    <div class="container">
        <h2>Mis Datos</h2>
        <p><strong>Nombre:</strong> <?php echo $userData['nombre']; ?></p>
        <p><strong>Matrícula:</strong> <?php echo $userData['usser']; ?></p>
        <p><strong>Estado:</strong> <?php echo $userData['status']; ?></p>
        <h2>Consultar Inventario</h2>
        <form action="busqueda.php" method="POST" class="search-form">
            <input type="text" id="Dato" name="Dato" placeholder="Buscar ..." required>
            <button type="submit" class="search-btn">
                <img src="iconos/icons8-search-50.png" alt="Buscar" class="search-icon"> <!-- Ícono de lupa -->
            </button>
        </form>
        <h2>Prácticas Asignadas para el Mes</h2>
        <?php
        // Obtener todas las prácticas
        $sql = "SELECT * FROM practica";
        $result = mysqli_query($conn, $sql);

        // Mostrar las prácticas en una tabla
        echo "<table>";
        echo "<tr><th>Folio</th><th>Tipo</th><th>Materia</th><th>Unidad</th><th>Alumnos</th><th>Grupo</th><th>Resultados</th><th>Archivo PDF</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                        <td>{$row['folio']}</td>
                        <td>{$row['tipo']}</td>
                        <td>{$row['materia']}</td>
                        <td>{$row['unidad']}</td>
                        <td>{$row['num_alumnos']}</td>
                        <td>{$row['grupo']}</td>
                        <td>{$row['resultados']}</td>
                        <td><a href='practicas/{$row['archivo_pdf']}'>Ver PDF</a></td>
                    </tr>";
        }
        echo "</table>";
        // Cerrar la conexión
        mysqli_close($conn);
        ?>
        <!-- Menu desplegable 1 -->
        <div class="dropdown">
            <button>Inventario</button>
            <div class="dropdown-content">
                <a href="tablaVehiculo.php">Vehiculos</a>
                <a href="tablaEquipo.php">Equipo</a>
                <a href="tablaHerramien.php">Herramienta</a>
            </div>
        </div>
        <!-- Menu desplegable 2 -->
        <div class="dropdown">
            <button onclick="location.href='tablaNotificaciones.php'">Notificaciones</button>
        </div>
        <!-- Menu desplegable 3 -->
        <div class="dropdown">
            <button onclick="location.href='tablaMovimientos.php'">Movimientos</button>
        </div>
        <!-- Menu desplegable 4 -->
        <div class="dropdown">
            <button>Usuarios</button>
            <div class="dropdown-content">
                <a href="tablaReguistro.php">Mostrar registros</a>
                <a href="formularioReguistro.php">Registrar</a>
                <a href="busquedaUsuario.php">Eliminar</a>
                <a href="actualizarRegistroUsuario.php">Actualizar</a>
            </div>    
        </div>
    </div>

</body>
</html>