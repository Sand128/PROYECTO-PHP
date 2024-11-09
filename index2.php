<?php
    session_start();
    if (!isset($_SESSION['usuario'])) {
        header("Location: login.php");
        exit();
    }

    // Conexión con la base de datos
    include('conexcion.php'); // Asegúrate de que el nombre del archivo es correcto

    // Verifica si hay error en la conexión
    if ($conn->connect_error) {
        die("ERROR de conexión: " . $conn->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['matricula'])) {
        // Validación y sanitización de datos de entrada
        $matricula = mysqli_real_escape_string($conn, $_POST['matricula']);
        $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
        $paterno = mysqli_real_escape_string($conn, $_POST['paterno']);
        $materno = mysqli_real_escape_string($conn, $_POST['materno']);
        $edad = intval($_POST['edad']); // Asegúrate de que sea un número
        $usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
        $cont = mysqli_real_escape_string($conn, $_POST['psw']); // Considera usar hash para contraseñas

        // Manejo de la imagen
        $imagen = 'imagenes/icons8-avatar-30.png'; // Imagen por defecto
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
            // Validar el tipo de archivo
            $tipoArchivo = $_FILES['imagen']['type'];
            $tiposPermitidos = ['image/jpeg', 'image/png', 'image/gif'];

            if (in_array($tipoArchivo, $tiposPermitidos)) {
                // Definir la carpeta donde se guardarán las imágenes
                $carpetaDestino = 'fotos/';
                $nombreImagen = uniqid() . '-' . basename($_FILES['imagen']['name']); // Cambiar nombre
                $rutaImagen = $carpetaDestino . $nombreImagen;

                // Mover el archivo subido a la carpeta de destino
                if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaImagen)) {
                    $imagen = $rutaImagen; // Actualizar la variable imagen con la ruta de la imagen subida
                } else {
                    echo "<script>alert('Error al subir la imagen.');</script>";
                }
            } else {
                echo "<script>alert('Tipo de archivo no permitido. Solo se permiten imágenes JPEG, PNG y GIF.');</script>";
            }
        }
        // Ejecutar la consulta y verificar errores
        // if (!mysqli_query($conn, $sql)) {
        //     die("Error en la consulta: " . mysqli_error($conn));
        // }
    }

    // Obtener la información del usuario
    $sql = "SELECT * FROM alumnos WHERE usuario = '" . mysqli_real_escape_string($conn, $_SESSION['usuario']) . "'";
    $result = mysqli_query($conn, $sql);

    // Verificar si la consulta fue exitosa
    if (!$result) {
        die("Error en la consulta: " . mysqli_error($conn));
    }

    $row = mysqli_fetch_assoc($result); // Asegúrate de que $result ha sido definido antes de esto

    // Manejo de la imagen del usuario
    $imagenMostrar = !empty($row['imagen']) ? $row['imagen'] : 'imagenes/icons8-avatar-30.png'; // Imagen por defecto
    $imagenRuta = htmlspecialchars($imagenMostrar); // Escapar la ruta de la imagen

    // Cerrar la conexión
    $conn->close();
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
    </head>
    <body>
        <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']); ?></h1> <!-- Nombre del usuario -->
        <h2>Tu foto:</h2>
        <?php if (!empty($imagenMostrar)): ?>
            <img src="<?php echo htmlspecialchars($imagenRuta); ?>" alt="Foto de perfil" style="max-width: 200px; max-height: 200px;">
        <?php else: ?>
        <p>No hay imagen disponible.</p> <!-- Mensaje si no hay imagen -->
        <?php endif; ?>
        <h1>Bienvenido al panel de control</h1>
        <p>Menú</p>
        <a href="altaalumno.php">Registro nuevo Alumno</a><br>
        <a href="altaalumno2.php">Registros existentes</a><br>
        <a href="logout.php">Cerrar sesión</a><br>
    </body>
</html>