<?php
// Conectar a la base de datos
include("conexcion.php");

if (isset($_POST['submit'])) {

    
    // Obtener los valores del formulario
    $folio = $_POST['folio'];
    $tipo = $_POST['tipo'];
    $materia = $_POST['materia'];
    $unidad = $_POST['unidad'];
    $num_alumnos = $_POST['num_alumnos'];
    $grupo = $_POST['grupo'];
    $resultados = $_POST['resultados'];

    // Manejo del archivo PDF
    if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] == 0) {
        // Obtenemos la información del archivo subido
        $file_name = $_FILES['archivo']['name'];
        $file_tmp_name = $_FILES['archivo']['tmp_name'];
        $upload_dir = 'practicas/';  // Carpeta donde se guardará el archivo

        // Movemos el archivo a la carpeta de destino
        $file_path = $upload_dir . basename($file_name);
        if (move_uploaded_file($file_tmp_name, $file_path)) {
            // Insertar los datos en la tabla 'practica'
            $sql = "INSERT INTO practica (folio, tipo, materia, unidad, num_alumnos, grupo, resultados)
                    VALUES ('$folio', '$tipo', '$materia', '$unidad', '$num_alumnos', '$grupo', '$resultados')";

            if (mysqli_query($conn, $sql)) {
                echo "La práctica se ha guardado correctamente.";
            } else {
                echo "Error al guardar los datos en la base de datos.";
            }
        } else {
            echo "Error al subir el archivo.";
        }
    } else {
        echo "Por favor, selecciona un archivo PDF.";
    }
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>
