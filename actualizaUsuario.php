<?php
    // Incluir la conexión a la base de datos
    include("conexcion.php");

    // Verificar si se han enviado los datos del formulario
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Suponiendo que has recibido los datos del formulario y los has asignado a las variables correspondientes
        $matricula = $_POST['id']; // La matrícula es el identificador único
        $nombre = $_POST['nombre'];
        $usser = $_POST['usser'];
        $password = $_POST['passw']; 
        $status = $_POST['status'];

            $sql = "UPDATE usuario SET 
                        nombre=?, 
                        usser=?,
                        passw=?,
                        Status=? 
                    WHERE id=?";
            
            // Preparar la declaración
            $stmt = $conn->prepare($sql);
            if ($stmt === false) {
                die("Error en la preparación de la consulta: " . $conn->error);
            }

            // Vincular los parámetros sin la contraseña
            $stmt->bind_param("ssssi", 
                                $nombre, 
                                $usser, 
                                $password,
                                $status, 
                                $matricula);
        }

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "<script> alert('Registro actualizado correctamente.'); </script>";
        } else {
            echo "<script> alert('ERROR al actualizar el registro.'); </script>";
        }

        // Cerrar la declaración
        $stmt->close();

        // Redirigir a la página de usuarios
        header("Location: tablaReguistro.php");
        exit; // Asegúrate de salir después de la redirección
    
    // Cerrar la conexión
    $conn->close();
?>