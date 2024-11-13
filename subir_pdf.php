<?php
    session_start();
    include("conexcion.php");

    if (isset($_POST['submit'])) {
        // Comprobamos si el archivo fue subido
        if (isset($_FILES['pdf_file']) && $_FILES['pdf_file']['error'] == 0) {
            // Obtener la información del archivo subido
            $file_name = $_FILES['pdf_file']['name'];
            $file_tmp_name = $_FILES['pdf_file']['tmp_name'];
            $file_size = $_FILES['pdf_file']['size'];
            $file_type = $_FILES['pdf_file']['type'];

            // Verificar que el archivo sea un PDF
            $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
            if ($file_extension == 'pdf') {
                // Definir el directorio donde se almacenará el archivo
                $upload_dir = 'practicas/';  // Asegúrate de que esta carpeta exista en tu servidor
                $upload_file = $upload_dir . basename($file_name);

                // Mover el archivo desde el directorio temporal a la carpeta de destino
                if (move_uploaded_file($file_tmp_name, $upload_file)) {
                    echo "El archivo PDF se ha subido correctamente.";
                } else {
                    echo "Hubo un error al subir el archivo. Intenta nuevamente.";
                }
            } else {
                echo "Solo se permite la carga de archivos PDF.";
            }
        } else {
            echo "No se seleccionó ningún archivo o hubo un error al subirlo.";
        }
    }
?>
