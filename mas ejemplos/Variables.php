<!DOCTYPE html>
<?php
?>
<html>
    <header>
        Formulario de variables
    </header>
    <body>
        <form action="resivirValores.php" method="post">
            <table>
                <tr>
                    <td>
                        Nombre
                    </td>
                    <td><input type="text" id="nombre" name="nombre" required></td>
                <tr></tr>
                    <td>
                        Apellido Paterno
                    </td><td><input type="text" id="paterno" name="paterno" required></td>
                <tr></tr>
                    <td>
                        Apellido Materno
                    </td>
                    </td><td><input type="text" id="materno" name="materno" required></td>
                <tr></tr>
                    <td>
                        Carrera
                    </td>
                    </td><td><input type="text" id="carrera" name="carrera" required></td>
                <tr></tr>
                    <td>
                        Semestre
                    </td>
                    </td><td><input type="text" id="semestre" name="semestre" required></td>
                <tr></tr>
                    <td>
                        Grupo
                    </td>
                    </td><td><input type="text" id="grupo" name="grupo" value=""></td>
                <tr>
                    <td><input type="submit" name="enviar" value="Enviar"></td>
                </tr>
                </tr>
            </table>
        </form>
    </body>
</hrml>
