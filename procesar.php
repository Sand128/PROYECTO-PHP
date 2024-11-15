<?php
    include("conexcion.php"); // Asegúrate de que el archivo de conexión esté correcto

    // Revisar si los datos fueron enviados
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $matricula = $_POST['id'];
        $nombre = $_POST['nombre'];
        $tusuario = $_POST['tipo_usuario'];
        $usser = $_POST['usser'];
        $password = $_POST['passw']; 

        // Alta: Insertar un nuevo registro
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Cifrar la contraseña
        $sql = "INSERT INTO usuario (id, nombre, tipo_usuario, usser, passw, status,?) 
                VALUES (?, ?, ?, ?, ?, ?, 'activo',?)";
        
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ssssss", $matricula, $nombre, $tusuario, $usser, $hashedPassword);
            
            if ($stmt->execute()) {
                echo "Registro insertado exitosamente.";
                header("Location: tablaReguistro.php");
                exit;
            } else {
                echo "Error al insertar: " . $stmt->error;
            }
            $stmt->close();
        }      
    }
    // Cerrar la conexión a la base de datos
    $conn->close();
?>
