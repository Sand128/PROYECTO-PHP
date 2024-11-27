<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Herramienta</title>
</head>
<body>
    <h2>Agregar Nueva Herramienta</h2>
    <form action="procesoHerrami.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" maxlength="20" required><br><br>

        <label for="descripcion">Descripción:</label>
        <input type="text" id="descripcion" name="descripcion" maxlength="50" required><br><br>

        <label for="categoria">Categoría:</label>
        <input type="text" id="categoria" name="categoria" maxlength="10" required><br><br>

        <label for="marca">Marca:</label>
        <input type="text" id="marca" name="marca" maxlength="20" required><br><br>

        <label for="modelo">Modelo:</label>
        <input type="text" id="modelo" name="modelo" maxlength="20" required><br><br>

        <label for="estado">Estado:</label>
        <input type="text" id="estado" name="estado" maxlength="15" required><br><br>

        <input type="submit" value="Agregar Herramienta">
    </form>
</body>
</html>