<?php
include("conexcion.php"); // Asegúrate de que el archivo de conexión esté correcto

// Revisar si los datos fueron enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $matricula = $_POST['id'];
    $nombre = $_POST['nombre'];
    $tusuario = $_POST['tipo_usuario'];
    $usser = $_POST['usser'];
    $password = $_POST['passw']; 
    $foto = 'imagenes/icons8-avatar-30.png'; // Asignando una foto por defecto

    // Validar que todos los campos no estén vacíos
    if (empty($matricula) || empty($nombre) || empty($tusuario) || empty($usser)) {
        echo "Por favor, complete todos los campos.";
        exit; // Salir si faltan campos
    }

    // Cifrar la contraseña
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Usar una consulta preparada para evitar inyecciones SQL
    $sql = "INSERT INTO usuario (id, nombre, tipo_usuario, usser, passw, status, foto) 
            VALUES (?, ?, ?, ?, ?, 'activo', ?)";

    if ($stmt = $conn->prepare($sql)) {
        // Vincular los parámetros
        $stmt->bind_param("isssss", $matricula, $nombre, $tusuario, $usser, $hashedPassword, $foto);
        
        // Ejecutar la consulta
        if ($stmt->execute()) {
            header("Location: tablaReguistro.php"); // Redirigir a otra página después de la inserción
            exit;
        } else {
            echo "Error al insertar: " . $stmt->error;
        }

        // Cerrar la declaración
        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $conn-> error;
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>