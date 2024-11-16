<?php
include('conexcion.php'); // Asegúrate de que la conexión a la base de datos esté establecida.

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if (isset($_POST['seleccionar'])) {
    // Suponiendo que cada checkbox tiene el ID del artículo
    $seleccionados = $_POST['seleccionar'];

    // Aquí deberías agregar el código para procesar estos ítems
    foreach ($seleccionados as $id) {
        // Procesar cada id, como agregarlo a la sesión o base de datos
        echo ": " . htmlspecialchars($id) . "<br>";
    }
}else {
    echo "No se seleccionaron elementos o hubo un error con los datos enviados.";
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>
