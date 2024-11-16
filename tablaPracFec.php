<?php
    session_start();
    include("conexcion.php");
    $sql = "SELECT *  from prac_fecha" ;
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1'>
            <tr>
                <td>Id</td>
                <td>Practica</td>
                <td>Fecha</td>
                <td>Hora</td>
            </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>" . htmlspecialchars($row['id']) . "</td>
                <td>" . htmlspecialchars($row['id_practica']) . "</td>
                <td>" . htmlspecialchars($row['id_fecha']) . "</td>
                <td>" . htmlspecialchars($row['hora']) . "</td>
            </tr>";
        }
        echo "</table>";
    } else {
        echo "No hay registros disponibles.";
    }
    // Cerrar la conexión
    mysqli_close($conn);
?>