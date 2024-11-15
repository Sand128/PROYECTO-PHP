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

        // Aquí deberías agregar la lógica para mostrar un formulario de edición
        // o realizar la actualización en la base de datos.

        echo "<h1>Formulario de modificación para el usuario con ID: $id</h1>";

        // Aquí podrías redirigir a una página con un formulario de edición,
        // o hacer la modificación directamente si decides usar un solo archivo para editar.
        // Redirigir a una página de edición:
        header("Location: editarUsuario.php?id=$id");
        exit;
    }
} else {
    echo "Acción no especificada.";
}

?>
