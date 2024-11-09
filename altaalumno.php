<!DOCTYPE html>
<html>
    <a href="index2.php">Inicio</a>
    <head><link rel="stylesheet" href="style.css"></head>
    <body>
        <h1>Regustro de Alumno</h1>
        <form action="altaalumno2.php" method="post">
            <table>
                <tr><td>Matrícula </td><td><input type="text" name="matricula" value=""></td></tr>
                <tr><td>Nombre </td><td><input type="text" name="nombre" value=""></td></tr>
                <tr><td>Apellido Paterno </td><td><input type="text" name="paterno" value=""></td></tr>
                <tr><td>Apellido Materno </td><td><input type="text" name="materno" value=""></td></tr>
                <tr><td>Edad </td><td><input type="text" name="edad" value=""></td></tr>
                <tr><td>Usuario </td><td><input type="text" name="usuario" value=""></td></tr>
                <tr><td>Contraseña </td><td><input type="password" name="psw" value=""></td></tr>
                <tr><td>Foto del Alumno </td><td><input type="file" name="imagen" accept="image/*"></td></tr>
                <tr><td><input type="submit" name="Registrar"></td></tr>
            </table>
        </form>
    </body>
</html>