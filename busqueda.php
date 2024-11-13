<?php
    include('conexcion.php');

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    } else {
        echo "Conexión exitosa"; // Mensaje de depuración
    }

    $resultados = []; // Cambiamos a un array para almacenar múltiples resultados

    // Recibir el dato de búsqueda
    if (isset($_POST['Dato'])) {
        $dato_busqueda = $_POST['Dato'];

        // Sanitizar el valor de búsqueda (para evitar inyecciones SQL)
        $dato_busqueda = mysqli_real_escape_string($conn, $dato_busqueda);

        // Consulta usando UNION para buscar en varias tablas
        $sql = "
            (SELECT 'herramienta' AS fuente, nombre, descripcion, categoria, marca, modelo FROM herramienta WHERE nombre LIKE '%$dato_busqueda%' OR descripcion LIKE '%$dato_busqueda%' OR categoria LIKE '%$dato_busqueda%' OR marca LIKE '%$dato_busqueda%' OR modelo LIKE '%$dato_busqueda%')
            UNION
            (SELECT 'material' AS fuente, m.nombre, m.descripcion, e.categoria, m.marca, m.modelo FROM material ma
                JOIN herramienta m ON ma.id_herramienta = m.id
                JOIN equipo e ON ma.id_equipo = e.id
                WHERE m.nombre LIKE '%$dato_busqueda%' OR m.descripcion LIKE '%$dato_busqueda%' OR e.categoria LIKE '%$dato_busqueda%' OR m.marca LIKE '%$dato_busqueda%' OR m.modelo LIKE '%$dato_busqueda%')
            UNION
            (SELECT 'equipo' AS fuente, nombre, descripcion, categoria, NULL AS marca, NULL AS modelo FROM equipo WHERE nombre LIKE '%$dato_busqueda%' OR descripcion LIKE '%$dato_busqueda%' OR categoria LIKE '%$dato_busqueda%')
            UNION
            (SELECT 'vehiculo' AS fuente, marca, modelo, NULL AS descripcion, NULL AS categoria, NULL AS marca FROM vehiculo WHERE marca LIKE '%$dato_busqueda%' OR modelo LIKE '%$dato_busqueda%')
        ";

        // Ejecutar la consulta
        $result = mysqli_query($conn, $sql);

        // Verificar si hay resultados
        if (mysqli_num_rows($result) > 0) {
            // Mostrar los resultados
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<p><strong>Tabla:</strong> " . $row['fuente'] . " <br><strong>Nombre:</strong> " . $row['nombre'] . " <br><strong>Descripción:</strong> " . $row['descripcion'] . " <br><strong>Categoría:</strong> " . $row['categoria'] . " <br><strong>Marca:</strong> " . $row['marca'] . " <br><strong>Modelo:</strong> " . $row['modelo'] . "</p>";
            }
        } else {
            echo "<p>No se encontraron resultados para '$dato_busqueda'.</p>";
        }

        // Cerrar la conexión
        mysqli_close($conn);
    }


?>
