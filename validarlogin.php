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
            $_SESSION['usuario'] = $usuario; // Iniciar la sesión para el usuario

            // Verificar primero el tipo de usuario
            switch ($userData['tipo_usuario']) {
                case 'Alumno':
                    header("Location: inicioAlumno.php");
                exit; // Asegúrate de usar exit después de header
                case 'Maestro':
                    header("Location: inicioMaestro.php");
                exit;
                default:
                // Si no es Alumno ni Maestro, verificar tipo_admin
                switch ($userData['tipo_admin']) {
                    case 'Administrador':
                        header("Location: inicioAdmin.php");
                    exit;
                    case 'Coordinador':
                        header("Location: inicioCoordinador.php");
                    exit;
                    case 'Ayudante':
                        header("Location: inicioAyudante.php");
                    exit;
                    default:
                        echo "Tipo de usuario no definido.";
                    exit;
                }
            }
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
