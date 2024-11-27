<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Préstamos</title>
</head>
<body>
    <h1>Registrar Préstamo</h1> 
    <form action="procesar_prestamo.php" method="post">
        <label for="id">ID del Préstamo:</label>
        <input type="number" name="id" required><br><br>

        <label for="id_practica">Práctica:</label>
        <select name="id_practica" required>
            <?php
            include("conexcion.php");
            // Verificar conexión
            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            // Consulta para obtener prácticas
            $sql = "SELECT folio, materia, unidad FROM practica"; // Ajusta según tu tabla
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['folio'] . "'>" . $row['materia'] . "'>" . $row['unidad'] . "</option>";
                }
            } else {
                echo "<option value=''>No hay prácticas disponibles</option>";
            }
            ?>
        </select><br><br>

        <label for="id_vehiculo">Vehículo:</label>
        <select name="id_vehiculo" required>
            <?php
            // Consulta para obtener vehículos
            $sql = "SELECT marca, modelo, n_serie FROM vehiculo"; // Ajusta según tu tabla
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['marca'] . "'>" . $row['modelo'] . "'>". $row['n_serie'] . "</option>";
                }
            } else {
                echo "<option value=''>No hay vehículos disponibles</option>";
            }
            ?>
        </select><br><br>

        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" required><br><br>

        <input type="submit" value="Registrar Préstamo">
    </form>
</body>
</html>