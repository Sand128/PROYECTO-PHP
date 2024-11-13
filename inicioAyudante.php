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
        <!-- Aquí se mostrará una tabla con las prácticas asignadas al ayudante -->

        <h2>Consultar Inventario</h2>
        <!-- Información del inventario -->

    </div>

</body>
</html>
