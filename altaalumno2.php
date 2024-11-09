<!DOCTYPE html>
<html>
    <body>
        <a href="index2.php">Inicio</a>
    </body>
</html>

<?php
    include("conexcion.php"); // Asegúrate de que el nombre del archivo sea correcto

    // Revisar si los datos fueron enviados
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recuperar los datos enviados desde el formulario
        $matricula = $_POST['matricula'];
        $nombre = $_POST['nombre'];
        $paterno = $_POST['paterno'];
        $materno = $_POST['materno'];
        $edad = $_POST['edad'];
        $usuario = $_POST['usuario'];
        $cont = $_POST['psw']; // Cambié 'psw' por 'cont' para usarlo correctamente en la inserción
        //$imagen = '';
        $imagen = 'imagenes/icons8-avatar-30.png'; // Imagen por defecto
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
            $tipoArchivo = $_FILES['imagen']['type'];
            $tiposPermitidos = ['image/jpeg', 'image/png', 'image/gif'];

            if (in_array($tipoArchivo, $tiposPermitidos)) {
                $carpetaDestino = 'fotos/';
                $nombreImagen = uniqid() . '-' . basename($_FILES['imagen']['name']);
                $rutaImagen = $carpetaDestino . $nombreImagen;

                if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaImagen)) {
                    $imagen = $rutaImagen;
                } else {
                    echo "Error al subir la imagen.";
                }
            } else {
                echo "Tipo de archivo no permitido.";
            }
        }else{
            //Inicializar la variable de imagen
            //
        }
    

        // Consulta SQL para insertar los datos
        $sql = "INSERT INTO alumnos (Matricula, Nombre, Paterno, Materno, Edad, Usuario, Cont, imagen) 
                VALUES ('$matricula', '$nombre', '$paterno', '$materno', '$edad', '$usuario', '$cont', '$imagen')";

        // Ejecutar la consulta
        if ($conn->query($sql) == TRUE) {
            echo "<h1>Registro exitoso</h1>";
            echo "<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

$sql = "SELECT * FROM alumnos";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>
        <tr>
            <td>Foto</td>
            <td>Matrícula</td>
            <td>Nombre</td>
            <td>Apellido Paterno</td>
            <td>Apellido Materno</td>
            <td>Edad</td>
            <td>Usuario</td>
            <td>Contraseña</td>
            <td>Actualizar</td>
            <td>Eliminar</td>
        </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        $imagenMostrar = !empty($row['imagen']) ? $row['imagen'] : 'imagenes/icons8-avatar-30.png'; // Imagen por defecto si no hay imagen
        echo "<tr>
                <td><img src='" . $imagenMostrar . "' alt='Foto de " . $row['Nombre'] . "' width='50' height='50'></td>
                <td>" . $row['Matricula'] . "</td>
                <td>" . $row['Nombre'] . "</td>
                <td>" . $row['Paterno'] . "</td>
                <td>" . $row['Materno'] . "</td>
                <td>" . $row['Edad'] . "</td>
                <td>" . $row['Usuario'] . "</td>
                <td>" . $row['Cont'] . "</td>
                <td><a href='modificaralumno.php?matricula=" . $row['Matricula'] . "'>
                <img src='imagenes/icons8-actualizar-50.png' alt='Editar' width='30' height='30'></a></td>
                <td><a href='eliminaralumno.php?matricula=" . $row['Matricula'] . "'>
                <img src='imagenes/icons8-eliminar-50.png' alt='Eliminar' width='30' height='30'></a></td>
            </tr>";
    }
    echo "</table>";
}else{
    echo "No hay reguistros disponibles.";
}
// Cerrar la conexión
mysqli_close($conn);
?>
