<?php
include("conexcion.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios Registrados</title>
 
    <form action="busquedaUsuario.php" method="POST" class="search-form">
        <button type="submit" class="search-btn">
            <img src="iconos/icons8-search-50.png" alt="Buscar" class="search-icon"> <!-- Ícono de lupa -->
        </button>
    </form>
    
    <!-- Incluir el archivo JavaScript externo -->
    <script src="js/confirmacion.js"></script> <!-- Asume que está en la carpeta js/ -->
</head>
<body>

<?php
$sql = "SELECT foto, id, nombre, tipo_usuario,tipo_admin, usser, passw, status FROM usuario";
$result = $conn->query($sql);

echo "<h2>Usuarios Registrados</h2>";
echo "<table border='1'>
        <tr>
            <th>Foto</th>
            <th>ID</th>
            <th>Nombre completo</th>
            <th>Tipo de usuario</th>
            <th>Tipo de admin</th>
            <th>Nombre para iniciar sesión</th>
            <th>Contraseña</th>
            <th>Estatus</th>
            <th>Actualizar</th>
            <th>Eliminar</th>
        </tr>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
            <td><img src='" . htmlspecialchars($row['foto']) . "' alt='Foto' width='50'></td>
            <td>" . htmlspecialchars($row['id']) . "</td>
            <td>" . htmlspecialchars($row['nombre']) . "</td>
            <td>" . htmlspecialchars($row['tipo_usuario']) . "</td>
            <td>" . htmlspecialchars($row['tipo_admin']) . "</td>
            <td>" . htmlspecialchars($row['usser']) . "</td>
            <td>" . htmlspecialchars($row['passw']) . "</td>
            <td>" . htmlspecialchars($row['status']) . "</td>
            
            <!-- Botón para actualizar -->
            <td>
                <button onclick='confirmarActualizacion(\"" . urlencode($row['id']) . "\")'>
                    <img src='iconos/icons8-actualizar-50.png' alt='Actualizar' width='30' height='30'>
                </button>
            </td>

            <!-- Botón para eliminar -->
            <td>
                <button onclick='confirmacionEliminacion(\"" . urlencode($row['id']) . "\")'>
                    <img src='iconos/icons8-eliminar-50.png' alt='Eliminar' width='30' height='30'>
                </button>
            </td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No hay registros.</p>";
}

$conn->close();
?>

</body>
</html>
