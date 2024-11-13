<?php
// validarlogin.php
include("conexcion.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $usuario = $_POST['usuario'] ?? '';
    $contra = $_POST['contra'] ?? '';

    // Preparar la consulta SQL
    $sql = "SELECT * FROM usuario WHERE usser = ? AND passw = ?";
    $stmt = $conn->prepare($sql);
    
    // Comprobar si la preparación fue exitosa
    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    // Vincular los parámetros y ejecutar la consulta
    $stmt->bind_param("ss", $usuario, $contra);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar si se encontró un usuario
    if ($result->num_rows === 1) {
        // Las credenciales son correctas, iniciar sesión
        $_SESSION['usuario'] = $usuario;
        header("Location: dashboard.php"); // Redirigir a la página de inicio
        exit();
    } else {
        // Credenciales incorrectas
        header("Location: login.php?error=1"); // Redirigir a la página de login con un error
        exit();
    }

    // Cerrar la declaración
    $stmt->close();
}

// Cerrar la conexión
$conn->close();
?>