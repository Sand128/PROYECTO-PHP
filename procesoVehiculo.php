<?php
// Incluir la conexión a la base de datos
include("conexcion.php"); // Asegúrate de que este archivo contenga la conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $n_placas = $_POST['n_placas'];
    $n_serie = $_POST['n_serie'];
    $n_motor = $_POST['n_motor'];
    $km_v = $_POST['km_v'];
    $tanque_conbustibleE = $_POST['tanque_conbustibleE'];
    $tanque_conbustibleS = $_POST['tanque_conbustibleS'];
    // $foto = $_POST['foto']; // Campo para la foto (comentado)

    // Consulta para insertar los datos en la tabla 'vehiculo'
    $sql = "INSERT INTO vehiculo (marca, modelo, n_placas, n_serie, n_motor, km_v, tanque_conbustibleE, tanque_conbustibleS) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssisss", $marca, $modelo, $n_placas, $n_serie, $n_motor, $km_v, $tanque_conbustibleE, $tanque_conbustibleS);

    if ($stmt->execute()) {
        echo "Nuevo vehículo agregado exitosamente.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Cerrar la conexión
$conn->close();
?>