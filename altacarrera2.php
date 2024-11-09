<?php
include("conexcion.php"); // Corregido 'conexcion.php' a 'conexion.php'
// Revisar si los datos fueron enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos enviados desde el formulario
    $nombre = $_POST['nombre'];
    $semestre = $_POST['semestre'];

    // Consulta SQL para insertar los datos
    $sql = "INSERT INTO carrera ( Nombre, N_semestres) VALUES ('$nombre', '$semestre')";

    // Ejecutar la consulta
    
    if ($conn->query($sql)==TRUE) {
        echo "<h1>Registro exitoso</h1>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
// Cerrar la conexión
mysqli_close($conn);
?>
