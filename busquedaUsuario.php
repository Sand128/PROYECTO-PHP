<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h2>Busqueda de Usuarios en el Registro</h2>

        <form action="modificaralumno.php" method="POST">
            <label for="Matricula">Ingrese la matricula del alumno:</label>
            <input type="text" id="Matricula" name="Matricula" required>
            <input type="submit" value="Buscar">
        </form>
    </body>
</html>