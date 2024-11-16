<?php
include('conexcion.php'); // Asegúrate de que la conexión a la base de datos esté establecida.

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Inicializamos la variable de resultados
$resultados = [];

// Recibir el dato de búsqueda
if (isset($_POST['Dato'])) {
    // Sanitizar el valor de búsqueda para evitar inyecciones SQL
    $dato_busqueda = mysqli_real_escape_string($conn, $_POST['Dato']);

    // Consulta SQL utilizando UNION para buscar en varias tablas
    $sql = "
        (SELECT 'herramienta' AS fuente, id, nombre, descripcion, categoria, marca, modelo FROM herramienta WHERE nombre LIKE '%$dato_busqueda%' OR descripcion LIKE '%$dato_busqueda%' OR categoria LIKE '%$dato_busqueda%' OR marca LIKE '%$dato_busqueda%' OR modelo LIKE '%$dato_busqueda%')
        UNION
        (SELECT 'material' AS fuente, m.id, m.nombre, m.descripcion, e.categoria, m.marca, m.modelo FROM material ma
            JOIN herramienta m ON ma.id_herramienta = m.id
            JOIN equipo e ON ma.id_equipo = e.id
            WHERE m.nombre LIKE '%$dato_busqueda%' OR m.descripcion LIKE '%$dato_busqueda%' OR e.categoria LIKE '%$dato_busqueda%' OR m.marca LIKE '%$dato_busqueda%' OR m.modelo LIKE '%$dato_busqueda%')
        UNION
        (SELECT 'equipo' AS fuente, id, nombre, descripcion, categoria, NULL AS marca, NULL AS modelo FROM equipo WHERE nombre LIKE '%$dato_busqueda%' OR descripcion LIKE '%$dato_busqueda%' OR categoria LIKE '%$dato_busqueda%')
        UNION
        (SELECT 'vehiculo' AS fuente, id, marca, modelo, NULL AS descripcion, NULL AS categoria, NULL AS marca FROM vehiculo WHERE marca LIKE '%$dato_busqueda%' OR modelo LIKE '%$dato_busqueda%')
    ";

    // Ejecutar la consulta
    $result = mysqli_query($conn, $sql);

    // Verificar si hay resultados
    if (mysqli_num_rows($result) > 0) {
        // Mostrar los resultados
        while ($row = mysqli_fetch_assoc($result)) {
            // Guardamos los resultados en un array para ser procesados
            $resultados[] = $row;
        }
    } else {
        $resultados[] = ['mensaje' => "No se encontraron resultados para '$dato_busqueda'."];
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Búsqueda</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ccc;
        }
        th {
            background-color: #f2f2f2;
        }
        .resultados {
            margin-top: 20px;
        }
        .resultado {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .mensaje {
            margin-top: 20px;
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Resultados de la Búsqueda</h1>

    <div class="resultados">
        <form method="POST" action="acciones.php">
            <?php if (isset($resultados) && !empty($resultados)): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Seleccionar</th>
                            <th>Fuente</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Categoría</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($resultados as $resultado) {
                            if (isset($resultado['mensaje'])) {
                                echo "<tr><td colspan='7' class='mensaje'>{$resultado['mensaje']}</td></tr>";
                            } else {
                                echo "<tr>";
                                echo "<td><input type='checkbox' name='seleccionar[]' value='{$resultado['id']}'></td>"; // Checkbox para seleccionar
                                echo "<td>" . ucfirst($resultado['fuente']) . "</td>";
                                echo "<td>" . $resultado['nombre'] . "</td>";
                                echo "<td>" . $resultado['descripcion'] . "</td>";
                                echo "<td>" . $resultado['categoria'] . "</td>";
                                echo "<td>" . $resultado['marca'] . "</td>";
                                echo "<td>" . $resultado['modelo'] . "</td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No se encontraron resultados.</p>
            <?php endif; ?>
            <br>
            <input type="submit" value="Agregar a la lista">
        </form>
    </div>
</body>
</html>
