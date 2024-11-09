<?php
    include("conexcion.php");
    session_start();
    if($_SERVER["REQUEST_METHOD"]== "POST"){
        $usuario = $_POST['usuario'];
        $contra = $_POST['contra'];

        $sql = "SELECT * FROM alumnos WHERE Usuario = ? AND Cont = ?";
        $stmt = $conn->prepare ($sql);
        $stmt->bind_param("ss",$usuario,$contra);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows == 1){

            $_SESSION['usuario'] =$usuario;
            echo "Inicio de seción exitoso. BIENVENIDO, ".$_SESSION ['usuario'];
            header("Location: index2.php");
        }else{
             echo"Usuario o contraseña incorrectos.";
        }
        $stmt->close();
    }
?>