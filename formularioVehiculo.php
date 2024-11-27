<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Vehículo</title>
</head>
<body>
    <h2>Agregar Nuevo Vehículo</h2>
    <form action="procesoVehiculo.php" method="post">
    
        <label for="marca">Marca:</label>
        <input type="text" id="marca" name="marca" maxlength="10" required><br><br>

        <label for="modelo">Modelo:</label>
        <input type="text" id="modelo" name="modelo" maxlength="10" required><br><br>

        <label for="n_placas">Número de Placas:</label>
        <input type="text" id="n_placas" name="n_placas" maxlength="7" required><br><br>

        <label for="n_serie">Número de Serie:</label>
        <input type="text" id="n_serie" name="n_serie" maxlength="17" required><br><br>

        <label for="n_motor">Número de Motor:</label>
        <input type="text" id="n_motor" name="n_motor" maxlength="17" required><br><br>

        <label for="km_v">Kilómetros:</label>
        <input type="number" id="km_v" name="km_v" required><br><br>

        <label for="tanque_conbustibleE">Tanque de Combustible (E):</label>
        <input type="number" step="0.01" id="tanque_conbustibleE" name="tanque_conbustibleE" required><br><br>

        <label for="tanque_conbustibleS">Tanque de Combustible (S):</label>
        <input type="number" step="0.01" id="tanque_conbustibleS" name="tanque_conbustibleS" required><br><br>

        <!-- Campo para la foto (comentado) -->
        <!-- <label for="foto">Foto:</label>
        <input type="file" id="foto" name="foto"><br><br> -->

        <input type="submit" value="Agregar Vehículo">
    </form>
</body>
</html>