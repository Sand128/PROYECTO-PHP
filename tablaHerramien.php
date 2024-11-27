<?php
// Incluir la conexión a la base de datos
include("conexcion.php"); // Asegúrate de que este archivo contenga la conexión a la base de datos

// Consulta para obtener los datos de la tabla 'herramienta'
$sql = "SELECT id, nombre, descripcion, categoria, marca, modelo, estado FROM herramienta";
$result = $conn->query($sql);

if ($result === false) {
    die("Error en la consulta: " . $conn->error);
}
echo "<h2>Datos de la Tabla Herramienta</h2>";
echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Categoría</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Estado</th>
            <th>Actualizar</th>
            <th>Eliminar</th>
        </tr>";

// Mostrar los resultados en la tabla
while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>" . htmlspecialchars($row['id']) . "</td>
            <td>" . htmlspecialchars($row['nombre']) . "</td>
            <td>" . htmlspecialchars($row['descripcion']) . "</td>
            <td>" . htmlspecialchars($row['categoria']) . "</td>
            <td>" . htmlspecialchars($row['marca']) . "</td>
            <td>" . htmlspecialchars($row['modelo']) . "</td>
            <td>" . htmlspecialchars($row['estado']) . "</td>
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

// Cerrar la conexión
$conn->close();
?>
<!DOCTYPE>
<html>
    <head>
        <a href="formularioHerrami.php">Nuevo Registro</a>
        <!-- Incluir el archivo JavaScript externo -->
        <script src="js/confirmacionH.js"></script> <!-- Asume que está en la carpeta js/ -->
    </head>
</html>