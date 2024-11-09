<?php
include('conexcion.php');

if ($conn->connect_error) {
    die("ERROR de conexión: " . $conn->connect_error);
}

if (isset($_POST['matricula'])) {
    $matricula = $_POST['matricula'];
    $nombre = $_POST['nombre'];
    $paterno = $_POST['paterno'];
    $materno = $_POST['materno'];
    $edad = $_POST['edad'];
    $usuario = $_POST['usuario'];
    $cont = $_POST['psw'];
    // Manejo de la imagen
    $imagen = 'imagenes/icons8-avatar-30.png'; // Imagen por defecto
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
        // Validar el tipo de archivo
        $tipoArchivo = $_FILES['imagen']['type'];
        $tiposPermitidos = ['image/jpeg', 'image/png', 'image/gif'];

        if (in_array($tipoArchivo, $tiposPermitidos)) {
            // Definir la carpeta donde se guardarán las imágenes
            $carpetaDestino = 'fotos/';
            $nombreImagen = uniqid() . '-' . basename($_FILES['imagen']['name']); // Cambiar nombre
            $rutaImagen = $carpetaDestino . $nombreImagen;

            // Mover el archivo subido a la carpeta de destino
            if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaImagen)) {
                $imagen = $rutaImagen; // Actualizar la variable imagen con la ruta de la imagen subida
            } else {
                echo "<script> alert('Error al subir la imagen.'); </script>";
            }
        } else {
            echo "<script> alert('Tipo de archivo no permitido. Solo se permiten imágenes JPEG, PNG y GIF.'); </script>";
        }
    }

    // Preparar la consulta SQL
    $sql = "UPDATE alumnos SET Nombre=?, 
                                Paterno=?, 
                                Materno=?, 
                                Edad=?, 
                                Usuario=?, 
                                Cont=?, 
                                imagen=? 
                                WHERE Matricula=?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    // Vincular parámetros
    $stmt->bind_param("ssssssss",
                        $nombre,
                        $paterno,
                        $materno,
                        $edad,
                        $usuario,
                        $cont,
                        $imagen,
                        $matricula);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "<script> alert('Registro actualizado correctamente.'); </script>";
    } else {
        echo "<script> alert('ERROR al actualizar el registro.'); </script>";
        // echo "Error al actualizar el registro: " . $stmt->error;
    }

    // Cerrar la declaración
    $stmt->close();
}

// Cerrar la conexión
$conn->close();
?>  