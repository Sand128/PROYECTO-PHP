<?php
// Incluir la conexión a la base de datos
include("conexcion.php"); // Asegúrate de que este archivo contenga la conexión a la base de datos

// Consulta para obtener los datos de la tabla 'movimientos' junto con información de 'equipo' y 'herramienta'
$sql = "
    SELECT 
        m.id_herramienta,
        m.id_equipo,
        m.tipo_admin,
        m.fecha,
        m.hora,
        m.accion,
        m.observaciones,
        e.nombre AS nombre_equipo,
        h.nombre AS nombre_herramienta
    FROM 
        movimientos m
    LEFT JOIN 
        equipo e ON m.id_equipo = e.id
    LEFT JOIN 
        herramienta h ON m.id_herramienta = h.id
";

$result = $conn->query($sql);

if ($result === false) {
    die("Error en la consulta: " . $conn->error);
}

echo "<h2>Datos de la Tabla Movimientos</h2>";
echo "<table border='1'>
        <tr>
            <th>ID Herramienta</th>
            <th>Nombre Herramienta</th>
            <th>ID Equipo</th>
            <th>Nombre Equipo</th>
            <th>Tipo Admin</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Acción</th>
            <th>Observaciones</th>
        </tr>";

// Mostrar los resultados en la tabla
while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>" . htmlspecialchars($row['id_herramienta']) . "</td>
            <td>" . htmlspecialchars($row['nombre_herramienta']) . "</td>
            <td>" . htmlspecialchars($row['id_equipo']) . "</td>
            <td>" . htmlspecialchars($row['nombre_equipo']) . "</td>
            <td>" . htmlspecialchars($row['tipo_admin']) . "</td>
            <td>" . htmlspecialchars($row['fecha']) . "</td>
            <td>" . htmlspecialchars($row['hora']) . "</td>
            <td>" . htmlspecialchars($row['accion']) . "</td>
            <td>" . htmlspecialchars($row['observaciones']) . "</td>
          </tr>";
}

echo "</table>";

// Cerrar la conexión
$conn->close();
?>