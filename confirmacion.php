<?php
// Incluir la conexión a la base de datos
include("conexcion.php");

// Verificar si la acción y el ID están definidos en la URL
if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];

    // Acción de eliminar
    if ($accion == 'eliminar' && isset($_GET['id'])) {
        $id = $_GET['id'];

        // Consultar y eliminar el usuario con el ID dado
        $sql = "DELETE FROM usuario WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $id);

        // Ejecutar la consulta y verificar si la eliminación fue exitosa
        if ($stmt->execute()) {
            echo "<h1>Registro eliminado exitosamente.</h1>";
        } else {
            echo "Error al eliminar el registro: " . $conn->error;
        }

        // Cerrar la declaración y la conexión
        $stmt->close();
        mysqli_close($conn);

        // Redirigir a la página de usuarios
        header("Location: tablaReguistro.php");
        exit;
    }

    // Acción de modificar
    if ($accion == 'modificar' && isset($_GET['id'])) {
        $id = $_GET['id'];

        // Obtener los datos actuales del usuario
        $sql = "SELECT * FROM usuario WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $userData = $result->fetch_assoc();

        if (!$userData) {
            echo "Usuario no encontrado.";
            exit;
        }

        // Redirigir a la página de actualización y pasar los datos del usuario
        // Puedes usar sesiones o pasar los datos a través de la URL (no recomendado para datos sensibles)
        session_start();
        $_SESSION['userData'] = $userData; // Guardar datos en la sesión
        header("Location: actualizarRegistroUsuario.php");
        exit;

        // Cerrar la declaración
        $stmt->close();
    }
} else {
    echo "Acción no especificada.";
}

// Cerrar la conexión
mysqli_close($conn);
?>