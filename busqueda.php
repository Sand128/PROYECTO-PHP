<?php
include('conexcion.php');

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
} else {
    echo "Conexión exitosa"; // Mensaje de depuración
}

$resultados = []; // Cambiamos a un array para almacenar múltiples resultados

if (isset($_GET['query'])) {
    $query = $_GET['query'];

    // Usamos LIKE para buscar en varios campos de diferentes tablas
    $sql = "
        SELECT 'accesorio' AS tipo, nombre FROM accesorios WHERE nombre LIKE ? OR id LIKE ?
        UNION ALL
        SELECT 'equipo' AS tipo, nombre, descripcion, estado, categoria FROM equipo WHERE nombre LIKE ? OR descripcion LIKE ?
        UNION ALL
        SELECT 'herramienta' AS tipo, nombre, descripcion, categoria, marca, modelo, estado FROM herramienta WHERE descripcion LIKE ?
        UNION ALL
        SELECT 'vehiculo' AS tipo, marca, modelo, n_placas, n_serie, n_motor, km_v, tanque_conbustibleE, tanque_conbustibleS FROM vehiculo WHERE marca LIKE ? OR modelo LIKE ?
        UNION ALL
        SELECT 'material' AS tipo, id FROM material WHERE id LIKE ?
    ";

    $stmt = $conn->prepare($sql);

    // Preparamos los parámetros para la búsqueda
    $searchTerm = '%' . $query . '%'; // Agregamos los comodines para buscar en cualquier parte del campo
    $stmt->bind_param("ssssssss", $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            $resultados[] = $row; // Agregamos cada resultado encontrado al array
        }
    }

    // Devolvemos los resultados como JSON
    echo json_encode($resultados);
}
?>
