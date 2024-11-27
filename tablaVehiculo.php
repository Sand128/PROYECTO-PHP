<?php
// Incluir la conexión a la base de datos
include("conexcion.php"); // Asegúrate de que este archivo contenga la conexión a la base de datos

// Consulta para obtener los datos de la tabla 'vehiculo'
$sql = "SELECT id, marca, modelo, n_placas, n_serie, n_motor, km_v, tanque_conbustibleE, tanque_conbustibleS FROM vehiculo";
$result = $conn->query($sql);

if ($result === false) {
    die("Error en la consulta: " . $conn->error);
}

echo "<h2>Datos de la Tabla Vehículo</h2>";
echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Número de Placas</th>
            <th>Número de Serie</th>
            <th>Número de Motor</th>
            <th>Kilómetros</th>
            <th>Tanque de Combustible (E)</th>
            <th>Tanque de Combustible (S)</th>
            <th>Actualizar</th>
            <th>Eliminar</th>
        </tr>";

// Mostrar los resultados en la tabla
while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>" . htmlspecialchars($row['id']) . "</td>
            <td>" . htmlspecialchars($row['marca']) . "</td>
            <td>" . htmlspecialchars($row['modelo']) . "</td>
            <td>" . htmlspecialchars($row['n_placas']) . "</td>
            <td>" . htmlspecialchars($row['n_serie']) . "</td>
            <td>" . htmlspecialchars($row['n_motor']) . "</td>
            <td>" . htmlspecialchars($row['km_v']) . "</td>
            <td>" . htmlspecialchars($row['tanque_conbustibleE']) . "</td>
            <td>" . htmlspecialchars($row['tanque_conbustibleS']) . "</td>
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
        <a href="formularioVehiculo.php">Nuevo Registro</a>
        <!-- Incluir el archivo JavaScript externo -->
        <script src="js/confirmacionV.js"></script> <!-- Asume que está en la carpeta js/ -->
    </head>
</html>