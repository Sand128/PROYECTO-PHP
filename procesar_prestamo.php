<?php
include("conexcion.php");
// Preparar la consulta para insertar el préstamo
$sql = "INSERT INTO prestamos (id, id_practica, id_vehiculo, id_usuario, id_admin, hora_salida, hora_entrada, fecha) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

// Preparar la consulta
$stmt = $conn->prepare($sql);

// Asignar valores a los parámetros
$id = $_POST['id'];
$id_practica = $_POST['id_practica'];
$id_vehiculo = $_POST['id_vehiculo'];
$id_usuario = $_POST['id_usuario'];
$id_admin = $_POST['id_admin'];
$hora_salida = $_POST['hora_salida'];
$hora_entrada = $_POST['hora_entrada'];
$fecha = $_POST['fecha'];

$stmt->bind_param("isssssss", $id, $id_practica, $id_vehiculo, $id_usuario, $id_admin, $hora_salida, $hora_entrada, $fecha);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo "Préstamo registrado exitosamente.";
} else {
    echo "Error: " . $stmt->error;
}

// Cerrar la declaración y la conexión
$stmt->close();
$conn->close();
header("Location:inicio.php");

?>