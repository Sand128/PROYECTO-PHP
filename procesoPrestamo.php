<?php
// Incluir la conexión a la base de datos
include("conexcion.php"); // Asegúrate de que este archivo contenga la conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $id_practica = $_POST['id_practica'];
    $id_vehiculo = $_POST['id_vehiculo'];
    $id_usuario = $_POST['id_usuario'];
    $id_admin = $_POST['id_admin'];
    $hora_salida = $_POST['hora_salida'];
    $hora_entrada = $_POST['hora_entrada'];
    $fecha = $_POST['fecha'];

    // Consulta para insertar los datos en la tabla 'prestamos'
    $sql = "INSERT INTO prestamos (id_practica, id_vehiculo, id_usuario, id_admin, hora_salida, hora_entrada, fecha) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $id_practica, $id_vehiculo, $id_usuario, $id_admin, $hora_salida, $hora_entrada, $fecha);

    if ($stmt->execute()) {
        echo "Nuevo préstamo agregado exitosamente.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Consultas para obtener datos de las tablas relacionadas
$practicas = $conn->query("SELECT id FROM practica");
$vehiculos = $conn->query("SELECT id FROM vehiculo");
$usuarios = $conn->query("SELECT id FROM usuario");
$admins = $conn->query("SELECT id FROM admin");

// Cerrar la conexión
$conn->close();
?>
