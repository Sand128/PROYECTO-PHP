<?php
include("conexcion.php"); // Asegúrate de que el archivo de conexión esté correcto

// Revisar si los datos fueron enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $matricula = $_POST['id'];
    $nombre = $_POST['nombre'];
    $tusuario = $_POST['tipo'];
    $usser = $_POST['usser'];
    $password = $_POST['passw']; 
    $foto = 'imagenes/icons8-avatar-30.png'; // Asignando una foto por defecto
    
    // Cifrar la contraseña
    // Generar una contraseña aleatoria
    //$password = bin2hex(random_bytes(4)); // Genera una contraseña de 8 caracteres (4 bytes)
    //$hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hashear la contraseña

    
    // Determinar el tipo de usuario
    $tipo_admin = null;
    $tipo_usuario = null;
    

    // Validar el tipo de usuario
    if (in_array($tusuario, ['Alumno', 'Maestro'])) {
        $tipo_usuario = $tusuario;
        $tipo_admin = "";
    } elseif (in_array($tusuario, ['Administrador', 'Coordinador', 'Ayudante'])) {
        $tipo_admin = $tusuario;
        $tipo_usuario = "";
    } else {
        echo "Tipo de usuario no válido.";
        exit;
    }

    // Usar una consulta preparada para evitar inyecciones SQL
    $sql = "INSERT INTO usuario (id, nombre, tipo_usuario, tipo_admin, usser, passw, status, foto) 
            VALUES ( ?, ?, ?, ?, ?, ?, 'activo', ?)";

    if ($stmt = $conn->prepare($sql)) {
        // Vincular los parámetros
        // Cambié el tipo de datos en bind_param para que coincidan con los tipos correctos
        $stmt->bind_param("issssss", $matricula, $nombre, $tipo_usuario, $tipo_admin, $usser, $password, $foto);
        
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
        echo "Error al preparar la consulta: " . $conn->error;
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>