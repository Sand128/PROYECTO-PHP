<!DOCTYPE html>
<?php
//    $total = $_REQUEST['axel']+$_REQUEST['jacob']+$_REQUEST['sandra']+$_REQUEST['pamela']+$_REQUEST['aixa'];
?>
<hrml>
    <header>
        Suma de numeros
    </header>
    <body>
        <form action="resultado.php" method="POST">
            <table>
                <tr>
                    <td>Nombre</td>
                    <td>Costo</td>
                    <td>Modelo celular</td>
                </tr>
            <tr></tr>
                <td>Axel</td>
                <td><input type="text" id="axel" nombre="axel" required></td>
                <td><input type="text" id="axel_c" nombre="axel_c" required></td>
            <tr></tr>
                <td>Jacob</td>
                <td><input type="text" id="jacob" nombre="jacob" required></td>
                <td><input type="text" id="jacob_c" nombre="jacob_c" required></td>
            <tr></tr>
                <td>Sandra</td>
                <td><input type="text" id="sandra" nombre="sandra" required></td>
                <td><input type="text" id="sandra_c" nombre="sandra_c" required></td>
            <tr></tr>
                <td>Pamela</td>
                <td><input type="text" id="pamela" nombre="pamela" required></td>
                <td><input type="text" id="pamela_c" nombre="pamela_c" required></td>
            <tr></tr>
                <td>Aixa</td>
                <td><input type="text" id="aixa" nombre="aixa" required></td>
                <td><input type="text" id="aixa_c" nombre="aixa_c" required></td>
            <tr><td><input type="submit" name="enviar" value="Enviar" ></td></tr>
            </table>
        </form>
    </body>
</hrml>
