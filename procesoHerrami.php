<?php
// Incluir la conexión a la base de datos
include("conexcion.php"); // Asegúrate de que este archivo contenga la conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $categoria = $_POST['categoria'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $estado = $_POST['estado'];

    // Consulta para insertar los datos en la tabla 'herramienta'
    $sql = "INSERT INTO herramienta (nombre, descripcion, categoria, marca, modelo, estado) 
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $nombre, $descripcion, $categoria, $marca, $modelo, $estado);

    if ($stmt->execute()) {
        echo "Nueva herramienta agregada exitosamente.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Cerrar la conexión
$conn->close();
?>