<?php
include('conexcion.php');

if (isset($_GET['matricula'])) {
    $matricula = $_GET['matricula'];

    $sql = "DELETE FROM alumnos WHERE Matricula = ? " ;
    $stmt = $conn->prepare($sql);
    $stmt -> bind_param("s",$matricula);

    if( $stmt->execute()) {
        echo "<h1>Reguistro eliminado exitosamente</h1>";
    }else{
        echo "Error al eliminar el reguistro" . $conn -> error;
    }
    $stmt->close();
}
    mysqli_close($conn);
    header("Location: altaalumno2.php");
    exit;
?>