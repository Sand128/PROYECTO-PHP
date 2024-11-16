<?php
session_start();
include("conexcion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $folio = $_POST['folio'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];

    // Verificar si los campos están vacíos
    if (empty($folio) || empty($fecha) || empty($hora)) {
        echo "Por favor, complete todos los campos.";
        exit;
    }

    // Asegúrate de que la fecha esté en el formato correcto (YYYY-MM-DD)
    $fecha = date('Y-m-d', strtotime($fecha));

    // Escapar los valores para evitar inyecciones SQL
    $folio = mysqli_real_escape_string($conn, $folio);
    $fecha = mysqli_real_escape_string($conn, $fecha);
    $hora = mysqli_real_escape_string($conn, $hora);

    // Consulta preparada para insertar en la tabla fecha
    $sql_fecha = "INSERT INTO fecha (fecha) VALUES ('$fecha')";
    
    if (mysqli_query($conn, $sql_fecha)) {
        // Obtener el ID de la fecha insertada
        $id_fecha = mysqli_insert_id($conn);

        // Crear la consulta de inserción en prac_fecha
        $query = "INSERT INTO prac_fecha (id_practica, id_fecha, hora) VALUES ('$folio', '$id_fecha', '$hora')";

        // Ejecutar la consulta
        if (mysqli_query($conn, $query)) {
            echo "Registro insertado correctamente.";
        } else {
            echo "Error al insertar en prac_fecha: " . mysqli_error($conn);
        }
    } else {
        echo "Error al insertar en fecha: " . mysqli_error($conn);
    }
}

// Cerrar la conexión
mysqli_close($conn);
?>