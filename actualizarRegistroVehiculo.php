<?php
session_start(); // Asegúrate de iniciar la sesión
// Verificar si hay datos del usuario en la sesión
if (!isset($_SESSION['userData'])) {
    echo "No se encontraron datos del usuario.";
    exit;
}

$userData = $_SESSION['userData'];
echo '<form action="tablaVehiculo.php" method="post">
    <label for="marca">Marca:</label>
        <input type="text" id="marca" name="marca" value ="'. htmlspecialchars($userData['marca']) . '" readonly required><br><br>

        <label for="modelo">Modelo:</label>
        <input type="text" id="modelo" name="modelo" maxlength="10" value ="'. htmlspecialchars($userData['modelo']) . '" readonly required><br><br>

        <label for="n_placas">Número de Placas:</label>
        <input type="text" id="n_placas" name="n_placas" maxlength="7" value ="'. htmlspecialchars($userData['n_placas']) . '" readonly required><br><br>

        <label for="n_serie">Número de Serie:</label>
        <input type="text" id="n_serie" name="n_serie" maxlength="17" value ="'. htmlspecialchars($userData['n_serie']) . '" readonly required><br><br>

        <label for="n_motor">Número de Motor:</label>
        <input type="text" id="n_motor" name="n_motor" maxlength="17" value ="'. htmlspecialchars($userData['n_motor']) . '" readonly required><br><br>

        <label for="km_v">Kilómetros:</label>
        <input type="number" id="km_v" name="km_v" value ="'. htmlspecialchars($userData['km_v']) . '"><br><br>

        <label for="tanque_conbustibleE">Tanque de Combustible (E):</label>
        <input type="number" step="0.01" id="tanque_conbustibleE" name="tanque_conbustibleE" value ="'. htmlspecialchars($userData['tanque_conbustibleE']) . '" ><br><br>

        <label for="tanque_conbustibleS">Tanque de Combustible (S):</label>
        <input type="number" step="0.01" id="tanque_conbustibleS" name="tanque_conbustibleS" value ="'. htmlspecialchars($userData['tanque_conbustibleS']) . '"><br><br>

        <!-- Campo para la foto (comentado) -->
        <!-- <label for="foto">Foto:</label>
        <input type="file" id="foto" name="foto"><br><br> -->

        <input type="submit" value="Agregar Vehículo">
</form>';
?>