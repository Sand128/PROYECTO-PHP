<?php
// Incluir la conexión a la base de datos
include("conexcion.php"); // Asegúrate de que este archivo contenga la conexión a la base de datos

// Consulta para obtener los datos de la tabla 'notificaciones'
$sql = "
    SELECT 
        n.id AS id_notificacion,
        n.id_prestamo,
        n.id_practica,
        n.tipo_usuario,
        n.tipo_admin,
        n.hora,
        n.fecha
    FROM 
        notificaciones n
";

$result = $conn->query($sql);

if ($result === false) {
    die("Error en la consulta: " . $conn->error);
}

echo "<h2>Datos de la Tabla Notificaciones</h2>";
echo "<table border='1'>
        <tr>
            <th>ID Notificación</th>
            <th>ID Préstamo</th>
            <th>ID Práctica</th>
            <th>Tipo Usuario</th>
            <th>Tipo Admin</th>
            <th>Hora</th>
            <th>Fecha</th>
        </tr>";

// Mostrar los resultados en la tabla
while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>" . htmlspecialchars($row['id_notificacion']) . "</td>
            <td>" . htmlspecialchars($row['id_prestamo']) . "</td>
            <td>" . htmlspecialchars($row['id_practica']) . "</td>
            <td>" . htmlspecialchars($row['tipo_usuario']) . "</td>
            <td>" . htmlspecialchars($row['tipo_admin']) . "</td>
            <td>" . htmlspecialchars($row['hora']) . "</td>
            <td>" . htmlspecialchars($row['fecha']) . "</td>
          </tr>";
}

echo "</table>";

// Cerrar la conexión
$conn->close();
?>