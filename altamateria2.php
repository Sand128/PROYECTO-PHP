<?php
include("conexcion.php"); // Corregido 'conexcion.php' a 'conexion.php'
// Revisar si los datos fueron enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos enviados desde el formulario
    $clave = $_POST['clave'];
    $nombre = $_POST['nombre'];
    $unidades = $_POST['unidades'];

    // Consulta SQL para insertar los datos
    $sql = "INSERT INTO materias (Clave, Nombre, Unidades) VALUES ('$clave', '$nombre', '$unidades')";

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
