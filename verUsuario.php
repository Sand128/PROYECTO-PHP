<?php
// Incluir la conexión a la base de datos
include("conexcion.php");

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recoger la palabra clave de búsqueda
    $busqueda = $_POST['busqueda'];

    // Preparar la consulta SQL para buscar en la base de datos
    $sql = "SELECT foto, id, nombre, tipo_usuario, tipo_admin, usser, passw, status 
            FROM usuario 
            WHERE nombre LIKE ? OR usser LIKE ?";

    // Preparar la declaración
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    // Agregar comodines para la búsqueda
    $param = "%" . $busqueda . "%";
    $stmt->bind_param("ss", $param, $param);

    // Ejecutar la consulta
    $stmt->execute();
    $result = $stmt->get_result();

    echo "<h2>Resultados de la Búsqueda</h2>";
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
        echo "<p>No se encontraron resultados para la búsqueda.</p>";
    }

    // Cerrar la declaración
    $stmt->close();
}

// Cerrar la conexión
$conn->close();
?>