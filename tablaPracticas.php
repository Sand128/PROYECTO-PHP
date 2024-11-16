<?php
    session_start();
    include("conexcion.php");
    $sql = "SELECT p.folio, p.materia, p.unidad, p.grupo
            FROM practica p"; // Ajusta esto si necesitas un JOIN
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1'>
            <tr>
                <td>Folio</td>
                <td>Materia</td>
                <td>Unidad</td>
                <td>Grupo</td>
                <td>Descargar</td>
            </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>" . htmlspecialchars($row['folio']) . "</td>
                <td>" . htmlspecialchars($row['materia']) . "</td>
                <td>" . htmlspecialchars($row['unidad']) . "</td>
                <td>" . htmlspecialchars($row['grupo']) . "</td>
                <td><a href='descargar_practica.php?folio=" . htmlspecialchars($row['folio']) . "'>
                <img src='iconos/icons8-descargar-24.png' alt='Descargar' width='30' height='30'></a></td>
            </tr>";
        }
        echo "</table>";
    } else {
        echo "No hay registros disponibles.";
    }
    // Cerrar la conexión
    mysqli_close($conn);
?>