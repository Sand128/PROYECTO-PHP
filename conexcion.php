<?php
    // Credenciales
    $server = "localhost";
    $database = "isc171";
    $username = "root";
    $psw = "";

    // Crear la conexión a la base de datos local    
    $conn = mysqli_connect($server, $username, $psw, $database);

    // Revisar que la conexión fue exitosa
    if (!$conn) {
        die("Conexión fallida: " . mysqli_connect_error());
    }
    echo "Conexión correcta";
    // Cerrar la conexión
    //mysqli_close($conn);
?>
