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

if ($result->num_rows === 0) {
    header("Location: login.php?error=usuario_no_encontrado");
    exit();
}

$userData = $result->fetch_assoc();
if ($userData['status'] != 'activo') {
    header("Location: login.php?error=usuario_inactivo");
    exit();
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
        $typeClass = 'maestro'; // Valor por defecto
        break;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Maestro</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body class="<?php echo htmlspecialchars($typeClass); ?>">

    <h1>Bienvenido, <?php echo htmlspecialchars($userData['nombre']); ?></h1>

    <div class="container">
        <h2>Mis Datos</h2>
        <p><strong>Nombre:</strong> <?php echo htmlspecialchars($userData['nombre']); ?></p>
        <p><strong>Matrícula:</strong> <?php echo htmlspecialchars($userData['usser']); ?></p>
        <p><strong>Estado:</strong> <?php echo htmlspecialchars($userData['status']); ?></p>

        <h2>Subir una Práctica</h2>
        <form action="guardar_practica.php" method="POST" enctype="multipart/form-data">
            <label for="folio">Folio de la practica:</label>
            <input type="text" name="folio" id="folio" required><br><br>

            <label for="tipo">Tipo:</label>
            <input type="text" name="tipo" id="tipo" value="Practica" required><br><br>

            <label for="materia">Materia:</label>
            <input type="text" name="materia" id="materia" value="Materia" required><br><br>

            <label for="unidad">Unidad:</label>
            <input type="text" name="unidad" id="unidad" value="Unidad 1" required><br><br>

            <label for="num_alumnos">Número de alumnos:</label>
            <input type="number" name="num_alumnos" id="num_alumnos" value="1" required><br><br>

            <label for="grupo">Grupo:</label>
            <input type="text" name="grupo" id="grupo" required><br><br>

            <label for="resultados">Resultados:</label>
            <textarea name="resultados" id="resultados" required></textarea><br><br>

            <label for="pdf">Subir PDF de la práctica:</label>
            <input type="file" name="archivo" id="pdf" accept=".pdf" required><br><br>


            <button type="submit" name="submit">Subir Práctica</button>
        </form>

        <h2>Agendar Practica</h2>
        <form action="agendar_practica.php" method="POST">
            <label for="folio">Folio de la practica:</label>
            <input type="text" name="folio" id="folio" required><br><br>

            <label for="fecha">Fecha de la Cita:</label><br>
            <input type="date" id="fecha" name="fecha" required><br><br>

            <label for="hora">Hora de la practica:</label>
            <input type="time" id="hora" name="hora" required><br><br>
            <button type="submit">Agendar Cita</button>

        </form>

        <h2>Prácticas Realizadas</h2>
        
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