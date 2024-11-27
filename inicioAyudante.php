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
        $typeClass = 'ayudante'; // Valor por defecto
        break;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Ayudante</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body class="<?php echo $typeClass; ?>">

    <h1>Bienvenido, <?php echo htmlspecialchars($userData['nombre']); ?></h1>

    <div class="container">
        <h2>Mis Datos</h2>
        <p><strong>Nombre:</strong> <?php echo $userData['nombre']; ?></p>
        <p><strong>Matrícula:</strong> <?php echo $userData['usser']; ?></p>
        <p><strong>Estado:</strong> <?php echo $userData['status']; ?></p>

        <h2>Prácticas Asignadas para el Mes</h2>
            <?php
    $sql = "SELECT pf.id, p.folio, p.materia, p.grupo, f.fecha, pf.hora FROM prac_fecha AS pf, fecha AS f, practica AS p";
    $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo "<table border='1'>
                                <tr>
                                    <td>Orden</td>
                                    <td>Folio practica</td>
                                    <td>Materia</td>
                                    <td>Grupo</td>
                                    <td>Fecha</td>
                                    <td>Hora</td>
                                    <td>Estatus</td>
                                </tr>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                                        <td>" . $row['id'] . "</td>
                                        <td>" . $row['folio'] . "</td>
                                        <td>" . $row['materia'] . "</td>
                                        <td>" . $row['grupo'] . "</td>
                                        <td>" . $row['fecha'] . "</td>
                                        <td>". $row['hora'] ."</td>
                                        <td><a href='#?folio=" . $row['folio'] . "'>
                                        <img src='iconos/icons8-reloj-100.png' alt='Editar' width='30' height='30'></a></td>
                                </tr>";
                }
                echo "</table>";
            } else {
                echo "No hay reguistros disponibles.";
            }
            // Cerrar la conexión
            mysqli_close($conn);
            ?>
        <h2>Consultar Inventario</h2>
        <form action="busqueda.php" method="POST" class="search-form">
            <input type="text" id="Dato" name="Dato" placeholder="Buscar ..." required>
            <button type="submit" class="search-btn">
                <img src="iconos/icons8-search-50.png" alt="Buscar" class="search-icon"> <!-- Ícono de lupa -->
            </button>
        </form>

    </div>

</body>
</html>
