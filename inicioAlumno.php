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
        $typeClass = 'alumno'; // Valor por defecto
        break;
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio Alumno</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>

    <body class="<?php echo $typeClass; ?>">

        <h1>Bienvenido, <?php echo htmlspecialchars($userData['nombre']); ?></h1>

        <div class="container">
            <h2>Mis Datos</h2>
            <p><strong>Nombre:</strong> <?php echo $userData['nombre']; ?></p>
            <p><strong>Matrícula:</strong> <?php echo $userData['usser']; ?></p>
            <p><strong>Estado:</strong> <?php echo $userData['status']; ?></p>

            <h2>Mis Prácticas Realizadas</h2>
                <?php        
                    $sql = "SELECT folio,materia,unidad,grupo FROM practica";
                    $result = mysqli_query($conn, $sql);
                    
                    if (mysqli_num_rows($result) > 0) {
                        echo "<table border='1'>
                            <tr>
                                <td>Folio</td>
                                <td>Materia</td>
                                <td>Unidad</td>
                                <td>Grupo</td>
                                <td>Descargar</td>
                            </tr>";
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                    <td>" . $row['folio'] . "</td>
                                    <td>" . $row['materia'] . "</td>
                                    <td>" . $row['unidad'] . "</td>
                                    <td>" . $row['grupo'] . "</td>
                            </tr>";
                        }
                    echo "</table>";
                }else{
                    echo "No hay reguistros disponibles.";
                }
                // Cerrar la conexión
                mysqli_close($conn);
                ?>

            <h2>Solicitar Préstamos de Herramientas</h2>

        </div>
    </body>
</html>