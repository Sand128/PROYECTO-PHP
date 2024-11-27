<?php
// Incluir la conexión a la base de datos
include("conexcion.php"); // Asegúrate de que este archivo contenga la conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $estado = $_POST['estado'];
    $categoria = $_POST['categoria'];

    // Consulta para insertar los datos en la tabla 'equipo'
    $sql = "INSERT INTO equipo (nombre, descripcion, estado, categoria) 
            VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $nombre, $descripcion, $estado, $categoria);

    if ($stmt->execute()) {
        echo "Nuevo equipo agregado exitosamente.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
header("Location:tablaEquipo.php");
// Cerrar la conexión
$conn->close();
?>