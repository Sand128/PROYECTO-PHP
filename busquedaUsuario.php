<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h2>Busqueda de Usuarios en el Registro</h2>

        <form action="verUsuario.php" method="POST">
            <label for="busqueda">Ingrese Informacion del usuario:</label>
            <input type="text" id="busqueda" name="busqueda" required>
            <input type="submit" value="Buscar">
        </form>
    </body>
</html>