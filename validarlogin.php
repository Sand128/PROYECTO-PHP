<?php
include("conexcion.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contra = $_POST['contra'];

    // Preparar la consulta para verificar el usuario y la contraseña
    $sql = "SELECT * FROM usuario WHERE usser = ? AND passw = ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    // Vincular parámetros y ejecutar la consulta
    $stmt->bind_param("ss", $usuario, $contra);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar si el usuario fue encontrado
    if ($result->num_rows == 1) {
        $userData = $result->fetch_assoc();
        // Verificar si el usuario está activo
        if ($userData['status'] === 'activo') {           
            // Verificar el tipo de usuario y redirigir a la página correspondiente
            switch ($userData['tipo_usuario']) {
                case 'Alumno':
                    header("Location: inicioAlumno.php");
                    break;
                case 'Maestro':
                    header("Location: inicioMaestro.php");
                    break;
                case 'Administrador':
                    header("Location: inicioAdmin.php");
                    break;
                case 'Coordinador':
                    header("Location: inicioCoordinador.php");
                    break;
                case 'Ayudante':
                    header("Location: inicioAyudante.php");
                    break;
                default:
                    echo "Tipo de usuario no definido.";
                    break;
            }
            exit(); // Asegurarse de detener el script después de la redirección
        } else {
            // Usuario inactivo
            echo "El usuario está inactivo. No puedes iniciar sesión.";
        }
    } else {
        // Usuario no encontrado
        echo "Usuario no encontrado.";
    }

    // Cerrar la declaración
    $stmt->close();
}

// Cerrar la conexión
$conn->close();
?>