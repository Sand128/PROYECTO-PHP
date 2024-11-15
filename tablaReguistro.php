<?php
include("conexcion.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios Registrados</title>

    <!-- Incluir el archivo JavaScript externo -->
    <script src="js/acciones.js"></script> <!-- Asume que está en la carpeta js/ -->

</head>
<body>

<?php
$sql = "SELECT  foto,id, nombre, tipo_usuario, usser, passw,status FROM usuario";
$result = $conn->query($sql);

echo "<h2>Usuarios Registrados</h2>";
echo "<table border='1'>
        <tr>
            <td>Foto</td>
            <td>Matrícula</td>
            <td>Nombre completo</td>
            <td>Tipo de usuario</td>
            <td>Nombre para iniciar sesión</td>
            <td>Contraseña</td>
            <td>Estatus</td>
            <td>Actualizar</td>
            <td>Eliminar</td>
        </tr>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>" . htmlspecialchars($row['foto']) . "</td>
            <td>" . htmlspecialchars($row['id']) . "</td>
            <td>" . htmlspecialchars($row['nombre']) . "</td>
            <td>" . htmlspecialchars($row['tipo_usuario']) . "</td>
            <td>" . htmlspecialchars($row['usser']) . "</td>
            <td>" . htmlspecialchars($row['passw']) . "</td>
            <td>" . htmlspecialchars($row['status']) . "</td>
            
            <!-- Botón para actualizar con confirmación de contraseña -->
            <td>
                <button onclick='confirmarActualizacion(\"" . urlencode($row['id']) . "\")'>
                    <img src='iconos/icons8-actualizar-50.png' alt='Actualizar' width='30' height='30'>
                </button>
            </td>

            <!-- Botón para eliminar con confirmación de contraseña -->
            <td>
                <!-- Corregido el paso de la matrícula a la función JS -->
                <button onclick='confirmarEliminacion(\"" . urlencode($row['id']) . "\", \"insertar\")'>
                    <img src='iconos/icons8-eliminar-50.png' alt='Eliminar' width='30' height='30'>
                </button>
            </td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "No hay registros.";
}

$conn->close();
?>

</body>
</html>
