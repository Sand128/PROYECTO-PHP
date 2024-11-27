<?php
// Incluir la conexión a la base de datos
include("conexcion.php"); // Asegúrate de que este archivo contenga la conexión a la base de datos

// Consulta para obtener los datos de la tabla 'prestamos'
$sql = "SELECT p.id, p.id_practica, p.id_vehiculo, p.id_usuario, p.id_admin, p.hora_salida, p.hora_entrada, p.fecha 
        FROM prestamos p";
$result = $conn->query($sql);

if ($result === false) {
    die("Error en la consulta: " . $conn->error);
}

echo "<h2>Datos de la Tabla Préstamos</h2>";
echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>ID Práctica</th>
            <th>ID Vehículo</th>
            <th>ID Usuario</th>
            <th>ID Admin</th>
            <th>Hora Salida</th>
            <th>Hora Entrada</th>
            <th>Fecha</th>
        </tr>";

// Mostrar los resultados en la tabla
while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>" . htmlspecialchars($row['id']) . "</td>
            <td>" . htmlspecialchars($row['id_practica']) . "</td>
            <td>" . htmlspecialchars($row['id_vehiculo']) . "</td>
            <td>" . htmlspecialchars($row['id_usuario']) . "</td>
            <td>" . htmlspecialchars($row['id_admin']) . "</td>
            <td>" . htmlspecialchars($row['hora_salida']) . "</td>
            <td>" . htmlspecialchars($row['hora_entrada']) . "</td>
            <td>" . htmlspecialchars($row['fecha']) . "</td>
          </tr>";
}

echo "</table>";

// Cerrar la conexión
$conn->close();
?>