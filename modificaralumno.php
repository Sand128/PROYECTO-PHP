<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
        include('conexcion.php');
        
        if($conn->connect_error){
            die("Error de conexión: ". $conn->connect_error);
        }
        $alumno = [
            'Matricula'=>'',
            'Nombre'=>'',
            'Paterno'=>'',
            'Materno'=>'',
            'Edad'=>'',
            'Usuario'=>'',
            'Cont'=>'',
            'imagen' => ''
        ];

        if(isset($_GET['matricula'])){
            $matricula = $_GET['matricula'];

            $sql = "SELECT * FROM alumnos WHERE Matricula= ? ";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s",$matricula);
            $stmt->execute();
            $resultado=$stmt->get_result();

            if($resultado->num_rows>0){
                $alumno=$resultado->fetch_assoc();
            }else{
                echo "No se encontró ningún alumno con esa matricula";
            }
        }
        ?>

        <?php if($alumno['Matricula']):?>

            <form action="modificaalumno2.php" method="post" enctype="multipart/form-data">
                <table>
                    <tr><td><h2>Modificar alumno</h2></td></tr>
                    <tr><td>Matrícula </td><td><input type="text" name="matricula" value="<?php echo htmlspecialchars($alumno['Matricula']); ?>" readonly></td></tr>
                    <tr><td>Nombre </td><td><input type="text" name="nombre" value="<?php echo htmlspecialchars($alumno['Nombre']); ?>"></td></tr>
                    <tr><td>Apellido Paterno </td><td><input type="text" name="paterno" value="<?php echo htmlspecialchars($alumno['Paterno']); ?>"></td></tr>
                    <tr><td>Apellido Materno </td><td><input type="text" name="materno" value="<?php echo htmlspecialchars($alumno['Materno']); ?>"></td></tr>
                    <tr><td>Edad </td><td><input type="text" name="edad" value="<?php echo htmlspecialchars($alumno['Edad']); ?>"></td></tr>
                    <tr><td>Usuario </td><td><input type="text" name="usuario" value="<?php echo htmlspecialchars($alumno['Usuario']); ?>"></td></tr>
                    <tr><td>Contraseña </td><td><input type="password" name="psw" value="<?php echo htmlspecialchars($alumno['Cont']); ?>"></td></tr>
                    
                    <tr><td>Imagen </td>
                        <td>
                            <input type="file" name="imagen" accept="image/*">
                            <br>
                            <!-- Mostrar la imagen actual si existe -->
                            <?php if (!empty($alumno['imagen'])): ?>
                                <img src="<?php echo htmlspecialchars($alumno['imagen']); ?>" alt="imagen" style="width: 100px; height: auto;">
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr><td><input type="submit" name="Actualizar"></td></tr>
                </table>
            </form>
        <?php endif;?>
    </body>
</html>