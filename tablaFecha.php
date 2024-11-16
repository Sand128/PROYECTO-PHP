<?php
    session_start();
    include("conexcion.php");
    $sql = "SELECT * FROM fecha";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result)>0){
        echo "<table border = '1'>
            <tr>
                <td>Folio</td>
                <td>Fecha</td>
            </tr>";
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>
                    <td>" . htmlspecialchars($row['id']) . "</td>
                    <td>" . htmlspecialchars($row['fecha']) . "</td>
            ";
        }
        echo "</table>";
    }else{
        echo "No hay registros disponibles.";
    }
    mysqli_close($conn);
?>