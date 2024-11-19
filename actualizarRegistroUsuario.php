<?php
session_start(); // Asegúrate de iniciar la sesión

// Verificar si hay datos del usuario en la sesión
if (!isset($_SESSION['userData'])) {
    echo "No se encontraron datos del usuario.";
    exit;
}

$userData = $_SESSION['userData'];

// Mostrar el formulario de modificación (similar al código anterior)
echo "<h1>Formulario de modificación para el usuario con ID: " . htmlspecialchars($userData['id']) . "</h1>";
echo '<form action="actualizaUsuario.php" method="post">
        <table>
            <tr>
                <td>Matrícula</td>
                <td><input type="text" name="id" value="' . htmlspecialchars($userData['id']) . '" readonly></td>
            </tr>
            <tr>
 <td>Nombre completo</td>
                <td><input type="text" name="nombre" value="' . htmlspecialchars($userData['nombre']) . '" readonly></td>
            </tr>
            
            <tr>
                <td>Nombre para iniciar sesión</td>
                <td><input type="text" name="usser" value="' . htmlspecialchars($userData['usser']) . '" readonly></td>
            </tr>
            <tr>
                <td>Contraseña</td>
                <td><input type="password" name="passw" value=""></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    <select name="status">
                        <option value="activo"' . ($userData['status'] == 'activo' ? ' selected' : '') . '>Activo</option>
                        <option value="inactivo"' . ($userData['status'] == 'inactivo' ? ' selected' : '') . '>Inactivo</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="submit" name="Registrar" value="Actualizar"></td>
            </tr>
        </table>
    </form>';
?>