<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registro de Usuario</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1>Registro de Usuario</h1>
        <form action="procesar.php" method="post">
            <table>
                <tr>
                    <td>Matrícula</td>
                    <td><input type="text" name="id" value=""></td>
                </tr>
                <tr>
                    <td>Nombre completo</td>
                    <td><input type="text" name="nombre" value=""></td>
                </tr>
                <tr>
                    <td>Tipo de usuario</td>
                    <td>
                        <select id="tipo_usuario" name="tipo_usuario" >
                            <option value="Alumno">Alumno</option>
                            <option value="Maestro">Maestro</option>
                            <option value="Administrativo">Administrativo</option>
                            <option value="Ayudante">Ayudante</option>
                            <option value="Coordinador">Coordinador</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Nombre para iniciar sesión</td>
                    <td><input type="text" name="usser" value=""></td>
                </tr>
                <tr>
                    <td><input type="submit" name="Registrar"></td>
                </tr>
            </table>
        </form>
    </body>
</html>
