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
        // Obtener los datos del usuario
        $userData = $result->fetch_assoc();

        // Verificar si el usuario está activo
        if ($userData['status'] === 'activo') {
            // Las credenciales son correctas y el usuario está activo, iniciar sesión
            $_SESSION['usuario'] = $usuario;
            
            // Redirigir según el tipo de usuario
            if ($userData['tipo_usuario'] === 'alumno') {
                header("Location: inicioAlumno.php"); // Redirigir a la página de inicio para alumnos
            } elseif ($userData['tipo_usuario'] === 'maestro') {
                header("Location: inicioMaestro.php"); // Redirigir a la página de inicio para maestros
            } elseif ($userData['tipo_admin'] === 'administrativo') {
                header("Location: inicioAdmin.php"); // Redirigir a la página de inicio para administrativos
            } elseif ($userData['tipo_admin'] === 'ayudante') {
                header("Location: inicioAyudante.php"); // Redirigir a la página de inicio para ayudantes
            } else {
                // Si el tipo de usuario no está definido, redirigir a la página de error o login
                header("Location: login.php?error=tipo_usuario_no_definido");
            }
            exit();
        } else {
            // El usuario está inactivo, redirigir a la página de login con un error de usuario inactivo
            header("Location: login.php?error=usuario_inactivo");
            exit();
        }
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
